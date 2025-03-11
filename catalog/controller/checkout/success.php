<?php
class ControllerCheckoutSuccess extends Controller {
	public function index() {
		$this->load->language('checkout/success');

		if (isset($this->session->data['order_id'])) {
            $this->load->model('account/order');
            $this->load->model('catalog/product');
            $this->load->model('catalog/manufacturer');
            $data['order_id'] = $this->session->data['order_id'];
            $total = $this->db->query("SELECT `total` FROM `".DB_PREFIX."order` WHERE order_id='".$this->session->data['order_id']."'")->row;
            $total = $this->currency->format($this->tax->calculate($total['total'], 0, $this->config->get('config_tax')), $this->session->data['currency']);
            $data['total'] = (int)$total;
            $order_products = $this->model_account_order->getOrderProducts($this->session->data['order_id']);
            $products = array();
            foreach ($order_products as $o_p){
                $product_info = $this->model_catalog_product->getProduct($o_p['product_id']);

                $cat_pr = $this->db->query("SELECT category_id FROM ".DB_PREFIX."product_to_category WHERE product_id='".$product_info['product_id']."' AND main_category=1")->row;

                $sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&gt;') AS name, c.parent_id, c.sort_order FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "category c ON (cp.path_id = c.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd1 ON (c.category_id = cd1.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd2 ON (cp.category_id = cd2.category_id) WHERE cd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND cd2.language_id = '" . (int)$this->config->get('config_language_id') . "' AND cp.category_id='".$cat_pr['category_id']."'";
                $qcat = $this->db->query($sql)->row;
                $price = 0;
                $price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

                $products[] = array(
                    'product_id' => $product_info['product_id'],
                    'name' => $product_info['name'],
                    'price' => (int)$price,
                    'manuf' => $this->model_catalog_manufacturer->getManufacturer($product_info['manufacturer_id'])['name'],
                    'quantity' => $o_p['quantity'],
                    'qcat' => explode('&gt;', $qcat['name'])
                );
            }
            $data['products'] = $products;
            $data['qconn'] = count($products);
			$this->cart->clear();

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['guest']);
			unset($this->session->data['comment']);
			unset($this->session->data['order_id']);
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);
			unset($this->session->data['totals']);
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_basket'),
			'href' => $this->url->link('checkout/cart')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_checkout'),
			'href' => $this->url->link('checkout/checkout', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_success'),
			'href' => $this->url->link('checkout/success')
		);

		if ($this->customer->isLogged()) {
			$data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', '', true), $this->url->link('account/order', '', true), $this->url->link('account/download', '', true), $this->url->link('information/contact'));
		} else {
			$data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact'));
		}

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));
	}
}