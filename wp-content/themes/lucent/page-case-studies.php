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

// render teasers
$query = new WP_Query([
    'post_type' => 'case_study',
    'nopaging' => true,
]);
$teasers = [];
while($query->have_posts()) {
    $query->the_post();
    $teasers[] = $twig->render('teasers/case-study.html.twig', $data);
}
wp_reset_postdata();
$data['teasers'] = $teasers;

// render
echo $twig->render('case-studies.html.twig', $data);
