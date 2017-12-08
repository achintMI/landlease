<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['user_id'])){
      include '../includes/head.php';
    ?>
      <?php include '../includes/HomeHeader.php'; ?>
      <?php include '../includes/HomeSidebar.php';?>
      <?php include '../includes/MaintainBlock.php';?>
      </div></div>
      <?php include'../includes/HomeBottom.php'; ?>
<?php }else echo "<script>alert('Error! Please try after some time');</script>"; ?>