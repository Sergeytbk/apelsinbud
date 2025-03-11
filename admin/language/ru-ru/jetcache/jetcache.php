<?php
include('version.php');

$_['jetcache_model_code'] = 'jetcache';
$_['order_jetcache'] = '10';
$_['jetcache_model_settings'] = $_['heading_title_jc'] = $_['jetcache_model'].' '.$_['jetcache_version'];
$_['heading_title_jc'] = 'JetCache PRO <img style="margin-left:15px;height:35px;margin-top:10px;margin-bottom:10px;" src="https://dev-opencart.com/logob.svg" alt="Dev-opencart.com - Модули и шаблоны для Opencart"/></a>';
$_['heading_title'] = 'JetCache PRO <img style="margin-left:15px;height:35px;margin-top:10px;margin-bottom:10px;" src="https://dev-opencart.com/logob.svg" alt="Dev-opencart.com - Модули и шаблоны для Opencart"/></a>';

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

$_['text_enabled'] = 'Включено';
$_['text_disabled'] = 'Выключено';
$_['text_enabled_jc_module'] = 'Включено модуль';
$_['text_disabled_jc_module'] = 'Выключено модуль';


$_['heading_dev'] = 'Разработчик <a href="mailto:admin@opencartadmin.com" target="_blank">support.opencartadmin.com</a><br>&copy; 2011-'.date('Y') .' All Rights Reserved';
$_['entry_tab_options'] = 'Настройки';
$_['entry_id'] = 'ID';

$_['text_status'] = 'Статус';
$_['text_mod_add_jetcache'] = $_['jetcache_model'].' модификатор установлен<br>';

$_['entry_url_jetcache'] = 'Страница настроек модуля';

$_['tab_options'] = 'Настройки';
$_['tab_pages'] = 'Страницы';
$_['tab_cont'] = 'Контроллеры';
$_['tab_access'] = 'Доступ';
$_['tab_exceptions'] = 'Исключения';
$_['tab_query'] = 'Запросы';
$_['tab_model'] = 'Модели';
$_['tab_minify'] = 'PageSpeed';
$_['tab_minify_html'] = 'HTML';
$_['tab_minify_css'] = 'CSS';
$_['tab_minify_js'] = 'JS';
$_['tab_lazy'] = 'Изображения';

$_['entry_lazy_status'] = 'Отложенная загрузка изображений <br>"Lazy Loading Images"';
$_['entry_lazy_status_help'] = 'Правила замены<br>
Формат:<br>
"токен для земены"|"токен на который заменяем"<br>
разделитель "перевод каретки" PHP_EOL, <br>между токенами |';

$_['entry_minify_html'] = 'Минификация HTML<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_minify_html_status_help'] = 'Статус минификации HTML<br><span class="jc-help">(не рекомендуется включать,<br>так как на сервере обычно уже <br>включено сжатие gzip-м html, css и js)</span>';

$_['entry_minify_html_ex_route'] = 'Исключения route';
$_['entry_minify_html_ex_route_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_lazy_ex_route'] = 'Исключения route';
$_['entry_lazy_ex_route_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';



$_['entry_minify_ex_route'] = 'Исключения route';
$_['entry_minify_ex_route_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_css'] = 'Минификация CSS';
$_['entry_minify_css_status_help'] = 'Статус минификации CSS';

$_['entry_minify_css_ex_route'] = 'Исключения route';
$_['entry_minify_css_ex_route_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_css_compress_status'] = 'Сжатие CSS<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_minify_css_compress_status_help'] = 'Статус сжатия CSS<br><span class="jc-help">(не рекомендуется включать,<br>так как на сервере обычно уже <br>включено сжатие gzip-м html, css и js)</span>';

$_['entry_minify_css_footer'] = 'Перенос CSS вниз';
$_['entry_minify_css_footer_help'] = 'Статус переноса CSS вниз';


$_['entry_minify_css_ex_css_footer'] = 'Исключения из переноса CSS вниз';
$_['entry_minify_css_ex_css_footer_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_css_combine_status'] = 'Обьединение CSS файлов';
$_['entry_minify_css_combine_status_help'] = 'Статус обьединения CSS файлов<br>Код привязки в head';

$_['entry_minify_css_combine_footer'] = 'Перенос обьединеного файла CSS вниз';
$_['entry_minify_css_combine_footer_help'] = 'Статус переноса обьединеного файла CSS вниз';


$_['entry_minify_css_combine_preload'] = 'Отложенная загрузка обьединеного файла CSS';
$_['entry_minify_css_combine_preload_help'] = 'Статус отложенной загрузки обьединеного файла CSS';


$_['entry_minify_css_preload'] = 'Отложенная загрузка CSS';
$_['entry_minify_css_combine_preload_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_css_ex_combine'] = 'Исключения из обьединения CSS';
$_['entry_minify_css_ex_combine_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_css_in_inline'] = 'Файлы CSS inline in HTML';
$_['entry_minify_css_in_inline_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_css_combine_inline'] = 'Перенос inline style в обьединеный файл CSS';
$_['entry_minify_css_combine_inline_help'] = 'Статус переноса inline style в обьединеный файл CSS';





$_['entry_minify_css_compress_type'] = 'Агрессивный алгоритм сжатия CSS';
$_['entry_minify_css_compress_type_help'] = 'Статус агрессивного алгоритм сжатия CSS';


$_['entry_minify_css_combine_inline_code'] = 'Код inline style в файл обьединения CSS';
$_['entry_minify_css_combine_inline_code_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_css_inline_footer'] = 'Перенос inline style CSS вниз';
$_['entry_minify_css_inline_footer_help'] = 'Статус переноса inline style CSS вниз';

$_['entry_minify_js'] = 'Минификация JS';
$_['entry_minify_js_status_help'] = 'Статус минификации JS';

$_['entry_minify_js_ex_route'] = 'Исключения route';
$_['entry_minify_js_ex_route_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_js_compress_status'] = 'Сжатие JS<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_minify_js_compress_status_help'] = 'Статус сжатия JS<br><span class="jc-help">(не рекомендуется включать,<br>так как на сервере обычно уже <br>включено сжатие gzip-м html, css и js)</span>';


$_['entry_minify_js_ex_compress'] = 'Исключения из сжатия';
$_['entry_minify_js_ex_compress_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_js_footer'] = 'Перенос JS вниз';
$_['entry_minify_js_footer_help'] = 'Статус переноса JS вниз';

$_['entry_minify_js_first'] = 'JS раньше CSS';
$_['entry_minify_js_first_help'] = 'Статус JS раньше CSS';

$_['entry_minify_js_ex_js_footer'] = 'Исключения из переноса JS вниз';
$_['entry_minify_js_ex_js_footer_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_js_combine_status'] = 'Обьединение JS файлов';
$_['entry_minify_js_combine_status_help'] = 'Статус обьединения JS файлов<br>Код привязки в head';

$_['entry_minify_js_combine_footer'] = 'Перенос обьединеного файла JS вниз';
$_['entry_minify_js_combine_footer_help'] = 'Статус переноса обьединеного файла JS вниз';


