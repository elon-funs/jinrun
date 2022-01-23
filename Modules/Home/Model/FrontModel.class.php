<?phpnamespace Home\Model;use Think\Model;/** * 圈子模型 * @author fish * */class FrontModel {		public $table = 'pin';		public function get_member_community_info($member_id)	{				$head_info = M('lionfish_community_head')->where( array('member_id' => $member_id) )->find();				return $head_info;	}	public function get_community_byid($community_id, $where="")	{				$data = array();		$data['communityId'] = $community_id;				$community_info = M('lionfish_community_head')->where( "id=".$community_id.' '.$where )->find();				if(!empty($community_info)){			$data['communityName'] = $community_info['community_name'];						$province = $this->get_area_info($community_info['province_id']); 			$city = $this->get_area_info($community_info['city_id']); 			$area = $this->get_area_info($community_info['area_id']); 			$country = $this->get_area_info($community_info['country_id']); 			//address			$full_name = $province['name'].$city['name'].$area['name'].$country['name'].$community_info['address'];						$data['fullAddress'] = $full_name;			$data['communityAddress'] = '';						$mb_info = M('lionfish_comshop_member')->field('avatar,username')->where( array('member_id' => $community_info['member_id'] ) )->find();						$data['headImg'] = $mb_info['avatar'];			$data['disUserHeadImg'] = $mb_info['avatar'];			$data['disUserName'] = $community_info['head_name'];			$data['head_mobile'] = $community_info['head_mobile'];			$data['province'] = $province['name'];			$data['city'] = $city['name'];			$data['lon'] = $community_info['lon'];			$data['lat'] = $community_info['lat'];			return $data;		} else {			return '';		}			}		/**	 * 获取历史的社区	 */	public function get_history_community($member_id)	{				$history_community = M('lionfish_community_history')->where( "head_id>0 and member_id={$member_id}" )->order('addtime desc')->find();						$data = array();						if(!empty($history_community))		{			$data['communityId'] = $history_community['head_id'];										$community_info = M('lionfish_community_head')->where( array('id' => $history_community['head_id'] ) )->find();						$data['communityName'] = $community_info['community_name'];						$province = $this->get_area_info($community_info['province_id']); 			$city = $this->get_area_info($community_info['city_id']); 			$area = $this->get_area_info($community_info['area_id']); 			$country = $this->get_area_info($community_info['country_id']); 			//address			$full_name = $province['name'].$city['name'].$area['name'].$country['name'].$community_info['address'];						$data['fullAddress'] = $full_name;			$data['communityAddress'] = '';						$mb_info = M('lionfish_comshop_member')->field('avatar,username')->where( array('member_id' => $community_info['member_id'] ) )->find();									$data['headImg'] = $mb_info['avatar'];			$data['disUserHeadImg'] = $mb_info['avatar'];			//$data['disUserName'] = $mb_info['username'];						$data['disUserName'] = $community_info['head_name'];			$data['disUserMobile'] = $community_info['head_mobile'];			$data['lon'] = $community_info['lon'];			$data['lat'] = $community_info['lat'];					}		return $data;	}	/**	 * 切换历史社区	 */	public function update_history_community($member_id, $head_id){				$history_community = M('lionfish_community_history')->where( array('member_id' => $member_id) )->order('id desc')->find();					if( empty($history_community) )		{			$ins_data = array();			$ins_data['member_id'] = $member_id;			$ins_data['head_id'] = $head_id;			$ins_data['addtime'] = time();						M('lionfish_community_history')->add($ins_data);		}else{						M('lionfish_community_history')->where( array('id' => $history_community['id']) )->save( array('addtime' => time() , 'head_id' => $head_id  ) );					}				return "success";	}		/**		根据经纬度获取位置信息		get_gps_area_info($longitude,$latitude,$limit);	**/	public function get_gps_area_info($longitude,$latitude,$limit=10,$keyword='',$city_id=0, $rest=0)	{				//$where = " and state =1 ";		$where = " and state =1 and enable =1 ";		if( $city_id != 0 )		{			$where .= " and city_id = ".$city_id;			}		if( $rest != 0 )		{			$where .= " and rest != 1";		}		if( !empty($keyword) )		{			$where .= " and community_name like '%{$keyword}%' ";			}				// having distance <= 10000距离限制 default_comunity_limit_mile		$limit_mile = $this->get_config_by_name('default_comunity_limit_mile');		$limit_where = '';		if(isset($limit_mile) && !empty($limit_mile) && floatval($limit_mile>0))			$limit_where = 'having distance <= '.floatval($limit_mile)*1000;				$sql = "select *, ROUND(6378.138*2*ASIN(SQRT(POW(SIN(({$latitude}*PI()/180-lat*PI()/180)/2),2)+COS({$latitude}*PI()/180)*COS(lat*PI()/180)*POW(SIN(({$longitude}*PI()/180-lon*PI()/180)/2),2)))*1000) AS distance 		 FROM ".C('DB_PREFIX')."lionfish_community_head where member_id !=0  {$where}{$limit_where} order by distance asc limit {$limit}";				$list = M()->query($sql);				$result = array();				if( !empty($list) )		{			foreach($list as  $val)			{				$mb_info = M('lionfish_comshop_member')->field('avatar,username')->where( array('member_id' => $val['member_id'] ) )->find();									if(empty($mb_info)) continue;								$tmp_arr = array();				$tmp_arr['communityId'] = $val['id'];				$tmp_arr['communityName'] = $val['community_name'];				$province = $this->get_area_info($val['province_id']); 				$city = $this->get_area_info($val['city_id']); 				$area = $this->get_area_info($val['area_id']); 				$country = $this->get_area_info($val['country_id']); 				//address				$full_name = $province['name'].$city['name'].$area['name'].$country['name'].$val['address'];								$tmp_arr['fullAddress'] = $full_name;				$tmp_arr['communityAddress'] = '';				$tmp_arr['disUserName'] = $val['head_name'];				//ims_ 				 				$tmp_arr['headImg'] = $mb_info['avatar'];				$tmp_arr['disUserHeadImg'] = '';				$tmp_arr['rest'] = $val['rest'];				$tmp_arr['lat'] = $val['lat'];				$tmp_arr['lon'] = $val['lon'];				$distance = $val['distance'];								if($distance >1000)				{					$distance = round($distance/1000,2).'公里';				}else{					$distance = $distance.'米';				}				$tmp_arr['distance'] = $distance;								$result[] = $tmp_arr;			}		}		return $result;			}		public function get_area_info($id)	{		$area_info = M('lionfish_comshop_area')->where( array('id' => $id) )->find();		return $area_info;	}		public function get_area_ninfo_by_name($name)	{		$area_info = M('lionfish_comshop_area')->where( array('name' => $name) )->find();		return $area_info;	}	//$order_comment_count =  M('order_comment')->where( array('goods_id' => $id, 'state' => 1) )->count();	/**		检查商品限购数量	**/	public function check_goods_user_canbuy_count($member_id, $goods_id, $unlimit_wait_pay = false)	{		//per_number		global $_W;		global $_GPC;		$goods_desc = $this->get_goods_common_field($goods_id , 'total_limit_count,one_limit_count');		//$per_number = $goods_desc['per_number'];		if($goods_desc['total_limit_count'] > 0 || $goods_desc['one_limit_count'] > 0)		{			$limit_state = '1,2,3,4,6,7,9,11,12,13,14';			if($unlimit_wait_pay)			{				$limit_state = '1,2,4,6,7,9,11,12,13,14';			}			$sql = "SELECT sum(og.quantity) as count  FROM " .C('DB_PREFIX') . "lionfish_comshop_order as o,			" .C('DB_PREFIX') . "lionfish_comshop_order_goods as og where  o.order_id = og.order_id and  og.goods_id =" . (int)$goods_id ."			 and o.member_id = {$member_id}   and o.order_status_id in ({$limit_state}) ";			$buy_count_arr = M()->query($sql);			$buy_count =  $buy_count_arr[0]['count'];			if(  $goods_desc['one_limit_count'] > 0 && $goods_desc['total_limit_count'] > 0)			{				if($buy_count >= $goods_desc['total_limit_count'])				{					return -1;				}else{					$total_max_count = $goods_desc['total_limit_count'] - $buy_count;					$can_buy = $total_max_count < $goods_desc['one_limit_count'] ? $total_max_count : $goods_desc['one_limit_count'];					return $can_buy;				}			}else if($goods_desc['one_limit_count'] > 0){				return $goods_desc['one_limit_count'];			}else if($goods_desc['total_limit_count'] > 0){				if($buy_count >= $goods_desc['total_limit_count'])				{					return -1;				} else {					return ($goods_desc['total_limit_count'] - $buy_count);				}			}		} else{			return 0;		}	}	/**		检查每日商品限购数量	**/	public function check_goods_user_canbuy_day_count($member_id, $goods_id, $unlimit_wait_pay = false)	{		//per_number		global $_W;		global $_GPC;		$goods_desc = $this->get_goods_common_field($goods_id , 'oneday_limit_count');		if($goods_desc['oneday_limit_count'] > 0)		{			$limit_state = '1,2,3,4,6,7,9,11,12,13,14';			if($unlimit_wait_pay)			{				$limit_state = '1,2,4,6,7,9,11,12,13,14';			}            $time = strtotime("today");            $sql = "SELECT sum(og.quantity) as count  FROM " .C('DB_PREFIX') . "lionfish_comshop_order as o,        " .C('DB_PREFIX') . "lionfish_comshop_order_goods as og where  o.order_id = og.order_id and  og.goods_id =" . (int)$goods_id ."         and o.member_id = {$member_id}   and o.order_status_id in ({$limit_state}) and  pay_time >= {$time} ";            $buy_day_count_arr = M()->query($sql);            $buy_day_count =  isset($buy_day_count_arr[0]['count']) ? 0 : $buy_day_count_arr[0]['count'];            if($buy_day_count >= $goods_desc['oneday_limit_count'])            {                return -1;            }else{                return $goods_desc['oneday_limit_count'] - $buy_day_count;            }		} else{			return 0;		}	}	/**		获取规格图片	**/	public function get_goods_sku_item_image($option_item_ids)	{				$option_item_ids = explode('_', $option_item_ids);		$ids_str = implode(',', $option_item_ids);									$image_info = M('lionfish_comshop_goods_option_item')->field('thumb')->where("id in ({$ids_str})  and thumb != ''")->find();				return $image_info;	}		/**		获取商品规格图片	**/	public function get_goods_sku_image($snailfish_goods_option_item_value_id)	{				$info = M('lionfish_comshop_goods_option_item_value')->field('option_item_ids')->where( array('id' => $snailfish_goods_option_item_value_id) )->find();						$option_item_ids = explode('_', $info['option_item_ids']);		$ids_str = implode(',', $option_item_ids);											$image_info = M('lionfish_comshop_goods_option_item')->field('thumb')->where("id in ({$ids_str}) and uniacid=:uniacid and thumb != ''")->find();				return $image_info;	}			public function get_goods_supply_id($goods_id)	{		$supply_id = 0;				$gd_info = $this->get_goods_common_field($goods_id , 'supply_id');				if(!empty($gd_info))		{			return $gd_info['supply_id'];		}else{			return 0;		}	}		public function get_supply_info($supply_id)	{		$supply_info = M('lionfish_comshop_supply')->where( array('id' => $supply_id ) )->find();				return 	$supply_info;	}		    public function get_config_by_name($name)	{				//jrs_lionfish_comshop_config				$data = $caceh_data = S('_get_all_config');				if( !empty($data) && isset($data[$name]) )		{			return $data[$name];		}else{						$info = M('lionfish_comshop_config')->where( array('name' => $name) )->find();						return $info['value'];		}			}		public function get_goods_common_field($goods_id , $filed='*')	{		$info = M('lionfish_comshop_good_common')->field($filed)->where( array('goods_id' => $goods_id) )->find();				return $info;	}}