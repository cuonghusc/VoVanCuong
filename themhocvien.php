<?php if (isset($_REQUEST['submit'])) {
	if (trim($_REQUEST['mahocvien']=='')||trim($_REQUEST['ho']=='')||trim($_REQUEST['ten']=='')||trim($_REQUEST['quequan']=='')||trim($_REQUEST['ngaysinh']=='')||trim($_REQUEST['noisinh']=='')||trim($_REQUEST['ngaycap']=='')||trim($_REQUEST['socap']=='')||trim($_REQUEST['machungchi']=='')||trim($_REQUEST['diemthuchanh']=='')||trim($_REQUEST['diemlythuyet']=='')) {
		$noti =  "<div class='alert alert-danger' role='alert'>Vui lòng điền đầy đủ tất cả các trường</div>";
	}else{
		require 'model/hocvien.php';
		$mahocvien = $_REQUEST['mahocvien'];
		if (HocVien::checkHV($mahocvien)==false) {
			$noti =  "<div class='alert alert-danger' role='alert'>Học viên này đã tồn tại</div>";
		}
		else{
			$ho = $_REQUEST['ho'];
			$ten = $_REQUEST['ten'];
			$quequan = $_REQUEST['quequan'];
			$ngaysinh = $_REQUEST['ngaysinh'];
			$noisinh = $_REQUEST['noisinh'];
			$ngaycap = $_REQUEST['ngaycap'];
			$socap = $_REQUEST['socap'];
			$machungchi = $_REQUEST['machungchi'];
			$diemthuchanh = $_REQUEST['diemthuchanh'];
			$diemlythuyet = $_REQUEST['diemlythuyet'];
			if ($diemthuchanh < 5 || $diemthuchanh >10 || $diemlythuyet < 5 || $diemlythuyet > 10) {
				$noti =  "<div class='alert alert-danger' role='alert'>Điểm thi không hợp lệ</div>";
			}else{
				$themhocvien = HocVien::themHocVien($mahocvien,$ho,$ten,$quequan,$ngaysinh,$noisinh,$ngaycap,$socap,$machungchi,$diemthuchanh,$diemlythuyet);
				if ($themhocvien==true) {
					$noti =  "<div class='alert alert-success' role='alert'>Thêm thành công</div>";
				}else{
					$noti =  "<div class='alert alert-danger' role='alert'>Thêm thất bại</div>";
				}			
			}	
		}
	}
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm học viên / Hệ thống quản lý chứng chỉ tin học</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="tieu-de">
			<h3>THÊM HỌC VIÊN VÀO DANH SÁCH CẤP CHỨNG CHỈ</h3>
		</div>
		<form method="POST">
		<?php
			echo isset($noti)?$noti:'';
		?>
		<div class="form-group">			
			<label>Mã học viên</label>
			<input name="mahocvien" type="text" class="form-control" placeholder="HV001" value="<?php echo isset($mahocvien)?$mahocvien:''; ?>">		
		</div>
		<div class="form-group">
			<label>Họ</label>
			<input name="ho" type="text" class="form-control" placeholder="Nguyễn Văn" value="<?php echo isset($ho)?$ho:''; ?>">		
		</div>
		<div class="form-group">
			<label>Tên</label>
			<input name="ten" type="text" class="form-control" placeholder="Anh" value="<?php echo isset($ten)?$ten:''; ?>">		
		</div>
		<div class="form-group">
			<label>Quê quán</label>
			<input name="quequan" type="text" class="form-control" placeholder="Thừa Thiên Huế" value="<?php echo isset($quequan)?$quequan:''; ?>">		
		</div>

		<div class="form-group">
			<label>Ngày sinh</label>
			<input name="ngaysinh" type="number" min="1970" max="<?php echo date("Y"); ?>" class="form-control" placeholder="1990" value="<?php echo isset($ngaysinh)?$ngaysinh:''; ?>">		
		</div>
		<div class="form-group">
			<label>Nơi sinh</label>
			<input name="noisinh" type="text" class="form-control" placeholder="Huế" value="<?php echo isset($noisinh)?$noisinh:''; ?>">		
		</div>		
		<div class="form-group">
			<label>Ngày cấp</label>
			<input name="ngaycap" type="date" class="form-control" value="<?php echo isset($mahocvien)?$ngaycap:date('Y-m-d'); ?>">		
		</div>
		<div class="form-group">
			<label>Số cấp</label>
			<input name="socap" type="text" class="form-control" placeholder="24/QĐ-DHKH" value="<?php echo isset($socap)?$socap:''; ?>">		
		</div>
		<div class="form-group">
			<label>Loại chứng chỉ</label>
			<select name="machungchi">
				<?php
				include_once 'model/chungchi.php';
				$chungchi = ChungChi::getAllChungChi();
				foreach ($chungchi as $key => $value) {
					echo "<option value=".$value->machungchi.">".$value->tenchungchi."</option>";
				} ?>
			</select>	
		</div>
		<div class="form-group">
			<label>Điểm thực hành</label>
			<input name="diemthuchanh" type="number" min="5" max="10" class="form-control" placeholder="10" value="<?php echo isset($diemthuchanh)?$diemthuchanh:''; ?>">		
		</div>
		<div class="form-group">
			<label>Điểm lý thuyết</label>
			<input name="diemlythuyet" type="number" min="5" max="10" class="form-control" placeholder="10" value="<?php echo isset($diemlythuyet)?$diemlythuyet:''; ?>">		
		</div>
		<button name="submit" type="submit" class="btn btn-primary">Thêm</button>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>