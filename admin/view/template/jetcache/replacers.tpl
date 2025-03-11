			<div class="flex-box" style="text-align: center; background-color: #EDF0F2; padding: 2px; margin-top: 8px;">
				<div>
					&nbsp;
				</div>

				<div>
					<span class="nohref" style="font-size: 16px;"><?php echo $language->get('entry_replacers_status'); ?></span>
				</div>

                 <div>
						<div class="input-group jetcache-text-center">
						<div class="jc-select-toggle">
							<select class="form-control jc-select-switch" name="asc_jetcache_settings[replacers_status]" id="id-replacers_status">
								<?php if (isset($asc_jetcache_settings['replacers_status']) && $asc_jetcache_settings['replacers_status']) { ?>
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

				<div>
					&nbsp;
				</div>
            </div>

			<div class="flex-box" style="margin-top: 6px; text-align: center; font-weight: 500; background-color: #EDF0F2;">


				<div style="text-align: center; width: 10%;">
                   	<?php echo $language->get('text_replacer_comment'); ?>
	            </div>

				<div style="text-align: center; width: 33%;">
                   	<?php echo $language->get('text_replacer_in'); ?>
	            </div>

				<div style="text-align: center; width: 33%;">
                   	<?php echo $language->get('text_replacer_out'); ?>
	            </div>


				<div style="text-align: center; width: 15%;">
	               	<?php echo $language->get('text_replacer_options'); ?>
	            </div>

				<div style="text-align: center; width: 9%;">
	               	<?php echo $language->get('text_replacer_action'); ?>
	            </div>

			</div>

			<style>
				
				#replacers {
					text-align: left;
				}
				.replacer_more_show {
					display: block;
				}
				.replacer_more_hide {
					display: none;
				}		
				.replacer_more_a {
					color: #1e91cf;	
				}
				.replacer_more_a:visited {
					color: #1e91cf;	
				}
				.rodd {
					background: #FAFAFA;			
				}
				</style>
			<script>
				function replacers_more(th) {
					if ($(th).parent().parent().find('.replacer_more').hasClass('replacer_more_hide')) {
						$(th).parent().parent().find('.replacer_more').removeClass('replacer_more_hide').addClass('replacer_more_show');
					} else {
						$(th).parent().parent().find('.replacer_more').removeClass('replacer_more_show').addClass('replacer_more_hide');
					}
				}
			</script>

			<div id="replacers" style="clear: both; width: 100%">
            <?php
				if (!empty($asc_jetcache_settings['replacers'])) {


					$rclass = 'rodd'; 
					
						

					foreach ($asc_jetcache_settings['replacers'] as $replacer_num => $replacer) {
						$rclass = ($rclass == 'reven' ? 'rodd' : 'reven'); 
            ?>
				<div id="replacer-<?php echo $replacer_num; ?>" class="flex-box <?php echo $rclass; ?>" style="text-align: center;">




					<div style="text-align: center; padding: 4px; width: 10%;">
						<div class="input-group">
							<textarea class="form-control" cols="50" rows="3" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][comment]"><?php if (isset($replacer['comment']) && $replacer['comment'] != '') { echo $replacer['comment']; } else { echo ''; } ?></textarea>
		               	</div>
	                </div>

					<div style="text-align: center; padding: 4px; width: 33%;">
						<div class="input-group">
							<span class="input-group-addon"></span>
							<textarea class="form-control" cols="50" rows="5" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][in]"><?php if (isset($replacer['in']) && $replacer['in'] != '') { echo $replacer['in']; } else { echo ''; } ?></textarea>
		               	</div>
	                </div>

					<div style="text-align: center; padding: 4px; width: 33%;">
						<div class="input-group">
							<span class="input-group-addon"></span>
							<textarea class="form-control" cols="50" rows="5" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][out]"><?php if (isset($replacer['out']) && $replacer['out'] != '') { echo $replacer['out']; } else { echo ''; } ?></textarea>
		               	</div>
	                </div>

					<div style="text-align: center; padding: 4px; width: 15%;">
						
						<div style="text-align: left; margin-top: 0px;">
	               			<?php echo $language->get('text_replacer_status'); ?>
	            		</div>						
						<div class="input-group jetcache-text-center">
						<div class="jc-select-toggle">	
						<select class="form-control jc-select-switch" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][status]">
								<?php if (isset($replacer['status']) && $replacer['status']) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0"><?php echo $text_disabled; ?></option>
								<?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
								<?php } ?>
							</select>
								</div>
						</div>							
						

						<div style="text-align: left; margin-top: 6px;">
									<?php echo $language->get('text_replacer_device'); ?>
								</div>
								<div class="input-group jetcache-text-center">
									<select class="form-control" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][device]">
										<!-- all -->	
										<option value="0" <?php if (isset($replacer['device']) && (int)$replacer['device'] == 0) { ?>selected="selected"<?php } ?>><?php echo $language->get('text_replacer_device_all'); ?></option>
										
										<!-- comp -->
										<option value="1" <?php if (isset($replacer['device']) && (int)$replacer['device'] == 1) { ?>selected="selected"<?php } ?>><?php echo $language->get('text_replacer_device_comp'); ?></option>
										
										<!-- mobile -->
										<option value="2" <?php if (isset($replacer['device']) && (int)$replacer['device'] == 2) { ?>selected="selected"<?php } ?>><?php echo $language->get('text_replacer_device_mob'); ?></option>
										
										<!-- smart -->
										<option value="3" <?php if (isset($replacer['device']) && (int)$replacer['device'] == 3) { ?>selected="selected"<?php } ?>><?php echo $language->get('text_replacer_device_smart'); ?></option>
										
										<!-- pad -->
										<option value="4" <?php if (isset($replacer['device']) && (int)$replacer['device'] == 4) { ?>selected="selected"<?php } ?>><?php echo $language->get('text_replacer_device_pad'); ?></option>
									</select>
								</div>


						<div>
							<div style="text-align: left; margin-top: 6px;">
								<a href="#" class="replacer_more_a" onclick="replacers_more(this); return false;"><?php echo $language->get('text_replacer_more'); ?></a>
							</div>		
							
							



						
							<div class="replacer_more replacer_more_hide">	
								<div style="text-align: left; margin-top: 6px;">
									<?php echo $language->get('text_replacer_all'); ?>
								</div>
								<div class="input-group jetcache-text-center">
								<div class="jc-select-toggle">	
								<select class="form-control jc-select-switch" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][all]">
										<?php if (isset($replacer['all']) && $replacer['all']) { ?>
										<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
										<option value="0"><?php echo $text_disabled; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_enabled; ?></option>
										<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
										<?php } ?>
									</select>
										</div>
								</div>
							

								



						
								<div style="text-align: left; margin-top: 6px;">
									<?php echo $language->get('text_replacer_route'); ?>
								</div>
								<div style="text-align: center; ">
									<div class="input-group">
										<textarea class="form-control" cols="50" rows="1" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][route]"><?php if (isset($replacer['route']) && $replacer['route'] != '') { echo $replacer['route']; } else { echo ''; } ?></textarea>
									</div>
								</div>

								<div>
									<div style="text-align: left; margin-top: 6px;">
										<?php echo $language->get('text_jetcache_uri'); ?>
									</div>

									<div>
										<div class="input-group">
											<input class="form-control template" size="30" type="text" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][uri]" value="<?php if (isset($replacer['uri'])) echo $replacer['uri']; ?>">
										</div>
									</div>

								</div>


						
						<div>
							<div style="text-align: left; margin-top: 6px;">
								<?php echo $language->get('text_jetcache_langs'); ?>
							</div>

							<div>
								<div class="scrollbox" style="text-align: left; width: 100% !important; height: 100% !important; min-height: 37px;">
									<?php $class = 'odd'; ?>
									<?php foreach ($languages as $lang) { ?>
										<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
										<div class="<?php echo $class; ?>">
											<?php if (isset($replacer['langs']) && in_array($lang['language_id'], $replacer['langs'])) { ?>
												<input type="checkbox" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][langs][]" value="<?php echo $lang['language_id']; ?>" checked="checked" />
												<?php echo $lang['name']; ?>
											<?php } else { ?>
												<input type="checkbox" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][langs][]" value="<?php echo $lang['language_id']; ?>" />
												<?php echo $lang['name']; ?>
											<?php } ?>
										</div>
									<?php } ?>

								</div>
								<a onclick="$(this).parent().find(':checkbox').prop('checked', true);" class="nohref"><?php echo $language->get('text_select_all'); ?></a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);" class="nohref"><?php echo $language->get('text_unselect_all'); ?></a>
							</div>

						</div>


						<div>
							<div style="text-align: left; margin-top: 6px;">
								<?php echo $language->get('text_jetcache_stores'); ?>
							</div>

							<div>
								<div class="scrollbox" style="text-align: left; width: 100% !important; height: 100% !important; min-height: 37px;">
									<?php $class = 'odd'; ?>
									<?php foreach ($stores as $store) { ?>
										<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
										<div class="<?php echo $class; ?>">
											<?php if (isset($replacer['stores']) && in_array($store['store_id'], $replacer['stores'])) { ?>
												<input type="checkbox" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][stores][]" value="<?php echo $store['store_id']; ?>" checked="checked" />
												<?php echo $store['name']; ?>
											<?php } else { ?>
												<input type="checkbox" name="asc_jetcache_settings[replacers][<?php echo $replacer_num; ?>][stores][]" value="<?php echo $store['store_id']; ?>" />
												<?php echo $store['name']; ?>
											<?php } ?>
										</div>
									<?php } ?>

								</div>
								<a onclick="$(this).parent().find(':checkbox').prop('checked', true);" class="nohref"><?php echo $language->get('text_select_all'); ?></a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);" class="nohref"><?php echo $language->get('text_unselect_all'); ?></a>
							</div>

						</div>






							</div>						
						</div>
					
					</div>


					<div style="text-align: center; padding: 8px; width: 9%;">
                    	<a onclick="$('#replacer-<?php echo $replacer_num; ?>').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a>
	                </div>
                </div>

              <?php
              			$replacer_num++;
					}
				}
              ?>
	



			</div>

            <div id="replacers-add" style="clear: both; text-align: center; margin-top:10px; width: 100%">
	            <a id="replacers-add-a" onclick="addReplacer();" class="markbutton nohref"><?php echo $language->get('entry_add_rule'); ?></a>
			</div>



			<div class="flex-box" style="text-align: center; background-color: #EDF0F2; padding: 2px; margin-top: 16px; margin-bottom: 8px;">
				<div>
					&nbsp;
				</div>

				<div>
					<?php echo $language->get('entry_lazy_ex_route'); ?>
				</div>

				<div>
					&nbsp;
				</div>
            </div>


			<div class="input-group"><span class="input-group-addon"></span>
				<textarea class="form-control" name="asc_jetcache_settings[replacers_ex_route]" rows="5" cols="50"><?php if (isset($asc_jetcache_settings['replacers_ex_route'])) { echo $asc_jetcache_settings['replacers_ex_route']; } else { echo ''; } ?></textarea>
			</div>





