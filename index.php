<?php

require_once 'data/MerchantData.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <title>Please Confirm Your Order</title> -->
    <title>Order - <?php echo $merchant->name ?></title>
    <link rel="stylesheet" type="text/css" href="//s.staticbg.com/web/src/css/common.css?v=20220913160020240625">
    <!-- <link rel="stylesheet" type="text/css" href="//s.staticbg.com/web/src/css/shopcart_checkout.css?v=202209131600202406041153"> -->
    <link href="shopcart_checkout.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <style>
        /* Styling for disabled state */
        .disabled-button {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
</head>

<body cz-shortcut-listen="true">

    <div class="checkout-page">
        <div data-spm="0000002cj" class="shopcart-path">
            <div data-spm="0000002ck" class="wrap">
                <div data-spm="0000002cl" class="path-logo">
                    <span data-spm="0000002cn">Secure Checkout</span>
                </div>
                <div data-spm="0000002co" class="path-list">
                    <ul data-spm="0000002cp">
                        <li data-spm="0000002cq"><span data-spm="0000002cr">Shopping Cart</span></li>
                        <li data-spm="0000002cu"><span data-spm="0000002cv">Pay</span></li>
                        <li data-spm="0000002cw"><span data-spm="0000002cx">Completed</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <?php if ($merchant->enableHostedPayments) { ?>
            <form id="order_form" action="hosted-checkout.php" method="POST">
            <?php } else { ?>
                <form id="order_form" action="checkout.php" method="POST">
                <?php } ?>

                <div class="checkout-main">
                    <div class="checkout-left">
                        <div class="shipping-address-wrap " style="">
                            <div class="wrap-title">Shipping Address
                            </div>
                            <div class="address-wrap">
                                <ul class="adress-list">
                                    <li class="">
                                        <div class="select-address-wrap">
                                            <label class="radio-wrap">
                                                <input type="radio" data-phone="941600979" data-countryid="230" data-addresskey="0" data-addressid="22405704" shipto="VN" national-id-number="" ar-email="" ismiddleeast="0" name="adress" checked="" data-check="1" dpid="top_shippingAddressSelect_text_201208|placeOrder|20341211856">
                                                <i></i>
                                            </label>
                                        </div>
                                        <div class="address-info-wrap">
                                            <div class="basic-info">
                                                Vincent Vo
                                            </div>
                                            <div class="other-info">
                                                <p>48 - 50, Đường B31, KDC 91B, Phường An Khánh, Quận Ninh Kiều, TP Cần Thơ</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="addedit-address-wrap" style="display: none;">
                            <div class="wrap-title">
                                <span>Shipping Address</span>
                            </div>
                            <div class="address-content">
                            </div>
                            <div class="checkout-loading address-loading"><i></i></div>
                        </div>
                        <div class="payment-methods-wrap">
                            <div class="wrap-title">Payment Methods</div>
                            <div class="payment-methods">
                                <ul class="payment-list">
                                    <li class="online-payment active   " code="online" paycode="online" t="" dpid="middle_paymentMethodsOnlinePayment_image_201208|placeOrder|20341211867">
                                        <h3>Online Payment</h3>
                                        <div class="sprite-online_payment"></div>
                                        <div class="tips-wrap payment-tips-wrap">
                                            Online Payment: Pay with visa, MasterCard, PayPal or any our other payment methods.
                                        </div>
                                    </li>
                                    <li class="cash-on  gray" data-vaildphone="" code="sea_cod" paycode="sea_cod_payment" t="checkoutCodSubmit" dpid="middle_paymentMethodsCOD_image_201208|placeOrder|20341211868">
                                        <div class="sprite-cod"></div>
                                        <div class="tips-wrap payment-tips-wrap">
                                            Sorry, Cash&nbsp;On&nbsp;Delivery&nbsp;is only available on items labelled with the 'COD'&nbsp;tag.
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="order-previews-wrap">
                            <div class="wrap-title">Order Previews</div>
                            <div class="order-wrap">
                                <ul class="order-list">
                                    <li class="order-list-item">
                                        <h3><?php echo $merchant->header ?></h3>
                                        <div style="padding: 10px;"><?php echo $merchant->description ?></div>

                                        <div class="product-wrap">
                                            <ul class="product-list">
                                                <li class="product-list-item " data-cartid="1993859_2905-317948">

                                                    <?php
                                                    for ($i = 0; $i < count($merchant->products); $i++) {
                                                        $p = $merchant->products[$i];
                                                    ?>
                                                        <div class="product">
                                                            <div class="row-fluid">
                                                                <img class="img-rounded span2" src="<?php echo $p->imgUrl ?>">

                                                                <div class="span6">
                                                                    <h4><?php echo $p->name ?></h4>
                                                                    <p><?php echo $p->description ?></p>
                                                                </div>
                                                                <div class="pricing-box span4">
                                                                    <div class="span5">
                                                                        <div id="price<?php echo $i ?>" class="unit-price pull-right">$<?php echo number_format($p->price / 100.0, 2) ?></div>
                                                                    </div>
                                                                    <div class="span2 cross-sign">X</div>
                                                                    <div class="span5"><input id="quantity<?php echo $i ?>" name="quantity<?php echo $i ?>" class="quantity-picker span12" type="number" min="0" max="20" step="1" value="0" pattern="[0-9]*" onClick="this.select();" /></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="order-total-wrap">
                                            <ul class="total-list">
                                                <li class="total-list-item order-total-amount">
                                                    <div class="list-left-wrap order-total">
                                                        <div class="list-left">
                                                            <span>Total</span>
                                                        </div>
                                                    </div>
                                                    <div class="list-right">
                                                        <span id="totalPrice" class="price notranslate">US$3.05</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-right">
                        <div class="checkout-right-wrap">
                            <div class="discount-main-wrap discount-main-wrap-new">
                                <h3 class="wrap-title">Discounts</h3>
                                <div class="discount-item">
                                    <div class="right-wrap coupons-main-wrap ">
                                        <div class="discount-wrap select-coupon">

                                            <span class="radio-text"><i>Coupons</i> (<em class="title-text-num">0</em> available)</span>

                                            <div class="select-discount-wrap">
                                                <span class="discount-price">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="coupon-code-inputbox " data-forum="BG-Subsidized Coupon">
                                            <div data-spm="00000049Q" class="coupon-code">
                                                <div data-spm="00000049R" class="coupon-code-input "><input data-spm="00000049S" dpid="right_couponsinput_frame_20210825|placeOrder|21237022647" type="text" placeholder="Enter Coupon Code"><button data-spm="00000049U" class="disable" data-btn="use" dpid="right_inputCouponCodeUse_button_201208|placeOrder|20341211884">Apply</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="total-main-wrap total-main-wrap-new">
                                <h3 class="wrap-title">Total</h3>

                                <div class="total-payment-wrap">
                                    <label>Discount</label>
                                    <span iconv class="price" pointspaytotal="" oritotal="3.05" cart_amount="11.76">
                                        $0.00
                                    </span>
                                </div>
                                <div class="total-payment-wrap">
                                    <label>Total Payment</label>
                                    <span id="total_amount" class="price" pointspaytotal="" oritotal="3.05" cart_amount="11.76">
                                        US$3.05
                                    </span>
                                </div>
                                <div class="place-order-wrap">
                                    <!-- <a href="javascript:;" class="palce-order " data-paylabel="online" data-gift-total="3.05" usefreepay="0" dpid="right_placeOrder_button_201208|placeOrder|20341211890|1" data-valild-address="" rdid="placeOrder|1993859|basket_id-549493362">
                                Place Order
                            </a> -->
                                    <h3><a id="submit_order" class="disabled-button palce-order">Place My Order123</a></h3>
                                </div>
                                <div class="pay-tips-wrap bg-points-pay-tip">
                                    If the group fails,your payment will be refunded into your BGpay account. <br>Points used are non-refundable !
                                </div>
                            </div>
                            <div class="checkout-loading right-loading"><i></i></div>
                        </div>
                        <div class="privacy-wrap">
                            <span>When placing an order, you'll enter a third-party payment. The information you filled is only used to process your order. For more details, please see </span>
                            <a href="javascript:;" class="privacypopbtn">Privacy Policy</a>
                        </div>
                    </div>
                </div>
                </form>

                <div data-spm="0000002cy" class="shopcart-footer">
                    <div data-spm="0000002cz" class="wrap">
                        <span data-spm="0000002cH" class="link-copy">© 2024 Apactech</span>
                    </div>
                </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/validation.js"></script>
    <script type="text/javascript">
        function updateTotalAmount() {
            var totalAmount = 0;
            <?php
            for ($i = 0; $i < count($merchant->products); $i++) {
                $p = $merchant->products[$i];
            ?>
                var quantity = parseInt($("#quantity<?php echo $i ?>").val(), 10);
                totalAmount += <?php echo $p->price ?> * quantity;
                if (quantity > 0) {
                    $("#price<?php echo $i ?>").addClass("unit-price-on");
                } else {
                    $("#price<?php echo $i ?>").removeClass("unit-price-on");
                }
            <?php
            }
            ?>
            if (isNaN(totalAmount)) {
                $("#total_amount").text("$0.00");
                $("#totalPrice").text("$0.00");
                $("#submit_order").addClass("disabled-button");
            } else {
                if (parseFloat(Math.round(totalAmount) / 100.0).toFixed(2) == "0.00") {
                    $("#submit_order").addClass("disabled-button");
                } else {

                    $("#submit_order").removeClass("disabled-button");
                }

                $("#totalPrice").text("$" + parseFloat(Math.round(totalAmount) / 100.0).toFixed(2));
                $("#total_amount").text("$" + parseFloat(Math.round(totalAmount) / 100.0).toFixed(2));
            }
        }

        function validated() {
            var isEmptyOrder = true;
            <?php for ($i = 0; $i < count($merchant->products); $i++) { ?>
                if (isEmptyOrder && parseInt($("#quantity<?php echo $i ?>").val(), 10) > 0) {
                    isEmptyOrder = false;
                }
                if (parseInt($("#quantity<?php echo $i ?>").val(), 10) > 20) {
                    alert("You can only select up to 20 items for each product.");
                    return false;
                }
            <?php } ?>
            if (isEmptyOrder) {
                alert("Please select some products.");
                return false;
            }
            return true;
        }

        $(document).ready(function() {
            updateTotalAmount();
            <?php for ($i = 0; $i < count($merchant->products); $i++) { ?>
                $("#quantity<?php echo $i ?>").bind("change", updateTotalAmount);
                $("#quantity<?php echo $i ?>").keydown(digitsOnly);
            <?php } ?>

            $("#submit_order").click(function() {
                if (validated()) {
                    $("#order_form").submit();
                }
            });
        });
    </script>
</body>

</html>