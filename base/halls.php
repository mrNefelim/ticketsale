<?php
			$table_halls = $wpdb->prefix . "ticketsale_halls";
			$table_halls_zone = $wpdb->prefix . "ticketsale_halls_zone";
			$table_halls_places = $wpdb->prefix . "ticketsale_halls_places";
			if($wpdb->get_var("SHOW TABLES LIKE '$table_halls'") != $table_halls) {
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				
				$sqlCreate_tablehalls = "CREATE TABLE " . $table_halls . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					name VARCHAR(55) NOT NULL,
					address VARCHAR(550) NOT NULL,
					row mediumint(9) NOT NULL,
					place mediumint(9) NOT NULL,
					UNIQUE KEY id (id)
				);";
				dbDelta($sqlCreate_tablehalls);
				
				$sqlCreate_tablehallsZone = "CREATE TABLE " . $table_halls_zone . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					name VARCHAR(5000) NOT NULL,
					UNIQUE KEY id (id)
				);";
				dbDelta($sqlCreate_tablehallsZone);
				
				$sqlCreate_tablehallsPlace = "CREATE TABLE " . $table_halls_places . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					hall mediumint(9) NOT NULL,
					row mediumint(9) NOT NULL,
					place mediumint(9) NOT NULL,
					price mediumint(9) NOT NULL,
					zone mediumint(9) NOT NULL,
					numeric mediumint(9) NOT NULL,
					color VARCHAR(55) NOT NULL,
					UNIQUE KEY id (id)
				);";
				dbDelta($sqlCreate_tablehallsPlace);
			}
?>