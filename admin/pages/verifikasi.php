<?php
include ('connect.php');

$edit = pg_query("update administrator set role='c' where username='$_GET[user]'");

if($edit){
	header('location:https://gissurya.org/wisatasumbar/login.php');
}
