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
	
<?php if (isset($node->field_hero_node['und'][0]["entity"]->nid)): ?>
<section id="reference-node">
<?php
		
		// ob_start();
		//var_dump( $node->field_hero_node['und'][0]["entity"]->nid);
		//$dumpy = ob_get_clean();
		//watchdog ('dlink','field_datasheet2'.$dumpy);
		
		
?>

<?php
$node = node_load($node->field_hero_node['und'][0]["entity"]->nid);
$view = node_view($node, 'full');
$rendered = drupal_render($view);
echo ($rendered);

?>
</section>
<?php endif; ?>

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
  ?>

	<section class="section section--complete section--active">
		<div class="container">
			<div class="grid">
				<div class="HomeSlider  col-sm-8 col-lg-8 col-md-8 col-xs-12">
					<div class="module">
						<div class="product-gallery">
							<div id="slick-pager">
								<div class="slick-pager">
								<?php if (isset ($content["uc_product_image"])):?>
								<?php $i=1; ?>
								<?php foreach ($content["uc_product_image"]["#object"]->uc_product_image["und"] as $key => $value): ?>
									<div class="slick-pager-wrapper">
										<a data-slide-index="<?php echo $i; ?>" href="javascript:void(0)">                        
											<img class="product-gallery__image zoom zoom--mobile"  src="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>" width="120" height="85">
										</a>										
									</div>
									<?php $i++; ?>
								<?php endforeach ?>
								<?php endif; ?>
								</div>
							</div>
									
							<ul class="featuredPostSlider">
								<?php if (isset ($content["uc_product_image"])):?>
								<?php $i=1; ?>
								<?php foreach ($content["uc_product_image"]["#object"]->uc_product_image["und"] as $key => $value): ?>
								<li>
									<h2>Slide <?php echo $i; ?></h2>
									<a data-toggle="modal" href="#myModal<?php echo $i; ?>">
									<img alt="" src="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>">
									</a>
									
								</li>								
									<?php $i++; ?>
								<?php endforeach ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>                
				</div>
				

				<div class="col-sm-4 col-lg-4 col-md-4 col-xs-12">
					<div class="module product-details" itemscope="" itemtype="http://schema.org/Product">
					<h1 class="heading heading--secondary" itemprop="name"><strong><?php echo ($node->title); ?></strong></h1>
					<h1 class="heading heading--secondary" itemprop="sku"><?php echo ($content["model"]["#model"]); ?></h1>
					<ul class="product-details__status">
					<li class="product-details__status-item">
					
					Product Status (Revision A): 
					<?php if (isset ($node->field_product_status["und"][0]["value"]) and $node->field_product_status["und"][0]["value"] == "Live"):?>
					<span class="product-details__status-label product-details__status-label--success"><?php echo ($node->field_product_status["und"][0]["value"]); ?></span>

					
					<div class="tooltip">
						<span class="tooltiptext"><?php echo(t('Live: The product is actively being manufactured and sold.')); ?></span>
					</div> 


					
					<!--<button class="tooltip tipso_style" data-tooltip-title="Live" data-tooltip-content="The product is actively being manufactured and sold."><?php echo ($node->field_product_status["und"][0]["value"]); ?></button>-->
					<?php else : ?>
					<span class="product-details__status-label"><?php echo ($node->field_product_status["und"][0]["value"]); ?></span>					
					<?php endif; ?>

					</li>
					</ul>
					<div class="rte" itemprop="description">
						<?php echo ($node->field_summary["und"][0]["value"]);?>
					<br>
					<p>
					<?php
						$target = $node->field_support["und"][0]["value"];
						$support =entity_load('field_collection_item',array($target));
					?>
					<a target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($support[$target]->field_datasheet["und"][0]["uri"]));?>" title="<?php echo(t('Download the datasheet.')); ?>">
					<?php echo(t('Download the datasheet.')); ?>
					</a>
					</p>
					<!--
					<a class="button button--cta" data-icon-after="button-arrow" data-icon-before="pin" href="/uk/en/for-home/where-to-buy" onclick="dataLayer.push({'event':'GAevent', 'eventCategory':'Where_to_buy', 'eventAction':'AC2200 Tri-Band Whole Home Mesh Wi-Fi System'});">List Retailers
					</a>
					-->
					</div>
					</div>				
				</div>				
			</div>
		</div>
	</section>

								
	<section>
								<?php if (isset ($content["uc_product_image"])):?>
								<?php $i=1; ?>
								<ul class="modal_layout">
								<?php foreach ($content["uc_product_image"]["#object"]->uc_product_image["und"] as $key => $value): ?>
								<li>
								<!-- Modal -->
								<div id="myModal<?php echo $i; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog">              
									<div class="modal-content">
						
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>                  
										</div>
						
										<div class="modal-body">
										<img alt="" src="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>">
										</div>
									</div>
									</div>
								</div>  

		  
								</li>								
									<?php $i++; ?>
								<?php endforeach ?>
								</ul>
								<?php endif; ?>


	
	</section>
	<section class="section section--complete section--active" id="Product-Technical-Specifications-Section">
		<div class="container">
			<div class="section-title">
				<h2 class="heading heading--secondary"><?php echo(t('Specs')); ?></h2>
				<div class="grid">
					<div class="grid__col grid__col--12 grid__col--lg-9">
						<p class="section-title__subtitle"></p>
						<p class="section-title__subtitle">
        					<a target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($support[$target]->field_datasheet["und"][0]["uri"]));?>" title="<?php echo(t('Download the datasheet.')); ?>">
        					<?php echo(t('Download the datasheet.')); ?>
        					</a>
						</p>
					</div>
				</div>
			</div>
			<div class="grid">
				<div class="col-sm-12">
					<div class="module">
						<div id="comparison_details" class="table-comparison table-comparison--layout-1">
							<?php echo ($node->field_specs["und"][0]["value"]);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<section class="section section--complete section--active" id="downloads">
