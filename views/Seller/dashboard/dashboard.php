<!DOCTYPE html>
<html lang="en">

<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$idUT = $_SESSION[md5('typeid')];
$username = $_SESSION[md5('username')];
$USER = $_SESSION[md5('user')];
$SELLER = $_SESSION[md5('shop')];
$uid = $USER[1]["uid"];
$shop_id = $SELLER[1]["shop_id"];

$CurrentMenu = "dashboard";
$PRODUCT = getProductByShopID($shop_id);
$ORDER = getAllOrder();
$ORDER_CONFIRM = getOrderConfirm();
// print_r($PRODUCT);
?>


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
          <div class="row">
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        if ($PRODUCT[0]["numrow"] == 0) {
                          echo "0 ชิ้น";
                        } else {
                          echo $PRODUCT[0]["numrow"] . "ชิ้น";
                        }
                        ?>
                      </div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                          if ($ORDER[0]["numrow"] == 0) {
                            echo "0 รายการ";
                          } else {
                            echo $ORDER[0]["numrow"] . "รายการ";
                          }
                          ?>
                        </div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                          if ($ORDER_CONFIRM[0]["numrow"] == 0) {
                            echo "0 รายการ";
                          } else {
                            echo $ORDER_CONFIRM[0]["numrow"] . "รายการ";
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- Content Row -->

          <div class="row">
            <!-- คะแนนความพึงพอใจ -->
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="col-12">
                    <h6 class="text-dark mb-1 font-weight-bold">คะแนนความพึงพอใจ</h6>
                  </div>
                  <div class="col-12">
                    <p class="text-muted mb-1">คะแนนความประพฤติร้านคำของ OTOP เป็นระบบฐานะแนนส่งเสริมให้ผู้ขายมีการบริหารร้านที่ดี ยุคิธรรมและโปร่งใส</p>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div id="star"></div>
                    </div>
                    <div class="col-md-7 align-self-center">
                      <div class="col-md-12">
                        <h5 class="text-dark mb-1">คะแนนความพึงพอใจ</h5>
                      </div>
                      <div class="col-md-12">
                        <p class="text-muted">บัญชีของคุณอยู่ในระดับยอดเยี่ยมโดยไม่มีคะแนนความประพฤติ กรุณารักษาสถิติร้านค้าของคุณเพือชนะใจผู้ซื้อและสร้างความน่าเชือถือ</p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="form-row">
                        <div class="form-group col-md-6 d-flex align-items-center">
                          <div class="col-sm-8 align-self-center">
                            <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">Business Insights</h6>
                            <p class="text-mute d-flex align-items-center">ภาพรวมของข้อมูลร้านค้าที่เกี่ยวกับคำสั่งซื้อที่ยืนยันแล้ว</p>
                          </div>
                        </div>
                        <div class="form-group col-md-6 d-flex align-items-center d-flex justify-content-end align-self-center">
                          <ul class="nav nav-pills card-header-tabs pull-right dc" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tab-1">1 วัน</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tab-2">1 เดือน</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tab-3">1 ปี</a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-pane fade show active chart chart-xl" id="tab-1" role="tabpanel" id="lineChartCovid19">
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="chart-area">
                              <canvas id="Insights1D"></canvas>
                            </div>
                          </div>
                          <div class="col-sm-4 text-left">
                            <div class="row">
                              <div class="col-sm-6">
                                <h5>จำนวนผู้เยี่ยมชม</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                              </div>
                              <div class="col-sm-6">
                                <h5>ยอดเข้าชม</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                              </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="row">
                              <div class="col-sm-6">
                                <h5>คำสั่งซื้อ</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                              </div>
                              <div class="col-sm-6">
                                <h5>อัตราการซื้อสินค้า</h5>
                                <h3>0.00%</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อวาน</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade text-center show chart chart-xl " id="tab-2" role="tabpanel">
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="chart-area">
                              <canvas id="Insights1M"></canvas>
                            </div>
                          </div>
                          <div class="col-sm-4 text-left">
                            <div class="row">
                              <div class="col-sm-6">
                                <h5>จำนวนผู้เยี่ยมชม</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 สัปดาห์ที่แล้ว</h6>
                              </div>
                              <div class="col-sm-6">
                                <h5>ยอดเข้าชม</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 สัปดาห์ที่แล้ว</h6>
                              </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="row">
                              <div class="col-sm-6">
                                <h5>คำสั่งซื้อ</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 สัปดาห์ที่แล้ว</h6>
                              </div>
                              <div class="col-sm-6">
                                <h5>อัตราการซื้อสินค้า</h5>
                                <h3>0.00%</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 สัปดาห์ที่แล้ว</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade text-center show chart chart-xl " id="tab-3" role="tabpanel">
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="chart-area">
                              <canvas id="Insights1Y"></canvas>
                            </div>
                          </div>
                          <div class="col-sm-4 text-left">
                            <div class="row">
                              <div class="col-sm-6">
                                <h5>จำนวนผู้เยี่ยมชม</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 ปีที่แล้ว</h6>
                              </div>
                              <div class="col-sm-6">
                                <h5>ยอดเข้าชม</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 ปีที่แล้ว</h6>
                              </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="row">
                              <div class="col-sm-6">
                                <h5>คำสั่งซื้อ</h5>
                                <h3>0</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 ปีที่แล้ว</h6>
                              </div>
                              <div class="col-sm-6">
                                <h5>อัตราการซื้อสินค้า</h5>
                                <h3>0.00%</h3>
                                <h6>0.00 % เมื่อเทียบกับเมื่อ 1 ปีที่แล้ว</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
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
                      <!-- <div class="chart-area">
                        <canvas id="Insights1D"></canvas>
                      </div> -->
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
          </div>
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