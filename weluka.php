<?php
/*
 * Plugin Name: Weluka Lite
 * Plugin URI: https://www.weluka.me/
 * Description: weluka is a drag and drop content builder that runs on a variety of themes.(Lite Version)
 * Version: 1.0.3
 * Author: weluka team
 * Author URI: https://www.weluka.me/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: weluka
 * Domain Path: /languages
 */


// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Main Weluka Plugin class
 * @since 1.0
 * 　
 */
class Weluka {
	
	/**
	 * Holds the singleton instance of this class
	 * @var Weluka
	 * @since 1.0
	 */
	private static $instance = false;

	/**
	 * plugin setting array
	 * @since 1.0
	 */
	public static $settings = array();
	
	/**
	 * since 1.0
	 */
	protected $last_create_node_id = null;
	
	private function __construct(){
 	}

	/**
	 * singloton instance
	 * @since 1.0
	 */	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new Weluka;
		}
		return self::$instance;
	}
	
	/**
	 * Initialize
	 * @since 1.0
	 */
	public function init() {
		if ( did_action( 'plugins_loaded' ) )
			$this->plugin_initialize();
		else
			add_action( 'plugins_loaded', array( &$this, 'plugin_initialize' ), 9999 );
	}

	/**
	 * register_activation_hook()
	 * @since 1.0
	 */
	public static function plugin_activation( $network_wide ) {
       self::activateDefault();
	}

	/**
	 * activation default
	 * @since 1.0
	 */
	 public static function activateDefault() {
		global $wp_version;
		if ( version_compare( $wp_version, self::$settings['minimum_wp_version'], '<' ) ) {
			self::fail_on_activation( sprintf( __( '%s requires WordPress version %s or later.', self::$settings['plugin_name'] ), self::$settings['plugin_name'], self::$settings['minimum_wp_version'] ) );
		}
	 }
	 
	/**
	 * plugin not activate
	 * @since 1.0
	 */
	public static function fail_on_activation( $message ) {
		deactivate_plugins( plugin_basename( self::$settings['plugin_file'] ), false, is_network_admin() );
		die( $message );
	}

	/**
	 * register_deactivation_hook()
	 * @since 1.0
	 */
	public static function plugin_deactivation() {
    	global $wpdb;

		self::deactive();
	}

	/**
	 * plugin deactive uninstall
	 * @since 1.0
	 */
	public static function deactive() {
		$builder = WelukaBuilder::get_instance();
		$weluka = self::get_instance();

		$_restore	= WelukaAdminSettings::get_site_options( Weluka::$settings['setting_option_name'], WelukaAdminSettings::PLUGIN_STOP_DATA_RESTORE, true );
		if( empty( $_restore ) ) { return; }
		
		//post types
		$targetPostTypes = array();
        $postTypes = get_post_types(array('public' => true));
    	$excludePostTypes = array('attachment' => 'attachment');
    	$postTypes = array_diff_assoc($postTypes, $excludePostTypes);
		foreach ($postTypes as $key => $val) {
        	if (post_type_supports($key, 'editor')) {
				$targetPostTypes[] = $val;
        	}
    	}
		$targetPostTypes[] = self::$settings['cpt_hd'];
		$targetPostTypes[] = self::$settings['cpt_ft'];
		$targetPostTypes[] = self::$settings['cpt_sd'];

		$param = array(
    		'posts_per_page' => -1,
			'numberposts' => -1,
       		'post_type' => $targetPostTypes, 
        	'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private'),
			'meta_query' => array(
				array('key' 	=> WelukaBuilder::CONTENT_POSTMETA_KEY_DRAFT,
					  'value' 	=> null,
					  'compare' => '!='
				)
			)
		);
		$posts = get_posts( $param );

		remove_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2); //ver1.0.1 add

		foreach ($posts as $_post) :
			$_ct = str_replace(array("\r\n","\n","\r"), '', trim(strip_tags($_post->post_content)));
			if(strcasecmp($_ct, "[weluka-builder-content]") == 0) {
				list($result, $content) = $builder->publish_builder_data($_post->ID, true);
			} else {
				$content = $_post->post_content;
			}
			$_post->post_content = $content;
			$weluka->save_post($_post);

		endforeach;
	}
	
	/**
	 * plugins_loaded action hook
	 * plugin initialize
	 * @since 1.0
	 */
	public function plugin_initialize() {
		$this->settings();
		//Load language files
		load_plugin_textdomain( self::$settings['plugin_name'], false, dirname( plugin_basename( self::$settings['plugin_file'] ) ) . '/languages/' );
		$this->includes();
		$this->hooks();
	}
	
	/**
	 * set plugin setting array
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * remove not use lib
	 */
	public function settings() {
		self::$settings['debug']				= false;  //true = debug mode
		self::$settings['plugin_version']		= '1.0.3';
		self::$settings['minimum_wp_version']	= '4.0';
		self::$settings['plugin_dir']			= plugin_dir_path(__FILE__);
		self::$settings['plugin_url']			= set_url_scheme( plugins_url('/', __FILE__) );
		self::$settings['plugin_file']			= __FILE__;
		self::$settings['plugin_name']			= 'weluka'; //TODO Lite
		self::$settings['brand_url']			= 'http://www.weluka.me/?utm_source=external&utm_medium=wp-repo&utm_campaign=weluka-brand';
		self::$settings['setting_option_name']	= self::$settings['plugin_name'] . '_options';
		self::$settings['license_option_name']	= self::$settings['plugin_name'] . '_license';
		self::$settings['seo_option_name']		= self::$settings['plugin_name'] . '_seo';
		self::$settings['admin_url']			= set_url_scheme( get_admin_url() );
		self::$settings['licence_type']			= 'standard';
		self::$settings['ajax_url']				= admin_url('admin-ajax.php');
		self::$settings['webfont_css_dir']		= self::$settings['plugin_dir'] . 'assets/css';
		self::$settings['webfont_css_name']		= 'webfont{%blogid}.css';
		self::$settings['webfont_css_url']		= self::$settings['plugin_url'] . 'assets/css';
		self::$settings['upgrade_url']			= "https://www.weluka.me/?utm_source=external&utm_medium=wp-repo&utm_campaign=weluka-upgrade#buy";
		self::$settings['contact_url']			= "https://www.weluka.me/";
		self::$settings['cpt_hd']				= "welukahd";
		self::$settings['cpt_ft']				= "welukaft";
		self::$settings['cpt_sd']				= "welukasd";
		self::$settings['noimage']				= self::$settings['plugin_url'] . 'assets/img/noimage.gif';
		
		$welukaAdminCss		= self::$settings['debug'] === true ? 'weluka-admin.css' : 'weluka-admin.min.css';
		$welukaCss			= self::$settings['debug'] === true ? 'bootstrap-weluka.css' : 'bootstrap-weluka.min.css';
		$welukaSnippetCss	= self::$settings['debug'] === true ? 'weluka-snippets.css' : 'weluka-snippets.min.css';
		
		$_purl = $this->set_url( self::$settings['plugin_url'] );
		self::$settings['load_css_common'] = array(
			array(
				'target'	=> array('admin'),
				'handle'	=> 'weluka-admin',
				'src'		=> $_purl . 'assets/css/' . $welukaAdminCss,
				'deps'		=> array(),
				'version'	=> '1.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'bootstrap-weluka',
				'src'		=> $_purl . 'assets/css/' . $welukaCss,
				'deps'		=> array(),
				'version'	=> '1.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'weluka-bootstrap-color-picker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
				'deps'		=> array(),
				'version'	=> '2.3.0',
				'media'		=> 'all'
			),
		);
		
		self::$settings['load_css'] = array(
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'tipTip',
				'src'		=> $_purl . 'assets/js/tipTip/tipTip.css',
				'deps'		=> array(),
				'version'	=> '1.3.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'wp-mediaelement',
				'src'		=> '',
				'deps'		=> array(),
				'version'	=> '',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('all'),
				'handle'	=> 'bootstrap-weluka',
				'src'		=> $_purl . 'assets/css/' . $welukaCss,
				'deps'		=> array(),
				'version'	=> '1.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('all'),
				'handle'	=> 'font-awesome',
				'src'		=> $_purl . 'assets/css/font-awesome.min.css',
				'deps'		=> array(),
				'version'	=> '4.5.0', 
				'media'		=> 'all'
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-bootstrap-color-picker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
				'deps'		=> array(),
				'version'	=> '2.3.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-snippets',
				'src'		=> $_purl . 'assets/css/' . $welukaSnippetCss,
				'deps'		=> array(),
				'version'	=> '1.0',
				'media'		=> 'all'
			),
		);

		$welukaAdminJs		= self::$settings['debug'] === true ? 'weluka-admin.js' : 'weluka-admin.min.js';
		$welukaBuilderJs	= self::$settings['debug'] === true ? 'weluka-builder.js' : 'weluka-builder.min.js';
		$welukaMapJs		= self::$settings['debug'] === true ? 'weluka-gmap.js' : 'weluka-gmap.min.js';
		$welukaJs			= self::$settings['debug'] === true ? 'weluka.js' : 'weluka.min.js';

		self::$settings['load_js_common'] = array(
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'bootstrap',
				'src'		=> $_purl . 'assets/js/bootstrap.min.js',
				'deps'		=> array(),
				'version'	=> '3.3.4',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'weluka-bootstrap-colorpicker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '2.3.0',
				'in_footer'	=> true
			)
		);

		self::$settings['load_js'] = array(
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-core',
				'src'		=> '',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-widget',
				'src'		=> '',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-mouse',
				'src'		=> '',
				'deps'		=> array('jquery-ui-core', 'jquery-ui-widget'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-resizable',
				'src'		=> '',
				'deps'		=> array('jquery-ui-mouse'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-sortable',
				'src'		=> '',
				'deps'		=> array('jquery-ui-mouse'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-draggable',
				'src'		=> '',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('site', 'builder'),
				'handle'	=> 'wp-mediaelement',
				'src'		=> '',
				'deps'		=> array(),
				'version'	=> '',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'tipTip',
				'src'		=> $_purl . 'assets/js/tipTip/jquery.tipTip.minified.js',
				'deps'		=> array(),
				'version'	=> '1.3.0',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('all'),
				'handle'	=> 'bootstrap',
				'src'		=> $_purl . 'assets/js/bootstrap.min.js',
				'deps'		=> array(),
				'version'	=> '3.3.4',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-bootstrap-colorpicker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '2.3.0',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'jquery-dnd_page_scroll',
				'src'		=> $_purl . 'assets/js/jquery.dnd_page_scroll.js',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('admin'),
				'handle'	=> 'weluka-admin',
				'src'		=> $_purl . 'assets/js/' . $welukaAdminJs,
				'deps'		=> array(),
				'version'	=> '1.0',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-builder',
				'src'		=> $_purl . 'assets/js/' . $welukaBuilderJs,
				'deps'		=> array('jquery'),
				'version'	=> '1.0',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'weluka',
				'src'		=> $_purl . 'assets/js/' . $welukaJs,
				'deps'		=> array('jquery'),
				'version'	=> '1.0',
				'in_footer'	=> true
			),
		);
	}
	
	/**
	 * jquery version check
	 * @since 1.0
	 */
	public function check_jquery_ver() {
		global $wp_scripts;
		
		if ( ! empty( $wp_scripts->registered['jquery']->ver ) && ! empty( $wp_scripts->registered['jquery']->src ) && $wp_scripts->registered['jquery']->ver < '1.9.1' ) {
			return false;
		}
		return true;
	}

	/**
	 * module load
	 * @since 1.0
	 */
	public function includes() {
		//admin settings
		if ( ! class_exists( 'WelukaAdminSettings', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-admin-settings.php' );

		//page builder
		if ( ! class_exists( 'WelukaBuilder', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-builder.php' );

		//seo
		if ( ! class_exists( 'WelukaSeo', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-seo.php' );

	}

	/**
	 * hook registory
	 * @since 1.0
	 */
	public function hooks() {
		$builder	= WelukaBuilder::get_instance();
		$seo		= WelukaSeo::get_instance();

		WelukaAdminSettings::init(); //管理画面 設定ページ

		add_action('init', array( &$this, 'weluka_session_start'));
		
		//pro WelukaAdminSettings::create_webfont_css(); //case after update

		add_action( 'wp_enqueue_scripts', array( &$this, 'output_scripts'), 7 ); //site js load
		
		add_action( 'get_header', array( &$seo, 'get_header' ), 0 );
		//add_action( 'wp_footer', array( &$seo, 'wp_footer' ), 99999999 );

		$wpMetaData	= WelukaAdminSettings::get_site_options( Weluka::$settings['seo_option_name'], WelukaAdminSettings::META_ARRAY_FIELD, true );
		if( isset( $wpMetaData[WelukaAdminSettings::META_WP_GENERATOR] ) && $wpMetaData[WelukaAdminSettings::META_WP_GENERATOR] === 'off' ) {
			remove_action('wp_head', 'wp_generator');
		}
		if( isset( $wpMetaData[WelukaAdminSettings::META_RSD_LINK] ) && $wpMetaData[WelukaAdminSettings::META_RSD_LINK] === 'off' ) {
			remove_action('wp_head', 'rsd_link');
		}
		if( isset( $wpMetaData[WelukaAdminSettings::META_WLWMANIFEST_LINK] ) && $wpMetaData[WelukaAdminSettings::META_WLWMANIFEST_LINK] === 'off' ) {
			remove_action('wp_head', 'wlwmanifest_link');
		}
		if( isset( $wpMetaData[WelukaAdminSettings::META_RSS_FEED] ) && $wpMetaData[WelukaAdminSettings::META_RSS_FEED] === 'off' ) {
			remove_action( 'wp_head', 'feed_links', 2);
			remove_action( 'wp_head', 'feed_links_extra', 3);

			// RDF/RSS 1.0
			remove_action('do_feed_rdf', 'do_feed_rdf', 10, 1);
			// RSS 0.92
			remove_action('do_feed_rss', 'do_feed_rss', 10, 1);
			// RSS 2.0
			remove_action('do_feed_rss2', 'do_feed_rss2', 10, 1);
			// ATOM
			remove_action('do_feed_atom', 'do_feed_atom', 10, 1);
			//automatic_feed_links(false);
		}
		
		add_action( 'wp_head', array( &$seo, 'add_head'), 1);	//site wp_head
		add_action( 'wp_head', array( &$this, 'add_head'), 999); //site wp_head
		add_action( 'wp_footer', array( &$this, 'add_footer'), 999); //site wp_footer
		
		add_action( 'current_screen', array( &$this, 'admin_post_init'), 999); //admin page
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_styles_scripts_common' ) );

		//tinymce
		add_filter( 'mce_buttons_2', array( &$this, 'mce_buttons_2' ), 9999 );
		add_filter( 'tiny_mce_before_init', array( &$this, 'tinymce_setting'), 10000 );  //tinyMCE Advanced after exec
		
		//ajax hook
		add_action('wp_ajax_weluka_get_site_content', array(&$builder, 'weluka_get_site_content')); //Weluka builder button click
		add_action('wp_ajax_weluka_save_content', array(&$builder, 'weluka_save_content')); //Weluka builder button click
		add_action('wp_ajax_weluka_add_widgetdata', array(&$builder, 'weluka_add_widgetdata')); //Weluka builder widget add
		add_action('wp_ajax_weluka_move_data', array(&$builder, 'weluka_move_data')); //Weluka builder section or row or col or widget move
		add_action('wp_ajax_weluka_get_html', array(&$builder, 'weluka_get_html')); //Weluka builder model to html
		add_action('wp_ajax_weluka_partial', array(&$builder, 'weluka_partial')); //Weluka builder partial data registory
		add_action('wp_ajax_weluka_layout_select', array(&$builder, 'weluka_layout_select')); //v1.0.3 add layout select

		//site hook
		add_filter( 'posts_results', array(&$builder, 'render_posts_results'), 10, 2);
		add_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2);
		add_filter('excerpt_more', array($this, 'excerpt_more') ); //抜粋の[...]表示を変更
        add_filter('the_excerpt', array(&$builder, 'excerpt'));
        add_filter('get_the_excerpt', array(&$builder, 'excerpt'));
		add_filter('widget_text', 'do_shortcode');

		//shortcode
		add_shortcode( 'weluka-builder-content', array(&$builder, 'sh_weluka_builder_content') );
		add_shortcode( 'weluka-default-content', array(&$builder, 'sh_weluka_default_content') );
		add_shortcode( 'weluka-builder-content2', array(&$builder, 'sh_weluka_builder_content2') );

		add_shortcode( $builder->gmap_shortcode_tag, array(&$builder, 'sh_weluka_gmap') );
		add_shortcode( $builder->wpposts_shortcode_tag, array(&$builder, 'sh_weluka_wpposts') );
		add_shortcode( $builder->wpmenu_shortcode_tag, array(&$builder, 'sh_weluka_wpmenu') );
		add_shortcode( $builder->wpmenu_shortcode_tag2, array(&$builder, 'sh_weluka_wpmenu2') );
		add_shortcode( $builder->wparchives_shortcode_tag, array(&$builder, 'sh_weluka_wparchives') );
		add_shortcode( $builder->wpcalendar_shortcode_tag, array(&$builder, 'sh_weluka_wpcalendar') );
		add_shortcode( $builder->wpcategories_shortcode_tag, array(&$builder, 'sh_weluka_wpcategories') );
		add_shortcode( $builder->wpmeta_shortcode_tag, array(&$builder, 'sh_weluka_wpmeta') );
		add_shortcode( $builder->wppages_shortcode_tag, array(&$builder, 'sh_weluka_wppages') );
		add_shortcode( $builder->wpcomments_shortcode_tag, array(&$builder, 'sh_weluka_wpcomments') );
		add_shortcode( $builder->wprss_shortcode_tag, array(&$builder, 'sh_weluka_wprss') );
		add_shortcode( $builder->wpsearch_shortcode_tag, array(&$builder, 'sh_weluka_wpsearch') );
		add_shortcode( $builder->wptagcloud_shortcode_tag, array(&$builder, 'sh_weluka_wptagcloud') );

		add_shortcode( 'weluka-phone', array(&$this, 'sh_weluka_phone') );
		add_shortcode( 'weluka-mail', array(&$this, 'sh_weluka_mail') );
		add_shortcode( 'weluka-custom-list', array(&$this, 'sh_weluka_custom_list') );
		add_shortcode( 'weluka-cf', array(&$this, 'sh_weluka_custom_field') );	//v1.0.3 add
	}

	/**
	 * init hook session start
	 * @since 1.0
	 */
	public function weluka_session_start() {
		if( !session_id() ) {
			session_start();
		}
	}
	
	/**
	 * tinymce button_2 hook
	 * @since 1.0
	 */
	public function mce_buttons_2( $original ) {
		$buttons_2 = array('formatselect', 'fontselect', 'fontsizeselect', 'styleselect', 'forecolor', 'backcolor', 'table', 'hr', 'anchor');
		if ( is_array( $original ) && ! empty( $original ) ) {
			$original = array_diff( $original, $buttons_2 );
			$buttons_2 = array_merge( $buttons_2, $original );
		}
		return $buttons_2;
	}

	/**
	 * tiny_mce_before_init hook
	 * @since 1.0
	 */
	public function tinymce_setting($initArray) {
		$initArray['wordpress_adv_hidden']	= false;
		// set font size
		$initArray['fontsize_formats'] = "6px 7px 8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 36px 38px 40px 41px 42px 43px 44px 45px 46px 47px 48px 49px 50px 51px 52px 53px 54px 55px 56px 57px 58px 59px 60px 61px 62px 63px 64px 65px 66px 67px 68px 69px 70px 71px 72px"; //"9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";

		//wordpress default
    	$styleFormats = array(
			array(
            	'title' => 'Headings',
                	'items' => array(
                		array( 'title' => 'Heading 1', 'format' => 'h1' ),
                		array( 'title' => 'Heading 2', 'format' => 'h2' ),
                		array( 'title' => 'Heading 3', 'format' => 'h3' ),
                		array( 'title' => 'Heading 4', 'format' => 'h4' ),
                		array( 'title' => 'Heading 5', 'format' => 'h5' ),
                		array( 'title' => 'Heading 6', 'format' => 'h6' )
            		)
        	),
			array(
				'title' => 'Inline',
				'items' => array(
        			array( 'title' => 'Bold', 'icon' => 'bold', 'format' => 'bold' ),
        			array( 'title' => 'Italic', 'icon' => 'italic', 'format' => 'italic' ),
        			array( 'title' => 'Underline', 'icon' => 'underline', 'format' => 'underline' ),
        			array( 'title' => 'Strikethrough', 'icon' => 'strikethrough', 'format' => 'strikethrough' ),
        			array( 'title' => 'Superscript', 'icon' => 'superscript', 'format' => 'superscript' ),
        			array( 'title' => 'Subscript', 'icon' => 'subscript', 'format' => 'subscript' ),
        			array( 'title' => 'Code', 'icon' => 'code', 'format' => 'code' )
				)
			),
			array(
				'title' => 'Blocks',
				'items' => array(
        			array( 'title' => 'Paragraph', 'format' => 'p' ),
        			array( 'title' => 'Blockquote', 'format' => 'blockquote' ),
        			array( 'title' => 'Div', 'format' => 'div' ),
        			array( 'title' =>'Pre', 'format' => 'pre' )
				)
			),
			array(
				'title' => 'Alignment',
				'items' => array(
        			array( 'title' => 'Left', 'icon' => 'alignleft', 'format' => 'alignleft' ),
        			array( 'title' => 'Center', 'icon' => 'aligncenter', 'format' => 'aligncenter' ),
        			array( 'title' => 'Right', 'icon' => 'alignright', 'format' => 'alignright' ),
        			array( 'title' => 'Justify', 'icon' => 'alignjustify', 'format' => 'alignjustify' )
				)
			),
    	);

		$initArray['style_formats'] = json_encode( $styleFormats );

		// block no set style add
		$initArray['body_class'] = apply_filters('weluka_tinymce_body_class_args', ''); //tinyMCE iframe body class use theme apply_filters
		return $initArray;
	}

	/**
	 * @since 1.0
	 */
	public function excerpt_more( $more ) {
    	return ' ...';
	}

/*------------------------------------------------------------------------------
 [ css js settings ] 
------------------------------------------------------------------------------*/
	
	/**
	 * wp_enqueue_scripts hook
	 * js queue setting
	 * @since 1.0
	 */
	public function output_scripts() {
		$this->enque_styles('site');
		$this->enque_scripts('site');
		if( $this->is_edit_builder() && $this->is_active_builder() ) {
			wp_enqueue_media(); //media manager
			//wp_enqueue_script('wp-link'); //link manager
			$this->enque_styles('builder');
			$this->enque_scripts('builder');
		}
	}

	/**
	 * style css enque
	 * @param
	 *	string ... site=site load、admin=admin load
	 * @since 1.0
	 */
	public function enque_styles($target, $styles = null) {
		$_styles = !empty( $styles ) ? $styles : self::$settings['load_css'];
		foreach( $_styles as $_style) :
			$flg = false;
			if(in_array("site", $_style['target'])){
				if($target === 'site') { $flg = true; }	
			}
			if(in_array("admin", $_style['target']) || in_array("admin_common", $_style['target'])){
				if($target === 'admin'){ $flg = true; }
			}
			if(in_array("builder", $_style['target'])) {
				if($target === 'builder'){ $flg = true; }
			}
			if(in_array("all", $_style['target'])) {
				$flg = true;
			}
			
			if( ! $flg ) { continue; }
			
			if( !wp_style_is($_style['handle']) ) {
				$_v = $_style['version'];
				if(self::$settings['debug'])
					$_v .= mt_rand();

				if( ( $_style['handle'] === 'bootstrap-weluka' || $_style['handle'] === 'weluka-bootstrap-color-picker' ) && in_array("admin_common", $_style['target']) ) {
					//load admin commom mode
					$_curpage = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';
					if ( !is_admin() || $_curpage !== 'WelukaTheme-color' ) { continue; }
				}

				if(isset($_style['src']) && $_style['src'] !== "") {
					$_media = isset($_style['media']) && $_style['media'] !== "" ? $_style['media'] : 'all';
					wp_enqueue_style($_style['handle'], $_style['src'], $_style['deps'], $_v, $_media );
				} else {
					//wordpress bundle
					wp_enqueue_style($_style['handle']);
				}
			}
		endforeach;
		
	}

	/**
	 * scripts  enque
	 * @param
	 *	string ... site=site load、admin=admin load
	 * @since 1.0
	 */
	public function enque_scripts($target, $scripts = null) {
		$_scripts = !empty( $scripts ) ? $scripts : self::$settings['load_js'];

		//jquery
/*		if($this->check_jquery_ver()){
		} else{
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery',  self::$settings['plugin_url'] . 'assets/js/jquery-1.11.2.min.js', array(), '1.11.2' );
		}*/

		foreach( $_scripts as $_script) :
			$flg = false;
			if(in_array("site", $_script['target'])){
				if($target === 'site') { $flg = true; }	
			}
			if(in_array("admin", $_script['target']) || in_array("admin_common", $_script['target'])){
				if($target === 'admin'){ $flg = true; }
			}
			if(in_array("builder", $_script['target'])) {
				if($target === 'builder'){ $flg = true; }
			}
			if(in_array("all", $_script['target'])) {
				$flg = true;
			}

			if( !$flg ) { continue; }
			
			if( !wp_script_is($_script['handle']) ) {
				$_v = $_script['version'];
				if(self::$settings['debug'] || $_v === false)
					$_v .= mt_rand();

				if( ( $_script['handle'] === 'bootstrap' || $_script['handle'] === 'weluka-bootstrap-colorpicker' ) && in_array("admin_common", $_script['target']) ) {
					//load admin commom mode
					$_curpage = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';
					if ( !is_admin() || $_curpage !== 'WelukaTheme-color' ) { continue; }
				}

				if(isset($_script['src']) && $_script['src'] !== "") {
					wp_enqueue_script($_script['handle'], $_script['src'], $_script['deps'], $_v, $_script['in_footer']);
				} else {
					//wordpress bundle
					wp_enqueue_script($_script['handle']);
				}
			}
		endforeach;
		
		//in javascript file use variable
		wp_localize_script('weluka-admin', 'welukaWp',
            array(
                'ajax_url'	=> self::$settings['ajax_url'],
				'admin_url'	=> self::$settings['admin_url'],
                'nonces'	=> array(
                    'weluka_get_site_content'	=> wp_create_nonce('wp_ajax_weluka_get_site_content'),
                    'weluka_save_content'		=> wp_create_nonce('wp_ajax_weluka_save_content'),
                ),
				'msgs'		=> array(
					'close_confirm_msg'	=> __('Did you save?. Are you sure you want to leave this page?', self::$settings['plugin_name']),
					'content_null_save_confirm_msg'	=> __('But do contents preserve a blank (null)?', self::$settings['plugin_name']),	//ver1.0.1 add
				)
            )
        );
	}
	
	/**
	 * site wp_head hook
	 * @since 1.0
	 */
	public function add_head() {
		$postType = get_post_type();
		if( $postType === self::$settings['cpt_hd'] || $postType === self::$settings['cpt_ft'] || $postType === self::$settings['cpt_sd'] ) {
			echo '<meta name="robots" content="noindex,nofollow" />';
		}
		
		//bootstrap old ie
		echo '<!--[if lt IE 9]>';
      	echo '<script src="' . self::$settings['plugin_url'] . 'assets/js/html5shiv.min.js"></script>';
      	echo '<script src="' . self::$settings['plugin_url'] . 'assets/js/respond.min.js"></script>';
    	echo '<![endif]-->';
	}

	/**
	 * site wp_footer hook
	 * @since 1.0
	 */
	public function add_footer() {
		if( !$this->is_active_builder() ) {
			$embedCode	= WelukaAdminSettings::get_options(WelukaAdminSettings::COMMON_EMBED_CODE);
			if( isset( $embedCode ) ) { echo wp_unslash( $embedCode ); }
		}
	}
	
/*------------------------------------------------------------------------------
 [ admin ] 
------------------------------------------------------------------------------*/

	/**
	 * current screen hook 
	 * admin post or post-new page display
	 * @since 1.0
	 */
    public function admin_post_init() {
		if( $this->is_admin_builder() ) {
			add_filter( 'admin_body_class', array( &$this, 'body_class' ) );
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_styles_scripts' ) );
			add_action( 'admin_head', array( &$this, 'add_head' ) );
			add_action( 'edit_form_after_title', array( WelukaBuilder::get_instance(), 'add_builder_button' ) );
			add_action( 'admin_footer', array( WelukaBuilder::get_instance(), 'add_builder_content' ) );
		}
	}
	
	/**
	 * admin_body_class hook
	 * admin post.php post-new.php body class add
	 * @since 1.0
	 */
	public function body_class( $classes = '' ) {
		$classes .= ' weluka-builder-enabled ';
		return $classes;
	}

	/**
	 * admin_enqueue_scripts hook
	 * admin common head => load style and script
	 * @since 1.0
	 */
	public function admin_styles_scripts_common() {
		wp_enqueue_media(); //media manager
		self::enque_styles( 'admin', self::$settings['load_css_common'] );
		self::enque_scripts( 'admin', self::$settings['load_js_common'] );
	}
	
	/**
	 * admin_enqueue_scripts hook
	 * admin post.php post-new.php head => load style and script
	 * @since 1.0
	 */
	public function admin_styles_scripts() {
		wp_enqueue_script('wp-link'); //link manager
		self::enque_styles('admin');
		self::enque_scripts('admin');
	}

	/**
	 * @since 1.0
	 * @update
	 */
/* TODO Lite
	public function license_notice() {
	    global $pagenow;

		$infop = array( 'index.php', 'post.php', 'post-new.php', 'plugins.php' );
    	if ( in_array($pagenow, $infop) && is_main_site() ) {
			list($ret, $msg) = $this->check_license();
			if( !$ret ) {
				echo '<div class="updated notice"><p>' . sprintf( __('Please WELUKA licensed authentication. Enter the license key, <a href="%s">please click here.</a> <a href="%s">Upgrade click here.</a>', Weluka::$settings['plugin_name'] ), admin_url('admin.php?page=' . self::$settings['license_option_name']), self::$settings['upgrade_url'] ) . '</p></div>';
        	}
    	}
	}
*/

/*------------------------------------------------------------------------------
 [ Utility shortcode ]
------------------------------------------------------------------------------*/

	/**
	 * [weluka-phone] shortcode function
	 * @since 1.0
	 */
	public function sh_weluka_phone( $atts ) {
		extract(shortcode_atts(
			array(
				'h'		=> 'Tel.', //prefix
				'no'		=> '',	//phone number
				'disp'	=> '',	//display phone number
				'i'		=> false,	//true=phone icon output
				'style'	=> '',	//style font-size:2em; color:#ffffff etc...
				'tag'		=> 'div'	//html tag name
			),
			$atts)
		);

		$ret = "";
		$phone = $disp;
		$style	= isset( $style ) && trim( $style ) !== '' ? ' style="' . trim( $style ) . '"' : '';
		
		if( $this->is_smartphone() ){
			$rep = preg_replace("/[^0-9]+/", "", $no);
			$str = isset($disp) ? $disp : $no;
			$phone =  '<a href="tel:' . $rep . '"' . $style . '>' . $str . '</a>';
		}

		if( ! empty( $phone ) && ! empty( $h ) && empty( $i ) ){
			$phone = esc_attr( $h ) . "&nbsp;" . $phone;
		}

		if( ! empty( $phone ) && ! empty( $i ) ){
			$phone = '<i class="fa fa-phone"></i>' . $phone;
		}
		
		$tag = trim( $tag );
		$ret = '<' . $tag . ' class="weluka-phone"' . $style . '>' . $phone . '</' . $tag . '>';
		return $ret;
	}

	/**
	 * [weluka-mail] shortcode function
	 * @since 1.0
	 */
	public function sh_weluka_mail( $atts ) {
		extract(shortcode_atts(
			array(
				'h'		=> 'Email.', //prefix
				'addr'	=> '',	//email addrss
				'subject'	=> '',	//email subject
				'disp'	=> '',	//display string
				'i'		=> false,	//true=phone icon output
				'style'	=> '',	//style font-size:2em; color:#ffffff etc...
				'tag'	=> 'div'	//html tag name
			),
			$atts)
		);

		$ret = "";
		$mail = $disp;
		$style	= isset( $style ) && trim( $style ) !== '' ? ' style="' . trim( $style ) . '"' : '';
		
		if( !empty( $addr ) ){
			$sb = isset( $subject ) && trim( $subject ) ? '?subject=' . urlencode( trim( $subject ) ) : '';
			if( strchr($addr, "@") === false ) {
				$mail =  '<a href="' . $addr . '"' . $style . '>' . $disp . '</a>';
			} else {
				$mail =  '<a href="mailto:' . $addr . $sb . '"' . $style . '>' . $disp . '</a>';
			}
		}

		if( ! empty( $mail ) && ! empty( $h ) && empty( $i ) ){
			$mail = esc_attr( $h ) . "&nbsp;" . $mail;
		}

		if( ! empty( $mail ) && ! empty( $i ) ){
			$mail = '<i class="fa fa-envelope-o"></i>' . $mail;
		}
		
		$tag = trim( $tag );
		$ret = '<' . $tag . ' class="weluka-mail"' . $style . '>' . $mail . '</' . $tag . '>';
		return $ret;
	}

	/**
	 * [weluka-custom-list] shortcode function
	 * @since 1.0
	 */
	public function sh_weluka_custom_list( $atts, $content = '' ) {
		extract(shortcode_atts(
			array(
				'icon'		=> 'check', //font-awesome class
				'iconcolor'	=> '',	//icon color	
				'style'	=> ''	//style font-size:2em; color:#ffffff etc...
			),
			$atts)
		);

		$ret = "";
		$iconclass = isset( $icon ) && trim( $icon ) !== '' ? 'weluka-custom-list-' . $icon : '';
		if( !empty( $iconcolor ) ) {
			$iconcolor = str_replace(array('#',';'), array('',''), $iconcolor );
			$ret .= '<div class="weluka-hide"><style> .' . $iconclass . ' li:before { color:#' . $iconcolor . '; }</style></div>';
		}
		$style	= isset( $style ) && trim( $style ) !== '' ? ' style="' . trim( $style ) . '"' : '';
		$ret .= '<div class="weluka-custom-list ' . $iconclass. '"' . $style . '>' . do_shortcode($content) . '</div>';
		return $ret;
	}

	/**
	 * [weluka-cf] shortcode function
	 * custom fileds
	 * @since 1.0
	 */
	public function sh_weluka_custom_field( $atts ) {
		global $post;
		extract(shortcode_atts(
			array(
				'id'		=> '',
				'name'		=> '',
				'single'	=> true,
				'delim'		=> '',
				'htmltag'	=> ''
			),
			$atts)
		);

		$ret = "";

		if( empty( $id ) ){
			$ret = 'Please specify a post id.';
		} else {
			$val = "";
			if( empty( $name ) ) {
				$ret = 'Please specify a custom field name.';
			} else {
				$val = $this->get_postmeta($id, $name, $single);
			}
			if( !empty( $val ) ) {
				if(is_array( $val ) ) {
					$cnt = count( $val );
					for( $i = 0; $i < $cnt; $i++ ) {
						if( $htmltag ) { $ret .= '<' . $htmltag . '>'; }
						$ret .= do_shortcode( $val[$i] );
						if( $htmltag ) { $ret .= '</' . $htmltag . '>'; }
						
						if( $i + 1 < $cnt ) { $ret .= $delim; }
					}
				} else {
					if( $htmltag ) { $ret .= '<' . $htmltag . '>'; }
					$ret .= do_shortcode( $val );
					if( $htmltag ) { $ret .= '</' . $htmltag . '>'; }
					$ret .= $delim;
				}
			}
		}
		return $ret;
	}

/*------------------------------------------------------------------------------
 [ Utility ] 
------------------------------------------------------------------------------*/
	
	/**
	 * @since 1.0
	 * @return
	 *	true=smartphone, false not smartphone
	 */
	function is_smartphone () {
		$ret = false;
		$ua = mb_strtolower($_SERVER['HTTP_USER_AGENT']);

		if(strpos($ua, 'iphone') !== false) { $ret = true; }
		elseif((strpos($ua, 'android') !== false) && (strpos($ua, 'mobile') !== false)) { $ret = true; }
		elseif((strpos($ua, 'windows') !== false) && (strpos($ua, 'phone') !== false)) { $ret = true; }
		elseif((strpos($ua, 'firefox') !== false) && (strpos($ua, 'mobile') !== false)) { $ret = true; }
		elseif(strpos($ua, 'blackberry') !== false) { $ret = true; }
		elseif(strpos($ua, 'dream') !== false) { $ret = true; /* Pre 1.5 Android */ }
		elseif(strpos($ua, 'cupcake') !== false) { $ret = true; /* 1.5+ Android */ }
		elseif(strpos($ua, 'incognito') !== false) { $ret = true; /* Other iPhone browser */ }
		elseif(strpos($ua, 'webmate') !== false) { $ret = true; /* Other iPhone browser */ }

		return $ret;
	}
	
	/**
	 * ajax nonce check
	 * @since 1.0
	 * @return
	 *	boolean true=OK, false=NG
	 */
	 public function check_nonce() {
		if (!isset($_REQUEST['nonce']) or empty($_REQUEST['nonce']) or !wp_verify_nonce($_REQUEST['nonce'], 'wp_ajax_'.$_REQUEST['action'])) {
    		return false;
		}
		return true;
	 }

	/**
	 * get post url (http or https)
	 * @since 1.0
	 */
	public function get_edit_url($post_id = "") {
		global $post;

		if ( $post_id === "" && isset($post->ID)) {
			$post_id = $post->ID;
		}

		$url = add_query_arg( self::$settings['plugin_name'] . '_builder', '', get_permalink( $post_id ) );

		//WP Minify plugin active case
		if ( class_exists( 'WPMinify' ) ) {
			$url = add_query_arg( 'wp-minify-off', '1', $url );
		}

		return set_url_scheme( $url ); //http or https
	}

	/**
	 * get post url (http or https)
	 * @since 1.0
	 */
	public function get_post_url($post_id = "") {
		global $post;

		if ( $post_id === "" && isset($post->ID)) {
			$post_id = $post->ID;
		}

		$url = get_permalink( $post_id );

		//WP Minify plugin active case
		if ( class_exists( 'WPMinify' ) ) {
			$url = add_query_arg( 'wp-minify-off', '1', $url );
		}

		return esc_url(set_url_scheme( $url )); //http or https
	}

	/**
	 * get post title
	 * @since 1.0
	 */
	public function get_post_title($post_id = "") {
		global $post;

		if ( $post_id === "" && isset($post->ID)) {
			$post_id = $post->ID;
		}

		$title = get_the_title( $post_id );
		return esc_html( $title ); //http or https
	}

	/**
	 * current post post_type builder target check
	 * @since 1.0
	 */	
	public function check_builder_post_type($postType = "") {
		$_postType = $postType;
		if($postType === "") {
			$_post = get_post(get_the_ID());
			$_postType = isset($_post->post_type) ? $_post->post_type : "";
		}
		$postTypes = WelukaAdminSettings::array_enable_post_types();
		
		if( $_postType === self::$settings['cpt_hd'] || $_postType === self::$settings['cpt_ft'] || $_postType === self::$settings['cpt_sd'] ) {
			return true;
		}
		return in_array( $_postType, $postTypes );
	}
	
	/**
	 * current user builder roles check
	 * @since 1.0
	 */
	public function check_builder_role_check() {
		global $current_user;
		$ret = false;

		$disableRoles = WelukaAdminSettings::array_disable_roles();
		foreach($disableRoles as $role) {
			if( in_array($role, $current_user->roles) ){
				$ret = true;
				break;
			}
		}
		return $ret;
	}
	
	/**
	 * get post
	 * @since 1.0
	 * @return object 
	 */
	public function get_post($postId = "") {
		$_id = $postId;
		if($postId === "") {
			$_id = get_the_ID();
		}
		return isset($_id) ? get_post($_id) : (object) array();
	}
	
	/**
	 * get post_id
	 * @since 1.0
	 */
	public function get_post_id($postId = "") {
		return $postId === "" ? get_the_ID() : $postId;
	}
	
	/**
	 * check edit role
	 * @since 1.0
	 */
	public function check_edit_user($p = "") {
		$_post = $p === "" ? $this->get_post() : $p;
		$ret = false;
		if(!isset($_post) && !isset($_post->ID)) { return false; }
		if($_post->post_type === 'page') {
			if( current_user_can('edit_pages', $_post->ID ) ) { $ret = true; }
		}else{
			//post or custom post
			if( current_user_can('edit_post', $_post->ID ) ) { $ret = true; }
		}
		return $ret;
	}
	
	/**
	 * user builder use check
	 * @since 1.0
	 * @return true=active, false=deactive
	 */
	public function is_admin_builder() {
		global $pagenow, $current_user, $user_level;
		$ret = false;
		//admin page and edit
		if ( is_admin() && in_array( $pagenow, array( 'post.php', 'post-new.php') ) ) {
			$currentScreen = get_current_screen();
			//builder taget post types
			if ( $this->check_builder_post_type( $currentScreen->post_type ) ) {
				//admin all ok
				//get_currentuserinfo();
				if($user_level == 10) {  return true; }

				//roll check
				if( ! $this->check_builder_role_check() ) {
					if($pagenow === 'post-new.php') {
						if($currentScreen->post_type === 'page') {
							//if( current_user_can('edit_pages', get_the_ID() ) ) { $ret = true; }
							if( current_user_can('edit_pages' ) ) { $ret = true; }
						}else{
							//post or custom post
							//if( current_user_can('edit_post', get_the_ID() ) ) { $ret = true; }
							if( current_user_can('edit_post') || current_user_can('publish_posts') ) { $ret = true; }
						}
					}else{
						$_post_id = !empty( $_REQUEST['post'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
						//post.php
						if($currentScreen->post_type === 'page') {
							if( current_user_can('edit_pages', $_post_id ) ) { $ret = true; }
						}else{
							//post or custom post
							if( current_user_can('edit_post', $_post_id ) ) { $ret = true; }
						}						
					}
				}
			}
		}
		return $ret;
	}
	
	/**
	 * user builder use check
	 * @param
	 *	postData
	 * @since 1.0
	 * @return true=enable, false=disable
	 */
	public function is_edit_builder($p = "") {
		$ret = false;
		$_postType = empty( $p ) ? "" : $p->post_type;
		if ( is_user_logged_in() &&
			 $this->check_builder_post_type($_postType) &&
			 ! $this->check_builder_role_check() &&
			 $this->check_edit_user($p) ) { $ret = true; }
		return $ret;
	}

	/**
	 * display content check builder mode
	 * @since 1.0
	 */
	public function is_active_builder() {
		if ( is_user_logged_in() && isset( $_REQUEST['weluka_builder'] ) ) {
			return true;
		}
		return false;
	}
	
	/**
	 * dummy post or page record insert
	 * TODO post_date_gmt 0000-00-00 00:00:00 対応
	 * @since 1.0
	 */
	public function dummy_insert_post($post_id) {
		$builder	= WelukaBuilder::get_instance();
		//revision not create
		remove_action("pre_post_update","wp_save_post_revision");
		remove_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2);

		$_postData = $this->get_post($post_id);
		//no title dummy
		$_title = isset($_postData->post_title) && $_postData->post_title != "" ? $_postData->post_title : sprintf(__('Draft Post #%d', self::$settings['plugin_name']), $post_id);
		//get auto draft data
		$newPost = array(
			'ID'			=> $post_id,
			'post_title'	=> $_title,
			'post_content'	=> '',
			'post_status'	=> 'draft',
		);

		$this->save_post($newPost);

		add_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2);
		add_action("pre_post_update","wp_save_post_revision");
	}
	
	/**
	 * wp insert and update post
	 * @since 1.0
	 */
	public function save_post($newPost) {
		$ret = array(true);
		if(self::$settings['debug']) {
			$p = wp_update_post($newPost, true);
			if ( is_wp_error( $p ) ) {
				$errors = $p->get_error_messages();
				foreach ( $errors as $error ) {
					$ret[] = $error;
				}
			}
		}else{
			wp_update_post($newPost);
		}
		return $ret;
	}
	
	/**
	 * postmeta insert and update
	 * @since 1.0
	 */
	public function save_postmeta($postId, $keyName, $value) {
		return update_post_meta($postId, $keyName, $value);
	}


	/**
	 * get postmeta
	 * @since 1.0
	 */
	public function get_postmeta($postId, $keyName, $mode = true) {
		return get_post_meta($postId, $keyName, $mode);
	}

	/**
	 * delete postmeta
	 * @since 1.0
	 */
	public function delete_postmeta($postId, $keyName = false, $val = false) {
		if($keyName !== false && $val !== false) {
			return delete_post_meta($postId, $keyName, $val);
		}elseif($keyName !== false && $val === false) {
			return delete_post_meta($postId, $keyName);
		}else{
			return delete_post_meta($postId);
		}
	}
	
	/**
	 * wordpress update_option
	 * @since 1.0
	 */
	public function update_option( $optName, $data ) {
		global $wp_version;
		
		if ( version_compare( $wp_version, '4.2', '<' ) ) {
			update_option( $optName, $data );
		} else {
			update_option( $optName, $data, false );
		}
	}
	
	/**
	 * unique id create
	 * @since 1.0
	 */
	public function create_node_id() {
		//return uniqid(mt_rand(), true);
		$nodeId = uniqid( mt_rand() );
		if($nodeId == $this->last_create_node_id) {
			return $this->create_node_id();
		}

		$this->last_create_node_id = $nodeId;
		return $nodeId;
	}
	
	/**
	 * webfont css fname create
	 * @since 1.0
	 */
	public function get_webfont_fname( $mode = 'dir' ) {
		$_blogId = get_current_blog_id();
		$fname = $mode === 'url' ? Weluka::$settings['webfont_css_url'] : Weluka::$settings['webfont_css_dir'];
		return $fname . '/' . str_replace("{%blogid}", $_blogId, Weluka::$settings['webfont_css_name']);
	}

	/**
	 * @since 1.0
	 */
	public function check_weluka_theme() {
		$curThemeName = $this->get_theme_name();
		if( ! stristr( $curThemeName, self::$settings['plugin_name'] ) ) { return false; }
		
		return true;
	}
	
	/**
	 * since 1.0
	 */
	public function get_theme_name( $short = false ) {
		$ret = wp_get_theme();
		if( $short ) { return str_replace(array("-", " "), "", $ret->name ); } else { return $ret->name; }
	}

	/**
	 * @since 1.0
	 */
	public function set_url( $url, $full = false ) {
		//if( ! $full ) {
			// siteurl to blank
			//$_siteurl = get_bloginfo( 'url' );
			//$ret = str_replace( $_siteurl, '', $url);
		//} else {
			$ret = str_replace(array("http:", "https:"), '', $url);
		//}
		return $ret;
	}
	
	/**
	 * @since 1.0
	 */
	public function unslash( $target ) {
		return wp_unslash( $target );
	}
	
	/**
	 * @since 1.0.3
	 */
	function get_base_url() {
		global $blog_id;
		
		$home_url = trailingslashit( get_home_url( null, '/' ) );
        return preg_replace( '/^(http(s)?:\/\/.+?)\/(.*)$/', '$1', $home_url );
	}
	
} //end class
register_activation_hook( __FILE__, array( 'Weluka', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Weluka', 'plugin_deactivation' ) );
$weluka = Weluka::get_instance();
$weluka->init();
