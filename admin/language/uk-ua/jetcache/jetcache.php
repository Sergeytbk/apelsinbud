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


$_['text_enabled'] = 'Увімкнуто';
$_['text_disabled'] = 'Вимкнуто';
$_['text_enabled_jc_module'] = 'Увімкнуто модуль';
$_['text_disabled_jc_module'] = 'Вимкнуто модуль';



$_['heading_dev'] = 'Розробник <a href="mailto:admin@opencartadmin.com" target="_blank">support.opencartadmin.com</a><br>&copy; 2011-'.date('Y') .' All Rights Reserved';
$_['entry_tab_options'] = 'Налаштування';
$_['entry_id'] = 'ID';

$_['text_status'] = 'Статус';
$_['text_mod_add_jetcache'] = $_['jetcache_model'].' модифікатор встановлений<br>';

$_['entry_url_jetcache'] = 'Сторінка налаштувань модуля';

$_['tab_options'] = 'Налаштування';
$_['tab_pages'] = 'Сторінки';
$_['tab_cont'] = 'Контролери';
$_['tab_access'] = 'Доступ';
$_['tab_exceptions'] = 'Винятки';
$_['tab_query'] = 'Запити';
$_['tab_model'] = 'Моделі';
$_['tab_minify'] = 'PageSpeed';
$_['tab_minify_html'] = 'HTML';
$_['tab_minify_css'] = 'CSS';
$_['tab_minify_js'] = 'JS';
$_['tab_lazy'] = 'Зображення';

$_['entry_lazy_status'] = 'Відкладене завантаження зображень <br>"Lazy Loading Images"';
$_['entry_lazy_status_help'] = 'Правила заміни<br>
Формат:<br>
"токен для заміни"|"токен на який замінюємо"<br>
роздільник "переведення каретки" PHP_EOL, <br>між токенами |';

$_['entry_minify_html'] = 'Мініфікація<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_minify_html_status_help'] = 'Статус мініфікації HTML';

$_['entry_minify_html_ex_route'] = 'Винятки route';
$_['entry_minify_html_ex_route_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - відключає</span>';

$_['entry_lazy_ex_route'] = 'Винятки route';
$_['entry_lazy_ex_route_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - відключає</span>';



$_['entry_minify_ex_route'] = 'Виключення route';
$_['entry_minify_ex_route_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_css'] = 'Мініфікація CSS';
$_['entry_minify_css_status_help'] = 'Статус мініфікації CSS';

$_['entry_minify_css_ex_route'] = 'Виключення route';
$_['entry_minify_css_ex_route_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_minify_css_compress_status'] = 'Стискання CSS';
$_['entry_minify_css_compress_status_help'] = 'Статус стискання CSS';

$_['entry_minify_css_footer'] = 'Перенесення CSS до низу';
$_['entry_minify_css_footer_help'] = 'Статус перенесення CSS';


$_['entry_minify_css_ex_css_footer'] = 'Виключення перенесення CSS';
$_['entry_minify_css_ex_css_footer_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_css_combine_status'] = 'Об&#39єднання CSS файлів';
$_['entry_minify_css_combine_status_help'] = 'Статус об&#39єднання CSS файлів<br>Код прив&#39язки в head';

$_['entry_minify_css_combine_footer'] = 'Перенесення об&#39єднанного файлу CSS до низу';
$_['entry_minify_css_combine_footer_help'] = 'Статус перенесення об&#39єднаного файлу CSS';


$_['entry_minify_css_combine_preload'] = 'Відкладене (Lazy) завантаження об&#39єднаного файлу CSS';
$_['entry_minify_css_combine_preload_help'] = 'Статус відкладеного (Lazy) завантаження об&#39єднаного файлу CSS';


$_['entry_minify_css_preload'] = 'Відкладене (Lazy) завантаження CSS';
$_['entry_minify_css_combine_preload_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_css_ex_combine'] = 'Виключення з об&#39єднання CSS';
$_['entry_minify_css_ex_combine_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_css_in_inline'] = 'Файли CSS inline in HTML';
$_['entry_minify_css_in_inline_help'] = 'Параметри <br>поділяються <br>переведення "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_minify_css_combine_inline'] = 'Перенесення inline style в об&#39єднаний файл CSS';
$_['entry_minify_css_combine_inline_help'] = 'Статус перенесення inline style в об&#39єдний файл CSS';





$_['entry_minify_css_compress_type'] = 'Агресивний алгоритм стискання CSS';
$_['entry_minify_css_compress_type_help'] = 'Статус агресивного алгоритму стискання CSS';



$_['entry_minify_css_ex_combine_inline'] = 'Виключення коду inline style з об&#39єднання CSS';
$_['entry_minify_css_ex_combine_inline_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_minify_css_inline_footer'] = 'Перенесення inline style CSS до низу';
$_['entry_minify_css_inline_footer_help'] = 'Статус перенесення inline style CSS';

$_['entry_minify_js'] = 'Мініфікація JS';
$_['entry_minify_js_status_help'] = 'Статус мініфікації JS';

$_['entry_minify_js_ex_route'] = 'Виключення route';
$_['entry_minify_js_ex_route_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_minify_js_compress_status'] = 'Стискання JS';
$_['entry_minify_js_compress_status_help'] = 'Статус стискання JS';


$_['entry_minify_js_ex_compress'] = 'Виключення із стискання';
$_['entry_minify_js_ex_compress_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_js_footer'] = 'Перенесення JS до низу';
$_['entry_minify_js_footer_help'] = 'Статус перенесення JS';

$_['entry_minify_js_first'] = 'JS раніше CSS';
$_['entry_minify_js_first_help'] = 'Статус JS раніше CSS';

$_['entry_minify_js_ex_js_footer'] = 'Виключення з перенесення JS';
$_['entry_minify_js_ex_js_footer_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_js_combine_status'] = 'Об&#39єдинение JS файлів';
$_['entry_minify_js_combine_status_help'] = 'Статус об&#39єднання JS файлів<br>Код прив&#39язки в head';

$_['entry_minify_js_combine_footer'] = 'Перенесення об&#39єднаного файлу JS до низу';
$_['entry_minify_js_combine_footer_help'] = 'Статус перенесення об&#39єднаного файлу JS';


$_['entry_minify_js_ex_combine'] = 'Виключення з об&#39єднання JS';
$_['entry_minify_js_ex_combine_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_js_in_inline'] = 'Файли JS inline in HTML';
$_['entry_minify_js_in_inline_help'] = 'Параметри <br>поділяються <br>переводом "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_minify_js_combine_inline'] = 'Перенесення inline JS в об&#39єднаний файл JS';
$_['entry_minify_js_combine_inline_help'] = 'Статус перенесення inline JS в об&#39єднаний файл JS';


$_['entry_minify_js_ex_combine_inline'] = 'Виключення коду inline JS з об&#39єднання JS';
$_['entry_minify_js_ex_combine_inline_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_minify_js_inline_footer'] = 'Перенесення inline JS до низу';
$_['entry_minify_js_inline_footer_help'] = 'Статус перенесення inline JS';


