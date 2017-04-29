<div>  
        <h2>Set Copyright</h2>  
        <form method="post" action="options.php">  
            <?php /* 下面这行代码用来保存表单中内容到数据库 */ ?>  
            <?php wp_nonce_field('update-options'); ?>  
 
            <p>  


                <textarea  
                    name="display_copyright_text" 
                    id="display_copyright_text" 
                    cols="40" 
                    rows="6"><?php echo get_option('display_copyright_text'); ?></textarea>  
            </p>  
 
            <p>  
                <input type="hidden" name="action" value="update" />  
                <input type="hidden" name="page_options" value="display_copyright_text" />  
 
                <input type="submit" value="Save" class="button-primary" />  
            </p>  
        </form>  
    </div>  