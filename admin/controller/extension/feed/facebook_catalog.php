<?php
class ControllerExtensionFeedFacebookCatalog extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/feed/facebook_catalog');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		$this->load->model('extension/feed/google_merchant_center');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('facebook_catalog', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_default'] = $this->language->get('text_default');

		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_file'] = $this->language->get('entry_file');
		$data['entry_data_feed'] = $this->language->get('entry_data_feed');
		$data['entry_facebook_catalog_availability'] = $this->language->get('entry_facebook_catalog_availability');
		$data['entry_facebook_catalog_use_taxes'] = $this->language->get('entry_facebook_catalog_use_taxes');
		$data['entry_facebook_catalog_description'] = $this->language->get('entry_facebook_catalog_description');
		$data['entry_facebook_catalog_description_html'] = $this->language->get('entry_facebook_catalog_description_html');
		$data['entry_facebook_catalog_feed_id1'] = $this->language->get('entry_facebook_catalog_feed_id1');
		$data['help_facebook_catalog_feed_id1'] = $this->language->get('help_facebook_catalog_feed_id1');
		$data['help_facebook_catalog_use_taxes'] = $this->language->get('help_facebook_catalog_use_taxes');
		$data['help_data_feed'] = $this->language->get('help_data_feed');

		$attribute_id=$this->model_extension_feed_google_merchant_center->getAttributes();
		$data['facebook_attributes_type'][] = array (
			'attribute_id' => '-1',
			'name' => $this->language->get('entry_facebook_attribute_product_type')
		);

		foreach ($attribute_id as $attribute) {
			$data['facebook_attributes_type'][] = array (
				'attribute_id' => $attribute['attribute_id'],
				'name' => $attribute['name']
			);
		}
		$data['entry_facebook_attribute_type'] = $this->language->get('entry_facebook_attribute_type');
		$data['help_facebook_attribute_type'] = $this->language->get('help_facebook_attribute_type');

		$data['help_file'] = $this->language->get('help_file');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/feed/facebook_catalog', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/feed/facebook_catalog', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true);

		if (isset($this->request->post['facebook_catalog_status'])) {
			$data['facebook_catalog_status'] = $this->request->post['facebook_catalog_status'];
		} else {
			$data['facebook_catalog_status'] = $this->config->get('facebook_catalog_status');
		}

		if (isset($this->request->post['facebook_catalog_file'])) {
			$data['facebook_catalog_file'] = $this->request->post['facebook_catalog_file'];
		} else {
			$data['facebook_catalog_file'] = $this->config->get('facebook_catalog_file');
		}

		if (isset($this->request->post['facebook_catalog_availability'])) {
			$data['facebook_catalog_availability'] = $this->request->post['facebook_catalog_availability'];
		} else {
			$data['facebook_catalog_availability'] = $this->config->get('facebook_catalog_availability');
		}
		
		if (isset($this->request->post['facebook_catalog_use_taxes'])) {
			$data['facebook_catalog_use_taxes'] = $this->request->post['facebook_catalog_use_taxes'];
		} else {
			$data['facebook_catalog_use_taxes'] = $this->config->get('facebook_catalog_use_taxes');
		}

		if (isset($this->request->post['facebook_catalog_description'])) {
			$data['facebook_catalog_description'] = $this->request->post['facebook_catalog_description'];
		} else {
			$data['facebook_catalog_description'] = $this->config->get('facebook_catalog_description');
		}

		if (isset($this->request->post['facebook_catalog_description_html'])) {
			$data['facebook_catalog_description_html'] = $this->request->post['facebook_catalog_description_html'];
		} else {
			$data['facebook_catalog_description_html'] = $this->config->get('facebook_catalog_description_html');
		}

		if (isset($this->request->post['facebook_catalog_attribute_type'])) {
			$data['facebook_catalog_attribute_type'] = $this->request->post['facebook_catalog_attribute_type'];
		} else {
			$data['facebook_catalog_attribute_type'] = $this->config->get('facebook_catalog_attribute_type');
		}
		
		if (isset($this->request->post['facebook_catalog_feed_id1'])) {
			$data['facebook_catalog_feed_id1'] = $this->request->post['facebook_catalog_feed_id1'];
		} elseif ($this->config->get('facebook_catalog_feed_id1')!='') {
			$data['facebook_catalog_feed_id1'] = $this->config->get('facebook_catalog_feed_id1');
		} else {
			$data['facebook_catalog_feed_id1'] = 'product_id';
		}

		$data['data_feed'] = HTTP_CATALOG . 'index.php?route=extension/feed/facebook_catalog&lang='.$this->config->get('config_language').'&curr='.$this->config->get('config_currency').'&store='.(int)$this->config->get('config_store_id');

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/feed/facebook_catalog', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/feed/facebook_catalog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}
