<?php

/**
 * Fired during plugin activation
 *
 * @link       http://exxica.com
 * @since      1.0.0
 *
 * @package    Exxica_Social_Marketing
 * @subpackage Exxica_Social_Marketing/includes
 */

/**
 * Fired during plugin activation.
 *
 * @since      1.0.0
 * @package    Exxica_Social_Marketing
 * @subpackage Exxica_Social_Marketing/admin
 * @author     Gaute Rønningen <gaute@exxica.com>
 */
class Exxica_Social_Marketing_Activator {

	/**
	 * Triggers on activation of the plugin.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wp, $wpdb; 
		$sql = '';

		$latest_version = '1.3.2';
		$installed_version = get_option('exxica_social_marketing_version', false);

		$smTable = $wpdb->prefix . 'exxica_social_marketing';
		$accTable = $wpdb->prefix . 'exxica_social_marketing_accounts';
		$statTable = $wpdb->prefix . 'exxica_social_marketing_statuses';

		if($installed_version === false) {
			require_once ABSPATH.'wp-admin/includes/upgrade.php';
			// ESM first time setup
		    $sql = "CREATE TABLE IF NOT EXISTS $smTable(
			  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
			  `post_id` int(20) NOT NULL,
			  `exx_account` varchar(128) NOT NULL,
			  `channel` varchar(64) NOT NULL,
			  `channel_account` varchar(128) NOT NULL,
			  `publish_type` varchar(16) NOT NULL,
			  `publish_localtime` int(20),
			  `publish_unixtime` int(20) NOT NULL,
			  `publish_image_url` text NOT NULL,
			  `publish_article_url` text NOT NULL,
			  `publish_title` text NOT NULL,
			  `publish_description` text NOT NULL,
			  PRIMARY KEY (`id`)
			); ";
			dbDelta( $sql );
		    $sql = "CREATE TABLE IF NOT EXISTS $accTable(
			  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
			  `exx_account` varchar(128) NOT NULL,
			  `channel` varchar(64) NOT NULL,
			  `channel_account` varchar(128) NOT NULL,
			  `expiry_date` INT(20) NOT NULL,
			  `fb_page_id` varchar(128),
			  PRIMARY KEY (`id`)
			); ";
			dbDelta( $sql );
		    $sql = "CREATE TABLE IF NOT EXISTS $statTable (
			  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
			  `marketing_id` int(20) unsigned NOT NULL,
			  `status` int(20) unsigned NOT NULL COMMENT '0 = Ok, 1 = Error',
			  `message` text,
			  PRIMARY KEY (`id`)
			); ";
			dbDelta( $sql );
		} else {
			if((string)$installed_version !== (string)$latest_version) {

				// Update version
				update_option('exxica_social_marketing_version', $latest_version);
			}
		}
	}
}