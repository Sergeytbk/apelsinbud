<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
	<style>
		.jc-select-toggle {
			display: inline-block;
			position: relative;
			overflow: hidden;
			cursor: pointer;
		}

		.jc-select-toggle .jc-select-switch {
			display: none !important;
		}

		.jc-select-toggle::before {
			content: attr(data-value);
			display: block;
			min-width: 120px;
			text-align: center;
			padding: 4px 20px 4px 20px;
			margin-top: 5px;
			font-size: 15px;
			line-height: 20px;
			transition: 0.3s ease-in-out, transform 0.5s, background-color 0.5s, color 0.5s;
		}

		.jc-select-toggle.jc-select-on::before {
			background-color: #4caf50;
			color: #fff;
		}

		.jc-select-toggle.jc-select-off::before {
			background-color: #ccc;
			color: #333;
		}

		.jc-select-toggle:hover {
			cursor: pointer;
		}

		@keyframes blinking {
			0% {
				background-color: #FF4400;
			}

			50% {
				background-color: #FF5500;
			}

			100% {
				background-color: red;
			}
		}

		.jc-must-save {
			animation: blinking 1s infinite;
		}
	</style>
	<div class="jetcache-top-heading">
		<div id="ukr-flag" style="margin-left: 0; float:left; ">
			<div style="float: left; color: #fff; font-weight: normal; text-decoration: none; vertical-align: bottom; margin-top: 12px;">

				<a href="index.php?route=jetcache/jetcache&<?php echo $token_name; ?>=<?php echo $token; ?>">
					<div style="float: left;">

						<svg version="1.1" width="24" height="24" id="jetcacheicon" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" style="margin-left: 11px;">
							<defs id="defs2634" />
							<g id="g4616" transform="matrix(0.32920411,0,0,0.32920366,-4.7727351,-4.410736)" style="stroke-width:0.999017;stroke-dasharray:none">
								<path d="m 52.8037,59.7138 c 0.447,0.6417 0.0321,-0.2043 0.6628,1.1883 0.4141,0.9138 0.2438,0.5255 0.5225,1.3285 1.7767,5.1195 1.9054,8.6655 1.9054,14.1287 H 49.095 c 1.7331,-3.6024 3.593,-11.4687 3.7087,-16.6455 z m -7.4175,16.029 c -1.9581,-0.1625 -4.7348,-1.1572 -6.1814,-1.8495 2.9884,-4.4508 3.0138,-2.6608 8.6509,-12.3331 l 0.458,-0.7762 c 0.709,-1.1043 0.2261,-0.4331 0.7813,-1.0702 0,6.3917 -1.4828,11.8334 -3.7088,16.029 z m 10.5082,-17.2619 0.5151,-0.7193 c 0.4733,0.2018 8.7569,10.4189 8.7569,13.6658 0,2.3125 -3.8212,2.8653 -5.5632,3.6989 0,-3.902 -1.7828,-15.775 -3.7088,-16.6454 z m -19.7801,13.563 c -2.8543,-1.9064 -4.3299,-2.6343 -4.945,-4.9322 2.7601,-0.6413 5.4355,-2.5156 7.6706,-4.0629 l 6.5463,-5.1845 c -0.5688,2.4351 -2.5882,5.6502 -3.9808,7.7431 -1.7955,2.6983 -3.8224,4.2487 -5.2911,6.4365 z M 58.985,55.3983 c 6.0069,1.3958 11.4723,7.4144 14.2171,9.2474 -1.9115,2.8468 -2.6413,4.3186 -4.9452,4.9322 C 66.918,63.8461 60.9052,58.2582 58.985,55.3983 Z m -29.6702,8.6311 c -2.3186,0 -2.8728,-3.8111 -3.7086,-5.5485 3.6815,0 14.0645,-1.4236 16.6893,-3.6991 l 0.7212,0.5138 c -0.2024,0.472 -10.4465,8.7338 -13.7019,8.7338 z M 60.8394,51.6992 c 6.4086,0 11.8647,1.479 16.0713,3.6991 -0.1629,1.9529 -1.1603,4.7223 -1.8543,6.1651 -1.3748,-0.9184 -1.711,-1.5078 -2.9987,-2.5579 -4.7253,-3.8539 -6.1461,-3.9722 -10.1453,-6.527 -1.1072,-0.7071 -0.4342,-0.2255 -1.073,-0.7793 z m -32.7607,3.0826 h -3.7089 v -6.7815 c 3.612,1.7286 11.4991,3.5836 16.6895,3.6989 -2.6831,1.8595 -9.8095,3.0826 -12.9806,3.0826 z m 16.6893,-4.932 c 0,-7.9801 12.3627,-7.9801 12.3627,0 0,7.9801 -12.3627,7.9801 -12.3627,0 z m 29.052,-4.932 h 3.7089 v 6.7814 C 73.9169,49.9707 66.0298,48.1157 60.8394,48.0003 63.5225,46.1409 70.6489,44.9178 73.82,44.9178 Z M 58.882,44.404 c 0.0617,-0.144 5.6885,-4.6239 6.2782,-5.0407 10.1872,-7.1973 9.2482,-2.061 11.1323,1.8554 -3.5821,0 -5.7664,0.2943 -8.911,0.9764 l -5.8036,1.6099 c -1.3588,0.5038 -0.9223,0.2004 -1.9747,1.1128 z M 26.8423,38.1362 c 3.1885,2.1296 2.8666,3.0694 10.3877,7.5182 0.7487,0.4428 1.3064,0.7207 1.978,1.1099 l 1.8513,1.236 c -6.4086,0 -11.8647,-1.4789 -16.0713,-3.699 0.1629,-1.9529 1.1603,-4.7223 1.8543,-6.1651 z m 9.89,-9.864 c 0,-2.3125 3.8212,-2.8653 5.5632,-3.6989 0,3.5728 0.2951,5.7513 0.979,8.8876 0.4445,2.0387 1.3786,6.2074 2.7298,7.7578 L 45.4892,41.938 C 45.0159,41.7362 36.7323,31.519 36.7323,28.2722 Z m -3.0905,1.8497 c 1.3389,5.7316 7.3517,11.3195 9.2719,14.1794 -6.0068,-1.3958 -11.4723,-7.4144 -14.217,-9.2475 1.9114,-2.8467 2.6412,-4.3185 4.9451,-4.9319 z m 22.8707,11.7134 c 0.5688,-2.4351 2.5882,-5.6503 3.9808,-7.7431 1.7955,-2.6983 3.8224,-4.2487 5.2911,-6.4365 2.8543,1.9064 4.33,2.6343 4.9451,4.9322 -5.7469,1.3353 -11.3495,7.3322 -14.217,9.2474 z m -3.7088,-1.8495 c 0,-6.3917 1.4829,-11.8334 3.7088,-16.029 1.9581,0.1625 4.7348,1.1572 6.1814,1.8494 -3.2176,4.7922 -2.9253,2.9615 -8.8741,12.7271 z m -3.7087,0 C 46.3366,36.0265 46.0043,28.1517 46.0043,23.3403 h 6.7994 c -1.7331,3.6024 -3.593,11.4687 -3.7087,16.6455 z m -28.434,9.864 c 0,16.4722 13.7726,30.2086 30.2884,30.2086 16.5157,0 30.2883,-13.7364 30.2883,-30.2086 0,-16.4722 -13.7726,-30.2086 -30.2883,-30.2086 -16.5158,0 -30.2884,13.7364 -30.2884,30.2086 z" style="fill:#FFF;fill-rule:evenodd;stroke-width:0.999017;stroke-dasharray:none" id="path2626" />
								<path d="m 50.9494,86.3014 c -20.1316,0 -36.4516,-16.32 -36.4516,-36.4516 0,-20.1316 16.32,-36.4516 36.4516,-36.4516 20.1315,0 36.4515,16.32 36.4515,36.4516 0,20.1316 -16.32,36.4516 -36.4515,36.4516 z m 0,-3.2266 c -18.3497,0 -33.225,-14.8754 -33.225,-33.225 0,-18.3496 14.8753,-33.225 33.225,-33.225 18.3496,0 33.2249,14.8754 33.2249,33.225 0,18.3496 -14.8753,33.225 -33.2249,33.225 z" style="fill:#FFF;fill-rule:evenodd;stroke-width:0.999017;stroke-dasharray:none" id="path2628" />
							</g>
						</svg>

					</div>
					<div style="float: left; margin-top:3px;">&nbsp;<?php echo strip_tags($heading_title_jc); ?></div>
				</a>

			</div>
			<div id="flag-ua" class="ukraine" style=" margin-top: 8px; margin-left: 4px; float: left; height: 8px; width: 14px;">&nbsp;</div>

			<?php
			if ($config_admin_language == 'uk-ua' || $config_admin_language == 'ua-uk' || $config_admin_language == 'ru-ru' || $config_admin_language == 'ru') {
			?>
				<style>
					#flag-ua {
						display: block !important;
					}

					#ukr-flag #flag-ua {
						display: block !important;
					}
				</style>
			<?php
			}
			?>
		</div>
		<div class="jetcache-top-copyright">
			<div style="color: #fff; font-size: 12px; margin-top: 5px; line-height: 18px; margin-left: 9px; margin-right: 9px; overflow: hidden;"><?php echo $language->get('heading_dev'); ?></div>
		</div>
	</div>


	<script>
		function delayer(event) {
			window.location = 'index.php?route=jetcache/jetcache&<?php echo $token_name; ?>=<?php echo $token; ?>&jc_save=1';
		}
		$('.jetcache-top-heading').on('click', function() {

		});
	</script>

	<?php $add_cont_row = 0; ?>
	<div class="page-header">
		<div class="container-fluid">
			<div id="content1" style="border: none;">
				<div style="clear: both; line-height: 1px; font-size: 1px;"></div>

				<?php if ($success) { ?>
					<div class="alert alert-success success"><i class="fa fa-check-circle"></i><button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $success; ?>
					</div>
				<?php } ?>
				<?php if (isset($error_warning) && $error_warning) { ?>
					<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i><button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $error_warning; ?>
					</div>
				<?php } ?>

				<div id="content" style="border: none;">
					<div style="clear: both; line-height: 1px; font-size: 1px;"></div>
					<div class="box1">
						<div class="content">

							<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">


								<div style="display: flex; align-items: flex-start; flex-wrap: wrap; align-content: space-between; justify-content: space-between; width: 100%; margin-top: 0px; margin-bottom: 2px;">


									<div style="display: flex; align-items: center; margin-bottom: 11px;">
										<div style="margin-right: 10px;">
											<?php echo $language->get('entry_widget_status'); ?> <?php if (SC_VERSION > 15) { ?><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo strip_tags($heading_title_jc); ?><?php } ?>
										</div>

										<div class="input-group">
											<div class="jc-select-toggle">
												<select class="form-control jc-select-switch" name="asc_jetcache_settings[jetcache_widget_status]">
													<?php if (isset($asc_jetcache_settings['jetcache_widget_status']) && $asc_jetcache_settings['jetcache_widget_status']) { ?>
														<option value="1" selected="selected"><?php echo $text_enabled_jc_module; ?></option>
														<option value="0"><?php echo $text_disabled_jc_module; ?></option>
													<?php } else { ?>
														<option value="1"><?php echo $text_enabled_jc_module; ?></option>
														<option value="0" selected="selected"><?php echo $text_disabled_jc_module; ?></option>
													<?php } ?>
												</select>
											</div>
											<input type="hidden" name="asc_jetcache_settings[seocms_jetcache_alter]" value="1">
										</div>


										<div style="margin-left: 10px;" class="buttons-hide-mob">
											<a href="#" onclick="$('#jc_save').click();return false;" class="mbutton jetcache_save buttons-top"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo $button_save; ?></a>
										</div>

										<div style="margin-left: 0px;" class="buttons-hide-mob">
											<a href="#" onclick="jc_settings_apply(); return false;" class="jc_apply buttonorange buttons-top"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo $language->get('button_apply'); ?></a>
										</div>

										<div style="margin-left: 0px;" class="buttons-hide-mob">
											<a href="#" onclick="js_cache_remove(); return false;" class="jc_remove_top markbuttono sc_button buttons-top"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo $language->get('text_url_cache_remove'); ?></a>
										</div>

										<div id="div_cache_remove_top" style="margin-left: 10px;"></div>


										<div id="sticky-anchor"></div>

									</div>

									<div style="margin:5px; float:right;" id="sticky">

										<a href="#" onclick="js_cache_remove(); return false;" id="jc_remove_cache_sticky" class="jc_remove_top markbuttono sc_button buttons-top"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo $language->get('text_url_cache_remove'); ?></a>

										<a href="#" onclick="jc_settings_apply(); return false;" class="jc_apply buttonorange buttons-top"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo $language->get('button_apply'); ?></a>

										<a href="#" id="jc_save" class="mbutton jetcache_save buttons-top"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo $button_save; ?></a>

									</div>
									<script>
										function js_cache_remove() {
											$.ajax({
												type: "POST",
												url: '<?php echo $url_cache_remove; ?>',
												cache: false,
												contentType: false,
												processData: false,
												dataType: 'json',
												beforeSend: function() {
													jc_remove_attr_onclick = $('.jc_remove_top').attr('onclick');
													$('.jc_remove_top').attr('onclick', 'return false;');

													jc_remove_top_html = $('.jc_remove_top').html();
													js_remove_html_trash_spin = jc_remove_top_html.replace('<i class="fa fa-trash-o" aria-hidden="true"></i>', '<i class="fa fa-refresh fa-spin"></i>');
													$('.jc_remove_top').html(js_remove_html_trash_spin);
												},

												success: function(json) {
													if (json['error']) {
														cl_button = 'button-red';
														$('.jc_remove_top').html(json['content']);
														$('.jc_remove_top').addClass(cl_button);
													} else {
														cl_button = 'button-green';
														$('.jc_remove_top').html(json['content']);
														$('.jc_remove_top').addClass(cl_button);
														setTimeout(messages_apply, 1100, '.jc_remove_top', jc_remove_top_html, cl_button, jc_remove_attr_onclick);

														if (json['content_more'] != '') {
															$('#div_cache_remove, #div_cache_remove_top').html('<span style=\'color:green\'>' + json['content_more'] + '<\/span>');
															setTimeout('$(\'#div_cache_remove, #div_cache_remove_top\').html(\'\')', 1000);
														}
													}
												},
												error: function(xhr, ajaxOptions, thrownError) {
													console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
													cl_button = 'button-red';
													$('.jc_remove_top').addClass(cl_button);
													$('.jc_remove_top, #div_cache_remove').html('<?php echo $language->get('text_apply_error'); ?>');
												}
											});
											return false;
										}


										function messages_apply(sel, mes, rcl, onc) {
											$(sel).html(mes);
											$(sel).removeClass(rcl);
											$(sel).attr('onclick', onc);
										}

										function jc_settings_apply() {
											$.ajax({
												type: "POST",
												url: '<?php echo $url_settings_apply; ?>',
												data: new FormData($('#form')[0]),
												cache: false,
												contentType: false,
												processData: false,
												dataType: 'json',
												beforeSend: function() {
													jc_apply_attr_onclick = $('.jc_apply').attr('onclick');
													$('.jc_apply').attr('onclick', 'return false;');

													jc_apply_html = $('.jc_apply').html();
													js_apply_html_refresh_spin = jc_apply_html.replace('<i class="fa fa-floppy-o" aria-hidden="true"></i>', '<i class="fa fa-refresh fa-spin"></i>');
													$('.jc_apply').html(js_apply_html_refresh_spin);
												},
												complete: function() {

												},
												success: function(json) {
													if (json['error']) {
														cl_button = 'button-red';
														$('.jc_apply').html(json['content']);
														$('.jc_apply').addClass(cl_button);
													} else {
														cl_button = 'button-green';
														$('.jc_apply').html(json['content']);

														if (json['content_more'] != '') {
															content_more = json['content_more'];
															setTimeout('$(\'.jc_apply\').html(content_more)', 500);
														}
														$('.jc_apply').addClass(cl_button);
														setTimeout(messages_apply, 1100, '.jc_apply', jc_apply_html, cl_button, jc_apply_attr_onclick);
													}

													if (json['mod']) {
														$('#jetcache_ocmod_refresh').click();
													}

												},
												error: function(xhr, ajaxOptions, thrownError) {
													console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
													cl_button = 'button-red';
													$('.jc_apply').addClass(cl_button);
													$('.jc_apply').html('<?php echo $language->get('text_apply_error'); ?>');
												}
											});
										}
									</script>


								</div>
								<?php if (SC_VERSION > 15) { ?>
									<style>
										#content-tabs {
											display: none;
										}
									</style>
								<?php } ?>

								<div id="content-tabs">
									<div id="tabs" class="htabs">
										<a href="#tab-options" class="jc-tab-1"><?php echo $language->get('tab_main'); ?></a>
										<a href="#tab-pages" class="jc-tab-1"><?php echo $language->get('tab_pages'); ?></a>
										<a href="#tab-cont" class="jc-tab-1"><?php echo $language->get('tab_cont'); ?></a>
										<a href="#tab-model" class="jc-tab-1"><?php echo $language->get('tab_model'); ?></a>
										<a href="#tab-query" class="jc-tab-1"><?php echo $language->get('tab_query'); ?></a>
										<a href="#tab-exceptions" class="jc-tab-1"><?php echo $language->get('tab_exceptions'); ?></a>
										<a href="#tab-image" class="jc-tab-1"><?php echo $language->get('tab_image'); ?></a>
										<a href="#tab-minify" class="jc-tab-1"><?php echo $language->get('tab_minify'); ?></a>
										<a href="#tab-bots" class="jc-tab-1"><?php echo $language->get('tab_bots'); ?></a>
										<a href="#tab-faq" class="jc-tab-1"><?php echo $language->get('tab_doc'); ?></a>
									</div>

									<div id="tab-faq">
										<?php
										if (function_exists('modification') && file_exists(modification(DIR_TEMPLATE . 'jetcache/tab-faq.tpl'))) {
											include(modification(DIR_TEMPLATE . 'jetcache/tab-faq.tpl'));
										} else {
											include(DIR_TEMPLATE . 'jetcache/tab-faq.tpl');
										}
										?>
									</div>

									<div id="tab-bots">
										<?php
										if (function_exists('modification') && file_exists(modification(DIR_TEMPLATE . 'jetcache/tab-bots.tpl'))) {
											include(modification(DIR_TEMPLATE . 'jetcache/tab-bots.tpl'));
										} else {
											include(DIR_TEMPLATE . 'jetcache/tab-bots.tpl');
										}
										?>
									</div>


									<div id="tab-options">
										<div id="tabs-options" class="htabs">
											<a href="#tab-options-options" class="jc-tab-2"><?php echo $language->get('tab_options'); ?></a>
											<a href="#tab-options-install" class="jc-tab-2" id="sc_install"><?php echo $language->get('entry_install_update'); ?></a>
											<a href="#tab-options-logs" class="jc-tab-2"><?php echo $language->get('tab_logs'); ?></a>
											<a href="#tab-options-clear" class="jc-tab-2"><?php echo $language->get('tab_clear'); ?></a>
											<a href="#tab-options-service" class="jc-tab-2"><?php echo $language->get('tab_service'); ?></a>
											<a href="#tab-options-access" class="jc-tab-2"><?php echo $language->get('tab_access'); ?></a>
										</div>
										<div id="tab-options-options">
											<div id="mytabs_cache">
												<div class="tabcontent" id="list_default">
													<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

														<tr>
															<td>
																<?php echo $language->get('entry_jetcache_menu_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
																<div class="jetcache-table-help">
																	<?php echo $language->get('entry_jetcache_menu_order');  ?>
																	<div class="input-group">
																		<input class="form-control template" size="11" type="text" name="asc_jetcache_settings[jetcache_menu_order]" value="<?php if (isset($asc_jetcache_settings['jetcache_menu_order'])) echo $asc_jetcache_settings['jetcache_menu_order']; ?>" size="20" />
																	</div>
																</div>
															</td>
															<td>




																<div class="input-group">


																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[jetcache_menu_status]">
																			<?php if (isset($asc_jetcache_settings['jetcache_menu_status']) && $asc_jetcache_settings['jetcache_menu_status']) { ?>
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
															<td>
																<?php echo $language->get('entry_jetcache_info_status'); ?>
																<div class="jetcache-table-help">
																	<?php echo $language->get('entry_jetcache_info_demo_status'); ?>
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[jetcache_info_demo_status]">
																			<?php if (isset($asc_jetcache_settings['jetcache_info_demo_status']) && $asc_jetcache_settings['jetcache_info_demo_status']) { ?>
																				<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																				<option value="0"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="jetcache-table-help">
																	<?php echo $language->get('entry_jetcache_index_status'); ?>
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[jetcache_index_status]">
																			<?php if (isset($asc_jetcache_settings['jetcache_index_status']) && $asc_jetcache_settings['jetcache_index_status']) { ?>
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
															<td>
																<div class="input-group">
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[jetcache_info_status]">
																			<?php if (isset($asc_jetcache_settings['jetcache_info_status']) && $asc_jetcache_settings['jetcache_info_status']) { ?>
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
															<td><?php echo $language->get('entry_cache_mobile_detect'); ?></td>
															<td>
																<div class="input-group">
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[cache_mobile_detect]">
																			<?php if (isset($asc_jetcache_settings['cache_mobile_detect']) && $asc_jetcache_settings['cache_mobile_detect']) { ?>
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

														<?php if (SC_VERSION > 22) { ?>
															<tr>
																<td><?php echo $language->get('entry_device_detect'); ?></td>
																<td>
																	<div class="input-group">
																		<div class="jc-select-toggle">
																			<select class="form-control jc-select-switch" name="asc_jetcache_settings[device_detect]">
																				<?php if (isset($asc_jetcache_settings['device_detect']) && $asc_jetcache_settings['device_detect']) { ?>
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
														<?php } ?>
														<tr class="jetcache-back jetcache-pro-settings">
															<td><?php echo $language->get('entry_no_cache'); ?></td>
															<td>
																<div class="input-group">
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[no_cache]">
																			<?php if (isset($asc_jetcache_settings['no_cache']) && $asc_jetcache_settings['no_cache']) { ?>
																				<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																				<option value="0"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>
																	</div>
															</td>
														</tr>

														<tr class="jetcache-back jetcache-pro-settings">
															<td>
																<?php echo $language->get('entry_seocms_jetcache_gzip_level'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
																<div class="jetcache-table-help">
																	<?php echo $language->get('entry_seocms_jetcache_gzip_level_help');  ?>
																</div>

															</td>
															<td>
																<div class="input-group">
																	<select class="form-control" name="asc_jetcache_settings[seocms_jetcache_gzip_level]">
																		<?php foreach ($gzip_level as $value => $name) { ?>
																			<option value="<?php echo $value; ?>" <?php if (isset($asc_jetcache_settings['seocms_jetcache_gzip_level']) && $asc_jetcache_settings['seocms_jetcache_gzip_level'] == $value) { ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
																		<?php } ?>
																	</select>
																</div>
															</td>
														</tr>
														<tr>
															<td style="width: 220px;"><?php echo $language->get('entry_jetcache_ocmod_refresh'); ?></td>
															<td>
																<div style="margin-bottom: 5px;">
																	<a href="#" id="jetcache_ocmod_refresh" onclick="
															$.ajax({
															url: '<?php echo $url_ocmod_refresh; ?>',
															dataType: 'html',
															beforeSend: function()
															{
																$('#div_ocmod_refresh').html('<?php echo $language->get('text_loading_main'); ?>');
															},
															success: function(content) {
															if (content) {
																$('#div_ocmod_refresh').html('<span style=\'color:green\'><?php echo $language->get('text_ocmod_refresh_success'); ?><\/span>');
															}
															},
															error: function(content) {
																$('#div_ocmod_refresh').html('<span style=\'color:red\'><?php echo $language->get('text_ocmod_refresh_fail'); ?><\/span>');
															}
															}); return false;" class="markbuttono sc_button" style=""><?php echo $language->get('text_url_ocmod_refresh'); ?></a>
																	<div id="div_ocmod_refresh"></div>
																</div>
															</td>
														</tr>
														<tr>
															<td style="width: 220px;"><?php echo $language->get('entry_jetcache_cache_remove'); ?></td>
															<td>
																<div style="margin-bottom: 5px;">
																	<a href="#" onclick="js_cache_remove(); return false;" class="jc_remove_top markbuttono sc_button buttons-top"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo $language->get('text_url_cache_remove'); ?></a>

																	<div id="div_cache_remove"></div>
																</div>
															</td>
														</tr>

														<tr class="jetcache-back jetcache-pro-settings">
															<td style="width: 220px;"><?php echo $language->get('entry_jetcache_builcache_gen'); ?></td>
															<td>
																<div class="">
																	<a id="buildcache_start" class="markbuttono sc_button"><i class="icon-hdd"></i> <?php echo $language->get('button_buildcache'); ?></a>
																	<a id="buildcache_abort" class="markbuttono sc_button"><i class="icon-remove"></i> <?php echo $language->get('button_buildcache_abort'); ?></a>
																</div>
																<div>
																	<table id="table_buildcache">
																		<tr>
																			<td class="checkboxHeader">
																				<input class="form-control" id="buildcache_with_products" name="asc_jetcache_settings[buildcache_with_products]" type="checkbox">
																			</td>
																			<td class="textHeader">
																				<label for="buildcache_with_products"><?php echo $language->get('label_buildcache_with_products'); ?></label>
																				&nbsp;&nbsp;<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('label_buildcache_with_products_title_info'); ?>" data-content="<?php echo $language->get('label_buildcache_with_products_data_content'); ?>" data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-red"></i></a>
																			</td>
																		</tr>
																		<tr>
																			<td class="checkboxHeader">
																				<input class="form-control" id="buildcache_with_lang" name="asc_jetcache_settings[buildcache_with_lang]" type="checkbox">
																			</td>
																			<td class="textHeader">
																				<label for="buildcache_with_lang"><?php echo $language->get('label_buildcache_with_lang'); ?></label>
																				&nbsp;&nbsp;<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('label_buildcache_with_lang_title_info'); ?>" data-content="<?php echo $language->get('label_buildcache_with_lang_data_content'); ?>" data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-red"></i></a>
																			</td>
																		</tr>
																	</table>
																	<style>
																		#table_buildcache label {
																			font-weight: normal;
																			font-size: 13px;
																			vertical-align: center;
																			padding-bottom: 0px;
																			margin-bottom: 0px;
																		}
																	</style>

																	<script>
																		$(document).ready(function() {
																			$('[data-toggle="popover"]').popover({
																				placement: 'right',
																				delay: {
																					show: 20,
																					hide: 500
																				},
																				trigger: 'hover'
																			});
																		});
																	</script>

																</div>
																<div style="width: 100%;">
																	<div id="buildcache_progress" class="progress" style="width: 200px; margin-top: 10px; <?php if (SC_VERSION < 20) { ?> height: 20px; background-color: #FFF; z-index: 10000;<?php } ?>">
																		<div id="buildcache_progressbar" class="progress-bar" style="width: 0%; <?php if (SC_VERSION < 20) { ?> height: 20px; background-color: #16A9DE; z-index: 10000;<?php } ?>"></div>
																	</div>
																	<div id="buildcache_details" style="width: 200px; margin-top: 10px;"></div>
																</div>
																<script type="text/javascript">
																	$(document).ready(function() {
																		$('#buildcache_details').hide();
																		$('#buildcache_progress').hide();
																		jetcache.buildcache.setConfig({
																			array_url: '../index.php?route=jetcache/tool/get_buildcache_array&<?php echo $token_name; ?>=<?php echo $token; ?>',
																			message_aborted: '<?php echo $language->get('message_buildcache_aborted'); ?>',
																			message_complete: '<?php echo $language->get('message_buildcache_complete'); ?>',
																			message_no_access: '<?php echo $language->get('text_apply_no_access'); ?>',
																			message_processing: '<?php echo $language->get('message_buildcache_processing'); ?>',
																			message_processing_complete: '<?php echo $language->get('message_buildcache_processing_complete'); ?>',
																			progressbar_selector: '#buildcache_progressbar',
																			progress_selector: '#buildcache_progress',
																			output_selector: '#buildcache_details',
																			to_header: 'JETCACHE_BUILDCACHE'
																		});

																		$('#buildcache_start').click(function() {
																			jetcache.buildcache.setConfig({
																				buildcache_with_products: $('#buildcache_with_products').is(':checked'),
																				buildcache_with_lang: $('#buildcache_with_lang').is(':checked')
																			});

																			$('#buildcache_details').show();
																			$('#buildcache_progress').show();
																			jetcache.buildcache.start();
																		});

																		$('#buildcache_abort').click(function() {
																			jetcache.buildcache.abort();
																			//$('#buildcache_details').hide();
																			$('#buildcache_progress').hide();
																		});
																	});
																</script>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</div>
										<div id="tab-options-clear">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

												<tr>
													<td>
														<?php echo $language->get('entry_cache_remove_status'); ?> <span class="jetcache-table-help-href">?</span>
														<div class="jetcache-table-help">
															<?php echo $language->get('entry_cache_remove_status_help'); ?>
														</div>
													</td>
													<td>
														<div class="sc-flex-block">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="input-group">
																		<div class="jc-select-toggle">
																			<select class="form-control jc-select-switch" name="asc_jetcache_settings[cache_remove_status]">
																				<?php if (isset($asc_jetcache_settings['cache_remove_status']) && $asc_jetcache_settings['cache_remove_status']) { ?>
																					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																					<option value="0"><?php echo $text_disabled; ?></option>
																				<?php } else { ?>
																					<option value="1"><?php echo $text_enabled; ?></option>
																					<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																				<?php } ?>
																			</select>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</td>
												</tr>


												<tr>
													<td>
														<?php echo $language->get('entry_add_category'); ?> <span class="jetcache-table-help-href">?</span>
														<div class="jetcache-table-help">
															<?php echo $language->get('entry_add_category_help'); ?>
														</div>
													</td>
													<td>
														<div class="sc-flex-block">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="input-group">

																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_category]">
																			<?php if (isset($asc_jetcache_settings['add_category']) && $asc_jetcache_settings['add_category']) { ?>
																				<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																				<option value="0"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>

																	</div>
																</div>
																<div class="sc-flex-container-left">
																	<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('label_add_category'); ?>" data-content="<?php echo $language->get('label_add_category_content'); ?>" data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle"></i></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<?php echo $language->get('entry_add_product'); ?> <span class="jetcache-table-help-href">?</span>
														<div class="jetcache-table-help">
															<?php echo $language->get('entry_add_product_help'); ?>
														</div>
													</td>
													<td>
														<div class="sc-flex-block">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="input-group">

																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_product]" id="add_product">
																			<?php if (isset($asc_jetcache_settings['add_product']) && $asc_jetcache_settings['add_product']) { ?>
																				<option value="1" selected="selected" data-chained="0 1"><?php echo $text_enabled; ?></option>
																				<option value="0" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1" data-chained="0 1"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>

																	</div>
																</div>
																<div class="sc-flex-container-left">
																	<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('label_add_product'); ?>" data-content="<?php echo $language->get('label_add_product_content'); ?>" data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle"></i></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<?php echo $language->get('entry_edit_product'); ?> <span class="jetcache-table-help-href">?</span>
														<div class="jetcache-table-help">
															<?php echo $language->get('entry_edit_product_help'); ?>
														</div>
													</td>
													<td>
														<div class="sc-flex-block">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="input-group">

																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[edit_product]" id="edit_product">
																			<?php if (isset($asc_jetcache_settings['edit_product']) && $asc_jetcache_settings['edit_product']) { ?>
																				<option value="1" selected="selected" data-chained="0 1"><?php echo $text_enabled; ?></option>
																				<option value="0" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1" data-chained="0"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>

																	</div>
																</div>
																<div class="sc-flex-container-left">
																	<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('label_edit_product'); ?>" data-content="<?php echo $language->get('label_edit_product_content'); ?>" data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle" id="edit_product-icon"></i></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<?php echo $language->get('entry_edit_product_id'); ?> <span class="jetcache-table-help-href">?</span>
														<div class="jetcache-table-help">
															<?php echo $language->get('entry_edit_product_id_help'); ?>
														</div>
													</td>
													<td>
														<div class="sc-flex-block">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="input-group">

																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[edit_product_id]" id="edit_product_id">
																			<?php if (isset($asc_jetcache_settings['edit_product_id']) && $asc_jetcache_settings['edit_product_id']) { ?>
																				<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																				<option value="0"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>

																	</div>
																</div>
																<div class="sc-flex-container-left">
																	<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('label_edit_product_id'); ?>" data-content="<?php echo $language->get('label_edit_product_id_content'); ?>" data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-red" id="edit_product_id-icon"></i></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_cache_auto_clear');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[cache_auto_clear]" value="<?php if (isset($asc_jetcache_settings['cache_auto_clear'])) echo $asc_jetcache_settings['cache_auto_clear']; ?>" size="20" />
														</div>
													</td>
												</tr>

												<tr>
													<td class="left"><?php echo $language->get('entry_cart_interval');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[cart_interval]" value="<?php if (isset($asc_jetcache_settings['cart_interval'])) echo $asc_jetcache_settings['cart_interval']; ?>" size="20" />
														</div>
													</td>
												</tr>

												<tr>
													<td class="left"><?php echo $language->get('entry_cache_max_hache_folders_level');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="11" type="text" name="asc_jetcache_settings[cache_max_hache_folders_level]" value="<?php if (isset($asc_jetcache_settings['cache_max_hache_folders_level'])) echo $asc_jetcache_settings['cache_max_hache_folders_level']; ?>" size="4" />
														</div>
													</td>
												</tr>

												<tr>
													<td class="left"><?php echo $language->get('entry_cache_expire');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="11" type="text" name="asc_jetcache_settings[cache_expire]" value="<?php if (isset($asc_jetcache_settings['cache_expire'])) echo $asc_jetcache_settings['cache_expire']; ?>" size="20" />
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_cache_max_files');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="11" type="text" name="asc_jetcache_settings[cache_max_files]" value="<?php if (isset($asc_jetcache_settings['cache_max_files'])) echo $asc_jetcache_settings['cache_max_files']; ?>" size="20" />
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_cache_maxfile_length');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="11" type="text" name="asc_jetcache_settings[cache_maxfile_length]" value="<?php if (isset($asc_jetcache_settings['cache_maxfile_length'])) echo $asc_jetcache_settings['cache_maxfile_length']; ?>" size="20" />
														</div>
													</td>
												</tr>



												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_ex_key'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="odd">
													<td class="left">
														<?php echo $language->get('text_ex_key'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[ex_key]" rows="5" style="width: 100%;"><?php if (isset($asc_jetcache_settings['ex_key'])) {
																																									echo $asc_jetcache_settings['ex_key'];
																																								} else {
																																									echo '';
																																								} ?></textarea>
														</div>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help left"></td>
													<td></td>
												</tr>



											</table>
										</div>


										<div id="tab-options-service">

										<?php
if (function_exists('modification') && file_exists(modification(DIR_TEMPLATE . 'jetcache/tab-service.tpl'))) {
	include(modification(DIR_TEMPLATE . 'jetcache/tab-service.tpl'));
} else {
	include(DIR_TEMPLATE . 'jetcache/tab-service.tpl');
}
?>

</div>




										<div id="tab-options-install">
											<div style="margin-bottom: 5px;">
												<a href="#" id="sc_install_common" onclick="
										$.ajax({
										url: '<?php echo $url_create; ?>',
										dataType: 'html',
										beforeSend: function()
										{
											$('#install_ocmod').html('<?php echo $language->get('text_loading_main'); ?>');
										},
										success: function(json) {

											JetCacheSaveEvent = new Event('myJetCacheSaveEvent');
											document.addEventListener('myJetCacheSaveEvent', delayer);

											$('#install_ocmod').html(json);
											
										},
										error: function(json) {
											$('#install_ocmod').html('error');
										}
										}); return false;" class="markbuttono widthbutton sc_button asc_blinking" style=""><?php echo $url_create_text; ?></a>
											</div>
											<div id="install_ocmod" style="color: green;"></div>
											<div id="div_ocmod_refresh_install"></div>
										</div>



										<div id="tab-options-access">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
												<tr>
													<td><?php
														echo $language->get('entry_store');
														?></td>
													<td>
														<div class="scrollbox">
															<?php $class = 'odd'; ?>

															<?php foreach ($stores as $store) { ?>
																<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
																<div class="<?php echo $class; ?>">
																	<?php if (isset($asc_jetcache_settings['store']) && in_array($store['store_id'], $asc_jetcache_settings['store'])) { ?>
																		<input type="checkbox" name="asc_jetcache_settings[store][]" value="<?php echo $store['store_id']; ?>" checked="checked" />
																		<?php echo $store['name']; ?>
																	<?php } else { ?>
																		<input type="checkbox" name="asc_jetcache_settings[store][]" value="<?php echo $store['store_id']; ?>" <?php if (!isset($asc_jetcache_settings['store']) && $store['store_id'] == 0) { ?> checked="checked" <?php } ?> />
																		<?php echo $store['name']; ?>
																	<?php } ?>
																</div>
															<?php } ?>
														</div>
														<a onclick="$(this).parent().find(':checkbox').prop('checked', true);" class="nohref"><?php echo $language->get('text_select_all'); ?></a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);" class="nohref"><?php echo $language->get('text_unselect_all'); ?></a>
													</td>

												</tr>


											</table>


										</div>



										<div id="tab-options-logs">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">


												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">






														<div class="jetcache-back jetcache-text-center">
															<span><?php echo $language->get('entry_logs_attention'); ?><a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('entry_logs_attention'); ?>" data-content='<?php echo $language->get('text_logs_attention'); ?>' data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-red" id="id-query-log-attention-icon"></i></a></span>
														</div>




													</td>

												<tr colspan="2" class=" jetcache-text-center">
													<td colspan="2" class=" jetcache-text-center jetcache-red">
														<?php echo $language->get('text_logs_attention'); ?>

													</td>
												</tr>




												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_query_log_settings'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												<tr colspan="2" class="jetcache-back jetcache-text-center jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center"><?php echo $language->get('entry_query_log_settings_help'); ?></td>
												</tr>

												<tr>
													<td><?php echo $language->get('entry_query_log_status'); ?></td>
													<td>
														<div class="input-group">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[query_log_status]" id="id-query-log-status">
																			<?php if (isset($asc_jetcache_settings['query_log_status']) && $asc_jetcache_settings['query_log_status']) { ?>
																				<option value="1" selected="selected" data-chained="1"><?php echo $text_enabled; ?></option>
																				<option value="0" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1" data-chained="1"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="sc-flex-container-left">
																	&nbsp;&nbsp;<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('entry_query_log_status_title'); ?>" data-content='<?php echo $language->get('entry_query_log_status_content'); ?>' data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-orange" id="id-query-log-status-icon"></i></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_query_log_maxtime');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="6" type="text" name="asc_jetcache_settings[query_log_maxtime]" value="<?php if (isset($asc_jetcache_settings['query_log_maxtime'])) echo $asc_jetcache_settings['query_log_maxtime']; ?>">
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_query_log_file');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="30" type="text" name="asc_jetcache_settings[query_log_file]" value="<?php if (isset($asc_jetcache_settings['query_log_file'])) echo $asc_jetcache_settings['query_log_file']; ?>">
														</div>
														<div class="sc-flex-container">
															<div class="sc-flex-container-left">
																<div style="margin-top: 4px;">
																	<a href="#" onclick="
															$.ajax({
															url: '<?php echo $url_query_file_view; ?>',
															dataType: 'html',
															beforeSend: function()
															{
															$('#id_query_file_view').html('<?php echo $language->get('text_loading_main'); ?>');
															},
															success: function(html) {
															$('#id_query_file_view').html('');
															$('.modal-body').html(html);
															var if_offset = $('#id-modal-file-view .modal-content').offset();
															var if_height = $(window).height() - if_offset.top - 200;
															$('#id-modal-file-view .modal-body').css('min-height', if_height + 'px');
															$('#id-modal-file-view').modal({show:true});
															},
															error: function(json) {
															$('#id_query_file_view').html('error');
															}
															}); return false;" class="markbutton nohref" style=""><?php echo $entry_log_file_view; ?></a>
																</div>
															</div>
															<script>
																function id_query_hide() {
																	$('#id_query_file_unlink').html('');
																}
															</script>
															<div class="sc-flex-container-left">
																<div style="margin-left: 8px;margin-top: 4px;">
																	<a href="#" onclick="
															function id_query_hide() {
															$('#id_query_file_unlink').html('');
															}
															$.ajax({
															url: '<?php echo $url_query_file_unlink; ?>',
															dataType: 'html',
															beforeSend: function()
															{
															$('#id_query_file_unlink').html('<?php echo $language->get('text_loading_main'); ?>');
															},
															success: function(json) {
															setTimeout(id_query_hide, 2000);
															$('#id_query_file_unlink').html(json);
															},
															error: function(json) {
															$('#id_query_file_unlink').html('error');
															}
															}); return false;" class="mbutton button_purple sc_button" style=""><?php echo $entry_log_file_unlink; ?></a>
																</div>
															</div>
														</div>
														<div id="id_query_file_view"></div>
														<div id="id_query_file_unlink"></div>
													</td>
												</tr>


												<!-- ******************** Log controller ******************** -->

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_cont_log_settings'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr colspan="2" class="jetcache-back jetcache-text-center jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center"><?php echo $language->get('entry_cont_log_settings_help'); ?></td>
												</tr>

												<tr>
													<td><?php echo $language->get('entry_cont_log_status'); ?></td>
													<td>
														<div class="input-group">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_log_status]" id="id-cont-log-status">
																			<?php if (isset($asc_jetcache_settings['cont_log_status']) && $asc_jetcache_settings['cont_log_status']) { ?>
																				<option value="1" selected="selected" data-chained="1"><?php echo $text_enabled; ?></option>
																				<option value="0" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1" data-chained="1"><?php echo $text_enabled; ?></option>
																				<option value="0" selected="selected" data-chained="0 1"><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="sc-flex-container-left">
																	&nbsp;&nbsp;<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('entry_cont_log_status_title'); ?>" data-content='<?php echo $language->get('entry_cont_log_status_content'); ?>' data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-green" id="id-cont-log-status-icon"></i></a>
																</div>
															</div>
														</div>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td><?php echo $language->get('entry_cont_log_crop'); ?></td>
													<td>
														<div class="input-group">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="jc-select-toggle">
																		<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_log_crop]" id="id-cont-log-status">
																			<?php if (isset($asc_jetcache_settings['cont_log_crop']) && $asc_jetcache_settings['cont_log_crop']) { ?>
																				<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																				<option value="0"><?php echo $text_disabled; ?></option>
																			<?php } else { ?>
																				<option value="1" <?php if (!isset($asc_jetcache_settings['cont_log_crop'])) { ?>selected="selected" <?php } ?>><?php echo $text_enabled; ?></option>
																				<option value="0" <?php if (isset($asc_jetcache_settings['cont_log_crop']) && !$asc_jetcache_settings['cont_log_crop']) { ?>selected="selected" <?php } ?>><?php echo $text_disabled; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
													</td>
												</tr>



												<tr>
													<td class="left"><?php echo $language->get('entry_cont_log_maxtime');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="6" type="text" name="asc_jetcache_settings[cont_log_maxtime]" value="<?php if (isset($asc_jetcache_settings['cont_log_maxtime'])) echo $asc_jetcache_settings['cont_log_maxtime']; ?>">
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_cont_log_file');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="30" type="text" name="asc_jetcache_settings[cont_log_file]" value="<?php if (isset($asc_jetcache_settings['cont_log_file'])) echo $asc_jetcache_settings['cont_log_file']; ?>">
														</div>
														<div class="sc-flex-container">
															<div class="sc-flex-container-left">
																<div style="margin-top: 4px;">
																	<a href="#" onclick="
															$.ajax({
															url: '<?php echo $url_cont_file_view; ?>',
															dataType: 'html',
															beforeSend: function()
															{
															$('#id_cont_file_view').html('<?php echo $language->get('text_loading_main'); ?>');
															},
															success: function(html) {
															$('#id_cont_file_view').html('');
															$('.modal-body').html(html);
															var if_offset = $('#id-modal-file-view .modal-content').offset();
															var if_height = $(window).height() - if_offset.top - 200;
															$('#id-modal-file-view .modal-body').css('min-height', if_height + 'px');
															$('#id-modal-file-view').modal({show:true});
															},
															error: function(json) {
															$('#id_cont_file_view').html('error');
															}
															}); return false;" class="markbutton nohref" style=""><?php echo $entry_log_file_view; ?></a>
																</div>
															</div>
															<script>
																function id_cont_hide() {
																	$('#id_cont_file_unlink').html('');
																}
															</script>
															<div class="sc-flex-container-left">
																<div style="margin-left: 8px;margin-top: 4px;">
																	<a href="#" onclick="
															function id_query_hide() {
															$('#id_cont_file_unlink').html('');
															}
															$.ajax({
															url: '<?php echo $url_cont_file_unlink; ?>',
															dataType: 'html',
															beforeSend: function()
															{
															$('#id_cont_file_unlink').html('<?php echo $language->get('text_loading_main'); ?>');
															},
															success: function(json) {
															setTimeout(id_cont_hide, 2000);
															$('#id_cont_file_unlink').html(json);
															},
															error: function(json) {
															$('#id_cont_file_unlink').html('error');
															}
															}); return false;" class="mbutton button_purple sc_button" style=""><?php echo $entry_log_file_unlink; ?></a>
																</div>
															</div>
														</div>
														<div id="id_cont_file_view"></div>
														<div id="id_cont_file_unlink"></div>
													</td>
												</tr>
												<!-- ******************************************************************************************* -->
												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_session_log_settings'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr colspan="2" class="jetcache-back jetcache-text-center jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center"><?php echo $language->get('entry_session_log_settings_help'); ?></td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td><?php echo $language->get('entry_session_log'); ?></td>
													<td>
														<div class="input-group">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[session_log_status]">
																	<?php if (isset($asc_jetcache_settings['session_log_status']) && $asc_jetcache_settings['session_log_status']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td class="left"><?php echo $language->get('entry_session_log_file');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control template" size="30" type="text" name="asc_jetcache_settings[session_log_file]" value="<?php if (isset($asc_jetcache_settings['session_log_file'])) echo $asc_jetcache_settings['session_log_file']; ?>">
														</div>
														<div class="sc-flex-container">
															<div class="sc-flex-container-left">
																<div style="margin-top: 4px;">
																	<a href="#" onclick="
															$.ajax({
															url: '<?php echo $url_session_file_view; ?>',
															dataType: 'html',
															beforeSend: function()
															{
															$('#id_session_file_view').html('<?php echo $language->get('text_loading_main'); ?>');
															},
															success: function(html) {
															$('#id_session_file_view').html('');
															$('.modal-body').html(html);
															var if_offset = $('#id-modal-file-view .modal-content').offset();
															var if_height = $(window).height() - if_offset.top - 200;
															$('#id-modal-file-view .modal-body').css('min-height', if_height + 'px');
															$('#id-modal-file-view').modal({show:true});
															},
															error: function(json) {
															$('#id_session_file_view').html('error');
															}
															}); return false;" class="markbutton nohref" style=""><?php echo $entry_log_file_view; ?></a>
																</div>
															</div>
															<div class="sc-flex-container-left">
																<script>
																	function id_session_hide() {
																		$('#id_session_file_unlink').html('');
																	}
																</script>
																<div style="margin-left: 8px; margin-top: 4px;">
																	<a href="#" onclick="
															$.ajax({
															url: '<?php echo $url_session_file_unlink; ?>',
															dataType: 'html',
															beforeSend: function()
															{
															$('#id_session_file_unlink').html('<?php echo $language->get('text_loading_main'); ?>');
															},
															success: function(json) {
															$('#id_session_file_unlink').html(json);
															setTimeout(id_session_hide, 2000);
															},
															error: function(json) {
															$('#id_session_file_unlink').html('error');
															}
															}); return false;" class="mbutton button_purple sc_button" style=""><?php echo $entry_log_file_unlink; ?></a>
																</div>
															</div>
														</div>
														<div id="id_session_file_view"></div>
														<div id="id_session_file_unlink"></div>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_debug'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr colspan="2" class="jetcache-back jetcache-text-center jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center"><?php echo $language->get('entry_debug'); ?></td>
												</tr>
												<tr class="jetcache-back jetcache-pro-settings">
													<td><?php echo $language->get('entry_debug'); ?></td>
													<td>
														<div class="input-group">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[debug]">
																	<?php if (isset($asc_jetcache_settings['debug']) && $asc_jetcache_settings['debug']) { ?>
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


											</table>
										</div>

									</div>
									<!-- **************************************************** -->
									<div id="tab-exceptions">
										<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_ex_routes'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr>
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_ex_routes_help'); ?>
												</td>
												<td>
													<div style="float: left;">
														<table id="ex_routes" class="list jetcache-table-add">
															<thead>
																<tr>
																	<td class="left"><?php echo $language->get('entry_id'); ?></td>
																	<td><?php echo $language->get('entry_ex_route'); ?></td>
																	<td><?php echo $language->get('entry_status'); ?></td>
																	<td></td>
																</tr>
															</thead>
															<?php if (isset($asc_jetcache_settings['ex_route']) && !empty($asc_jetcache_settings['ex_route'])) { ?>
																<?php foreach ($asc_jetcache_settings['ex_route'] as $ex_route_id => $ex_route) { ?>
																	<?php $ex_route_row = $ex_route_id; ?>
																	<tbody id="ex_route_row<?php echo $ex_route_row; ?>">
																		<tr>
																			<td class="left">
																				<input type="text" name="asc_jetcache_settings[ex_route][<?php echo $ex_route_id; ?>][type_id]" value="<?php if (isset($ex_route['type_id'])) echo $ex_route['type_id']; ?>" size="3">
																			</td>
																			<td class="right">
																				<div style="margin-bottom: 3px;">
																					<input type="text" name="asc_jetcache_settings[ex_route][<?php echo $ex_route_id; ?>][route]" value="<?php if (isset($ex_route['route'])) echo $ex_route['route']; ?>" style="width: 300px;">
																				</div>
																			</td>
																			<td class="right">
																				<div class="input-group jetcache-text-center">
																					<div class="jc-select-toggle">
																						<select class="form-control jc-select-switch" name="asc_jetcache_settings[ex_route][<?php echo $ex_route_id; ?>][status]">
																							<?php if (isset($ex_route['status']) && $ex_route['status']) { ?>
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
																			<td class="left"><a onclick="$('#ex_route_row<?php echo $ex_route_row; ?>').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>
																		</tr>
																	</tbody>
																<?php } ?>
															<?php } ?>
															<tfoot>
																<tr>
																	<td colspan="3"></td>
																	<td class="left"><a onclick="addExRoute();" class="markbutton nohref"><?php echo $language->get('entry_add_rule'); ?></a></td>
																</tr>
															</tfoot>
														</table>
													</div>
												</td>
											</tr>
											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_ex_pages'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr>
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_ex_pages_help'); ?>
												</td>
												<td>
													<div class="input-group"><span class="input-group-addon"></span>
														<textarea class="form-control" name="asc_jetcache_settings[ex_uri]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['ex_uri'])) {
																																					echo $asc_jetcache_settings['ex_uri'];
																																				} else {
																																					echo '';
																																				} ?></textarea>
													</div>
												</td>
											</tr>

											<tr class="jetcache-back ex_session">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_ex_session'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="odd ex_session">
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_ex_session_help'); ?>
												</td>
												<td>
													<div class="input-group"><span class="input-group-addon"></span>
														<textarea class="form-control" name="asc_jetcache_settings[ex_session]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['ex_session'])) {
																																						echo $asc_jetcache_settings['ex_session'];
																																					} else {
																																						echo '';
																																					} ?></textarea>
													</div>
												</td>
											</tr>



											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_ex_session_black_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="odd jetcache-back jetcache-pro-settings">
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_ex_session_black_status_help'); ?>
												</td>
												<td>
													<div class="input-group"><span class="input-group-addon"></span>

														<select id="ex_session_black_status" class="form-control jc-select-switch" name="asc_jetcache_settings[ex_session_black_status]">
															<?php if (isset($asc_jetcache_settings['ex_session_black_status']) && $asc_jetcache_settings['ex_session_black_status']) { ?>
																<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																<option value="0"><?php echo $text_disabled; ?></option>
															<?php } else { ?>
																<option value="1"><?php echo $text_enabled; ?></option>
																<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
															<?php } ?>
														</select>

													</div>
												</td>
											</tr>


											<script>
												function ex_session_black_status_change() {
													if ($('#ex_session_black_status').find('option:selected').val() == 1) {
														$('.ex_session').hide(300);
														$('.ex_session_black').show(300);
													} else {
														$('.ex_session').show(300);
														$('.ex_session_black').hide(300);
													}
												}

												$('#ex_session_black_status')
													.change(function() {
														ex_session_black_status_change();
													});

												ex_session_black_status_change();
											</script>



											<tr class="jetcache-back jetcache-pro-settings ex_session_black">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_ex_session_black'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="odd ex_session_black jetcache-back jetcache-pro-settings">
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_ex_session_black_help'); ?>
												</td>
												<td>
													<div class="input-group"><span class="input-group-addon"></span>
														<textarea class="form-control" name="asc_jetcache_settings[ex_session_black]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['ex_session_black'])) {
																																								echo $asc_jetcache_settings['ex_session_black'];
																																							} else {
																																								echo '';
																																							} ?></textarea>
													</div>
												</td>
											</tr>


											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_ex_cookie'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="odd">
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_ex_cookie_help'); ?>
												</td>
												<td>
													<div class="input-group"><span class="input-group-addon"></span>
														<textarea class="form-control" name="asc_jetcache_settings[ex_cookie_black]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['ex_cookie_black'])) {
																																							echo $asc_jetcache_settings['ex_cookie_black'];
																																						} else {
																																							echo '';
																																						} ?></textarea>
													</div>
												</td>
											</tr>


											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_ex_get'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="odd">
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_ex_get_help'); ?>
												</td>
												<td>
													<div class="input-group"><span class="input-group-addon"></span>
														<textarea class="form-control" name="asc_jetcache_settings[ex_get]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['ex_get'])) {
																																					echo $asc_jetcache_settings['ex_get'];
																																				} else {
																																					echo '';
																																				} ?></textarea>
													</div>
												</td>
											</tr>






										</table>
									</div>
									<!-- **************************************************** -->
									<div id="tab-pages">
										<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr>
												<td class="jetcache-table-help"><?php echo $language->get('entry_pages_status_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[pages_status]">
																<?php if (isset($asc_jetcache_settings['pages_status']) && $asc_jetcache_settings['pages_status']) { ?>
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

											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_db_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_pages_db_status_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[pages_db_status]">
																<?php if (isset($asc_jetcache_settings['pages_db_status']) && $asc_jetcache_settings['pages_db_status']) { ?>
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

											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_pages_forsage'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_pages_forsage_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[pages_forsage]">
																<?php if (isset($asc_jetcache_settings['pages_forsage']) && $asc_jetcache_settings['pages_forsage']) { ?>
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


											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_pages_fast'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_pages_fast_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[pages_fast]">
																<?php if (isset($asc_jetcache_settings['pages_fast']) && $asc_jetcache_settings['pages_fast']) { ?>
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



											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_lastmod_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_lastmod_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="sc-flex-container">
															<div class="sc-flex-container-left">
																<div class="jc-select-toggle">
																	<select class="form-control jc-select-switch" name="asc_jetcache_settings[lastmod_status]">
																		<?php if (isset($asc_jetcache_settings['lastmod_status']) && $asc_jetcache_settings['lastmod_status']) { ?>
																			<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																			<option value="0"><?php echo $text_disabled; ?></option>
																		<?php } else { ?>
																			<option value="1"><?php echo $text_enabled; ?></option>
																			<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																		<?php } ?>
																	</select>
																</div>
															</div>
															<div class="sc-flex-container-left popover-lastmod">
																<style>
																	.popover-lastmod .popover {
																		max-width: 600px;
																		width: 500px;
																	}
																</style>


																&nbsp;&nbsp;<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title="<?php echo $language->get('entry_lastmod_status'); ?>" data-content='<?php echo $language->get('entry_lastmod_help'); ?>' data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-green"></i></a>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_cachecontrol_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_cachecontrol_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[cachecontrol_status]">
																<?php if (isset($asc_jetcache_settings['cachecontrol_status']) && $asc_jetcache_settings['cachecontrol_status']) { ?>
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
											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_expires_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_expires_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[expires_status]">
																<?php if (isset($asc_jetcache_settings['expires_status']) && $asc_jetcache_settings['expires_status']) { ?>
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
												<td class="jetcache-table-help left"></td>
												<td></td>
											</tr>
										</table>
									</div>
									<!-- **************************************************** -->
									<div id="tab-cont">

										<div id="tabs-controllers" class="htabs">
											<a href="#tab-cont-options" class="jc-tab-2"><?php echo $language->get('tab_options'); ?></a>
											<?php if (SC_VERSION < 30) { ?>
												<a href="#tab-cont-categories" class="jc-tab-2" id="sc_install"><?php echo $language->get('entry_tab_cont_categories'); ?></a>
											<?php } ?>
											<a href="#tab-cont-ajax" class="jc-tab-2"><?php echo $language->get('entry_tab_cont_ajax'); ?></a>
										</div>

										<div id="tab-cont-options">

											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_status'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_cont_status_help'); ?></td>
													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_status]" id="id-cont-status">
																	<?php if (isset($asc_jetcache_settings['cont_status']) && $asc_jetcache_settings['cont_status']) { ?>
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
												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_db_status'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_cont_db_status_help'); ?></td>
													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_db_status]">
																	<?php if (isset($asc_jetcache_settings['cont_db_status']) && $asc_jetcache_settings['cont_db_status']) { ?>
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
												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_add_conts'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_add_conts_help'); ?>
													</td>
													<td>
														<div style="float: left;">
															<table id="add_conts" class="list jetcache-table-add">
																<thead>
																	<tr>
																		<td class="left"><?php echo $language->get('entry_id'); ?></td>
																		<td><?php echo $language->get('entry_add_cont'); ?></td>
																		<td><?php echo $language->get('entry_no_vars_cont'); ?></td>
																		<td style="text-align: center;"><?php echo $language->get('entry_status'); ?></td>
																		<td style="text-align: center;"><?php echo $language->get('entry_action'); ?></td>
																	</tr>
																</thead>
																<?php if (isset($asc_jetcache_settings['add_cont']) && !empty($asc_jetcache_settings['add_cont'])) { ?>
																	<?php
																	foreach ($asc_jetcache_settings['add_cont'] as $add_cont_id => $add_cont) {
																	?>
																		<?php $add_cont_row = (int)$add_cont_id; ?>
																		<tbody id="add_cont_row<?php echo $add_cont_row; ?>">
																			<tr>
																				<td class="left">
																					<input type="text" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][type_id]" value="<?php if (isset($add_cont['type_id'])) echo $add_cont['type_id']; ?>" size="3">
																				</td>
																				<td class="right">
																					<div style="margin-bottom: 3px;">
																						<input type="text" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][cont]" value="<?php if (isset($add_cont['cont'])) echo $add_cont['cont']; ?>" style="width: 300px;">
																					</div>
																				</td>
																				<td class="right">

																					<div class="input-group jetcache-text-center">
																						<div class="input-group">
																							<textarea class="form-control" style="height: 39px;" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][only_get]" rows="1" cols="9"><?php if (isset($add_cont['only_get'])) {
																																																														echo $add_cont['only_get'];
																																																													} else {
																																																														echo '';
																																																													} ?></textarea>
																						</div>
																					</div>

																					<div class="input-group jetcache-text-center">
																						<div class="jc-select-toggle">
																							<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][no_getpost]">
																								<?php if (isset($add_cont['no_getpost']) && $add_cont['no_getpost']) { ?>
																									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																									<option value="0"><?php echo $text_disabled; ?></option>
																								<?php } else { ?>
																									<option value="1"><?php echo $text_enabled; ?></option>
																									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																								<?php } ?>
																							</select>
																						</div>
																					</div>

																					<div class="input-group jetcache-text-center" style="margin-bottom: 3px;">
																						<div class="jc-select-toggle">
																							<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][no_session]">
																								<?php if (isset($add_cont['no_session']) && $add_cont['no_session']) { ?>
																									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																									<option value="0"><?php echo $text_disabled; ?></option>
																								<?php } else { ?>
																									<option value="1"><?php echo $text_enabled; ?></option>
																									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																								<?php } ?>
																							</select>
																						</div>
																					</div>
																					<div class="input-group jetcache-text-center">
																						<div class="jc-select-toggle">
																							<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][no_url]">
																								<?php if (isset($add_cont['no_url']) && $add_cont['no_url']) { ?>
																									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																									<option value="0"><?php echo $text_disabled; ?></option>
																								<?php } else { ?>
																									<option value="1"><?php echo $text_enabled; ?></option>
																									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																								<?php } ?>
																							</select>
																						</div>
																					</div>
																					<div class="input-group jetcache-text-center">
																						<div class="jc-select-toggle">
																							<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][no_route]">
																								<?php if (isset($add_cont['no_route']) && $add_cont['no_route']) { ?>
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
																				<td class="right">
																					<div class="input-group jetcache-text-center">
																						<div class="jc-select-toggle">
																							<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][<?php echo $add_cont_id; ?>][status]">
																								<?php if (isset($add_cont['status']) && $add_cont['status']) { ?>
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
																				<td class="left"><a onclick="$('#add_cont_row<?php echo $add_cont_row; ?>').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>
																			</tr>
																		</tbody>
																	<?php } ?>
																<?php } ?>
																<tfoot>
																	<tr>
																		<td colspan="4"></td>
																		<td class="left"><a onclick="addAddCont();" class="markbutton nohref"><?php echo $language->get('entry_add_rule'); ?></a></td>
																	</tr>
																</tfoot>
															</table>
														</div>
													</td>
												</tr>


											</table>

										</div>

										<?php if (SC_VERSION < 30) { ?>

											<div id="tab-cont-categories">
												<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

													<tr class="jetcache-back">
														<td colspan="2" class="jetcache-back jetcache-text-center">
															<?php echo $language->get('entry_header_categories_status'); ?> <span class="jetcache-table-help-href">?</span>
														</td>
													</tr>
													<tr>
														<td class="jetcache-table-help"><?php echo $language->get('entry_header_categories_status_help'); ?></td>
														<td class="jetcache-text-center">
															<div class="input-group jetcache-text-center">
																<div class="jc-select-toggle">
																	<select class="form-control jc-select-switch" name="asc_jetcache_settings[header_categories_status]" id="id-header-categories-status">
																		<?php if (isset($asc_jetcache_settings['header_categories_status']) && $asc_jetcache_settings['header_categories_status']) { ?>
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

												</table>

											</div>
										<?php } ?>
										<div id="tab-cont-ajax">

											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_cont_ajax_status'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-text-center">
														<div class="jetcache-table-help"><?php echo $language->get('entry_cont_ajax_status_help'); ?></div>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_ajax_status]" id="id-cont-ajax-status">
																	<?php if (isset($asc_jetcache_settings['cont_ajax_status']) && $asc_jetcache_settings['cont_ajax_status']) { ?>
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

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_cont_ajax_delay'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-text-center">
														<div class="jetcache-table-help"><?php echo $language->get('entry_cont_ajax_delay_help'); ?></div>
														<div class="input-group jetcache-text-center">

															<input class="form-control template" type="text" name="asc_jetcache_settings[cont_ajax_delay]" value="<?php if (isset($asc_jetcache_settings['cont_ajax_delay'])) echo $asc_jetcache_settings['cont_ajax_delay']; ?>" size="20" />

														</div>
													</td>
												</tr>


												<tr class="jetcache-back">

													<td>
														<style>
															.flex-box {
																display: flex;
																align-items: center;
																align-content: stretch;
																justify-content: space-between;
															}

															.flex-box>div {
																width: 20%;
															}
														</style>

														<div class="flex-box" style="margin-top: 6px; text-align: center; font-weight: 500; color: #000; background-color: #EFEFEF;">
															<div style="text-align: center; width: 40%;">
																<?php echo $language->get('text_cont_ajax_route'); ?>
															</div>

															<div style="text-align: center; width: 15%;">
																<?php echo $language->get('text_cont_ajax_status'); ?>
															</div>

															<div style="text-align: center; width: 15%;">
																<?php echo $language->get('text_cont_ajax_scripts'); ?>
															</div>
															<div style="text-align: center; width: 10%;">
																<?php echo $language->get('text_cont_ajax_delay'); ?>
															</div>

															<div style="text-align: center; width: 10%;">
																<?php echo $language->get('text_cont_ajax_md5'); ?>
															</div>
															<div style="text-align: center; width: 10%;">
																<?php echo $language->get('text_cont_ajax_action'); ?>
															</div>


														</div>


														<div id="ajaxroutes" style="clear: both; width: 100%">


															<?php
															$ajaxroutes_row = 0;

															if (!empty($asc_jetcache_settings['cont_ajax_routes'])) {
																foreach ($asc_jetcache_settings['cont_ajax_routes'] as $jc_num => $ajaxroutes) {
															?>
																	<div id="ajaxroutes-<?php echo $ajaxroutes_row; ?>" class="flex-box" style="text-align: center;">
																		<div style="text-align: center; padding: 8px; width: 40%;">
																			<div class="input-group">
																				<input type="text" size="75" class="form-control" name="asc_jetcache_settings[cont_ajax_routes][<?php echo $ajaxroutes_row; ?>][route]" value="<?php if (isset($asc_jetcache_settings['cont_ajax_routes'][$jc_num]['route']) && $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['route'] != '') {
																																																									echo $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['route'];
																																																								} else {
																																																									echo '';
																																																								} ?>">
																			</div>
																		</div>

																		<div style="text-align: center; padding: 8px; width: 15%;">

																			<div class="input-group jetcache-text-center">
																				<div class="jc-select-toggle">
																					<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_ajax_routes][<?php echo $ajaxroutes_row; ?>][status]" id="id-cont-ajax-status">
																						<?php if (isset($asc_jetcache_settings['cont_ajax_routes'][$jc_num]['status']) && $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['status']) { ?>
																							<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																							<option value="0"><?php echo $text_disabled; ?></option>
																						<?php } else { ?>
																							<option value="1"><?php echo $text_enabled; ?></option>
																							<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																						<?php } ?>
																					</select>
																				</div>
																			</div>


																		</div>

																		<div style="text-align: center; padding: 8px; width: 15%;">

																			<div class="input-group jetcache-text-center">
																				<div class="jc-select-toggle">
																					<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_ajax_routes][<?php echo $ajaxroutes_row; ?>][scripts]" id="id-cont-ajax-status">
																						<?php if (isset($asc_jetcache_settings['cont_ajax_routes'][$jc_num]['scripts']) && $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['scripts']) { ?>
																							<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																							<option value="0"><?php echo $text_disabled; ?></option>
																						<?php } else { ?>
																							<option value="1"><?php echo $text_enabled; ?></option>
																							<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																						<?php } ?>
																					</select>
																				</div>
																			</div>


																		</div>

																		<div style="text-align: center; padding: 8px; width: 10%;">
																			<div class="input-group">
																				<input type="text" size="5" name="asc_jetcache_settings[cont_ajax_routes][<?php echo $ajaxroutes_row; ?>][delay]" value="<?php if (isset($asc_jetcache_settings['cont_ajax_routes'][$jc_num]['delay']) && $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['delay'] != '') {
																																																				echo $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['delay'];
																																																			} else {
																																																				echo '';
																																																			} ?>">
																			</div>
																		</div>


																		<div style="text-align: center; padding: 8px; width: 10%;">
																			<div class="input-group">
																				<input type="text" size="10" name="asc_jetcache_settings[cont_ajax_routes][<?php echo $ajaxroutes_row; ?>][md5]" value="<?php if (isset($asc_jetcache_settings['cont_ajax_routes'][$jc_num]['md5']) && $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['md5'] != '') {
																																																			echo $asc_jetcache_settings['cont_ajax_routes'][$jc_num]['md5'];
																																																		} else {
																																																			echo '';
																																																		} ?>">
																			</div>
																		</div>



																		<div style="text-align: center; padding: 8px; width: 10%;">
																			<a onclick="$('#ajaxroutes-<?php echo $ajaxroutes_row; ?>').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a>
																		</div>

																	</div>

															<?php
																	$ajaxroutes_row++;
																}
															}
															?>

														</div>


														<div id="ajaxroutes-ajaxroutes-add" style="clear: both; text-align: center; margin-top:10px; width: 100%">
															<a id="ajaxroutes-ajaxroutes-add-a" onclick="addRoutes();" class="markbutton nohref"><?php echo $language->get('entry_add_rule'); ?></a>
														</div>





													</td>
												</tr>

												<script>
													ajaxroutes_row = <?php echo $ajaxroutes_row; ?>;


													function addRoutes() {


														html = '';

														html += '				<div id="ajaxroutes-' + ajaxroutes_row + '" class="flex-box" style="text-align: center;">';
														html += '					<div style="text-align: center; padding: 8px; width: 40%;">';
														html += '						<div class="input-group">';
														html += '							<input type="text" size="75" class="form-control" name="asc_jetcache_settings[cont_ajax_routes][' + ajaxroutes_row + '][route]" value="">';
														html += '		               	</div>';
														html += '	                </div>';

														html += '					<div style="text-align: center; padding: 8px; width: 15%;">';

														html += '						<div class="input-group jetcache-text-center">';
														html += '							<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_ajax_routes][' + ajaxroutes_row + '][status]" id="id-cont-ajax-status">';
														html += '								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
														html += '								<option value="0"><?php echo $text_disabled; ?></option>';
														html += '							</select>';
														html += '						</div>';
														html += '	                </div>';

														html += '					<div style="text-align: center; padding: 8px; width: 15%;">';

														html += '						<div class="input-group jetcache-text-center">';
														html += '							<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_ajax_routes][' + ajaxroutes_row + '][scripts]" id="id-cont-ajax-status">';
														html += '								<option value="1"><?php echo $text_enabled; ?></option>';
														html += '								<option value="0" selected="selected"><?php echo $text_disabled; ?></option>';
														html += '							</select>';
														html += '						</div>';

														html += '	                </div>';

														html += '					<div style="text-align: center; padding: 8px; width: 10%;">';
														html += '						<div class="input-group">';
														html += '							<input type="text" size="5"  name="asc_jetcache_settings[cont_ajax_routes][' + ajaxroutes_row + '][delay]" value="">';
														html += '		               	</div>';
														html += '	                </div>';
														html += '					<div style="text-align: center; padding: 8px; width: 10%;">';
														html += '						<div class="input-group">';
														html += '							<input type="text" size="10"  name="asc_jetcache_settings[cont_ajax_routes][' + ajaxroutes_row + '][md5]" value="">';
														html += '		               	</div>';
														html += '	                </div>';

														html += '					<div style="text-align: center; padding: 8px; width: 10%;">';
														html += '                    	<a onclick="$(\'#ajaxroutes-' + ajaxroutes_row + '\').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a>';
														html += '	                </div>';

														html += '                </div>';


														ajaxroutes_row++;
														$('#ajaxroutes').append(html);

													}
												</script>


												<!--
											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_cont_ajax_header'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr>
												<td class="jetcache-table-help"><?php echo $language->get('entry_cont_ajax_header_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
													<div class="jc-select-toggle">	
													<select class="form-control jc-select-switch" name="asc_jetcache_settings[cont_ajax_header]" id="id-cont-ajax-status">
															<?php if (isset($asc_jetcache_settings['cont_ajax_header']) && $asc_jetcache_settings['cont_ajax_header']) { ?>
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
											-->




											</table>


										</div>

									</div>

									<!-- **************************************************** -->
									<div id="tab-model">
										<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>

											<tr>
												<!-- <td class="left"><?php echo $language->get('entry_status'); ?></td> -->
												<td class="left jetcache-table-help"><?php echo $language->get('entry_model_status_help'); ?></td>
												<td class="left jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[jetcache_model_status]">
																<?php if (isset($asc_jetcache_settings['jetcache_model_status']) && $asc_jetcache_settings['jetcache_model_status']) { ?>
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

											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_db_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>

											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_model_db_status_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[model_db_status]">
																<?php if (isset($asc_jetcache_settings['model_db_status']) && $asc_jetcache_settings['model_db_status']) { ?>
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
											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_model_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr>
												<td>
													<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
														<tr class="jetcache-back">
															<td colspan="2" class="jetcache-back jetcache-text-center">
																<?php echo $language->get('entry_model_title'); ?> <span class="jetcache-table-help-href">?</span>
															</td>
														</tr>
														<tr>
															<td class="jetcache-table-help left">
																<?php echo $language->get('entry_model_help'); ?>
															</td>
															<td>
																<div style="float: left;">
																	<table id="model" class="list jetcache-table-add">
																		<thead>
																			<tr>
																				<td class="left"><?php echo $language->get('entry_id'); ?></td>
																				<td><?php echo $language->get('entry_query_model'); ?></td>
																				<td><?php echo $language->get('entry_query_method'); ?></td>
																				<td><?php echo $language->get('entry_no_vars'); ?></td>
																				<td>
																					<?php echo $language->get('entry_onefile'); ?>
																					<br>
																					<?php echo $language->get('entry_ignore'); ?>
																				</td>
																				<td><?php echo $language->get('entry_status'); ?></td>
																				<td></td>
																			</tr>
																		</thead>
																		<?php if (isset($asc_jetcache_settings['model']) && !empty($asc_jetcache_settings['model'])) { ?>
																			<?php foreach ($asc_jetcache_settings['model'] as $model_id => $model) { ?>
																				<?php $model_row = $model_id; ?>
																				<tbody id="model_row<?php echo $model_row; ?>">
																					<tr>
																						<td class="left">
																							<input type="text" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][type_id]" value="<?php if (isset($model['type_id'])) echo $model['type_id']; ?>" size="3">
																						</td>
																						<td class="right">
																							<div style="margin-bottom: 3px;">
																								<input type="text" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][model]" value="<?php if (isset($model['model'])) echo $model['model']; ?>" style="width: 250px;">
																							</div>
																						</td>
																						<td class="right">
																							<div style="margin-bottom: 3px;">
																								<input type="text" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][method]" value="<?php if (isset($model['method'])) echo $model['method']; ?>" style="width: 200px;">
																							</div>
																						</td>
																						<td class="right">
																							<div class="input-group jetcache-text-center" style="margin-bottom: 3px;">
																								<div class="jc-select-toggle">
																									<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][no_getpost]">
																										<?php if (isset($model['no_getpost']) && $model['no_getpost']) { ?>
																											<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																											<option value="0"><?php echo $text_disabled; ?></option>
																										<?php } else { ?>
																											<option value="1"><?php echo $text_enabled; ?></option>
																											<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																										<?php } ?>
																									</select>
																								</div>
																							</div>
																							<div class="input-group jetcache-text-center" style="margin-bottom: 3px;">
																								<div class="jc-select-toggle">
																									<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][no_session]">
																										<?php if (isset($model['no_session']) && $model['no_session']) { ?>
																											<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																											<option value="0"><?php echo $text_disabled; ?></option>
																										<?php } else { ?>
																											<option value="1"><?php echo $text_enabled; ?></option>
																											<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																										<?php } ?>
																									</select>
																								</div>
																							</div>
																							<div class="input-group jetcache-text-center" style="margin-bottom: 3px;">
																								<div class="jc-select-toggle">
																									<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][no_url]">
																										<?php if (isset($model['no_url']) && $model['no_url']) { ?>
																											<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																											<option value="0"><?php echo $text_disabled; ?></option>
																										<?php } else { ?>
																											<option value="1"><?php echo $text_enabled; ?></option>
																											<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																										<?php } ?>
																									</select>
																								</div>
																							</div>
																							<div class="input-group jetcache-text-center">
																								<div class="jc-select-toggle">
																									<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][no_route]">
																										<?php if (isset($model['no_route']) && $model['no_route']) { ?>
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
																						<td class="right">
																							<div class="input-group jetcache-text-center">
																								<div class="jc-select-toggle">
																									<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][onefile]">
																										<?php if (isset($model['onefile']) && $model['onefile']) { ?>
																											<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																											<option value="0"><?php echo $text_disabled; ?></option>
																										<?php } else { ?>
																											<option value="1"><?php echo $text_enabled; ?></option>
																											<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																										<?php } ?>
																									</select>
																								</div>
																							</div>

																							<div class="input-group jetcache-text-center" style="margin-top:10px;">
																								<div class="jc-select-toggle">
																									<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][ignore]">
																										<?php if (isset($model['ignore']) && $model['ignore']) { ?>
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
																						<td class="right">
																							<div class="input-group jetcache-text-center">
																								<div class="jc-select-toggle">
																									<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][<?php echo $model_id; ?>][status]">
																										<?php if (isset($model['status']) && $model['status']) { ?>
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
																						<td class="left"><a onclick="$('#model_row<?php echo $model_row; ?>').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>
																					</tr>
																				</tbody>
																			<?php } ?>
																		<?php } ?>
																		<tfoot>
																			<tr>
																				<td colspan="3"></td>
																				<td class="left">
																					<a onclick="addModel();" class="markbutton nohref"><?php echo $language->get('entry_add_rule'); ?></a>
																				</td>
																			</tr>
																		</tfoot>
																	</table>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</div>

									<!-- **************************************************** -->
									<div id="tab-query">
										<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr>
												<td class="jetcache-table-help"><?php echo $language->get('entry_query_status_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[jetcache_query_status]" id="id-jetcache-query-status">
																<?php if (isset($asc_jetcache_settings['jetcache_query_status']) && $asc_jetcache_settings['jetcache_query_status']) { ?>
																	<option value="1" selected="selected" data-chained="0 1"><?php echo $text_enabled; ?></option>
																	<option value="0" data-chained="0"><?php echo $text_disabled; ?></option>
																<?php } else { ?>
																	<option value="1" data-chained="0 1"><?php echo $text_enabled; ?></option>
																	<option value="0" selected="selected" data-chained="0"><?php echo $text_disabled; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</td>
											</tr>
											<tr class="jetcache-back jetcache-pro-settings">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_db_status'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr class="jetcache-pro-settings">
												<td class="jetcache-table-help"><?php echo $language->get('entry_query_db_status_help'); ?></td>
												<td class="jetcache-text-center">
													<div class="input-group jetcache-text-center">
														<div class="jc-select-toggle">
															<select class="form-control jc-select-switch" name="asc_jetcache_settings[query_db_status]">
																<?php if (isset($asc_jetcache_settings['query_db_status']) && $asc_jetcache_settings['query_db_status']) { ?>
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
										</table>
										<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
											<tr class="jetcache-back">
												<td colspan="2" class="jetcache-back jetcache-text-center">
													<?php echo $language->get('entry_query_model_title'); ?> <span class="jetcache-table-help-href">?</span>
												</td>
											</tr>
											<tr>
												<td class="jetcache-table-help left">
													<?php echo $language->get('entry_query_model_help'); ?>
												</td>
												<td>
													<div style="float: left;">
														<table id="query_model" class="list jetcache-table-add">
															<thead>
																<tr>
																	<td class="left"><?php echo $language->get('entry_id'); ?></td>
																	<td><?php echo $language->get('entry_query_model'); ?></td>
																	<td><?php echo $language->get('entry_query_method'); ?></td>
																	<td><?php echo $language->get('entry_status'); ?></td>
																	<td></td>
																</tr>
															</thead>
															<?php if (isset($asc_jetcache_settings['query_model']) && !empty($asc_jetcache_settings['query_model'])) { ?>
																<?php foreach ($asc_jetcache_settings['query_model'] as $query_model_id => $query_model) { ?>
																	<?php $query_model_row = $query_model_id; ?>
																	<tbody id="query_model_row<?php echo $query_model_row; ?>">
																		<tr>
																			<td class="left">
																				<input type="text" name="asc_jetcache_settings[query_model][<?php echo $query_model_id; ?>][type_id]" value="<?php if (isset($query_model['type_id'])) echo $query_model['type_id']; ?>" size="3">
																			</td>
																			<td class="right">
																				<div style="margin-bottom: 3px;">
																					<input type="text" name="asc_jetcache_settings[query_model][<?php echo $query_model_id; ?>][model]" value="<?php if (isset($query_model['model'])) echo $query_model['model']; ?>" style="width: 300px;">
																				</div>
																			</td>
																			<td class="right">
																				<div style="margin-bottom: 3px;">
																					<input type="text" name="asc_jetcache_settings[query_model][<?php echo $query_model_id; ?>][method]" value="<?php if (isset($query_model['method'])) echo $query_model['method']; ?>" style="width: 300px;">
																				</div>
																			</td>
																			<td class="right">
																				<div class="input-group jetcache-text-center">
																					<div class="jc-select-toggle">
																						<select class="form-control jc-select-switch" name="asc_jetcache_settings[query_model][<?php echo $query_model_id; ?>][status]">
																							<?php if (isset($query_model['status']) && $query_model['status']) { ?>
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
																			<td class="left"><a onclick="$('#query_model_row<?php echo $query_model_row; ?>').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>
																		</tr>
																	</tbody>
																<?php } ?>
															<?php } ?>
															<tfoot>
																<tr>
																	<td colspan="3"></td>
																	<td class="left"><a onclick="addQueryModel();" class="markbutton nohref"><?php echo $language->get('entry_add_rule'); ?></a></td>
																</tr>
															</tfoot>
														</table>
													</div>
												</td>
											</tr>
										</table>
									</div>

									<!-- **************************************************** -->
									<div id="tab-minify">

										<div id="tabs-minify" class="htabs">
											<a href="#tab-minify-css" class="jc-tab-2"><?php echo $language->get('tab_minify_css'); ?></a>
											<a href="#tab-minify-js" class="jc-tab-2"><?php echo $language->get('tab_minify_js'); ?></a>
											<a href="#tab-replacers" class="jc-tab-2"><?php echo $language->get('tab_replacers'); ?></a>
											<a href="#tab-minify-images" class="jc-tab-2"><?php echo $language->get('tab_images'); ?></a>
											<a href="#tab-minify-html" class="jc-tab-2"><?php echo $language->get('tab_minify_html'); ?></a>
										</div>

										<div id="tab-minify-images">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_images_logo_preload'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_images_logo_preload_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[images_logo_preload]">
																	<?php if (isset($asc_jetcache_settings['images_logo_preload']) && $asc_jetcache_settings['images_logo_preload']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_images_logo_dimensions'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_images_logo_dimensions_help'); ?></td>

													<td class="jetcache-text-center">

														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[images_logo_dim_status]">
																	<?php if (isset($asc_jetcache_settings['images_logo_dim_status']) && $asc_jetcache_settings['images_logo_dim_status']) { ?>
																		<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<option value="1"><?php echo $text_enabled; ?></option>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>


														<div class="sc_table" style="margin-top: 10px;">
															<div class="input-group">
																<input class="form-control" type="text" name="asc_jetcache_settings[images_logo_dim][width]" value="<?php if (isset($asc_jetcache_settings['images_logo_dim']['width'])) echo $asc_jetcache_settings['images_logo_dim']['width']; ?>" size="3" />
															</div>

															<div>
																x
															</div>

															<div class="input-group">
																<input class="form-control" type="text" name="asc_jetcache_settings[images_logo_dim][height]" value="<?php if (isset($asc_jetcache_settings['images_logo_dim']['height'])) echo $asc_jetcache_settings['images_logo_dim']['height']; ?>" size="3" />
															</div>

														</div>
													</td>
												</tr>

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_images_x'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_images_x_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[images_x]">
																	<?php if (isset($asc_jetcache_settings['images_x']) && $asc_jetcache_settings['images_x']) { ?>
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

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_images_product_preload'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_images_product_preload_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[images_product_preload]">
																	<?php if (isset($asc_jetcache_settings['images_product_preload']) && $asc_jetcache_settings['images_product_preload']) { ?>
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


											</table>
										</div>



										<div id="tab-minify-css">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_status_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_status]">
																	<?php if (isset($asc_jetcache_settings['minify_css_status']) && $asc_jetcache_settings['minify_css_status']) { ?>
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


												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_footer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_footer]">
																	<?php if (isset($asc_jetcache_settings['minify_css_footer']) && $asc_jetcache_settings['minify_css_footer']) { ?>
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
														<?php echo $language->get('entry_minify_css_ex_css_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-back">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_css_ex_css_footer_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_ex_css_footer]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_ex_css_footer'])) {
																																											echo $asc_jetcache_settings['minify_css_ex_css_footer'];
																																										} else {
																																											echo '';
																																										} ?></textarea>
														</div>
													</td>
												</tr>







												<!-- **************************************** -->

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_critical_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_critical_status_help'); ?>
														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[minify_css_critical_head]" value="<?php if (isset($asc_jetcache_settings['minify_css_critical_head'])) echo $asc_jetcache_settings['minify_css_critical_head']; ?>" size="20" />
														</div>

													</td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_critical_status]">
																	<?php if (isset($asc_jetcache_settings['minify_css_critical_status']) && $asc_jetcache_settings['minify_css_critical_status']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_critical_in'); ?>

													</td>
												</tr>
												<tr class="jetcache-back jetcache-pro-settings">

													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_critical_in_help'); ?>


													</td>

													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_critical_in]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_critical_in'])) {
																																										echo $asc_jetcache_settings['minify_css_critical_in'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>

												<!-- **************************************** -->



												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_combine_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_combine_status_help'); ?>
														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[minify_css_combine_head]" value="<?php if (isset($asc_jetcache_settings['minify_css_combine_head'])) echo $asc_jetcache_settings['minify_css_combine_head']; ?>" size="20" />
														</div>

													</td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_combine_status]">
																	<?php if (isset($asc_jetcache_settings['minify_css_combine_status']) && $asc_jetcache_settings['minify_css_combine_status']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_combine_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_combine_footer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_combine_footer]">
																	<?php if (isset($asc_jetcache_settings['minify_css_combine_footer']) && $asc_jetcache_settings['minify_css_combine_footer']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_combine_preload'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_combine_preload_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_combine_preload]">
																	<?php if (isset($asc_jetcache_settings['minify_css_combine_preload']) && $asc_jetcache_settings['minify_css_combine_preload']) { ?>
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



												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_ex_combine'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_ex_combine_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_ex_combine]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_ex_combine'])) {
																																										echo $asc_jetcache_settings['minify_css_ex_combine'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>

												<!-- **************************************** -->

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_combine_inline'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_combine_inline_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_combine_inline]">
																	<?php if (isset($asc_jetcache_settings['minify_css_combine_inline']) && $asc_jetcache_settings['minify_css_combine_inline']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_combine_inline_code'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_css_combine_inline_code_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_combine_inline_code]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_combine_inline_code'])) {
																																												echo $asc_jetcache_settings['minify_css_combine_inline_code'];
																																											} else {
																																												echo '';
																																											} ?></textarea>
														</div>
													</td>
												</tr>


												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_inline_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_inline_footer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_inline_footer]">
																	<?php if (isset($asc_jetcache_settings['minify_css_inline_footer']) && $asc_jetcache_settings['minify_css_inline_footer']) { ?>
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

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_ex_inline_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_css_ex_inline_footer_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_ex_inline_footer]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_ex_inline_footer'])) {
																																											echo $asc_jetcache_settings['minify_css_ex_inline_footer'];
																																										} else {
																																											echo '';
																																										} ?></textarea>
														</div>
													</td>
												</tr>



												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_after'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_css_after_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_after]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_after'])) {
																																									echo $asc_jetcache_settings['minify_css_after'];
																																								} else {
																																									echo '';
																																								} ?></textarea>
														</div>
													</td>
												</tr>


												<tr class="jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_after_gps'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_css_after_gps_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_after_gps]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_after_gps'])) {
																																										echo $asc_jetcache_settings['minify_css_after_gps'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>
												<!-- **************************************** -->

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_fonts_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_fonts_status_help'); ?>
														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[minify_css_fonts_head]" value="<?php if (isset($asc_jetcache_settings['minify_css_fonts_head'])) echo $asc_jetcache_settings['minify_css_fonts_head']; ?>" size="20" />
														</div>

													</td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_fonts_status]">
																	<?php if (isset($asc_jetcache_settings['minify_css_fonts_status']) && $asc_jetcache_settings['minify_css_fonts_status']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_fonts_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_fonts_footer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_fonts_footer]">
																	<?php if (isset($asc_jetcache_settings['minify_css_fonts_footer']) && $asc_jetcache_settings['minify_css_fonts_footer']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_ex_fonts'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_ex_fonts_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_ex_fonts]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_ex_fonts'])) {
																																									echo $asc_jetcache_settings['minify_css_ex_fonts'];
																																								} else {
																																									echo '';
																																								} ?></textarea>
														</div>
													</td>
												</tr>


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_fonts_defer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_fonts_defer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_fonts_defer]">
																	<?php if (isset($asc_jetcache_settings['minify_css_fonts_defer']) && $asc_jetcache_settings['minify_css_fonts_defer']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_fonts_defer_gps'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_fonts_defer_gps_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_fonts_defer_gps]">
																	<?php if (isset($asc_jetcache_settings['minify_css_fonts_defer_gps']) && $asc_jetcache_settings['minify_css_fonts_defer_gps']) { ?>
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





												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_compress_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_compress_status_help'); ?></td>

													<td class="jetcache-text-center">

														<div class="sc-flex-block">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="input-group">
																		<div class="jc-select-toggle">
																			<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_compress_status]">
																				<?php if (isset($asc_jetcache_settings['minify_css_compress_status']) && $asc_jetcache_settings['minify_css_compress_status']) { ?>
																					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																					<option value="0"><?php echo $text_disabled; ?></option>
																				<?php } else { ?>
																					<option value="1"><?php echo $text_enabled; ?></option>
																					<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																				<?php } ?>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="sc-flex-container-left">
																	<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title='<?php echo $language->get("entry_minify_css_compress_status"); ?>' data-content='<?php echo $language->get("entry_minify_css_compress_status_help"); ?>' data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-red"></i></a>
																</div>
															</div>
														</div>


													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_inline_compress_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_inline_compress_status_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="sc-flex-block">
															<div class="sc-flex-container">
																<div class="sc-flex-container-left">
																	<div class="input-group">
																		<div class="jc-select-toggle">
																			<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_inline_compress_status]">
																				<?php if (isset($asc_jetcache_settings['minify_css_inline_compress_status']) && $asc_jetcache_settings['minify_css_inline_compress_status']) { ?>
																					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																					<option value="0"><?php echo $text_disabled; ?></option>
																				<?php } else { ?>
																					<option value="1"><?php echo $text_enabled; ?></option>
																					<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																				<?php } ?>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="sc-flex-container-left">
																	<a href="javascript:void(0)" class="infoPopover" data-toggle="popover" data-html="true" data-title='<?php echo $language->get("entry_minify_css_inline_compress_status"); ?>' data-content='<?php echo $language->get("entry_minify_css_inline_compress_status_help"); ?>' data-placement="right" data-original-title="" title=""><i class="fa fa-exclamation-circle jetcache-red"></i></a>
																</div>
															</div>
														</div>

													</td>
												</tr>



												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_compress_type'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_css_compress_type_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_css_compress_type]">
																	<?php if (isset($asc_jetcache_settings['minify_css_compress_type']) && $asc_jetcache_settings['minify_css_compress_type']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_in_inline'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>

													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_css_in_inline_help'); ?>

														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[minify_css_inline_tie]" value="<?php if (isset($asc_jetcache_settings['minify_css_inline_tie'])) echo $asc_jetcache_settings['minify_css_inline_tie']; ?>" size="20" />
														</div>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_in_inline]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_in_inline'])) {
																																										echo $asc_jetcache_settings['minify_css_in_inline'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_css_ex_route'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_css_ex_route_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_css_ex_route]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_css_ex_route'])) {
																																									echo $asc_jetcache_settings['minify_css_ex_route'];
																																								} else {
																																									echo '';
																																								} ?></textarea>
														</div>
													</td>
												</tr>

												<!-- **************************************** -->




												<tr>
													<td class="jetcache-table-help left"></td>
													<td></td>
												</tr>
											</table>
										</div>



										<div id="tab-minify-js">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_status_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_status]">
																	<?php if (isset($asc_jetcache_settings['minify_js_status']) && $asc_jetcache_settings['minify_js_status']) { ?>
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

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_preload'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_preload_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_preload]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_preload'])) {
																																									echo $asc_jetcache_settings['minify_js_preload'];
																																								} else {
																																									echo '';
																																								} ?></textarea>
														</div>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_preload_gps'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>
												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_preload_gps_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_preload_gps]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_preload_gps'])) {
																																										echo $asc_jetcache_settings['minify_js_preload_gps'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>



												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_afterload_time_desktop'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_afterload_time_desktop_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<input class="form-control template" size="11" type="text" name="asc_jetcache_settings[minify_js_afterload_time_desktop]" value="<?php if (isset($asc_jetcache_settings['minify_js_afterload_time_desktop'])) echo $asc_jetcache_settings['minify_js_afterload_time_desktop']; ?>" size="20" />
														</div>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_afterload_time_mobile'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_afterload_time_mobile_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<input class="form-control template" size="11" type="text" name="asc_jetcache_settings[minify_js_afterload_time_mobile]" value="<?php if (isset($asc_jetcache_settings['minify_js_afterload_time_mobile'])) echo $asc_jetcache_settings['minify_js_afterload_time_mobile']; ?>" size="20" />
														</div>
													</td>
												</tr>





												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_compress_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_compress_status_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_compress_status]">
																	<?php if (isset($asc_jetcache_settings['minify_js_compress_status']) && $asc_jetcache_settings['minify_js_compress_status']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_inline_compress_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_inline_compress_status_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_inline_compress_status]">
																	<?php if (isset($asc_jetcache_settings['minify_js_inline_compress_status']) && $asc_jetcache_settings['minify_js_inline_compress_status']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_compress_type'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_compress_type_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_compress_type]">
																	<?php if (isset($asc_jetcache_settings['minify_js_compress_type']) && $asc_jetcache_settings['minify_js_compress_type']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_ex_compress'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_ex_compress_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_ex_compress]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_ex_compress'])) {
																																										echo $asc_jetcache_settings['minify_js_ex_compress'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>




												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_footer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_footer]">
																	<?php if (isset($asc_jetcache_settings['minify_js_footer']) && $asc_jetcache_settings['minify_js_footer']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_first'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_first_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_first]">
																	<?php if (isset($asc_jetcache_settings['minify_js_first']) && $asc_jetcache_settings['minify_js_first']) { ?>
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



												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_ex_js_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_ex_js_footer_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_ex_js_footer]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_ex_js_footer'])) {
																																										echo $asc_jetcache_settings['minify_js_ex_js_footer'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_in_inline'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_in_inline_help'); ?>
														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[minify_js_inline_tie]" value="<?php if (isset($asc_jetcache_settings['minify_js_inline_tie'])) echo $asc_jetcache_settings['minify_js_inline_tie']; ?>" size="20" />
														</div>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_in_inline]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_in_inline'])) {
																																									echo $asc_jetcache_settings['minify_js_in_inline'];
																																								} else {
																																									echo '';
																																								} ?></textarea>
														</div>
													</td>
												</tr>


												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_combine_status'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_combine_status_help'); ?>
														<div class="input-group">
															<input class="form-control" size="11" type="text" name="asc_jetcache_settings[minify_js_combine_head]" value="<?php if (isset($asc_jetcache_settings['minify_js_combine_head'])) echo $asc_jetcache_settings['minify_js_combine_head']; ?>" size="20" />
														</div>
													</td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_combine_status]">
																	<?php if (isset($asc_jetcache_settings['minify_js_combine_status']) && $asc_jetcache_settings['minify_js_combine_status']) { ?>
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

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_combine_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_combine_footer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_combine_footer]">
																	<?php if (isset($asc_jetcache_settings['minify_js_combine_footer']) && $asc_jetcache_settings['minify_js_combine_footer']) { ?>
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

												<tr class="jetcache-back ">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_ex_combine'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_ex_combine_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_ex_combine]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_ex_combine'])) {
																																										echo $asc_jetcache_settings['minify_js_ex_combine'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_combine_inline'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_combine_inline_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_combine_inline]">
																	<?php if (isset($asc_jetcache_settings['minify_js_combine_inline']) && $asc_jetcache_settings['minify_js_combine_inline']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_ex_combine_inline'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_ex_combine_inline_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_ex_combine_inline]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_ex_combine_inline'])) {
																																											echo $asc_jetcache_settings['minify_js_ex_combine_inline'];
																																										} else {
																																											echo '';
																																										} ?></textarea>
														</div>
													</td>
												</tr>

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_inline_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_inline_footer_help'); ?></td>

													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_inline_footer]">
																	<?php if (isset($asc_jetcache_settings['minify_js_inline_footer']) && $asc_jetcache_settings['minify_js_inline_footer']) { ?>
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

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_ex_inline_footer'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_ex_inline_footer_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_ex_inline_footer]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_ex_inline_footer'])) {
																																											echo $asc_jetcache_settings['minify_js_ex_inline_footer'];
																																										} else {
																																											echo '';
																																										} ?></textarea>
														</div>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center jetcache-pro-settings">
														<?php echo $language->get('entry_minify_js_preload_inline_remove_event'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_preload_inline_remove_event_help'); ?></td>

													<td class="jetcache-text-center jetcache-pro-settings">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_preload_inline_remove_event]">
																	<?php if (isset($asc_jetcache_settings['minify_js_preload_inline_remove_event']) && $asc_jetcache_settings['minify_js_preload_inline_remove_event']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_preload_server_remove_event'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_preload_server_remove_event_help'); ?></td>

													<td class="jetcache-text-center jetcache-pro-settings">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_preload_server_remove_event]">
																	<?php if (isset($asc_jetcache_settings['minify_js_preload_server_remove_event']) && $asc_jetcache_settings['minify_js_preload_server_remove_event']) { ?>
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


												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_debug'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>&nbsp;<span class="jetcache-table-pro-href"><a href="#pro_show" class="jetcache_pro_show">PRO</a><a href="#pro_hide" class="jetcache_pro_hide">PRO</a></span>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_js_debug_help'); ?></td>

													<td class="jetcache-text-center jetcache-pro-settings">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_js_debug]">
																	<?php if (isset($asc_jetcache_settings['minify_js_debug']) && $asc_jetcache_settings['minify_js_debug']) { ?>
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



												<tr class="jetcache-back jetcache-pro-settings">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_js_ex_route'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="jetcache-pro-settings">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_js_ex_route_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_js_ex_route]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_js_ex_route'])) {
																																									echo $asc_jetcache_settings['minify_js_ex_route'];
																																								} else {
																																									echo '';
																																								} ?></textarea>
														</div>
													</td>
												</tr>

												<tr>
													<td class="jetcache-table-help left"></td>
													<td></td>
												</tr>
											</table>
										</div>





										<div id="tab-replacers">
											<?php
											if (function_exists('modification') && file_exists(modification(DIR_TEMPLATE . 'jetcache/replacers.tpl'))) {
												include(modification(DIR_TEMPLATE . 'jetcache/replacers.tpl'));
											} else {
												include(DIR_TEMPLATE . 'jetcache/replacers.tpl');
											}
											?>
										</div>


										<div id="tab-minify-html">

											<table class="mynotable jetcache-pro-settings" style="margin-bottom:20px; background: white; vertical-align: center;">
												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_html'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>

												<tr class="">
													<td class="jetcache-table-help"><?php echo $language->get('entry_minify_html_status_help'); ?></td>
													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[minify_html_status]">
																	<?php if (isset($asc_jetcache_settings['minify_html_status']) && $asc_jetcache_settings['minify_html_status']) { ?>
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


												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_html_remove_space'); ?>&nbsp;<span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="">
													<td class="jetcache-table-help"><?php echo $language->get('entry_html_remove_space_help'); ?></td>
													<td class="jetcache-text-center">
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[html_remove_space]">
																	<?php if (isset($asc_jetcache_settings['html_remove_space']) && $asc_jetcache_settings['html_remove_space']) { ?>
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

												<tr class="">
													<td colspan="2" class="jetcache-table-help left"></td>
												</tr>
												<tr class="">
													<td></td>
													<td></td>
												</tr>

												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_minify_html_ex_route'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_minify_html_ex_route_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[minify_html_ex_route]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['minify_html_ex_route'])) {
																																										echo $asc_jetcache_settings['minify_html_ex_route'];
																																									} else {
																																										echo '';
																																									} ?></textarea>
														</div>
													</td>
												</tr>

											</table>
										</div>



									</div>

									<!-- **************************************************** -->
									<div id="tab-image">


										<input type="hidden" name="asc_jetcache_settings[jc_path_mozjpeg]" value="<?php if (isset($jc_path_mozjpeg)) echo $jc_path_mozjpeg; ?>">
										<input type="hidden" name="asc_jetcache_settings[jc_path_jpegoptim]" value="<?php if (isset($jc_path_jpegoptim)) echo $jc_path_jpegoptim; ?>">
										<input type="hidden" name="asc_jetcache_settings[jc_path_optipng]" value="<?php if (isset($jc_path_optipng)) echo $jc_path_optipng; ?>">
										<input type="hidden" name="asc_jetcache_settings[jc_path_webp]" value="<?php if (isset($jc_path_webp)) echo $jc_path_webp; ?>">

										<input type="hidden" name="asc_jetcache_settings[image_exec]" value="<?php echo $asc_jetcache_settings['image_exec']; ?>">
										<input type="hidden" name="asc_jetcache_settings[image_proc_open]" value="<?php echo $asc_jetcache_settings['image_proc_open']; ?>">

										<div id="tabs-image" class="htabs">
											<a href="#tab-image-options" class="jc-tab-2"><?php echo $language->get('tab_image_options'); ?></a>
											<a href="#tab-image-ex" class="jc-tab-2"><?php echo $language->get('tab_image_ex'); ?></a>
										</div>
										<div id="tab-image-options">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">
												<?php if ((!isset($image_mozjpeg) || !$image_mozjpeg) || (!isset($image_optipng) || !$image_optipng) || (!isset($image_webp) || !$image_webp) || (!isset($image_webp_gd) || !$image_webp_gd)) { ?>
													<tr>
														<td colspan="2" class="jetcache-back-red jetcache-text-center">
															<?php echo $language->get('entry_image_status_error'); ?>&nbsp;<span class="jetcache-table-help-href<?php if ((!isset($image_mozjpeg) || !$image_mozjpeg) || (!isset($image_optipng) || !$image_optipng) || (!isset($image_webp) || !$image_webp) || (!isset($image_webp_gd) || !$image_webp_gd)) { ?>-red<?php } else { ?>-green<?php  } ?>">?</span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="jetcache-back jetcache-color-red jetcache-text-center">
															<?php echo $language->get('entry_image_status_error_text'); ?>
														</td>
													</tr>
													<tr class="jetcache-table-help">
														<td colspan="2" class="jetcache-back jetcache-text-center">
															<?php echo $language->get('entry_image_status_error_must_text'); ?>
														</td>
													</tr>

												<?php } ?>
												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_status'); ?>

													</td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_status]">
																	<?php if (isset($asc_jetcache_settings['image_status']) && $asc_jetcache_settings['image_status']) { ?>
																		<?php if ((isset($image_mozjpeg) && $image_mozjpeg) || (isset($image_optipng) && $image_optipng) || (isset($image_webp) && $image_webp) || (isset($image_webp_gd) && $image_webp_gd)) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if ((isset($image_mozjpeg) && $image_mozjpeg) || (isset($image_optipng) && $image_optipng) || (isset($image_webp) && $image_webp) || (isset($image_webp_gd) && $image_webp_gd)) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td style="width: 220px;"><?php echo $language->get('entry_jetcache_cache_image_remove'); ?>
														<span class="jetcache-table-help">
															<div class="input-group">
																<input class="form-control image_remove_ext" type="text" name="asc_jetcache_settings[image_remove_ext]" value="<?php if (isset($asc_jetcache_settings['image_remove_ext'])) echo $asc_jetcache_settings['image_remove_ext']; ?>" size="5" />
															</div>
														</span>


													</td>
													<td>
														<div style="margin-bottom: 5px;">
															<a class="jetcache_cache_image_remove markbuttono sc_button"><?php echo $language->get('text_url_cache_image_remove'); ?></a>
															<div class="div_cache_image_remove"></div>
														</div>
													</td>
												</tr>

												<!-- webp -->
												<tr>
													<td colspan="2" class="jetcache-back <?php if (!isset($image_webp) || !$image_webp) { ?>jetcache-back-red <?php } else { ?>jetcache-back-green <?php } ?>jetcache-text-center">
														<?php echo $language->get('entry_webp'); ?>&nbsp;<span class="jetcache-table-help-href<?php if (!isset($image_webp) || !$image_webp) { ?>-red<?php } else { ?>-green<?php  } ?>">?</span>
													</td>
												</tr>
												<tr class="jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_webp_must'); ?>
													</td>
												</tr>
												<?php if (!isset($image_webp) || !$image_webp) { ?>
													<tr>
														<td colspan="2" class="jetcache-back jetcache-color-red jetcache-text-center">
															<?php echo $language->get('entry_image_status_error_text'); ?> <?php echo $language->get('entry_webp_text'); ?>
														</td>
													</tr>
												<?php } ?>


												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_webp_status'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select id="image-webp-status" class="form-control jc-select-switch" name="asc_jetcache_settings[image_webp_status]">
																	<?php if (isset($asc_jetcache_settings['image_webp_status']) && $asc_jetcache_settings['image_webp_status']) { ?>
																		<?php if (isset($image_webp) && $image_webp) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_webp) && $image_webp) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_webp_lossess'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_webp_lossess]">
																	<?php if (isset($asc_jetcache_settings['image_webp_lossess']) && $asc_jetcache_settings['image_webp_lossess']) { ?>
																		<?php if (isset($image_webp) && $image_webp) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_webp) && $image_webp) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>


												<tr class="jetcache-back jetcache-pro-settings">
													<td style="width: 220px;"><?php echo $language->get('entry_image_webp_relative_url'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_webp_relative_url]">
																	<?php if (isset($asc_jetcache_settings['image_webp_relative_url']) && $asc_jetcache_settings['image_webp_relative_url']) { ?>
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

												<tr class="jetcache-back jetcache-pro-settings">
													<td style="width: 220px;"><?php echo $language->get('entry_image_webp_mozjpeg'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_webp_mozjpeg]">
																	<?php if (isset($asc_jetcache_settings['image_webp_mozjpeg']) && $asc_jetcache_settings['image_webp_mozjpeg']) { ?>
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
													<td class="left"><?php echo $language->get('entry_image_webp_command');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" type="text" name="asc_jetcache_settings[image_webp_command]" value="<?php if (isset($asc_jetcache_settings['image_webp_command'])) echo $asc_jetcache_settings['image_webp_command']; ?>" size="20" />
														</div>
													</td>
												</tr>

												<!-- webp gd-->
												<tr>
													<td colspan="2" class="jetcache-back <?php if (!isset($image_webp_gd) || !$image_webp_gd) { ?>jetcache-back-red <?php } else { ?>jetcache-back-green <?php } ?>jetcache-text-center">
														<?php echo $language->get('entry_webp_gd'); ?>&nbsp;<span class="jetcache-table-help-href<?php if (!isset($image_webp_gd) || !$image_webp_gd) { ?>-red<?php } else { ?>-green<?php  } ?>">?</span>
													</td>
												</tr>
												<tr class="jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_webp_gd_must'); ?>
													</td>
												</tr>
												<?php if (!isset($image_webp_gd) || !$image_webp_gd) { ?>
													<tr>
														<td colspan="2" class="jetcache-back jetcache-color-red jetcache-text-center">
															<?php echo $language->get('entry_image_status_error_text'); ?> <?php echo $language->get('entry_webp_gd_text'); ?>
														</td>
													</tr>
												<?php } ?>


												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_webp_gd_status'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select id="image-webp-status" class="form-control jc-select-switch" name="asc_jetcache_settings[image_webp_gd_status]">
																	<?php if (isset($asc_jetcache_settings['image_webp_gd_status']) && $asc_jetcache_settings['image_webp_gd_status']) { ?>
																		<?php if (isset($image_webp_gd) && $image_webp_gd) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_webp_gd) && $image_webp_gd) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_webp_gd_png_status'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select id="image-webp-status" class="form-control jc-select-switch" name="asc_jetcache_settings[image_webp_gd_png_status]">
																	<?php if (isset($asc_jetcache_settings['image_webp_gd_png_status']) && $asc_jetcache_settings['image_webp_gd_png_status']) { ?>
																		<?php if (isset($image_webp_gd) && $image_webp_gd) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_webp_gd) && $image_webp_gd) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>


												<tr>
													<td class="left"><?php echo $language->get('entry_image_webp_gd_quality');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" type="text" name="asc_jetcache_settings[image_webp_gd_quality]" value="<?php if (isset($asc_jetcache_settings['image_webp_gd_quality'])) echo $asc_jetcache_settings['image_webp_gd_quality']; ?>" size="3" />
														</div>
													</td>
												</tr>

												<!-- mozjpeg -->
												<tr>
													<td colspan="2" class="jetcache-back <?php if (!isset($image_mozjpeg) || !$image_mozjpeg) { ?>jetcache-back-red <?php } else { ?>jetcache-back-green <?php } ?>jetcache-text-center">
														<?php echo $language->get('entry_mozjpeg'); ?>&nbsp;<span class="jetcache-table-help-href<?php if (!isset($image_mozjpeg) || !$image_mozjpeg) { ?>-red<?php } else { ?>-green<?php  } ?>">?</span>
													</td>
												</tr>
												<tr class="jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_mozjpeg_must'); ?>
													</td>
												</tr>
												<?php if (!isset($image_mozjpeg) || !$image_mozjpeg) { ?>
													<tr>
														<td colspan="2" class="jetcache-back jetcache-color-red jetcache-text-center">
															<?php echo $language->get('entry_image_status_error_text'); ?> <?php echo $language->get('entry_mozjpeg_text'); ?>
														</td>
													</tr>
												<?php } ?>


												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_mozjpeg_status'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch image-other-status" name="asc_jetcache_settings[image_mozjpeg_status]">
																	<?php if (isset($asc_jetcache_settings['image_mozjpeg_status']) && $asc_jetcache_settings['image_mozjpeg_status']) { ?>
																		<?php if (isset($image_mozjpeg) && $image_mozjpeg) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_mozjpeg) && $image_mozjpeg) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_mozjpeg_optimize'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_mozjpeg_optimize]">
																	<?php if (isset($asc_jetcache_settings['image_mozjpeg_optimize']) && $asc_jetcache_settings['image_mozjpeg_optimize']) { ?>
																		<?php if (isset($image_mozjpeg) && $image_mozjpeg) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_mozjpeg) && $image_mozjpeg) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_mozjpeg_progressive'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_mozjpeg_progressive]">
																	<?php if (isset($asc_jetcache_settings['image_mozjpeg_progressive']) && $asc_jetcache_settings['image_mozjpeg_progressive']) { ?>
																		<?php if (isset($image_mozjpeg) && $image_mozjpeg) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_mozjpeg) && $image_mozjpeg) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_image_mozjpeg_command');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" type="text" name="asc_jetcache_settings[image_mozjpeg_command]" value="<?php if (isset($asc_jetcache_settings['image_mozjpeg_command'])) echo $asc_jetcache_settings['image_mozjpeg_command']; ?>" size="20" />
														</div>
													</td>
												</tr>
												<!-- /mozjpeg -->
												<!-- jpegoptim -->
												<tr>
													<td colspan="2" class="jetcache-back <?php if (!isset($image_jpegoptim) || !$image_jpegoptim) { ?>jetcache-back-red <?php } else { ?>jetcache-back-green <?php } ?>jetcache-text-center">
														<?php echo $language->get('entry_jpegoptim'); ?>&nbsp;<span class="jetcache-table-help-href<?php if (!isset($image_jpegoptim) || !$image_jpegoptim) { ?>-red<?php } else { ?>-green<?php  } ?>">?</span>
													</td>
												</tr>
												<tr class="jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_jpegoptim_must'); ?>
													</td>
												</tr>
												<?php if (!isset($image_jpegoptim) || !$image_jpegoptim) { ?>
													<tr>
														<td colspan="2" class="jetcache-back jetcache-color-red jetcache-text-center">
															<?php echo $language->get('entry_image_status_error_text'); ?> <?php echo $language->get('entry_jpegoptim_text'); ?>
														</td>
													</tr>
												<?php } ?>


												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_jpegoptim_status'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch image-other-status" name="asc_jetcache_settings[image_jpegoptim_status]">
																	<?php if (isset($asc_jetcache_settings['image_jpegoptim_status']) && $asc_jetcache_settings['image_jpegoptim_status']) { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_jpegoptim_optimize'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_jpegoptim_optimize]">
																	<?php if (isset($asc_jetcache_settings['image_jpegoptim_optimize']) && $asc_jetcache_settings['image_jpegoptim_optimize']) { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_jpegoptim_progressive'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_jpegoptim_progressive]">
																	<?php if (isset($asc_jetcache_settings['image_jpegoptim_progressive']) && $asc_jetcache_settings['image_jpegoptim_progressive']) { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_jpegoptim_strip'); ?></td>
													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch" name="asc_jetcache_settings[image_jpegoptim_strip]">
																	<?php if (isset($asc_jetcache_settings['image_jpegoptim_strip']) && $asc_jetcache_settings['image_jpegoptim_strip']) { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>


												<tr class="jetcache-back jetcache-pro-settings">
													<td class="left"><?php echo $language->get('entry_image_jpegoptim_level');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" size="2" maxlength="2" type="text" name="asc_jetcache_settings[image_jpegoptim_level]" value="<?php if (isset($asc_jetcache_settings['image_jpegoptim_level'])) echo $asc_jetcache_settings['image_jpegoptim_level']; ?>">
														</div>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td class="left"><?php echo $language->get('entry_image_jpegoptim_size');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" size="2" maxlength="2" type="text" name="asc_jetcache_settings[image_jpegoptim_size]" value="<?php if (isset($asc_jetcache_settings['image_jpegoptim_size'])) echo $asc_jetcache_settings['image_jpegoptim_size']; ?>">
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_image_jpegoptim_command');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" type="text" name="asc_jetcache_settings[image_jpegoptim_command]" value="<?php if (isset($asc_jetcache_settings['image_jpegoptim_command'])) echo $asc_jetcache_settings['image_jpegoptim_command']; ?>" size="20" />
														</div>
													</td>
												</tr>
												<!-- /jpegoptim -->

												<!-- optipng -->
												<tr>
													<td colspan="2" class="jetcache-back <?php if (!isset($image_optipng) || !$image_optipng) { ?>jetcache-back-red <?php } else { ?>jetcache-back-green <?php } ?>jetcache-text-center">
														<?php echo $language->get('entry_optipng'); ?>&nbsp;<span class="jetcache-table-help-href<?php if (!isset($image_optipng) || !$image_optipng) { ?>-red<?php } else { ?>-green<?php  } ?>">?</span>
													</td>
												</tr>
												<tr class="jetcache-table-help">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_optipng_must'); ?>
													</td>
												</tr>
												<?php if (!isset($image_optipng) || !$image_optipng) { ?>
													<tr>
														<td colspan="2" class="jetcache-back jetcache-color-red jetcache-text-center">
															<?php echo $language->get('entry_image_status_error_text'); ?> <?php echo $language->get('entry_optipng_text'); ?>
														</td>
													</tr>
												<?php } ?>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_image_optipng_status'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<div class="jc-select-toggle">
																<select class="form-control jc-select-switch image-other-status" name="asc_jetcache_settings[image_optipng_status]">
																	<?php if (isset($asc_jetcache_settings['image_optipng_status']) && $asc_jetcache_settings['image_optipng_status']) { ?>
																		<?php if (isset($image_optipng) && $image_optipng) { ?><option value="1" selected="selected"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0"><?php echo $text_disabled; ?></option>
																	<?php } else { ?>
																		<?php if (isset($image_optipng) && $image_optipng) { ?><option value="1"><?php echo $text_enabled; ?></option><?php } ?>
																		<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</td>
												</tr>

												<tr class="jetcache-back jetcache-pro-settings">
													<td><?php echo $language->get('entry_optipng_optimize_level'); ?></td>
													<td>
														<div class="input-group">
															<select class="form-control" name="asc_jetcache_settings[optipng_optimize_level]">
																<?php foreach ($optipng_optimize_level as $value => $name) { ?>
																	<option value="<?php echo $value; ?>" <?php if (isset($asc_jetcache_settings['optipng_optimize_level']) && $asc_jetcache_settings['optipng_optimize_level'] == $value) { ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
																<?php } ?>
															</select>
														</div>
													</td>
												</tr>
												<tr>
													<td class="left"><?php echo $language->get('entry_image_optipng_command');  ?></td>
													<td class="left">
														<div class="input-group">
															<input class="form-control" type="text" name="asc_jetcache_settings[image_optipng_command]" value="<?php if (isset($asc_jetcache_settings['image_optipng_command'])) echo $asc_jetcache_settings['image_optipng_command']; ?>" size="20" />
														</div>
													</td>
												</tr>

												<!-- /optipng -->

												<tr>
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_features_system'); ?>
													</td>
												</tr>


												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_linux_status'); ?><br>
														<?php echo strtolower(PHP_OS); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_status_success['linux']) && $image_status_success['linux']) {
																echo $language->get('entry_system_yes');
															} else {
																echo $language->get('entry_system_no');
															} ?>
														</div>
													</td>
												</tr>
												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_exec_status'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_status_success['exec']) && $image_status_success['exec']) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_proc_open'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_status_success['proc_open']) && $image_status_success['proc_open']) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_webp_perms'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_status_success['webp_perms']) && $image_status_success['webp_perms']) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>
												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_webp_exec'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_webp) && $image_webp) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>

												<tr>

													<td style="width: 220px;"><?php echo $language->get('entry_system_webp_gd_exec'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_webp_gd) && $image_webp_gd) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>


												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_mozjpeg_perms'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_status_success['mozjpeg_perms']) && $image_status_success['mozjpeg_perms']) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>
												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_mozjpeg_exec'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_mozjpeg) && $image_mozjpeg) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_jpegoptim_perms'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_status_success['jpegoptim_perms']) && $image_status_success['jpegoptim_perms']) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>
												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_jpegoptim_exec'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_jpegoptim) && $image_jpegoptim) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_optipng_perms'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_status_success['optipng_perms']) && $image_status_success['optipng_perms']) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>

												<tr>
													<td style="width: 220px;"><?php echo $language->get('entry_system_optipng_exec'); ?>
													</td>

													<td>
														<div class="input-group jetcache-text-center">
															<?php if (isset($image_optipng) && $image_optipng) echo $language->get('entry_system_yes');
															else echo $language->get('entry_system_no'); ?>

														</div>
													</td>
												</tr>
												<?php if (isset($image_webp) && $image_webp) { ?>
													<tr>
														<td class="jetcache-back jetcache-text-center" style="width: 220px;" colspan="2">
															<?php echo $language->get('entry_webp'); ?>
														</td>

														<td>
													<tr>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_webp_original'); ?><br>
															<span class="jetcache-orange"><?php echo $image_status_success['webp_exec']['image_original_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span>

														</td>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_webp_lossess'); ?><br>
															<span class="jetcache-green"><?php echo $image_status_success['webp_exec']['image_optimized_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span><br>
															<span class="jetcache-purple">-<?php echo $image_status_success['webp_exec']['image_optimized_percent']; ?>%</span>

														</td>
													</tr>

													<td>
														<tr>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['webp_exec']['image_original_url']; ?>">
																</div>

															</td>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['webp_exec']['image_optimized_url']; ?>">
																</div>

															</td>
														</tr>



													</td>
													</tr>


												<?php } ?>


												<?php if (isset($image_webp_gd) && $image_webp_gd) { ?>
													<tr>
														<td class="jetcache-back jetcache-text-center" style="width: 220px;" colspan="2">
															<?php echo $language->get('entry_webp_gd'); ?>
														</td>

														<td>
													<tr>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_webp_gd_original'); ?><br>
															<span class="jetcache-orange"><?php echo $image_status_success['webp_gd_exec']['image_original_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span>

														</td>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_webp_gd_lossess'); ?><br>
															<span class="jetcache-green"><?php echo $image_status_success['webp_gd_exec']['image_optimized_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span><br>
															<span class="jetcache-purple">-<?php echo $image_status_success['webp_gd_exec']['image_optimized_percent']; ?>%</span>

														</td>
													</tr>

													<td>
														<tr>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['webp_gd_exec']['image_original_url']; ?>">
																</div>

															</td>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">



																	<img src="<?php echo $image_status_success['webp_gd_exec']['image_optimized_url']; ?>">
																</div>

															</td>
														</tr>



													</td>
													</tr>


												<?php } ?>


												<?php if (isset($image_mozjpeg) && $image_mozjpeg) { ?>
													<tr>
														<td class="jetcache-back jetcache-text-center" style="width: 220px;" colspan="2">
															<?php echo $language->get('entry_mozjpeg'); ?>
														</td>

														<td>
													<tr>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_mozjpeg_original'); ?><br>
															<span class="jetcache-orange"><?php echo $image_status_success['mozjpeg_exec']['image_original_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span>

														</td>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_mozjpeg_optimized'); ?><br>
															<span class="jetcache-green"><?php echo $image_status_success['mozjpeg_exec']['image_optimized_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span><br>
															<span class="jetcache-purple">-<?php echo $image_status_success['mozjpeg_exec']['image_optimized_percent']; ?>%</span>

														</td>
													</tr>

													<td>
														<tr>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['mozjpeg_exec']['image_original_url']; ?>">
																</div>

															</td>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['mozjpeg_exec']['image_optimized_url']; ?>">
																</div>

															</td>
														</tr>



													</td>
													</tr>


												<?php } ?>


												<?php if (isset($image_jpegoptim) && $image_jpegoptim) { ?>
													<tr>
														<td class="jetcache-back jetcache-text-center" style="width: 220px;" colspan="2">
															<?php echo $language->get('entry_jpegoptim'); ?>
														</td>

														<td>
													<tr>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_jpegoptim_original'); ?><br>
															<span class="jetcache-orange"><?php echo $image_status_success['jpegoptim_exec']['image_original_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span>

														</td>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_jpegoptim_optimized'); ?><br>
															<span class="jetcache-green"><?php echo $image_status_success['jpegoptim_exec']['image_optimized_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span><br>
															<span class="jetcache-purple">-<?php echo $image_status_success['jpegoptim_exec']['image_optimized_percent']; ?>%</span>

														</td>
													</tr>

													<td>
														<tr>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['jpegoptim_exec']['image_original_url']; ?>">
																</div>

															</td>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['jpegoptim_exec']['image_optimized_url']; ?>">
																</div>

															</td>
														</tr>



													</td>
													</tr>


												<?php } ?>


												<!-- ******************************* -->
												<?php if (isset($image_optipng) && $image_optipng) { ?>
													<tr>
														<td class="jetcache-back jetcache-text-center" style="width: 220px;" colspan="2">
															<?php echo $language->get('entry_optipng'); ?>
														</td>

														<td>
													<tr>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_optipng_original'); ?><br>
															<span class="jetcache-orange"><?php echo $image_status_success['optipng_exec']['image_original_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span>

														</td>
														<td style="width: 220px; vertical-align: top;">
															<?php echo $language->get('entry_system_image_optipng_optimized'); ?><br>
															<span class="jetcache-green"><?php echo $image_status_success['optipng_exec']['image_optimized_filesize']; ?> <?php echo $language->get('text_system_byte'); ?></span><br>
															<span class="jetcache-purple">-<?php echo $image_status_success['optipng_exec']['image_optimized_percent']; ?>%</span>

														</td>
													</tr>

													<td>
														<tr>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['optipng_exec']['image_original_url']; ?>">
																</div>

															</td>
															<td style="width: 220px;">
																<div class="input-group jetcache-text-center">
																	<img src="<?php echo $image_status_success['optipng_exec']['image_optimized_url']; ?>">
																</div>

															</td>
														</tr>



													</td>
													</tr>


												<?php } ?>




												<tr>
													<td style="width: 220px;"></td>
													<td></td>
												</tr>

											</table>
										</div>

										<div id="tab-image-ex">
											<table class="mynotable" style="margin-bottom:20px; background: white; vertical-align: center;">



												<tr class="jetcache-back">
													<td colspan="2" class="jetcache-back jetcache-text-center">
														<?php echo $language->get('entry_image_ex'); ?> <span class="jetcache-table-help-href">?</span>
													</td>
												</tr>
												<tr class="odd">
													<td class="jetcache-table-help left">
														<?php echo $language->get('entry_image_ex_help'); ?>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon"></span>
															<textarea class="form-control" name="asc_jetcache_settings[image_ex]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['image_ex'])) {
																																							echo $asc_jetcache_settings['image_ex'];
																																						} else {
																																							echo '';
																																						} ?></textarea>
														</div>
													</td>
												</tr>
												<tr>
													<td class="jetcache-table-help left"></td>
													<td></td>
												</tr>

											</table>
										</div>
									</div>
								</div>
						</div>
						</form>

						<div class="right" style="text-align: right;">

							<div class="input-group" style="float: right;">
								<a href="#pro_show" class="jetcache_pro_show markbuttono sc_button"><?php echo $language->get('entry_show_pro_settings'); ?></a>
								<a href="#pro_hide" class="jetcache_pro_hide markbuttono sc_button"><?php echo $language->get('entry_hide_pro_settings'); ?></a>
							</div>

							<script>
								$('.jetcache_pro_show').click(function() {
									sc = $(this).offset().top;
									th = this;

									$('.jetcache-pro-settings').show();
									$('.jetcache_pro_show').hide();
									$('.jetcache_pro_hide').show();
									/*
	setTimeout(function(el, e) {
		$('html, body').animate({
		    scrollTop: el + $(th).offset().top
		}, 500);
	}, 100, sc, th);
    */
									return false;
								});

								$('.jetcache_pro_hide').click(function() {
									$('.jetcache-pro-settings').hide();
									$('.jetcache_pro_hide').hide();
									$('.jetcache_pro_show').show();
									localStorage.removeItem('jc_pro_click');
									return false;
								});


								string_jc_pro_click = localStorage.getItem('jc_pro_click');

								if (string_jc_pro_click == null) {
									var array_jc_pro_click = [];
									$('.jetcache_pro_hide').hide();
								} else {
									var array_jc_pro_click = JSON.parse(string_jc_pro_click);

									array_jc_pro_click.forEach(function(item, index, array) {
										$('a[href="' + item + '"]').click();
										console.log(item);
									});
								}

								$('.jetcache_pro_show').on('click', function() {
									jc_pro_href = $(this).attr('href');
									array_jc_pro_click.push(jc_pro_href);
									if (array_jc_pro_click.length > 1) {
										array_jc_pro_click.shift();
									}
									localStorage.setItem('jc_pro_click', JSON.stringify(array_jc_pro_click));
								});
							</script>

						</div>




					</div>
					<script type="text/javascript">
						var array_ex_route_row = Array();
						<?php
						foreach ($asc_jetcache_settings['ex_route'] as $indx => $ex_route) {
						?>
							array_ex_route_row.push(<?php echo $indx; ?>);
						<?php
						}
						?>

						var ex_route_row = <?php echo $ex_route_row + 1; ?>;

						function addExRoute() {

							var aindex = -1;
							for (i = 0; i < array_ex_route_row.length; i++) {
								flg = jQuery.inArray(i, array_ex_route_row);
								if (flg == -1) {
									aindex = i;
								}
							}
							if (aindex == -1) {
								aindex = array_ex_route_row.length;
							}
							ex_route_row = aindex;
							array_ex_route_row.push(aindex);

							html = '<tbody id="ex_route_row' + ex_route_row + '">';
							html += '  <tr>';
							html += '  <td class="left">';
							html += '	<div class="input-group">';
							html += ' 	<input type="text" name="asc_jetcache_settings[ex_route][' + ex_route_row + '][type_id]" value="' + ex_route_row + '" class="form-control" size="3">';
							html += '	</div>';
							html += '  </td>';

							html += '  <td class="right">';


							html += '	<div class="input-group" style="margin-bottom: 3px;">';
							html += '		<input type="text" name="asc_jetcache_settings[ex_route][' + ex_route_row + '][route]" value="" class="form-control" style="width: 300px;">';
							html += '	</div>';



							html += '		<td class="right">';
							html += '		  <div class="input-group jetcache-text-center">';
							html += '		  	<select class="form-control jc-select-switch" name="asc_jetcache_settings[ex_route][' + ex_route_row + '][status]">';
							html += '			      <option value="0"><?php echo $text_disabled; ?></option>';
							html += '			      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '		  	</select>';
							html += '		  </div>';
							html += '		</td>';




							html += '  </td>';
							html += '  <td class="left"><a onclick="$(\'#ex_route_row' + ex_route_row + '\').remove(); array_ex_route_row.remove(ex_route_row);" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>';




							html += '  </tr>';
							html += '</tbody>';

							$('#ex_routes tfoot').before(html);

							ex_route_row++;
						}
					</script>
					<script type="text/javascript">
						var array_query_model_row = Array();
						<?php
						foreach ($asc_jetcache_settings['query_model'] as $indx => $query_model) {
						?>
							array_query_model_row.push(<?php echo $indx; ?>);
						<?php
						}
						?>

						var query_model_row = <?php echo $query_model_row + 1; ?>;

						function addQueryModel() {

							var aindex = -1;
							for (i = 0; i < array_query_model_row.length; i++) {
								flg = jQuery.inArray(i, array_query_model_row);
								if (flg == -1) {
									aindex = i;
								}
							}
							if (aindex == -1) {
								aindex = array_query_model_row.length;
							}
							query_model_row = aindex;

							array_query_model_row.push(aindex);

							html = '<tbody id="query_model_row' + query_model_row + '">';
							html += '  <tr>';
							html += '  <td class="left">';
							html += '	<div class="input-group">';
							html += ' 	<input type="text" name="asc_jetcache_settings[query_model][' + query_model_row + '][type_id]" value="' + query_model_row + '" class="form-control" size="3">';
							html += '	</div>';
							html += '  </td>';

							html += '  <td class="right">';
							html += '	<div class="input-group" style="margin-bottom: 3px;">';
							html += '		<input type="text" name="asc_jetcache_settings[query_model][' + query_model_row + '][model]" value="" class="form-control" style="width: 300px;">';
							html += '	</div>';
							html += '  </td>';

							html += '  <td class="right">';
							html += '	<div class="input-group" style="margin-bottom: 3px;">';
							html += '		<input type="text" name="asc_jetcache_settings[query_model][' + query_model_row + '][method]" value="" class="form-control" style="width: 300px;">';
							html += '	</div>';
							html += '  </td>';

							html += '		<td class="right">';
							html += '		  <div class="input-group jetcache-text-center">';
							html += '		  	<select class="form-control jc-select-switch" name="asc_jetcache_settings[query_model][' + query_model_row + '][status]">';
							html += '			      <option value="0"><?php echo $text_disabled; ?></option>';
							html += '			      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '		  	</select>';
							html += '		  </div>';
							html += '		</td>';

							html += '  <td class="left"><a onclick="$(\'#query_model_row' + query_model_row + '\').remove(); array_query_model_row.remove(query_model_row);" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>';

							html += '  </tr>';
							html += '</tbody>';

							$('#query_model tfoot').before(html);

							query_model_row++;
						}
					</script>

					<script type="text/javascript">
						var array_model_row = Array();
						<?php
						foreach ($asc_jetcache_settings['model'] as $indx => $model) {
						?>
							array_model_row.push(<?php echo $indx; ?>);
						<?php
						}
						?>

						var model_row = <?php echo $model_row + 1; ?>;

						function addModel() {

							var aindex = -1;
							for (i = 0; i < array_model_row.length; i++) {
								flg = jQuery.inArray(i, array_model_row);
								if (flg == -1) {
									aindex = i;
								}
							}
							if (aindex == -1) {
								aindex = array_model_row.length;
							}
							model_row = aindex;

							array_model_row.push(aindex);

							html = '<tbody id="model_row' + model_row + '">';

							html += '<tr>';
							html += '				               <td class="left">';
							html += '								<input type="text" name="asc_jetcache_settings[model][' + model_row + '][type_id]" value="' + model_row + '" size="3">';
							html += '				               </td>';

							html += '								<td class="right">';
							html += '									<div style="margin-bottom: 3px;">';
							html += '									<input type="text" name="asc_jetcache_settings[model][' + model_row + '][model]" value="" style="width: 300px;">';
							html += '									</div>';
							html += '								</td>';

							html += '								<td class="right">';
							html += '									<div style="margin-bottom: 3px;">';
							html += '									<input type="text" name="asc_jetcache_settings[model][' + model_row + '][method]" value="" style="width: 200px;">';
							html += '									</div>';
							html += '								</td>';


							html += '									<td class="right">';

							html += '						              <div class="input-group jetcache-text-center" style="margin-bottom: 3px;">';
							html += '						              <select class="form-control jc-select-switch" name="asc_jetcache_settings[model][' + model_row + '][no_getpost]">';

							html += '						                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';


							html += '						              <div class="input-group jetcache-text-center" style="margin-bottom: 3px;">';
							html += '						              <select class="form-control jc-select-switch" name="asc_jetcache_settings[model][' + model_row + '][no_session]">';

							html += '						                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';

							html += '						              <div class="input-group jetcache-text-center" style="margin-bottom: 3px;">';
							html += '						              <select class="form-control jc-select-switch" name="asc_jetcache_settings[model][' + model_row + '][no_url]">';

							html += '						                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';

							html += '						              <div class="input-group jetcache-text-center">';
							html += '						              <select class="form-control jc-select-switch" name="asc_jetcache_settings[model][' + model_row + '][no_route]">';

							html += '						                  <option value="1"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';

							html += '									</td>';

							html += '									<td class="right">';
							html += '						              <div class="input-group jetcache-text-center">';
							html += '						              	<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][' + model_row + '][onefile]">';

							html += '						                  <option value="1"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';
							html += '						              <div class="input-group jetcache-text-center" style="margin-top:10px;">';
							html += '						              	<select class="form-control jc-select-switch" name="asc_jetcache_settings[model][' + model_row + '][ignore]">';

							html += '						                  <option value="1"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';
							html += '									</td>';



							html += '								<td class="right">';
							html += '					              <div class="input-group jetcache-text-center">';
							html += '					              <select class="form-control jc-select-switch" name="asc_jetcache_settings[model][' + model_row + '][status]">';

							html += '					                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '					                  <option value="0"><?php echo $text_disabled; ?></option>';

							html += '					                </select>';
							html += '					                </div>';
							html += '								</td>';


							html += '  								<td class="left"><a onclick="$(\'#model_row' + model_row + '\').remove(); array_model_row.remove(model_row);" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>';


							html += '				              </tr>';



							html += '</tbody>';

							$('#model tfoot').before(html);

							model_row++;
						}
					</script>

					<script type="text/javascript">
						var array_add_cont_row = Array();
						<?php
						foreach ($asc_jetcache_settings['add_cont'] as $indx => $add_cont) {
						?>
							array_add_cont_row.push(<?php echo (int)$indx; ?>);
						<?php
						}
						?>

						var add_cont_row = <?php echo $add_cont_row + 1; ?>;

						function addAddCont() {

							var cont_index = -1;
							for (i = 0; i < array_add_cont_row.length; i++) {
								flg = jQuery.inArray(i, array_add_cont_row);
								if (flg == -1) {
									cont_index = i;
								}
							}
							if (cont_index == -1) {
								cont_index = array_add_cont_row.length;
							}
							add_cont_row = cont_index;
							array_add_cont_row.push(cont_index);

							html = '<tbody id="add_cont_row' + add_cont_row + '">';
							html += '  <tr>';
							html += '  <td class="left">';
							html += '	<div class="input-group">';
							html += ' 	<input type="text" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][type_id]" value="' + add_cont_row + '" class="form-control" size="3">';
							html += '	</div>';
							html += '  </td>';

							html += '  <td class="right">';


							html += '	<div class="input-group" style="margin-bottom: 3px;">';
							html += '		<input type="text" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][cont]" value="" class="form-control" style="width: 300px;">';
							html += '	</div>';

							html += '		<td class="right">';

							html += '		<div class="input-group jetcache-text-center">';
							html += '			<div class="input-group">';
							html += '				<textarea class="form-control" style="height: 39px;" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][only_get]" rows="2" cols="9"></textarea>';
							html += '			</div>';
							html += '		</div>';


							html += '		  <div class="input-group jetcache-text-center">';
							html += '		  	<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][no_getpost]">';
							html += '			      <option value="0"><?php echo $text_disabled; ?></option>';
							html += '			      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '		  	</select>';
							html += '		  </div>';


							html += '						              <div class="input-group jetcache-text-center" style="margin-bottom: 3px;">';
							html += '						              <select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][no_session]">';

							html += '						                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';

							html += '						              <div class="input-group jetcache-text-center" style="margin-bottom: 3px;">';
							html += '						              <select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][no_url]">';

							html += '						                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';

							html += '						              <div class="input-group jetcache-text-center">';
							html += '						              <select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][no_route]">';

							html += '						                  <option value="1"><?php echo $text_enabled; ?></option>';
							html += '						                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';

							html += '						                </select>';
							html += '						                </div>';

							html += '		</td>';

							html += '		<td class="right">';
							html += '		  <div class="input-group jetcache-text-center">';
							html += '		  	<select class="form-control jc-select-switch" name="asc_jetcache_settings[add_cont][' + add_cont_row + '][status]">';
							html += '			      <option value="0"><?php echo $text_disabled; ?></option>';
							html += '			      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
							html += '		  	</select>';
							html += '		  </div>';
							html += '		</td>';



							html += '  </td>';
							html += '  <td class="left"><a onclick="$(\'#add_cont_row' + add_cont_row + '\').remove(); array_add_cont_row.remove(add_cont_row);" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a></td>';




							html += '  </tr>';
							html += '</tbody>';

							$('#add_conts tfoot').before(html);

							add_cont_row++;
						}
					</script>
					<script type="text/javascript">
						form_submit = function() {
							$('#form').submit();
							return false;
						}
						$('.jetcache_save').bind('click', form_submit);
					</script>
					<script type="text/javascript">
						$('#tabs a').tabs();
						$('#tabs-bots a').tabs();
						$('#tabs-minify a').tabs();
						$('#tabs-options a').tabs();
						$('#tabs-image a').tabs();
						$('#tabs-controllers a').tabs();
					</script>
					<script type="text/javascript">
						function odd_even() {
							var kz = 0;
							$('table tr').each(function(i, elem) {
								$(this).removeClass('odd');
								$(this).removeClass('even');
								if ($(this).is(':visible')) {
									kz++;
									if (kz % 2 == 0) {
										$(this).addClass('odd');
									}
								}
							});
						}

						$(document).ready(function() {
							odd_even();

							$('.htabs a').click(function() {
								odd_even();
							});

							$('.vtabs a').click(function() {
								odd_even();
							});

						});

						function input_select_change() {

							$('input').each(function() {
								if (!$(this).hasClass('no_change')) {
									$(this).removeClass('sc_select_enable');
									$(this).removeClass('sc_select_disable');

									if ($(this).val() != '') {
										$(this).addClass('sc_select_enable');
									} else {
										$(this).addClass('sc_select_disable');
									}
								}
							});

							$('select').each(function() {
								if (!$(this).hasClass('no_change')) {
									$(this).removeClass('sc_select_enable');
									$(this).removeClass('sc_select_disable');

									this_val = $(this).find('option:selected').val()

									if (this_val == '1') {
										$(this).addClass('sc_select_enable');
									}

									if (this_val == '0' || this_val == '') {
										$(this).addClass('sc_select_disable');
									}

									if (this_val != '0' && this_val != '1' && this_val != '') {
										$(this).addClass('sc_select_other');
									}
								}
							});
						}


						$(document).ready(function() {
							$('.help').hide();

							input_select_change();

							$("select")
								.change(function() {
									input_select_change();

								});

							$("input")
								.blur(function() {
									input_select_change();
								});


						});


						$('.jetcache-table-help-href, .jetcache-table-help-href-red, .jetcache-table-help-href-green').on('click', function() {
							$('.jetcache-table-help').toggle();
						});


						function select_icon_change(id) {
							if (jQuery.type(id) !== 'string') {
								id = $(this).attr('id');
							}

							$('#' + id + '-icon').removeClass('jetcache-red');
							$('#' + id + '-icon').removeClass('jetcache-orange');
							this_val = $('#' + id).find('option:selected').val()

							if (this_val == '1') {
								$('#' + id + '-icon').addClass('jetcache-red');
							}

							if (this_val == '0' || this_val == '') {
								$('#' + id + '-icon').removeClass('jetcache-red');
								$('#' + id + '-icon').addClass('jetcache-orange');
							}
						}

						$('#id-query-log-status').on('change', select_icon_change);
						$('#edit_product_id').on('change', select_icon_change);

						select_icon_change('id-query-log-status');
						select_icon_change('edit_product_id');
					</script>

					<script type="text/javascript">
						jQuery(document).ready(function() {
							//jQuery(".image-other-status").chained("#image-webp-status");
							jQuery("#add_product").chained("#edit_product_id");
							jQuery("#edit_product").chained("#edit_product_id");
							jQuery("#id-query-log-status").chained("#id-jetcache-query-status");
						});
					</script>
					<!-- Modal -->
					<div class="modal fade" id="id-modal-file-view" role="dialog">
						<div class="modal-dialog" style="width: 99%; height: 100%;">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><?php echo $entry_log_file_view; ?></h4>
								</div>
								<textarea class="modal-body" style="width: 100%; overflow: auto;"></textarea>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $text_close; ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>
				function js_cache_image_remove() {
					$.ajax({
						url: '<?php echo $url_cache_image_remove; ?>',
						method: 'POST',
						cache: false,
						contentType: false,
						processData: false,
						dataType: 'json',
						data: new FormData($('#form')[0]),
						beforeSend: function() {
							$('.div_cache_image_remove').html('<?php echo $language->get('text_loading_main_without'); ?>');
						},
						success: function(json) {
							if (json['error']) {
								$('.div_cache_image_remove').html('<span style=\'color:green\'>' + json['content'] + '<\/span>');
							} else {
								$('.div_cache_image_remove').html('<span style=\'color:green\'>' + json['content'] + '<\/span>');
							}
						},
						error: function(xhr, ajaxOptions, thrownError) {
							console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
							$('.div_cache_image_remove').html('<span style=\'color:red\'><?php echo $language->get('text_cache_remove_fail'); ?><\/span>');
						}
					});
					return false;
				}



				if ($.isFunction($.fn.on)) {
					$(document).on('click', '.jetcache_cache_image_remove', js_cache_image_remove);
				} else {
					$('.jetcache_cache_image_remove').live('click', js_cache_image_remove);
				}

				<?php if (isset($jc_save) && $jc_save) { ?>
					$(document).ready(function() {
						$('#jc_save').click();
					});
				<?php } ?>


				<?php if (isset($refresh_flag) && $refresh_flag) { ?>
					$(document).ready(function() {
						$('#jetcache_ocmod_refresh').click();
					});
				<?php } ?>
			</script>

			<script>
				function tab_history(line) {

					string_jc_tabs_click = localStorage.getItem('jc_tabs_click_' + line);

					if (string_jc_tabs_click == null) {
						var array_jc_tabs_click = [];
					} else {
						var array_jc_tabs_click = JSON.parse(string_jc_tabs_click);

						array_jc_tabs_click.forEach(function(item, index, array) {
							$('a[href="' + item + '"]').click();
							console.log(item);
						});
					}

					$('.jc-tab-' + line).on('click', function() {
						jc_tab_href = $(this).attr('href');
						array_jc_tabs_click.push(jc_tab_href);
						if (array_jc_tabs_click.length > 3) {
							array_jc_tabs_click.shift();
						}
						localStorage.setItem('jc_tabs_click_' + line, JSON.stringify(array_jc_tabs_click));
					});
				}

				tab_history(1);
				tab_history(2);
			</script>







			<style>
				#sticky {}

				.sticky-back {
					background-color: #E1E1E1;
					box-shadow: 0 0 11px rgba(0, 0, 0, 0.2) !important;
				}

				#sticky.stick {
					position: fixed;
					top: 0;
					z-index: 10000;

				}
			</style>

			<script>
				function sticky_relocate() {
					var window_top = $(window).scrollTop();
					var div_top = $('#sticky-anchor').offset().top;

					if (window_top > div_top) {
						$('#sticky').addClass('stick');
						$('#sticky').addClass('sticky-back');
						$('#sticky').css({
							"right": "0px"
						});

					} else {
						$('#sticky').removeClass('stick');
						$('#sticky').removeClass('sticky-back');
						$('#sticky').css({
							"margin-left": "0px"
						});
					}
				}

				$(function() {
					div_left = $('#sticky').offset().left - 60;
					$(window).scroll(sticky_relocate);
					sticky_relocate();
				});
			</script>


			<?php if (isset($jetcache_ocmod_none) && $jetcache_ocmod_none) { ?>
				<script>
					$(document).ready(function() {
						$('a[href=\'#tab-options\']').trigger('click');
						$('a[href=\'#tab-options-install\']').trigger('click');
					});
				</script>
			<?php } ?>

			<script>
				$('.alert').on('click', function() {
					$(this).hide(1000)
				});
				setTimeout(function() {
					$('.alert').hide(1000);
				}, 2000, '.alert');
				$('.success').on('click', function() {
					$(this).hide(1000)
				});
				setTimeout(function() {
					$('.success').hide(1000);
				}, 4000, '.success');
			</script>
			<script>
				$(document).ready(function() {
					$('#content-tabs').show();
				});
			</script>

			<script>
				const customToggles = document.querySelectorAll('.jc-select-toggle');

				customToggles.forEach((customToggle) => {
					const toggleSwitch = customToggle.querySelector('.jc-select-switch');
					const options = toggleSwitch.querySelectorAll('option');

					function updateToggleState(context) {
						for (let i = 0; i < options.length; i++) {
							if (options[i].hasAttribute('selected')) {
								toggleSwitch.value = options[i].value;
								if (toggleSwitch.value === '1') {
									context.classList.add('jc-select-on');
									context.classList.remove('jc-select-off');
									context.setAttribute('data-value', options[i].textContent);
								} else {
									context.classList.add('jc-select-off');
									context.classList.remove('jc-select-on');
									context.setAttribute('data-value', options[i].textContent);
								}
								break;
							}
						}
					}

					customToggle.addEventListener('click', function() {
						click_options = this.querySelectorAll('option');

						if (click_options.length > 1) {
							const jetcache_saves = document.querySelectorAll('.jetcache_save');
							jetcache_saves.forEach((jetcache_save) => {
								jetcache_save.classList.add('jc-must-save');
							})
							toggleSwitch.value = toggleSwitch.value === '1' ? '0' : '1';
							for (let i = 0; i < options.length; i++) {
								if (options[i].hasAttribute('selected')) {
									options[i].removeAttribute('selected');
								} else {
									options[i].setAttribute('selected', 'selected');
								}
							}
							updateToggleState(this);
						}

					});

					updateToggleState(customToggle);
				});
			</script>


		</div>
	</div>
</div>


<?php if (SC_VERSION > 15) { ?>
	<style>
		#content-tabs {
			display: block;
		}
	</style>
<?php } ?>
<?php echo $footer; ?>