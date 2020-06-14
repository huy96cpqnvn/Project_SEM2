<?php


namespace App\Helpers;


class Hightlight
{
    public static function show($input, $value)
    {

        $value = str_replace($input,"<span style='color: blue'>$input</span>",$value);
        return $value;
    }
}
