<?php
session_start();
require_once('models/Post.php');

require_once('partials/_header.php');

// Require the readController to handle URL Params and render relevent partial.
require_once('controllers/readController.php');

require_once('partials/_footer.php');