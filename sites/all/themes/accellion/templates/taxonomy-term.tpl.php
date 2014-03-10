<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>


<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">

  <?php if (!$page): ?>
    <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>
  <?php endif; ?>



  <div class="content">

	<br />
	
    <h2>Learn more about  <?php print $term_name; ?>:</h2>

	<table class="table-taxonomy-term">

	<tr>
		
		
<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/solutions/kiteworks-for-IT">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Solutions</span>
</a>

</div>

</td>


<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/resources/whitepapers">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;White Papers</span>
</a>

</div>

</td>


<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/resources/datasheets">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Datasheets</span>
</a>

</div>

</td>

</tr>


<tr>


<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_web');
print render($block['content']);
?>

</div>

</td>



<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_wp');
print render($block['content']);
?>

</div>

</td>



<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_ds');
print render($block['content']);
?>

</div>

</td>




</tr>



<tr>


<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/resources/case-studies">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Case Studies</span>
</a>

</div>

</td>


<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/resources/webinars">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Webinars</span>
</a>

</div>

</td>


<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/resources/videos">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Videos</span>
</a>

</div>

</td>





</tr>

<tr>




<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_cs');
print render($block['content']);
?>

</div>

</td>



<!-- webinars block -->

<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_wbnr');
print render($block['content']);
?>

</div>

</td>

<!-- end webinars -->



<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_vid');
print render($block['content']);
?>

</div>

</td>








</tr>




<tr>


<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/mobile-talk-blog">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Blog Posts</span>
</a>

</div>

</td>


<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/company/press-releases">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Press Releases</span>
</a>

</div>

</td>



<td style="width:33%;">

<div class="taxtermpage-row">

<a href="/news/media-coverage">
<span class="plus-sign">+</span><span class="plus-sign-title">&nbsp;Media Coverage</span>
</a>

</div>

</td>







</tr>



<tr>


<!-- blog block -->

<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_blog');
print render($block['content']);
?>

</div>

</td>

<!-- end blog -->

	
<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_pr');
print render($block['content']);
?>

</div>

</td>



<td>

<div class="taxtermpage-row2">

<?php
$block = module_invoke('views', 'block_view', 'taxtermpage_web-taxtermpage_mc');
print render($block['content']);
?>

</div>

</td>






</tr>




	</table>



	<br />
	<br />
	<br />
	<br />


  </div>

</div>

