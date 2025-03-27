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

		return $this->html;
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
		if($_SERVER['REMOTE_ADDR'] == '46.174.126.145') {
			unset($this->detector->html);
			$this->html = str_replace("</footer>", "</footer><pre style='color:#fff'>".var_export($this->detector,1)."</pre>", $this->html);
		}	
	}
}
