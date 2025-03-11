<?php
include('version.php');

$_['jetcache_model_code'] = 'jetcache';
$_['order_jetcache'] = '10';
$_['jetcache_model_settings'] = $_['heading_title_jc'] = $_['jetcache_model'].' '.$_['jetcache_version'];
$_['heading_title_jc'] = '<strong style="color:#41637d">DEV-OPENCART.COM —</strong> <b>JetCache PRO</b> <a href="https://dev-opencart.com" target="_blank" title="Dev-opencart.com - Модули и шаблоны для Opencart"><img style="margin-left:15px;height:35px;margin-top:10px;margin-bottom:10px;" src="https://dev-opencart.com/logob.svg" alt="Dev-opencart.com - Модули и шаблоны для Opencart"/></a>';
$_['heading_title'] = '<strong style="color:#41637d">DEV-OPENCART.COM —</strong> <b>JetCache PRO</b> <a href="https://dev-opencart.com" target="_blank" title="Dev-opencart.com - Модули и шаблоны для Opencart"><img style="margin-left:15px;height:35px;margin-top:10px;margin-bottom:10px;" src="https://dev-opencart.com/logob.svg" alt="Dev-opencart.com - Модули и шаблоны для Opencart"/></a>';

if (!defined('SC_VERSION')) define('SC_VERSION', (int)substr(str_replace('.','',VERSION), 0,2));

if (SC_VERSION > 22) {
	if (file_exists(DIR_APPLICATION. 'controller/module/jetcache.php')) {
		@unlink(DIR_APPLICATION. 'controller/module/jetcache.php');
	}
}
if (SC_VERSION < 22) {
	if (file_exists(DIR_APPLICATION. 'controller/extension/module/jetcache.php')) {
		@unlink(DIR_APPLICATION. 'controller/extension/module/jetcache.php');
	}
	$files_extension_module = glob(DIR_APPLICATION. 'controller/extension/module/*.*');
	if (!$files_extension_module && is_dir(DIR_APPLICATION. 'controller/extension/module')) {
    	rmdir(DIR_APPLICATION. 'controller/extension/module');
	}
}
$_['text_enabled'] = 'Enabled';
$_['text_disabled'] = 'Disabled';
$_['text_enabled_jc_module'] = 'Enabled module';
$_['text_disabled_jc_module'] = 'Disabled module';

$_['heading_dev'] = 'Developer <a href="mailto:admin@opencartadmin.com" target= "_blank" >support.opencartadmin.com</a><br> &copy; 2011-'.date ('Y').'All Rights Reserved.';
$_['entry_tab_options'] = 'Settings';
$_['entry_id'] = 'ID';

$_['text_status'] = 'Status';
$_['text_mod_add_jetcache'] = $_['jetcache_model'].'modifier set<br>';

$_['entry_url_jetcache'] = 'Module settings page';

$_['tab_options'] = 'Settings';
$_['tab_pages'] = 'Pages';
$_['tab_cont'] = 'Controllers';
$_['tab_access'] = 'Access';
$_['tab_exceptions'] = 'Exceptions';
$_['tab_query'] = 'Queries';
$_['tab_model'] = 'Models';
$_['tab_minify'] = 'Minification';
$_['tab_minify_html'] = 'HTML';
$_['tab_minify_css'] = 'CSS';
$_['tab_minify_js'] = 'JS';
$_['tab_doc'] = 'Documentation';
$_['tab_logs'] = 'Logs';
$_['tab_main'] = 'Main';
$_['tab_clear'] = 'Clear cache';
$_['tab_lazy'] = 'Images';

$_['entry_lazy_status'] = 'Delayed loading of images <br>"Lazy Loading Images"';
$_['entry_lazy_status_help'] = 'Replacement Rules <br>
Format: <br>
"Token for replace" | "Token to which we replace" <br>
<br>delimiter "carriage transfer" (PHP_EOL),<br>between tokens | ';

$_['entry_minify_html'] = 'HTML Minification';
$_['entry_minify_html_status_help'] = 'HTML minification status';

$_['entry_minify_html_ex_route'] = 'Exceptions route';
$_['entry_minify_html_ex_route_help'] = 'Parameters <br>separated by "carriage"<br><br><span class="jc-help"># - turns off</span>';

$_['entry_lazy_ex_route'] = 'Exceptions route';
$_['entry_lazy_ex_route_help'] = 'Parameters <br>separated by "carriage" <br><br><span class="jc-help"># - turns off </span>';


$_['entry_minify_css'] = 'CSS Minification';
$_['entry_minify_css_status_help'] = 'CSS minification status';

$_['entry_minify_js'] = 'Minify JS';
$_['entry_minify_js_status_help'] = 'Minification Status JS';


$_['entry_lazy_status'] = $_['entry_lazy_status_help'] = 'Lazy Loading Images';

$_['entry_db_status'] = 'Cache to DB<br><span class="jc-help">(not recommended)</span>';
$_['entry_pages_db_status_help'] = 'Cache <br> pages in DB';
$_['entry_cont_db_status_help'] = 'Cache <br> controllers in DB';
$_['entry_model_db_status_help'] = 'Cache methods of <br> models in DB';

$_['entry_add_rule'] = 'Add';
$_['entry_ex_route'] = 'Route';
$_['entry_ex_routes'] = 'Routes Exceptions';

$_['entry_pages_status_help'] = 'Pages will be <br>cached in the file cache<br>if caching is not enabled in the database';
$_['entry_ex_routes_help'] = 'route Exceptions';

$_['entry_pages_forsage'] = 'Forcing';
$_['entry_pages_forsage_help'] = 'When you enable this feature, you will force the page to be cached as soon as possible';


$_['entry_ex_pages'] = 'URI Exceptions';
$_['entry_ex_page'] = 'URI';
$_['entry_ex_page_accord'] = 'Appropriate';
$_['entry_ex_pages_help'] = 'REQUEST_URI exceptions';

$_['entry_cont_status_help'] = 'Status controller caching';
$_['entry_add_conts_help'] = 'Controller <br>need to cache';
$_['entry_add_conts'] = 'Controllers';
$_['entry_add_cont'] = 'Controller';

$_['entry_cache_mobile_detect'] = 'Definition mobile device';
$_['entry_jetcache_info_status'] = 'Dashboard <span class="jetcache-table-help-href">?</span>';

$_['entry_jetcache_info_demo_status'] = '<br>demo mode<br>(show all)';

$_['entry_model_status_help'] = 'Enable/disable<br>method caching in models';
$_['entry_model_product_status'] = 'Model catalog/product';
$_['entry_model_gettotalproducts_status'] = 'Method getTotalProducts';
$_['entry_model_gettotalproducts_status_help'] = 'Cache method <br> - count products <br>categories';

