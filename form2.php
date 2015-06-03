<?php

$name=$_POST["name"];
$topic=$_POST["topic"];
$message=$_POST["message"];

    $dblocation = "localhost";
    $dbname = "my_bd";
    $dbuser = "root";
    $dbpasswd = "";
    $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
    if (!$dbcnx) 
    {
      echo( "<P>В настоящий момент сервер базы данных не доступен, поэтому 
                корректное отображение страницы невозможно.</P>" );
      exit();
    }
	echo '<br>';
	$dba='create database my_db';
	if (!@mysql_query($dba, $dbcnx)) 
    {
      echo( "<P>Ошибка при создании базы данных.</P>".mysql_errno() );
     }	   
	  
?>	
   
<?php   
	mysql_select_db($dbname);


  $sql= "CREATE TABLE TOOL(name text, topic text, message text)";
    if (!@mysql_query($sql))
	{
	echo " Ошибка при создании таблицы!".mysql_errno();;}
   ?>
   
   <?php
    $sql = 'INSERT INTO user(name, topic, message)
    VALUES("'.$name.'", "'.$topic.'", "'.$message.'")';
     if(!mysql_query($sql)) {
	 echo "<br>ошибка при добавлении данных!";}
	 
	  $sql="SELECT * FROM user";
	  $res=mysql_query($sql);
	  while ($memberinfo=mysql_fetch_array($res))
	 {
	 echo ' '.$memberinfo["name"].' '.$memberinfo["topic"].' '.$memberinfo["message"].' ';
	 }
?>
  

<?php
 $dba='DROP DATABASE my_db';
	   if (!@mysql_query($dba, $dbcnx)) 
    {
      echo( "<P>  ошибка при удалении бызы данных.</P>" );
       
	   }
	     ?>
