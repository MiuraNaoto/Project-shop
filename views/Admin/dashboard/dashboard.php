<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("../layout/header.php") ?>

</head>
<style>
  a.custom-card:hover {
    text-decoration: none;
  }
</style>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include_once("../layout/sidebar.php") ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include_once("../layout/topbar.php") ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <!-- <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">รายได้ต่อเดือน</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xl font-weight-bold text-success text-uppercase mb-1">สินค้าทั้งหมด</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">127</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="../order/order.php" class="custom-card">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-info text-uppercase mb-1">คำสั่งซื้อ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-file-contract fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="../delivery/delivery.php" class="custom-card">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">ที่ต้องจัดส่ง</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div> -->
          <!-- Content Row -->

          <!-- <div class="row">
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="form-group col-md-6 d-flex align-items-center">
                    <div class="col-sm-8 align-self-center">
                      <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">Business Insights</h6>
                      <p class="text-mute d-flex align-items-center">ภาพรวมของข้อมูลร้านค้าที่เกี่ยวกับคำสั่งซื้อที่ยืนยันแล้ว</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div id="Business-Insights"></div>
                    </div>
                    <div class="col-sm-4 align-self-center">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5>จำนวนผู้เยี่ยมชม</h5>
                          <h3 class="text-dark">0</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                        <div class="col-sm-6">
                          <h5>ยอดเข้าชม</h5>
                          <h3 class="text-dark">0</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                      </div>
                      <br>
                      <hr>
                      <br>
                      <div class="row">
                        <div class="col-sm-6">
                          <h5>คำสั่งซื้อ</h5>
                          <h3 class="text-dark">0</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                        <div class="col-sm-6">
                          <h5>อัตราการซื้อสินค้า</h5>
                          <h3 class="text-dark">0.00%</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="form-group col-md-6 d-flex align-items-center">
                    <div class="col-sm-8 align-self-center">
                      <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">Business Insights</h6>
                      <p class="text-mute d-flex align-items-center">ภาพรวมของข้อมูลร้านค้าที่เกี่ยวกับคำสั่งซื้อที่ยืนยันแล้ว</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div id="Business-Insights"></div>
                    </div>
                    <div class="col-sm-4 align-self-center">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5>จำนวนผู้เยี่ยมชม</h5>
                          <h3 class="text-dark">0</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                        <div class="col-sm-6">
                          <h5>ยอดเข้าชม</h5>
                          <h3 class="text-dark">0</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                      </div>
                      <br>
                      <hr>
                      <br>
                      <div class="row">
                        <div class="col-sm-6">
                          <h5>คำสั่งซื้อ</h5>
                          <h3 class="text-dark">0</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                        <div class="col-sm-6">
                          <h5>อัตราการซื้อสินค้า</h5>
                          <h3 class="text-dark">0.00%</h3>
                          <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include_once("../layout/footer.php") ?>
      <script src="dashboard.js"></script>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

</body>

</html>