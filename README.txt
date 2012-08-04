=== Yandex-Fotki ===
Contributors: adw0rd
Tags: yandex, photos, images, sidebar
Requires at least: 2.6
Tested up to: 2.9.1
Stable tag: release-2.0.1

The plugin to display photos from photohosting "Yandeks.Fotki" to your blog on Wordpress.
Current version: 2.0.1

== Description ==

The plugin to display photos from photohosting "Yandeks.Fotki" to your blog on Wordpress.

= Features =

* Show all photos of the user
* Show your photos in this album
* As before, you can specify the number of results extradition, but is no longer limited to 20 th
* Show names of pictures
* Specifying the size of thumbnail pictures 

== Installation ==

1. Upload to your plugins folder, usually wp-content/plugins/ and unzip the file, it will create a wp-content/plugins/yandex-fotki/ directory.
2. Activate the plugin on the plugin screen.
3. Go to "Options" administration menu, select "Yandex.Fotki" from the submenu.

= Requests: =
* PHP5
* SimpleXML

= Using =
Paste the code in your theme:
<code>
<h2>Yandex.Fotki</h2>
<ul>
    <?php yandexFotki(); ?>
</ul>
</code>

== Frequently Asked Questions ==

Empty

== Screenshots ==

1. layout 1
2. layout 2

== Changelog ==

= 2.0.1 =
* Compability Wordpress 2.7 and later

= 2.0 =
* Plugin rewritten from scratch by API Yandex.Fotki
* Conclusion photos user (without limit of 20 photos)
* Derivation of photos in this album you
* Option output names photos
* The option of extradition preview size photos
* The plugin is added to the directory MyWordPress
* The plugin is added to the directory WordPress.org