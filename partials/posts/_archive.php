<div class="container">
    <div class="columns">
        <div class="column"></div>
        <div class="column is-half">
            <div class="level">

                <div class="level-left">
                    <h1 class="title">
                        Posts
                    </h1>
                </div>

                <div class="level-right">
                    <a href="create.php" class="button is-success is-small">
                        <span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span>Create Post</span>
                    </a>
                </div>
            </div>

            <?php if(isset($_SESSION['message'])) { ?>
                    <article class="message <?php echo $_SESSION['message_type']; ?>">
                        <div class="message-body">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    </article>
            <?php
                    unset($_SESSION['message_type']);
                    unset($_SESSION['message']);
                } 
            ?>
                        
            <hr>

            <?php 
                $post = new Post();
                $results = $post->getPosts();

                if(is_array($results))
                {
                    foreach ($results as $r) 
                    {   
                        ?>
                        <div class="box">
                            <article class="media">
                                <div class="media-content">
                                    <div class="content">
                                        <div class="level">
                                            <div class="level-left">
                                                <p>
                                                    <strong>
                                                        <a href="<?php echo "index.php?post=" . $r->slug ?>"><?php echo $r->title ?></a>
                                                    </strong>
                                                </p>
                                            </div>
                                            <div class="level-right">
                                                <a href="update.php?post=<?php echo $r->slug ?>" class="button is-small is-warning">
                                                    <span class="icon">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                    <span>Edit Post</span>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <p>
                                            <?php if(strlen($r->body) >= 80) { echo substr($r->body, 0, 80) . "..."; } else { echo $r->body; } ?>
                                        </p>

                                        <div class="level">
                                            <div class="level-left">
                                                <a href="<?php echo $_SERVER['PHP_SELF'] . "?post=" . $r->slug ?>" class="button is-small is-primary">
                                                    <span>Read More</span>
                                                    <span class="icon">
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="level-right">
                                                <form action="delete.php?slug=<?php echo $r->slug ?>" method="post">
                                                    <input type="hidden" name="slug" value="<?php echo $r->slug ?>">
                                                    <button class="button is-danger is-small" type="submit" name="delete_submit">
                                                        <span class="icon">
                                                            <i class="far fa-times-circle"></i>
                                                        </span>
                                                        <span>Delete Post</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php 
                    }
                }
            ?>

        </div>
        <div class="column"></div>
    </div>
</div>