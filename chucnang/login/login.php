<?php 
	if (isset($_SESSION['email'])){
?>
<div id="login" class="col-md-4 col-sm-12 col-xs-12 text-right">
    <div id="login-main">
        <ul>
        	<li id="user">Hello <?php echo $_SESSION['email'];?>
                <div>
                    <ul id="user-main">
                        <li><a href="./quantri/chucnang/dangxuat/dangxuat.php">Logout</a></li>
                    </ul>      
                </div>
            </li>
        </ul>
    </div>
</div>
<?php  
	}else{
?>
<div id="login" class="col-md-4 col-sm-12 col-xs-12 text-right" style="padding-top: 7px; margin-bottom: -4px;">
    <div id="login-main">
        <p><a href="./quantri/index.php">Login</a> <span> / </span> <a href="./chucnang/tao_tk/taotk.php">Sign In</a></p>
    </div>
</div>
<?php  
	}
?>