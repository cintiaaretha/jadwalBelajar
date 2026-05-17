<?php
session_start();
if(isset($_GET['confirm'])){
  session_destroy();
  header("Location: login.php");
  exit;

} else {
  echo "
    <script>
      let yakin = confirm('Yakin ingin logout?');

      if(yakin){
        window.location='logout.php?confirm=yes';
      } else {
        window.location='dashboard.php';
      }
    </script>
  ";
}