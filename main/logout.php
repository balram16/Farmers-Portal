<?php
session_start();
include_once "functions.php";
session_unset();
session_destroy();
alert("Done");
redirectTo("shop.php");