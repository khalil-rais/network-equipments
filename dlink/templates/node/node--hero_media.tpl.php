<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup templates
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($display_submitted): ?>
    <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
    <?php endif; ?>
  </header>
  <?php endif; ?>
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
	
	$hero_structure = array ();
	foreach ($node->field_hero_top['und'] as $key => $value){
		$hero_structure_item = array ();
		$libelle_paragraph =entity_load('paragraphs_item',array ($value["value"]));
		$hero_structure_item ["type"] = $libelle_paragraph[$value["value"]]->bundle();
		if ($hero_structure_item ["type"]=="hero_types"){
			if (isset( $libelle_paragraph[$value["value"]]->field_intro["und"][0]["value"])){
				$hero_structure_item ["field_intro"] =    $libelle_paragraph[$value["value"]]->field_intro["und"][0]["value"] ;
				$hero_structure_item ["field_intro_color"] =  $libelle_paragraph[$value["value"]]->field_intro_color["und"][0]["rgb"] ;
				//$libelle_paragraph[$value["value"]]->field_background_color["und"][0]["rgb"];
				//$hero_structure_item ["field_intro_color"] =    "#123456" ;
				
			//ob_start();
			//var_dump ($hero_structure_item ["field_intro_color"]);
			//$dumpy = ob_get_clean();
			//watchdog('dlink', 'Node infos15:'.$dumpy);				
				
				
			}
			if (isset($libelle_paragraph[$value["value"]]->field_title["und"][0]["value"])){
				$hero_structure_item ["field_title"] =   $libelle_paragraph[$value["value"]]->field_title["und"][0]["value"] ;
				$hero_structure_item ["field_title_color"] =    $libelle_paragraph[$value["value"]]->field_title_color["und"][0]["rgb"] ;
			}
			if (isset($libelle_paragraph[$value["value"]]->field_sub_title["und"][0]["value"])){
				$hero_structure_item ["field_sub_title"] =  $libelle_paragraph[$value["value"]]->field_sub_title["und"][0]["value"];
				$hero_structure_item ["field_sub_title_color"] =    $libelle_paragraph[$value["value"]]->field_sub_title_color["und"][0]["rgb"] ;
			}
			if (isset($libelle_paragraph[$value["value"]]->field_background_image["und"][0]["uri"])){
				$hero_structure_item ["field_background_image"] = file_uri_target($libelle_paragraph[$value["value"]]->field_background_image["und"][0]["uri"]);
			}
			
		}
		elseif ($hero_structure_item ["type"]=="dual_content"){
			if (isset($libelle_paragraph[$value["value"]]->field_left_side["und"][0]["value"])){
				$hero_structure_item ["field_left_side"] =     $libelle_paragraph[$value["value"]]->field_left_side["und"][0]["value"];
			}
			if (isset($libelle_paragraph[$value["value"]]->field_right_side["und"][0]["value"])){
				$hero_structure_item ["field_right_side"] =    $libelle_paragraph[$value["value"]]->field_right_side["und"][0]["value"];
			}
			if (isset($libelle_paragraph[$value["value"]]->field_background_color["und"][0]["rgb"])){
				$hero_structure_item ["field_background_color"] = $libelle_paragraph[$value["value"]]->field_background_color["und"][0]["rgb"];
			}
		}
		elseif ($hero_structure_item ["type"]=="background_image"){
			if (isset($libelle_paragraph[$value["value"]]->field_description["und"][0]["value"])){
				$hero_structure_item ["field_description"] =  $libelle_paragraph[$value["value"]]->field_description["und"][0]["value"];
			}
			

			
			if (isset($libelle_paragraph[$value["value"]]->field_paragraph_bg_image["und"][0]["uri"])){
				$hero_structure_item ["field_paragraph_bg_image"] = file_uri_target($libelle_paragraph[$value["value"]]->field_paragraph_bg_image["und"][0]["uri"]);				
			}
			else{
				$hero_structure_item ["field_paragraph_bg_image"] = "";				
			}
			
			if (isset( $libelle_paragraph[$value["value"]]->field_background_color["und"][0]["rgb"])){
				$hero_structure_item ["field_background_color"] = $libelle_paragraph[$value["value"]]->field_background_color["und"][0]["rgb"];				
			}
			else{
				$hero_structure_item ["field_background_color"] = "transparent";				
			}			
			

			
			if ($libelle_paragraph[$value["value"]]->field_translation_effect["und"][0]["value"] or $libelle_paragraph[$value["value"]]->field_translation_effect["und"][0]["value"]=="1"){
				$hero_structure_item ["field_translation_effect"] =  'background-attachment: fixed;height: 500px;background-repeat: no-repeat;background-size: cover;';
			}
			else{
				$hero_structure_item ["field_translation_effect"] =  'height: 200%; left: 50%; top: 50%; transform: translate3d(-50%, -44.0058%, 0px);" data-bottom-top="transform:translate3d(-50%, -75%, 0);" data-top-bottom="transform:translate3d(-50%, -25%, 0);';
			}
			
			
			if (isset($libelle_paragraph[$value["value"]]->field_description["und"][0]["value"])){
				$hero_structure_item ["field_description"] = $libelle_paragraph[$value["value"]]->field_description["und"][0]["value"];
			}
			else{
				$hero_structure_item ["field_description"]= "";	
			}			
		}		
		elseif ($hero_structure_item ["type"]=="quadri_columns"){
			if (isset($libelle_paragraph[$value["value"]]->field_title["und"][0]["value"])){
				$hero_structure_item ["field_title"] = $libelle_paragraph[$value["value"]]->field_title["und"][0]["value"] ;
			}
			
			$hero_structure_item ["field_content_description"]=array();
			foreach ($libelle_paragraph[$value["value"]]->field_content_description["und"] as $key_cd => $value_cd){
				$hero_structure_item ["field_content_description"][] = $value_cd ["value"];
			}
		}
		
		$hero_structure [] = $hero_structure_item;
	}?>

	
	
	<?php foreach ($hero_structure as $key => $value): ?>
	<?php if ($value ["type"] == "hero_types"): ?>
				<div class="hero   hero--large">
					<?php if (isset($value["field_intro"]) or isset($value["field_title"]) or isset($value["field_sub_title"])): ?>
					<div class="hero__image" style="background-image: url(/replica/sites/default/files/<?php echo ($value["field_background_image"]);?>); background-position: center center;">
					</div>
					<div class="hero__container hero__container--large">
						<div class="hero__content hero__content--align-left ">
							<?php if (isset($value["field_intro"])): ?>
							<span class="heading heading--quaternary" style="color: <?php echo ($value["field_intro_color"]);?>"><?php echo ($value["field_intro"]);?></span>
							<?php  endif; ?>
							<?php if (isset($value["field_title"])): ?>
							<h1 class="heading heading--primary" style="color: <?php echo ($value["field_title_color"]);?>"><?php echo ($value["field_title"]);?></h1>
							<?php  endif; ?>
							<?php if (isset($value["field_sub_title"])): ?>
							<h3 class="sub-heading sub-heading--intro" style="color: <?php echo ($value["field_sub_title_color"]);?>" >
								<div class="richtext">
									<p><?php echo ($value["field_sub_title"]);?></p>
								</div>
							</h3>
							<?php  endif; ?>
						</div>
					</div>
					<?php else: ?>
					<div class="rte" data-text-align="center">
						<img src="/replica/sites/default/files/<?php echo ($value["field_background_image"]);?>" class="height-auto" alt="Cloud Recording security camera" width="2000" height="398">
					</div>					
					<?php  endif; ?>
				</div>
	<?php elseif ($value ["type"] == "dual_content"): ?>
				<section class="section section--dark section--no-padding" id="Range" style="background:<?php echo ($value["field_background_color"]);?>;">
					<div class="container ">
						<div class="grid">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php echo ($value["field_left_side"]);?>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php echo ($value["field_right_side"]);?>
							</div>
						</div>
					</div>
				</section>	
	<?php elseif ($value ["type"] == "background_image"): ?>
			<section class="section section--primary section--no-padding" style="background-color: <?php echo ($value["field_background_color"]);?>">
				<div class="container container--narrow ">
					<div class="grid">
						<div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
							<?php echo ($value["field_description"]);?>
						</div>
					</div>
				</div>			
				<?php if ($value["field_paragraph_bg_image"] != ""): ?>
				<div class="banner">
					<div class="banner__background-image-container">
						<div class="banner__background-image skrollable skrollable-between" style="background-image: url(/replica/sites/default/files/<?php echo ($value["field_paragraph_bg_image"]);?>); background-position: center top; <?php echo ($value["field_translation_effect"]);?> ">
						
						</div>
					</div>
				</div>
				<?php  endif; ?>
			</section>
	<?php elseif ($value ["type"] == "quadri_columns"): ?>
				<section class="section section--mid section--no-padding" id="Bestsellers">
				<div class="container">
					<div class="section-title section-title--align-center">
						<h2 class="heading heading--primary"><?php echo $value["field_title"];?></h2>
						<h2 class="heading heading--secondary"></h2>
					</div>
					<div class="grid grid--equal-heights">
	<?php foreach($value ["field_content_description"] as $element): ?>
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<?php echo ($element); ?>
						</div>
	<?php endforeach;?> 
					</div>
				</div>
			</section>	
	

	<?php  endif; ?>	
	<?php endforeach; ?>

	


