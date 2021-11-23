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

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">QuickLinks</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Add TaxPayer Tab -->
    <a href="taxpayer_create.php" class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <br>
              <div class="display-2 mb-0 font-weight-bold text-primary text-center"><i class="fas fa-user-plus"></i></div>
              <div class="text-center">Add TaxPayer</div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <!-- View my TaxPayers -->
    <a href="taxpayer_view.php" class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <br>
              <div class="display-2 mb-0 font-weight-bold text-primary text-center"><i class="fas fa-list-alt"></i></div>
              <div class="text-center">View my TaxPayers</div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <!-- Add TaxPayer -->
    <a href="taxpayer_edit_delete.php" class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <br>
              <div class="display-2 mb-0 font-weight-bold text-primary text-center"><i class="fas fa-user-edit"></i></div>
              <div class="text-center">Add TaxPayer</div>
            </div>
          </div>
        </div>
      </div>
    </a>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Contentt -->
<?php
$layout->footer();
?>