<?php 
	include_once 'model/hocvien.php';
	include_once 'model/chungchi.php';
	$chungchi = ChungChi::getAllChungChi();
	if (isset($_REQUEST['chungchi'])) {
		$mcc = $_REQUEST['chungchi'];
		if (ChungChi::checkChungChi($mcc) == true) {
			$hocvien = HocVien::getHocVienByCC($mcc);
		} else{
			$hocvien = HocVien::getAll();
		}

	}else{
		$hocvien = HocVien::getAll();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hệ thống quản lý chứng chỉ tin học</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="tieu-de">
			<h3>HỆ THỐNG QUẢN LÝ CHỨNG CHỈ TIN HỌC</h3>
		</div>
		<div class="chuc-nang">
			<form class="loc-chung-chi">
				<div class="form-control">
					<label>Loại chứng chỉ</label>
					<select name="chungchi">
						<?php foreach ($chungchi as $key => $value) {
							echo "<option value=".$value->machungchi.">".$value->tenchungchi."</option>";
						} ?>
					</select>					
				</div>
				<button class="btn btn-success">Lọc</button>
			</form>
			<a href="quanlychungchi.php" class="btn btn-danger">Quản lý chứng chỉ</a>
		</div>
		<hr>
		<label>Danh sách học viên được cấp chứng chỉ</label>
		<table class="table table-borderedt table-hover">
			<thead class="thead-dark">
				<tr>
					<th>STT</th>
					<th>Họ và tên</th>
					<th>Ngày sinh</th>
					<th>Nơi sinh</th>
					<th>Quê quán</th>
					<th>Ngày cấp</th>
					<th>Số cấp</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$stt = 0;
				foreach ($hocvien as $key => $value) {
					echo "<tr>
					<td>".++$stt."</td>
					<td>".$value->ho." ".$value->ten."</td>
					<td>".$value->ngaysinh."</td>
					<td>".$value->noisinh."</td>
					<td>".$value->quequan."</td>
					<td>".$value->ngaycap."</td>
					<td>".$value->socap."</td>
				</tr>";
				}
				?>
				
			</tbody>
		</table>
		<div class="float-right">
			<a href="themhocvien.php" class="btn btn-success">Thêm học viên được cấp chứng chỉ</a>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>