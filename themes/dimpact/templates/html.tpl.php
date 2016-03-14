<!DOCTYPE html>
<html<?php print $html_attributes; ?> class="no-js">
  <head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <script src="/<?php print $path; ?>/js/modernizr.js"></script>
    <?php print $styles; ?>
    <?php if(function_exists('_dimpact_custom_css_get_regular_css_files')): ?>
      <?php _dimpact_custom_css_get_regular_css_files(); ?>
    <?php endif; ?>
    <?php print $scripts; ?>

    <?php if (variable_get('bespoke_readspeaker_status') == 1): ?>
    <script type="text/javascript" src="/sites/all/themes/subtheme/dimpact/readspeaker/ReadSpeaker.js?pids=embhl"></script>
    <?php endif; ?>

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="/<?php print $path; ?>/css/lte-ie9.css" media="all">
    <![endif]-->
    <!--[if lt IE 9]>
      <link rel="stylesheet" href="/<?php print $path; ?>/css/lt-ie9.css" media="all">
      <script src="/<?php print $path; ?>/js/libraries/html5shiv/src/html5shiv.js"></script>
      <script src="/<?php print $path; ?>/js/libraries/respond.min.js"></script>
    <![endif]-->
    <?php if(function_exists('_dimpact_custom_css_get_ie_specific_files')): ?>
      <?php _dimpact_custom_css_get_ie_specific_files(); ?>
    <?php endif; ?>
  </head>
  <body<?php print $body_attributes;?>>
    <a href="#main-content" class="visuallyhidden focusable skip-link"><?php print t('Skip to main content'); ?></a>
    <div class="overlay-alpha-container"></div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>
