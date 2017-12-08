<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['user_id'])){
      include '../includes/head.php';
    ?>
      <?php include '../includes/HomeHeader.php'; ?>
      <?php include '../includes/HomeSidebar.php';?>
      <?php
        $id = $_GET['id'];
        $userdeatils = getUserDetails($_GET['id']);
        $row = mysql_fetch_array($userdeatils);
        ?>
        <div class="container">
          <span><h2><center><strong>EDIT USER</strong></center></h2></span>
          <div class="row well">
            <table class="table table-bordered">
            <tbody>
               <form id="edituserform" action='edituservalidate.php' method='post'>
              <tr>
                <td>1</td>
                <td> <strong>Username: </strong></td>
                <td><input type="text" value="<?php echo $row['username']; ?>" name="username"></td>
              </tr>
              <tr>
                <td>2</td>
                <td><strong>Email: </strong></td>
                <td><input type="text" value="<?php echo $row['user_email']; ?>" name="email"></td>
              </tr>
              <tr>
                <td>3 </td>
                <td><strong>Password: </strong></td>
                <td><input type="text" placeholder="Enter password to change" name="password"></td>
                <input type="text" name="user_id" value="<?php echo $id; ?>" hidden>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            
            </tbody>
          </table>
          <table>
            <tbody>
            <tr>
              <td><input type="Submit" class="btn btn-primary btn-flat" value='Update'></form></td>
              <td></td>
              <td>
                 <form method="post" action="deleteuser.php" id='deleteuser'>
              <input type="submit" class="btn btn-danger btn-flat" value='Delete'>
              <input type="text" value="<?php echo $id; ?>" name='id' hidden>
            </form>
              </td>
            </tr>
          </tbody>
          </table>
          <br><hr>
         
          </div>
          <script type="text/javascript" src="../js/jquery.min.js"></script>
          <script type="text/javascript">
          $(function() {
              $("#edituserform").submit(function(event) {
                  event.preventDefault();
                  var friendForm = $(this);
                  var posting = $.post( friendForm.attr('action'), friendForm.serialize() );
                  posting.done(function(data) {
                      alert('User Updated Successfully');
                      window.location = "maintainuser.php";
                  });
                  posting.fail(function(data) {
                      alert('Failed to Updated');
                      window.location = "maintainuser.php";
                  });
              });
              $("#deleteuser").submit(function(event) {
                  var result = confirm('Are you sure you want to delete');
                  if (result){
                      event.preventDefault();
                      var friendForm = $(this);
                      var posting = $.post( friendForm.attr('action'), friendForm.serialize() );
                      posting.done(function(data) {
                          alert('User deleted Successfully');
                          window.location = "maintainuser.php";
                      });
                      posting.fail(function(data) {
                          alert('Failed to Updated');
                          window.location = "maintainuser.php";
                      });
                    }
                 });
          });
          </script>

        </div>

      ?>
      </div></div>
      <?php include'../includes/HomeBottom.php'; ?>
<?php }else echo "<script>alert('Error! Please try after some time');</script>"; ?>