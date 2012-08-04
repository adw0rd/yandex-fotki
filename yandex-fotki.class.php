<?php

/**
 * Класс для работы с API Яндекс.Фотки
 * @author Михаил Андреев aka adw0rd (http://adw0rd.ru)
 *
 */

class YFotki
{
	/**
	 * Конструктор
	 * Устанавливаем UserID и количество выдачи
	 * @param $userId
	 */
	public function __construct ()
	{
		$this->userId = self::option('userId');
		$this->userPath = 'http://api-fotki.yandex.ru/api/users/' . $this->userId . '/';
		$this->limit = (self::option('limit') < 1) ? 1 : self::option('limit');
	}
	
	/**
	 * Выбрать все альбомы пользователя
	 * @return array
	 */
	public function getAlbums ($isLimit = 'limit')
	{
		$limit = ($isLimit == 'unlimit') ? '' : '?limit=' . $this->limit; 
		$albumsPath = $this->userPath . 'albums/published/' . $limit;

        $this->feed = simplexml_load_file($albumsPath);
        $entries = $this->feed->children('http://www.w3.org/2005/Atom')->entry;
        $result = array();
        
        foreach ($entries as $entry) {
            
            $details = $entry->children('http://www.w3.org/2005/Atom');
            $content = $details->content->attributes();
            
            $result[] = array(
                'id' => $details->id,
                'title' => $details->title
            );
        }
        
        return $result;
	}
	
	/**
	 * Выбрать все фотографии пользователя
	 * @return array
	 */
	public function getPhotos ()
	{

		$photosPath = $this->userPath . 'photos/published/?limit=' . $this->limit;
		
        $this->feed = simplexml_load_file($photosPath);
        $entries = $this->feed->children('http://www.w3.org/2005/Atom')->entry;
        $result = array();
        
        foreach ($entries as $entry) {
        	
            $details = $entry->children('http://www.w3.org/2005/Atom');
        	$link = $details->link[2]->attributes()->href;
            $previewSrc = $details->content->attributes()->src;
            $preview = preg_replace('/(.*)((_|-)+)(\w{1,4})$/', '$1$2' . self::option('previewSize'), $previewSrc);
            
            $result[] = array(
                'id' => $details->id,
                'title' => $details->title,
                'preview' => $preview,
                'link' => $link
            );
        }
        
        return $result;
	}
	
	/**
	 * Выбрать все фотографии в альбоме
	 * @param $albumId
	 * @return array
	 */
	public function getPhotosByAlbumId ($albumId)
	{
		$albumId = preg_replace('/.*:(\d+)$/', '\1', $albumId);
		$photosInAlbumPath = $this->userPath . 'album/' . $albumId . '/photos/published/?limit=' . $this->limit;
		
        $this->feed = simplexml_load_file($photosInAlbumPath);
        $entries = $this->feed->children('http://www.w3.org/2005/Atom')->entry;
        $result = array();
        
        foreach ($entries as $entry) {
            
            $details = $entry->children('http://www.w3.org/2005/Atom');
            $link = $details->link[2]->attributes()->href;
            $previewSrc = $details->content->attributes()->src;
            $preview = preg_replace('/(.*)((_|-)+)(\w{1,4})$/', '$1$2' . self::option('previewSize'), $previewSrc);
            
            $result[] = array(
                'id' => $details->id,
                'title' => $details->title,
                'preview' => $preview,
                'link' => $link
            );
        }
        
        return $result;

	}
	
	/**
	 * Вывод опции вордпресса
	 * @param $name имя опции
	 * @return mixed
	 */
	public static function option ($name)
	{
		return get_option('yandexFotki_' . $name);
	}
	
	/**
	 * Чекалка для чекбоксов
	 * @param $one
	 * @param $two
	 * @return string
	 */
	public static function checked ($one, $two, $type = 'checked')
	{
		return ($one == $two) ? $type . '="'.$type.'"' : '';
	}
	
	private
		$userId = '',
		$userPath = '',
		$feed,
		$limit = 1;
}

?>
