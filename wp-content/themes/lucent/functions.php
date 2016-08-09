<?php
require_once __DIR__.'/app/bootstrap.php';
require_once __DIR__.'/src/functions.php';


add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});