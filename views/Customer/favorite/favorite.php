<!DOCTYPE html>
<html lang="en">
<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();

if (isset($_SESSION[md5('typeid')]) && isset($_SESSION[md5('username')]) && isset($_SESSION[md5('user')])) {
    $idUT = $_SESSION[md5('typeid')];
    $username = $_SESSION[md5('username')];
    $USER = $_SESSION[md5('user')];
    $uid = $USER[1]["uid"];
    $FAVOURITE = FavouriteByUser($uid);
    // echo print_r($USER);

}
?>

<head>
    <?php include_once("../layout/header.php") ?>
</head>

<body>
    <?php include_once("../layout/navbar.php"); ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="../../../index.php"><i class="fa fa-home"></i> Home</a>
                        <span>สินค้าที่ชื่นชอบ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <tbody>
                                <?php
                                for ($i = 1; $i < count($FAVOURITE); $i++) {
                                ?>
                                    <tr>
                                        <td class="cart__product__item">
                                            <div class="row">
                                                <div class="col-md-7 d-flex justify-content-start">
                                                    <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;"><?php echo $FAVOURITE[$i]["shop_name"] ?></span>
                                                    <a href="../profile-shop/profile-shop.php">
                                                        <a class="btn btn-outline-success btn-md" style="text-align: center; vertical-align: middle;" href="<?php echo "../profile-shop/profile-shop.php?shop_id=" . $FAVOURITE[$i]['shop_id'] ?>" role="button">ดูร้านค้า <i class="fas fa-store"></i></a>
                                                    </a>
                                                </div>
                                                <div class="col-md-5 d-flex justify-content-end">
                                                    <button class="btn btn-danger btn-md rounded-circle" id="favourtie" onclick="favouriteP('<?php echo $FAVOURITE[$i]['product_id']; ?>')">
                                                        <span class="icon_heart_alt"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="cart__product__item__title">
                                                <img src="<?php echo "../../../img/product/profile/" . $FAVOURITE[$i]["profile_product"] ?>" width="100px" height="100px" alt="">
                                                <div class="col-lg-12">
                                                    <h6><?php echo $FAVOURITE[$i]['product_name']; ?></h6>
                                                </div>
                                                <div class="col-lg-12 mt-2 ">
                                                    <span class="h5" style="color: #FF6633;"><?php echo "฿ ".$FAVOURITE[$i]['price']; ?></span>
                                                </div>
                                                <div class="col-lg-12 mt-2 ">
                                                    <!-- <span class="text-muted" style="font-size: 14px;">ขายได้ 1234 ชิ้น</span> -->
                                                </div>
                                            </div>
                                            <br>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
    <script src="favorite.js"></script>
</body>

</html>