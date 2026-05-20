<?php
    $imagesDir = "/Księgarnia/images/";

    function getImagePath($imageName){
        return $GLOBALS["imagesDir"] . $imageName;
    }
?>