<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo trang thêm giảng viên cho admin.-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="main_left1"><p>THÊM GIẢNG VIÊN</p></div>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1" align="center">
    <tr>
      <td>Mã giảng viên</td>
      <td><label for="txtMGV"></label>
      <input type="text" name="txtMGV" id="txtMGV" /></td>
    </tr>
    
    <tr>
      <td>Họ và tên</td>
      <td><label for="txtHVT"></label>
      <input type="text" name="txtHVT" id="txtHVT" /></td>
    </tr>
    <tr>
      <td>Khoa</td>
      <td><label for="txtK"></label>
      <input type="text" name="txtK" id="txtK" /></td>
    </tr>
    <tr>
      <td height="43" colspan="2">
      <center>
      <input type="submit" name="them_gv" id="them_gv" value="Thêm giảng viên" />
      </center>
      </td>
    </tr>
  </table>
</form><br />
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$ma_gv=$_REQUEST['txtMGV'];
	$ten=$_REQUEST['txtHVT'];
	$khoa=$_REQUEST['txtK'];
	switch($_POST['them_gv'])
	{
	case 'Thêm giảng viên':
	{
		if($ma_gv!='' and $ten!='' and $khoa!='')
		{
			if($dn->truy_van("insert into giang_vien (ma_gv,ten,khoa) values ('$ma_gv','$ten','$khoa')")==1)
			{
				$dn->thong_bao_html_roi_chuyen_trang('Thêm giảng viên thành công.','?thamso=admin_them_gv');
			}
			else
			{
				$dn->thong_bao_html123("Thêm giảng viên không thành công. Vui lòng thử lại.");
			}
		}
		else
		{
			$dn->thong_bao_html123("Vui lòng nhập đầy đủ thông tin.");
		}
	}
	break;
	}
}
?>
</body>
</html>