$_['entry_seocms_jetcache_alter'] = 'Alternative method <br>to write to cache file';
$_['entry_seocms_jetcache_gzip_level'] = 'Compression data (gzip) in cache <br> (0-do not compress, <br> 0-faster, but takes <br>more disk space)';
$_['text_gettotalproducts_uri_status'] = 'URL Dependency';

$_['entry_ex_session'] = 'Excluded session parameters';
$_['entry_ex_session_help'] = '<br>split <br>translation of "carriage" <br>PHP_EOL';

$_['entry_session_log'] = 'Logging <br>the session variables <br>in the log file';
$_['entry_cache_max_hache_folders_level'] = 'Folder level in cache';
$_['entry_no_getpost'] = 'Do not respond to <br> GET and SESSION';


$_['entry_query_status_help'] = 'request caching Status <br>it makes sense to cache requests, <br> if there are slow requests greater than 0.01 c';
$_['entry_query_db_status_help'] = 'Caching of queries in DB <br>Simple query of cache from DB <br>will be faster than complex and slow';
$_['entry_query_log_settings'] = 'Configuration log request';
$_['entry_query_log_status'] = 'Status request file log';
$_['entry_query_log_maxtime'] = 'Time from which to log the query <br><span class="jc-help">(seconds, fractional through a point), <br>example: 0.1  - 0.1 seconds, this is 100 ms</span>';
$_['entry_query_log_file'] = 'File, slow query log, <br> file name in opencart file log folder';
$_['entry_query_model_title'] = 'Queries that are cached for classes and their methods';
$_['entry_query_model_help'] = 'Queries that will be cached from models and methods <br>model class, for example: ModelCatalogProduct <br>model method, for example: getTotalProducts <br>If the method field is empty, all model methods will be cached';
$_['entry_query_model'] = 'Class';
$_['entry_query_method'] = 'Method';

$_['button_buildcache'] = 'Create cache';
$_['button_buildcache_abort'] = 'Cancel';
$_['message_buildcache_aborted'] = '<span style= "color: red;">Canceled</span>';
$_['message_buildcache_complete'] = '<span style= "color: green;">Succeeded</span>';
$_['message_buildcache_processing'] = '<span style= "color: #16A9DE;">Processed</span>';
$_['message_buildcache_processing_complete'] = ' <span style="color: #16A9DE;">Executed</span>';
$_['entry_jetcache_builcache_gen'] = 'Generate cache<br><span class="jc-help">(not recommended)</span>';


$_['label_buildcache_with_products'] = 'with goods';
$_['label_buildcache_with_lang'] = 'all languages';

$_['label_buildcache_with_products_title_info'] = 'with goods';
$_['label_buildcache_with_lang_title_info'] = 'all languages';


$_['label_buildcache_with_products_data_content'] = 'Generate cache with product pages <br> If a large number of products can take a long time';
$_['label_buildcache_with_lang_data_content'] = 'Generate cache for pages in all languages. <br>If one language or you are not using language prefixes (sub-domains) for each language to note is not necessary';

$_['entry_minify_html'] = 'HTML Minification<br><span class="jc-help">(not recommended)</span>';
$_['entry_minify_html_status_help'] = 'Status HTML minification';

$_['entry_minify_css'] = 'CSS Minification';
$_['entry_minify_css_status_help'] = 'Status CSS minification';

$_['entry_minify_js'] = 'JS Minification';
$_['entry_minify_js_status_help'] = 'Status JS minification';

$_['text_jetcache_success'] = 'Successful';

$_['entry_log_file_unlink'] = 'Delete file';
$_['entry_log_file_view'] = 'View file';
$_['unlink_success'] = 'Successful';
$_['unlink_unsuccess'] = 'Failed. File not found';
$_['access_denided'] = 'Access denied';


$_['ocmod_jetcache_name'] = $_['jetcache_model'];
$_['ocmod_jetcache_name_15'] = $_['jetcache_model'].' 15';
$_['ocmod_jetcache_db_name'] = $_['jetcache_model'].' DB';

$_['ocmod_jetcache_mod'] = $_['jetcache_model_code'];
$_['ocmod_jetcache_mod_15'] = $_['jetcache_model_code'].'_15';
$_['ocmod_jetcache_db_mod'] = $_['jetcache_model_code'].'_db';

$_['ocmod_jetcache_author'] = 'support.opencartadmin.com';
$_['ocmod_jetcache_link'] = 'https://support.opencartadmin.com';
$_['jetcache_ocas'] = 'https://support.opencartadmin.com/index.php?route=record/ver';

$_['ocmod_jetcache_html'] = $_['ocmod_jetcache_name'] . ' ...modifier installed';
$_['ocmod_jetcache_db_html'] = $_['ocmod_jetcache_db_name'] . ' ...modifier installed';

$_['entry_install_update'] = 'Install/update';
$_['url_create_text'] = '<div style= "text-align: center; text-decoration: none;">Install and update<br>modifiers,<br> module data (performed when installing and updating the module)</div>';

$_['text_refresh_ocmod_successfully'] = '<span style="color: green">Modifiers updated successfully</span>';
$_['text_refresh_ocmod_success'] = 'Modifiers updated successfully';

$_['text_refresh_ocmod_error'] = '<span style="color: red;">error updating modifiers</span>';

$_['entry_model_help'] = '<br>Model classes and methods for caching';

$_['entry_model_status'] = 'Model caching';
$_['entry_model_title'] = 'Model classes and methods for caching';
$_['entry_no_vars'] = 'Do not respond to:<br> 1. GET parameters<br> 2. SESSION parameters<br> 3. URL address<br> 4. ROUTE';

$_['entry_ex_get'] = 'GET parameters Excluded';
$_['entry_ex_get_help'] = '<br>split <br>translation of "carriage" <br>PHP_EOL';

$_['entry_lastmod_status'] = 'Status of last-Modified header';
$_['entry_lastmod_help'] = 'Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T').',filemtime(кеш файла)<br>HTTP/1.1 304 Not Modified <br><br>In .htaccess add rule after<br>RewriteRule ^([^?]*) index.php?_route_=$1 [L,QSA]<br><br><span style="color: green;">RewriteRule ^(.*)$ $1 [E=HTTP_IF_MODIFIED_SINCE:%{HTTP:If-Modified-Since}]</span><br>or<br><span style="color: green;">RewriteRule .* - [E=HTTP_IF_MODIFIED_SINCE:%{HTTP:If-Modified-Since}]<br>RewriteRule .* - [E=HTTP_IF_NONE_MATCH:%{HTTP:If-None-Match}]</span>';

$_['entry_cachecontrol_status'] = 'Cache-Control header Status';
$_['entry_cachecontrol_help'] = 'Cache-Control:public, max-age=31536000';

$_['entry_expires_status'] = 'Status Expires header';
$_['entry_expires_help'] = 'Expires:'. gmdate ('D, d M Y h:i:s \G\M\T', time () + 604800);