$_['entry_minify_js_ex_combine'] = 'Исключения из обьединения JS';
$_['entry_minify_js_ex_combine_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_js_in_inline'] = 'Файлы JS inline in HTML';
$_['entry_minify_js_in_inline_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_js_combine_inline'] = 'Перенос inline JS в обьединеный файл JS';
$_['entry_minify_js_combine_inline_help'] = 'Статус переноса inline JS в обьединеный файл JS';


$_['entry_minify_js_ex_combine_inline'] = 'Исключения кода inline JS из обьединения JS';
$_['entry_minify_js_ex_combine_inline_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_js_inline_footer'] = 'Перенос inline JS вниз';
$_['entry_minify_js_inline_footer_help'] = 'Статус переноса inline JS вниз';


$_['entry_minify_js_ex_inline_footer'] = 'Исключения из переноса inline JS вниз';
$_['entry_minify_js_ex_inline_footer_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_js_preload'] = 'Отложенная загрузка JS';
$_['entry_minify_js_combine_preload_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_js_compress_type'] = 'Агрессивный алгоритм сжатия JS';
$_['entry_minify_js_compress_type_help'] = 'Статус агрессивного алгоритм сжатия JS';




$_['tab_doc'] = 'Документация';
$_['tab_logs'] = 'Логи';
$_['tab_main'] = 'Главная';
$_['tab_clear'] = 'Очистка кеша';

$_['entry_db_status'] = 'Кешировать в БД<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_pages_db_status_help'] = 'Кешировать <br>страницы в БД<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_cont_db_status_help'] = 'Кешировать <br>контроллеры в БД<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_model_db_status_help'] = 'Кешировать методы <br>моделей в БД<br><span class="jc-help">(не рекомендуется)</span>';

$_['entry_add_rule'] = 'Добавить';
$_['entry_ex_route'] = 'Route';
$_['entry_ex_routes'] = 'Исключения Routes';

$_['entry_pages_status_help'] = 'Страницы будут <br>кешироваться в файловый кеш<br>если не включено кеширование в БД';
$_['entry_ex_routes_help'] = 'Исключения Route';

$_['entry_pages_forsage'] = 'Форсаж';
$_['entry_pages_forsage_help'] = 'При включении этой функции, будет включен <br>принудительный вызов страниц из кеша как можно раньше';



$_['entry_ex_pages'] = 'Исключения URI';
$_['entry_ex_page'] = 'URI';
$_['entry_ex_page_accord'] = 'Соотвествие';
$_['entry_ex_pages_help'] = 'REQUEST_URI исключения<br><span class="jc-help"># - выключает</span>';

$_['entry_cont_status_help'] = 'Статус кеширования контроллеров';
$_['entry_add_conts_help'] = 'Контроллеры которые <br>надо кешировать';
$_['entry_add_conts'] = 'Контроллеры';
$_['entry_add_cont'] = 'Контроллер';

$_['entry_cache_mobile_detect'] = 'Определение мобильного устройства';
$_['entry_jetcache_info_status'] = 'Информационная панель <br><span class="jc-help">Показывается только администраторам</span><span class="jetcache-table-help-href">?</span>';

$_['entry_jetcache_info_demo_status'] = '<br>демо режим<br>(показывать всем)';


$_['entry_model_status_help'] = 'Включить / отключить <br>кеширование методов в моделях';
$_['entry_model_product_status'] = 'Модель catalog/product';
$_['entry_model_gettotalproducts_status'] = 'Метод getTotalProducts';
$_['entry_model_gettotalproducts_status_help'] = 'Кешировать метод <br>подсчета продуктов <br>в категориях';

$_['entry_seocms_jetcache_alter'] = 'Альтернативный метод <br>записи в кеш файл';
$_['entry_seocms_jetcache_gzip_level'] = 'Сжатие (gzip) данных в кеш <br><span class="jc-help">(0 - не сжимать, <br> 0 - быстрее, но занимает <br>больше места на диске)</span>';
$_['entry_seocms_jetcache_gzip_level_help'] = 'Не путать со сжатием HTML страницы <br>Это сжатие файла кеша';


$_['text_gettotalproducts_uri_status'] = 'Зависимость от URL';

