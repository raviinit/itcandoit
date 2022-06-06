<?php

namespace App\Http\Controllers;

use App\Models\CsvCoupons;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     *
     * @param Request $request
     * @return type
     */
    public function index(Request $request)
    {
        $csvData = CsvCoupons::all();
        return view('/welcome', compact('csvData'));
    }

    /**
     *
     * @param Request $request
     * @return type
     */
     public function coupons(Request $request)
     {
         $csvData = CsvCoupons::all();
         return view('/coupons', compact('csvData'));
     }

    /**
     *
     * @param CsvCoupons $csvcoupons
     * @return type
     */
    public function fileUpload(CsvCoupons $csvcoupons)
    {
        $data = request()->all();
        $flag = 0;
        if (!request()->hasFile('file')) {
            return response()->json(['status' =>0, 'data' =>[], 'msg'=>'Upload file not found.']);
        }
        $file = request()->file('file');
        if (!$file->isValid()) {
            return response()->json(['status' =>0, 'data' =>[], 'msg'=>'Invalid file upload.']);
        }
        if ($file) {
            $path = public_path() . '\\uploads';
            $name = $file->getClientOriginalName();
            //store your file into directory and db
            $file->move($path, $file->getClientOriginalName());
            $fileD = fopen($path.'/'.$name, 'r');
            $column = fgetcsv($fileD);
            $k = 0;
            while (!feof($fileD)) {
                $rowData[] = fgetcsv($fileD);
            }
            foreach ($rowData as $key => $value) {
                //iterate the rows of the file
                if (!isset($key[$k]) && !isset($value[$k])) {
                    break;
                }
                $insert_data = array(
                    'appname'           => $value[0]??'',
                    'clientname'        => $value[1]??'',
                    'titleen'           => $value[2]??'',
                    'titlear'           => $value[3]??'',
                    'code'              => $value[4]??'',
                    'status'            => $value[5]??'',
                    'coupontype'        => $value[6]??'',
                    'disc_percentage'   => $value[7]??'',
                    'category'          => $value[8]??'',
                    'tag'               => $value[9]??''
                );
                $csvCoupons = CsvCoupons::create($insert_data);
            }
            sleep(1);
            $flag = 1;
            unlink($path.'/'.$name);
        }

        if ($flag)  {
                return redirect('/coupons');
        }  else {
                return response()->json(['status' =>0, 'data' =>[], 'msg'=>'File not uploaded.']);
        }
    }



}
