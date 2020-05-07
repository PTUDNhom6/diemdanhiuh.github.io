<?php
	if(isset($_SESSION['tk_sv']))
	{
		echo '<div class="main_right1"><p>SINH VIÊN</p></div>';
		$dn->tai_khoan($_SESSION['tk_sv']);
	}
	else if(isset($_SESSION['tk_gv']))
	{
			echo '<div class="main_right1"><p>GIẢNG VIÊN</p></div>';
			$dn->tai_khoan($_SESSION['tk_gv']);
	}
	else
	{
		if(isset($_SESSION['tk_admin']))
		{
			echo '<div class="main_right1"><p>ADMIN</p></div>';
			$dn->tai_khoan($_SESSION['tk_admin']);
		}
		else
		{
			$dn->chuyen_trang("index.php");
		}
	}
?>
<form name="form1" method="post" action="">
  <input type="submit" name="doi_mat_khau" id="doi_mat_khau" value="Đổi mật khẩu">
  <input type="submit" name="dang_xuat" id="dang_xuat" value="Đăng xuất">
</form>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		switch($_POST['doi_mat_khau'])
		{
			case 'Đổi mật khẩu':
			{
				$dn->chuyen_trang("?thamso=doi_mat_khau");
			}
			break;
		}
		switch($_POST['dang_xuat'])
		{
			case 'Đăng xuất':
			{
				$dn->dang_xuat();
			}
			break;
		}
	}
?>
