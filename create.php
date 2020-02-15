<?php
session_start();
require_once('controllers/createController.php');

require_once('partials/_header.php');
?>

<div class="hero-body">
    <div class="container">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-half">
                <div class="level">
                    <div class="level-left">
                        <h1 class="title">
                            <a href="index.php">Posts</a> > Create
                        </h1>
                    </div>
                    <div class="level-right">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <button class="button is-success is-outlined is-small" type="submit" name="sample_posts_submit">
                                <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span>Create Sample Posts</span>
                            </button>
                        </form>
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
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="field">
                        <label class="label">Title</label>
                        <div class="control">
                            <input class="input" type="text" name="title" placeholder="Title">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Body</label>
                        <div class="control">
                            <textarea class="textarea" placeholder="Body" name="body" style="resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="control">
                        <button class="button is-success is-outlined" name="create_submit" type="submit">Create Post</button>
                    </div>
                </form>
            </div>
            <div class="column"></div>
        </div>
    </div>
</div>
    
<?php require_once('partials/_footer.php'); ?>