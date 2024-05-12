<?php
session_start();
require_once(dirname(__DIR__,1).'/src/models/Pages.php');
$page = new Pages;

session_unset();
session_destroy();

$pageDisplay = $page->redirectTO();