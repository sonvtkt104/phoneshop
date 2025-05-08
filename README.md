**Setup Project**

**B1: config mysql connect**
- vào file **cauhinh\ketnoi.php** và **quantri\ketnoi.php** setup mysql
- sửa **$dbhost**, **$dbuser**, **$dbpass** để connect tới local mysql

**B2: Tạo database và thêm dữ liệu mặc định**
- **Tạo database:**
  
  create database greenwichphoneshop;
- **Tạo table:**
  
  use greenwichphoneshop;

  -- **Bảng danh mục sản phẩm**
  
  CREATE TABLE dmsanpham (
    id_dm      INT AUTO_INCREMENT PRIMARY KEY,
    ten_dm     VARCHAR(255) NOT NULL
  );

  -- **Bảng sản phẩm**
  
  CREATE TABLE sanpham (
    id_sp        INT AUTO_INCREMENT PRIMARY KEY,
    ten_sp       VARCHAR(255) NOT NULL,
    anh_sp       VARCHAR(255),            
    gia_sp       DECIMAL(10,2) NOT NULL,
    bao_hanh     VARCHAR(100),
    phu_kien     VARCHAR(255),
    tinh_trang   VARCHAR(100),
    khuyen_mai   VARCHAR(255),
    trang_thai   VARCHAR(100),
    chi_tiet_sp  TEXT,
    dac_biet     TINYINT(1) DEFAULT 0,    
    id_dm        INT,
    FOREIGN KEY (id_dm) REFERENCES dmsanpham(id_dm)
  );
  
  -- **Bảng bình luận cho sản phẩm**
  
  CREATE TABLE blsanpham (
    id_bl       INT AUTO_INCREMENT PRIMARY KEY,
    ten         VARCHAR(100)  NOT NULL,   
    dien_thoai  VARCHAR(20),
    binh_luan   TEXT         NOT NULL,
    ngay_gio    DATETIME     NOT NULL,
    id_sp       INT          NOT NULL,
    FOREIGN KEY (id_sp) REFERENCES sanpham(id_sp)
  );
  
  -- **Bảng thành viên / người dùng**
  
  CREATE TABLE thanhvien (
    id_thanhvien   INT AUTO_INCREMENT PRIMARY KEY,
    email          VARCHAR(255) NOT NULL UNIQUE,
    mat_khau       VARCHAR(255) NOT NULL,
    quyen_truy_cap TINYINT(1)  DEFAULT 1  
  );

