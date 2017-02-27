<?php
/*
Plugin Name: Ticket Sale
Plugin URI: http://muzconveer.ru/
Description: Plugin for selling tickets in cinemas, concert halls
Author: Muzconveer
Version: 1.0
Author URI: http://muzconveer.ru/
*/
	define('TSDIR',	plugin_dir_path(__FILE__));
    define('TSURL',	plugins_url('', __FILE__));
	add_action('admin_menu', function(){
		add_menu_page( 'Места в зале', 'Места в зале', 1, 'ticketsale', 'ticketSale', '', 4 ); 
	} );

	function ticketSale(){
		global $wpdb;
		$content = "<div class='ticketsale'>";
		switch($_GET['action'])
		{
			case '':
				include(TSDIR . 'includes/event.php');
				break;
			case 'halls':
				include(TSDIR . 'includes/halls.php');
				break;
		}
		
		
		$content .= '</div>';
		###########################################
		?>
		<link rel='stylesheet' href='<?php echo TSURL; ?>/templates/style.css?ver=1.0' type='text/css' media='all' />
		<div class='ticketsalemenu'>
			<a class="tsbtn" href="admin.php?page=ticketsale">Концерты</a>
			<a class="tsbtn" href="admin.php?page=ticketsale&action=halls">Список залов</a>
		</div>
		<?php
		echo $content;
	}
?>