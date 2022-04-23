<?php

/**
 * @file
 * Stub file for bootstrap_breadcrumb().
 */

/**
 * Returns HTML for a breadcrumb trail.
 *
 * @param array $variables
 *   An associative array containing:
 *   - breadcrumb: An array containing the breadcrumb links.
 *
 * @return string
 *   The constructed HTML.
 *
 * @see theme_breadcrumb()
 *
 * @ingroup theme_functions
 */
function dlink_breadcrumb(array $variables) {
		
	//Baher: removing the home text link
	if (isset ($variables['breadcrumb'][0]) and $variables['breadcrumb'][0]== '<a href="/">Home</a>'){
		$variables['breadcrumb'][0] = '<a href="/"> </a>';
	}
	//ob_start();
	if (isset ($variables['breadcrumb'])){
		foreach ($variables['breadcrumb'] as $key => $value){
			if (is_string($value)){
				preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $value, $matches);
				preg_match('/\/for-home\//', $value, $matches2);
				if (count($matches2)>0) {
					//$arr_alphabet = array('a', 'b', 'd');
					array_splice($variables['breadcrumb'], 1, 0, t('For Home'));
					// $arr_alphabet is now: array('a', 'b', 'c', 'd');
					// var_dump($matches2);
				}
				else{
					preg_match('/\/for-business\//', $value, $matches2);
					if (count($matches2)>0) {
						array_splice($variables['breadcrumb'], 1, 0, t('For Business'));
					}
				}
			}
		}
	}
	//$dumpy = ob_get_clean();	
	//watchdog('dlink', 'dlink_breadcrumb3:'.$dumpy);								
  // Use the Path Breadcrumbs theme function if it should be used instead.
  if (_bootstrap_use_path_breadcrumbs()) {
    return path_breadcrumbs_breadcrumb($variables);
  }

  $output = '';
  $breadcrumb = $variables['breadcrumb'];

  // Determine if we are to display the breadcrumb.
  $bootstrap_breadcrumb = bootstrap_setting('breadcrumb');
  if (($bootstrap_breadcrumb == 1 || ($bootstrap_breadcrumb == 2 && arg(0) == 'admin')) && !empty($breadcrumb)) {
    $build = array(
      '#theme' => 'item_list__breadcrumb',
      '#attributes' => array(
        'class' => array('breadcrumb'),
      ),
      '#items' => $breadcrumb,
      '#type' => 'ol',
    );
    $output = drupal_render($build);
  }
  return $output;
}
