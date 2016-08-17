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

ob_start();
previous_post_link('%link', '&lt; Previous');
$data['previous'] = ob_get_clean();
ob_start();
next_post_link('%link', 'Next &gt;');
$data['next'] = ob_get_clean();

// render
echo $twig->render('single-case-study.html.twig', $data);
