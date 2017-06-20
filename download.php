<?php
if(!empty($_GET['file'])){
	$fileName = baseName($_GET['file']);
	$filePath = "file/".$fileName;
	
	
	if(!empty($fileName)&& file_exists($filePath)){
		header("Cache-Control:public");
		header("Content-Description: File Transfer");
		header("Content-disposition: attachment; filename= $fileName");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");
		
		readfile($filePath);
		exit;
	}
}




?>