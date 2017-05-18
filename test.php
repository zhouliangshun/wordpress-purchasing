<?php 
    get_option('purchasing_status') == '0' ? print '<h1 class="entry-title">对不起，暂无代购计划</h1>' : the_title( '<h1 class="entry-title">', '</h1>' );
?>