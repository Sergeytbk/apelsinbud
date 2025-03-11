<?php
class ControllerExtensionFeedQxml extends Controller {
    public function index(){
        $url = $_SERVER['DOCUMENT_ROOT'] . '/qxml.xml';
        $xml = simplexml_load_file($url);

        /*foreach ($xml->shop->categories->category as $category){
            if((string)$category['parentId']) {
                //var_dump((string)$category['parentId']);
                //var_dump((string)$category);
                //exit;
                $cat1 = $this->db->query("SELECT category_id FROM ".DB_PREFIX."category WHERE xml_id='".(string)$category['parentId']."'")->row;
                //var_dump($cat1); exit;
                $this->db->query("INSERT INTO ".DB_PREFIX."category SET xml_id='".(string)$category['id']."', date_added=NOW(), date_modified=NOW(), parent_id='".$cat1['category_id']."'");
                $cat2 = $this->db->query("SELECT category_id FROM ".DB_PREFIX."category WHERE xml_id='".(string)$category['id']."'")->row;
                $this->db->query("INSERT INTO ".DB_PREFIX."category_description SET category_id='".$cat2['category_id']."', language_id=1, `name`='".(string)$category."', meta_title='".(string)$category."'");
                $this->db->query("INSERT INTO ".DB_PREFIX."category_description SET category_id='".$cat2['category_id']."', language_id=2, `name`='".(string)$category."', meta_title='".(string)$category."'");
                $this->db->query("INSERT INTO ".DB_PREFIX."category_to_store SET category_id='".$cat2['category_id']."', store_id=0");
                $this->db->query("INSERT INTO ".DB_PREFIX."category_path SET category_id='".$cat2['category_id']."', path_id='".$cat2['category_id']."', `level`=1");
                $this->db->query("INSERT INTO ".DB_PREFIX."category_path SET category_id='".$cat2['category_id']."', path_id='".$cat1['category_id']."'");
            } else{
                $this->db->query("INSERT INTO ".DB_PREFIX."category SET xml_id='".(string)$category['id']."', date_added=NOW(), date_modified=NOW(), parent_id=0");
                $cat2 = $this->db->query("SELECT category_id FROM ".DB_PREFIX."category WHERE xml_id='".(string)$category['id']."'")->row;
                $this->db->query("INSERT INTO ".DB_PREFIX."category_description SET category_id='".$cat2['category_id']."', language_id=1, `name`='".(string)$category."', meta_title='".(string)$category."'");
                $this->db->query("INSERT INTO ".DB_PREFIX."category_description SET category_id='".$cat2['category_id']."', language_id=2, `name`='".(string)$category."', meta_title='".(string)$category."'");
                $this->db->query("INSERT INTO ".DB_PREFIX."category_to_store SET category_id='".$cat2['category_id']."', store_id=0");
                $this->db->query("INSERT INTO ".DB_PREFIX."category_path SET category_id='".$cat2['category_id']."', path_id='".$cat2['category_id']."', `level`=1");
            }
        }*/
        //copy("https://t-b-k.com.ua/image/cache/catalog/zhbi/tovary/plityperekrytijaekstrudernye/plita_perekritiy_exstruderniy_tovar-1280x1024.jpg","image222.jpg");
        //exit;
        //$count = 0;
        foreach ($xml->shop->offers->offer as $product){
            $id = (string)$product['id'];
            $name = (string)$product->name;
            $price = (string)$product->price;
            $pictures = $product->picture;
            $category_id = $product->categoryId;
            $url = $product->url;
            $vendorCode = $product->vendorCode;
            $model = $product->model;
            $vendor = $product->vendor;
            $description = $product->description;
            $params = $product->param;
            //var_dump($product->param['name']);
            /*foreach ($params as $par){
                //var_dump((string)$par['name']);
                //var_dump((string)$par);
                $attr = $this->db->query("SELECT attribute_id FROM ".DB_PREFIX."attribute_description WHERE `name`='".$this->db->escape((string)$par['name'])."' AND language_id=2")->row;
                if(empty($attr['attribute_id'])){
                    $this->db->query("INSERT INTO ".DB_PREFIX."attribute SET attribute_group_id=7");
                    $attr_id = $this->db->query("SELECT attribute_id FROM ".DB_PREFIX."attribute ORDER BY attribute_id DESC")->row;
                    $attribute_id = $attr_id['attribute_id'];
                    $this->db->query("INSERT INTO ".DB_PREFIX."attribute_description SET attribute_id='".$attribute_id."', language_id=1, `name`='".$this->db->escape((string)$par['name'])."'");
                    $this->db->query("INSERT INTO ".DB_PREFIX."attribute_description SET attribute_id='".$attribute_id."', language_id=2, `name`='".$this->db->escape((string)$par['name'])."'");
                }
            }*/
            //exit;
            // 7   7

           /* $test = $this->db->query("SELECT product_id FROM ".DB_PREFIX."product WHERE xml_id='".$id."'")->row;
            $query = 'product_id='.$test['product_id'];
            $qurl = explode('/', $url);
            $qurl = str_replace('.html', '', $qurl[count($qurl)-1]);
            $seo = $this->db->query("SELECT keyword FROM ".DB_PREFIX."seo_url WHERE `query`='".$query."' AND language_id=1")->row;
            if(empty($seo['keyword'])){
                $this->db->query("INSERT INTO ".DB_PREFIX."seo_url SET store_id=0, language_id=1,`query`='".$query."', keyword='".$qurl."'");
                $this->db->query("INSERT INTO ".DB_PREFIX."seo_url SET store_id=0, language_id=2,`query`='".$query."', keyword='".$qurl."-ua'");
            }*/
            $count = 1;
            //if($id == 'd53297c440e86c13f4e0') {
                /*foreach ($pictures as $pic) {
                    $img = explode('/', (string)$pic);
                    $file = str_replace('-1280x1024', '', $img[count($img) - 1]);
                    $file = str_replace('-orig', '', $file);
                    $file = str_replace('%', '-', $file);
                    $qpic = str_replace('/cache/', '/', (string)$pic);
                    $qpic = str_replace('-1280x1024', '', $qpic);
                    $qpic = str_replace('-orig', '', $qpic);
                    if (!file_exists("image/catalog/products/" . $file)) {
                        copy($qpic, "image/catalog/products/" . $file);
                        $count++;
                    }

                    if($count == 1){
                        $this->db->query("UPDATE ".DB_PREFIX."product SET image='catalog/products/".$file."' WHERE product_id='".$test['product_id']."'");
                    } else{
                        $test2 = $this->db->query("SELECT image FROM ".DB_PREFIX."product WHERE xml_id='".$id."'")->row;
                        $test3 = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product_image WHERE image='catalog/products/" . $file . "'")->row;
                        if($test2['image'] != 'catalog/products/'.$file && !$test3['product_id']) {
                            $this->db->query("INSERT INTO " . DB_PREFIX . "product_image SET product_id='" . $test['product_id'] . "', image='catalog/products/" . $file . "'");
                        }
                    }
                    $count++;

                }*/
            //}
            /*if(empty($test['product_id'])) {
                $man = $this->db->query("SELECT manufacturer_id FROM " . DB_PREFIX . "manufacturer WHERE `name`='" . $this->db->escape($vendor) . "'")->row;
                if (!empty($man['manufacturer_id'])) {
                    $man_id = $man['manufacturer_id'];
                } else {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "manufacturer SET `name`='" . $this->db->escape($vendor) . "'");
                    $man2 = $this->db->query("SELECT manufacturer_id FROM " . DB_PREFIX . "manufacturer WHERE `name`='" . $this->db->escape($vendor) . "'")->row;
                    $man_id = $man2['manufacturer_id'];
                    $this->db->query("INSERT INTO " . DB_PREFIX . "manufacturer_to_store SET manufacturer_id='" . $man_id . "', store_id=0");
                }
                $this->db->query("INSERT INTO " . DB_PREFIX . "product SET model='" . $this->db->escape($model) . "', quantity=999, stock_status_id=7, manufacturer_id='" . $man_id . "', price='" . $price . "', subtract=1, minimum=1, status=1, date_added=NOW(), date_modified=NOW(), xml_id='" . $id . "'");
                $prod_id = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product WHERE xml_id='" . $id . "' ORDER BY product_id DESC")->row;
                $product_id = $prod_id['product_id'];

                $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_store SET product_id='" . $product_id . "', store_id=0");

                $cat = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "category WHERE xml_id='" . $category_id . "'")->row;
                $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id='" . $product_id . "', category_id='" . $cat['category_id'] . "', main_category=1");
                $this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET language_id=1, product_id='" . $product_id . "', `name`='" . $this->db->escape($name) . "', meta_title='" . $this->db->escape($name) . "', description='" . $this->db->escape($description) . "'");
                $this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET language_id=2, product_id='" . $product_id . "', `name`='" . $this->db->escape($name) . "', meta_title='" . $this->db->escape($name) . "', description='" . $this->db->escape($description) . "'");

                foreach ($params as $par) {
                    $attr = $this->db->query("SELECT attribute_id FROM " . DB_PREFIX . "attribute_description WHERE `name`='" . $this->db->escape((string)$par['name']) . "' AND language_id=2")->row;
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET product_id='" . $product_id . "', attribute_id='" . $attr['attribute_id'] . "', language_id=1, `text`='" . $this->db->escape((string)$par) . "'");
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET product_id='" . $product_id . "', attribute_id='" . $attr['attribute_id'] . "', language_id=2, `text`='" . $this->db->escape((string)$par) . "'");
                }
            }*/
        }
        //echo $count;
    }
}
?>