<div class="container">
<div class="section-title">
<h2 class="heading heading--secondary inline"><?php echo(t('Support')); ?></h2>
<ul class="section-title__sublist">
<li class="section-title__subitem">
<a class="section-title__sublink" href="https://eu.dlink.com/uk/en/-/media/warranties/eu_warranty_guide.pdf" target="_blank" data-icon-before="document" data-icon-after=""><?php echo(t('Warranty Document')); ?></a>
</li>
<li class="section-title__subitem">
<a class="section-title__sublink" href="https://services.eu.dlink.com/home/main/SSPLogin.aspx?language=E" target="_blank" data-icon-before="comments"><?php echo(t('Open support case')); ?></a>
</li>
</ul>
</div>


<div class="grid">
<div class="col-sm-12">
<div class="module module--no-spacing-top module--no-spacing-bottom">
<div id="supportDetail" data-support-detail="/html/ajax-support-revisions.html">
 <div class="accordion">

<?php if (isset ($support[$target]->field_datasheet["und"])):?>

<button class="button button--tertiary button--block button--before-circle accordion__button" data-toggle="collapse" data-id="datasheets" data-icon-after="" data-icon-before="button-arrow" data-target="#datasheets">
<?php echo(t('Datasheets')); ?>
</button>
<div class="accordion__content collapse" id="datasheets">
<div class="table table--alternate">
	<table class="table__element">
		<thead class="table__head">
			<tr class="table__row">
				<th class="table__header"><?php echo(t('Version')); ?></th>
				<th class="table__header"><?php echo(t('Date')); ?></th>
				<th class="table__header"><?php echo(t('Type')); ?></th>
				<th class="table__header"><?php echo(t('File Size')); ?></th>
				<th class="table__header"></th>
			</tr>
		</thead>
		<tbody class="table__body">
		<?php foreach ($support[$target]->field_datasheet["und"] as $key => $value): ?>
			<tr class="table__row">
				<td class="table__cell" data-table-header="Version">Datasheet EN</td>
				<td class="table__cell" data-table-header="Date">-</td>
			<?php 
				$filename = explode(".", $value["filename"]); 

				if (count ($filename)>0){
					$filename = end($filename);
				}
				$filesize = $value["filesize"];
				$filesize = bcdiv($filesize , 1024*1024, 2);
			
			?>
				<td class="table__cell" data-table-header="Type"><?php echo(strtoupper($filename)) ;?></td>
				<td class="table__cell" data-table-header="File Size"><?php echo ($filesize); ?>mb</td>
				<td class="table__cell" data-table-header="">
					<a class="button button button--simple" target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>" data-icon-after="" data-icon-before=""><?php echo(t('Download')); ?></a>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>
