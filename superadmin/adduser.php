<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['user_id'])){
      include '../includes/head.php';
    ?>
      <?php include '../includes/HomeHeader.php'; ?>
      <?php include '../includes/HomeSidebar.php';?>
        <div class="container">
          <div class="row well">
            <center><h2><strong>ADD USER</strong></h2></center>
            <table class="table table-bordered" border="1">
            <tbody>
               <form id="adduser" action='adduservalidate.php' method='post'>
              <tr>
                <td>1</td>
                <td> <strong>Username: </strong></td>
                <td><input type="text" name="username" placeholder="Username" required="required"><hr></td>
              </tr>
              <tr>
                <td>2</td><hr>
                <td><strong>Email: </strong></td>
                <td><input type="email" name="email" placeholder="Email" required="required"><hr></td>
              </tr>
              <tr>
                <td>3 </td>
                <td><strong>Password: </strong></td>
                <td><input type="password" placeholder="password" name="password" required="required"><hr></td>
              </tr>
              <tr>
                <td>4 </td>
                <td><strong>Confirm Password: </strong></td>
                <td><input type="password" placeholder="Re-type Password" name="cpassword" required="required"><hr></td>
              </tr>
              <tr>
                <td>5 </td>
                <td><strong>User Type: </strong></td>
                <td><select class="selectpicker" name='user_type'>
                    <option>Choos Option</option>
                    <option value='admin'>Admin</option>
                    <option value='user'>User</option>
                    <option value='superuser'>Super User</option>
                    </select></td>
              </tr>

              <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Add User" class="btn btn-primary btn-flat"></td>
              </tr>
            </form>
            
            </tbody>
          </table>
          </div>
        </div>
          <script type="text/javascript" src="../js/jquery.min.js"></script>
          <script type="text/javascript">
          $(function() {
              $("#adduser").submit(function(event) {
                  event.preventDefault();
                  var friendForm = $(this);
                  var posting = $.post( friendForm.attr('action'), friendForm.serialize() );
                  posting.done(function(data) {
                      alert('User Successfully Added');
                      window.location = "maintainuser.php";
                  });
                  posting.fail(function(data) {
                      alert('Failed to Add');
                      window.location = "maintainuser.php";
                  });
              });
          });
          </script>

        </div>

      ?>
      </div></div>
      <?php include'../includes/HomeBottom.php'; ?>
<?php }else echo "<script>alert('Error! Please try after some time');</script>"; ?>