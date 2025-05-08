<?php  
include_once '../../cauhinh/ketnoi.php';
session_start();
	if (isset($_POST['submit'])) {
		$email=$_POST['email'];
		$mat_khau=$_POST['mat_khau'];
		if (isset($email)&&isset($mat_khau)) {
			$sql="INSERT INTO thanhvien(email,mat_khau,quyen_truy_cap) VALUES('$email','$mat_khau','1')";
			$query=mysqli_query($conn,$sql);
            $_SESSION['email']=$email;
            $_SESSION['pass']=$mat_khau;
			header('location: ../../index.php');
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GreenwichMobileShop</title>

        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/datepicker3.css" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet">
    </head>

    <body>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">Registration page</div>
                    <div class="panel-body">
                        <form method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    Login: <input class="form-control" placeholder="enter your e-mail" name="email" type="email" autofocus="" required="">
                                </div>
                                <div class="form-group">
                                    Password: <input class="form-control" placeholder="enter your password" name="mat_khau" type="password" required="">
                                </div>
                                <br/>
                                <input type="submit" name="submit" value="Register" class="btn btn-primary">
                                <input type="reset" name="resset" value="Refresh" class="btn btn-danger" />
                                <a href="../../index.php"><input type="button" value="Back Home" class="btn btn-default" /></a>				
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->	
        <script src="../../js/jquery-1.11.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/chart.min.js"></script>
        <script src="../../js/chart-data.js"></script>
        <script src="../../js/easypiechart.js"></script>
        <script src="../../js/easypiechart-data.js"></script>
        <script src="../../js/bootstrap-datepicker.js"></script>
        <script>
            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>	
    </body>
</html>	