<script>
var replacer_num_array = new Array();
//replacer_num_array.push(0);
<?php

if (!empty($asc_jetcache_settings['replacers'])) {
	foreach ($asc_jetcache_settings['replacers'] as $replacer_num => $replacer) {
?>
replacer_num_array.push(<?php echo $replacer_num; ?>);
<?php
	}
}
?>
</script>


<script>
function addReplacer() {

	var replacer_index = -1;
	for(replacer_i = 0; replacer_i < replacer_num_array.length; replacer_i++) {
	 replacer_flg = jQuery.inArray(replacer_i, replacer_num_array);
	 if (replacer_flg == -1) { replacer_index = replacer_i; }
	}
	if (replacer_index == -1) { replacer_index = replacer_num_array.length; }
	replacer_num = replacer_index;
	replacer_num_array.push(replacer_index);
	console.log(replacer_index);

html  = '				<div id="replacer-' + replacer_num + '" class="flex-box" style="text-align: center;">';



html += '					<div style="text-align: center; padding: 8px; width: 10%;">';
html += '						<div class="input-group">';
html += '							<span class="input-group-addon"></span>';
html += '							<textarea class="form-control" cols="50" rows="3" name="asc_jetcache_settings[replacers][' + replacer_num + '][comment]"></textarea>';
html += '		               	</div>';
html += '	                </div>';
html += '					<div style="text-align: center; padding: 8px; width: 33%;">';
html += '						<div class="input-group">';
html += '							<span class="input-group-addon"></span>';
html += '							<textarea class="form-control" cols="50" rows="8" name="asc_jetcache_settings[replacers][' + replacer_num + '][in]"></textarea>';
html += '		               	</div>';
html += '	                </div>';

html += '					<div style="text-align: center; padding: 8px; width: 33%;">';
html += '						<div class="input-group">';
html += '							<span class="input-group-addon"></span>';
html += '							<textarea class="form-control" cols="50" rows="8" name="asc_jetcache_settings[replacers][' + replacer_num + '][out]"></textarea>';
html += '		               	</div>';
html += '	                </div>';



html += '					<div style="text-align: center; padding: 8px; width: 15%;">';
					
html += '						<div style="text-align: left; margin-top: 6px;">';
html += '	               			<?php echo $language->get('text_replacer_status'); ?>';
html += '	            		</div>';
html += '						<div class="input-group jetcache-text-center">';
html += '							<select class="form-control" name="asc_jetcache_settings[replacers][' + replacer_num + '][status]">';
html += '								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
html += '								<option value="0"><?php echo $text_disabled; ?></option>';
html += '							</select>';
html += '						</div>';
html += '								<div style="text-align: left; margin-top: 6px;">';
html += '									<?php echo $language->get('text_replacer_device'); ?>';
html += '								</div>';
html += '								<div class="input-group jetcache-text-center">';
html += '									<select class="form-control" name="asc_jetcache_settings[replacers][' + replacer_num + '][device]">';
html += '';
html += '										<option value="0" selected="selected"><?php echo $language->get('text_replacer_device_all'); ?></option>';
html += '										<option value="1"><?php echo $language->get('text_replacer_device_comp'); ?></option>';
html += '										<option value="2"><?php echo $language->get('text_replacer_device_mob'); ?></option>';
html += '										<option value="3"><?php echo $language->get('text_replacer_device_smart'); ?></option>';
html += '										<option value="4"><?php echo $language->get('text_replacer_device_pad'); ?></option>';
html += '									</select>';
html += '								</div>';
html += '';
html += '						<div>';
html += '							<div style="text-align: left; margin-top: 6px;">';
html += '								<a href="#" class="replacer_more_a" onclick="replacers_more(this); return false;"><?php echo $language->get('text_replacer_more'); ?></a>';
html += '							</div>';
html += '';
html += '							<div class="replacer_more replacer_more_hide">';
html += '								<div style="text-align: left; margin-top: 6px;">';
html += '									<?php echo $language->get('text_replacer_all'); ?>';
html += '								</div>';
html += '								<div class="input-group jetcache-text-center">';
html += '									<select class="form-control" name="asc_jetcache_settings[replacers][' + replacer_num + '][all]">';
html += '										<option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
html += '										<option value="0"><?php echo $text_disabled; ?></option>';
							
html += '									</select>';
html += '								</div>';
html += '';
html += '';

html += '';
html += '';
html += '';
html += '';
html += '								<div style="text-align: left; margin-top: 6px;">';
html += '									<?php echo $language->get('text_replacer_route'); ?>';
html += '								</div>';
html += '								<div style="text-align: center; ">';
html += '									<div class="input-group">';
html += '										<textarea class="form-control" cols="50" rows="1" name="asc_jetcache_settings[replacers][' + replacer_num + '][route]"></textarea>';
html += '									</div>';
html += '								</div>';



html += '								<div>';
html += '									<div style="text-align: left; margin-top: 6px;">';
html += '										<?php echo $language->get('text_jetcache_uri'); ?>';
html += '									</div>';

html += '									<div>';
html += '										<div class="input-group">';
html += '											<input class="form-control template" size="30" type="text" name="asc_jetcache_settings[replacers][' + replacer_num + '][uri]" value="">';
html += '										</div>';
html += '									</div>';

html += '								</div>';


html += '						<div>';
html += '							<div style="text-align: left; margin-top: 6px;">';
html += '								<?php echo $language->get('text_jetcache_langs'); ?>';
html += '							</div>';

html += '							<div>';
html += '								<div class="scrollbox" style="text-align: left; width: 100% !important; height: 100% !important; min-height: 37px;">';
html += '									<?php $class = 'odd'; ?>';
html += '									<?php foreach ($languages as $lang) { ?>';
html += '										<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>';
html += '										<div class="<?php echo $class; ?>">';
html += '											<?php if (isset($replacer['langs']) && in_array($lang['language_id'], $replacer['langs'])) { ?>';
html += '												<input type="checkbox" name="asc_jetcache_settings[replacers][' + replacer_num + '][langs][]" value="<?php echo $lang['language_id']; ?>" checked="checked" />';
html += '												<?php echo $lang['name']; ?>';
html += '											<?php } else { ?>';
html += '												<input type="checkbox" name="asc_jetcache_settings[replacers][' + replacer_num + '][langs][]" value="<?php echo $lang['language_id']; ?>" />';
html += '												<?php echo $lang['name']; ?>';
html += '											<?php } ?>';
html += '										</div>';
html += '									<?php } ?>';

html += '								</div>';
html += '								<a onclick="$(this).parent().find(":checkbox").prop("checked", true);" class="nohref"><?php echo $language->get('text_select_all'); ?></a> / <a onclick="$(this).parent().find(":checkbox").prop("checked", false);" class="nohref"><?php echo $language->get('text_unselect_all'); ?></a>';
html += '							</div>';

html += '						</div>';


html += '						<div>';
html += '							<div style="text-align: left; margin-top: 6px;">';
html += '								<?php echo $language->get('text_jetcache_stores'); ?>';
html += '							</div>';

html += '							<div>';
html += '								<div class="scrollbox" style="text-align: left; width: 100% !important; height: 100% !important; min-height: 37px;">';
html += '									<?php $class = 'odd'; ?>';
html += '									<?php foreach ($stores as $store) { ?>';
html += '										<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>';
html += '										<div class="<?php echo $class; ?>">';
html += '											<?php if (isset($replacer['stores']) && in_array($store['store_id'], $replacer['stores'])) { ?>';
html += '												<input type="checkbox" name="asc_jetcache_settings[replacers][' + replacer_num + '][stores][]" value="<?php echo $store['store_id']; ?>" checked="checked" />';
html += '												<?php echo $store['name']; ?>';
html += '											<?php } else { ?>';
html += '												<input type="checkbox" name="asc_jetcache_settings[replacers][' + replacer_num + '][stores][]" value="<?php echo $store['store_id']; ?>" />';
html += '												<?php echo $store['name']; ?>';
html += '											<?php } ?>';
html += '										</div>';
html += '									<?php } ?>';

html += '								</div>';
html += '								<a onclick="$(this).parent().find(":checkbox").prop("checked", true);" class="nohref"><?php echo $language->get('text_select_all'); ?></a> / <a onclick="$(this).parent().find(":checkbox").prop("checked", false);" class="nohref"><?php echo $language->get('text_unselect_all'); ?></a>';
html += '							</div>';

html += '						</div>';

html += '							</div>';
html += '						</div>';
html += '					</div>';


html += '					<div style="text-align: center; padding: 8px; width: 9%;">';
html += '                    	<a onclick="$(\'#replacer-' + replacer_num + '\').remove();" class="markbutton button_purple nohref"><?php echo $button_remove; ?></a>';
html += '	                </div>';
html += '                </div>';


	$('#replacers').append(html);

}
</script>

<style>
.flex-box {
	display: flex;
	align-items: center;
	align-content: stretch;
	justify-content: space-between;
}
.flex-box > div {
	 width: 33.3%;
}
</style>
