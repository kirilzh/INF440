<?php
$crumbs = explode("/", $_SERVER["REQUEST_URI"]);

echo '<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>';
foreach (array_slice($crumbs, 1) as $crumb) {
    echo '<li class="breadcrumb-item"><a href="' . $crumb . '">' . ucfirst(str_replace(array(".php", "_"), array(""," "), $crumb)) . '</a></li>';
}
echo '</ol></nav>';
