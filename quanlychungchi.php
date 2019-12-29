<?php 
include_once 'model/chungchi.php';
$chungchi = ChungChi::getAllChungChi();
// print_r($chungchi); ?>
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
			<h3>DANH SÁCH CHỨNG CHỈ</h3>
		</div>
		<hr>
		<center>
			<a href="themcc.php" class="btn btn-success">Thêm chứng chỉ</a>
		</center>
		<br>
		<table class="table table-borderedt table-hover">
			<thead class="thead-dark">
				<tr>
					<th>STT</th>
					<th>Mã Chứng Chỉ</th>
					<th>Tên Chứng chỉ</th>
					<th>Sửa</th>
					<th>Xóa</th>
				</tr>
			</thead>			
			<tbody>
				<?php
				$dem = 0;
				 foreach ($chungchi as $key => $value) {
					echo "<tr>
					<td>".++$dem."</td>
					<td>".$value->machungchi."</td>
					<td>".$value->tenchungchi."</td>
					<td><a href='suacc.php?id=".$value->machungchi."' class='btn btn-warning'>Sửa</a></td>
					<td><a href='xoacc.php?id=".$value->machungchi."' class='btn btn-danger'>Xóa</a></td>
				</tr>";
				} ?>			
				
			</tbody>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>