$_['ocmod_file_agoo_catalog_product_unlink_successfully'] = 'Old version file <br>/catalog/model/agoo/catalog/product.php<br> successfully removed<br> <br>';

$_['entry_widget_status'] = " Status";
$_['entry_cache_expire'] = 'Lifetime of module <br> cache file (in seconds)';
$_['entry_cache_max_files'] = 'Maximum number of files <br> in the module cache folder';
$_['entry_cache_maxfile_length'] = 'Maximum size of <br>module file cache (in bytes)';
$_['entry_cache_auto_clear'] = 'Automatic cleaning of <br>total cache (in hours)';
$_['entry_tab_settings_cache'] = 'Cache and modifiers';
$_['entry_jetcache_ocmod_refresh'] = 'Update cache <br> <span class="sc-color-clearcache">modifiers</span>';
$_['text_url_ocmod_refresh'] = 'Update';
$_['text_ocmod_refresh_success']= 'Succeeded';
$_['text_ocmod_refresh_fail'] = 'Could not update';
$_['entry_jetcache_cache_remove'] = 'Delete cache <br> <span class="sc-color-clearcache">files</span>';
$_['text_url_cache_remove'] = 'Delete cache';
$_['text_cache_remove_success'] = 'Completed';
$_['text_cache_remove_fail'] = 'Could not remove';
$_['text_jetcache_about'] = '<odule';
$_['entry_jetcache_cache_image_remove'] = 'Delete cache <br> <span class="sc-color-clearcache">images</span>';
$_['text_url_cache_image_remove'] = 'Delete cache';
$_['text_cache_image_remove_success'] = 'Completed';
$_['text_cache_image_remove_fail'] = 'Could not remove';
$_['entry_store'] = 'Stores:';
$_['text_default_store'] = 'Main store';

$_['text_loading_main']         = '<div style=&#92;\'color: #008000;&#92;\'>Loading...<i class=&#92;\'fa fa-refresh fa-spin&#92;\'></i></div>';
$_['text_loading_main_without'] = '<div style="color: #008000">Loading...<i class="fa fa-refresh fa-spin"></i></div>';

$_['text_faq']='';
$_['text_separator']=' > ';

$_['entry_add_category'] = 'Clear cache (complete)<br>when you add, modify, remove categories';
$_['entry_add_category_help'] = 'When enabled, the setting will be made complete cache cleanup';
$_['label_add_category'] = 'Clear the cache when you add, modify, remove categories';
$_['label_add_category_content'] = 'When enabled, the setting will be made complete cache cleanup';

$_['entry_add_product'] = 'Clear cache (complete)<br>in addition, removal of the product';
$_['entry_add_product_help'] = 'When enabled, the setting will be made complete cache cleanup';
$_['label_add_product'] = 'Clear the cache when you add, delete product';
$_['label_add_product_content'] = 'When enabled, the setting will be made complete cache cleanup';

$_['entry_edit_product'] = 'Clear cache (complete)<br>if you change the product';
$_['entry_edit_product_help'] = 'When enabled, the setting will be made complete cache cleanup';
$_['label_edit_product'] = 'Clear cache when product changes';
$_['label_edit_product_content'] = 'When enabled, the setting will be made complete cache cleanup';

$_['entry_edit_product_id'] = 'Clearing the cache (bound) <br>if you change the product';
$_['label_edit_product_id'] = 'Related cleaning the cache when you change the product';


$_['entry_query_log_status_title'] = 'Status&nbsp;log&nbsp;file&nbsp;request';
$_['entry_query_log_status_content'] = 'Remember to disable after analysis of the queries<br><span style="color: red;">Attention! Status of requests (tab Requests) must be enabled</span>';

$_['entry_jetcache_menu_status'] = 'Status <i class="fa fa-dot-circle-o"></i> JC in menu';
$_['entry_jetcache_menu_order'] = 'Order of <i class="fa fa-dot-circle-o"></i> JC in the menu, after menu item number:';

$_['text_status_on'] = 'enabled';
$_['text_status_off'] = 'off';

$_['text_js_status_on'] = '<i style="font-size: 11px;" class="fa fa-dot-circle-o"></i></span> ' . 'Jet Cache <span style="margin-left: 6px; color: #eeffee;"> '.$_['text_status_on'] ;
$_['text_js_status_off'] = 'Jet Cache <span style="margin-left: 6px; color: #fccccc;"> '.$_['text_status_off'] .' </span>';

$_['text_ocmod_refresh'] = 'Update&nbsp;modifiers';

$_['text_close'] = 'Close';

$_['entry_session_log_file'] = 'File, session log,<br>file name in the opencart file log folder';

$_['entry_session_log_settings'] = 'Session log setting';
$_['entry_session_log_settings_help'] = 'When enabled, you can log <br>session variables and set them as exceptions when needed';
$_['entry_query_log_settings_help'] = 'When enabled, you can analyze <br> requests and, if necessary, enter them in the settings<br> Note the status of requests should be enabled';

$_['entry_model_original_status_help'] = 'Use the original model method of the Loader class';
$_['label_edit_product_id_content'] = "When enabled, cache of only the associated cache files with the product <br><span style='color: red;'>Attention will be cleared! A bit slower when writing to the cache. From the cache as quickly</span>";
$_['entry_edit_product_id_help'] = $_['label_edit_product_id_content'];

$_['entry_cont_log_settings'] = 'Controller Log Settings';
$_['entry_cont_log_settings_help'] = 'When enabled, you can log the speed of controller execution';
$_['entry_cont_log_status'] = 'Status log controllers';
$_['entry_cont_log_maxtime'] = 'The time from which to log the controller <br><span class = "jc-help"> (seconds, fractional through the point), <br>example: 0.1 - 0.1 seconds, this is 100 ms </span> ';
$_['entry_cont_log_file'] = 'Log file, speed for executing controllers, <br> file name in the folder opencart';
$_['entry_cont_log_settings_help'] = 'When enabled, you can analyze <br> speed of controllers execution';
$_['entry_cont_log_status_title'] = 'Status&nbsp;log&nbsp;file&nbsp;controllers';
$_['entry_cont_log_status_content'] = 'When enabled, you can analyze <br> the speed of execution of controllers, <br> to enter them into controller caching';

$_['tab_image_options'] = 'Settings';
$_['tab_image_ex'] = 'Exceptions';
$_['entry_image_status'] = 'Image Optimization Status';
$_['entry_image_ex'] = 'Exceptions';
$_['entry_image_status_help'] = 'When the status is turned on, image optimization will be performed';
$_['entry_image_ex_help'] = 'Exceptions';

$_['tab_image_options'] = 'Settings';
$_['tab_image_ex'] = 'Exceptions';
$_['entry_image_status'] = 'Image Optimization Status';
$_['entry_image_ex'] = 'Exceptions';
$_['entry_image_status_help'] = 'When the status is turned on, image optimization will be performed';
$_['entry_image_ex_help'] = 'Exceptions';