</div>
<?php endif; ?>
<?php if (isset ($support[$target]->field_manual["und"])):?>
<button class="button button--tertiary button--block button--before-circle accordion__button" data-toggle="collapse" data-id="manuals" data-icon-after="" data-icon-before="button-arrow" data-target="#manuals">
<?php echo(t('Manuals')); ?>
</button>
<div class="accordion__content collapse" id="manuals">
<div class="table table--alternate">
	<table class="table__element">
		<thead class="table__head">
			<tr class="table__row">
			    <th class="table__header"><?php echo(t('Version')); ?></th>
				<th class="table__header"><?php echo(t('Description')); ?></th>
				<th class="table__header"><?php echo(t('Date')); ?></th>
				<th class="table__header"><?php echo(t('Type')); ?></th>
				<th class="table__header"><?php echo(t('File Size')); ?></th>
				<th class="table__header"></th>
			</tr>
		</thead>
		<tbody class="table__body">
		<?php foreach ($support[$target]->field_manual["und"] as $key => $value): ?>
			<tr class="table__row">
				<td class="table__cell" data-table-header="Version">-</td>
				<td class="table__cell" data-table-header="Description"><?php echo(t('Product Manual')); ?></td>
				<td class="table__cell" data-table-header="Date">-</td>
			<?php 
				$filename = explode(".", $value["filename"]); 
				if (count ($filename)>0){
					$filename = end($filename);
				}
				$filesize = $value["filesize"];
				$filesize = bcdiv($filesize , 1024*1024, 2);



			
								
			?>				
				<td class="table__cell" data-table-header="Type"><?php echo(strtoupper($filename)) ;?></td>
				<td class="table__cell" data-table-header="File Size"><?php echo ($filesize); ?>mb</td>
				<td class="table__cell" data-table-header="">
					<a class="button button button--simple" target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>" data-icon-after="" data-icon-before=""><?php echo(t('Download')); ?></a>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>
</div>
<?php endif; ?>
<?php if (isset ($support[$target]->field_quick_installation_guide["und"])):?>
<button class="button button--tertiary button--block button--before-circle accordion__button" data-toggle="collapse" data-id="quick-installation-guides" data-icon-after="" data-icon-before="button-arrow" data-target="#quick-installation-guides">
<?php echo(t('Quick Installation Guides')); ?>
</button>
<div class="accordion__content collapse" id="quick-installation-guides">
<div class="table table--alternate">
<table class="table__element">
<thead class="table__head">
<tr class="table__row">
<th class="table__header"><?php echo(t('Version')); ?></th>
<th class="table__header"><?php echo(t('Description')); ?></th>
<th class="table__header"><?php echo(t('Date')); ?></th>
<th class="table__header"><?php echo(t('Type')); ?></th>
<th class="table__header"><?php echo(t('File Size')); ?></th>
<th class="table__header"></th>
</tr>
</thead>
<tbody class="table__body">
<?php foreach ($support[$target]->field_quick_installation_guide["und"] as $key => $value): ?>
<tr class="table__row">
<td class="table__cell" data-table-header="Version">-</td>
<td class="table__cell" data-table-header="Description"><?php echo(t('Quick installation guide')); ?></td>
<td class="table__cell" data-table-header="Date">-</td>
			<?php 
				$filename = explode(".", $value["filename"]); 
				if (count ($filename)>0){
					$filename = end($filename);
				}
				$filesize = $value["filesize"];
				$filesize = bcdiv($filesize , 1024*1024, 2);
			?>
