<?php
require_once('./models/Post.php');

// If the post var is set in the URL search for that specific Post.
if(isset($_GET['post']))
{
    $post = new Post();
    // Make sure the passed url is in the right slug format.
    $slug = Util::slugify(filter_var($_GET['post'], FILTER_SANITIZE_STRING));
    // Search for the post via the slug.
    $post = $post->getPostBySlug($slug);

    if(!$post)
    {
        http_response_code(404);
        header('Location: index.php');
    }
}

// Check to see if the form has been submitted.
if(isset($_POST['update_submit']))
{
    $post = new Post();
    // Make sure the passed url is in the right slug format.
    $slug = Util::slugify(filter_var($_POST['slug'], FILTER_SANITIZE_STRING));
    // Search for the post via the slug.
    $post = $post->getPostBySlug($slug);

    // Basic string validation using filter_var().
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);

    // Check to see whether any inputs are empty.
    if(!empty($title) || !empty($body))
    {
        // Update the post which returns a bool we can check for.
        if($post->update($title, $body, $slug))
        {
            Util::flashMessage("success", 'Success: Post updated successfully. <a href="index.php">Back to Posts</a>');
        }
        else
        {
            Util::flashMessage("danger", "Failed: Couldn't update Post.");
        }
    }
    else
    {
        Util::flashMessage("danger", "Failed: The title of body fields can't be empty.");
    }
}