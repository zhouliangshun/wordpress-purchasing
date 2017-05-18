<?php 

/**
 * @package Purchasing(代购插件)
 * @version 1.0
 */


/*
Plugin Name: 代购插件
Plugin URI: https://github.com/zhouliangshun/wordpress-purchasing
Description: 在您的网站中加入代购功能
Author: Liangshun Zhou
Version: 1.0
Author URI: http://www.kylins.com
*/



$pirchasing = new Purchasing();


class Purchasing
{
	
	public function __Construct()
	{
		
		
		add_action( 'admin_menu', array($this,'add_purchasing_setting_menu'));
		add_action( 'wp_enqueue_scripts', array($this,'purchasing_enqueue_scripts') );
        if(is_admin()){
             add_action( 'admin_init', array($this, 'register_purchasing_settings') );
        }
		
		add_filter( 'page_template', array($this, 'get_custom_post_type_template'));
		
	}
	
	
	
	public function add_purchasing_setting_menu(){
		
		add_menu_page( '代购设置', '代购', 'manage_options','purchasing',array( $this, 'display_menu_settings' ));
		
		add_submenu_page( 'purchasing', "代购订单", '订单', 'manage_options','purchasing-order',array( $this, 'display_menu_orders' ));
		
	}
	
	
	public function display_menu_settings(){
		
		load_template(dirname( __FILE__ ) . '/templates/menu-settings.php');
		
	}
	
	
	public function display_menu_orders(){
		
		load_template( dirname( __FILE__ ) . '/templates/menu-orders.php');
		
	}
	
	
	//e	nd admin page
	
	public function get_custom_post_type_template ($page_template) {
		
		
		global $post;
		
		if ($post->post_name == 'purchasing') {
			
			$page_template = dirname( __FILE__ ) . '/templates/page-purchasing.php';
			
		}
		
		
		return $page_template;
		
		
	}
	
	
	
	public function register_purchasing_settings() {
		// 		whitelist options
		register_setting( 'purchasing_settings', 'purchasing_status' );
		
		register_setting( 'purchasing_settings', 'purchasing_location' );
	}

	public function purchasing_enqueue_scripts()
	{
		if(is_page( 'purchasing' )) {
			wp_enqueue_script( 'cart', plugin_dir_url( __FILE__ ).'templates/js/cart.js' );
			wp_enqueue_script( 'rivets-cart', plugin_dir_url( __FILE__ ).'templates/js/rivets-cart.js', array('cart'));
			wp_enqueue_script( 'purchasing', plugin_dir_url( __FILE__ ).'templates/js/purchasing.js', array('jquery'), false, true);
		}
	}
	
}


?>