<?php
session_start();
if(empty($_SESSION['activeA'])){
  header('Location: ./');
}
?>