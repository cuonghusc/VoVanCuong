<?php 
	/**
	 * 
	 */
	class HocVien
	{
		var $mahocvien;
		var $ho;
		var $ten;
		var $quequan;
		var $ngaysinh;
		var $noisinh;
		var $ngaycap;
		var $socap;
		var $diemthuchanh;
		var $diemlythuyet;
		
		function __construct($mahocvien,$ho,$ten,$quequan,$ngaysinh,$noisinh,$ngaycap,$socap,$diemthuchanh,$diemlythuyet)
		{
			$this->mahocvien = $mahocvien;
			$this->ho = $ho;
			$this->ten = $ten;
			$this->quequan = $quequan;
			$this->ngaysinh = $ngaysinh;
			$this->noisinh = $noisinh;
			$this->ngaycap = $ngaycap;
			$this->socap = $socap;
			$this->diemthuchanh = $diemthuchanh;
			$this->diemlythuyet = $diemlythuyet;
		}
		public static function getAll(){
			require 'connect.php';
			$query = "SELECT *  FROM hocvien JOIN capcho ON hocvien.mahocvien = capcho.mahocvien";
                $result = $connect->query($query);
                $rs = array();
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        array_push($rs,new HocVien(
                            $rows["mahocvien"],
                            $rows["ho"],
                            $rows["ten"],
                            $rows["quequan"],
                            $rows["ngaysinh"],
                            $rows["noisinh"],
                            $rows["ngaycap"],
                            $rows["socap"],
                            $rows["diemthuchanh"],
                            $rows["diemlythuyet"]
                        ));
                    }
                }
                $connect->close();
                return $rs;	
		}
		public static function getHocVienByCC($machungchi){
			require 'connect.php';
			$query = "SELECT *  FROM hocvien JOIN capcho ON hocvien.mahocvien = capcho.mahocvien WHERE machungchi = '{$machungchi}'";
                $result = $connect->query($query);
                $rs = array();
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        array_push($rs,new HocVien(
                            $rows["mahocvien"],
                            $rows["ho"],
                            $rows["ten"],
                            $rows["quequan"],
                            $rows["ngaysinh"],
                            $rows["noisinh"],
                            $rows["ngaycap"],
                            $rows["socap"],
                            $rows["diemthuchanh"],
                            $rows["diemlythuyet"]
                        ));
                    }
                }
                $connect->close();
                return $rs;	
		}
		public static function checkHV($mahocvien){
			require 'connect.php';
			$query = "SELECT *  FROM hocvien WHERE mahocvien = '{$mahocvien}'";
                $result = $connect->query($query);
                $rs = array();
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        array_push($rs,new HocVien(
                            $rows["mahocvien"],
                            $rows["ho"],
                            $rows["ten"],
                            $rows["quequan"],
                            $rows["ngaysinh"],
                            $rows["noisinh"],
                            $rows["ngaycap"],
                            $rows["socap"],
                            $rows["diemthuchanh"],
                            $rows["diemlythuyet"]
                        ));
                    }
                }
                $connect->close();
                if (count($rs)>=0) {
                	return true;
                }else {
                	return false;
                }
		}
		public static function themHocVien($mahocvien,$ho,$ten,$quequan,$ngaysinh,$noisinh,$ngaycap,$socap,$machungchi,$diemthuchanh,$diemlythuyet){
			require 'connect.php';
			$query1 = "INSERT INTO hocvien(mahocvien,ho,ten,quequan,ngaysinh,noisinh) VALUES ('{$mahocvien}','{$ho}','{$ten}','{$quequan}','{$ngaysinh}','{$noisinh}')";
			$query2 = "INSERT INTO capcho(machungchi,mahocvien,ngaycap,socap,diemthuchanh,diemlythuyet) VALUES ('{$machungchi}','{$mahocvien}','{$ngaycap}','{$socap}','{$diemthuchanh}','{$diemlythuyet}')";
			$result1 = mysqli_query($connect,$query1);
			$result2 = mysqli_query($connect,$query2);
			return true;
		}
	}
?>