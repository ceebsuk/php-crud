<?php
require_once('controllers/createController.php');

$title = "Create";

require_once('partials/_header.php');
?>

<div class="hero-body">
    <div class="container">
        <h1 class="title has-text-centered">
            Create
        </h1>
        <div class="columns">
            <div class="column"></div>
            <div class="column">
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
                        <button class="button is-link" name="create_submit" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="column"></div>
        </div>
    </div>
</div>
    
<?php require_once('partials/_footer.php'); ?>