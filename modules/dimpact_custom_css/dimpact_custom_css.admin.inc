<?php

/**
 * Custom settings form.
 * @param $form
 * @param $form_state
 * @return mixed
 */
function dimpact_custom_css_upload($form, &$form_state) {

  $form['description'] = array(
    '#type' => 'markup',
    '#markup' => t('Font uploading has moved to !link.', array('!link' => l(t('this location'), 'file/add'))),
    '#prefix' => '<div><strong>',
    '#suffix' => '</strong></div><br>',
  );

  $form['css_killswitch'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable custom CSS files to override the main theme'),
    '#default_value' => domain_conf_variable_get(_dimpact_custom_css_domainid(), 'css_killswitch')
  );

  $form['font_killswitch'] = array(
    '#type' => 'checkbox',
    '#title' => t('Dissable Google Fonts'),
    '#default_value' => domain_conf_variable_get(_dimpact_custom_css_domainid(), 'font_killswitch')
  );

  foreach (dimpact_custom_css_files() as $key => $title) {
    _dimpact_custom_css_form_elements($key, $title, $form);
  }

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
  );

  return $form;
}

/**
 * Submit hook.
 */
function dimpact_custom_css_upload_submit(&$form, &$form_state) {
  global $_domain;

  foreach (dimpact_custom_css_files() as $key => $title) {
    _dimpact_custom_css_handle_upload($key);
  }
  domain_conf_variable_set(_dimpact_custom_css_domainid(),'css_killswitch',$form_state['values']['css_killswitch']);
  domain_conf_variable_set(_dimpact_custom_css_domainid(),'font_killswitch',$form_state['values']['font_killswitch']);

  // Set a cache key. This string is added to the URL to force renewal of browser and Varnish cache.
  variable_set('dimpact_custom_css_cache_key', dechex(REQUEST_TIME));
}

/**
 * Generates form elements for the file uploads.
 * @param string $source
 * @param string $title
 * @param array $form
 */
function _dimpact_custom_css_form_elements($source, $title,  &$form) {

  global $_domain;

  $form[$source] = array(
    '#name' => 'files[' . $source . ']',
    '#type'   => 'file',
    '#title'  => $title,
    '#upload_validators'  => array(
      'file_validate_extensions' => array(
        'css ttf eot woff',
      ),
    ),
  );
  if (domain_conf_variable_get(_dimpact_custom_css_domainid(), $source)) {
    $file = file_load(domain_conf_variable_get(_dimpact_custom_css_domainid(), $source));
    $form[$source . '_file'] = array(
      '#markup' => '<div>' . t('File') . ': ' . $file->filename . '</div>',
    );
  }
}

/**
 * Handles the file upload.
 * @param string $source
 */
function _dimpact_custom_css_handle_upload($source = NULL) {
  global $_domain;
  if ($source) {
    if ($file = file_save_upload($source, array('file_validate_extensions' => array('css ttf eot woff')), CUSTOM_CSS_PATH, FILE_EXISTS_REPLACE)) {
      $result = db_select('field_data_domain_file', 'fddf')
        ->fields('fddf')
        ->condition('entity_id', $file->fid, '=')
        ->execute()
        ->fetchAssoc();
      if (!$result) {
        db_insert('field_data_domain_file')
          ->fields(array(
            'entity_type' => 'file',
            'bundle' => 'document',
            'entity_id' => $file->fid,
            'revision_id' => $file->fid,
            'domain_file_domain_id' => _dimpact_custom_css_domainid(),
            'delta' => 0,
          )
        )->execute();
      }
      $file->status = 1;
      file_save($file);

      domain_conf_variable_set(_dimpact_custom_css_domainid(), $source, $file->fid);
      variable_set($source, $file->fid);
    }
  }
}
