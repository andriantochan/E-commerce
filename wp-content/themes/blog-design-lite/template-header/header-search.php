<?php
/**
 *  Blog Design Lite Header Search
 *
 * @package Blog Design Lite
 * @since 1.0
 */
    
$show_search = blog_design_lite_get_theme_mod( 'show_search' );           
?>   
 <div class="header-search floatright">
        <?php
            $data_blog_design_lite_str = '{"content":';
            $data_blog_design_lite_str .= '{"effect": "fadein", "fullscreen": true, "speedIn": 300, "speedOut": 300, "delay": 300},'; 
            $data_blog_design_lite_str .= '"loader":';    
            $data_blog_design_lite_str .= '{"active": true}';     
            $data_blog_design_lite_str .= '}';
        ?>
        <a class="blog-design-lite-link" href="javascript:void(0);" data-blog-design-lite-1='<?php echo esc_attr($data_blog_design_lite_str);?>'><i class="fa fa-search"></i></a>       
        <div id="blog-design-lite-modal-1" class="blog-design-lite-modal">
          <a href="javascript:void(0);" onclick="Custombox.modal.close();" class="blog-design-lite-close"><i class="fa fa-close"></i></a>      
            <div class="blog-design-lite-search-box">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">                         
                    <input placeholder="<?php esc_html_e('Type search term and press enter', 'blog-design-lite'); ?>" type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                    <button type="submit" class="search-btn"><?php esc_html_e('Search', 'blog-design-lite'); ?></button>         
                </form><!-- end #searchform -->  
            </div>  
        </div>  
</div><!-- .header-search -->

        