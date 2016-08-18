<?php
require_once __DIR__.'/app/bootstrap.php';
require_once __DIR__.'/src/functions.php';

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

add_action('init', function() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Theme Options',
            'capability' => 'edit_theme_options',
            'icon_url' => 'dashicons-sayenko',
        ]);
    }
});

// google analytics
// only add if ACF is defined and value is found
if(function_exists('acf_add_options_page') && $googleID = get_field('google_analytics_id', 'option')) {
    add_action('wp_head', function () use ($googleID) {
        echo <<<HTML
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                
                ga('create', '$googleID', 'auto');
                ga('send', 'pageview');
            </script>
HTML;
    });
};