<?php
require_once('../autoload.php');
require_once('../class/config.php');

session_unset();
session_destroy();

header("location:../index.php");