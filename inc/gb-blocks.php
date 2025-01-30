<?php

    add_action('acf/init', 'sb_acf_blocks');
    
    function sb_acf_blocks() {

        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            // Most Recent Post
            acf_register_block_type([
                "name" => __("mrp"),
                "title" => __("Most Recent Post"),
                "description" => __("MRP on home page"),
                "render_template" => "inc/blocks/mrp.php",
                "category" => "simpleblog",
                "icon" => "block-default",
                "keywords" => ["Most viewed post", ""],
            ]);

            // Post by Cat
            acf_register_block_type([
                "name" => __("Post by Cat"),
                "title" => __("Post by Cat"),
                "description" => __("Post by Cat on home page"),
                "render_template" => "inc/blocks/post_by_cat.php",
                "category" => "simpleblog",
                "icon" => "block-default",
                "keywords" => ["PostByCategory", ""],
            ]);
        }
    }

?>