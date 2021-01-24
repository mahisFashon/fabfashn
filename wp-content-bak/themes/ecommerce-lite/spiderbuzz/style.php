<?php
/**
 * Dynamic Styles
 *
*/
class Ecommerce_Lite_Custom_Style {
    static $instance;
    
    // Construct functions
    function __construct() {
        add_action('init',array($this,'init'));
    }

    //Init file
    function init(){
        // generate enline css
        add_action( 'wp_enqueue_scripts',array($this,'ecommerce_lite_inline_css') );
    }

    //Public Static fuctions
    public static function getInstance(){
        if (!is_null(self::$instance)) return self::$instance;
        self::$instance = new self;
        return self::$instance;
    }




    //Relic Fashion Inline Style
    function ecommerce_lite_inline_css(){
        $custom_css = "";


       

        /*************************************************************
         *                 Top Header section
         *********************************************************/
        $top_header_background_color = get_theme_mod('ecommerce_lite_top_header_section_background_color','#ff3030');
        $top_header_text_color      = get_theme_mod('ecommerce_lite_top_header_section_text_color','#fff');   
        $ecommerce_lite_top_header_section_sticky      = get_theme_mod('ecommerce_lite_top_header_section_sticky',false);

        $custom_css .= "

            div#top_header_section_info p{
                color:$top_header_text_color;
            }

            #top_header_section_enable
            {
                background-color: $top_header_background_color;
            }\n";
        if( $ecommerce_lite_top_header_section_sticky ){
            $custom_css .= "
            #top_header_section_enable
            {
                position: sticky;
                top: 0;
                z-index: 10
            }\n";
        }

        
        
        /*******************************************************************/
        wp_add_inline_style( 'ecommerce-lite-custom-css', $custom_css );
    }

}
Ecommerce_Lite_Custom_Style::getInstance();