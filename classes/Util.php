<?php

class Util 
{
    // Takes a title and converts it into a slug.
    public static function slugify($title)
    {
        $title = strtolower($title);
        $title = str_replace(' ', '-', $title);
        return $title;
    }
}