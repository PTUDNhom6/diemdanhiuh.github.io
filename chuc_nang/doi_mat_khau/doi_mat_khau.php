
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="main_left1"><p>THAY ĐỔI MẬT KHẨU</p></div>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1" align="center">
    <tr>
      <td height="50">Mật khẩu hiện tại</td>
      <td><label for="textfield"></label>
      <input type="password" name="mkht" id="mkht" /></td>
    </tr>
    <tr>
      <td height="50">Mật khẩu mới</td>
      <td><label for="textfield2"></label>
      <input type="password" name="mkm" id="mkm" /></td>
    </tr>
    <tr>
      <td height="50">Nhập lại mật khẩu mới</td>
      <td><label for="textfield3"></label>
      <input type="password" name="nlmk" id="nlmk" /></td>
    </tr>
    <tr>
      <td height="43" colspan="2">
      <center>
      <input type="submit" name="update_mk" id="update_mk" value="Cập nhật mật khẩu mới" />
      </center>
      </td>
    </tr>
  </table>
</form><br />
<p style="margin-left:50px;"><span style="color:red;font-weight:bold">Ghi chú:</span>Vui lòng đăng nhập lại sau khi thay đổi mật khẩu thành công.<br />Xin cảm ơn!</p>
<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$mkht=$_POST['mkht'];
			$mkm=$_POST['mkm'];
			$nlmk=$_POST['nlmk'];
			
				switch($_POST['update_mk'])
				{
					case 'Cập nhật mật khẩu mới':
					{
						$dn->doi_mat_khau($mkht,$mkm,$nlmk);
					}
					break;
				}
			
		}
?>
</body>
</html>