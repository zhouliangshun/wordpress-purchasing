<div>  
        <h2>Set Copyright</h2>  
        <form method="post" action="options.php">  
            <?php /* 下面这行代码用来保存表单中内容到数据库 */ ?>  
            <?php wp_nonce_field('update-options'); ?>  
 
                <optgroup name='purchasing_status' label="代购状态">
                <p><option value='0' <?php if (get_option('display_copyright_text') == '0') echo 'selected' ?>>关闭</option>
                <option value='1' <?php if (get_option('display_copyright_text') == '1') echo 'selected' ?>>打开</option></p>
                </optgroup>

                <select name=‘purchasing_location’ label="代购地区" <?php if (get_option('display_copyright_text') == '0') echo 'disabled' ?>>
                    <?php
                        $location = get_option( 'purchasing_location');
                        $cates = get_category_by_slug( 'location' );
                        foreach($cates as $cate){
                            // echo '<option name='id'></option>'
                        }
                    ?>
                </select>
 
            <p>  
                <input type="hidden" name="action" value="update" />  
                <input type="hidden" name="page_options" value="display_copyright_text" />  
 
                <input type="submit" value="Save" class="button-primary" />  
            </p>  
        </form>  
    </div>  