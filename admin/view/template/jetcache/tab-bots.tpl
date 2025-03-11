<div id="tabs-bots" class="htabs">
<a href="#tab-bots-options" class="jc-tab-2"><?php echo $language->get('tab_bots_options'); ?></a>
<a href="#tab-bots-ajax" class="jc-tab-2"><?php echo $language->get('tab_bots_ajax'); ?></a>
</div>

<div id="tab-bots-options">

<div style="clear: both;">
	<div class="jetcache-margin-top-16">
		<?php echo $entry_jetcache_bots; ?>
	</div>
	<div class="input-group">
		<span class="input-group-addon"><?php echo $text_jetcache_bots; ?></span>
		<textarea class="form-control" cols="50" rows="8" name="asc_jetcache_settings[bots]"><?php if (isset($asc_jetcache_settings['bots']) && $asc_jetcache_settings['bots'] != '') {
																									echo $asc_jetcache_settings['bots'];
																								} else {
																									echo '';
																								} ?></textarea>
	</div>
</div>

<div style="clear: both;">
	<div class="jetcache-margin-top-16">
		<?php echo $entry_jetcache_bots_cookie; ?>
	</div>
	<div class="input-group">
		<span class="input-group-addon"><?php echo $text_jetcache_bots_cookie; ?></span>
		<textarea class="form-control" cols="50" rows="8" name="asc_jetcache_settings[bots_cookie]"><?php if (isset($asc_jetcache_settings['bots_cookie']) && $asc_jetcache_settings['bots_cookie'] != '') {
																										echo $asc_jetcache_settings['bots_cookie'];
																									} else {
																										echo '';
																									} ?></textarea>
	</div>
</div>

</div>

<div id="tab-bots-ajax">
<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
	<tr class="jetcache-back">
		<td colspan="2" class="jetcache-back jetcache-text-center">
			<?php echo $language->get('entry_bots_ajax'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
		</td>
	</tr>
	<tr>
		<td class="jetcache-table-help"><?php echo $language->get('entry_bots_ajax_status_help'); ?></td>
		<td class="jetcache-text-center">
			<div class="input-group jetcache-text-center">
			<div class="jc-select-toggle">
				<select class="form-control jc-select-switch" name="asc_jetcache_settings[bots_ajax_status]">
					<?php if (isset($asc_jetcache_settings['bots_ajax_status']) && $asc_jetcache_settings['bots_ajax_status']) { ?>
						<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
						<option value="0"><?php echo $text_disabled; ?></option>
					<?php } else { ?>
						<option value="1"><?php echo $text_enabled; ?></option>
						<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
					<?php } ?>
				</select>
					</div>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="jetcache-back jetcache-text-center">
			<?php echo $language->get('entry_bots_ajax_add_route'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
		</td>
	</tr>
	<tr>
		<td class="jetcache-table-help left">
			<?php echo $language->get('entry_bots_ajax_add_route_help'); ?>
		</td>
		<td>
			<div class="input-group"><span class="input-group-addon"></span>
				<textarea class="form-control" name="asc_jetcache_settings[bots_ajax_add_route]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['bots_ajax_add_route'])) {
																														echo $asc_jetcache_settings['bots_ajax_add_route'];
																													} else {
																														echo '';
																													} ?></textarea>
			</div>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td colspan="2" class="jetcache-back jetcache-text-center">
			<?php echo $language->get('entry_bots_ajax_add_uri'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td class="jetcache-table-help left">
			<?php echo $language->get('entry_bots_ajax_add_uri_help'); ?>
		</td>
		<td>
			<div class="input-group"><span class="input-group-addon"></span>
				<textarea class="form-control" name="asc_jetcache_settings[bots_ajax_add_uri]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['bots_ajax_add_uri'])) {
																														echo $asc_jetcache_settings['bots_ajax_add_uri'];
																													} else {
																														echo '';
																													} ?></textarea>
			</div>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td colspan="2" class="jetcache-back jetcache-text-center">
			<?php echo $language->get('entry_bots_ajax_add_get'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td class="jetcache-table-help left">
			<?php echo $language->get('entry_bots_ajax_add_get_help'); ?>
		</td>
		<td>
			<div class="input-group"><span class="input-group-addon"></span>
				<textarea class="form-control" name="asc_jetcache_settings[bots_ajax_add_get]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['bots_ajax_add_get'])) {
																														echo $asc_jetcache_settings['bots_ajax_add_get'];
																													} else {
																														echo '';
																													} ?></textarea>
			</div>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td colspan="2" class="jetcache-back jetcache-text-center">
			<?php echo $language->get('entry_bots_ajax_server_response_1'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td class="jetcache-table-help left">
			<?php echo $language->get('entry_bots_ajax_server_response_1_help'); ?>
		</td>
		<td>
			<div class="input-group"><span class="input-group-addon"><?php echo $server_protocol; ?></span>
				<input type="text" name="asc_jetcache_settings[bots_ajax_server_response_1]" value="<?php if (isset($asc_jetcache_settings['bots_ajax_server_response_1'])) {
																										echo $asc_jetcache_settings['bots_ajax_server_response_1'];
																									} else {
																										echo '';
																									} ?>" style="width: 300px;">
			</div>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td colspan="2" class="jetcache-back jetcache-text-center">
			<?php echo $language->get('entry_bots_ajax_server_response_2'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td class="jetcache-table-help left">
			<?php echo $language->get('entry_bots_ajax_server_response_2_help'); ?>
		</td>
		<td>
			<div class="input-group">
				<input type="text" name="asc_jetcache_settings[bots_ajax_server_response_2]" value="<?php if (isset($asc_jetcache_settings['bots_ajax_server_response_2'])) {
																										echo $asc_jetcache_settings['bots_ajax_server_response_2'];
																									} else {
																										echo '';
																									} ?>" style="width: 300px;">
			</div>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td colspan="2" class="jetcache-back jetcache-text-center">
			<?php echo $language->get('entry_bots_ajax_server_response_3'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
		</td>
	</tr>
	<tr class="jetcache-pro-settings">
		<td class="jetcache-table-help left">
			<?php echo $language->get('entry_bots_ajax_server_response_3_help'); ?>
		</td>
		<td>
			<div class="input-group">
				<input type="text" name="asc_jetcache_settings[bots_ajax_server_response_3]" value="<?php if (isset($asc_jetcache_settings['bots_ajax_server_response_3'])) {
																										echo $asc_jetcache_settings['bots_ajax_server_response_3'];
																									} else {
																										echo '';
																									} ?>" style="width: 300px;">
			</div>
		</td>
	</tr>





</table>
</div>