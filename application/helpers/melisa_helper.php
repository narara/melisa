<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function detector_url($text) {
    $pattern = preg_replace("`.*?((http|ftp)://[\w#$&+,\/:;=?@.-]+)*?`i", "$1", $text);
    return $pattern;
}

function url_media_analizer($val) {
    $ext = substr($val, -4, 4);
    if (in_array($ext, array('.jpg', '.png', '.gif'))) {
        return '10';
    } elseif (in_array($ext, array('.pdf', '.zip', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'))) {
        return '10';
    } elseif (stristr($val, 'youtube.com')) {
        return '2';
    } elseif (stristr($val, 'vimeo.com')) {
        return '3';
    } elseif (stristr($val, 'soundcloud.com')) {
        return '5';
    } elseif (stristr($val, 'scribd.com')) {
        return '4';
    } elseif (stristr($val, 'slideshare.com')) {
        return '5';
    } elseif (stristr($val, 'docstoc.com')) {
        return '7';
    } else {
        return '10';
    }
}

?>