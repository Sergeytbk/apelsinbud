<?php
class ControllerExtensionModuleHTML2 extends Controller {
	public function index($setting) {

        if (isset($setting['type'])) {
		    if(isset($setting['module_description'])){
                $module_description = $setting['module_description'][$this->config->get('config_language_id')];
                unset($setting['module_description']);
                $data = array_merge($setting,$module_description);
            }else{
                $data = $setting;
            }

            if(isset($setting['migx_connect']) && is_array($setting['migx_connect'])){
                foreach ($setting['migx_connect'] as $migx_connect){
                    $migx = $this->db->query("SELECT * FROM " . DB_PREFIX . "module_cf WHERE name = '" . $migx_connect . "'")->rows;
                    foreach ($migx as $mig){
                        $fields = json_decode($mig['setting'], true);
                        if(isset($fields['module_description'])){
                            $fields_lang = $fields['module_description'][$this->config->get('config_language_id')];
                            unset($fields['module_description']);
                            $data[$mig['name']][] = array_merge($fields,$fields_lang);
                        }else{
                            $data[$mig['name']][] = $fields;
                        }
                    }
                }
            }

            if(is_file(DIR_APPLICATION.'view/theme/'.$this->config->get('config_theme').'/template/extension/module/html2_'.$setting['type'].'.twig')){
                return $this->load->view('extension/module/html2_'.$setting['type'], $data);
            }else{
                return $this->load->view('extension/module/html2', ['data'=>$data]);
            }
		}
	}
}