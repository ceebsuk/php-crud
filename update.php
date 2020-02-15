<?php
session_start();
require_once('controllers/updateController.php');

require_once('partials/_header.php');
?>

<div class="container">
    <div class="columns">
        <div class="column"></div>
        <div class="column is-half">
            <div class="level">
                <div class="level-left">
                    <h1 class="title">
                        <a href="index.php">Posts</a> > Update
                    </h1>
                </div>
                <div class="level-right">
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

            <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                    <input type="hidden" name="slug" value="<?php echo $post->slug ?>">
                                    <div class="field">
                                        <label class="label">Title</label>
                                        <div class="control">
                                            <input class="input" type="text" name="title" placeholder="Title" value="<?php echo $post->title ?>">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label">Body</label>
                                        <div class="control">
                                            <textarea class="textarea" placeholder="Body" name="body" style="resize: none;"><?php echo $post->body ?></textarea>
                                        </div>
                                    </div>

                                    <div class="level">
                                        <div class="level-left">
                                            <a href="index.php" class="button is-success">
                                                <span class="icon">
                                                    <i class="fas fa-long-arrow-alt-left"></i>
                                                </span>
                                                <span>Back to Index</span>
                                            </a>
                                        </div>
                                        <div class="level-right">
                                            <div class="control">
                                                <button class="button is-warning" name="update_submit" type="submit">Update Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </article>
                </div>
        </div>
        <div class="column"></div>
    </div>
</div>
    
<?php require_once('partials/_footer.php'); ?>