<?php
// $Id$

/**
 * Add body classes if certain regions have content.
 */
function accellion_preprocess_html(&$variables) {
  
  $settings = variable_get('theme_accellion_settings', '') ? variable_get('theme_accellion_settings', '') : array();
  
  $variables['classes_array'] = array();

  if ($variables['is_front']) {
    $variables['classes_array'][] = 'front';
  } else {
    $variables['classes_array'][] = 'not-front';
  }
  
  if (!empty($variables['page']['banner'])) {
    $variables['classes_array'][] = 'with-banner';
  }
  
  if (!empty($variables['page']['sidebar'])) {
    $variables['classes_array'][] = 'with-sidebar';
  }
  
  if (!empty($settings['toggle_slogan'])) {
    $variables['classes_array'][] = 'with-slogan';
  }
  
  if (theme_get_setting('accellion_show_front_page_title') && $variables['is_front']) {
    $variables['classes_array'][] = 'with-front-page-title';
  }
  
  if(theme_get_setting('accellion_logo_position') == 'right') {
    $variables['classes_array'][] = 'logo-on-right';
  }
  
  $variables['classes_array'][] = 'wrapper-body';
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function accellion_preprocess_block(&$variables, $hook) {
  // Classes describing the position of the block within the region.
  if ($variables['block_id'] == 1) {
    $variables['classes_array'][] = 'first';
  }
  // The last_in_region property is set in zen_page_alter().
  if (isset($variables['block']->last_in_region)) {
    $variables['classes_array'][] = 'last';
  }
  $variables['classes_array'][] = $variables['block_zebra'];

  $variables['title_attributes_array']['class'][] = 'block-title';
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered.
 */
function accellion_preprocess_node(&$variables) {
  switch ($variables['type']) {
    case 'blog' :
      if (array_key_exists('field_blog_picture', $variables['content'])) {
        $variables['classes_array'][] = 'node-blog-has-picture';
      }
      $variables['title_classes'] = 'node-title';
      break;
  }
}

/**
 * Implementation of hook_page_alter()
 */
function accellion_page_alter(&$page) {
  //match pages and unset sidebar on matched pages
  $pages = drupal_strtolower(theme_get_setting('accellion_sidebar_visibility'));
  $path = drupal_strtolower(drupal_get_path_alias($_GET['q']));
  if (drupal_match_path($path, $pages)) {
    unset($page['sidebar']);
  }
}

/**
 * Implementation of template_preprocess_search_block_form()
 */
function accellion_preprocess_search_block_form(&$variables) {
  $variables['show_follow_links'] = theme_get_setting('accellion_show_follow_links');
}

/**
 * Implements template_preprocess_page()
 */
function accellion_preprocess_page(&$variables) {
  if (!$GLOBALS['user']->uid) {
    $user_links = array(
      'links' => array(
        'login' => array(
          'title' => t('Login'),
          'href' => 'user/login',
        ),
        'register' => array(
          'title' => t('Register'),
          'href' => 'user/register',
        ),
      ),
    );
  }
if (isset($vars['node'])) {
  $vars['theme_hook_suggestion'] = 'page__'.$vars['node']->type; // string becomes 'page__dog_page'
  }
  else {
    $user_links = array(
      'links' => array(
        'account' => array(
          'title' => t('My account'),
          'href' => 'user/' . $GLOBALS['user']->uid,
        ),
        'logout' => array(
          'title' => t('Logout'),
          'href' => 'user/logout',
        ),
      ),
    );
  }
  $variables['user_links'] = theme('links', $user_links);

global $language ;
$lang_name = $language->language ;
if ($lang_name=='fr')
drupal_add_css(path_to_theme(). '/css/international-fr.css');
if ($lang_name=='de')
drupal_add_css(path_to_theme(). '/css/international-de.css');
else
drupal_add_css(path_to_theme(). '/css/international-en.css');
$vars['styles'] = drupal_get_css(); //  use drupal_get_css() to add new css


}

function mymodule_preproces_page(&$vars) {
  if ($node = menu_get_object() && $node->type == 'page') {
    $view = node_view($node);
    $vars['page_title'] = render($view['field_page_title']);
  }
}

function accellion_preprocess_search_result(&$variables) {
  global $language;

  $result = $variables['result'];
  $variables['url'] = check_url($result['link']);
  $variables['title'] = check_plain($result['title']);
  if (isset($result['language']) && $result['language'] != $language->language && $result['language'] != LANGUAGE_NONE) {
    $variables['title_attributes_array']['xml:lang'] = $result['language'];
    $variables['content_attributes_array']['xml:lang'] = $result['language'];
  }

  $info = array();
  if (!empty($result['module'])) {
    $info['module'] = check_plain($result['module']);
  }

  if (isset($result['extra']) && is_array($result['extra'])) {
    $info = array_merge($info, $result['extra']);
  }
  // Check for existence. User search does not include snippets.
  $variables['snippet'] = isset($result['snippet']) ? $result['snippet'] : '';
  // Provide separated and grouped meta information..
  $variables['info_split'] = $info;
  $variables['info'] = implode(' - ', $info);
  $variables['theme_hook_suggestions'][] = 'search_result__' . $variables['module'];
}

function accellion_aggregator_block_item($variables) {

  // Display the external link to the item.
  return '<a href="' . check_url($variables['item']->link) . '" target="_blank">' . 

'<table class="bottom-table">
<tr>
<td><span class="month-size3">' . format_date($variables['item']->timestamp, 'custom', 'M') . '</span><br/><span class="day-size3">' . format_date($variables['item']->timestamp, 'custom', 'd') . '</span></td>
<td class="bottom-cell-text">' . check_plain($variables['item']->title) . '</td>
</tr>

</table>' .


"</a>\n";
}
