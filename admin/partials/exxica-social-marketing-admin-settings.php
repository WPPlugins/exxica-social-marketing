<?php
/**
 *
 * @link       http://exxica.com
 * @since      1.1.5.1
 *
 * @package    Exxica_Social_Marketing
 * @subpackage Exxica_Social_Marketing/partials
 */
 ?> 
 <script>
 (function ( $ ) {
	"use strict";

	$(function() {
		$( "#radio" ).buttonset();
	});
}(jQuery));
</script>
<form id="system-settings" method="POST" action="#">
	<?php wp_nonce_field('systemsettings'); ?>
	<table style="width:100%;background-color:#fff;border:1px solid #ddd;padding:10px;">
		<tbody>
			<tr>
				<td>
					<h2><?php _e('System-wide Social Marketing Settings', $this->name); ?></h2>
					<fieldset class="setting-fieldset">
						<legend><?php _e('Custom Exxica API', $this->name); ?></legend>
						<div>
							<div style="display:table;width:100%;">
								<div style="display:table-row;">
									<div style="display:table-cell;">
										<!--<p><?php _e("The service is available for installation on in-house server solutions. We have named the service: Exxica Social Publisher. This is primarily a solution for companies. Your system administrator will have to install it on your server for the service to be able to post on your social accounts. The service requires PHP 5.4+ and a MySQL database.<br/><br/>The price for Exxica Social Publisher is €329.90 - which is a one-time fee. <a href='http://sllwi.re/p/1tv' target='_blank'>Buy here</a><br/><br/><strong>What's included:</strong><ul><li>Current version of the server application.</li><li>One year of updates.</li><li>Support answering within one workday.</li><li>Extensive documentation.</li></ul><br/>", $locale); ?></p>-->
									</div>
								</div>
							</div>
						</div>
						<div>
							<div style="display:table;width:100%;">
								<div style="display:table-row;">
									<div style="display:table-cell;width:20%;">
										<?php _e('URL', $this->name); ?>
									</div>
									<div style="display:table-cell;">
										<div>
											<input type="text" id="api_url_custom" name="api_url_custom" placeholder="publisher.exxica.com" value="<?= $api_url ?>"style="width:400px;">
										</div>
										<span class="description"><?php _e('If you have a server with a custom Exxica API set up on, input the url to it here. ( not the http:// )', $this->name); ?></span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="setting-fieldset">
						<legend><?php _e('Date &amp; Time related', $this->name); ?></legend>
						<div>
							<h3><?php _e('Date format', $this->name); ?></h3><br/>
							<div style="display:table;width:100%;">
								<div style="display:table-row;">
									<div style="display:table-cell;width:20%;">
										<?php _e('Current pattern', $this->name); ?>
									</div>
									<div style="display:table-cell;">
										<div>
											<?php printf('<code>%s</code> = <strong>%s</strong>', $date_format, date($date_format, time())); ?>
										</div>
									</div>
								</div>
								<div style="display:table-row;">
									<div style="display:table-cell;width:20%;">
										<?php _e('Custom', $this->name); ?>
									</div>
									<div style="display:table-cell;">
										<div>
											<input type="text" id="date_format_custom" name="date_format_custom" placeholder="<?php _e('m/d/Y',$this->name); ?>" value="<?= $date_format ?>">
										</div>
										<span class="description"><?php printf( __('Default: <code>%s</code> - Reference <a href="%s" target="_blank">%s</a>', $this->name), __( 'm/d/Y', $this->name ), 'http://php.net/manual/en/function.date.php', __('PHP Date', $this->name) ); ?></span>
									</div>
								</div>
							</div>
							<h3><?php _e('Time format', $this->name); ?></h3><br/>
							<div style="display:table;width:100%;">
								<div style="display:table-row;">
									<div style="display:table-cell;width:20%;">
										<?php _e('Current pattern', $this->name); ?>
									</div>
									<div style="display:table-cell;">
										<div>
											<?php printf('<code>%s</code> = <strong>%s</strong>', $time_format, date($time_format, time())); ?>
										</div>
									</div>
								</div>
								<div style="display:table-row;">
									<div style="display:table-cell;width:20%;">
										<?php _e('Custom', $this->name); ?>
									</div>
									<div style="display:table-cell;">
										<div>
											<input type="text" id="time_format_custom" name="time_format_custom" placeholder="<?php _e('g:i A',$this->name); ?>" value="<?= $time_format ?>">
										</div>
										<span class="description"><?php printf( __('Default: <code>%s</code> - Reference <a href="%s" target="_blank">%s</a>', $this->name), __( 'g:i A', $this->name ), 'http://php.net/manual/en/function.date.php', __('PHP Date', $this->name) ); ?></span>
									</div>
								</div>
							</div>
							<h3><?php _e('Clock', $this->name); ?></h3>
							<div style="display:table;width:100%;">
								<div style="display:table-row;">
									<div style="display:table-cell;width:20%;">
										<?php _e('24-hour clock', $this->name); ?> 
									</div>
									<div style="display:table-cell;">
										<div id="radio">
											<input type="radio" id="radio1" name="twentyfour_hour_clock" value="1" <?php checked($twentyfour_clock_enabled, '1'); ?>><label for="radio1"><strong><?php _e('On', $this->name); ?></strong></label>
											<input type="radio" id="radio2" name="twentyfour_hour_clock" value="0" <?php checked($twentyfour_clock_enabled, '0'); ?>><label for="radio2"><strong><?php _e('Off', $this->name); ?></strong></label>
										</div>
										<span class="description"><?php _e('This will only have affect on input fields.', $this->name); ?></span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<?php submit_button( __('Save changes', $this->name ) ); ?>
				</td>
			</tr>
		</tbody>
	</table>
</form>