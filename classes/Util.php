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

    // Adds a flash message to the session.
    public static function flashMessage($type, $message)
    {
        $class = "";

        if(strtolower($type) == "success")
        {
            $class = "is-success";
        }
        else if(strtolower($type) == "danger")
        {
            $class = "is-danger";
        }
        else
        {
            $class = "is-info";
        }

        $_SESSION['message_type'] = $class;
        $_SESSION['message'] = $message;
    }
}