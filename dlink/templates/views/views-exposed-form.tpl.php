<?php

/**
 * @file
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $sort_by: The select box to sort the view using an exposed form.
 * - $sort_order: The select box with the ASC, DESC options to define order. May be optional.
 * - $items_per_page: The select box with the available items per page. May be optional.
 * - $offset: A textfield to define the offset of the view. May be optional.
 * - $reset_button: A button to reset the exposed filter applied. May be optional.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>

<?php endif; ?>
<?php
//$node = node_load(221);
//$view = node_view($node, 'full');
//$rendered = drupal_render($view);
//echo ($rendered);

?>
<div class="views-exposed-form">
	<div id="manage_filter_form_collapsible" class="views-exposed-widgets clearfix">
		<div class="views-exposed-widget filter-by">
	                <span><?php echo(t('Filter by')); ?></span>
                </div>
			
		<div class="views-exposed-widget views-reset-button">
			<button type="button" id="edit-reset-trigger"  class="btn btn-default form-submit"><?php echo(t('Reset')); ?></button>
		</div>
		
		<?php if (isset($widgets['filter-field_categories_tid']) or isset($widgets['filter-field_categories_b_tid'])): ?>
			<div class="views-exposed-widget views-close-filter-button">
				<button type="button" id="close_btn" class="btn btn-default form-submit" data-toggle="collapse" data-target="#filter_form_collapsible">
					<?php echo(t('Filters On/Off')); ?>
				</button>
			</div>

<ul class="compare-bar__list">
	<li class="compare-bar__list-item">
		<a class="compare-bar__grid-link <?php print  $is_grid_active ;?>" href="<?php print $grid_link ;?>">
			<span aria-hidden="true">Grid View</span>
		</a>
	</li>
	<li class="compare-bar__list-item compare-bar__list-item--no-margin">
		<a class="compare-bar__list-link <?php print  $is_list_active ;?>" href="<?php print $list_link ;?>">
			<span aria-hidden="true">List View</span>
		</a>
	</li>
</ul>

		<?php endif; ?>
	</div>
	<div id="filter_form_collapsible" class="views-exposed-widgets clearfix collapse in">
			<?php foreach ($widgets as $id => $widget): ?>
			<div id="<?php print $widget->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
				<?php if (!empty($widget->label)): ?>
				<label for="<?php print $widget->id; ?>">            
					<?php print $widget->label; ?>			
				</label>
				<?php endif; ?>
				<?php if (!empty($widget->operator)): ?>
				<div class="views-operator">
					<?php print $widget->operator; ?>
				</div>
				<?php endif; ?>
				<div class="views-widget">
				<span role="checkbox" aria-checked="False"></span>
				<?php print $widget->widget; ?>
				</div>
				<?php if (!empty($widget->description)): ?>
				<div class="description">
					<?php print $widget->description; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		<?php if (!empty($sort_by)): ?>
		<div class="views-exposed-widget views-widget-sort-by">
			<?php print $sort_by; ?>
		</div>
		<div class="views-exposed-widget views-widget-sort-order">
			<?php print $sort_order; ?>
		</div>
		<?php endif; ?>
		<?php if (!empty($items_per_page)): ?>
		<div class="views-exposed-widget views-widget-per-page">
			<?php print $items_per_page; ?>
		</div>
		<?php endif; ?>
		<?php if (!empty($offset)): ?>
		<div class="views-exposed-widget views-widget-offset">
			<?php print $offset; ?>
		</div>
		<?php endif; ?>
		<div class="views-exposed-widget views-submit-button">
		<?php print $button; ?>
		</div>
		<?php if (!empty($reset_button)): ?>
		<div class="views-exposed-widget views-reset-button">
			<?php print $reset_button; ?>
		</div>
		<?php endif; ?>
	</div>
</div>

