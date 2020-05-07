<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo trang thêm lớp môn học cho admin.-->
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
      <td>Mã lớp môn học</td>
      <td><label for="txtMLMH"></label>
      <input type="text" name="txtMLMH" id="txtMLMH" /></td>
    </tr>
    <tr>
      <td>Tên lớp môn học</td>
      <td><label for="txtTLMH"></label>
      <input type="text" name="txtTLMH" id="txtTLMH" /></td>
    </tr>
    <tr>
      <td>Mã môn học</td>
      <td><label for="txtMMH"></label>
      <input type="text" name="txtMMH" id="txtMMH" /></td>
    </tr>
    <tr>
      <td>Mã giảng viên</td>
      <td><label for="txtMGV"></label>
      <input type="text" name="txtMGV" id="txtMGV" /></td>
    </tr>
    <tr>
      <td>Học kì</td>
      <td><select name="txtHK" id="txtHK">
      		<option ></option>
      		<option value="1">KH1</option>
            <option value="2">KH2</option>
            <option value="3">KH3</option>
           </select>
      </td>
    </tr>
	<tr>
      <td>Năm học</td>
      <td><input type="text" name="txtNH" id="txtNH" value="2019-2020"/></td>
    </tr>
	<tr>
      <td>Thứ</td>
      <td><select name="txtThu" id="txtThu">
      		<option ></option>
      		<option value="Mon">Thứ hai</option>
            <option value="Tue">Thứ ba</option>
            <option value="Wed">Thứ tư</option>
            <option value="Thu">Thứ năm</option>
            <option value="Fri">Thứ sáu</option>
            <option value="Sat">Thứ bảy</option>
           </select>
      </td>
    </tr>
	<tr>
      <td>Thời gian bắt đầu</td>
      <td><input type="text" name="txtTGBD" id="txtTGBD" value="00:00:00"/></td>
    </tr>
    <tr>
      <td>Thời gian kết thúc</td>
      <td><input type="text" name="txtTGKT" id="txtTGKT" value="00:00:00"/></td>
    </tr>
    <tr>
      <td>Ngày kết thúc</td>
      <td><input type="text" name="txtNKT" id="txtNKT" value="2020-12-30"/></td>
    </tr>
    <tr>
      <td height="43" colspan="2">
      <center>
      <input type="submit" name="them_lmh" id="them_lmh" value="Thêm lớp môn học" />
      </center>
      </td>
    </tr>
  </table>
</form><br />
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$ma_lmh=$_REQUEST['txtMLMH'];
	$ten_lmh=$_REQUEST['txtTLMH'];
	$ma_mh=$_REQUEST['txtMMH'];
	$ma_gv=$_REQUEST['txtMGV'];
	$hoc_ki=$_REQUEST['txtHK'];
	$nam_hoc=$_REQUEST['txtNH'];
	$thu=$_REQUEST['txtThu'];
	$tgbd=$_REQUEST['txtTGBD'];
	$tgkt=$_REQUEST['txtTGKT'];
	$nkt=$_REQUEST['txtNKT'];
	switch($_POST['them_lmh'])
	{
	case 'Thêm lớp môn học':
	{
		if($ma_lmh!='' and $ten_lmh!='' and $ma_mh!='' and $ma_gv!='' and $hoc_ki!='' and $nam_hoc!='' and $thu!='' and $tgbd!='' and $tgkt!='' and $nkt!='')
		{
			if($dn->truy_van("insert into lop_mon_hoc (ma_lmh,ten_lmh,ma_mh	,ma_gv,hoc_ki,nam_hoc,thu,tg_bat_dau,tg_ket_thuc,ngay_ket_thuc) values ('$ma_lmh','$ten_lmh','$ma_mh','$ma_gv','$hoc_ki','$nam_hoc','$thu','$tgbd','$tgkt','$nkt')")==1)
			{
				$dn->thong_bao_html_roi_chuyen_trang('Thêm lớp môn học thành công.','?thamso=admin_them_lmh');
			}
			else
			{
				$dn->thong_bao_html123("Thêm lớp môn học không thành công. Vui lòng thử lại.");
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