$_['entry_ex_session'] = 'Исключенные параметры сессии';
$_['entry_ex_session_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br>PHP_EOL';

$_['entry_session_log'] = 'Протоколирование <br>переменных сессии <br>в лог файл';
$_['entry_cache_max_hache_folders_level'] = 'Уровень папок в кеше';
$_['entry_no_getpost'] = 'Не реагировать на <br>GET и SESSION';


$_['entry_query_status_help'] = 'Статус кеширования запросов <br>Имеет смысл кешировать запросы, <br>если есть медленные запросы более 0.01 c';
$_['entry_query_db_status_help'] = 'Кеширование запросов в БД <br>Простой запрос кеша из БД <br>будет быстрее сложного и медленного';
$_['entry_query_log_settings'] = 'Настройки лога запросов';
$_['entry_query_log_status'] = 'Статус лог файла запросов';
$_['entry_query_log_maxtime'] = 'Время с которого протоколировать запрос <br><span class="jc-help">(секунды, дробное через точку), пример: 0.1 <br>0.1 секунды, это  100 мс</span>';
$_['entry_query_log_file'] = 'Файл, лог медленных запросов, <br>имя файла в папке лог файлов opencart';
$_['entry_query_model_title'] = 'Запросы которые кешируются для классов и их методов';
$_['entry_query_model_help'] = 'Запросы которые будут кешироваться из моделей и методов <br>Класс модели, к примеру: ModelCatalogProduct <br>Метод модели, к примеру: getTotalProducts <br>Если поле Метод пустое, то будут кешироваться все методы модели';
$_['entry_query_model'] = 'Класс';
$_['entry_query_method'] = 'Метод';

$_['button_buildcache'] = 'Создать кеш';
$_['button_buildcache_abort'] = 'Отмена';
$_['message_buildcache_aborted'] = '<span style="color: red;">Отменено</span>';
$_['message_buildcache_complete'] = '<span style="color: green;">Выполнено</span>';
$_['message_buildcache_processing'] = '<span style="color: #16A9DE;">Обработано</span>';
$_['message_buildcache_processing_complete'] = '<span style="color: #16A9DE;">Выполнено</span>';
$_['entry_jetcache_builcache_gen'] = 'Генерировать кеш<br><span class="jc-help">(не рекомендуется)</span>';


$_['label_buildcache_with_products'] = 'С товарами';
$_['label_buildcache_with_lang'] = 'Все языки';

$_['label_buildcache_with_products_title_info'] = 'С товарами';
$_['label_buildcache_with_lang_title_info'] = 'Все языки';


$_['label_buildcache_with_products_data_content'] = 'Генерировать кеш со страницами товаров <br> Если большое количество товаров может занять много времени';
$_['label_buildcache_with_lang_data_content'] = 'Генерировать кеш для страниц всех языков <br>Если язык один или вы не используете языковые префиксы (поддомены) для каждого языка отмечать не надо';


$_['text_jetcache_success'] = 'Успешно';

$_['entry_log_file_unlink'] = 'Удалить файл';
$_['entry_log_file_view'] = 'Просмотреть файл';
$_['unlink_success'] = 'Успешно';
$_['unlink_unsuccess'] = 'Неудачно. Файл не найден';
$_['access_denided'] = 'Доступ закрыт';


$_['ocmod_jetcache_name'] = $_['jetcache_model'];
$_['ocmod_jetcache_name_15'] = $_['jetcache_model'].' 15';

$_['ocmod_jetcache_db_name'] = $_['jetcache_model'].' DB';
$_['ocmod_jetcache_db_mod'] = $_['jetcache_model_code'].'_db';
$_['ocmod_jetcache_db_html'] = $_['ocmod_jetcache_db_name'].' модификатор успешно установлен';


$_['ocmod_jetcache_cat_name'] = $_['jetcache_model'].' Categories';
$_['ocmod_jetcache_cat_mod'] = $_['jetcache_model_code'].'_cat';
$_['ocmod_jetcache_cat_html'] = $_['ocmod_jetcache_cat_name'].' модификатор успешно установлен';


$_['ocmod_jetcache_menu_name'] = $_['jetcache_model'] . ' Menu';
$_['ocmod_jetcache_menu_mod'] = $_['jetcache_model_code'] . '_menu';
$_['ocmod_jetcache_menu_html'] = $_['ocmod_jetcache_menu_name'] . ' модификатор успешно установлен';

$_['ocmod_jetcache_image_name'] = $_['jetcache_model'].' Image';
$_['ocmod_jetcache_image_mod'] = $_['jetcache_model_code'].'_image';
$_['ocmod_jetcache_image_html'] = $_['ocmod_jetcache_image_name'].' модификатор успешно установлен';

$_['ocmod_jetcache_mod'] = $_['jetcache_model_code'];
$_['ocmod_jetcache_mod_15'] = $_['jetcache_model_code'].'_15';


$_['ocmod_jetcache_author'] = 'support.opencartadmin.com';
$_['ocmod_jetcache_link'] = 'https://support.opencartadmin.com';
$_['jetcache_ocas'] = 'https://support.opencartadmin.com/index.php?route=record/ver';

$_['ocmod_jetcache_html'] = $_['ocmod_jetcache_name'].' модификатор успешно установлен';


$_['entry_install_update'] = 'Установка / обновление';
$_['url_create_text'] = '<div style="text-align: center; text-decoration: none;">Установка и обновление<br>модификаторов, данных модуля<br>(выполняется при установке или обновлении модуля)</div>';

$_['text_refresh_ocmod_successfully'] = '<span style="color:green">Модификаторы успешно обновлены</span>';
$_['text_refresh_ocmod_success'] = 'Модификаторы успешно обновлены';

$_['text_refresh_ocmod_error'] = '<span style="color:red">Ошибка обновления модификаторов</span>';

$_['entry_model_help'] = 'Классы и методы моделей <br>для кеширования';

$_['entry_model_status'] = 'Кеширование моделей';
$_['entry_model_title'] = 'Классы и методы моделей для кеширования';
$_['entry_no_vars'] = 'Не реагировать на:<br> 1. GET параметры<br> 2. SESSION параметры<br> 3. URL адрес<br> 4. ROUTE';

$_['entry_ex_get'] = 'Исключенные параметры GET';
$_['entry_ex_get_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br>PHP_EOL';

$_['entry_lastmod_status'] = 'Статус заголовка Last-Modified';
$_['entry_lastmod_help'] = 'Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T').',filemtime(кеш файла)<br>HTTP/1.1 304 Not Modified <br><br>Если не работает попробуйте в файл <br>.htaccess добавить правило после <br>RewriteRule ^([^?]*) index.php?_route_=$1 [L,QSA]<br><br><span style="color: green;">RewriteRule ^(.*)$ $1 [E=HTTP_IF_MODIFIED_SINCE:%{HTTP:If-Modified-Since}]</span><br>или
<br><span style="color: green;">RewriteRule .* - [E=HTTP_IF_MODIFIED_SINCE:%{HTTP:If-Modified-Since}]<br>RewriteRule .* - [E=HTTP_IF_NONE_MATCH:%{HTTP:If-None-Match}]</span><br><br>Если у вас связка nginx+php<br>отредактируйте config<br>
<br>
location ~ .php$<br>
{<br>
 …<br>
 if_modified_since off;<br>
<br>
 fastcgi_pass fcgi;<br>
 fastcgi_index index.php;<br>
 fastcgi_param SCRIPT_FILENAME /<путь > /web$fastcgi_script_name;<br>
 …<br>
 fastcgi_pass_header Last-Modified;<br>
 include fastcgi_params;<br>
}<br>
';

$_['entry_cachecontrol_status'] = 'Статус заголовка Cache-Control<br><span style="color:#999;">(не рекомендуется включать)</span>';
$_['entry_cachecontrol_help'] = 'Cache-Control:public, max-age=31536000';

$_['entry_expires_status'] = 'Статус заголовка Expires<br><span style="color:#999;">(не рекомендуется включать)</span>';
$_['entry_expires_help'] = 'Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 604800);

$_['ocmod_file_agoo_catalog_product_unlink_successfully'] = 'Файл старой версии <br>/catalog/model/agoo/catalog/product.php<br> успешно удален<br><br>';

/***************/

$_['entry_widget_status'] = "Статус";
$_['entry_cache_expire'] = 'Время жизни кеш файла <br>модуля (в секундах)';
$_['entry_cache_max_files'] = 'Максимальное количество файлов <br>в папке кеша модуля';
$_['entry_cache_maxfile_length'] = 'Максимальный размер <br>кеш файла модуля (в байтах)';
$_['entry_cache_auto_clear'] = 'Автоматическое очищение <br>всего кеша (в часах)';
$_['entry_tab_settings_cache'] = 'Кеш и модификаторы';
$_['entry_jetcache_ocmod_refresh'] = 'Обновить <br><span class="sc-color-clearcache">модификаторы</span>';
$_['text_url_ocmod_refresh'] = 'Обновить';
$_['text_ocmod_refresh_success'] = 'Выполнено';
$_['text_ocmod_refresh_fail'] = 'Не удалось обновить';
$_['entry_jetcache_cache_remove'] = 'Удалить кеш <br><span class="sc-color-clearcache">файлов</span>';
$_['text_url_cache_remove'] = 'Удалить кеш';
$_['text_cache_remove_success']	= '<i class="fa fa-check" aria-hidden="true"></i> Выполнено';
$_['text_cache_remove_success_select']	= 'Удалено выборочно';
$_['text_cache_remove_fail'] = 'Не удалось удалить';
$_['text_jetcache_about'] = 'О модуле';
$_['entry_jetcache_cache_image_remove'] 	= 'Удалить ресайзы <br><span class="sc-color-clearcache">изображений</span>';
$_['text_url_cache_image_remove'] 	= 'Удалить ресайзы';
$_['text_cache_image_remove_success']	= 'Выполнено';
$_['text_cache_image_remove_fail'] 	= 'Не удалось удалить';
$_['entry_store'] = 'Магазины:';
$_['text_default_store'] = 'Основной магазин';
$_['text_loading_main']         = '<div style=&#92;\'color: #008000;&#92;\'>Загружается...<i class=&#92;\'fa fa-refresh fa-spin&#92;\'></i></div>';
$_['text_loading_main_without'] = '<div style="color: #008000">Загружается...<i class="fa fa-refresh fa-spin"></i></div>';

$_['text_faq'] = '';
$_['text_separator'] = ' > ';

$_['entry_add_category'] = 'Очистка кеша (полная)<br>при добавлении, изменении, <br>удалении категории';
$_['entry_add_category_help'] = 'При включенной настройке будет произведена полная очистка кеша';
$_['label_add_category'] = 'Очистка кеша при добавлении, изменении, удалении категории';
$_['label_add_category_content'] = 'При включенной настройке будет произведена полная очистка кеша';

$_['entry_add_product'] = 'Очистка кеша (полная)<br>при добавлении, удаления продукта';
$_['entry_add_product_help'] = 'При включенной настройке будет произведена полная очистка кеша';
$_['label_add_product'] = 'Очистка кеша при добавлении, удалении продукта';
$_['label_add_product_content'] = 'При включенной настройке будет произведена полная очистка кеша';

$_['entry_edit_product'] = 'Очистка кеша (полная)<br>при изменении продукта';
$_['entry_edit_product_help'] = 'При включенной настройке будет произведена полная очистка кеша';
$_['label_edit_product'] = 'Очистка кеша при изменении продукта';
$_['label_edit_product_content'] = 'При включенной настройке будет произведена полная очистка кеша';

$_['entry_edit_product_id'] = 'Очистка кеша (связанная) <br>при изменении продукта';
$_['label_edit_product_id_content'] = "При включенной настройке будет произведена очистка кеша <br>только связанных кеш файлов с продуктом <br><span style='color: red;'>Внимание! Немного замедляет работу при записи в кеш. <br>Из кеша также быстро</span>";
$_['entry_edit_product_id_help'] = $_['label_edit_product_id_content'];
$_['label_edit_product_id'] = 'Связанная очистка кеша при изменении продукта';


$_['entry_query_log_status_title'] = 'Статус&nbsp;лог&nbsp;файла&nbsp;запросов';
$_['entry_query_log_status_content'] = 'Не забудьте отключать после анализа запросов<br>и удалить лог запросов <br><span style="color: red;">Внимание! Статус запросов (таб Запросы) должен быть включен</span>';

$_['entry_jetcache_menu_status'] = 'Статус <i class="fa fa-dot-circle-o"></i> Jet Cache в меню';
$_['entry_jetcache_menu_order'] = 'Порядок пункта <i class="fa fa-dot-circle-o"></i> Jet Cache в меню, после "номера" <br>пункта в меню <br>номер:';

$_['text_status_on'] = 'включено';
$_['text_status_off'] = 'выключено';

$_['text_js_status_on'] = '<i style="font-size: 11px;" class="fa fa-dot-circle-o"></i></span> ' . 'Jet Cache <span style="margin-left: 6px; color: #eeffee;"> '.$_['text_status_on'] ;
$_['text_js_status_off'] = 'Jet Cache <span style="margin-left: 6px; color: #fccccc;"> '.$_['text_status_off'] .' </span>';

$_['text_ocmod_refresh'] = 'Обновить&nbsp;модификаторы';

$_['text_close'] = 'Закрыть';

$_['entry_session_log_file'] = 'Файл, лог сессии,<br>имя файла в папке лог файлов opencart';

$_['entry_session_log_settings'] = 'Настройка лога сессии';
$_['entry_session_log_settings_help'] = 'При включении вы можете протоколировать <br>переменные сессии и по надобности заносить их в исключения';
$_['entry_query_log_settings_help'] = 'При включении вы можете анализировать <br>запросы и по надобности заносить их в настройки<br>Внимание статус запросов должен быть включен';

$_['entry_model_original_status_help'] = 'Использовать оригинальный метод model класса Loader';

$_['entry_cont_log_settings'] = 'Настройки лога контроллеров';
$_['entry_cont_log_settings_help'] = 'При включении вы можете протоколировать <br>скорость выполнения контроллеров';
$_['entry_cont_log_status'] = 'Статус лог файла контроллеров';
$_['entry_cont_log_maxtime'] = 'Время с которого протоколировать контроллер <br><span class="jc-help">(секунды, дробное через точку), пример: 0.1 <br>0.1 секунды, это  100 мс</span>';
$_['entry_cont_log_file'] = 'Файл лог, скорости <br>выполнения контроллеров,<br>имя файла в папке лог файлов opencart';
$_['entry_cont_log_settings_help'] = 'При включении вы можете анализировать <br>скорость выполнения контроллеров';
$_['entry_cont_log_status_title'] = 'Статус&nbsp;лог&nbsp;файла&nbsp;контроллеров';
$_['entry_cont_log_status_content'] = 'При включении вы можете анализировать <br>скорость выполнения контроллеров, <br>чтобы занести их в кеширование контроллеров';

$_['tab_image_options'] = 'Настройки';
$_['tab_image_ex'] = 'Исключения';
$_['entry_image_status'] = 'Статус оптимизации изображений';
$_['entry_image_ex'] = 'Исключения';
$_['entry_image_status_help'] = 'При включенном статусе будет <br>производиться оптимизация изображений';
$_['entry_image_ex_help'] = 'Исключения';

$_['entry_image_status_error_text'] = 'Система не отвечает всем требованиям для оптимизации';

$_['entry_image_status_error'] = 'Статус системы';
$_['entry_mozjpeg'] = 'Оптимизация JPEG по алгоритму mozjpeg';
$_['entry_webp'] = 'Оптимизация изображений по алгоритму webp Google';
$_['entry_jpegoptim'] = 'Оптимизация JPEG по алгоритму jpegoptim';
$_['entry_optipng'] = 'Оптимизация PNG по алгоритму optipng';


$_['entry_image_status_error_must_text'] = 'Требования системы:<br><div style="text-align: left !important;">
Linux платформа (OC)<br>
Включенная функция php exec на стороне сервера <br>
или включенная функция php proc_open на стороне сервера <br>
Права на выполнения (0755) для файлов webp, mozjpeg, jpegoptim и optipng <br>
Возможность запуска webp, mozjpeg, jpegoptim и optipng
</div>';

$_['entry_image_webp_status'] = 'Статус оптимизации всех изображений по алгоритму webp<br><div class="jetcache-table-help">остальные алгоритмы "отключаются"</div>';
$_['entry_image_webp_lossess'] = 'Оптимизация без потерь<br><div class="jetcache-table-help">ключ -lossless</div>';
$_['entry_webp_must'] = 'Требования:<br>Права на выполнения (0755) для файлов webp<br>Возможность запуска webp';
$_['entry_webp_text'] = 'webp';

$_['entry_image_webp_command'] = 'Опции командной строки';
$_['entry_image_mozjpeg_command'] = 'Опции командной строки';
$_['entry_image_jpegoptim_command'] = 'Опции командной строки';
$_['entry_image_optipng_command'] = 'Опции командной строки';

$_['entry_image_webp_relative_url'] = 'Относительный URL изображений';


$_['entry_image_mozjpeg_status'] = 'Статус оптимизации изображений JPEG по алгоритму mozjpeg';
$_['entry_image_mozjpeg_optimize'] = 'Максимальная оптимизация (медленно)<br><div class="jetcache-table-help">ключ -optimize</div>';
$_['entry_image_mozjpeg_progressive'] = 'Прогрессивный алгоритм JPEG<br><div class="jetcache-table-help">ключ -progressive</div>';
$_['entry_mozjpeg_must'] = 'Требования:<br>Права на выполнения (0755) для файлов mozjpeg<br>Возможность запуска mozjpeg';
$_['entry_mozjpeg_text'] = 'mozjpeg';

$_['entry_image_jpegoptim_status'] = 'Статус оптимизации изображений JPEG по алгоритму jpegoptim';
$_['entry_image_jpegoptim_optimize'] = 'Форсированная оптимизация<br><div class="jetcache-table-help">ключ --force</div>';
$_['entry_image_jpegoptim_progressive'] = 'Прогрессивный алгоритм JPEG<br><div class="jetcache-table-help">ключ --all-progressive</div>';
$_['entry_jpegoptim_must'] = 'Требования:<br>Права на выполнения (0755) для файлов jpegoptim<br>Возможность запуска jpegoptim';
$_['entry_jpegoptim_text'] = 'jpegoptim';

$_['entry_image_jpegoptim_strip'] = 'Удалить EXIF и комментарии<br><div class="jetcache-table-help">ключ --strip-all --strip-iptc</div>';
$_['entry_image_jpegoptim_level'] = 'Уровень компрессии<br><span class="jc-help">Целое число 1-99, <br>без знака процента<br>Хотите без потери качества - <br>не заполняйте</span><br><div class="jetcache-table-help">указывать от 1 до 99, <br>если не заполнять - без потери качества</div>';
$_['entry_image_jpegoptim_size'] = 'Размер файла в процентах<br>от оригинального<br><span class="jc-help">Целое число 1-99, <br>без знака процента<br>Хотите без потери качества - <br>не заполняйте</span><br><div class="jetcache-table-help">указывать от 1 до 99, <br>если не заполнять - без потери качества</div>';


$_['entry_image_optipng_status'] = 'Статус оптимизации изображений PNG по алгоритму optipng';
$_['entry_optipng_must'] = 'Требования:<br>Права на выполнения (0755) для файлов optipng<br>Возможность запуска optipng';
$_['entry_optipng_optimize_level'] = 'Уровень оптимизации optipng<br><span class="jc-help">Рекомендуем 1 или 2</span><br><div class="jetcache-table-help">ключ –oX,<br>где о – сокр. от optimization, X – уровень сжатия (1-7), где 7 - максимальный, но медленный, 1 - быстрый, но минимальный</div>';
$_['entry_optipng_text'] = 'optipng';


$_['entry_features_system'] = 'Возможности системы (тест)';

$_['entry_system_linux_status'] = 'Linux платформа (ОС)';
$_['entry_system_exec_status'] = 'Включенная функция php exec';
$_['entry_system_proc_open'] = 'Включенная функция php proc_open';

$_['entry_system_webp_perms'] = 'Права на выполнение webp <span class="jc-help">(0755)</span>';
$_['entry_system_webp_exec'] = 'Возможность выполнения оптимизации webp';
$_['entry_system_image_webp_original'] = 'Оригинальное изображение';
$_['entry_system_image_webp_lossess'] = 'Оптимизированное изображение по алгоритму webp';


$_['entry_system_mozjpeg_perms'] = 'Права на выполнение mozjpeg <span class="jc-help">(0755)</span>';
$_['entry_system_mozjpeg_exec'] = 'Возможность выполнения оптимизации mozjpeg';
$_['entry_system_image_mozjpeg_original'] = 'Оригинальное изображение JPEG';
$_['entry_system_image_mozjpeg_optimized'] = 'Оптимизированное изображение JPEG по алгоритму mozjpeg';

$_['entry_system_jpegoptim_perms'] = 'Права на выполнение jpegoptim <span class="jc-help">(0755)</span>';
$_['entry_system_jpegoptim_exec'] = 'Возможность выполнения оптимизации jpegoptim';
$_['entry_system_image_jpegoptim_original'] = 'Оригинальное изображение JPEG';
$_['entry_system_image_jpegoptim_optimized'] = 'Оптимизированное изображение JPEG по алгоритму jpegoptim';


$_['entry_system_optipng_perms'] = 'Права на выполнение optipng <span class="jc-help">(0755)</span>';
$_['entry_system_optipng_exec'] = 'Возможность выполнения оптимизации optipng';
$_['entry_system_image_optipng_original'] = 'Оригинальное изображение PNG';
$_['entry_system_image_optipng_optimized'] = 'Оптимизированное изображение PNG по алгоритму optipng';

$_['entry_system_yes'] = '<span class="jetcache-green">соответствует</span>';
$_['entry_system_no'] = '<span class="jetcache-red">Не соответствует</span>';
$_['text_system_byte'] = '<span class="">байт</span>';

$_['error_image_exec'] = 'Функция php exec - выключена';
$_['error_image_proc_open'] = 'Функция php proc_open - выключена';
$_['error_image_linux'] = 'Не linux платформа';


$_['entry_ex_key'] = 'Очистка всего кеша через связанный параметр <br>очистки кеша opencart $this->cache->delete(\'параметр\');';
$_['text_ex_key'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_header_categories_status'] = 'Кеширование категорий меню в header';
$_['entry_header_categories_status_help'] = 'Кеширование стандартного расчета категорий товаров <br>для меню в контроллере header.php';


$_['entry_tab_cont_categories'] = 'Категории';
$_['entry_tab_cont_ajax'] = 'Ajax';

$_['entry_cont_ajax_status'] = 'Статус ajax загрузки контроллеров';
$_['entry_cont_ajax_status_help'] = 'Ajax загрузка контроллеров<br>Рекомендуется не использовать <br>без особой надобности';

$_['entry_cont_ajax_route'] = 'Route контроллеров ajax загрузки';
$_['entry_cont_ajax_route_help'] = 'Route контроллеров ajax загрузки<br>Параметры разделяются <br>переводом "каретки" <br><span class="jc-help"># "хештег" первым символом в строке <br>выключает "строку" route</span>';

$_['entry_cont_ajax_header'] = 'Замена &lt;head&gt;...&lt;/head&gt; на загруженный из ajax';
$_['entry_cont_ajax_header_help'] = 'Включать <b>только</b> когда в ajax контроллерах <br>есть вызов $this->document->...<br>Возможно одномоментное мерцание';


$_['entry_ex_session_black_status'] = 'Параметры сессии (статус алгоритма "черный список")';
$_['entry_ex_session_black_status_help'] = 'Параметры сессии (статус алгоритма "черный список")';
$_['entry_ex_session_black'] = 'Параметры сессии ("черный список")';
$_['entry_ex_session_black_help'] = 'На какие параметры сессии реагировать кешу. <br>Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_ex_cookie'] = 'Параметры cookie ("черный список")';
$_['entry_ex_cookie_help'] = 'На какие параметры cookie реагировать кешу. <br>Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_cont_ajax_delay'] = 'Задержка при загрузке (миллисекунд)';
$_['entry_cont_ajax_delay_help'] = 'Задержка при загрузке <br>в миллисекундах (1 секунда = 1000 мс)';

