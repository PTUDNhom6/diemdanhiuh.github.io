<!--
Author:Nguyễn Minh Nhật	
Last updated date: 28/04/2020
Purpose code: Tạo trang index cho website.
 -->
<?php
include('source/mysource.php');
$dn= new my_function();
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IUH-Điểm danh</title>
<link rel="stylesheet" type="text/css" href="giao_dien/giao_dien.css">
</head>

<body>

<div id="container">
    <div id="banner">
    <img src="image/banner/banner1.png" width="100%">
    </div>
    <div id="menu">
     <?php
			include("chuc_nang/menu_ngang/menu_ngang.php");
	?>
    </div>
    <div id="main">
        <div id="main_left">
			<?php
                    include("chuc_nang/dieu_huong/dieu_huong1.php");
            ?>  
        </div>
        <div id="main_right">
            <div class="main_right2">
				<?php
                        include("chuc_nang/dieu_huong/dieu_huong.php");
                ?>
            </div>
            <br><br><br><br><br><br><br>
        </div>
        
    </div>
    <div id="footer">
    	<?php
				include("chuc_nang/footer/footer.php");
		?>
    </div>
</div>

</body>
</html>