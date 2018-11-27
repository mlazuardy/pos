<?php

if(!function_exists('hasError')){
    function hasError($errors,$field,$class= "invalid-feedback"){

        if ($errors->has($field)) {
            $say = sprintf('<span %s><strong>%s</strong></span>', $class != null ? "class=$class" : '', $errors->first($field));
            return $say;
        }
    }
}