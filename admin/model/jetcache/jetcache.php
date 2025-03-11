<?php
/* All rights reserved belong to the module, the module developers https://support.opencartadmin.com */
// https://support.opencartadmin.com © 2011-2023 All Rights Reserved
// Distribution, without the author's consent is prohibited
// Commercial license
class ModelJetcacheJetcache extends Model {
	public function getProductsId($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "jetcache_product_cache WHERE product_id = '" . (int)$product_id . "'");
		if ($query->rows) {
			return $query->rows;
		} else {
			return false;
		}
	}

	public function removeCachefile($cachefile) {
		$sql = "DELETE FROM " . DB_PREFIX . "jetcache_product_cache WHERE filecache = '" . $this->db->escape($cachefile) . "'";
		$this->db->query($sql);
	}

	public function getSettings($table, $key) {
		$sql = "SELECT value_db FROM " . DB_PREFIX . $table . " WHERE `key_db` = '" . $this->db->escape($key) . "' AND `time_expire_db` > " . time() . "";
		$query = $this->db->query($sql);
		if (isset($query->row['value_db']))	return $query->row['value_db'];
		else
			return false;
	}

	public function setSettings($table, $key, $value, $time) {
		$sql = "INSERT INTO " . DB_PREFIX . $table . " (key_db, value_db, time_expire_db) VALUES('" . $this->db->escape($key) . "','" . $this->db->escape($value) . "','" . $this->db->escape($time) . "')";
		$this->db->query($sql);
	}

	public function deleteSettings($table, $key) {
		$sql = "DELETE FROM " . DB_PREFIX . $table . " WHERE `key_db` = '" . $this->db->escape($key) . "'";
		$query = $this->db->query($sql);
	}

	public function editSettings($group, $data, $store_id = 0) {
		$code = $group;

		if (SC_VERSION > 15) {
			$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE store_id = '" . (int)$store_id . "' AND `code` = '" . $this->db->escape($code) . "'");
			foreach ($data as $key => $value) {
				if (substr($key, 0, strlen($code)) == $code) {
					if (!is_array($value)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `code` = '" . $this->db->escape($code) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
					} else {
						$this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `code` = '" . $this->db->escape($code) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(json_encode($value, true)) . "', serialized = '1'");
					}
				}
			}
		} else {
			$this->db->query("DELETE FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
			foreach ($data as $key => $value) {
				if (!is_array($value)) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
				} else {
					$this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `group` = '" . $this->db->escape($group) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(serialize($value)) . "', serialized = '1'");
				}
			}
		}
	}

	public function getSetting($code, $store_id = 0) {
		$setting_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting_jetcache WHERE store_id = '" . (int)$store_id . "' AND `codekey` = '" . $this->db->escape($code) . "'");

		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$setting_data = $result['value'];
			} else {
				$setting_data = json_decode($result['value'], true);
			}
		}
		return $setting_data;
	}

	public function editSetting($code, $data, $store_id = 0) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting_jetcache` WHERE store_id = '" . (int)$store_id . "' AND `codekey` = '" . $this->db->escape($code) . "'");

		foreach ($data as $key => $value) {
			if ($code == $key) {
				if (!is_array($value)) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "setting_jetcache SET store_id = '" . (int)$store_id . "', `codekey` = '" . $this->db->escape($code) . "', `value` = '" . $this->db->escape($value) . "'");
				} else {
					$this->db->query("INSERT INTO " . DB_PREFIX . "setting_jetcache SET store_id = '" . (int)$store_id . "', `codekey` = '" . $this->db->escape($code) . "', `value` = '" . $this->db->escape(json_encode($value, true)) . "', serialized = '1'");
				}
			}
		}
	}

	public function deleteSetting($code, $store_id = 0) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "setting_jetcache WHERE store_id = '" . (int)$store_id . "' AND `codekey` = '" . $this->db->escape($code) . "'");
	}

	public function getSettingValue($key, $store_id = 0) {
		$query = $this->db->query("SELECT value FROM " . DB_PREFIX . "setting_jetcache WHERE store_id = '" . (int)$store_id . "' AND `codekey` = '" . $this->db->escape($key) . "'");

		if ($query->num_rows) {
			return $query->row['value'];
		} else {
			return null;
		}
	}

	public function editSettingValue($code = '', $key = '', $value = '', $store_id = 0) {
		if (!is_array($value)) {
			$this->db->query("UPDATE " . DB_PREFIX . "setting_jetcache SET `value` = '" . $this->db->escape($value) . "', serialized = '0'  WHERE `codekey` = '" . $this->db->escape($code) . "' AND store_id = '" . (int)$store_id . "'");
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "setting_jetcache SET `value` = '" . $this->db->escape(json_encode($value)) . "', serialized = '1' WHERE `codekey` = '" . $this->db->escape($code) . "' AND store_id = '" . (int)$store_id . "'");
		}
	}
}