$_['entry_minify_js_ex_inline_footer'] = 'Виключення з перенесення inline JS';
$_['entry_minify_js_ex_inline_footer_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_minify_js_preload'] = 'Відкладене (Lazy) завантаження JS';
$_['entry_minify_js_combine_preload_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_minify_js_compress_type'] = 'Агресивний алгоритм стискання JS';
$_['entry_minify_js_compress_type_help'] = 'Статус агресивного алгоритму стискання JS';


$_['entry_minify_css'] = 'Мініфікація CSS';
$_['entry_minify_css_status_help'] = 'Статус мініфікації CSS';

$_['entry_minify_js'] = 'Мініфікація JS';
$_['entry_minify_js_status_help'] = 'Статус мініфікації JS';




$_['tab_doc'] = 'Документація';
$_['tab_logs'] = 'Логи';
$_['tab_main'] = 'Головна';
$_['tab_clear'] = 'Очищення кеша';

$_['entry_db_status'] = 'Кешувати в БД<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_pages_db_status_help'] = 'Кешувати <br>сторінки в БД<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_cont_db_status_help'] = 'Кешувати <br>контролери в БД<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_model_db_status_help'] = 'Кешувати методи <br>моделей в БД<br><span class="jc-help">(не рекомендується)</span>';

$_['entry_add_rule'] = 'Додати';
$_['entry_ex_route'] = 'Route';
$_['entry_ex_routes'] = 'Винятки Routes';

$_['entry_pages_status_help'] = 'Сторінки будуть <br>кешуватись у файловий кеш<br>якщо не включене кешування в БД';
$_['entry_ex_routes_help'] = 'Винятки Route';

$_['entry_pages_forsage'] = 'Форсаж';
$_['entry_pages_forsage_help'] = 'При включенні цієї функції буде включений <br>примусовий виклик сторінок з кешу якомога раніше';



$_['entry_ex_pages'] = 'Винятки URI';
$_['entry_ex_page'] = 'URI';
$_['entry_ex_page_accord'] = 'Відповідність';
$_['entry_ex_pages_help'] = 'REQUEST_URI винятку';

$_['entry_cont_status_help'] = 'Статус кешування контролерів';
$_['entry_add_conts_help'] = 'Контролери котрі <br>необхідно кешувати';
$_['entry_add_conts'] = 'Контролери';
$_['entry_add_cont'] = 'Контролер';

$_['entry_cache_mobile_detect'] = 'Визначення мобільного пристрою';
$_['entry_jetcache_info_status'] = 'Інформаційна панель <br><span class="jc-help">Показується тільки адміністраторам</span><span class="jetcache-table-help-href">?</span>';

$_['entry_jetcache_info_demo_status'] = '<br>демо режим<br>(показувати всім)';


$_['entry_model_status_help'] = 'Включити / відключити <br>кешування методів в моделях';
$_['entry_model_product_status'] = 'Модель catalog/product';
$_['entry_model_gettotalproducts_status'] = 'Метод getTotalProducts';
$_['entry_model_gettotalproducts_status_help'] = 'Кешувати метод <br>підрахунку товарів <br>в категоріях';

$_['entry_seocms_jetcache_alter'] = 'Альтернативний метод <br>запису в кеш файл';
$_['entry_seocms_jetcache_gzip_level'] = 'Стискання (gzip) даних в кеш <br><span class="jc-help">(0 - не стискати, <br> 0 - швидше, але займає <br>більше місця на диску)</span>';
$_['entry_seocms_jetcache_gzip_level_help'] = 'Не плутайте з стисканням HTML сторінки <br>Це стискання кеш файлу';


$_['text_gettotalproducts_uri_status'] = 'Залежність від URL';

