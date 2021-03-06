<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistema de Exámenes complexivos </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="css/styles.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="css/styleprint.css" media="print">
<link href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript">
function imprimir(id)
    {
        var div, imp;
        div = document.getElementById(id);//seleccionamos el objeto
        imp = window.open(" ","Formato de Impresion"); //damos un titulo
        imp.document.open();     //abrimos
        imp.document.write('<title>SIG2PC v0.2</title>'); //tambien podriamos agregarle un <link ...
        imp.document.write('<link rel="stylesheet" type="text/css" href="css/styleprint.css">'); //tambien podriamos agregarle un <link ...
        imp.document.write(div.innerHTML);//agregamos el objeto
        imp.document.close();
        imp.print();   //Abrimos la opcion de imprimir
        imp.close(); //cerramos la ventana nueva
    }</script>  
<body>
<div id="headerwrap">
  <header id="mainheader" class="bodywidth clear"> <img src="images/logo.png" alt="" class="logo">
    <hgroup id="websitetitle">
      <h1><span class="bold">Sistema de Examenes Complexivos</span>Version 1</h1>
    </hgroup>
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
if ($_SESSION["acceso"]==1) {
  echo "<aside id='introduction' class='bodywidth clear'>
  <div id='introleft'>
  <h2>Menú de opciones para <span class='blue'>Administrador</span></h2>
    <p><a href='mallas.php' class='findoutmore'>Areas del conocimiento</a>
     <p><a href='index_admin.php' class='findoutmore'>Lista de cuestionarios</a></p>
  </div>
</aside>";
}
if ($_SESSION["acceso"]==2) {
  echo "<aside id='introduction' class='bodywidth clear'>
  <div id='introleft'>
  <h2>Menú de opciones para <span class='blue'>Estudiante</span></h2>
    <p><a href='index_estudiante.php' class='findoutmore'>Cuestionarios</a>
    <p><a href='#' class='findoutmore'>Simulaciones</a>
  </div>
</aside>";
}
if ($_SESSION["acceso"]==3) {
  echo "<aside id='introduction' class='bodywidth clear'>
  <div id='introleft'>
  <h2>Menú de opciones para <span class='blue'>Docente</span></h2>
    <p><a href='index_docente.php' class='findoutmore'>Cuestionarios</a>
  </div>
</aside>";
}
 ?>
