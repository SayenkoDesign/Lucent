<?php
require_once __DIR__.'/app/bootstrap.php';
$twig = $container->get("twig.environment");
$data = [];
$rows = [];
while(have_rows('content')) {
    the_row();
    $rows[] = $twig->render('panels/'.get_row_layout().'.html.twig', $data);
}
$data['rows'] = $rows;

// render
echo $twig->render('basic.html.twig', $data);
