<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Weluka Plugin Seo class
 * @since 1.0
 * 　
 */
class WelukaSeo {
	
	/**
	 * @since 1.0
	 */
	private static $instance = false;

	/**
	 * constructor
	 * @since 1.0
	 */
	private function __construct() {
 	}

	/**
	 * singloton instance
	 * @since 1.0
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new WelukaSeo;
		}
		return self::$instance;
	}

	/**
	 * wp_head hhok
	 * @since 1.0
	 */
	public function add_head() {
		$this->add_seotag();
	}

	/**
	 * @since 1.0
	 */
	public function get_header() {
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		if( empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) ){ return false; }
		ob_start( array( $this, 'output_callback_for_replace_html' ) );
	}

	public function output_callback_for_replace_html( $content ) {
		$ret = preg_replace( '/<title([^>]*?)\s*>([^<]*?)<\/title\s*>/is', '', $content, 1 );
		return $ret;
	}
	
	/**
	 * add <head></head> seo metatag and favicon apple-touch-icon
	 * target publish data only 
	 * @since 1.0
	 */
	public function add_seotag() {
		global $s;
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		if( empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) ){ return false; }
		
		$delim			= ' | ';
		$weluka			= Weluka::get_instance();
		$builder		= WelukaBuilder::get_instance();

		$sitename = $title = get_bloginfo('name');
		$keywords		= '';
		$description	= get_bloginfo('description');
		if( is_home() ) {

			if( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE] ) )
				$title = $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE];

			if( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS] ) )
				$keywords = $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS];

			if( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION] ) )
				$description = $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION];

		} elseif ( is_front_page() ) {
			
			$postId		= $weluka->get_post_id();
			$pageOpt	= $builder->get_builder_data($postId, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting');

			if( !empty( $pageOpt['seo_title'] ) ){ $title = $pageOpt['seo_title']; }
			elseif( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE] ) ) { $title = $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE]; }

			if( !empty( $pageOpt['seo_keywords'] ) ){ $keywords = $pageOpt['seo_keywords']; }
			elseif( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS] ) ) { $keywords = $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS]; }

			if( !empty( $pageOpt['seo_description'] ) ){ $description = $pageOpt['seo_description']; }
			elseif( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION] ) ) { $description = $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION]; }
			elseif( empty( $description ) ){ $description = get_the_excerpt(); }

		} elseif ( is_search() ) {

			$flg 			= isset( $s ) && strlen( $s ) > 0 ? true : false;
			$title			= !empty( $flg ) ? $s . $delim . $sitename : __('Search Result' , Weluka::$settings['plugin_name']) . $delim . $sitename; 
			$keywords		= !empty( $flg ) ? $s : '';
			$description	= !empty( $flg ) ? sprintf(__("It is %s search results.", Weluka::$settings['plugin_name']), $s) : '';

		} elseif ( is_tag() ) {

			$tag = single_tag_title( '', false );
			$tagDescription = tag_description();
			$title			= !empty( $tag ) ? $tag . $delim . $sitename : __('Tagcloud list' , Weluka::$settings['plugin_name']) . $delim . $sitename; 
			$keywords		= !empty( $tag ) ? $tag : '';
			$description = '';
			if( !empty( $tagDescription ) ) {
				$description = $tagDescription;
			} elseif( !empty( $tag ) ) {
				$description = sprintf(__("It is %s tagcloud list.", Weluka::$settings['plugin_name']), $tag);
			}

		} elseif ( is_tax() || is_category() ) {
			
			$termName			= single_term_title( '', false );
			if ( is_category() ) { $tax = 'category'; } else { $tax = get_query_var( 'taxonomy' ); }
			$termDescription	= term_description( 0, $tax );
			$title			= !empty( $termName ) ? $termName . $delim . $sitename : __('Category list' , Weluka::$settings['plugin_name']) . $delim . $sitename; 
			$keywords		= !empty( $termName ) ? $termName : '';
			$description = '';
			if( !empty( $termDescription ) ) {
				$description = $termDescription;
			} elseif( !empty( $termName ) ) {
				$description = sprintf(__("It is %s list.", Weluka::$settings['plugin_name']), $termName);
			}

		} elseif ( is_page() ) {

			$postId		= $weluka->get_post_id();
			$pageOpt	= $builder->get_builder_data($postId, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting');

			if( !empty( $pageOpt['seo_title'] ) ){ $title = $pageOpt['seo_title']; }
			else { $title = get_the_title( $postId ); }
			$title .= $delim . $sitename;
			
			if( !empty( $pageOpt['seo_keywords'] ) ){ $keywords = $pageOpt['seo_keywords']; }

			if( !empty( $pageOpt['seo_description'] ) ){ $description = $pageOpt['seo_description']; }
			else{ $description = get_the_excerpt(); }

		} elseif ( is_single() ) {

			$postId		= $weluka->get_post_id();
			$pageOpt	= $builder->get_builder_data($postId, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting');

			if( !empty( $pageOpt['seo_title'] ) ){ $title = $pageOpt['seo_title']; }
			else { $title = get_the_title( $postId ); }
			$title .= $delim . $sitename;

			$postType = get_query_var('post_type');
			$taxs = "";
			if( !empty($postType) ){
				//custom post TODO custom taxonomy
			} else {
				$cats = get_the_category( $postId );
				if ( !empty( $cats ) ) {
					foreach ( $cats as $cat ) {
						$keys[] = $cat->cat_name;
					}
					$taxs = implode(',', $keys);
				}
			}
			if( !empty( $pageOpt['seo_keywords'] ) ){ $keywords = $pageOpt['seo_keywords']; }
			elseif( !empty( $taxs ) ){ $keywords = $taxs; }

			if( !empty( $pageOpt['seo_description'] ) ){ $description = $pageOpt['seo_description']; }
			else{ $description = get_the_excerpt(); }

		} elseif( is_archive() || is_post_type_archive() ) {
			$keywords = '';
			$description = '';
			if( is_author() ) {
				$author = get_userdata( get_query_var( 'author' ) );
				if ( $author === false ) {
					global $wp_query;
					$author = $wp_query->get_queried_object();
				}
				$title			= $author !== false ? $author->display_name . $delim . $sitename : $sitename;
			} elseif( is_day() ) {
				$title = get_the_date() . $delim . $sitename;
			} elseif( is_month() ) {
				$title = get_the_date( 'F, Y' ) . $delim . $sitename;
			} elseif( is_year() ) {
				$title = get_the_date( 'Y' ) . $delim . $sitename;
			} elseif( is_post_type_archive() ){
				$title = post_type_archive_title( '', false) . $delim . $sitename;
			}
		} else {
			$keywords = '';
			$description = '';
		}

		$this->output_title( $title );
		$this->output_keywords( $keywords );
		$this->output_description( $description );
		ob_end_flush();
	}

	/**
	 * title tag output
	 * @since 1.0
	 */
	public function output_title( $title, $echo = true ) {
		if( empty( $title ) ) { return ""; }
		$_title = '<title>'. strip_tags( str_replace( array( "\r\n", "\n", "\r" ), ' ', stripslashes( trim( $title ) ) ) ) . '</title>';
		if( $echo ) { echo $_title; } else { return $_title; }
	}

	/**
	 * meta keywords tag output
	 * @since 1.0
	 */
	public function output_keywords( $keywords, $echo = true ) {
		if( empty( $keywords ) ) { return ""; }
		$_meta = '<meta name="keywords" itemprop="keywords" content="'. strip_tags( str_replace( array( "\r\n", "\n", "\r" ), '', stripslashes( trim( $keywords ) ) ) ) . '">';
		if( $echo ) { echo $_meta; } else { return $_meta; }
	}

	/**
	 * meta description tag output
	 * @since 1.0
	 */
	public function output_description( $description, $echo = true ) {
		if( empty( $description ) ) { return ""; }
		$_meta = '<meta name="description" itemprop="description" content="'. strip_tags( str_replace( array( "\r\n", "\n", "\r" ), ' ', stripslashes( trim( $description ) ) ) ) . '">';
		if( $echo ) { echo $_meta; } else { return $_meta; }
	}
}
