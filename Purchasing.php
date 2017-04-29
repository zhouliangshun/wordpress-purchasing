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

$pirchasing = new Purchasing();

class Purchasing
{
    public function __Construct()
    {
        add_action( 'admin_menu', 'add_purchasing_setting_menu' );

        add_filter( 'single_template', array($this, 'get_custom_post_type_template'));
    }


    public function add_purchasing_setting_menu(){
        add_menu_page( '设置', '代购', 'administrator', '', plugins_url('purchasing/menu-setting.php'), '', 6);
        add_menu_page( '订单', '代购', 'administrator', '', plugins_url('purchasing/menu-orders.php'), '', 6);
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