$_['entry_ex_session'] = 'Виключені параметри сесії';
$_['entry_ex_session_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br>PHP_EOL';

$_['entry_session_log'] = 'Протоколювання <br> змінних сесії <br> в лог файл';
$_['entry_cache_max_hache_folders_level'] = 'Рівень папок кешу';
$_['entry_no_getpost'] = 'Не реагувати на <br>GET та SESSION';


$_['entry_query_status_help'] = 'Статус кешування запитів <br>Має сенс кешувати записи, <br>якщо є повільні запити більш ніж 0.01 c';
$_['entry_query_db_status_help'] = 'Кешування запитів в БД <br>Простий запит кешу з БД <br>буде швидше складного ті повільного';
$_['entry_query_log_settings'] = 'Налаштування логу запитів';
$_['entry_query_log_status'] = 'Статус файлу логу запитів';
$_['entry_query_log_maxtime'] = 'Час з якого протоколювати запит <br><span class="jc-help">(секунди, дробове через точку), приклад: 0.1 <br>0.1 секунди - це  100 мс</span>';
$_['entry_query_log_file'] = 'Файл, лог повільних запитів, <br>ім&#39я файлу в папці лог файлів opencart';
$_['entry_query_model_title'] = 'Запити, що кешуються для класів та їх методів';
$_['entry_query_model_help'] = 'Запити, що будуть кешуватись з модулів та методів <br>Клас моделі, наприклад: ModelCatalogProduct <br>Метод моделі, наприклад: getTotalProducts <br>Якщо поле Метод пусте, будуть кешуватись всі методи моделі';
$_['entry_query_model'] = 'Клас';
$_['entry_query_method'] = 'Метод';

$_['button_buildcache'] = 'Створити кеш';
$_['button_buildcache_abort'] = 'Скасувати';
$_['message_buildcache_aborted'] = '<span style="color: red;">Скасовано</span>';
$_['message_buildcache_complete'] = '<span style="color: green;">Виконано</span>';
$_['message_buildcache_processing'] = '<span style="color: #16A9DE;">Оброблено</span>';
$_['message_buildcache_processing_complete'] = '<span style="color: #16A9DE;">Виконано</span>';
$_['entry_jetcache_builcache_gen'] = 'Генерувати кеш<br><span class="jc-help">(не рекомендується)</span>';


$_['label_buildcache_with_products'] = 'З товарами';
$_['label_buildcache_with_lang'] = 'Всі мови';

$_['label_buildcache_with_products_title_info'] = 'З товарами';
$_['label_buildcache_with_lang_title_info'] = 'Всі мови';


$_['label_buildcache_with_products_data_content'] = 'Генерувати кеш зі сторінками товарів <br> Якщо кількість товарів велика, може зайняти багато часу';
$_['label_buildcache_with_lang_data_content'] = 'Генерувати кеш для сторінок всіх мов <br>Якщо мова єдина або ви не використовуєте префікси (піддомени) для мов, не потрібно відмічати для кожної мови';


$_['text_jetcache_success'] = 'Вдало';

$_['entry_log_file_unlink'] = 'Видалити файл';
$_['entry_log_file_view'] = 'Переглянути файл';
$_['unlink_success'] = 'Вдало';
$_['unlink_unsuccess'] = 'Невдало. Файл не знайдено';
$_['access_denided'] = 'Доступ закритий';


$_['ocmod_jetcache_name'] = $_['jetcache_model'];
$_['ocmod_jetcache_name_15'] = $_['jetcache_model'].' 15';

$_['ocmod_jetcache_db_name'] = $_['jetcache_model'].' DB';
$_['ocmod_jetcache_db_mod'] = $_['jetcache_model_code'].'_db';
$_['ocmod_jetcache_db_html'] = $_['ocmod_jetcache_db_name'] . ' модифікатор встановлено';


$_['ocmod_jetcache_cat_name'] = $_['jetcache_model'].' Categories';
$_['ocmod_jetcache_cat_mod'] = $_['jetcache_model_code'].'_cat';
$_['ocmod_jetcache_cat_html'] = $_['ocmod_jetcache_cat_name'].' модифікатор встановлено';


$_['ocmod_jetcache_menu_name'] = $_['jetcache_model'] . ' Menu';
$_['ocmod_jetcache_menu_mod'] = $_['jetcache_model_code'] . '_menu';
$_['ocmod_jetcache_menu_html'] = $_['ocmod_jetcache_menu_name'] . ' модифікатор встановлено';

$_['ocmod_jetcache_image_name'] = $_['jetcache_model'].' Image';
$_['ocmod_jetcache_image_mod'] = $_['jetcache_model_code'].'_image';
$_['ocmod_jetcache_image_html'] = $_['ocmod_jetcache_image_name'].' модифікатор встановлено';

$_['ocmod_jetcache_mod'] = $_['jetcache_model_code'];
$_['ocmod_jetcache_mod_15'] = $_['jetcache_model_code'].'_15';


$_['ocmod_jetcache_author'] = 'support.opencartadmin.com';
$_['ocmod_jetcache_link'] = 'https://support.opencartadmin.com';
$_['jetcache_ocas'] = 'https://support.opencartadmin.com/index.php?route=record/ver';

$_['ocmod_jetcache_html'] = $_['ocmod_jetcache_name'].' модифікатор встановлено';


$_['entry_install_update'] = 'Установка / оновлення';
$_['url_create_text'] = '<div style="text-align: center; text-decoration: none;">Установка і оновлення <br> модифікаторів, даних модуля <br> (виконується при установці або оновленні модуля)</div>';

$_['text_refresh_ocmod_successfully'] = '<span style="color:green">Модифікатори оновлено</span>';
$_['text_refresh_ocmod_success'] = 'Модифікатори оновлено';

$_['text_refresh_ocmod_error'] = '<span style="color:red">Помилка оновлення модифікаторів</span>';

$_['entry_model_help'] = 'Класи і методи моделей <br>для кешування';

$_['entry_model_status'] = 'Кешування моделей';
$_['entry_model_title'] = 'Класи і методи моделей для кешування';
$_['entry_no_vars'] = 'Не реагувати на:<br> 1. GET параметри<br> 2. SESSION параметри<br> 3. URL адресу<br> 4. ROUTE';

$_['entry_ex_get'] = 'Виключені параметри GET';
$_['entry_ex_get_help'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br>PHP_EOL';

$_['entry_lastmod_status'] = 'Статус заголовка Last-Modified';
$_['entry_lastmod_help'] = 'Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T').',filemtime(кеш файлу)<br>HTTP/1.1 304 Not Modified <br><br>Якщо не спрацьовує, спробуйте в файл <br>.htaccess додати правило після <br>RewriteRule ^([^?]*) index.php?_route_=$1 [L,QSA]<br><br><span style="color: green;">RewriteRule ^(.*)$ $1 [E=HTTP_IF_MODIFIED_SINCE:%{HTTP:If-Modified-Since}]</span><br>або
<br><span style="color: green;">RewriteRule .* - [E=HTTP_IF_MODIFIED_SINCE:%{HTTP:If-Modified-Since}]<br>RewriteRule .* - [E=HTTP_IF_NONE_MATCH:%{HTTP:If-None-Match}]</span><br><br>Якщо у вас зв&#39язка nginx+php<br>відредагуйте config<br>
<br>
location ~ .php$<br>
{<br>
 …<br>
 if_modified_since off;<br>
<br>
 fastcgi_pass fcgi;<br>
 fastcgi_index index.php;<br>
 fastcgi_param SCRIPT_FILENAME /<шлях> /web$fastcgi_script_name;<br>
 …<br>
 fastcgi_pass_header Last-Modified;<br>
 include fastcgi_params;<br>
}<br>
';

$_['entry_cachecontrol_status'] = 'Статус заголовка Cache-Control<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_cachecontrol_help'] = 'Cache-Control:public, max-age=31536000';

$_['entry_expires_status'] = 'Статус заголовка Expires<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_expires_help'] = 'Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 604800);

$_['ocmod_file_agoo_catalog_product_unlink_successfully'] = 'Файл старої версії <br>/catalog/model/agoo/catalog/product.php<br> видалений<br><br>';

/***************/

$_['entry_widget_status'] = "Статус";
$_['entry_cache_expire'] = 'Час життя кеш файлу <br> модуля (в секундах)';
$_['entry_cache_max_files'] = 'Максимальна кількість файлів <br> в папці кеша модуля';
$_['entry_cache_maxfile_length'] = 'Максимальний розмір <br> кеш файлу модуля (в байтах)';
$_['entry_cache_auto_clear'] = 'Автоматичне очищення <br> всього кеша (в годинах)';
$_['entry_tab_settings_cache'] = 'Кеш і модифікатори';
$_['entry_jetcache_ocmod_refresh'] = 'Оновити кеш <br><span class="sc-color-clearcache">модифікаторів</span>';
$_['text_url_ocmod_refresh'] = 'Оновити';
$_['text_ocmod_refresh_success'] = 'Виконано';
$_['text_ocmod_refresh_fail'] = 'Не вдалося оновити';
$_['entry_jetcache_cache_remove'] = 'Видалити кеш <br><span class="sc-color-clearcache">файлів</span>';
$_['text_url_cache_remove'] = 'Видалити кеш';
$_['text_cache_remove_success']	= '<i class="fa fa-check" aria-hidden="true"></i> Виконано';
$_['text_cache_remove_success_select']	= 'Видалено частково';
$_['text_cache_remove_fail'] = 'Не вдалося видалити';
$_['text_jetcache_about'] = 'Про модуль';
$_['entry_jetcache_cache_image_remove'] 	= 'Видалити ресайзи <br><span class="sc-color-clearcache">зображень</span>';
$_['text_url_cache_image_remove'] 	= 'Видалити ресайзи';
$_['text_cache_image_remove_success']	= 'Виконано';
$_['text_cache_image_remove_fail'] 	= 'Не вдалося видалити';
$_['entry_store'] = 'Магазини:';
$_['text_default_store'] = 'Основний магазин';
$_['text_loading_main']         = '<div style=&#92;\'color: #008000;&#92;\'>Завантажується...<i class=&#92;\'fa fa-refresh fa-spin&#92;\'></i></div>';
$_['text_loading_main_without'] = '<div style="color: #008000">Завантажується...<i class="fa fa-refresh fa-spin"></i></div>';

$_['text_faq'] = '';
$_['text_separator'] = ' > ';

$_['entry_add_category'] = 'Очищення кеша (повне) <br>при додаванні, зміненні, <br>видаленні категорії';
$_['entry_add_category_help'] = 'При активованому налаштуванні буде проведено повне очищення кешу';
$_['label_add_category'] = 'Очищення кеша при додаванні, зміненні, видаленні категорії';
$_['label_add_category_content'] = 'При активованому налаштуванні буде проведено повне очищення кешу';

