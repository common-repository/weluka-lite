<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Weluka Pulugin Admin Setting class
 * @since 1.0
 * 　
 */
class WelukaAdminSettings {

	/**
	 * option setting page wp nonce filed name
	 * @since 1.0
	 */
	const OPTION_SETTING_REG_NONCE	= "weluka_option_setting_reg_nonce";
	const LICENSE_REG_NONCE			= "weluka_license_reg_nonce";
	const SEO_SETTING_REG_NONCE		= "weluka_seo_setting_reg_nonce";

	/**
	 * option setting field and db key name
	 * Lisence key
	 * @since 1.0
	 */
	const BUILDER_LICKEY_FIELD_NAME = 'builder_lickey';
	/**
	 * option setting field and db key name
	 * ビルダー対象post_type
	 * @since 1.0
	 */
	const BUILDER_ON_FIELD_NAME = 'weluka_editor_on';
	/**
	 * option setting field and db key name
	 * ビルダー無効ユーザーグループ
	 * @since 1.0
	 */
	const BUILDER_OFF_ROLES_FIELD_NAME = 'weluka_editor_off_roles';
	public static $roleNameStrings;

	/**
	 * option setting field and db key name
	 * 使用google web fonts
	 * @since 1.0
	 */
	const USE_WEB_FONTS = 'weluka_use_web_fonts';

	/**
	 * option setting field and common container wrapper type name
	 * @since 1.0
	 */
	const CONTAINER_TYPE = 'container_type';

	/**
	 * option setting field favicon key name
	 * @since 1.0
	 */
	const FAVICON_URL 	= 'weluka_favicon';

	/**
	 * option setting field touch icon key name
	 * @since 1.0
	 */
	const TOUCHICON_URL 	= 'weluka_touchicon';

	/**
	 * option setting field and embed code type name
	 * @since 1.0
	 */
	const COMMON_EMBED_CODE = 'weluka_embed_code';

	/**
	 * not use meta tag setting field array key name
	 * @since 1.0
	 */
	const META_ARRAY_FIELD	= 'disable_metas';

	/**
	 * not use meta tag setting wp generetor key name
	 * @since 1.0
	 */
	const META_WP_GENERATOR	= 'wp_generator';

	/**
	 * not use meta tag setting EditURI key name
	 * @since 1.0
	 */
	const META_RSD_LINK	= 'rsd_link';

	/**
	 * not use meta tag setting wlwmanifest key name
	 * @since 1.0
	 */
	const META_WLWMANIFEST_LINK	= 'wlwmanifest_link';

	/**
	 * not use meta tag setting rss feed key name
	 * @since 1.0
	 */
	const META_RSS_FEED	= 'feed_links';

	/**
	 * seo setting field seo use name
	 * @since 1.0
	 */
	const SEO_ARRAY_FIELD	= 'seos';

	/**
	 * seo setting field seo use name
	 * @since 1.0
	 */
	const SEO_USE			= 'seo_use';

	/**
	 * seo setting field home title name
	 * @since 1.0
	 */
	const SEO_HOME_TITLE	= 'home_title';

	/**
	 * seo setting field home keywords name
	 * @since 1.0
	 */
	const SEO_HOME_KEYWORDS	= 'home_keywords';

	/**
	 * seo setting field relative path on name
	 * @since 1.0
	 */
	const SEO_RELATIVE_PATH	= 'relative_path';

	/**
	 * seo setting field home description name
	 * @since 1.0
	 */
	const SEO_HOME_DESCRIPTION	= 'home_description';

	/**
	 * applist custom design save db option name
	 * @since 1.0
	 */
	const APPLIST_CUSTOM_DESIGN_OPTION_NAME	= 'weluka_list_custom_designs';

	/**
	 * applist listdata save db option name
	 * @since 1.0
	 */
	const APPLIST_REGLIST_OPTION_NAME	= 'weluka_list_reglists';

	/**
	 * wpmenu custom design save db option name
	 * @since 1.0
	 */
	const WPMENU_CUSTOM_DESIGN_OPTION_NAME	= 'weluka_wpmenu_custom_designs';

	/**
	 * wpposts custom design save db option name
	 * @since 1.0
	 */
	const WPPOSTS_CUSTOM_DESIGN_OPTION_NAME	= 'weluka_wpposts_custom_designs';

