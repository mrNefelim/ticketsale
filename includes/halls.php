<?php
			include(TSDIR . 'base/halls.php');
			if($_POST['addhall'])
			{
				$data = array('name' => $_POST['name'], 'address' => $_POST['address'], 'row' => $_POST['row'], 'place' => $_POST['place']);
				if($wpdb->insert( $table_halls, $data, array('%s','%s','%d','%d')))
				{
					$content .= '<a class="tsbtn" href="admin.php?page=ticketsale&type=halls&action=edit&id='.$wpdb->insert_id.'">Зал успешно добавлен, перейти к его настройке</a>';
				}
			}
			elseif($_POST['addzone'])
			{
				$data = array('name' => $_POST['name']);
				if($wpdb->insert( $table_halls_zone, $data, array('%s')))
				{
					$content .= '<a class="tsbtn" href="admin.php?page=ticketsale&type=halls">Зона успешно добавлена, вернуться к списку залов</a>';
				}
			}
			elseif($_GET['action'] == 'edit')
			{
				$id = (int)$_GET['id']*1;
				$price = $wpdb->get_row("SELECT row,place FROM `".$table_halls."` WHERE id='".$id."'", ARRAY_A);
				$content .= '<div class="hallField">';
				for ($i = 1; $i <= $price['row']; $i++) {
					$content .= '<div class="hallFieldRow">';
					for ($j = 1; $j <= $price['place']; $j++) {
						$content .= "<a></a>";
					}
					$content .= '</div>';
				}
				$content .= '</div>';
			}
			else
			{
				$content .= '<h2>Список залов</h2>';
				$content .= '<a class="tsbtn" id="addhallbtn">Добавить зал</a>';
				$content .= "<form style='width: 720px;' class='hideform' id='addhallform' method='post'>";
				$content .= "<input type='text' name='name' placeholder='Название зала (например, Кинотеатр Родина)' />";
				$content .= "<input type='text' name='address' placeholder='Адрес' />";
				$content .= "<input type='number' name='row' placeholder='Количество рядов(включая стоячие)' />";
				$content .= "<input type='number' name='place' placeholder='Максимальное количество мест в ряду' />";
				$content .= "<input type='submit' name='addhall' value='Сохранить' />";
				$content .= "</form>";
				$content .= '<div class="hallslist">';
				$hallsList = $wpdb->get_results("SELECT * FROM  `".$table_halls."`", ARRAY_A);
				foreach($hallsList as $hall)
				{
					$content .= '<div class="hall">';
					$content .= '<p>'.$hall['name'].'</p>';
					$content .= '<p>'.$hall['address'].'</p>';
					$content .= '<p>Размер: '.$hall['row'].' на '.$hall['place'].'</p>';
					$content .= '<a href="admin.php?page=ticketsale&type=halls&action=edit&id='.$hall['id'].'" class="tsbtn">Настроить</a>';
					$content .= '</div>';
				}
				$content .= '</div>';
				$content .= '<h2>Список зон</h2>';
				$content .= '<a class="tsbtn" id="addzonebtn">Добавить зону</a>';
				$content .= "<form style='width: 720px;' class='hideform' id='addzoneform' method='post'>";
				$content .= "<input type='text' name='name' placeholder='Название зоны (например, вип-зона)' />";
				$content .= "<input type='submit' name='addzone' value='Сохранить' />";
				$content .= "</form>";
				$content .= '<div class="hallslist">';
				$zonesList = $wpdb->get_results("SELECT * FROM  `".$table_halls_zone."`", ARRAY_A);
				foreach($zonesList as $zone)
				{
					$content .= '<div class="hall">';
					$content .= '<p>'.$zone['name'].'</p>';
					$content .= '</div>';
				}
				$content .= '</div>';
			}
	$content .= "
	<script>
		jQuery(function($){
			$('#addhallbtn').click(function(){
				$('#addhallform').fadeToggle();
			});
			$('#addzonebtn').click(function(){
				$('#addzoneform').fadeToggle();
			});
		});
	</script>
	";

?>