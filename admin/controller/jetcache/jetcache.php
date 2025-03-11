<?php
/* All rights reserved belong to the module, the module developers https://support.opencartadmin.com */
// https://support.opencartadmin.com © 2011-2023 All Rights Reserved
// Distribution, without the author's consent is prohibited
// Commercial license
if (!class_exists('ControllerJetcacheJetcache', false)) {
	class ControllerJetcacheJetcache extends Controller {
		private $error = array();
		private $url_link_ssl = true;
		protected $data;
		protected $template;
		protected $template_engine;
		protected $admin_server;
		protected $jc_host = '';
		protected $ajax_real = false;
		protected $server_protocol;

		public function __construct($registry) {
			parent::__construct($registry);

			if (version_compare(phpversion(), '5.3.0', '<') == true) {
				exit('PHP5.3+ Required');
			}

			if (!defined('SC_VERSION')) define('SC_VERSION', (int)substr(str_replace('.', '', VERSION), 0, 2));
			if (file_exists(DIR_SYSTEM . 'helper/seocmsprofunc.php')) {
				if (!function_exists('loadlibrary')) {
					if (function_exists('modification')) {
						require_once(modification(DIR_SYSTEM . 'helper/seocmsprofunc.php'));
					} else {
						require_once(DIR_SYSTEM . 'helper/seocmsprofunc.php');
					}
				}
			}

			if (file_exists(DIR_SYSTEM . 'library/jetcache/jetcache.php')) {
				if (function_exists('modification')) {
					require_once(modification(DIR_SYSTEM . 'library/jetcache/jetcache.php'));
				} else {
					require_once(DIR_SYSTEM . 'library/jetcache/jetcache.php');
				}
			}

			if (SC_VERSION > 23) {
				$this->data['token_name'] = 'user_token';
			} else {
				$this->data['token_name'] = 'token';
			}
			if (isset($this->session->data[$this->data['token_name']])) {
				$this->data['token'] = $this->session->data[$this->data['token_name']];
			} else {
				$this->data['token'] = '';
			}

			if ((isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https') || (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && strtolower($_SERVER['HTTP_X_FORWARDED_SSL']) == 'on'))) {
				$this->data['protocol'] = 'https';
				$this->url_link_ssl = true;
				$this->admin_server = HTTPS_SERVER;
			} else {
				$this->data['protocol'] = 'http';
				if (SC_VERSION < 20) {
					$this->url_link_ssl = 'NONSSL';
				} else {
					$this->url_link_ssl = false;
				}
				$this->admin_server = HTTP_SERVER;
			}

			if (isset($this->registry->get('request')->server['HTTP_X_REQUESTED_WITH']) && strtolower($this->registry->get('request')->server['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
				$this->ajax_real = true;
			}

			if (isset($this->registry->get('request')->server['HTTP_HOST']) && $this->registry->get('request')->server['HTTP_HOST'] != '') {
				$this->jc_host = $this->registry->get('request')->server['HTTP_HOST'];
			} else {
				$this->jc_host = '';
			}

			if (isset($this->registry->get('request')->server['SERVER_PROTOCOL']) && $this->registry->get('request')->server['SERVER_PROTOCOL'] != '') {
				$this->data['server_protocol'] = $this->server_protocol = $this->registry->get('request')->server['SERVER_PROTOCOL'];
			} else {
				$this->data['server_protocol'] = $this->server_protocol = 'HTTP/1.1';
			}

			$this->data['asc_jetcache_settings'] = array();
			if (isset($this->request->post['asc_jetcache_settings'])) {
				$this->data['asc_jetcache_settings'] = (array)$this->request->post['asc_jetcache_settings'];
			} else {
				$this->data['asc_jetcache_settings'] = (array)$this->config->get('asc_jetcache_settings');

				if (!empty($this->data['asc_jetcache_settings'])) {
					if (!isset($this->data['asc_jetcache_settings']['jetcache_widget_status'])) {
						$this->data['asc_jetcache_settings'] = array();
					}
				}
				if (!is_array($this->data['asc_jetcache_settings'])) {
					$this->data['asc_jetcache_settings'] = array();
				}
			}
			$this->data['cpu_load'] = '';
			$this->data['cpu_count'] = '';
			if (function_exists("sys_getloadavg")) {
				$serverload = sys_getloadavg();
				$this->data['cpu_load'] = round($serverload[0], 4);
			} else if (@file_exists('/proc/loadavg') && $load = @file_get_contents('/proc/loadavg')) {
				$serverload = explode(" ", $load);
				$this->data['cpu_load'] = round($serverload[0], 4);
			}
			if (@is_file('/proc/cpuinfo') && $cpuinfo = @file_get_contents('/proc/cpuinfo')) {
				preg_match_all('/^processor/m', $cpuinfo, $matches);
				if (isset($matches[0])) {
					$this->data['cpu_count'] = count($matches[0]);
				}
			}
			if ($this->config->get('config_admin_language')) {
				$this->data['config_admin_language'] = $this->config->get('config_admin_language');
			} else {
				$this->data['config_admin_language'] = '';
			}
			if (SC_VERSION > 23) {
				$this->template_engine = $this->config->get('template_engine');
			}
			return true;
		}

		public function index() {
			$this
				->jc_start()
				->jc_load_seocms_settings()
				->jc_model_load()
				->jc_language_load()
				->jc_language_get()
				->jc_load_customer_groups()
				->jc_init_languages()
				->jc_init_stores()
				->jc_url_link()
				->jc_save_settings()
				->jc_settings()
				->jc_settings_bots()
				->jc_settings_log()
				->jc_settings_gzip()
				->jc_settings_query_model()
				->jc_settings_model()
				->jc_settings_image()
				->jc_settings_add_cont()
				//->jc_settings_lazy_tokens()
				->jc_settings_ex_route()
				->jc_settings_ex_uri()
				->jc_settings_ex_key()
				->jc_settings_ex_session()
				->jc_settings_ex_get()
				->jc_settings_folders_level()
				->jc_settings_cache_auto_clear()
				->jc_settings_set_cache()
				->jc_settings_logo()
				->jc_set_title()
				->jc_load_icon()
				->jc_load_scripts()
				->jc_image_webp_gd()
				->jc_image_optimization()
				->install_ocmod_settings()
				->load_ocmod_check()
				->jc_output_notice()
				->jc_output_settings()
				->jc_output();
		}

		public function settings_apply() {
			$html = '';
			$html_more = '';
			$mod = false;
			$error = false;

			if ($this->validate()) {
				if (SC_VERSION > 15) {
					// Fix for bug in method refresh() modification.php, with $this->config->get('config_maintenance'), which returns 1, when 0
					$this->load->model('setting/setting');
					$maintenance = $this->model_setting_setting->getSetting('config');
				}

				$this->index();
				if (isset($this->data['refresh_flag']) && $this->data['refresh_flag']) {
					if (SC_VERSION > 15) {
						$html_more .= $this->language->get('text_apply_refresh');
						if (function_exists('modification')) {
							require_once(modification(DIR_SYSTEM . 'library/exceptionizer.php'));
						} else {
							require_once(DIR_SYSTEM . 'library/exceptionizer.php');
						}
						ini_set('display_errors', 0);
						ini_set('display_startup_errors', 0);
						error_reporting(E_ALL);
						$exceptionizer = new PHP_Exceptionizer(E_ALL);
						try {
							$this->modrefresh();
							$mod_files = glob(DIR_MODIFICATION . '*');
							if (count($mod_files) < 2) {
								$mod = true;
							}
						} catch (E_WARNING $e) {
							$error = true;
						}
					}
				}
				$html .= $this->language->get('text_apply_success');

				if (SC_VERSION > 15) {
					// Fix for bug in method refresh() modification.php, with $this->config->get('config_maintenance'), which returns 1, when 0
					$maintenance_after = $this->model_setting_setting->getSetting('config');

					if ($maintenance['config_maintenance'] != $maintenance_after['config_maintenance']) {
						$mod = true;
						$this->model_setting_setting->editSettingValue('config', 'config_maintenance', $maintenance['config_maintenance']);
					}
				}
			} else {
				$error = true;
				$html .= $this->language->get('text_apply_no_access');
			}

			$json = array(
				'content_more' => $html_more,
				'content' => $html,
				'mod' => (int)$mod,
				'error' => (int)$error
			);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}

		public function modrefresh() {
			$html = '';
			$error = false;
			if ($this->validate()) {
				if (SC_VERSION > 23) {
					$cont_str = 'marketplace/modification';
				} else {
					$cont_str = 'extension/modification';
				}
				agoo_cont_admin($cont_str, $this->registry);
				$str_cont = 'controller_' . str_replace('/', '_', $cont_str);

				$this->registry->set('jc_mod', true);

				if (function_exists('modification')) {
					require_once(modification(DIR_SYSTEM . 'library/exceptionizer.php'));
				} else {
					require_once(DIR_SYSTEM . 'library/exceptionizer.php');
				}
				$exceptionizer = new PHP_Exceptionizer(E_ALL);
				try {
					$this->$str_cont->refresh();
				} catch (E_WARNING $e) {
					$error = true;
				}
				$html .= $this->language->get('text_apply_success');
			} else {
				$error = true;
				$html .= $this->language->get('text_apply_no_access');
			}

			if ($this->ajax_real) {
				$json = array(
					'html' => $html,
					'error' => (int)$error
				);
				//$this->response->addHeader('Content-Type: application/json');
				//$this->response->setOutput(json_encode($json));				
			} else {
				//$error = true;
				//$html .= $this->language->get('text_apply_no_access');				
				//return $this;
			}
		}

		public function jc_load_customer_groups() {

			if (file_exists(DIR_APPLICATION . 'model/sale/customer_group.php')) {
				$this->load->model('sale/customer_group');
				$model_customer = 'model_sale_customer_group';
			} else {
				$this->load->model('customer/customer_group');
				$model_customer = 'model_customer_customer_group';
			}
			$this->data['customer_groups'] = $this->$model_customer->getCustomerGroups();

			array_push($this->data['customer_groups'], array('customer_group_id' => -1, 'name' => $this->language->get('text_jetcache_group_reg')));
			array_push($this->data['customer_groups'], array('customer_group_id' => -2, 'name' => $this->language->get('text_jetcache_group_order')));
			array_push($this->data['customer_groups'], array('customer_group_id' => -3, 'name' => $this->language->get('text_jetcache_group_order_this')));
			array_push($this->data['customer_groups'], array('customer_group_id' => -99, 'name' => $this->language->get('text_jetcache_group_all')));

			return $this;
		}



		private function jc_start() {
			$this->config->set('blog_work', true);
			if (isset($this->request->get['jc_save']) && $this->request->get['jc_save'] == 1) {
				$this->data['jc_save'] = true;
			} else {
				$this->data['jc_save'] = false;
			}
			if (isset($this->request->get['jc_restore']) && $this->request->get['jc_restore'] == 1) {
				$this->data['jc_restore'] = true;
			} else {
				$this->data['jc_restore'] = false;
			}

			if (SC_VERSION > 22) {
				if (file_exists(DIR_APPLICATION . 'controller/module/jetcache.php')) {
					@unlink(DIR_APPLICATION . 'controller/module/jetcache.php');
				}
			}
			if (SC_VERSION < 22) {
				if (file_exists(DIR_APPLICATION . 'controller/extension/module/jetcache.php')) {
					@unlink(DIR_APPLICATION . 'controller/extension/module/jetcache.php');
				}
				$files_extension_module = glob(DIR_APPLICATION . 'controller/extension/module/*.*');
				if (!$files_extension_module && is_dir(DIR_APPLICATION . 'controller/extension/module/')) {
					rmdir(DIR_APPLICATION . 'controller/extension/module/');
				}
			}
			if (!is_dir(DIR_IMAGE . 'jetcache/')) {
				mkdir(DIR_IMAGE . 'jetcache/', 0755, true);
			}
			if (!is_dir(DIR_IMAGE . 'jetcache/css/')) {
				mkdir(DIR_IMAGE . 'jetcache/css/', 0755, true);
			}
			if (!is_dir(DIR_IMAGE . 'jetcache/css_cache/')) {
				mkdir(DIR_IMAGE . 'jetcache/css_cache/', 0755, true);
			}
			if (!is_dir(DIR_IMAGE . 'jetcache/js/')) {
				mkdir(DIR_IMAGE . 'jetcache/js/', 0755, true);
			}
			if (!is_dir(DIR_IMAGE . 'jetcache/js_cache/')) {
				mkdir(DIR_IMAGE . 'jetcache/js_cache/', 0755, true);
			}
			$this->data['max_input_vars'] = ini_get('max_input_vars');

			return $this;
		}

		private function jc_permissions_check($file) {
			$perms = fileperms($file);

			if (!is_file($file)) {
				return false;
			}
			if (is_readable($file) && is_executable($file)) {
				return true;
			}
			return false;
		}

		private function jc_function_exists($function) {

			if (function_exists('ini_get')) {
				$disabled = @ini_get('disable_functions');
			}
			if (extension_loaded('suhosin') && function_exists('ini_get')) {
				$suhosin_disabled = @ini_get('suhosin.executor.func.blacklist');

				if (!empty($suhosin_disabled)) {
					$suhosin_disabled = explode(',', $suhosin_disabled);
					$suhosin_disabled = array_map('trim', $suhosin_disabled);
					$suhosin_disabled = array_map('strtolower', $suhosin_disabled);
					if (function_exists($function) && !in_array($function, $suhosin_disabled)) {
						return true;
					}
					return false;
				}
			}
			return function_exists($function);
		}

		private function jc_settings_set_cache() {

			if (!isset($this->data['asc_jetcache_settings']['cache_remove_status'])) {
				$this->data['asc_jetcache_settings']['cache_remove_status'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['cache_check_clear'])) {
				$this->data['asc_jetcache_settings']['cache_check_clear'] = 11;
			}

			if (!isset($this->data['asc_jetcache_settings']['cache_expire'])) {
				$this->data['asc_jetcache_settings']['cache_expire'] = 604800;
			}
			if (!isset($this->data['asc_jetcache_settings']['cache_max_files'])) {
				$this->data['asc_jetcache_settings']['cache_max_files'] = 500;
			}
			if (!isset($this->data['asc_jetcache_settings']['cart_interval'])) {
				$this->data['asc_jetcache_settings']['cart_interval'] = 60;
			}
			if (!isset($this->data['asc_jetcache_settings']['cache_maxfile_length'])) {
				$this->data['asc_jetcache_settings']['cache_maxfile_length'] = 9437184;
			}
			if (!isset($this->data['asc_jetcache_settings']['jetcache_menu_order'])) {
				$this->data['asc_jetcache_settings']['jetcache_menu_order'] = 999;
			}
			if (!isset($this->data['asc_jetcache_settings']['pages_forsage'])) {
				$this->data['asc_jetcache_settings']['pages_forsage'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['pages_fast'])) {
				$this->data['asc_jetcache_settings']['pages_fast'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['add_category'])) {
				$this->data['asc_jetcache_settings']['add_category'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['add_product'])) {
				$this->data['asc_jetcache_settings']['add_product'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['edit_product'])) {
				$this->data['asc_jetcache_settings']['edit_product'] = true;
			}

			if (!isset($this->data['asc_jetcache_settings']['jetcache_widget_status'])) {
				$this->data['asc_jetcache_settings']['jetcache_widget_status'] = false;
			}

			if (!isset($this->data['asc_jetcache_settings']['jetcache_menu_status'])) {
				$this->data['asc_jetcache_settings']['jetcache_menu_status'] = true;
			}

			if (!isset($this->data['asc_jetcache_settings']['jetcache_query_status'])) {
				$this->data['asc_jetcache_settings']['jetcache_query_status'] = false;
			}

			if (!isset($this->data['asc_jetcache_settings']['header_categories_status'])) {
				$this->data['asc_jetcache_settings']['header_categories_status'] = false;
			}

			if (!isset($this->data['asc_jetcache_settings']['image_status'])) {
				$this->data['asc_jetcache_settings']['image_status'] = false;
			}

			if (!isset($this->data['asc_jetcache_settings']['images_x'])) {
				$this->data['asc_jetcache_settings']['images_x'] = false;
			}

			if (!isset($this->data['asc_jetcache_settings']['images_logo_dim_status'])) {
				$this->data['asc_jetcache_settings']['images_logo_dim_status'] = false;
			}

			if (!isset($this->data['asc_jetcache_settings']['images_logo_preload'])) {
				$this->data['asc_jetcache_settings']['images_logo_preload'] = false;
			}


			return $this;
		}

		private function jc_language_load() {
			$this->language->load('localisation/currency');
			$this->language->load('jetcache/jetcache');
			return $this;
		}

		private function jc_model_load() {
			$this->load->model('localisation/currency');
			$this->load->model('setting/setting');
			$this->load->model('localisation/language');
			$this->load->model('setting/store');
			$this->load->model('design/layout');
			$this->load->model('jetcache/mod');
			return $this;
		}

		private function jc_load_seocms_settings() {
			if ($this->config->get('ascp_settings')) {
				$this->data['ascp_settings'] = $this->config->get('ascp_settings');
			} else {
				$this->data['ascp_settings'] = array();
			}
			return $this;
		}

		private function optimize_setting() {
			// ALTER TABLE `oc_setting` ADD INDEX `store_id` (`store_id`);
			// OPTIMIZE TABLE `oc_setting`
			$r = $this->db->query("DESCRIBE  `" . DB_PREFIX . "setting` `store_id`");
			if ($r->num_rows == 1) {
				foreach ($r->rows as $trow) {
					if ($trow['Key'] == ' ' || $trow['Key'] == '') {
						$msql = "ALTER TABLE `" . DB_PREFIX . "setting` ADD INDEX `store_id` (`store_id`)";
						$query = $this->db->query($msql);
					}
				}
				$msql = "OPTIMIZE TABLE  `" . DB_PREFIX . "setting`";
				$query = $this->db->query($msql);
			}
		}

		private function jc_save_settings() {

			if ($this->request->server['REQUEST_METHOD'] == 'POST' && !$this->validate()) {
				unset($this->session->data['success']);
				$this->data['error_warning'] = $this->error['warning'] = $this->session->data['error_warning'] = $this->language->get('text_apply_no_access');
				return $this;
			}

			$jetcache_settings = $this->config->get('asc_jetcache_settings');

			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				// in <input hidden>
				// $this->request->post['ascp_settings']['seocms_jetcache_alter'] = 1;
				// $this->cache->delete('jetcache');

				$data['asc_jetcache_settings']['asc_jetcache_settings'] = $this->request->post['asc_jetcache_settings'];
				$this->model_setting_setting->editSetting('asc_jetcache_settings', $data['asc_jetcache_settings']);

				if (!isset($this->request->post['ascp_settings'])) $this->request->post['ascp_settings'] = array();
				$data['ascp_settings']['ascp_settings'] = array_merge($this->data['ascp_settings'], $this->request->post['ascp_settings']);
				$this->model_setting_setting->editSetting('ascp_settings', $data['ascp_settings']);

				if (isset($this->request->post['asc_jetcache_settings']['pages_db_status']) && $this->request->post['asc_jetcache_settings']['pages_db_status']) {
					if ($this->table_exists(DB_PREFIX . "jetcache_pages_0")) {
						$this->create_tables('pages');
					} else {
						$this->create_tables('pages');
					}
				}
				if (isset($this->request->post['asc_jetcache_settings']['cont_db_status']) && $this->request->post['asc_jetcache_settings']['cont_db_status']) {
					if ($this->table_exists(DB_PREFIX . "jetcache_cont_0")) {
						$this->create_tables('cont');
					} else {
						$this->create_tables('cont');
					}
				}
				if (isset($this->request->post['asc_jetcache_settings']['model_db_status']) && $this->request->post['asc_jetcache_settings']['model_db_status']) {
					if ($this->table_exists(DB_PREFIX . "jetcache_model_0")) {
						$this->create_tables('model');
					} else {
						$this->create_tables('model');
					}
				}
				if (isset($this->request->post['asc_jetcache_settings']['query_db_status']) && $this->request->post['asc_jetcache_settings']['query_db_status']) {
					if ($this->table_exists(DB_PREFIX . "jetcache_query_0")) {
						$this->create_tables('query');
					} else {
						$this->create_tables('query');
					}
				}

				if (SC_VERSION > 23) {
					if (isset($data['asc_jetcache_settings']['asc_jetcache_settings']['jetcache_widget_status']) && $data['asc_jetcache_settings']['asc_jetcache_settings']['jetcache_widget_status']) {
						$this->model_setting_setting->editSetting('module_jetcache', array('module_jetcache_status' => true));
					} else {
						$this->model_setting_setting->editSetting('module_jetcache', array('module_jetcache_status' => false));
					}
				}

				$this->jc_index_set_timer();

				$this->session->data['success'] = $this->language->get('text_jetcache_success');
			}
			return $this;
		}

		private function jc_index_set_timer() {
			$jetcache_settings = $this->config->get('asc_jetcache_settings');
			$filename_index = DIR_SYSTEM . '../index.php';
			$filename_index_backup = DIR_SYSTEM . '../index.backup.php';

			if (isset($this->request->post['asc_jetcache_settings']['jetcache_index_status'])) {
				if (is_array($jetcache_settings)) {
					$jetcache_settings['jetcache_index_status'] = (bool)$this->request->post['asc_jetcache_settings']['jetcache_index_status'];
				}
			}

			if (file_exists($filename_index) && is_writable($filename_index)) {
				if (isset($jetcache_settings['jetcache_widget_status']) && $jetcache_settings['jetcache_widget_status'] && isset($jetcache_settings['jetcache_index_status'])) {
					$index_content = file_get_contents($filename_index);
					if ($jetcache_settings['jetcache_index_status']) {
						if (stripos($index_content, 'jetcache_opencart_core_start') === false) {
							$index_new_content = str_ireplace("<?php", "<?php \$GLOBALS['jetcache_opencart_core_start'] = microtime(true);", $index_content);
							file_put_contents($filename_index, $index_new_content);
							file_put_contents($filename_index_backup, $index_content);
						}
					} else {
						if (stripos($index_content, 'jetcache_opencart_core_start') !== false) {
							$index_new_content = str_ireplace(" \$GLOBALS['jetcache_opencart_core_start'] = microtime(true);", "", $index_content);
							file_put_contents($filename_index, $index_new_content);
						}
					}
				}
			}
		}

		private function jc_language_get() {
			$this->data['jc_version'] = $this->language->get('jetcache_version');
			$this->data['jetcache_model'] = $this->language->get('jetcache_model');
			$this->data['jetcache_version'] = $this->language->get('jetcache_model_settings');
			$this->data['tab_general'] = $this->language->get('tab_general');
			$this->data['tab_list'] = $this->language->get('tab_list');
			$this->data['heading_title_jc'] = $this->language->get('heading_title_jc');
			$this->data['text_enabled'] = $this->language->get('text_enabled');
			$this->data['text_disabled'] = $this->language->get('text_disabled');
			$this->data['text_close'] = $this->language->get('text_close');
			$this->data['text_content_top'] = $this->language->get('text_content_top');
			$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
			$this->data['text_column_left'] = $this->language->get('text_column_left');
			$this->data['text_column_right'] = $this->language->get('text_column_right');
			$this->data['entry_jetcache_template'] = $this->language->get('entry_jetcache_template');
			$this->data['entry_log_file_unlink'] = $this->language->get('entry_log_file_unlink');
			$this->data['entry_log_file_view'] = $this->language->get('entry_log_file_view');
			$this->data['tab_general'] = $this->language->get('tab_general');
			$this->data['tab_list'] = $this->language->get('tab_list');
			$this->data['entry_layout'] = $this->language->get('entry_layout');
			$this->data['entry_position'] = $this->language->get('entry_position');
			$this->data['entry_status'] = $this->language->get('entry_status');
			$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
			$this->data['button_save'] = $this->language->get('button_save');
			$this->data['button_cancel'] = $this->language->get('button_cancel');
			$this->data['button_add_module'] = $this->language->get('button_add_module');
			$this->data['button_remove'] = $this->language->get('button_remove');
			$this->data['url_modules_text'] = $this->language->get('url_modules_text');
			$this->data['url_jetcache_text'] = $this->language->get('url_jetcache_text');
			$this->data['url_create_text'] = $this->language->get('url_create_text');
			$this->data['url_delete_text'] = $this->language->get('url_delete_text');
			$this->data['jetcache_ocas'] = $this->language->get('jetcache_ocas');
			$this->data['text_jetcache_check_ver'] = $this->language->get('text_jetcache_check_ver');
			$this->data['text_jetcache_server_date_state'] = $this->language->get('text_jetcache_server_date_state');
			$this->data['text_jetcache_current_version_text'] = $this->language->get('text_jetcache_current_version_text');
			$this->data['text_jetcache_last_version_text'] = $this->language->get('text_jetcache_last_version_text');
			$this->data['text_jetcache_update_yes'] = $this->language->get('text_jetcache_update_yes');
			$this->data['text_jetcache_update_no'] = $this->language->get('text_jetcache_update_no');
			$this->data['text_jetcache_error_server_connect'] = $this->language->get('text_jetcache_error_server_connect');
			$this->data['text_jetcache_update_version_begin'] = $this->language->get('text_jetcache_update_version_begin');
			$this->data['text_jetcache_update_version_end'] = $this->language->get('text_jetcache_update_version_end');
			$this->data['text_jetcache_new_version'] = $this->language->get('text_jetcache_new_version');
			$this->data['text_jetcache_new_version_end'] = $this->language->get('text_jetcache_new_version_end');


			$this->data['text_jetcache_check_ver'] = $this->language->get('text_jetcache_check_ver');
			$this->data['text_enabled_jc_module'] = $this->language->get('text_enabled_jc_module');
			$this->data['text_disabled_jc_module'] = $this->language->get('text_disabled_jc_module');
			$this->data['text_enabled'] = $this->language->get('text_enabled');
			$this->data['text_disabled'] = $this->language->get('text_disabled');


			$this->data['url_text_jetcache_delete_text'] = $this->language->get('url_text_jetcache_delete_text');
			$this->data['url_text_jetcache_delete_sure_text'] = $this->language->get('url_text_jetcache_delete_sure_text');
			$this->data['url_text_jetcache_delete_sure_pre_text'] = $this->language->get('url_text_jetcache_delete_sure_pre_text');

			$this->data['tab_bots_options'] = $this->language->get('tab_bots_options');
			$this->data['entry_jetcache_bots'] = $this->language->get('entry_jetcache_bots');
			$this->data['text_jetcache_bots'] = $this->language->get('text_jetcache_bots');
			$this->data['entry_jetcache_bots_cookie'] = $this->language->get('entry_jetcache_bots_cookie');
			$this->data['text_jetcache_bots_cookie'] = $this->language->get('text_jetcache_bots_cookie');

			return $this;
		}

		private function jc_url_link() {
			if (SC_VERSION < 20) {
				$mod_str = 'jetcache/jetcache/cacheremove';
				$mod_str_value = 'mod=1&';
			} else {
				if (SC_VERSION > 23) {
					$mod_str = 'marketplace/modification/refresh';
				} else {
					$mod_str = 'extension/modification/refresh';
				}
				$mod_str_value = '';
			}

			$this->data['url_settings_apply'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/settings_apply', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));


			$this->data['action'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['cancel'] = str_replace('&amp;', '&', $this->url->link('extension/module', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_ocmod_refresh'] = str_replace('&amp;', '&', $this->url->link($mod_str, $mod_str_value . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_options'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_schemes'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/schemes', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_widgets'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/widgets', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_jetcache'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_delete'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/deletesettings', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_modules'] = str_replace('&amp;', '&', $this->url->link('extension/module', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_create'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/install_jetcache_ocmod', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_query_file_unlink'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_remove_log', 'type=query&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_query_file_view'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_file_view', 'type=query&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_session_file_unlink'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_remove_log', 'type=session&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_session_file_view'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_file_view', 'type=session&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_cont_file_unlink'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_remove_log', 'type=cont&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_cont_file_view'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_file_view', 'type=cont&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_cache_remove'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/cacheremove', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_cache_image_remove'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/cacheremove', 'image=1&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_check_ver'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/check_ver', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));

			$this->data['url_backup'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_backup', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
			$this->data['url_restore'] = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache/jc_restore', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));

			return $this;
		}

		private function jc_json_error() {

			$error = json_last_error();

			if ($error != JSON_ERROR_NONE) {
				switch ($error) {

					case JSON_ERROR_DEPTH:
						$this->log->write('Jet cache: Maximum stack depth reached');
						break;
					case JSON_ERROR_STATE_MISMATCH:
						$this->log->write('Jet cache: Incorrect discharges or mode mismatch');
						break;
					case JSON_ERROR_CTRL_CHAR:
						$this->log->write('Jet cache: Invalid control character');
						break;
					case JSON_ERROR_SYNTAX:
						$this->log->write('Jet cache: Syntax error, incorrect JSON');
						break;
					case JSON_ERROR_UTF8:
						$this->log->write('Jet cache found you have an error: Incorrect UTF-8 characters, possibly incorrectly encoded at ' . $_SERVER['REQUEST_URI']);
						break;
					default:
						$this->log->write('Jet cache: Unknow error');
						break;
				}
				return true;
			} else {
				return false;
			}
		}


		public function jc_restore() {
			$this->jc_model_load();
			$this->jc_language_load();
			$this->jc_language_get();
			$this->jc_url_link();
			$content['success'] = false;
			if ($this->user->hasPermission('modify', 'jetcache/jetcache')) {

				if (!empty($this->request->files['file']['name'])) {
					if (substr($this->request->files['file']['name'], -5) != '.json') {
						$content['success'] = false;
						$content['text'] = $this->language->get('text_jc_error_filetype');
					} else {
						if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
							$content['success'] = false;
							$content['text'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
						} else {
							$content['success'] = true;
							$content['text'] = $this->language->get('text_jc_restore_success');

							$content_file = file_get_contents($this->request->files['file']['tmp_name']);

							$jc_array_settings = array();
							$jc_array_settings['asc_jetcache_settings'] = (array)json_decode($content_file, JSON_OBJECT_AS_ARRAY);

							if ($this->jc_json_error()) {
								$content['success'] = false;
								$content['text'] = $this->language->get('text_jc_json_error');
							}

							if (!isset($jc_array_settings['asc_jetcache_settings']['jetcache_widget_status'])) {
								$content['success'] = false;
								$content['text'] = $this->language->get('text_jc_settings_no_format');
							}

							if ($content['success']) {
								$this->model_setting_setting->editSetting('asc_jetcache_settings', (array)$jc_array_settings);
							}
						}
					}
				} else {
					$content['success'] = false;
					$content['text'] = $this->language->get('error_upload');
				}
			} else {
				$content['text'] = $this->language->get('text_jc_restore_access');
				$content['success'] = false;
			}

			$this->response->setOutput(json_encode($content));
		}

		public function jc_backup() {
			$this->jc_language_load();
			$this->jc_language_get();
			$this->jc_url_link();

			if ($this->user->hasPermission('modify', 'jetcache/jetcache')) {
				if (!isset($this->request->get['jc_backup'])) {
					$this->response->addheader('Pragma: public');
					$this->response->addheader('Expires: 0');
					$this->response->addheader('Content-Description: File Transfer');
					$this->response->addheader('Content-Type: application/octet-stream');
					$this->response->addheader('Content-Disposition: attachment; filename="jet_cache_backup_' . $this->jc_get_theme_folder() . '_' . trim($this->jc_host, '/') . '_' . date('d-m-Y_H-i', time()) . '.json"');
					$this->response->addheader('Content-Transfer-Encoding: binary');
					$content = $this->data['asc_jetcache_settings'];
				} else {
					$content['text'] = $this->language->get('text_jc_backup_success');
					$content['success'] = true;
				}
			} else {
				$content['text'] = $this->language->get('text_jc_backup_access');
				$content['success'] = false;
			}
			$this->response->setOutput(json_encode($content));
		}

		private function jc_get_theme_folder() {
			if (SC_VERSION > 21 && !$this->config->get('config_template') || $this->config->get('config_template') == '') {
				if (SC_VERSION > 23) {
					$theme_folder = $this->config->get('theme_' . $this->config->get('config_theme') . '_directory');
				} else {
					$theme_folder = $this->config->get($this->config->get('config_theme') . '_directory');
				}
				return $theme_folder;
			} else {
				return $this->config->get('config_template');
			}
		}


		private function jc_set_title() {
			$this->document->setTitle(strip_tags($this->data['heading_title_jc']));

			if (isset($this->data['jc_restore']) && $this->data['jc_restore']) {
				$this->session->data['success'] = $this->language->get('text_jc_restore_success');
			}

			return $this;
		}

		private function jc_load_scripts() {

			if (SC_VERSION < 20) {
				$this->document->addScript('view/javascript/jetcache/bootstrap/js/bootstrap.js?v=' . $this->data['jc_version']);
				$this->document->addStyle('view/javascript/jetcache/bootstrap/css/bootstrap.css?v=' . $this->data['jc_version']);
				$this->document->addStyle('view/javascript/jetcache/font-awesome/css/font-awesome.css?v=' . $this->data['jc_version']);
				//for bootstrap need jquery 1.9 + in ocmod exist replace this
				//$this->document->addScript('view/javascript/jetcache/jquery-2.1.1.min.js');
			}
			if (file_exists(DIR_APPLICATION . 'view/stylesheet/jetcache/jetcache.css')) {
				$this->document->addStyle('view/stylesheet/jetcache/jetcache.css?v=' . $this->data['jc_version']);
			}
			if (file_exists(DIR_APPLICATION . 'view/javascript/jquery/tabs.js')) {
				$this->document->addScript('view/javascript/jquery/tabs.js?v=' . $this->data['jc_version']);
			} else {
				if (file_exists(DIR_APPLICATION . 'view/javascript/blog/tabs/tabs.js')) {
					$this->document->addScript('view/javascript/blog/tabs/tabs.js?v=' . $this->data['jc_version']);
				} else {
					if (file_exists(DIR_APPLICATION . 'view/javascript/jetcache/tabs.js')) {
						$this->document->addScript('view/javascript/jetcache/tabs.js?v=' . $this->data['jc_version']);
					}
				}
			}
			if (file_exists(DIR_APPLICATION . 'view/javascript/jetcache/jetcache.js')) {
				$this->document->addScript('view/javascript/jetcache/jetcache.js?v=' . $this->data['jc_version']);
			}

			if (file_exists(DIR_APPLICATION . 'view/javascript/jetcache/jetcache.buildcache.js')) {
				$this->document->addScript('view/javascript/jetcache/jetcache.buildcache.js?v=' . $this->data['jc_version']);
			}
			if (file_exists(DIR_APPLICATION . 'view/javascript/jetcache/jquery.chained.js')) {
				$this->document->addScript('view/javascript/jetcache/jquery.chained.js?v=' . $this->data['jc_version']);
			}
			return $this;
		}

		private function jc_init_languages() {
			$this->data['languages'] = $this->model_localisation_language->getLanguages();

			foreach ($this->data['languages'] as $code => $language) {
				if (!isset($language['image'])) {
					$this->data['languages'][$code]['image'] = 'language/' . $code . '/' . $code . '.png';
				} else {
					$this->data['languages'][$code]['image'] = 'view/image/flags/' . $language['image'];
				}
				if (!file_exists(DIR_APPLICATION . $this->data['languages'][$code]['image'])) {
					$this->data['languages'][$code]['image'] = 'view/image/seocms/sc_1x1.png';
				}
			}
			$this->data['config_language_id'] = $this->config->get('config_language_id');
			$this->data['config_admin_language'] = $this->config->get('config_admin_language');
			$doc_lang = substr(strtolower($this->data['config_admin_language']), 0, 2);
			if ($doc_lang == 'ru' || $doc_lang == 'uk' || $doc_lang == 'ua') {
				$this->data['doc_lang'] = 'ru';
			} else {
				$this->data['doc_lang'] = 'en';
			}
			return $this;
		}

		private function jc_init_stores() {

			if ($this->data['protocol'] == 'https') {
				$config_url_0 = HTTPS_CATALOG;
			} else {
				$config_url_0 = HTTP_CATALOG;
			}

			$this->data['stores'][0] = array(
				'store_id' => 0,
				// replacement of the apostrophe due to JS code add, because maybe JS error
				'name' => str_replace("'", "", $this->config->get('config_name')),
				'url' => $config_url_0,
			);

			$stores = $this->model_setting_store->getStores();

			foreach ($stores as $result) {
				if ($this->data['protocol'] == 'https' && isset($result['ssl']) && $result['ssl'] != '') {
					$store_url = $result['ssl'];
				} else {
					$store_url = $result['url'];
				}

				$this->data['stores'][$result['store_id']] = array(
					'store_id' => $result['store_id'],
					// replacement of the apostrophe due to JS code add, because maybe JS error
					'name' => str_replace("'", "", $result['name']),
					'url' => $store_url,
				);
			}

			return $this;
		}

		private function jc_output_notice() {
			if (isset($this->error['warning'])) {
				$this->data['error_warning'] = $this->error['warning'];
			} else {
				$this->data['error_warning'] = '';
			}
			if (isset($this->session->data['success'])) {
				$this->data['success'] = $this->session->data['success'];
				unset($this->session->data['success']);
			} else {
				$this->data['success'] = '';
			}

			if (isset($this->session->data['error_warning'])) {
				$this->data['error_warning'] = $this->session->data['error_warning'];
				unset($this->session->data['error_warning']);
			} else {
				$this->data['error_warning'] = '';
			}
			return $this;
		}

		private function jc_settings() {
			if (isset($this->request->post['ascp_settings'])) {
				$this->data['ascp_settings'] = $this->request->post['ascp_settings'];
			} else {
				$this->data['ascp_settings'] = $this->config->get('ascp_settings');
			}

			if (isset($this->request->post['asc_jetcache_settings'])) {
				$this->data['asc_jetcache_settings'] = $this->request->post['asc_jetcache_settings'];
			} else {
				$this->data['asc_jetcache_settings'] = $this->config->get('asc_jetcache_settings');
			}

			if (!empty($this->data['asc_jetcache_settings'])) {
				if (!isset($this->data['asc_jetcache_settings']['jetcache_widget_status'])) {
					$this->data['asc_jetcache_settings'] = array();
				}
			}
			if (!is_array($this->data['asc_jetcache_settings'])) {
				$this->data['asc_jetcache_settings'] = array();
			}

			return $this;
		}

		private function jc_settings_bots() {

			if (!isset($this->data['asc_jetcache_settings']['bots']) || $this->data['asc_jetcache_settings']['bots'] == '') {

				$this->data['asc_jetcache_settings']['bots'] =
					'Googlebot' . PHP_EOL .
					'adsbot' . PHP_EOL .
					'bingbot' . PHP_EOL .
					'msnbot' . PHP_EOL .
					'google.com/bot' . PHP_EOL .
					'msn.com/msnbot' . PHP_EOL .
					'APIs-Google' . PHP_EOL .
					'AdsBot-Google' . PHP_EOL .
					'Mediapartners-Google' . PHP_EOL .
					'AdsBot-Google-Mobile-Apps' . PHP_EOL .
					'FeedFetcher-Google' . PHP_EOL .
					'Google-Read-Aloud' . PHP_EOL .
					'DuplexWeb-Google' . PHP_EOL .
					'googleweblight' . PHP_EOL .
					'Storebot-Google' . PHP_EOL .
					'Lighthouse' . PHP_EOL .
					'google page speed' . PHP_EOL .
					'MSNBot' . PHP_EOL .
					'AdIdxBot' . PHP_EOL .
					'BingPreview' . PHP_EOL .
					'Yahoo! Slurp' . PHP_EOL .
					'StackRambler' . PHP_EOL .
					'Mail.RU_Bot' . PHP_EOL .
					'yandex.com/bots';
			} else {
				if (stripos($this->data['asc_jetcache_settings']['bots'], 'Inspection') === false) {
					$this->data['asc_jetcache_settings']['bots'] = 'Inspection' . PHP_EOL . $this->data['asc_jetcache_settings']['bots'];
				}
			}

			if (!isset($this->data['asc_jetcache_settings']['bots_cookie']) || $this->data['asc_jetcache_settings']['bots_cookie'] == '') {
				$this->data['asc_jetcache_settings']['bots_cookie'] =
					'languager|1' . PHP_EOL .
					'languageauto|1';
			}
			return $this;
		}



		private function jc_settings_log() {
			if (!isset($this->data['asc_jetcache_settings']['query_log_maxtime'])) {
				$this->data['asc_jetcache_settings']['query_log_maxtime'] = 0;
			}
			if (!isset($this->data['asc_jetcache_settings']['cont_log_maxtime'])) {
				$this->data['asc_jetcache_settings']['cont_log_maxtime'] = 0;
			}
			if (!isset($this->data['asc_jetcache_settings']['query_log_file']) || $this->data['asc_jetcache_settings']['query_log_file'] == '') {
				$this->data['asc_jetcache_settings']['query_log_file'] = 'jetcache_query.log';
			}
			if (!isset($this->data['asc_jetcache_settings']['cont_log_file']) || $this->data['asc_jetcache_settings']['cont_log_file'] == '') {
				$this->data['asc_jetcache_settings']['cont_log_file'] = 'jetcache_cont.log';
			}
			if (!isset($this->data['asc_jetcache_settings']['session_log_file']) || $this->data['asc_jetcache_settings']['session_log_file'] == '') {
				$this->data['asc_jetcache_settings']['session_log_file'] = 'jetcache_session.log';
			}
			return $this;
		}

		private function jc_settings_image() {

			if (!isset($this->data['asc_jetcache_settings']['image_mozjpeg_status'])) {
				$this->data['asc_jetcache_settings']['image_mozjpeg_status'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['image_mozjpeg_optimize'])) {
				$this->data['asc_jetcache_settings']['image_mozjpeg_optimize'] = true;
			}

			if (!isset($this->data['asc_jetcache_settings']['image_webp_status'])) {
				$this->data['asc_jetcache_settings']['image_webp_status'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['image_webp_command'])) {
				$this->data['asc_jetcache_settings']['image_webp_command'] = '-q 75';
			}

			if (!isset($this->data['asc_jetcache_settings']['image_webp_gd_quality']) || $this->data['asc_jetcache_settings']['image_webp_gd_quality'] == '' || (int)$this->data['asc_jetcache_settings']['image_webp_gd_quality'] < 10 || (int)$this->data['asc_jetcache_settings']['image_webp_gd_quality'] > 100) {
				$this->data['asc_jetcache_settings']['image_webp_gd_quality'] = 75;
			}

			if (!isset($this->data['asc_jetcache_settings']['image_mozjpeg_progressive'])) {
				$this->data['asc_jetcache_settings']['image_mozjpeg_progressive'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['image_jpegoptim_optimize'])) {
				$this->data['asc_jetcache_settings']['image_jpegoptim_optimize'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['image_jpegoptim_progressive'])) {
				$this->data['asc_jetcache_settings']['image_jpegoptim_progressive'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['image_jpegoptim_strip'])) {
				$this->data['asc_jetcache_settings']['image_jpegoptim_strip'] = true;
			}
			if (!isset($this->data['asc_jetcache_settings']['image_optipng_status'])) {
				$this->data['asc_jetcache_settings']['image_optipng_status'] = true;
			}
			return $this;
		}

		private function jc_settings_gzip() {

			if (!isset($this->data['asc_jetcache_settings']['seocms_jetcache_gzip_level'])) {
				$this->data['asc_jetcache_settings']['seocms_jetcache_gzip_level'] = 1;
			}
			if (!isset($this->data['gzip_level'])) {
				$this->data['gzip_level'] =
					array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9);
			}
			return $this;
		}

		private function jc_settings_query_model() {
			if (!isset($this->data['asc_jetcache_settings']['query_model'])) {
				$this->data['asc_jetcache_settings']['query_model'] =
					array(
						0 =>
						array(
							'model' => 'ModelCatalogProduct',
							'method' => 'getProducts',
							'type_id' => '0',
							'status' => '0'
						),
						1 =>
						array(
							'model' => 'ModelCatalogProduct',
							'method' => 'getTotalProducts',
							'type_id' => '1',
							'status' => '0'
						),
						2 =>
						array(
							'model' => 'ModelCatalogCategory',
							'method' => 'getCategories',
							'type_id' => '3',
							'status' => '0'
						)
					);
			}



			if (isset($this->request->post['asc_jetcache_settings']['query_model'])) {
				foreach ($this->request->post['asc_jetcache_settings']['query_model'] as $type_id => $query_model) {
					if ($query_model['model'] == '') {
						$this->request->post['asc_jetcache_settings']['query_model'][$query_model['type_id']]['model'] = 'Type-' . $query_model['type_id'];
					}

					if ($type_id != $query_model['type_id']) {
						unset($this->request->post['asc_jetcache_settings']['query_model'][$type_id]);
						$this->request->post['asc_jetcache_settings']['query_model'][$query_model['type_id']] = $query_model;
					}
				}
			}
			return $this;
		}

		private function jc_settings_model() {
			if (!isset($this->data['asc_jetcache_settings']['model'])) {
				$this->data['asc_jetcache_settings']['model'] =
					array(
						0 =>
						array(
							'model' => 'ModelCatalogProduct',
							'method' => 'getProducts',
							'type_id' => '0',
							'status' => '0'
						),
						1 =>
						array(
							'model' => 'ModelCatalogProduct',
							'method' => 'getTotalProducts',
							'onefile' => '1',
							'no_getpost' => '1',
							'no_session' => '1',
							'no_url' => '1',
							'no_route' => '1',
							'type_id' => '1',
							'status' => '0'
						),
						2 =>
						array(
							'model' => 'ModelCatalogInformation',
							'method' => 'getInformations',
							'onefile' => '1',
							'no_getpost' => '1',
							'no_session' => '1',
							'no_url' => '1',
							'no_route' => '1',
							'type_id' => '2',
							'status' => '0'
						),
						3 =>
						array(
							'model' => 'ModelCatalogCategory',
							'method' => 'getCategories',
							'onefile' => '0',
							'no_getpost' => '1',
							'no_session' => '1',
							'no_url' => '1',
							'no_route' => '0',
							'type_id' => '3',
							'status' => '0'
						),
						4 =>
						array(
							'model' => 'ModelDesignTranslation',
							'method' => 'getTranslations',
							'onefile' => '0',
							'ignore' => '1',
							'no_getpost' => '0',
							'no_session' => '0',
							'no_url' => '0',
							'no_route' => '0',
							'type_id' => '4',
							'status' => '0'
						)
					);
			}
			return $this;
		}

		private function jc_settings_ex_route() {
			if (isset($this->request->post['asc_jetcache_settings']['ex_route'])) {
				foreach ($this->request->post['asc_jetcache_settings']['ex_route'] as $type_id => $ex_route) {
					if ($ex_route['route'] == '') {
						$this->request->post['asc_jetcache_settings']['ex_route'][$ex_route['type_id']]['route'] = 'Type-' . $ex_route['type_id'];
					}

					if ($type_id != $ex_route['type_id']) {
						unset($this->request->post['asc_jetcache_settings']['ex_route'][$type_id]);
						$this->request->post['asc_jetcache_settings']['ex_route'][$ex_route['type_id']] = $ex_route;
					}
				}
			}
			if (!isset($this->data['asc_jetcache_settings']['ex_route'])) {
				$this->data['asc_jetcache_settings']['ex_route'] =
					array(
						0 =>
						array(
							'route' => 'checkout/%',
							'type_id' => '0',
							'status' => '1'
						),
						1 =>
						array(
							'route' =>  'account/%',
							'type_id' => '1',
							'status' => '1'
						),
						2 =>
						array(
							'route' =>  'api/%',
							'type_id' => '2',
							'status' => '1'
						),
						3 =>
						array(
							'route' =>  'error/%',
							'type_id' => '3',
							'status' => '1'
						),
						4 =>
						array(
							'route' =>  '%/country',
							'type_id' => '4',
							'status' => '1'
						),
						5 =>
						array(
							'route' =>  '%/captcha',
							'type_id' => '5',
							'status' => '1'
						),
						6 =>
						array(
							'route' =>  '%/ajax_viewed',
							'type_id' => '6',
							'status' => '1'
						),
						7 =>
						array(
							'route' =>  'affiliate/%',
							'type_id' => '7',
							'status' => '1'
						),
						8 =>
						array(
							'route' =>  'simplecheckout/%',
							'type_id' => '8',
							'status' => '1'
						),
						9 =>
						array(
							'route' =>  'information/contact',
							'type_id' => '9',
							'status' => '1'
						),
						10 =>
						array(
							'route' =>  'extension/payment/%',
							'type_id' => '10',
							'status' => '1'
						),
						11 =>
						array(
							'route' =>  'extension/total/%',
							'type_id' => '11',
							'status' => '1'
						),
						12 =>
						array(
							'route' =>  'extension/captcha/%',
							'type_id' => '12',
							'status' => '1'
						),
						13 =>
						array(
							'route' =>  'module/progroman/%',
							'type_id' => '13',
							'status' => '1'
						),
						14 =>
						array(
							'route' =>  'product/compare',
							'type_id' => '14',
							'status' => '1'
						),
						15 =>
						array(
							'route' =>  'checkout/oct_fastorder',
							'type_id' => '15',
							'status' => '1'
						),
						16 =>
						array(
							'route' =>  '%/feed/%',
							'type_id' => '16',
							'status' => '1'
						),
						17 =>
						array(
							'route' =>  'feed/%',
							'type_id' => '17',
							'status' => '1'
						),
						18 =>
						array(
							'route' =>  'extension/module/ocfilter/%',
							'type_id' => '18',
							'status' => '1'
						),
						19 =>
						array(
							'route' =>  'product/search',
							'type_id' => '19',
							'status' => '1'
						),
						20 =>
						array(
							'route' =>  'record/treecomments/%',
							'type_id' => '20',
							'status' => '1'
						),
						21 =>
						array(
							'route' =>  'extension/module/novaposhta_cron/%',
							'type_id' => '21',
							'status' => '1'
						),
						22 =>
						array(
							'route' =>  'product/product/review',
							'type_id' => '22',
							'status' => '1'
						),
						23 =>
						array(
							'route' =>  'product/product/breadlistcr',
							'type_id' => '23',
							'status' => '1'
						)

					);
			}
			return $this;
		}

		private function jc_settings_ex_key() {
			if (isset($this->request->post['asc_jetcache_settings']['ex_key']) && $this->request->post['asc_jetcache_settings']['ex_key'] != '') {
				$this->data['asc_jetcache_settings']['ex_key'] = $this->request->post['asc_jetcache_settings']['ex_key'];
			}
			if (!isset($this->data['asc_jetcache_settings']['ex_key']) || empty($this->data['asc_jetcache_settings']['ex_key'])) {
				$this->data['asc_jetcache_settings']['ex_key'] =
					'#currency' . PHP_EOL .
					'#product' . PHP_EOL .
					'#category' . PHP_EOL .
					'#manufacturer';
			}

			return $this;
		}

		private function jc_settings_lazy_tokens() {

			if (!isset($this->data['asc_jetcache_settings']['lazy_tokens']) || empty($this->data['asc_jetcache_settings']['lazy_tokens'])) {
				$this->data['asc_jetcache_settings']['lazy_tokens'] =
					'img src=|img src="data:image/svg+xml;base64,PHN2ZyAgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMXB4IiBoZWlnaHQ9IjFweCI+PC9zdmc+" data-src=' . PHP_EOL .
					'<img |<img loading="lazy" ' . PHP_EOL .
					'<iframe |<iframe loading="lazy" ';
			}
			return $this;
		}

		private function jc_settings_ex_uri() {
			if (isset($this->data['asc_jetcache_settings']['ex_page']) && !empty($this->data['asc_jetcache_settings']['ex_page'])) {
				$this->data['asc_jetcache_settings']['ex_uri'] = '';
				foreach ($this->data['asc_jetcache_settings']['ex_page'] as $type_id => $ex_page) {
					$uri = $this->data['asc_jetcache_settings']['ex_page'][$ex_page['type_id']]['url'];
					$uri_status = $this->data['asc_jetcache_settings']['ex_page'][$ex_page['type_id']]['status'];
					if ($uri_status) {
						$uri_status = '#';
					} else {
						$uri_status = '';
					}
					$this->data['asc_jetcache_settings']['ex_uri'] = $this->data['asc_jetcache_settings']['ex_uri'] . PHP_EOL . $uri_status . $uri;
				}
				$this->data['asc_jetcache_settings']['ex_uri'] = trim($this->data['asc_jetcache_settings']['ex_uri'], PHP_EOL);
			}
			if (isset($this->request->post['asc_jetcache_settings']['ex_uri']) && $this->request->post['asc_jetcache_settings']['ex_uri'] != '') {
				$this->data['asc_jetcache_settings']['ex_uri'] = $this->request->post['asc_jetcache_settings']['ex_uri'];
			}
			if (!isset($this->data['asc_jetcache_settings']['ex_uri']) || empty($this->data['asc_jetcache_settings']['ex_uri'])) {
				$this->data['asc_jetcache_settings']['ex_uri'] = 'checkout' . PHP_EOL . 'cart' . PHP_EOL . 'sitemap' . PHP_EOL . 'feed/' . PHP_EOL . 'extension/' . PHP_EOL . 'amp/';
			}
			return $this;
		}

		private function jc_settings_add_cont() {
			if (isset($this->request->post['asc_jetcache_settings']['add_cont'])) {
				foreach ($this->request->post['asc_jetcache_settings']['add_cont'] as $type_id => $add_cont) {
					if (isset($add_cont['cont']) && $add_cont['cont'] == '') {
						$this->request->post['asc_jetcache_settings']['add_cont'][$add_cont['type_id']]['cont'] = 'Type-' . $add_cont['type_id'];
					}

					if ($type_id != $add_cont['type_id']) {
						unset($this->request->post['asc_jetcache_settings']['add_cont'][$type_id]);
						$this->request->post['asc_jetcache_settings']['add_cont'][$add_cont['type_id']] = $add_cont;
					}
				}
			}

			if (!isset($this->data['asc_jetcache_settings']['cont_ajax_route']) && !isset($this->data['asc_jetcache_settings']['cont_ajax_routes'])) {
				if (SC_VERSION > 21) {
					$this->data['asc_jetcache_settings']['cont_ajax_route'] =
						'#extension/module/featured';
				} else {
					if (SC_VERSION < 20) {
						$this->data['asc_jetcache_settings']['cont_ajax_route'] =
							'#module/featured' . PHP_EOL .
							'#module/cart';
					} else {
						$this->data['asc_jetcache_settings']['cont_ajax_route'] =
							'#module/featured' . PHP_EOL .
							'#common/cart';
					}
				}
			}

			if (isset($this->data['asc_jetcache_settings']['cont_ajax_route']) && strpos($this->data['asc_jetcache_settings']['cont_ajax_route'], PHP_EOL) !== false) {

				$cont_ajax_routes = explode(PHP_EOL, trim($this->data['asc_jetcache_settings']['cont_ajax_route']));

				foreach ($cont_ajax_routes as $num => $cont_ajax_route) {
					if ($cont_ajax_route[0] != '#') {
						$this->data['asc_jetcache_settings']['cont_ajax_routes'][$num]['status'] = true;
					}
					$cont_ajax_route = str_replace('#', '', $cont_ajax_route);
					$this->data['asc_jetcache_settings']['cont_ajax_routes'][$num]['route'] = $cont_ajax_route;
				}
			}

			if (SC_VERSION > 22) {
				$array_cont['bestseller'] = 'extension/module/bestseller';
				$array_cont['featured'] = 'extension/module/featured';
				$array_cont['affiliate'] = 'extension/module/affiliate';
				$array_cont['category'] = 'extension/module/category';
				$array_cont['latest'] = 'extension/module/latest';
				$array_cont['special'] = 'extension/module/special';
				if (SC_VERSION > 23) {
					$array_cont['menu'] = 'common/menu';
				}
			} else {
				$array_cont['bestseller'] = 'module/bestseller';
				$array_cont['featured'] = 'module/featured';
				$array_cont['affiliate'] = 'module/affiliate';
				$array_cont['category'] = 'module/category';
				$array_cont['latest'] = 'module/latest';
				$array_cont['special'] = 'module/special';
			}

			if (!isset($this->data['asc_jetcache_settings']['add_cont']) || empty($this->data['asc_jetcache_settings']['add_cont'])) {

				$this->data['asc_jetcache_settings']['add_cont'] =
					array(
						0 => array(
							'cont' => 'common/footer',
							'type_id' => 0,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						),
						1 => array(
							'cont' => $array_cont['bestseller'],
							'type_id' => 1,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						),
						2 => array(
							'cont' => $array_cont['featured'],
							'type_id' => 2,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						),
						3 => array(
							'cont' => $array_cont['latest'],
							'type_id' => 3,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						),
						4 => array(
							'cont' => $array_cont['special'],
							'type_id' => 4,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						),
						5 => array(
							'cont' => $array_cont['affiliate'],
							'type_id' => 5,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						),
						6 => array(
							'cont' => $array_cont['category'],
							'type_id' => 6,
							'no_getpost' => 0,
							'only_get' => 'path',
							'no_session' => 1,
							'no_url' => 1,
							'no_route' => 1,
							'status' => 1
						),
						7 => array(
							'cont' => 'common/search',
							'type_id' => 7,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 0
						),
						8 => array(
							'cont' => 'common/menu',
							'type_id' => 8,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						),
						9 => array(
							'cont' => 'blog/menu',
							'type_id' => 9,
							'no_getpost' => 1,
							'no_session' => 1,
							'no_url' => 1,
							'status' => 1
						)

					);
				$next_key_add_cont_array = count($this->data['asc_jetcache_settings']['add_cont']);
				if (SC_VERSION > 23) {
					$this->data['asc_jetcache_settings']['add_cont'][$next_key_add_cont_array] = array(
						'cont' => $array_cont['menu'],
						'type_id' => $next_key_add_cont_array,
						'no_getpost' => 1,
						'no_session' => 1,
						'no_url' => 1,
						'status' => 1
					);
				}
			}

			if (empty($this->data['asc_jetcache_settings']['replacers'])) {

				$this->data['asc_jetcache_settings']['replacers'] =
					array(
						0 => array(
							'comment' => 'Lazy by browser' . PHP_EOL . '(not recommendated)',
							'in' => '<img ',
							'out' => '<img loading="lazy" ',
							'all' => 1,
							'status' => 0
						),
						2 => array(
							'comment' => 'Service',
							'in' => '><script',
							'out' => '>' . PHP_EOL . '<script',
							'all' => 1,
							'status' => 1
						),
						3 => array(
							'comment' => 'Service',
							'in' => '><link',
							'out' => '>' . PHP_EOL . '<link',
							'all' => 1,
							'status' => 1
						),
						4 => array(
							'comment' => 'Youtube',
							'in' => 'src="https://www.youtube.com/embed/',
							'out' => 'jc_after="1" src="" datasrc="https://www.youtube.com/embed/',
							'all' => 1,
							'status' => 1
						),
						5 => array(
							'comment' => 'Youtube',
							'in' => 'src="//www.youtube.com/embed/',
							'out' => 'jc_after="1" src="" datasrc="https://www.youtube.com/embed/',
							'all' => 1,
							'status' => 1
						),
						6 => array(
							'comment' => 'Youtube',
							'in' => 'src="https://youtube.com/embed/',
							'out' => 'jc_after="1" src="" datasrc="https://www.youtube.com/embed/',
							'all' => 1,
							'status' => 1
						),
						7 => array(
							'comment' => 'Youtube',
							'in' => '</body>',
							'out' => '<script>' . PHP_EOL .
								'	function jc_afterload_frame() {' . PHP_EOL .
								'		setTimeout(function() {' . PHP_EOL .
								'			Array.from(document.getElementsByTagName("iframe")).forEach(' . PHP_EOL .
								'				function(element, index, array) {' . PHP_EOL .
								'					if (element.getAttribute("jc_after")) {' . PHP_EOL .
								'						element.src = element.getAttribute("datasrc");' . PHP_EOL .
								'					}' . PHP_EOL .
								'				}' . PHP_EOL .
								'			);' . PHP_EOL .
								'		}, 100);' . PHP_EOL .
								'	}' . PHP_EOL .
								'	jc_afterload_frame();' . PHP_EOL .
								'</script>' . PHP_EOL .
								'</body>',
							'all' => 1,
							'status' => 1
						)
					);

				if (isset($this->data['asc_jetcache_settings']['lazy_status']) && $this->data['asc_jetcache_settings']['lazy_status'] && !empty($this->data['asc_jetcache_settings']['lazy_tokens'])) {
					$lazy_tokens_array = explode(PHP_EOL, $this->data['asc_jetcache_settings']['lazy_tokens']);
					$i_plus = count($this->data['asc_jetcache_settings']['replacers']);
					foreach ($lazy_tokens_array as $num => $lazy_token) {
						$lazy_token = trim($lazy_token);
						if (isset($lazy_token[0]) && $lazy_token[0] != '#' && $lazy_token != '' && strpos($lazy_token, '|') !== false) {
							$tokens_array = explode('|', $lazy_token);

							$this->data['asc_jetcache_settings']['replacers'][$i_plus]['in'] = html_entity_decode($tokens_array[0], ENT_QUOTES, 'UTF-8');
							$this->data['asc_jetcache_settings']['replacers'][$i_plus]['out'] = html_entity_decode($tokens_array[1], ENT_QUOTES, 'UTF-8');
							$this->data['asc_jetcache_settings']['replacers'][$i_plus]['all'] = true;
							$this->data['asc_jetcache_settings']['replacers'][$i_plus]['status'] = true;

							$i_plus++;
						}
					}
					$this->data['asc_jetcache_settings']['lazy_status'] = false;
					$this->data['asc_jetcache_settings']['lazy_tokens'] = '';
				}
			}

			if (isset($this->data['asc_jetcache_settings']['add_cont'])) {
				sort($this->data['asc_jetcache_settings']['add_cont']);
			}
			return $this;
		}

		private function jc_load_icon() {
			//$this->data['icon'] = getSCWebDir(DIR_IMAGE, $this->data['ascp_settings']) . 'jetcache/jetcache-icon.png';
			return $this;
		}

		private function jc_settings_ex_session() {
			if (!isset($this->data['asc_jetcache_settings']['ex_session']) || empty($this->data['asc_jetcache_settings']['ex_session'])) {
				$this->data['asc_jetcache_settings']['ex_session'] =
					'token' . PHP_EOL .
					'user_token' . PHP_EOL .
					'langmark_multi' . PHP_EOL .
					'product_viewed' . PHP_EOL .
					'productviewed' . PHP_EOL .
					'oct_productviewed' . PHP_EOL .
					'xds_product_viewed' . PHP_EOL .
					'captcha_product_questions' . PHP_EOL .
					'prmn.city_manager' . PHP_EOL .
					'payment_address' . PHP_EOL .
					'shipping_address' . PHP_EOL .
					'simple' . PHP_EOL .
					'viewed' . PHP_EOL .
					'low_price' . PHP_EOL .
					'high_price' . PHP_EOL .
					'oct_brand' . PHP_EOL .
					'oct_stock' . PHP_EOL .
					'oct_attribute' . PHP_EOL .
					'oct_option' . PHP_EOL .
					'oct_sticker' . PHP_EOL .
					'oct_standard' . PHP_EOL .
					'oct_rating' . PHP_EOL .
					'socnetauth2_lastlink' . PHP_EOL .
					'compare' . PHP_EOL .
					'wishlist' . PHP_EOL .
					'view' . PHP_EOL .
					'install' . PHP_EOL .
					'currency_old' . PHP_EOL .
					'language_old' . PHP_EOL .
					'nwa' . PHP_EOL .
					'microdataseourlgenerator';
			}

			if (!isset($this->data['asc_jetcache_settings']['ex_session_black']) || empty($this->data['asc_jetcache_settings']['ex_session_black'])) {
				$this->data['asc_jetcache_settings']['ex_session_black'] =
					'user_id' . PHP_EOL .
					'customer_id' . PHP_EOL .
					'geoip' . PHP_EOL .
					'currency' . PHP_EOL .
					'compare' . PHP_EOL .
					'language';
			} else {
				if (strpos($this->data['asc_jetcache_settings']['ex_session_black'], 'customer_id') === false) {
					$this->data['asc_jetcache_settings']['ex_session_black'] = $this->data['asc_jetcache_settings']['ex_session_black'] . PHP_EOL . 'customer_id';
				}
			}

			if (!isset($this->data['asc_jetcache_settings']['ex_cookie_black'])) {
				$this->data['asc_jetcache_settings']['ex_cookie_black'] =
					'languager' . PHP_EOL .
					'languageauto';
			}

			if (!isset($this->data['asc_jetcache_settings']['ex_session_black_status'])) {
				$this->data['asc_jetcache_settings']['ex_session_black_status'] = true;
			}

			$_ex_route =
				'feed' . PHP_EOL .
				'cart' . PHP_EOL .
				'error/' . PHP_EOL .
				'upload' . PHP_EOL .
				'compare' . PHP_EOL .
				'wishlist' . PHP_EOL .
				'geoip' . PHP_EOL .
				'captcha' . PHP_EOL .
				'payment' . PHP_EOL .
				'cron' . PHP_EOL .
				'city_manager' . PHP_EOL .
				'checkout/' . PHP_EOL .
				'account/' . PHP_EOL .
				'simplecheckout/' . PHP_EOL .
				'/country' . PHP_EOL .
				'information/contact' . PHP_EOL .
				'checkout/oct_fastorder' . PHP_EOL .
				'api/';

			if (!isset($this->data['asc_jetcache_settings']['minify_html_ex_route'])) {
				$this->data['asc_jetcache_settings']['minify_html_ex_route'] = $_ex_route;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_css_ex_route'])) {
				$this->data['asc_jetcache_settings']['minify_css_ex_route'] = $_ex_route;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_ex_route'])) {
				$this->data['asc_jetcache_settings']['minify_js_ex_route'] = $_ex_route;
			}
			if (!isset($this->data['asc_jetcache_settings']['replacers_ex_route'])) {
				$this->data['asc_jetcache_settings']['replacers_ex_route'] = $_ex_route;
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_css_ex_css_footer'])) {
				$this->data['asc_jetcache_settings']['minify_css_ex_css_footer'] =
					'';
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_css_ex_combine'])) {
				$this->data['asc_jetcache_settings']['minify_css_ex_combine'] =
					'index.php?route=';
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_ex_compress'])) {
				$this->data['asc_jetcache_settings']['minify_js_ex_compress'] =
					'.min.js' . PHP_EOL .
					'schema.org' . PHP_EOL .
					'jquery.magnify.js' . PHP_EOL .
					'jquery.elevatezoom.js' . PHP_EOL .
					'cloud-zoom' . PHP_EOL .
					'swiper.jquery.js';
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_js_ex_combine'])) {
				$this->data['asc_jetcache_settings']['minify_js_ex_combine'] =
					'/progroman/' . PHP_EOL .
					'javascript/mf/' . PHP_EOL .
					'oct-fonts.js' . PHP_EOL .
					'sdek.js';
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_js_ex_js_footer'])) {
				$this->data['asc_jetcache_settings']['minify_js_ex_js_footer'] =
					'google-analytics.com' . PHP_EOL .
					'googletagmanager' . PHP_EOL .
					'connect.facebook';
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_js_preload'])) {
				$this->data['asc_jetcache_settings']['minify_js_preload'] =
					'jc_afterload_frame' . PHP_EOL .
					'/progroman/' . PHP_EOL .
					').elevateZoom(' . PHP_EOL .
					'sdek.js' . PHP_EOL .
					'jivosite' . PHP_EOL .
					'top100.ru' . PHP_EOL .
					'yastatic.net' . PHP_EOL .
					'ipsp.js' . PHP_EOL .
					'addthis.com' . PHP_EOL .
					'sharethis.com' . PHP_EOL .
					'talk-me.ru' . PHP_EOL .
					'me-talk.ru' . PHP_EOL .
					'google.com/recaptcha' . PHP_EOL .
					'bitrix24.' . PHP_EOL .
					'roistat.com' . PHP_EOL .
					'binotel' . PHP_EOL .
					'cdek.ru' . PHP_EOL .
					'jsdelivr.net' . PHP_EOL .
					'static.mailerlite.com' . PHP_EOL .
					'jc_cont_ajax:' . PHP_EOL .
					'zadarma.com';
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_js_preload_gps'])) {

				$this->data['asc_jetcache_settings']['minify_js_preload'] = str_replace(array('googletagmanager' . PHP_EOL, 'mail.ru' . PHP_EOL, 'metrika' . PHP_EOL, 'yandex.ru' . PHP_EOL, 'fbq.consentCookieName' . PHP_EOL), array('', '', '', '', ''), $this->data['asc_jetcache_settings']['minify_js_preload']);

				$this->data['asc_jetcache_settings']['minify_js_preload_gps'] =
					'googletagmanager' . PHP_EOL .
					'google-analytics.com' . PHP_EOL .
					'gtag(' . PHP_EOL .
					'gtag/' . PHP_EOL .
					'mail.ru' . PHP_EOL .
					'metrika' . PHP_EOL .
					'yandex.ru' . PHP_EOL .
					'ajax.googleapis.com' . PHP_EOL .
					'MegaFilterLang' . PHP_EOL .
					'javascript/mf/direction_2.js' . PHP_EOL .
					'javascript/mf/jquery-plugins.js' . PHP_EOL .
					'javascript/mf/selectpicker.js' . PHP_EOL .
					'oct-fonts.js' . PHP_EOL .
					'connect.facebook';
			}


			if (!isset($this->data['asc_jetcache_settings']['minify_css_combine_status'])) {
				$this->data['asc_jetcache_settings']['minify_css_combine_status'] = 1;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_css_combine_head'])) {
				$this->data['asc_jetcache_settings']['minify_css_combine_head'] = '<link ';
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_js_footer'])) {
				$this->data['asc_jetcache_settings']['minify_js_footer'] = 1;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_first'])) {
				$this->data['asc_jetcache_settings']['minify_js_first'] = 1;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_combine_status'])) {
				$this->data['asc_jetcache_settings']['minify_js_combine_status'] = 1;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_combine_footer'])) {
				$this->data['asc_jetcache_settings']['minify_js_combine_footer'] = 1;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_inline_footer'])) {
				$this->data['asc_jetcache_settings']['minify_js_inline_footer'] = 1;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_afterload_time_mobile'])) {
				$this->data['asc_jetcache_settings']['minify_js_afterload_time_mobile'] = 11000;
			}
			if (!isset($this->data['asc_jetcache_settings']['minify_js_afterload_time_desktop'])) {
				$this->data['asc_jetcache_settings']['minify_js_afterload_time_desktop'] = 5000;
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_js_ex_inline_footer']) || $this->data['asc_jetcache_settings']['minify_js_ex_inline_footer'] == '') {
				$this->data['asc_jetcache_settings']['minify_js_ex_inline_footer'] = $this->data['asc_jetcache_settings']['minify_js_preload_gps'] . PHP_EOL . "localStorage.getItem('octFonts')";
			}

			if (!isset($this->data['asc_jetcache_settings']['minify_css_fonts_footer'])) {
				$this->data['asc_jetcache_settings']['minify_css_fonts_footer'] = true;
			}

			if (!isset($this->data['asc_jetcache_settings']['bots_ajax_add_route'])) {
				$this->data['asc_jetcache_settings']['bots_ajax_add_route'] =
					'product/product/review' . PHP_EOL .
					'product/product/write' . PHP_EOL .
					'tool/upload' . PHP_EOL .
					'product/product/getRecurringDescription';
			}
			if (!isset($this->data['asc_jetcache_settings']['bots_ajax_add_uri'])) {
				$this->data['asc_jetcache_settings']['bots_ajax_add_uri'] =
					'';
			}

			if (!isset($this->data['asc_jetcache_settings']['bots_ajax_server_response_1'])) {
				$this->data['asc_jetcache_settings']['bots_ajax_server_response_1'] = '404 Not Found';
			}
			if (!isset($this->data['asc_jetcache_settings']['bots_ajax_server_response_2'])) {
				$this->data['asc_jetcache_settings']['bots_ajax_server_response_2'] = 'Status: 404 Not Found';
			}




			return $this;
		}


		private function jc_settings_logo() {
			if (!isset($this->data['asc_jetcache_settings']['images_logo_dim']) || empty($this->data['asc_jetcache_settings']['images_logo_dim'])) {

				if ($this->config->get('config_logo') && $this->config->get('config_logo') != '' && is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
					$logo_path = DIR_IMAGE . $this->config->get('config_logo');
					list($width, $height, $type, $attr) = getimagesize($logo_path);
					$this->data['asc_jetcache_settings']['images_logo_dim']['width'] = $width;
					$this->data['asc_jetcache_settings']['images_logo_dim']['height'] = $height;
				}
			}
			return $this;
		}


		private function jc_settings_ex_get() {
			if (!isset($this->data['asc_jetcache_settings']['ex_get']) || empty($this->data['asc_jetcache_settings']['ex_get'])) {
				$this->data['asc_jetcache_settings']['ex_get'] =
					'yclid' . PHP_EOL .
					'fbclid' . PHP_EOL .
					'utm_content' . PHP_EOL .
					'utm_campaign' . PHP_EOL .
					'utm_medium' . PHP_EOL .
					'utm_source' . PHP_EOL .
					'utm_term';
			}
			return $this;
		}

		private function jc_settings_cache_auto_clear() {
			if (!isset($this->data['asc_jetcache_settings']['cache_auto_clear'])) {
				$this->data['asc_jetcache_settings']['cache_auto_clear'] = 168;
			}
			if (!$this->config->get('asc_cache_auto_clear')) {
				$this->model_setting_setting->editSetting('asc_cache_auto', array('asc_cache_auto_clear' => time()));
			}
			return $this;
		}

		private function jc_settings_folders_level() {
			if (!isset($this->data['asc_jetcache_settings']['cache_max_hache_folders_level'])) {
				$this->data['asc_jetcache_settings']['cache_max_hache_folders_level'] = 1;
			}
			return $this;
		}

		private function jc_settings_layouts() {
			$this->data['layouts'] = $this->model_design_layout->getLayouts();
			return $this;
		}

		private function jc_output_settings() {

			$this->data['session'] = $this->session;
			$this->data['language'] = $this->language;
			$this->children = array(
				'common/header',
				'common/footer'
			);
			$this->template = 'jetcache/jetcache';

			return $this;
		}

		private function jc_output() {

			if (SC_VERSION < 30) {
				$this->template = $this->template . '.tpl';
			}

			if (SC_VERSION < 20) {
				$this->data['column_left'] = '';
				$html = $this->render();
			} else {

				if (SC_VERSION > 23) {
					$this->config->set('template_engine', $this->template_engine);
				}
				$this->data['header'] = $this->load->controller('common/header');
				$this->data['footer'] = $this->load->controller('common/footer');
				$this->data['column_left'] = $this->load->controller('common/column_left');

				if (SC_VERSION > 23) {
					$this->config->set('template_engine', 'template');
				}
				$html = $this->load->view($this->template, $this->data);
				if (SC_VERSION > 23) {
					$this->config->set('template_engine', $this->template_engine);
				}
			}
			$this->data['output_html'] = $html;
			$this->response->setOutput($this->data['output_html']);

			return $this;
		}

		public function hook_Product($product_id, $type = 'add') {
			if ((isset($this->data['asc_jetcache_settings']['add_product']) && $this->data['asc_jetcache_settings']['add_product']) ||
				(isset($this->data['asc_jetcache_settings']['edit_product']) && $this->data['asc_jetcache_settings']['edit_product'])
			) {
				$this->cacheremove(false);
			} else {
				if (isset($this->data['asc_jetcache_settings']['edit_product_id']) && $this->data['asc_jetcache_settings']['edit_product_id']) {
					if (!is_callable(array($this->cache, 'json_error'))) {
						$Cache = $this->registry->get('cache');
						$this->registry->set('cache_old', $Cache);
						loadlibrary('agoo/cache');
						$jcCache = new agooCache($this->registry);
						$jcCache->agooconstruct();
						$this->registry->set('cache', $jcCache);
					}
					$this->load->model('jetcache/jetcache');
					$rows = $this->model_jetcache_jetcache->getProductsId($product_id);
					if (!empty($rows)) {
						foreach ($rows as $num => $row) {
							$this->config->set('blog_work', true);
							if ($this->cache->delete($row['filecache'])) {
								$this->model_jetcache_jetcache->removeCachefile($row['filecache']);
							}
						}
					}
				} else {
					return false;
				}
			}
		}

		public function hook_Category() {
			if (isset($this->data['asc_jetcache_settings']['add_category']) && $this->data['asc_jetcache_settings']['add_category']) {
				$this->cacheremove(false);
			} else {
				return false;
			}
		}

		public function __call($name, $args) {
			if (function_exists($name)) {
				array_unshift($args, $this);
				return call_user_func_array($name, $args);
			}
		}

		public function jc_menu() {

			if ($this->validateview()) {
				$menus = array();
				$menus_children = array();
				if (isset($this->data['asc_jetcache_settings']['jetcache_menu_order']) && $this->data['asc_jetcache_settings']['jetcache_menu_order']) {
					$jetcache_menu_order = $this->data['asc_jetcache_settings']['jetcache_menu_order'];
				} else {
					$jetcache_menu_order = 999;
				}
				if (isset($this->request->post['jetcache_menu_order']) && $this->request->post['jetcache_menu_order'] != '') {
					$jetcache_menu_order = (int)$this->request->post['jetcache_menu_order'];
				}

				if (!isset($this->request->get[$this->data['token_name']])) return;

				$this->language->load('jetcache/jetcache');

				if (isset($this->data['asc_jetcache_settings']['jetcache_widget_status']) && $this->data['asc_jetcache_settings']['jetcache_widget_status']) {
					$jc_name_status = $this->language->get('text_js_status_on');
				} else {
					$jc_name_status = $this->language->get('text_js_status_off');
				}
				$url_cache_remove = $this->url->link('jetcache/jetcache/cacheremove', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl);
				$url_cache_remove = str_ireplace('&amp;', '&', $url_cache_remove);
				$text_loading_main = $this->language->get('text_loading_main');
				$text_cache_remove_fail = $this->language->get('text_cache_remove_fail');
				$jc_text_cacheremove = $this->language->get('text_url_cache_remove');

				if (SC_VERSION < 20) {
					$mod_str = 'jetcache/jetcache/cacheremove';
					$mod_str_value = 'mod=1&';
				} else {
					if (SC_VERSION > 23) {
						$mod_str = 'marketplace/modification/refresh';
					} else {
						$mod_str = 'extension/modification/refresh';
					}
					$mod_str_value = '';
				}

				$url_ocmod_refresh = $this->url->link($mod_str, $mod_str_value . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl);
				$url_ocmod_refresh = str_ireplace('&amp;', '&', $url_ocmod_refresh);

				$jc_name_cacheremove = <<<EOF
$jc_text_cacheremove<div id="jc_div_cache_refresh"></div>
EOF;


				$jc_url_cacheremove = <<<EOF
#" onclick="
$.ajax({
	url: '$url_cache_remove',
	dataType: 'json',
	beforeSend: function()
	{
       $('#jc_div_cache_refresh').html('$text_loading_main');
	},
	success: function(json) {
		if (json) {
			$('#jc_div_cache_refresh').html('<span style=\'color:#caeaad\'>'+json['content']+'<\/span>');
			setTimeout('$(\'#jc_div_cache_refresh\').html(\'\')', 1000);
		}
	},
	error: function(json) {
		$('#jc_div_cache_refresh').html('<span style=\'color:red\'>$text_cache_remove_fail<\/span>');
	}
}); return false;" style="
EOF;


				$text_ocmod_refresh = $this->language->get('text_ocmod_refresh');
				$text_refresh_ocmod_success = $this->language->get('text_refresh_ocmod_success');
				$text_refresh_ocmod_success = html_entity_decode($text_refresh_ocmod_success, ENT_QUOTES, 'UTF-8');

				$jc_name_ocmodrefresh = <<<EOF
$text_ocmod_refresh<div id="jc_div_ocmod_refresh"></div>
EOF;


				$jc_url_ocmodrefresh = <<<EOF
#" onclick="
$.ajax({
	url: '$url_ocmod_refresh',
	dataType: 'html',
	beforeSend: function()
	{
       $('#jc_div_ocmod_refresh').html('$text_loading_main');
	},
	success: function(content) {
		if (content) {
			$('#jc_div_ocmod_refresh').html('<span style=\'color:#caeaad\'>$text_refresh_ocmod_success<\/span>');
			setTimeout('$(\'#jc_div_ocmod_refresh\').html(\'\')', 1000);
		}
	},
	error: function(content) {
		$('#jc_div_ocmod_refresh').html('<span style=\'color:red\'>$text_cache_remove_fail<\/span>');
	}
}); return false;" style="
EOF;

				$data['menus_id'] = 'menu-jetcache';

				$menus_children[] = array(
					'name'	   => $jc_name_status,
					'href'     => str_replace('&amp;', '&', $this->url->link('jetcache/jetcache', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl)),
					'children' => array()
				);
				$menus_children[] = array(
					'name'	   => $jc_name_cacheremove,
					'href'     => $jc_url_cacheremove,
					'children' => array()
				);
				$menus_children[] = array(
					'name'	   => $jc_name_ocmodrefresh,
					'href'     => $jc_url_ocmodrefresh,
					'children' => array()
				);


				if (SC_VERSION > 23) {
					$href_main = false;
				} else {
					$href_main = str_replace('&amp;', '&', $this->url->link('jetcache/jetcache', $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']], $this->url_link_ssl));
				}

				if (is_array($menus) && $menus_children) {
					$menus[$jetcache_menu_order] = array(
						'id'       => $data['menus_id'],
						'icon'	   => 'fa-dot-circle-o',
						'name'	   => strip_tags($this->language->get('heading_title_jc')),
						'href'     => $href_main,
						'children' => $menus_children
					);
				}

				$data['menus'] = $menus;

				$this->template = 'jetcache/menu';

				if (SC_VERSION < 30) {
					$this->template = $this->template . '.tpl';
				}

				if (SC_VERSION < 20) {
					$this->data['column_left'] = '';
					$this->data = $data;
					$jc_menus  = $this->render();
				} else {

					if (SC_VERSION > 23) {
						$this->config->set('template_engine', 'template');
					}

					$jc_menus = $this->load->view($this->template, $data);

					if (SC_VERSION > 23) {
						$this->config->set('template_engine', $this->template_engine);
					}
				}

				return $jc_menus;
			} else {
				return;
				//return $this->response->setOutput($this->language->get('access_denided'));
			}
		}

		public function jc_file_view($type = 'query') {
			$this->language->load('jetcache/jetcache');
			if ($this->validate()) {
				$this->data['asc_jetcache_settings'] = $this->config->get('asc_jetcache_settings');
				if (isset($this->request->get['type'])) {
					$type = $this->request->get['type'];
				}

				$view_flag = false;

				if ($type == 'query' && isset($this->data['asc_jetcache_settings']['query_log_file']) && $this->data['asc_jetcache_settings']['query_log_file'] != '' && file_exists(DIR_LOGS . $this->data['asc_jetcache_settings']['query_log_file'])) {
					$file_log = DIR_LOGS . $this->data['asc_jetcache_settings']['query_log_file'];
					$view_flag = true;
				}
				if ($type == 'session' && isset($this->data['asc_jetcache_settings']['session_log_file']) && $this->data['asc_jetcache_settings']['session_log_file'] != '' && file_exists(DIR_LOGS . $this->data['asc_jetcache_settings']['session_log_file'])) {
					$file_log = DIR_LOGS . $this->data['asc_jetcache_settings']['session_log_file'];
					$view_flag = true;
				}
				if ($type == 'cont' && isset($this->data['asc_jetcache_settings']['cont_log_file']) && $this->data['asc_jetcache_settings']['cont_log_file'] != '' && file_exists(DIR_LOGS . $this->data['asc_jetcache_settings']['cont_log_file'])) {
					$file_log = DIR_LOGS . $this->data['asc_jetcache_settings']['cont_log_file'];
					$view_flag = true;
				}

				if ($view_flag) {
					$html = file_get_contents($file_log);
				} else {
					$html = $this->language->get('unlink_unsuccess');
				}
			} else {
				$html = $this->language->get('access_denided');
			}

			$this->response->setOutput($html);
		}

		public function jc_remove_log($type = 'query') {
			$this->language->load('jetcache/jetcache');
			if ($this->validate()) {
				$this->data['asc_jetcache_settings'] = $this->config->get('asc_jetcache_settings');
				if (isset($this->request->get['type'])) {
					$type = $this->request->get['type'];
				}
				$unlink_flag = false;

				if ($type == 'query' && isset($this->data['asc_jetcache_settings']['query_log_file']) && $this->data['asc_jetcache_settings']['query_log_file'] != '' && file_exists(DIR_LOGS . $this->data['asc_jetcache_settings']['query_log_file'])) {
					$file_log = DIR_LOGS . $this->data['asc_jetcache_settings']['query_log_file'];
					$unlink_flag = true;
				}
				if ($type == 'session' && isset($this->data['asc_jetcache_settings']['session_log_file']) && $this->data['asc_jetcache_settings']['session_log_file'] != '' && file_exists(DIR_LOGS . $this->data['asc_jetcache_settings']['session_log_file'])) {
					$file_log = DIR_LOGS . $this->data['asc_jetcache_settings']['session_log_file'];
					$unlink_flag = true;
				}
				if ($type == 'cont' && isset($this->data['asc_jetcache_settings']['cont_log_file']) && $this->data['asc_jetcache_settings']['cont_log_file'] != '' && file_exists(DIR_LOGS . $this->data['asc_jetcache_settings']['cont_log_file'])) {
					$file_log = DIR_LOGS . $this->data['asc_jetcache_settings']['cont_log_file'];
					$unlink_flag = true;
				}
				if ($unlink_flag) {
					unlink($file_log);
					$html = $this->language->get('unlink_success');
				} else {
					$html = $this->language->get('unlink_unsuccess');
				}
			} else {
				$html = $this->language->get('access_denided');
			}

			$this->response->setOutput($html);
		}

		/***************************************/
		private function validate() {
			$this->language->load('jetcache/jetcache');

			if (is_callable(array($this->user, 'hasPermission'))) {
				if (!$this->user->hasPermission('modify', 'jetcache/jetcache')) {
					$this->error['warning'] = $this->language->get('error_permission');
				}
			} else {
				$this->error['warning'] = $this->language->get('error_permission');
			}
			if (!$this->error) {
				return true;
			} else {
				$this->request->post = array();
				return false;
			}
		}
		/***************************************/

		private function validateview() {
			$this->language->load('jetcache/jetcache');

			if (is_callable(array($this->user, 'hasPermission'))) {
				if (!$this->user->hasPermission('access', 'jetcache/jetcache')) {
					$this->error['warning'] = $this->language->get('error_permission');
				}
			} else {
				$this->error['warning'] = $this->language->get('error_permission');
			}
			if (!$this->error) {
				return true;
			} else {
				$this->request->post = array();
				return false;
			}
		}


		public function deletesettings() {
			if (($this->request->server['REQUEST_METHOD'] == 'GET') && $this->validate()) {
				$html = "";
				$this->language->load('jetcache/jetcache');
				$this->load->model('setting/setting');
				$this->model_setting_setting->deleteSetting('asc_jetcache_settings');
				$this->model_setting_setting->deleteSetting('asc_jetcache_version');

				$html = $this->language->get('text_jetcache_success');
				$this->response->setOutput($html);
			} else {
				$html = $this->language->get('error_permission');
				$this->response->setOutput($html);
			}
		}
		/***************************************/
		public function createTables() {
			if (($this->request->server['REQUEST_METHOD'] == 'GET') && $this->validate()) {
				$html = '';
				$this->load->model('setting/setting');
				$this->language->load('jetcache/jetcache');

				$this->data['jetcache_version'] = $this->language->get('jetcache_version');

				$setting_version = array(
					'asc_jetcache_version' => $this->data['jetcache_version']
				);
				$this->model_setting_setting->editSetting('asc_jetcache_version', $setting_version);

				if (!$this->config->get('asc_jetcache_settings') && !is_array($this->config->get('asc_jetcache_settings'))) {
					$aoptions = array(
						'switch' => true,
						'cache_widgets' => false
					);
					$this->load->model('localisation/language');
					$languages = $this->model_localisation_language->getLanguages();

					$settings = array(
						'asc_jetcache_settings' => $aoptions
					);
					$this->model_setting_setting->editSetting('asc_jetcache_settings', $settings);

					$html .= $this->language->get('text_install_ok');
				} else {
					$html .= $this->language->get('text_install_already');
				}

				$this->response->setOutput($html);
			} else {
				$html = $this->language->get('error_permission');
				$this->response->setOutput($html);
			}
		}

		public function install_jetcache_ocmod() {
			if (($this->request->server['REQUEST_METHOD'] == 'GET') && $this->validate()) {

				$this->install_ocmod_settings();
				$this->optimize_setting();

				if (file_exists(DIR_APPLICATION . 'controller/agoo/jetcache/jetcache.ocmod.xml')) {
					unlink(DIR_APPLICATION . 'controller/agoo/jetcache/jetcache.ocmod.xml');
				}

				if (file_exists(DIR_APPLICATION . 'controller/agoo/jetcache/jetcache.php')) {
					unlink(DIR_APPLICATION . 'controller/agoo/jetcache/jetcache.php');
				}

				$this->language->load('jetcache/jetcache');
				//$this->jc_check(0);
				$this->create_tables('');

				if (SC_VERSION > 22) {
					$r = $this->db->query("DESCRIBE  " . DB_PREFIX . "layout_module `device`");
					if ($r->num_rows == 0) {
						$msql = "ALTER TABLE " . DB_PREFIX . "layout_module ADD `device` INT(1) NULL DEFAULT '0' AFTER `position`";
						$query = $this->db->query($msql);
					}
				}

				$html = '';
				if (file_exists('../catalog/model/agoo/catalog/product.php')) {
					@unlink('../catalog/model/agoo/catalog/product.php');
					$html .= $this->language->get('ocmod_file_agoo_catalog_product_unlink_successfully');
				}

				if (SC_VERSION > 23) {
					$mod_controller = 'marketplace';
					$modification_model = 'setting';
				} else {
					$mod_controller = 'extension';
					$modification_model = 'extension';
				}


				$html .=  $this->install_ocmod($this->data['widgets_ocmod']);

				$url_route_refresh = $mod_controller . '/modification/refresh&' . $this->data['token_name'] . '=' . $this->session->data[$this->data['token_name']];
				$url_ocmod_refresh = str_replace('&amp;', '&', $this->url->link($url_route_refresh, '', $this->url_link_ssl));

				$text_loading_main = $this->language->get('text_loading_main');
				$text_refresh_ocmod_successfully = $this->language->get('text_refresh_ocmod_successfully');
				$text_refresh_ocmod_error = $this->language->get('text_refresh_ocmod_error');

				$html .= <<<EOF
					<script>
						$.ajax({url: '$url_ocmod_refresh',
									dataType: 'html',
									beforeSend: function() {
										$('#div_ocmod_refresh_install').html('LOADING');
									},
									success: function(content) {
										if (content) {
											$('#div_ocmod_refresh_install').html('SUCCESS');
										}
										$('#sc_check_common').click();
									},
									error: function(content) {
										$('#div_ocmod_refresh_install').html('ERROR');
									}
								});
					</script>

EOF;
				$html = str_replace('LOADING', html_entity_decode($text_loading_main, ENT_QUOTES, 'UTF-8'), $html);
				$html = str_replace('SUCCESS', html_entity_decode($text_refresh_ocmod_successfully, ENT_QUOTES, 'UTF-8'), $html);
				$html = str_replace('ERROR', html_entity_decode($text_refresh_ocmod_error, ENT_QUOTES, 'UTF-8'), $html);

				$this->response->setOutput($html);
			} else {
				$html = $this->language->get('error_permission');
				$this->response->setOutput($html);
			}
		}


		private function table_exists($tableName) {
			$found = false;
			$like   = addcslashes($tableName, '%_\\');
			$result = $this->db->query("SHOW TABLES LIKE '" . $this->db->escape($like) . "';");
			$found  = $result->num_rows > 0;
			return $found;
		}

		public function visual($arg) {
			return true;
		}

		private function create_tables($table = '') {
			if ($table != '') {
				for ($i = 0; $i < 5; $i++) {
					$sql[] = "
DROP TABLE IF EXISTS `" . DB_PREFIX . "jetcache_" . $table . "_" . $i . "`";

					$sql[] = "
CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "jetcache_" . $table . "_" . $i . "` (
`jc_id` int(11) NOT NULL AUTO_INCREMENT,
`id` INT(11) NOT NULL,
`key_db` VARCHAR(255) NOT NULL,
`value_db` LONGTEXT NOT NULL,
`time_expire_db` INT(11) NOT NULL,
PRIMARY KEY (`jc_id`),
KEY `key_db` (`key_db`),
KEY `time_expire_db` (`time_expire_db`))
ENGINE = MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci;";
				}
				foreach ($sql as $qsql) {
					$query = $this->db->query($qsql);
				}
			}
			$sql = "
CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "jetcache_product_cache` (
 `jc_id` int(11) NOT NULL AUTO_INCREMENT,
 `product_id` int(11) NOT NULL,
 `filecache` text NOT NULL,
 `expires` DATETIME,
PRIMARY KEY (`jc_id`),
KEY `product_id` (`product_id`),
KEY `expires` (`expires`),
UNIQUE `product_id_file_cache` (`product_id`, `filecache`(255)))
ENGINE=MyISAM DEFAULT CHARSET=utf8";

			$this->db->query($sql);


			$sql_set[] = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "setting_jetcache` (
				`setting_id` INT(11) NOT NULL AUTO_INCREMENT ,
				`store_id` INT(11) NOT NULL DEFAULT '0' ,
				`codekey` VARCHAR(128) NOT NULL ,
				`value` LONGTEXT NOT NULL ,
				`serialized` TINYINT(1) NOT NULL,
				UNIQUE `setting_id` (`setting_id`),
				INDEX `store_id` (`store_id`),
				INDEX `codekey` (`codekey`)
				) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;";

			foreach ($sql_set as $qsql) {
				$query = $this->db->query($qsql);
			}
		}

		public function cacheremove($ajax_message = true) {
			$error = false;
			$html_more = '';
			if ($this->validate()) {

				if (is_array($ajax_message)) $ajax_message = true;

				$sc_ver = VERSION;
				if (!defined('SC_VERSION')) define('SC_VERSION', (int)substr(str_replace('.', '', $sc_ver), 0, 2));
				$status = false;
				$html = '';
				$html_more = '';

				if (function_exists('modification')) {
					require_once(modification(DIR_SYSTEM . 'library/exceptionizer.php'));
				} else {
					require_once(DIR_SYSTEM . 'library/exceptionizer.php');
				}

				$exceptionizer = new PHP_Exceptionizer(E_ALL);

				$status = true;
				$status_dirs = true;

				if ($this->config->get('cache_type') == 'redis') {
					if (method_exists($this->redis, 'flushDb')) {
						$this->redis->flushDb();
					} else {
						$this->cache->jc_flushAll();
					}
				}

				if (!isset($this->request->get['image'])) {
					$dir_for_clear[] = DIR_CACHE;
					$dir_for_clear[] = DIR_IMAGE . 'jetcache/css/';
					$dir_for_clear[] = DIR_IMAGE . 'jetcache/css_cache/';
					$dir_for_clear[] = DIR_IMAGE . 'jetcache/js/';
					$dir_for_clear[] = DIR_IMAGE . 'jetcache/js_cache/';
				} else {
					$dir_for_clear[] = DIR_IMAGE . 'cache/';
				}

				if (isset($this->request->get['mod'])) {
					$dir_root = str_ireplace('/system/', '', str_ireplace('\\', '/', DIR_SYSTEM)) . '/';
					$dir_for_clear[] = $dir_root . 'vqmod/vqcache/';

					if (!is_dir($dir_for_clear[0])) {
						$html_more .= $this->language->get('text_cache_remove_fail');
						$status = false;
					}
				}
				if ($status) {

					if (isset($this->request->post['asc_jetcache_settings']['image_remove_ext']) && $this->request->post['asc_jetcache_settings']['image_remove_ext'] != '') {
						$image_remove_ext = $this->request->post['asc_jetcache_settings']['image_remove_ext'];
					} else {
						$image_remove_ext = '*';
					}

					foreach ($dir_for_clear as $num => $dir_for_clear_name) {
						$files = $this->getDelFiles($dir_for_clear_name, $image_remove_ext, array('.htaccess', 'exchange1c'));

						if ($files['files']) {
							foreach ($files['files'] as $file) {
								if (file_exists($file)) {
									try {
										unlink($file);
										$status = true;
									} catch (E_WARNING $e) {
										$status = false;
									}
								}
							}
						}

						if ($files['dirs']) {
							krsort($files['dirs']);
							foreach ($files['dirs'] as $file) {
								if (is_dir($file) && file_exists($file)) {
									try {
										rmdir($file);
										$status_dirs = true;
									} catch (E_WARNING $e) {
										$status_dirs = false;
									}
								}
							}
						}
					}


					for ($i = 0; $i < 5; $i++) {
						$table = DB_PREFIX . "jetcache_pages_" . $i;
						if ($this->table_exists($table)) {
							$sql = "TRUNCATE TABLE " . $table;
							$query = $this->db->query($sql);
						}
						$table = DB_PREFIX . "jetcache_cont_" . $i;
						if ($this->table_exists($table)) {
							$sql = "TRUNCATE TABLE " . $table;
							$query = $this->db->query($sql);
						}
						$table = DB_PREFIX . "jetcache_model_" . $i;
						if ($this->table_exists($table)) {
							$sql = "TRUNCATE TABLE " . $table;
							$query = $this->db->query($sql);
						}
					}
					$table = DB_PREFIX . "jetcache_product_cache";
					if ($this->table_exists($table)) {
						$sql = "TRUNCATE TABLE " . $table;
						$query = $this->db->query($sql);
					}
				}

				if ($status) {
					$this->load->model('setting/setting');

					if (!$this->config->get('asc_cache_auto_clear')) {
						$this->model_setting_setting->editSetting('asc_cache_auto', array('asc_cache_auto_clear' => time()));
					}

					$html = $this->language->get('text_cache_remove_success');
					if (!$status_dirs) {
						$html_more .= $this->language->get('text_cache_remove_success_select');
					}
				} else {
					$html .= $this->language->get('text_cache_remove_fail');
				}
			} else {
				$error = true;
				$html = $this->language->get('text_no_access');
			}

			if (!$ajax_message) {
				$html = '';
			}

			$json = array(
				'content' => $html,
				'content_more' => $html_more,
				'error' => (int)$error
			);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}

		private function getDelFiles($dir, $ext = "*", $exp = array()) {

			if (function_exists('modification')) {
				require_once(modification(DIR_SYSTEM . 'library/exceptionizer.php'));
			} else {
				require_once(DIR_SYSTEM . 'library/exceptionizer.php');
			}

			$files['files'] = array();
			$files['dirs'] = array();

			$dir = str_replace('//', '/', $dir);

			$exceptionizer = new PHP_Exceptionizer(E_ALL);
			try {
				$dir_pieces = explode('/', $dir);
				$dir_end = array_pop($dir_pieces);
				if (is_dir($dir) && !in_array($dir_end, $exp)) {
					$handle = opendir($dir);
					$subfiles = array();
					while (false !== ($file = readdir($handle))) {
						if ($file != '.' && $file != '..') {
							if (is_dir(rtrim($dir, '/') . '/' . $file)) {
								if (!in_array($file, $exp)) {

									$subfiles = $this->getDelFiles(rtrim($dir, '/') . '/' . $file, $ext, $exp);

									if (!isset($subfiles['dirs'])) $subfiles['dirs'] = $files['dirs'];
									if (!isset($subfiles['files'])) $subfiles['files'] = $files['files'];

									$files['dirs'][] = rtrim($dir, '/') . '/' . $file;

									$files['files'] = array_merge($files['files'], $subfiles['files']);
									$files['dirs'] = array_merge($files['dirs'], $subfiles['dirs']);
								}
							} else {
								$flie_name = $dir . '/' . $file;
								$flie_name = str_replace('//', '/', $flie_name);
								if ((substr($flie_name, strrpos($flie_name, '.')) == '.' . $ext) || ($ext == '*')) {
									if (!in_array($file, $exp)) {
										$files['files'][] = $flie_name;
									}
								}
							}
						}
					}
					closedir($handle);
				}
				$status = true;
			} catch (E_WARNING $e) {
				$status = false;
			}

			if (!isset($files['dirs'])) $files['dirs'] = array();
			if (!isset($files['files'])) $files['files'] = array();

			return $files;
		}

		public function jc_on_off() {
			$html = '';
			$json = array();
			$status = false;
			if ($this->validate()) {

				$this->data['asc_jetcache_settings'] = $this->config->get('asc_jetcache_settings');

				if (isset($this->request->get['jc_status']) && $this->request->get['jc_status']) {
					if (!$this->data['asc_jetcache_settings']['jetcache_widget_status']) {
						$this->data['asc_jetcache_settings']['jetcache_widget_status'] = true;
						$status = true;
					} else {
						$this->data['asc_jetcache_settings']['jetcache_widget_status'] = false;
						$status = false;
					}
				}
				if (isset($this->request->get['jc_page_status']) && $this->request->get['jc_page_status']) {
					if (!$this->data['asc_jetcache_settings']['pages_status']) {
						$this->data['asc_jetcache_settings']['pages_status'] = true;
						$status = true;
					} else {
						$this->data['asc_jetcache_settings']['pages_status'] = false;
						$status = false;
					}
				}
				if (isset($this->request->get['jc_cont_status']) && $this->request->get['jc_cont_status']) {
					if (!$this->data['asc_jetcache_settings']['cont_status']) {
						$this->data['asc_jetcache_settings']['cont_status'] = true;
						$status = true;
					} else {
						$this->data['asc_jetcache_settings']['cont_status'] = false;
						$status = false;
					}
				}
				if (isset($this->request->get['jc_model_status']) && $this->request->get['jc_model_status']) {
					if (!$this->data['asc_jetcache_settings']['jetcache_model_status']) {
						$this->data['asc_jetcache_settings']['jetcache_model_status'] = true;
						$status = true;
					} else {
						$this->data['asc_jetcache_settings']['jetcache_model_status'] = false;
						$status = false;
					}
				}
				if (isset($this->request->get['jc_query_status']) && $this->request->get['jc_query_status']) {
					if (!$this->data['asc_jetcache_settings']['jetcache_query_status']) {
						$this->data['asc_jetcache_settings']['jetcache_widget_status'] = true;
						$status = true;
					} else {
						$this->data['asc_jetcache_settings']['jetcache_query_status'] = false;
						$status = false;
					}
				}
				if (isset($this->request->get['jc_query_log_status']) && $this->request->get['jc_query_log_status']) {
					if (!$this->data['asc_jetcache_settings']['query_log_status']) {
						$this->data['asc_jetcache_settings']['query_log_status'] = true;
						$status = true;
					} else {
						$this->data['asc_jetcache_settings']['query_log_status'] = false;
						$status = false;
					}
				}

				$data['asc_jetcache_settings']['asc_jetcache_settings'] = $this->data['asc_jetcache_settings'];
				$this->model_setting_setting->editSetting('asc_jetcache_settings', $data['asc_jetcache_settings']);

				$html = $this->session->data['success'] = $this->language->get('text_jetcache_success');
			} else {
				$html = $this->language->get('access_denided');
			}

			if ($status) {
				$name = $this->language->get('text_status_on');
			} else {
				$name = $this->language->get('text_status_off');
			}

			$json['message'] = $html;
			$json['name'] = $name;
			$json['status'] = $status;

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}

		private function jc_image_webp_gd() {

			$this->data['image_status_error'] = $this->data['image_status_success'] = array();

			$gd = gd_info();

			if (isset($gd['WebP Support']) && $gd['WebP Support']) {
				$webp_gd_support = true;
			} else {
				$webp_gd_support = false;
			}
			if ($webp_gd_support) {

				if (isset($this->data['asc_jetcache_settings']['image_webp_gd_quality']) && $this->data['asc_jetcache_settings']['image_webp_gd_quality'] != '' && (int)$this->data['asc_jetcache_settings']['image_webp_gd_quality'] >= 10 && (int)$this->data['asc_jetcache_settings']['image_webp_gd_quality'] <= 100) {
					$image_webp_gd_quality = (int)$this->data['asc_jetcache_settings']['image_webp_gd_quality'];
				} else {
					$image_webp_gd_quality = 75;
				}

				$dir_image_array = explode('/', trim(DIR_IMAGE, '/'));
				$dir_image = $dir_image_array[count($dir_image_array) - 1];

				$image_path_input = 'view/image/jetcache/test.jpg';
				$image_path_output = 'cache/test_gd.webp';

				$image_fullpath_input = DIR_APPLICATION . $image_path_input;
				$image_fullpath_output = DIR_IMAGE . $image_path_output;

				if (file_exists($image_fullpath_output)) unlink($image_fullpath_output);

				$extension = pathinfo($image_fullpath_input, PATHINFO_EXTENSION);

				if (strtolower($extension) == 'jpg') {
					$image_original = imagecreatefromjpeg($image_fullpath_input);
				} elseif (strtolower($extension) == 'png') {
					$image_original = imagecreatefrompng($image_fullpath_input);
					imagepalettetotruecolor($image_original);
					imagealphablending($image_original, true);
					imagesavealpha($image_original, true);
				}

				if (isset($image_original)) {
					imagewebp($image_original,  $image_fullpath_output, $image_webp_gd_quality);
					imagedestroy($image_original);

					if (filesize($image_fullpath_output) % 2 == 1) {
						file_put_contents($image_fullpath_output, "\0", FILE_APPEND);
					}
				} else {
					$image_fullpath_output = false;
				}
			}
			if ($webp_gd_support && file_exists($image_fullpath_output) && (filesize($image_fullpath_output) <  filesize($image_fullpath_input)) && filesize($image_fullpath_output) > 0) {
				$this->data['image_status_success']['webp_gd_exec']['image_original_url'] = $this->admin_server . $image_path_input;
				$this->data['image_status_success']['webp_gd_exec']['image_optimized_url'] = $this->admin_server . '../' . $dir_image . '/' . $image_path_output;
				$this->data['image_status_success']['webp_gd_exec']['image_original_filesize'] = filesize($image_fullpath_input);
				$this->data['image_status_success']['webp_gd_exec']['image_optimized_filesize'] = filesize($image_fullpath_output);
				$this->data['image_status_success']['webp_gd_exec']['image_optimized_percent'] = round(((filesize($image_fullpath_input) - filesize($image_fullpath_output)) / filesize($image_fullpath_input)) * 100);
				$this->data['image_webp_gd'] = true;
			} else {
				$this->data['image_status_error']['webp_gd_exec'] = $this->language->get('error_image_webp_gd_exec');
				$this->data['image_status_error']['webp_gd_exec_notice'] = '';
				$this->data['image_status_error']['webp_gd_exec_string'] = '';
				$this->data['image_webp_gd'] = false;
			}
			return $this;
		}

		private function jc_image_optimization() {

			$pipes = array();
			$this->data['optipng_optimize_level'] =	array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7);

			if (!isset($this->data['asc_jetcache_settings']['optipng_optimize_level'])) {
				$this->data['asc_jetcache_settings']['optipng_optimize_level'] = 2;
			}

			if ($this->jc_function_exists('exec') || (@exec('echo EXEC') == 'EXEC')) {
				$this->data['asc_jetcache_settings']['image_exec'] = true;
				$this->data['image_status_success']['exec'] = true;
			} else {
				$this->data['asc_jetcache_settings']['image_exec'] = false;
				$this->data['image_status_error']['exec'] = $this->language->get('error_image_exec');
			}

			if (!$this->jc_function_exists('proc_open')) {
				if (!$this->data['asc_jetcache_settings']['image_exec']) {
					if (isset($this->data['image_webp_gd']) && $this->data['image_webp_gd']) {
					} else {
						$this->data['asc_jetcache_settings']['image_status'] = false;
					}
				}
				$this->data['asc_jetcache_settings']['image_proc_open'] = false;
				$this->data['image_status_error']['proc_open'] = $this->language->get('error_image_proc_open');
			} else {
				$this->data['asc_jetcache_settings']['image_proc_open'] = true;
				$this->data['image_status_success']['proc_open'] = true;
			}

			if (strtolower(PHP_OS) != 'linux') {
				if (isset($this->data['image_webp_gd']) && $this->data['image_webp_gd']) {
				} else {
					$this->data['asc_jetcache_settings']['image_status'] = false;
				}
				$this->data['image_status_error']['linux'] = $this->language->get('error_image_linux');
			} else {
				$this->data['image_status_success']['linux'] = true;
			}

			if (strtolower(PHP_OS) == 'linux') {

				if (isset($this->data['asc_jetcache_settings']['image_mozjpeg_command']) && $this->data['asc_jetcache_settings']['image_mozjpeg_command'] != '') {
					$image_mozjpeg_command = $this->data['asc_jetcache_settings']['image_mozjpeg_command'];
				} else {
					$image_mozjpeg_command = '';
				}

				$mozjpeg_paths[] = DIR_SYSTEM . 'library/io/mozjpeg/cjpeg';
				$mozjpeg_paths[] = DIR_SYSTEM . 'library/io/moz/cjpeg';
				$mozjpeg_paths[] = DIR_SYSTEM . 'library/io/mozj/cjpeg';
				clearstatcache();
				foreach ($mozjpeg_paths as $num => $mozjpeg_path) {
					$this->data['jc_path_mozjpeg'] = $mozjpeg_path;

					if (!$this->jc_permissions_check($this->data['jc_path_mozjpeg'])) {
						if (!is_writable($this->data['jc_path_mozjpeg']) || !@chmod($this->data['jc_path_mozjpeg'], 0755)) {
							$this->data['image_status_error']['mozjpeg_perms'] = $this->language->get('error_image_mozjpeg_perms');
						} else {
							$this->data['image_status_success']['mozjpeg_perms'] = true;
						}
					} else {
						$this->data['image_status_success']['mozjpeg_perms'] = true;
					}

					$dir_image_array = explode('/', trim(DIR_IMAGE, '/'));
					$dir_image = $dir_image_array[count($dir_image_array) - 1];

					$path_image = 'view/image/jetcache/test.jpg';
					$path_image_cache = 'cache/test.jpg';
					$io_path_image_tmp = DIR_APPLICATION . $path_image;
					$io_path_image = DIR_IMAGE . $path_image_cache;

					if (file_exists($io_path_image)) unlink($io_path_image);

					if (isset($this->data['asc_jetcache_settings']['image_mozjpeg_optimize']) && $this->data['asc_jetcache_settings']['image_mozjpeg_optimize']) {
						$image_mozjpeg_optimize = '-optimize';
					} else {
						$image_mozjpeg_optimize = '';
					}

					if (isset($this->data['asc_jetcache_settings']['image_mozjpeg_progressive']) && $this->data['asc_jetcache_settings']['image_mozjpeg_progressive']) {
						$image_mozjpeg_progressive = '-progressive';
					} else {
						$image_mozjpeg_progressive = '';
					}

					$mozjpeg_exec_string = $this->data['jc_path_mozjpeg'] . " " . $image_mozjpeg_command . " " . $image_mozjpeg_optimize . " " . $image_mozjpeg_progressive . " -outfile '" . $io_path_image . "' '" . $io_path_image_tmp . "' 2>&1";


					if ($this->data['asc_jetcache_settings']['image_exec']) {
						exec($mozjpeg_exec_string, $jpegmoz_version);
					}

					if (!$this->data['asc_jetcache_settings']['image_exec'] && $this->data['asc_jetcache_settings']['image_proc_open']) {
						$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
						$process = proc_open($mozjpeg_exec_string, $descriptorspec, $pipes);
						if (is_resource($process)) {
							$jpegmoz_version = proc_close($process);
						}
					}

					if (file_exists($io_path_image) && (filesize($io_path_image) <  filesize($io_path_image_tmp)) && filesize($io_path_image) > 0) {
						$this->data['image_status_success']['mozjpeg_exec']['image_original_url'] = $this->admin_server . $path_image;
						$this->data['image_status_success']['mozjpeg_exec']['image_optimized_url'] = $this->admin_server . '../' . $dir_image . '/' . $path_image_cache;
						$this->data['image_status_success']['mozjpeg_exec']['image_original_filesize'] = filesize($io_path_image_tmp);
						$this->data['image_status_success']['mozjpeg_exec']['image_optimized_filesize'] = filesize($io_path_image);
						$this->data['image_status_success']['mozjpeg_exec']['image_optimized_percent'] = round(((filesize($io_path_image_tmp) - filesize($io_path_image)) / filesize($io_path_image_tmp)) * 100);
						$this->data['image_mozjpeg'] = true;
						break;
					} else {
						$this->data['image_status_error']['mozjpeg_exec'] = $this->language->get('error_image_mozjpeg_exec');
						$this->data['image_status_error']['mozjpeg_exec_notice'] = $mozjpeg_exec_string;
						$this->data['image_status_error']['mozjpeg_exec_string'] = $mozjpeg_exec_string;
						$this->data['image_mozjpeg'] = false;
					}
				}
				if (isset($this->data['asc_jetcache_settings']['image_jpegoptim_command']) && $this->data['asc_jetcache_settings']['image_jpegoptim_command'] != '') {
					$image_jpegoptim_command = $this->data['asc_jetcache_settings']['image_jpegoptim_command'];
				} else {
					$image_jpegoptim_command = '';
				}
				$jpegoptim_paths[] = DIR_SYSTEM . 'library/io/jpegoptim/jpegoptim';
				$jpegoptim_paths[] = DIR_SYSTEM . 'library/io/jpegoptim/jpegopti';
				clearstatcache();
				foreach ($jpegoptim_paths as $num => $jpegoptim_path) {
					$this->data['jc_path_jpegoptim'] = $jpegoptim_path;

					if (!$this->jc_permissions_check($this->data['jc_path_jpegoptim'])) {
						if (!is_writable($this->data['jc_path_jpegoptim']) || !@chmod($this->data['jc_path_jpegoptim'], 0755)) {
							$this->data['image_status_error']['jpegoptim_perms'] = $this->language->get('error_image_jpegoptim_perms');
						} else {
							$this->data['image_status_success']['jpegoptim_perms'] = true;
						}
					} else {
						$this->data['image_status_success']['jpegoptim_perms'] = true;
					}

					$dir_image_array = explode('/', trim(DIR_IMAGE, '/'));
					$dir_image = $dir_image_array[count($dir_image_array) - 1];

					$path_image = 'view/image/jetcache/test.jpg';
					$path_image_cache = 'cache/testi.jpg';
					$io_path_image_tmp = DIR_APPLICATION . $path_image;
					$io_path_image = DIR_IMAGE . $path_image_cache;

					if (file_exists($io_path_image)) unlink($io_path_image);
					copy($io_path_image_tmp, $io_path_image);

					if (isset($this->data['asc_jetcache_settings']['image_jpegoptim_optimize']) && $this->data['asc_jetcache_settings']['image_jpegoptim_optimize']) {
						$image_jpegoptim_optimize = '--force ';
					} else {
						$image_jpegoptim_optimize = '';
					}

					if (isset($this->data['asc_jetcache_settings']['image_jpegoptim_level']) && $this->data['asc_jetcache_settings']['image_jpegoptim_level'] > 1 && $this->data['asc_jetcache_settings']['image_jpegoptim_level'] < 100) {
						$image_jpegoptim_level = '--max=' . (int)$this->data['asc_jetcache_settings']['image_jpegoptim_level'] . ' ';
					} else {
						$image_jpegoptim_level = '';
					}

					if (isset($this->data['asc_jetcache_settings']['image_jpegoptim_size']) && $this->data['asc_jetcache_settings']['image_jpegoptim_size'] > 1 && $this->data['asc_jetcache_settings']['image_jpegoptim_size'] < 100) {
						$image_jpegoptim_size = '--size=' . (int)$this->data['asc_jetcache_settings']['image_jpegoptim_size'] . '% ';
					} else {
						$image_jpegoptim_size = '';
					}

					if (isset($this->data['asc_jetcache_settings']['image_jpegoptim_strip']) && $this->data['asc_jetcache_settings']['image_jpegoptim_strip']) {
						$image_jpegoptim_strip = '--strip-all --strip-iptc ';
					} else {
						$image_jpegoptim_strip = '';
					}

					if (isset($this->data['asc_jetcache_settings']['image_jpegoptim_progressive']) && $this->data['asc_jetcache_settings']['image_jpegoptim_progressive']) {
						$image_jpegoptim_progressive = '--all-progressive ';
					} else {
						$image_jpegoptim_progressive = '';
					}

					$jpegoptim_exec_string = $this->data['jc_path_jpegoptim'] . " " . $image_jpegoptim_command . " " . $image_jpegoptim_optimize . $image_jpegoptim_progressive . $image_jpegoptim_strip . $image_jpegoptim_size . $image_jpegoptim_level . "--overwrite '" . $io_path_image . "'  2>&1";

					if ($this->data['asc_jetcache_settings']['image_exec']) {
						exec($jpegoptim_exec_string, $jpegoptim_version);
					}

					if (!$this->data['asc_jetcache_settings']['image_exec'] && $this->data['asc_jetcache_settings']['image_proc_open']) {
						$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
						$process = proc_open($jpegoptim_exec_string, $descriptorspec, $pipes);
						if (is_resource($process)) {
							$jpegoptim_version = proc_close($process);
						}
					}

					if (file_exists($io_path_image) && (filesize($io_path_image) <  filesize($io_path_image_tmp)) && filesize($io_path_image) > 0) {
						$this->data['image_status_success']['jpegoptim_exec']['image_original_url'] = $this->admin_server . $path_image;
						$this->data['image_status_success']['jpegoptim_exec']['image_optimized_url'] = $this->admin_server . '../' . $dir_image . '/' . $path_image_cache;
						$this->data['image_status_success']['jpegoptim_exec']['image_original_filesize'] = filesize($io_path_image_tmp);
						$this->data['image_status_success']['jpegoptim_exec']['image_optimized_filesize'] = filesize($io_path_image);
						$this->data['image_status_success']['jpegoptim_exec']['image_optimized_percent'] = round(((filesize($io_path_image_tmp) - filesize($io_path_image)) / filesize($io_path_image_tmp)) * 100);
						$this->data['image_jpegoptim'] = true;
						break;
					} else {
						$this->data['image_status_error']['jpegoptim_exec'] = $this->language->get('error_image_jpegoptim_exec');
						$this->data['image_status_error']['jpegoptim_exec_notice'] = $jpegoptim_exec_string;
						$this->data['image_status_error']['jpegoptim_exec_string'] = $jpegoptim_exec_string;
						$this->data['image_jpegoptim'] = false;
					}
				}
				if (isset($this->data['asc_jetcache_settings']['image_optipng_command']) && $this->data['asc_jetcache_settings']['image_optipng_command'] != '') {
					$image_optipng_command = $this->data['asc_jetcache_settings']['image_optipng_command'];
				} else {
					$image_optipng_command = '';
				}
				$optipng_paths[] = DIR_SYSTEM . 'library/io/optipng/optipng';
				$optipng_paths[] = DIR_SYSTEM . 'library/io/opti/optipng';
				clearstatcache();
				foreach ($optipng_paths as $num => $optipng_path) {
					$this->data['jc_path_optipng'] = $optipng_path;
					if (!$this->jc_permissions_check($this->data['jc_path_optipng'])) {
						if (!is_writable($this->data['jc_path_optipng']) || !@chmod($this->data['jc_path_optipng'], 0755)) {
							$this->data['image_status_error']['optipng_perms'] = $this->language->get('error_image_optipng_perms');
						} else {
							$this->data['image_status_success']['optipng_perms'] = true;
						}
					} else {
						$this->data['image_status_success']['optipng_perms'] = true;
					}
					$path_image = 'view/image/jetcache/test.png';
					$path_image_cache = 'cache/test.png';
					$io_path_image_tmp = DIR_APPLICATION . $path_image;
					$io_path_image = DIR_IMAGE . $path_image_cache;
					if (file_exists($io_path_image)) unlink($io_path_image);
					copy($io_path_image_tmp, $io_path_image);

					if (isset($this->data['asc_jetcache_settings']['optipng_optimize_level'])) {
						$image_optipng_optimize = (int)$this->data['asc_jetcache_settings']['optipng_optimize_level'];
					} else {
						$image_optipng_optimize = '1';
					}
					$optipng_exec_string = $this->data['jc_path_optipng'] . " " . $image_optipng_command . " " . " -o" . $image_optipng_optimize . " -quiet -strip all '" . $io_path_image . "' 2>&1";

					if ($this->data['asc_jetcache_settings']['image_exec']) {
						exec($optipng_exec_string, $optipng_version);
					}

					if (!$this->data['asc_jetcache_settings']['image_exec'] && $this->data['asc_jetcache_settings']['image_proc_open']) {
						$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
						$process = proc_open($optipng_exec_string, $descriptorspec, $pipes);
						if (is_resource($process)) {
							$optipng_version = proc_close($process);
						}
					}

					if (file_exists($io_path_image) && (filesize($io_path_image) <  filesize($io_path_image_tmp)) && filesize($io_path_image) > 0) {
						$this->data['image_status_success']['optipng_exec']['image_original_url'] = $this->admin_server . $path_image;
						$this->data['image_status_success']['optipng_exec']['image_optimized_url'] = $this->admin_server . '../' . $dir_image . '/' . $path_image_cache;
						$this->data['image_status_success']['optipng_exec']['image_original_filesize'] = filesize($io_path_image_tmp);
						$this->data['image_status_success']['optipng_exec']['image_optimized_filesize'] = filesize($io_path_image);
						$this->data['image_status_success']['optipng_exec']['image_optimized_percent'] = round(((filesize($io_path_image_tmp) - filesize($io_path_image)) / filesize($io_path_image_tmp)) * 100);
						$this->data['image_optipng'] = true;
						break;
					} else {
						$this->data['image_status_error']['optipng_exec'] = $this->language->get('error_image_optipng_exec');
						$this->data['image_status_error']['optipng_exec_notice'] = $optipng_exec_string;
						$this->data['image_status_error']['optipng_exec_string'] = $optipng_exec_string;
						$this->data['image_optipng'] = false;
					}
				}

				if (isset($this->data['asc_jetcache_settings']['image_webp_command']) && $this->data['asc_jetcache_settings']['image_webp_command'] != '') {
					$image_webp_command = $this->data['asc_jetcache_settings']['image_webp_command'];
				} else {
					$image_webp_command = '';
				}
				//Latest version https://developers.google.com/speed/webp/download
				$webp_paths[] = DIR_SYSTEM . 'library/io/webp13/cwebp';
				$webp_paths[] = DIR_SYSTEM . 'library/io/webp11/cwebp';
				$webp_paths[] = DIR_SYSTEM . 'library/io/webph/cwebp';
				$webp_paths[] = DIR_SYSTEM . 'library/io/webp/cwebp';

				clearstatcache();
				foreach ($webp_paths as $num => $webp_path) {
					$this->data['jc_path_webp'] = $webp_path;

					if (!$this->jc_permissions_check($this->data['jc_path_webp'])) {
						if (!is_writable($this->data['jc_path_webp']) || !@chmod($this->data['jc_path_webp'], 0755)) {
							$this->data['image_status_error']['webp_perms'] = $this->language->get('error_image_webp_perms');
						} else {
							$this->data['image_status_success']['webp_perms'] = true;
						}
					} else {
						$this->data['image_status_success']['webp_perms'] = true;
					}

					$dir_image_array = explode('/', trim(DIR_IMAGE, '/'));
					$dir_image = $dir_image_array[count($dir_image_array) - 1];

					$path_image = 'view/image/jetcache/test.jpg';
					$path_image_cache = 'cache/test.webp';
					$io_path_image_tmp = DIR_APPLICATION . $path_image;
					$io_path_image = DIR_IMAGE . $path_image_cache;

					if (file_exists($io_path_image)) unlink($io_path_image);

					if (isset($this->data['asc_jetcache_settings']['image_webp_lossess']) && $this->data['asc_jetcache_settings']['image_webp_lossess']) {
						$image_webp_lossess = '-lossless';
					} else {
						$image_webp_lossess = '';
					}

					$webp_exec_string = $this->data['jc_path_webp'] . " " . $image_webp_command . " " . $image_webp_lossess . " '" . $io_path_image_tmp  . "' -o '" . $io_path_image . "' 2>&1";

					if ($this->data['asc_jetcache_settings']['image_exec']) {
						exec($webp_exec_string, $webp_version);
					}

					if (!$this->data['asc_jetcache_settings']['image_exec'] && $this->data['asc_jetcache_settings']['image_proc_open']) {
						$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"));
						$process = proc_open($webp_exec_string, $descriptorspec, $pipes);
						if (is_resource($process)) {
							$webp_version = proc_close($process);
						}
					}

					if (file_exists($io_path_image) && (filesize($io_path_image) <  filesize($io_path_image_tmp)) && filesize($io_path_image) > 0) {
						$this->data['image_status_success']['webp_exec']['image_original_url'] = $this->admin_server . $path_image;
						$this->data['image_status_success']['webp_exec']['image_optimized_url'] = $this->admin_server . '../' . $dir_image . '/' . $path_image_cache;
						$this->data['image_status_success']['webp_exec']['image_original_filesize'] = filesize($io_path_image_tmp);
						$this->data['image_status_success']['webp_exec']['image_optimized_filesize'] = filesize($io_path_image);
						$this->data['image_status_success']['webp_exec']['image_optimized_percent'] = round(((filesize($io_path_image_tmp) - filesize($io_path_image)) / filesize($io_path_image_tmp)) * 100);
						$this->data['image_webp'] = true;
						break;
					} else {
						$this->data['image_status_error']['webp_exec'] = $this->language->get('error_image_webp_exec');
						$this->data['image_status_error']['webp_exec_notice'] = $webp_exec_string;
						$this->data['image_status_error']['webp_exec_string'] = $webp_exec_string;
						$this->data['image_webp'] = false;
					}
				}
			} else {
				$this->data['image_status_error']['mozjpeg_exec'] = $this->language->get('error_image_mozjpeg_exec');
				$this->data['image_status_error']['jpegoptim_exec'] = $this->language->get('error_image_jpegoptim_exec');
				$this->data['image_status_error']['optipng_exec'] = $this->language->get('error_image_optipng_exec');
				$this->data['image_status_error']['webp_exec'] = $this->language->get('error_image_webp_exec');
			}
			return $this;
		}

		public function install() {
			if (!isset($this->request->get[$this->data['token_name']])) return;
			$this->load->model('user/user_group');

			$user_groups = $this->model_user_user_group->getUserGroups();

			if (!empty($user_groups)) {
				$group = '';
				$count_modify = 0;
				foreach ($user_groups as $num => $user_group) {
					if (SC_VERSION < 21) {
						$permissions = unserialize($user_group['permission']);
					} else {
						$permissions = json_decode($user_group['permission'], true);
					}
					//Administrator has more access to files. Who has more rights, that and dad
					if (isset($permissions['modify']) && (count($permissions['modify']) > $count_modify)) {
						$count_modify = count($permissions['modify']);
						$group = (int)$user_group['user_group_id'];
					}
				}
				if ($group != '') {
					// For the chief administrator who has the most rights
					$this->model_user_user_group->addPermission((int)$group, 'access', 'jetcache/jetcache');
					$this->model_user_user_group->addPermission((int)$group, 'modify', 'jetcache/jetcache');
					$this->model_user_user_group->addPermission((int)$group, 'access', 'extension/module/jetcache');
					$this->model_user_user_group->addPermission((int)$group, 'modify', 'extension/module/jetcache');
					$this->model_user_user_group->addPermission((int)$group, 'access', 'module/jetcache');
					$this->model_user_user_group->addPermission((int)$group, 'modify', 'module/jetcache');
					// For the current user group from which the installation was made
					if (SC_VERSION > 15 && (int)$group != $this->user->getGroupId()) {
						$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'jetcache/jetcache');
						$this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'jetcache/jetcache');
						$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/module/jetcache');
						$this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/module/jetcache');
						$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'module/jetcache');
						$this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'module/jetcache');
					}
				}
			}
		}

		public function uninstall() {
			if (!isset($this->request->get[$this->data['token_name']])) return;
			if ($this->validate()) {
				$this->load->model('user/user_group');

				$user_groups = $this->model_user_user_group->getUserGroups();

				if (!empty($user_groups)) {
					foreach ($user_groups as $num => $user_group) {
						if (SC_VERSION < 21) {
							$permissions = unserialize($user_group['permission']);
						} else {
							$permissions = json_decode($user_group['permission'], true);
						}
						if (SC_VERSION > 15) {
							if (!empty($permissions['access'])) {
								$this->model_user_user_group->removePermission((int)$user_group['user_group_id'], 'access', 'jetcache/jetcache');
								$this->model_user_user_group->removePermission((int)$user_group['user_group_id'], 'access', 'extension/module/jetcache');
								$this->model_user_user_group->removePermission((int)$user_group['user_group_id'], 'access', 'module/jetcache');
							}
							if (!empty($permissions['modify'])) {
								$this->model_user_user_group->removePermission((int)$user_group['user_group_id'], 'modify', 'jetcache/jetcache');
								$this->model_user_user_group->removePermission((int)$user_group['user_group_id'], 'modify', 'extension/module/jetcache');
								$this->model_user_user_group->removePermission((int)$user_group['user_group_id'], 'modify', 'module/jetcache');
							}
						}
					}
				}
			}
		}

		public function install_ocmod_settings() {

			if (!isset($this->data['widgets_ocmod']) || empty($this->data['widgets_ocmod'])) {

				if (!isset($this->data['asc_jetcache_settings']['jetcache_widget_status'])) {
					$this->data['asc_jetcache_settings']['jetcache_widget_status'] = false;
				}

				if (!isset($this->data['asc_jetcache_settings']['jetcache_menu_status'])) {
					$this->data['asc_jetcache_settings']['jetcache_menu_status'] = true;
				}

				if (!isset($this->data['asc_jetcache_settings']['jetcache_query_status'])) {
					$this->data['asc_jetcache_settings']['jetcache_query_status'] = false;
				}

				if (!isset($this->data['asc_jetcache_settings']['header_categories_status'])) {
					$this->data['asc_jetcache_settings']['header_categories_status'] = false;
				}

				if (!isset($this->data['asc_jetcache_settings']['image_status'])) {
					$this->data['asc_jetcache_settings']['image_status'] = false;
				}

				if (!isset($this->data['asc_jetcache_settings']['images_x'])) {
					$this->data['asc_jetcache_settings']['images_x'] = false;
				}

				if (!isset($this->data['asc_jetcache_settings']['images_logo_dim_status'])) {
					$this->data['asc_jetcache_settings']['images_logo_dim_status'] = false;
				}

				if (!isset($this->data['asc_jetcache_settings']['images_logo_preload'])) {
					$this->data['asc_jetcache_settings']['images_logo_preload'] = false;
				}

				if (!isset($this->data['asc_jetcache_settings']['images_product_preload'])) {
					$this->data['asc_jetcache_settings']['images_product_preload'] = false;
				}
				if (!isset($this->data['asc_jetcache_settings']['device_detect'])) {
					$this->data['asc_jetcache_settings']['device_detect'] = false;
				}


				if (SC_VERSION > 15) {
					$this->data['widgets_ocmod'][] = array(
						'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_mod.ocmod.xml',
						'name' => $this->language->get('ocmod_jetcache_mod_name'),
						'id' => $this->language->get('ocmod_jetcache_mod_name'),
						'mod' => $this->language->get('ocmod_jetcache_mod_mod'),
						'version' => $this->language->get('jetcache_version'),
						'author' => $this->language->get('ocmod_jetcache_author'),
						'link' => $this->language->get('ocmod_jetcache_link'),
						'html' => $this->language->get('ocmod_jetcache_mod_html'),
						'status' => 1,
						'switch' => array(),
					);
				}

				$this->data['widgets_ocmod'][] = array(
					'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_menu.ocmod.xml',
					'name' => $this->language->get('ocmod_jetcache_menu_name'),
					'id' => $this->language->get('ocmod_jetcache_menu_name'),
					'mod' => $this->language->get('ocmod_jetcache_menu_mod'),
					'version' => $this->language->get('jetcache_version'),
					'author' => $this->language->get('ocmod_jetcache_author'),
					'link' => $this->language->get('ocmod_jetcache_link'),
					'html' => $this->language->get('ocmod_jetcache_menu_html'),
					'status' => 0,
					'switch' => array(
						'all' => array($this->data['asc_jetcache_settings']['jetcache_widget_status'], $this->data['asc_jetcache_settings']['jetcache_menu_status']),
						'one' => array($this->data['asc_jetcache_settings']['jetcache_menu_status'])
					)
				);

				$this->data['widgets_ocmod'][] = array(
					'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_db.ocmod.xml',
					'name' => $this->language->get('ocmod_jetcache_db_name'),
					'id' => $this->language->get('ocmod_jetcache_db_name'),
					'mod' => $this->language->get('ocmod_jetcache_db_mod'),
					'version' => $this->language->get('jetcache_version'),
					'author' => $this->language->get('ocmod_jetcache_author'),
					'link' => $this->language->get('ocmod_jetcache_link'),
					'html' => $this->language->get('ocmod_jetcache_db_html'),
					'status' => 0,
					'switch' => array(
						'all' => array($this->data['asc_jetcache_settings']['jetcache_widget_status'], $this->data['asc_jetcache_settings']['jetcache_query_status'])
					)
				);

				if (SC_VERSION < 30) {
					$this->data['widgets_ocmod'][] = array(
						'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_cat.ocmod.xml',
						'name' => $this->language->get('ocmod_jetcache_cat_name'),
						'id' => $this->language->get('ocmod_jetcache_cat_name'),
						'mod' => $this->language->get('ocmod_jetcache_cat_mod'),
						'html' => $this->language->get('ocmod_jetcache_cat_html'),
						'version' => $this->language->get('jetcache_version'),
						'author' => $this->language->get('ocmod_jetcache_author'),
						'link' => $this->language->get('ocmod_jetcache_link'),
						'status' => 0,
						'switch' => array(
							'all' => array($this->data['asc_jetcache_settings']['jetcache_widget_status'], $this->data['asc_jetcache_settings']['header_categories_status'])
						)
					);
				}

				$this->data['widgets_ocmod'][] = array(
					'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_image.ocmod.xml',
					'name' => $this->language->get('ocmod_jetcache_image_name'),
					'id' => $this->language->get('ocmod_jetcache_image_name'),
					'mod' => $this->language->get('ocmod_jetcache_image_mod'),
					'html' => $this->language->get('ocmod_jetcache_image_html'),
					'version' => $this->language->get('jetcache_version'),
					'author' => $this->language->get('ocmod_jetcache_author'),
					'link' => $this->language->get('ocmod_jetcache_link'),
					'status' => 0,
					'switch' => array(
						'all' => array($this->data['asc_jetcache_settings']['jetcache_widget_status'], $this->data['asc_jetcache_settings']['image_status'])
					)
				);

				$this->data['widgets_ocmod'][] = array(
					'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_data.ocmod.xml',
					'name' => $this->language->get('ocmod_jetcache_data_name'),
					'id' => $this->language->get('ocmod_jetcache_data_name'),
					'mod' => $this->language->get('ocmod_jetcache_data_mod'),
					'html' => $this->language->get('ocmod_jetcache_data_html'),
					'version' => $this->language->get('jetcache_version'),
					'author' => $this->language->get('ocmod_jetcache_author'),
					'link' => $this->language->get('ocmod_jetcache_link'),
					'status' => 0,
					'switch' => array(
						'all' => array($this->data['asc_jetcache_settings']['jetcache_widget_status'], $this->data['asc_jetcache_settings']['images_product_preload'])
					)
				);

				if (SC_VERSION > 22) {
					$this->data['widgets_ocmod'][] = array(
						'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_layout.ocmod.xml',
						'name' => $this->language->get('ocmod_jetcache_layout_name'),
						'id' => $this->language->get('ocmod_jetcache_layout_name'),
						'mod' => $this->language->get('ocmod_jetcache_layout_mod'),
						'html' => $this->language->get('ocmod_jetcache_layout_html'),
						'version' => $this->language->get('jetcache_version'),
						'author' => $this->language->get('ocmod_jetcache_author'),
						'link' => $this->language->get('ocmod_jetcache_link'),
						'status' => 0,
						'switch' => array(
							'all' => array($this->data['asc_jetcache_settings']['device_detect'])
						)
					);
				}
				$this->data['widgets_ocmod'][] = array(
					'file' => DIR_APPLICATION . 'controller/jetcache/jetcache_images.ocmod.xml',
					'name' => $this->language->get('ocmod_jetcache_images_name'),
					'id' => $this->language->get('ocmod_jetcache_images_name'),
					'mod' => $this->language->get('ocmod_jetcache_images_mod'),
					'html' => $this->language->get('ocmod_jetcache_images_html'),
					'version' => $this->language->get('jetcache_version'),
					'author' => $this->language->get('ocmod_jetcache_author'),
					'link' => $this->language->get('ocmod_jetcache_link'),
					'status' => 0,
					'switch' => array(
						'any' => array($this->data['asc_jetcache_settings']['jetcache_widget_status']),
						'one' => array($this->data['asc_jetcache_settings']['images_x'], $this->data['asc_jetcache_settings']['images_logo_dim_status'], $this->data['asc_jetcache_settings']['images_logo_preload'])
					)
				);

				$this->data['widgets_ocmod'][] = array(
					'file' => DIR_APPLICATION . 'controller/jetcache/jetcache.ocmod.xml',
					'name' => $this->language->get('ocmod_jetcache_name'),
					'id' => $this->language->get('ocmod_jetcache_name'),
					'mod' => $this->language->get('ocmod_jetcache_mod'),
					'version' => $this->language->get('jetcache_version'),
					'author' => $this->language->get('ocmod_jetcache_author'),
					'link' => $this->language->get('ocmod_jetcache_link'),
					'html' => $this->language->get('ocmod_jetcache_html'),
					'status' => 0,
					'switch' => array('all' => array($this->data['asc_jetcache_settings']['jetcache_widget_status'])),
				);
			}

			return $this;
		}

		private function load_ocmod_check() {

			$this->data['widgets_ocmod_swith'] = false;

			if (isset($this->data['widgets_ocmod']) && !empty($this->data['widgets_ocmod'])) {

				foreach ($this->data['widgets_ocmod'] as $number => $widget) {

					$ocmod_status = $this->check_ocmod_switch($widget);

					$mod_mod = $this->model_jetcache_mod->getModId($widget['mod']);

					if (!isset($mod_mod['status'])) {

						if (!isset($this->session->data['error_warning'])) {
							$this->session->data['error_warning'] = '';
						} else {
							$this->session->data['error_warning'] .= '<br>';
						}
						$this->session->data['error_warning'] .= $widget['name'] . ' - ' . $this->language->get('text_jetcache_ocmod_none');
						$this->data['jetcache_ocmod_none'] = true;
						//$this->install_ocmod(array(0 => $widget));
						//$mod_mod = $this->model_jetcache_mod->getModId($widget['mod']);						
					}

					if (isset($mod_mod['status']) && $mod_mod['status'] != $ocmod_status) {

						$this->data['widgets_ocmod_swith'] = true;
						$this->data['refresh_flag'] = true;


						$this->mod_on_off($widget['mod'], $ocmod_status);

						if ($ocmod_status) {
							if (isset($this->session->data['success'])) {
								$this->session->data['success'] .= '<br>';
							} else {
								$this->session->data['success'] = '';
							}
							$this->session->data['success'] .= $widget['name'] . ' - ' . $this->language->get('text_jetcache_ocmod') . ' ' . $this->language->get('ocmod_jetcache_text_on');
						} else {
							if (!isset($this->session->data['error_warning'])) {
								$this->session->data['error_warning'] = '';
							} else {
								$this->session->data['error_warning'] .= '<br>';
							}

							$this->session->data['error_warning'] .= $widget['name'] . ' - ' . $this->language->get('text_jetcache_ocmod') . ' ' . $this->language->get('ocmod_jetcache_text_off');
						}
					}
				}
			}
			return $this;
		}


		private function check_ocmod_switch($widget) {

			if (isset($widget['switch']['all']) && !empty($widget['switch']['all'])) {

				foreach ($widget['switch']['all'] as $num => $status) {
					$swith_all = false;

					if ($status) {
						$swith_all = true;
					} else {
						break;
					}
				}
			}

			if (isset($widget['switch']['one']) && !empty($widget['switch']['one'])) {
				$swith_one = false;

				foreach ($widget['switch']['one'] as $num => $status) {
					if ($status) {
						$swith_one = true;
						break;
					}
				}
			}

			if (isset($widget['switch']['any']) && !empty($widget['switch']['any'])) {
				$swith_any = false;

				foreach ($widget['switch']['any'] as $num => $status) {
					if (!$status) {
						$swith_any = true;
						break;
					}
				}
			}

			if ($widget['status']) {
				$swith_on = true;
			} else {
				$swith_on = false;
			}

			if (isset($swith_all) && $swith_all) {
				$swith_on = true;
			}

			if (isset($swith_one) && $swith_one) {
				$swith_on = true;
			} else {
				if (isset($swith_one)) {
					$swith_on = false;
				}
			}

			if (isset($swith_any) && $swith_any) {
				$swith_on = false;
			}

			return $swith_on;
		}

		private function install_ocmod($widgets) {

			// array $widget
			// $widget['file'] - full path ocmod file
			// $widget['name'] - {NAME}
			// $widget['mod'] - {MOD}
			// $widget['id'] - {ID}
			// $widget['version'] - {VERSION}
			// $widget['author'] - {AUTHOR}
			// $widget['link'] - link author site
			// $widget['html'] - html output on success install
			if (!$this->validate()) {
				$html = $this->data['error_text_jetcache_modify'];
				$this->response->setOutput($html);
				return;
			}
			if (!isset($this->data['html'])) {
				$this->data['html'] = '';
			}

			if (SC_VERSION > 23) {
				$mod_controller = 'marketplace';
				$modification_model = 'setting';
			} else {
				$mod_controller = 'extension';
				$modification_model = 'extension';
			}
			$http_server_array = explode('/', HTTP_SERVER);

			foreach ($widgets as $number => $widget) {

				if (file_exists($widget['file'])) {

					$mod_content = file_get_contents($widget['file']);

					$files_extension_ocmod = glob($widget['file'] . '.*');
					if (!empty($files_extension_ocmod)) {
						foreach ($files_extension_ocmod as $num => $filename_ocmod) {
							$version_filename_ocmod = substr(strrchr($filename_ocmod, '.'), 1);
							$version_filename_ocmod_array = explode('_', $version_filename_ocmod);
							foreach ($version_filename_ocmod_array as $num_array => $version_oc) {
								if (substr(SC_VERSION, 0, 1) == trim($version_oc) || SC_VERSION == trim($version_oc)) {
									if (file_exists($filename_ocmod)) {
										$mod_content_version = file_get_contents($filename_ocmod);
										$mod_content = str_ireplace('</modification>', $mod_content_version . '</modification>', $mod_content);
										$mod_content_version = '';
									}
								}
							}
						}
					}

					$mod_content = str_replace('{NAME}', $widget['name'], $mod_content);
					$mod_content = str_replace('{ID}', $widget['id'], $mod_content);
					$mod_content = str_replace('{MOD}', $widget['mod'], $mod_content);
					$mod_content = str_replace('{VERSION}', $widget['version'], $mod_content);
					$mod_content = str_replace('{AUTHOR}', $widget['author'], $mod_content);
					$mod_content = str_replace('{LINK}', $widget['link'], $mod_content);
					$mod_content = str_replace('{ADMIN}', $http_server_array[3], $mod_content);

					preg_match('/<name>(.*?)<\/name>/', $mod_content, $matches);
					$widget['name'] = $matches[1];

					preg_match('/<id>(.*?)<\/id>/', $mod_content, $matches);
					$widget['id'] = $matches[1];

					preg_match('/<code>(.*?)<\/code>/', $mod_content, $matches);
					$widget['mod'] = $matches[1];

					preg_match('/<version>(.*?)<\/version>/', $mod_content, $matches);
					$widget['version'] = $matches[1];

					preg_match('/<author>(.*?)<\/author>/', $mod_content, $matches);
					$widget['author'] = $matches[1];

					preg_match('/<link>(.*?)<\/link>/', $mod_content, $matches);
					$widget['link'] = $matches[1];


					if (isset($widget['jetcache_version']) && $widget['jetcache_version'] == 15) {
						$is_15 = true;
					} else {
						$is_15 = false;
					}

					if (SC_VERSION > 15 && !$is_15) {
						$this->load->model('jetcache/mod');
						$mod_mod = $this->model_jetcache_mod->getModId($widget['mod']);

						if (!empty($mod_mod)) {
							$mod_id = $mod_mod['modification_id'];
							$widget['status'] = $mod_mod['status'];
						} else {
							$mod_id = false;
						}

						if (SC_VERSION > 23 && isset($mod_mod['extension_install_id'])) {
							$mod_ext_id = $mod_mod['extension_install_id'];
						} else {
							$mod_ext_id = false;
						}

						$mod_model = 'model_' . $modification_model . '_modification';
						$this->load->model($modification_model . '/modification');
						if ($mod_id) {
							$this->$mod_model->deleteModification($mod_id);
						}

						if (SC_VERSION > 23) {
							$this->load->model('setting/extension');
							$this->model_setting_extension->deleteExtensionInstall($mod_ext_id);
							$mod_ext_id = $this->model_setting_extension->addExtensionInstall($widget['mod'] . '.ocmod.zip');
						}

						$mod_data['code'] = $widget['mod'];
						$mod_data['name'] = $widget['name'];
						$mod_data['id'] = $widget['id'];
						$mod_data['author'] = $widget['author'];
						$mod_data['version'] = $widget['version'];
						$mod_data['link'] = $widget['link'];
						$mod_data['status'] = $widget['status'];
						$mod_data['xml'] = $mod_content;
						$mod_data['extension_install_id'] = $mod_ext_id;

						$this->$mod_model->addModification($mod_data);
					} else {
						if (is_dir(DIR_SYSTEM . "../vqmod/xml")) {
							file_put_contents(DIR_SYSTEM . "../vqmod/xml/" . $widget['mod'] . ".ocmod.xml", $mod_content);
						}
					}

					$swith_on = $this->check_ocmod_switch($widget);

					$this->mod_on_off($widget['mod'], $swith_on);

					if (isset($widget['html'])) {
						$this->data['html'] .= $widget['html'];
					}

					if ($swith_on) {

						$this->data['html'] .= ' - ' . $this->language->get('ocmod_jetcache_text_on');
					} else {
						$this->data['html'] .= ' - ' . $this->language->get('ocmod_jetcache_text_off');
					}

					$this->data['html'] .= '<br>';
				} else {
					$this->data['html'] .= $widget['html'] . ' - install error';
				}
			}
			return $this->data['html'];
		}

		private function mod_on_off($modificator, $on = true) {

			if (!$this->validate()) {
				$html = $this->data['error_text_jetcache_modify'];
				$this->response->setOutput($html);
				return;
			}

			if (SC_VERSION > 15) {
				$this->load->model('jetcache/mod');
				$mod_mod = $this->model_jetcache_mod->getModId($modificator);

				if (isset($mod_mod['modification_id']) && $mod_mod['modification_id']) {

					if (SC_VERSION > 23) {
						$mod_controller = 'marketplace';
						$modification_model = 'setting';
					} else {
						$mod_controller = 'extension';
						$modification_model = 'extension';
					}

					$mod_id = $mod_mod['modification_id'];
					$mod_status = $mod_mod['status'];

					if (SC_VERSION > 23) {
						$mod_ext_id = $mod_mod['extension_install_id'];
					} else {
						$mod_ext_id = false;
					}

					$mod_model = 'model_' . $modification_model . '_modification';
					$this->load->model($modification_model . '/modification');

					if ($on == true) {
						$this->$mod_model->enableModification($mod_id);
						return true;
					} else {
						$this->$mod_model->disableModification($mod_id);
						return false;
					}
				} else {
					return false;
				}
			} else {
				if ($on == true) {
					if (is_dir(DIR_SYSTEM . "../vqmod/xml")) {
						if (!file_exists(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml")) {
							if (file_exists(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml_")) {
								copy(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml_", DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml");
								unlink(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml_");
								return true;
							}
						} else {
							return false;
						}
					}
				} else {
					if (is_dir(DIR_SYSTEM . "../vqmod/xml")) {
						if (file_exists(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml")) {
							if (file_exists(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml_")) {
								unlink(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml_");
							}
							copy(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml", DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml_");
							unlink(DIR_SYSTEM . "../vqmod/xml/" . $modificator . ".ocmod.xml");
							return true;
						} else {
							return false;
						}
					}
				}
			}
		}


		public function check_ver() {

			$this->jc_model_load();
			$this->jc_language_load();
			$this->jc_language_get();
			$this->jc_url_link();

			if (!$this->validate()) {
				$html = $this->data['error_text_jetcache_modify'];
				$this->response->setOutput($html);
				return;
			}

			$data_check = $this->jetcache_check(0);

			$text_jetcache_currnent_version = $data_check['text_jetcache_currnent_version'];
			$text_jetcache_server_version = $data_check['text_jetcache_server_version'];
			$text_jetcache_server_date = $data_check['jetcache_server_response_date'];
			$text_jetcache_new_version = $data_check['text_jetcache_new_version'];

			$server_ver_array = explode(' ', $text_jetcache_server_version);
			$current_ver_array = explode(' ', $text_jetcache_currnent_version);
			$server_ver_float = (float) $server_ver_array[0];
			if (is_float($server_ver_float) && $server_ver_float > 0) {
				if ((float) $server_ver_array[0] > (float) $current_ver_array[0]) {
					$text_jetcache_update = $this->data['text_jetcache_update_yes'];
				} else {
					$text_jetcache_update = $this->data['text_jetcache_update_no'];
				}
			} else {
				$text_jetcache_update = $this->data['text_jetcache_error_server_connect'];
			}

			$html = $this->data['text_jetcache_server_date_state'] . ' ' . $text_jetcache_server_date . '<br>' .
				$this->data['text_jetcache_current_version_text'] . ' ' . $text_jetcache_currnent_version . ' ' . '<br>' .
				$this->data['text_jetcache_last_version_text'] . ' ' . $text_jetcache_server_version . ' ' . '<br>' . $text_jetcache_update;

			$this->response->setOutput($html);
		}


		public function jetcache_check($days = 7) {

			$data = $this->data;
			$data['jetcache_version'] = $this->language->get('jetcache_version');
			$data['jetcache_model'] = $this->data['jetcache_model'];
			$this->load->model('jetcache/jetcache');
			$data['jetcache_server_response_content'] = $this->model_jetcache_jetcache->getSetting('jetcache_server_response_content');
			$data['jetcache_server_response_date'] = $this->model_jetcache_jetcache->getSetting('jetcache_server_response_date');


			$date_current = date('d-m-Y');

			if (!empty($data['jetcache_server_response_date'])) {
				$date_diff = ((strtotime($date_current) - strtotime($data['jetcache_server_response_date'])) / 3600 / 24);
			} else {
				$date_diff = $days;
			}

			if ($date_diff >= $days) {

				$response = $this->server_check();
				$data['jetcache_server_response_content'] = $response['content'];
				$data['jetcache_server_response_status'] = $response['status'];
				$data['jetcache_server_response_date'] = $date_current;
			}
			if (isset($data['jetcache_version']) && isset($data['jetcache_model']) && $data['jetcache_version'] . ' ' . $data['jetcache_model'] != $data['jetcache_server_response_content']) {
				$data['text_jetcache_new_version'] = $this->data['text_jetcache_new_version'] . " <span style='color: #000; font-weight: normal;'>(" . $data['jetcache_server_response_date'] . ")</span>" . $data['jetcache_server_response_content'] . $this->data['text_jetcache_new_version_end'];
			} else {
				$data['text_jetcache_new_version'] = '';
			}
			$data['text_jetcache_currnent_version'] = $data['jetcache_version'] . ' ' . $data['jetcache_model'];
			$data['text_jetcache_server_version'] = $data['jetcache_server_response_content'];
			$data['text_jetcache_new_version'] = $this->data['text_jetcache_update_version_begin'] . " <span style='font-size: 11px; color: #909090; font-weight: normal;'>(" . $data['jetcache_server_response_date'] . ")</span> " . $data['jetcache_server_response_content'] . $this->data['text_jetcache_update_version_end'];
			$data['jetcache_version'] = $jetcache_version = $this->data['jetcache_version'];

			$this->data = $data;

			return $this->data;
		}

		public function server_check() {

			$this->load->model('setting/setting');
			$data = $this->data;

			$data['jetcache_version'] = $this->language->get('jetcache_version');
			$data['jetcache_model'] = $this->language->get('jetcache_model');

			$this->model_jetcache_jetcache->editSetting('jetcache_server_response_content', array(''));
			$this->model_jetcache_jetcache->editSetting('jetcache_server_response_date', array(date('d-m-Y')));

			if (isset($_SERVER['REMOTE_ADDR'])) {
				$ip = $_SERVER['REMOTE_ADDR'];
			} else {
				if (isset($_SERVER['SERVER_ADDR'])) {
					$ip = $_SERVER['SERVER_ADDR'];
				} else {
					$ip = '';
				}
			}

			$store_info = $this->model_setting_setting->getSetting('config', 0);
			if (isset($store_info['config_email'])) {
				$email = $store_info['config_email'];
			} else {
				$email = '';
			}

			$current['version'] = $data['jetcache_version'];
			$current['model'] = $data['jetcache_model'];



			$current['language'] = $this->config->get('config_language');
			$current['ip'] = $ip;
			$current['email'] = $email;
			$current['date'] = date('d-m-Y');
			$current['opencart'] = VERSION;
			if ($this->url_link_ssl) {
				$current['server'] = HTTPS_CATALOG;
			} else {
				$current['server'] = HTTP_CATALOG;
			}

			$server['url'] = $this->data['jetcache_ocas'];

			$post_data = array('catalog' => $current['server'], 'ver' => $current['version'], 'model' => $current['model'], 'email' => $current['email'], 'lang' => $current['language'], 'ip' => $current['ip'], 'date' => $current['date'], 'domen' => $current['server'], 'opencart' => $current['opencart']);
			
			$query = http_build_query($post_data);
			$server['request'] = "Content-Type: application/x-www-form-urlencoded\r\n";
			$server['options'] = array(
				'http' => array(
					'method' => 'POST',
					'header' => $server['request'],
					'content' => $query
				),
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
				),
			);
			$stream_context = stream_context_create($server['options']);

			$exceptionizer = new PHP_Exceptionizer(E_ALL);
			try {
				try {
					$response['content'] = file_get_contents($server['url'], FALSE, $stream_context);
				} catch (E_WARNING $e) {
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
					curl_setopt($ch, CURLOPT_HEADER, false);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt($ch, CURLOPT_URL, $server['url']);
					curl_setopt($ch, CURLOPT_REFERER, $server['url']);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3000);
					curl_setopt($ch, CURLOPT_TIMEOUT, 10000);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
					$response['content'] = curl_exec($ch);
					curl_close($ch);
				}

				$response['content'] = htmlspecialchars(strip_tags(html_entity_decode($response['content'], ENT_QUOTES, 'UTF-8')), ENT_COMPAT, 'UTF-8');
				$response['status'] = true;
				$this->model_jetcache_jetcache->editSetting('jetcache_server_response_date', array(date('d-m-Y')));
				$this->model_jetcache_jetcache->editSetting('jetcache_server_response_content', array($response['content']));
			} catch (E_WARNING $e) {
				$response['content'] = '';
				$response['status'] = false;
			}

			return $response;
		}
	}
}
/* All rights reserved belong to the module, the module developers https://support.opencartadmin.com */