<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PatientController extends Controller
{
    /*---------------------------- PATIENT AUTHENTICATION  --------------------------------*/

    public function display(){
        return view('patientHome');
    }

    public function auth(Request $request){

        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection, 'patientdb');

        if(isset($request['search'])){

            $IC = $request->input('patient_icNum');

            // Scan and check for input validation
            if(strlen($IC) > 15 ){

                return redirect('patient')->withErrors(['IC. number you entered is too long! Re-enter.', 'The Message']);

            }
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $IC)){

                return redirect('patient')->withErrors(['The number you entered contains special characters. Re-enter with numbers only.', 'The Message']);

            }
            if(!is_numeric($IC)){

                return redirect('patient')->withErrors(['IC. number you entered is invalid. Re-enter with numbers only.', 'The Message']);

            }

            //Check for registered IC. Number in database
            else{
                $query = "SELECT patient_icNum FROM patient where patient_icNum = '$IC'";
                $query_run = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($query_run)){
                
                    $patientFound = $row;
                    return redirect('queue')->with('success', 'You have signed-in!');

                }

                if(empty($row)){
                
                    return redirect('patient')->withErrors(['IC. number you entered is invalid! Re-enter or Register.', 'The Message']);

                }
            }
        }
    }

    public function save(Request $request){

        $name = $request->input('patient_name');
        $IC = $request->input('patient_icNum');
        $phoneNum = $request->input('patient_phoneNum');
        $gender = $request->input('patient_gender');
        $race = $request->input('patient_race');
        $maritalStatus = $request->input('patient_maritalStatus');
        $address = $request->input('patient_address');

        if(strlen($name) > 40 ){

            return redirect('patientForm')->withErrors(['IC. number you entered is too long! Re-enter.', 'The Message']);

        }
        else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)){

            return redirect('patientForm')->withErrors(['The name you entered consists of special characters. Re-enter.', 'The Message']);

        }
        else if(is_numeric($name)){

            return redirect('patientForm')->withErrors(['The name must only consist of alphabets and spaces. Re-enter', 'The Message']);

        }
        else if(strlen($IC) > 15 ){

            return redirect('patientForm')->withErrors(['IC. number you entered is too long! Re-enter.', 'The Message']);

        }
        else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $IC)){

            return redirect('patientForm')->withErrors(['The number you entered contains special characters. Re-enter with numbers only.', 'The Message']);

        }
        else if(!is_numeric($IC)){

            return redirect('patientForm')->withErrors(['IC. number you entered is invalid. Re-enter with numbers only.', 'The Message']);

        }
        else if(strlen($phoneNum) > 15 ){

            return redirect('patientForm')->withErrors(['The phone number you entered is too long! Re-enter.', 'The Message']);

        }
        else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $phoneNum)){

            return redirect('patientForm')->withErrors(['The phone number you entered contains special characters. Re-enter with numbers only.', 'The Message']);

        }
        else if(!is_numeric($phoneNum)){

            return redirect('patientForm')->withErrors(['The phone number you entered is invalid. Re-enter with numbers only.', 'The Message']);

        }
        else if(strlen($race) > 10 ){

            return redirect('patientForm')->withErrors(['The race you entered is too long! Re-enter.', 'The Message']);

        }
        else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $race)){

            return redirect('patientForm')->withErrors(['The race you entered contains special characters. Re-enter with numbers only.', 'The Message']);

        }
        else if(is_numeric($race)){

            return redirect('patientForm')->withErrors(['The race you entered is invalid. Re-enter.', 'The Message']);

        }
        else if(strlen($address) > 80 ){

            return redirect('patientForm')->withErrors(['The address you entered is too long! Re-enter.', 'The Message']);

        }
        else{
            
            DB::insert('insert into patient (patient_name, patient_icNum, patient_phoneNum, patient_gender, patient_race, patient_maritalStatus, patient_address) values (?,?,?,?,?,?,?)'
            , [$name, $IC, $phoneNum, $gender, $race, $maritalStatus, $address]);

            return redirect('patient')->with('success', 'Registered Succesfully');
        }
    }


    /*--------------------------- PATIENT INFORMATION ALTER -------------------------------*/

    public function viewForm(){

        return view('patientView');
    }

    public function index(){

        $patient = DB::select('select * from patient');
        return view('patientView', ['patient'=>$patient]);
    }

    public function edit($patient_icNum){

        $patient = DB::select('select * from patient where patient_icNum = ?', [$patient_icNum]);
        return view('patientedit',['patient'=>$patient]);
    }

    public function update(Request $request, $patient_icNum){


        $patient_name = $request->input('patient_name');
        $patient_icNum = $request->input('patient_icNum');
        $patient_phoneNum = $request->input('patient_phoneNum');
        $patient_gender = $request->input('patient_gender');
        $patient_race = $request->input('patient_race');
        $patient_maritalStatus = $request->input('patient_maritalStatus');
        $patient_address = $request->input('patient_address');

        DB::update('update patient set patient_name = ?, patient_icNum = ?, patient_phoneNum = ?, patient_gender = ?, patient_race = ?, patient_maritalStatus = ?, patient_address = ? where patient_icNum = ?', 
        [$patient_name, $patient_icNum, $patient_phoneNum, $patient_gender, $patient_race, $patient_maritalStatus, $patient_address, $patient_icNum]);

        return redirect('patientView')->with('success', 'Details Updated Succesfully');
        
    }

    public function delete($patient_icNum){

        DB::select('delete from patient where patient_icNum = ?', [$patient_icNum]);
        return redirect('patientView')->with('success','Details successfully deleted');
    }

}
