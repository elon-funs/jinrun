<?php

namespace Seller\Model;

class RedisorderModel
{
	/**
		同步所有商品库存
	**/
	
	function sysnc_allgoods_total()
	{
		$list = M('lionfish_comshop_goods')->field('id')->select();
		
		foreach($list as $val)
		{
			$this->sysnc_goods_total($val['id']);
		}
	}
	
	function show_logs($goods_id)
	{
		
		$redis =  $this->get_redis_object_do();
		
		$key = 'bu_a_goods_total_'.$goods_id;
		$data = $redis->lRange($key,0,1000);
		
		$redis_html = "<table><tr><th>序号</th><th>内容</th></tr>";
		 $i =1;
		foreach( $data as $val )
		{
			$redis_html .= "<tr><td>{$i}</td><td>".$val."</td></tr>";
		}
		$redis_html .= "</table>";
		
		echo $redis_html;die();
	}
	
	public function inc_daycount()
	{
		
			if(!class_exists('Redis')){
				return 0;
			}
			
			 $redis =  $this->get_redis_object_do();
			
			$day_time = strtotime( date('Y-m-d'.' 00:00:00') );
			
			$inc_key = "a_order_inc_".$day_time;
			
			$redis->incr($inc_key);
			$cur_count  = $redis->get($inc_key);
			
			return $cur_count;
		
	}
	
	
	function get_all_goods_member_data()
	{
	    $redis =  $this->get_redis_object_do();
	
	    $sku_key = "a_user_goods_*_781";
	
	    $res = $redis->keys($sku_key);
	
	    $need_data = array();
	
	    foreach( $res as $val )
	    {
	        $data = $redis->lRange($val,0,100);
	        $tp_key = explode('_',$val);
	        foreach( $data as $vv )
	        {
	            //a_user_goods_4868_781
	            $need_data[] = array( 'member_id' => $tp_key[3], 'key' => $val, 'buy_count' => 1  );
	        }
	    }
	
	    $redis_html = "<table><tr><th>序号</th><th>用户名</th><th>会员id</th><th>购买数量</th></tr>";
	    $i =1;
	
	    foreach( $need_data as $val )
	    {
	        $mb_info = M('lionfish_comshop_member')->field('username')->where( array('member_id' => $val['member_id']) )->find();
	        	
	        $redis_html .= "<tr><td>{$i}</td><td>".$mb_info['username']."</td><td>".$val['member_id']."</td><td>1</td></tr>";
	        	
	        $i++;
	        	
	    }
	
	    $redis_html .= "</table>";
	    	
	
	
	    echo $redis_html;die();
	}
	
	function get_redis_object_do()
	{
		include_once  ROOT_PATH .'Modules/Lib/Redis.class.php';
				
		$config = array(
				'host'=> D('Home/Front')->get_config_by_name('redis_host'),
				'port'=> D('Home/Front')->get_config_by_name('redis_port'),
				'auth' => D('Home/Front')->get_config_by_name('redis_auth'),
		);
		
		$redis =  \Redisgo::getInstance($config, array('db_id'=>1,'timeout' => 60 ));
		
		return $redis;
	}
	
	/**
		获取商品规格里面的库存数据
		'goods_id' => $goods_id,'option_item_ids' => $data['sku_str']
	**/
	function get_goods_sku_quantity($goods_id, $option_item_ids)
	{
		if(!class_exists('Redis')){
			return -1;
		}
		
		$redis =  $this->get_redis_object_do();
				
		$sku_key = "a_goods_sku_{$goods_id}_".$option_item_ids;
		
		$quantity = $redis->llen($sku_key);
		
		
		return $quantity;
	}
	
