<?php
			$table_event = $wpdb->prefix . "event";
			if($wpdb->get_var("SHOW TABLES LIKE '$table_event'") != $table_event) {
				$sqlCreate_tableConcert = "CREATE TABLE " . $table_event . " (
				  id mediumint(9) NOT NULL AUTO_INCREMENT,
				  time bigint(11) DEFAULT '0' NOT NULL,
				  name tinytext NOT NULL,
				  text text NOT NULL,
				  url VARCHAR(55) NOT NULL,
				  UNIQUE KEY id (id)
				);";

				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				//dbDelta($sqlCreate_tableConcert);
			}
			$content .= 'Создаем концерты';

?>