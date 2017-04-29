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

define('WRPATH',dirname(__FILE__));

class Purchasing
{
    public function __Construct()
    {
        add_action( 'admin_init', 'init_admin_page' );

        add_filter( 'single_template', array($this, 'get_custom_post_type_template') );
    }


    //beigin admin page
    public function init_admin_page(){
        if(is_admin()){
            add_action( 'admin_menu', 'add_purchasing_setting_menu' );
        }
    }


    public function add_purchasing_setting_menu(){
        add_menu_page( '代购', '设置', 'administrator', '', plugins_url('purchasing/menu-setting.php'), '', 6);
        add_menu_page( '代购', '订单', 'administrator', '', plugins_url('purchasing/menu-orders.php'), '', 6);
    }

    //end admin page
    
    public function get_custom_post_type_template ($single_template) {
        
        global $post;

        if ($post->post_alias == 'purchasing') {
          $single_template = dirname( __FILE__ ) . '/templates/page-purchasing.php';
        }

        return $single_template;

    }


}

new Purchasing;

?>