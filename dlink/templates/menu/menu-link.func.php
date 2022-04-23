<?php

/**
 * @file
 * Stub file for bootstrap_menu_link() and suggestion(s).
 */

/**
 * Returns HTML for a menu link and submenu.
 *
 * @param array $variables
 *   An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @return string
 *   The constructed HTML.
 *
 * @see theme_menu_link()
 *
 * @ingroup theme_functions
 */
function dlink_menu_link(array $variables) {
	

	
  $element = $variables['element'];
  $sub_menu = '';

  $options = !empty($element['#localized_options']) ? $element['#localized_options'] : array();

  // Check plain title if "html" is not set, otherwise, filter for XSS attacks.
  $title = empty($options['html']) ? check_plain($element['#title']) : filter_xss_admin($element['#title']);

  // Ensure "html" is now enabled so l() doesn't double encode. This is now
  // safe to do since both check_plain() and filter_xss_admin() encode HTML
  // entities. See: https://www.drupal.org/node/2854978
  $options['html'] = TRUE;

  $href = $element['#href'];
  $attributes = !empty($element['#attributes']) ? $element['#attributes'] : array();

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
	  //Baher: add the div for hosting the upper trianlge gray menu
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul><div class="down_pointer"></div>';

      // Generate as standard dropdown.
	  //Baher: add the div for hosting the upper trianlge gray menu
	  
      $title .= ' <span class="caret"></span>';
      $attributes['class'][] = 'dropdown';
      $options['attributes']['class'][] = 'dropdown-toggle';
      $options['attributes']['data-toggle'] = 'dropdown';
    }
  }
  
	//Baher: integrating the icon into the submenu
	if (isset ($element["#localized_options"]["attributes"]["class"]) && in_array('menu_icon',$element["#localized_options"]["attributes"]["class"])){
		$title = '<img src="/sites/default/files/'.file_uri_target($options["menu_icon"]["path"]).'" class="primary-nav__icon" alt="'.$title.'" >'. '<div class="level2_title"><span>'.$title.'</span></div>';
	}
  return '<li' . drupal_attributes($attributes) . '>' . l($title, $href, $options) . $sub_menu . "</li>\n";
}
