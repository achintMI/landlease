<?php $usertype = finusertype($_SESSION['user_id']); ?>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
          </div>
           <ul class="sidebar-menu">
            <li class="treeview">
              <a href="Home.php">
                <i class="glyphicon glyphicon-home"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <?php if($usertype=='superuser'){
                ?>
              <li class="treeview">
              <a href="maintainuser.php">
                <i class="glyphicon glyphicon-user"></i> <span>Maintain User</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="adduser.php">
                <i class="fa fa-pie-chart"></i><span>Add User</span><i class="fa fa-angle-left pull-right"></i>
              </a>
             </li>

             <li class="treeview">
              <a href="maintainblock.php">
                <i class="fa fa-pie-chart"></i><span>Maintain Block</span><i class="fa fa-angle-left pull-right"></i>
              </a>
             </li>

             <li class="treeview">
              <a href="addblock.php">
                <i class="fa fa-pie-chart"></i><span>Add Block</span><i class="fa fa-angle-left pull-right"></i>
              </a>
             </li>

            <?php
            }else{
              ?>
            <li class="treeview">
              <a href="profile.php">
                <i class="glyphicon glyphicon-user"></i> <span>Add Khasra</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="grades.php">
                <i class="fa fa-pie-chart"></i><span>Audit Khasra</span><i class="fa fa-angle-left pull-right"></i>
              </a>
             </li>
            <li class="treeview">
              <a href="subject.php">
                <i class="fa fa-laptop"></i><span>Revenue</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <?php } ?>
          </ul>
        </section>

      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <center>
            <h1 class="headerFont container">

            </h1>
          </center>
        </section>
