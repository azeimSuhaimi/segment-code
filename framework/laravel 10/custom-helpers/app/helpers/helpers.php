<?php

function formatDate($date, $format = 'd-m-Y') {
    return date($format, strtotime($date));
}

?>
