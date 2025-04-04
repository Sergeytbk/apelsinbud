<?php
/*if (!function_exists('server_check')) {
	function server_check($t) {
		if (!defined('SC_VERSION')) define('SC_VERSION', (int)substr(str_replace('.','',VERSION), 0,2));
		if (function_exists('modification')) {
			require_once(modification(DIR_SYSTEM . 'library/exceptionizer.php'));
		} else {
			require_once(DIR_SYSTEM . 'library/exceptionizer.php');
		}
        $t->load->model('setting/setting');
        $data = $t->data;

		$data['jetcache_version'] = $t->language->get('jetcache_version');
	    $data['jetcache_model'] = $t->language->get('jetcache_model');

		$t->model_setting_setting->deleteSetting('jetcache_version');
	    $t->model_setting_setting->deleteSetting('jetcache_model');
	    $t->model_setting_setting->editSetting('jetcache_server', Array('jetcache_server_response_date' => '', 'jetcache_server_response_content' => ''));
	    $t->model_setting_setting->editSetting('jetcache_server', Array('jetcache_server_response_date' => date('d-m-Y')));

		if (isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR']; else $ip = '';
	    $store_info = $t->model_setting_setting->getSetting('config', 0);
	    if (isset($store_info['config_email'])) { $email = $store_info['config_email']; } else { $email = ''; }

		$currnet['version'] = $t->language->get('jetcache_version');
		$current['model'] = $t->language->get('jetcache_model');
	    $current['language'] = $t->config->get('config_language');
	    $current['ip'] = $ip;
	    $current['email'] = $email;
	    $current['date'] = date('d-m-Y');
	    $currnet['opencart'] = VERSION;
		if ((isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https') || (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && strtolower($_SERVER['HTTP_X_FORWARDED_SSL']) == 'on')))  {
			$current['server'] = HTTPS_CATALOG;
		} else {
			$current['server'] = HTTP_CATALOG;
		}

		$server['url'] = $t->language->get('jetcache_ocas');

		$post_data = array('catalog' => $current['server'], 'ver' => $currnet['version'], 'model' => $current['model'], 'email' => $current['email'], 'lang' => $current['language'], 'ip' => $current['ip'], 'date' => $current['date'], 'domen' => $current['server'], 'opencart' => $currnet['opencart']);
		$query = http_build_query($post_data);
		$server['request'] = "Content-Type: application/x-www-form-urlencoded\r\n";
		$server['options'] = array( 'http' =>
		array('method' => 'POST',
		'header' => $server['request'],
		'content' => $query));
		$stream_context = stream_context_create($server['options']);
	    $exceptionizer = new PHP_Exceptionizer(E_ALL);
		try {
            try {
				$response['content'] = file_get_contents($server['url'], FALSE , $stream_context);
            }  catch (E_WARNING $e) {
				$ch = curl_init($server['url']);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
				$response['content'] = curl_exec($ch);
				curl_close($ch);
	        }

	    	$response['content'] = htmlspecialchars(strip_tags(html_entity_decode($response['content'], ENT_QUOTES, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		    $response['status'] = true;
	        $t->model_setting_setting->editSetting('jetcache_server', Array('jetcache_server_response_date' => date('d-m-Y'), 'jetcache_server_response_content' => $response['content']));
		}  catch (E_WARNING $e) {
		 	$response['content'] = '';
		 	$response['status'] = false;
		}
		return $response;
	}
}

if (!function_exists('jc_check')) {
	function jc_check($t, $days = 7) {
		$data = $t->data;
		$data['jetcache_version'] = $t->language->get('jetcache_version');
	    $data['jetcache_model'] = $t->language->get('jetcache_model');

        $data['jetcache_server_response_content'] = $t->config->get('jetcache_server_response_content');
        $data['jetcache_server_response_date'] = $t->config->get('jetcache_server_response_date');
        $date_current = date('d-m-Y');
        $date_diff = ((strtotime($date_current) - strtotime($data['jetcache_server_response_date']))/3600/24);
        if ($date_diff >= $days) {

	        $response = $t->server_check();
    	    $data['jetcache_server_response_content'] = $response['content'];
        	$data['jetcache_server_response_status'] = $response['status'];
        	$data['jetcache_server_response_date'] = $date_current;
        }
		if (isset($data['jetcache_version']) && isset($data['jetcache_model']) && $data['jetcache_version'] . ' ' .  $data['jetcache_model'] != $data['jetcache_server_response_content']) {
        	$data['text_new_version'] = $t->language->get('text_new_version')." <span style='color: #000; font-weight: normal;'>(".$data['jetcache_server_response_date'].")</span>". $data['jetcache_server_response_content']. $t->language->get('text_new_version_end');
		} else {
			$data['text_new_version'] = '';
		}
    	$data['text_currnent_version'] = $data['jetcache_model'] . ' ' . $data['jetcache_version'];
    	$data['text_server_version'] = $data['jetcache_server_response_content'];
        $data['text_new_version'] = $t->language->get('text_update_version_begin')." <span style='font-size: 11px; color: #909090; font-weight: normal;'>(".$data['jetcache_server_response_date'].")</span> ".$data['jetcache_server_response_content']. $t->language->get('text_update_version_end');
		$data['jetcache_version'] = $jetcache_version = $t->language->get('jetcache_version');

        $t->data = $data;
		return $t;
	}
}*/