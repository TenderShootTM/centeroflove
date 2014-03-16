<?php

// load text domain for internationalization
load_theme_textdomain('col-wp');

// Add support for thumbnails in posts
add_theme_support( 'post-thumbnails' );

/*
 * Custom Functions
 */

// Return the 2-letter language abbreviation for the current language
function get_current_lang() {
    $lang_abbr = get_bloginfo('language');
    if ($lang_abbr == 'en-US') $lang_abbr = 'en';
    
    return $lang_abbr;
}

// Generate a simple language switcher
function get_lang_switcher() {
    
    $langs = icl_get_languages('skip_missing=0&order_by=code');
    if (!empty($langs)) {
        echo '<div id="language-select">';
        foreach ($langs as $l) {
            echo '<a href="'.$l['url'].'">';
            echo $l['native_name'];
            echo '</a>';
        }
        echo '</div>';
    }
}

?>