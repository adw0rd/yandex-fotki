<?php require_once 'header.tpl.php'; ?>
<form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="yandex-fotki" style="padding-top: 10px;">
		Введите имя <input type="text" name="yandexFotki_userId" value="<?php echo YFotki::option('userId'); ?>"  size="30" /> <span>(Например, <b>"x11org"</b> для <a href="http://fotki.yandex.ru/users/x11org/">http://fotki.yandex.ru/users/x11org/</a>)</span><br />
	</div>
	<input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="yandexFotki_userId" />
    <p class="submit">
		<input type="submit" name="Submit" class="button" value="Сохранить" />
	</p>
</form>

<?php

$userId = YFotki::option('userId');

if($userId == '') {
    echo '<p>Сначала введите имя пользователя!</p>';
    return;
}

$yFotki = new YFotki();
$albums = $yFotki->getAlbums('unlimit');

?>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
    <h3>Выводить</h3>
    <div class="yandex-fotki">
        <label for="allPhotos"><input <?php echo YFotki::checked(YFotki::option('type'), 'allPhotos'); ?> type="radio" name="yandexFotki_type" id="allPhotos" value="allPhotos">Все фотографии</label><br />
        <!-- <label for="allAlbums"><input <?php echo YFotki::checked(YFotki::option('type'), 'allAlbums'); ?> type="radio" name="yandexFotki_type" id="allAlbums" value="allAlbums">Все альбомы</label><br />  -->
        <label for="allPhotosInAlbum"><input <?php echo YFotki::checked(YFotki::option('type'), 'allPhotosInAlbum'); ?> type="radio" name="yandexFotki_type" id="allPhotosInAlbum" value="allPhotosInAlbum">Фотографии в альбоме</label>
            <?php
                if(count($albums) > 0) {
                    $disabled = '';
                    $emptyOption = '';
                } else {
                    $disabled = 'disabled="disabled"';
                    $emptyOption = '<option>Нет альбомов&nbsp;</option>'; 
                }
                echo '<select name="yandexFotki_albumId" ' . $disabled . ' onclick="changer(\'allPhotosInAlbum\'); return false;">' . $emptyOption;
                foreach ($albums as $album) {
                    echo '<option value="' . $album['id'] . '" ' . YFotki::checked(YFotki::option('albumId'), $album['id'], 'selected') . '>' . $album['title'].'&nbsp;</option>';
                }
                echo '</select>';
            ?>
            <span>(Выберите альбом)</span><br />
    </div>
    <h3>Опции выдачи</h3>
    <div class="yandex-fotki">
        Количество элементов выдачи <input name="yandexFotki_limit" value="<?php echo YFotki::option('limit'); ?>" size="3" /> шт.<br />
        Выводить названия фотографий <input type="checkbox" name="yandexFotki_isTitle" value="1" <?php echo YFotki::checked(YFotki::option('isTitle'), '1'); ?> /><br />
        <!--  Выводить количество фотографий в альбоме (или комментариев у фотографии) <input type="checkbox" name="yandexFotki_isCount" value="1" <?php echo YFotki::checked(YFotki::option('isCount'), '1'); ?> /><br />  -->
    </div>
    <h3>Предпросмотр</h3>
    <div class="yandex-fotki">
        Выберите размер превью:
        <select name="yandexFotki_previewSize">
        <?php
        
            $previewSize = array(
                'XS' => 'XS (100px)',
                'XXS' => 'XXS (75px)',
                'XXXS' => 'XXXS (50px)',
                'S' => 'S (150px)',
                'M' => 'M (300px)',
                'L' => 'L (500px)',
                'XL' => 'XL (800px)',
                'orig' => 'Оригинальный размер фотографии'
            );

            foreach ($previewSize as $k=>$v) {
                echo '<option value="' . $k . '" '.YFotki::checked(YFotki::option('previewSize'), $k, 'selected') . '>' . $v . '</option>';
            }
       ?>
        </select> <span>(Ширина)</span><br />
        <!-- При клике на превью, отображать фотографию в лайтбоксе <input type="checkbox" name="yandexFotki_isLightbox" value="1" <?php echo YFotki::checked(YFotki::option('isLightbox'), '1'); ?> /><br /> -->
    </div> 
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="yandexFotki_type,yandexFotki_albumId,yandexFotki_limit,yandexFotki_isTitle,yandexFotki_isCount,yandexFotki_previewSize,yandexFotki_isLightbox" />
    <p class="submit">
        <input type="submit" name="Submit" class="button" value="Сохранить" />
    </p>
</form>

<?php require_once 'footer.tpl.php';?>