<td class="table__cell" data-table-header="Type"><?php echo(strtoupper($filename)) ;?></td>
<td class="table__cell" data-table-header="File Size"><?php echo ($filesize); ?>mb</td>
<td class="table__cell" data-table-header="">
<a class="button button button--simple" target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>"  data-icon-after="" data-icon-before=""><?php echo(t('Download')); ?></a>
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
<?php endif; ?>











<?php if (isset ($support[$target]->field_firmware["und"])):?>
<button class="button button--tertiary button--block button--before-circle accordion__button" data-toggle="collapse" data-id="firmware" data-icon-after="" data-icon-before="button-arrow" data-target="#firmware">
<?php echo(t('Firmware')); ?>
</button>
<div class="accordion__content collapse" id="firmware">
<div class="rte" style="font-size:13px">
This D-Link product includes software code developed by third parties, including software code subject to the GNU General Public License (“GPL”) or GNU Lesser General Public License (“LGPL”). As applicable, the terms of the GPL and LGPL, and information on obtaining access to the GPL code and LGPL code used in this product, are available to you at:<br>
&nbsp;<br>
<a href="http://tsd.dlink.com.tw/GPL.asp" target="_blank">http://tsd.dlink.com.tw/GPL.asp</a><br>
&nbsp;<br>
The GPL code and LGPL code used in this product is distributed WITHOUT ANY WARRANTY and is subject to the copyrights of one or more authors. For details, see the GPL code and the LGPL code for this product and the terms of the GPL and LGPL.
</div>
<div class="table table--alternate">
<table class="table__element">
<thead class="table__head">
<tr class="table__row">
    <th class="table__header"><?php echo(t('Version')); ?></th>
    <th class="table__header"><?php echo(t('Description')); ?></th>
    <th class="table__header"><?php echo(t('Date')); ?></th>
<th class="table__header"></th>
</tr>
</thead>
<tbody class="table__body">
<?php if (isset($support[$target]->field_manual["und"])): ?>
<?php foreach ($support[$target]->field_manual["und"] as $key => $value): ?>
<tr class="table__row">
<td class="table__cell" data-table-header="Version">-</td>
<td class="table__cell" data-table-header="Description">Manual</td>
<td class="table__cell" data-table-header="Date">-</td>
<td class="table__cell" data-table-header="">
<a class="button button button--simple" target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>"  data-icon-after="" data-icon-before=""><?php echo(t('Download')); ?></a>
</td>
</tr>
<?php endforeach ?>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
<?php endif; ?>





<?php if (isset ($support[$target]->field_additional_download["und"])):?>
<button class="button button--tertiary button--block button--before-circle accordion__button" data-toggle="collapse" data-id="additional-downloads" data-icon-after="" data-icon-before="button-arrow" data-target="#additional-downloads">
<?php echo(t('Additional Downloads')); ?>
</button>
<div class="accordion__content collapse" id="additional-downloads">
<div class="table table--alternate">
<table class="table__element">
<thead class="table__head">
<tr class="table__row">
    <th class="table__header"><?php echo(t('Version')); ?></th>
    <th class="table__header"><?php echo(t('Description')); ?></th>
    <th class="table__header"><?php echo(t('Date')); ?></th>
<th class="table__header"></th>
</tr>
</thead>
<tbody class="table__body">
<?php foreach ($support[$target]->field_additional_download["und"] as $key => $value): ?>
<tr class="table__row">
<td class="table__cell" data-table-header="Version">-</td>
<td class="table__cell" data-table-header="Description"><?php echo(t('Additional downloads')); ?></td>
<td class="table__cell" data-table-header="Date">-</td>
<td class="table__cell" data-table-header="">
<a class="button button button--simple" target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>"  data-icon-after="" data-icon-before=""><?php echo(t('Download')); ?></a>
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
<?php endif; ?>






