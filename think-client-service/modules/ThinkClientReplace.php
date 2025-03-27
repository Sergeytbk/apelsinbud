<?php
/**
 * Модуль для подмены html
 */
class ThinkClientReplace extends ThinkClientHtmlMethods
{
	function __construct($html) {
		parent::__construct($html);
	}

	public function replace_html()
	{
		// add comment
		$this->html = str_replace("</head>", "<!-- comment -->\n</head>", $this->html);

		$this->addThinkText();
		$this->fixCanonical();
		$this->addSemant();

		return $this->html;
	}

	private function addSemant() {
        $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (preg_match('#<ol class="breadcrumb">(.*?)</ol>#s', $this->html, $findBreadcrumb)) {        	
            if (preg_match_all('#<li class="breadcrumb-item[^>]*>.*?(<a href="(?<href>.*?)">)?(?<name>.*?)(</a>)?</li>#s', $findBreadcrumb[1], $findBreadcrumbItems)) {
            	if(!empty($findBreadcrumbItems['name'])) {
            		$semantBreadcrumb = '
            		<script type="application/ld+json">
            		{
					  "@context": "https://schema.org",
					  "@type": "BreadcrumbList",
					  "itemListElement": [';
                  	$pos = 1;
	                for($i = 0; $i < count($findBreadcrumbItems['name']); $i++) {
	                    $name = str_replace('"','', $findBreadcrumbItems['name'][$i]);
	                    $href = $findBreadcrumbItems['href'][$i] != '' ? $findBreadcrumbItems['href'][$i] : $url;
	                    $semantBreadcrumb .= '
                     	{
					      "@type": "ListItem",
					      "position": '.$pos.',
					      "name": "'.$name.'",
					      "item": "'.$href.'"
					    }';
					    if($pos < count($findBreadcrumbItems['name'])) $semantBreadcrumb .= ',';
	                    $pos++;
	                }
					$semantBreadcrumb .= '
					  ]
					}
	 				</script>
					';
	                $this->html=str_replace("</head>", $semantBreadcrumb."</head>", $this->html);
	    		}
        	}
    	}

    	if($this->detector->isProduct) {
    		
			$avail = strpos($this->html, '<div class="products-item__avail mb-3">') !== false ? "https://schema.org/InStock" : "https://schema.org/OutOfStock";
			$img = preg_match('#<a[^>]*href="([^>]*)"[^>]*class="product-images-main"[^>]*>#s', $this->html, $match_img) ? $match_img[1] : '';
			$price = preg_match('#<div class="product__price_new">(.*?)<span>.*?</div>#s', $this->html, $match_price) ? trim(str_replace('грн', '', $match_price[1])) : '';

    		$semantProduct = '
    		<script type="application/ld+json">
    		{
			  "@context": "http://schema.org/",
			  "@type": "Product",
			  "name": "'.$this->h1.'",
			  "image": [
			    "'.$img.'"
			  ],
			  "offers": {
			    "@type": "Offer",
			    "priceValidUntil": "'.date('Y-m-d').'",
			    "url": "https:'.$this->url.'",
			    "priceCurrency": "UAH",
			    "price": "'.$price.'",
			    "availability": "'.$avail.'",
			    "seller": {
			      "@type": "Organization",
			      "name": "Апельсин Буд"
			    }
			  }
			}
		  	</script>';
		  	$this->html=str_replace("</head>", $semantProduct."</head>", $this->html);
    	}
    }

	public function fixCanonical()
	{			
		if(($this->detector->isCategory || $this->detector->isIndexFilters) && !$this->detector->isPagination  && !$this->detector->isSort){
            $this->setRobots('index,follow');
            $this->setCanonical('https:'.$this->url);
        }

        //noindex filters robots
        if($this->detector->isNoIndexFilters){
            $this->setRobots('noindex,nofollow');
        }		
	}

	public function addThinkText()
	{

		if ($this->uri == '/') {
			$this->detector->isMain          = true;
			$this->detector->currentPageType = 'Main';
			$this->html = preg_replace('#(<div class="text text_grey">)(.*?)(<a[^>]*class="link-more js-link-more">.*?</a>)#s', '$1<think_text>$2</think_text>$3', $this->html);

		} /*elseif (strpos($this->url, '/catalog/') !== false) {
			$this->detector->isCategory = true;
			if (preg_match('#<div class="pagination">.*?</div>#s', $this->html)) {
				$this->html = preg_replace('#(<div class="pagination">.*?</div>)#s', '$1<div class="think category"><think_text></think_text></div>', $this->html);
			}
		} elseif (strpos($this->url, '/product/') !== false) {
			$this->detector->isProduct = true;
			if (preg_match('#<div class="productPage__desc-p">(.*?)</div>#s', $this->html, $match_desc)) {
				$re         = '@(<div[^<>]*?class="productPage__desc-p"[^<>]*>).*?((?&not_div))(<\/div>)
					(?(DEFINE)
					 (?<div>[<]div[^<>]*[>](?&not_div)[<][\/]div[>])
					 (?<not_div>(?>[^<>]+|[<](?!\/?div\b)[^>]*[>]|(?&div))*)
					)@mxs';
				$this->html = preg_replace($re, '$1<think_text>$2</think_text>$3', $this->html);

			}
			// if (preg_match('#<div class="productPage__reviews"#s', $this->html)) {
			// 	$this->html = str_replace('<div class="productPage__reviews"', '<div class="think"><think_text></think_text></div><div class="productPage__reviews"', $this->html);
			// }
		}*/

		$style      = '<style>h1.think{margin-bottom: 20px; margin-top: -20px; text-align: center;} .think:has(think_text:empty){display: none;} .think.category{margin-top: 40px; font-size: 16px; color: #666;}</style>';
		$this->html = str_replace("</head>", $style . "</head>", $this->html);	
	}
}
