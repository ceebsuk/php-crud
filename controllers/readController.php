<?php

// Check to see if the post variable is in the URL.
if(isset($_GET['post']))
{
    // Basic string validation using filter_var().
    $slug = filter_var($_GET['post'], FILTER_SANITIZE_STRING);
    
    $fetch = new Post();
    $post = $fetch->getPostBySlug($slug);

    // If the Post exists, render the partial or return a 404 response.
    if($post)
    {
        include_once('./partials/posts/_singular.php');
    }
    else
    {
        http_response_code(404);
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}
else
{
    // If there is no post, render the archive of Posts.
    include_once('./partials/posts/_archive.php');
}