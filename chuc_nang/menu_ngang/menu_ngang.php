<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo phần hiển thị menu ngang theo từng đối tượng.-->
<?php
echo "<div class='menu_ngang'>";
		
	if(isset($_SESSION['tk_sv']))
	{
		echo "<a href='index.php'>Trang chủ</a>";
		echo "<a href='?thamso=xem_diem_danh'>Xem điểm danh</a>";
		echo "<a href='?thamso=lich_su_phan_hoi'>Lịch sử phản hồi</a>";
	}
	else if (isset($_SESSION['tk_gv']))
	{
			echo "<a href='index.php'>Trang chủ</a>";
			echo "<a href='?thamso=diem_danh_sinh_vien'>Điểm danh</a>";
			echo "<a href='?thamso=thong_ke_diem_danh'>Thống kê</a>";
			echo "<a href='?thamso=danh_sach_phan_hoi'>Danh sách phản hồi</a>";
	}
	else
	{
		if(isset($_SESSION['tk_admin']))
		{
			echo '<ul class="nav">
			   <li><a href="?thamso=admin">Sinh Viên</a>
					<ul class="sub-menu">
						<li><a href="?thamso=admin_them_sv">Thêm sinh viên</a></li>
						
				 	</ul>
			   </li>
			   <li><a href="?thamso=admin">Giảng Viên</a>
					 <ul class="sub-menu">
						<li><a href="?thamso=admin_them_gv">Thêm giảng viên</a></li>
						
					 </ul>
			   </li>
			   <li><a href="?thamso=admin">Môn Học</a>
					 <ul class="sub-menu">
						<li><a href="?thamso=admin_them_mh">Thêm môn học</a></li>
						
					 </ul>
			   </li>
			   <li><a href="?thamso=admin">Lớp Môn Học</a>
					 <ul class="sub-menu">
						<li><a href="?thamso=admin_them_lmh">Thêm lớp môn học</a></li>
						
					 </ul>
			   </li>
			   <li><a href="?thamso=admin">Sinh viên-Lớp môn học</a>
					 <ul class="sub-menu">
						<li><a href="?thamso=admin_them_sv_lmh">Thêm lớp môn học</a></li>
					 </ul>
			   </li>
			</ul>';
		}
		else
		{
			echo "<a href='index.php'>Trang chủ</a>";
		}
	}
echo "</div>";
?>
