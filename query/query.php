<?php
include_once("../../../dbConnect.php");

// PART-USER
function getUserTitle()
{
    $sql = "SELECT * FROM `user-title`";
    $DATA = selectData($sql);
    return $DATA;
}

function getUserTitleByid($utid)
{
    $sql = "SELECT * FROM `user-title`   WHERE `id` = $utid";
    $DATA = selectData($sql);
    return $DATA;
}

function getUserTitleSelect($utid)
{
    $sql = "SELECT * FROM `user-title` WHERE `id` != $utid";
    $DATA = selectData($sql);
    return $DATA;
}

function getAllUser()
{
    $sql = "SELECT * FROM `user-list`";
    $DATA = selectData($sql);
    return $DATA;
}

function getUser($uid)
{
    $sql = "SELECT * FROM `user-list` WHERE `uid` = $uid";
    $DATA = selectData($sql);
    return $DATA;
}

function getSeller($shop_id)
{
    $sql = "SELECT * FROM `seller-list` WHERE `shop_id` = $shop_id";
    $DATA = selectData($sql);
    return $DATA;
}

function getsalerInfo($shop_id)
{
    $sql = "SELECT * FROM `seller-list` 
                        INNER JOIN `user-list` ON `seller-list`.`shop_id` = `user-list`.`shop_id`
                        INNER JOIN `user-title` ON `seller-list`.`title_id` = `user-title`.`id`
                        INNER JOIN `subdistricts` ON `seller-list`.`subdistrict_shop` = `subdistricts`.`id`
                        INNER JOIN `districts` ON  `subdistricts`.`district_id` = `districts`.`id`
                        INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
            WHERE `seller-list`.`shop_id` = $shop_id";
    $DATA = selectData($sql);
    return $DATA;
}

function getBankAccount($shop_id)
{
    $sql = "SELECT * FROM `bank_account` 
                    INNER JOIN `bank` ON `bank_account`.`bankid` = `bank`.`id`
                    WHERE `bank_account`.`shop_id` = $shop_id";
    $DATA = selectData($sql);
    return $DATA;
}

function getBankShop()
{
    $sql = "SELECT * FROM `orders` 
                    INNER JOIN `bank_account` ON `orders`.`shop_id` = `bank_account`.`shop_id` 
                    INNER JOIN `bank` ON `bank_account`.`bankid` = `bank`.`id`
            GROUP BY `bank`.`id`";
    $DATA = selectData($sql);
    return $DATA;
}

function chackBankCode($account_code)
{
    $sql = "SELECT * FROM `bank_account` 
    INNER JOIN `bank` ON `bank_account`.`bankid` = `bank`.`id`
    WHERE `account_code` = $account_code";
    $DATA = selectData($sql);
    return $DATA;
}

function getBank()
{
    $sql = "SELECT * FROM `bank`";
    $DATA = selectData($sql);
    return $DATA;
}

function getAddressUser($uid)
{
    $sql = "SELECT * FROM `delivery_address`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    WHERE `delivery_address`.`uid` = $uid";
    $DATA = selectData($sql);
    return $DATA;
}

function updateAddressDelivery($daid)
{
    $sql = "SELECT * FROM `delivery_address` WHERE `daid` = $daid";
    $DATA = selectData($sql);
    return $DATA;
}

// PART-LOCATION 
function getProvince()
{
    $sql = "SELECT * FROM `provinces`";
    $DATA = selectData($sql);
    return $DATA;
}

function getDistricts()
{
    $sql = "SELECT * FROM `districts`";
    $DATA = selectData($sql);
    return $DATA;
}

function getSubDistricts()
{
    $sql = "SELECT * FROM `subdistricts`";
    $DATA = selectData($sql);
    return $DATA;
}

// PART-PRODUCT
function getProductType()
{
    $sql = "SELECT * FROM `product_type`";
    $DATA = selectData($sql);
    return $DATA;
}

function getAllProduct()
{
    $sql = "SELECT * FROM `product`";
    $DATA = selectData($sql);
    return $DATA;
}

function getProductByID($product_id)
{
    $sql = "SELECT * FROM `product` INNER JOIN `product_type` ON `product`.`product_type` = `product_type`.`id` WHERE `product_id` = $product_id";
    $DATA = selectData($sql);
    return $DATA;
}

function getAllProductByType($type_id)
{
    $sql = "SELECT * FROM `product` INNER JOIN `product_type` ON `product`.`product_type` = `product_type`.`id` WHERE `product_type` = $type_id";
    $DATA = selectData($sql);
    return $DATA;
}

function getTypeProduct($type_id)
{
    $sql = "SELECT * FROM `product_type` WHERE `id` = $type_id";
    $DATA = selectData($sql);
    return $DATA;
}

function getProductDetail($product_id)
{
    $sql = "SELECT * FROM `product` 
                    INNER JOIN `product_type` ON `product`.`product_type` = `product_type`.`id` 
                    INNER JOIN `seller-list` ON `product`.`shop_id` = `seller-list`.`shop_id`
            WHERE `product`.`product_id` = '$product_id'";
    $DATA = selectData($sql);
    return $DATA;
}

function getProductByShopID($shop_id)
{
    $sql = "SELECT * FROM `product` 
                    INNER JOIN `product_type` ON `product`.`product_type` = `product_type`.`id` 
                    INNER JOIN `seller-list` ON `product`.`shop_id` = `seller-list`.`shop_id` 
            WHERE `seller-list`.`shop_id` = '$shop_id'";
    $DATA = selectData($sql);
    return $DATA;
}

