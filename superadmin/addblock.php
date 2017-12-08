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
            <center><h2><strong>ADD BLOCK</strong></h2></center>
            <table class="table table-bordered" border="1">
            <tbody>
               <form id="addblock" action='addblockvalidate.php' method='post'>
              <tr>
                <td>1</td>
                <td> <strong>Block Name: </strong></td>
                <td><input type="text" name="block_name" placeholder="Block Name" required="required"><hr></td>
              </tr>

              <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Add Block" class="btn btn-primary btn-flat"></td>
              </tr>
            </form>
            
            </tbody>
          </table>
          </div>
        </div>
          <script type="text/javascript" src="../js/jquery.min.js"></script>
          <script type="text/javascript">
          $(function() {
              $("#addblock").submit(function(event) {
                  event.preventDefault();
                  var friendForm = $(this);
                  var posting = $.post( friendForm.attr('action'), friendForm.serialize() );
                  posting.done(function(data) {
                      alert('Block Successfully Added');
                      window.location = "maintainuser.php";
                  });
                  posting.fail(function(data) {
                      alert('Failed to Block');
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