$_['entry_add_product'] = 'Очищення кеша (повне) <br>при додаванні, видаленні товару';
$_['entry_add_product_help'] = 'При активованому налаштуванні буде проведено повне очищення кешу';
$_['label_add_product'] = 'Очищення кеша при додаванні, видаленні товару';
$_['label_add_product_content'] = 'При активованому налаштуванні буде проведено повне очищення кешу';

$_['entry_edit_product'] = 'Очищення кеша (повне) <br>при редагуванні товару';
$_['entry_edit_product_help'] = 'При активованому налаштуванні буде проведено повне очищення кешу';
$_['label_edit_product'] = 'Очищення кеша при редагуванні товару';
$_['label_edit_product_content'] = 'При активованому налаштуванні буде проведено повне очищення кешу';

$_['entry_edit_product_id'] = 'Очищення кеша (пов&#39язане) <br>при редагуванні товару';
$_['label_edit_product_id_content'] = "При активованому налаштуванні буде проведено очищення кешу <br>тільки пов&#39язаних з товаром кеш файлів <br><span style='color: red;'>Увага! Дещо уповільнює роботу запису в кеш. <br>З кеша так само швидко.</span>";
$_['entry_edit_product_id_help'] = $_['label_edit_product_id_content'];
$_['label_edit_product_id'] = 'Пов&#39язане очищення кеша при редагуванні товару';


$_['entry_query_log_status_title'] = 'Статус&nbsp;лог&nbsp;файлу&nbsp;запитів';
$_['entry_query_log_status_content'] = 'Не забудьте відключити після аналізу<br><span style="color: red;">Увага! Статус запитів (таб Запити) має бути включеним</span>';

$_['entry_jetcache_menu_status'] = 'Статус <i class="fa fa-dot-circle-o"></i> JC в меню';
$_['entry_jetcache_menu_order'] = 'Порядок пункту <i class="fa fa-dot-circle-o"></i> JC в меню, після "номера" <br>пункту в меню <br>номер:';

$_['text_status_on'] = 'включено';
$_['text_status_off'] = 'виключено';

$_['text_js_status_on'] = 'JC <span style="margin-left: 6px; color: #eeffee;"> '.$_['text_status_on'] .' <i class="fa fa-dot-circle-o"></i></span>';
$_['text_js_status_off'] = 'JC <span style="margin-left: 6px; color: #fccccc;"> '.$_['text_status_off'] .' </span>';

$_['text_ocmod_refresh'] = 'Оновити&nbsp;модифікатори';

$_['text_close'] = 'Закрити';

$_['entry_session_log_file'] = 'Файл, лог сесії,<br>ім&#39я файлу в папці лог файлів opencart';

$_['entry_session_log_settings'] = 'Налаштування логу сесії';
$_['entry_session_log_settings_help'] = 'При активації ви можете протоколювати <br>змінні сесії та, за потребою, заносити їх у винятки';
$_['entry_query_log_settings_help'] = 'При активації ви можете аналізувати <br>запити та, за потребою, заносити їх в налаштування<br>Увага! Статус запитів має бути включеним';

$_['entry_model_original_status_help'] = 'Використовувати оригінальний метод model класу Loader';

$_['entry_cont_log_settings'] = 'Налаштування логу контролерів';
$_['entry_cont_log_settings_help'] = 'При активації ви можете протоколювати <br>швидкість виконання контролерів';
$_['entry_cont_log_status'] = 'Статус лог файлу контролерів';
$_['entry_cont_log_maxtime'] = 'Час з якого протоколювати контролер <br><span class="jc-help">(секунди, дробове через точку), приклад: 0.1 <br>0.1 секунди - це  100 мс</span>';
$_['entry_cont_log_file'] = 'Файл лог, швидкості <br>виконання контролерів,<br>ім&#39я файлу в папці лог файлів opencart';
$_['entry_cont_log_settings_help'] = 'При активації ви можете аналізувати <br>швидкість виконання контролерів';
$_['entry_cont_log_status_title'] = 'Статус&nbsp;лог&nbsp;файлу&nbsp;контролерів';
$_['entry_cont_log_status_content'] = 'При активації ви можете аналізувати <br>швидкість виконання контролерів, <br>щоб, за потребою, заносити їх в кешування контролерів';

$_['tab_image_options'] = 'Налаштування';
$_['tab_image_ex'] = 'Винятки';
$_['entry_image_status'] = 'Статус оптимізації зображень';
$_['entry_image_ex'] = 'Винятки';
$_['entry_image_status_help'] = 'При включеному статусі буде <br> проводитись оптимізація зображень';
$_['entry_image_ex_help'] = 'Винятки';

$_['entry_image_status_error_text'] = 'Система не відповідає усім вимогам для оптимізації';

$_['entry_image_status_error'] = 'Статус системи';
$_['entry_mozjpeg'] = 'Оптимізація JPEG по алгоритму mozjpeg';

$_['entry_jpegoptim'] = 'Оптимізація JPEG по алгоритму jpegoptim';
$_['entry_optipng'] = 'Оптимізація PNG по алгоритму optipng';


$_['entry_image_status_error_must_text'] = 'Вимоги системи:<br><div style="text-align: left !important;">
Linux платформа (OC)<br>
Включена функція php exec на стороні сервера <br>
або включена функція php proc_open на стороні сервера <br>
Права на виконання (0755) для файлів webp, mozjpeg, jpegoptim та optipng <br>
Можливість запуску webp, mozjpeg jpegoptim и optipng
</div>';

$_['entry_webp'] = 'Оптимізація зображень за алгоритмом webp Google';
$_['entry_image_webp_status'] = 'Статус оптимізації всіх зображень за алгоритмом webp<br><div class="jetcache-table-help">інші алгоритми будуть "відключені"</div>';
$_['entry_image_webp_lossess'] = 'Оптимізація без втрат<br><div class="jetcache-table-help">ключ -lossless</div>';
$_['entry_webp_must'] = 'Вимоги:<br>Права на виконання (0755) для файлів webp<br>Можливість запуску webp';
$_['entry_webp_text'] = 'webp';
$_['entry_image_webp_relative_url'] = 'Відносний URL зображень';
$_['entry_image_webp_command'] = 'Опції командної строки';
$_['entry_system_webp_perms'] = 'Права на виконання webp <span class="jc-help">(0755)</span>';
$_['entry_system_webp_exec'] = 'Можливість виконання оптимізації webp';
$_['entry_system_image_webp_original'] = 'Оригінальне зображення';
$_['entry_system_image_webp_lossess'] = 'Оптимізоване зображення за алгоритмом webp';
$_['entry_image_webp_mozjpeg'] = 'Стискати ресайзи алгоритмами модуля перед webp';



$_['entry_image_mozjpeg_command'] = 'Опції командної строки';
$_['entry_image_jpegoptim_command'] = 'Опції командної строки';
$_['entry_image_optipng_command'] = 'Опції командної строки';




$_['entry_image_mozjpeg_status'] = 'Статус оптимізації зображень JPEG по алгоритму mozjpeg';
$_['entry_image_mozjpeg_optimize'] = 'Максимальна оптимізація (повільно)<br><div class="jetcache-table-help">ключ -optimize</div>';
$_['entry_image_mozjpeg_progressive'] = 'Прогресивний алгоритм JPEG<br><div class="jetcache-table-help">ключ -progressive</div>';
$_['entry_mozjpeg_must'] = 'Вимоги:<br>Права на виконання (0755) для файлів mozjpeg<br>Можливість запуску mozjpeg';
$_['entry_mozjpeg_text'] = 'mozjpeg';

