<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('clearFilter')) {
    function clearFilter($array)
    {
        $clear = array_filter($array, function ($value) {return $value !== '';});
        $clear = array_filter($clear, function ($value) {return $value !== '.';});
        $clear = array_filter($clear, function ($value) {return $value !== '..';});
        foreach ($clear as $key=>$item) {
            $clear[$key]=str_replace('/opt/lampp/htdocs/ci3fileedit/application/views/','',$item);//dosya yolunu güncelle
        }
        return array_filter($clear, function ($value) {return $value !== null;});
    }
}

if (!function_exists('langDataFormetter')) {
    function langDataFormetter($path)
    {
        $path = str_replace('&amp;lt;', '<', $path);
        $path = str_replace('&amp;gt;', '>', $path);
        return $path;
    }
}

if(!function_exists('strip')){
    function strip($string){
        $allowed = '<div><span><pre><p><br><hr><hgroup><h1><h2><h3><h4><h5><h6>
            <ul><ol><li><dl><dt><dd><strong><em><b><i><u>
            <img><a><abbr><address><blockquote><area><audio><video>
            <form><fieldset><label><input><textarea>
            <caption><table><tbody><td><tfoot><th><thead><tr>
            <iframe>';
        return strip_tags($string,$allowed);
    }
}

if (!function_exists('checkDirectoryView')) {
    function checkDirectoryView($path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0777);
            return true;
        } else {
            return true;
        }
    }
}