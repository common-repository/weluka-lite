<?php
/**
 * builder snipet script
 * @since 1.0
 */
$_builder = WelukaBuilder::get_instance();
?>
<div id="weluka-builder-snippets">

<div id="weluka-builder-widget-nav-wrapper">
	<div data-target="#weluka-builder-widget-nav" id="weluka-builder-widget-toggle-switch" class="active"></div>
    <div id="weluka-builder-widget-nav">
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="text"><i class="fa fa-pencil"></i></div>
        <div class="weluka-widget-nav-popover hide">
            <div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_TEXT; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Paragraph', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="images"><i class="fa fa-picture-o"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_IMG; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Image', Weluka::$settings['plugin_name']); ?>
            </div>
<?php /* pro
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Icon', Weluka::$settings['plugin_name']); ?>
            </div>
            <div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Slide', Weluka::$settings['plugin_name']); ?>
            </div>
*/ ?>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="buttons"><i class="fa fa-external-link"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_BUTTON; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Link Button', Weluka::$settings['plugin_name']); ?>
            </div>
<?php /* pro
        	<div class="weluka-pop-draggable txt-disabled"">
            	<i class="fa fa-arrows"></i><?php _e('Social Button', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Social Share Button', Weluka::$settings['plugin_name']); ?>
            </div>
*/ ?>
        </div>
<?php /* pro
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="medias"><i class="fa fa-film"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Movie', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Audio', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>
*/ ?>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="apps"><i class="fa fa-briefcase"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_HORLINE; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Horizontal Line', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_ALERT; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Alert', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_EMBED; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Embed Code', Weluka::$settings['plugin_name']); ?>
            </div>
