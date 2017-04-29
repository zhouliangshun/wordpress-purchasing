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

        add_filter( 'single_template', array($this, 'get_custom_post_type_template'));
    }


    public function add_purchasing_setting_menu(){

        add_menu_page( '设置', '代购', 'manage_options','purchasing','../templates/menu-setting.php');
        add_submenu_page( 'purchasing', "代购订单", '订单', 'manage_options', 'purchasing-order', '../wordpress-purchasing/menu-orders.php' );
    }

    //end admin page
    
    public function get_custom_post_type_template ($single_template) {
        
        global $post;

        $slug = get_post_meta( $post->ID, '_wp_desired_post_slug');
        if ($slug == 'purchasing') {
          $single_template = dirname( __FILE__ ) . '/templates/page-purchasing.php';
        }

        return $single_template;

    }


}

?>