<?php
require_once 'app/models/Database.php';

session_start();

global $_CONFIG;
$conn = new Database($_CONFIG);
?>