<?php /* pro
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Accordion Panel', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Tab Panel', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('Google Map', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-pop-draggable txt-disabled">
            	<i class="fa fa-arrows"></i><?php _e('List', Weluka::$settings['plugin_name']); ?>
            </div>
*/ ?>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="wordpress"><i class="fa fa-wordpress"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_ARCHIVES; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Archive List', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_MENU; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Custom Menu', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_CALENDAR; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Calendar', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_CATEGORIES; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Categories', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_META; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Meta', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php if( ! is_page() ) : ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_PAGES; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Pages', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php endif; ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_COMMENTS; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Recent Comments', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php if ( 'post' !== get_post_type() ) : ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_POSTS; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Recent Posts', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php endif; ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_RSS; ?>">
            	<i class="fa fa-arrows"></i><?php _e('RSS', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_SEARCH; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Search', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_TAGCLOUD; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Tag Cloud', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>
        <?php
		$postType = get_post_type();
		$welukaTheme = class_exists( 'WelukaTheme', false );
		if( $welukaTheme && $postType === Weluka::$settings['cpt_hd'] ) { }
		elseif ( $welukaTheme && $postType === Weluka::$settings['cpt_ft'] ) { }
		elseif ( $welukaTheme && $postType === Weluka::$settings['cpt_sd'] ){ }
		else { ?>
        <div class="weluka-widget-nav-click weluka-tip" data-type="<?php echo WelukaBuilder::WIDGET_PAGE_SETTING; ?>" title="page settings"><i class="fa fa-cog"></i></div>
        <?php } ?>
    </div>
</div>
<?php //dialog etc ?>

<?php //modal dialog img setting ?>
<div id="weluka-img-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="imgSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="imgSettingModalLabel" class="modal-title"><?php _e('Image Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-img-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-img-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-image-setting-form" name="weluka-image-setting-form" role="form">
                    			<div id="wleuka-img-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingSourceType"><?php _e('Image Source', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<select id="welukaImageSettingSourceType" name="welukaImageSettingSourceType" class="form-control" disabled="disabled">
    	                                        	<option value="media"><?php _e('Media Libraly', Weluka::$settings['plugin_name']); ?></option>
        	                                    	<option value="" style="color:#c1c1c1;"><?php _e('External Url', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
                                                <div class="help-block">
        											<?php _e( 'Lite Version is only Media Libraly.',  Weluka::$settings['plugin_name'] ); ?>
												</div>
                                            </div>
                                        </div>
  									</div>
                                    <!-- media input area -->
                                    <div class="form-group">
  									<div id="weluka-image-setting-media-input-area" class="form-group weluka-settings-media-input-panel weluka-panel-active">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Media', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                            	<div id="weluka-image-setting-media-input-content"></div>
                                            </div>
                                        </div>
  									</div>
                                    <div id="weluka-image-setting-extern-input-area" class="form-group weluka-settings-media-input-panel">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                            	<div id="weluka-image-setting-media-extern-content">
                                                	<div class="weluka-row clearfix">
                                                    	<div class="weluka-col-xs-4">
		                                                	<div class="img-thumb-wrap"></div>
                                                        </div>
    	                                                <div class="weluka-col-xs-8">
	                                                        <input id="welukaImageSettingExternUrl" name="welukaImageSettingExternUrl" type="text" class="form-control" />
                                                    	</div>
                                                	</div>
                                                </div>
                                            </div>
                                        </div>
  									</div>
                                    </div><!-- /media input area -->
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingFit"><?php _e('Fit width', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaImageSettingFit" name="welukaImageSettingFit" type="checkbox" value="on" />
                                                <label for="welukaImageSettingFit"><?php _e('I will full width display in the block.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <?php $_builder->weluka_display_align_settings('welukaImageSettingAlign', '', false); ?>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingShape"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
		                                        <?php $_builder->weluka_display_imgshape_settings('welukaImageSettingShape', '', false); ?>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><strong><label for="welukaImageSettingLinkAction"><?php _e('Link', Weluka::$settings['plugin_name']); ?></label></strong></div>
                                            <div class="weluka-col-md-8">
		                                        <select id="welukaImageSettingLinkAction" name="welukaImageSettingLinkAction" class="form-control" data-panel-target="#weluka-img-setting-modal">
    		                                    	<option value="" selected="selected"><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
                                                    <option value="<?php echo WelukaBuilder::LINK_ACTION_GOTOLINK; ?>"><?php _e('Url', Weluka::$settings['plugin_name']); ?></option>
            	    	                        </select>
                                                <div class="weluka-mgtop-s help-block"><?php _e('If the image is of an external site, ZOOM can not be used.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
  									</div>
                                    <div class="welukaSettingLinkInputArea">
                                    	<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Link Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            	<div class="weluka-col-md-8">
	                                            	<input id="welukaImageSettingLinkUrl" name="welukaImageSettingLinkUrl" type="text" class="form-control" />
                                                    <input id="welukaImageSettingLinkTarget" name="welukaImageSettingLinkTarget" type="checkbox" value="_blank" />
                                                    <label for="welukaImageSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
                                                    <div class="weluka-mgtop-s">
                                    					<button type="button" data-link-target="widgetimgmodal" data-link-textarea="#welukaImageSettingLinkUrl" class="weluka-wplink-button weluka-btn-org weluka-btn weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
                                                    </div>
 	                                           	</div>
    	                                    </div>
                                        </div>
									</div><!-- /#welukaImageSettingLinkInputArea -->
                        		</div><!-- /#weluka-img-setting-panel-general -->
                    			<div id="wleuka-img-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Image', array('border')); ?>
									<?php $_builder->weluka_display_margin_setting('Image'); ?>
									<?php $_builder->weluka_display_css_setting('Image'); ?>
                        		</div><!-- /#wleuka-img-setting-panel-advanced -->
                                <input type="hidden" id="welukaImageSettingInvoker" name="welukaImageSettingInvoker" value="" />
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-img-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end img setting modal ?>

<?php //modal dialog text title setting ?>
<div id="weluka-text-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="textSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="textSettingModalLabel" class="modal-title"><?php _e('Text Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-text-setting-panel-advanced" class="active weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-text-setting-form" name="weluka-text-setting-form" role="form">
                    			<div id="wleuka-text-setting-panel-advanced" class="weluka-panel-active weluka-builder-settings-panel">

									<?php $_builder->weluka_display_style_setting('Text'); ?>
    	                       		<div class="form-group">
										<div class="weluka-row clearfix">
            	                            <div class="weluka-col-md-4">
                	                        	<div id="welukaTextSettingShadowPreview"><span>Shadow</span></div>
                    	                    </div>
											<div class="weluka-col-md-4">
                            	            	<label for="welukaButtonSettingText"><?php _e('Text Shadow Style', Weluka::$settings['plugin_name']); ?></label>
												<select id="welukaTextSettingShadowStyle" name="welukaTextSettingShadowStyle" class="form-control">
        											<option value=""></option>
        											<option value="basic"><?php _e('Basic', Weluka::$settings['plugin_name']); ?></option>
        											<option value="hard"><?php _e('Hard', Weluka::$settings['plugin_name']); ?></option>
        											<option value="vintage"><?php _e('Vintage', Weluka::$settings['plugin_name']); ?></option>
    	       									</select>
	                                        </div>
        	                                <div class="weluka-col-md-4">
												<label><?php _e('Shadow Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaTextSettingShadowColorWrap"></div>
                    	                    </div>
                        	            </div>
  									</div>
									<?php $_builder->weluka_display_margin_setting('Text'); ?>
									<?php $_builder->weluka_display_css_setting('Text'); ?>
								</div>
							</form>                             
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-text-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-text-setting-modal ?>

<?php //modal dialog button setting ?>
<div id="weluka-button-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="buttonSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="buttonSettingModalLabel" class="modal-title"><?php _e('Button Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-button-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-button-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-button-setting-form" name="weluka-button-setting-form" role="form">
                    			<div id="wleuka-button-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                           			<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaButtonSettingText"><?php _e('Button Text', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
	                                        	<input id="welukaButtonSettingText" name="welukaButtonSettingText" type="text" class="form-control" />
                                        	</div>
                                    	</div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaButtonSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <?php $_builder->weluka_display_align_settings('welukaButtonSettingAlign', '', false); ?>
                                            </div>
                                        </div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><strong><label for="welukaButtonSettingLinkAction"><?php _e('Link', Weluka::$settings['plugin_name']); ?></label></strong></div>
                                        	<div class="weluka-col-md-8">
		                                		<select id="welukaButtonSettingLinkAction" name="welukaButtonSettingLinkAction" class="form-control" data-panel-target="#weluka-button-setting-modal">
    		                                		<option value="" selected="selected"><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
                                                	<option value="<?php echo WelukaBuilder::LINK_ACTION_GOTOLINK; ?>"><?php _e('Url', Weluka::$settings['plugin_name']); ?></option>
            	    	                    	</select>
                                        	</div>
                                    	</div>
  									</div>
                                	<div class="welukaSettingLinkInputArea">
                                		<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Link Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            	<div class="weluka-col-md-8">
	                                        		<input id="welukaButtonSettingLinkUrl" name="welukaButtonSettingLinkUrl" type="text" class="form-control" />
                                                	<input id="welukaButtonSettingLinkTarget" name="welukaButtonSettingLinkTarget" type="checkbox" value="_blank" />
                                                	<label for="welukaButtonSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
                                                	<div class="weluka-mgtop-s">
                                    					<button type="button" data-link-target="widgetbuttonmodal" data-link-textarea="#welukaButtonSettingLinkUrl" class="weluka-wplink-button weluka-btn weluka-btn-org weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
	                                            	</div>
 		                                    	</div>
    		                            	</div>
            	                        </div>
									</div><!-- /#welukaButtonSettingLinkInputArea -->
                                    <h5><?php _e('Button Style', Weluka::$settings['plugin_name']); ?></h5>
                                    <div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-6"><div id="welukaButtonSettingPreview"></div></div>
                                        <div class="weluka-col-md-6">
                           					<div class="form-group">
                                                <?php $_builder->weluka_display_buttoncolor_settings('welukaButtonSettingColor'); ?>
                                    		</div>
                                   			<div class="form-group">
                                                <?php $_builder->weluka_display_buttonshape_settings('welukaButtonSettingShape'); ?>
  											</div>
                           					<div class="form-group">
                                                <?php $_builder->weluka_display_buttonsize_settings('welukaButtonSettingSize'); ?>
                                                <input id="welukaButtonSettingBlock" name="welukaButtonSettingBlock" type="checkbox" value="1" />
                                                <label for="welukaButtonSettingBlock"><?php _e('A button block size.', Weluka::$settings['plugin_name']); ?></label>
                                        	</div>
                                    	</div>
                                    </div>
								</div><!-- /#wleuka-button-setting-panel-general -->
                    			<div id="wleuka-button-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('Button'); ?>
									<?php $_builder->weluka_display_css_setting('Button'); ?>
                        		</div><!-- /#wleuka-button-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-button-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-button-setting-modal ?>

<?php //app horline dialog setting ?>
<div id="weluka-apphorline-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="apphorlineSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="apphorlineSettingModalLabel" class="modal-title"><?php _e('Horizontal Line Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-apphorline-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-apphorline-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-apphorline-setting-form" name="weluka-apphorline-setting-form" role="form">
                    			<div id="wleuka-apphorline-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                    <div class="form-group">
										<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-3">
												<label><?php _e('Line Width (px)', Weluka::$settings['plugin_name']); ?></label>
        										<input type="text" id="welukaAppHorlineSettingLineWidth" name="welukaAppHorlineSettingLineWidth" class="form-control weluka-normal-text" value="" />
											</div>
                                            <div class="weluka-col-md-3">
                                            	<?php $_builder->weluka_display_borderstyle_settings( 'welukaAppHorlineSettingLineStyle', __('Line Style', Weluka::$settings['plugin_name']) ); ?>
                                            </div>
                                            <div class="weluka-col-md-3">
												<label><?php _e('Line Color', Weluka::$settings['plugin_name']); ?></label>
                                                <div id="welukaAppHorlineSettingLineColorWrap"></div>
                                            </div>
                                            <div class="weluka-col-md-12">
                                            	<div class="weluka-mgtop-m help-block">
                                                	<?php _e( 'Builder mode to enter a margin of 5px up and down.', Weluka::$settings['plugin_name'] ); ?>
                                                </div>
                                            </div>
                                       	</div>
                                    </div>
                        		</div><!-- /#weluka-apphorline-setting-panel-general -->
                    			<div id="wleuka-apphorline-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('AppHorline'); ?>
									<?php $_builder->weluka_display_css_setting('AppHorline'); ?>
                        		</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-apphorline-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end apphorline setting modal ?>

<?php //appalert dialog setting ?>
<div id="weluka-appalert-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="appalertSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="appalertSettingModalLabel" class="modal-title"><?php _e('Alert Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-appalert-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-appalert-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-appalert-setting-form" name="weluka-appalert-setting-form" role="form">
                    			<div id="wleuka-appalert-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaAppAlertSettingType"><?php _e('Alert Type', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<select id="welukaAppAlertSettingType" name="welukaAppAlertSettingType" class="form-control">
    		                                		<option value="alert-info" selected="selected"><?php _e('Info', Weluka::$settings['plugin_name']); ?></option>
                                                	<option value="alert-success"><?php _e('Success', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="alert-warning"><?php _e('Warning', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="alert-danger"><?php _e('Danger', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
                                            </div>
                                        </div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaAppAlertSettingShape"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <?php $_builder->weluka_display_buttonshape_settings('welukaAppAlertSettingShape', '', false); ?>
                                            </div>
                                        </div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Close Button', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaAppAlertSettingCloseBtn" name="welukaAppAlertSettingCloseBtn" type="checkbox" value="on" />
                                            	<label for="welukaAppAlertSettingCloseBtn"><?php _e('To enable the close button.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                        </div>
  									</div>
                        		</div><!-- /#weluka-apppalert-setting-panel-general -->
                    			<div id="wleuka-appalert-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('AppAlert'); ?>
									<?php $_builder->weluka_display_css_setting('AppAlert'); ?>
                        		</div><!-- /#wleuka-appalert-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-appalert-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end apppanel setting modal ?>

<?php
/**
 * sns appembed dialog setting
 */
?>
<div id="weluka-appembed-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="appembedSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="appembedSettingModalLabel" class="modal-title"><?php _e('Embed Code Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-appembed-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-appembed-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-appembed-setting-form" name="weluka-appembed-setting-form" role="form">
                    			<div id="wleuka-appembed-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="help-block"><?php _e('After saving of this setting, if the change on the builder is not reflected, make the builder [Save], please reload the page.', Weluka::$settings['plugin_name']); ?></div>

                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-12">
                                            	<label for="welukaAppembedSettingCode"><?php _e('Embed Code', Weluka::$settings['plugin_name']); ?></label>
	                                        	<textarea id="welukaAppembedSettingCode" name="welukaAppembedSettingCode" class="form-control" rows="8"></textarea>
                                            	<div class="weluka-mgtop-xs help-block"><?php _e('Please copy and paste the embed tag, such as an external API.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-appembed-setting-panel-general -->
                    			<div id="wleuka-appembed-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Appembed', array('border')); ?>
									<?php $_builder->weluka_display_margin_setting('Appembed'); ?>
									<?php $_builder->weluka_display_css_setting('Appembed'); ?>
                        		</div><!-- /#wleuka-snsbtn-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-appembed-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end appembed setting modal ?>

<?php
/**
 * wp custom menu dialog setting
 */
?>
<div id="weluka-wpmenu-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpmenuSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpmenuSettingModalLabel" class="modal-title"><?php _e('Wordpress Custom Menu Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wpmenu-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /*<li><a href="#wleuka-wpmenu-setting-panel-style" class="weluka-a"><?php _e('Menu Style', Weluka::$settings['plugin_name']); ?><span class="label label-danger" style="margin-left:0.4em;">PRO</span></a></li> */ ?>
    					<li><a href="#wleuka-wpmenu-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpmenu-setting-form" name="weluka-wpmenu-setting-form" role="form">
                    			<div id="wleuka-wpmenu-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Menu Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpMenuSettingTitle" name="welukaWpMenuSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpMenuSettingMenu"><?php _e('Select Menu', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
		                                		<select id="welukaWpMenuSettingMenu" name="welukaWpMenuSettingMenu" class="form-control">
												<?php
													$_wpCustomMenus = get_terms('nav_menu');
													if ($_wpCustomMenus){
            											foreach($_wpCustomMenus as $_menu){
                                               				echo '<option value="' . $_menu->term_id. '">' . esc_attr($_menu->name) . '</option>';
														}
        											}else{
                                                		echo '<option value="">' . __('None', Weluka::$settings['plugin_name']) . '</option>';
        											}
												?>
                                                </select>
                                                <div class="weluka-mgtop-xs help-block"><?php _e('After the custom menu registration Please reload the page builder.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>

                        		</div><!-- /#weluka-wpmenu-setting-panel-general -->
                    			<div id="wleuka-wpmenu-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="label label-danger">PRO</div>
                                	<div class="weluka-row clearfix weluka-mgtop-s">
                                    	<div class="weluka-col-md-4">
                                            <?php $_builder->weluka_display_csutomdesgin_settings('welukaWpmenuCustomDesign'); ?>

                                        	<div class="form-group weluka-mgtop-m">
                                            	<h5><?php _e('Menu Layout', Weluka::$settings['plugin_name']); ?></h5>
		                                		<select id="welukaWpmenuSettingLayout" name="welukaWpmenuSettingLayout" class="form-control" disabled="disabled">
													<option value=""></option>
                                                <?php foreach($_builder->wpmenu_layouts as $_layout) : ?>
													<option value=""><?php echo $_layout['label']; ?></option>
												<?php endforeach; ?>
                                                </select>
                                            </div>

                                    		<div class="weluka-row clearfix form-group">
                                    			<div class="weluka-col-md-12">
													<input id="welukaWpMenuSettingContentWidthFixed" name="welukaWpMenuSettingContentWidthFixed" type="checkbox" value="" disabled="disabled" />
	                                        		<label for="welukaWpMenuSettingContentWidthFixed"><?php _e('Menu Content Fixed Width', Weluka::$settings['plugin_name']); ?></label>
													<div class="weluka-mgtop-xs help-block">
                                            			<?php _e('Please be content menu to select if you want to display a fixed-width in the case where the content container width in the section if you have selected a horizontal menu layout is set to full width. If the content container width is set in the theme, it will according to the theme.', Weluka::$settings['plugin_name']); ?>
                                            		</div>
                                       			</div>
											</div>

                                        </div>
                                        <div class="weluka-col-md-8">
                                            <div id="weluka-wpmenu-setting-common-style" class="weluka-mgtop-m">
                                            	<h5><?php _e('Custom Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-3">
 	                                                	<h6><?php _e('Base Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                            	<div id="welukaWpmenuSettingBaseColorWrap"></div>
													</div>
                                                    <div class="weluka-col-md-3">
 	                                                	<h6><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                            	<div id="welukaWpmenuSettingBorderColorWrap"></div>
													</div>
                                                    <div class="weluka-col-md-3">
 	                                                	<h6><?php _e('Text Color', Weluka::$settings['plugin_name']); ?></h5>
    	                                            	<div id="welukaWpmenuSettingTextColorWrap"></div>
													</div>
                                                	<div class="weluka-col-md-3">
                                                		<input id="welukaWpmenuSettingHideBorder" name="welukaWpmenuSettingHideBorder" type="checkbox" value="0" disabled="disabled" />
	                                           	 		<label><?php _e('Hide Border?', Weluka::$settings['plugin_name']); ?></label>
													</div>
                                                </div>
                                                <div class="weluka-row clearfix">
                                                	<div class="weluka-col-md-12">
                                                   		<div class="help-block"><?php _e("When you'd like to establish the color besides the color theme, please establish it more than [Custom Setting].", Weluka::$settings['plugin_name']); ?></div>
													</div>
                                                </div>
                                            </div><!-- /#weluka-wpmenu-setting-common-style -->

                                        </div><!-- /weluka-col-md-8 -->
                                    </div>
                                </div><!-- /#weluka-wpmenu-setting-panel-style -->
                    			<div id="wleuka-wpmenu-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpMenu'); ?>
									<?php $_builder->weluka_display_css_setting('WpMenu'); ?>
                        		</div><!-- /#wleuka-wpmenu-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpmenu-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpmenu setting modal ?>

<?php //wp archives dialog setting ?>
<div id="weluka-wparchives-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wparchivesSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wparchivesSettingModalLabel" class="modal-title"><?php _e('Wordpress Archives Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wparchives-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wparchives-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wparchives-setting-form" name="weluka-wparchives-setting-form" role="form">
                    			<div id="wleuka-wparchives-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpArchivesSettingTitle" name="welukaWpArchivesSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpArchivesSettingShowType"><?php _e('Archive Type', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
		                                		<select id="welukaWpArchivesSettingShowType" name="welukaWpArchivesSettingShowType" class="form-control">
													<option value="yearly"><?php _e('Yearly', Weluka::$settings['plugin_name']); ?></option>
													<option value="monthly"><?php _e('Monthly', Weluka::$settings['plugin_name']); ?></option>
													<option value="weekly"><?php _e('Weekly', Weluka::$settings['plugin_name']); ?></option>
													<option value="daily"><?php _e('Daily', Weluka::$settings['plugin_name']); ?></option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpArchivesSettingShowLimit"><?php _e('Show Limit', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpArchivesSettingShowLimit" name="welukaWpArchivesSettingShowLimit" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter the number you want to display list.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Other.', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaWpArchivesSettingShowFormat" name="welukaWpArchivesSettingShowFormat" type="checkbox" value="option" />
	                                            <label for="welukaWpArchivesSettingShowFormat"><?php _e('Show Dropdown.', Weluka::$settings['plugin_name']); ?></label>
												<div class="weluka-mgtop-xs">
													<input id="welukaWpArchivesSettingShowCount" name="welukaWpArchivesSettingShowCount" type="checkbox" value="on" />
	                                            	<label for="welukaWpArchivesSettingShowCount"><?php _e('Show Post Count.', Weluka::$settings['plugin_name']); ?></label>
                                            	</div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wparchives-setting-panel-general -->
                    			<div id="wleuka-wparchives-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpArchives'); ?>
									<?php $_builder->weluka_display_css_setting('WpArchives'); ?>
                        		</div><!-- /#wleuka-wparchives-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wparchives-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wparchives setting modal ?>

<?php //wp calendar dialog setting ?>
<div id="weluka-wpcalendar-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpcalendarSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpcalendarSettingModalLabel" class="modal-title"><?php _e('Wordpress Calendar Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wpcalendar-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wpcalendar-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpcalendar-setting-form" name="weluka-wpcalendar-setting-form" role="form">
                    			<div id="wleuka-wpcalendar-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCalendarSettingTitle" name="welukaWpCalendarSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wpcalendar-setting-panel-general -->
                    			<div id="wleuka-wpcalendar-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpCalendar'); ?>
									<?php $_builder->weluka_display_css_setting('WpCalendar'); ?>
                        		</div><!-- /#wleuka-wpcalendar-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpcalendar-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpcalendar setting modal ?>

<?php //wp categories dialog setting ?>
<div id="weluka-wpcategories-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpcategoriesSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpcategoriesSettingModalLabel" class="modal-title"><?php _e('Wordpress Categories Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wpcategories-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wpcategories-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpcategories-setting-form" name="weluka-wpcategories-setting-form" role="form">
                    			<div id="wleuka-wpcategories-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCategoriesSettingTitle" name="welukaWpCategoriesSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4">
												<input id="welukaWpCategoriesSettingShowDropdown" name="welukaWpCategoriesSettingShowDropdown" type="checkbox" value="on" />
	                                            <label for="welukaWpCategoriesSettingShowDropdown"><?php _e('Show Dropdown.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
											<div class="weluka-col-md-4">
												<input id="welukaWpCategoriesSettingShowCount" name="welukaWpCategoriesSettingShowCount" type="checkbox" value="on" />
	                                            <label for="welukaWpCategoriesSettingShowCount"><?php _e('Show Post Count.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
											<div class="weluka-col-md-4">
												<input id="welukaWpCategoriesSettingHierarchical" name="welukaWpCategoriesSettingHierarchical" type="checkbox" value="on" />
	                                            <label for="welukaWpCategoriesSettingHierarchical"><?php _e('Show Hierarchical.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wpcategories-setting-panel-general -->
                    			<div id="wleuka-wpcategories-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpCategories'); ?>
									<?php $_builder->weluka_display_css_setting('WpCategories'); ?>
                        		</div><!-- /#wleuka-wpcategories-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpcategories-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpcategories setting modal ?>

<?php //wp meta dialog setting ?>
<div id="weluka-wpmeta-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpmetaSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpmetaSettingModalLabel" class="modal-title"><?php _e('Wordpress Meta Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wpmeta-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wpmeta-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpmeta-setting-form" name="weluka-wpmeta-setting-form" role="form">
                    			<div id="wleuka-wpmeta-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpMetaSettingTitle" name="welukaWpMetaSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wpmeta-setting-panel-general -->
                    			<div id="wleuka-wpmeta-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpMeta'); ?>
									<?php $_builder->weluka_display_css_setting('WpMeta'); ?>
                        		</div><!-- /#wleuka-wpmeta-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpmeta-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpmeta setting modal ?>

<?php //wp pages dialog setting ?>
<div id="weluka-wppages-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wppagesSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wppagesSettingModalLabel" class="modal-title"><?php _e('Wordpress Pages Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wppages-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wppages-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wppages-setting-form" name="weluka-wppages-setting-form" role="form">
                    			<div id="wleuka-wppages-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPagesSettingTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPagesSettingTitle" name="welukaWpPagesSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPagesSettingSortby"><?php _e('Sort by', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
		                                		<select id="welukaWpPagesSettingSortby" name="welukaWpPagesSettingSortby" class="form-control">
													<option value="menu_order"><?php _e('Menu Order', Weluka::$settings['plugin_name']); ?></option>
													<option value="ID"><?php _e('Page Id', Weluka::$settings['plugin_name']); ?></option>
													<option value="post_title"><?php _e('Page Title', Weluka::$settings['plugin_name']); ?></option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPagesSettingExcludes"><?php _e('Exclude Page Id', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPagesSettingExcludes" name="welukaWpPagesSettingExcludes" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter the page ID that you do not want to display a comma-separated.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wppages-setting-panel-general -->
                    			<div id="wleuka-wppages-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpPages'); ?>
									<?php $_builder->weluka_display_css_setting('WpPages'); ?>
                        		</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wppages-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wppages setting modal ?>

<?php //wp commentss dialog setting ?>
<div id="weluka-wpcomments-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpcommentsSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpcommentsSettingModalLabel" class="modal-title"><?php _e('Wordpress Recent Comments Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wpcomments-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wpcomments-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpcomments-setting-form" name="weluka-wpcomments-setting-form" role="form">
                    			<div id="wleuka-wpcomments-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpCommentsSettingTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCommentsSettingTitle" name="welukaWpCommentsSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpCommentsSettingLimit"><?php _e('Show Comment Count', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCommentsSettingLimit" name="welukaWpCommentsSettingLimit" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Default 5 comments.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wpcomments-setting-panel-general -->
                    			<div id="wleuka-wpcomments-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpComments'); ?>
									<?php $_builder->weluka_display_css_setting('WpComments'); ?>
                        		</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpcomments-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpcomments setting modal ?>

<?php
/**
 * wp posts dialog setting
 */
?>
<div id="weluka-wpposts-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wppostsSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wppostsSettingModalLabel" class="modal-title"><?php _e('Wordpress Recent Posts Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wpposts-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* <li><a href="#wleuka-wpposts-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?><span class="label label-danger" style="margin-left:0.4em;">PRO</span></a></li>*/ ?>
    					<li><a href="#wleuka-wpposts-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpposts-setting-form" name="weluka-wpposts-setting-form" role="form">
                    			<div id="wleuka-wpposts-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPostsSettingTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingTitle" name="welukaWpPostsSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Include Category', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                            <?php
												$_cats = get_categories('get=all');
            									foreach($_cats as $cat) :
													echo '<input id="welukaWpPostsSettingCat_' . $cat->cat_ID . '" name="welukaWpPostsSettingCat_' . $cat->cat_ID . '" class="welukaWpPostsSettingCat" type="checkbox" value="' . $cat->cat_ID . '" />';
	                                            	echo '&nbsp;<label for="welukaWpPostsSettingCat_' . $cat->cat_ID . '">' . esc_attr($cat->cat_name) . '</label>&nbsp;&nbsp;';
												endforeach;
											?>
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If the check is not, all categories are eligible.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Show Post Item', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaWpPostsSettingFlgTitle" name="welukaWpPostsSettingFlgTitle" type="checkbox" value="1" checked="checked" />
	                                            <label for="welukaWpPostsSettingFlgTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgDate" name="welukaWpPostsSettingFlgDate" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgDate"><?php _e('Date', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgAuthor" name="welukaWpPostsSettingFlgAuthor" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgAuthor"><?php _e('Author', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgCategory" name="welukaWpPostsSettingFlgCategory" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgCategory"><?php _e('Category', Weluka::$settings['plugin_name']); ?></label>
<?php /* pro
												<input id="welukaWpPostsSettingFlgComment" name="welukaWpPostsSettingFlgComment" type="checkbox" value="" disabled="disabled" />
	                                            <label><?php _e('Comment Count', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgThumb" name="welukaWpPostsSettingFlgThumb" type="checkbox" value="" disabled="disabled" />
	                                            <label><?php _e('Thumbnail', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgExcerpt" name="welukaWpPostsSettingFlgExcerpt" type="checkbox" value="" disabled="disabled" />
	                                            <label><?php _e('Excerpt', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgTagcloud" name="welukaWpPostsSettingFlgTagcloud" type="checkbox" value="" disabled="disabled" />
	                                            <label><?php _e('Tagcloud', Weluka::$settings['plugin_name']); ?></label>
*/ ?>
                                            </div>
                                    	</div>
                                    </div>
<?php /*
									<div class="weluka-row clearfix">
										<div class="weluka-col-md-4"><label><?php _e('Tagcloud position', Weluka::$settings['plugin_name']); ?></label><span class="label label-danger" style="margin-left:0.4em;">PRO</span></div>
                                        <div class="weluka-col-md-8">
                       						<?php  $_builder->weluka_display_tagcloud_pos_settings('welukaWpPostsSettingTagcloudPos', '', false); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Excerpt String Number', Weluka::$settings['plugin_name']); ?></label><span class="label label-danger" style="margin-left:0.4em;">PRO</span></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingExcerptStrNum" name="welukaWpPostsSettingExcerptStrNum" class="form-control weluka-normal-text" value="" disabled="disabled" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('More Link Text', Weluka::$settings['plugin_name']); ?></label><span class="label label-danger" style="margin-left:0.4em;">PRO</span></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingMoreStr" name="welukaWpPostsSettingMoreStr" class="form-control" value="" disabled="disabled" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter if you want to display a link to see more for each article.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('All Link', Weluka::$settings['plugin_name']); ?></label><span class="label label-danger" style="margin-left:0.4em;">PRO</span></div>
                                            <div class="weluka-col-md-8">
                                            	<label><?php _e('Url', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaWpPostsSettingAllLinkUrl" name="welukaWpPostsSettingAllLinkUrl" class="form-control" value="" disabled="disabled" />
                                            	<div class="weluka-mgtop-xs">
                                                	<label><?php _e('All Link Text', Weluka::$settings['plugin_name']); ?></label>
                                                	<input type="text" id="welukaWpPostsSettingAllMoreStr" name="welukaWpPostsSettingAllMoreStr" class="form-control" value="" disabled="disabled" />
                                                </div>
                                            </div>
                                    	</div>
                                    </div>
*/ ?>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Number of posts', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingLimit" name="welukaWpPostsSettingLimit" class="form-control weluka-normal-text" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Height (px)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingHeight" name="welukaWpPostsSettingHeight" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Scroll displayed if it exceeds the specified height.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>
                        		</div><!-- /#weluka-wpposts-setting-panel-general -->
                    			<div id="wleuka-wpposts-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="label label-danger">PRO</div>
                                	<div class="weluka-row clearfix weluka-mgtop-s">
                                    	<div class="weluka-col-md-4">
                                        	<?php $_builder->weluka_display_csutomdesgin_settings('welukaWpPostsCustomDesign'); ?>

											<div class="form-group weluka-mgtop-m">
												<?php $_builder->weluka_display_listlayout_settings('welukaWpPostsSettingLayout'); ?>
											</div>
                                            
                                            <div id="weluka-wpposts-setting-layout-rowcolum" class="weluka-panel-deactive">
                                                <div class="form-group">
                                                	<?php $_builder->weluka_display_listlayout_rowcolumn_settings('welukaWpPostsSettingRowColumn'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            	<h5><?php _e('Row spacing (px)', Weluka::$settings['plugin_name']); ?></h5>
	                                        	<input id="welukaWpPostsSettingRowSpacing" name="welukaWpPostsSettingRowSpacing" type="text" class="form-control" disabled="disabled" />
                                            </div>
                                            <div class="form-group">
                                            	<h5><?php _e('Odd Background Color', Weluka::$settings['plugin_name']); ?></h5>
                                                <div id="welukaWpPostsSettingOddBgColorWrap">
                                                </div>
											</div>
                                            <div class="form-group">
                                            	<h5><?php _e('Even Background Color', Weluka::$settings['plugin_name']); ?></h5>
                                                <div id="welukaWpPostsSettingEvenBgColorWrap">
                                                </div>
											</div>
                                        </div><!-- /.weluka-col-md-4 -->

                                    	<div class="weluka-col-md-8">
                                            <div id="weluka-wpposts-setting-media-design">
                                            	<h5><?php _e('Image Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_listmedia_column_settings('welukaWpPostsSettingMediaColWidth'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingMediaAlign" name="welukaWpPostsSettingMediaAlign" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                    </div>
                                                	<div class="weluka-col-md-4">
		                                                <?php $_builder->weluka_display_imgshape_settings('welukaWpPostsSettingMediaShape'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Border Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingMediaBorderSize" name="welukaWpPostsSettingMediaBorderSize" class="form-control weluka-normal-text" value="" disabled="disabled" />
													</div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Border Style', Weluka::$settings['plugin_name']); ?></label>
	    												<select id="welukaWpPostsSettingMediaBorderStyle" name="welukaWpPostsSettingMediaBorderStyle" class="form-control" disabled="disabled">
        													<option value=""></option>
        													<option value=""><?php _e('solid', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('dotted', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('dashed', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('double', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('groove', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('ridge', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('inset', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('outset', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                   	</div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingMediaBorderColorWrap">
                                                        </div>
                                                    </div>
                                                </div>
                                        	</div><!-- /#weluka-wpposts-setting-media-design -->

                                            <div id="weluka-wpposts-setting-title-design">
                                            	<h5><?php _e('Post Title Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_listtitle_htmltag_settings('welukaWpPostsSettingTitleTag'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingTitleStyle', 'Title Style'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingTitleAlign" name="welukaWpPostsSettingTitleAlign" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingTitleFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingTitleFontSize" name="welukaWpPostsSettingTitleFontSize" class="form-control weluka-normal-text" value="" disabled="disabled" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Title Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingTitleColorWrap"></div>
                                                    </div>
												</div>
                                            </div><!-- /title design -->

                                            <div id="weluka-wpposts-setting-meta-design">
                                            	<h5><?php _e('Meta Common Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingMetaAlign" name="welukaWpPostsSettingMetaAlign" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                    </div>
                                                </div>
 											</div><!-- /meta design -->

                                            <div id="weluka-wpposts-setting-date-design">
                                            	<h5><?php _e('Date Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingDateStyle', 'Date Style'); ?>
                                                    </div>
													<div class="weluka-col-md-8">
                                                    	<label><?php _e('date format (Ex Y-m-d h:i)', Weluka::$settings['plugin_name']); ?></label>
                                                		<input type="text" id="welukaWpPostsSettingDateFormat" name="welukaWpPostsSettingDateFormat" class="form-control weluka-normal-text" value="" disabled="disabled" />
                                                		<div class="weluka-mgtop-xs help-block"><?php _e('Please refer to the PHP date function for date format.', Weluka::$settings['plugin_name']); ?></div>
                                            		</div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingDateFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingDateFontSize" name="welukaWpPostsSettingDateFontSize" class="form-control weluka-normal-text" value="" disabled="disabled" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingDateColorWrap"></div>
                                                    </div>
												</div>
											</div><!-- /date design -->

                                            <div id="weluka-wpposts-setting-category-design">
                                            	<h5><?php _e('Category Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingCategoryStyle', 'Category Style'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingCategoryFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingCategoryFontSize" name="welukaWpPostsSettingCategoryFontSize" class="form-control weluka-normal-text" value="" disabled="disabled" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingCategoryColorWrap"></div>
                                                    </div>
												</div>
											</div><!-- /category design -->

                                            <div id="weluka-wpposts-setting-author-design">
                                            	<h5><?php _e('Author Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingAuthorStyle', 'Author Style'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingAuthorFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingAuthorFontSize" name="welukaWpPostsSettingAuthorFontSize" class="form-control weluka-normal-text" value="" disabled="disabled" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingAuthorColorWrap"></div>
                                                    </div>
												</div>
											</div><!-- /author design -->

                                            <div id="weluka-wpposts-setting-content-design">
                                            	<h5><?php _e('Excerpt Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingContentAlign" name="welukaWpPostsSettingContentAlign" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingContentFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingContentFontSize" name="welukaWpPostsSettingContentFontSize" class="form-control weluka-normal-text" value="" disabled="disabled" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Content Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingContentColorWrap"></div>
                                                    </div>
												</div>
											</div><!-- /content design -->

                                            <div id="weluka-wpposts-setting-morebutton-design">
                                            	<h5><?php _e('More Button Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingMoreButtonAlign" name="welukaWpPostsSettingMoreButtonAlign" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingMoreButtonFont'); ?>
                                                    </div>
												</div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Button Color', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingMoreButtonColor" name="welukaWpPostsSettingMoreButtonColor" class="form-control" disabled="disabled">
  															<option value=""><?php _e('White', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Grey', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Dark Grey', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Black', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Primary', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Success', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Info', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Warning', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Danger', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
        												</select>
													</div>
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingMoreButtonShape" name="welukaWpPostsSettingMoreButtonShape" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        												</select>
													</div>
                                                    <div class="weluka-col-md-4">
														<label><?php __('Button Size', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingMoreButtonSize" name="welukaWpPostsSettingMoreButtonSize" class="form-control" disabled="disabled">
        													<option value=""><?php _e('X Small', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Small', Weluka::$settings['plugin_name']); ?></option>
    														<option value=""><?php _e('Medium', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Large', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                		<input id="welukaWpPostsSettingMoreButtonBlock" name="welukaWpPostsSettingMoreButtonBlock" type="checkbox" value="" disabled="disabled" />
                                                		<label for="welukaWpPostsSettingMoreButtonBlock"><?php _e('A button block size.', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
												</div>
											</div><!-- /more button design -->

                                            <div id="weluka-wpposts-setting-allbutton-design">
                                            	<h5><?php _e('All Button Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingAllButtonAlign" name="welukaWpPostsSettingAllButtonAlign" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingAllButtonFont'); ?>
                                                    </div>
												</div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Button Color', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingAllButtonColor" name="welukaWpPostsSettingAllButtonColor" class="form-control" disabled="disabled">
  															<option value=""><?php _e('White', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Grey', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Dark Grey', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Black', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Primary', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Success', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Info', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Warning', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Danger', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
        												</select>
													</div>
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingAllButtonShape" name="welukaWpPostsSettingAllButtonShape" class="form-control" disabled="disabled">
    														<option value=""><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        												</select>
													</div>
                                                    <div class="weluka-col-md-4">
														<label><?php __('Button Size', Weluka::$settings['plugin_name']); ?></label>
														<select id="welukaWpPostsSettingAllButtonSize" name="welukaWpPostsSettingAllButtonSize" class="form-control" disabled="disabled">
        													<option value=""><?php _e('X Small', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Small', Weluka::$settings['plugin_name']); ?></option>
    														<option value=""><?php _e('Medium', Weluka::$settings['plugin_name']); ?></option>
        													<option value=""><?php _e('Large', Weluka::$settings['plugin_name']); ?></option>
        												</select>
                                                		<input id="welukaWpPostsSettingAllButtonBlock" name="welukaWpPostsSettingAllButtonBlock" type="checkbox" value="" disabled="disabled" />
                                                		<label for="welukaWpPostsSettingAllButtonBlock"><?php _e('A button block size.', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
												</div>
											</div><!-- /all button design -->

    									</div><!-- /.weluka-col-md-8 -->
                                    </div>
                                </div><!-- /#weluka-wpposts-setting-panel-style -->
                    			<div id="wleuka-wpposts-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpPosts'); ?>
									<?php $_builder->weluka_display_css_setting('WpPosts'); ?>
                        		</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpposts-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpposts setting modal ?>

<?php //wp rss dialog setting ?>
<div id="weluka-wprss-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wprssSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wprssSettingModalLabel" class="modal-title"><?php _e('Wordpress RSS Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wprss-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wprss-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wprss-setting-form" name="weluka-wprss-setting-form" role="form">
                    			<div id="wleuka-wprss-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingTitle" name="welukaWpRssSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpRssSettingUrl"><?php _e('RSS Feed Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingUrl" name="welukaWpRssSettingUrl" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpRssSettingLimit"><?php _e('Show Limit', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingLimit" name="welukaWpRssSettingLimit" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter the number you want to display list.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Height (px)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingHeight" name="welukaWpRssSettingHeight" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Scroll displayed if it exceeds the specified height.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Other.', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaWpRssSettingShowSummary" name="welukaWpRssSettingShowSummary" type="checkbox" value="1" />
	                                            <label for="welukaWpRssSettingShowSummary"><?php _e('Show Excerpt.', Weluka::$settings['plugin_name']); ?></label>
												<div class="weluka-mgtop-xs">
													<input id="welukaWpRssSettingShowAuthor" name="welukaWpRssSettingShowAuthor" type="checkbox" value="1" />
	                                            	<label for="welukaWpRssSettingShowAuthor"><?php _e('Show Author.', Weluka::$settings['plugin_name']); ?></label>
                                            	</div>
												<div class="weluka-mgtop-xs">
													<input id="welukaWpRssSettingShowDate" name="welukaWpRssSettingShowDate" type="checkbox" value="1" />
	                                            	<label for="welukaWpRssSettingShowDate"><?php _e('Show Date.', Weluka::$settings['plugin_name']); ?></label>
                                            	</div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wprss-setting-panel-general -->
                    			<div id="wleuka-wprss-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpRss'); ?>
									<?php $_builder->weluka_display_css_setting('WpRss'); ?>
                        		</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wprss-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wprss setting modal ?>

<?php //wp search dialog setting ?>
<div id="weluka-wpsearch-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpsearchSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpsearchSettingModalLabel" class="modal-title"><?php _e('Wordpress Search Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wpsearch-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wpsearch-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpsearch-setting-form" name="weluka-wpsearch-setting-form" role="form">
                    			<div id="wleuka-wpsearch-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpSearchSettingTitle" name="welukaWpSearchSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wpsearch-setting-panel-general -->
                    			<div id="wleuka-wpsearch-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpSearch'); ?>
									<?php $_builder->weluka_display_css_setting('WpSearch'); ?>
                        		</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpsearch-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpsearch setting modal ?>

<?php //wp tagcloud dialog setting ?>
<div id="weluka-wptags-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wptagsSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wptagsSettingModalLabel" class="modal-title"><?php _e('Wordpress Tag Cloud Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-wptags-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-wptags-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wptags-setting-form" name="weluka-wptags-setting-form" role="form">
                    			<div id="wleuka-wptags-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpTagsSettingTitle" name="welukaWpTagsSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpTagsSettingTaxonomy"><?php _e('Taxonomy Type', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
		                                		<select id="welukaWpTagsSettingTaxonomy" name="welukaWpTagsSettingTaxonomy" class="form-control">
													<option value="post_tag"><?php _e('Tags', Weluka::$settings['plugin_name']); ?></option>
													<option value="category"><?php _e('Categories', Weluka::$settings['plugin_name']); ?></option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wptags-setting-panel-general -->
                    			<div id="wleuka-wptags-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('WpTags'); ?>
									<?php $_builder->weluka_display_css_setting('WpTags'); ?>
                        		</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wptags-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wptagcloud setting modal ?>

<?php //modal dialog colum setting ?>
<div id="weluka-col-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="colSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="colSettingModalLabel" class="modal-title"><?php _e('Colum Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-col-setting-panel-advanced" class="active weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-col-setting-form" name="weluka-col-setting-form" role="form">
                    			<div id="wleuka-col-setting-panel-advanced" class="weluka-panel-active weluka-builder-settings-panel">
	                            	<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><strong><label for="welukaColSettingColumn"><?php _e('Column', Weluka::$settings['plugin_name']); ?></label></strong></div>
            	                            <div class="weluka-col-md-8">
		        	                        	<select id="welukaColSettingColumn" name="welukaColSettingColumn" class="form-control">
                    	                        	<?php for($c = 1 ; $c <= WelukaBuilder::MAX_COLUMN ; $c++) { ?>
	    		        	                        	<option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                            	                    <?php } ?>
            	    	        	            </select>
                                    	        <div class="weluka-mgtop-s"><?php _e('Please adjust so that it is up to 12 columns in a row.', Weluka::$settings['plugin_name']); ?></div>
                                        	</div>
	                                    </div>
  									</div>
									<?php $_builder->weluka_display_style_setting('Col'); ?>
									<?php $_builder->weluka_display_margin_setting('Col', true, 'notmglr'); ?>
									<?php $_builder->weluka_display_css_setting('Col'); ?>
                                </div>
							</form>                             
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-col-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-col-setting-modal ?>

<?php //modal dialog row setting ?>
<div id="weluka-row-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="rowSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="rowSettingModalLabel" class="modal-title"><?php _e('Row Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
                	<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-row-setting-panel-advanced" class="active weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-row-setting-form" name="weluka-row-setting-form" role="form">
                    			<div id="wleuka-row-setting-panel-advanced" class="weluka-panel-active weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Row'); ?>
									<?php $_builder->weluka_display_margin_setting('Row', true, 'notmglr'); ?>
									<?php $_builder->weluka_display_css_setting('Row'); ?>
                                </div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-row-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-row-setting-modal ?>

<?php //section dialog img setting ?>
<div id="weluka-section-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="sectionSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="sectionSettingModalLabel" class="modal-title"><?php _e('Section Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#wleuka-section-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#wleuka-section-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-section-setting-form" name="weluka-section-setting-form" role="form">
                    			<div id="wleuka-section-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                    <!-- media input area -->
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label><?php _e('BG Image', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<div id="weluka-section-setting-media-input-content"></div>
												<div class="form-group weluka-mgtop-m">
													<div class="weluka-row clearfix">
                                                    	<div class="weluka-col-md-3"><label><?php _e('Size', Weluka::$settings['plugin_name']); ?></label></div>
                        								<div class="weluka-col-md-9">
                                                        	<label><input type="radio" id="welukaSectionSettingBgSizeType_0" name="welukaSectionSettingBgSizeType" value="num" />&nbsp;<?php _e('Size Input', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        									<label><input type="radio" id="welukaSectionSettingBgSizeType_1" name="welukaSectionSettingBgSizeType" value="cover" />&nbsp;<?php _e('Cover', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        									<label><input type="radio" id="welukaSectionSettingBgSizeType_2" name="welukaSectionSettingBgSizeType" value="contain" />&nbsp;<?php _e('Contain', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
                                                    		<input type="text" id="welukaSectionSettingBgSize" name="welukaSectionSettingBgSize" style="width:100px;display:inline;" />
                                                            <div class="weluka-mgtop-xs help-block">
                                                            	<?php _e('If you specify the [Size Input], Please enter width and height. (Example) 50% 50%', Weluka::$settings['plugin_name']); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
													<div class="weluka-row clearfix">
                                                    	<div class="weluka-col-md-3"><label><?php _e('Position', Weluka::$settings['plugin_name']); ?></label></div>
                        								<div class="weluka-col-md-9">
                                                    		<input type="text" id="welukaSectionSettingBgPos" name="welukaSectionSettingBgPos" class="form-control" />
                                                            <div class="weluka-mgtop-xs help-block">
                                                            	<?php _e('(Example) 50% 50%', Weluka::$settings['plugin_name']); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
													<div class="weluka-row clearfix">
                                                    	<div class="weluka-col-md-3"><label><?php _e('Repeat', Weluka::$settings['plugin_name']); ?></label></div>
                        								<div class="weluka-col-md-9">
                                                        	<label><input type="radio" id="welukaSectionSettingBgRepeat_0" name="welukaSectionSettingBgRepeat" value="no-repeat" />&nbsp;<?php _e('No Repeat', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        									<label><input type="radio" id="welukaSectionSettingBgRepeat_1" name="welukaSectionSettingBgRepeat" value="repeat" />&nbsp;<?php _e('Repeat', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        									<label><input type="radio" id="welukaSectionSettingBgRepeat_2" name="welukaSectionSettingBgRepeat" value="repeat-x" />&nbsp;<?php _e('Repeat X', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        									<label><input type="radio" id="welukaSectionSettingBgRepeat_3" name="welukaSectionSettingBgRepeat" value="repeat-y" />&nbsp;<?php _e('Repeat Y', Weluka::$settings['plugin_name']); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
													<div class="weluka-row clearfix">
                                                    	<div class="weluka-col-md-3"><label><?php _e('Attachment', Weluka::$settings['plugin_name']); ?></label></div>
                        								<div class="weluka-col-md-9">
                                                        	<label><input type="radio" id="welukaSectionSettingBgAttachment_0" name="welukaSectionSettingBgAttachment" value="scroll" />&nbsp;<?php _e('Scroll', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        									<label><input type="radio" id="welukaSectionSettingBgAttachment_1" name="welukaSectionSettingBgAttachment" value="fixed" />&nbsp;<?php _e('Fixed', Weluka::$settings['plugin_name']); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label for="welukaSectionSettingBgColor"><?php _e('BG Color', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<div id="welukaSectionSettingBgColorWrap">
                                                </div>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label for="welukaSectionSettingColor"><?php _e('Font Color', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<div id="welukaSectionSettingColorWrap">
                                                </div>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label for="welukaSectionSettingColor"><?php _e('Anchor', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<input type="text" id="welukaSectionSettingAnchor" name="welukaSectionSettingAnchor" class="form-control" />
                                            </div>
                                        </div>
  									</div>
                        		</div><!-- /#weluka-section-setting-panel-general -->
                    			<div id="wleuka-section-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_margin_setting('Section', true, 'notmglr'); ?>
									<?php $_builder->weluka_display_css_setting('Section'); ?>
                        		</div><!-- /#wleuka-section-setting-panel-advanced -->
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-section-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end section setting modal ?>

<?php
/**
 * page setting dialog img setting
 */
?>
<div id="weluka-page-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="pageSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="pageSettingModalLabel" class="modal-title"><?php _e('Page Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="wleuka-modal-main">
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-page-setting-form" name="weluka-page-setting-form" role="form">
                                <h5><?php _e('Seo Setting', Weluka::$settings['plugin_name']); ?></h5>
								<div class="form-group">
									<div class="weluka-row clearfix">
										<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                        <div class="weluka-col-md-8">
                                            <input type="text" id="welukaPageSettingSeoTitle" name="welukaPageSettingSeoTitle" class="form-control" placeholder="<?php echo esc_attr( get_the_title() ); ?>" />
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div class="weluka-row clearfix">
										<div class="weluka-col-md-4"><label><?php _e('Keywords', Weluka::$settings['plugin_name']); ?></label></div>
                                        <div class="weluka-col-md-8">
                                            <input type="text" id="welukaPageSettingSeoKeywords" name="welukaPageSettingSeoKeywords" class="form-control" placeholder="<?php _e('Keyword1,keyword2, ...', Weluka::$settings['plugin_name']); ?>" />
                                            <div class="weluka-mgtop-s help-block"><?php _e('Please enter a keyword in a comma-delimited.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div class="weluka-row clearfix">
										<div class="weluka-col-md-4"><label><?php _e('description', Weluka::$settings['plugin_name']); ?></label></div>
                                        <div class="weluka-col-md-8">
	                                        <textarea id="welukaPageSettingSeoDescription" name="welukaPageSettingSeoDescription" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-page-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end section setting modal ?>

</div><?php //end #weluka-builde-snippets ?>