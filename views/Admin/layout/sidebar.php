<?php
include_once("../../../dbConnect.php");

//Set pointer menu
$sql = "SELECT `mm-mainmenu`,`mm-submenu`,`ut-id` ";
$sql = $sql . " FROM `main-menu-list` as L INNER JOIN `web-menu` as M ";
$sql = $sql . " ON L.`wm-id`= M.`wm-id` ";
$sql = $sql . " WHERE `ut-id`='" . $idUT . "'";
$sql = $sql . " && `wm-alias`='" . $CurrentMenu . "'";

$DATA = selectData($sql);

$selectedMenu1 = $DATA[1]['mm-mainmenu'];
$selectedMenu2 = $DATA[1]['mm-submenu'];

//Create menu list
$sql = "SELECT `mm-mainmenu`,`mm-submenu`,`wm-name`, `wm-alias`, `wm-page`, `wm-icon`, `wm-note`";
$sql = $sql . " FROM `main-menu-list` as L JOIN `web-menu` as M ";
$sql = $sql . " ON L.`wm-id`=M.`wm-id` ";
$sql = $sql . " WHERE L.`ut-id`=" . $idUT;
$sql = $sql . " ORDER BY L.`mm-mainmenu`,L.`mm-submenu`";

$DATA = selectData($sql);

$strMenu = "";

for ($i = 1; $i <= $DATA[0]['numrow']; $i++) {
    if ($DATA[$i]['mm-submenu'] == 0) {
        // main menu
        if ($DATA[$i]['mm-mainmenu'] == $selectedMenu1) {
            // active main menu
            $classType = " class='nav-item active' ";
        } else {
            $classType = " class='nav-item' ";
        }

        if ($DATA[$i]['wm-icon'] == "") {
            $icon = "favorite";
        } else {
            $icon =  $DATA[$i]['wm-icon'];
        }


        if (($i + 1 <= $DATA[0]['numrow'] && $DATA[$i]['mm-mainmenu'] != $DATA[$i + 1]['mm-mainmenu']) || $DATA[$i]['wm-name'] == "ออกจากระบบ") {
            $url  = $DATA[$i]['wm-alias'] . "/" . $DATA[$i]['wm-page'];

            if ($DATA[$i]['wm-name'] == "กิจกรรมต่างๆ" || $DATA[$i]['wm-name'] == "จัดการผู้ใช้") {
                $strMenu .= " <li " . $classType . " id='activityList'>
                            <a class='nav-link' href='../" . $url . "'>
                              <i class='large material-icons'>" . $icon . "</i>
                              <span>" . $DATA[$i]['wm-name'] . "</span>
                            </a>
                          </li>";
            } else {
                $strMenu .= " <li " . $classType . ">
                            <a class='nav-link' href='../" . $url . "'>
                              <i class='large material-icons'>" . $icon . "</i>
                              <span>" . $DATA[$i]['wm-name'] . "</span>
                            </a>
                          </li>";
            }
        } else {

            if ($DATA[$i]['wm-name'] == "กิจกรรมต่างๆ" || $DATA[$i]['wm-name'] == "จัดการผู้ใช้") {
                $strMenu .= " <li class='nav-item' id='activityList'>
                            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#link-" . $i . "' aria-expanded='true' aria-controls='link-" . $i . "'>
                              <i class='large material-icons'>" . $icon . "</i>
                              <span>" . $DATA[$i]['wm-name'] . "</span>
                            </a>
                            <div id='link-" . $i . "' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                              <div class=' py-2 collapse-inner rounded' style='border-left: 2px solid white; border-radius: 0% !important;'>";
            } else {
                $strMenu .= " <li class='nav-item'>
                            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#link-" . $i . "' aria-expanded='true' aria-controls='link-" . $i . "'>
                              <i class='large material-icons'>" . $icon . "</i>
                              <span>" . $DATA[$i]['wm-name'] . "</span>
                            </a>
                            <div id='link-" . $i . "' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                              <div class=' py-2 collapse-inner rounded' style='border-left: 2px solid white; border-radius: 0% !important;'>";
            }
        }
    } else {
        //sub menau
        if ($DATA[$i]['mm-submenu'] == $selectedMenu2) {
            // active sub menu
            $classType = "class='collapse-item active'";
        } else {
            $classType = "class='collapse-item'";
        }

        $strMenu .= "<a " . $classType . " href='../" . $DATA[$i]['wm-alias'] . "/" . $DATA[$i]['wm-page'] . " ' style='color:white;'>" . $DATA[$i]['wm-name'] . "</a>";

        if ($DATA[$i]['mm-mainmenu'] != $DATA[$i + 1]['mm-mainmenu']) {
            $strMenu .= "</div>
                      </div>
                    </li>";
        }
    }
} //each menu  
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-90 d-flex justify-content-center d-flex align-items-center">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img src="../../../img/icon/LOGO-OTOP-WH.png" height="38" alt="">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php echo $strMenu; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->