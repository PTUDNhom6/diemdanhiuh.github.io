<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo trang thêm sinh viên vào lớp môn học cho admin.-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="main_left1"><p>THÊM SINH VIÊN - LỚP MÔN HỌC</p></div>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1" align="center">
    <tr>
      <td>Mã lớp môn học</td>
      <td><label for="txtMLMH"></label>
      <input type="text" name="txtMLMH" id="txtMLMH" /></td>
    </tr>
    
    <tr>
      <td>Mã sinh viên</td>
      <td><label for="txtMSV"></label>
      <input type="text" name="txtMSV" id="txtMSV" /></td>
    </tr>
    <tr>
      <td>Học kì</td>
      <td><select name="txtHK" id="txtHK">
      		<option ></option>
      		<option value="1">KH1</option>
            <option value="2"> KH2</option>
            <option value="3"> KH3</option>
           </select>
      </td>
    </tr>
    <tr>
      <td>Năm học</td>
      <td><label for="txtNH"></label>
      <input type="text" name="txtNH" id="txtNH" /></td>
    </tr>
    <tr>
      <td height="43" colspan="2">
      <center>
      <input type="submit" name="them_sv_lmh" id="them_sv_lmh" value="Thêm sinh viên - Lớp môn học" />
      </center>
      </td>
    </tr>
  </table>
</form><br />
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$ma_lmh=$_REQUEST['txtMLMH'];
	$ma_sv=$_REQUEST['txtMSV'];
	$hoc_ki=$_REQUEST['txtHK'];
	$nam_hoc=$_REQUEST['txtNH'];
	switch($_POST['them_sv_lmh'])
	{
	case 'Thêm sinh viên - Lớp môn học':
	{
		if($ma_lmh!='' and $ma_sv!='' and $hoc_ki!='' and $nam_hoc!='')
		{
			if($dn->truy_van("insert into sinh_vien_lop_mon_hoc (ma_lmh,ma_sv,hoc_ki,nam_hoc) values ('$ma_lmh','$ma_sv','$hoc_ki','$nam_hoc')")==1)
			{
				$dn->thong_bao_html_roi_chuyen_trang('Thêm sinh viên vào lớp môn học thành công.','?thamso=admin_them_gv');
			}
			else
			{
				$dn->thong_bao_html123("Thêm sinh viên vào lớp môn học không thành công. Vui lòng thử lại.");
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