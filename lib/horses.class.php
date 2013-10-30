<?php

new WPHorses();
class WPHorses {
    
    private $mHorsesPostType = 'wphorses';
    
    public function __construct() {
        
        //Register Horse Post Type
        add_action('init', array(&$this, 'registerHorsesPostType'));
        
        
        
    }
    
    public function getHorses() {
	        $args = array(
	            'post_type' => $this->mHorsesPostType,
	            'post_status' => 'any'
	        );
	        return get_posts( $args );
	    }
    
    public function registerHorsesPostType() {
        
        $labels = array(
            'name' => 'Horses',
            'singular_name' => 'Horse',
            'add_new' => 'Add new Horse',
            'add_new_item' => 'Add new Horse',
            'edit_item' => 'Edit Horse',
            'new_item' => 'New Horse',
            'view_item' => 'View Horse',
            'search_items' => 'Search Horses',
            'not_found' => 'No Horses found',
            'not_found_in_trash' => 'No Horses found in trash',
            
            
            
        );
        
        $args = array(
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'labels' => $labels,
            'hierarchical' => false,
            'has_archive' => true,
            'query_var' => 'horse',
            'show_in_menu' => 'edit.php?post_type=' . $this->mHorsesPostType,
            
        );
        
        register_post_type($this->mHorsesPostType, $args);
    }
    
    

}