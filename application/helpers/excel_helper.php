<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;

	if(!function_exists('openexcelfile')) {
  		function openexcelfile($filepath) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($filepath);

            $d=$spreadsheet->getSheet(0)->toArray();

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            $i=1;

            unset($sheetData[0]);
            $data=array();
            foreach ($sheetData as $t) {
             // process element here;
            // access column by index
                $data[]=$t;
            }
            return $data;
		}  
	}

?>
