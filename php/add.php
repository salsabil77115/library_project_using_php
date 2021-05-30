<?php

$mysqli = new mysqli("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');
$field1 = $mysqli->real_escape_string($_POST['title']);
$field2 = $mysqli->real_escape_string($_POST['author']);
$field3 = $mysqli->real_escape_string($_POST['publisher']);
$field4 = $mysqli->real_escape_string($_POST['copies']);
$field5 = $mysqli->real_escape_string($_POST['ISBN']);
$field6 = $mysqli->real_escape_string($_POST['img']);
$query = "INSERT INTO book VALUES ('{$field1}','{$field5}','{$field2}','{$field4}','{$field3}','{$field6}')";

$mysqli->query($query);
   
    echo"<script>alert('add successfully')</script>";
    include'adminpage.html';

    echo"<div class='row' style='
        content: '';
        clear: both;>

    <div class='colomn' style='float: left;
    display: flex;
    flex-wrap: wrap;
    margin-top: 70px;
    margin-left: 15px;'>
      <a target='_blank' href='$field6'>
        <img src='$field6' alt='Educational Research' title='Educational Research' style='width: 200px;
        height: 200px;'>
      </a>
    </div>";
    exit();

$mysqli->close();

?>