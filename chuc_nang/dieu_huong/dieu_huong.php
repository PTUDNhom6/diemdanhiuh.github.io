<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo phần điều hướng cho tài khoản .-->
<?php
    if(isset($_GET['thamso']))
	{
		$tham_so=$_GET['thamso'];
	}
	else
	{
		$tham_so="";
	}
	if(isset($_SESSION['tk_sv']) or isset($_SESSION['tk_gv']) or isset($_SESSION['tk_admin']))
	{
		switch($tham_so)
    	{
			default:
             include("chuc_nang/tai_khoan/tai_khoan.php");
		}
	}
	else
	{
		switch($tham_so)
    	{
			default:
            include("chuc_nang/dang_nhap/dang_nhap.php");
		}
	}
    
?>