<?php
			$table_sales = $wpdb->prefix . "sales";
			$table_sales_places = $wpdb->prefix . "sales";
			if($wpdb->get_var("SHOW TABLES LIKE '$table_sales'") != $table_sales) {
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				
				$sqlCreate_tablesales = "CREATE TABLE " . $table_sales . " (
				  id mediumint(9) NOT NULL AUTO_INCREMENT,
				  name VARCHAR(55) NOT NULL,
				  address VARCHAR(550) NOT NULL,
				  row mediumint(9) NOT NULL,
				  place mediumint(9) NOT NULL,
				  UNIQUE KEY id (id)
				);";
				//dbDelta($sqlCreate_tablesales);
				
				$sqlCreate_tablesalesPlace = "CREATE TABLE " . $table_sales_places . " (
				  id mediumint(9) NOT NULL AUTO_INCREMENT,
				  hall mediumint(9) NOT NULL,
				  row mediumint(9) NOT NULL,
				  place mediumint(9) NOT NULL,
				  price mediumint(9) NOT NULL,
				  UNIQUE KEY id (id)
				);";
				//dbDelta($sqlCreate_tablesalesPlace);
			}
			
			$content .= 'Продаем билеты';

?>