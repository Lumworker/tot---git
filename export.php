 <?php
require_once('libs/Medoo.php');
include_once('connect/configmedoo.php');

require_once('Classes/PHPExcel.php');

$fileName = 'Data3G';
$excel = new PHPExcel();
$excel -> setActiveSheetIndex(0);

$numberexport = isset($_REQUEST['numberexport']) ? $_REQUEST['numberexport'] :"";
$q = isset($_REQUEST['q']) ? $_REQUEST['q'] :"";

if($numberexport){
    $datas = $database->select("data_tot", [
        "number",
        "name",
        "location",
        "promotion",
    ], [
        "number" => $numberexport,
        "OR" => [
            "number[~]"  => $q,
            "promotion[~]"  => $q
        ]
    ]);
}else{
    $datas = $database->select("data_tot", [
        "number",
        "name",
        "location",
        "promotion",
    ]);
}
// print_r($datas);

  $row = 4;
  foreach ($datas as $dat){
    $excel -> getActiveSheet()
    -> setCellValue('A'.$row, $dat["number"])
    -> setCellValue('B'.$row, $dat["name"])
    -> setCellValue('C'.$row, $dat["location"])
    -> setCellValue('D'.$row, $dat["promotion"]);
    // increment the row
    $row++;
  }
    // set column width //
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    // make table headers //
    $excel->getActiveSheet()
    ->setCellValue('A1', 'Data TOT 3G') // this is a title
    ->setCellValue('A3', 'เลขหมาย')
    ->setCellValue('B3', 'ลักษณะงานที่ใช้')
    ->setCellValue('C3', 'หน่วยงานหรือบริษัท')
    ->setCellValue('D3', 'อัตราค่าบริการ');
    // merging the title //
    $excel->getActiveSheet()->mergeCells('A1:D1');
    // aligning //
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
    // styling //
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray(
      array(
        'font' => array(
          'size' => 24,
        )
      )
    );
    $excel->getActiveSheet()->getStyle('A3:D3')->applyFromArray(
      array(
        'font' => array(
          'bold' => true
        ),
        'borders' => array(
          'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          )
        )
      )
    );
    // give borders to data //
    $excel->getActiveSheet()->getStyle('A4:D'.($row-1))->applyFromArray(
      array(
        'borders' => array(
          'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          ),
          'inside' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          )
        )
      )
    );
    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
    header('Cache-Control: max-age=0');



    // $file = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
    // $file->save('php://output');
    //save the file to the server (Excel5)

    $file = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

    // $path = 'excel-files';
    // echo "Path : $path";
    // require "$path";

    $path = $fileName.'.xls';
    $file->save($path);

    // $file->save('excel-files/'.$fileName.'.xls');
