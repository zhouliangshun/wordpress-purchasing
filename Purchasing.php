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

    //end admin page
    
    public function get_custom_post_type_template ($page_template) {
        
        global $post;
        if ($post->post_name == 'purchasing') {
          $page_template = dirname( __FILE__ ) . '/templates/page-purchasing.php';
        }

        return $page_template;

    }


}

?>