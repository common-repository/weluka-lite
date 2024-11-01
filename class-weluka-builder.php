<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Weluka Plugin Builder class
 * @since 1.0
 */
class WelukaBuilder {
	
	/**
	 * Holds the singleton instance of this class
	 * @var WelukaBuilder
	 */
	
	/**
	 * @since 1.0
	 */
	private static $instance = false;
	/**
	 * @since 1.0
	 */
	protected $properties = array();
	
	//postmeta @since 1.0
	const CONTENT_POSTMETA_KEY_PREFIX	= '_weluka-builder-';
	const CONTENT_POSTMETA_KEY_DRAFT	= '_weluka-builder-draft';
	const CONTENT_POSTMETA_KEY_PUBLISH	= '_weluka-builder-publish';
	const CONTENT_MODE_DRAFT			= 'draft';
	const CONTENT_MODE_PUBLISH			= 'publish';

	//class properties key name @since 1.0
	const PROP_KEY_BUILDER_MODE			= 'builderMode';
	const PROP_KEY_BUILDER_JSON			= 'builderJson';
	const WELUKA_BUILDER_TARGET_POST_ID	= 'targetPostId';
	
	//widgets @since 1.0
	const WIDGET_TEXT					= 'text';
	const WIDGET_TITLE					= 'title';
	const WIDGET_IMG					= 'img';
	const WIDGET_ICON					= 'icon';
	const WIDGET_SLIDE					= 'slide';
	const WIDGET_GALLERY				= 'gallery';
	const WIDGET_BUTTON					= 'button';
	const WIDGET_SNS_BUTTON				= 'sns_button';
	const WIDGET_SNS_SHARE				= 'sns_share';
	const WIDGET_MOVIE					= 'movie';
	const WIDGET_AUDIO					= 'audio';
	const WIDGET_APP_ALERT				= 'appalert';
	const WIDGET_APP_LIST				= 'applist';
	const WIDGET_APP_EMBED				= 'appembed';
	const WIDGET_APP_ACCORDION			= 'appaccordion';
	const WIDGET_APP_TABS				= 'apptabs';
	const WIDGET_APP_HORLINE			= 'apphorline';
	const WIDGET_GMAP					= 'gmap';
	const WIDGET_BLANK					= 'blank';
	const WIDGET_WP_MENU				= 'wpmenu';
	const WIDGET_WP_ARCHIVES			= 'wparchives';
	const WIDGET_WP_CALENDAR			= 'wpcalendar';
	const WIDGET_WP_CATEGORIES			= 'wpcategories';
	const WIDGET_WP_META				= 'wpmeta';
	const WIDGET_WP_PAGES				= 'wppages';
	const WIDGET_WP_COMMENTS			= 'wpcomments';
	const WIDGET_WP_POSTS				= 'wpposts';
	const WIDGET_WP_RSS					= 'wprss';
	const WIDGET_WP_SEARCH				= 'wpsearch';
	const WIDGET_WP_TAGCLOUD			= 'wptagcloud';
	const WIDGET_PAGE_SETTING			= 'page_setting';

	//widget slide effect type @since 1.0
	public $slide_effects				= array(
		"slideh"	=> 'slideh',
		"fade"		=> 'fade'
	);

	//widget sns button type @since 1.0
	public $sns_buttons					= array(
		"facebook"	=> array(
			"label"			=> "facebook",
			"button_text"	=> "FACEBOOK",
			"default"		=> "https://www.facebook.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-facebook-simple fa fa-facebook" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-facebook-square fa fa-facebook" {STYLE}></i>',
			//"icon_round"	=> '<i class="weluka-sns-round weluka-facebook-round fa fa-facebook" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-facebook-round {TEXT_ON}" {STYLE}><i class="fa fa-facebook"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-facebook-circle fa fa-facebook" {STYLE}></i>'
		),
		"twitter"	=> array(
			"label"			=> "twitter",
			"button_text"	=> "TWITTER",
			"default"		=> "https://twitter.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-twitter-simple fa fa-twitter" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-twitter-square fa fa-twitter" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-twitter-round {TEXT_ON}" {STYLE}><i class="fa fa-twitter"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-twitter-circle fa fa-twitter" {STYLE}></i>'
		),
		"google"	=> array(
			"label"			=> "google+",
			"button_text"	=> "GOOGLE+",
			"default"		=> "https://plus.google.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-gplus-simple fa fa-google-plus" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-gplus-square fa fa-google-plus" {STYLE}></i>',
			//"icon_round"	=> '<i class="weluka-sns-round weluka-gplus-round fa fa-google-plus" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-gplus-round {TEXT_ON}" {STYLE}><i class="fa fa-google-plus"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-gplus-circle fa fa-google-plus" {STYLE}></i>'
		),
		"youtube"	=> array(
			"label"			=> "youtube",
			"button_text"	=> "YOUTUBE",
			"default"		=> "https://www.youtube.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-youtube-simple fa fa-youtube" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-youtube-square fa fa-youtube" {STYLE}></i>',
			//"icon_round"	=> '<i class="weluka-sns-round weluka-youtube-round fa fa-youtube" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-youtube-round {TEXT_ON}" {STYLE}><i class="fa fa-youtube"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-youtube-circle fa fa-youtube" {STYLE}></i>'
		),
	);

	//sns share buttons @since 1.0
	public $sns_share_buttons					= array(
		"facebook"	=> array(
			"label"			=> "facebook",
			"share_url"		=> "//www.facebook.com/sharer.php?u=%s",	//%s=current page URL
			"counter_url"	=> "//graph.facebook.com/?id=%s",	//%s=current page URL
			"plan"			=> "free",
			"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-facebook-simple {NOCOUNT}" {STYLE1}><i class="fa fa-facebook"></i>{COUNTER}</span>',
			"icon_square"	=> '<span class="weluka-snsshare-square weluka-facebook-square {NOCOUNT}" {STYLE1}><i class="fa fa-facebook"></i>{COUNTER}</span>',
			"icon_round"	=> '<span class="weluka-snsshare-round weluka-facebook-round {NOCOUNT}" {STYLE1}><i class="fa fa-facebook"></i>{COUNTER}</span>',
		),
		"twitter"	=> array(
			"label"			=> "twitter",
			"share_url"		=> "//twitter.com/share?url=%s%s%s", //"//twitter.com/share?url=%s&amp;text=%s&amp;via=%s",	//%1s=current page URL, %2s=post title, %3s=user twitter account(@useraccount) @=nothing
			"counter_url"	=> "//urls.api.twitter.com/1/urls/count.json?url=%s",	//%s=current page URL
			"plan"			=> "free",
			"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-twitter-simple {NOCOUNT}" {STYLE1}><i class="fa fa-twitter"></i>{COUNTER}</span>',
			"icon_square"	=> '<span class="weluka-snsshare-square weluka-twitter-round {NOCOUNT}" {STYLE1}><i class="fa fa-twitter"></i>{COUNTER}</span>',
			"icon_round"	=> '<span class="weluka-snsshare-round weluka-twitter-round {NOCOUNT}" {STYLE1}><i class="fa fa-twitter"></i>{COUNTER}</span>',
		),
		"google"	=> array(
			"label"			=> "google+",
			"share_url"		=> "//plus.google.com/share?url=%s",	//%s=current page URL
			"counter_url"	=> "https://clients6.google.com/rpc",
			"plan"			=> "free",
			"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-gplus-simple {NOCOUNT}" {STYLE1}><i class="fa fa-google-plus"></i>{COUNTER}</span>',
			"icon_square"	=> '<span class="weluka-snsshare-square weluka-gplus-round {NOCOUNT}" {STYLE1}><i class="fa fa-google-plus"></i>{COUNTER}</span>',
			"icon_round"	=> '<span class="weluka-snsshare-round weluka-gplus-round {NOCOUNT}" {STYLE1}><i class="fa fa-google-plus"></i>{COUNTER}</span>',
		)
	);
	
	//text shadow style @since 1.0
	public $text_shadow_styles	= array(
		'basic'		=> array('offset_v'	=> '1px', 'offset_h' => '1px', 'grad' => '2px', 'default_color' => 'rgba(0,0,0,0.3)' ),
		'hard'		=> array('offset_v'	=> '-2px', 'offset_h' => '4px', 'grad' => '0', 'default_color' => 'rgba(0,0,0,0.3)' ),
		'vintage'	=> array('offset_v'	=> '4px', 'offset_h' => '3px', 'grad' => '0', 'default_color' => '#ffffff' )
	);
	
	//widget app list layout array @since 1.0
	public $app_list_layouts	= array();

	//widget wpmenu layout array @since 1.0
	public $wpmenu_layouts	= array();

	//link action
	const LINK_ACTION_GOTOLINK			= 'gotolink';
	const LINK_ACTION_ZOOMUP			= 'zoom';
	
	//max colum num
	const MAX_COLUMN					= 12; //bootstrap col
	
	//parts default
	const DEFAULT_MOVIE_URL				= 'https://www.youtube.com/watch?v=wbkkl9nZDw4';

	public $gmap_shortcode_tag			= 'weluka-map';
	public $wpposts_shortcode_tag		= 'weluka-wpposts';
	public $wpmenu_shortcode_tag		= 'weluka-wpmenu';
	public $wpmenu_shortcode_tag2		= 'weluka-wpmenu2';
	public $wparchives_shortcode_tag	= 'weluka-wparchives';
	public $wpcalendar_shortcode_tag	= 'weluka-wpcalendar';
	public $wpcategories_shortcode_tag	= 'weluka-wpcategories';
	public $wpmeta_shortcode_tag		= 'weluka-wpmeta';
	public $wppages_shortcode_tag		= 'weluka-wppages';
	public $wpcomments_shortcode_tag	= 'weluka-wpcomments';
	public $wprss_shortcode_tag			= 'weluka-wprss';
	public $wpsearch_shortcode_tag		= 'weluka-wpsearch';
	public $wptagcloud_shortcode_tag	= 'weluka-wptagcloud';

	const DEFAULT_GMAP_ADDR				= '東京都千代田区丸の内1-9-1';

	const APPLIST_CUSTOM_DESIGN			= 'applist_custom_design';
	const APPLIST_REG_LIST				= 'applist_reg_list';
	const WPMENU_CUSTOM_DESIGN			= 'wpmenu_custom_design';
	const WPPOSTS_CUSTOM_DESIGN			= 'wpposts_custom_design';
	
