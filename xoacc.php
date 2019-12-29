<?php 
	if (isset($_REQUEST['id'])) {
		if (trim($_REQUEST['id'])=='') {
			header('Location:quanlychungchi.php');
		}else{
			include_once 'model/chungchi.php';
			$mcc = $_REQUEST['id'];
			ChungChi::xoaCC($mcc);
			header('Location:quanlychungchi.php');
		}
		
	}else{
	header('Location:quanlychungchi.php');
	}
?>