$_['text_cont_ajax_route'] = 'Route контроллера';
$_['text_cont_ajax_status'] = 'Статус';
$_['text_cont_ajax_scripts'] = 'Статус скриптов';
$_['text_cont_ajax_delay'] = 'Задержка';
$_['text_cont_ajax_md5'] = 'Хеш (md5) настроек';
$_['text_cont_ajax_action'] = 'Действие';
$_['entry_cart_interval'] = 'Интервал session для корзины<br>(в минутах)';

$_['entry_jetcache_index_status'] = 'Старт таймера в index.php';
$_['entry_no_vars_cont'] = 'Не реагировать на:<br>1. GET: Реагировать<br> только на параметры<br>2. GET параметры<br>3. SESSION параметры<br>4. URL адрес<br>5. ROUTE';

$_['entry_action'] = 'Действие';

$_['text_jc_doc_faq'] = 'FAQ: Почему нет полного описания всех настроек?<br>
<br>
Модули кеширования самые сложные модули в opencart (это вам не простейшие модули, где все данные и задачи известны)
<br>
В кешировщиках не известны входящие данные (какие будут контроллеры и т.п.), так же как неизвестны и выходящие.<br>
Невозможно описать сотни тысяч тем, модулей, их методов, моделей (и их методов тоже), библиотек и их "хитросплетений"<br>
<b>Вариантов комбинаций настроек сотни миллиардов.</b><br>
Как описать, подскажите? ;) Вот и я не знаю как физически можно описать сотни миллиардов вариантов настроек.<br>
Поэтому есть настройки по умолчанию в демо магазине. Повторите их - они работоспособны в 90% конфигураций<br>
А лучше закажите настройку у специалистов, чтобы модуль работал на полную мощность.<br>
Они проведут анализ лог файлов работы контроллеров, моделей, запросов <br>и сконфигурируют модуль согласно найденных узких мест<br>
С уважением, разработчик Jet Cache - support.opencartadmin.com
';

