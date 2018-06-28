<?php
session_start();
if(isset($_SESSION['m_id'])&& $_SESSION['m_id']!="")
{
  $_SESSION['m_id']="";
  unset($_SESSION['m_id']);
  session_destroy();
  header("location: login.php");
  
}
else
{
   header("location: login.php");
}
?>