function getRelateProducts($product_type)
{
    $sql = "SELECT * FROM `product` 
                    INNER JOIN `product_type` ON `product`.`product_type` = `product_type`.`id` 
                    INNER JOIN `seller-list` ON `product`.`shop_id` = `seller-list`.`shop_id` 
            WHERE `product`.`product_type` = '$product_type' ORDER BY RAND()";
    $DATA = selectData($sql);
    return $DATA;
}

function getShopProfile($shop_id)
{
    $sql = "SELECT * FROM `seller-list` 
                    INNER JOIN  `product` ON `product`.`shop_id` = `seller-list`.`shop_id` 
                    INNER JOIN `product_type` ON `product`.`product_type` = `product_type`.`id`  
                    INNER JOIN `subdistricts` ON `seller-list`.`subdistrict_shop` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
            WHERE `seller-list`.`shop_id` = '$shop_id'";
    $DATA = selectData($sql);
    return $DATA;
}

function getDeliveryType()
{
    $sql = "SELECT * FROM `delivery_type`";
    $DATA = selectData($sql);
    return $DATA;
}

function getShopingCart($uid)
{
    $sql = "SELECT * FROM `shopping_cart` 
                    INNER JOIN `product` ON `shopping_cart`.`product_id` = `product`.`product_id` 
            WHERE `uid` = '$uid'";
    $DATA = selectData($sql);
    return $DATA;
}

function countShopingCart($uid)
{
    $sql = "SELECT COUNT(*) AS `count_cart` FROM `shopping_cart` WHERE `uid` = '$uid'";
    $DATA = selectDataOne($sql);
    return $DATA;
}


// ORDER
function OrderPayment($uid)
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
            WHERE `user-list`.`uid` = $uid";
    $DATA = selectData($sql);
    return ($DATA);
}

function OrderByOrdernumber($order_number)
{
    $sql = "SELECT * FROM `orders` WHERE `orders`.`order_number` = '$order_number'";
    $DATA = selectData($sql);
    return ($DATA);
}

function getAllOrder()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id`
            WHERE `orders`.`status_order` = 1 OR `orders`.`status_order` = 2";
    $DATA = selectData($sql);
    return ($DATA);
}

function getAllOrderDetail()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `orders_detail` ON `orders`.`order_id` = `orders_detail`.`orders_id`
                    INNER JOIN `product` ON `orders_detail`.`product_id` = `product`.`product_id`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `reason` ON `orders`.`reason_id` = `reason`.`id`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id` AND `orders_detail`.`status_order` = `status_order`.`so_id`";
    $DATA = selectData($sql);
    return ($DATA);
}

function getOrderDisapproved()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id`
                    INNER JOIN `reason` ON `orders`.`reason_id` = `reason`.`id`
            WHERE `orders`.`status_order` = 4";
    $DATA = selectData($sql);
    return ($DATA);
}

function getOrderCancel()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id`
                    INNER JOIN `reason` ON `orders`.`reason_id` = `reason`.`id`
            WHERE `orders`.`status_order` = 5";
    $DATA = selectData($sql);
    return ($DATA);
}

function getOrderRefund()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id`
                    INNER JOIN `reason` ON `orders`.`reason_id` = `reason`.`id`
            WHERE `orders`.`status_order` = 5 AND `orders`.`status_refund` = 0";
    $DATA = selectData($sql);
    return ($DATA);
}

function getOrderIsRefund()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id`
                    INNER JOIN `reason` ON `orders`.`reason_id` = `reason`.`id`
            WHERE `orders`.`status_order` = 5 AND `orders`.`status_refund` = 1";
    $DATA = selectData($sql);
    return ($DATA);
}

function getOrderConfirm()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id`
            WHERE `orders`.`status_order` = 3";
    $DATA = selectData($sql);
    return ($DATA);
}

function getOrderSuccess()
{
    $sql = "SELECT * FROM `orders`
                    INNER JOIN `delivery_address` ON `orders`.`daid` = `delivery_address`.`daid`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    INNER JOIN `user-list` ON `delivery_address`.`uid` = `user-list`.`uid`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `type_payment` ON `orders`.`type_payment` = `type_payment`.`tpid`
                    INNER JOIN `status_order` ON `orders`.`status_order` = `status_order`.`so_id`
                    INNER JOIN `delivery_type` ON `orders`.`delivery_type` = `delivery_type`.`id`
            WHERE `orders`.`status_order` = 6";
    $DATA = selectData($sql);
    return ($DATA);
}

// FAVOURITE
function favourite_product($product_id, $uid)
{
    $sql = "SELECT * FROM `favourite` WHERE `product_id` = '$product_id' AND `uid` = '$uid'";
    $DATA = selectData($sql);
    return ($DATA);
}


function countFavouriteByUser($uid)
{
    $sql = "SELECT COUNT(*) AS `count_fav` FROM `favourite` WHERE `uid` = '$uid'";
    $DATA = selectDataOne($sql);
    return $DATA;
}

function FavouriteByUser($uid)
{
    $sql = "SELECT * FROM `favourite` 
                    INNER JOIN `product` ON `favourite`.`product_id` = `product`.`product_id`
                    INNER JOIN `seller-list` ON `product`.`shop_id` = `seller-list`.`shop_id`
            WHERE `uid` = '$uid'";
    $DATA = selectData($sql);
    return $DATA;
}


// REASON 
function getAllReason()
{
    $sql = "SELECT * FROM `reason`";
    $DATA = selectData($sql);
    return $DATA;
}

// DELIVERY
function getAllDelivery()
{
    $sql = "SELECT * FROM `delivery_type`";
    $DATA = selectData($sql);
    return $DATA;
}
