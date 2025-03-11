<?php
class ControllerExtensionModuleQwebStickers extends Controller {
	private $error = array();

	public function index() {
		
		$this->load->language('extension/module/qweb_stickers');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			$this->model_setting_setting->editSetting('module_qweb_stickers', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');
		}

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
			'href' => $this->url->link('extension/module/qweb_stickers', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/qweb_stickers', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->post['module_qweb_stickers_status'])) {
			$data['module_qweb_stickers_status'] = $this->request->post['module_qweb_stickers_status'];
		} else {
			$data['module_qweb_stickers_status'] = $this->config->get('module_qweb_stickers_status');
		}
		
		$result = $this->model_setting_setting->getSetting('module_qweb_stickers');
		if (isset($this->request->post['module_qweb_stickers_latest_count'])) {
			$data['module_qweb_stickers_latest_count'] = $this->request->post['module_qweb_stickers_latest_count'];
		} elseif (!empty($result)) {
			$data['module_qweb_stickers_latest_count'] = $result['module_qweb_stickers_latest_count'];
		} else {
			$data['module_qweb_stickers_latest_count'] = 0;
		}

        if (isset($this->request->post['module_qweb_stickers_top_count'])) {
            $data['module_qweb_stickers_top_count'] = $this->request->post['module_qweb_stickers_top_count'];
        } elseif (!empty($result)) {
            $data['module_qweb_stickers_top_count'] = $result['module_qweb_stickers_top_count'];
        } else {
            $data['module_qweb_stickers_top_count'] = 0; 
        }
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/qweb_stickers', $data));
	}

	protected function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/module/qweb_stickers')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}