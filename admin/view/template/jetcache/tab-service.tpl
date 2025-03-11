<div style="display: flex;
flex-wrap: wrap;
align-content: space-between;
justify-content: space-between;
width: 100%;
margin-top: 4px; margin-bottom: 8px;
">
	<div>
		<div style="display: flex;
							flex-direction: column;
							  align-items: flex-start;
							flex-wrap: wrap;
							align-content: space-between;
							justify-content: space-between;
							width: 100%;
							margin-top: 4px;
							margin-bottom: 11px;">






			<div style="display: flex; align-items: center; margin-bottom: 11px;">

				<div style="width: 160px;">
					<?php echo $language->get('entry_jc_backup'); ?>&nbsp;
				</div>
				<div class="input-group">
					<a href="#" id="jc_backup" onclick="
							$.ajax({
							url: '<?php echo $url_backup; ?>&jc_backup=1',
							dataType: 'html',
							beforeSend: function()
							{
								$('#div_jc_backup').html('<?php echo $language->get('text_loading_main'); ?>').show();
							},
							success: function(content) {
								if (content) {
									content_array = JSON.parse(content);
									$('#div_jc_backup').html(content_array['text']);
									setTimeout(hide_messages, 3000, '#div_jc_backup');
									if (content_array['success']) {
										window.location = '<?php echo $url_backup; ?>';
									}
								}
							},
							error: function(content) {
								$('#div_jc_backup').html('<span style=\'color:red\'><?php echo $language->get('text_jc_backup_fail'); ?><\/span>');
							}
							}); return false;" class="markbuttono sc_button" style=""><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $language->get('text_jc_url_backup'); ?></a>
					<div id="div_jc_backup"></div>
				</div>
			</div>

			<div style="display: flex; align-items: center; margin-bottom: 11px;">
				<div style="width: 160px;">
					<?php echo $language->get('entry_jc_restore'); ?>&nbsp;&nbsp;
				</div>
				<div class="input-group">
					<a id="jc_restore" class="markbuttono sc_button"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $language->get('text_jc_url_restore'); ?></a>
					<div id="div_jc_restore"></div>
				</div>
			</div>


			<div style="display: flex; align-items: center; margin-bottom: 11px;">
				<div style="width: 160px;">
					<?php echo $text_jetcache_check_ver; ?>&nbsp;&nbsp;
				</div>
				<div class="input-group">
					<a id="sc_check_common" onclick="
								$.ajax({
									url: '<?php echo $url_check_ver; ?>',
									dataType: 'html',
									beforeSend: function()
									{
									   $('#check_ver').show().html('<?php echo $language->get('text_jetcache_loading_main'); ?>');
									},
									success: function(json) {
										if (json) {
											$('#check_ver').html(json);
											setTimeout(hide_messages, 5000, '#check_ver');
										}	
										document.dispatchEvent(JetCacheSaveEvent);											
									},
									error: function(json) {
										document.dispatchEvent(JetCacheSaveEvent);
										$('#check_ver').html('error');
									}
								}); return false;" class="markbuttono sc_button"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $text_jetcache_check_ver; ?></a>
					<div id="check_ver" style="display: none;">&nbsp;</div>
				</div>
			</div>




		</div>
	</div>

	<div>

	</div>

	<div>
		<div style="display: flex; align-items: center; margin-bottom: 11px;">
			<a href="#" id="delete-settings" class="mbuttonr" onclick="$('#delete-settings').toggle(); $('#delete-settings-sure-pre').toggle(); return false;"><?php echo $url_text_jetcache_delete_text; ?></a>
			<a href="#" id="delete-settings-sure-pre" class="buttonorange asc_blinking" onclick="$('#delete-settings-sure-pre').toggle(); $('#delete-settings-sure').toggle(); return false;"><?php echo $url_text_jetcache_delete_sure_pre_text; ?></a>
			<a href="#" id="delete-settings-sure" class="mbuttonredlight" onclick="
						$.ajax({
						url: '<?php echo $url_delete; ?>',
						dataType: 'html',
						beforeSend: function()
						{
							$('#delete-settings-text').html('<?php echo $language->get('text_loading_main'); ?>');
						},
						success: function(json) {
							$('#delete-settings-text').html(json);
						},
						error: function(json) {
							$('#delete-settings-text').html('error');
						}
						}); return false;" class="mbuttonred mbuttonr" style="display: none;"><?php echo $url_text_jetcache_delete_sure_text; ?></a>
		</div>
		<div id="delete-settings-text"></div>
	</div>


</div>



<script>
	$('#jc_restore').on('click', function() {
		$('#jc-form-upload').remove();

		$('body').prepend('<form enctype="multipart/form-data" id="jc-form-upload" style="display: none;"><input type="file" name="file" /></form>');

		$('#jc-form-upload input[name=\'file\']').trigger('click');

		if (typeof timer != 'undefined') {
			clearInterval(timer);
		}
		timer = setInterval(function() {
			if ($('#jc-form-upload input[name=\'file\']').val() != '') {
				clearInterval(timer);
				$.ajax({
					url: '<?php echo $url_restore; ?>',
					type: 'post',
					data: new FormData($('#jc-form-upload')[0]),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function() {
						$('#div_jc_restore').html('<?php echo $language->get('text_loading_main_without'); ?>').show();
					},
					success: function(content) {
						if (content) {
							content_array = JSON.parse(content);
							$('#div_jc_restore').html(content_array['text']);
							setTimeout(hide_messages, 3000, '#div_jc_backup');
							if (content_array['success']) {
								$('#jetcache_cache_remove').trigger('click');
								window.location = '<?php echo $url_jetcache; ?>&jc_restore=1';
							}
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						$('#div_jc_restore').html('<span style="color:red"><?php echo $language->get('text_jc_backup_fail'); ?></span><br>' + thrownError + '<br>' + xhr.statusText + '<br>' + xhr.responseText);
					}
				});
			}
		}, 500);

	});
</script>

<script>
	function hide_messages(sel) {
		$(sel).html('');
	}
</script>