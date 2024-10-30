=== BP Template Overloader ===
Tags: BuddyPress, Posts, Activity, Updates
Requires at least: 5.4.0
Tested up to: 6.6.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires PHP: 6.2.4
Contributors: Venutius
Donate Link: paypal.me/GeorgeChaplin
Plugin URI: www.wordpress.org/plugins/bp-template-overloader
Stable tag: 1.2.0


 
== Description ==
 
This plugin is designed to simplify, improve and make the management of BuddyPress Template Overloads more accessible.

Overloading in BuddyPress is the process of customizing the membership pages by replacing default files with your own content.

It's a process that can become burdensome to manage since unless you are very organized it's easy to forget which files were changed and the changes made.

Let's say you inherited a BuddyPress site, or did some customization a while back and now want to know exactly what you did?

This plugin can help you, it will scan your site, show you which templates have been overloaded and allow you to easily compare those overloads with the default files. 

Both traditional Theme Dependent (files stored in Child-theme) and Theme Independent Overloads are supported.

Includes support for the forthcoming BP-Nouveau theme.

On loading, BP Template Overloader will scan your theme directory and find any existing template overloads that are in place.

Any that are found will be highlighted in the Template Overloader tools page and you will have the option to compare the current
overload with the current default file, so you can understand if you need to bring your overload up to date.

You will also get the option to migrate any Theme Dependent Overloads (TDO) to Theme Independent Overloads (TIO).

For files where no overload is in place, you will have the option to view the current default file and to establish either a TIO or TDO for that file.

Features

* Create Theme Overloads
* View BuddyPress master files
* Disable Theme Overloads
* Restore disabled Overloads
* Migration between Overload types
* Compare Overloads with the current BuddyPress default files
* Delete Overloads
* View Overload file paths and function data
* Supports both BP-Legacy and the forthcoming BP-Nouveau themes
* When Nouveau is released you will be able to compare the different template files

This plugin requires BuddyPress running either BP-Legacy or BP-Nouveau.

== Upgrade Notice ==

== Installation ==

Option 1.

1. From the Dashboard>>Plugins>>Add New page, search for BP Template Overloader.
2. When you have located the plugin, click on "Install" and then "Activate".
3. Visit the Dashboard>>Tools>>BP Template Overloader page to start managing your template overloads.

With the zip file:

Option 2

1. Upzip the plugin into it's directory/file structure
2. Upload BP Template Overloader structure to the /wp-content/plugins/ directory.
3. Activate the plugin through the Admin>>Plugins menu.
3. Visit the Dashboard>>Tools>>BP Template Overloader page to start managing your template overloads.

Option 3

1. Go to Admin>>Plugins>>Add New>>Upload page.
2. Select the zip file and choose upload.
3. Activate the plugin.
3. Visit the Dashboard>>Tools>>BP Template Overloader page to start managing your template overloads.
 
== Frequently Asked Questions ==
Q. Where are the Theme Independent Overload files stored?

A. These are placed in the wp-content/bp-template-overloads directory.

Q. My site is already overloaded, can I use this plugin?

A. Yes, this plugin will find your overloads and allow you to view their status and content.

Q. Why can't I edit by overload files using this plugin?

A. Editing php files on the fly without direct access to the site directory is very dangerous as you can easily crash the site.
   For this reason it's not possible to use this plugin to edit your overloads direct, the intention is that you will edit your files offline and upload them via FTP, that way if you make a typo, you can easily correct and over-write the file.

Q. What is the overload hierarchy?

A. With this plugin installed, the Theme Independent Overload is searched for first, following that the Theme Dependent Overload will be loaded, if that does not exist then the default BuddyPress files will be loaded.

Q. How does this plugin handle BP-nouveau?

A. BP-Nouveau has not been released yet so is subject to change. However the template files it will use are known and have been built into this plugin.
   The plugin detects the BP theme being used and configures itself accordingly. TIO template files are held in specific BP-Legacy and BP-nouveau directories.
   Once BP-Nouveau gets to Beta stage there may be an opportunity to add Legacy to Nouveau migration features.
 
= Translators =

 
== Screenshots ==
 
1. screenshot-1.png showing Tools page
2. screenshot-2.png Showing Compare files view

== Upgrade Notice == 

== Changelog ==

= 1.2.0 =

* 02/08/2024

* Updated and improved data sanitization

= 1.0.10 =

* 11/02/2021

* Fix: Corrected error when loading other admin pages

= 1.0.9 =

* 11/02/2021

* Update: Script loading performance improvement.

= 1.0.8 =

* 11/02/2021

* Fix: Corrected JS error on none BPTO pages.

= 1.0.7 =

* 08/02/2021

* Fix: Corrected error causing JS not to load when site has SSL.
* Update: Updated to latest version of Fancybox.

= 1.0.6 =

* 27/06/2018

* Fix: Fixed error for Nouveau where overload files were being sourced from the wrong directory.

= 1.0.5 =

* 28/05/2018

* Update: updated for BP 3.0.

= 1.0.4 =

* 18/05/2018

* Fix: corrected typo in Nouveau function call.

= 1.0.3 =

* 16/05/2018

* Fix: Corrected typo in error text.

= 1.0.2 =

* 16/05/2018

* Fix: Added check for BP active prior to loading.

= 1.0.1 =

* Added Review link.
* Fix - Updated Nouveau filenames.
* Fix - Corrected Nouveau filenames variable.

= 1.0.0 =

* Initial Version - 28/03/2018

