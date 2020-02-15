<?php

// Check to see if the form has been submitted.
if(isset($_POST['delete_submit']))
{
    // Basic string validation using filter_var().
    $slug = filter_var($_POST['slug'], FILTER_SANITIZE_STRING);
    
    $post = new Post();

    // Call the delete method which will return a bool.
    if($post->delete($slug))
    {
        Util::flashMessage("success", "Success: Post deleted successfully.");
        header('Location: index.php');
    }
    else
    {
        Util::flashMessage("danger", "Failed: Something went wrong.");
        header('Location: index.php');
    }
}