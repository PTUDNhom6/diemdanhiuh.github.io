<!--Author:Nguyễn Minh Nhật	-->
<!--Last updated date: 28/04/2020-->
<!--Purpose code: Tạo phần điều hướng cho các chức năng chính.-->
<?php
    if(isset($_GET['thamso']))
	{
		$tham_so=$_GET['thamso'];
	}
	else
	{
		$tham_so="";
	}
	
	if(isset($_SESSION['tk_sv']))
	{
		switch($tham_so)
    	{
			case "doi_mat_khau":
            	include("chuc_nang/doi_mat_khau/doi_mat_khau.php");
       		 break;
			 case "xem_diem_danh":
            	include("chuc_nang/xem_diem_danh/xem_diem_danh.php");
       		 break;
			case "chi_tiet_xem_diem_danh":
            	include("chuc_nang/xem_diem_danh/chi_tiet_xem_diem_danh.php");
        	break;
			case "phan_hoi":
            	include("chuc_nang/phan_hoi/phan_hoi.php");
       		break;
			case "lich_su_phan_hoi":
            	include("chuc_nang/phan_hoi/lich_su_phan_hoi.php");
       		break;
			case "thong_bao":
            	include("chuc_nang/your_account_is_not_authorized/thong_bao.html");
       		break;
			default:
			 include("chuc_nang/your_account_is_not_authorized/your_account_is_not_authorized.php");
             
		}
	}
	else if (isset($_SESSION['tk_gv']))
	{
		switch($tham_so)
    	{
			case "doi_mat_khau":
            	include("chuc_nang/doi_mat_khau/doi_mat_khau.php");
       		 break;
			case "diem_danh_sinh_vien":
				include("chuc_nang/diem_danh_sinh_vien/diem_danh_sinh_vien.php");
			break;
			case "chi_tiet_diem_danh":
				include("chuc_nang/diem_danh_sinh_vien/chi_tiet_diem_danh.php");
			break;
			case "thong_ke_diem_danh":
				include("chuc_nang/thong_ke_diem_danh/thong_ke_diem_danh.php");
			break;
			case "chi_tiet_thong_ke":
				include("chuc_nang/thong_ke_diem_danh/chi_tiet_thong_ke.php");
			break;
			case "chi_tiet_thong_ke_sinh_vien":
				include("chuc_nang/thong_ke_diem_danh/chi_tiet_thong_ke_sinh_vien.php");
			break;
			case "danh_sach_phan_hoi":
				include("chuc_nang/phan_hoi/danh_sach_phan_hoi.php");
			break;
			case "chi_tiet_phan_hoi":
				include("chuc_nang/phan_hoi/chi_tiet_phan_hoi.php");
			break;
			case "thong_bao":
            	include("chuc_nang/your_account_is_not_authorized/thong_bao.html");
       		break;
			default:
			 include("chuc_nang/your_account_is_not_authorized/your_account_is_not_authorized.php");
            
		}
	}
	else if(isset($_SESSION['tk_admin']))
	{
			switch($tham_so)
    		{
				case "doi_mat_khau":
            		include("chuc_nang/doi_mat_khau/doi_mat_khau.php");
       			break;
				case "admin_them_sv":
					include("chuc_nang/admin/admin_them_sv.php");
				break;
				case "admin_sua_sv":
					include("chuc_nang/admin/admin_sua_sv.php");
				break;
				case "admin_xoa_sv":
					include("chuc_nang/admin/admin_xoa_sv.php");
				break;
				case "admin_them_gv":
					include("chuc_nang/admin/admin_them_gv.php");
				break;
				case "admin_sua_gv":
					include("chuc_nang/admin/admin_sua_gv.php");
				break;
				case "admin_xoa_gv":
					include("chuc_nang/admin/admin_xoa_gv.php");
				break;
				case "admin_them_mh":
					include("chuc_nang/admin/admin_them_mh.php");
				break;
				case "admin_sua_mh":
					include("chuc_nang/admin/admin_sua_mh.php");
				break;
				case "admin_xoa_mh":
					include("chuc_nang/admin/admin_xoa_mh.php");
				break;
				case "admin_them_lmh":
					include("chuc_nang/admin/admin_them_lmh.php");
				break;
				case "admin_sua_lmh":
					include("chuc_nang/admin/admin_sua_lmh.php");
				break;
				case "admin_xoa_lmh":
					include("chuc_nang/admin/admin_xoa_lmh.php");
				break;
				case "admin_them_sv_lmh":
					include("chuc_nang/admin/admin_them_sv_lmh.php");
				break;
				case "admin_xoa_sv_lmh":
					include("chuc_nang/admin/admin_xoa_sv_lmh.php");
				break;
				case "thong_bao":
            	include("chuc_nang/your_account_is_not_authorized/thong_bao.html");
       		break;
				default:
			 include("chuc_nang/your_account_is_not_authorized/your_account_is_not_authorized.php");
			}
		
	}
	else
	{
		switch($tham_so)
    	{
			case "thong_bao":
            	include("chuc_nang/your_account_is_not_authorized/thong_bao.html");
       		break;
			default:
			 include("chuc_nang/your_account_is_not_authorized/your_account_is_not_authorized.php");
             
		}			
	}
	
    /*switch($tham_so)
    {
        case "doi_mat_khau":
            include("chuc_nang/doi_mat_khau/doi_mat_khau.php");
        break;
		case "diem_danh_sinh_vien":
            include("chuc_nang/diem_danh_sinh_vien/diem_danh_sinh_vien.php");
        break;
		case "chi_tiet_diem_danh":
            include("chuc_nang/diem_danh_sinh_vien/chi_tiet_diem_danh.php");
        break;
		case "thong_ke_diem_danh":
            include("chuc_nang/thong_ke_diem_danh/thong_ke_diem_danh.php");
        break;
		case "chi_tiet_thong_ke":
            include("chuc_nang/thong_ke_diem_danh/chi_tiet_thong_ke.php");
        break;
		case "chi_tiet_thong_ke_sinh_vien":
            include("chuc_nang/thong_ke_diem_danh/chi_tiet_thong_ke_sinh_vien.php");
        break;
		case "xem_diem_danh":
            include("chuc_nang/xem_diem_danh/xem_diem_danh.php");
        break;
		case "chi_tiet_xem_diem_danh":
            include("chuc_nang/xem_diem_danh/chi_tiet_xem_diem_danh.php");
        break;
		case "admin_them_sv":
            include("chuc_nang/admin/admin_them_sv.php");
        break;
		case "admin_sua_sv":
            include("chuc_nang/admin/admin_sua_sv.php");
        break;
		case "admin_xoa_sv":
            include("chuc_nang/admin/admin_xoa_sv.php");
        break;
		case "admin_them_gv":
            include("chuc_nang/admin/admin_them_gv.php");
        break;
		case "admin_sua_gv":
            include("chuc_nang/admin/admin_sua_gv.php");
        break;
		case "admin_xoa_gv":
            include("chuc_nang/admin/admin_xoa_gv.php");
        break;
		case "admin_them_mh":
            include("chuc_nang/admin/admin_them_mh.php");
        break;
		case "admin_sua_mh":
            include("chuc_nang/admin/admin_sua_mh.php");
        break;
		case "admin_xoa_mh":
            include("chuc_nang/admin/admin_xoa_mh.php");
        break;
		case "admin_them_lmh":
            include("chuc_nang/admin/admin_them_lmh.php");
        break;
		case "admin_sua_lmh":
            include("chuc_nang/admin/admin_sua_lmh.php");
        break;
		case "admin_xoa_lmh":
            include("chuc_nang/admin/admin_xoa_lmh.php");
        break;
		case "admin_them_sv_lmh":
            include("chuc_nang/admin/admin_them_sv_lmh.php");
        break;
		case "admin_xoa_sv_lmh":
            include("chuc_nang/admin/admin_xoa_sv_lmh.php");
        break;
		case "phan_hoi":
            include("chuc_nang/phan_hoi/phan_hoi.php");
        break;
        default:       
    }*/
?>