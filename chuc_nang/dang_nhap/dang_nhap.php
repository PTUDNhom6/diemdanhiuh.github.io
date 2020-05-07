<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo form đăng nhập và kiểm tra việc đăng nhập.-->
<?php
if(isset($_SESSION['tk_sv']) and isset($_SESSION['mk_sv']))
	{
		echo '<script language="javascript">
				window.location="?thamso=sinh_vien";
				</script>;';
	}
else
	{
		if(isset($_SESSION['tk_gv']) and isset($_SESSION['mk_gv']))
		{
			echo '<script language="javascript">
				window.location="?thamso=giang_vien";
				</script>;';
		}
	}
?>
<div class="main_right1"><p>ĐĂNG NHẬP</p></div>
<form method="post" name="form1">
    Tài khoản:<br>
    <input type="text" name="txttk" /><br>
    Mật khẩu:<br>
    <input type="password" name="txtmk"/><br>
    <input type="submit" name="login" value="Đăng Nhập"/>
</form>
<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$tk=$_POST['txttk'];
		$mk=$_POST['txtmk'];
		switch($_POST['login'])
		{
			case 'Đăng Nhập':
			{
				$dn->dang_nhap($tk,$mk);
			}
			break;
		}
		}
	?>