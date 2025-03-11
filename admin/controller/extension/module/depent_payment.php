<?php
class ControllerExtensionModuleDepentpayment extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/depent_payment');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_depent_payment', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}
		
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		
		$data['text_select_all'] = $this->language->get('text_select_all');
		$data['text_unselect_all'] = $this->language->get('text_unselect_all');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/depent_payment', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/depent_payment', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		$data['sub_shipping'] = array();
		
		$data['shipping'] = array();
		$data['shipping'] = $this->getShippingList();
		
		$data['payments'] = array();
		$data['payments'] = $this->getPaymentList();

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->request->post['module_depent_payment'])) {
			$data['module_depent_payment'] = $this->request->post['module_depent_payment'];
		} elseif ($this->config->get('module_depent_payment')) {
			$data['module_depent_payment'] = $this->config->get('module_depent_payment');
		} else {
			$data['module_depent_payment'] = array();
		}
		
		if (isset($this->request->post['module_depent_payment_status'])) {
			$data['module_depent_payment_status'] = $this->request->post['module_depent_payment_status'];
		} else {
			$data['module_depent_payment_status'] = $this->config->get('module_depent_payment_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('extension/module/depent_payment', $data));
	}
	
	public function getShippingList() {

		$files = glob(DIR_APPLICATION . 'controller/extension/shipping/*.php', GLOB_BRACE);

		$data['extensions'] = array();
		
		if ($files) {
			foreach ($files as $file) {
				$file = basename($file, '.php');
				$extension = 'shipping_' . $file;
			
				$this->load->language('extension/shipping/' . basename($file, '.php'));
				
				if ($this->config->get($extension . '_status')) {
					switch ($extension) {
					case 'shipping_pochtaros': // Почта России 3.12
						foreach ($this->config->get('pochtaros_mstatus') as $i => $ext) {
							if ($ext[1] == '1') {
								$data['extensions'][] = array(
									'name' => $this->language->get('text_' . $i),
									'sort_order' => '',
									'extension'  => 'pochtaros.' . $i
								);
							}
						}
						break;
					case 'shipping_xshipping': // X-Shipping
						for ($i = 1; $i < 13; $i++) {
							$data['extensions'][] = array(
								'name'       => $this->config->get('xshipping_name' . $i),
								'sort_order' => '',
								'extension'  => 'xshipping.xshipping' . $i
							);
						}
						break;
					case 'shipping_novaposhta': // Новая Почта API 3.1
						$data['extensions'][] = array(
								'name'       => $this->config->get('novaposhta_shipping_doors_name_1'),
								'sort_order' => '',
								'extension'  => 'novaposhta.doors'
							);
						$data['extensions'][] = array(
								'name'       => $this->config->get('novaposhta_shipping_warehouse_name_1'),
								'sort_order' => '',
								'extension'  => 'novaposhta.warehouse'
							);
						break;
					case 'shipping_cs': // Мульти доставка
						foreach ($this->config->get($extension) as $i => $post) {
							$data['extensions'][] = array(
								'name'       => $post['shipping_description'][1]['name'],
								'sort_order' => '',
								'extension'  => 'cs.cs_' . $i
							);
						}
						break;
					case 'shipping_russianpost': // Почта России 1.64
						if ($this->config->get('shipping_russianpost_title_parcel_insured')) {
							$name = unserialize($this->config->get('shipping_russianpost_title_parcel_insured'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost_insured.parcel_insured'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_freeshipping')) {
							$name = unserialize($this->config->get('shipping_russianpost_title_freeshipping'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost_free.freeshipping'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_parcel_simple')) {
							$name = unserialize($this->config->get('shipping_russianpost_title_parcel_simple'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost.parcel_simple'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_1class_simple')) {
							$name = unserialize($this->config->get('shipping_russianpost_title_1class_simple'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost.1class_simple'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_1class_insured')) {
							
							$name = unserialize($this->config->get('shipping_russianpost_title_1class_insured'));
							
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost_insured.1class_insured'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_noclass_simple')) {
							$name = unserialize($this->config->get('russianpost_title_noclass_simple'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost.noclass_simple'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_noclass_insured')) {
							$name = unserialize($this->config->get('russianpost_title_noclass_insured'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost.noclass_insured'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_split_simple')) {
							$name = unserialize($this->config->get('russianpost_title_split_simple'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost.split_simple'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_insured_avia')) {
							$name = unserialize($this->config->get('russianpost_title_insured_avia'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost.insured_avia'
							);
						}
						
						if ($this->config->get('shipping_russianpost_title_split_insured')) {
							$name = unserialize($this->config->get('russianpost_title_split_insured'));
							$data['extensions'][] = array(
								'name'       => $name['1'],
								'sort_order' => '',
								'extension'  => 'russianpost.split_insured'
							);
						}
						break;
					case 'shipping_russian_post': // Почта России и EMS 1.10.0 и выше
						foreach ($this->config->get($extension) as $i => $post) {
							if($post['status']){
								$data['extensions'][] = array(
									'name'       => $this->language->get('text_' . $post['type']),
									'sort_order' => $post['sort_order'],
									'extension'  => 'russian_post.russian_post' . $i
								);
							}
						}
						break;
					case 'shipping_multiflat': // Мульти Доставка FREE
						foreach ($this->config->get($extension) as $i => $post) {
							if($post['status']){
								$data['extensions'][] = array(
									'name'       => $post['name'],
									'sort_order' => $post['sort_order'],
									'extension'  => 'multiflat.multiflat' . $i
								);
							}
						}
						break;
					case 'shipping_dostavkaplus': // Доставка Плюс
						foreach ($this->config->get('shipping_dostavkaplus_module') as $i => $post) {
							$data['extensions'][] = array(
								'name'       => $post['title'][1],
								'sort_order' => '',
								'extension'  => 'dostavkaplus.sh' . $i
							);
						}
						break;
					case 'shipping_free_shipping_plus': // Free Shipping Plus
						$k = 0;
						for ($i = 1; $i <= 10; $i++) { // 20 способов, можно увеличть
							if ($this->config->get('shipping_free_shipping_plus_charge_' . $i . '_title_admin')) {
								$data['extensions'][] = array(
									'name'       => $this->config->get('shipping_free_shipping_plus_charge_' . $i . '_title_admin'),
									'sort_order' => '',
									'extension'  => 'free_shipping_plus.free_shipping_plus_' . $k
								);
								
								$k++;
							} 
						}
						break;
					default: // Стандартные модули доставки
						$data['extensions'][] = array(
							'name'       => $this->language->get('heading_title'),
							'sort_order' => $this->config->get($extension . '_sort_order'),
							'extension'  => $file . '.' . $file
						);
					}
				}
			}
		}
		return $data;
	}
	
	protected function getPaymentList() {

		$data['extensions'] = array();

		$files = glob(DIR_APPLICATION . 'controller/extension/payment/*.php', GLOB_BRACE);

		if ($files) {
			foreach ($files as $file) {
				$extension = 'payment_' . basename($file, '.php');
			
				// Compatibility code for old extension folders
				$this->load->language('extension/payment/' . basename($file, '.php'));
				
				if($this->config->get($extension . '_status')){
					$data['extensions'][] = array(
						'name'       => $this->language->get('heading_title'),
						'sort_order' => $this->config->get($extension . '_sort_order'),
						'extension'  => $extension
					);
				}
			}
		}

		return $data;
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/depent_payment')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}