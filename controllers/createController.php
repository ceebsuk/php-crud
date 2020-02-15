<?php
require_once('./models/Post.php');

// Check to see if the form has been submitted.
if(isset($_POST['create_submit']))
{
    // Basic string validation using filter_var().
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);

    // Check to see whether any inputs are empty.
    if(!empty($title) || !empty($body))
    {
        $post = new Post();
        if($post->create($title, $body))
        {
            Util::flashMessage("success", "Success: Post created successfully.");
            header('Location: index.php');
            exit();
        }
        else
        {
            Util::flashMessage("danger", "Failed: Couldn't create post, post may already exist.");
        }
    }
    else
    {
        Util::flashMessage("danger", "Failed: The title of body fields can't be empty.");
    }
}

// If sample posts button was pressed, create 5 new sample posts.
if(isset($_POST['sample_posts_submit']))
{
    $post = new Post();

    $post->create("Lorem ipsum dolor sit amet", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam hendrerit sem nec condimentum. Vivamus convallis elementum velit, sed malesuada dui eleifend sit amet. Donec accumsan tempor augue vel posuere. Maecenas tempor accumsan augue sed ultricies. Quisque fermentum lobortis ultricies. Mauris tincidunt, turpis eu semper lobortis, risus nibh placerat orci, non posuere elit arcu in est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam feugiat finibus volutpat. Proin semper porttitor felis, posuere fermentum magna ornare ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent in commodo massa, eu placerat lorem. Curabitur tincidunt, sem ornare accumsan elementum, metus purus semper libero, ut eleifend urna lectus nec libero. Ut at ornare ante, ut maximus leo. Vestibulum mauris felis, congue id convallis ut, hendrerit ut elit.");
    
    $post->create("Nulla varius pellentesque purus et condimentum", "Nulla varius pellentesque purus et condimentum. Quisque nulla turpis, semper eget accumsan vitae, consectetur nec urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed mattis, enim sit amet aliquam finibus, tortor ligula molestie augue, sed rutrum lectus lacus ut nisi. Praesent imperdiet mauris non porta dignissim. Donec malesuada, neque et tincidunt accumsan, ligula eros consequat risus, et accumsan sem orci quis elit. In eget dui tellus. Mauris hendrerit nec nisi vitae accumsan. Pellentesque sollicitudin, enim ut interdum lobortis, odio orci viverra ante, quis porta sapien sem vel nisi. Proin odio neque, dictum in eros eget, fermentum ullamcorper turpis. Nullam luctus tincidunt quam. Maecenas pharetra nisi vel risus egestas, ac lacinia lacus iaculis. Vestibulum hendrerit, ipsum ultricies tempus porttitor, tortor lectus vehicula dui, maximus ultricies eros urna id justo. Suspendisse posuere nibh et dui laoreet maximus vel a diam.");

    $post->create("Nunc feugiat semper vulputate", "Nunc feugiat semper vulputate. Morbi augue velit, interdum eget ipsum tincidunt, tincidunt fermentum libero. Pellentesque et nulla diam. In sit amet sem sed sem placerat tempor id at ligula. Nulla consectetur est vitae urna lacinia, sed volutpat nisi pellentesque. Donec et nulla at turpis gravida tempus id at dui. Suspendisse bibendum tellus metus, sed ornare velit commodo ac.");

    $post->create("Proin sagittis ante non est tristique", "Proin sagittis ante non est tristique, et aliquet nulla rhoncus. Nulla non enim pellentesque, rutrum massa nec, interdum sapien. Pellentesque congue, mi eu rutrum auctor, justo quam eleifend lorem, a aliquet neque lacus sed urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam malesuada lectus vel nisi vestibulum rhoncus. Aenean nunc urna, rutrum vitae hendrerit a, pharetra ut massa. Ut non odio vehicula ex feugiat eleifend a vel dolor. Curabitur tristique porttitor tempor. Morbi non varius erat.");

    $post->create("Nam sed feugiat felis", "Nam sed feugiat felis. Vestibulum quis maximus ex. Sed egestas euismod tortor et elementum. Mauris at quam sem. Cras et tempus eros, eu aliquet eros. Etiam finibus pellentesque dolor, ac ullamcorper augue eleifend sed. Sed ut diam elementum, rhoncus massa eget, maximus sapien.");

    Util::flashMessage("success", "Success: Sample posts created successfully.");
    header('Location: index.php');
    exit();
}