	/**
	 * constructor
	 * @since 1.0
	 */
	private function __construct(){
		$this->app_list_layouts = array(
			array(
				'layout_class'	=> 'medialeft',
				'label'			=> __('Media Left', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediaright',
				'label'	=> __('Media Right', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediatop',
				'label'	=> __('Media Top', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediamiddle',
				'label'	=> __('Media Middle', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediabottom',
				'label'	=> __('Media Bottom', Weluka::$settings['plugin_name'])
			),
		);

		$this->wpmenu_layouts = array(
			array(
				'layout_class'	=> 'horizontal',
				'label'			=> __('Horizontal', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'vertical',
				'label'	=> __('Vertical', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'hamburger',
				'label'	=> __('Hamburger', Weluka::$settings['plugin_name'])
			)
		);
 	}

	/**
	 * singloton instance
	 * @since 1.0
	 */	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new WelukaBuilder;
		}
		return self::$instance;
	}

	/**
	 * builder properties setter
	 * @since 1.0
	 */
	public function set_property($key, $val) {
		$this->properties[$key] = $val;
	}

	/**
	 * builder properties getter
	 * @since 1.0
	 */
	public function get_property($key) {
		if(array_key_exists($key, $this->properties)){
            return $this->properties[$key];
        }
		return null;
	}
	
	/**
	 * edit_form_after_title hook
	 * post.php post-new.php title after add builder button
	 * @since 1.0
	 */
	public function add_builder_button() {
		global $post, $pagenow;
		$postType = get_post_type($post->ID);
?>
		<div id="weluka-builder-button-wrapper">
        	<button type="button" id="weluka-builder-button" class="wp-core-ui button-primary" data-new="<?php echo $pagenow === 'post-new.php' ? 'new' : 'up'; ?>" data-post="<?php echo $post->ID; ?>" data-post-type="<?php echo $postType; ?>"><?php esc_attr_e('Weluka Builder', Weluka::$settings['plugin_name']); ?></button>
        </div>
        <div id="weluka-loading"></div>
<?php
	}

	/**
	 * admin footer hook
	 * post.php post-new.php add script code
	 * @since 1.0
	 */
	public function add_builder_content() {
		global $post, $pagenow;
		$settings		= Weluka::$settings;
		$upgrade_url	= $settings['upgrade_url'];
?>
<div id="weluka-builder" style="display: none;">
	<?php //nav ?>
	<div id="weluka-builder-navbar" class="navbar weluka-navbar-inverse clearfix" >
		<div id="weluka-builder-navbar-container" class="weluka-container-fluid">
			<div class="navbar-header clearfix">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#weluka-builder-nav"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
				<div class="navbar-brand">
                	<a class="weluka-logo" href="<?php echo $settings['brand_url']; ?>" target="_blank"><?php echo $settings['plugin_name'] ?></a>
        			&nbsp;&nbsp;<span class="weluka-post-title"><?php _e('Title: ', $settings['plugin_name']); echo esc_html($post->post_title); ?></span>
                </div>
			</div>
            <?php //meinmenu ?>
			<div id="weluka-builder-nav" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
            		<li><a href="javascript:void(0);" onclick="return false;" class="<?php if ($post->post_status === 'publish') echo ' weluka-ajax-update'; ?>" id="weluka-builder-publish"><?php _e('Publish', $settings['plugin_name']); ?></a></li>
            		<li><a href="javascript:void(0);" onclick="return false;" class="<?php if ($pagenow !== 'post-new.php') echo ' weluka-ajax-update'; ?>" id="weluka-builder-save"><?php _e('Save', $settings['plugin_name']); ?></a></li>
            		<li><a href="javascript:void(0);" onclick="return false;" id="weluka-builder-preview"><?php _e('Preview', $settings['plugin_name']); ?></a></li>
            		<li><a href="javascript:void(0);" onclick="return false;" id="weluka-builder-close"><?php _e('Close', $settings['plugin_name']); ?></a></li>
            		<li id="weluka-upgrade"><a href="javascript:void(0);" onclick="window.open('<?php echo $upgrade_url; ?>','_blank'); return false"><?php _e('Upgrade', $settings['plugin_name']); ?></a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div><!-- /.navbar -->

	<div id="weluka-builder-main">
		<div id="weluka-builder-content-wrapper">
    		<iframe id="weluka-builder-content-iframe" class="weluka-builder-content-iframe" name="weluka-builder-content-iframe" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
    	</div>

		<?php //snippets tinymce ?>
        <?php //tinymce editor modal dialog ?> 
		<div id="weluka-code-editor-modal" class="modal hide fade weluka-modal" role="dialog" aria-labelledby="codeEditorModalLabel" aria-hidden="true" data-keyboard="false">
			<div class="modal-dialog modal-lg">
        		<div class="modal-content">
            		<div class="modal-header">
						<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    					<h4 id="codeEditorModalLabel" class="modal-title"><?php _e('Code Editor', Weluka::$settings['plugin_name']) ?></h4>
            		</div>
            		<div class="modal-body">
            			<div id="wleuka-modal-main">
    						<div id="weluka-code-editor-modal-wrapper">
        					<?php
								wp_editor('', 'welukacodeeditorcontent', array(
									'media_buttons' => true,
									'textarea_rows' => 16,
								));
							?>
        					</div>
            			</div>
                    </div>
	            	<div class="modal-footer">
    					<button id="weluka-save-editor-content" class="weluka-btn weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        				<button class="weluka-btn weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            		</div>
            	</div>
        	</div>
    	</div>
        
    </div>
</div>
<?php
	}
	
	/**
	 * posts_results hook
	 * kick main query
	 * @since 1.0
	 */
	public function render_posts_results($posts, $wp_query) {
		global $shortcode_tags;
		$weluka = Weluka::get_instance();
		$this->set_property("render_post_result", false);

		if( !is_admin() ) { //not admin page
			$targetPostId = isset($_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID]) ? $_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] : ''; //builder target post_id
			foreach ( $posts as &$_post ) {
				if($_post->ID == $targetPostId) { //builder edit page or builder edit a page preview click
					$_ct = str_replace(array("\r\n","\n","\r"), '', trim(strip_tags($_post->post_content)));
					if( $weluka->is_edit_builder($_post) && $weluka->is_active_builder() ) {
						$this->set_property("render_post_result", true);
						//builder mode
						if(strcasecmp($_ct, "[weluka-builder-content]") != 0) {
							$_content = '[weluka-default-content post_id=' . $_post->ID . ']' . $_post->post_content . '[/weluka-default-content]';

						}else{
							$_content = '[weluka-builder-content2 post_id=' . $_post->ID . ']';

						}

						$_post->post_content = $_content;
						$this->set_property("render_post_result", false);

					}else{
						if(is_preview() && strcasecmp($_ct, "[weluka-builder-content]") != 0){
							//case not save preview mode
							$_content = '[weluka-builder-content2 post_id=' . $_post->ID . ']';

							$_post->post_content = $_content;
						}
					}
					$_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] = '';
				}
			}
		}
		return $posts;
	}
	
	/**
	 * weluka-{shortocode} kick
	 * weluka builder data from html
	 * @since 1.0
	 */
	public function get_content($type, $content = "", $_post = null) {
		$weluka = Weluka::get_instance();
		$_content = "";
		$builderData = "";
		$newFlg = false;
		$postData = empty($_post) ? $weluka->get_post() : $_post;

		if( empty( $postData ) ){ return $content; }
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false);
		if( $weluka->is_edit_builder($postData) && $weluka->is_active_builder()) {
			//builder edit mode
			if( $type !== 'default' ) { //case builder mode
				//get postmeta draft data
				$builderData = $this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_DRAFT);

				if(empty($builderData['sections'])){
					$newFlg = true;
				}
			}else{
				if($content !== ""){
					$builderData = $this->create_section_array('default', $content);
				}else{
					$newFlg = true;
				}
			}

			$this->set_property(self::PROP_KEY_BUILDER_MODE, true);
		
			$this->set_property(self::PROP_KEY_BUILDER_JSON, '');
			$json = json_encode($builderData);

			$_SESSION[self::PROP_KEY_BUILDER_JSON] = $json;
			add_filter( 'show_admin_bar', '__return_false' ); //builder mode on adminbar no display
			add_action('wp_footer', array($this, 'builder_snippets'));

			ob_start();
			$this->display_content($builderData, $newFlg);
			$_content = ob_get_clean();
		}elseif( $weluka->check_builder_post_type($postData->post_type) ){
			if( $type === 'default' ) {
				return do_shortcode($content);
			}
			//preview
			if( is_preview() ){
				//draft data rendering
				$builderData = $this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_DRAFT);
				if(!empty($builderData)){ //data true
					ob_start();
					$this->display_content($builderData);
					$_content = ob_get_clean();
				}else{
					$_content = "";
				}
				$_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] = '';
				return do_shortcode($_content);
			}
			
			$_content = do_shortcode( $this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_PUBLISH, 'content') );
		}else{
			return $content;
		}
		return $_content;
	}

	/**
	 * create content
	 * @since 1.0 
	 */
	protected function display_content($builderData, $newFlg = false) {
		global $post;

		$weluka = Weluka::get_instance();
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$class	= $builderMode ? " weluka-builder-edit-wrapper clearfix": '';
		echo '<div class="weluka-builder-content' . $class . '">';

		if($newFlg === true) {
			$this->render_new_blank();
		} else {
			$this->render_sections($builderData);
		}
		echo '</div>';
	}

	/**
	 * @since 1.0
	 */
	public function create_section_array($sectionMode, $content = "", $widgetType = "") {
		$weluka = Weluka::get_instance();
		$nodeId = $weluka->create_node_id();
		$retArr = array();
        if($sectionMode === "default"){
        	$items[0] = array(
            	"id"	=> $nodeId,
                "type"	=> "text",
                "class_name"	=> "",
                "text"	=> $content
            );
			$retArr = array(
        		"sections" => array(
            		array(
						"id"	=> $weluka->create_node_id(),
    	    			"class_name"			=> "",
        				"background_image"		=> "",
        				"background_color"		=> "",
        				"margin_top"	=> "",
        				"margin_bottom" => "",
        				"margin_left"	=> "",
        				"margin_right"	=> "",
                		"rows"	=> array(
                    		array(
								"id"	=> $weluka->create_node_id(),
                				"colums"	=> array(
                            		array(
										"id"	=> $weluka->create_node_id(),
                    					"col"	=> 12,
                        				"items"	=> $items
                                	),
	                    		),
    	                    ),
        	        	),
            	    ),
	            ),
    	    );
       	}else{
			//unused
			//section
			$items[0] = $this->create_item_array($widgetType);
			$retArr = array(
        		"sections" => array(
            		array(
						"id"	=> $weluka->create_node_id(),
    	    			"class_name"			=> "",
        				"background_image"		=> "",
        				"background_color"		=> "",
        				"margin_top"	=> "",
        				"margin_bottom" => "",
        				"margin_left"	=> "",
        				"margin_right"	=> "",
                		"rows"	=> array(
                    		array(
								"id"	=> $weluka->create_node_id(),
                				"colums"	=> array(
                            		array(
										"id"	=> $weluka->create_node_id(),
                    					"col"	=> 12,
                        				"items"	=> $items
                                	),
	                    		),
    	                    ),
        	        	),
            	    ),
	            ),
    	    );
		}

        return $retArr;
	}

	/**
	 * create section array
	 * @since 1.0
	 */
	public function create_section_array2($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();
		$retArr = array(
			"id"	=> $weluka->create_node_id(),
    	    "class_name"			=> "",
        	"background_image"		=> "",
        	"background_color"		=> "",
        	"margin_top"	=> "",
        	"margin_bottom" => "",
        	"margin_left"	=> "",
        	"margin_right"	=> "",
            "rows"	=> null
		);
		$rows = array();
		if($moveModel === "") {
			$rows = $this->create_row_array($widgetType);
			$retArr['rows'][0] = $rows;
		}else{
			if($moveType !== 'section'){
				$rows = $this->create_row_array("", $moveModel, $moveType);
				$retArr['rows'][0] = $rows;
			}else{
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();
				
				//nodeid all new
				foreach($retArr["rows"] as &$row) :
					$row["id"] = $weluka->create_node_id();
					foreach($row["colums"] as &$colum) :
						$colum["id"] = $weluka->create_node_id();
						foreach($colum["items"] as &$item) :
							$item["id"] = $weluka->create_node_id();
						endforeach;
					endforeach;
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create row array
	 * @since 1.0
	 */
	public function create_row_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "colums"	=> null,
    	);

		if($moveModel === "") {
			$colums = $this->create_colum_array($widgetType);
			$retArr['colums'][0] = $colums;
		}else{
			if($moveType !== 'row') {
				$colums = $this->create_colum_array("", $moveModel, $moveType);
				$retArr['colums'][0] = $colums;
			}else{
				//row
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();

				//nodeid all new
				foreach($retArr["colums"] as &$colum) :
					$colum["id"] = $weluka->create_node_id();
					foreach($colum["items"] as &$item) :
						$item["id"] = $weluka->create_node_id();
					endforeach;
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create colum array
	 * @since 1.0
	 */
	public function create_colum_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "col"	=> 12,
            "items"	=> null
    	);
		
		if($moveModel === "") {
			//add widget
			$items[0] = $this->create_item_array($widgetType);
			$retArr['items'] = $items;
		}else{
			if($moveType !== "col") {
				$item = $this->create_widget_array("", $moveModel, $moveType);
				if(!isset($item[0]["id"])) {
					$_arr[0] = $item;
				}else{
					$_arr = $item;
				}
				$retArr['items'] = $_arr;
			}elseif($moveType === "col") {
				$retArr = $moveModel;
				//nodeid all new
				$retArr["id"] =  $weluka->create_node_id();
				foreach($retArr["items"] as &$item) :
					$item["id"] = $weluka->create_node_id();
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create widget array
	 * @since 1.0
	 */
	public function create_widget_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
		);
		
		if($moveModel === "") {
			//add widget
			$item = $this->create_item_array($widgetType);
			$retArr = $item;
		}else{
			if($moveType === "s_row") {
				$subrows = $this->create_subrow_array("", $moveModel, $moveType);
				$retArr['subrows'][0] = $subrows;
			}elseif($moveType === 's_col') {
				$items = $moveModel['subitems'];
				foreach($items as &$item){
					$item['id'] = $weluka->create_node_id();
				}
				$retArr = $items;
			}elseif($moveType === "s_widget") {
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();
			}elseif($moveType === "widget") {
				$retArr = $moveModel;
				//nodeid all new
				$retArr["id"] =  $weluka->create_node_id();
				if(isset($retArr["subrows"])) {
					foreach($retArr["subrows"] as &$row) :
						$row["id"] = $weluka->create_node_id();
						foreach($row["subcolums"] as &$colum) :
							$colum["id"] = $weluka->create_node_id();
							foreach($colum["subitems"] as &$item) :
								$item["id"] = $weluka->create_node_id();
							endforeach;
						endforeach;
					endforeach;
				}
			}
		}
        return $retArr;
	}

	/**
	 * create subrows array
	 * @since 1.0
	 */
	public function create_subrow_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "subcolums"	=> null
		);
		if($moveModel === "") {
			$colums = $this->create_subcolum_array($widgetType);
			$retArr['subcolums'][0] = $colums;
		}else{
			if($moveType !== 's_row' && $moveType !== 'widget') {
				$colums = $this->create_subcolum_array("", $moveModel, $moveType);
				$retArr['subcolums'][0] = $colums;
			}elseif($moveType == 'widget') {
				if(isset($moveModel['subrows'])){
					$retArr = $moveModel['subrows'];
					$retArr["id"] = $weluka->create_node_id();

					//nodeid all new
					foreach($retArr["subcolums"] as &$colum) :
						$colum["id"] = $weluka->create_node_id();
						foreach($colum["subitems"] as &$item) :
							$item["id"] = $weluka->create_node_id();
						endforeach;
					endforeach;
				}else{
					$colums = $this->create_subcolum_array("", $moveModel, $moveType);
					$retArr['subcolums'][0] = $colums;
				}
			}else{
				//s_row
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();

				//nodeid all new
				foreach($retArr["subcolums"] as &$colum) :
					$colum["id"] = $weluka->create_node_id();
					foreach($colum["subitems"] as &$item) :
						$item["id"] = $weluka->create_node_id();
					endforeach;
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create subcolum array
	 * @since 1.0
	 */
	public function create_subcolum_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "col"	=> 12,
            "subitems"	=> null
    	);
		
		if($moveModel === "") {
			//add widget
			$items[0] = $this->create_item_array($widgetType);
			$retArr['subitems'] = $items;
		}else{
			if($moveType !== "s_col") {
				$items[0] = $moveModel;
				$retArr['subitems'] = $items;
			}else {
				$retArr = $moveModel;
				//nodeid all new
				$retArr["id"] =  $weluka->create_node_id();
			}
			foreach($retArr["subitems"] as &$item) :
				$item["id"] = $weluka->create_node_id();
			endforeach;
		}
        return $retArr;
	}

	/**
	 * wdigetデータからsburow形式配列作成
	 */
	public function widget_to_subrow_array($widgetType, $orgItem, $pos, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();
		
		if($moveModel === "") {
			$item = $this->create_item_array($widgetType);
			$orgItem['id'] = $weluka->create_node_id();
		
			if($pos == 's-col-left-out') {
				$item1[0] = $item;
				$item2[0] = $orgItem;
			}else{
				$item1[0] = $orgItem;
				$item2[0] = $item;
			}
			$retArr = array(
				"id"	=> $weluka->create_node_id(),
				"subrows"	=> array(
						array(
							"id"	=> $weluka->create_node_id(),
                			"subcolums"	=> array(
                        		array(
									"id"	=> $weluka->create_node_id(),
                    				"col"	=> 6,
                        			"subitems"	=> $item1
	                           	),
    	                    	array(
									"id"	=> $weluka->create_node_id(),
            	        			"col"	=> 6,
                	        		"subitems"	=> $item2
                    	       	),
	                    	),
	    	           ),
				),
			);
		}else{
				//widget or s_widget
				$item = $moveModel;
				$item['id'] = $weluka->create_node_id();
				if($pos == 's-col-left-out') {
					$item1[0] = $item;
					$item2[0] = $orgItem;
				}else{
					$item1[0] = $orgItem;
					$item2[0] = $item;
				}

			$retArr = array(
				"id"	=> $weluka->create_node_id(),
				"subrows"	=> array(
						array(
							"id"	=> $weluka->create_node_id(),
                			"subcolums"	=> array(
                        		array(
									"id"	=> $weluka->create_node_id(),
                    				"col"	=> 6,
                        			"subitems"	=> $item1
	                           	),
    	                    	array(
									"id"	=> $weluka->create_node_id(),
            	        			"col"	=> 6,
                	        		"subitems"	=> $item2
                    	       	),
	                    	),
	    	           ),
				),
			);
		}
		return $retArr;
	}
	
	/**
	 * create widget item data array
	 * @since 1.0
	 */
	public function create_item_array($widgetType) {
		$ret = array();
		$nodeId = Weluka::get_instance()->create_node_id();
		$curPostId = $this->get_property("currentPostId");
		switch($widgetType) {
			case self::WIDGET_IMG :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_IMG,
					"attachment_id"	=> "",	//case wordpress media
					"cssId"	=> "",
					"cssClass" => "",
					"class_name"	=> "weluka-text-center",
					"shape" => "",
					"title"	=> "sample",
			 		"alt"	=> "sample",
					"caption"	=> "",
			 		"description"	=> "",
			 		"width"	=> "",
			 		"height"=> "",
					"margin_top"	=> "",
        			"margin_bottom" => "",
        			"margin_left"	=> "",
        			"margin_right"	=> "",
					"thumbnail" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"medium" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"large" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"full" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"source_type"	=> "",	//media or extern "" = default
			 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
			 		"external"	=> "",
			 		"link"	=> array(
				  				"action"	=> "",
			      				"href"		=> "",
				  				"target"	=> ""
			 		)
				);
				break;
			case self::WIDGET_ICON :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_ICON,
					"cssId"	=> "",
					"cssClass" => "",
					"icon_class"	=> "fa-camera",
					"class_name"	=> "",	//align
					"icon_size"	=> "32",	//1em = 16px
					"icon_color"	=> "#666666"
				);
				break;
			case self::WIDGET_SLIDE :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_SLIDE,
					"cssId"	=> "",
					"cssClass" => "",
					"slide_effect" => $this->slide_effects['fade'],
					"direction_nav" => "1",
					"paging_nav"  => "1",
					"auto_slide"  => "1",
					"slide_loop"  => "1",
					"slideshow_msec"	=> "7000",
					//"animation_msec"	=> "600",
					"slide_size"	=> "full",
					"slides"	=> array(
						array(
							"attachment_id"	=> "",	//case wordpress media
							"thumbnail" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"medium" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"large" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"full" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"flg_description"	=> "",
							"description"	=> "sample description",
							"description_position"	=> "bottom",
			 				"link"	=> array(
				  				"action"	=> "",
			      				"href"		=> "",
				  				"target"	=> ""
			 				)
						)
					)
				);
				break;
			case self::WIDGET_BUTTON :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_BUTTON,
					"cssId"	=> "",
					"cssClass" => "",
					"text"	=> "BUTTON",
					"class_name"	=> "",
					"button_color"	=> "weluka-btn-default",
					"size"	=> "",
					"block" => "",
			 		"link"	=> array(
				  		"action"	=> "",
			      		"href"		=> "",
				  		"target"	=> ""
			 		)
				);
				break;
			case self::WIDGET_SNS_BUTTON :
				$ret = array(
					"id"		=> $nodeId,
					"type"		=> self::WIDGET_SNS_BUTTON,
					"cssId"		=> "",
					"cssClass"	=> "",
					"class_name"		=> "",
					"direction"	=> "h",	//h=horizontal, v=vertical
					"buttons"	=> array(
						array(
							"name"		=> "facebook",
							"url"		=> $this->sns_buttons['facebook']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['facebook']['button_text']
						),
						array(
							"name"		=> "twitter",
							"url"		=> $this->sns_buttons['twitter']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['twitter']['button_text']
						),
						array(
							"name"		=> "google",
							"url"		=> $this->sns_buttons['google']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['google']['button_text']
						),
						array(
							"name"		=> "youtube",
							"url"		=> $this->sns_buttons['youtube']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['youtube']['button_text']
						)
					)
				);
				break;
			case self::WIDGET_SNS_SHARE :
				$currentUrl = Weluka::get_instance()->get_post_url($curPostId);
				$currentTitle = Weluka::get_instance()->get_post_title($curPostId);
				$ret = array(
					"id"		=> $nodeId,
					"type"		=> self::WIDGET_SNS_SHARE,
					"cssId"		=> "",
					"cssClass"	=> "",
					"class_name"		=> "",
					"direction"	=> "h",	//h=horizontal, v=vertical
					"buttons"	=> array(
						array(
							"name"			=> "facebook",
							"url"			=> $currentUrl,	//default this post
							"icon_type"		=> "round",
							"text"			=> $currentTitle,
							"label_text"	=> "",
							"flg_counter"	=> "on"
						),
						array(
							"name"		=> "twitter",
							"url"			=> $currentUrl,	//default this post
							"icon_type"	=> "round",
							"text"			=> $currentTitle,
							"label_text"	=> "",
							"account"		=> "",
							"flg_counter"	=> "on"
						),
						array(
							"name"		=> "google",
							"url"			=> $currentUrl,	//default this post
							"icon_type"	=> "round",
							"text"			=> $currentTitle,
							"label_text"	=> "",
							"flg_counter"	=> "on"
						)
					)
				);
				break;
			case self::WIDGET_MOVIE :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_MOVIE,
					"attachment_id"	=> "",	//case wordpress media
					"cssId"	=> "",
					"cssClass" => "",
					"class_name"	=> "",
			 		"width"	=> "",
			 		"height"=> "",
			 		"url"	=> "", //self::DEFAULT_MOVIE_URL
				);
				break;
			case self::WIDGET_AUDIO :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_AUDIO,
					"attachment_id"	=> "",	//case wordpress media
					"autoplay"	=> "on",
					"loop"		=> "on",
			 		"url"	=> ""
				);
				break;
			case self::WIDGET_APP_HORLINE :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_APP_HORLINE,
					"cssClass" => "",
					"line_style"	=> "solid",
					"line_width"	=> 2,
					"line_color"	=> ""
				);
				break;
			case self::WIDGET_APP_ALERT :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_APP_ALERT,
					"class_name" => "",
					"alert_class" => "alert-info",
					"close_button" => "on",
					"cssId"	=> "",
					"cssClass" => "",
            	    "text" => __('Please input a alert content.', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_GMAP :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_GMAP,
					"class_name" => "",
					"cssId"	=> "",
					"cssClass" => "",
					'addr'	=> self::DEFAULT_GMAP_ADDR,
					'url'	=> '',
					'map_w'	=> '100%',
					'map_h'	=> '300',
					'zoom'	=> 16,
					'lat'	=> '',
					'lng'	=> '',
					'info'	=> '',
					'staticw'	=> ''
				);
				break;
			case self::WIDGET_APP_EMBED :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_APP_EMBED,
            	    "code"	=> ""
				);			
				break;
			case self::WIDGET_APP_ACCORDION :
				$ret = array(
	            	"id"			=> $nodeId,
    	            "type"			=> self::WIDGET_APP_ACCORDION,
					"panels"	=> array(
						array(
							"header_text"	=> "Panel1",
							"body_text"		=> __('Please input a panel content.', Weluka::$settings['plugin_name']),
							"panel_style"	=> "",
							"open"			=> "on"
						)
					),
				);				
				break;
			case self::WIDGET_APP_TABS :
				$ret = array(
	            	"id"			=> $nodeId,
    	            "type"			=> self::WIDGET_APP_TABS,
					"panels"	=> array(
						array(
							"tab_text"		=> "Tab1",
							"body_text"		=> __('Please input a panel content.', Weluka::$settings['plugin_name']),
						),
						array(
							"tab_text"		=> "Tab2",
							"body_text"		=> __('Please input a panel content.', Weluka::$settings['plugin_name']),
						)
					),
				);
				break;
			case  self::WIDGET_WP_MENU :
				$ret = array(
	            	"id"			=> $nodeId,
    	            "type"			=> self::WIDGET_WP_MENU,
					"title"			=> __('Menu', Weluka::$settings['plugin_name']),
					"term_id"		=> ""
				);
				break;
			case self::WIDGET_WP_ARCHIVES :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_ARCHIVES,
					"title"				=> __('Archives', Weluka::$settings['plugin_name']),
					"show_type"			=> "",
					"show_post_count"	=> "",	//投稿数の表示有無
					"show_format"		=> "",	//html or select option
					"show_limit"		=> ""	//リスト表示数 デフォルト全て
				);
				break;
			case self::WIDGET_WP_CALENDAR :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_CALENDAR,
					"title"				=> __('Calendar', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_WP_CATEGORIES :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_CATEGORIES,
					"title"				=> __('Categories', Weluka::$settings['plugin_name']),
					"show_post_count"	=> "",	//投稿数の表示有無
					"hierarchical"		=> "",	//親子を別階層表示
					"show_dropdown"		=> ""
				);
				break;
			case self::WIDGET_WP_META :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_META,
					"title"				=> __('Meta', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_WP_PAGES :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_PAGES,
					"title"				=> __('Pages', Weluka::$settings['plugin_name']),
					"sortby"			=> "menu_order",
					"excludes"			=> ""	//除外pageId
				);
				break;
			case self::WIDGET_WP_COMMENTS :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_COMMENTS,
					"title"				=> __('Recent Comments', Weluka::$settings['plugin_name']),
					"comment_limit"		=> ""	//表示件数
				);
				break;
			case self::WIDGET_WP_POSTS :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_POSTS,
					"title"				=> __('Recent Posts', Weluka::$settings['plugin_name']),
					"categories"		=> "", //省略=ALL
					"flg_post_title"	=> 1,
					"flg_post_date"		=> 0,
					'flg_post_author'	=> 0,	//投稿者
					'flg_post_category'	=> 0,	//投稿カテゴリ名表示有無
					'flg_post_excerpt'	=> 0,	//投稿本文抜粋表示有無
					'flg_post_thumbnail'=> 0,	//投稿アイキャッチ画像表示有無
					'more_string'		=> "",	//続きを見るリンク文字列
					'all_post_url'		=> "",	//ALL POST LINK URL
					'all_post_link_string'	=> "",	//ALL TOPICS LINK STRING
					"post_limit"		=> 5,	//表示件数
					"list_height"			=> ""	//表示高さ
				);
				break;
			case self::WIDGET_WP_RSS :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_RSS,
					"title"				=> __('Rss Feed', Weluka::$settings['plugin_name']),
					"url"				=> "",
					"rss_limit"			=> 5,	//表示件数
					'show_summary'		=> 0,	//rss 抜粋表示有無
					'show_author'		=> 0,	//rss 著者表示有無
					'show_date'			=> 0,	//rss 日付表示有無
					"list_height"		=> ""	//表示高さ
				);
				break;
			case self::WIDGET_WP_SEARCH :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_SEARCH,
					"title"				=> __('Search', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_WP_TAGCLOUD :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_TAGCLOUD,
					"title"				=> __('Tag Cloud', Weluka::$settings['plugin_name']),
					"taxonomy"			=> "post_tag",	//post_tag or category
				);
				break;
			case self::WIDGET_TITLE :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_TITLE,
					"cssId"	=> "",
					"cssClass" => "",
        	        "class_name"	=> "",
            	    "text"	=> __('<h3>Please input a title.</h3>', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_APP_LIST :
				$ret = $this->create_widget_applist_array();
				break;
			default :
				//case WIDGET_TEXT
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_TEXT,
					"cssId"	=> "",
					"cssClass" => "",
        	        "class_name"	=> "",
            	    "text"	=> __('Please input a text.', Weluka::$settings['plugin_name'])
				);
				break;				
		}
		return $ret;
	}

	/**
	 * create widget applist array
	 * @since 1.0
	 */
	public function create_widget_applist_array($layoutClass = 'medialeft') {
		$ret = array();
		$weluka = Weluka::get_instance();
		$nodeId = $weluka->create_node_id();

		$ret = array(
			"id"			=> $nodeId,
			"type"			=> self::WIDGET_APP_LIST,
			"layout_class"	=> $layoutClass,
			"media_display"	=> 1,	//0=diplay none
			"title_display"	=> 1,	//0=diplay none
			"meta1_display"	=> 1,	//0=diplay none
			"meta2_display"	=> 1,	//0=diplay none
			"content_display"	=> 1,	//0=diplay none
			"button_display"	=> 1,	//0=diplay none
			"datas"	=> array(
					array(
						"media"	=> array(
							"type"			=> 	self::WIDGET_IMG,
							"class_name"			=> "weluka-text-left",
					 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
						),
						"title"	=> array(
							"text"	=> __('List Headline 1', Weluka::$settings['plugin_name'])
						),
						"content"	=> array(
							"text"	=> __('List content (News, announcements, guidance) Please enter an excerpt of such. Font size in the visual editor, set the style of color, etc., it is possible to be more attractive Mihae. In addition it is also possible to choose whether or not to display this item.', Weluka::$settings['plugin_name'])
						),
						"meta1"		=> array(
							"text"	=> __('September 15, 2015', Weluka::$settings['plugin_name'])
						),
						"meta2"		=> array(
							"text"	=> __('News, Service, Product', Weluka::$settings['plugin_name'])
						)
					),
					array(
						"media"	=> array(
							"type"			=> 	self::WIDGET_IMG,
							"class_name"			=> "weluka-text-left",
					 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
						),
						"title"	=> array(
							"text"	=> __('List Headline 2', Weluka::$settings['plugin_name'])
						),
						"content"	=> array(
							"text"	=> __('List content (News, announcements, guidance) Please enter an excerpt of such. Font size in the visual editor, set the style of color, etc., it is possible to be more attractive Mihae. In addition it is also possible to choose whether or not to display this item.', Weluka::$settings['plugin_name'])
						),
						"meta1"		=> array(
							"text"	=> __('September 15, 2015', Weluka::$settings['plugin_name'])
						),
						"meta2"		=> array(
							"text"	=> __('News, Service, Product', Weluka::$settings['plugin_name'])
						)
					),
					array(
						"media"	=> array(
							"type"			=> 	self::WIDGET_IMG,
							"class_name"			=> "weluka-text-left",
					 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
						),
						"title"	=> array(
							"text"	=> __('List Headline 3', Weluka::$settings['plugin_name'])
						),
						"content"	=> array(
							"text"	=> __('List content (News, announcements, guidance) Please enter an excerpt of such. Font size in the visual editor, set the style of color, etc., it is possible to be more attractive Mihae. In addition it is also possible to choose whether or not to display this item.', Weluka::$settings['plugin_name'])
						),
						"meta1"		=> array(
							"text"	=> __('September 15, 2015', Weluka::$settings['plugin_name'])
						),
						"meta2"		=> array(
							"text"	=> __('News, Service, Product', Weluka::$settings['plugin_name'])
						)
					)
			)
		);
		return $ret;
	}
	
	/**
	 * container class get
	 * @since 1.0
	 */
	public function get_container_class( $data = array() ) {
		$ret	= 'weluka-container';

		//option
		$optVal = WelukaAdminSettings::get_options( WelukaAdminSettings::CONTAINER_TYPE );
		//section setting
		$sectionVal = !empty($data['container_type']) ? $data['container_type'] : '';

		if( !empty( $sectionVal ) ) { $ret = $sectionVal; }
		elseif( !empty( $optVal ) ) { $ret = $optVal; }

		return $ret;
	}
 
	/**
	 * builder new blank droppable section dispaly
	 * @since 1.0
	 */
	public function render_new_blank($echo = true) {
		$ct = "";
		$containerClass = $this->get_container_class();

		$ct = '<div id="weluka-new-blank" class="' . $containerClass . ' clearfix"><div class="weluka-row clearfix"><div class="weluka-col-md-12">' .
			  '<div class="weluka-new-panel">' .
			  __('Please add a widget by drag and drop and make contents.', Weluka::$settings['plugin_name']) .
			  '<div class="weluka-droppable" data-weluka-drop-position="new"></div>' .
			  '</div>' .
			 //'<p class="weluka-mgtop-xl"><button id="weluka-layoutselect" type="button" class="aligncenter weluka-btn weluka-btn-info btn-lg no-rounded sp-block-btn" style="font-weight:600;" disabled="disabled">' .
			 // __('Sample Select', Weluka::$settings['plugin_name']) .
			 //'</button></p>' .
			  '</div></div></div>';

		if($echo) { echo $ct; }else{ return $ct; }
	}
	/**
	 * builder sections data html create
	 * @since 1.0
	 */	
	public function render_sections($builderData, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";

		if( !empty( $builderData['sections'] ) ) {
			foreach($builderData['sections'] as $sectionVal) : //section
				$content .= $this->render_section($sectionVal, false);
			endforeach; //setion end foreach

			if($builderMode) {
				$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="section"></div>';	//section drop area last bottom
			}
		}
		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder section data html create
	 * @since 1.0
	 */
	public function render_section($data, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		
		if( empty($data['id']) ) { return ""; }

		//pro $containerClass = $this->get_container_class( $data );
		$containerClass = 'weluka-container-fluid';

		if($builderMode) {
			$content = '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="section"></div>';	//section drop area top
			$content .= '<div id="' . $data['id'] . '" class="weluka-section-block" data-block-title="' . __('Section', Weluka::$settings['plugin_name']) . '">'; 
		}
		
		$class = isset($data['class_name']) && strlen(trim($data['class_name'])) > 0 ? ' ' . $data['class_name'] : "";
		$style = $this->get_style_attribute($data);
		$cssId = isset($data['cssId']) && strlen(trim($data['cssId'])) > 0 ? 'id="' . $data['cssId'] . '"' : "";
		$cssClass = isset($data['cssClass']) && strlen(trim($data['cssClass'])) > 0 ? ' ' . $data['cssClass'] : "";
		$anchor = !empty ($data['anchor_id']) ? '<a id="' . $data['anchor_id'] . '"></a>' : "";
		
		$content .= $anchor;
		$content .= '<div ' . $cssId . ' class="weluka-section' . $class . $cssClass . '" ' . $style . '>';
		$content .= '<div class="' . $containerClass . ' clearfix">';
		$content .= $this->render_rows($data['rows'], false);
		$content .= '</div>'; //container end

		if($builderMode) {
			$content .= $this->overlay_html('section', false);
		}
		$content .= '</div>'; //section end

		if($builderMode) { $content .= '</div>'; }
		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder rows data html create
	 * @since 1.0
	 */
	public function render_rows($rows, $echo = true, $subrow = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		if(is_array($rows)) :
		foreach($rows as $rowVal) :
			$content .= $this->render_row($rowVal, false, $subrow);
		endforeach;
		endif;
		
		if($builderMode) {
			$pos = $subrow ? 'subrow' : 'row';
			$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="' . $pos . '"></div>';	//row drop area last
		}

		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder row data html create
	 * @since 1.0
	 */
	public function render_row($data, $echo = true, $subrow = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$blockClass = $subrow ? 'weluka-s-row-block' : 'weluka-row-block';
		
		if($builderMode) {
			$pos = $subrow ? 'subrow' : 'row';
			$content = '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="' . $pos . '"></div>';	//row drop area top
			$content .= '<div id="' . $data['id'] . '" class="' . $blockClass . ' clearfix" data-block-title="' . __('Row', Weluka::$settings['plugin_name']) . '">'; 
		}
		$class = isset($data['class_name']) && strlen(trim($data['class_name'])) > 0 ? ' ' . $data['class_name'] : "";
		$style = $this->get_style_attribute($data);
		$cssId = isset($data['cssId']) && strlen(trim($data['cssId'])) > 0 ? 'id="' . $data['cssId'] . '"' : "";
		$cssClass = isset($data['cssClass']) && strlen(trim($data['cssClass'])) > 0 ? ' ' . $data['cssClass'] : "";
		$blockShape = isset($data['block_shape']) && strlen(trim($data['block_shape'])) > 0 ? ' ' . $data['block_shape'] : "";

		$bgcolor	= !empty($data["background_color"]) ? trim($data["background_color"]) : '';
		$borderSize	= !empty($data['border_size']) ? trim($data['border_size']) . 'px' : '';
		
		$nmgClass = '';
		if($borderSize !== '' || $bgcolor !== '') {
			$nmgClass = ' weluka-row-negative-margin-clear';
		}

		$content .= '<div ' . $cssId . ' class="weluka-row clearfix' . $class . $cssClass . $blockShape . $nmgClass . '" ' . $style . '>';

		if($subrow === true) {
			$content .= $this->render_colums($data['subcolums'], false, true);
		}else{
			$content .= $this->render_colums($data['colums'], false);
		}
		
		if($builderMode) {
			$mode = $subrow ? 's_row' : 'row';
			$content .= $this->overlay_html($mode, false);
		}

		$content .= '</div>';
		if($builderMode) {
			$content .= '</div>';
		}
		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder colums data html create
	 * @since 1.0
	 */
	public function render_colums($colums, $echo = true, $subcolum = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		if(is_array($colums)) :
		foreach($colums as $columVal) :
			$content .= $this->render_colum($columVal, false, $subcolum);
		endforeach;
		endif;
		if($echo){ echo $content; }else{ return $content; }
	}

	/**
	 * builder colum data html create
	 * @since 1.0
	 */
	public function render_colum($data, $echo = true, $subcolum = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";

		$col = isset($data['col']) ? ' weluka-col-md-' . $data['col'] : ' weluka-col-md-12';
		$class = isset($data['class_name']) && strlen(trim($data['class_name'])) > 0 ? ' ' . $data['class_name'] : "";
		$style = $this->get_style_attribute($data);
		$cssClass = isset($data['cssClass']) && strlen(trim($data['cssClass'])) > 0 ? ' ' . $data['cssClass'] : "";
		$blockShape = isset($data['block_shape']) && strlen(trim($data['block_shape'])) > 0 ? ' ' . $data['block_shape'] : "";

		$bgcolor	= !empty($data["background_color"]) ? trim($data["background_color"]) : '';
		$borderSize	= !empty($data['border_size']) ? trim($data['border_size']) . 'px' : '';
		
		$nmgClass = '';
		if( $borderSize !== '' || $bgcolor !== '' ) {
			$nmgClass = $builderMode ? ' weluka-col-negative-margin-clear-builder' : ' weluka-col-negative-margin-clear';
		}

		$blockClass = $subcolum ? 'weluka-s-col-block' : 'weluka-col-block';

		if($builderMode) {
			$pdtop	= isset($data["padding_top"]) && strlen(trim($data["padding_top"])) > 0 ? $data["padding_top"] . 'px' : '';
			$content .= '<div id="' . $data['id'] . '" class="' . $blockClass . ' weluka-col' . $col . $class . $cssClass . $blockShape . $nmgClass . '" ' . $style . ' data-block-title="' . __('Colum', Weluka::$settings['plugin_name']) . '" data-orgpdt="' . $pdtop . '">';			
		}else{
			$content .= '<div class="weluka-col' . $col . $class . $cssClass . $blockShape . $nmgClass. '" ' . $style . '>';
		}

		if($subcolum == true) {
			$content .= $this->render_items($data['subitems'], false, true);
		}else{
			$content .= $this->render_items($data['items'], false);
		}
		
		if($builderMode) {
			$mode = $subcolum ? 's_col' : 'col';
			$content .= $this->overlay_html($mode, false);
		}
		$content .= '</div>';

		if($echo){ echo $content; }else{ return $content; }
	}

	/**
	 * builder items data display
	 * @since 1.0
	 */
	public function render_items($items, $echo = true, $subitem = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		if(is_array($items)) :
		foreach($items as $itemVal) :
			//$ret = "";
			if(isset($itemVal['subrows'])) {
				if($builderMode) {
					$content .= '<div id="' . $itemVal['id'] . '" class="weluka-widget" data-widget-type="subwidget">';
				}
				$content .= $this->render_rows($itemVal['subrows'], false, true);
				if($builderMode) {
					$content .= '</div>';
				}
				break;
			}
			
			$content .= $this->render_item($itemVal, false, $subitem);
		endforeach;
		endif;
		if($echo){ echo $content; }else{ return $content; }
	}

	/**
	 * builder item data display
	 * @since 1.0
	 */
	public function render_item($item, $echo = true, $subitem = false) {
		$content = "";
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$blockClass = $subitem ? 'weluka-s-widget' : 'weluka-widget';
		
		if($builderMode) {
			$content .= '<div id="' . $item['id'] . '" class="weluka-widget-block ' . $blockClass . '" data-widget-type="' . $item['type'] . '" data-block-title="' . __('Edit', Weluka::$settings['plugin_name']) . '">';
		}
		
		$ret = "";
		switch($item['type']) {
			case self::WIDGET_IMG :
				$ret = $this->widget_img_html($item, $echo);
				break;
			case self::WIDGET_BUTTON :
				$ret = $this->widget_button_html($item, $echo);
				break;
			case self::WIDGET_MOVIE :
				$ret = $this->widget_movie_html($item, $echo);
				break;
			case self::WIDGET_AUDIO :
				$ret = $this->widget_audio_html($item, $echo);
				break;
			case self::WIDGET_APP_HORLINE :
				$ret = $this->widget_apphorline_html($item, $echo);
				break;
			case self::WIDGET_APP_ALERT :
				$ret = $this->widget_appalert_html($item, $echo);
				break;
			case self::WIDGET_GMAP :
				$ret = $this->widget_gmap_html($item, $echo);
				break;
			case self::WIDGET_ICON :
				$ret = $this->widget_icon_html($item, $echo);
				break;
			case self::WIDGET_SLIDE :
				$ret = $this->widget_slide_html($item, $echo);
				break;
			case self::WIDGET_SNS_BUTTON :
				$ret = $this->widget_snsbutton_html($item, $echo);
				break;
			case self::WIDGET_SNS_SHARE :
				$ret = $this->widget_snsshare_html($item, $echo);
				break;
			case self::WIDGET_APP_EMBED :
				$ret = $this->widget_appembed_html($item, $echo);
				break;
			case self::WIDGET_APP_ACCORDION :
				$ret = $this->widget_accordion_html($item, $echo);
				break;			
			case self::WIDGET_APP_TABS :
				$ret = $this->widget_tabs_html($item, $echo);
				break;
			case self::WIDGET_APP_LIST :
				$ret = $this->widget_list_html($item, $echo);
				break;
			case self::WIDGET_WP_MENU :
				$ret = $this->widget_wpmenu_html($item, $echo);
				break;
			case self::WIDGET_WP_ARCHIVES :
				$ret = $this->widget_wparchives_html($item, $echo);
				break;
			case self::WIDGET_WP_CALENDAR :
				$ret = $this->widget_wpcalendar_html($item, $echo);
				break;
			case self::WIDGET_WP_CATEGORIES :
				$ret = $this->widget_wpcategories_html($item, $echo);
				break;
			case self::WIDGET_WP_META :
				$ret = $this->widget_wpmeta_html($item, $echo);
				break;
			case self::WIDGET_WP_PAGES :
				$ret = $this->widget_wppages_html($item, $echo);
				break;
			case self::WIDGET_WP_COMMENTS :
				$ret = $this->widget_wpcomments_html($item, $echo);
				break;
			case self::WIDGET_WP_POSTS :
				$ret = $this->widget_wpposts_html($item, $echo);
				break;
			case self::WIDGET_WP_RSS :
				$ret = $this->widget_wprss_html($item, $echo);
				break;
			case self::WIDGET_WP_SEARCH :
				$ret = $this->widget_wpsearch_html($item, $echo);
				break;
			case self::WIDGET_WP_TAGCLOUD :
				$ret = $this->widget_wptagcloud_html($item, $echo);
				break;
			case self::WIDGET_TITLE :
			default :
				//case WIDGET_TEXT
				$ret = $this->widget_text_html($item, $echo);
		}
		$content .= $ret;

		if($builderMode) {
			$mode = $subitem ? 's_widget' : 'widget';
			$content .= $this->overlay_html($mode, false);
			$content .= '</div>';
		}		
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = text or title data html
	 * @since 1.0
	 */
	public function widget_text_html($item, $echo = true) {
		global $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, true, false);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$blockShape = isset($item['block_shape']) && strlen(trim($item['block_shape'])) > 0 ? ' ' . $item['block_shape'] : "";
		$shadowStyle	= !empty( $item['shadow_style'] ) ? $item['shadow_style'] : '';
		$shadowColor	= !empty( $item['shadow_color'] ) ? $item['shadow_color'] : '';

		$text = isset( $item['text'] ) ? trim($item['text']) : "";
		if(strstr($text, "[embed") !== false) {
			$text = $wp_embed->run_shortcode($text); //embed shortcode exec
		}

		//text shadow
		if( $shadowStyle !== '' ) {
			$shadow = $this->text_shadow_styles[ $shadowStyle ];
			$_shadow = 'text-shadow:' . $shadow['offset_v'] . ' ' . $shadow['offset_h'] . ' ' . $shadow['grad'];
			if( $shadowColor !== '') {
				$_shadow .= ' ' . $shadowColor . ';';
			} else {
				$_shadow .= ' ' . $shadow['default_color'] . ';';
			}
			$style .= $_shadow;
		}
		
		$content .= '<div ' . $cssId . ' class="weluka-text weluka-content' . $class . $blockShape . $cssClass . '" style="' . $style . '">';
		$content .= $text; //$item['text'];
		$content .= '</div>';

		$content = stripslashes($content);

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = img data html
	 * @since 1.0
	 */
	public function widget_img_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$sourceType = isset($item['source_type']) && strlen(trim($item['source_type'])) > 0 ? $item['source_type'] : "media";
		$style = $this->get_style_attribute($item, false);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$fitWidth = isset($item['fitwidth']) && strlen(trim($item['fitwidth'])) > 0 ? ' weluka-img-fullwidth' : "";
		$borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] . 'px' : '';
		$borderStyle= isset($item['border_style']) && strlen(trim($item['border_style'])) > 0 ? $item['border_style'] : 'solid';
		$borderColor= isset($item['border_color']) && strlen(trim($item['border_color'])) > 0 ? $item['border_color'] : '#dddddd';
		
		$border = '';
		if($borderSize !== '') {
			$border = ' style= "border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ' !important;"';
		}

		$src = "";
		
		if($sourceType === "extern") {
			//外部画像
			if(isset($item['external'])){
				$src = $item['external'];
			}
		}else{
			if(isset($item['url'])) {
				$src = $item['url'];
			}
		}
		$alt = isset($item['alt']) ? ' alt="'. esc_attr($item['alt']) . '"' : "";
		$width = isset($item['width']) ? ' width="'. $item['width'] . '"' : "";
		$height = isset($item['height']) ? ' height="'. $item['height'] . '"' : "";
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";

		$content .= '<div class="weluka-img weluka-content' . $class . '" ' . $style . '>';
		$img = '<img ' . $cssId . ' class="img-responsive' . $shape . $cssClass . $fitWidth . '" src="' . $src. '"' . $width . $height . $alt . $border . ' />';
		if(!empty($item['link']) && isset($item['link']['href']) && $item['link']['href'] !== "") {
			$item['link']['title'] = isset($item['alt']) ? $item['alt'] : "";
			$item['link']['content'] = $img;
			$content .= $this->link_html($item['link'], false);
		}else{
			$content .= $img;
		}
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = button data html
	 * @since 1.0
	 */
	public function widget_button_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$text = isset($item['text']) && strlen(trim($item['text'])) > 0 ? $item['text'] : "BUTTON";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : '';
		$style = $this->get_style_attribute($item);
		$color = !empty($item['button_color']) ? ' ' . $item['button_color'] : " weluka-btn-default";
		$shape = !empty($item['shape']) ? ' ' . $item['shape'] : '';
		$size = !empty($item['size']) ? ' ' . $item['size'] : '';
		$block = !empty($item['block']) ? ' btn-block' : '';
		$link = !empty($item['link']) ? $item['link'] : array( "action"	=> "", "href" => "#", "target" => "");
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		$content .= '<div class="weluka-button weluka-content' . $class . '" ' . $style . '>';
		
		$href = "#";
		$target = "";
		if($link['action'] === self::LINK_ACTION_GOTOLINK){
			$href = $link["href"];
			$target = strlen($link['target']) > 0 ? ' target="' . $link['target'] . '"' : "";
		}
		$content .= '<a href="' . $href . '"' . $target . ' class="weluka-btn' . $color . $size . $block . $shape . $cssClass . '">' . $text . '</a>';
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = movie data html
	 * @since 1.0
	 * wp media
	 * youtube
	 * vimeo
	 * dailymotion
	 * niconico
	 * ustream
	 * vine
	 * anitube
	 * fc2
	 * xvides
	 * redtube
	 * xhamster
	 * pornhub
	 * 
	 */
	public function widget_movie_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$url = isset($item['url']) && strlen(trim($item['url'])) > 0 ? trim($item['url']) : ""; //self::DEFAULT_MOVIE_URL;
		$sourceType = isset($item['source_type']) ? $item['source_type'] : ''; //Pro youtube
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : '';
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		
		$embedOptions = array();
		$embedOptions['noTitle']	= isset($item['display_notitle']) && strlen(trim($item['display_notitle'])) > 0 ? $item['display_notitle'] : "";
		$embedOptions['noCtrl']		= isset($item['display_nocontrol']) && strlen(trim($item['display_nocontrol'])) > 0 ? $item['display_nocontrol'] : "";
		$embedOptions['noAuthor']	= isset($item['display_noauthor']) && strlen(trim($item['display_noauthor'])) > 0 ? $item['display_noauthor'] : "";
		$embedOptions['noLogo']		= isset($item['display_nologo']) && strlen(trim($item['display_nologo'])) > 0 ? $item['display_nologo'] : "";
		$embedOptions['noRelated']	= isset($item['display_norelated']) && strlen(trim($item['display_norelated'])) > 0 ? $item['display_norelated'] : "";
		$embedOptions['autoPlay']	= isset($item['autoplay']) ? $item['autoplay'] : "";
		$embedOptions['loop']		= isset($item['loop']) ? $item['loop'] : "";

		$_id = !empty($item['id']) ? $item['id'] : Weluka::get_instance()->create_node_id();
		$movieId = 'weluka-movie-' . $_id;

		if($url === "" || $sourceType == "") { //Lite sourceType check
			$src = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please setting movie content', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			//script tag
			$url = str_replace(array('{SCRIPT}', '{/SCRIPT}'), array('<script', '</script'), $url);
			$src = $this->get_movie_src($url, $builderMode, $sourceType, $movieId, $embedOptions);
		}
		$content .= '<div class="weluka-movie-wrapper weluka-content" ' . $style . '>';
		
		$mClass = "weluka-movie";
		if(strpos($url, "<script") !== false && !$builderMode) {
			$mClass = "weluka-movie-2";	
		}
		
		$ptop = "";
		if($sourceType === 'media') {
			$ptop = ' style="padding:0; height:100%;"';
			$src = str_replace(array("\r\n","\n","\r"), '', stripslashes($src)); //改行があるとbrが挿入される
		}
		$content .= '<div id="' . $movieId . '" class="' . $mClass . $class . $cssClass . '"' . $ptop . '>';

		$content .= $src;
		$content .= '</div>';
		$content .= '</div>';

		if(strpos($url, "<script") === false) {
			$content = stripslashes($content);
		}

		if($builderMode && $this->get_property("render_post_result") !== true && $sourceType === 'media') {
        	$content .= '<div class="weluka-hide"><script type="text/javascript">';
			$content .= 'jQuery(document).ready(function($) { $("#' . $movieId . '").find(".wp-video-shortcode").mediaelementplayer(); $("#' . $movieId . ' br").remove(); }); </script></div>';
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * create movie embed src html
	 * @since 1.0
	 */
	public function get_movie_src( $url, $builderMode, $type = 'youtube', $objId = "", $options = null ) {
		$ret = "";

		if($type === 'youtube'){
			if(strpos($url, "<iframe") !== false) {
				//iframe
				$ret = $url;				
			}elseif ( preg_match('/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"\'>]+)/', $url, $movieId) ||
			          preg_match('/^(?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"\'>]+)/', $url, $movieId) ) {
				$_noTitle	= is_array($options) && isset($options['noTitle']) && $options['noTitle'] ? 'showinfo=0' : ''; //title and auther
				$_noCtrl	= is_array($options) && isset($options['noCtrl']) && $options['noCtrl'] ? 'controls=0' : '';
				$_noRelated	= is_array($options) && isset($options['noRelated']) && $options['noRelated'] ? 'rel=0' : '';
				$_auto		= is_array($options) && isset($options['autoPlay']) && $options['autoPlay'] ? 'autoplay=1' : '';
				$_loop		= is_array($options) && isset($options['loop']) && $options['loop'] ? 'loop=1' : '';
				$param = '';
				if($_noTitle){ $param = '?' . $_noTitle; }
				if($_noCtrl){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_noCtrl;
				}
				if($_noRelated){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_noRelated;
				}
				if($_auto && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_auto;
				}
				if($_loop && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_loop;
				}
				
				$src = '//www.youtube.com/embed/' . $movieId[1] . $param;
				$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
			}
		}elseif($type === 'media') {
			$attr = array(
				'src'      => set_url_scheme($url),
				'preload' => 'none'
			);
			$ret = wp_video_shortcode($attr);
		}elseif($type === 'vimeo') {
			if(strpos($url, "<iframe") !== false) {
				//iframe
				$ret = $url;				
			}elseif ( preg_match("/(?:http(?:s)?:\/\/)?(?:www\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $movieId) ||
			          preg_match("/(?:\/\/)?(?:www\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $movieId) ) {
				//url or link url
				$_noTitle	= is_array($options) && isset($options['noTitle']) && $options['noTitle'] ? 'title=0' : '';
				$_noAuthor	= is_array($options) && isset($options['noAuthor']) && $options['noAuthor'] ? 'byline=0' : '';
				$_auto		= is_array($options) && isset($options['autoPlay']) && $options['autoPlay'] ? 'autoplay=1' : '';
				$_loop		= is_array($options) && isset($options['loop']) && $options['loop'] ? 'loop=1' : '';
				$param = '';
				if($_noTitle){ $param = '?' . $_noTitle; }
				if($_noAuthor){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_noAuthor;
				}
				if($_auto && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_auto;
				}
				if($_loop && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_loop;
				}

				$src = '//player.vimeo.com/video/' . $movieId[3] . $param;
				$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
			}
		}elseif($type === 'dailymotion') {
			if(strpos($url, "<iframe") !== false) {
				//iframe
				$ret = $url;
			}else{
				//url or permalink
				$movieId = explode("_", basename($url));
				if(is_array($movieId) && strlen($movieId[0]) > 0) {
					$_noTitle	= is_array($options) && isset($options['noTitle']) && $options['noTitle'] ? 'info=0' : ''; //title and auther
					$_noLogo	= is_array($options) && isset($options['noLogo']) && $options['noLogo'] ? 'logo=0' : '';
					$_noRelated	= is_array($options) && isset($options['noRelated']) && $options['noRelated'] ? 'related=0' : '';
					$_auto		= is_array($options) && isset($options['autoPlay']) && $options['autoPlay'] ? 'autoplay=1' : '';
					$param = '';
					if($_noTitle){ $param = '?' . $_noTitle; }
					if($_noLogo){
						if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
						$param .= $_noLogo;
					}
					if($_noRelated){
						if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
						$param .= $_noRelated;
					}
					if($_auto && !$builderMode){
						if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
						$param .= $_auto;
					}

					$src = '//www.dailymotion.com/embed/video/' . $movieId[0] . $param;
					$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
				}
			}
/*
		}elseif($type === 'niconico'){
			if(strpos($url, "<script") !== false) {
				if($builderMode) {
        			$ret = '<div class="weluka-hide"><script type="text/javascript">';
					$ret .= 'jQuery(document).ready(function($) {';
					$ret .= 'var iframe = document.createElement("iframe");';
					$ret .= 'document.getElementById("' . $objId . '").appendChild(iframe);';
					$ret .= 'var doc = iframe.contentWindow.document;';
					$ret .= "doc.open();";
					$ret .= "doc.write('<html><head><\/head><body>" . str_replace("</", "<\/", $url) . "<\/body><\/html>');";
					$ret .= "doc.close();";
					$ret .= '});</script></div>';
				}else{
					$ret = $url;
				}
			}else{
				$movieId = basename($url);
				if($movieId !== ''){
					$src = Weluka::$settings['plugin_url'] . 'includes/niconico.php?id=' . $movieId;
					$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
				}
			}
*/
		}elseif($type === 'ustream'){
			//iframe only
			$ret = $url;
		}else{ //other
			//xvideos
			if(strpos($url, "xvideos") !== false) {
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					$urlSplit = explode("/", str_replace(array("http://", "https://", "//"), "", $url));
					if(is_array($urlSplit) && strlen($urlSplit[1]) > 0) {
						//get video id
						$movieId = str_replace("video", "", $urlSplit[1]);
						$src = '//flashservice.xvideos.com/embedframe/' . $movieId;
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}elseif(strpos($url, "pornhub") !== false) {	//pornhub
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					$movieId = explode("viewkey=", basename($url));
					if(is_array($movieId) && strlen($movieId[1]) > 0) {
						//get video id
						$src = '//www.pornhub.com/embed/' . $movieId[1];
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}elseif(strpos($url, "redtube") !== false) {	//pornhub
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					$movieId = basename($url);
					if($movieId !== '') {
						//get video id
						$src = '//embed.redtube.com/?id=' . $movieId;
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}elseif(strpos($url, "xhamster") !== false) {
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					$movieId = explode("/", str_replace(array("http://", "https://", "//"), "", $url));
					if(is_array($movieId) && strlen($movieId[2]) > 0) {
						$src = '//xhamster.com/xembed.php?video=' . $movieId[2];
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}else{
				if(strpos($url, "<script") !== false) {
					if($builderMode) {
        				$ret = '<div class="weluka-hide"><script type="text/javascript">';
						$ret .= 'jQuery(document).ready(function($) {';
						$ret .= 'var iframe = document.createElement("iframe");';
						$ret .= 'document.getElementById("' . $objId . '").appendChild(iframe);';
						$ret .= 'var doc = iframe.contentWindow.document;';
						$ret .= "doc.open();";
						$ret .= "doc.write('<html><head><\/head><body>" . str_replace("</", "<\/", $url) . "<\/body><\/html>');";
						$ret .= "doc.close();";
						$ret .= '});</script></div>';
					}else{
						$ret = $url;
					}
				}elseif(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}
			}
		}
		return $ret;
	}

	/**
	 * builder item type = audio data html
	 * @since 1.0
	 */
	public function widget_audio_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$sourceType = isset($item['source_type']) && strlen(trim($item['source_type'])) > 0 ? $item['source_type'] : 'media';
		$url = isset($item['url']) && strlen(trim($item['url'])) > 0 ? set_url_scheme($item['url']) : "";
		$title = isset($item['title']) && strlen(trim($item['title'])) > 0 ? $item['title'] : "";
		$autoplay = isset($item['autoplay']) && strlen(trim($item['autoplay'])) > 0 ? $item['autoplay'] : '';
		$loop = isset($item['loop']) && strlen(trim($item['loop'])) > 0 ? $item['loop'] : '';		
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : '';
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$audioId = 'weluka-audio-' . $item['id'];
		
		$audio = "";
		if($url === "") {
			$audio = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please setting audio content', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			$_auto = false;
			$_loop = false;
            if (!$builderMode) { //not builder mode
                if($autoplay == 'on') { $_auto = true; }
                if($loop == 'on'){ $_loop = true; }
            }
			$attr = array(
				'src'      => $url,
				'loop'     => $_loop,
				'autoplay' => $_auto,
				'preload' => 'none'
			);
			$audio = wp_audio_shortcode($attr);
		}
		$content .= '<div id="' . $audioId . '" class="weluka-audio weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $audio;
		$content .= '</div>';

		$content =  str_replace(array("\r\n","\n","\r"), '', stripslashes($content));

		if($builderMode && $this->get_property("render_post_result") !== true) {
        	$content .= '<div class="weluka-hide"><script type="text/javascript">';
			$content .= 'jQuery(document).ready(function($) { $("#' . $audioId . '").find(".wp-audio-shortcode").mediaelementplayer(); }); </script></div>';
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = appphorline data html
	 * @since 1.0
	 */
	public function widget_apphorline_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, false, false);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . trim( $item['cssClass'] ) : "";
		$lineStyle = !empty($item['line_style']) ? ' ' .$item['line_style'] : " solid";
		$lineWidth = isset($item['line_width']) && strlen(trim($item['line_width'])) > 0 ? trim( $item['line_width'] ) . 'px' : "3px";
		$lineColor = isset($item['line_color']) && strlen(trim($item['line_color'])) > 0 ? ' ' . trim( $item['line_color'] ) : " #cccccc";

		$borderBtm	= ' border-bottom:' . $lineWidth . $lineStyle . $lineColor . ';';
		$mg			= $builderMode ? ' margin: 5px 0;' : "";

		$style = ' style="' . $style . $borderBtm . $mg . '"';
		$content = '<div class="weluka-horline weluka-content' . $class . $cssClass . '" ' . $style . '></div>';

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = apppalert data html
	 * @since 1.0
	 */
	public function widget_appalert_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$alertClass = isset($item['alert_class']) && strlen(trim($item['alert_class'])) > 0 ? ' ' . $item['alert_class'] : "";
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$close = isset($item['close_button']) && strlen(trim($item['close_button'])) > 0 ? '<a href="#" class="close weluka-noscroll" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>' : "";
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";

		$content = '<div ' . $cssId . ' class="weluka-alert weluka-content alert fade in' . $class . $alertClass . $shape . $cssClass . '" ' . $style . '>';
		$content .= $close;
		$content .= $item['text'];
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = gmap data html
	 * @since 1.0
	 */
	public function widget_gmap_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";
		$addr = isset($item['addr']) && strlen(trim($item['addr'])) > 0 ? $item['addr'] : "";
		$url = isset($item['url']) && strlen(trim($item['url'])) > 0 ? $item['url'] : "";
		$mapW = isset($item['map_w']) && strlen(trim($item['map_w'])) > 0 ? $item['map_w'] : "100%";
		$mapH = isset($item['map_h']) && strlen(trim($item['map_h'])) > 0 ? $item['map_h'] : "300";
		$zoom = isset($item['zoom']) && strlen(trim($item['zoom'])) > 0 ? $item['zoom'] : 16;
		$lat = isset($item['lat']) && strlen(trim($item['lat'])) > 0 ? $item['lat'] : "";
		$lng = isset($item['lng']) && strlen(trim($item['lng'])) > 0 ? $item['lng'] : "";
		$info = isset($item['info']) && strlen(trim($item['info'])) > 0 ? $item['info'] : "";
		$staticw = isset($item['staticw']) && strlen(trim($item['staticw'])) > 0 ? $item['staticw'] : "";
		$draggable = !empty($item['draggable']) ? 0 : 1;
		$styleJson = isset($item['style_json']) && strlen(trim($item['style_json'])) > 0 ? str_replace(array("\r\n","\n","\r", " ", "\t"), '', trim(strip_tags($item['style_json']))) : "";

		if($styleJson) {
			$styleJson = str_replace(array("[", "]", '"'), array("$", "~", "%"), $styleJson);
		}
		$sh = sprintf('[%s addr="%s" url="%s" w="%s" h="%s" z="%s" lat="%s" lng="%s" info="%s" staticw="%s" stylejson="%s" draggable="%s"]',
					$this->gmap_shortcode_tag, $addr, $url , $mapW, $mapH, $zoom, $lat, $lng, $info, $staticw, $styleJson, $draggable
			  ); 

		$content = '<div ' . $cssId . ' class="weluka-gmap weluka-content' . $class . $shape . $cssClass . '" ' . $style . '>';
		$content .= do_shortcode($sh);
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = icon data html
	 * @since 1.0
	 */
	public function widget_icon_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, false);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$iconClass = isset($item['icon_class']) && strlen(trim($item['icon_class'])) > 0 ? ' ' . $item['icon_class'] : "fa-camera";
		$iconSize = isset($item['icon_size']) && strlen(trim($item['icon_size'])) > 0 ? ' font-size:' . trim($item['icon_size']) . 'px;' : " font-size:32px;";
		$iconColor = isset($item['icon_color']) && strlen(trim($item['icon_color'])) > 0 ? ' color:' . trim($item['icon_color']) . ';' : " color:#666666;";
		$link = !empty($item['link']) ? $item['link'] : array( "action"	=> "", "href" => "#", "target" => "");
		
		$content = '<div ' . $cssId . ' class="weluka-icon weluka-content' . $class . $cssClass . '" ' . $style . '>';

		$icon = '<i class="fa ' . $iconClass . '" style="' . $iconSize . $iconColor . '"></i>';

		if(!empty($item['link']) && isset($item['link']['href']) && $item['link']['href'] !== "") {
			$item['link']['title'] = "";
			$item['link']['content'] = $icon;
			$content .= $this->link_html($item['link'], false);
		}else{
			$content .= $icon;
		}
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = slide data html
	 * @since 1.0
	 */
	public function widget_slide_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, false);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$blockShape = isset($item['block_shape']) && strlen(trim($item['block_shape'])) > 0 ? ' ' . $item['block_shape'] : "";

		$borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] . 'px' : '';
		$borderStyle= isset($item['border_style']) && strlen(trim($item['border_style'])) > 0 ? $item['border_style'] : 'solid';
		$borderColor= isset($item['border_color']) && strlen(trim($item['border_color'])) > 0 ? $item['border_color'] : '#dddddd';
		
		$border = '';
		if($borderSize !== '') {
			$border = ' style= "border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ';"';
		}

		$slideSize = isset($item['slide_size']) && strlen(trim($item['slide_size'])) > 0 ? $item['slide_size'] : "full";

		$slideOption = "";
						
		$slide = "";
		if(isset($item["slides"][0]) && $item["slides"][0]["attachment_id"] === '') {
			$slide = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please setting slide content', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			$ct = "";
			$protocols = array("http:", "https:");

			$effect			= empty($item['slide_effect']) ? $this->slide_effects['fade'] : $item['slide_effect'];
			$directionNav	= empty($item['direction_nav']) ? 0 : $item['direction_nav'];
			if($builderMode){ $directionNav = 0; }
			$pagingNav		= empty($item['paging_nav']) ? 0 : $item['paging_nav'];
			$autoSlide		= empty($item['auto_slide']) ? 0 : $item['auto_slide'];
			if($builderMode){ $autoSlide = 0; }
			$slideLoop		= empty($item['slide_loop']) ? 0 : $item['slide_loop'];
			$slideshowMsec	= empty($item['slideshow_msec']) ? 7000 : trim($item['slideshow_msec']);
			$animationSpeed	= empty($item['animation_msec']) ? 600 : trim($item['animation_msec']);
			$smoothHeight	= 1;
			$random			= 0;

			$directionNavColorStyle	='';
			if( isset($item['direction_nav_color']) && trim($item['direction_nav_color']) !== '' ) {
				$directionNavColorStyle = '.flex-direction-nav a:before { color: ' . trim($item['direction_nav_color']) . '; }';
			}
			$pagingNavColorStyle	='';
			if( isset($item['paging_nav_color']) && trim($item['paging_nav_color']) !== '' ) {
				$pagingNavColorStyle = '.flex-control-paging li a { background: ' . trim($item['paging_nav_color']) . '; filter:alpha(opacity=50); -moz-opacity:0.50; opacity:0.50; }';
				$pagingNavColorStyle .= '.flex-control-paging li a:hover { background:' . trim($item['paging_nav_color']) . '; filter:alpha(opacity=70); -moz-opacity:0.70; opacity:0.70; }';
				$pagingNavColorStyle .= '.flex-control-paging li a.flex-active { background:' . trim($item['paging_nav_color']) . '; filter:alpha(opacity=100); -moz-opacity:1; opacity:1; }';
			}
			
			$direction = 'horizontal';
			if($effect === $this->slide_effects['slideh']) {
				$effect = 'slide';
			}
			
			foreach($item['slides'] as $data){
				$flgDescription	= isset($data['flg_description']) && $data['flg_description'] ? true : false;
				$description	= isset($data['description']) ? trim($data['description']) : '';
				$descriptionPos	= isset($data['description_position']) ? $data['description_position'] : 'bottom';
				$descTextColor	= isset($data['description_text_color']) &&  trim($data['description_text_color']) !== '' ? 'color:' . trim($data['description_text_color']) . ';' : '';
				$descBgColor	= isset($data['description_bg_color']) && trim($data['description_bg_color']) !== '' ? 'background-color:' . trim($data['description_bg_color']) . ';' : '';
				$linkUrl		= isset($data['link']['href']) ? trim($data['link']['href']) : '';
				$linkTarget		= isset($data['link']['target']) && $data['link']['target'] ? ' target="_blank"' : '';
				
				//ver1.0.1 add
				$descPdTop		= isset($data['description_pd_top']) &&  trim($data['description_pd_top']) !== '' ? 'padding-top:' . trim($data['description_pd_top']) . 'px;' : '';
				$descPdBottom	= isset($data['description_pd_bottom']) &&  trim($data['description_pd_bottom']) !== '' ? 'padding-bottom:' . trim($data['description_pd_bottom']) . 'px;' : '';
				$descPdLeft		= isset($data['description_pd_left']) &&  trim($data['description_pd_left']) !== '' ? 'padding-left:' . trim($data['description_pd_left']) . 'px;' : '';
				$descPdRight	= isset($data['description_pd_right']) &&  trim($data['description_pd_right']) !== '' ? 'padding-right:' . trim($data['description_pd_right']) . 'px;' : '';

				$descW			= isset($data['description_width']) &&  trim($data['description_width']) !== '' ? trim($data['description_width']) : '';
				$descWUnit		= isset($data['description_width_unit']) &&  trim($data['description_width_unit']) !== '' ? trim($data['description_width_unit']) : 'par';
				if( $descWUnit === 'par' ) { $descWUnit = '%'; }
				$descWStyle = '';
				if( !empty( $descW ) ) { $descWStyle = 'width:' . $descW . $descWUnit . ';'; }

				$textShadowStyle	= !empty( $data['description_text_shadow_style'] ) ? $data['description_text_shadow_style'] : '';
				$textShadowColor	= !empty( $data['description_text_shadow_color'] ) ? $data['description_text_shadow_color'] : '';
				$shadowStyle = '';
				if( $textShadowStyle !== '' ) {
					$shadow = $this->text_shadow_styles[ $textShadowStyle ];
					$_shadow = 'text-shadow:' . $shadow['offset_v'] . ' ' . $shadow['offset_h'] . ' ' . $shadow['grad'];
					if( $textShadowColor !== '') {
						$_shadow .= ' ' . $textShadowColor . ';';
					} else {
						$_shadow .= ' ' . $shadow['default_color'] . ';';
					}
					$shadowStyle .= $_shadow;
				}
				//ver1.0.1 addend
				
				$src = isset($data['full']['url']) ? $data['full']['url'] : '';				
				if($slideSize === 'thumbnail' && isset($data['thumbnail']['url']) && strlen($data['thumbnail']['url']) > 0) {
					$src = $data['thumbnail']['url'];
				}elseif($slideSize === 'medium' && isset($data['medium']['url']) && strlen($data['medium']['url']) > 0) {
					$src = $data['medium']['url'];
				}elseif($slideSize === 'large' && isset($data['large']['url']) && strlen($data['large']['url']) > 0) {
					$src = $data['large']['url'];
				}
				$src = str_replace($protocols, '', $src);
				$ct .= '<li class="weluka-slide-item">';
				if($linkUrl !== '') {
					$ct .= '<a href="' . esc_url($linkUrl) . '" ' . $linkTarget . '>';
				}
				$ct .= '<img src="' . $src . '" class="' . $blockShape . '" ' . $border . ' />';
				if($linkUrl !== '') {
					$ct .= '</a>';
				}
				//description
				if($flgDescription && $description !== '') {
					$ct .= '<div class="weluka-slide-description weluka-slide-description-' . $descriptionPos . ' hidden-xs" style="' . $descTextColor . $descBgColor . $descPdTop . $descPdBottom . $descPdLeft . $descPdRight . $descWStyle . $shadowStyle . '">';
					$ct .= $description;
					$ct .= '</div>';
				}
				$ct .= '</li>';
			}
			$slide = '<div id="weluka-slide-' . $item['id'] . '" class="weluka-slide-obj flexslider">';
			if( $directionNavColorStyle || $pagingNavColorStyle ) {
				$slide .= '<div class="weluka-hide"><style>' . $directionNavColorStyle . ' ' . $pagingNavColorStyle . '</style></div>';
			}
			$slide .= '<ul class="slides clearfix">';
			$slide .= $ct;
			$slide .= '</ul>';
			$slide .= '</div>';
			$slide .= '<div class="weluka-hide"><script type="text/javascript">';
			$slide .= 'jQuery(document).ready(function($) { ';
            $slide .= 'var welukaSliderObj = $(".weluka-slide-obj#weluka-slide-' . $item['id'] . '");';
            $slide .= 'if (welukaSliderObj.data("flexslider")) { welukaSliderObj.flexslider("destroy"); }';
			$slide .= 'if (!' . $pagingNav . ') { welukaSliderObj.css("margin-bottom", 0); } ';
            $slide .= 'welukaSliderObj.flexslider({';
            $slide .= 'animation: "' . $effect . '",';
			$slide .= 'direction: "' . $direction . '",';
            $slide .= 'slideshow: ' . $autoSlide .  ',';
			$slide .= 'animationLoop: ' . $slideLoop . ',';
            $slide .= 'controlNav: ' . $pagingNav . ',';
            $slide .= 'directionNav: ' . $directionNav . ',';
            $slide .= 'slideshowSpeed: ' . $slideshowMsec . ',';
            $slide .= 'animationSpeed: ' . $animationSpeed . ',';
            $slide .= 'smoothHeight: ' . $smoothHeight . ',';
			$slide .= 'randomize: ' . $random . ',';
			$slide .= 'pauseOnHover: true' . ',';
            $slide .= 'keyboard: true';
            $slide .= '});';
            $slide .= '});';
			$slide .= '</script></div>';
		}
		$content = '<div ' . $cssId . ' class="weluka-slide weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $slide;
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = sns_button data html
	 * @since 1.0
	 */
	public function widget_snsbutton_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, false);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		$direction = "h";
		$ct = "";
		if(isset($item["buttons"]) && is_array($item["buttons"])) {
			$wrapClass = $direction === "h" ? 'weluka-sns-button-horizontal' : 'weluka-sns-button-vertical';
			$ct .= '<ul class="weluka-sns-button-wrapper ' . $wrapClass . '">';
			foreach($item['buttons'] as $data) :
				$name = $data['name'];
				$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
				$icon = $this->sns_buttons[$name][$iconType];
				$iconStyle = "";
				$url = isset($data['url']) && strlen(trim($data['url'])) > 0 ? $data['url'] : "#";
				$text = isset($data['text']) && strlen(trim($data['text'])) > 0 ? $data['text'] : "";
				$textOnClass ="";
				if($text !== "") {
					$text = '<span class="text">' . $text . '</span>';
					$textOnClass = "weluka-sns-ontext";
				}
				$reps = array("{TEXT_ON}", "{STYLE}", "{TEXT}");
				$repTarget = array($textOnClass, $iconStyle, $text);
				$icon = str_replace($reps, $repTarget, $icon);
				$ct .= '<li><a class="weluka-sns-link" href="' . $url . '" title="' . $name . '" target="_blank">' . $icon .'</a></li>';
			endforeach;
			$ct .= '</ul>';
		}
		
		$content = '<div ' . $cssId . ' class="weluka-sns-button weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct;
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = sns_share data html
	 * @since 1.0
	 */
	public function widget_snsshare_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, false);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		$direction = "h";

		$ct = "";
		if(isset($item["buttons"]) && is_array($item["buttons"])) {
			$wrapClass = $direction === "h" ? 'weluka-sns-button-horizontal' : 'weluka-sns-button-vertical';
			$ct .= '<ul class="weluka-sns-button-wrapper ' . $wrapClass . '">';
			foreach($item['buttons'] as $data) :
				$name = $data['name'];
				$method = "share_" . $name;
				$share = $this->$method($data);
				$ct .= '<li>' . $share . '</li>';
			endforeach;
			$ct .= '</ul>';
		}

		$content = '<div ' . $cssId . ' class="weluka-sns-share weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct;
		$content .= '</div>';
		
		$content = stripslashes($content);
		if($echo) { echo $content; }else{ return $content; }
	}

	/** 
	 * create facebook share button html
	 * @since 1.0
	 */
	public function share_facebook($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["facebook"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		$url = isset($data['url']) && strlen(trim($data['url'])) > 0 ? esc_url($data['url']) : "";
		$icon = $shareInfo[$iconType];
		$iconStyle = "";
		$flgCounter = true;
		$sizeStyle = ""; //TODO

		$counter = "";
		
    	// facebook share link
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]), $url);

		$nocount = "";
    	$shareButton = '<a class="weluka-sns-link weluka-sns-share weluka-facebook-share" href="' . $shareUrl . '" target="_blank" rel="nofollow" title="facebook click to share">'; //login need nofollow default
		if($flgCounter) {
			//counter
	    	//facebook api => json
			$counterUrl = sprintf(set_url_scheme($shareInfo["counter_url"]), $url);
    		$countDetail = wp_remote_get($counterUrl, array('timeout' => 5));
    		if (is_wp_error($countDetail)) { return ""; }

    		$arrDetail = json_decode($countDetail['body'], true);
    		$count = isset($arrDetail['shares']) && strlen($arrDetail['shares']) > 0 ? $arrDetail['shares'] : 0;
			$counter = '<span class="weluka-share-count">' . number_format($count) . '</span>';
		}else{
			$nocount = "weluka-share-nocounter";
		}
		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}

	/** 
	 * create twitter share button html
	 * @since 1.0
	 */
	public function share_twitter($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["twitter"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		$url = isset($data['url']) && strlen(trim($data['url'])) > 0 ? esc_url($data['url']) : "";
		$text = isset($data['text']) && strlen(trim($data['text'])) > 0 ? '&amp;text=' . urlencode(html_entity_decode($data['text'], ENT_QUOTES, 'UTF-8')) : "";
		$account = isset($data['account']) && strlen(trim($data['account'])) > 0 ? $data['account'] : "";
		if(strncmp($account, "@", 1) == 0){ $account = substr_replace($account, "", 0, 1); }
		$account = urlencode(html_entity_decode($account, ENT_QUOTES, 'UTF-8'));
		if($account !== "") {
			$account = '&amp;via=' . $account;
		}
		$icon = $shareInfo[$iconType];
		$iconStyle = "";
		$flgCounter = true;
		$sizeStyle = ""; //TODO

		$counter = "";
    	// twitter share link
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]), $url, $text, $account);

		$nocount = "";
    	$shareButton = '<a class="weluka-sns-link weluka-sns-share weluka-twitter-share" href="' . $shareUrl . '" target="_blank" rel="nofollow" title="click to post to twitter">'; //login need nofollow default
		if($flgCounter) {
			//counter
	    	//twitter api => json
			$counterUrl = sprintf(set_url_scheme($shareInfo["counter_url"]), $url);
    		$countDetail = wp_remote_get($counterUrl, array('timeout' => 5));
    		if (is_wp_error($countDetail)) { return ""; }

    		$arrDetail = json_decode($countDetail['body'], true);
    		$count = isset($arrDetail['count']) && strlen($arrDetail['count']) > 0 ? $arrDetail['count'] : 0;
			$counter = '<span class="weluka-share-count">' . number_format($count) . '</span>';
		}else{
			$nocount = "weluka-share-nocounter";
		}

		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}

	/** 
	 * create google plus share button html
	 * @since 1.0
	 */
	public function share_google($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["google"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		$url = isset($data['url']) && strlen(trim($data['url'])) > 0 ? esc_url($data['url']) : "";
		$icon = $shareInfo[$iconType];
		$iconStyle = "";
		$flgCounter = true;
		$sizeStyle = ""; //TODO

		$counter = "";
    	// google plus share link
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]), $url);

		$nocount = "";
    	$shareButton = '<a class="weluka-sns-link weluka-sns-share weluka-google-share" href="' . $shareUrl . '" target="_blank" rel="nofollow" title="google plus click to share">'; //login need nofollow default
		if($flgCounter) {
			//counter
	    	//google plus api => json
    		$args = array(
        		'method' => 'POST',
        		'headers' => array(
            		'Content-Type' => 'application/json'
        		),
        		'body' => json_encode(
					array(
                		'method' => 'pos.plusones.get',
                		'id' => 'p',
                		'method' => 'pos.plusones.get',
                		'jsonrpc' => '2.0',
                		'key' => 'p',
                		'apiVersion' => 'v1',
                		'params' => array(
                    		'nolog'=>true,
                    		'id'=> $url,
                    		'source'=>'widget',
                    		'userId'=>'@viewer',
                    		'groupId'=>'@self'
                		)
            		)
				),
        		'sslverify'=>false
    		);

			$counterUrl = $shareInfo["counter_url"];
			$countDetail = wp_remote_post($counterUrl, $args);
    		if (is_wp_error($countDetail)) { return ""; }

    		$arrDetail = json_decode($countDetail['body'], true);
    		$count = isset($arrDetail['result']['metadata']['globalCounts']['count']) && strlen($arrDetail['result']['metadata']['globalCounts']['count']) > 0 ? $arrDetail['result']['metadata']['globalCounts']['count'] : 0;
			$counter = '<span class="weluka-share-count">' . number_format($count) . '</span>';
		}else{
			$nocount = "weluka-share-nocounter";
		}

		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}

	/**
	 * builder item type = appembed data html
	 * @since 1.0
	 */
	public function widget_appembed_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$blockShape = isset($item['block_shape']) && strlen(trim($item['block_shape'])) > 0 ? ' ' . $item['block_shape'] : "";
		$objId = "weluka-embed_" . $item['id'];
		
		$code = "";
		if(isset($item["code"]) && trim($item["code"]) === '') {
			$code = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please paste your code.', Weluka::$settings['plugin_name']) . '</div>';
		}elseif(isset($item["code"]) && trim($item["code"]) !== ''){
				$code = stripslashes($item["code"]);
				$code = str_replace(array('{SCRIPT}', '{/SCRIPT}'), array('<script', '</script'), $code);
		}
		$content .= '<div id="' . $objId . '" class="weluka-embed weluka-content' . $class . $blockShape . $cssClass . '" ' . $style . '>';
		$content .= $code; 
		$content .= '</div>';
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = appaccordion or title data html
	 * @since 1.0
	 */
	public function widget_accordion_html($item, $echo = true) {
		global $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$panelAllStyle = isset($item['all_panel_style']) && strlen(trim($item['all_panel_style'])) > 0 ? ' ' . $item['all_panel_style'] : " panel-default";
		$panelAllShape = isset($item['all_panel_shape']) && strlen(trim($item['all_panel_shape'])) > 0 ? ' ' . $item['all_panel_shape'] : "";
		
		$ct = "";
		if(isset($item["panels"]) && is_array($item["panels"])) {
			$accordionId = 'weluka-accordion-' . $item['id'];
			$ct = '<div class="panel-group" id="' . $accordionId . '">';
			$cnt = 1;
			foreach($item['panels'] as $data) :
				$collapseId = 'weluka-collapse-' . $item['id'] . '-' . $cnt;
				$panelStyle = isset($data['panel_style']) && strlen(trim($data['panel_style'])) > 0 ? ' ' . $data['panel_style'] : "";
				if($panelStyle === "") { $panelStyle = $panelAllStyle; }
				
				$body = $data['body_text'];
				if(strstr($body, "[embed") !== false) {
					$body = $wp_embed->run_shortcode($body); //embed shortcode exec
				}
				$in = isset($data['open']) && $data['open'] == 'on' ? ' in' : '';
				
				$icon = $in != '' ? 'fa-chevron-up' : 'fa-chevron-down';
				$ct .= '<div class="weluka-panel panel' . $panelStyle . $panelAllShape . '">';
				$ct .= '<div class="panel-heading weluka-panel-heading"><h4 class="weluka-panel-title panel-title clearfix"><i class="fa ' . $icon . '"></i>';
       			$ct .= '<a class="weluka-noscroll" data-toggle="collapse" data-parent="#' . $accordionId . '" href="#' . $collapseId . '">' . $data['header_text'] . '</a>';
     			$ct .= '</h4></div>';
				$ct .= '<div id="' . $collapseId . '" class="weluka-panel-collapse panel-collapse collapse' . $in . '">';
      			$ct .= '<div class="panel-body">' . $body . '</div>';
    			$ct .= '</div>';
				$ct .= '</div>';
				$cnt++;
			endforeach;
			$ct .= '</div>';
		}
		$content = '<div ' . $cssId . ' class="weluka-accordion weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct;
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = apptabs or title data html
	 * @since 1.0
	 */
	public function widget_tabs_html($item, $echo = true) {
		global $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$tabType = isset($item['tab_type']) && strlen(trim($item['tab_type'])) > 0 ? $item['tab_type'] : 'tab';
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";
		$justified = isset($item['tab_justified']) && strlen(trim($item['tab_justified'])) > 0 ? ' nav-justified' : '';
		$panelBorder = isset($item['panel_border']) && strlen(trim($item['panel_border'])) > 0 ? ' weluka-tabs-panel-border' : '';
		$tabBgColor = isset($item['tab_bgcolor']) && strlen(trim($item['tab_bgcolor'])) > 0 ? ' ' . $item['tab_bgcolor'] : "";
		
		$navs = $tabcts = "";
		if(isset($item["panels"]) && is_array($item["panels"])) {
			$navs = '<ul class="weluka-nav-' . $tabType . 's nav nav-' . $tabType . 's' . $justified . ' clearfix">';
			$tabcts = '<div class="weluka-tab-content tab-content' . $panelBorder . '">';
			$cnt = 1;
			foreach($item['panels'] as $data) :
				$ctId	= 'weluka-tab-content-' . $item['id'] . '-' . $cnt;
				$active	= $cnt == 1 ? 'active' : '';
				$in		= $active === '' ? '' : 'in';
				//nav
				$navs .= '<li class="' . $active . '"><a class="weluka-noscroll'. $tabBgColor . '" data-toggle="' . $tabType . '" href="#' . $ctId . '">' . $data['tab_text'] . '</a></li>';
				//content
				$body = $data['body_text'];
				if(strstr($body, "[embed") !== false) {
					$body = $wp_embed->run_shortcode($body); //embed shortcode exec
				}
				$tabcts .= '<div id="' . $ctId . '" class="tab-pane fade ' . $in . ' ' . $active . '">' . $body . '</div>';
				$cnt++;
			endforeach;
			$navs .= '</ul>';
			$tabcts .= '</div>';
		}
		$content = '<div ' . $cssId . ' class="weluka-' . $tabType . 's weluka-content' . $class . $cssClass . $shape . '" ' . $style . '>';
		$content .= $navs . $tabcts;
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = applist or title data html
	 * @since 1.0
	 */
	public function widget_list_html($item, $echo = true) {
		global $wp_embed;
		$builderMode		= $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content			= "";
		$list				= "";

		$class				= isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style				= $this->get_style_attribute($item);
		$cssClass			= isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$layoutClass		= isset($item['layout_class']) && $item['layout_class'] !== '' ? $item['layout_class'] : 'medialeft';
		$mediaDisp			= !empty($item['media_display']) ? 1 : 0;
		$titleDisp			= !empty($item['title_display']) ? 1 : 0;
		$contentDisp		= !empty($item['content_display']) ? 1 : 0;
		$buttonDisp			= !empty($item['button_display']) ? 1 : 0;
		$meta1Disp			= !empty($item['meta1_display']) ? 1 : 0;
		$meta2Disp			= !empty($item['meta2_display']) ? 1 : 0;
		$mediaCol			= !empty($item['media_col']) ? $item['media_col'] : 4;
		$contentCol	= $org_contentCol = (int)self::MAX_COLUMN - (int)$mediaCol;
		$rowSpacing			= isset($item['row_spacing']) && trim($item['row_spacing']) !== '' ? 'margin-top:' . trim($item['row_spacing']) . 'px;' : '';
		$rowColumn			= isset($item['row_column']) && strlen(trim($item['row_column'])) > 0 ? trim($item['row_column']) : 1;
		$rowOddColor		= isset($item['row_odd_color']) && strlen(trim($item['row_odd_color'])) > 0 ? ' background-color:' . trim($item['row_odd_color']) . ';' : "";
		$rowEvenColor		= isset($item['row_even_color']) && strlen(trim($item['row_even_color'])) > 0 ? ' background-color:' . trim($item['row_even_color']) . ';' : "";

		$ngmClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-row-negative-margin-clear' : '';
		$rowBgClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-list-row-bgcolor' : '';
		
		if(!empty($item['datas']) && is_array($item['datas'])) :
			//media design
			$mediaAlign			= !empty($item['media_align']) ? $item['media_align'] : 'weluka-text-left';
			$mediaBorderColor	= !empty($item['media_border_color']) ? trim($item['media_border_color']) : '';
			$mediaBorderStyle	= !empty($item['media_border_style']) ? trim($item['media_border_style']) : '';
			$mediaBorderSize	= !empty($item['media_border_size']) ? trim($item['media_border_size']) : '';
			$mediaShape			= !empty($item['media_shape']) ? trim($item['media_shape']) : '';
			$mediaIconSize		= !empty($item['media_icon_size']) ? trim($item['media_icon_size']) : '';
			$mediaIconColor		= !empty($item['media_icon_color']) ? trim($item['media_icon_color']) : '';

			//title design
			$titleTag		= !empty($item['title_html_tag']) ? $item['title_html_tag'] : 'h4';
			$titleAlign		= !empty($item['title_align']) ? ' ' . $item['title_align'] : '';
			$titleFont		= !empty($item['title_font']) ? ' ' . $item['title_font'] : '';
			$titleFontSize	= isset($item['title_font_size']) && strlen(trim($item['title_font_size'])) > 0 ? ' font-size:' . trim($item['title_font_size']) . 'px;' : '';
			$titleColor		= isset($item['title_color']) && strlen(trim($item['title_color'])) > 0 ? ' color:' . trim($item['title_color']) . ';' : '';
			$titleWeight	= !empty($item['title_bold']) ? ' font-weight:bold;' : '';
			$titleUnderline	= !empty($item['title_underline']) ? ' text-decoration:underline;' : '';
			$titleItalic	= !empty($item['title_italic']) ? ' font-style:italic;' : '';

			//meta1 design
			$meta1Align		= !empty($item['meta1_align']) ? ' ' . $item['meta1_align'] : '';
			$meta1Font		= !empty($item['meta1_font']) ? ' ' . $item['meta1_font'] : '';
			$meta1FontSize	= isset($item['meta1_font_size']) && strlen(trim($item['meta1_font_size'])) > 0 ? ' font-size:' . trim($item['meta1_font_size']) . 'px;' : '';
			$meta1Color		= isset($item['meta1_color']) && strlen(trim($item['meta1_color'])) > 0 ? ' color:' . trim($item['meta1_color']) . ';' : '';
			$meta1Weight	= !empty($item['meta1_bold']) ? ' font-weight:bold;' : '';
			$meta1Underline	= !empty($item['meta1_underline']) ? ' text-decoration:underline;' : '';
			$meta1Italic	= !empty($item['meta1_italic']) ? ' font-style:italic;' : '';

			//meta2 design
			$meta2Align		= !empty($item['meta2_align']) ? ' ' . $item['meta2_align'] : '';
			$meta2Font		= !empty($item['meta2_font']) ? ' ' . $item['meta2_font'] : '';
			$meta2FontSize	= isset($item['meta2_font_size']) && strlen(trim($item['meta2_font_size'])) > 0 ? ' font-size:' . trim($item['meta2_font_size']) . 'px;' : '';
			$meta2Color		= isset($item['meta2_color']) && strlen(trim($item['meta2_color'])) > 0 ? ' color:' . trim($item['meta2_color']) . ';' : '';
			$meta2Weight	= !empty($item['meta2_bold']) ? ' font-weight:bold;' : '';
			$meta2Underline	= !empty($item['meta2_underline']) ? ' text-decoration:underline;' : '';
			$meta2Italic	= !empty($item['meta2_italic']) ? ' font-style:italic;' : '';

			//content design
			$contentAlign		= !empty($item['content_align']) ? ' ' . $item['content_align'] : '';
			$contentFont		= !empty($item['content_font']) ? ' ' . $item['content_font'] : '';
			$contentFontSize	= isset($item['content_font_size']) && strlen(trim($item['content_font_size'])) > 0 ? ' font-size:' . trim($item['content_font_size']) . 'px;' : '';
			$contentColor		= isset($item['content_color']) && strlen(trim($item['content_color'])) > 0 ? ' color:' . trim($item['content_color']) . ';' : '';

			//button design
			$buttonText		= isset($item['button_text']) && strlen(trim($item['button_text'])) > 0 ? trim($item['button_text']) : 'Read More';
			$buttonAlign	= !empty($item['button_align']) ? $item['button_align'] : 'weluka-text-right';
			$buttonColor	= !empty($item['button_color']) ? $item['button_color'] : 'weluka-btn-info';
			$buttonShape	= !empty($item['button_shape']) ? $item['button_shape'] : '';
			$buttonSize		= !empty($item['button_size']) ? $item['button_size'] : '';
			$buttonBlock	= !empty($item['button_block']) ? $item['button_block'] : '';
			$button					= array();
			$button['text']			= $buttonText;
			$button['class_name']	= $buttonAlign;
			$button['button_color']	= $buttonColor;
			$button['shape']		= $buttonShape;
			$button['size']			= $buttonSize;
			$button['block']		= $buttonBlock;

			$colNum			= (int)self::MAX_COLUMN / (int)$rowColumn; //$rowColumn = (1 or 2 or 3 or 4 or 6)
			$rowCnt = 0;
			$colCnt = 0;
			foreach($item['datas'] as $data) :
				//common link
				$linkUrl		= !empty($data['link']['href']) ? trim($data['link']['href']) : '';
				$linkTarget 	= !empty($data['link']['target']) ? '_blank' : '';
				$_linkTarget	= $linkTarget !== '' ? ' target="_blank"' : '';

				$mediaHtml = "";
				if($mediaDisp && !empty($data['media'])) {
					
					$mediaHtml = '<div class="weluka-list-media">';
					$media = $data['media'];

					if($media['type'] === self::WIDGET_ICON) {
						if( empty($media['link']['href']) && !empty($linkUrl) ) {
							$media['link']['action']	= self::LINK_ACTION_GOTOLINK;
							$media['link']['href']		= $linkUrl;
							$media['link']['target']	= $linkTarget;
						}
						
						if( $mediaIconColor !== '' ) {
							$media['icon_color'] = $mediaIconColor;
						}
						if( $mediaIconSize !== '' ) {
							$media['icon_size'] = $mediaIconSize;
						}
						$media['class_name']		= $mediaAlign;
						$mediaHtml .= $this->widget_icon_html($media, false);

					} elseif($media['type'] === self::WIDGET_MOVIE) {

						$media['class_name']		= $mediaAlign;
						$mediaHtml .= $this->widget_movie_html($media, false);
						
					} elseif($media['type'] === self::WIDGET_IMG) {

						//TODO Image crop
						if( empty($media['link']['href']) && !empty($linkUrl) ) {
							$media['link']['action']	= self::LINK_ACTION_GOTOLINK;
							$media['link']['href']		= $linkUrl;
							$media['link']['target']	= $linkTarget;
						}

						$media['border_color']	= $mediaBorderColor;
						$media['border_size']	= $mediaBorderSize;
						$media['border_style']	= $mediaBorderStyle;
						$media['shape']			= $mediaShape;
						$media['class_name']			= $mediaAlign;
						$mediaHtml .= $this->widget_img_html($media, false);

					}
					$mediaHtml .= '</div>';
				}
				
				$titleHtml = "";
				if($titleDisp && !empty($data['title'])) {
					$title	= !empty($data['title']['text']) ? trim($data['title']['text']) : '';
					if($title !== '') {
						$titleHtml = '<' . $titleTag. ' class="weluka-list-title' . $titleAlign . '" style="' . $titleFont . $titleFontSize . $titleColor . $titleWeight . $titleUnderline . $titleItalic . '">{%TITLE%}</' . $titleTag . '>';
						$s = "";
						if( $linkUrl !== '' ) {
							$s = '<a href="' . esc_url($linkUrl) . '"' . $_linkTarget . ' title="' . esc_attr($title) . '">' . $title . '</a>';
						} else {
							$s = $title;
						}
						
						$titleHtml = str_replace("{%TITLE%}", $s, $titleHtml);
					}
				}
								
				$meta1Html = "";
				if($meta1Disp && !empty($data['meta1'])) {
					$meta1Html	= !empty($data['meta1']['text']) ? trim($data['meta1']['text']) : '';
					if($meta1Html !== '') {
						$meta1Html = '<div class="weluka-list-meta' . $meta1Align .'" style="' . $meta1Font . $meta1FontSize . $meta1Color . $meta1Weight . $meta1Underline . $meta1Italic . '">' . $meta1Html . '</div>';
					}
				}

				$meta2Html = "";
				if($meta2Disp && !empty($data['meta2'])) {
					$meta2Html	= !empty($data['meta2']['text']) ? trim($data['meta2']['text']) : '';
					if($meta2Html !== '') {
						$meta2Html = '<div class="weluka-list-meta' . $meta2Align .'" style="' . $meta2Font . $meta2FontSize . $meta2Color . $meta2Weight . $meta2Underline . $meta2Italic . '">' . $meta2Html . '</div>';
					}
				}

				$textHtml = "";
				if($contentDisp && !empty($data['content'])) {
					$textHtml	= !empty($data['content']['text']) ? trim($data['content']['text']) : '';
					if($textHtml !== '') {
						$textHtml = '<div class="weluka-list-content' . $contentAlign . '" style="' . $contentFont . $contentFontSize . $contentColor . '">' . $textHtml . '</div>';
					}
				}

				$buttonHtml = "";
				if($buttonDisp) {
					if( $linkUrl !== '' ) {
						$button['link']['action']	= self::LINK_ACTION_GOTOLINK;
						$button['link']['href']		= $linkUrl;
						$button['link']['target']	= $linkTarget;
					}
					$buttonHtml		= $this->widget_button_html($button, false);
				}
				
				$_spacing = "";
				if($rowCnt !== 0 && $rowSpacing !== '') { $_spacing = $rowSpacing; }
				$topNoMargin = (int)$rowCnt === 0 ? ' top-nomargin' : '';

				if( ($rowCnt + 1) % 2 == 0 ) {
					$rowBgColor = $rowEvenColor;
				} else {
					$rowBgColor = $rowOddColor;
				}

 				if($layoutClass === 'mediatop') {
					$colCnt++;
					if((int)$colCnt === 1) {
						$list .= '<div class="weluka-list-row weluka-row clearfix mediatop' . $topNoMargin . $ngmClass . '" style="' . $_spacing . '">';
					}
					$list .= '<div class="weluka-col weluka-col-md-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">';
					$list .= $mediaHtml;
					$list .= $titleHtml;
					$list .= $meta1Html;
					$list .= $meta2Html;
					$list .= $textHtml;
					$list .= $buttonHtml;
					$list .= '</div></div>';
					
					if((int)$colCnt === (int)$rowColumn) {
						$list .= '</div>';	//row end div
						$colCnt = 0;
					}
				}elseif($layoutClass === 'mediamiddle'){
					$colCnt++;
					if((int)$colCnt === 1) {
						$list .= '<div class="weluka-list-row weluka-row clearfix mediamiddle' . $topNoMargin . $ngmClass . '" style="' . $_spacing . '">';
					}
					$list .= '<div class="weluka-col weluka-col-md-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">';
					$list .= $titleHtml;
					$list .= $meta1Html;
					$list .= $meta2Html;
					$list .= $mediaHtml;
					$list .= $textHtml;
					$list .= $buttonHtml;
					$list .= '</div></div>';
					
					if((int)$colCnt === (int)$rowColumn) {
						$list .= '</div>';	//row end div
						$colCnt = 0;
					}
				}elseif($layoutClass === 'mediabottom'){
					$colCnt++;
					if((int)$colCnt === 1) {
						$list .= '<div class="weluka-list-row weluka-row clearfix mediabottom' . $topNoMargin . $ngmClass . '" style="' . $_spacing . '">';
					}
					
					$list .= '<div class="weluka-col weluka-col-md-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">';
					$list .= $titleHtml;
					$list .= $meta1Html;
					$list .= $meta2Html;
					$list .= $textHtml;
					$list .= $buttonHtml;
					$list .= $mediaHtml;
					$list .= '</div></div>';
					
					if((int)$colCnt === (int)$rowColumn) {
						$list .= '</div>';	//row end div
						$colCnt = 0;
					}
				}elseif($layoutClass === 'mediaright') {
					$list .= '<div class="weluka-list-row weluka-row clearfix mediaright' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $_spacing . $rowBgColor . '">';
					$_left = ' lt';
					if($mediaDisp && $mediaHtml) {
						$media = '<div class="weluka-col weluka-col-md-' . $mediaCol . ' rt">' . $mediaHtml . '</div>';
						$contentCol = $org_contentCol;
					}else{
						$contentCol = 12;
						$_left = ' full';
					}
					$list .= '<div class="weluka-col weluka-col-md-' . $contentCol . $_left . '">';
					$list .= $titleHtml;
					$list .= $meta1Html;
					$list .= $meta2Html;
					$list .= $textHtml;
					$list .= $buttonHtml;
					$list .= '</div>';
					$list .= $media;
					$list .= '</div>';
				}else{
					$list .= '<div class="weluka-list-row weluka-row clearfix medialeft' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $_spacing . $rowBgColor . '">';
					//medialeft
					$_right = ' rt';
					if($mediaDisp && $mediaHtml) {
						$list .= '<div class="weluka-col weluka-col-md-' . $mediaCol . ' lt">' . $mediaHtml . '</div>';
						$contentCol = $org_contentCol;
					}else{
						$contentCol = 12;
						$_right = ' full';
					}
					
					$list .= '<div class="weluka-col weluka-col-md-' . $contentCol . $_right . '">';
					$list .= $titleHtml;
					$list .= $meta1Html;
					$list .= $meta2Html;
					$list .= $textHtml;
					$list .= $buttonHtml;
					$list .= '</div></div>';
				}				
				$rowCnt++;
			endforeach;

			if( $layoutClass !== 'medialeft' && $layoutClass !== 'mediaright' ) :
				if( (int)$colCnt !== 0 && (int)$colCnt !== (int)$rowColumn) { $list .= '</div>'; }
			endif;

		endif;	//datas check endif

		if(strstr($list, "[embed") !== false) {
			$list = $wp_embed->run_shortcode($list); //embed shortcode exec
		}
		
		$content = '<div class="weluka-list weluka-content weluka-list-' . $layoutClass . $class . $cssClass . '" ' . $style . '>';
		$content .= $list;
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_nav_menu data html TODO style
	 * @since 1.0
	 */
	public function widget_wpmenu_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$menuTitle = !empty($item['title']) ? trim($item['title']) : "";
		$menuLayout = !empty($item['menu_layout']) ? $item['menu_layout'] : "";
		$customBaseColor	= !empty($item['custom_base_color']) ? $item['custom_base_color'] : "";
		$customBorderColor	= !empty($item['custom_border_color']) ? $item['custom_border_color'] : "";
		$customTextColor 	= !empty($item['custom_text_color']) ? $item['custom_text_color'] : ""; //v1.0.3
		$hideBorder 		= !empty($item['hide_border']) ? $item['hide_border'] : 0;
		$hideBorderStyle = '';
		if ( $hideBorder ) { $hideBorderStyle = 'border:none !important;'; }
		$colorTheme = 'weluka-navbar-default';
		
		$termId = $ct = "";
		if(isset($item["term_id"]) && trim($item["term_id"]) !== ''){
			$termId = $item["term_id"];

			$menuId = Weluka::get_instance()->create_node_id();

			if($menuLayout === 'horizontal') {

				$colorTheme	= !empty($item['color_theme']) ? $item['color_theme'] : "weluka-navbar-default";
				$menuAlign	= !empty($item['align']) ? ' ' . $item['align'] : "";
				$menuShape	= !empty($item['shape']) ? ' ' . $item['shape'] : "";
				$font		= !empty($item['font']) ? ' ' . $item['font'] : '';
				$fontSize	= isset($item['font_size']) && strlen(trim($item['font_size'])) > 0 ? ' font-size:' . trim($item['font_size']) . 'px !important;' : '';
				$weight		= !empty($item['bold']) ? ' font-weight:bold !important;' : '';
				$underline	= !empty($item['underline']) ? ' text-decoration:underline !important;' : '';
				$italic		= !empty($item['italic']) ? ' font-style:italic !important;' : '';
				$depth		= $builderMode ? 1 : 0;
				
				$widthFixed	= !empty($item['h_content_width_fixed']) ? $item['h_content_width_fixed'] : 0;
				$menu = sprintf(
					'[%s menu="%s" container="div" containerid="%s" containerclass="collapse navbar-collapse" menuclass="%s" depth="%s"]',
					$this->wpmenu_shortcode_tag,
					$termId,
					$menuId,
					'nav navbar-nav' . $menuAlign,
					$depth
				); 

				$ct = '<div class="weluka-nav weluka-nav-bar-h navbar clearfix ' . $colorTheme . $menuShape . '" style="' . $font . $fontSize . $weight . $underline . $italic . $hideBorderStyle . '">';

				if( $widthFixed ) { $ct .= '<div class="weluka-container">'; }

				$ct .= '<div class="navbar-header clearfix">';
    			$ct .= '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#'. $menuId . '">';
      			$ct .= '<span class="sr-only">Navigation</span>';
      			$ct .= '<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>';
    			$ct .= '</button>';
				if($menuTitle !== ''){
					$ct .='<div class="navbar-brand">' . $menuTitle . '</div>';
				}
				$ct .= '</div>';
				
//				if( $widthFixed ) { $ct .= '<div class="weluka-container">'; }

				$ct .= $menu;

				if( $widthFixed ) { $ct .= '</div>'; }

				$ct .= '</div>';
			
			} elseif($menuLayout === 'vertical') {
				$colorTheme	= !empty($item['v_color_theme']) ? $item['v_color_theme'] : "weluka-navbar-default";
				$menuAlign	= !empty($item['v_align']) ? ' ' . $item['v_align'] : "";
				$menuShape	= !empty($item['v_shape']) ? ' ' . $item['v_shape'] : "";
				$font		= !empty($item['v_font']) ? ' ' . $item['v_font'] : '';
				$fontSize	= isset($item['v_font_size']) && strlen(trim($item['v_font_size'])) > 0 ? ' font-size:' . trim($item['v_font_size']) . 'px !important;' : '';
				$weight		= !empty($item['v_bold']) ? ' font-weight:bold !important;' : '';
				$underline	= !empty($item['v_underline']) ? ' text-decoration:underline !important;' : '';
				$italic		= !empty($item['v_italic']) ? ' font-style:italic !important;' : '';
				$menu = sprintf(
					'[%s menu="%s" container="" containerid="" containerclass="" menuclass="nav nav-pills nav-stacked"]',
					$this->wpmenu_shortcode_tag,
					$termId
				); 

				$ct = '<div class="weluka-nav weluka-nav-bar-v ' . $colorTheme. $menuShape . $menuAlign . '" style="' . $font . $fontSize . $weight . $underline . $italic . '">';
				if($menuTitle !== ''){
					$ct .='<div class="navbar-brand">' . $menuTitle . '</div>';
				}
				$ct .= $menu;
      			$ct .= '</div>';

			} elseif($menuLayout === 'hamburger') {
				$colorTheme	= !empty($item['ham_color_theme']) ? $item['ham_color_theme'] : "weluka-navbar-default";
				$menuAlign	= !empty($item['ham_align']) ? ' ' . $item['ham_align'] : "";
				$menuShape	= !empty($item['ham_shape']) ? ' ' . $item['ham_shape'] : "";
				$menuSize	= !empty($item['ham_size']) ? ' ' . $item['ham_size'] : "";
				$font		= !empty($item['ham_font']) ? ' ' . $item['ham_font'] : '';
				$fontSize	= isset($item['ham_font_size']) && strlen(trim($item['ham_font_size'])) > 0 ? ' font-size:' . trim($item['ham_font_size']) . 'px !important;' : '';
				$weight		= !empty($item['ham_bold']) ? ' font-weight:bold !important;' : '';
				$underline	= !empty($item['ham_underline']) ? ' text-decoration:underline !important;' : '';
				$italic		= !empty($item['ham_italic']) ? ' font-style:italic !important;' : '';
				$menu = sprintf(
					'[%s menu="%s" container="div" containerid="%s" containerclass="weluka-collapse" menuclass="%s"]',
					$this->wpmenu_shortcode_tag,
					$termId,
					$menuId,
					'nav navbar-nav ' . $colorTheme . $menuShape
				); 

				$hamAlign = '';
				$ct = '<div class="weluka-nav weluka-nav-bar-ham clearfix ' . $menuAlign . '" style="' . $font . $fontSize . $weight . $underline . $italic . '">';
    			$ct .= '<button type="button" class="navbar-toggle weluka-toggle ' . $colorTheme . $menuShape . $menuSize . '" data-target="#' . $menuId . '" style="' . $hideBorderStyle . '">';
      			$ct .= '<span class="sr-only">Navigation</span>';
      			$ct .= '<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>';
    			$ct .= '</button>';
				$ct .= $menu;
				$ct .= '</div>';
				
			} else {
				$ct = sprintf(
					'[%s title="%s" navmenu="%s"]',
					$this->wpmenu_shortcode_tag2,
					$menuTitle,
					$termId
				); 

			}
		}else{
			$ct = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please enter wordpress custom menu.', Weluka::$settings['plugin_name']) . '</div>';
		}
		$idStr = '';
		$customStyle = '';
		if( $customBaseColor || $customBorderColor || $customTextColor ) {
			$_id =  'wpmenu' . Weluka::get_instance()->create_node_id();
			$_id2 = '#' . $_id;
			$idStr = 'id="' . $_id . '" ';
			$customStyle = '<div style="display:none;"><style>';
			if( $customBaseColor ) {
				$customStyle .=
				$_id2 . ' .' . $colorTheme . ' ,' . 
				$_id2 . ' .' . $colorTheme . ' .dropdown-menu,' .
				$_id2 . ' .weluka-nav-bar-h.' . $colorTheme . ' .navbar-toggle' .
				'{ background-color: ' . $customBaseColor . ' !important; }' . PHP_EOL;
			}
			if( $customBorderColor ) {
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ',' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu,' . 
					$_id2 . ' .' . $colorTheme . ' a:hover,' .
					$_id2 . ' .' . $colorTheme . ' a:focus' .
					$_id2 . ' .' . $colorTheme . ' .open > a,' .
					$_id2 . ' .' . $colorTheme . ' .open a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .open a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-collapse,' .
					$_id2 . ' .weluka-nav-bar-v.' . $colorTheme . ' .nav,' .
					$_id2 . ' .weluka-nav-bar-v.' . $colorTheme . ' .nav li,' .
					$_id2 . ' .weluka-nav-bar-ham .nav.' . $colorTheme . ',' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme .
					'{ border-color: ' . $customBorderColor . ' !important; }' . PHP_EOL;
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ' a:hover,' .
					$_id2 . ' .' . $colorTheme . ' a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .open > a,' .
					$_id2 . ' .' . $colorTheme . ' .open a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .open a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle:hover,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle:focus,' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme . ':hover,' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme . ':focus' .
					'{ background-color: ' . $customBorderColor . ' !important; }' . PHP_EOL;
			}
			if( $customTextColor ) {
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ',' .
					$_id2 . ' .' . $colorTheme . ' .navbar-brand,' .
					$_id2 . ' .' . $colorTheme . ' a,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu,' .
					$_id2 . ' .weluka-nav-bar-ham .nav.' . $colorTheme .
					'{ color: ' . $customTextColor . ' !important; }' . PHP_EOL;
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle .icon-bar,' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme . ' .icon-bar' .
					'{ background-color: ' . $customTextColor . ' !important; }' . PHP_EOL;
			}

			$customStyle .= '</style></div>';
		}
		$content .= $customStyle;
		$content .= '<div ' . $idStr . 'class="weluka-wp-widget weluka-wpmenu weluka-content clearfix' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_archives data html TODO style
	 * @since 1.0
	 */
	public function widget_wparchives_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$showType = isset($item['show_type']) && strlen(trim($item['show_type'])) > 0 ? $item['show_type'] : "monthly"; //default ym
		
		$showCount = false;
		if(isset($item['show_post_count']) && $item['show_post_count']){ $showCount = true; }

		$showFormat = isset($item['show_format']) && strlen(trim($item['show_format'])) > 0 ? $item['show_format'] : "html";
		$showLimit = isset($item['show_limit']) && strlen(trim($item['show_limit'])) > 0 ? $item['show_limit'] : "";

		$ct = sprintf(
			'[%s title="%s" showtype="%s" showcount="%s" showformat="%s" showlimit="%s"]',
			$this->wparchives_shortcode_tag,
			$title,
			$showType,
			$showCount,
			$showFormat,
			$showLimit
		); 
		
		$content .= '<div class="weluka-wp-widget weluka-wparchives weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_calendar data html TODO style
	 * @since 1.0
	 */
	public function widget_wpcalendar_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";

		$ct = sprintf( '[%s title="%s"]', $this->wpcalendar_shortcode_tag, $title ); 

		$content .= '<div ' . $cssId . ' class="weluka-wp-widget weluka-wpcalendar weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_categories data html TODO style
	 * @since 1.0
	 */
	public function widget_wpcategories_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		
		$showCount = false;
		if(isset($item['show_post_count']) && $item['show_post_count']){ $showCount = true; }

		$showDropdown = false;
		if(isset($item['show_dropdown']) && $item['show_dropdown']){ $showDropdown = true; }

		$hierarchical = false;
		if(isset($item['hierarchical']) && $item['hierarchical']){ $hierarchical = true; }

		$ct = sprintf( '[%s title="%s" count="%s" hierarchical="%s" dropdown="%s"]',
			$this->wpcategories_shortcode_tag, $title, $showCount, $hierarchical, $showDropdown
		); 

		$content .= '<div ' . $cssId . ' class="weluka-wp-widget weluka-wpcategories weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_meta data html TODO style
	 * @since 1.0
	 */
	public function widget_wpmeta_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";

		$ct = sprintf( '[%s title="%s"]', $this->wpmeta_shortcode_tag, $title );
		$content .= '<div ' . $cssId . ' class="weluka-wp-widget weluka-wpmeta weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_pages data html
	 * @since 1.0
	 */
	public function widget_wppages_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$sortby = isset($item['sortby']) && strlen(trim($item['sortby'])) > 0 ? trim($item['sortby']) : "menu_order";
		$excludes = isset($item['excludes']) && strlen(trim($item['excludes'])) > 0 ? trim($item['excludes']) : "";

		$ct = sprintf( '[%s title="%s" sortby="%s" exclude="%s"]',
			$this->wppages_shortcode_tag, $title, $sortby, $excludes
		); 

		$content .= '<div class="weluka-wp-widget weluka-wppages weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_comments data html TODO style
	 * @since 1.0
	 */
	public function widget_wpcomments_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$limit = isset($item['comment_limit']) && strlen(trim($item['comment_limit'])) > 0 ? trim($item['comment_limit']) : 5;

		$ct = sprintf( '[%s title="%s" number="%s"]',
			$this->wpcomments_shortcode_tag, $title, $limit
		); 

		$content .= '<div class="weluka-wp-widget weluka-wpcomments weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_posts data html
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.2
	 */
	public function widget_wpposts_html($item, $echo = true) {
		global $post, $wp_embed;

		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$height = isset($item['list_height']) && strlen(trim($item['list_height'])) > 0 ? trim($item['list_height']) : "";

		$allUrl = isset($item['all_post_url']) ? esc_url(trim($item['all_post_url'])) : "";
		$allLinkStr = isset($item['all_post_link_string']) ? esc_attr(trim($item['all_post_link_string'])) : __("All Posts", Weluka::$settings['plugin_name']);

		$limit = isset($item['post_limit']) ? trim($item['post_limit']) : 5;
		$categories = isset($item['categories']) ? trim($item['categories']) : "";
		$dispItem['flgTitle'] = isset($item['flg_post_title']) ? $item['flg_post_title'] : 1;
		$dispItem['flgDate'] = isset($item['flg_post_date']) ? $item['flg_post_date'] : 0;
		$dispItem['flgAuthor'] = isset($item['flg_post_author']) ? $item['flg_post_author'] : 0;
		$dispItem['flgCategory'] = isset($item['flg_post_category']) ? $item['flg_post_category'] : 0;
		$dispItem['flgExcerpt'] = isset($item['flg_post_excerpt']) ? $item['flg_post_excerpt'] : 0;
		$dispItem['flgThumbnail'] = isset($item['flg_post_thumbnail']) ? $item['flg_post_thumbnail'] : 0;
		$dispItem['flgComment'] = isset($item['flg_post_comment']) ? $item['flg_post_comment'] : 0;
		$dispItem['flgTagcloud'] = isset($item['flg_post_tagcloud']) ? $item['flg_post_tagcloud'] : 0;
		$dispItem['tagcloudPos']= !empty($item['tagcloud_pos']) ? $item['tagcloud_pos'] : 'metabottom';
		$dispItem['layoutClass']		= isset($item['layout_class']) && $item['layout_class'] !== '' ? $item['layout_class'] : 'mediatop';
		$dispItem['mediaCol']			= !empty($item['media_col']) ? $item['media_col'] : 4;
		$dispItem['contentCol']			= (int)self::MAX_COLUMN - (int)$dispItem['mediaCol'];
		$rowSpacing			= isset($item['row_spacing']) && trim($item['row_spacing']) !== '' ? 'margin-top:' . trim($item['row_spacing']) . 'px;' : '';
		$rowColumn			= isset($item['row_column']) && strlen(trim($item['row_column'])) > 0 ? trim($item['row_column']) : 1;
		$rowOddColor		= isset($item['row_odd_color']) && strlen(trim($item['row_odd_color'])) > 0 ? ' background-color:' . trim($item['row_odd_color']) . ';' : "";
		$rowEvenColor		= isset($item['row_even_color']) && strlen(trim($item['row_even_color'])) > 0 ? ' background-color:' . trim($item['row_even_color']) . ';' : "";
		$dispItem['excerptStringNum'] 	= isset($item['excerpt_string_num']) && strlen(trim($item['excerpt_string_num'])) > 0 ? trim($item['excerpt_string_num']) : 110;
		$ngmClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-row-negative-margin-clear' : '';
		$rowBgClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-list-row-bgcolor' : '';

		//media design
		$dispItem['mediaAlign']			= !empty($item['media_align']) ? $item['media_align'] : 'weluka-text-left';
		$dispItem['mediaBorderColor']	= !empty($item['media_border_color']) ? trim($item['media_border_color']) : '';
		$dispItem['mediaBorderStyle']	= !empty($item['media_border_style']) ? trim($item['media_border_style']) : '';
		$dispItem['mediaBorderSize']	= !empty($item['media_border_size']) ? trim($item['media_border_size']) : '';
		$dispItem['mediaShape']			= !empty($item['media_shape']) ? $item['media_shape'] : '';

		//post title design
		$dispItem['titleTag']		= !empty($item['title_html_tag']) ? $item['title_html_tag'] : 'h4';
		$dispItem['titleAlign']		= !empty($item['title_align']) ? ' ' . $item['title_align'] : '';
		$dispItem['titleFont']		= !empty($item['title_font']) ? ' ' . $item['title_font'] : '';
		$dispItem['titleFontSize']	= isset($item['title_font_size']) && strlen(trim($item['title_font_size'])) > 0 ? ' font-size:' . trim($item['title_font_size']) . 'px;' : '';
		$dispItem['titleColor']		= isset($item['title_color']) && strlen(trim($item['title_color'])) > 0 ? ' color:' . trim($item['title_color']) . ';' : '';
		$dispItem['titleWeight']	= !empty($item['title_bold']) ? ' font-weight:bold;' : '';
		$dispItem['titleUnderline']	= !empty($item['title_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['titleItalic']	= !empty($item['title_italic']) ? ' font-style:italic;' : '';

		//meta common design
		$dispItem['metaAlign']		= !empty($item['meta_align']) ? ' ' . $item['meta_align'] : '';
		
		$dispItem['dateFont']		= !empty($item['date_font']) ? ' ' . $item['date_font'] : '';
		$dispItem['dateFontSize']	= isset($item['date_font_size']) && strlen(trim($item['date_font_size'])) > 0 ? ' font-size:' . trim($item['date_font_size']) . 'px;' : '';
		$dispItem['dateColor']		= isset($item['date_color']) && strlen(trim($item['date_color'])) > 0 ? ' color:' . trim($item['date_color']) . ';' : '';
		$dispItem['dateWeight']		= !empty($item['date_bold']) ? ' font-weight:bold;' : '';
		$dispItem['dateUnderline']	= !empty($item['date_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['dateItalic']		= !empty($item['date_italic']) ? ' font-style:italic;' : '';
		//date design
		$dispItem['dateFormat'] 	= isset($item['date_format']) && strlen(trim($item['date_format'])) > 0 ? trim($item['date_format']) : "";
		if( class_exists( 'WelukaTheme', false ) && empty( $dispItem['dateFormat'] ) ) {
			$_wk = WelukaAdminSettings::get_site_options( WelukaTheme::get_instance()->get_option_name(), WelukaTheme::POST_DATE_FORMAT, true );
			$dispItem['dateFormat'] = !empty( $_wk ) ? $_wk : '';
		}

		//author design
		$dispItem['authorFont']			= !empty($item['author_font']) ? ' ' . $item['author_font'] : '';
		$dispItem['authorFontSize']		= isset($item['author_font_size']) && strlen(trim($item['author_font_size'])) > 0 ? ' font-size:' . trim($item['author_font_size']) . 'px;' : '';
		$dispItem['authorColor']		= isset($item['author_color']) && strlen(trim($item['author_color'])) > 0 ? ' color:' . trim($item['author_color']) . ';' : '';
		$dispItem['authorWeight']		= !empty($item['author_bold']) ? ' font-weight:bold;' : '';
		$dispItem['authorUnderline']	= !empty($item['author_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['authorItalic']		= !empty($item['author_italic']) ? ' font-style:italic;' : '';

		//category design
		$dispItem['categoryFont']		= !empty($item['category_font']) ? ' ' . $item['category_font'] : '';
		$dispItem['categoryFontSize']	= isset($item['category_font_size']) && strlen(trim($item['category_font_size'])) > 0 ? ' font-size:' . trim($item['category_font_size']) . 'px;' : '';
		$dispItem['categoryColor']		= isset($item['category_color']) && strlen(trim($item['category_color'])) > 0 ? ' color:' . trim($item['category_color']) . ';' : '';
		$dispItem['categoryWeight']		= !empty($item['category_bold']) ? ' font-weight:bold;' : '';
		$dispItem['categoryUnderline']	= !empty($item['category_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['categoryItalic']		= !empty($item['category_italic']) ? ' font-style:italic;' : '';

		//content(excerpt design
		$dispItem['contentAlign']		= !empty($item['content_align']) ? ' ' . $item['content_align'] : '';
		$dispItem['contentFont']		= !empty($item['content_font']) ? ' ' . $item['content_font'] : '';
		$dispItem['contentFontSize']	= isset($item['content_font_size']) && strlen(trim($item['content_font_size'])) > 0 ? ' font-size:' . trim($item['content_font_size']) . 'px;' : '';
		$dispItem['contentColor']		= isset($item['content_color']) && strlen(trim($item['content_color'])) > 0 ? ' color:' . trim($item['content_color']) . ';' : '';

		//more button design
		$dispItem['moreButton']['text']			= isset($item['more_string']) ? trim($item['more_string']) : '';
		$dispItem['moreButton']['class_name']		= !empty($item['more_button_align']) ? $item['more_button_align'] : '';
		$dispItem['moreButton']['button_color']	= !empty($item['more_button_color']) ? $item['more_button_color'] : 'weluka-btn-info';
		$dispItem['moreButton']['shape']		= !empty($item['more_button_shape']) ? $item['more_button_shape'] : '';
		$dispItem['moreButton']['size']			= !empty($item['more_button_size']) ? $item['more_button_size'] : '';
		$dispItem['moreButton']['block']		= !empty($item['more_button_block']) ? $item['more_button_block'] : '';

		$ct = '<div class="widget widget_recent_entries weluka-list weluka-list-' . $dispItem['layoutClass'] . '">';
		if($title !== "") {
			$ct .= '<h3 class="widgettitle weluka-widgettitle">' . esc_attr($title) . '</h3>';
		}

		$sh = sprintf(
			'[%s height="%s" categories="%s" limit="%s" flgtitle="%s" flgdate="%s" flgauthor="%s" flgcategory="%s" flgexcerpt="%s" flgthumbnail="%s" flgcomment="%s" layoutclass="%s" mediacol="%s" rowspacing="%s" rowcolumn="%s" rowoddcolor="%s" rowevencolor="%s" excerptstringnum="%s" mediaalign="%s" mediabordercolor="%s" mediaborderstyle="%s" mediabordersize="%s" mediashape="%s" titletag="%s" titlealign="%s" titlefont="%s" titlefontsize="%s" titlecolor="%s" titleweight="%s" titleunderline="%s" titleitalic="%s" metaalign="%s" datefont="%s" datefontsize="%s" datecolor="%s" dateweight="%s" dateunderline="%s" dateitalic="%s" dateformat="%s" authorfont="%s" authorfontsize="%s" authorcolor="%s" authorweight="%s" authorunderline="%s" authoritalic="%s" categoryfont="%s" categoryfontsize="%s" categorycolor="%s" categoryweight="%s" categoryunderline="%s" categoryitalic="%s" contentalign="%s" contentfont="%s" contentfontsize="%s" contentcolor="%s" morebuttontext="%s" morebuttonclassname="%s" morebuttonbuttoncolor="%s" morebuttonshape="%s" morebuttonsize="%s" morebuttonblock="%s" allurl="%s" alllinkstr="%s" allbuttonclassname="%s" allbuttonbuttoncolor="%s" allbuttonshape="%s" allbuttonsize="%s" allbuttonblock="%s" flgtagcloud="%s" tagcloudpos="%s"]',
			$this->wpposts_shortcode_tag,
			$height,
			$categories,
			$limit,
			$dispItem['flgTitle'],
			$dispItem['flgDate'],
			$dispItem['flgAuthor'],
			$dispItem['flgCategory'],
			$dispItem['flgExcerpt'],
			$dispItem['flgThumbnail'],
			$dispItem['flgComment'],
			$dispItem['layoutClass'],
			$dispItem['mediaCol'],
			$rowSpacing,
			$rowColumn,
			$rowOddColor,
			$rowEvenColor,
			$dispItem['excerptStringNum'],
			$dispItem['mediaAlign'],
			$dispItem['mediaBorderColor'],
			$dispItem['mediaBorderStyle'],
			$dispItem['mediaBorderSize'],
			$dispItem['mediaShape'],
			$dispItem['titleTag'],
			$dispItem['titleAlign'],
			$dispItem['titleFont'],
			$dispItem['titleFontSize'],
			$dispItem['titleColor'],
			$dispItem['titleWeight'],
			$dispItem['titleUnderline'],
			$dispItem['titleItalic'],
			$dispItem['metaAlign'],
			$dispItem['dateFont'],
			$dispItem['dateFontSize'],
			$dispItem['dateColor'],
			$dispItem['dateWeight'],
			$dispItem['dateUnderline'],
			$dispItem['dateItalic'],
			$dispItem['dateFormat'],
			$dispItem['authorFont'],
			$dispItem['authorFontSize'],
			$dispItem['authorColor'],
			$dispItem['authorWeight'],
			$dispItem['authorUnderline'],
			$dispItem['authorItalic'],
			$dispItem['categoryFont'],
			$dispItem['categoryFontSize'],
			$dispItem['categoryColor'],
			$dispItem['categoryWeight'],
			$dispItem['categoryUnderline'],
			$dispItem['categoryItalic'],
			$dispItem['contentAlign'],
			$dispItem['contentFont'],
			$dispItem['contentFontSize'],
			$dispItem['contentColor'],
			$dispItem['moreButton']['text'],
			$dispItem['moreButton']['class_name'],
			$dispItem['moreButton']['button_color'],
			$dispItem['moreButton']['shape'],
			$dispItem['moreButton']['size'],
			$dispItem['moreButton']['block'],
			$allUrl,
			$allLinkStr,
			!empty($item['all_button_align']) ? $item['all_button_align'] : '',
			!empty($item['all_button_color']) ? $item['all_button_color'] : 'weluka-btn-link',
			!empty($item['all_button_shape']) ? $item['all_button_shape'] : '',
			!empty($item['all_button_size']) ? $item['all_button_size'] : '',
			!empty($item['all_button_block']) ? $item['all_button_block'] : '',
			$dispItem['flgTagcloud'],
			$dispItem['tagcloudPos']
		);

		$ct .= $sh;

		$ct .= '</div>';
		
		if(strstr($ct, "[embed") !== false) {
			$ct = $wp_embed->run_shortcode($ct); //embed shortcode exec
		}

		$content .= '<div class="weluka-wp-widget weluka-wpposts weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct;
		$content .= '</div>';

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}
	
	/**
	 * builder item type = wp_posts list content html
	 * @since 1.0
	 */
	public function recentpost_content($postData, $dispItem) {
		$ret = "";
		$_linkTarget = "";
		$_link	= get_permalink($postData->ID);

		$_title = get_the_title($postData->ID);

		$titleHtml = "";
		if( $dispItem['flgTitle'] ) {
			$titleHtml = '<' . $dispItem['titleTag']. ' class="weluka-list-title' . $dispItem['titleAlign'] . '" style="' . $dispItem['titleFont'] . $dispItem['titleFontSize'] . $dispItem['titleColor'] . $dispItem['titleWeight'] . $dispItem['titleUnderline'] . $dispItem['titleItalic'] . '">{%TITLE%}</' . $dispItem['titleTag'] . '>';
			$s = "";
			if( $_link ) {
				$s = '<a href="' . esc_url($_link) . '"' . $_linkTarget . ' title="' . esc_attr($_title) . '">' . $_title . '</a>';
			} else {
				$s = $_title;
			}
						
			$titleHtml = str_replace("{%TITLE%}", $s, $titleHtml);
		}

		//sticky post
		$stickyHtml = "";
		if ( is_sticky() ) {
			$stickyHtml = sprintf( '<span class="weluka-post-sticky">%s</span>', __( 'Featured', Weluka::$settings['plugin_name'] ) );
		}
		$dateHtml = "";
		if($dispItem['flgDate']) {
			$_date = get_the_date($dispItem['dateFormat']);
			$dateHtml = '<span class="weluka-post-date" style="' . $dispItem['dateFont'] . $dispItem['dateFontSize'] . $dispItem['dateColor'] . $dispItem['dateWeight'] . $dispItem['dateUnderline'] . $dispItem['dateItalic'] . '">' . $_date . '</span>';
		}

		$catHtml = "";
		if($dispItem['flgCategory']) {
			$cats = get_the_category();

			if ( !empty( $cats ) ) {
				$n = 0;
				foreach ( $cats as $index => $cat ) {
					$p = $n === 0 ? '&nbsp;|&nbsp;' : '&nbsp;&nbsp;'; 
					$catHtml .= $p . '&nbsp;&nbsp;<span class="weluka-post-category-name" style="' . $dispItem['categoryFont'] . $dispItem['categoryFontSize'] . $dispItem['categoryColor'] . $dispItem['categoryWeight'] . $dispItem['categoryUnderline'] . $dispItem['categoryItalic'] . '"><a href="' . get_category_link( $cat ) . '">' . esc_html($cat->name) . '</a></span>';
					$n++;
				}
			}
		}

		$authorHtml = "";
		if($dispItem['flgAuthor']) {
			$_author = get_the_author();
			$authorHtml = '&nbsp;|&nbsp;<span class="weluka-post-author" style="' . $dispItem['authorFont'] . $dispItem['authorFontSize'] . $dispItem['authorColor'] . $dispItem['authorWeight'] . $dispItem['authorUnderline'] . $dispItem['authorItalic'] . '"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html($_author) . '</a></span>';
		}

		$commentHtml = "";
		if( $dispItem['flgComment'] ) {
			$_cnt = get_comments_number();
			$commentHtml = '<span class="weluka-post-commentnum"><i class="fa fa-commenting"></i>' . $_cnt . '</span>';
		}

		$mediaHtml = "";
		if( $dispItem['flgThumbnail'] ) {
			$_thumb_src = '';
			if( has_post_thumbnail()){
				$size = class_exists( 'WelukaTheme', false ) ? "post-medium" : "full"; //"medium"; //"full"
				$thumbnail =  wp_get_attachment_image_src( get_post_thumbnail_id(), $size);
				$_thumb_src = esc_url($thumbnail[0]);
			} else {
				if( class_exists( 'WelukaTheme', false ) ) {
					$_thumb_src = esc_url( get_weluka_noimage() );
				} else {
					$_thumb_src = Weluka::$settings['noimage'];
				}
			}
			
			if( $_thumb_src !== '') {
				$mediaHtml = '<div class="weluka-list-media">';
				$media = array();
				//TODO Image crop
				if( $_link ) {
					$media['link']['action']	= self::LINK_ACTION_GOTOLINK;
					$media['link']['href']		= $_link;
					$media['link']['target']	= $_linkTarget;
				}
				$media['alt']			= $_title;
				$media['fitwidth']		= 1;
				$media['title']			= $_title;
				$media['url']			= $_thumb_src;
				$media['border_color']	= $dispItem['mediaBorderColor'];
				$media['border_size']	= $dispItem['mediaBorderSize'];
				$media['border_style']	= $dispItem['mediaBorderStyle'];
				$media['shape']			= $dispItem['mediaShape'];
				$media['class_name']	= $dispItem['mediaAlign'];
				$mediaHtml .= $this->widget_img_html($media, false);

				if( $stickyHtml ) { $mediaHtml .= $stickyHtml; }
				if( $commentHtml ) { $mediaHtml .= $commentHtml; }

				$mediaHtml .= '</div>';
			}
		}

		$metaHtml = '';
		if($dateHtml || $catHtml || $authorHtml){
			$metaHtml = '<div class="weluka-list-meta' . $dispItem['metaAlign'] .'">' . $dateHtml . $authorHtml . $catHtml . '</div>';
		}

		$tagcloud_metabottom = '';
		$tagcloud_bottom = '';
		if(  $dispItem['flgTagcloud'] ) {
			$tags = get_the_tags();
			$wktags = '';
			if ($tags) {
				foreach($tags as $tag) :
					$tag_link = get_tag_link($tag->term_id);
					$wktags .= '<a href="' . esc_url( $tag_link ) . '" title="' . esc_attr($tag->name) . '">' . $tag->name . '</a>';
				endforeach;
			}
			if( $dispItem['tagcloudPos'] === 'metabottom' || $dispItem['tagcloudPos'] === 'both' ) {
				if($wktags !== '' ) {
					$tagcloud_metabottom = '<div class="tagcloud weluka-mgtop-s">' . $wktags . '</div>';
    			}
			}
			if( $dispItem['tagcloudPos'] === 'bottom' || $dispItem['tagcloudPos'] === 'both' ) {
				if($wktags !== '' ) {
					$tagcloud_bottom = '<div class="tagcloud weluka-mgtop-l">' . $wktags . '</div>';
    			}
			}
		}
		
		$excerptHtml = "";
		if( $dispItem['flgExcerpt'] ) {
			$_excerpt = $this->truncate_content( $postData, $dispItem['excerptStringNum'], false, true );
			$excerptHtml = '<div class="weluka-list-content' . $dispItem['contentAlign'] . '" style="' . $dispItem['contentFont'] . $dispItem['contentFontSize'] . $dispItem['contentColor'] . '">' . $_excerpt . '</div>';
		}
		$moreHtml = "";
		if(!empty($dispItem['moreButton']['text'])) {
			$button = $dispItem['moreButton'];
			if( $_link ) {
				$button['link']['action']	= self::LINK_ACTION_GOTOLINK;
				$button['link']['href']		= $_link;
				$button['link']['target']	= $_linkTarget;
			}
			$moreHtml		= $this->widget_button_html($button, false);
		}

 		if($dispItem['layoutClass'] === 'mediatop') {

			$ret = $mediaHtml;
			$ret .= $titleHtml;
			$ret .= $metaHtml;
			$ret .= $tagcloud_metabottom;
			$ret .= $excerptHtml;
			$ret .= $tagcloud_bottom;
			$ret .= $moreHtml;

		} elseif ($dispItem['layoutClass'] === 'mediamiddle') {

			$ret = $titleHtml;
			$ret .= $metaHtml;
			$ret .= $tagcloud_metabottom;
			$ret .= $mediaHtml;
			$ret .= $excerptHtml;
			$ret .= $tagcloud_bottom;
			$ret .= $moreHtml;

		} elseif ($dispItem['layoutClass'] === 'mediabottom') {

			$ret = $titleHtml;
			$ret .= $metaHtml;
			$ret .= $tagcloud_metabottom;
			$ret .= $excerptHtml;
			$ret .= $tagcloud_bottom;
			$ret .= $moreHtml;
			$ret .= $mediaHtml;

		} elseif ($dispItem['layoutClass'] === 'mediaright') {
			$_left = ' lt';
			if($mediaHtml) {
				$mediaHtml = '<div class="weluka-col-md-' . $dispItem['mediaCol'] . ' rt">' . $mediaHtml . '</div>';
				$contentCol = $dispItem['contentCol'];
			}else{
				$contentCol = 12;
				$_left = ' full';
			}
			$ret = '<div class="weluka-col-md-' . $contentCol . $_left . '">';
			$ret .= $titleHtml;
			$ret .= $metaHtml;
			$ret .= $tagcloud_metabottom;
			$ret .= $excerptHtml;
			$ret .= $tagcloud_bottom;
			$ret .= $moreHtml;
			$ret .= '</div>';
			$ret .= $mediaHtml;

		}else{
			$_right = ' rt';
			if( $mediaHtml ) {
				$ret = '<div class="weluka-col-md-' . $dispItem['mediaCol'] . ' lt">' . $mediaHtml . '</div>';
				$contentCol = $dispItem['contentCol'];
			}else{
				$contentCol = 12;
				$_right = ' full';
			}
			$ret .= '<div class="weluka-col-md-' . $contentCol . $_right . '">';
			$ret .= $titleHtml;
			$ret .= $metaHtml;
			$ret .= $tagcloud_metabottom;
			$ret .= $excerptHtml;
			$ret .= $tagcloud_bottom;
			$ret .= $moreHtml;
			$ret .= '</div>';
		}
		return $ret;
	}

	/**
	 * builder item type = wp_rss data html TODO style
	 * @since 1.0
	 */
	public function widget_wprss_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$limit = isset($item['rss_limit']) ? trim($item['rss_limit']) : 5;
		$url = isset($item['url']) ? trim($item['url']) : "";
        $showSummary = isset($item['show_summary']) ? $item['show_summary'] : 0;
        $showAuthor = isset($item['show_author']) ? $item['show_author'] : 0;
        $showDate = isset($item['show_date']) ? $item['show_date'] : 0;
		$height = isset($item['list_height']) && strlen(trim($item['list_height'])) > 0 ? ' style="height:' . trim($item['list_height']) . 'px; overflow-y:auto;overflow-x:hidden;"' : "";

		$ct = '<div class="weluka-rss-content"' . $height . '>';
		if( $url === "" ) {
			$ct .= '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please enter wordpress RSS Feed.', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			$ct .= sprintf( '[%s title="%s" url="%s" items="%s" showsummary="%s" showauthor="%s" showdate="%s"]',
				$this->wprss_shortcode_tag, $title, $url, $limit, $showSummary, $showAuthor, $showDate
			);
		}
		$ct .= '</div>';


		$content .= '<div class="weluka-wp-widget weluka-wprss weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct;
		$content .= '</div>';
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_search data html TODO style
	 * @since 1.0
	 */
	public function widget_wpsearch_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";

		$ct = sprintf( '[%s title="%s"]', $this->wpsearch_shortcode_tag, $title );

		$content .= '<div class="weluka-wp-widget weluka-wpsearch weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_tagcloud data html TODO style
	 * @since 1.0
	 */
	public function widget_wptagcloud_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";
		$taxonomy = isset($item['taxonomy']) ? $item['taxonomy'] : "post_tag";

		$ct = sprintf( '[%s title="%s" taxonomy="%s"]', $this->wptagcloud_shortcode_tag, $title, $taxonomy );

		$content .= '<div class="weluka-wp-widget weluka-wptagcloud weluka-content' . $class . $cssClass . '" ' . $style . '>';
		$content .= $ct; 
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * create link html
	 * @update
	 * ver1.0.1
	 */
	public function link_html($link, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$action = "";
		/* v1.0.1 comment out
		if(isset($link['action'])){
			if($link['action'] === self::LINK_ACTION_ZOOMUP) {
				$action = ' class="fancybox" rel="gallery"';
			}
		}*/
		$target = isset($link['target']) && strlen($link['target']) > 0 ? ' target="' . $link['target'] . '"' : "";
		$title = isset($link['title']) && strlen($link['title']) > 0 ? ' title="' . esc_attr($link['title']) . '"' : "";
		$content = isset($link['content']) && strlen($link['content']) > 0 ? $link['content']: "";
		$ret = '<a href="' . esc_url( $link['href'] ) . '"' . $title . $action . $target . '>' . $content . '</a>';

		$ret = stripslashes($ret);
		
		if($builderMode) {
			$content = do_shortcode($ret);
		}

		if($echo) { echo $ret; }else{ return $ret; }		
	}
	
	/**
	 * block overlay html create
	 * @since 1.0
	 */
	public function overlay_html($type="widget", $echo = true, $action = true) {
		$content = "";
		$title = __('Edit', Weluka::$settings['plugin_name']);
		if($type === 'section') { $title = __('Section', Weluka::$settings['plugin_name']); }
		elseif($type === 'row') { $title = __('Row', Weluka::$settings['plugin_name']); }
		elseif($type === 'col') { $title = __('Colum', Weluka::$settings['plugin_name']); }
		elseif($type === 's_row') { $title = __('Subrow', Weluka::$settings['plugin_name']); }
		elseif($type === 's_col') { $title = __('Subcolum', Weluka::$settings['plugin_name']); }

		$content = '<div class="weluka-helper">';
		if($action) {
			$content .= '<div class="weluka-overlay weluka-' . $type . '-overlay clearfix">';
			$content .= '<div class="weluka-overlay-actions clearfix"><span class="weluka-overlay-title">' . $title . '</span>';
       		$content .= '<i class="fa fa-arrows weluka-draggable weluka-block-move" data-dnd-effect-allowed="move" data-drag-object="' . $type . '" draggable="true"></i>';
        	$content .= '<i class="fa fa-wrench weluka-' . $type . '-setting"></i>';
        	// TODO beta $content .= '<i class="fa fa-copy weluka-' . $type . '-copy"></i>';
       		$content .= '<i class="fa fa-trash weluka-' . $type . '-remove"></i></div>';
			$content .= '</div>';
		}
		if($type === 'widget' || $type === 's_widget') {
			$content .= $this->widget_droppable_html($type, false);
		}elseif($type === 'col' || $type === 's_col') {
			$content .= $this->colum_droppable_html($type, false);
		}
		$content .= '</div>';

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * widget block droppable handle html create
	 * @since 1.0
	 */
	public function widget_droppable_html($type = 'widget', $echo = true) {
		$content = "";
		$posPrefix = $type === 's_widget' ? 's-' : '';
		$content = '<div class="weluka-col-droppables">';
		$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle weluka-drop-col-top-in" data-weluka-drop-position="' . $posPrefix . 'col-top-in" data-pos-title="insert"></div>';
		$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle weluka-drop-col-bottom-in" data-weluka-drop-position="' . $posPrefix . 'col-bottom-in" data-pos-title="insert"></div>';
		if($type === 'widget') {
			$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-s-col-left-out" data-weluka-drop-position="s-col-left-out" data-pos-title="subcol"></div>';
			$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-s-col-right-out" data-weluka-drop-position="s-col-right-out" data-pos-title="subcol"></div>';
		}
		$content .= '</div>';

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * colum block droppable handle html create
	 * @since 1.0
	 */
	public function colum_droppable_html($type = 'col', $echo = true) {
		$content = "";
		$posPrefix = $type === 's_col' ? 's-in-' : '';
		$title = $type === 's_col' ? 'subcol' : 'colum';
		$content = '<div class="weluka-col-droppables">';
		$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-' . $posPrefix . 'col-left-out" data-weluka-drop-position="' . $posPrefix . 'col-left-out" data-pos-title="' . $title . '"></div>';
		$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-' . $posPrefix . 'col-right-out" data-weluka-drop-position="' . $posPrefix . 'col-right-out" data-pos-title="' . $title . '"></div>';
		$content .= '</div>';
		if($echo) { echo $content; }else{ return $content; }
	}
	
	/**
	 * builder data array から styleを生成
	 * @since 1.0
	 */
	public function get_style_attribute($dataArr, $borderFlg = true, $styleFlg = true) {
		$ret = "";
		$bgcolor	= isset($dataArr["background_color"]) && strlen(trim($dataArr["background_color"])) > 0 ? ' background-color:' . $dataArr["background_color"] . ';' : '';
		$color		= isset($dataArr["color"]) && strlen(trim($dataArr["color"])) > 0 ? ' color:' . $dataArr["color"] . ';' : '';
		$marginT	= isset($dataArr["margin_top"]) && strlen(trim($dataArr["margin_top"])) > 0 ? ' margin-top:' . $dataArr["margin_top"] . 'px;' : '';
		$marginB	= isset($dataArr["margin_bottom"]) && strlen(trim($dataArr["margin_bottom"])) > 0 ? ' margin-bottom:' . $dataArr["margin_bottom"] . 'px;' : '';
		$marginL	= isset($dataArr["margin_left"]) && strlen(trim($dataArr["margin_left"])) > 0 ? ' margin-left:' . $dataArr["margin_left"] . 'px;' : '';
		$marginR	= isset($dataArr["margin_right"]) && strlen(trim($dataArr["margin_right"])) > 0 ? ' margin-right:' . $dataArr["margin_right"] . 'px;' : '';
		$paddingT	= isset($dataArr["padding_top"]) && strlen(trim($dataArr["padding_top"])) > 0 ? ' padding-top:' . $dataArr["padding_top"] . 'px;' : '';
		$paddingB	= isset($dataArr["padding_bottom"]) && strlen(trim($dataArr["padding_bottom"])) > 0 ? ' padding-bottom:' . $dataArr["padding_bottom"] . 'px;' : '';
		$paddingL	= isset($dataArr["padding_left"]) && strlen(trim($dataArr["padding_left"])) > 0 ? ' padding-left:' . $dataArr["padding_left"] . 'px;' : '';
		$paddingR	= isset($dataArr["padding_right"]) && strlen(trim($dataArr["padding_right"])) > 0 ? ' padding-right:' . $dataArr["padding_right"] . 'px;' : '';
		$width		= isset($dataArr['width']) && strlen(trim($dataArr['width'])) > 0 ? ' width:' . $dataArr['width'] . 'px;' : '';
		$height		= isset($dataArr['height']) && strlen(trim($dataArr['height'])) > 0 ? ' height:' . $dataArr['height'] . 'px;' : '';
		$borderSize	= isset($dataArr['border_size']) && strlen(trim($dataArr['border_size'])) > 0 ? $dataArr['border_size'] . 'px' : '';
		$borderStyle= isset($dataArr['border_style']) && strlen(trim($dataArr['border_style'])) > 0 ? $dataArr['border_style'] : 'solid';
		$borderColor= isset($dataArr['border_color']) && strlen(trim($dataArr['border_color'])) > 0 ? $dataArr['border_color'] : '#dddddd';
		$bgimg		= isset($dataArr["background_image"]) && strlen(trim($dataArr["background_image"])) > 0 ? ' background-image:url(' . $dataArr["background_image"] . ');' : '';
		$bgpos		= isset($dataArr["bgpos"]) && strlen(trim($dataArr["bgpos"])) > 0 ? 'background-position:' . trim($dataArr["bgpos"]) . ';' : 'background-position:50% 0;'; //ver 1.0.1 update
		$bgrepeat	= isset($dataArr["bgrepeat"]) && strlen(trim($dataArr["bgrepeat"])) > 0 ? 'background-repeat:' . trim($dataArr["bgrepeat"]) . ';' : 'background-repeat:no-repeat;';
		$bgattach	= isset($dataArr["bgattachment"]) && strlen(trim($dataArr["bgattachment"])) > 0 ? 'background-attachment:' . trim($dataArr["bgattachment"]) . ';' : 'background-attachment:fixed;';
		$bgsizeType	= isset($dataArr["bgsize_type"]) && strlen(trim($dataArr["bgsize_type"])) > 0 ? trim($dataArr["bgsize_type"]) : 'cover';
		if( $bgsizeType === 'num' ) {
			$bgsize = isset($dataArr["bgsize"]) && strlen(trim($dataArr["bgsize"])) > 0 ? 'background-size:' . trim($dataArr["bgsize"]) . ';' : '';
		} else {
			$bgsize = 'background-size:' . $bgsizeType . ';';
		}

		if( $bgimg ) { $bgimg .= $bgpos . $bgrepeat . $bgattach . $bgsize; }
		
		$border = '';
		if($borderSize !== '') {
			$border = ' border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ';';
		}
		if(!$borderFlg) { $border = ''; }
		
		if($bgimg !== '' || $bgcolor !== '' || $color !== '' || $marginT !== '' || $marginB !== '' || $marginL !== '' || $marginR !== '' || $paddingT !== '' || $paddingB !== '' || $paddingL !== '' || $paddingR !== ''
		   || $width !== '' || $height !== '' || $border !== '') {
			if( $styleFlg ) { 
				$ret = ' style="' . $bgimg . $bgcolor . $color . $marginT . $marginB . $marginL . $marginR . $paddingT . $paddingB . $paddingL . $paddingR . $width . $height . $border . '"';
			} else {
				$ret = $bgimg . $bgcolor . $color . $marginT . $marginB . $marginL . $marginR . $paddingT . $paddingB . $paddingL . $paddingR . $width . $height . $border;
			}
		}
		return $ret;
	}

	/**
	 * create publish builder data
	 * get publish data
	 * @since 1.0
	 */
	public function publish_builder_data($postId = '', $deactive = false) {
		$weluka = Weluka::get_instance();
		$post_id = $weluka->get_post_id($postId);
		
		$mode = self::CONTENT_POSTMETA_KEY_DRAFT;

		$this->set_property(self::PROP_KEY_BUILDER_MODE, false);
		$builderData = $this->get_builder_data($post_id, $mode);

			//get html
			ob_start();
			$this->display_content($builderData);
			$_content = ob_get_clean();
		
		$saveData = array();
		$saveData['content'] = $_content;
		$saveData['pagesetting'] = !empty( $builderData['pagesetting'] ) ? $builderData['pagesetting'] : '';
		
		if( $deactive === false ) {
			$ret[0] = $weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_PUBLISH, $saveData);
		} else {
			$ret[0] = true;
		}
		$ret[1] = $_content;
		
		return $ret;	
	}



/*------------------------------------------------------------------------------
 [ Builder utility ] 
------------------------------------------------------------------------------*/

	/**
	 * @since 1.0
	 */
	public function truncate_content( $postData, $num='', $echo = true, $stripTag = true ) {

		$ct = $this->get_builder_to_content( $postData, $stripTag );
		
		$truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $ct);

		if ( $num !== '' && mb_strlen( $truncate, "UTF-8" ) > $num ) {
			$echo_out = Weluka::get_instance()->excerpt_more( '' );
		} else {
			$echo_out = ''; 
		}

		if($echo_out !== '' ){
			$truncate = mb_substr($truncate, 0, $num);
		}
		if ($echo) echo $truncate.$echo_out;
		else return ($truncate . $echo_out);

	}

	/**
	 * @since 1.0
	 */
	public function get_builder_to_content( $postData, /*$mode,*/ $stripTag = true ) {

		if( empty( $postData ) ) { return ''; }

		$ct = "";
		
		if( ! $postData->post_excerpt ) {
			$_content = str_replace(array("\r\n","\n","\r"), '', trim(strip_tags($postData->post_content)));
			if( strcasecmp( $_content, "[weluka-builder-content]") == 0 ) {

				$ct = do_shortcode($this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_PUBLISH, 'content')); //publish data get

			} else {

				$ct = do_shortcode($_content);
			}
		} else {
			$ct = do_shortcode( $postData->post_excerpt ); 
		}

		$ct = $stripTag ? trim( strip_tags( $ct )) : trim ( $ct );
		return $ct;
	}
	
/*------------------------------------------------------------------------------
 [ Builder hook 関連 ] 
------------------------------------------------------------------------------*/

	/**
	 * the_excerpt get_the_excerpt hook
	 * @since 1.0
	 *
	 */
	public function excerpt($excerpt) {
		$weluka = Weluka::get_instance();
		$_excerpt = $excerpt;
		if($_excerpt === '') {
			remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

			$_post = $weluka->get_post();
			$_excerpt = $this->get_builder_to_content( $_post );
			remove_filter('the_excerpt', array($this, 'excerpt'));
        	remove_filter('get_the_excerpt', array($this, 'excerpt'));

			$_post->post_content = $_excerpt;
    		setup_postdata( $_post );
    		$_excerpt = get_the_excerpt();
    		wp_reset_postdata();

			add_filter('the_excerpt', array($this, 'excerpt'));
        	add_filter('get_the_excerpt', array($this, 'excerpt'));

			add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);
		}
		return $_excerpt;
	}
	
	/**
     * wp_footer hook
	 * @since 1.0
	 *
     */
	public function builder_snippets() {
		require_once( Weluka::$settings['plugin_dir'] . '/includes/builder-snippets.php' );
		
		$postType = get_post_type();
		//json data
		echo '<script type="text/javascript">';
		echo 'var welukaContentModel = ' . $_SESSION[self::PROP_KEY_BUILDER_JSON] . ';';
		echo '</script>';
		$_SESSION[self::PROP_KEY_BUILDER_JSON] = '';

		wp_localize_script('weluka-builder', 'welukaBuilderWp',
            array(
				'post_id'	=> Weluka::get_instance()->get_post_id(),
				'post_type'	=> $postType,
                'ajax_url'	=> Weluka::$settings['ajax_url'],
				'admin_url'	=> Weluka::$settings['admin_url'],
				'plugin_url' => Weluka::$settings['plugin_url'],
				'flg_weluka_theme' => Weluka::get_instance()->check_weluka_theme(),
                'nonces'	=> array(
					'weluka_add_widgetdata'	=> wp_create_nonce('wp_ajax_weluka_add_widgetdata'),
					'weluka_move_data'		=> wp_create_nonce('wp_ajax_weluka_move_data'),
					'weluka_get_html'		=> wp_create_nonce('wp_ajax_weluka_get_html'),
					'weluka_partial'		=> wp_create_nonce('wp_ajax_weluka_partial'),
					'weluka_layout_select'	=> wp_create_nonce('wp_ajax_weluka_layout_select')	//v1.0.3 add
                ),
				'widget_types'	=> array(
					'TEXT'		=> self::WIDGET_TEXT,
					'TITLE'		=> self::WIDGET_TITLE,
					'IMG'		=> self::WIDGET_IMG,
					'ICON'		=> self::WIDGET_ICON,
					'SLIDE'		=> self::WIDGET_SLIDE,
					'GALLERY'	=> self::WIDGET_GALLERY,
					'BUTTON'	=> self::WIDGET_BUTTON,
					'MOVIE'		=> self::WIDGET_MOVIE,
					'AUDIO'		=> self::WIDGET_AUDIO,
					'BLANK'		=> self::WIDGET_BLANK,
					'APPLIST'	=> self::WIDGET_APP_LIST,
					'APPALERT'	=> self::WIDGET_APP_ALERT,
					'APPEMBED'	=> self::WIDGET_APP_EMBED,
					'GMAP'		=> self::WIDGET_GMAP,
					'SNS_BUTTON'	=> self::WIDGET_SNS_BUTTON,
					'SNS_SHARE'		=> self::WIDGET_SNS_SHARE,
					'APPACCORDION'	=> self::WIDGET_APP_ACCORDION,
					'APPTABS'		=> self::WIDGET_APP_TABS,
					'WPMENU'		=> self::WIDGET_WP_MENU,
					'WPARCHIVES'	=> self::WIDGET_WP_ARCHIVES,
					'WPCALENDAR'	=> self::WIDGET_WP_CALENDAR,
					'WPCATEGORIES'	=> self::WIDGET_WP_CATEGORIES,
					'WPMETA'	=> self::WIDGET_WP_META,
					'WPPAGES'	=> self::WIDGET_WP_PAGES,
					'WPCOMMENTS'	=> self::WIDGET_WP_COMMENTS,
					'WPPOSTS'	=> self::WIDGET_WP_POSTS,
					'WPRSS'		=> self::WIDGET_WP_RSS,
					'WPSEARCH'		=> self::WIDGET_WP_SEARCH,
					'WPTAGCLOUD'	=> self::WIDGET_WP_TAGCLOUD,
					'APPLISTCD'		=> self::APPLIST_CUSTOM_DESIGN,
					'APPLISTRL'		=> self::APPLIST_REG_LIST,
					'WPMENUCD'		=> self::WPMENU_CUSTOM_DESIGN,
					'WPPOSTSCD'		=> self::WPPOSTS_CUSTOM_DESIGN,
					'PAGESETTING'	=> self::WIDGET_PAGE_SETTING,
					'APPHORLINE'	=> self::WIDGET_APP_HORLINE,
					'CPT_HD'		=> Weluka::$settings['cpt_hd'],
					'CPT_FT'		=> Weluka::$settings['cpt_ft'],
					'CPT_SD'		=> Weluka::$settings['cpt_sd']
				),
				'default_items'	=> array(
					'SAMPLE_IMG'	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
					'MOVIE'		=> self::DEFAULT_MOVIE_URL,
				),
				'link_action'	=> array(
					'gotolink'	=> self::LINK_ACTION_GOTOLINK,
				),
				'text_shadow_styles'	=> $this->text_shadow_styles,
				'msgs'		=> array(
					'move'		=> __('Move', Weluka::$settings['plugin_name']),
					'setting'	=> __('Setting', Weluka::$settings['plugin_name']),
					'duplicate'	=> __('Duplicate', Weluka::$settings['plugin_name']),
					'remove'	=> __('Remove', Weluka::$settings['plugin_name']),
					'title'		=> __('Title', Weluka::$settings['plugin_name']),
					'description'		=> __('Description', Weluka::$settings['plugin_name']),
					'link'		=> __('Link', Weluka::$settings['plugin_name']),
					'url'		=> __('Url', Weluka::$settings['plugin_name']),
					'linknewwindow'		=> __('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']),
					'selectlink'		=> __('Select Link', Weluka::$settings['plugin_name']),
					'none'		=> __('None', Weluka::$settings['plugin_name']),
					'enable_description'	=> __('Enable Description.', Weluka::$settings['plugin_name']),
					'remove_confirm_msg'	=> __('Are you really sure you want to delete?', Weluka::$settings['plugin_name']),
					'img_frame_title'		=> __('Select Media', Weluka::$settings['plugin_name']),
					'img_frame_Button'		=> __('Select', Weluka::$settings['plugin_name']),
					'select_image'			=> __('Select Image', Weluka::$settings['plugin_name']),
					'select_movie'			=> __('Select Movie', Weluka::$settings['plugin_name']),
					'auto_play'				=> __('auto play', Weluka::$settings['plugin_name']),
					'repeat_play'			=> __('Repeat to play', Weluka::$settings['plugin_name']),
					'auto_repeat_play_help'	=> __('Auto play and Repeat play setting is only one file in one page.', Weluka::$settings['plugin_name']),
					'registory_panel_not'	=> __('Registration panel is not.', Weluka::$settings['plugin_name']),
					'registory_list_not'	=> __('Registration list is not.', Weluka::$settings['plugin_name']),
					'invalid_image'			=> __('Please enter image.', Weluka::$settings['plugin_name']),
					'invalid_icon'			=> __('Please enter icon.', Weluka::$settings['plugin_name']),
					'invalid_url'			=> __('Please enter your url.', Weluka::$settings['plugin_name']),
					'invalid_address'		=> __('Please enter your address.', Weluka::$settings['plugin_name']),
					'invalid_slideimage'	=> __('Please enter slide image.', Weluka::$settings['plugin_name']),
					'invalid_sns_button'	=> __('Please select the SNS.', Weluka::$settings['plugin_name']),
					'invalid_sns_url'		=> __('Please enter sns url ({{%s}}).', Weluka::$settings['plugin_name']),
					'max_column_over'		=> __('Number of columns exceeds the maximum value.', Weluka::$settings['plugin_name']),
					'invalid_embedcode'		=> __('Please enter embed code.', Weluka::$settings['plugin_name']),
					'invalid_movie'			=> __('Please enter movie file or url.', Weluka::$settings['plugin_name']),
					'invalid_audio'			=> __('Please enter audio file.', Weluka::$settings['plugin_name']),
					'invalid_title'			=> __('Please enter title.', Weluka::$settings['plugin_name']),
					'invalid_content'		=> __('Please enter content.', Weluka::$settings['plugin_name']),
					'invalid_panel'			=> __('Please enter panel.', Weluka::$settings['plugin_name']),
					'invalid_list'			=> __('Please enter list.', Weluka::$settings['plugin_name']),
					'invalid_menu'			=> __('Please enter menu.', Weluka::$settings['plugin_name']),
					'invalid_edit_data'		=> __('Please select the edit data.', Weluka::$settings['plugin_name']),
					'invalid_description'	=> __('Please enter description.', Weluka::$settings['plugin_name']),
					'invalid_list_item'		=> __('Please check the list display item.', Weluka::$settings['plugin_name']),
					'invalid_custom_design_name'		=> __('Please enter custom design name.', Weluka::$settings['plugin_name']),
					'invalid_custom_design_name2'		=> __('Please select custom design.', Weluka::$settings['plugin_name']),
					'invalid_list_name'		=> __('Please enter list name.', Weluka::$settings['plugin_name']),
					'invalid_list_name2'	=> __('Please select list name.', Weluka::$settings['plugin_name']),
					'slideshow_speed_number_error'		=> __('Please enter the number slideshow speed is.', Weluka::$settings['plugin_name']),
					'animation_speed_number_error'		=> __('Please enter the number animation speed is.', Weluka::$settings['plugin_name']),
					'reg_completed'			=> __('Registered completed.', Weluka::$settings['plugin_name']),
					'reg_confirm_msg'		=> __('Are you really sure you want to {{%s}} registory?.', Weluka::$settings['plugin_name']),
					'remove_confirm_msg2'	=> __('Are you really sure you want to {{%s}} delete?', Weluka::$settings['plugin_name']),
					'contentmodel_warning'	=> __('Please add the content.', Weluka::$settings['plugin_name']),
					'invalid_layout_select'	=> __('Please select sample.', Weluka::$settings['plugin_name']),	//v1.0.3 add
				)
            )
        );
   	}
 
 	/**
	 * save_post hook
	 * builder data save after post_content modify
	 * @since 1.0
	 */
 	public function render_save_post($postId, $postData) {
		$weluka = Weluka::get_instance();
		$editon = isset($_REQUEST['weluka-builder-editon']) ? $_REQUEST['weluka-builder-editon'] : false;

		//ver1.0.1 add
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
			return $postId;
		}
		if( !current_user_can('edit_post', $postId)) {
			return $postId;
		}

		if ( ! wp_is_post_revision( $postId ) && !empty($_POST) ) {

			remove_action( 'save_post', array($this, 'render_save_post'), 10, 2);
			if( $weluka->is_edit_builder($postData) && $editon ) {
				$post_content = '[weluka-builder-content]';
				$newPost = array(
					'ID'			=> $postId,
					'post_content'	=> $post_content
				);
				$weluka->save_post($newPost);
			}
			add_action( 'save_post', array($this, 'render_save_post'), 10, 2);

			$layoutSel = isset($_REQUEST['weluka-builder-layout-select']) ? $_REQUEST['weluka-builder-layout-select'] : false;
			if( $layoutSel ) {
        			$url = admin_url().'post.php?post=' . $postId . '&action=edit&weluka_redirect=1';
        			wp_redirect( $url );
        			exit;
			}
		}
	}

	/** 
	 * google map url input embed handler
	 * @since 1.0
	 */
	public function gmap_embed_handler( $matches, $attr, $url, $rawattr ) {
		return sprintf( '[%s url="%s"]', $this->gmap_shortcode_tag, esc_url( $matchs[0] ) );
	}

/*------------------------------------------------------------------------------
 [ Builder Shortcode 関連 ] 
------------------------------------------------------------------------------*/
	
	/**
	 * weluka-default-content shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_default_content( $atts, $content = null ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'post_id' => '',
			),
			$atts)
		);
		if($post_id === '') {
			$post_id = $weluka->get_post_id();
		}
		$postData = $weluka->get_post($post_id);
		$saveData = array('content' => $content, 'pagesetting' => '');

		$weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_PUBLISH, $saveData);
		$_content = $this->get_content('default', $content, $postData );
		return $_content;
	}

	/**
	 * weluka-builder-content2 shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_builder_content2( $atts ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'post_id' => '',
			),
			$atts)
		);
		if($post_id === '') {
			$post_id = $weluka->get_post_id();
		}
		$postData = $weluka->get_post($post_id);
		$_content = $this->get_content('builder', "", $postData );
		return $_content;
	}

	/**
	 * weluka-builder-content shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_builder_content($atts) {
		$_content = $this->get_content('builder');
		return $_content;
	}

	/**
	 * weluka-map shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_gmap( $atts ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'addr'		=> '',
				'url'		=> '',
				'w'			=> '100%',
				'h'			=> '300',
				'z'			=> 16,
				'lat'		=> '',
				'lng'		=> '',
				'info'		=> '',
				'staticw'	=> '',
				'stylejson'	=> '',
				'draggable' => 1
			), $atts )
		);

		if(isset($w) && $w !== '' && mb_substr($w, -1) !== '%') { $w .= 'px'; }
		if(isset($h) && $h !== '' && mb_substr($h, -1) !== '%') { $h .= 'px'; }
		$gmapStyleScript = "";
		$gmapStyleId = "";
		if(isset($stylejson) && $stylejson !== '') {
			$stylejson = str_replace(array("$", "~", "%"), array("[", "]", '"'), $stylejson);
			$gmapStyleId = 'gmapstyle' . Weluka::get_instance()->create_node_id();
			$gmapStyleScript = '<div class="weluka-hide"><script type="text/javascript">var ' . $gmapStyleId . ' = ' . $stylejson . ';</script></div>';
		}
		
		if( isset($url) && $url !== '' ) {
			return sprintf(
				'<iframe width="%s" height="%s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="%s"></iframe>', $w, $h, esc_url( $p['url'].'&output=embed' )
			);
		}
		
		$ret = sprintf(
			'<div class="weluka-gmap-content" data-addr="%s" data-lat="%s" data-lng="%s" data-zoom="%s" data-info="%s" data-staticw="%s" data-styleid="%s" data-dg="%s" style="width:%s;height:%s;"></div>%s',
			$addr, $lat, $lng, $z, $info, $staticw, $gmapStyleId, $draggable, $w, $h, $gmapStyleScript
		);
		
		return $ret;
	}

	/**
	 * weluka-wpposts shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpposts( $atts ) {
		global $post;
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'height'		=> '',
				'categories'	=> '',
				'limit'			=> 5,
				'flgtitle'		=> 1,
				'flgdate'		=> 0,
				'flgauthor'		=> 0,
				'flgcategory'	=> 0,
				'flgexcerpt'	=> 0,
				'flgthumbnail'	=> 0,
				'flgcomment'	=> 0,
				'layoutclass'	=> 'medialeft',
				'mediacol'		=> 4,
				'rowspacing'	=> '',
				'rowcolumn'		=> 1,
				'rowoddcolor'	=> '',
				'rowevencolor'	=> '',
				'excerptstringnum'	=> 110,
				'mediaalign'	=> '',
				'mediabordercolor'	=> '',
				'mediaborderstyle'	=> '',
				'mediabordersize'	=> '',
				'mediashape'	=> '',
				'titletag'		=> 'h4',
				'titlealign'	=> '',
				'titlefont'		=> '',
				'titlefontsize' => '',
				'titlecolor'	=> '',
				'titleweight'	=> '',
				'titleunderline'	=> '',
				'titleitalic'	=> '',
				'metaalign'		=> '',
				'datefont'		=> '',
				'datefontsize'	=> '',
				'datecolor'		=> '',
				'dateweight'	=> '',
				'dateunderline'	=> '',
				'dateitalic'	=> '',
				'dateformat'	=> '',
				'authorfont'	=> '',
				'authorfontsize'	=> '',
				'authorcolor'	=> '',
				'authorweight'	=> '',
				'authorunderline'	=> '',
				'authoritalic'	=> '',
				'categoryfont'	=> '',
				'categoryfontsize'	=> '',
				'categorycolor'	=> '',
				'categoryweight'	=> '',
				'categoryunderline'	=> '',
				'categoryitalic'	=> '',
				'contentalign'	=> '',
				'contentfont'	=> '',
				'contentfontsize'	=> '',
				'contentcolor'	=> '',
				'morebuttontext'	=> '',
				'morebuttonclassname'	=> '',
				'morebuttonbuttoncolor' => '',
				'morebuttonshape'	=> '',
				'morebuttonsize'	=> '',
				'morebuttonblock'	=> '',
				'allurl'			=> '',
				'alllinkstr'		=> '',
				'allbuttonclassname'	=> '',
				'allbuttonbuttoncolor'	=> '',
				'allbuttonshape'	=> '',
				'allbuttonsize'		=> '',
				'allbuttonblock'	=> '',
				'flgtagcloud'		=> 0,
				'tagcloudpos'		=> ''
			), $atts )
		);

		$dispItem['flgTitle']	= $flgtitle;
		$dispItem['flgDate']	= $flgdate;
		$dispItem['flgAuthor']	= $flgauthor;
		$dispItem['flgCategory'] = $flgcategory;
		$dispItem['flgExcerpt'] = $flgexcerpt;
		$dispItem['flgThumbnail'] = $flgthumbnail;
		$dispItem['flgComment']	= $flgcomment;
		$dispItem['flgTagcloud']	= $flgtagcloud;
		$dispItem['tagcloudPos']	= $tagcloudpos;
		$dispItem['layoutClass']	= $layoutclass;
		$dispItem['mediaCol']	= $mediacol;
		$dispItem['contentCol']	= (int)self::MAX_COLUMN - (int)$dispItem['mediaCol'];
		$dispItem['excerptStringNum'] 	= $excerptstringnum;
		$ngmClass			= ($rowoddcolor !== '' || $rowevencolor !== '') ? ' weluka-row-negative-margin-clear' : '';
		$rowBgClass			= ($rowoddcolor !== '' || $rowevencolor !== '') ? ' weluka-list-row-bgcolor' : '';

		//media design
		$dispItem['mediaAlign']			= $mediaalign;
		$dispItem['mediaBorderColor']	= $mediabordercolor;
		$dispItem['mediaBorderStyle']	= $mediaborderstyle;
		$dispItem['mediaBorderSize']	= $mediabordersize;
		$dispItem['mediaShape']			= $mediashape;

		//post title design
		$dispItem['titleTag']		= $titletag;
		$dispItem['titleAlign']		= $titlealign;
		$dispItem['titleFont']		= $titlefont;
		$dispItem['titleFontSize']	= $titlefontsize;
		$dispItem['titleColor']		= $titlecolor;
		$dispItem['titleWeight']	= $titleweight;
		$dispItem['titleUnderline']	= $titleunderline;
		$dispItem['titleItalic']	= $titleitalic;

		//meta common design
		$dispItem['metaAlign']		= $metaalign;
		
		$dispItem['dateFont']		= $datefont;
		$dispItem['dateFontSize']	= $datefontsize;
		$dispItem['dateColor']		= $datecolor;
		$dispItem['dateWeight']		= $dateweight;
		$dispItem['dateUnderline']	= $dateunderline;
		$dispItem['dateItalic']		= $dateitalic;
		$dispItem['dateFormat'] 	= $dateformat;

		//author design
		$dispItem['authorFont']			= $authorfont;
		$dispItem['authorFontSize']		= $authorfontsize;
		$dispItem['authorColor']		= $authorcolor;
		$dispItem['authorWeight']		= $authorweight;
		$dispItem['authorUnderline']	= $authorunderline;
		$dispItem['authorItalic']		= $authoritalic;

		//category design
		$dispItem['categoryFont']		= $categoryfont;
		$dispItem['categoryFontSize']	= $categoryfontsize;
		$dispItem['categoryColor']		= $categorycolor;
		$dispItem['categoryWeight']		= $categoryweight;
		$dispItem['categoryUnderline']	= $categoryunderline;
		$dispItem['categoryItalic']		= $categoryitalic;

		//content(excerpt design
		$dispItem['contentAlign']		= $contentalign;
		$dispItem['contentFont']		= $contentfont;
		$dispItem['contentFontSize']	= $contentfontsize;
		$dispItem['contentColor']		= $contentcolor;

		//more button design
		$dispItem['moreButton']['text']			= $morebuttontext;
		$dispItem['moreButton']['class_name']	= $morebuttonclassname;
		$dispItem['moreButton']['button_color']	= $morebuttonbuttoncolor;
		$dispItem['moreButton']['shape']		= $morebuttonshape;
		$dispItem['moreButton']['size']			= $morebuttonsize;
		$dispItem['moreButton']['block']		= $morebuttonblock;

		$flg = false;

		$_height = $height !== "" ? ' style="height:' . $height . 'px;overflow-y:auto;overflow-x:hidden;"' : '';
        $ct = '<div' . $_height . '>';

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

		$tmp_post = $post;
		$cat = '';

		$selfPostId = "";
		if( !empty($_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID]) ) {
			$selfPostId = $_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID];
		} elseif( !empty( $post ) ) {
			$selfPostId = $post->ID;
		}
		
		$exclude = $selfPostId !== '' ? '&exclude=' . $selfPostId : '';
		if($categories != ''){ $cat = '&category=' . $categories; }
		if( empty( $limit ) ) { $limit = 5; }
		$posts = get_posts('post_type=post&numberposts=' . $limit . $cat . $exclude . '&orderby=date&order=DESC&post_status=publish&posts_per_page=' . $limit);

		if(count($posts) > 0) :
			$flg = true;
			$_ct = $list = "";

			$colNum			= (int)self::MAX_COLUMN / (int)$rowcolumn;
			$rowCnt = 0;
			$colCnt = 0;
			foreach($posts as $post) :
				setup_postdata($post);

				if(has_filter('weluka_recentposts_content') == false) :
					$_ct = $this->recentpost_content( $post, $dispItem );
				else :
					$_ct = apply_filters('weluka_recentposts_content', $post, $dispItem);
				endif;
	
				$_spacing = "";
				if($rowCnt !== 0 && $rowspacing !== '') { $_spacing = $rowspacing; }
				$topNoMargin = (int)$rowCnt === 0 ? ' top-nomargin' : '';

				if( ($rowCnt + 1) % 2 == 0 ) {
					$rowBgColor = $rowevencolor;
				} else {
					$rowBgColor = $rowoddcolor;
				}

 				if($dispItem['layoutClass'] === 'mediatop') {
					$colCnt++;
					if((int)$colCnt === 1) {
						$ct .= '<div class="weluka-list-row weluka-row clearfix mediatop' . $topNoMargin . $ngmClass . '" style="' . $_spacing . '">';
					}
					$ct .= '<div class="weluka-col weluka-col-md-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">' . $_ct . '</div></div>';
					
					if((int)$colCnt === (int)$rowcolumn) {
						$ct .= '</div>';	//row end div
						$colCnt = 0;
					}
				}elseif($dispItem['layoutClass'] === 'mediamiddle'){
					$colCnt++;
					if((int)$colCnt === 1) {
						$ct .= '<div class="weluka-list-row weluka-row clearfix mediamiddle' . $topNoMargin . $ngmClass . '" style="' . $_spacing . '">';
					}
					$ct .= '<div class="weluka-col weluka-col-md-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">' . $_ct . '</div></div>';
					
					if((int)$colCnt === (int)$rowcolumn) {
						$ct .= '</div>';	//row end div
						$colCnt = 0;
					}
				}elseif($dispItem['layoutClass'] === 'mediabottom'){
					$colCnt++;
					if((int)$colCnt === 1) {
						$ct .= '<div class="weluka-list-row weluka-row clearfix mediabottom' . $topNoMargin . $ngmClass . '" style="' . $_spacing . '">';
					}
					
					$ct .= '<div class="weluka-col weluka-col-md-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">' . $_ct . '</div></div>';
					
					if((int)$colCnt === (int)$rowcolumn) {
						$ct .= '</div>';	//row end div
						$colCnt = 0;
					}
				}elseif($dispItem['layoutClass'] === 'mediaright') {
					$ct .= '<div class="weluka-list-row weluka-row clearfix mediaright' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $_spacing . $rowBgColor . '">' . $_ct . '</div>';
				}else{
					$ct .= '<div class="weluka-list-row weluka-row clearfix medialeft' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $_spacing . $rowBgColor . '">' . $_ct . '</div>';
				}	
				$rowCnt++;
			endforeach;

			if( $dispItem['layoutClass'] !== 'medialeft' && $dispItem['layoutClass'] !== 'mediaright' ) :
				if((int)$colCnt !== 0 && (int)$colCnt !== (int)$rowcolumn) { $ct .= '</div>'; }
			endif;

		else :
			$_ct = apply_filters('weluka_recentposts_content_none', __('No posts.', Weluka::$settings['plugin_name']));
			$ct .= '<div class="weluka-list-row weluka-row clearfix"><div class="weluka-col weluka-col-md-12">' . $_ct . '</div></div>';
		endif;

		wp_reset_postdata();
		$post = $tmp_post;
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		$ct .= '</div>';

		if($allurl && $flg == true) {
			$button = array();
			$button['link']['action']	= self::LINK_ACTION_GOTOLINK;
			$button['link']['href']		= $allurl;
			$button['link']['target']	= '';
			$button['text']				= $alllinkstr;
			$button['class_name']		= $allbuttonclassname;
			$button['button_color']		= $allbuttonbuttoncolor;
			$button['shape']			= $allbuttonshape;
			$button['size']				= $allbuttonsize;
			$button['block']			= $allbuttonblock;

			$allButtonHtml		= $this->widget_button_html($button, false);

			$ct .= '<div class="weluka-post-footer">' . $allButtonHtml . '</div>';
		}

		return $ct;
	}

	/**
	 * weluka-wpmenu wp_nav_menu shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpmenu( $atts ) {
		extract(shortcode_atts(
			array(
				'themelocation'  => '',
				'menu'            => '',
				'container'       => '',
				'containerclass' => '',
				'containerid'    => '',
				'menuclass'      => '',
				'menuid'         => '',
				'echo'            => false,
				'fallbackcb'     => '',
				'before'          => '',
				'after'           => '',
				'linkbefore'     => '',
				'linkafter'      => '',
				'itemswrap'      => '',
				'depth'           => 0,
				'walker'          => ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

		$ct	= wp_nav_menu( array(
			'menu'				=> $menu,
			'container'			=> $container,
			'container_id'		=> $containerid,
			'container_class'	=> $containerclass,
			'fallback_cb'		=> '',
			'menu_class'		=> $menuclass,
			'depth'				=> $depth,
			'echo'				=> $echo
		) );
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpmenu2 WP_Nav_Menu_Widget shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpmenu2( $atts ) {
		extract(shortcode_atts(
			array(
				'title'		=> '',
				'navmenu'	=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );
	    
		$type = 'WP_Nav_Menu_Widget';
		$instance = array(
			'title'		=> $title,
            'nav_menu'	=> $navmenu
		);			
		
		$beforeTitle = $afterTitle = "";
		if($title !== ''){
			$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle">';
			$afterTitle		= '</h3>';
		}
    	$args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpcalendar shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpcalendar( $atts ) {
		extract(shortcode_atts(
			array(
				'title'		=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );
	    
        $type = 'WP_Widget_Calendar';
		$instance = array( 'title' => $title );
			
		$beforeTitle = $afterTitle = "";
		if($title !== ''){
			$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle">';
			$afterTitle		= '</h3>';
		}
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wparchives shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wparchives( $atts ) {
		extract(shortcode_atts(
			array(
				'title'		=> '',
				'showtype'	=> 'monthly',
				'showcount'	=> false,
				'showformat'	=> 'html',
				'showlimit'	=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

		$ct = '<div class="widget widget_archive">';
		if($title !== ''){
			$ct	.= '<h3 class="widgettitle weluka-widgettitle">' . $title . '</h3>';
		}
		
		$before = $after = "";
		if($showformat === "html") {
			$before = '<ul>';
			$after = '</ul>';

		}elseif($showformat === "option") {
			$before = '<select name="archive-dropdown" onChange="document.location.href=this.options[this.selectedIndex].value;"><option value="">' . esc_attr(__('Select Month')) . '</option>';
			$after	= '</select>';

		}
		$ct .= $before;
		$ct .= wp_get_archives( apply_filters('weluka_get_archive_args', array(
						'type'				=> $showtype,
						'limit'				=> $showlimit,
						'format'			=> $showformat,
						'show_post_count'	=> $showcount,
						'echo'				=> false
			   )));
		$ct .= $after;
		$ct .= '</div>';
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpcategories shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpcategories( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'count'			=> false,
				'hierarchical'	=> false,
				'dropdown'		=> false
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Categories';
		$ct = $before = $after = "";
		$instance = array(
			'title'			=> $title,
            'count' 		=> $count,
            'hierarchical'	=> $hierarchical,
            'dropdown'		=> $dropdown
		);
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpmeta shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpmeta( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Meta';
		$instance = array( 'title' => $title );
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';

        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();		

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wppages shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wppages( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'sortby'		=> 'menu_order',
				'exclude'		=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );
 
        $type = 'WP_Widget_Pages';
		$ct = $before = $after = "";
		$instance = array(
			'title'			=> $title,
            'sortby' 		=> $sortby,
            'exclude'		=> $exclude
		);
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		if( empty( $ct ) ) {
			$ct = __('Page none.', Weluka::$settings['plugin_name'] );
		}
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpcomments shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpcomments( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'number'		=> 5
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Recent_Comments';
		$ct = $before = $after = "";
		$instance = array(
			'title'			=> $title,
            'number'		=> $number
		);

		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wprss shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wprss( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'url'			=> '',
				'items'			=> 5,
				'showsummary'	=> 0,
				'showauthor'	=> 0,
				'showdate'		=> 0
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_RSS';
		$ct = "";
		$instance = array(
			'title'			=> $title,
            'url'			=> $url,
			'items'			=> $items,
			'show_summary'	=> $showsummary,
			'show_author'	=> $showauthor,
			'show_date'		=> $showdate
		);

		$beforeTitle = $afterTitle = "";		
		$none = $title === "" ? " weluka-hide" : "";
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle,
		);

		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		if( empty( $ct ) ) {
			$ct = __( '<span class="rssnone">Feed none.</span>', Weluka::$settings['plugin_name'] );
		}

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpsearch shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpsearch( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Search';
		$instance = array( 'title' => $title );
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';

        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wptagcloud shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wptagcloud( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'taxonomy'		=> 'post_tag'
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Tag_Cloud';
		$instance = array(
			'title'		=> $title,
			'taxonomy'	=> $taxonomy
		);
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';

        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		if( empty( $ct ) ) {
			$ct = __( '<span class="tagnone">Tagcloud none.</span>', Weluka::$settings['plugin_name'] );
		}

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

/*------------------------------------------------------------------------------
 [ Builder Ajax 関連 ] 
------------------------------------------------------------------------------*/

	/**
	 * wp_ajax_weluka_get_site_content hook
	 * #weluka-builder-button click ajax event
	 * @since 1.0
	 */
	public function weluka_get_site_content() {
		$weluka = Weluka::get_instance();
		if( !$weluka->check_nonce() ){
			wp_send_json(array('msg' => 'nonce error!'));
			exit;
		}
		$post_id	= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : "";
		$new_flg	= isset($_REQUEST['newFlg']) ? $_REQUEST['newFlg'] : "";
		
		if($new_flg == 'new'){
			$weluka->dummy_insert_post($post_id);
		}

		$_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID]		= $post_id;  //set current builder target postid to global variable
		
		$ret["editUrl"] = $weluka->get_edit_url($post_id);
    	wp_send_json($ret);
    	exit;
	}

	/**
	 * wp_ajax_weluka_save_content hook
	 * save  click ajax event
	 * @since 1.0
	 */
	public function weluka_save_content() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$post_id	= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : '';
		$mode		= isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'save';
		$_json	= isset($_REQUEST['saveData']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['saveData'])), "UTF-8", "auto") : ""; //json string
		
		$save_data = $_json !== "" ? $weluka->unslash( json_decode(stripslashes($_json), true) ) : "";

		if( !empty( $save_data['pagesetting'] ) ){
			$save_data['pagesetting']['seo_title']			= isset($save_data['pagesetting']['seo_title']) ? strip_tags( $save_data['pagesetting']['seo_title'] ) : "";
			$save_data['pagesetting']['seo_keywords']		= isset($save_data['pagesetting']['seo_keywords']) ? strip_tags( $save_data['pagesetting']['seo_keywords'] ) : "";
			$save_data['pagesetting']['seo_description']	= isset($save_data['pagesetting']['seo_description']) ? strip_tags( $save_data['pagesetting']['seo_description'] ) : "";
		}

		//postmeta weluka-builder-draft save
		$result = $weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_DRAFT, $save_data);

		if($mode === 'preview') {
			$_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] = $post_id;  //set current builder target postid to global variable
		}

		if($mode === 'publish') {
			list($result, $content) = $this->publish_builder_data($post_id);
		}

    	wp_send_json($ret);
    	exit;
	}

	/**
	 * wp_ajax_weluka_add_widgetdata hook
	 * builder add widget event
	 * @since 1.0
	 */
	public function weluka_add_widgetdata() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$widget_type	= isset($_REQUEST['widgetType']) ? $_REQUEST['widgetType'] : self::WIDGET_TEXT; //default WIDGET_TEXT
		$add_block		= isset($_REQUEST['addBlock']) ? $_REQUEST['addBlock'] : "widget"; //default widget
		$model			= isset($_REQUEST['data']) ? $_REQUEST['data'] : "";
		$pos			= isset($_REQUEST['position']) ? $_REQUEST['position'] : "s-col-left-out";
		$_post_id		= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : "";
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, true); //builder mode on
		$this->set_property("currentPostId", $_post_id); //current edit post id

		if($add_block === 'section') {
			$arr = $this->create_section_array2($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_section($arr, false);
		}elseif($add_block === 'row') {
			$arr = $this->create_row_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false);
		}elseif($add_block === 'col') {
			//colum
			$arr = $this->create_colum_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false);
		}elseif($add_block === 'widget_col') {
			$arr[0] = $this->widget_to_subrow_array($widget_type, $model, $pos);
			$ret['jsonData'] = $arr[0];
			$ret['html'] = $this->render_items($arr, false);
		}elseif($add_block === 's_col') {
			$arr = $this->create_subcolum_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false, true);
		}elseif($add_block === 's_row') {
			$arr = $this->create_subrow_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false, true);
		}elseif($add_block === 'new'){
			$ret['html'] = $this->render_new_blank(false);
		}elseif($add_block === 's_widget') {
			$arr = $this->create_item_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_item($arr, false, true);
		}else{
			//widget
			$arr[0] = $this->create_item_array($widget_type);
			$ret['jsonData'] = $arr[0];
			$ret['html'] = $this->render_items($arr, false);
		}
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false); //builder mode off
		$this->set_property("currentPostId", ""); //current edit post id clear
		wp_send_json($ret);
		exit;
	}

	/**
	 * wp_ajax_weluka_move_data hook
	 * builder move section row col widget event
	 * @since 1.0
	 */
	public function weluka_move_data() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$move_type	= isset($_REQUEST['moveType']) ? $_REQUEST['moveType'] : "widget"; //default widget
		$add_block	= isset($_REQUEST['addBlock']) ? $_REQUEST['addBlock'] : "widget"; //default widget
		$pos	= isset($_REQUEST['position']) ? $_REQUEST['position'] : "s-col-left-out";

		$_moveJson	= isset($_REQUEST['moveModel']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['moveModel'])), "UTF-8", "auto") : ""; //json string
		$move_model = $_moveJson !== "" ? $weluka->unslash( json_decode(stripslashes($_moveJson), true) ) : null;

		$_widgetJson	= isset($_REQUEST['data']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['data'])), "UTF-8", "auto") : ""; //json string
		$widget_model	= $_widgetJson !== "" ? $weluka->unslash( json_decode(stripslashes($_widgetJson), true) ) : null;

		$this->set_property(self::PROP_KEY_BUILDER_MODE, true); //builder mode on
		if($add_block === 'section') {
			$arr = $this->create_section_array2("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_section($arr, false);
		}elseif($add_block === 'row') {
			$arr = $this->create_row_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false);
		}elseif($add_block === 'col') {
			$arr = $this->create_colum_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false);
		}elseif($add_block === 'widget_col') {
			$arr[0] = $this->widget_to_subrow_array("", $widget_model, $pos, $move_model, $move_type);
			$ret['jsonData'] = $arr[0];
			$ret['html'] = $this->render_items($arr, false);
		}elseif($add_block === 's_col') {
			$arr = $this->create_subcolum_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false, true);
		}elseif($add_block === 's_row') {
			$arr = $this->create_subrow_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false, true);
		}elseif($add_block === 's_widget') {
			$move_model['id'] = $weluka->create_node_id();
			$ret['jsonData'] = $move_model;
			$ret['html'] = $this->render_item($move_model, false, true);
		}elseif($add_block === 'widget'){
			$arr = $this->create_widget_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			
			if(!isset($arr[0]["id"])) {
				$_arr[0] = $arr;
			}else{
				$_arr = $arr;
			}
			$ret['html'] = $this->render_items($_arr, false);
		}
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false); //builder mode off

		if( isset($ret['jsonData']) ) {  $ret['jsonData'] = $weluka->unslash( $ret['jsonData'] ); } //escape unset

		wp_send_json($ret);
		exit;
	}
	
	/**
	 * wp_ajax_weluka_get_html hook
	 * builder model to html
	 * @since 1.0
	 */
	public function weluka_get_html() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$block	= isset($_REQUEST['block']) ? $_REQUEST['block'] : "widget"; //default widget
		$type	= isset($_REQUEST['type']) ? $_REQUEST['type'] : self::WIDGET_IMG; //default widget img

		$_json	= isset($_REQUEST['model']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['model'])), "UTF-8", "auto") : ""; //json string

		if($_json === "") {
			$ret['msg'] = __('model none!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;			
		}

		$model = $weluka->unslash( json_decode(stripslashes($_json), true) );
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, true); //builder mode on
		if($block === 'col') {
			$ret['html'] = $this->render_colum($model, false);
		}
		if($block === 'row') {
			$ret['html'] = $this->render_row($model, false);
		}
		if($block === 'section') {
			$ret['html'] = $this->render_section($model, false);
		}
		elseif($block === 'widget') {
			$arr[0] = $model;
			$ret['html'] = $this->render_items($arr, false);
		}
		elseif($block === 's_widget') {
			$arr[0] = $model;
			$ret['html'] = $this->render_items($arr, false, true);
		}
		if($block === 's_col') {
			$ret['html'] = $this->render_colum($model, false, true);
		}
		if($block === 's_row') {
			$ret['html'] = $this->render_row($model, false, true);
		}
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false); //builder mode off
		wp_send_json($ret);
		exit;
	}

	/**
	 * wp_ajax_weluka_partial hook
	 * builder model to html
	 * @since 1.0
	 */
	public function weluka_partial() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$mode	= isset($_REQUEST['mode']) ? $_REQUEST['mode'] : "get"; //get or save or remove default get
		$type	= isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
		$name	= isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

		$_json	= isset($_REQUEST['model']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['model'])), "UTF-8", "auto") : ""; //json string
		$model 	= $_json !== "" ? $weluka->unslash( json_decode(stripslashes($_json), true) ) : null;

		if($model === null) {
			$ret['msg'] = __('model none!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;			
		}
		
		if($type === self::APPLIST_CUSTOM_DESIGN) {
			$optionName = WelukaAdminSettings::APPLIST_CUSTOM_DESIGN_OPTION_NAME;
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_custom_design($optionName, $name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_custom_design($optionName, $name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_custom_design($optionName, $name);
			}
		} elseif ($type === self::APPLIST_REG_LIST) {
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_applist_reglist($name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_applist_reglist($name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_applist_reglist($name);
			}
		} elseif ($type === self::WPMENU_CUSTOM_DESIGN) {
			$optionName = WelukaAdminSettings::WPMENU_CUSTOM_DESIGN_OPTION_NAME;
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_custom_design($optionName, $name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_custom_design($optionName, $name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_custom_design($optionName, $name);
			}			
		} elseif ($type === self::WPPOSTS_CUSTOM_DESIGN) {
			$optionName = WelukaAdminSettings::WPPOSTS_CUSTOM_DESIGN_OPTION_NAME;
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_custom_design($optionName, $name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_custom_design($optionName, $name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_custom_design($optionName, $name);
			}
		}
		wp_send_json($ret);
		exit;
	}

	/**
	 * get layout select json data
	 * @since 1.0
	 */
	public function get_layout_select_data( $category, $layout, $jsonFile, $idCnt ) {
		$ret = "";
		$samplePath	= Weluka::$settings['plugin_dir'] . 'assets/sample/' . $category . '/';
		$jsonData = '';
		if( file_exists( $samplePath . $jsonFile ) ) {
			$jsonData = file_get_contents( $samplePath . $jsonFile );
		}
		if( $jsonData ) {
			$jsonData =  str_replace(array("\r\n", "\r", "\n", "\t"), '', $jsonData );
			
			//ID replace
			$reps = "";
			$repAfter = "";
			for( $i = 1 ; $i <= $idCnt; $i++ ) {
				$reps[$i - 1]		= "{%ID-$i%}";
				$repAfter[$i - 1]	= Weluka::get_instance()->create_node_id();				
			}
			$ret =  str_replace( $reps, $repAfter, $jsonData );

			$imgPath = Weluka::$settings['plugin_url'] . 'assets/sample/' . $category . '/' . $layout . '/';
			$ret =  str_replace( "{%IMG_PATH%}", $imgPath, $ret );
		}
		return $ret; 
	}
	
	/**
	 * wp_ajax_weluka_layout_select hook
	 * select layout db save
	 * @since 1.0
	 */
	public function weluka_layout_select() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '', 'model' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$_category	= isset($_REQUEST['category']) ? $_REQUEST['category'] : '';
		$_layout	= isset($_REQUEST['layout']) ? $_REQUEST['layout'] : '';
		$_jfile		= isset($_REQUEST['jsonf']) ? $_REQUEST['jsonf'] : '';
		$_idcnt		= isset($_REQUEST['idcnt']) ? $_REQUEST['idcnt'] : 0;
		$_postId	= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : '';

		$ret['model'] =  $this->get_layout_select_data( $_category, $_layout, $_jfile, $_idcnt );
		if( $ret['model'] == '' ) {
			$ret['msg'] = __('Failed to get the selected layout data.', Weluka::$settings['plugin_name']);
		}
		wp_send_json($ret);
		exit;
	}
	
/*------------------------------------------------------------------------------
 [ Builder Utility 関連 ] 
------------------------------------------------------------------------------*/
	/**
	 * get layout sample json data
	 * @since 1.0
	 */
	public function get_layout_sample_json( $arr=true ) {
		$jsonData = file_get_contents( Weluka::$settings['plugin_dir'] . 'assets/sample/sampledata.json' );
		if($jsonData && $arr ) {
        	$jsonData = json_decode($jsonData, true);
		}
		return $jsonData;
	}
	
	/**
	 * get builder data
	 * @since 1.0
	 */
	public function get_builder_data($postId, $keyName, $itemName = '', $mode = true) {
		$ret = Weluka::get_instance()->get_postmeta($postId, $keyName, $mode);
		if( $itemName !== '' ) {
			$ret = !empty( $ret[$itemName] ) ? $ret[$itemName] : '';
		}
		return $ret;
	}

	/**
	 * delete builder data
	 * @since 1.0
	 */
	public function delete_builder_data($postId, $keyName = "") {
		$weluka = Weluka::get_instance();
		if($keyName === "" || $keyName === self::CONTENT_POSTMETA_KEY_DRAFT) {
			$weluka->delete_postmeta($postId, self::CONTENT_POSTMETA_KEY_DRAFT);
		}
		
		if($keyName === "" || $keyName === self::CONTENT_POSTMETA_KEY_PUBLISH) {
			$weluka->delete_postmeta($postId, self::CONTENT_POSTMETA_KEY_PUBLISH);
		}
	}

    /**
     * json 不要文字削除
     * @since 1.0
     */
	public function replace_json($json) {
		return str_replace(array("\r\n", "\r", "\n", "\t"), '', $json);
    }

	/**
	 * setting modal common parts margin setting show
	 * @since 1.0
	 */
	public function weluka_display_margin_setting($key, $echo=true, $disp = 'all') {
		$prefix = 'weluka' . $key . 'SettingMargin';
		$prefix2 = 'weluka' . $key . 'SettingPadding';
		$ret = "";
		
		if($disp !== 'notmargin') {
			$ret .= '<h5>' . __('Margin (px)', Weluka::$settings['plugin_name']) . '</h5>';
			$ret .= '<div class="weluka-row clearfix">';

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Top', Weluka::$settings['plugin_name']) . '</label>';
       		$ret .= '<input id="' . $prefix . 'Top" name="' . $prefix . 'Top" type="text" class="form-control" />';
        	$ret .= '</div></div>';

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Bottom', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix . 'Bottom" name="' . $prefix . 'Bottom" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			if($disp !== 'notmglr') {

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Left', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix . 'Left" name="' . $prefix . 'Left" type="text" class="form-control" />';
    		$ret .= '</div></div>';

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Right', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix . 'Right" name="' . $prefix . 'Right" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			}
			
        	$ret .= '</div>';
		}
		
		if($disp !== 'notpadding') {
			$ret .= '<h5>' . __('Padding (px)', Weluka::$settings['plugin_name']) . '</h5>';
			$ret .= '<div class="weluka-row clearfix">';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Top', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Top" name="' . $prefix2 . 'Top" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Bottom', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Bottom" name="' . $prefix2 . 'Bottom" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Left', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Left" name="' . $prefix2 . 'Left" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Right', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Right" name="' . $prefix2 . 'Right" type="text" class="form-control" />';
        	$ret .= '</div></div>';

  			$ret .= '</div>';
		}
		if($echo){ echo $ret; } else { return $ret; }
	}

	/**
	 * setting modal common parts css selectore setting show
	 * @since 1.0
	 */
	public function weluka_display_css_setting($key, $echo=true) {
		$prefix = 'weluka' . $key . 'SettingCss';
		$ret = "";
		$ret = '<h5>' . __('Css Selectors', Weluka::$settings['plugin_name']) . '</h5>';
        $ret .= '<div class="form-group">';
		$ret .= '<div class="weluka-row clearfix">';
		$ret .= '<div class="weluka-col-md-4"><label>' . __('Class', Weluka::$settings['plugin_name']) . '</label></div>';
        $ret .= '<div class="weluka-col-md-8"><input id="' . $prefix . 'Class" name="' . $prefix . 'Class" type="text" class="form-control" /></div>';
        $ret .= '</div>';
        $ret .= '</div>';
		
		if($echo){ echo $ret; } else { return $ret; }
	}

	/**
	 * setting modal common parts style(bgcolor border animation) setting show
	 * @since 1.0
	 */
	public function weluka_display_style_setting($key, $disp = array('all'), $echo=true) {
		$ret = '<h5>' . __('Block Style', Weluka::$settings['plugin_name']) . '</h5>';
		$ret .= '<div class="weluka-row clearfix">';

		if(in_array("all", $disp) || in_array("bgcolor", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockBgColor';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			$ret .= '<label>' . __('Bg Color', Weluka::$settings['plugin_name']) . '</label>';
			$ret .= '<div id="'. $name . 'Wrap' . '">';
			$ret .= '</div>';
       		$ret .= '</div></div>';
		}
		
		if(in_array("all", $disp) || in_array("color", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockColor';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			$ret .= '<label>' . __('Text Color', Weluka::$settings['plugin_name']) . '</label>';
			$ret .= '<div id="'. $name . 'Wrap' . '">';
			$ret .= '</div>';
       		$ret .= '</div></div>';
		}

		if(in_array("all", $disp) || in_array("shape", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockShape';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			$ret .= '<label>' . __('Shape', Weluka::$settings['plugin_name']) . '</label>';
	        $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        	$ret .= '<option value="">' . __('Square', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="img-rounded">' . __('Round', Weluka::$settings['plugin_name']) . '</option>';
           	$ret .= '</select>';
       		$ret .= '</div></div>';
		}

		if(in_array("all", $disp) || in_array("border", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockBorderSize';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			$ret .= '<label>' . __('Border Size (px)', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input type="text" id="' . $name .'" name="' . $name . '" class="form-control" value="" />';
       		$ret .= '</div></div>';

			$name = 'weluka' . $key . 'SettingBlockBorderStyle';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			
			$ret .= $this->weluka_display_borderstyle_settings($name, 'Border Style', true, false);
       		$ret .= '</div></div>';

			$name = 'weluka' . $key . 'SettingBlockBorderColor';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			$ret .= '<label>' . __('Border Color', Weluka::$settings['plugin_name']) . '</label>';
			$ret .= '<div id="'. $name . 'Wrap' . '">';
			$ret .= '</div>';
       		$ret .= '</div></div>';
		}
		
		$ret .= '</div>';
		
		if($echo){ echo $ret; } else { return $ret; }
	}

	/**
	 * modal setting border style setting show
	 * @since 1.0
	 */
	public function weluka_display_borderstyle_settings($name, $label = 'Border Style', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
	    $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        $ret .= '<option value=""></option>';
        $ret .= '<option value="solid">' . __('solid', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="dotted">' . __('dotted', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="dashed">' . __('dashed', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="double">' . __('double', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="groove">' . __('groove', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="ridge">' . __('ridge', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="inset">' . __('inset', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="outset">' . __('outset', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';
		if($echo){ echo $ret; }else{ return $ret; }		
	}

	/**
	 * setting modal common parts font family setting show
	 * @since 1.0
	 */
	public function weluka_display_font_settings($name, $echo=true) {
		$ret = '<label>' . __('Font', Weluka::$settings['plugin_name']) . '</label>';
	    $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control" disabled="disabled">';
    	$ret .= '<option value="">' . __('None', Weluka::$settings['plugin_name']) . '</option>';
		
		//basic font
		$s = "font-family:'Lucida Grande','Lucida Sans Unicode','Hiragino Kaku Gothic Pro',Meiryo,'MS PGothic',Helvetica,Arial,Verdana,sans-serif;";
		$ret .= '<option value="">' . __('Gothic', Weluka::$settings['plugin_name']) . '</option>';

		$s = "font-family:HiraMinProN-W6,'MS PMincho',serif;";
		$ret .= '<option value="">' . __('Mincho', Weluka::$settings['plugin_name']) . '</option>';

		$s = "font-family:'andale mono',times;";
		$ret .= '<option value="">Andale Mono</option>';

		$s = "font-family:arial,helvetica,sans-serif;";
		$ret .= '<option value="">Arial</option>';

		$s = "font-family:'arial black','avant garde';";
		$ret .= '<option value="">Arial Black</option>';

		$s = "font-family:'book antiqua',palatino;";
		$ret .= '<option value="">Book Antiqua</option>';

		$s = "font-family:'comic sans ms',sans-serif;";
		$ret .= '<option value="">Comic Sans MS</option>';

		$s = "font-family:'courier new',courier;";
		$ret .= '<option value="">Courier New</option>';

		$s = "font-family:georgia,palatino;";
		$ret .= '<option value="">Georgia</option>';

		$s = "font-family:helvetica;";
		$ret .= '<option value="">Helvetica</option>';

		$s = "font-family:impact,chicago;";
		$ret .= '<option value="">Impact</option>';

		$s = "font-family:symbol;";
		$ret .= '<option value="">Symbol</option>';

		$s = "font-family:tahoma,arial,helvetica,sans-serif;";
		$ret .= '<option value="">Tahoma</option>';

		$s = "font-family:terminal,monaco;";
		$ret .= '<option value="">Terminal</option>';

		$s = "font-family:'times new roman',times;";
		$ret .= '<option value="">Times New Roman</option>';

		$s = "font-family:'trebuchet ms',geneva;";
		$ret .= '<option value="">Trebuchet MS</option>';

		$s = "font-family:verdana,geneva;";
		$ret .= '<option value="">Verdana</option>';

		$s = "font-family:webdings;";
		$ret .= '<option value="">Webdings</option>';

		$s = "font-family:wingdings,'zapf dingbats';";
		$ret .= '<option value="">Wingdings</option>';
		
		$ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}
	
	/**
	 * modal setting align setting show
	 * @since 1.0
	 */
	public function weluka_display_align_settings($name, $label = 'Alignment', $labelShow = true, $echo = true, $selval = '', $flgNone = false) {
		$ret = "";
		if($labelShow) {
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		if( $flgNone ) {
    		$ret .= '<option value=""></option>';
		}
		$sel = '';
		if($selval == 'weluka-text-left'){ $sel = ' selected="selected"'; }
    	$ret .= '<option value="weluka-text-left"' . $sel . '>' . __('Left', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'weluka-text-center'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-text-center"' . $sel . '>' . __('Center', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'weluka-text-right'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-text-right" ' . $sel . '>' . __('Right', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }		
	}

	/**
	 * modal setting img shape setting show
	 * @since 1.0
	 */
	public function weluka_display_imgshape_settings($name, $label = 'Shape', $labelShow = true, $echo = true, $selval = '', $flgNone = false) {
		$ret = "";
		if($labelShow) {
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		if( $flgNone ) {
    		$ret .= '<option value=""></option>';
		}
		$sel = '';
		if($selval == 'no-rounded'){ $sel = ' selected="selected"'; }
    	$ret .= '<option value="no-rounded" ' . $sel . '>' . __('Square', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'img-rounded'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="img-rounded" ' . $sel . '>' . __('Round', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'img-circle'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="img-circle" ' . $sel . '>' . __('Circle', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'img-thumbnail'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="img-thumbnail" ' . $sel . '>' . __('Thumbnail', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting button color setting show
	 * @since 1.0
	 */
	public function weluka_display_buttoncolor_settings($name, $label = 'Button Color', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
  		$ret .= '<option value="weluka-btn-default">' . __('White', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-grey">' . __('Grey', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-darkgrey">' . __('Dark Grey', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-black">' . __('Black', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-primary">' . __('Primary', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-success">' . __('Success', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-info">' . __('Info', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-warning">' . __('Warning', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-danger">' . __('Danger', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-btn-link">' . __('None', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }		
	}

	/**
	 * modal setting button size setting show
	 * @since 1.0
	 */
	public function weluka_display_buttonsize_settings($name, $label = 'Button Size', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        $ret .= '<option value="btn-xs">' . __('X Small', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="btn-sm">' . __('Small', Weluka::$settings['plugin_name']) . '</option>';
    	$ret .= '<option value="">' . __('Medium', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="btn-lg">' . __('Large', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting button shape setting show
	 * @since 1.0
	 */
	public function weluka_display_buttonshape_settings($name, $label = 'Shape', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
    	$ret .= '<option value="">' . __('Round', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="no-rounded">' . __('Square', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting wysiwig button setting show
	 * @since 1.0
	 */
	public function weluka_display_wysiwig_button_settings($wrapId, $label = 'Style', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			$ret = '<label>' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
        
		$ret .= '<div id="' . $wrapId . '" class="weluka-wysiwyg-wrapper">';
	    $ret .= '<span class="fa fa-bold weluka-wysiwyg-button" data-type="bold"></span>';
    	$ret .= '<span class="fa fa-underline weluka-wysiwyg-button" data-type="underline"></span>';
        $ret .= '<span class="fa fa-italic weluka-wysiwyg-button" data-type="italic"></span>';
        $ret .= '</div>';

		if($echo){ echo $ret; }else{ return $ret; }
	}
	
	/**
	 * modal setting wp menu style color theme select show
	 * @since 1.0
	 */
	public function weluka_display_menucolor_settings($name, $label = 'Color Theme', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
  		$ret .= '<option value="weluka-navbar-none"></option>';		
  		$ret .= '<option value="weluka-navbar-default">' . __('Default', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-white">' . __('White', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-darkgrey">' . __('Dark Grey', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-inverse">' . __('Inverse', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-darkblue">' . __('Primary', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-green">' . __('Success', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-aqua">' . __('Info', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-orange">' . __('Warning', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-magenta">' . __('Magenta', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-red">' . __('Danger', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting custom design box show
	 * @since 1.0
	 */
	public function weluka_display_csutomdesgin_settings($name, $echo = true) {
        $ret = '<div class="weluka-border-box" style="padding: 15px 15px 0 15px;">';
	    $ret .= '<div class="form-group">';
    	$ret .= '<label>' . __('Custom Designs', Weluka::$settings['plugin_name']) . '</label>';
    	$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control" disabled="disabled">';
        $ret .= '<option value=""></option>';
        $ret .= '</select>';
        $ret .= '</div>';
        $ret .= '<div class="form-group">';
        $ret .= '<label>' . __('Custom Design Name', Weluka::$settings['plugin_name']) . '</label>';
        $ret .= '<input id="' . $name . 'Name" name="' . $name . 'Name" type="text" value="" class="form-control" disabled="disabled" />';
        $ret .= '<button type="button" class="' . $name . 'RegBtn weluka-btn weluka-btn-org weluka-btn-warning btn-xs" disabled="disabled">' . __('Reg', Weluka::$settings['plugin_name']) . '</button>';
        $ret .= '&nbsp;<button type="button" class="' . $name . 'RemoveBtn weluka-btn weluka-btn-org weluka-btn-warning btn-xs" disabled="disabled">' . __('Remove', Weluka::$settings['plugin_name']) . '</button>';
	    $ret .= '</div>';
        $ret .= '</div>';
		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list layout select show
	 * @since 1.0
	 */
	public function weluka_display_listlayout_settings($name, $label = 'List Layout', $labelShow = true, $echo = true, $selectVal = null) {
		$ret = '';
		if($labelShow) {
			$ret = '<h5>' . __($label, Weluka::$settings['plugin_name']) . '</h5>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control" disabled="disabled">';
		$ret .= '<option value=""></option>';
        foreach($this->app_list_layouts as $_layout) :
			$ret .= '<option value="">' . $_layout['label'] . '</option>';
		endforeach;
		$ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list layout row column select show
	 * @since 1.0
	 */
	public function weluka_display_listlayout_rowcolumn_settings($name, $label = 'Row Column', $labelShow = true, $echo = true, $selectVal = null) {
		$ret = '';
		if($labelShow) {
			$ret = '<h5>' . __($label, Weluka::$settings['plugin_name']) . '</h5>';
		}
		
        $ret .= '<select id="' .$name . '" name="' . $name . '" class="form-control" disabled="disabled">';
		for( $i = 1; $i <= 6; $i++ ) {
			if( $i !== 5 ) {
    	    	$ret .= '<option value="">' . $i . ' column</option>';
			}
		}
        $ret .= '</select>';
        $ret .= '<div class="weluka-mgtop-xs help-block">' . __('Please set the row column.', Weluka::$settings['plugin_name']) . '</div>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list media style col select show
	 * @since 1.0
	 */
	public function weluka_display_listmedia_column_settings($name, $label = 'Colum Width', $labelShow = true, $echo = true) {
		$ret = '';
		if($labelShow) {
			$ret = '<label>' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
        $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control" disabled="disabled">';
        $ret .= '<option value="1">1 column</option>';
        $ret .= '<option value="2">2 column</option>';
        $ret .= '<option value="3">3 column</option>';
        $ret .= '<option value="4">4 column</option>';
        $ret .= '<option value="5">5 column</option>';
        $ret .= '<option value="6">6 column</option>';
        $ret .= '<option value="7">7 column</option>';
        $ret .= '<option value="8">8 column</option>';
        $ret .= '</select>';
        $ret .= '<div class="weluka-mgtop-xs help-block">' . __('Please set the reference up to 12 column.', Weluka::$settings['plugin_name']) . '</div>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list title html tag select show
	 * @since 1.0
	 */
	public function weluka_display_listtitle_htmltag_settings($name, $label = 'Title html tag', $labelShow = true, $echo = true) {
		$ret = '';
		if($labelShow) {
			$ret = '<label>' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
	    
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control" disabled="disabled">';
        $ret .= '<option value="">H1</option>';
        $ret .= '<option value="">H2</option>';
        $ret .= '<option value="">H3</option>';
        $ret .= '<option value="">H4</option>';
        $ret .= '<option value="">H5</option>';
        $ret .= '<option value="">H6</option>';
        $ret .= '<option value="">P</option>';
        $ret .= '<option value="">DIV</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting section content type select show
	 * @since 1.0
	 */
	public function weluka_display_containertype_settings($name, $label = 'Container Type', $labelShow = true, $echo = true, $helpShow = true) {
		$ret = '';
		if($labelShow) {
			$ret = '<label>' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
	    
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$ret .= '<option value=""></option>';
        $ret .= '<option value="weluka-container">' . __('Fixed width container', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-container-fluid">' . __('Full width container', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';
        
		if( $helpShow ) {
			$ret .= '<div class="weluka-mgtop-s help-block">';
    	    $ret .= __('Please select whether to set full width to the content container width to a fixed length. The default is a fixed length.', Weluka::$settings['plugin_name']);
			$ret .= __('If the content container width is set in the theme, it will according to the theme.', Weluka::$settings['plugin_name']);
        	$ret .= '</div>';
		}
		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * @since 1.0
	 */
	public function weluka_display_cpt_settings($name, $cpt, $label = '', $labelShow = true, $echo = true) {
		$ret = '';
		if($labelShow) {
			$ret = '<label>' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}

		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$ret .= '<option value=""></option>';

		$cpts = WelukaTheme::get_instance()->get_custom_posts( $cpt );
		if( !empty ( $cpts ) ) :
			foreach( $cpts as $cpt ) {
				$ret .= '<option value="' . $cpt->ID .'">' . esc_html( strip_tags( $cpt->post_title ) ) . '</option>';
			}
		endif;
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting tagcloud position select show
	 * @since 1.0
	 */
	public function weluka_display_tagcloud_pos_settings($name, $label = '', $labelShow = true, $echo = true, $selectVal = null) {
		$ret = '';
		if($labelShow) {
			$ret = '<h5>' . __($label, Weluka::$settings['plugin_name']) . '</h5>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control" disabled="disabled">';
		$ret .= '<option value=""></option>';
		$ret .= '<option value="">' . __('Meta bottom', Weluka::$settings['plugin_name'] ) .'</option>';
		$ret .= '<option value="">' . __('Content bottom', Weluka::$settings['plugin_name'] ) .'</option>';
		$ret .= '<option value="">' . __('Both', Weluka::$settings['plugin_name'] ) .'</option>';
		$ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

} //end class
