Yandex-Fotki
============

<a href="http://adw0rd.ru/ext/wp-yandex-fotki/">
<img src="http://adw0rd.ru/media/2009/01/yandexfotki10.png" alt="yandex-fotki-20" title="yandex-fotki-20" width="166" height="177" />
</a>

Плагин для вывода фотографий с фотохостинга "Яндекс.Фотки" в ваш блог на Wordpress.
Работает на основе "<a href="http://api.yandex.ru/fotki/">API Яндекс.Фоток</a>".

<strong>Текущая версия:</strong> 2.0.1 (<a href="http://adw0rd.ru/2010/yandex-fotki-201/">Обсуждение</a>)

Страница в директории плагинов <strong>WordPress.org</strong>: <a href="http://wordpress.org/extend/plugins/yandex-fotki/">http://wordpress.org/extend/plugins/yandex-fotki/</a>

<h3>Возможности</h3>
<ul>
  <li>Выводить все фотографии пользователя</li>
	<li>Выводить фотографии в выбранном вами альбоме</li>
	<li>Как и ранее можно указывать количество результатов выдачи, но теперь НЕ ограничено 20-ю</li>
	<li>Выводить названия фотографий</li>
	<li>Указывать размер превью фотографии</li>
</ul>

<h3>Требования</h3>
<ul>
	<li>PHP5</li>
	<li>SimpleXML (в PHP5 по умолчанию установлен)</li>
</ul>

<h3>Использование</h3>

Вставьте следующий php-код в вашу тему:
<pre>
<?php
    yandexFotki();
?>
</pre>

<h3>Скриншоты</h3>
<a href="http://adw0rd.ru/media/2009/06/wp-yandefotki-2-adminpanel.png"><img src="http://adw0rd.ru/2009/06/wp-yandefotki-2-adminpanel-300x218.png" alt="Панель управления опциями" title="Панель управления опциями" width="300" height="218" class="alignleft size-medium wp-image-3582" style="border: dotted  #c4c4c4 2px;padding:3px;" /></a>
<a href="http://adw0rd.ru/media/2009/06/wp-yandefotki-2-sidebar.png"><img src="http://adw0rd.ru/2009/06/wp-yandefotki-2-sidebar-161x300.png" alt="Результат вывода фотографий" title="Результат вывода фотографий" width="161" height="300" class="alignleft size-medium wp-image-3583" style="border: dotted  #c4c4c4 2px;padding:3px;margin-left:20px;" /></a>

<br clear="all" />

<h3>История версий</h3>
<ul style="list-style-type:none">

	<li><strong>2.0.1 (<a href="http://adw0rd.ru/2010/yandex-fotki-201/">Обсуждение</a>)</strong>
		<ul>
			<li>Изменена навигация в админке</li>
			<li>Допилина совместимость с версией 2.9.1</li>
		</ul>
	</li>

	<li><strong>2.0 (<a href="http://adw0rd.ru/2009/yandex-fotki-2/">Обсуждение</a>)</strong>
		<ul>
			<li>Плагин переписан с нуля под API Яндекс.Фоток</li>
			<li>Вывод фотографий пользователя (без лимита в 20 фоток)</li>
			<li>Вывод фотографии в выбранном вами альбоме</li>
			<li>Опция вывода названия фотографий</li>
			<li>Опция размера выдачи превью фотографии</li>
			<li>Плагин добавлен в каталог <em>MyWordPress</em></li>
		</ul>
	</li>
	<li><strong>1.1 (<a href="http://adw0rd.ru/2009/yandex-fotki-11/">Обсуждение</a>)</strong>
		<ul>
			<li>Ссылки на фотографию</li>
			<li>Плагин обзавелся каталогом</li>
			<li>Кеширование результатов</li>
		</ul>
	</li>
	<li><strong>1.0 (<a href="http://adw0rd.ru/2009/yandex-fotki-wp-plugin/">Обсуждение</a>)</strong>
		<ul>
			<li>Первая версия, работает на парсинге сайта Яндекс.Фоток регулярками (тогда API и RSS небыло)</li>
			<li>Панель администрирования с возможностью указания «юзернейма» и «лимита»</li>
			<li>Парсинг превью последних добавленных фотографий (не более 20).</li>
		</ul>
	</li>
</ul>