	/**
		下单商品是否数量足够
	**/
	function check_goods_can_buy($goods_id, $sku_str,$buy_quantity)
	{
		$open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
		
		if($open_redis_server == 1)
		{
			if(!class_exists('Redis')){
				return true;
			}
			$total_quantity = $this->get_goods_total_quantity($goods_id);
			
			if($total_quantity < $buy_quantity)
			{
				return false;
			}else if( !empty($sku_str) )
			{
				$sku_quantity = $this->get_goods_sku_quantity($goods_id, $sku_str);
				if($sku_quantity < $buy_quantity)
				{
					return false;
				}else{
					return true;
				}
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	/**
		删除占位
		$redis_has_add_list[]  = array('member_id' => $member_id, 'goods_id' => $good['goods_id'], 'sku_str' => $good['sku_str'] );
				
	**/
	function cancle_goods_buy_user($list)
	{
		$open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
		
		if($open_redis_server == 1)
		{
			$redis = $this->get_redis_object_do();
			
			foreach($list as $val)
			{
				$member_id = $val['member_id'];
				$goods_id = $val['goods_id'];
				$sku_str = $val['sku_str'];
				
				if( !empty($val['sku_str']) )
				{
					$key = "user_goods_{$member_id}_{$goods_id}_{$sku_str}";
				}else{
					$key = "user_goods_{$member_id}_{$goods_id}";
				}
				$redis->lRem($key,0,1);
			}
		}
	}
	/**
		补回库存
	**/
	public function bu_goods_quantity($goods_id,$quantity)
	{
		$open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
		
		if($open_redis_server == 1)
		{
			if(!class_exists('Redis')){
				return -1;
			}
			$redis = $this->get_redis_object_do();
			
			
			
			
			$dan_goods_key = 'a_goods_total_'.$goods_id;
			
			
			$log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
			$total = $redis->llen($dan_goods_key);
			
			$redis->lpush($log_dan_goods_key,'cur total quantity:____total:'.$total.'___'.date('Y-m-d H:i:s') );
			
			for( $m=0; $m<$quantity; $m++ )
			{
				$redis->lpush($dan_goods_key,1);
			}
			//LLEN list1
			
			$log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
			$total = $redis->llen($dan_goods_key);
			
			$redis->lpush($log_dan_goods_key,'back quantity:'.$quantity.'____total:'.$total.'___'.date('Y-m-d H:i:s') );
		}
	}
	
	/**
		补回规格库存
	**/
	public function bu_goods_sku_quantity($goods_id,$quantity, $sku_str)
	{
		$open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
		
		if($open_redis_server == 1)
		{
			if(!class_exists('Redis')){
				return -1;
			}
			$redis = $this->get_redis_object_do();
			
			$sku_key = "a_goods_sku_{$goods_id}_".$sku_str;
			for( $m=0; $m<$quantity; $m++ )
			{
				$redis->lpush($sku_key,1);
			}
		}
	}
	
	
	public function bu_car_has_delquantity($redis_has_add_list)
	{
	    // $redis_has_add_list[]  = array('member_id' => $member_id, 'goods_id' => $good['goods_id'], 'sku_str' => $good['sku_str'],'quantity' => $good['quantity'] );
	    
	    $open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
	    
	    if($open_redis_server == 1)
	    {
	        $redis = $this->get_redis_object_do();
	        
	        if( !empty($redis_has_add_list) )
	        {
	            
	            foreach($redis_has_add_list as $list)
	            {
	                $member_id = $list['member_id'];
	                $goods_id = $list['goods_id'];
	                $sku_str = $list['sku_str'];
	                $quantity = $list['quantity'];
	                
	                if( !empty($sku_str) )
	                {
	                    $sku_key = "a_goods_sku_{$goods_id}_".$sku_str;
	                
	                    $bu_count = 0;
	                    $ck_res = true;
	                
	                   
                        //补回
                        for( $m=0; $m<$quantity; $m++ )
                        {
                            $redis->lpush($sku_key,1);
                        }
                      	
                        $dan_goods_key = 'a_goods_total_'.$goods_id;
                        
                        //补回
                        for( $m=0; $m<$quantity; $m++ )
                        {
                            $redis->lpush($dan_goods_key,1);
                        }
            
                        $dan_goods_key = 'a_goods_total_'.$goods_id;
            
                        $log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
                        $total = $redis->llen($dan_goods_key);
            
                        $redis->lpush($log_dan_goods_key,'skuparseadd bu:'.$quantity.'____total:'.$total.'___'.date('Y-m-d H:i:s') );
	                            
	                }else{
	                   
	                    $dan_goods_key = 'a_goods_total_'.$goods_id;
	                
	                        //补回
	                        for( $m=0; $m<$quantity; $m++ )
	                        {
	                            $redis->lpush($dan_goods_key,1);
	                        }
	                        	
	                        $dan_goods_key = 'a_goods_total_'.$goods_id;
	                
	                        $log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
	                        $total = $redis->llen($dan_goods_key);
	                
	                        $redis->lpush($log_dan_goods_key,'parseadd bu:'.$quantity.'____total:'.$total.'___'.date('Y-m-d H:i:s') );
	                        	
	                        return 0;
	                   
	                }
	                
	            }
	        }
	    }
	    
	}
	
	/**
		判断下单减库存的情况下，库存是否足够
		return -1 没有开启redis,
		return 0  已经没有库存了
		return 1  可以下单的
	**/
	public function add_goods_buy_user($goods_id, $sku_str,$quantity,$member_id)
	{
		$open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
		
		if($open_redis_server == 1)
		{
			if(!class_exists('Redis')){
				return -1;
			}
			
			$total_quantity = $this->get_goods_total_quantity($goods_id);
			
			$redis = $this->get_redis_object_do();
			
			
			$dan_goods_key = 'a_goods_total_'.$goods_id;
			
			
			$log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
			$total = $redis->llen($dan_goods_key);
			
			$redis->lpush($log_dan_goods_key,'cur total quantity:____total:'.$total.'___'.date('Y-m-d H:i:s') );
			
			
			if( !empty($sku_str) )
			{
				$sku_key = "a_goods_sku_{$goods_id}_".$sku_str;
				
				$bu_count = 0;
				$ck_res = true;
				
				for( $j=0;$j<$quantity;$j++ )
				{
					$count= $redis->lpop($sku_key);
					$bu_count++;
					if(!$count)
					{
						$ck_res = false;
					}
				}
				
				if( !$ck_res )
				{
					//补回
					for( $m=0; $m<$bu_count; $m++ )
					{
						$redis->lpush($sku_key,1);
					}
					return 0;
				}else{
					$bu_total_count = 0;
					$ck_total_res = true;
					
					$dan_goods_key = 'a_goods_total_'.$goods_id;
					
					for( $j=0;$j<$quantity;$j++ )
					{
						$count2 = $redis->lpop($dan_goods_key);
						
						if(!$count2)
						{
							$ck_total_res = false;
						}else{
							$bu_total_count++;
						}
					}
					
					if( !$ck_total_res )
					{
						//补回
						for( $m=0; $m<$bu_total_count; $m++ )
						{
							$redis->lpush($dan_goods_key,1);
						}
						
						$dan_goods_key = 'a_goods_total_'.$goods_id;
						
						$log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
						$total = $redis->llen($dan_goods_key);
						
						$redis->lpush($log_dan_goods_key,'skuparseadd bu:'.$bu_total_count.'____total:'.$total.'___'.date('Y-m-d H:i:s') );
							
						
						return 0;
					}else{
						for( $j=0;$j<$quantity;$j++ )
						{
							$key = "a_user_goods_{$member_id}_{$goods_id}_{$sku_str}";
							$redis->rPush($key,1);//占坑 
						}
						
						$dan_goods_key = 'a_goods_total_'.$goods_id;
						
						$log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
						$total = $redis->llen($dan_goods_key);
						
						$redis->lpush($log_dan_goods_key,'add quantity:'.$quantity.'____total:'.$total.'___'.date('Y-m-d H:i:s') );
							
						
						return 1;
					}
				}
				//已经减过库存了
			}else{
				$bu_total_count = 0;
				$ck_total_res = true;
				
				$dan_goods_key = 'a_goods_total_'.$goods_id;
				
				for( $j=0;$j<$quantity;$j++ )
				{
					$count2 = $redis->lpop($dan_goods_key);
					
					if(!$count2)
					{
						$ck_total_res = false;
					}else{
						$bu_total_count++;
					}
					
				}
				
				
				
				if( !$ck_total_res )
				{
					//补回
					for( $m=0; $m<$bu_total_count; $m++ )
					{
						$redis->lpush($dan_goods_key,1);
					}
					
					$dan_goods_key = 'a_goods_total_'.$goods_id;
						
					$log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
					$total = $redis->llen($dan_goods_key);
						
					$redis->lpush($log_dan_goods_key,'parseadd bu:'.$bu_total_count.'____total:'.$total.'___'.date('Y-m-d H:i:s') );
					
					return 0;
				}else{
					for( $j=0;$j<$quantity;$j++ )
					{
						$key = "a_user_goods_{$member_id}_{$goods_id}";
						$redis->rPush($key,1);//占坑 
					}
					
					$dan_goods_key = 'a_goods_total_'.$goods_id;
						
					$log_dan_goods_key = 'bu_a_goods_total_'.$goods_id;
					$total = $redis->llen($dan_goods_key);
						
					$redis->lpush($log_dan_goods_key,'add quantity:'.$quantity.'____total:'.$total.'___'.date('Y-m-d H:i:s') );
					
					return 1;
				}
				//已经减过库存了
			}
			
			
			
			//$ret = $redis->rPush('city', 'guangzhou');
			//rPush($key,$value) rPush($key,$value)
		}else{
			return -1;
		}
	}
	
	/**
		获取单个商品的总数
	**/
	function get_goods_total_quantity($goods_id)
	{
		$open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
		
		if($open_redis_server == 1)
		{
			
			if(!class_exists('Redis')){
				return -1;
			}
			
			$redis =  $this->get_redis_object_do();;
					
			$dan_goods_key = 'a_goods_total_'.$goods_id;
			$quantity = $redis->llen($dan_goods_key);
			
			return $quantity;
		}else{
			return -1;
		}
	}
	/**
	 * 有人拼团
	 */
	function add_pintuan_user( $pin_id )
	{
	    
	    $open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
	     
	    if($open_redis_server == 1)
	    {
	        if(!class_exists('Redis')){
	            return false;
	        }
	         
	        $redis_new_redis = D('Home/Front')->get_config_by_name('redis_new_redis');
	         
	        $redis =  $this->get_redis_object_do();;
	         
	        $dan_goods_key = '_pintuan_count_'.$pin_id;
	        
	        
	        $count= $redis->lpop($dan_goods_key);
	       
	        if(!$count)
	        {
	            return 0;
	        }else{
	            return 1;
	        }
	        
	    }else{
	        return 1;
	    }
	    
	    
	}
	
	/**
	 * 同步拼团的占位
	 */
	function sysnc_pintuan_total($pin_id, $total)
	{
	    $open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
	    
	    if($open_redis_server == 1)
	    {
	        if(!class_exists('Redis')){
	            return false;
	        }
	        
	        $redis_new_redis = D('Home/Front')->get_config_by_name('redis_new_redis');
	        
	        $redis =  $this->get_redis_object_do();;
	        
	        $dan_goods_key = '_pintuan_count_'.$pin_id;
	        
	        for($i=0; $i< $total; $i++)
	        {
	            $redis->lpush($dan_goods_key,1);
	        }
	        
	    }
	}
	
	/**
		同步单个商品库存
		
		//结构
		//goods_total_1 => 10
		//goods_sku_1_99_88 => 8
	**/
	function sysnc_goods_total($goods_id)
	{
		$open_redis_server = D('Home/Front')->get_config_by_name('open_redis_server');
		
		if($open_redis_server == 1)
		{
			$goods_info = M('lionfish_comshop_goods')->field('total,hasoption')->where( array('id' => $goods_id) )->find();
		
			if( !empty($goods_info) )
			{
				if(!class_exists('Redis')){
					return false;
				}
				
				$redis_new_redis = D('Home/Front')->get_config_by_name('redis_new_redis');
				if( empty($redis_new_redis) )
					D('Seller/Config')->update( array('redis_new_redis' => 1) );
				
				$redis =  $this->get_redis_object_do();;
				
				$dan_goods_key = 'a_goods_total_'.$goods_id;
				
				$has_total = $redis->llen($dan_goods_key);
				
				if( $has_total > $goods_info['total'] )
				{
					$del_count = $has_total - $goods_info['total'];
					
					for($i=0; $i< $del_count; $i++)
					{
						$redis->lpop($dan_goods_key);
					}
				}else{
					$add_count = $goods_info['total'] - $has_total;
					
					for($i=0; $i< $add_count; $i++)
					{
						$redis->lpush($dan_goods_key,1);
					}
				}
				
				//$redis->set($dan_goods_key,$goods_info['total']);
				
				
				if($goods_info['hasoption'] == 1)
				{
					$option_list = M('lionfish_comshop_goods_option_item_value')->field('option_item_ids,stock')->where( array('goods_id' => $goods_id) )->select();
					
					if( !empty($option_list) )
					{
						foreach($option_list as $val)
						{
							$sku_key = "a_goods_sku_{$goods_id}_".$val['option_item_ids'];
							
							$has_op_total = $redis->llen($sku_key);
							
							if( $has_op_total > $val['stock'] )
							{
								$del_op_count = $has_op_total - $val['stock'];
					
								for($i=0; $i< $del_op_count; $i++)
								{
									$redis->lpop($sku_key);
								}
							}else{
								$add_op_count = $val['stock'] - $has_op_total;
								
								for($i=0; $i< $add_op_count; $i++)
								{
									$redis->lpush($sku_key,1);
								}
							}
							//$redis->set($sku_key,$val['stock']);
						}
					}
					
				}
				
			}
		}
		
		
	}
}


?>