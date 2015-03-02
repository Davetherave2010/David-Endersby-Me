<?php get_header(); ?>

<h1>This is 404.php</h1>


<?php
$paged = htmlspecialchars($_GET["paged"]);
echo $paged;
?>


<?php get_footer(); ?>