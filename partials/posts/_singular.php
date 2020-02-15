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
                    <a href="index.php" class="button is-success is-small">
                        <span class="icon">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <span>Back to Index</span>
                    </a>
                </div>

            </div>
            
            <hr>
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>
                                    <?php echo $post->title ?>
                                </strong>
                            </p>
                            <p>
                                <?php echo $post->body ?>
                            </p>
                            <div class="level">
                                <div class="level-left">
                                    <a href="index.php" class="button is-success is-small">
                                        <span class="icon">
                                            <i class="fas fa-long-arrow-alt-left"></i>
                                        </span>
                                        <span>Back to Index</span>
                                    </a>
                                </div>
                                <div class="level-right">
                                    <form action="delete.php?slug=<?php echo $post->slug ?>" method="post">
                                        <input type="hidden" name="slug" value="<?php echo $post->slug ?>">
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

        </div>
        <div class="column"></div>
    </div>
</div>