<?php

if(!function_exists('hasError')){
    function hasError($errors,$field){

        if ($errors->has($field)) {
            $say = sprintf('<span class=text-danger><strong>%s</strong></span>',$errors->first($field));
            return $say;
        }
    }
}