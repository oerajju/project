<?php

namespace App;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use App\BaseModel;
class Report extends BaseModel
{
   public function csv($reportname, $staff_info,$type){
   	return \Excel::create($reportname, function ($excel) use ($staff_info) {
                $excel->sheet('sheet1', function ($sheet) use ($staff_info) {
                $sheet->fromArray($staff_info);
                //$sheet->setHeight(15);
                $sheet->getStyle('A1:J1')->applyFromArray(array(
                    'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  true,
                    'align'     =>'center',
                    )
                ));
                $sheet->setBorder('A1:F10', 'thin');
                $sheet->setHeight(1, 30);
                // $cells->setAlignment('center');
                // $cells->setValignment('center');
                $sheet->row(1, function($row) {
                $row->setBackground('#8DB2E3');
                });
                $sheet->prependRow(1 , function($row){
                    $row->setValue('hello Everyone!!!');
                });
                //$sheet->setFreeze(1);
            });
            })->download($type);
   }
}

