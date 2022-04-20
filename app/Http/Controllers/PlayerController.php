<?php

namespace App\Http\Controllers;

use App\Models\NamazTiming;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PlayerController extends Controller
{
    public function uploadContent(Request $request)
    {
        $file = $request->file('uploaded_file');


        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
            //Check for file extension and size
            //Where uploaded file will be stored on the server 
            $location = 'uploads'; //Created an "uploads" folder for that
            // Upload file
            $file->move($location, $filename);
            // In case the uploaded file path is to be stored in the database 
            $filepath = public_path($location . "/" . $filename);
            // Reading file
            $file = fopen($filepath, "r");
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            //Read the contents of the uploaded file 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata);
                // Skip first row (Remove below comment if you want to skip the first row)
                if ($i == 0) {
                    $i++;
                    continue;
                }
                for ($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            fclose($file); //Close after reading
            $j = 0;
            foreach ($importData_arr as $importData) {
                $name = $importData[0]; //Get user names
                $email = $importData[0]; //Get the user emails
                $j++;
                try {
                    DB::beginTransaction();



                    NamazTiming::create([
                        'তারিখ' => $importData[3],
                        'ফজর শুরু' => $importData[3],
                        'ফজর শেষ' => $importData[3],
                        'জোহর শুরু' => $importData[4],
                        'মাগরিব শেষ' => $importData[5],
                        'এশা শেষ' => $importData[6]
                    ]);
                    DB::commit();
                } catch (\Exception $e) {
                }
            }
            return response()->json([
                'message' => " records successfully uploaded"
            ]);
        } else {
            //no file was uploaded
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
    }
}