$_['entry_show_pro_settings'] = 'Показать PRO настройки';
$_['entry_hide_pro_settings'] = 'Скрыть PRO настройки';

$_['text_no_access'] = 'У вас нет прав доступа';



$_['entry_minify_css_preload_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';
$_['entry_minify_js_preload_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_cont_log_crop'] = 'Обрезать параметры в логе';

$_['entry_minify_js_preload_desktop'] = 'Отложенная загрузка для desktop версии';
$_['entry_minify_js_preload_desktop_рудз'] = 'Статус отложенной загрузки для desktop версии';



$_['entry_minify_js_preload_desktop_help'] = 'Статус отложенной загрузки для desktop версии';
$_['entry_minify_js_inline_compress_status'] = 'Сжатие inline JS<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_minify_js_inline_compress_status_help'] = 'Статус сжатия inline JS<br><span class="jc-help">(не рекомендуется включать,<br>так как на сервере обычно уже <br>включено сжатие gzip-м html, css и js)</span>';
$_['entry_minify_css_inline_compress_status'] = 'Сжатие inline CSS<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_minify_css_inline_compress_status_help'] = 'Статус сжатия inline CSS<br><span class="jc-help">(не рекомендуется включать,<br>так как на сервере обычно уже <br>включено сжатие gzip-м html, css и js)</span>';

