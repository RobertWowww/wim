api = 2
core = 7.x
projects[drupal][type] = core
projects[drupal][patch][htaccess_iecompat] = patches/htaccess_iecompat.patch

; Modules
projects[admin_menu][subdir] = contrib
projects[backup_migrate][subdir] = contrib
projects[block_class][subdir] = contrib
projects[context][subdir] = contrib
projects[context_entity_field][subdir] = contrib
projects[ctools][subdir] = contrib
projects[cs_adaptive_image][subdir] = contrib
projects[date][subdir] = contrib
projects[date][patch][1832544-2][url] = http://drupal.org/files/migrate_class_registration-1832544-2.patch
projects[date][patch][1832544-2][md5] = 0ba3ea17a06554841a6ba83cf432ba9b
projects[devel][subdir] = contrib
projects[diff][subdir] = contrib
projects[email][subdir] = contrib
projects[empty_page][subdir] = contrib
projects[entity][subdir] = contrib
projects[features][subdir] = contrib
projects[features_extra][subdir] = contrib
projects[felix][subdir] = contrib
projects[felix][revision] = dd1fa97
projects[fences][subdir] = contrib
projects[file_entity][subdir] = contrib
projects[file_entity][revision] = 22b86e8
projects[hansel][subdir] = contrib
projects[hansel][revision] = 0715082
projects[jquery_update][subdir] = contrib
projects[jquery_update][revision] = baff5d1
projects[l10n_update][subdir] = contrib
projects[libraries][subdir] = contrib
projects[link][subdir] = contrib
projects[linkit][subdir] = contrib
projects[media][subdir] = contrib
projects[media][revision] = 4a18a67
projects[media_youtube][subdir] = contrib
projects[media_youtube][revision] = 8afda26
projects[media_vimeo][subdir] = contrib
projects[memcache][subdir] = contrib
projects[menu_attributes][subdir] = contrib
projects[menu_block][subdir] = contrib
projects[nodequeue][subdir] = contrib
projects[nodequeue][revision] = 70c0602
projects[nodequeue][patch][1154948][url] = http://drupal.org/files/taxonomy-sync-queue-1154948-15.patch
projects[nodequeue][patch][1154948][md5] = 2eae7ee249c90238cb0e8bfb6a98293b
projects[pathauto][subdir] = contrib
projects[purge][subdir] = contrib
projects[scheduler][subdir] = contrib
projects[strongarm][subdir] = contrib
projects[submenutree][subdir] = contrib
projects[token][subdir] = contrib
projects[token][revision] = c5b20e0
projects[transliteration][subdir] = contrib
projects[views][subdir] = contrib
projects[views_rss][subdir] = contrib
projects[webform][subdir] = contrib
projects[wysiwyg][subdir] = contrib

; Themes
projects[] = rijkshuisstijl

; Libraries
libraries[starterskit][type] = "libraries"
libraries[starterskit][download][type] = "file"
libraries[starterskit][download][url] = "https://github.com/studiodumbar/starterskit-pb/zipball/1.2.3"

; CKEditor 3.6.2
libraries[ckeditor][download][type] = get
libraries[ckeditor][download][url] = http://download.cksource.com/CKEditor/CKEditor/CKEditor%203.6.3/ckeditor_3.6.3.tar.gz