- **Tạo data mặc định**
  
  /* ───────────── **1. DANH MỤC SẢN PHẨM** ───────────── */
  
  INSERT INTO dmsanpham (id_dm, ten_dm) VALUES
    (1, 'Điện thoại'),
    (2, 'Máy tính bảng'),
    (3, 'Laptop'),
    (4, 'Phụ kiện');

  /* ───────────── **2. SẢN PHẨM** ───────────── */
  
  INSERT INTO sanpham
  (id_sp, ten_sp, anh_sp, gia_sp, bao_hanh, phu_kien,
   tinh_trang, khuyen_mai, trang_thai, chi_tiet_sp, dac_biet, id_dm)
  VALUES
    (1,'iPhone 15 Pro Max 256GB','iphone15.jpg', 35990000,
       '12 tháng','Cáp USB-C','Mới 100%','Tặng ốp lưng trong suốt',
       'Còn hàng',
       'Màn hình 6.7˝ Super Retina XDR, chip A18 Pro, khung titanium…', 1,1),
  
    (2,'Samsung Galaxy S24 Ultra 512GB','s24ultra.jpg', 33990000,
       '12 tháng','Cáp USB-C','Mới 100%','Giảm 1.000.000đ',
       'Còn hàng',
       'Màn hình 6.8˝ QHD+ 120 Hz, Snapdragon 8 Gen 3, camera 200 MP…', 1,1),
  
    (3,'iPad Air 6 11˝ Wi-Fi 256GB','ipadair6.jpg', 19990000,
       '12 tháng','Cáp USB-C','Mới 100%','Tặng Apple Pencil Gen 1',
       'Còn hàng',
       'Màn hình Liquid Retina 11˝, chip M2, 4 loa stereo…', 0,2),
  
    (4,'Samsung Galaxy Tab S9 11˝ 256GB','tabs9.jpg', 21990000,
       '12 tháng','S Pen','Mới 100%','Tặng bao da bàn phím',
       'Còn hàng',
       'Dynamic AMOLED 2X 120 Hz, Snapdragon 8 Gen 2…', 0,2),
  
    (5,'MacBook Air 13˝ M3 512GB','mba13m3.jpg', 29990000,
       '12 tháng','Sạc 35 W','Mới 100%','Giảm 2 % khi thanh toán VNPay',
       'Còn hàng',
       'Màn hình 13.6˝ Liquid Retina, CPU 8-core, GPU 8-core, 1.24 kg…', 1,3),
  
    (6,'Dell XPS 13 Plus 9320 i7/16/512','xps13.jpg', 42990000,
       '24 tháng','Sạc 60 W','Mới 100%','Giảm 3.000.000đ',
       'Còn hàng',
       'Màn hình 13.4˝ 4K+, Intel Core i7-1360P, EVO certified…', 1,3),
  
    (7,'AirPods Pro 2 (USB-C)','airpodspro2.jpg', 6490000,
       '12 tháng','Case sạc','Mới 100%','Giảm 300.000đ',
       'Còn hàng',
       'Chip H2, ANC thế hệ 2, sạc nhanh USB-C, Spatial Audio…', 0,4),
  
    (8,'Apple Watch Series 9 41 mm GPS','aw_s9.jpg', 10990000,
       '12 tháng','Cáp sạc','Mới 100%','Tặng dây vải thể thao',
       'Còn hàng',
       'Màn hình LTPO OLED, chip S9 SiP, cảm biến nhiệt độ…', 0,4);



  /* ───────────── **3. BÌNH LUẬN SẢN PHẨM** ───────────── */
  
  INSERT INTO blsanpham (ten, dien_thoai, binh_luan, ngay_gio, id_sp) VALUES
    ('Nguyễn An','0987654321','Sản phẩm cực kỳ đẹp, giao nhanh!',   '2025-05-08 10:15:00',1),
    ('Trần Minh','0912345678','Hiệu năng khỏi chê, pin ổn.',        '2025-05-08 12:30:00',1),
  
    ('Lê Hương','0988123456','Màn hình sắc nét, bút S Pen mượt.',    '2025-05-08 14:05:00',4),
  
    ('Phạm Tuấn','0977001122','Thiết kế sang, bàn phím cảm ứng lạ.', '2025-05-08 09:20:00',6),
    ('Vũ Ý Nhi','0909776655','Hơi nóng nhẹ nhưng hiệu năng rất tốt.', '2025-05-08 11:45:00',6),
  
    ('Đặng Khoa','0911555777','Đeo cả ngày không đau tai, ANC ổn.',  '2025-05-08 08:10:00',7);
  
  
  
  /* ───────────── **4. THÀNH VIÊN (mật khẩu demo – KHÔNG dùng cho production)** ───────────── */
  
  INSERT INTO thanhvien (email, mat_khau, quyen_truy_cap) VALUES
    ('admin@example.com',  '$2y$10$ykYxg4uN7g6JkWc1Yc6p4eRgy8EMGxhfIewzfpbXmT0YVXYNHe2cq', 0), 
    ('user1@example.com',  '$2y$10$3w0eZKUR9pyWmVZ5XblhzuTnMIEsKBzk7C3wuWetLnUhdTzEbFToC', 1), 
    ('user2@example.com',  '$2y$10$KwzsSObVKsA0.35EklKiG.Om0Pd8sHP8jOyp0nMEIbVrLwDg.j4Wu', 1); 