	/**
	 * plugin stop builder data restoration flg db option name
	 * @since 1.0
	 */
	const PLUGIN_STOP_DATA_RESTORE	= 'weluka_data_restore';

	/**
	 * class init
	 * @since 1.0
	 */	
	public static function init() {
		//roles name array
		self::$roleNameStrings = array(
			'Super Admin'	=> __('Super Admin', Weluka::$settings['plugin_name']),
			'Administrator'	=> __('Administrator', Weluka::$settings['plugin_name']),
			'Editor'		=> __('Editor', Weluka::$settings['plugin_name']),
			'Author'		=> __('Author', Weluka::$settings['plugin_name']),
			'Contributor'	=> __('Contributor', Weluka::$settings['plugin_name']),
			'Subscriber'	=> __('Subscriber', Weluka::$settings['plugin_name']),
		);
		
		if ( is_admin() && current_user_can( 'manage_options' ) ) {
			add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
		}
	}

	/**
	 * admin_menu hook 
	 * @since 1.0
	 */
	public static function add_admin_menu() {
		add_menu_page( Weluka::$settings['plugin_name'], ucfirst(Weluka::$settings['plugin_name']), 'manage_options', Weluka::$settings['setting_option_name'], array( __CLASS__, 'settings_page' ) );
		
        add_submenu_page(
			Weluka::$settings['setting_option_name'],
			__('Seo Setting', Weluka::$settings['plugin_name']),
			__('Seo Setting', Weluka::$settings['plugin_name']),
			'manage_options',
			Weluka::$settings['seo_option_name'],
			array( __CLASS__, 'seo_settings_page' )
		);
	}

