<?php
// $Id$

/**
 * @file
 * Default theme implementation to display a node.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

<?php print $user_picture; ?>

<?php print render($title_prefix); ?>

<?php if (!$page): ?>
<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php endif; ?>

<?php print render($title_suffix); ?>

<?php if ($display_submitted): ?>
<div class="submitted">
<?php print $submitted; ?>
</div>
<?php endif; ?>


<div class="content"<?php print $content_attributes; ?>>


<p style="height:16px;">&nbsp;</p>

<?php print render($content['field_new_career_job_title']);?>


	<!-- ShareThis -->
    
<div style="position:relative; bottom:10px; right:3px;">

	<?php
	// Only display the wrapper div if there are links.
	$links = render($content['links']);
	if ($links):
	?>

	<div class="link-wrapper">
	<?php print $links; ?>
	</div>

	<?php endif; ?>

</div>




	<!-- ShareThis -->



<?php print render($content['field_new_career_desc']);?>
<?php print render($content['field_new_career_exp']);?>
<?php print render($content['field_to_apply']);?>


</div>

</div>