$_['entry_image_status_error_text'] = 'The system does not meet the requirements for optimization';

$_['entry_image_status_error'] = 'System Status';
$_['entry_webp'] = 'Optimizing images using the webp algorithm Google';
$_['entry_mozjpeg'] = 'Optimizing JPEG using the mozjpeg algorithm';
$_['entry_optipng'] = 'Optimizing PNG using the optipng algorithm';
$_['entry_image_status_error_must_text'] = 'System Requirements: <br> <br> <div style = "text-align: left! important;">
Linux platform (OC) <br>
Enabled php exec on server side <br>
Execution rights (0755) for webp, mozjpeg and optipng files <br>
Ability to run webp, mozjpeg and optipng
</div> ';

$_['entry_image_webp_status'] = 'Image optimization status using the webp algorithm';
$_['entry_image_webp_lossess'] = 'Lossless optimization <br> <div class = "jetcache-table-help"> -lossless switch </div>';
$_['entry_webp_must'] = 'Requirements: <br> Execution rights (0755) for webp files <br> Ability to run webp';
$_['entry_webp_text'] = 'webp';

$_['entry_image_webp_command'] = 'Options command line';
$_['entry_image_webp_relative_url'] = 'Relative URL images';


$_['entry_image_mozjpeg_status'] = 'JPEG image optimization status using the mozjpeg algorithm';
$_['entry_image_mozjpeg_optimize'] = 'Maximum optimization (slow) <br> <div class = "jetcache-table-help"> -optimize switch </div>';
$_['entry_image_mozjpeg_progressive'] = 'Progressive JPEG algorithm <br> <div class = "jetcache-table-help"> -progressive key </div>';
$_['entry_mozjpeg_must'] = 'Requirements: <br> Execution rights (0755) for mozjpeg files <br> Ability to run mozjpeg';
$_['entry_mozjpeg_text'] = 'mozjpeg';


$_['entry_image_optipng_status'] = 'PNG image optimization by optipng';
$_['entry_optipng_must'] = 'Requirements: <br> Execution rights (0755) for optipng files <br> Opportunity to run optipng';

$_['entry_optipng_optimize_level'] = 'optimization level optipng <br> <div class = "jetcache-table-help"> -oX switch, where is about - abbr. from optimization, X - compression level (1-7), where 7 - maximum, but slow, 1 - fast, but minimal </div> ';
$_['entry_optipng_text'] = 'optipng';


$_['entry_features_system'] = 'System features (test)';

$_['entry_system_linux_status'] = 'Linux platform (OS)';
$_['entry_system_exec_status'] = 'Enabled php exec function';

$_['entry_system_webp_perms'] = 'Execute webp (0755)';
$_['entry_system_webp_exec'] = 'Ability to run webp optimization';

$_['entry_system_mozjpeg_perms'] = 'Execute mozjpeg (0755)';
$_['entry_system_mozjpeg_exec'] = 'Ability to run mozjpeg optimization';
$_['entry_system_optipng_perms'] = 'Execute optipng (0755)';
$_['entry_system_optipng_exec'] = 'Opportunity to perform optimization optipng';

$_['entry_system_image_webp_original'] = 'Original image';
$_['entry_system_image_webp_lossess'] = 'Optimized image using the webp algorithm';
$_['entry_system_image_mozjpeg_original'] = 'Original JPEG image';
$_['entry_system_image_mozjpeg_optimized'] = 'Optimized JPEG image using the mozjpeg algorithm';
$_['entry_system_image_optipng_original'] = 'Original PNG image';
$_['entry_system_image_optipng_optimized'] = 'Optimized PNG image using the optipng algorithm';

$_['entry_system_yes'] = '<span class = "jetcache-green"> Meet the requirements </span>';
$_['entry_system_no'] = '<span class = "jetcache-red"> Does not match </span>';
$_['text_system_byte'] = '<span class = ""> bytes </span>';

$_['entry_header_categories_status'] = 'Caching menu categories in header';
$_['entry_header_categories_status_help'] = 'Caching standard calculation of product categories <br>for the menu in the controller header.php';

$_['entry_tab_cont_categories'] = 'Categories';
$_['entry_tab_cont_ajax'] = 'Ajax';

$_['entry_cont_ajax_status'] = 'Status ajax controller loading';
$_['entry_cont_ajax_status_help'] = 'Ajax controller loading';

$_['entry_cont_ajax_route'] = 'Route controllers ajax loading';
$_['entry_cont_ajax_route_help'] = 'Route controllers ajax loading<br>Parameters <br>separated by "carriage" translation<br><span class="jc-help"># - disables</span>';

$_['entry_cont_ajax_header'] = 'Replacing &lt;head&gt; ... &lt;/head&gt; loaded from ajax ';
$_['entry_cont_ajax_header_help'] = 'Enable only when the ajax controllers <br>have a call $this->document->...<br>';

$_['ocmod_jetcache_cat_name'] = $_['jetcache_model'].' Categories';
$_['ocmod_jetcache_cat_mod'] = $_['jetcache_model_code'].'_cat';
$_['ocmod_jetcache_cat_html'] = $_['ocmod_jetcache_cat_name'].' ...modifier installed';

$_['ocmod_jetcache_image_name'] = $_['jetcache_model'].' Image';
$_['ocmod_jetcache_image_mod'] = $_['jetcache_model_code'].'_image';
$_['ocmod_jetcache_image_html'] = $_['ocmod_jetcache_image_name'].' ...modifier installed';


$_['entry_ex_session_black_status'] = 'Session parameters (status of the "blacklist" algorithm)';
$_['entry_ex_session_black_status_help'] = 'Session parameters (status of the "blacklist" algorithm)';
$_['entry_ex_session_black'] = 'Session parameters ("blacklist")';
$_['entry_ex_session_black_help'] = 'What cache session parameters to respond to. <br>Parameters <br>separated by "carriage" <br><br><span class="jc-help"># - turns off </span>';

$_['ocmod_jetcache_menu_name'] = 'Jet Cache Menu';
$_['ocmod_jetcache_menu_mod'] = $_['jetcache_model_code'] . '_menu';
$_['ocmod_jetcache_menu_html'] = $_['ocmod_jetcache_menu_name'] . ' ...modifier installed';

$_['entry_ex_cookie'] = 'Cookie parameters ("blacklist")';
$_['entry_ex_cookie_help'] = 'What cache cookie parameters to respond to. <br>Parameters <br>separated by "carriage" <br><br><span class="jc-help"># - turns off </span>';

$_['entry_cont_ajax_delay'] = 'Ajax delay (ms)';
$_['entry_cont_ajax_delay_help'] = 'Ajax delay <br>in ms (1 s = 1000 ms)';

