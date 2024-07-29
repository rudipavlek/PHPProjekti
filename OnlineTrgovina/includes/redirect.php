<?php


function preusmjeri($resurs){

    if (!file_exists($resurs)) {
        header("Location: indexLogiran.php");
        exit;
    }
    
    header("Location: $resurs");
    exit;
    
}