$_['tab_service'] = 'Сервис';
$_['entry_jc_backup'] = 'Настройки <br><span style="color: green;">cохранить</span>';
$_['entry_jc_restore'] = 'Настройки <br><span style="color: green;">восстановить</span>';

$_['text_jc_url_backup'] = 'Сохранить';
$_['text_jc_url_restore'] = 'Восстановить';

$_['text_jc_backup_success'] = '<span style="color: green;">Настройки сохранены</span>';
$_['text_jc_restore_success'] = '<span style="color: green">Настройки восстановлены</span>';

$_['text_jc_backup_fail'] = 'Не удалось сохранить настройки';
$_['text_jc_restore_fail'] = 'Не удалось восстановить настройки';

$_['text_jc_backup_access'] = '<span style="color: red;">У вас нет прав доступа</span>';
$_['text_jc_restore_access'] = '<span style="color: red;">У вас нет прав доступа</span>';

$_['text_jc_settings_no_format'] = '<span style="color: red;">Неправильный формат настроек</span>';
$_['text_jc_json_error'] = '<span style="color: red;">Ошибка декодирования JSON</span>';
$_['text_jc_error_filetype'] = '<span style="color: red;">Неправильный тип файла</span>';


$_['entry_minify_js_afterload_time_desktop'] = 'Автоматическое время загрузки <br>отложенных скриптов после DOMContentLoaded для desktop';
$_['entry_minify_js_afterload_time_mobile'] = 'Автоматическое время загрузки <br>отложенных скриптов после DOMContentLoaded для mobile';
$_['entry_minify_js_afterload_time_desktop_help'] = 'В миллисекундах, 1000 ms = 1 секунда';
$_['entry_minify_js_afterload_time_mobile_help'] = 'В миллисекундах, 1000 ms = 1 секунда';

$_['entry_image_webp_mozjpeg'] = 'Сжимать ресайзы алгоритмами модуля перед webp';

$_['tab_replacers'] = 'Модификатор';
$_['entry_replacers_status'] = 'Статус модификатора';
$_['text_replacer_comment'] = 'Комментарий';
$_['text_replacer_in'] = 'Код для замены';
$_['text_replacer_out'] = 'Замена';
$_['text_replacer_all'] = 'Заменять все';
$_['text_replacer_status'] = 'Статус';
$_['text_replacer_action'] = 'Действие';



$_['entry_minify_js_preload_gps'] = 'Отложенная загрузка JS для GPS';
$_['entry_minify_js_preload_gps_help'] = 'В это поле можно заноcить <br>счетчики и аналитику.<br>Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';


$_['entry_minify_css_critical_status'] = 'Объединение файлов в Critical CSS';
$_['entry_minify_css_critical_in'] = 'Файлы Critical CSS';


$_['entry_minify_css_critical_status_help'] = 'Привязка к коду';
$_['entry_minify_css_critical_in_help'] = 'Имена файлов';




