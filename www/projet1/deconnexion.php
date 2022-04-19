<?php
require 'config.php';
session_start();
?>
<?php

session_unset();
header('location:index.php');
?>

