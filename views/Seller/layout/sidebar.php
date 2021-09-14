<?php
// session_start();
// $USER = $_SESSION[md5('user')];
// $userId = $USER[1]['uid'];

// $sql = "SELECT * FROM `user-list` WHERE `uid` = '" . $userId . "'";
// $DATA = selectData($sql);
// if ($DATA[0]['numrow'] == 0) {
//     header("location:../../../index.php");
// }

// //get user info 
// $DATAUSER = $_SESSION[md5('user')];
// $sql = "SELECT * FROM `user-type` WHERE UTID = " . $idUT;
// $DATATPYEUSER = selectData($sql);
// $sql = "SELECT * FROM `user-type` ORDER BY UTID";
// $DATATPYE = selectData($sql);
// $color = "#006664";
// //Set pointer menu
// $sql = "SELECT `mm-mainmenu`,`mm-submenu` ";
// $sql = $sql . " FROM `main-menu-list` as L INNER JOIN `web-menu` as M ";
// $sql = $sql . " ON L.`wm-id`= M.`wm-id` ";
// $sql = $sql . " WHERE `ut-id`='" . $idUT . "'";
// $sql = $sql . " && `wm-alias`='" . $CurrentMenu . "'";

// //echo $sql."<br>";
// $DATA = selectData($sql);

// $selectedMenu1 = $DATA[1]['mm-mainmenu'];
// $selectedMenu2 = $DATA[1]['mm-submenu'];

// //Create menu list
// $sql = "SELECT `mm-mainmenu`,`mm-submenu`,`wm-name`, `wm-alias`, `wm-page`, `wm-icon`, `wm-note`";
// $sql = $sql . " FROM `main-menu-list` as L JOIN `web-menu` as M ";
// $sql = $sql . " ON L.`wm-id`=M.`wm-id` ";
// $sql = $sql . " WHERE L.`ut-id`=" . $idUT;
// $sql = $sql . " ORDER BY L.`mm-mainmenu`,L.`mm-submenu`";

// //echo $sql;
// $sql = ""
// $DATA = selectData($sql);


// $strMenu = "";

// for ($i = 1; $i <= $DATA[0]['numrow']; $i++) {

//     if ($DATA[$i]['mm-submenu'] == 0) {
//         // main menu
//         $activeStyle = "";
//         $isActive = "";
//         if ($DATA[$i]['mm-mainmenu'] == $selectedMenu1) {
//             // active main menu
//             $classType = " class='nav-item active' ";
//             $isActive = " id='activityList' ";
//             if ($DATA[$i]['mm-mainmenu'] != $DATA[$i + 1]['mm-mainmenu'])
//                 $activeStyle = " style='background-color:yellow; color:#006664;' ";
//         } else {
//             //$activeStyle = " style='background-color:red; color:#006664;' ";
//             $classType = " class='nav-item' ";
//         }

//         if ($DATA[$i]['wm-icon'] == "") {
//             $icon = "favorite";
//         } else {
//             $icon =  $DATA[$i]['wm-icon'];
//         }
//         $url = $DATA[$i]['wm-alias'] . "/" . $DATA[$i]['wm-page'];

//         if ($DATA[$i]['mm-mainmenu'] != $DATA[$i + 1]['mm-mainmenu']) {
//             $strMenu .= "
//       <li " . $classType . " " . $isActive . " >
//         <a class='nav-link' href='../" . $url . "' " . $activeStyle . " >
//           <i class='material-icons' " . $activeStyle . ">" . $icon . "</i>
//           <span>" . $DATA[$i]['wm-name'] . "</span>
//         </a>
//       </li> ";
//         } else {
//             $strMenu .= " 
//       <li " . $classType . " " . $isActive . " >
//         <a class='nav-link collapsed' href='#' 
//           data-toggle='collapse' data-target='#link-" . $i . "' 
//           aria-expanded='true' aria-controls='link-" . $i . "'>
//             <i class='material-icons'>" . $icon . "</i>
//             <span>" . $DATA[$i]['wm-name'] . "</span>
//         </a>
//         <div id='link-" . $i . "' class='collapse' 
//           aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
//         <div class=' py-2 collapse-inner rounded' 
//           style='border-left: 2px solid white; border-radius: 0% !important;'>";
//             //$strMenu .= "</div></div></li>";
//         }
//     } else { // sub menu
//         if ($DATA[$i]['mm-mainmenu'] == $selectedMenu1 && $DATA[$i]['mm-submenu'] == $selectedMenu2) {
//             // active sub menu
//             $classType = "class='collapse-item active' style='background-color:yellow'";
//         } else {
//             $classType = "class='collapse-item'";
//         }
//         $url = $DATA[$i]['wm-alias'] . "/" . $DATA[$i]['wm-page'];
//         $strMenu .= "<a " . $classType . " href='../" . $url . "' 
//     style='color:white;'>" . $DATA[$i]['wm-name'] . "</a>";

//         if ($DATA[$i]['mm-mainmenu'] != $DATA[$i + 1]['mm-mainmenu'])
//             $strMenu .= "</div></div></li>";
//     }
// }

// ?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/dashboard.php">
        <div class="sidebar-brand-icon rotate-n-90 d-flex justify-content-center d-flex align-items-center">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img src="../../../img/icon/LOGO-OTOP-WH.png" height="38" alt="">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="../dashboard/dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../product/product.php">
            <i class="fas fa-boxes"></i>
            <span>รายการสินค้า</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../order/order.php">
            <i class="fas fa-shopping-basket"></i>
            <span>คำสั่งซื้อ</span></a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="../order-cancel/order-cancel.php">
            <i class="far fa-times-circle"></i>
            <span>คำสั่งซื้อที่ไม่อนุมัติ</span></a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="../delivery/delivery.php">
            <i class="fas fa-truck"></i>
            <span>การจัดส่งสินค้า</span></a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>รายการคำสั่งซื้อ</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">คำสั่งซื้อ</a>
                <a class="collapse-item" href="cards.html">การจัดส่ง</a>
            </div>
        </div>
    </li> -->



    <li class="nav-item">
        <a class="nav-link" href="../sales/sales.php">
            <i class="fas fa-clipboard-check"></i>
            <span>การขาย</span></a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="../cancel-order/cancel-order.php">
            <i class="fas fa-ban"></i>
            <span>คำขอยกเลิก</span></a>
    </li> -->
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider">


    <div class="sidebar-heading">
        Addons
    </div>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> 

   
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

   
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->