<?php
class ControllerExtensionFeedGoogleBase extends Controller {
	public function index() {
		if ($this->config->get('feed_google_base_status')) {
			$output  = '<?xml version="1.0" encoding="UTF-8" ?>';
			$output .= '<feed xmlns="http://www.w3.org/2005/Atom" xmlns:g="http://base.google.com/ns/1.0">';
			//$output .= '  <channel>';
			$output .= '  <title>' . $this->config->get('config_name') . '</title>';
//			$output .= '  <description>' . $this->config->get('config_meta_description') . '</description>';
			$output .= '  <link>' . $this->config->get('config_url') . '</link>';

			$this->load->model('extension/feed/google_base');
			$this->load->model('catalog/category');
			$this->load->model('catalog/product');

			$this->load->model('tool/image');

			$product_data = array();

			//$google_base_categories = $this->model_extension_feed_google_base->getCategories();
			//$google_base_categories = $this->model_catalog_category->getCategories(0);
//var_dump($google_base_categories); exit;
			//foreach ($google_base_categories as $google_base_category) {
				$filter_data = array(
					//'filter_category_id' => $google_base_category['category_id'],
					'filter_filter'      => false
				);

				$products = $this->model_catalog_product->getProducts($filter_data);

				foreach ($products as $product) {
					//if (!in_array($product['product_id'], $product_data) && $product['description']) {

						$product_data[] = $product['product_id'];

						$output .= '<entry>';
						$output .= '<g:title><![CDATA[' . $product['name'] . ']]></g:title>';
						$output .= '<g:link>' . $this->url->link('product/product', 'product_id=' . $product['product_id']) . '</g:link>';
						$output .= '<g:description><![CDATA[' . strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8')) . ']]></g:description>';
						$output .= '<g:brand><![CDATA[' . html_entity_decode($product['manufacturer'], ENT_QUOTES, 'UTF-8') . ']]></g:brand>';
						$output .= '<g:condition>new</g:condition>';
						$output .= '<g:id>' . $product['product_id'] . '</g:id>';

						if ($product['image']) {
							$output .= '  <g:image_link>' . $this->model_tool_image->resize($product['image'], 500, 500) . '</g:image_link>';
						} else {
							$output .= '  <g:image_link></g:image_link>';
						}

						$output .= '  <g:model_number>' . $product['model'] . '</g:model_number>';

						if ($product['mpn']) {
							$output .= '  <g:mpn><![CDATA[' . $product['mpn'] . ']]></g:mpn>' ;
						} else {
							$output .= '  <g:identifier_exists>false</g:identifier_exists>';
						}

						if ($product['upc']) {
							$output .= '  <g:upc>' . $product['upc'] . '</g:upc>';
						}

						if ($product['ean']) {
							$output .= '  <g:ean>' . $product['ean'] . '</g:ean>';
						}

						$currencies = array(
							'USD',
							'EUR',
							'UAH'
						);

						if (in_array($this->session->data['currency'], $currencies)) {
							$currency_code = $this->session->data['currency'];
							$currency_value = $this->currency->getValue($this->session->data['currency']);
						} else {
							$currency_code = 'USD';
							$currency_value = $this->currency->getValue('USD');
						}

						if ((float)$product['special']) {
							$output .= '  <g:price>' .  $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id']), $currency_code, $currency_value, false) . ' UAH</g:price>';
						} else {
							$output .= '  <g:price>' . $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id']), $currency_code, $currency_value, false) . ' UAH</g:price>';
						}

						//$output .= '  <g:google_product_category>' . $google_base_category['google_base_category_id'] . '</g:google_product_category>';

						$categories = $this->model_catalog_product->getCategories($product['product_id']);

						foreach ($categories as $category) {
							$path = $this->getPath($category['category_id']);

							if ($path) {
								$string = '';

								foreach (explode('_', $path) as $path_id) {
									$category_info = $this->model_catalog_category->getCategory($path_id);

									if ($category_info) {
										if (!$string) {
											$string = $category_info['name'];
										} else {
											$string .= ' &gt; ' . $category_info['name'];
										}
									}
								}

								$output .= '<g:product_type><![CDATA[' . $string . ']]></g:product_type>';
							}
						}

//						$output .= '  <g:quantity>' . $product['quantity'] . '</g:quantity>';
//						$output .= '  <g:weight>' . $this->weight->format($product['weight'], $product['weight_class_id']) . '</g:weight>';
						$output .= '  <g:availability><![CDATA[' . ($product['quantity'] ? 'in stock' : 'out of stock') . ']]></g:availability>';
						$output .= '</entry>';
					//}
				}
			//}

			//$output .= '  </channel>';
			$output .= '</feed>';

			$this->response->addHeader('Content-Type: application/xml');
			$this->response->setOutput($output);
		}
	}

    protected function getCategories22($parent_id, $current_path = '') {
        $output = '';

        $results = $this->model_catalog_category->getCategories($parent_id);

        foreach ($results as $result) {
            if (!$current_path) {
                $new_path = $result['category_id'];
            } else {
                $new_path = $current_path . '_' . $result['category_id'];
            }

            $output .= '<url>';
            $output .= '  <loc>' . $this->url->link('product/category', 'path=' . $new_path) . '</loc>';
            $output .= '  <changefreq>weekly</changefreq>';
            $output .= '  <priority>0.7</priority>';
            $output .= '</url>';

            $products = $this->model_catalog_product->getProducts(array('filter_category_id' => $result['category_id']));

            foreach ($products as $product) {
                $output .= '<url>';
                $output .= '  <loc>' . $this->url->link('product/product', 'path=' . $new_path . '&product_id=' . $product['product_id']) . '</loc>';
                $output .= '  <changefreq>weekly</changefreq>';
                $output .= '  <priority>1.0</priority>';
                $output .= '</url>';
            }

            $output .= $this->getCategories($result['category_id'], $new_path);
        }

        return $output;
    }

	protected function getPath($parent_id, $current_path = '') {
		$category_info = $this->model_catalog_category->getCategory($parent_id);

		if ($category_info) {
			if (!$current_path) {
				$new_path = $category_info['category_id'];
			} else {
				$new_path = $category_info['category_id'] . '_' . $current_path;
			}

			$path = $this->getPath($category_info['parent_id'], $new_path);

			if ($path) {
				return $path;
			} else {
				return $new_path;
			}
		}
	}
}
