<?php

function dlink_preprocess_views_view(&$vars){
	if ( $vars['view']->name == "dlink_slides"){
		$vars['rows']=str_replace ( "col#" , "col" , $vars['rows'] ) ;
	}
}

function dlink_preprocess_views_exposed_form(&$vars){
	$path_array = array(
		"/for-home/routers-and-modems",
		"/for-home/routers-and-modems-listing-",
		"/for-home/whole-home-wifi",
		"/for-home/whole-home-wifi-listing-",
		"/for-home/cameras",
		"/for-home/cameras-listing-",
		"/for-home/smart-home",
		"/for-home/smart-home-listing-",
		"/for-home/accessories",
		"/for-home/accessories-listing-",
		"/for-home/switches",
		"/for-home/switches-listing-",
		"/for-business/switching",
		"/for-business/switching-listing-",
		"/for-business/wireless",
		"/for-business/wireless-listing-",
		"/for-business/ip-surveillance",
		"/for-business/ip-surveillance-listing-",
		"/for-business/industrial-switches",
		"/for-business/industrial-switches-listing-",
		"/for-business/accessories",
		"/for-business/accessories-listing-",
		"/ev-icin/tum-ev-icin-wifi",
		"/ev-icin/tum-ev-icin-wifi-listing-",
		"/ev-icin/yonlendiriciler-ve-modemler",
		"/ev-icin/yonlendiriciler-ve-modemler-listing-",
		"/ev-icin/kameralar",
		"/ev-icin/kameralar-listing-",
		"/ev-icin/akilli-ev",
		"/ev-icin/akilli-ev-listing-",
		"/ev-icin/ag-anahtarlari",
		"/ev-icin/ag-anahtarlari-listing-",
		"/ev-icin/aksesuarlar",
		"/ev-icin/aksesuarlar-listing-",
		"/tr/is-icin/ag-anahtarlari",
		"/tr/is-icin/ag-anahtarlari-listing-",
		"/tr/is-icin/kablosuz",
		"/tr/is-icin/kablosuz-listing-",
		"/tr/is-icin/ip-tabanli-gozetim",
		"/tr/is-icin/ip-tabanli-gozetim-listing-",
		"/tr/is-icin/endustriyel",
		"/tr/is-icin/endustriyel-listing-",
		"/tr/is-icin/aksesuarlar",
		"/tr/is-icin/aksesuarlar-listing-"
	);

	$path_array2 = array(
		"/for-home/routers-and-modems",
		"/for-home/routers-and-modems-listing-",
		"/for-home/whole-home-wifi",
		"/for-home/whole-home-wifi-listing-",
		"/for-home/cameras",
		"/for-home/cameras-listing-",
		"/for-home/smart-home",
		"/for-home/smart-home-listing-",
		"/for-home/accessories",
		"/for-home/accessories-listing-",
		"/for-home/switches",
		"/for-home/switches-listing-",
		"/for-business/switching",
		"/for-business/switching-listing-",
		"/for-business/wireless",
		"/for-business/wireless-listing-",
		"/for-business/ip-surveillance",
		"/for-business/ip-surveillance-listing-",
		"/for-business/industrial-switches",
		"/for-business/industrial-switches-listing-",
		"/for-business/accessories",
		"/for-business/accessories-listing-",
		"/ev-icin/tum-ev-icin-wifi",
		"/ev-icin/tum-ev-icin-wifi-listing-",
		"/ev-icin/yonlendiriciler-ve-modemler",
		"/ev-icin/yonlendiriciler-ve-modemler-listing-",
		"/ev-icin/kameralar",
		"/ev-icin/kameralar-listing-",
		"/ev-icin/akilli-ev",
		"/ev-icin/akilli-ev-listing-",
		"/ev-icin/ag-anahtarlari",
		"/ev-icin/ag-anahtarlari-listing-",
		"/ev-icin/aksesuarlar",
		"/ev-icin/aksesuarlar-listing-",
		"/tr/is-icin/ag-anahtarlari",
		"/tr/is-icin/ag-anahtarlari-listing-",
		"/tr/is-icin/kablosuz",
		"/tr/is-icin/kablosuz-listing-",
		"/tr/is-icin/ip-tabanli-gozetim",
		"/tr/is-icin/ip-tabanli-gozetim-listing-",
		"/tr/is-icin/endustriyel",
		"/tr/is-icin/endustriyel-listing-",
		"/tr/is-icin/aksesuarlar",
		"/tr/is-icin/aksesuarlar-listing-"
	);	
	
	
	if (isset ($vars["form"]["#action"]) and (
	in_array (str_replace ( "/replica" , "" , $vars["form"]["#action"]),$path_array) or 
	in_array (str_replace ( "/en" , "" , $vars["form"]["#action"]),$path_array)
	or 
	in_array (str_replace ( "/tr" , "" , $vars["form"]["#action"]),$path_array))
	){
		//Baher : include the carrousel effect for the filter fields.
		if (
			in_array (str_replace ( "/replica" , "" , $vars["form"]["#action"]),$path_array2) or 
			in_array (str_replace ( "/en" , "" , $vars["form"]["#action"]),$path_array2) or 
			in_array (str_replace ( "/tr" , "" , $vars["form"]["#action"]),$path_array2)
		){
			$css_list = array ('slick-theme.css','slick.css');
			foreach ($css_list as $key_css => $value_css){
				$front_style = path_to_theme() .'/css/'.$value_css;
				
				if (file_exists($front_style)) {
					$include_style = $front_style;
					$options = array(
						'group' => CSS_THEME,
						'preprocess' => FALSE,
					);
					drupal_add_css($include_style, $options);
					$vars['styles'] = drupal_get_css();
					
					drupal_add_js(path_to_theme() .'/js/custom_filter_carousel.js');
					drupal_add_js(path_to_theme() .'/js/slick.js');
				}					
			}
		}

		
		if (preg_match("/-listing-/", $vars["form"]["#action"])) {
			$vars['grid_link'] = preg_replace('/-listing-/i', "", $vars["form"]["#action"]);
			$vars['list_link']  = $vars["form"]["#action"];
			
			$vars['is_grid_active'] = ""; 
			$vars['is_list_active'] = "compare-bar__grid-link--active"; 
			  
				
		} else {
			$vars['grid_link'] = $vars["form"]["#action"];
			$vars['list_link'] = $vars["form"]["#action"]."-listing-";
			$vars['is_grid_active'] = "compare-bar__grid-link--active"; 
			$vars['is_list_active'] = ""; 
		}
	}
	else{
		ob_start();
		var_dump($vars["form"]["#action"]);
		$dumpy = ob_get_clean();	
		watchdog('dlink', 'dlink_preprocess_views_exposed_form:'.$dumpy);		
	}
}


function dlink_preprocess_node(&$variables, $hook) {
	//$node = $variables['node'];
	if (isset ($variables['node']) and ($variables['node']->type == 'home_products' or $variables['node']->type == 'business_products' or $variables['node']->type == 'hero_media')){
		
		$css_list = array ('home_products.css','slick-theme.css','slick.css');

		foreach ($css_list as $key_css => $value_css){
			$front_style = path_to_theme() .'/css/'.$value_css;
			
			if (file_exists($front_style)) {
				$include_style = $front_style;
				$options = array(
					'group' => CSS_THEME,
					'preprocess' => FALSE,
				);
				drupal_add_css($include_style, $options);
				$variables['styles'] = drupal_get_css();
				
				drupal_add_js(path_to_theme() .'/js/custom.js');
				drupal_add_js(path_to_theme() .'/js/slick.js');
				drupal_add_js(path_to_theme() .'/js/waypoints.min.js');
				
			}					
		}
		$variables['add_bread_crump_button']=true;
	}
} 


?>