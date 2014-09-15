<?php

// We hide the comments and links now so that we can render them later.
hide($content['comments']);
hide($content['links']);
hide($content['field_image']);

if (!$page) {
  hide($content['field_date']);
}
hide($content['field_tabtitel']);
hide($content['field_tabcontent']);
?>
<article<?php print $attributes; ?>>
  <?php !$page ? print render($content['field_date']) : ''; ?>
  <?php if ($teaser): ?>
    <?php if ($content['field_image'][0]): ?>
      <div class="field field-image">
      <?php $path = image_style_url('list_thumbnail', $content['field_image'][0]['file']['#item']['uri']); ?>
      <?php print l('<img src="' . $path . '">', 'node/' . $node->nid, array('html' => TRUE)); ?>
      </div>
    <?php endif; ?>
  <?php else: ?>
    <?php print render($content['field_image']); ?>
  <?php endif; ?>
  <?php print render($title_prefix); ?>
  <?php if ($page): /* ?>
    <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
  <?php */ else: ?>
    <?php if ($type != 'foto_album' || !$teaser): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a></h2>
    <?php endif; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($node->type == 'marketplace'): ?>
    <div class="submitted">
      Door: <?php print theme('username', array('account' => user_load($node->uid))); ?>
    </div>
  <?php endif; ?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php if ($node->type == 'news'): ?>
      <time datetime="<?php print $timestamp; ?>">
        <span class="day-month-year"><?php print format_date($node->created, 'custom', 'd F Y'); ?></span>
      </time>
    <?php endif; ?>
    <?php print render($content); ?>
    <?php print render($tabs); ?>
  </div>
  <?php // print render($content['links']); ?>
  <?php print render($content['comments']); ?>
</article>
