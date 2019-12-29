<?php 
	/**
	 * 
	 */
	class ChungChi
	{
		var $machungchi;
		var $tenchungchi;
		
		function __construct($machungchi,$tenchungchi)
		{
			$this->machungchi = $machungchi;
			$this->tenchungchi = $tenchungchi;
		}
		public static function getAllChungChi(){
			require 'connect.php';
			$query = "SELECT *  FROM chungchi";
                $result = $connect->query($query);
                $rs = array();
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        array_push($rs,new ChungChi(
                            $rows["machungchi"],
                            $rows["tenchungchi"]
                        ));
                    }
                }
                $connect->close();
                return $rs;	
		}
		public static function checkChungChi($machungchi){
			require 'connect.php';
			$query = "SELECT * FROM chungchi WHERE machungchi = '{$machungchi}'";
                $result = $connect->query($query);
                $rs = array();
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        array_push($rs,new ChungChi(
                            $rows["machungchi"],
                            $rows["tenchungchi"]
                        ));
                    }
                }
                $connect->close();
                if (count($rs)>=0) {
                	return '1';
                }else {
                    require '2';
                } 
		}
        public static function xoaCC($machungchi){
            require 'connect.php';
            $query1 = "DELETE FROM chungchi where machungchi = '{$machungchi}'";
            $result1 = mysqli_query($connect,$query1);
            return true;
        }
	}
?>