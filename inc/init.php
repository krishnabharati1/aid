<?php
session_start();
require_once ('MysqliDb.php');

$db = new MysqliDb('localhost', 'root', '', 'aid_abcd');