$_['entry_image_jpegoptim_status'] = 'Статус оптимізації зображень JPEG по алгоритму jpegoptim';
$_['entry_image_jpegoptim_optimize'] = 'Форсована оптимізація<br><div class="jetcache-table-help">ключ --force</div>';
$_['entry_image_jpegoptim_progressive'] = 'Прогресивний алгоритм JPEG<br><div class="jetcache-table-help">ключ --all-progressive</div>';
$_['entry_jpegoptim_must'] = 'Вимоги:<br>Права на виконання (0755) для файлів jpegoptim<br>Можливість запуску jpegoptim';
$_['entry_jpegoptim_text'] = 'jpegoptim';

$_['entry_image_jpegoptim_strip'] = 'Видалити EXIF та коментарі<br><div class="jetcache-table-help">ключ --strip-all --strip-iptc</div>';
$_['entry_image_jpegoptim_level'] = 'Рівень компресії<br><span class="jc-help">Ціле число 1-99, <br>без знаку відсотка<br>Бажаєте без втрати якості - <br>не заповнюйте</span><br><div class="jetcache-table-help">вказувати від 1 до 99, <br>якщо не заповнювати - без втрати якості</div>';
$_['entry_image_jpegoptim_size'] = 'Розмір файлу в відсотках<br>від оригінального<br><span class="jc-help">Ціле число 1-99, <br>без знаку відсотка<br>Бажаєте без втрати якості - <br>не заповнюйте</span><br><div class="jetcache-table-help">вказувати від 1 до 99, <br>якщо не заповнювати - без втрати якості</div>';


$_['entry_image_optipng_status'] = 'Статус оптимізації зображень PNG по алгоритму optipng';
$_['entry_optipng_must'] = 'Вимоги:<br>Права на виконання (0755) для файлів optipng<br>Можливість запуску optipng';
$_['entry_optipng_optimize_level'] = 'Рівень оптимізації optipng<br><span class="jc-help">Рекомендуємо 1 або 2</span><br><div class="jetcache-table-help">ключ –oX,<br>де о – скорочено від optimization, X – рівень стискання (1-7), де 7 - максимальний, але повільний, 1 - швидкий, але мінімальний</div>';
$_['entry_optipng_text'] = 'optipng';


$_['entry_features_system'] = 'Можливості системи (тест)';

$_['entry_system_linux_status'] = 'Linux платформа (ОС)';
$_['entry_system_exec_status'] = 'Включена функція php exec';
$_['entry_system_proc_open'] = 'Включена функція php proc_open';




$_['entry_system_mozjpeg_perms'] = 'Права на виконання mozjpeg <span class="jc-help">(0755)</span>';
$_['entry_system_mozjpeg_exec'] = 'Можливість виконання оптимізації mozjpeg';
$_['entry_system_image_mozjpeg_original'] = 'Оригінальне зображення JPEG';
$_['entry_system_image_mozjpeg_optimized'] = 'Оптимізоване зображення JPEG по алгоритму mozjpeg';

$_['entry_system_jpegoptim_perms'] = 'Права на виконання jpegoptim <span class="jc-help">(0755)</span>';
$_['entry_system_jpegoptim_exec'] = 'Можливість виконання оптимізації jpegoptim';
$_['entry_system_image_jpegoptim_original'] = 'Оригінальне зображення JPEG';
$_['entry_system_image_jpegoptim_optimized'] = 'Оптимізоване зображення JPEG по алгоритму jpegoptim';


$_['entry_system_optipng_perms'] = 'Права на виконання optipng <span class="jc-help">(0755)</span>';
$_['entry_system_optipng_exec'] = 'Можливість виконання оптимізації optipng';
$_['entry_system_image_optipng_original'] = 'Оригінальне зображення PNG';
$_['entry_system_image_optipng_optimized'] = 'Оптимізоване зображення PNG по алгоритму optipng';

$_['entry_system_yes'] = '<span class="jetcache-green">Відповідає</span>';
$_['entry_system_no'] = '<span class="jetcache-red">Не відповідає</span>';
$_['text_system_byte'] = '<span class="">байт</span>';

$_['error_image_exec'] = 'Функція php exec - виключена';
$_['error_image_proc_open'] = 'Функція php proc_open - виключена';
$_['error_image_linux'] = 'Не linux платформа';


$_['entry_ex_key'] = 'Очищення всбого кешу через пов&#39язаний параметр <br>очищення кешу opencart $this->cache->delete(\'параметр\');';
$_['text_ex_key'] = 'Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';

$_['entry_header_categories_status'] = 'Кешування категорій меню в header';
$_['entry_header_categories_status_help'] = 'Кешування стандартного розрахунку категорій товарів <br>для меню в контролері header.php';


$_['entry_tab_cont_categories'] = 'Категорії';
$_['entry_tab_cont_ajax'] = 'Ajax';

$_['entry_cont_ajax_status'] = 'Статус ajax завантаження контролерів';
$_['entry_cont_ajax_status_help'] = 'Ajax завантаження контролерів<br>Рекомендовано не використовувати <br>без особливої потреби';

$_['entry_cont_ajax_route'] = 'Route контролерів ajax завантаження';
$_['entry_cont_ajax_route_help'] = 'Route контролерів ajax завантаження<br>Параметри поділяються <br>переведенням "каретки" <br><span class="jc-help"># "хештег" першим символом в рядку <br>виключає "рядок" route</span>';

$_['entry_cont_ajax_header'] = 'Заміна &lt;head&gt;...&lt;/head&gt; на завантажений з ajax';
$_['entry_cont_ajax_header_help'] = 'Включати <b>тільки</b> коли в ajax контролерах <br>існує виклик $this->document->...<br>Можливе одномоментне мерехтіння';


$_['entry_ex_session_black_status'] = 'Параметри сесії (статус алгоритму "чорний список")';
$_['entry_ex_session_black_status_help'] = 'Параметри сесії (статус алгоритму "чорний список")';
$_['entry_ex_session_black'] = 'Параметри сесії ("чорний список")';
$_['entry_ex_session_black_help'] = 'На які параметри параметри сесії реагувати кешу. <br>Параметри <br>поділяються <br>переведенням "каретки" <br><span class="jc-help"># - виключає</span>';


$_['entry_ex_cookie'] = 'Параметри cookie ("чорний список")';
$_['entry_ex_cookie_help'] = 'На які параметри cookie реагувати кешу. <br>Параметри <br>розділяються <br>переведенням "каретки" <br><span class="jc-help"># - відключає</span>';

$_['entry_cont_ajax_delay'] = 'Затримка при завантаженні (мілісекунд)';
$_['entry_cont_ajax_delay_help'] = 'Затримка при завантаженні <br>в мілісекундах (1 секунда = 1000 мс)';

