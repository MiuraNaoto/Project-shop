 <?php
    include_once("../../../query/query.php");

    if (isset($_SESSION[md5('typeid')]) && isset($_SESSION[md5('username')]) && isset($_SESSION[md5('user')])) {
        $idUT = $_SESSION[md5('typeid')];
        $username = $_SESSION[md5('username')];
        $USER = $_SESSION[md5('user')];
        $uid = $USER[1]["uid"];
        // echo $username;
        // echo print_r($USER);
        // echo $uid;
        $COUNT_SHOPING_CART = countShopingCart($uid)["count_cart"];
        $COUNT_FAVOURITE = countFavouriteByUser($uid)["count_fav"];
        // echo $COUNT_SHOPING_CART;
    }


    // echo $username;
    ?>


 <!-- Page Preloder -->
 <div id="preloder">
     <div class="loader"></div>
 </div>

 <!-- Offcanvas Menu Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="offcanvas-menu-wrapper">
     <div class="offcanvas__close">+</div>
     <ul class="offcanvas__widget">
         <li><span class="icon_search search-switch"></span></li>
         <li><a href="#"><span class="icon_heart_alt"></span>
                 <div class="tip">2</div>
             </a></li>
         <li><a href="./shop-cart.html"><span class="icon_bag_alt"></span>
                 <div class="tip">2</div>
             </a></li>
     </ul>
     <div class="offcanvas__logo">
         <a href="./index.html"><img src="../../../img/logo.png" alt=""></a>
     </div>
     <div id="mobile-menu-wrap"></div>
     <div class="offcanvas__auth">
         <a href="login.php">Login</a>
         <a href="login.php">สมัครสมาชิกผู้ขาย</a>
     </div>
 </div>
 <!-- Offcanvas Menu End -->

 <!-- Header Section Begin -->
 <header class="header">
     <?php
        if (isset($username)) {
        ?>
         <div class="container-fluid">
             <div class="row">
                 <div class="col-xl-3 col-lg-2 d-flex align-items-center">
                     <div class="header__logo">
                         <a href="../../../index.php"><img src="../../../img/icon/LOGO-OTOP-WH.png" height="38" alt=""></a>
                     </div>
                 </div>
                 <div class="col-xl-6 col-lg-7 d-flex justify-content-center d-flex align-items-center">
                     <nav class="header__menu">
                         <ul>
                             <li class="search-box">
                                 <button class="btn-search">
                                     <span class="icon_search search-switch"></span>
                                 </button>
                                 <input type="text" class="input-search" placeholder="Type to Search...">
                             </li>
                         </ul>
                     </nav>
                 </div>
                 <div class="col-lg-3 align-self-center">
                     <div class="row d-flex justify-content-end">
                         <div class="col-lg-4 align-self-center ">
                             <ul class="header__right__widget d-flex justify-content-end">
                                 <li>
                                     <a href="../notification/notification.php">
                                         <i class="fa fa-bell-o" aria-hidden="true"></i>
                                         <div class="tip">1</div>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="../favorite/favorite.php">
                                         <span class="icon_heart_alt"></span>
                                         <?php
                                            if ($COUNT_FAVOURITE == 0) {
                                            } else {
                                                echo '<div class="tip">' . $COUNT_FAVOURITE . "</div>";
                                            }
                                            ?>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="../shop-cart/shop-cart.php">
                                         <span class="icon_cart_alt"></span>
                                         <?php
                                            if ($COUNT_SHOPING_CART == 0) {
                                            } else {
                                                echo '<div class="tip">' . $COUNT_SHOPING_CART . "</div>";
                                            }
                                            ?>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="../purchase/purchase.php">
                                         <span class="icon_bag_alt"></span>

                                         <div class="tip">3</div>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                         <div class="col-lg-1 text-light d-flex justify-content-center align-self-center">
                             <hr style="height: 30px; width: 1px; background-color: whitesmoke; display:block;">
                         </div>
                         <div class="col-lg-7 text-light align-self-center">
                             <div class="row">
                                 <div class="col-lg-6 d-flex justify-content-center" style="padding: 0px;">
                                     <a href="../register-saler/register-seller-verify.php" style="color: whitesmoke;">Seller Centre</a>
                                 </div>
                                 <div class="col-lg-4 d-flex justify-content-center" style="padding: 0px;">
                                     <a href="../user-profile/user-profile.php" style="color: whitesmoke;">Profile</a>
                                 </div>
                                 <div class="col-lg-2 d-flex justify-content-center" style="padding: 0px;">
                                     <a href="../../../logout.php" style="color: whitesmoke;"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a>
                                 </div>
                             </div>
                         </div>
                         <!-- <div class="col-lg-7 text-light align-self-center">
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-center align-self-center">
                                        <a href="./views/Customer/user-profile/user-profile.php"><img src="./img/profile/user.png" width="45" height="45"></a>
                                    </div>
                                    <div class="col-2 text-light d-flex justify-content-center align-self-center">
                                        <hr style="height: 30px; width: 1px; background-color: whitesmoke; display:block;">
                                    </div>
                                    <div class="col-6 d-flex justify-content-center  align-self-center">
                                        <a href="logout.php" style="color: whitesmoke;">ออกจากระบบ</a>
                                    </div>
                                </div>
                            </div> -->
                     </div>
                 </div>
             </div>
             <div class="canvas__open">
                 <i class="fa fa-bars"></i>
             </div>
         </div>
     <?php
        } else {
        ?>
         <div class="container-fluid">
             <div class="row">
                 <div class="col-xl-3 col-lg-2 d-flex align-items-center">
                     <div class="header__logo">
                         <a href="../../../index.php"><img src="../../../img/icon/LOGO-OTOP-WH.png" height="38" alt=""></a>
                     </div>
                 </div>
                 <div class="col-xl-6 col-lg-7 d-flex justify-content-center d-flex align-items-center">
                     <nav class="header__menu">
                         <ul>
                             <li class="search-box">
                                 <button class="btn-search">
                                     <span class="icon_search search-switch"></span>
                                 </button>
                                 <input type="text" class="input-search" placeholder="Type to Search...">
                             </li>
                         </ul>
                     </nav>
                 </div>
                 <div class="col-lg-3 align-self-center">
                     <div class="row d-flex justify-content-end">
                         <div class="col-lg-7 align-self-center ">
                             <!-- <ul class="header__right__widget d-flex justify-content-end">
                                 <li>
                                     <a href="./views/Customer/notification/notification.php">
                                         <i class="fa fa-bell-o" aria-hidden="true"></i>
                                         <div class="tip">1</div>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="views/Customer/favorite/favorite.php"><span class="icon_heart_alt"></span>
                                         <div class="tip">2</div>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="views/Customer/shop-cart/shop-cart.php">
                                         <span class="icon_cart_alt"></span>
                                         <div class="tip">2</div>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="views/Customer/purchase/purchase.php">
                                         <span class="icon_bag_alt"></span>

                                         <div class="tip">3</div>
                                     </a>
                                 </li>
                             </ul> -->
                         </div>
                         <!-- <div class="col-lg-1 text-light d-flex justify-content-center align-self-center">
                             <hr style="height: 30px; width: 1px; background-color: whitesmoke; display:block;">
                         </div> -->
                         <div class="col-lg-4 text-light d-flex justify-content-center align-self-center">
                             <a href="../../../login.php" style="color: whitesmoke;">เข้าสู่ระบบ</a>
                         </div>
                     </div>
                 </div>
             </div>
         <?php } ?>
         <div class="canvas__open">
             <i class="fa fa-bars"></i>
         </div>
         </div>
 </header>
 <!-- Header Section End -->