<?php if (isset ($support[$target]->field_software["und"])):?>
<button class="button button--tertiary button--block button--before-circle accordion__button" data-toggle="collapse" data-id="software" data-icon-after="" data-icon-before="button-arrow" data-target="#software">
<?php echo(t('Software')); ?>
</button>
<div class="accordion__content collapse" id="software">
<div class="rte" style="font-size:13px">
This D-Link product includes software code developed by third parties, including software code subject to the GNU General Public License (“GPL”) or GNU Lesser General Public License (“LGPL”). As applicable, the terms of the GPL and LGPL, and information on obtaining access to the GPL code and LGPL code used in this product, are available to you at:<br>
&nbsp;<br>
<a href="http://tsd.dlink.com.tw/GPL.asp" target="_blank">http://tsd.dlink.com.tw/GPL.asp</a><br>
&nbsp;<br>
The GPL code and LGPL code used in this product is distributed WITHOUT ANY WARRANTY and is subject to the copyrights of one or more authors. For details, see the GPL code and the LGPL code for this product and the terms of the GPL and LGPL.
</div>
<div class="table table--alternate">
<table class="table__element">
<thead class="table__head">
<tr class="table__row">
    <th class="table__header"><?php echo(t('Version')); ?></th>
    <th class="table__header"><?php echo(t('Description')); ?></th>
    <th class="table__header"><?php echo(t('Date')); ?></th>
<th class="table__header"></th>
</tr>
</thead>
<tbody class="table__body">
<?php foreach ($support[$target]->field_software["und"] as $key => $value): ?>
<tr class="table__row">
<td class="table__cell" data-table-header="Version">-</td>
<td class="table__cell" data-table-header="Description"><?php echo(t('Software')); ?></td>
<td class="table__cell" data-table-header="Date">-</td>
<td class="table__cell" data-table-header="">
<a class="button button button--simple" target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>"  data-icon-after="" data-icon-before=""><?php echo(t('Download')); ?></a>
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
<?php endif; ?>


<?php if (isset ($support[$target]->field_driver["und"])):?>
<button class="button button--tertiary button--block button--before-circle accordion__button" data-id="dirver" data-icon-after="" data-icon-before="button-arrow" data-target="#driver">
Driver
</button>
<div class="accordion__content collapse" id="driver">
<div class="rte" style="font-size:13px">
This D-Link product includes software code developed by third parties, including software code subject to the GNU General Public License (“GPL”) or GNU Lesser General Public License (“LGPL”). As applicable, the terms of the GPL and LGPL, and information on obtaining access to the GPL code and LGPL code used in this product, are available to you at:<br>
&nbsp;<br>
<a href="http://tsd.dlink.com.tw/GPL.asp" target="_blank">http://tsd.dlink.com.tw/GPL.asp</a><br>
&nbsp;<br>
The GPL code and LGPL code used in this product is distributed WITHOUT ANY WARRANTY and is subject to the copyrights of one or more authors. For details, see the GPL code and the LGPL code for this product and the terms of the GPL and LGPL.
</div>
<div class="table table--alternate">
<table class="table__element">
<thead class="table__head">
<tr class="table__row">
    <th class="table__header"><?php echo(t('Version')); ?></th>
    <th class="table__header"><?php echo(t('Description')); ?></th>
    <th class="table__header"><?php echo(t('Date')); ?></th>
<th class="table__header"></th>
</tr>
</thead>
<tbody class="table__body">
<?php foreach ($support[$target]->field_driver["und"] as $key => $value): ?>
<tr class="table__row">
<td class="table__cell" data-table-header="Version">-</td>
<td class="table__cell" data-table-header="Description">Driver</td>
<td class="table__cell" data-table-header="Date">-</td>
<td class="table__cell" data-table-header="">
<a class="button button button--simple" target="_blank" href="<?php echo ('/sites/default/files/'.file_uri_target($value["uri"]));?>"  data-icon-after="" data-icon-before=""><?php echo(t('Download')); ?></a>
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
<?php endif; ?>


</div>
</div>
</div>
</div>
</div>
</div>
</section>	
  <?php		
    /*print render($content);*/
	
  ?>

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
