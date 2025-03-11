<?php
class ModelExtensionModuleHtml2 extends Model {
	public function addModule($code, $data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "module` SET `name` = '" . $this->db->escape($data['name']) . "', `code` = '" . $this->db->escape($code) . "', `setting` = '" . $this->db->escape(json_encode($data)) . "'");
	    return $this->db->getLastId();
    }
	
	public function editModule($module_id, $data) {
		$this->db->query("UPDATE `" . DB_PREFIX . "module` SET `name` = '" . $this->db->escape($data['name']) . "', `setting` = '" . $this->db->escape(json_encode($data)) . "' WHERE `module_id` = '" . (int)$module_id . "'");
	}

	public function clearMigx($module_id){
        $this->db->query("DELETE FROM " . DB_PREFIX . "module_cf WHERE module_id = ".$module_id);

    }

    public function addMigx($module_id, $name,$fields) {
        $this->db->query("INSERT INTO `" . DB_PREFIX . "module_cf` SET `module_id` = '" . (int)$module_id . "', `name` = '" . $this->db->escape($name) . "', `code` = '', `setting` = '" . $this->db->escape(json_encode($fields)) . "'");
    }

    public function getMigxInfo($module_id){
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "module_cf` WHERE `module_id` = '" . (int)$module_id . "'");
        if ($query->rows) {
            return $query->rows;
        }else{
            return array();
        }
    }
		
	public function getModule($module_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "module` WHERE `module_id` = '" . (int)$module_id . "'");

		if ($query->row) {
			return json_decode($query->row['setting'], true);
		} else {
			return array();
		}
	}

	public function generatorAdd($data){

	    $module = $this->db->query("SELECT id FROM " . DB_PREFIX ."module_generator WHERE `name` = '".$data['name']."'")->row;
	    if($module){
	        return false;
        }else{
	         $this->db->query("INSERT INTO " . DB_PREFIX . "module_generator SET name = '" . $this->db->escape($data['name']) . "', title = '" . $this->db->escape($data['title']) . "', migx = '" . (int)$data['migx'] . "', fields =  '" . $this->db->escape(json_encode($data['cf'])) . "'");
	        return true;
        }
    }

    public function generatorEdit($id,$data){

	    $this->db->query("UPDATE " . DB_PREFIX . "module_generator SET name = '" . $this->db->escape($data['name']) . "', title = '" . $this->db->escape($data['title']) . "', migx = '" . (int)$data['migx'] . "', fields =  '" . $this->db->escape(json_encode($data['cf'])) . "' WHERE id = ". $id);

	    return true;
    }

    public function generatorList(){
        $modules = $this->db->query("SELECT * FROM " . DB_PREFIX ."module_generator")->rows;

        $data['modules'] = [];
        foreach ($modules as $module){
            $data['modules'][] = array(
                'id' => $module['id'],
                'name' => $module['name'],
                'title' => $module['title'],
                'migx' => $module['migx'],
                'fields' => json_decode($module['fields'], true)
            );
        }

        return $data['modules'];
    }

    public function html2GetModules($migx = 0){
        $modules = $this->db->query("SELECT * FROM " . DB_PREFIX ."module_generator WHERE migx = ". $migx)->rows;

        $data['modules'] = [];
        foreach ($modules as $module){
            $data['modules'][] = array(
                'id' => $module['id'],
                'name' => $module['name'],
                'title' => $module['title'],
                'migx' => $module['migx'],
                'fields' => json_decode($module['fields'], true)
            );
        }

        return $data['modules'];
    }


    public function generatorDelete($id){
	    $this->db->query("DELETE FROM " . DB_PREFIX . "module_generator WHERE id = " .$id);
    }

    public function generatorGet($id){
        $module_info = $this->db->query("SELECT * FROM " . DB_PREFIX ."module_generator WHERE id = ". $id)->row;

        $module = array(
            'id' => $module_info['id'],
            'name' => $module_info['name'],
            'title' => $module_info['title'],
            'migx' => $module_info['migx'],
            'fields' => json_decode($module_info['fields'], true)
        );

        return $module;
    }

    public function install(){
	    $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "module_cf`");
        $this->db->query("CREATE TABLE `" . DB_PREFIX . "module_cf` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `module_id` int(11) NOT NULL,
              `name` varchar(255) NOT NULL,
              `code` varchar(255) DEFAULT NULL,
              `setting` text NOT NULL,
              PRIMARY KEY (`id`)
            );");
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "module_generator`");
        $this->db->query("
            CREATE TABLE `" . DB_PREFIX . "module_generator` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `title` varchar(255) NOT NULL,
              `migx` tinyint(1) NOT NULL,
              `fields` text NOT NULL,
              PRIMARY KEY (`id`)
            )");
    }

}