$_['text_cont_ajax_route'] = 'Controller Route';
$_['text_cont_ajax_status'] = 'Status';
$_['text_cont_ajax_scripts'] = 'Scripts Status';
$_['text_cont_ajax_delay'] = 'Delay';
$_['text_cont_ajax_md5'] = 'Hash (md5) of settings';
$_['text_cont_ajax_action'] = 'Action';
$_['entry_cart_interval'] = 'Interval session for cart<br>(minutes)';
$_['entry_jetcache_index_status'] = 'Start timer in index.php';


$_['entry_no_vars_cont'] = 'Do not respond to: <br> 1. GET: Respond <br> only to parameters <br>2. GET parameters <br> 3. SESSION parameters <br> 4. URL Address <br>5. ROUTE ';

$_['entry_action'] = 'Action';

$_['entry_ex_key'] = 'Clearing the entire cache via the associated parameter <br> clearing the cache opencart $ this-> cache-> delete (\'parameter\');';
$_['text_ex_key'] = 'The parameters <br> are separated by the translation of the "carriage" <br><span class="jc-help"># - turns off </span>';

$_['entry_show_pro_settings'] = 'Show PRO settings';
$_['entry_hide_pro_settings'] = 'Hide PRO settings';

$_['entry_image_webp_command'] = 'Command line options';
$_['entry_image_mozjpeg_command'] = 'Command line options';
$_['entry_image_jpegoptim_command'] = 'Command line options';
$_['entry_image_optipng_command'] = 'Command line options';

$_['entry_image_jpegoptim_status'] = 'JPEG image optimization status by jpegoptim algorithm';
$_['entry_image_jpegoptim_optimize'] = 'Forced optimization <br> <div class="jetcache-table-help"> key --force </div>';
$_['entry_image_jpegoptim_progressive'] = 'JPEG Progressive Algorithm <br> <div class="jetcache-table-help"> --all-progressive key </div>';
$_['entry_jpegoptim_must'] = 'Requirements: <br> Execute permissions (0755) for jpegoptim files <br> Ability to run jpegoptim';
$_['entry_jpegoptim_text'] = 'jpegoptim';
$_['entry_system_jpegoptim_perms'] = 'Execution Permissions jpegoptim <span class="jc-help">(0755)</span>';
$_['entry_system_jpegoptim_exec'] = 'Ability to perform jpegoptim optimization';
$_['entry_image_jpegoptim_strip'] = 'Delete EXIF and comments <br> <div class="jetcache-table-help"> key --strip-all --strip-iptc </div>';

$_['entry_system_proc_open'] = 'Enabled php function proc_open';

$_['entry_minify_html'] = 'Minification HTML';
$_['entry_minify_html_status_help'] = 'Status minification HTML';
$_['entry_minify_html_ex_route'] = 'Exception route';
$_['entry_minify_html_ex_route_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_lazy_ex_route'] = 'Exception route';
$_['entry_lazy_ex_route_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_ex_route'] = 'Exception route';
$_['entry_minify_ex_route_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_css'] = 'Minification CSS';
$_['entry_minify_css_status_help'] = 'Status minification CSS';
$_['entry_minify_css_ex_route'] = 'Exception route';
$_['entry_minify_css_ex_route_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_css_compress_status'] = 'Compression CSS';
$_['entry_minify_css_compress_status_help'] = 'The status of compression CSS';
$_['entry_minify_css_footer'] = 'Transfer CSS down';
$_['entry_minify_css_footer_help'] = 'The status of the transfer CSS down';
$_['entry_minify_css_ex_css_footer'] = 'Exclude from transfer CSS down';
$_['entry_minify_css_ex_css_footer_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_css_combine_status'] = 'Unification CSS files';
$_['entry_minify_css_combine_status_help'] = 'The status of the Association CSS files<br>Code binding in the head';
$_['entry_minify_css_combine_footer'] = 'Transfer service fileCSS down';
$_['entry_minify_css_combine_footer_help'] = 'The status of the migration service of the fileCSS down';
$_['entry_minify_css_combine_preload'] = 'Deferred loading service file CSS';
$_['entry_minify_css_combine_preload_help'] = 'Status deferred loading the service file CSS';
$_['entry_minify_css_preload'] = 'Pending loading CSS';
$_['entry_minify_css_combine_preload_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_css_ex_combine'] = 'Exclusion from the Association CSS';
$_['entry_minify_css_ex_combine_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_css_in_inline'] = 'FileCSS inline in HTML';
$_['entry_minify_css_in_inline_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_css_combine_inline'] = 'Transfer inline style in service file CSS';
$_['entry_minify_css_combine_inline_help'] = 'The status of the transfer inline style in service file CSS';
$_['entry_minify_css_compress_type'] = 'Aggressive algorithm compression CSS';
$_['entry_minify_css_compress_type_help'] = 'Status aggressive algorithm compression CSS';
$_['entry_minify_css_ex_combine_inline'] = 'Exception code inline style of Association CSS';
$_['entry_minify_css_ex_combine_inline_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_css_inline_footer'] = 'Transfer inline style CSS down';
$_['entry_minify_css_inline_footer_help'] = 'The status of the transfer inline style CSS down';
$_['entry_minify_js'] = 'Minification JS';
$_['entry_minify_js_status_help'] = 'Status minification JS';
$_['entry_minify_js_ex_route'] = 'Exception route';
$_['entry_minify_js_ex_route_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_compress_status'] = 'Compression JS';
$_['entry_minify_js_compress_status_help'] = 'The status of compression JS';
$_['entry_minify_js_ex_compress'] = 'Exclude from compression';
$_['entry_minify_js_ex_compress_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_footer'] = 'Transfer JS down';
$_['entry_minify_js_footer_help'] = 'The status of the transfer JS down';
$_['entry_minify_js_first'] = 'JS sooner CSS';
$_['entry_minify_js_first_help'] = 'Status JS before CSS';
$_['entry_minify_js_ex_js_footer'] = 'Exclude from transfer JS down';
$_['entry_minify_js_ex_js_footer_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_combine_status'] = 'Unification JS files';
$_['entry_minify_js_combine_status_help'] = 'The status of the Association JS files<br>Code binding in the head';
$_['entry_minify_js_combine_footer'] = 'Transfer service fileJS down';
$_['entry_minify_js_combine_footer_help'] = 'The status of the migration service of the fileJS down';
$_['entry_minify_js_ex_combine'] = 'Exclusion from the Association JS';
$_['entry_minify_js_ex_combine_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_in_inline'] = 'File. JS inline in HTML';
$_['entry_minify_js_in_inline_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_combine_inline'] = 'Transfer inline JS in service file JS';
$_['entry_minify_js_combine_inline_help'] = 'The status of the transfer inline JS in service file JS';
$_['entry_minify_js_ex_combine_inline'] = 'Exception inline JS code of the Association JS';
$_['entry_minify_js_ex_combine_inline_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_inline_footer'] = 'Transfer inline JS down';
$_['entry_minify_js_inline_footer_help'] = 'The status of the transfer inline JS down';
$_['entry_minify_js_ex_inline_footer'] = 'Exclude from transfer inline JS down';
$_['entry_minify_js_ex_inline_footer_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_preload'] = 'Deferred loading JS';
$_['entry_minify_js_combine_preload_help'] = 'Settings a <br>separated the <br>transfer "carriage" <br / ><span class="jc-help"># - off</span>';
$_['entry_minify_js_compress_type'] = 'Aggressive algorithm compression JS';
$_['entry_minify_js_compress_type_help'] = 'Status aggressive algorithm compression JS';
$_['entry_minify_css_preload_help'] = 'The parameters <br> are separated by the translation of the "carriage" <br> <span class="jc-help"> # - turns off </span>';
$_['entry_minify_js_preload_help'] = 'The parameters <br> are separated by the translation of the "carriage" <br> <span class="jc-help"> # - turns off </span>';

