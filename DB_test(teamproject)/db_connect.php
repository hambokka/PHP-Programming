<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

$db = new mysqli("localhost","ohty","1231","oty_db");
$db->set_charset("utf-8");

function mq($sql)
{
    global $db;
    return $db->query($sql);
}
?>