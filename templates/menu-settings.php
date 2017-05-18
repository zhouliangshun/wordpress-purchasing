<div class="wrap">  
        <h1>代购设置</h1>  
        <form method="post" action="options.php">  
            <?php settings_fields( 'purchasing_settings' ); ?>
            <?php do_settings_sections( 'purchasing_settings' ); ?>
 
                <p>代购状态:
                <input name = "purchasing_status" type="radio" value='0' <?php if (get_option('purchasing_status') == '0') echo 'checked' ?>>关闭</input>
                <input name = "purchasing_status" type="radio" value='1' <?php if (get_option('purchasing_status') == '1') echo 'checked' ?>>打开</input>
                </p>

                <p>代购地区:
                <select name="purchasing_location" label="代购地区" <?php if (get_option('purchasing_status') == '0') echo 'disabled' ?>>
                    <?php
                        $location = get_option( 'purchasing_location');
                        $location_cate = get_category_by_slug( 'location' );
                        if($location_cate) {
                            $children = get_term_children( $location_cate->term_id, 'category' );
                            if($children) {
                                foreach($children as $child){
                                    $cate = get_term_by( 'id', $child, 'category' );
                                    $select = $location == $cate->term_id ? " selected='selected'" : "";
                                    echo "<option value='$cate->term_id'$select>$cate->name</option>";
                                }
                            }
                            
                        }
                        
                    ?>
                </select>
                </p>
            <?php submit_button(); ?>  
        </form>  
    </div>  