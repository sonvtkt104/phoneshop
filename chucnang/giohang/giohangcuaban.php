<div id="y-cart" class="col-md-4 col-sm-12 col-xs-12">
    <div id="y-cart-main">
        <p>You have <span><?php if(isset($_SESSION['giohang'])){echo count($_SESSION['giohang']);}else{echo 0;} ?></span> products in your cart!</p>
        <a href="index.php?page_layout=giohang">Cart Details</a>
    </div>
</div>