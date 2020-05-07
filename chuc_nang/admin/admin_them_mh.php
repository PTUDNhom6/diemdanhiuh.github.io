<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo trang thêm môn học cho admin.-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="main_left1"><p>THÊM MÔN HỌC</p></div>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1" align="center">
    <tr>
      <td>Mã môn học</td>
      <td><label for="txtMMH"></label>
      <input type="text" name="txtMMH" id="txtMMH" /></td>
    </tr>
    <tr>
      <td>Tên môn học</td>
      <td><label for="txtTMH"></label>
      <input type="text" name="txtTMH" id="txtTMH" /></td>
    </tr>
    <tr>
      <td>Số tín chỉ</td>
      <td><label for="txtSTC"></label>
      <input type="number" name="txtSTC" id="txtSTC" /></td>
    </tr>
    <tr>
      <td>Tổng số tiết</td>
      <td><input type="number" name="txtTST" id="txtTST" /></td>
    </tr>
    <tr>
      <td>Số tiết lí thuyết</td>
      <td><input type="number" name="txtSTLT" id="txtSTLT" /></td>
    </tr>
	<tr>
      <td>Số tiết thực hành</td>
      <td><input type="number" name="txtSTTH" id="txtSTTH" /></td>
    </tr>

    <tr>
      <td height="43" colspan="2">
      <center>
      <input type="submit" name="them_mh" id="them_mh" value="Thêm môn học" />
      </center>
      </td>
    </tr>
  </table>
</form><br />
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$ma_mh=$_REQUEST['txtMMH'];
	$ten_mh=$_REQUEST['txtTMH'];
	$so_tin_chi=$_REQUEST['txtSTC'];
	$tong_so_tiet=$_REQUEST['txtTST'];
	$so_tiet_li_thuyet=$_REQUEST['txtSTLT'];
	$so_tiet_thuc_hanh=$_REQUEST['txtSTTH'];
	switch($_POST['them_mh'])
	{
	case 'Thêm môn học':
	{
		if($ma_mh!='' and $ten_mh!='' and $so_tin_chi!='' and $tong_so_tiet!='' and $so_tiet_li_thuyet!='' and $so_tiet_thuc_hanh!='')
		{
			if($dn->truy_van("insert into mon_hoc (ma_mh,ten_mh,so_tin_chi,tong_so_tiet,so_tiet_li_thuyet,so_tiet_thuc_hanh) values ('$ma_mh','$ten_mh','$so_tin_chi','$tong_so_tiet','$so_tiet_li_thuyet','$so_tiet_thuc_hanh')")==1)
			{
				$dn->thong_bao_html_roi_chuyen_trang('Thêm môn học thành công.','?thamso=admin_them_mh');
			}
			else
			{
				$dn->thong_bao_html123("Thêm môn học không thành công. Vui lòng thử lại.");
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