	/**
	 * add_options_page hook
	 * display admin setting page
	 * @since 1.0
	 */
	public static function settings_page() {
        global $wp_roles;
		
		if (isset($_REQUEST["weluka_option_setting_submit"])) {
	    	check_admin_referer(self::OPTION_SETTING_REG_NONCE);
			$errmsg = self::update_option_setting($_REQUEST);

			if($errmsg === ""){ ?>
				<div class="updated fade"><p><strong><?php _e('option update success!!', Weluka::$settings['plugin_name']); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error fade"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }
		}
	
		$options = self::get_options();
?>
    	<div class="wrap">
    	<h2><?php _e("Weluka Option Setting", Weluka::$settings['plugin_name'] ); ?></h2>

		<div class="weluka-option-wrap" style="padding-top:10px;padding-bottom:10px;">
			<table class="form-table">
    		<tbody>
                <tr>
                	<td>
						<?php printf( __( 'weluka Thank you for using. Please refer to a <a href="%s" target="_blank">Document</a> and a <a href="%s" target="_blank">Faq</a> about Help.', Weluka::$settings['plugin_name'] ), '//www.weluka.me/system?utm_source=external&utm_medium=wp-repo&utm_campaign=weluka-help', '//www.weluka.me/blog/?utm_source=external&utm_medium=wp-repo&utm_campaign=weluka-faq' ); ?>
                    </td>
                </tr>
                <tr>
                	<td>
						<a class="weluka-upgrade" href="<?php echo  Weluka::$settings['upgrade_url']; ?>" target="_blank" style="margin-right:1em;"><?php _e('Upgrade', Weluka::$settings['plugin_name']); ?></a>
        				<?php _e( 'Currently, we use the weluka Lite Version. More advanced features, themes, please upgrade to use the support.',  Weluka::$settings['plugin_name'] ); ?>
                    </td>
                </tr>
			</tbody>
        	</table>
      	</div>
        
		<form id="weluka_option_setting_reg" name="weluka_option_setting_reg" method="post" action="">
    		<?php wp_nonce_field(self::OPTION_SETTING_REG_NONCE); ?>
			<table class="form-table">
    		<tbody>
        		<tr>
            		<th><?php _e('Builder enable post types : ', Weluka::$settings['plugin_name']); ?></th>
            		<td>
    				<?php
                        $postTypes = get_post_types( array( 'public' => true ) );
    					$excludePostTypes = array( 'attachment' => 'attachment', Weluka::$settings['cpt_hd'] => Weluka::$settings['cpt_hd'], Weluka::$settings['cpt_ft'] => Weluka::$settings['cpt_ft'], Weluka::$settings['cpt_sd'] => Weluka::$settings['cpt_sd'] );
    					$postTypes = array_diff_assoc($postTypes, $excludePostTypes);
						$checkedPostTypes = self::array_enable_post_types(isset($options[self::BUILDER_ON_FIELD_NAME]) ? $options[self::BUILDER_ON_FIELD_NAME] : "");
						foreach ($postTypes as $key => $val) {
        					if (post_type_supports($key, 'editor')) {
            					$checked = '';
            					if (in_array($key, $checkedPostTypes)) {
                					$checked = 'checked="checked"';
            					}
            					echo '<label><input type="checkbox" name="' . self::BUILDER_ON_FIELD_NAME . '[]" value="'. $key . '" ' . $checked. ' /> ' . __( ucfirst($val) ) . '</label><br />';
        					}
    					}
    					echo '<br/>';
    					echo '<p class="description">' . __("Please check the post type you want to use the page builder.", Weluka::$settings['plugin_name'] ) . '</p>';
					?>
            		</td>
        		</tr>
            	<tr>
                	<th><?php _e('For builder data at the time of stop plug-in : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::PLUGIN_STOP_DATA_RESTORE]) ? $options[self::PLUGIN_STOP_DATA_RESTORE] : 0; ?>
                 		<input type="checkbox" value="1" name="<?php echo self::PLUGIN_STOP_DATA_RESTORE; ?>" id="<?php echo self::PLUGIN_STOP_DATA_RESTORE; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('To set the builder data to WordPress content.', Weluka::$settings['plugin_name']); ?>
        				<div style="margin:10px 0;">
    	        			<?php _e('Please check if you want to set the builder data at the time of stop plug-in WordPress usually content. Standard behavior does not set to WordPress normal content at the time of stop plug-in.', Weluka::$settings['plugin_name']); ?>
            			</div>
                    </td>
            	</tr>
			</tbody>
            </table>

            <p class="submit"><input type="submit" id="weluka_option_setting_submit" name="weluka_option_setting_submit" value="<?php _e('Save', Weluka::$settings['plugin_name']) ;?>" class="button-primary" /></p>
    	</form>
    	</div>
<?php
	}

	/**
 	 * options db registory
 	 *
	 * @return void
	 */
	public static function update_option_setting($data){
		global $wp_version;
		$errmsg = "";
		try {
			//page builder enable posttype
			$_postTypes = isset($data[self::BUILDER_ON_FIELD_NAME]) ? $data[self::BUILDER_ON_FIELD_NAME] : "";
			if(isset($_postTypes) && is_array($_postTypes)) {
				$_postTypes = sanitize_text_field(implode(",", $_postTypes));
			}

			$_pluginStopDataRestore = !empty($data[self::PLUGIN_STOP_DATA_RESTORE]) ? $data[self::PLUGIN_STOP_DATA_RESTORE] : 0;

			$opt = array(
				self::BUILDER_ON_FIELD_NAME			=> $_postTypes,
				self::PLUGIN_STOP_DATA_RESTORE		=> $_pluginStopDataRestore
			);
			//wp option table add or update
			Weluka::get_instance()->update_option( Weluka::$settings['setting_option_name'], $opt );

		} catch (Exception $e) {
			$errmsg = sprintf( __("option registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * add_submenu_page hook
	 * display admin seo setting page
	 * @since 1.0
	 */
	public static function seo_settings_page() {
		if (isset($_REQUEST["weluka_seo_setting_submit"])) {
	    	check_admin_referer(self::SEO_SETTING_REG_NONCE);
			$errmsg = self::update_seo_setting($_REQUEST);

			if($errmsg === ""){ ?>
				<div class="updated fade"><p><strong><?php _e('seo setting update success!!', Weluka::$settings['plugin_name']); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error fade"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }
		}
	
		$options = get_option( Weluka::$settings['seo_option_name'] );
?>
    	<div class="wrap">
    	<h2><?php echo "Weluka " . __("Seo Setting", Weluka::$settings['plugin_name'] ); ?></h2>
		<form id="weluka_seo_setting_reg" name="weluka_seo_setting_reg" method="post" action="">
    		<?php wp_nonce_field(self::SEO_SETTING_REG_NONCE); ?>
			<div style="margin-top:20px;padding:0 10px;border: 1px solid #e5e5e5;-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);box-shadow: 0 1px 1px rgba(0,0,0,.04);background: #fff;">
				<table class="form-table">
    			<tbody>
            	<tr>
                	<th><?php _e('Use? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_USE]) ? (int)$options[self::SEO_ARRAY_FIELD][self::SEO_USE] : 0; ?>
                        <label><input type="radio" id="<?php echo self::SEO_USE; ?>" name="<?php echo self::SEO_USE; ?>" value="1" <?php if($val === 1) { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::SEO_USE; ?>" name="<?php echo self::SEO_USE; ?>" value="0" <?php if($val === 0) { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please then to [Enabled] If you want to replace the such as the title tag by using the Weluka this function.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
				</tbody>
            	</table>
            	<h3 style="border-bottom:1px solid #ddd; padding-bottom:6px;"><?php _e('Home Page Setting', Weluka::$settings['plugin_name']); ?></h3>
				<table class="form-table">
    			<tbody>
            	<tr>
                	<th><?php _e('Home Title : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_HOME_TITLE]) ? $options[self::SEO_ARRAY_FIELD][self::SEO_HOME_TITLE] : ''; ?>
            			<input type="text" id="<?php echo self::SEO_HOME_TITLE; ?>" name="<?php echo self::SEO_HOME_TITLE; ?>" value="<?php echo esc_attr( $val ); ?>" class="widefat" />
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Home Keywords : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_HOME_KEYWORDS]) ? $options[self::SEO_ARRAY_FIELD][self::SEO_HOME_KEYWORDS] : ''; ?>
                        <input type="text" id="<?php echo self::SEO_HOME_KEYWORDS; ?>" name="<?php echo self::SEO_HOME_KEYWORDS; ?>" value="<?php echo esc_attr( $val ); ?>" class="widefat" placeholder="<?php _e('Keyword1,keyword2, ...', Weluka::$settings['plugin_name']); ?>" />
                        <div style="margin-top:10px";><?php _e('Please enter a keyword in a comma-delimited.', Weluka::$settings['plugin_name']); ?></div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Home Description : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_HOME_DESCRIPTION]) ? $options[self::SEO_ARRAY_FIELD][self::SEO_HOME_DESCRIPTION] : ''; ?>
	                    <textarea id="<?php echo self::SEO_HOME_DESCRIPTION; ?>" name="<?php echo self::SEO_HOME_DESCRIPTION; ?>" class="widefat" rows="3"><?php echo esc_textarea( $val ); ?></textarea>
                    </td>
            	</tr>
				</tbody>
            	</table>
            </div>

			<div style="margin-top:20px;padding:0 10px;border: 1px solid #e5e5e5;-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);box-shadow: 0 1px 1px rgba(0,0,0,.04);background: #fff;">
            	<h3 style="border-bottom:1px solid #ddd; padding-bottom:6px;"><?php _e('Meta Tag Setting', Weluka::$settings['plugin_name']); ?></h3>
				<table class="form-table">
    			<tbody>
            	<tr>
                	<th><?php _e('WP Generator? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_WP_GENERATOR]) ? $options[self::META_ARRAY_FIELD][self::META_WP_GENERATOR] : 'off'; ?>
                        <label><input type="radio" id="<?php echo self::META_WP_GENERATOR; ?>" name="<?php echo self::META_WP_GENERATOR; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_WP_GENERATOR; ?>" name="<?php echo self::META_WP_GENERATOR; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please select the [enabled] If you want to add a WordPress Version meta tags.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('EditURI? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_RSD_LINK]) ? $options[self::META_ARRAY_FIELD][self::META_RSD_LINK] : 'on'; ?>
                        <label><input type="radio" id="<?php echo self::META_RSD_LINK; ?>" name="<?php echo self::META_RSD_LINK; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_RSD_LINK; ?>" name="<?php echo self::META_RSD_LINK; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please select the [enabled] If you want to add a WordPress EditURI meta tags. There is no problem in the [disabled] If you want to post and edit only from WordPress administrator page.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Wlwmanifest? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_WLWMANIFEST_LINK]) ? $options[self::META_ARRAY_FIELD][self::META_WLWMANIFEST_LINK] : 'on'; ?>
                        <label><input type="radio" id="<?php echo self::META_WLWMANIFEST_LINK; ?>" name="<?php echo self::META_WLWMANIFEST_LINK; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_WLWMANIFEST_LINK; ?>" name="<?php echo self::META_WLWMANIFEST_LINK; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('If you want to add a Wlwmanifest meta tags, please choose [enabled]. There is no problem in the [disabled] If you do not want to post-edit from MSN Windows Live Writer.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Rss Feed? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_RSS_FEED]) ? $options[self::META_ARRAY_FIELD][self::META_RSS_FEED] : 'on'; ?>
                        <label><input type="radio" id="<?php echo self::META_RSS_FEED; ?>" name="<?php echo self::META_RSS_FEED; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_RSS_FEED; ?>" name="<?php echo self::META_RSS_FEED; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please select the [enabled] If you want to add the Rss Feed meta tags.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
                </tbody>
                </table>
            </div>
            <p class="submit"><input type="submit" id="weluka_seo_setting_submit" name="weluka_seo_setting_submit" value="<?php _e('Save', Weluka::$settings['plugin_name']) ;?>" class="button-primary" /></p>
    	</form>
        </div>
<?php
	}

	/**
 	 * seo option db registory
	 * @return void
	 */
	public static function update_seo_setting($data){
		global $wp_version;
		$errmsg = "";
		try {
			
			$_seoUse			= isset($data[self::SEO_USE]) ? $data[self::SEO_USE] : 0;
			$_homeTitle 		= !empty($data[self::SEO_HOME_TITLE]) ? strip_tags( trim( $data[self::SEO_HOME_TITLE] ) ) : "";
			$_homeKeywords		= !empty($data[self::SEO_HOME_KEYWORDS]) ? strip_tags( trim( $data[self::SEO_HOME_KEYWORDS] ) ) : "";
			$_homeDescription	= !empty($data[self::SEO_HOME_DESCRIPTION]) ? strip_tags( trim( $data[self::SEO_HOME_DESCRIPTION] ) ) : "";
			$_wpGenerator		= !empty($data[self::META_WP_GENERATOR]) ? $data[self::META_WP_GENERATOR] : 'off';
			$_rsdLink			= !empty($data[self::META_RSD_LINK]) ? $data[self::META_RSD_LINK] : 'on';
			$_wlwManifest		= !empty($data[self::META_WLWMANIFEST_LINK]) ? $data[self::META_WLWMANIFEST_LINK] : 'on';
			$_rssFeed			= !empty($data[self::META_RSS_FEED]) ? $data[self::META_RSS_FEED] : 'on';
			
			$opt = array(
				self::SEO_ARRAY_FIELD	=> array(
					self::SEO_USE				=> $_seoUse,
					self::SEO_HOME_TITLE		=> $_homeTitle,
					self::SEO_HOME_KEYWORDS		=> $_homeKeywords,
					self::SEO_HOME_DESCRIPTION	=> $_homeDescription
				),
				self::META_ARRAY_FIELD	=> array(
					self::META_WP_GENERATOR			=> $_wpGenerator,
					self::META_RSD_LINK				=> $_rsdLink,
					self::META_WLWMANIFEST_LINK		=> $_wlwManifest,
					self::META_RSS_FEED				=> $_rssFeed
				)
			);
			//wp option table add or update
			Weluka::get_instance()->update_option( Weluka::$settings['seo_option_name'], $opt );

		} catch (Exception $e) {
			$errmsg = sprintf( __("option registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
 	 * get option setting
	 * @since 1.0 
 	 * @param	itemName option_name itema name
 	 * @return  array or string
 	 */
	public static function get_options($item_name = "") {
		$ret = get_option(Weluka::$settings['setting_option_name']);
		if($item_name != "")
			$ret = isset($ret[$item_name]) ? $ret[$item_name] : "";
	
		return $ret;
	}

	/**
 	 * fet site option
	 * @since 1.0 
 	 * @return  array or string
 	 */
	public static function get_site_options($opt_name = "", $item_name = "", $mode = false) {
		$_opt_name = $opt_name === "" ? Weluka::$settings['license_option_name'] : $opt_name;

		if( $mode ) {
			$ret = get_option($_opt_name);
		}else{
			$ret = get_site_option($_opt_name, false, false);
		}
		if($item_name != "")
			$ret = isset($ret[$item_name]) ? $ret[$item_name] : "";
	
		return $ret;
	}

	/**
	 * option get post types
	 * @since 1.0
	 */
	public static function array_enable_post_types($postTypes = "") {
		$ret = array();
		$_postTypes = $postTypes;
		if($_postTypes === "") {
			$_postTypes = self::get_options(self::BUILDER_ON_FIELD_NAME);
		}
		
		if(isset($_postTypes)){
			$ret = explode(",", $_postTypes);
		}
		return $ret;
	}

	/**
	 * option disable roles
	 * @since 1.0
	 */
	public static function array_disable_roles($disableRoles = "") {
		$ret = array();
		$_disableRoles = $disableRoles;
		if($_disableRoles === "") {
			$_disableRoles = self::get_options(self::BUILDER_OFF_ROLES_FIELD_NAME);
		}
		if(isset($_disableRoles)){
			$ret = explode(",", $_disableRoles);
		}
		return $ret;
	}
	
	/**
	 * @since 1.0
	 */
	public static function get_role_name($name) {
		return isset(self::$roleNameStrings[$name]) ? self::$roleNameStrings[$name] : $name;
	}
		
	/**
	 * save applist reglist
	 * @since 1.0
	 */
	public static function save_applist_reglist($keyName, $data) {
		global $wp_version;
		$errmsg = "";
		try {
			if($keyName === '') {
				$errmsg = __('Please enter list name.', Weluka::$settings['plugin_name']);
				return $errmsg;
			}			
			$newData = self::get_applist_reglist();
			if(!empty($newData[$keyName])) {
				//update
				$newData[$keyName] = $data;
			} else {
				// add
				$newData += array($keyName => $data);
			}
			//wp option table add or update
			if ( version_compare( $wp_version, '4.2', '<' ) ) {
				update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData);
			} else {
				update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData, false);
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("list data registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * remove applist reglist
	 * @since 1.0
	 */
	public static function remove_applist_reglist($keyName = '') {
		global $wp_version;
		$errmsg = "";
		try {

			if($keyName === '') {
				//all remove
				delete_option(self::APPLIST_REGLIST_OPTION_NAME);
			} else {
				// kyeName data remove
				$newData = self::get_applist_reglist();
				if(!empty($newData[$keyName])) {
					unset($newData[$keyName]); //keyName remove
					if ( version_compare( $wp_version, '4.2', '<' ) ) {
						update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData);
					} else {
						update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData, false);
					}
				}
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("list data remove error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * get applist reglist
	 * @since 1.0
	 */
	public static function get_applist_reglist($keyName = '') {
		$ret = get_option(self::APPLIST_REGLIST_OPTION_NAME);
		if($keyName !== '') {
			$ret = !empty($ret[$keyName]) ? $ret[$keyName] : '';
		}
		return is_array($ret) ? $ret : array();
	}

	/**
	 * save custom design
	 * @since 1.0
	 */
	public static function save_custom_design($optionName, $keyName, $data) {
		global $wp_version;
		$errmsg = "";
		try {
			if($keyName === '') {
				$errmsg = __('Please enter custom design name.', Weluka::$settings['plugin_name']);
				return $errmsg;
			}

			$newData = self::get_custom_design($optionName);
			if(!empty($newData[$keyName])) {
				//update
				$newData[$keyName] = $data;
			} else {
				// add
				$newData += array($keyName => $data);
			}
			//wp option table add or update
			if ( version_compare( $wp_version, '4.2', '<' ) ) {
				update_option($optionName, $newData);
			} else {
				update_option($optionName, $newData, false);
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("custom design registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * remove custom design
	 * @since 1.0
	 */
	public static function remove_custom_design($optionName, $keyName = '') {
		global $wp_version;
		$errmsg = "";
		try {

			if($keyName === '') {
				//all remove
				delete_option($optionName);
			} else {
				// kyeName data remove
				$newData = self::get_custom_design($optionName);
				if(!empty($newData[$keyName])) {
					unset($newData[$keyName]); //keyName remove
					if ( version_compare( $wp_version, '4.2', '<' ) ) {
						update_option($optionName, $newData);
					} else {
						update_option($optionName, $newData, false);
					}
				}
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("custom design remove error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * get wpmenu custom design
	 * @since 1.0
	 */
	public static function get_custom_design($optionName, $keyName = '') {
		$ret = get_option($optionName);
		if($keyName !== '') {
			$ret = !empty($ret[$keyName]) ? $ret[$keyName] : '';
		}
		return is_array($ret) ? $ret : array();
	}

} //end class