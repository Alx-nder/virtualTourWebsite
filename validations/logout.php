<?php
session_start();

session_destroy();

header('location:/virtualTourWebsite/web/index/listings.php');

?>