<?php 	
	/*ob_start();
	$haha=array();
	foreach ($node->field_hero_top['und'] as $key => $value){
		$libelle_paragraph =entity_load('paragraphs_item',array ($value["value"]));
		$haha[]= $libelle_paragraph[$value["value"]]->bundle();		
	}
	var_dump ($haha);
	$dumpy = ob_get_clean();
	watchdog('dlink', 'Node infos9:'.$dumpy);*/
?>	

	
	<!--<div class="hero   hero--large">
		<div class="hero__image " style="background-image: url(-/media/main-landing/banners/dcs-2802kt-eu/dcs-2802kt-eu-wire-free-battery-powered-camera-kit-_-snow-version.jpg?mw=2000); background-position: center center;">
		</div>
		<div class="hero__overlay ">
		</div>
		<div class="hero__container hero__container--large">
			<div class="hero__content hero__content--align-left ">
				<span class="heading heading--quaternary">IP Cameras</span>
				<h1 class="heading heading--primary">Home Surveillance and Monitoring</h1>
				<h3 class="sub-heading sub-heading--intro">
					<div class="richtext">
						<p>Security that keeps you up to date with your home. Protect what matters most, from every angle.</p>
					</div>
				</h3>
			</div>
		</div>
	</div>-->
  <?php
    // Only display the wrapper div if there are tags or links.
    $field_tags = render($content['field_tags']);
    $links = render($content['links']);
    if ($field_tags || $links):
  ?>
   <footer>
     <?php print $field_tags; ?>
     <?php print $links; ?>
  </footer>
    <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>
