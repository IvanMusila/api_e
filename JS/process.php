<?php

if(isset($_POST['query'])){
    $term = $_POST['query'];
} else {
    $term = '';
}
    print $term;