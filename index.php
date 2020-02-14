<?php
require_once('models/Post.php');

$title = "Index";

require_once('partials/_header.php');
?>
<div class="container">
    <div class="columns">
        <div class="column"></div>
        <div class="column is-half">
            <?php 
                $post = new Post();
                $results = $post->getPosts();

                if(is_array($results))
                {
                    foreach ($results as $r) 
                    {
                        ?> <h2><?php echo $r->title ?></h2> <?php
                        ?> <p><?php echo $r->body ?></p> <?php
                    }
                }
            ?>
        </div>
        <div class="column"></div>
    </div>
</div>
    
<?php require_once('partials/_footer.php'); ?>