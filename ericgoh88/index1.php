<?php

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

redirect("https://gohminghui88.github.io/");

?>