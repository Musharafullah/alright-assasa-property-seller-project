<?php

use Illuminate\Support\Str;

if (!function_exists("get_title_string")) {
    function get_title_string(string $str): string
    {
        return Str::title(Str::replace("_", " ", $str));
    }
}