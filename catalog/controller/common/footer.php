<?php
class ControllerCommonFooter extends Controller {
	public function index() {
		$this->load->language('common/footer');

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

        $this->load->model('catalog/category');

        $data['categories'] = array();

        foreach ($this->model_catalog_category->getFooterCategories() as $result) {
            $data['categories'][] = array(
                'name' => $result['name'],
                'href'  => $this->url->link('product/category', 'path=' . $result['category_id'])
            );
        }



        $data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', true);
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['tracking'] = $this->url->link('information/tracking');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', true);
		$data['affiliate'] = $this->url->link('affiliate/login', '', true);
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['newsletter'] = $this->url->link('account/newsletter', '', true);


        $data['config_kyivstar'] = $this->config->get('config_kyivstar');
        $data['config_life'] = $this->config->get('config_life');
        $data['config_vodafone'] = $this->config->get('config_vodafone');
        $data['config_email'] = $this->config->get('config_email');
        $data['config_footer_slogan'] = $this->config->get('config_footer_slogan');
        $data['about_us'] = $this->url->link('information/information','information_id=4');
        $data['delivery_and_payment'] = $this->url->link('information/information','information_id=6');
		$data['vozvrata_tovara'] = $this->url->link('information/information','information_id=8');
        $data['name'] = $this->config->get('config_name');

        if ($this->request->server['HTTPS']) {
            $server = $this->config->get('config_ssl');
        } else {
            $server = $this->config->get('config_url');
        }

        if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
            $data['logo'] = $server . 'image/' . $this->config->get('config_logo');
        } else {
            $data['logo'] = '';
        }
        $data['home'] = $this->url->link('common/home');
        $data['language'] = $this->load->controller('common/language');

		$data['powered'] = sprintf($this->language->get('text_powered'), date('Y', time()),$this->config->get('config_name'));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}

		//if($_SERVER['REMOTE_ADDR'] == '109.86.229.153'){
			$qweb = explode('/', $_SERVER['REQUEST_URI']);
			if($qweb[1] == 'ua'){
				$data['qweb'] = 'ua/';
			} else{
				$data['qweb'] = '';
			}
		//}

		$data['scripts'] = $this->document->getScripts('footer');
		
		return $this->load->view('common/footer', $data);
	}
}
