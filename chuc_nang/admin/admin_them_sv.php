<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo trang thêm sinh viên cho admin.-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="main_left1"><p>THÊM SINH VIÊN</p></div>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1" align="center">
    <tr>
      <td>Mã sinh viên</td>
      <td><label for="txtMSV"></label>
      <input type="text" name="txtMSV" id="txtMSV" /></td>
    </tr>
    <tr>
      <td>Họ đệm</td>
      <td><label for="txtHD"></label>
      <input type="text" name="txtHD" id="txtHD" /></td>
    </tr>
    <tr>
      <td>Tên</td>
      <td><label for="txtT"></label>
      <input type="text" name="txtT" id="txtT" /></td>
    </tr>
    <tr>
      <td>Họ và tên</td>
      <td><label for="txtHVS"></label>
      <input type="text" name="txtHVS" id="txtHVS" /></td>
    </tr>
    <tr>
      <td>Ngày sinh</td>
      <td><input type="date" name="txtNS" id="txtNS" /></td>
    </tr>
    <tr>
      <td>Giới tính</td>
      <td><select name="txtGT" id="txtGT">
      		<option ></option>
      		<option value="Nam">Nam</option>
            <option value="Nữ"> Nữ</option>
           </select>
      </td>
    </tr>
    <tr>
      <td>Lớp</td>
      <td><label for="txtL"></label>
      <input type="text" name="txtL" id="txtL" /></td>
    </tr>
    <tr>
      <td height="43" colspan="2">
      <center>
      <input type="submit" name="them_sv" id="them_sv" value="Thêm sinh viên" />
      </center>
      </td>
    </tr>
  </table>
</form><br />
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$ma_sv=$_REQUEST['txtMSV'];
	$ho_dem=$_REQUEST['txtHD'];
	$ten=$_REQUEST['txtT'];
	$ho_va_ten=$_REQUEST['txtHVS'];
	$ngay_sinh=$_REQUEST['txtNS'];
	$gioi_tinh=$_REQUEST['txtGT'];
	$lop=$_REQUEST['txtL'];
	switch($_POST['them_sv'])
	{
	case 'Thêm sinh viên':
	{
		if($ma_sv!='' and $ho_dem!='' and $ten!='' and $ho_va_ten!='' and $ngay_sinh!='' and $gioi_tinh!='' and $lop!='')
		{
			if($dn->truy_van("insert into sinh_vien (ma_sv,ho_dem,ten,ho_dem_ten,ngay_sinh,gioi_tinh,lop) values ('$ma_sv','$ho_dem','$ten','$ho_va_ten','$ngay_sinh','$gioi_tinh','$lop')")==1)
			{
				$dn->thong_bao_html_roi_chuyen_trang('Thêm sinh viên thành công.','?thamso=admin_them_sv');
			}
			else
			{
				$dn->thong_bao_html123("Thêm sinh viên không thành công. Vui lòng thử lại.");
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