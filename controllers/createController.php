<?php
require_once('./models/Post.php');

// Check to see if the form has been submitted.
if(isset($_POST['create_submit']))
{
    // Bastic string validation using filter_var().
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);

    // Check to see whether any inputs are empty.
    if(!empty($title) || !empty($body))
    {
        $post = new Post();
        if($post->create($title, $body))
        {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }
    }
    else
    {
        echo "The Title or Body fields cannot be empty.";
    }
}