$_['text_jc_doc_faq'] = 'FAQ: Why is there no complete description of all the settings? <br>
<br>
Caching modules are the most complicated modules in opencart (these are not the simplest modules where you know all the data and tasks)
<br>
In the caches, the incoming data (which controllers will be, etc.) are not known, as well as the outgoing data are not known. <br>
It is impossible to describe hundreds of thousands of themes, modules, their methods, models (and their methods too), libraries and their "intricacies" <br>
Hundreds of billions of combinations of settings. <br>
How to describe, tell me? ;) So I don’t know how physically can describe hundreds of billions of settings options. <br>
Therefore, there are default settings in the demo store. Repeat them - they work everywhere <br>
It is better to order tuning from specialists so that the module works at full capacity. <br>
They will analyze the log files of the work of controllers, models, queries <br> and configure the module according to the bottlenecks found <br>
Regards, Jet Cache Developer
';
$_['entry_cont_log_crop'] = 'Crop parameters in log';
$_['entry_minify_js_preload_desktop'] = 'Delayed loading for desktop version';
$_['entry_minify_js_preload_desktop_rudes'] = 'Delayed loading status for desktop version';

$_['entry_minify_js_preload_desktop_help'] = 'Lazy loading status for desktop version';
$_['entry_minify_js_inline_compress_status'] = 'Inline js compression';
$_['entry_minify_js_inline_compress_status_help'] = 'Inline JS Compression Status';
$_['entry_minify_css_inline_compress_status'] = 'Inline CSS Compression';
$_['entry_minify_css_inline_compress_status_help'] = 'Inline CSS Compression Status';

$_['entry_minify_js_preload_desktop_help'] = 'Lazy loading status for desktop version';
$_['entry_minify_js_inline_compress_status'] = 'Compress inline JS';
$_['entry_minify_js_inline_compress_status_help'] = 'Compression status inline JS';
$_['entry_minify_css_inline_compress_status'] = 'Compress inline CSS';
$_['entry_minify_css_inline_compress_status_help'] = 'Inline CSS Compression Status';

$_['tab_service'] = 'Service';
$_['entry_jc_backup'] = 'Settings <br><span style="color: green;">save</span>';
$_['entry_jc_restore'] = 'Settings <br><span style="color: green;">restore</span>';

$_['text_jc_url_backup'] = 'Save';
$_['text_jc_url_restore'] = 'Restore';

$_['text_jc_backup_success'] = '<span style="color: green;">Settings saved</span>';
$_['text_jc_restore_success'] = '<span style="color: green">Settings restored</span>';

$_['text_jc_backup_fail'] = 'Failed to save settings';
$_['text_jc_restore_fail'] = 'Failed to restore settings';

$_['text_jc_backup_access'] = '<span style="color: red;">You do not have permissions</span>';
$_['text_jc_restore_access'] = '<span style="color: red;">You do not have permissions</span>';

$_['text_jc_settings_no_format'] = '<span style="color: red;">Wrong settings format</span>';
$_['text_jc_json_error'] = '<span style="color: red;">JSON decoding error</span>';
$_['text_jc_error_filetype'] = '<span style="color: red;">Wrong file type</span>';

$_['entry_minify_js_afterload_time_desktop'] = 'Automatic time <br> loading scripts after DOMContentLoaded for desktop';
$_['entry_minify_js_afterload_time_mobile'] = 'Automatic time <br> loading scripts after DOMContentLoaded for mobile';
$_['entry_minify_js_afterload_time_desktop_help'] = 'In milliseconds, 1000 ms = 1 second';
$_['entry_minify_js_afterload_time_mobile_help'] = 'In milliseconds, 1000 ms = 1 second';

$_['entry_image_webp_mozjpeg'] = 'Compress resizes with module algorithms before webp';


$_['tab_replacers'] = 'Replacer';
$_['entry_replacers_status'] = 'Replacer status';
$_['text_replacer_comment'] = 'Comment';
$_['text_replacer_in'] = 'Code for replace';
$_['text_replacer_out'] = 'Replace code';
$_['text_replacer_all'] = 'Replace all';
$_['text_replacer_status'] = 'Status';
$_['text_replacer_action'] = 'Action';

$_['entry_minify_js_preload_gps'] = 'Deferred loading JS for GPS';
$_['entry_minify_js_preload_gps_help'] = 'You can set counters and analytics in this field. <br>Parameters <br>are separated by carriage return <br><span class="jc-help"># - turns off</span>';



$_['entry_minify_css_critical_status'] = 'Combining files in Critical CSS';
$_['entry_minify_css_critical_in'] = 'Critical CSS files';


$_['entry_minify_css_critical_status_help'] = 'Binding to code';
$_['entry_minify_css_critical_in_help'] = 'File names';


$_['entry_minify_css_ex_inline_footer'] = 'Exceptions from moving inline style CSS down';
$_['entry_minify_css_ex_inline_footer_help'] = 'Parameters <br>are separated by carriage return <br><span class="jc-help"># - turns off</span>';

$_['entry_minify_css_after'] = 'Deferred loading of CSS scripts';
$_['entry_minify_css_after_help'] = 'Parameters <br>are separated by carriage return<br><span class="jc-help"># - turns off</span>';

$_['entry_minify_css_after_gps'] = 'Deferred loading of CSS scripts for GPS';
$_['entry_minify_css_after_gps_help'] = 'Parameters <br>are separated by carriage return<br><span class="jc-help"># - turns off</span>';


// 21.1
$_['tab_images'] = 'Images';

$_['ocmod_jetcache_images_name'] = $_['jetcache_model'].' Images';
$_['ocmod_jetcache_images_mod'] = $_['jetcache_model_code'].'_images';
$_['ocmod_jetcache_images_html'] = $_['ocmod_jetcache_images_name'].' ...modifier installed';