$_['text_cont_ajax_route'] = 'Route контролера';
$_['text_cont_ajax_status'] = 'Статус';
$_['text_cont_ajax_scripts'] = 'Статус скриптів';
$_['text_cont_ajax_delay'] = 'Затримка';
$_['text_cont_ajax_md5'] = 'Хеш (md5) параметрів';
$_['text_cont_ajax_action'] = 'Дія';
$_['entry_cart_interval'] = 'Інтервал session для кошика<br>(в хвилинах)';

$_['entry_jetcache_index_status'] = 'Старт таймеру в index.php';
$_['entry_no_vars_cont'] = 'Не реагувати на:<br>1. GET: Реагувати<br> тільки на параметри<br>2. GET параметри<br>3. SESSION параметри<br>4. URL адреса<br>5. ROUTE';

$_['entry_action'] = 'Дія';

$_['text_jc_doc_faq'] = 'FAQ: Чому немає повного опису всіх налаштувань?<br>
<br>
Модулі кешування найскладніші модулі в opencart<br>
В кешувальниках невідомі вхідні дані, так само як невідомі ті що виходять.<br>
Неможливо описати сотні тисяч тем (шаблонів), модулів, контролерів, їх методів, моделей (та їх методів теж), бібліотек та їх "хитросплетінь"<br>
<b>Варіантів комбінацій сотні мільярдів</b>.<br>
Як описати, підкажіть? ;) Ось і я не знаю як описати сотні мільярдів варіантів.<br>
Тому є налаштування за замовчуванням на демо магазині. Повторіть їх - вони працездатні в 90% конфігурацій<br>
А краще замовте налаштування у фахівців, щоб модуль працював на повну потужність.<br>
Вони проведуть аналіз лог файлів роботи контролерів, моделей, запитів та сконфігурують модуль згідно знайдених вузьких місць<br>
Тому краще замовляти опцію - оптимізація під Google PageSpeed Insight<br>
<br>
З повагою, розробник Jet Cache.
';

$_['entry_show_pro_settings'] = 'Показати PRO налаштування';
$_['entry_hide_pro_settings'] = 'Приховати PRO налаштування';

$_['text_no_access'] = 'У вас немає прав доступу';

/* Add 17/08/2022 */


$_['entry_minify_css_preload_help'] = 'Параметри <br>розділяються <br>переведенням "каретки" <br><span class="jc-help"># - відключає</span>';
$_['entry_minify_js_preload_help'] = 'Параметри <br>розділяються <br>переведенням "каретки" <br><span class="jc-help"># - відключає</span>';


$_['entry_cont_log_crop'] = 'Обрізати параметри в лозі';

$_['entry_minify_js_preload_desktop'] = 'Відкладене завантаження для desktop версії';
$_['entry_minify_js_preload_desktop_help'] = 'Статус відкладеного завантаження для desktop версії';



$_['entry_minify_js_preload_desktop_help'] = 'Статус відкладеного завантаження для desktop версії';
$_['entry_minify_js_inline_compress_status'] = 'Стиснення inline JS<br> <span class="jc-help">(не рекомендується)</span>';
$_['entry_minify_js_inline_compress_status_help'] = 'Статус стиснення inline JS<br><span class="jc-help">(не рекомендується включати,<br>так як на сервері зазвичай вже <br>включено стиснення gzip-м html, css і js)</span>';
$_['entry_minify_css_inline_compress_status'] = 'Стиснення inline CSS<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_minify_css_inline_compress_status_help'] = 'Статус стиснення inline CSS<br> <span class="jc-help">(не рекомендується включати,<br>так як на сервері зазвичай вже <br>включено стиснення gzip-м html, css і js)</span>';

$_['tab_service'] = 'Сервіс';
$_['entry_jc_backup'] = 'Налаштування <br><span style="color: green;">зберегти</span>';
$_['entry_jc_restore'] = 'Налаштування <br><span style="color: green;">відновити</span>';

$_['text_jc_url_backup'] = 'Зберегти';
$_['text_jc_url_restore'] = 'Відновити';

$_['text_jc_backup_success'] = '<span style="color: green;">Налаштування збережені</span>';
$_['text_jc_restore_success'] = '<span style="color: green">Налаштування відновлені</span>';

$_['text_jc_backup_fail'] = 'Не вдалося зберегти налаштування';
$_['text_jc_restore_fail'] = 'Не вдалося відновити налаштування';

$_['text_jc_backup_access'] = '<span style="color: red;">У вас немає прав доступу</span>';
$_['text_jc_restore_access'] = '<span style="color: red;">У вас немає прав доступу</span>';

$_['text_jc_settings_no_format'] = '<span style="color: red;">Не вірний формат налаштувань</span>';
$_['text_jc_json_error'] = '<span style="color: red;">Помилка декодування JSON</span>';
$_['text_jc_error_filetype'] = '<span style="color: red;">Не вірний тип файлу</span>';


$_['entry_minify_js_afterload_time_desktop'] = 'Автоматичний час завантаження <br>відкладених скриптів після DOMContentLoaded до desktop';
$_['entry_minify_js_afterload_time_mobile'] = 'Автоматичний час завантаження <br>відкладених скриптів після DOMContentLoaded до mobile';
$_['entry_minify_js_afterload_time_desktop_help'] = 'У мілісекундах, 1000 ms = 1 секунда';
$_['entry_minify_js_afterload_time_mobile_help'] = 'У мілісекундах, 1000 ms = 1 секунда';



$_['tab_replacers'] = 'Модифікатор';
$_['entry_replacers_status'] = 'Статус модифікатора';
$_['text_replacer_comment'] = 'Коментар';
$_['text_replacer_in'] = 'Код для заміни';
$_['text_replacer_out'] = 'Заміна';
$_['text_replacer_all'] = 'Заміняти все';
$_['text_replacer_status'] = 'Статус';
$_['text_replacer_action'] = 'Дія';


$_['entry_minify_js_preload_gps'] = 'Відкладене (Lazy) завантаження JS до GPS';
$_['entry_minify_js_preload_gps_help'] = 'В це поле можна заносити лічильники і аналітику.<br>Параметри <br>розділяються <br>"кареткою"<br><span class="jc-help"># - вимикає </span>';


$_['entry_minify_css_critical_status'] = 'Об’єднання файлів в Critical CSS';
$_['entry_minify_css_critical_in'] = 'Файли Critical CSS';


$_['entry_minify_css_critical_status_help'] = 'Прив’язка до коду';
$_['entry_minify_css_critical_in_help'] = 'Імена файлів';




$_['entry_minify_css_ex_inline_footer'] = 'Винятки з перенесення inline style CSS вниз';
$_['entry_minify_css_ex_inline_footer_help'] = 'Параметри <br>розділяються <br>"кареткою"(Enter)<br><span class="jc-help"># - вимикає</span>';

$_['entry_minify_css_after'] = 'Відкладене (Lazy) завантаження CSS скриптів';
$_['entry_minify_css_after_help'] = 'Параметри <br>розділяються <br>"кареткою"(Enter)<br><span class="jc-help"># - вимикає</span>';

$_['entry_minify_css_after_gps'] = 'Відкладене (Lazy) завантаження CSS скриптів до GPS';
$_['entry_minify_css_after_gps_help'] = 'Параметри <br>розділяються <br>"кареткою"(Enter)<br><span class="jc-help"># - вимикає</span>';



