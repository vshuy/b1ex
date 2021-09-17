<?php

namespace App\AutoImport;

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
// use PhpOffice\PhpSpreadsheet\Writer\Xls\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ReadSheetExcelForLyThuyet
{
    public function handleSheet(Request $request, $lythuyet_id)
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
        //////////////////////////////////////////////////////////
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
        //////////////////////////////////////////////
        $InseartOB = new AutoInseartLyThuyet();
        $nowquestion = "";
        $nowidquestion = "";
        $noidungpa = "";
        for ($row = 2; $row <= $highestRow; ++$row) {
            if ($nowquestion != $workSheet->getCellByColumnAndRow(1, $row)->getValue()) {
                $nowquestion = $workSheet->getCellByColumnAndRow(1, $row)->getValue();
                $nowidquestion = $InseartOB->inseartMotCauHoi($lythuyet_id, $nowquestion);
            }
            $noidungpa = $workSheet->getCellByColumnAndRow(2, $row)->getValue();
            $dapan = $workSheet->getCellByColumnAndRow(3, $row)->getValue();
            $InseartOB->inseartMotPhuongAn($nowidquestion, $noidungpa, $dapan);
        }
    }
}
