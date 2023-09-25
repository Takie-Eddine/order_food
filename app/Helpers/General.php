<?php

if (!function_exists('uploadImage')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function uploadImage($folder,$image){
        $image->store('/', $folder);
        $filename = $image->hashName();
        return  $filename;
    }
}