$_['entry_minify_css_combine_inline_code'] = 'Код inline style в файл об’єднання CSS';
$_['entry_minify_css_combine_inline_code_help'] = '<br>Параметри <br>розділяються <br>"кареткою"<br><span class="jc-help"># - вимикає </span>';



// 21.1
$_['tab_images'] = 'Зображення';

$_['ocmod_jetcache_images_name'] = $_['jetcache_model'].' Images';
$_['ocmod_jetcache_images_mod'] = $_['jetcache_model_code'].'_images';
$_['ocmod_jetcache_images_html'] = $_['ocmod_jetcache_images_name'].' модифікатор встановлено';

$_['entry_images_logo_preload'] = 'Лого preload';
$_['entry_images_logo_preload_help'] = 'Лого preload';



$_['entry_images_logo_dimensions'] = 'Лого розміри';
$_['entry_images_logo_dimensions_help'] = 'Лого розміри<br>ширина x висота (px)';

$_['entry_images_x'] = 'Розміри до зображень';
$_['entry_images_x_help'] = 'Розміри до зображень';




$_['entry_cache_remove_status'] = 'Статус автоматичного <br>видалення кеша';
$_['entry_cache_remove_status_help'] = 'Статус автоматичного <br>видалення кеша';


/* Add 22.0 */
$_['entry_minify_css_fonts_status_help'] = 'Статус переноса шрифтів <br>в об’єднаний файл шрифтів<br>Код прив’язки в head ';
$_['entry_minify_css_fonts_status'] = 'Перенесення шрифтів <br>в об’єднаний файл шрифтів';
$_['entry_minify_css_fonts_footer'] = 'Перенесення об’єднаного файла шрифтів вниз';
$_['entry_minify_css_fonts_footer_help'] = 'Статус Перенесення об’єднаного файла шрифтів вниз';


$_['entry_minify_css_ex_fonts'] = 'Винятки перенесення шрифтів';
$_['entry_minify_css_ex_fonts_help'] = 'Статус винятки перенесення шрифтів <br>Параметри <br>розділяються <br>"кареткою"(Enter)<br><span class="jc-help"># - вимикає</span>';
$_['entry_minify_css_fonts_defer'] = 'Відкладене (Lazy) завантаження об’єднаного файлу шрифтів';
$_['entry_minify_css_fonts_defer_help'] = 'Відкладене (Lazy) завантаження об’єднаного файлу шрифтів';
$_['entry_minify_css_fonts_defer_gps'] = 'Відкладене (Lazy) завантаження GPS об’єднаного файлу шрифтів';
$_['entry_minify_css_fonts_defer_gps_help'] = 'Відкладене (Lazy) завантаження GPS об’єднаного файлу шрифтів';

/* Add 23.0 */
$_['tab_bots'] = 'Боти';
$_['tab_bots_ajax'] = 'Боти Ajax';
$_['entry_bots_ajax'] = 'Статус';
$_['entry_bots_ajax_status_help'] = 'Статус "Боти Ajax"';
$_['entry_bots_ajax_add_route'] = 'Route сторінок';
$_['entry_bots_ajax_add_route_help'] = 'Параметри <br>розділяються <br>"кареткою"(Enter)<br><span class="jc-help"># - вимикає</span>';
$_['entry_bots_ajax_add_uri'] = 'URI сторінок';
$_['entry_bots_ajax_add_uri_help'] = 'Параметри <br>розділяються <br>"кареткою"(Enter)<br><span class="jc-help"># - вимикає</span>';
$_['entry_bots_ajax_add_get'] = 'GET параметри сторінок';
$_['entry_bots_ajax_add_get_help'] = 'Параметри <br>розділяються <br>"кареткою"(Enter)<br><span class="jc-help"># - вимикає</span>';
$_['entry_bots_ajax_server_response_1'] = 'Заголовок відповіді сервера (перший)';
$_['entry_bots_ajax_server_response_1_help'] = '';
$_['entry_bots_ajax_server_response_2'] = 'Заголовок відповіді сервера (другий)';
$_['entry_bots_ajax_server_response_2_help'] = '';
$_['entry_bots_ajax_server_response_3'] = 'Заголовок відповіді сервера (третій)';
$_['entry_bots_ajax_server_response_3_help'] = 'Можна відправити<br>(не рекомендується)<br>(наприклад, на підготовлену сторінку 404)<br>Location: /index.php?route=error/not_found';

/* Add 24.1 */
$_['entry_logs_attention'] = 'Увага';
$_['text_logs_attention'] = 'Даний функціонал логів тільки для налагодження роботи і налаштувань модуля (дебага).<br>По закінченню робіт з налагодження (дебага), вимкніть всі логи і видаліть лог файли.';

/* Add 24.3 */
$_['text_jetcache_ocmod'] = 'модифікатор';
$_['text_jetcache_ocmod_none'] = $_['text_jetcache_ocmod'] . ' не встановлено';
$_['ocmod_jetcache_text_on'] = '<span style="color:green">ввімкнений</span>';
$_['ocmod_jetcache_text_off'] = '<span style="color:red">вимкнено</span>';

/* Add 24.4 */
$_['tab_bots_options'] = 'Налаштування ботів';
$_['entry_jetcache_bots'] = 'Токен в user-agent ботів';
$_['text_jetcache_bots'] = 'Боти';
$_['entry_jetcache_bots_cookie'] = 'Кукі до ботів<br><span class="jc-help">Параметри розділяються "кареткою"(Enter)<br># - вимикає<br>Параметри до кук через |</span>';
$_['text_jetcache_bots_cookie'] = 'Кукі';

/* Add 25.0 */
$_['entry_pages_fast'] = 'Швидкий алгоритм';
$_['entry_pages_fast_help'] = 'Швидкий алгоритм';

/* Add 25.1 */
$_['entry_webp_gd'] = 'Оптимізація зображень за алгоритмом webp GD';
$_['entry_image_webp_gd_status'] = 'Статус оптимізації всіх зображень за алгоритмом webp GD<br><div class="jetcache-table-help">інші алгоритми будуть "відключені"</div>';
$_['entry_image_webp_gd_quality'] = 'Якість зображення<br><div class="jetcache-table-help">max: 100<br>min: 10</div>';
$_['entry_webp_gd_must'] = 'Вимоги:<br>Можливість запуску webp GD';
$_['entry_webp_gd_text'] = 'webp GD';
$_['entry_system_webp_gd_exec'] = 'Можливість виконання оптимізації webp GD';
$_['entry_system_image_webp_gd_original'] = 'Оригінальне зображення';
$_['entry_system_image_webp_gd_lossess'] = 'Оптимізоване зображення за алгоритмом webp GD';
$_['entry_image_webp_gd_png_status'] = 'Оптимізація PNG в webp GD';

$_['error_image_img_exec'] = 'Помилка оптимізації ';
$_['error_image_mozjpeg_exec'] = $_['error_image_img_exec'] . 'MozJpeg';
$_['error_image_jpegoptim_exec'] = $_['error_image_img_exec'] . 'JpegOptim';
$_['error_image_optipng_exec'] = $_['error_image_img_exec'] . 'OptiPNG';
$_['error_image_webp_exec'] = $_['error_image_img_exec'] . 'WebP';
$_['error_image_webp_gd_exec'] = $_['error_image_img_exec'] . 'WebP GD';

