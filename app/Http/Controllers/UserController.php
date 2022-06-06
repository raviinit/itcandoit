<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\CsvUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     *
     * @param Request $request
     * @return type
     */
    public function index(Request $request)
    {
        $data = User::all();
        $csvData = CsvUsers::all();
        return view('/users', compact('data', 'csvData'));
    }

    /**
     *
     * @param User $user
     * @return type
     */
    public function fileUpload(User $user)
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
                $pk = $user->getKeyName();
                $email = $value[3];
                $findUser = User::whereEmail($email)->first();
                if (!$findUser) {
                    $insert_data = array(
                        'firstname'                      => $value[0]??'',
                        'lastname'                     => $value[1]??'',
                        'address'                        => $value[2]??'',
                        'email'                            => $value[3]??'',
                        'created_at'                  => now(),
                        'updated_at'                => now()
                    );
                    $newuserid = $user::create($insert_data);
                    // gets the insertGetId() from the table/model
                    $newuserid = $newuserid->id;
                    $insert_data = array(
                        'userid'                           => $newuserid,
                        'firstname'                      => $value[0]??'',
                        'lastname'                     => $value[1]??'',
                        'address'                        => $value[2]??'',
                        'created_at'                  => now(),
                        'updated_at'                => now()
                    );
                    $csvuser = CsvUsers::create($insert_data);
                }
                else
                {
                    $insert_data = array(
                        'userid'                           => $findUser['id'],
                        'firstname'                      => $value[0]??'',
                        'lastname'                     => $value[1]??'',
                        'address'                        => $value[2]??'',
                        'created_at'                  => now(),
                        'updated_at'                => now()
                    );
                    $csvuser = CsvUsers::create($insert_data);
                }
            }
            sleep(1);
            $flag = 1;
            unlink($path.'/'.$name);
        }

        if ($flag)  {
                return redirect('/users');
        }  else {
                return response()->json(['status' =>0, 'data' =>[], 'msg'=>'File not uploaded.']);
        }
    }



}
