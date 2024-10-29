<?php
/**
 * Plugin Name:     Advanced Portfolio
 * Plugin URI:      https://shapedplugin.com/plugin/advanced-portfolio
 * Description:     Advanced Portfolio.
 * Version:         1.0.1
 * Author:          ShapedPlugin
 * Author URI:      https://shapedplugin.com/
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     advanced-portfolio
 * Domain Path:     /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles core plugin hooks and action setup.
 *
 * @package Advanced-portfolio
 *
 * @since 1.0
 */
if ( ! class_exists( 'SP_Advanced_Portfolio' ) ) {
	class SP_Advanced_Portfolio {
		/**
		 * Plugin version
		 *
		 * @var string
		 */
		public $version = '1.0.1';

		/**
		 * @var SP_AdvP_Portfolio $portfolio
		 */
		public $portfolio;

		/**
		 * @var SP_AdvP_Shortcode $shortcode
		 */
		public $shortcode;

		/**
		 * @var SP_AdvP_Taxonomy $taxonomy
		 */
		public $taxonomy;

		// /**
		// * @var SP_AdvP_Help $help
		// */
		// public $help;

		/**
		 * @var SP_AP_Router $router
		 */
		public $router;

		/**
		 * @var null
		 * @since 1.0
		 */
		protected static $_instance = null;

		/**
		 * @return SP_Advanced_Portfolio
		 * @since 1.0
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		/**
		 * Constructor.
		 */
		function __construct() {
			// Define constants.
			$this->define_constants();

			// Initialize the action hooks.
			$this->init_actions();

			// Initialize the filter hooks.
			$this->init_filters();

			// Required class file include.
			spl_autoload_register( array( $this, 'autoload' ) );

			// Include required files.
			$this->includes();

			// instantiate classes.
			$this->instantiate();

		}

		/**
		 * Define constants
		 *
		 * @since 1.0
		 */
		public function define_constants() {
			$this->define( 'SP_AP_VERSION', $this->version );
			$this->define( 'SP_AP_PATH', plugin_dir_path( __FILE__ ) );
			$this->define( 'SP_AP_URL', plugin_dir_url( __FILE__ ) );
			$this->define( 'SP_AP_BASENAME', plugin_basename( __FILE__ ) );
		}

		/**
		 * Define constant if not already set
		 *
		 * @param string      $name
		 * @param string|bool $value
		 */
		public function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		/**
		 * Initialize WordPress action hooks
		 *
		 * @return void
		 */
		function init_actions() {
			add_action( 'plugins_loaded', array( $this, 'load_text_domain' ) );
			add_action( 'manage_sp_advp_shortcodes_posts_custom_column', array( $this, 'add_shortcode_form' ), 10, 2 );
			add_action( 'manage_advanced_portfolio_posts_custom_column', array( $this, 'add_portfolio_extra_column' ), 10, 2 );
		}

		/**
		 * Initialize WordPress filter hooks
		 *
		 * @return void
		 */
		function init_filters() {
			add_filter( 'plugin_action_links', array( $this, 'add_plugin_action_links' ), 10, 2 );
			add_filter( 'manage_sp_advp_shortcodes_posts_columns', array( $this, 'add_shortcode_column' ) );
			add_filter( 'manage_advanced_portfolio_posts_columns', array( $this, 'add_portfolio_column' ) );
		}

		/**
		 * Load TextDomain for plugin.
		 */
		public function load_text_domain() {
			load_textdomain( 'advanced-portfolio', WP_LANG_DIR . '/advanced-portfolio/languages/advanced-portfolio-' . apply_filters( 'plugin_locale', get_locale(), 'advanced-portfolio' ) . '.mo' );
			load_plugin_textdomain( 'advanced-portfolio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * Add plugin action menu
		 *
		 * @param array  $links
		 * @param string $file
		 *
		 * @return array
		 */
		public function add_plugin_action_links( $links, $file ) {

			if ( $file == SP_AP_BASENAME ) {
				$new_links = array(
					sprintf( '<a href="%s">%s</a>', admin_url( 'edit.php?post_type=advanced_portfolio' ), __( 'Add Portfolio', 'advanced-portfolio' ) ),
				);

				return array_merge( $new_links, $links );
			}

			return $links;
		}

		/**
		 * Autoload class files on demand
		 *
		 * @param string $class requested class name
		 */
		function autoload( $class ) {
			$name = explode( '_', $class );
			if ( isset( $name[2] ) ) {
				$class_name = strtolower( $name[2] );
				$filename   = SP_AP_PATH . '/class/' . $class_name . '.php';

				if ( file_exists( $filename ) ) {
					require_once $filename;
				}
			}
		}

		/**
		 * Instantiate all the required classes
		 *
		 * @since 1.0
		 */
		function instantiate() {
			$this->portfolio = SP_AdvP_Portfolio::getInstance();
			$this->shortcode = SP_AdvP_Shortcode::getInstance();
			$this->taxonomy  = SP_AdvP_Taxonomy::getInstance();
			// $this->taxonomy = SP_AdvP_Help::getInstance();
			do_action( 'sp_ap_instantiate', $this );
		}

		/**
		 * Page router instantiate
		 *
		 * @since 1.0
		 */
		function page() {
			$this->router = SP_AP_Router::instance();

			return $this->router;
		}

		/**
		 * Include the required files
		 *
		 * @return void
		 */
		function includes() {
			$this->page()->sp_advp_function();
			$this->page()->sp_advp_metabox();
			$this->router->includes();
		}

		/**
		 * ShortCode Column
		 *
		 * @param $columns
		 *
		 * @return array
		 */
		function add_shortcode_column() {
			$new_columns['cb']        = '<input type="checkbox" />';
			$new_columns['title']     = __( 'Title', 'advanced-portfolio' );
			$new_columns['shortcode'] = __( 'Shortcode', 'advanced-portfolio' );
			$new_columns['']          = '';
			$new_columns['date']      = __( 'Date', 'advanced-portfolio' );

			return $new_columns;
		}

		/**
		 * ShortCode Column Form
		 *
		 * @param $column
		 * @param $post_id
		 */
		function add_shortcode_form( $column, $post_id ) {
			switch ( $column ) {
				case 'shortcode':
					$column_field = '<input style="width: 230px;padding: 6px;" type="text" onClick="this.select();" readonly="readonly" value="[advanced_portfolio ' . 'id=&quot;' . $post_id . '&quot;' . ']"/>';
					echo $column_field;
					break;
				default:
					break;

			} // end switch
		}

		/**
		 * Portfolio Column
		 *
		 * @param $columns
		 *
		 * @return array
		 */
		function add_portfolio_column() {
			$new_columns['cb']                     = '<input type="checkbox" />';
			$new_columns['title']                  = __( 'Title', 'advanced-portfolio' );
			$new_columns['image']                  = __( 'Image', 'advanced-portfolio' );
			$new_columns['taxonomy-portfolio_cat'] = __( 'Categories', 'advanced-portfolio' );
			$new_columns['date']                   = __( 'Date', 'advanced-portfolio' );

			return $new_columns;
		}

		/**
		 * Portfolio Extra Column
		 */
		function add_portfolio_extra_column( $column, $post_id ) {

			switch ( $column ) {

				case 'image':
					add_image_size( 'sp_advp_small_img', 50, 50, true );
					$portfolio_image = get_the_post_thumbnail( get_the_ID(), 'sp_advp_small_img' );
					if ( $portfolio_image !== '' ) {
						echo $portfolio_image;
					} else {
						echo '<span aria-hidden="true">—</span>';
					}
					break;
				default:
					break;

			} // end switch

		}

	}
}

/**
 * Returns the main instance.
 *
 * @since 1.0
 *
 * @return SP_Advanced_Portfolio
 */
function sp_advanced_portfolio() {
	return SP_Advanced_Portfolio::instance();
}

/**
 * Sp_advanced_portfolio instance.
 */
sp_advanced_portfolio();
