<?php
session_start();
// Checking if the user is authorized to view the page
require 'classes/guards.php';
$guards = new Guards();
if (!$guards->authCheck()) { header("location:index.php"); }

// Loading the UI Element for the app
require 'classes/layouts.php';
$layout = new Layouts('dashboard');
$layout->header();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">User Details</h1>
            </div>
            <div class="display-1 mb-0 font-weight-bold text-primary text-center"><i class="fas fa-user"></i></div>

              <form class="user">
              Firstname
              <hr class="sidebar-divider">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Firstname" value="<?php echo $_COOKIE['firstname'];?>" disabled>
              </div>
              Lastname
              <hr class="sidebar-divider">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="cbn" placeholder="LatName" value="<?php echo $_COOKIE['lastname'];?>" disabled>
              </div>                
              Email
              <hr class="sidebar-divider">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="cbn" placeholder="LatName" value="<?php echo $_COOKIE['email'];?>" disabled>
              </div>
              <hr class="sidebar-divider">
              <div class="form-group">
                <input type="button" class="btn btn-primary btn-user btn-block" id="rgbtn" value="Change Password" disabled>
              </div>
              <hr>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Contentt -->
<?php
$layout->footer();
?>