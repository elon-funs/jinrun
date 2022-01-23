<?php
/**
 * lionfish 商城系统
 *
 * ==========================================================================
 * @link      http://www.liofis.com/
 * @copyright Copyright (c) 2015 liofis.com. 
 * @license   http://www.liofis.com/license.html License
 * ==========================================================================
 *
 * @author    fish
 *
 */
namespace Seller\Model;

class ConfigModel{
	
	
	public function update($data)
	{

		foreach($data as $name => $value)
		{
			
			$info = M('lionfish_comshop_config')->where( array('name' => $name) )->find();
			
			$value = htmlspecialchars($value);
			if( empty($info) )
			{
				$ins_data = array();
				$ins_data['name'] = $name;
				$ins_data['value'] = $value;
				M('lionfish_comshop_config')->add($ins_data);
			}else{
				
				$rs = M('lionfish_comshop_config')->where( array('id' => $info['id']) )->save( array('value' => $value) );
				
			}
			
		}
		$this->get_all_config(true);
	}
	
	public function get_all_config($is_parse = false)
	{
		
		$data = S('_get_all_config');
		
		if (empty($data) || $is_parse) {
			
			$all_list = M('lionfish_comshop_config')->select();	

			if (empty($all_list)) {
				$data = array();
			}else{
				$data = array();
				foreach($all_list as $val)
				{
					$data[$val['name']] = htmlspecialchars_decode( $val['value'] );
				}
			}
			
			S('_get_all_config', $data);
		}
		return $data;
	}
	
	
	
}
?>