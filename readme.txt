=== Loginpetze ===
Contributors: pixelverbieger, khehl
Tags: login snitch, staging, login, push, mail, notification, message, alert, monitor, monitoring
Requires at least: 4.0
Tested up to: 4.9.1
Requires PHP: 5.5
Stable tag: 0.99
License: GPLv2 or later

Notifies the admin by email as soon as a user has successfully logged in. Completely translatable, works with multisite, mails are customizable.

== Description ==

Sometimes it is useful to know if – or when – a user successfully logged in to WordPress. Loginpetze generates a notification mail for this incident. This is a conveniant way to e.g. monitor staging sites for customer logins. No need to regularly take a look at statistics or tracking tools. Mails are customizable with shortcodes. All texts are translatable. Loginpetze is compatible with WordPress Multisite.

== Installation ==

Installation is easy:

1. Download *loginpetze.zip* to your desktop and extract the archive.
2. Upload the folder *loginpetze* into the directory /wp-content/plugins/` on your webserver.
3. Activate *Loginpetze* via the *Plugins* menu in your WordPress Dashboard.
4. After activation go to *Settings &rarr; Loginpetze* to set up the few options this plugin offers.


== Frequently Asked Questions ==

= How can a completely new plugin have *frequently* asked questions? =

It hasn't, but there is no way to rename this section to *Probably Upcoming Questions* ;)

= «Loginpetze» – what kind of name is that? =

It's the german word for «login snitch».

= How does it work? =
In short: you install it, you select a user to receive the notification mails and you're done. If you like to, you can customize the subject and body of the mails. There are placeholders available that you can insert into your template: *username*, *blogname*, *date* and *time*.

= Is the plugin Multisite compatible? =

Loginpetze is not optimized for large Multisite installations, yet it should work for smaller ones (<100 sites). We appreciate your feedback on this feature. Full Multisite support is on our feature list for a future version.

= Why did you develop this plugin? =

Occasionally (especially when setting up websites for clients) we wanted to be notified if – or when – anybody logged in to the staging websites. For this purpose we used to add some lines to our <i>function.php</i> files, which was not very comfortable. For conveniance, we turned our code into this plugin.
It was also a good opportunity to learn and to completely play through the process of plugin creation.

= What happens if I deactivate or delete the plugin via my Dashboard? =

*Deactivating* the plugin will just stop the notification mails. Nothing will happen to your settings (which are stored in the database). However, if you **delete** the plugin, this will remove your settings from the database. If you then re-install it, the default settings will be applied.

= What happens if I just delete the files via FTP? =

This will also stop the notification mails, but since the uninstall routine is not called, nothing will be removed from your database. If you re-install Loginpetze, your custom settings will still be available.

= What happens if I or any other admin delete a user who is set up to receive the notification mails? =

Loginpetze will warn you about this and you can check your settings. In case this warning is ignored, Loginpetze will automatically switch the recipient to the Standard Blog Admin.

= I need more features. Is there a Pro Version available? =

No :)

== Future improvements ==

I have some ideas for future versions, for example
* confirmed Multisite compatibility (approval also for large sites)
* to change the way potential recipients are selected (use capabilities instead of Admin role)
* to recognize roles by third party plugins, e.g. User Role Editor

== Screenshots ==

1. The only screen for Loginpetze. All texts are translatable.

== Translations ==

If you wish to help translate this plugin, you are most welcome!
To contribute, please visit [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/loginpetze/)

Keep in mind that if you're not PTE or GTE for your language, you have to notify someone to approve your contributed strings. This can be done via [Slack](https://wordpress.slack.com/) or by writing a request on [https://make.wordpress.org/polyglots/](àhttps://make.wordpress.org/polyglots/)

To find the translation team for your locale, please visit [https://make.wordpress.org/polyglots/teams/](https://make.wordpress.org/polyglots/teams/)

== Credits ==

Special Thanks go to [Bernhard Kau](https://profiles.wordpress.org/kau-boy/), [Torsten Landsiedel](https://profiles.wordpress.org/zodiac1978), [Bego Mario Garde](https://profiles.wordpress.org/pixolin/) and [Thorsten Frommen](https://profiles.wordpress.org/tfrommen/).

== Changelog =

= 0.99 =
* 2018-01-01
* Initial release