<?php
   session_start();
   
   if(session_destroy()) {
        header("Location: login_admin.php");
        echo '<script language="javascript">';
        echo 'alert("Logout successful")';
        echo '</script>';

   }
?>