$_['entry_images_logo_preload'] = 'Logo preload';
$_['entry_images_logo_preload_help'] = 'Logo preload';

$_['entry_images_logo_dimensions'] = 'Logo dimensions';
$_['entry_images_logo_dimensions_help'] = 'Logo dimensions<br>width x height (px)';

$_['entry_images_x'] = 'Dimensions for images';
$_['entry_images_x_help'] = 'Dimensions for images';
$_['entry_cache_remove_status'] = 'Status of automatic <br>cache removal';
$_['entry_cache_remove_status_help'] = 'Status of automatic <br>cache removal';


$_['entry_minify_css_combine_inline_code'] = 'Inline style code to merge CSS file';
$_['entry_minify_css_combine_inline_code_help'] = 'Parameters <br>are separated by carriage return<br><span class="jc-help"># - turns off</span>';
$_['entry_jpegoptim'] = 'JPEG optimization by jpegoptim algorithm ';
$_['entry_image_jpegoptim_level'] = 'Compression level <br><span class="jc-help">Integer 1-99, <br>without percent sign <br>Want without loss of quality - <br>do not fill </span><br><div class="jetcache-table-help">specify from 1 to 99,<br>if left blank - without loss of quality</div>';
$_['entry_image_jpegoptim_size'] = 'File size in percent <br>of the original <br><span class="jc-help">Integer 1-99, <br>without a percent sign <br>Want without loss of quality - <br>do not fill in </span><br><div class="jetcache-table-help">specify from 1 to 99, <br>if not filled in - without loss of quality </div>';
$_['entry_system_image_jpegoptim_original'] = 'Original JPEG image';
$_['entry_system_image_jpegoptim_optimized'] = 'Optimized JPG image by jpegoptim algorithm';


/* Add 22.0 */
$_['entry_minify_css_fonts_status'] = 'Move <br>fonts to merged font file';
$_['entry_minify_css_fonts_status_help'] = 'Status of moving fonts <br>to merged font file <br>Binding code in head';
$_['entry_minify_css_fonts_footer'] = 'Move merged font file to footer';
$_['entry_minify_css_fonts_footer_help'] = 'The status of moving the merged font file to footer';
$_['entry_minify_css_ex_fonts'] = 'Font moving Exceptions';
$_['entry_minify_css_ex_fonts_help'] = 'Font moving exception status <br>options are separated by carriage return <br><span class="jc-help"># - turns off</span>';
$_['entry_minify_css_fonts_defer'] = 'Deferred loading of merged font file';
$_['entry_minify_css_fonts_defer_help'] = 'Deferred loading of merged font file';
$_['entry_minify_css_fonts_defer_gps'] = 'Deferred loading GPS merged font file';
$_['entry_minify_css_fonts_defer_gps_help'] = 'Deferred loading GPS merged font file';

/* Add 23.0 */
$_['tab_bots'] = 'Bots';
$_['tab_bots_ajax'] = 'Bots Ajax';
$_['entry_bots_ajax'] = 'Status';
$_['entry_bots_ajax_status_help'] = 'Status "Bots Ajax"';
$_['entry_bots_ajax_add_route'] = 'Route pages';
$_['entry_bots_ajax_add_route_help'] = 'Parameters <br>separated by "carriage"<br><br><span class="jc-help"># - turns off</span>';
$_['entry_bots_ajax_add_uri'] = 'URI pages';
$_['entry_bots_ajax_add_uri_help'] = 'Parameters <br>separated by "carriage"<br><br><span class="jc-help"># - turns off</span>';
$_['entry_bots_ajax_add_get'] = 'GET parameters pages';
$_['entry_bots_ajax_add_get_help'] = 'Parameters <br>separated by "carriage"<br><br><span class="jc-help"># - turns off</span>';
$_['entry_bots_ajax_server_response_1'] = 'Server response (first)';
$_['entry_bots_ajax_server_response_1_help'] = '';
$_['entry_bots_ajax_server_response_2'] = 'Server response (second)';
$_['entry_bots_ajax_server_response_2_help'] = '';
$_['entry_bots_ajax_server_response_3'] = 'Server response (third)';
$_['entry_bots_ajax_server_response_3_help'] = 'You can redirect<br>(not recommended)<br>(for example to a prepared 404 page)<br>Location: /index.php?route=error/not_found';

$_['entry_logs_attention'] = 'Attention';
$_['text_logs_attention'] = 'This functionality of logs is only for debugging work and settings of the module.<br>At the end of the debugging, turn off all the logs and delete the log files.';


$_['text_jetcache_ocmod'] = 'modificator';
$_['text_jetcache_ocmod_none'] = $_['text_jetcache_ocmod'] . ' not installed';

$_['ocmod_jetcache_text_on'] = '<span style="color:green">on</span>';
$_['ocmod_jetcache_text_off'] = '<span style="color:red">off</span>';


$_['tab_bots_options'] = 'Setting bots';
$_['entry_jetcache_bots'] = 'Token in the bot user-agent';
$_['text_jetcache_bots'] = 'Bots';
$_['entry_jetcache_bots_cookie'] = 'Cookies for bots<br><span class="jc-help">The parameters are separated by a "carriage"(Enter)<br># - turns off<br>Parameters to cookies via |</span>';
$_['text_jetcache_bots_cookie'] = 'Cookies';

/* Add 25.0 */
$_['entry_pages_fast'] = 'Fast algorithm';
$_['entry_pages_fast_help'] = 'Fast algorithm';

/* Add 25.1 */
$_['entry_webp_gd'] = 'Image optimization using the webp GD algorithm';
$_['entry_image_webp_gd_status'] = 'Status optimization of all images using the wep GD algorithm<br><div class="jetcache-table-help">other algorithms will be "disabled"</div>';
$_['entry_image_webp_gd_quality'] = 'Image quality<br><div class="jetcache-table-help">max: 100<br>min: 10</div>';
$_['entry_webp_gd_must'] = 'Requirements:<br>Ability to run webp GD';
$_['entry_webp_gd_text'] = 'webp GD';
$_['entry_system_webp_gd_exec'] = 'Ability to perform webp GD optimization';
$_['entry_system_image_webp_gd_original'] = 'Original image';
$_['entry_system_image_webp_gd_lossess'] = 'Optimized image using the webp GD algorithm';
$_['entry_image_webp_gd_png_status'] = 'Optimization PNG to webp GD';

$_['error_image_img_exec'] = 'Error optimization ';
$_['error_image_mozjpeg_exec'] = $_['error_image_img_exec'] . 'MozJpeg';
$_['error_image_jpegoptim_exec'] = $_['error_image_img_exec'] . 'JpegOptim';
$_['error_image_optipng_exec'] = $_['error_image_img_exec'] . 'OptiPNG';
$_['error_image_webp_exec'] = $_['error_image_img_exec'] . 'WebP';
$_['error_image_webp_gd_exec'] = $_['error_image_img_exec'] . 'WebP GD';

