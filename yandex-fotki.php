<?php
/*
	Plugin Name: Яндекс.Фотки
	Plugin URI: http://adw0rd.ru/ext/wp-yandex-fotki/
	Description: Плагин для отображения фотографий с фотохостинга "Яндекс.Фотки".
	Author: Михаил Андреев (aka adw0rd)
	Version: 2.0
	Author URI: http://adw0rd.ru
	
	Instalation:
	
        1. Upload to your plugins folder, usually wp-content/plugins/ and unzip the file, it will create a wp-content/plugins/yandex-fotki/ directory.
        2. Activate the plugin on the plugin screen.
        3. Go to "Options" administration menu, select "Yandex.Fotki" from the submenu.
        
        Requests:
            * PHP5
            * SimpleXML
        
        Using:
        
        Paste the code in your theme...
        
        <h2>Yandex.Fotki</h2>
        <ul>
            <?php yandexFotki(); ?>
        </ul>
*/

require_once 'yandex-fotki.class.php';

/**
 * Добавляем в панель настроек пункт "Панели управления плагином"
 * @return string
 */
function yandexFotki_admin()
{
	add_options_page('Яндекс.Фотки', 'Яндекс.Фотки', 10, basename(__FILE__), 'yandexFotki_adminPanel');
}


/**
 * Панель управления плагином
 * @return string
 */
function yandexFotki_adminPanel()
{
	require 'admin/index.php';
}

/**
 * Вывод превьюшек, например в сайдбар
 * @return string
 */
function yandexFotki ()
{

	$yFotki = new YFotki();
	
	switch ($yFotki->option('type')) {
		case 'allPhotos': 
			$results = $yFotki->getPhotos();
		break;
		case 'allAlbums':
            $results = $yFotki->getAlbums();
        break;
		case 'allPhotosInAlbum':
			$albumId = YFotki::option('albumId');
			$results = $yFotki->getPhotosByAlbumId($albumId);
	    break;
		default:
            $results = $yFotki->getPhotos();
		break;
	}
	
	foreach ($results as $result) {
		
		echo '<li>';
		
            $img = '<a href="'.$result['link'].'"><img src="'.$result['preview'].'" alt='.$result['title'].' title='.$result['title'].' /></a>';
		
			if(YFotki::option('isTitle') == 1) {
		        echo $img . '<p>' . $result['title'] . '</p>';
			} else {
				echo $img;
			}
		
		echo '</li>';
	}
}


add_action('admin_menu', 'yandexFotki_admin');

?>