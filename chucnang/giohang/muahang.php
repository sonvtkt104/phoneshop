<?php  
    if(isset($_SESSION['giohang'])){
        $arrid=array();
        foreach ($_SESSION['giohang'] as $id_sp => $sl) {
            $arrid[]=$id_sp;
        }
        $strId=implode(',', $arrid);
        $sql="SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
        $query=mysqli_query($conn,$sql);
    }
?>

<div id="checkout">
<h2 class="h2-bar">Confirming order</h2>
<table class="table table-bordered">
    <tr>
    <thead>
    <th>Product name</th>
    <th>Price</th>
    <th>Amount</th>
    <th>Total</th>
    </thead>
    </tr>

    <?php  
        $totalPriceAll=0;
        while ($row=mysqli_fetch_array($query)) {
            $totalPrice=$row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];
    ?>
    <tr>
        <td><?php echo $row['ten_sp']; ?></td>
        <td><span><?php echo $row['gia_sp']; ?></span></td>
        <td><?php echo $_SESSION['giohang'][$row['id_sp']]; ?></td>
        <td><span><?php echo $totalPrice; ?></span></td>
    </tr>
    <?php
        $totalPriceAll+=$totalPrice;  
        }
    ?>
    <tr>
        <td>Total price:</td>
        <td colspan="2"></td>
        <td><b><span><?php echo $totalPriceAll; ?></span></b></td>
    </tr>
</table>
</div>
<?php  
    if(isset($_POST['submit'])){
        $ten=$_POST['name'];
        $email=$_POST['mail'];
        $sdt=$_POST['mobi'];
        $diachi=$_POST['add'];
        if (isset($ten)&&isset($email)&&isset($sdt)&&isset($diachi)) { 
            if(isset($_SESSION['giohang'])){
                $arrid=array();
                foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                    $arrid[]=$id_sp;
                }
                $strId=implode(',', $arrid);
                $sql="SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
                $query=mysqli_query($conn,$sql);
            }
        $strBody="";
                // Thông tin Khách hàng
        $strBody = '<p>
            <b>Clinet name:</b> '.$ten.'<br />
            <b>Email:</b> '.$email.'<br />
            <b>Phone number:</b> '.$sdt.'<br />
            <b>Address:</b> '.$diachi.'
        </p>';
        // Danh sách Sản phẩm đã mua
        $strBody .= '<table border="1px" cellpadding="10px" cellspacing="1px" width="100%">
            <tr>
                <td align="center" bgcolor="#3F3F3F" colspan="4"><font color="white"><b>CONFIRM BILL PAYMENT</b></font></td>
            </tr>
            <tr id="invoice-bar">
                <td width="45%"><b>Product name</b></td>
                <td width="20%"><b>Price</b></td>
                <td width="15%"><b>Amount</b></td>
                <td width="20%"><b>Total</b></td>
            </tr>';

            $totalPriceAll = 0;
            while($row = mysqli_fetch_array($query)){
            $totalPrice = $row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];

            $strBody .= '<tr>
                <td class="prd-name">'.$row['ten_sp'].'</td>
                <td class="prd-price"><font color="#282161">'.$row['gia_sp'].' $</font></td>
                <td class="prd-number">'.$_SESSION['giohang'][$row['id_sp']].'</td>
                <td class="prd-total"><font color="#282161">'.$totalPrice.' $</font></td>
            </tr>';

            $totalPriceAll += $totalPrice;
            }

            $strBody .= '<tr>
                <td class="prd-name">Total price:</td>
                <td colspan="2"></td>
                <td class="prd-total"><b><font color="#282161">'.$totalPriceAll.' $</font></b></td>
            </tr>
        </table>';

        $strBody .= '<p align="justify">
            <b>Your order has been successfully placed!</b><br />
            • Your products will be delivered to the Address listed in our Customer Information section after 2 to 3 days from this time.<br />
            • Delivery staff will contact you via Phone number 24 hours before delivery.<br />
            <b><br /> Thank you! </b>
        </p>';

        // Thiết lập SMTP Server
        require("class.phpmailer.php"); // nạp thư viện
        $mailer = new PHPMailer(); // khởi tạo đối tượng
        $mailer->IsSMTP(); // gọi class smtp để đăng nhập
        $mailer->CharSet="utf-8"; // bảng mã unicode

        //Đăng nhập Gmail
        $mailer->SMTPAuth = true; // Đăng nhập
        $mailer->SMTPSecure = "ssl"; // Giao thức SSL
        $mailer->Host = "smtp.gmass.co"; // SMTP của GMAIL
        $mailer->Port = 25; // cổng SMTP

        // Phải chỉnh sửa lại
        $mailer->Username = "gmass"; // GMAIL username
        $mailer->Password = "903807b5-537d-4c81-a575-d5c7b266d78b"; // GMAIL password
        $mailer->AddAddress($email, $ten); //email người nhận, $email và $ten là 2 biến đc gán bởi $_POST lấy từ trong form
        $mailer->AddCC("kydz.uwu@gmail.com", "GreenwichMobileShop"); // gửi thêm một email cho Admin

        // Chuẩn bị gửi thư nào
        $mailer->FromName = 'GreenwichMobileShop'; // tên người gửi
        $mailer->From = 'kydz.uwu@gmail.com'; // mail người gửi
        $mailer->Subject = 'Purchase confirmation invoice from GreenwichMobileShop';
        $mailer->IsHTML(TRUE); //Bật HTML không thích thì false

        // Nội dung lá thư
        $mailer->Body = $strBody;

        //gửi mail
        if(!$mailer->Send()){
            //gửi không được đưa thông báo lôi
            echo "Error sending email: ".$mailer->ErrorInfo;
        }else{
            //gửi thành công
            header('location: index.php?page_layout=hoanthanh'); 
        }
        }
    }
?>
<div id="custom-form" class="col-md-6 col-sm-8 col-xs-12">
<form method="post">
    <div class="form-group">
        <label>Name</label>
        <input required type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input required type="text" class="form-control" name="mail">
    </div>
    <div class="form-group">
        <label>Phone number</label>
        <input required type="text" class="form-control" name="mobi">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input required type="text" class="form-control" name="add">
    </div>
    <button class="btn btn-info" name="submit">Buy</button>
</form>
</div>