// Add in 26.0
$_['text_replacer_route'] = 'Routes';
$_['text_replacer_more'] = 'Other options';
$_['text_replacer_options'] = 'Options';
$_['text_replacer_device'] = 'Devices';
$_['text_replacer_device_all'] = 'All devices';
$_['text_replacer_device_comp'] = 'Computers';
$_['text_replacer_device_mob'] = 'Mobile devices';
$_['text_replacer_device_smart'] = 'Smartphones';
$_['text_replacer_device_pad'] = 'Tablets';

$_['entry_html_remove_space'] = 'Remove excess spaces and tabulations';

// Add in 27.0
$_['text_jetcache_customer_groups'] = 'Custoner groups';
$_['text_jetcache_group_reg'] = 'Registered users';
$_['text_jetcache_group_order'] = 'Who bought it product in in the store';
$_['text_jetcache_group_order_this'] = 'Who bought it "this" product in in the store';
$_['text_jetcache_group_all'] = 'All custoner groups';

$_['text_jetcache_uri'] = 'URI';

$_['text_jetcache_langs'] = 'Languages<br><span class="jc-help">(If not one is not chosen <br>- it will be at all)</span>';
$_['text_jetcache_stores'] = 'Stores<br><span class="jc-help">(If not one is not chosen <br>- it will be at all)</span>';

// Add in 27.1
$_['entry_minify_js_preload_inline_remove_event'] = 'Remove from delayed (Lazy) inline JS <br>events on DOMContentLoaded, that has already ended';
$_['entry_minify_js_preload_inline_remove_event_help'] = $_['entry_minify_js_preload_inline_remove_event'];
$_['entry_minify_js_preload_server_remove_event'] = 'Remove from delayed (Lazy) servers JS <br>events on DOMContentLoaded, that has already ended';
$_['entry_minify_js_preload_server_remove_event_help'] = $_['entry_minify_js_preload_server_remove_event'];

// Add in 27.2
$_['text_apply_error'] = 'Error apply';
$_['text_apply_success'] = '<i class="fa fa-check" aria-hidden="true"></i> Successfully';
$_['text_apply_no_access'] = 'You have no access rights';
$_['error_permission'] = $_['text_apply_no_access'];
$_['button_apply'] = 'Apply';
$_['text_apply_refresh'] = '<i class="fa fa-check" aria-hidden="true"></i> Refresh';

$_['ocmod_jetcache_mod_name'] = $_['jetcache_model'] . ' Mod';
$_['ocmod_jetcache_mod_mod'] = $_['jetcache_model_code'].'_mod';
$_['ocmod_jetcache_mod_html'] = $_['ocmod_jetcache_mod_name'] . ' ...modifier installed'; 

$_['ocmod_jetcache_data_name'] = $_['jetcache_model'] . ' Data View';
$_['ocmod_jetcache_data_mod'] = $_['jetcache_model_code'].'_data';
$_['ocmod_jetcache_data_html'] = $_['ocmod_jetcache_data_name'] . ' ...modifier installed'; 

$_['entry_images_product_preload'] = $_['entry_images_product_preload_help'] = 'Preload main image <br>in product page';

// Add in 28.0
$_['ocmod_jetcache_layout_name'] = $_['jetcache_model'] . ' Layout';
$_['ocmod_jetcache_layout_mod'] = $_['jetcache_model_code'].'_layout';
$_['ocmod_jetcache_layout_html'] = $_['ocmod_jetcache_layout_name'] . ' ...modifier installed';

$_['entry_device_detect'] = 'Support detecting devices for layouts <span class="jc-help">Design -> Layouts</span>';

// Add in 28.1
$_['url_text_jetcache_delete_text'] = '<div style="text-align: center; text-decoration: none;">Deleting<br>module settings<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(all module settings will be deleted)</ins></div>';
$_['url_text_jetcache_delete_sure_pre_text'] = '<div style="text-align: center; text-decoration: none;">Are you sure<br>deleting all module settings?<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(all module settings will be <br>irrevocably deleted)</ins></div>';
$_['url_text_jetcache_delete_sure_text'] = '<div style="text-align: center; text-decoration: none;">ARE YOU SURE !?<br>deleting all module settings?<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(all module settings will be <br>irrevocably deleted)</ins></div>';

$_['entry_minify_js_debug'] = 'Ddebug JS minification<br><span class="jc-help"Disabled all JS scripts<br>After end of debug <br>JS minification - disabled<br></span>';
$_['entry_minify_js_debug_help'] = $_['entry_minify_js_debug'];
/* Add 29.0 */
$_['entry_no_cache'] = 'Caching ajax<br><span class="jc-help">(not recommended)</span>';
$_['entry_onefile'] = '1. To a single file';
$_['entry_ignore'] = '2. Ignore';
$_['entry_debug'] = 'Debug mode';


$_['text_jetcache_loading_main'] = '<div style=&#92;\'color: #008000; &#92;\'>Loading...<i class=&#92;\'fa fa-refresh fa-spin&#92;\'></i></div>';
$_['text_jetcache_loading_main_without'] = '<div style="color: #008000">Loading...<i class="fa fa-refresh fa-spin"></i></div>';


$_['text_jetcache_check_ver'] = 'Check a new version';
$_['text_jetcache_server_date_state'] = 'By current status on';
$_['text_jetcache_current_version_text'] = '<div style="color: #306793;">Your current version version</div>';
$_['text_jetcache_last_version_text'] = '<div style="color: #306793;">Last version</div>';
$_['text_jetcache_update_yes'] = '<div style="color: red;">Recommended update module</div>';
$_['text_jetcache_update_no'] = '<div style="color: green;">No update required. You have the latest version of the module</div>';
$_['text_jetcache_error_text_jetcache_server_connect'] = 'Mistake connections with by the server';
$_['text_jetcache_update_version_begin'] = "<div style='background: #F7FFF2; width: auto; border: 1px solid #E2EDDC; padding: 10px;'>Last available information version of the module: <span style='font-size: 21px;'>";
$_['text_jetcache_update_version_end'] = "</span></div>";
$_['text_jetcache_new_version'] = "<div style='background: #FFCFCE; border: 2px solid red; padding: 10px;'>Installed version version of the module: <b><span style='color: red;'>" . $_['jetcache_version'] . "</span></b><br>"."Last version of the module: <span style='color: green;'><b>";
$_['text_jetcache_new_version_end'] = '</b></span><br>Recommended: <span style="color: green;"><b>update it module before the last one versions</b></span></div>';
$_['text_jetcache_error_server_connect'] = 'Mistake connections with by the server';
