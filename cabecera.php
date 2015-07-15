<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistema de Exámenes complexivos </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold" rel="stylesheet" type="text/css">
</head>
<body>
<div id="headerwrap">
  <header id="mainheader" class="bodywidth clear"> <img src="images/logo.png" alt="" class="logo">
    <hgroup id="websitetitle">
      <h1><span class="bold">Sistema de Examenes Complexivos</span>Version 1</h1>
    </hgroup>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
  </header>
</div>
<?php 
include("BL/nivel_funciones.php");
include("BL/general_funciones.php");
session_start();
if (empty($_SESSION)) {
   header ('Location: login.php');
    exit (0); 
}else
echo " <form name=form action=".$_SERVER['PHP_SELF']." method='post'>
<div align=left><h4><font size=2>¡Bienvenido ". $_SESSION['user']."! </font><font size=1>(".nivel($_SESSION['acceso']).")</font>
<button type='submit' name='logout' value='salir'>
  <img src=images/exit.png width=15>
</button>";
if (isset($_POST['logout'])) {
   logout();
}
echo "</form>";
echo"</div><hr>";
 ?>