<?php

namespace App\AutoImport;

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
// use PhpOffice\PhpSpreadsheet\Writer\Xls\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ReadSheetExcel
{
    public function handleSheet(Request $request)
    {
        $fileexcel = $request->fileExcel;
        $pathtmp = "app/" . $fileexcel->store('excelsource');
        $path = storage_path($pathtmp);
        $spreadsheet = IOFactory::load($path);
        // echo "Running in ReadSheetExcel class HandleSheet function<br>";
        $workSheet = $spreadsheet->getActiveSheet();
        $highestRow = $workSheet->getHighestRow();
        $highestColumn = $workSheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
        // //////////////////////////////////////////////////////////
        // echo '<table>' . "\n";
        // for ($row = 1; $row <= $highestRow; ++$row) {
        //     echo '<tr>' . PHP_EOL;
        //     for ($col = 1; $col <= $highestColumnIndex; ++$col) {
        //         $value = $workSheet->getCellByColumnAndRow($col, $row)->getValue();
        //         echo '<td>' . $value . '</td>' . PHP_EOL;
        //     }
        //     echo '</tr>' . PHP_EOL;
        // }
        // echo '</table>' . PHP_EOL;
        // //////////////////////////////////////////////
        $InseartOB = new AutoInseart();
        $nowidde = $InseartOB->inseartMotDet($workSheet->getCellByColumnAndRow(3, 4)->getValue());
        $nowpart = "";
        $nowidpart = "";
        $nowquestion = "";
        $nowidquestion = "";
        $noidungpa = "";
        for ($row = 7; $row <= $highestRow; ++$row) {
            if ($nowpart != $workSheet->getCellByColumnAndRow(1, $row)->getValue()) {
                $nowpart = $workSheet->getCellByColumnAndRow(1, $row)->getValue();
                $namefilemp3 = $workSheet->getCellByColumnAndRow(2, $row)->getValue();
                $namefilepng = $workSheet->getCellByColumnAndRow(3, $row)->getValue();
                //echo "Name of two file is :".$namefilemp3." and ".$namefilepng."<br>";
                $idfilemp3 = $InseartOB->moveFileByName($request, $namefilemp3);
                $idfilepng = $InseartOB->moveFileByName($request, $namefilepng);
                //echo "Id file mp3 is :".$idfilemp3." id file png is :".$idfilepng."<br><br>";
                $nowidpart = $InseartOB->inseartMotPhan($nowidde, $nowpart, $idfilepng, $idfilemp3);
            }
            if ($nowquestion != $workSheet->getCellByColumnAndRow(4, $row)->getValue()) {
                $nowquestion = $workSheet->getCellByColumnAndRow(4, $row)->getValue();
                $nowidquestion = $InseartOB->inseartMotCauHoi($nowidpart, $nowquestion);
            }
            $nametailieupa = $workSheet->getCellByColumnAndRow(7, $row)->getValue();
            $idfiletailieupa = $InseartOB->moveFileByName($request, $nametailieupa);
            $noidungpa = $workSheet->getCellByColumnAndRow(5, $row)->getValue();
            if ($noidungpa == "") {
                $noidungpa = "listenpart";
            }
            $dapan = $workSheet->getCellByColumnAndRow(6, $row)->getValue();
            $InseartOB->inseartMotPhuongAn($nowidquestion, $idfiletailieupa, $noidungpa, $dapan);
        }
    }
}
