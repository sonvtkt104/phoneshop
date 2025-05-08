<?php  
    ob_start();
    session_start();
    include_once'./ketnoi.php';
    if ($_SESSION['email']=='admin@kydz.lol' && $_SESSION['pass']=='admin') {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KydzAdminPanel</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span style="color: white;">Hello, <?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="quantri.php?page_layout=thongtin&email=<?php echo $_SESSION['email'];?>&pass=<?php echo $_SESSION['pass'];?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Information of users</a></li>
                                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                                <li><a href="./chucnang/dangxuat/dangxuat.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="quantri.php"><span>GreenwichPhoneShop</span>AdminPanel</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="quantri.php?page_layout=quanlytv">
                        <span data-toggle="collapse" href="#sub-item-1"><use xlink:href="#stroked-chevron-down"></use></svg></span> Members
                    </a></li></li>
        <li><a href="quantri.php?page_layout=danhsachdm">
                        <span data-toggle="collapse" href="#sub-item-2"><use xlink:href="#stroked-chevron-down"></use></svg></span> Category
                    </a></li>
                    <li > <a href="quantri.php?page_layout=danhsachsp">
                        <span data-toggle="collapse" href="#sub-item-3"><use xlink:href="#stroked-chevron-down"></use></svg></span> Products
                    </a></li></li>
                    <li ><a href="quantri.php?page_layout=blsp">
                        <span data-toggle="collapse" href="#sub-item-4"><use xlink:href="#stroked-two-messages"/></svg></span> Comments
                    </a></li></li>
      </ul>
      <form class="navbar-form navbar-top">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
                </div>

            </div>
        </nav>

        <div id="sidebar-collapse" class="sidebar">


        </div><!--/.sidebar-->

        <div class="mx-auto main">			
            <?php  
                //master page
                if(isset($_GET['page_layout'])){
                    switch ($_GET['page_layout']) {
                        case 'danhsachsp':include_once'./chucnang/sanpham/danhsachsp.php';
                            break;
                        case 'danhsachdm':include_once'./chucnang/danhmuc/danhsachdm.php';
                            break;
                        case 'suadm':include_once'./chucnang/danhmuc/suadm.php';
                            break;
                        case 'suasp':include_once'./chucnang/sanpham/suasp.php';
                            break;
                        case 'themsp':include_once'./chucnang/sanpham/themsp.php';
                            break;
                        case 'themdm':include_once'./chucnang/danhmuc/themdm.php';
                            break;
                        case 'blsp': include_once'./chucnang/binhluan/binhluan.php';
                            break;
                        case 'suabl': include_once'./chucnang/binhluan/suabl.php';
                            break;
                        case 'thembl': include_once'./chucnang/binhluan/thembl.php';
                            break;
                        case 'quanlytv': include_once'./chucnang/thanhvien/quanlytv.php';
                            break;
                        case 'themtv': include_once'./chucnang/thanhvien/themtv.php';
                            break;
                        case 'suatv': include_once'./chucnang/thanhvien/suatv.php';
                            break;
                        case 'thongtin': include_once'./chucnang/thanhvien/thongtin.php';
                            break;
                        default:include_once'./chucnang/sanpham/danhsachsp.php';
                    }
                }
                else{
                    include_once'./chucnang/sanpham/danhsachsp.php';
                }
            ?>
        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>	
        <script src="js/bootstrap-table.js"></script>
        <link rel="stylesheet" href="css/bootstrap-table.css"/>
        <script>
            $('#calendar').datepicker({
            });

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
<?php  
    }
    else{
        //header('location: index.php');
        header('location: ../index.php');
    }
?>