// Add in 26.0
$_['text_replacer_route'] = 'Макети (Схеми, routes)';
$_['text_replacer_more'] = 'Інші опції';
$_['text_replacer_options'] = 'Опції';
$_['text_replacer_device'] = 'Пристрої';
$_['text_replacer_device_all'] = 'Усі пристрої';
$_['text_replacer_device_comp'] = 'Комп&#39ютери';
$_['text_replacer_device_mob'] = 'Мобільні пристрої';
$_['text_replacer_device_smart'] = 'Смартфони';
$_['text_replacer_device_pad'] = 'Планшети';

$_['entry_html_remove_space'] = 'Прибрати зайві пробіли та табуляції';
$_['entry_html_remove_space_help'] = 'Прибрати зайві пробіли та табуляції';

// Add in 27.0
$_['text_jetcache_customer_groups'] = 'Групи покупців';
$_['text_jetcache_group_reg'] = 'Зареєстровані';
$_['text_jetcache_group_order'] = 'Ті, що купили товар в магазині';
$_['text_jetcache_group_order_this'] = 'Ті, що купили "цей" товар в магазині';
$_['text_jetcache_group_all'] = 'Всі групи покупців';

$_['text_jetcache_uri'] = 'URI';

$_['text_jetcache_langs'] = 'Мови<br><span class="jc-help">(Якщо жодна не обрана <br>- буде на всіх)</span>';
$_['text_jetcache_stores'] = 'Магазини<br><span class="jc-help">(Якщо жодний не обран <br>- буде на всіх)</span>';

// Add in 27.1
$_['entry_minify_js_preload_inline_remove_event'] = 'Прибрати з відкладених (Lazy) inline JS <br>події на DOMContentLoaded, яка вже завершилася';
$_['entry_minify_js_preload_inline_remove_event_help'] = $_['entry_minify_js_preload_inline_remove_event'];
$_['entry_minify_js_preload_server_remove_event'] = 'Прибрати з відкладених (Lazy) серверних JS <br>події на DOMContentLoaded, яка вже завершилася';
$_['entry_minify_js_preload_server_remove_event_help'] = $_['entry_minify_js_preload_server_remove_event'];

// Add in 27.2
$_['button_apply'] = 'Застосувати';
$_['text_apply_error'] = 'Помилка збереження';
$_['text_apply_success'] = '<i class="fa fa-check" aria-hidden="true"></i> Успішно';
$_['text_apply_no_access'] = 'Доступ заборонений';
$_['error_permission'] = $_['text_apply_no_access'];
$_['text_apply_refresh'] = '<i class="fa fa-check" aria-hidden="true"></i> Оновлено';


$_['ocmod_jetcache_mod_name'] = $_['jetcache_model'] . ' Mod';
$_['ocmod_jetcache_mod_mod'] = $_['jetcache_model_code'].'_mod';
$_['ocmod_jetcache_mod_html'] = $_['ocmod_jetcache_mod_name'] . ' модифікатор встановлено'; 


$_['ocmod_jetcache_data_name'] = $_['jetcache_model'] . ' Data View';
$_['ocmod_jetcache_data_mod'] = $_['jetcache_model_code'].'_data';
$_['ocmod_jetcache_data_html'] = $_['ocmod_jetcache_data_name'] . ' модифікатор встановлено';

$_['entry_images_product_preload'] = $_['entry_images_product_preload_help'] = 'Preload головного зображення <br>в карточці товара';

// Add in 28.0
$_['ocmod_jetcache_layout_name'] = $_['jetcache_model'] . ' Layout';
$_['ocmod_jetcache_layout_mod'] = $_['jetcache_model_code'].'_layout';
$_['ocmod_jetcache_layout_html'] = $_['ocmod_jetcache_layout_name'] . ' модифікатор встановлено';

$_['entry_device_detect'] = 'Підтримка визначення пристроїв для макетів <span class="jc-help">Дизайн -> Макети (layout)</span>';

// Add in 28.1
$_['url_text_jetcache_delete_text'] = '<div style="text-align: center; text-decoration: none;">Видалення всіх<br>налаштувань модуля<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(всі налаштування будуть видалені)</ins></div>';
$_['url_text_jetcache_delete_sure_text'] = '<div style="text-align: center; text-decoration: none;">ВИ ВПЕВНЕНІ !?<br>що хочете видалити усі налаштування?<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(всі налаштування будуть <br>безповоротно видалені)</ins></div>';
$_['url_text_jetcache_delete_sure_pre_text'] = '<div style="text-align: center; text-decoration: none;">Ви впевнені<br>що хочете видалити усі налаштування?<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(всі налаштування будуть <br>безповоротно видалені)</ins></div>';





$_['entry_minify_js_debug'] = 'Налагодження (debug) JS мініфікації<br><span class="jc-help">Вимикає усі JS скрипти<br>Після завершення налагодження <br>(debug) JS мініфікації - вимкніть<br></span>';
$_['entry_minify_js_debug_help'] = $_['entry_minify_js_debug'];

/* Add 29.0 */
$_['entry_no_cache'] = 'Кешувати ajax<br><span class="jc-help">(не рекомендується)</span>';
$_['entry_onefile'] = '1. В один "файл"';
$_['entry_ignore'] = '2. Ігнорувати';

$_['entry_debug'] = 'Debug mode';

$_['text_jetcache_loading_main'] = '<div style=&#92;\'color: #008000; &#92;\'>Завантажується...<i class=&#92;\'fa fa-refresh fa-spin&#92;\'></i></div>';
$_['text_jetcache_loading_main_without'] = '<div style="color: #008000">Завантажується...<i class="fa fa-refresh fa-spin"></i></div>';

$_['text_jetcache_check_ver'] = 'Перевірити нову версію';
$_['text_jetcache_error_server_connect'] = 'Помилка з`єднання з сервером';
$_['text_jetcache_server_date_state'] = 'За станом на';
$_['text_jetcache_current_version_text'] = '<div style="color: #306793;">Ваша поточна версія</div>';
$_['text_jetcache_last_version_text'] = '<div style="color: #306793;">Остання версія</div>';
$_['text_jetcache_update_yes'] = '<div style="color: red;">Рекомендується оновити модуль</div>';
$_['text_jetcache_update_no'] = '<div style="color: green;">Оновлення не потрібно, у вас остання версія модуля</div>';
$_['text_jetcache_error_text_jetcache_server_connect'] = 'Помилка з`єднання з сервером';
$_['text_jetcache_update_version_begin'] = "<div style='background: #F7FFF2; width: auto; border: 1px solid #E2EDDC; padding: 10px;'>Остання доступна версія модуля: <span style='font-size: 21px;'>";
$_['text_jetcache_update_version_end'] = "</span></div>";
$_['text_jetcache_new_version'] = "<div style='background: #FFCFCE; border: 2px solid red; padding: 10px;'>Встановлена версія модуля: <b><span style='color: red;'>" . $_['jetcache_version'] . "</span></b><br>"."Остання версія модуля: <span style='color: green;'><b>";
$_['text_jetcache_new_version_end'] = '</b></span><br>Рекомендується: <span style="color: green;"><b>оновіть модуль до останньої версії</b></span></div>';

