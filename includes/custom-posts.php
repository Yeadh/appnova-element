<?php

if ( ! function_exists('appnova_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function appnova_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'appnova' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'appnova' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'appnova' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'appnova' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'appnova' ),
                'add_new_item'       => __( 'Add New Portfolio', 'appnova' ),
                'new_item'           => __( 'New Portfolio', 'appnova' ),
                'edit_item'          => __( 'Edit Portfolio', 'appnova' ),
                'view_item'          => __( 'View Portfolio', 'appnova' ),
                'all_items'          => __( 'All Portfolio', 'appnova' ),
                'search_items'       => __( 'Search Portfolio', 'appnova' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'appnova' ),
                'not_found'          => __( 'No Portfolio found.', 'appnova' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'appnova' )
            ),

            'description'        => __( 'Description.', 'appnova' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'appnova' ),
                    'add_new_item'      => __( 'Add New Category', 'appnova' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'appnova_custom_post_type' );

}