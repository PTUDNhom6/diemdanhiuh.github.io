<!--
Author:Nguyễn Minh Nhật	
Last updated date: 28/04/2020
Purpose code: Tạo trang index cho website.
 -->
<?php
class my_function
{
	//Purpose code: Tạo hàm kết nối với csdl.
	function ketnoi()
	{
		$conn=mysqli_connect('localhost','user_diem_danh','123456','csdl_diem_danh');
		if(!$conn)
		{
			echo 'Khong ket noi duoc voi csdl';
			die();
		}
		else
		{
			mysqli_set_charset($conn,"utf8");
			return $conn;
		}
	}
	//Purpose code: Tạo hàm chuyển trang.
	function chuyen_trang($link_chuyen_trang)
	{
		echo '<script language="javascript">
				window.location="'.$link_chuyen_trang.'";
				</script>;';     
		exit();
	}
	//Purpose code: Tạo hàm thông báo và quay lại trang trước đó.
	function thong_bao_html123($chuoi_thong_bao)
	{
		$lien_ket_trang_truoc=$_SERVER['HTTP_REFERER'];
		?> 
			  <head><meta charset="UTF-8"></head>
				<script type="text/javascript">
					alert("<?php echo $chuoi_thong_bao; ?>");
					window.location="<?php echo $lien_ket_trang_truoc; ?>";
				</script>
			</body>
			</html>
		<?php
		exit();
	}
	//Purpose code: Tạo hàm thông báo và chuyển đến trang mới.
	function thong_bao_html_roi_chuyen_trang($chuoi_thong_bao,$link_chuyen_trang)
	{
		$lien_ket_trang_truoc=$_SERVER['HTTP_REFERER'];
		?>
			<html><head>
			  <meta charset="UTF-8">
			  <title>Thông báo</title></head>
			<body>
				<script type="text/javascript">
					alert("<?php echo $chuoi_thong_bao; ?>");
					window.location="<?php echo $link_chuyen_trang; ?>";
				</script>
			</body>
			</html>
		<?php
		exit();
	}
	//Purpose code: Tạo hàm để truy vấn với csdl.
	function truy_van($sql)
	{
		if(mysqli_query($this->ketnoi(),$sql))
		{
			return 1;	
		}
		else
		{
			return 0;
		}
	}
	//Purpose code: Tạo hàm đăng nhập với tài khoản sinh viên, giảng viên, admin.
	function dang_nhap($tk,$mk)
	{
		$link=$this->ketnoi();
		$sql1="select * from sinh_vien where ma_sv='$tk' and mat_khau='$mk' limit 1";
		$sql2="select * from giang_vien where ma_gv='$tk' and mat_khau='$mk' limit 1";
		$sql3="select * from admin where tai_khoan='$tk' and mat_khau='$mk' limit 1";
		$kq1=mysqli_query($link,$sql1);
		$kq2=mysqli_query($link,$sql2);
		$kq3=mysqli_query($link,$sql3);
		$i1=mysqli_num_rows($kq1);
		$i2=mysqli_num_rows($kq2);
		$i3=mysqli_num_rows($kq3);
		if ($i1==1) 
			{
				$_SESSION['tk_sv'] = $tk;
				$_SESSION['mk_sv'] = $mk;
				$this->chuyen_trang("?thamso=sinh_vien");
				exit();
			}
		else if ($i2==1)
		{
			$_SESSION['tk_gv'] = $tk;
				$_SESSION['mk_gv'] = $mk;
				$this->chuyen_trang("?thamso=giang_vien");
				exit();
		}
		else
		{
			if($i3==1)
			{
				$_SESSION['tk_admin'] = $tk;
				$_SESSION['mk_admin'] = $mk;
				$this->chuyen_trang("?thamso=admin");
				exit();
			}
			else
			{
				$this->thong_bao_html123("Đăng nhập không thành công. Vui lòng kiểm tra lại.");
				exit();
			}
		}
		
	}
	//Purpose code: Tạo hàm hiển thị thông tin người đang dùng hệ thống.
	function tai_khoan($tk)
	{
		$link=$this->ketnoi();
		$sql1="select * from sinh_vien where ma_sv='$tk' limit 1";
		$sql2="select * from giang_vien where ma_gv='$tk' limit 1";
		$sql3="select * from admin where tai_khoan='$tk' limit 1";
		$kq1=mysqli_query($link,$sql1);
		$kq2=mysqli_query($link,$sql2);
		$kq3=mysqli_query($link,$sql3);
		$i1=mysqli_num_rows($kq1);
		$i2=mysqli_num_rows($kq2);
		$i3=mysqli_num_rows($kq3);		
		if($i1==1)
		{
			while($row=mysqli_fetch_array($kq1))
			{
				$ten=$row['ho_dem_ten'];
				echo ''.'<p>Xin chào</p>'.'<p class="p_temp">'.$ten.'</p>';
			}
		}
		else if($i2==1)
		{
				while($row=mysqli_fetch_array($kq2))
				{
					$ten=$row['ten'];
					echo ''.'<p>Xin chào</p>'.'<p class="p_temp">'.$ten.'</p>';
				}
		}
		else
		{
			if($i3==1)
			{
				echo ''.'<p>Xin chào</p>'.'<p class="p_temp">Admin</p>';
			}
		}
	}
	//Purpose code: Tạo hàm đăng xuất khỏi hệ thống.
	function dang_xuat()
	{
		unset($_SESSION['tk_sv']);
		unset($_SESSION['mk_sv']);
		unset($_SESSION['tk_gv']);
		unset($_SESSION['mk_gv']);
		unset($_SESSION['tk_admin']);
		unset($_SESSION['mk_admin']);
		$this->thong_bao_html_roi_chuyen_trang('Quá trình đăng xuất thành công.','index.php');
	}
	//Purpose code: Tạo hàm đổi mật khẩu cho giảng viên, sinh viên.
	function doi_mat_khau($mkht,$mkm,$nlmk)
	{
		$link=$this->ketnoi();
		if($mkht=="" or $mkm=="" or $nlmk=="")
		{
			$this->thong_bao_html123("Vui lòng nhập đầy đủ thông tin.");
		}
		else
		{
			if(isset($_SESSION['tk_sv']))
			{
				$tk=$_SESSION['tk_sv'];
				$mk=$_SESSION['mk_sv'];
				$sql1="select * from sinh_vien where ma_sv='$tk' and mat_khau='$mkht' limit 1";
				$kq1=mysqli_query($link,$sql1);
				$i1=mysqli_num_rows($kq1);
				if ($i1==1 and $mk==$mkht)
				{
					if($mkm==$nlmk)
					{
						$sql2="update sinh_vien set mat_khau='$mkm' where ma_sv='$tk' limit 1";
						if(mysqli_query($link,$sql2))
						{
							$this->thong_bao_html_roi_chuyen_trang("Cập nhật mật khẩu thành công.","index.php");
						}
						else
						{
							$this->thong_bao_html123("Cập nhật mật khẩu không thành công.");
						}
					}
					else
					{
						$this->thong_bao_html123("Nhập lại mật khẩu không chính xác. Vui lòng kiểm tra lại.");
					}
				}
				else
				{
					$this->thong_bao_html123("Mật khẩu hiện tại không chính xác. Vui lòng kiểm tra lại.");
				}
			}
			else
			{
				if(isset($_SESSION['tk_gv']))
				{
					$tk=$_SESSION['tk_gv'];
					$mk=$_SESSION['mk_gv'];
					$sql1="select * from giang_vien where ma_gv='$tk' and mat_khau='$mkht' limit 1";
					$kq1=mysqli_query($link,$sql1);
					$i1=mysqli_num_rows($kq1);
					if ($i1==1 and $mk==$mkht)
					{
						if($mkm==$nlmk)
						{
							$sql2="update giang_vien set mat_khau='$mkm' where ma_gv='$tk' limit 1";
							if(mysqli_query($link,$sql2))
							{
								$this->thong_bao_html_roi_chuyen_trang("Cập nhật mật khẩu thành công.","index.php");
							}
							else
							{
								$this->thong_bao_html123("Cập nhật mật khẩu không thành công.");
							}
						}
						else
						{
							$this->thong_bao_html123("Nhập lại mật khẩu không chính xác. Vui lòng kiểm tra lại.");
						}
					}
					else
					{
						$this->thong_bao_html123("Mật khẩu hiện tại không chính xác. Vui lòng kiểm tra lại.");
					}
				}
			}
		}
	}
	//Purpose code: Tạo hàm hiển thị danh sách các lớp điểm danh theo tài khoản của giảng viên.
	function lop_diem_danh()
	{
		$link=$this->ketnoi();
		$ma_gv=$_SESSION['tk_gv'];
		$sql1="select * from lop_mon_hoc a join mon_hoc b on a.ma_mh=b.ma_mh where ma_gv='$ma_gv'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			$stt=1;
			echo '<table width="750" border="1" align="center" cellspacing="0">
				  <tr>
					<td width="73" align="center" valign="middle">STT</td>
					<td width="213" align="center" valign="middle">MÔN HỌC</td>
					<td width="143" align="center" valign="middle">LỚP</td>
					<td width="143" align="center" valign="middle">HỌC KÌ</td>
					<td width="143" align="center" valign="middle">NĂM HỌC</td>
					<td width="143" align="center" valign="middle">&nbsp;</td>
				  </tr>';
			while($row=mysqli_fetch_array($kq1))
			{
				$link_lmh="?thamso=chi_tiet_diem_danh&id=".$row['ma_lmh'];
				$ten_mh=$row['ten_mh'];
				$ten_lmh=$row['ten_lmh'];
				$hoc_ki=$row['hoc_ki'];
				$nam_hoc=$row['nam_hoc'];
				echo '<tr>
					<td width="73" align="center" valign="middle">'.$stt.'</td>
					<td width="213" align="center" valign="middle">'.$ten_mh.'</td>
					<td width="143" align="center" valign="middle">'.$ten_lmh.'</td>
					<td width="143" align="center" valign="middle">'.$hoc_ki.'</td>
					<td width="143" align="center" valign="middle">'.$nam_hoc.'</td>
					<td width="143" align="center" valign="middle"><a href="?thamso=chi_tiet_diem_danh&id_lmh='.$row['ma_lmh'].'">Điểm danh</a></td>
				  </tr>';
				  $stt++;
			}
			echo '</table>';
		}
	}
	//Purpose code: Tạo hàm hiển thị thông tin của lớp điểm danh như mã môn học, mã lớp học, học kì.....
	function thong_tin_diem_danh()
	{
		$ma_lmh=$_GET['id_lmh'];
		$link=$this->ketnoi();
		$sql1="select * from lop_mon_hoc a join mon_hoc b on a.ma_mh=b.ma_mh join giang_vien c on a.ma_gv=c.ma_gv where ma_lmh='$ma_lmh'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i==1)
		{
			while($row=mysqli_fetch_array($kq1))
			{
				$ma_mh=$row['ma_mh'];
				$ten_mh=$row['ten_mh'];
				$ten_lmh=$row['ten_lmh'];
				$ten_gv=$row['ten'];
				$hoc_ki=$row['hoc_ki'];
				$nam_hoc=$row['nam_hoc'];
				echo '<table width="800" border="0" cellspacing="0">
					  <tr>
						<td width="144"><strong>Mã môn học:</strong></td>
						<td width="170">'.$ma_mh.'</td>
						<td width="160"><strong>Học kỳ:</strong></td>
						<td width="308">'.$hoc_ki.'</td>
					  </tr>
					  <tr>
						<td><strong>Tên môn học:</strong></td>
						<td>'.$ten_mh.'</td>
						<td><strong>Năm học:</strong></td>
						<td>'.$nam_hoc.'</td>
					  </tr>
					  <tr>
						<td><strong>Mã lớp học:</strong></td>
						<td>'.$ma_lmh.'</td>
						<td><strong>Cơ sở đào tạo:</strong></td>
						<td>Đại học Công Nghiệp TP.HCM</td>
					  </tr>
					  <tr>
						<td><strong>Tên lớp học:</strong></td>
						<td>'.$ten_lmh.'</td>
						<td><strong>Giảng viên:</strong></td>
						<td>'.$ten_gv.'</td>
					  </tr>
					</table>';
			}
		}
	}
	//Purpose code: Tạo hàm hiển thị danh sách các sinh viên trong lớp và lưu thông tin điểm danh vào csdl.
	function thong_tin_sinh_vien_diem_danh()
	{
		$ma_lmh=$_GET['id_lmh'];
		$link=$this->ketnoi();
		$sql1="select * from diem_danh where ma_lmh='$ma_lmh'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			$lan=1;
			$date=getdate();
			$ngay=$date['year'].'/'.$date['mon'].'/'.$date['mday'];
			while($row=mysqli_fetch_array($kq1))
			{
				$lan++;
			}
			echo '<table width="695" border="0">
					<tr>
					  <td width="122">Lần điểm danh:</td>
					  <td width="164">'.$lan.'</td>
					  <td width="130">Ngày điểm danh:</td>
					  <td width="251">'.$ngay.'</td>
					</tr>
				  </table><br>';
		}
		else
		{
			$lan=1;
			$date=getdate();
			$ngay=$date['year'].'/'.$date['mon'].'/'.$date['mday'];
			echo '<table width="695" border="0">
					<tr>
					  <td width="122">Lần điểm danh:</td>
					  <td width="164">'.$lan.'</td>
					  <td width="130">Ngày điểm danh:</td>
					  <td width="251">'.$ngay.'</td>
					</tr>
				  </table><br>';
		}
		$sql2="select * from sinh_vien_lop_mon_hoc a join sinh_vien b on a.ma_sv=b.ma_sv where ma_lmh='$ma_lmh' order by ten";
			$kq2=mysqli_query($link,$sql2);
			$i2=mysqli_num_rows($kq2);
			if($i2>0)
			{
				$stt=1;
				echo '<form method="post" name="form">
				<table width="700" border="1" cellspacing="0" align="center">
				  <tr>
					<td width="40"><strong>Stt</strong></td>
					<td width="100"><strong>Mssv</strong></td>
					<td width="180"><strong>Họ và tên</strong></td>
					<td width="100"><strong>Có phép</strong></td>
					<td width="100"><strong>Không phép</strong></td>
					<td width="100"><strong>Đi trễ</strong></td>
				  </tr>';
				while($row2=mysqli_fetch_array($kq2))
				{
					$ma_sv=$row2['ma_sv'];
					$ten=$row2['ho_dem_ten'];
					echo '<tr>
							<td>'.$stt.'</td>
							<td>'.$ma_sv.'</td>
							<td>'.$ten.'</td>
							<td><input type="radio" name="'.$ma_sv.'" value="1" /></td>
							<td><input type="radio" name="'.$ma_sv.'" value="2" /></td>
							<td><input type="radio" name="'.$ma_sv.'" value="3" /></td>
						  </tr>';
						  $stt++;
				}
				echo '</table>';
				echo '<br><center>
				
				<input type="submit" value="Lưu và quay lại" name="button"/>
				</form>
				</center>';
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
				{
				switch($_POST['button'])
				{
					case 'Lưu và quay lại':
					{
						if($this->truy_van("insert into diem_danh (ma_lmh,ngay_diem_danh,lan_diem_danh) values ('$ma_lmh','$ngay','$lan')")==1)
						{
							$sql3="select * from diem_danh order by id_diem_danh desc limit 1";
							$kq3=mysqli_query($link,$sql3);
							$row3=mysqli_fetch_array($kq3);
							$id_diem_danh=$row3['id_diem_danh'];
							
							$sql4="select * from sinh_vien_lop_mon_hoc a join sinh_vien b on a.ma_sv=b.ma_sv where ma_lmh='$ma_lmh' order by ten";
							$kq4=mysqli_query($link,$sql4);
							while($row4=mysqli_fetch_array($kq4))
							{
								$ma_sv4=$row4['ma_sv'];
								$trang_thai=$_REQUEST[$ma_sv4];
								$this->truy_van("insert into chi_tiet_diem_danh (id_diem_danh,ma_sv,trang_thai_diem_danh) values ('$id_diem_danh','$ma_sv4','$trang_thai')");
							}
							$this->thong_bao_html_roi_chuyen_trang('Lưu điểm danh thành công.','?thamso=diem_danh_sinh_vien');
						}
						else
						{
							echo '<script language="javascript">alert("Lưu điểm danh không thành công.");</script>';
						}
						
					}
					break;
				}
				}
			}
			
	}
	//Purpose code: Tạo hàm kiểm tra việc điểm danh theo thời gian biểu, nếu đúng giảng viên mới có thể điểm danh.
	function kiem_tra_diem_danh()
	{
		$ma_lmh=$_GET['id_lmh'];
		$link=$this->ketnoi();
		$sql1="select * from lop_mon_hoc where ma_lmh='$ma_lmh'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i==1)
		{
			while($row=mysqli_fetch_array($kq1))
			{
				$thu=$row['thu'];
				$tg_bat_dau=$row['tg_bat_dau'];
				$tg_ket_thuc=$row['tg_ket_thuc'];
				$ngay_ket_thuc=$row['ngay_ket_thuc'];
			}
		}
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$ngay_ht= date('Y-m-d');
		$tg_ht=date('H:i:s');
		$thu_ht=date('D');
		if($ngay_ht<$ngay_ket_thuc)
		{
			if($thu==$thu_ht)
			{
				if($tg_ht>$tg_bat_dau and $tg_ht<$ngay_ket_thuc)
				{
					$sql2="select * from diem_danh where ma_lmh='$ma_lmh' and ngay_diem_danh='$ngay_ht'";
					$kq2=mysqli_query($link,$sql2);
					$i2=mysqli_num_rows($kq2);
					if($i2==0)
					{
						$this->thong_tin_diem_danh();
						echo '<hr />';
						$this->thong_tin_sinh_vien_diem_danh();

					}
					else
					{
						$this->thong_bao_html123("Môn học đã được điểm danh vào ngày hôm nay.");
					}
				}
				else
				{
					$this->thong_bao_html123("Đã hết thời gian điểm danh.");
					
				}
			}
			else
			{
				$this->thong_bao_html123("Môn học không diễn ra vào ngày hôm này. Vui lòng quay lại sau.");
				
			}
			
		}
		else
		{
			$this->thong_bao_html123("Môn học đã hết thời gian giảng dạy vào ngày ".$ngay_ket_thuc);			
		}

	}
	//Purpose code: Tạo hàm hiển thị danh sách lớp cho sinh viên có thể xem điểm danh.
	function xem_diem_danh()
	{
		$link=$this->ketnoi();
		$ma_sv=$_SESSION['tk_sv'];
		$sql1="select * from  sinh_vien_lop_mon_hoc a join lop_mon_hoc
 b on a.ma_lmh=b.ma_lmh join mon_hoc c on c.ma_mh=b.ma_mh where ma_sv='$ma_sv'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			$stt=1;
			echo '<br><table width="750" border="1" align="center" cellspacing="0">
				  <tr>
					<td width="73" align="center" valign="middle">STT</td>
					<td width="213" align="center" valign="middle">MÔN HỌC</td>
					<td width="143" align="center" valign="middle">LỚP</td>
					<td width="143" align="center" valign="middle">HỌC KÌ</td>
					<td width="143" align="center" valign="middle">NĂM HỌC</td>
					<td width="143" align="center" valign="middle">&nbsp;</td>
				  </tr>';
			while($row=mysqli_fetch_array($kq1))
			{
				$ten_mh=$row['ten_mh'];
				$ten_lmh=$row['ten_lmh'];
				$hoc_ki=$row['hoc_ki'];
				$nam_hoc=$row['nam_hoc'];
				echo '<tr>
					<td width="73" align="center" valign="middle">'.$stt.'</td>
					<td width="213" align="center" valign="middle">'.$ten_mh.'</td>
					<td width="143" align="center" valign="middle">'.$ten_lmh.'</td>
					<td width="143" align="center" valign="middle">'.$hoc_ki.'</td>
					<td width="143" align="center" valign="middle">'.$nam_hoc.'</td>
					<td width="143" align="center" valign="middle"><a href="?thamso=chi_tiet_xem_diem_danh&id_lmh='.$row['ma_lmh'].'">Xem điểm danh</a></td>
				  </tr>';
				  $stt++;
			}
			echo '</table>';
		}
	}
	//Purpose code: Tạo hàm hiển thị tình trạng điểm danh theo lớp sinh viên đã chọn.
	function xem_chi_tiet_diem_danh()
	{
		$ma_lmh=$_GET['id_lmh'];
		$ma_sv=$_SESSION['tk_sv'];
		$link=$this->ketnoi();
		$sql1="select * from diem_danh a join chi_tiet_diem_danh b on a.id_diem_danh=b.id_diem_danh where ma_lmh='$ma_lmh' and ma_sv='$ma_sv'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			echo '<br><table width="600" border="1" cellspacing="0" align="center">
			  <tr>
				<td><strong>LẦN</strong></td>
				<td><strong>NGÀY</strong></td>
				<td><strong>TRẠNG THÁI</strong></td>
			  </tr>';
			  $vang=0;
			  $so_buoi_hoc=0;
			  while($row=mysqli_fetch_array($kq1))
			  {
				 $lan=$row['lan_diem_danh'];
				 $ngay=$row['ngay_diem_danh'];
				 $trang_thai=$row['trang_thai_diem_danh'];
				 $trang_thai1='';
				 $so_buoi_hoc++;
				 switch($trang_thai)
				 {
					case '1':
					{
						$trang_thai1='Vắng có phép';
					}
					break;
					case '2':
					{
						$trang_thai1='Vắng không phép phép';
						$vang++;
					}
					break;
					case '3':
					{
						$trang_thai1='Đi trễ';
					}
					break;
					case '':
					{
						$trang_thai1='Có mặt';
					}
					break;
				} 
				echo '<tr>
						<td>'.$lan.'</td>
						<td>'.$ngay.'</td>
						<td>'.$trang_thai1.'</td>
					  </tr>';
			}
			echo '</table>';
			echo '<br>Bạn đã vắng không phép '.$vang.'/'.$so_buoi_hoc.' số buổi học.';
			if(($vang/$so_buoi_hoc)>0.2)
			{
				echo ' Bạn bị cấm thi do nghỉ quá 20% số buổi.<br>';
			}
			else
			{
				echo ' Bạn không bị cấm thi.<br>';
			}
			echo '<br><form method="post" name="form2">
			<center><input type="submit" name="sub" id="sub" value="Phản hồi" />		 			</center></form><br />';
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			switch($_POST['sub'])
			{
				case 'Phản hồi':
				{
					$this->chuyen_trang("?thamso=phan_hoi&id_lmh=$ma_lmh&id_sv=$ma_sv");
				}
				break;
			}
			}
		}
	}
	//Purpose code: Tạo hàm hiển thị danh sách các lớp thống kê điểm danh theo tài khoản của giảng viên.
	function lop_thong_ke()
	{
		$link=$this->ketnoi();
		$ma_gv=$_SESSION['tk_gv'];
		$sql1="select * from lop_mon_hoc a join mon_hoc b on a.ma_mh=b.ma_mh where ma_gv='$ma_gv'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			$stt=1;
			echo '<table width="750" border="1" align="center" cellspacing="0">
				  <tr>
					<td width="73" align="center" valign="middle">STT</td>
					<td width="213" align="center" valign="middle">MÔN HỌC</td>
					<td width="143" align="center" valign="middle">LỚP</td>
					<td width="143" align="center" valign="middle">HỌC KÌ</td>
					<td width="143" align="center" valign="middle">NĂM HỌC</td>
					<td width="143" align="center" valign="middle">&nbsp;</td>
				  </tr>';
			while($row=mysqli_fetch_array($kq1))
			{
				$link_lmh="?thamso=chi_tiet_diem_danh&id=".$row['ma_lmh'];
				$ten_mh=$row['ten_mh'];
				$ten_lmh=$row['ten_lmh'];
				$hoc_ki=$row['hoc_ki'];
				$nam_hoc=$row['nam_hoc'];
				echo '<tr>
					<td width="73" align="center" valign="middle">'.$stt.'</td>
					<td width="213" align="center" valign="middle">'.$ten_mh.'</td>
					<td width="143" align="center" valign="middle">'.$ten_lmh.'</td>
					<td width="143" align="center" valign="middle">'.$hoc_ki.'</td>
					<td width="143" align="center" valign="middle">'.$nam_hoc.'</td>
					<td width="143" align="center" valign="middle"><a href="?thamso=chi_tiet_thong_ke&id_lmh='.$row['ma_lmh'].'">Thống kê</a></td>
				  </tr>';
				  $stt++;
			}
			echo '</table>';
		}
	}
	//Purpose code: Tạo hàm hiển thị chi tiết thống kê tình trạng điểm danh của sv trong lớp giảng viên đã chọn và có thể xuất kết quả ra file excel.
	function chi_tiet_thong_ke()
	{
		$ma_lmh=$_GET['id_lmh'];
		$link=$this->ketnoi();
		$sql1="select * from sinh_vien_lop_mon_hoc a join sinh_vien b on a.ma_sv=b.ma_sv where ma_lmh='$ma_lmh' order by ten";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			$stt=1;
			echo '<table width="700" border="1" cellspacing="0" align="center">
				  <tr>
					<td width="40"><strong>Stt</strong></td>
					<td width="100"><strong>Mssv</strong></td>
					<td width="180"><strong>Họ và tên</strong></td>
					<td width="60"><strong>Có phép</strong></td>
					<td width="60"><strong>Không phép</strong></td>
					<td width="60"><strong>Đi trễ</strong></td>
					<td width="70">&nbsp;</td>
				  </tr>';
				while($row1=mysqli_fetch_array($kq1))
				{
					$ma_sv=$row1['ma_sv'];
					$ten=$row1['ho_dem_ten'];
					$sql2="select * from diem_danh a join chi_tiet_diem_danh b on a.id_diem_danh=b.id_diem_danh where ma_lmh='$ma_lmh' and ma_sv='$ma_sv'";
					$kq2=mysqli_query($link,$sql2);
					$i2=mysqli_num_rows($kq2);
					if($i2>0)
					{
						$vcp=0;
						$vkp=0;
						$dt=0;
						 while($row2=mysqli_fetch_array($kq2))
						 {
							 $trang_thai=$row2['trang_thai_diem_danh'];
							 switch($trang_thai)
								 {
									case '1':
									{
										$vcp++;
									}
									break;
									case '2':
									{
										$vkp++;
									}
									break;
									case '3':
									{
										$dt++;
									}
									break;
								} 
						}
					}
					echo '<tr>
							<td>'.$stt.'</td>
							<td>'.$ma_sv.'</td>
							<td>'.$ten.'</td>
							<td>'.$vcp.'</td>
							<td>'.$vkp.'</td>
							<td>'.$dt.'</td>
							<td><a href="?thamso=chi_tiet_thong_ke_sinh_vien&id_sv='.$ma_sv.'&id_lmh='.$ma_lmh.'">Xem chi tiết</a></td>

						  </tr>';
						  $stt++;
				}
				echo '</table>';
				echo '<br><center><form method="post">
						<input type="submit" name="sub1" value="Xuất file excel" />
						</form></center>';
						
						
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		switch($_POST['sub1'])
		{
			case 'Xuất file excel':
			{
				require('Classes/PHPExcel.php');
				
				$objExcel = new PHPExcel();
				
				
				$ma_lmh=$_GET['id_lmh'];
				$link=$this->ketnoi();
				$sql1="select * from lop_mon_hoc a join mon_hoc b on a.ma_mh=b.ma_mh join giang_vien c on a.ma_gv=c.ma_gv where ma_lmh='$ma_lmh'";
				$kq1=mysqli_query($link,$sql1);
				while($row=mysqli_fetch_array($kq1))
				{
					$ma_mh=$row['ma_mh'];
					$ten_mh=$row['ten_mh'];
					$ten_lmh=$row['ten_lmh'];
					$ten_gv=$row['ten'];
					$hoc_ki=$row['hoc_ki'];
					$nam_hoc=$row['nam_hoc'];
					$sheet=$objExcel->getActiveSheet()->setTitle($ten_lmh);
					$sheet->setCellValue('A1','Mã môn học:');
					$sheet->setCellValue('B1',$ma_mh);
					$sheet->setCellValue('C1','Học kỳ:');
					$sheet->setCellValue('D1',$hoc_ki);
					
					$sheet->setCellValue('A2','Tên môn học:');
					$sheet->setCellValue('B2',$ten_mh);
					$sheet->setCellValue('C2','Năm học:');
					$sheet->setCellValue('D2',$nam_hoc);
					
					$sheet->setCellValue('A3','Mã lớp học:');
					$sheet->setCellValue('B3',$ma_lmh);
					$sheet->setCellValue('C3','Cơ sở đào tạo:');
					$sheet->setCellValue('D3','Đại học Công Nghiệp TP.HCM');
					
					$sheet->setCellValue('A4','Tên lớp học:');
					$sheet->setCellValue('B4',$ten_lmh);
					$sheet->setCellValue('C4','Giảng viên:');
					$sheet->setCellValue('D4',$ten_gv);
				}
				$sql2="select * from diem_danh where ma_lmh='$ma_lmh'";
				$kq2=mysqli_query($link,$sql2);
				$i2=mysqli_num_rows($kq2);
				if($i2>0)
				{
					$lan=0;
					while($row2=mysqli_fetch_array($kq2))
					{
						$lan++;
					}
				}
				$sheet->setCellValue('A5','Số buổi đã học:');
				$sheet->setCellValue('B5',$lan);
				
				$sheet->setCellValue('A6','STT');
				$sheet->setCellValue('B6','MSSV');
				$sheet->setCellValue('C6','HỌ VÀ TÊN');
				$sheet->setCellValue('D6','VẮNG CÓ PHÉP');
				$sheet->setCellValue('E6','VẮNG KHÔNG PHÉP');
				$sheet->setCellValue('F6','ĐI TRỄ');
				
				
				$sql3="select * from sinh_vien_lop_mon_hoc a join sinh_vien b on a.ma_sv=b.ma_sv where ma_lmh='$ma_lmh' order by ten";
				$kq3=mysqli_query($link,$sql3);
				$i3=mysqli_num_rows($kq3);
				if($i3>0)
				{
					$rowCount=7;
					$stt=1;
				while($row3=mysqli_fetch_array($kq3))
				{
					$ma_sv=$row3['ma_sv'];
					$ten=$row3['ho_dem_ten'];
					$sql4="select * from diem_danh a join chi_tiet_diem_danh b on a.id_diem_danh=b.id_diem_danh where ma_lmh='$ma_lmh' and ma_sv='$ma_sv'";
					$kq4=mysqli_query($link,$sql4);
					$i4=mysqli_num_rows($kq4);
					if($i4>0)
					{
						$vcp=0;
						$vkp=0;
						$dt=0;
						 while($row4=mysqli_fetch_array($kq4))
						 {
							 $trang_thai=$row4['trang_thai_diem_danh'];
							 switch($trang_thai)
								 {
									case '1':
									{
										$vcp++;
									}
									break;
									case '2':
									{
										$vkp++;
									}
									break;
									case '3':
									{
										$dt++;
									}
									break;
								} 
						}
					}
					$sheet->setCellValue('A'.$rowCount,$stt);
					$sheet->setCellValue('B'.$rowCount,$ma_sv);
					$sheet->setCellValue('C'.$rowCount,$ten);
					$sheet->setCellValue('D'.$rowCount,$vcp);
					$sheet->setCellValue('E'.$rowCount,$vkp);
					$sheet->setCellValue('F'.$rowCount,$dt);
						  $stt++;
						  $rowCount++;
				}
				PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
				$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
				$filename='excel/export_lmh_'.$ma_lmh.'.xlsx';
				$objWriter->save($filename);
				$this->chuyen_trang($filename);
			}
			$this->deletefile($filename);
			break;
			}
						
		}
		}				
		}
	}
	//Purpose code: Tạo hàm xóa file.
	function deletefile($filepath)
	{
		if(file_exists($filepath)) 
		{
			unlink($filepath);
			exit;
    	}
	}
	//Purpose code: Tạo hàm hiển thị chi tiết tình trạng điểm danh của sinh viên theo thời gian và có thể chỉnh sửa nếu sai.
	function chi_tiet_thong_ke_sinh_vien()
	{
		$ma_lmh=$_GET['id_lmh'];
		$ma_sv=$_GET['id_sv'];
		$link=$this->ketnoi();
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$ngay_ht= date('Y-m-d');
		$sql1="select * from diem_danh a join chi_tiet_diem_danh b on a.id_diem_danh=b.id_diem_danh where ma_lmh='$ma_lmh' and ma_sv='$ma_sv' order by id_chi_tiet_diem_danh asc";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			echo '<form method="post">';
			echo '<br><table width="600" border="1" cellspacing="0" align="center">
			  <tr>
				<td><strong>LẦN</strong></td>
				<td><strong>NGÀY</strong></td>
				<td><strong>TRẠNG THÁI</strong></td>
				<td><strong>THAY ĐỔI</strong></td>
			  </tr>';
			 
			  while($row=mysqli_fetch_array($kq1))
			  {
				 $id_chi_tiet_diem_danh=$row['id_chi_tiet_diem_danh'];
				 $lan=$row['lan_diem_danh'];
				 $ngay=$row['ngay_diem_danh'];
				 $trang_thai=$row['trang_thai_diem_danh'];
				 $trang_thai1='';
				 switch($trang_thai)
				 {
					case '1':
					{
						$trang_thai1='Vắng có phép';
					}
					break;
					case '2':
					{
						$trang_thai1='Vắng không phép';
					}
					break;
					case '3':
					{
						$trang_thai1='Đi trễ';
					}
					break;
					case '':
					{
						$trang_thai1='Có mặt';
					}
					break;
				} 
				echo '<tr>
						<td>'.$lan.'</td>
						<td>'.$ngay.'</td>
						<td>'.$trang_thai1.'</td>
						<td>';
						if($ngay!=$ngay_ht)
						{
							echo '<select disabled name="'.$id_chi_tiet_diem_danh.'" id="'.$id_chi_tiet_diem_danh.' ">';
						}
						else
						{
							echo '<select name="'.$id_chi_tiet_diem_danh.'" id="'.$id_chi_tiet_diem_danh.'">';
						}
							echo '
							<option value="no_value"></option>
							<option value="c">Có mặt</option>
							<option value="1">Vắng có phép</option>
							<option value="2">Vắng không phép</option>
							<option value="3">Đi trễ</option>
							</select>
						</td>
					  </tr>';
			}
			echo '</table>';
			echo '<br>Chỉ có thể chỉnh sửa điểm danh trong ngày!';
			echo '<br><center>
						<input type="submit" name="thay_doi" value="Lưu thay đổi" />
						</center></form>';
						
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				switch($_POST['thay_doi'])
				{
					case 'Lưu thay đổi':
					{
						$sql2="select * from diem_danh a join chi_tiet_diem_danh b on a.id_diem_danh=b.id_diem_danh where ma_lmh='$ma_lmh' and ma_sv='$ma_sv' order by id_chi_tiet_diem_danh asc";
						$kq2=mysqli_query($link,$sql2);
						while($row2=mysqli_fetch_array($kq2))
						{
							$id_chi_tiet_diem_danh1=$row2['id_chi_tiet_diem_danh'];
							$trang_thai_cap_nhat=$_REQUEST[$id_chi_tiet_diem_danh1];
							if($trang_thai_cap_nhat!='no_value' )
							{
								if($trang_thai_cap_nhat=='c')
								{
									$this->truy_van("update chi_tiet_diem_danh set trang_thai_diem_danh='' where id_chi_tiet_diem_danh='$id_chi_tiet_diem_danh1' limit 1");
								}
								else
								{
								$this->truy_van("update chi_tiet_diem_danh set trang_thai_diem_danh='$trang_thai_cap_nhat' where id_chi_tiet_diem_danh='$id_chi_tiet_diem_danh1' limit 1");
								}
							}
						}
						$this->thong_bao_html_roi_chuyen_trang('Cập nhật trạng thái điểm danh thành công.','?thamso=chi_tiet_thong_ke_sinh_vien&id_sv='.$ma_sv.'&id_lmh='.$ma_lmh);
					}
					
					break;
				}
			}
		}
	}
	//Purpose code: Tạo hàm hiển thị thông tin về sinh viên được thống kê.
	function thong_tin_thong_ke_sinh_vien()
	{
		$ma_sv=$_GET['id_sv'];
		$link=$this->ketnoi();
		$sql1="select * from sinh_vien where ma_sv='$ma_sv'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i==1)
		{
			while($row=mysqli_fetch_array($kq1))
			{
				$ten=$row['ho_dem_ten'];
				$ngay_sinh=$row['ngay_sinh'];
				$gioi_tinh=$row['gioi_tinh'];
				$lop=$row['lop'];
				echo '<table width="500" border="0" cellspacing="0">
					  <tr>
						<td width="100"><strong>Mã sinh viên</strong></td>
						<td width="200">'.$ma_sv.'</td>
					  </tr>
					  <tr>
						<td><strong>Họ và tên:</strong></td>
						<td>'.$ten.'</td>
					  </tr>
					  <tr>
						<td><strong>Ngày sinh:</strong></td>
						<td>'.$ngay_sinh.'</td>
					  </tr>
					  <tr>
						<td><strong>Giới tính:</strong></td>
						<td>'.$gioi_tinh.'</td>
					  </tr>
					  <tr>
						<td><strong>Lớp niên chế:</strong></td>
						<td>'.$lop.'</td>
					  </tr>
					</table>';
			}
		}
	}
	//Purpose code: Tạo hàm hiển thị số buổi học.
	function so_buoi_hoc()
	{
		$ma_lmh=$_GET['id_lmh'];
		$link=$this->ketnoi();
		$sql1="select * from diem_danh where ma_lmh='$ma_lmh'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>-1)
		{
			$lan=0;
			while($row=mysqli_fetch_array($kq1))
			{
				$lan++;
			}
			echo 'Số buổi đã học:  '.$lan;
		}
	}
	//Purpose code: Tạo hàm phản hồi cho sinh viên nếu tình trang điểm danh sai.
	function phan_hoi()
	{
		echo '<form id="form1" name="form1" method="post" action="">
			  <table width="600" border="1" align="center">
				<tr>
				  <td width="190">Tiểu đề phản hồi</td>
				  <td width="394"><input name="txtTD" type="text" id="txtTD" width="370" /></td>
				</tr>
				<tr>
				  <td>Nội dung phản hồi</td>
				  <td><textarea name="txtND" id="txtND" cols="50" rows="5"></textarea></td>
				</tr>
			  </table>
			  <center>
				<input type="submit" name="button" id="button" value="Gửi phản hồi" />
			  </center>
			</form>';
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			switch($_POST['button'])
			{
				case 'Gửi phản hồi':
				{
					$ma_sv=$_GET['id_sv'];
					$ma_lmh=$_GET['id_lmh'];
					$tieu_de=$_REQUEST['txtTD'];
					$noi_dung=$_REQUEST['txtND'];
					$date=getdate();
					$ngay=$date['year'].'/'.$date['mon'].'/'.$date['mday'];
					$link=$this->ketnoi();
					$sql1="select * from lop_mon_hoc where ma_lmh='$ma_lmh' limit 1";
					$kq1=mysqli_query($link,$sql1);
					$i=mysqli_num_rows($kq1);
					if($i==1)
					{
						while($row=mysqli_fetch_array($kq1))
						{
							$ma_gv=$row['ma_gv'];
						}
						if($tieu_de!='' and $noi_dung!='')
						{
							if($this->truy_van("insert into phan_hoi  (ma_ng_gui,ma_ng_nhan,tieu_de,noi_dung,ma_lmh,thoi_gian) values ('$ma_sv','$ma_gv','$tieu_de','$noi_dung','$ma_lmh','$ngay')")==1)
							{
								$this->thong_bao_html_roi_chuyen_trang('Gửi phản hồi thành công.','?thamso=xem_diem_danh');
							}
							else
							{
								$this->thong_bao_html123("Gửi phản hồi không thành công. Vui lòng thử lại");						
							}
						}
						else
						{
							$this->thong_bao_html123("Vui lòng nhập đầy đủ thông tin.");
						}
					}
				}
				break;
			}
			}
	}
	//Purpose code: Tạo hàm hiển thị lịch sử phản hồi của sinh viên.
	function lich_su_phan_hoi()
	{
		$ma_sv=$_SESSION['tk_sv'];
		$link=$this->ketnoi();
		$sql1="select * from phan_hoi where ma_ng_gui='$ma_sv' order by id_phan_hoi	desc";
		$kq1=mysqli_query($link,$sql1);
		$i1=mysqli_num_rows($kq1);
		if($i1>0)
		{
			while($row=mysqli_fetch_array($kq1))
			{
				$tieu_de=$row['tieu_de'];	
				$noi_dung=$row['noi_dung'];
				$ma_lmh=$row['ma_lmh'];
				$thoi_gian=$row['thoi_gian'];
				$sql2="select * from lop_mon_hoc a join mon_hoc b on a.ma_mh=b.ma_mh join giang_vien c on a.ma_gv=c.ma_gv where ma_lmh='$ma_lmh'";
				$kq2=mysqli_query($link,$sql2);
				$i2=mysqli_num_rows($kq2);
				if($i2==1)
				{
					while($row2=mysqli_fetch_array($kq2))
					{
						$ma_mh=$row2['ma_mh'];
						$ten_mh=$row2['ten_mh'];
						$ten_lmh=$row2['ten_lmh'];
						$ten_gv=$row2['ten'];
						$hoc_ki=$row2['hoc_ki'];
						$nam_hoc=$row2['nam_hoc'];
						echo '<center><div class="lich_su_phan_hoi">
						<h3><u>Thông tin phản hồi</u></h3>
						<table width="750" border="0" cellspacing="0">
							  <tr>
								<td width="144"><strong>Mã môn học:</strong></td>
								<td width="170">'.$ma_mh.'</td>
								<td width="160"><strong>Học kỳ:</strong></td>
								<td width="308">'.$hoc_ki.'</td>
							  </tr>
							  <tr>
								<td><strong>Tên môn học:</strong></td>
								<td>'.$ten_mh.'</td>
								<td><strong>Năm học:</strong></td>
								<td>'.$nam_hoc.'</td>
							  </tr>
							  <tr>
								<td><strong>Mã lớp học:</strong></td>
								<td>'.$ma_lmh.'</td>
								<td><strong>Cơ sở đào tạo:</strong></td>
								<td>Đại học Công Nghiệp TP.HCM</td>
							  </tr>
							  <tr>
								<td><strong>Tên lớp học:</strong></td>
								<td>'.$ten_lmh.'</td>
								<td><strong>Giảng viên:</strong></td>
								<td>'.$ten_gv.'</td>
							  </tr>
							</table><hr>';
					}
				}
				echo '<p><strong>Thời gian phản hồi:</strong>&nbsp;'.$thoi_gian.'</p>
				<table width="600" border="0" align="center">
				  <tr>
					<td width="150"><strong>Tiêu đề phản hồi:</strong></td>
					<td>'.$tieu_de.'</td>
				  </tr>
				  <tr>
					<td><strong>Nội dung phản hồi:</strong></td>
					<td>'.$noi_dung.'</td>
				  </tr>
				</table><br></div></center>';
			}
		}
	}
	//Purpose code: Tạo hàm hiển thị các phản hồi của sinh viên theo từng môn học.
	function danh_sach_phan_hoi_sinh_vien()
	{
		$link=$this->ketnoi();
		$ma_gv=$_SESSION['tk_gv'];
		$sql1="select * from lop_mon_hoc a join mon_hoc b on a.ma_mh=b.ma_mh where ma_gv='$ma_gv'";
		$kq1=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($kq1);
		if($i>0)
		{
			$stt=1;
			echo '<table width="750" border="1" align="center" cellspacing="0">
				  <tr>
					<td width="73" align="center" valign="middle">STT</td>
					<td width="213" align="center" valign="middle">MÔN HỌC</td>
					<td width="143" align="center" valign="middle">LỚP</td>
					<td width="143" align="center" valign="middle">HỌC KÌ</td>
					<td width="143" align="center" valign="middle">NĂM HỌC</td>
					<td width="143" align="center" valign="middle">SỐ PHẢN HỒI</td>
					<td width="80" align="center" valign="middle">&nbsp;</td>
				  </tr>';
			while($row=mysqli_fetch_array($kq1))
			{
				$ma_lmh=$row['ma_lmh'];
				$link_lmh="?thamso=chi_tiet_diem_danh&id=".$row['ma_lmh'];
				$ten_mh=$row['ten_mh'];
				$ten_lmh=$row['ten_lmh'];
				$hoc_ki=$row['hoc_ki'];
				$nam_hoc=$row['nam_hoc'];
				$sql2="select * from phan_hoi where ma_lmh='$ma_lmh'";
				$kq2=mysqli_query($link,$sql2);
				$i2=mysqli_num_rows($kq2);
				if($i2>-1)
				{
					$dem=0;
					while($row2=mysqli_fetch_array($kq2))
					{
						$dem++;						
					}
				}
				echo '<tr>
					<td width="73" align="center" valign="middle">'.$stt.'</td>
					<td width="213" align="center" valign="middle">'.$ten_mh.'</td>
					<td width="143" align="center" valign="middle">'.$ten_lmh.'</td>
					<td width="143" align="center" valign="middle">'.$hoc_ki.'</td>
					<td width="143" align="center" valign="middle">'.$nam_hoc.'</td>
					<td width="143" align="center" valign="middle">'.$dem.'</td>
					<td width="80" align="center" valign="middle"><a href="?thamso=chi_tiet_phan_hoi&id_lmh='.$row['ma_lmh'].'">Xem</a></td>
				  </tr>';
				  $stt++;
			}
			echo '</table>';
		}
	}
	//Purpose code: Tạo hàm hiển thị thông tin của sinh viên đã gửi phản hồi.
	function chi_tiet_phan_hoi_sinh_vien()
	{
		$ma_gv=$_SESSION['tk_gv'];
		$ma_lmh=$_GET['id_lmh'];
		$link=$this->ketnoi();
		$sql1="select * from phan_hoi where ma_ng_nhan='$ma_gv' and ma_lmh='$ma_lmh' order by id_phan_hoi desc";
		$kq1=mysqli_query($link,$sql1);
		$i1=mysqli_num_rows($kq1);
		if($i1>0)
		{
			while($row1=mysqli_fetch_array($kq1))
			{
				$ma_ng_gui=$row1['ma_ng_gui'];
				$tieu_de=$row1['tieu_de'];
				$noi_dung=$row1['noi_dung'];
				$thoi_gian=$row1['thoi_gian'];
				$sql2="select * from lop_mon_hoc a join mon_hoc b on a.ma_mh=b.ma_mh where ma_lmh='$ma_lmh'";
				$kq2=mysqli_query($link,$sql2);
				$i2=mysqli_num_rows($kq2);
				if($i2==1)
				{
					while($row2=mysqli_fetch_array($kq2))
					{
						$ma_mh=$row2['ma_mh'];
						$ten_mh=$row2['ten_mh'];
						$ten_lmh=$row2['ten_lmh'];
						$hoc_ki=$row2['hoc_ki'];
						$nam_hoc=$row2['nam_hoc'];
					}
				}
				$sql3="select * from sinh_vien where ma_sv='$ma_ng_gui'";
				$kq3=mysqli_query($link,$sql3);
				$i3=mysqli_num_rows($kq3);
				if($i3==1)
				{
					while($row3=mysqli_fetch_array($kq3))
					{
						$ten_sv=$row3['ho_dem_ten'];
					}
				}
				echo '<center><div class="lich_su_phan_hoi">
						<h3><u>Thông tin phản hồi</u></h3>
						<table width="800" border="0" cellspacing="0">
							  <tr>
								<td width="144"><strong>Mã môn học:</strong></td>
								<td width="170">'.$ma_mh.'</td>
								<td width="160"><strong>Học kỳ:</strong></td>
								<td width="308">'.$hoc_ki.'</td>
							  </tr>
							  <tr>
								<td><strong>Tên môn học:</strong></td>
								<td>'.$ten_mh.'</td>
								<td><strong>Năm học:</strong></td>
								<td>'.$nam_hoc.'</td>
							  </tr>
							  <tr>
								<td><strong>Mã lớp học:</strong></td>
								<td>'.$ma_lmh.'</td>
								<td><strong>Mã số sinh viên:</strong></td>
								<td>'.$ma_ng_gui.'</td>
							  </tr>
							  <tr>
								<td><strong>Tên lớp học:</strong></td>
								<td>'.$ten_lmh.'</td>
								<td><strong>Tên sinh viên:</strong></td>
								<td>'.$ten_sv.'</td>
							  </tr>
							</table><hr>';
							echo '<p><strong>Thời gian phản hồi:</strong>&nbsp;'.$thoi_gian.'</p>
				<table width="600" border="0" align="center">
				  <tr>
					<td width="150"><strong>Tiêu đề phản hồi:</strong></td>
					<td>'.$tieu_de.'</td>
				  </tr>
				  <tr>
					<td><strong>Nội dung phản hồi:</strong></td>
					<td>'.$noi_dung.'</td>
				  </tr>
				</table><br></div></center>';
			}
		}

	}
	/*function inser_tb()
	{
		$link=$this->ketnoi();
		$sql1="select * from sinh_vien";
		$kq1=mysqli_query($link,$sql1);
		$i1=mysqli_num_rows($kq1);
		if($i1>0)
		{
				while($row1=mysqli_fetch_array($kq1))
				{
					$ma_sv=$row1['ma_sv'];
					$this->truy_van("insert into sinh_vien_lop_mon_hoc (ma_lmh,ma_sv,hoc_ki,nam_hoc) values ('1230091','$ma_sv','2','2019-2020')");
				}
				$this->thong_bao_html123("Complete mission.");
		}
		
	}*/
}
?>