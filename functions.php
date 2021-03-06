<?php
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts', 'vuetwentyseventeen_enqueue_spa_scripts');
function vuetwentyseventeen_enqueue_spa_scripts() {
    if (is_page_template('templates/vue-search-app-template.php')) {
        
        // register the Vue build script
        wp_register_script( // the app build script generated by Webpack
            'vue_search_app',
            'http://localhost:8080/dist/build.js',
            array(),
            false,
            true,
        );

        // enqueue the Vue app script with localized data
        wp_enqueue_script('vue_search_app');
    }
}