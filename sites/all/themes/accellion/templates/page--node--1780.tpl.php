<?php
// $Id$

/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 */
?>
<?php if($page['acchead']) : ?>
  <div id="acchead">
    <?php 
      // GAVIN: print drupal_render($page['acchead']); 
      include_once(dirname(__FILE__)."/menu-header.tpl.php"); 
     ?>
  </div>
<?php endif; ?>


<div id="header" style="display:none;" >
  <div class="section">
    <div id="site-logo-and-name">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>
  
      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name">
                <strong>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </strong>
              </div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>
  
          <?php if ($site_slogan): ?>
            <div id="site-slogan">
              <?php print $site_slogan; ?>
            </div>
          <?php endif; ?>
  
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>
    </div> <!-- /#site-logo-and-name -->
  
    <?php if ($page['header']) : ?>
      <?php print drupal_render($page['header']); ?>
    <?php else : ?>
      <div id="main-menu" class="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#main-menu -->
    <?php endif; ?>
    
    
  </div> <!-- /.section -->
</div> <!-- /#header -->


<?php if ($is_front): ?>
  <div id="page-wrapper-front">
<?php endif; ?>

<?php if ($page != $is_front): ?>
  <div id="page-wrapper" style="background-image:url('/sites/default/files/subpages/Secureofficetogo-Microsite-background-2.png') !important;">
<?php endif; ?>

<div id="page" style="height:650px !important">
  <?php if($page['banner']) :  $banner_id = $is_front ? 'banner' : 'banner-subhead'; ?>
    <div id="<?php echo $banner_id; ?>">
      <?php print drupal_render($page['banner']); ?>

    </div>
  <?php endif; ?>





  <div id='banner-title'>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>

<!--
<?php if ($page != $is_original): ?>
  <div id="page-wrapper">

        <h1 class="title" id="page-title" >
          <?php print $title; ?>

          <?php print $page_title; ?>
        </h1>

<?php endif; ?>

-->

      <?php endif; ?>
      <?php print render($title_suffix); ?>
  </div>

  
  <?php if($page['highlight']) : ?>
    <div id="highlight">
      <?php print drupal_render($page['highlight']); ?>
    </div>
  <?php endif; ?>
  <div id="main">
    <a id="main-content"></a>
    <?php print $messages; ?>
    <div id="content">
     <?php if (user_is_logged_in()): ?>
      <?php if ($breadcrumb): ?>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>
    
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
     <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div> <!-- /#content -->
    
    <?php if($page['sidebar']) : ?>
      <div id="sidebar">
        <?php print drupal_render($page['sidebar']); ?>
      </div>
    <?php endif; ?>
  </div> <!-- /#main -->
</div> <!-- /#page, /#page-wrapper -->

<?php if($page['footer']) : 
   $footer_style = $is_front ? 'style="height:200px;"':'';
?>
    <?php
      if (!$is_front)
      {
        // GAVIN: print drupal_render($page['socialnewsbars']);
        include_once(dirname(__FILE__)."/social-news-bars1.tpl.php");
      }
     ?>
</div>
    <?php
      // Render the sidebars to see if there's anything in them.
      $upper_triptych_first  = render($page['upper_triptych_first']);
      $upper_triptych_second = render($page['upper_triptych_second']);
      $upper_triptych_third = render($page['upper_triptych_third']);
    ?>
    <?php if ($upper_triptych_first || $upper_triptych_second || $upper_triptych_second): ?>
      <div id="upperTriptych">
        <?php print $upper_triptych_first; ?>
        <?php print $upper_triptych_second; ?>
        <?php print $upper_triptych_third; ?>
      </div><!-- /.sidebars -->
    <?php endif; ?>
    <?php
      // Render the sidebars to see if there's anything in them.
      $diptych_first  = render($page['diptych_first']);
      $diptych_second = render($page['diptych_second']);
    ?>     
    <?php if ($diptych_first || $diptych_second): ?>
      <div id="diptych">
        <?php print $diptych_first; ?>
        <?php print $diptych_second; ?>
      </div><!-- /.sidebars -->
    <?php endif; ?>
    <?php
      // Render the sidebars to see if there's anything in them.
      $lower_triptych_first  = render($page['lower_triptych_first']);
      $lower_triptych_second = render($page['lower_triptych_second']);
      $lower_triptych_third = render($page['lower_triptych_third']);
    ?>        
    <?php if ($lower_triptych_first || $lower_triptych_second || $lower_triptych_second): ?>
      <div id="lowerTriptych">
        <?php print $lower_triptych_first; ?>
        <?php print $lower_triptych_second; ?>
        <?php print $lower_triptych_third; ?>
      </div><!-- /.sidebars -->
    <?php endif; ?>

  <div id="footer" >
    <div class="section">
      <?php print drupal_render($page['footer']); ?>
    </div>
  </div>

  <div id="lower-footer">
    <div class="section">
      <?php print drupal_render($page['lower-footer']); ?>
    </div>
  </div>


<?php endif; ?>


