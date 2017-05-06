<?php
	session_start();
	require "lib.php";
	disconnect();
	header("Location: index.php");
