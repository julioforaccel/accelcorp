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

  <div class="content"<?php print $content_attributes; ?>>
    <h1 id="prPageTitle"><?php print render($content['field_page_title']);?></h1>
    <h2 id="prTitle"><?php print render($content['field_h1title']);?></h2>
    <h3 id="prSubTitle"><?php print render($content['field_subtitle_learn_more']);?></h3>

	<!-- ShareThis -->      
	<?php
	  // Only display the wrapper div if there are links.
	  $links = render($content['links']);
	  if ($links):
	?>
	  <div class="link-wrapper">
	    <?php print $links; ?>
	  </div>
	<?php endif; ?>
	<div style="height:30px;">&nbsp;</div>
	<!-- ShareThis -->

    <span class="prDateline"><strong><?php print render($content['field_release_location']);?> <?php print render($content['field_release_date']);?> </strong></span>
    <div class="prBody"><?php print render($content['body']);?></div>
    <?php print render($content['field_boiler_plate']);?>
    <?php print render($content['field_trademark_copyright']);?>
    <?php drupal_add_js('jQuery(document).ready(function () {
    	jQuery(".prBody").find("p:first").prepend(jQuery(".prDateline"));
    });', 'inline');
    ?>
  </div>

</div>
