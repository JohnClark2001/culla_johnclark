<?php
if (!function_exists('esc')) {
    function esc($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
}
if (!function_exists('site_url')) {
    function site_url($uri = '')
    {
        return rtrim(base_url(), '/') . '/' . ltrim($uri, '/');
    }
}