$_['entry_minify_css_ex_inline_footer'] = 'Исключения из переноса inline style CSS вниз';
$_['entry_minify_css_ex_inline_footer_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_css_after'] = 'Отложенная загрузка CSS скриптов';
$_['entry_minify_css_after_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';

$_['entry_minify_css_after_gps'] = 'Отложенная загрузка CSS скриптов для GPS';
$_['entry_minify_css_after_gps_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';



// 21.1
$_['tab_images'] = 'Изображения';

$_['ocmod_jetcache_images_name'] = $_['jetcache_model'].' Images';
$_['ocmod_jetcache_images_mod'] = $_['jetcache_model_code'].'_images';
$_['ocmod_jetcache_images_html'] = $_['ocmod_jetcache_images_name'].' модификатор установлен';

$_['entry_images_logo_preload'] = 'Лого preload';
$_['entry_images_logo_preload_help'] = 'Лого preload';



$_['entry_images_logo_dimensions'] = 'Лого размеры';
$_['entry_images_logo_dimensions_help'] = 'Лого размеры<br>ширина x высота (px)';

$_['entry_images_x'] = 'Размеры для изображений';
$_['entry_images_x_help'] = 'Размеры для изображений';




$_['entry_cache_remove_status'] = 'Статус автоматического <br>удаления кеша';
$_['entry_cache_remove_status_help'] = 'Статус автоматического <br>удаления кеша';


/* Add 22.0 */
$_['entry_minify_css_fonts_status'] = 'Перенос шрифтов <br>в объединенный файл шрифтов';
$_['entry_minify_css_fonts_status_help'] = 'Статус переноса шрифтов <br>в объединенный файл шрифтов<br>Код привязки в head ';
$_['entry_minify_css_fonts_footer'] = 'Перенос объединенного файла шрифтов вниз';
$_['entry_minify_css_fonts_footer_help'] = 'Статус переноса объединенного файла шрифтов вниз';

$_['entry_minify_css_ex_fonts'] = 'Исключения переноса шрифтов';
$_['entry_minify_css_ex_fonts_help'] = 'Статус исключения переноса шрифтов <br>Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';
$_['entry_minify_css_fonts_defer'] = 'Отложенная загрузка объединенного файла шрифтов';
$_['entry_minify_css_fonts_defer_help'] = 'Отложенная загрузка объединенного файла шрифтов';
$_['entry_minify_css_fonts_defer_gps'] = 'Отложенная загрузка GPS объединенного файла шрифтов';
$_['entry_minify_css_fonts_defer_gps_help'] = 'Отложенная загрузка GPS объединенного файла шрифтов';

/* Add 23.0 */
$_['tab_bots'] = 'Боты';
$_['tab_bots_ajax'] = 'Боты Ajax';
$_['entry_bots_ajax'] = 'Статус';
$_['entry_bots_ajax_status_help'] = 'Статус "Боты Ajax"';
$_['entry_bots_ajax_add_route'] = 'Route страниц';
$_['entry_bots_ajax_add_route_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';
$_['entry_bots_ajax_add_uri'] = 'URI страниц';
$_['entry_bots_ajax_add_uri_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';
$_['entry_bots_ajax_add_get'] = 'GET параметры страниц';
$_['entry_bots_ajax_add_get_help'] = 'Параметры <br>разделяются <br>переводом "каретки" <br><span class="jc-help"># - выключает</span>';
$_['entry_bots_ajax_server_response_1'] = 'Заголовок ответа сервера (первый)';
$_['entry_bots_ajax_server_response_1_help'] = '';
$_['entry_bots_ajax_server_response_2'] = 'Заголовок ответа сервера (второй)';
$_['entry_bots_ajax_server_response_2_help'] = '';
$_['entry_bots_ajax_server_response_3'] = 'Заголовок ответа сервера (третий)';
$_['entry_bots_ajax_server_response_3_help'] = 'Можно отправить<br>(не рекомендуется)<br>(к примеру, на подготовленную страницу 404)<br>Location: /index.php?route=error/not_found';

/* Add 24.1 */
$_['entry_logs_attention'] = 'Внимание';
$_['text_logs_attention'] = 'Данный функционал логов только для отладки работы и настроек модуля (дебага).<br>По окончанию работ по отладке (дебага), выключите все логи и удалите лог файлы.';

$_['text_jetcache_ocmod'] = 'модификатор';

$_['ocmod_jetcache_text_on'] = '<span style="color:green">включен</span>';
$_['ocmod_jetcache_text_off'] = '<span style="color:red">выключен</span>';

$_['text_jetcache_ocmod_none'] = $_['text_jetcache_ocmod'] . ' не установлен';


/* Add 24.4 */
$_['tab_bots_options'] = 'Настройка ботов';
$_['entry_jetcache_bots'] = 'Токен в user-agent ботов';
$_['text_jetcache_bots'] = 'Боты';
$_['entry_jetcache_bots_cookie'] = 'Куки к ботам<br><span class="jc-help">Параметры разделяются "кареткой"(Enter)<br># - выключает<br>Параметры к кукам через |</span>';
$_['text_jetcache_bots_cookie'] = 'Куки';

/* Add 25.0 */
$_['entry_pages_fast'] = 'Быстрый алгоритм';
$_['entry_pages_fast_help'] = 'Быстрый алгоритм';

/* Add 25.1 */
$_['entry_webp_gd'] = 'Оптимизация изображений по алгоритму webp GD';
$_['entry_image_webp_gd_status'] = 'Статус оптимизации всех изображений по алгоритму webp GD<br><div class="jetcache-table-help">другие алгоритмы будут "отключены"</div>';
$_['entry_image_webp_gd_quality'] = 'Качество изображения<br><div class="jetcache-table-help">max: 100<br>min: 10</div>';
$_['entry_webp_gd_must'] = 'Требования:<br>Возможность запуска webp GD';
$_['entry_webp_gd_text'] = 'webp GD';
$_['entry_system_webp_gd_exec'] = 'Возможность выполнения оптимизации webp GD';
$_['entry_system_image_webp_gd_original'] = 'Исходное изображение';
$_['entry_system_image_webp_gd_lossess'] = 'Оптимизированное изображение по алгоритму webp GD';
$_['entry_image_webp_gd_png_status'] = 'Оптимизация PNG в webp GD';


$_['error_image_img_exec'] = 'Ошибка оптимизации ';
$_['error_image_mozjpeg_exec'] = $_['error_image_img_exec'] . 'MozJpeg';
$_['error_image_jpegoptim_exec'] = $_['error_image_img_exec'] . 'JpegOptim';
$_['error_image_optipng_exec'] = $_['error_image_img_exec'] . 'OptiPNG';
$_['error_image_webp_exec'] = $_['error_image_img_exec'] . 'WebP';
$_['error_image_webp_gd_exec'] = $_['error_image_img_exec'] . 'WebP GD';

// Add in 26.0
$_['text_replacer_route'] = 'Макеты (Схемы, routes)';
$_['text_replacer_more'] = 'Другие опции';
$_['text_replacer_options'] = 'Опции';
$_['text_replacer_device'] = 'Устройства';
$_['text_replacer_device_all'] = 'Все устройства';
$_['text_replacer_device_comp'] = 'Компьютер';
$_['text_replacer_device_mob'] = 'Мобильные устройства';
$_['text_replacer_device_smart'] = 'Смартфоны';
$_['text_replacer_device_pad'] = 'Планшеты';

$_['entry_html_remove_space'] = 'Убрать лишние пробелы и табуляции';
$_['entry_html_remove_space_help'] = 'Убрать лишние пробелы и табуляции';

// Add in 27.0
$_['text_jetcache_customer_groups'] = 'Групы покупателей';
$_['text_jetcache_group_reg'] = 'Зарегистрированные';
$_['text_jetcache_group_order'] = 'Те, что купили товар в магазине';
$_['text_jetcache_group_order_this'] = 'Те, что купили "этот" товар в магазине';
$_['text_jetcache_group_all'] = 'Все групы покупателей';

$_['text_jetcache_uri'] = 'URI';

$_['text_jetcache_langs'] = 'Языки<br><span class="jc-help">(Если не один не выбран <br>- будет на всех)</span>';
$_['text_jetcache_stores'] = 'Магазины<br><span class="jc-help">(Если не один не выбран <br>- будет на всех)</span>';

// Add in 27.1
$_['entry_minify_js_preload_inline_remove_event'] = 'Убрать из отложенных (Lazy) inline JS <br>события на DOMContentLoaded, которое уже завершилась';
$_['entry_minify_js_preload_inline_remove_event_help'] = $_['entry_minify_js_preload_inline_remove_event'];
$_['entry_minify_js_preload_server_remove_event'] = 'Убрать из отложенных (Lazy) серверных JS <br>события на DOMContentLoaded, которое уже завершилась';
$_['entry_minify_js_preload_server_remove_event_help'] = $_['entry_minify_js_preload_server_remove_event'];

// Add in 27.2
$_['button_apply'] = 'Применить';
$_['text_apply_error'] = 'Ошибка сохранения';
$_['text_apply_success'] = '<i class="fa fa-check" aria-hidden="true"></i> Успешно';
$_['text_apply_no_access'] = 'У вас нет прав доступа';
$_['error_permission'] = $_['text_apply_no_access'];
$_['text_apply_refresh'] = '<i class="fa fa-check" aria-hidden="true"></i> Обновлено';

$_['ocmod_jetcache_mod_name'] = $_['jetcache_model'] . ' Mod';
$_['ocmod_jetcache_mod_mod'] = $_['jetcache_model_code'].'_mod';
$_['ocmod_jetcache_mod_html'] = $_['ocmod_jetcache_mod_name'] . ' модификатор установлен'; 

$_['ocmod_jetcache_data_name'] = $_['jetcache_model'] . ' Data View';
$_['ocmod_jetcache_data_mod'] = $_['jetcache_model_code'].'_data';
$_['ocmod_jetcache_data_html'] = $_['ocmod_jetcache_data_name'] . ' модификатор установлен';

$_['entry_images_product_preload'] = $_['entry_images_product_preload_help'] = 'Preload главного изображения <br>в карточке товара';

// Add in 28.0
$_['ocmod_jetcache_layout_name'] = $_['jetcache_model'] . ' Layout';
$_['ocmod_jetcache_layout_mod'] = $_['jetcache_model_code'].'_layout';
$_['ocmod_jetcache_layout_html'] = $_['ocmod_jetcache_layout_name'] . ' модификатор установлен';

$_['entry_device_detect'] = 'Поддержка определения устройств для макетов <span class="jc-help">Дизайн -> Макеты (layout)</span>';

// Add in 28.1
$_['url_text_jetcache_delete_text'] = '<div style="text-align: center; text-decoration: none;">Удаление<br>настроек модуля<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(все настройки модуля будут удалены)</ins></div>';
$_['url_text_jetcache_delete_sure_pre_text'] = '<div style="text-align: center; text-decoration: none;">Вы уверены<br>что хочете удалить все настройки?<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(все настройки модуля будут <br>безвозвратно удалены)</ins></div>';
$_['url_text_jetcache_delete_sure_text'] = '<div style="text-align: center; text-decoration: none;">ВЫ УВЕРЕНЫ !?<br>что хочете удалить все настройки?<br><ins style="text-align: center; text-decoration: none; font-size: 13px;">(все настройки модуля будуть <br>безвозвратно удалены)</ins></div>';



$_['entry_minify_js_debug'] = 'Настройка (debug) JS минификации<br><span class="jc-help">Выключает все JS скрипты<br>После завершения настройки <br>(debug) JS минификации - выключите<br></span>';
$_['entry_minify_js_debug_help'] = $_['entry_minify_js_debug'];
/* Add 29.0 */
$_['entry_no_cache'] = 'Кешировать ajax<br><span class="jc-help">(не рекомендуется)</span>';
$_['entry_onefile'] = '1. В один "файл"';
$_['entry_ignore'] = '2. Игнорировать';
$_['entry_debug'] = 'Debug mode';

$_['text_jetcache_loading_main'] = '<div style=&#92;\'color: #008000; &#92;\'>Загружается...<i class=&#92;\'fa fa-refresh fa-spin&#92;\'></i></div>';
$_['text_jetcache_loading_main_without'] = '<div style="color: #008000">Загружается...<i class="fa fa-refresh fa-spin"></i></div>';
$_['text_jetcache_check_ver'] = 'Проверить новую версию';
$_['text_jetcache_error_server_connect'] = 'Ошибка соединения с сервером';
$_['text_jetcache_server_date_state'] = 'По состоянию на';
$_['text_jetcache_current_version_text'] = '<div style="color: #306793;">Ваша текущая версия</div>';
$_['text_jetcache_last_version_text'] = '<div style="color: #306793;">Последняя версия</div>';
$_['text_jetcache_update_yes'] = '<div style="color: red;">Рекомендуется обновить модуль</div>';
$_['text_jetcache_update_no'] = '<div style="color: green;">Обновление не требуется, у вас самая последняя версия модуля</div>';
$_['text_jetcache_error_text_jetcache_server_connect'] = 'Ошибка соединения с сервером';
$_['text_jetcache_update_version_begin'] = "<div style='background: #F7FFF2; width: auto; border: 1px solid #E2EDDC; padding: 10px;'>Последняя доступная версия модуля: <span style='font-size: 21px;'>";
$_['text_jetcache_update_version_end'] = "</span></div>";
$_['text_jetcache_new_version'] = "<div style='background: #FFCFCE; border: 2px solid red; padding: 10px;'>Установленная версия модуля: <b><span style='color: red;'>" . $_['jetcache_version'] . "</span></b><br>"."Последняя версия модуля: <span style='color: green;'><b>";
$_['text_jetcache_new_version_end'] = '</b></span><br>Рекомендуется: <span style="color: green;"><b>обновите модуль до последней версии</b></span></div>';