<?php
session_start();
if($_SESSION['Usuario']!=null){
    $_SESSION['Usuario'] =null;
}
session_destroy();
die();

?>