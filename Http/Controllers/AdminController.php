<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{

    /*---------------------------- ADMIN AUTHENTICATION  --------------------------------*/

    public function display(){

        return view('Admin/adminHome');

    }

    public function index(){

        $admin = DB::select('select * from admin');
        return view('Admin/adminView', ['admin'=>$admin]);

    }

    public function save(Request $request){

        $staffID = $request->input('staffID');
        $name = $request->input('name');
        $IC = $request->input('icNum');
        $phoneNum = $request->input('phoneNum');
        $gender = $request->input('gender');
        $race = $request->input('race');
        $maritalStatus = $request->input('maritalStatus');
        $address = $request->input('address');
        $password = $request->input('password');

        if(is_null($staffID) || is_null($name) || is_null($IC) || is_null($phoneNum) || is_null($gender) || is_null($race) || is_null($maritalStatus) || is_null($address) || is_null($password)){

            return redirect('adminForm')->withErrors(['All of the fields are required!', 'The Message']);

        }
        
        if(strlen($staffID) > 5){

            return redirect('adminForm')->withErrors(['The Staff ID you entered is too long! Re-enter.', 'The Message']);

        }
        if(strlen($staffID) < 5){

            return redirect('adminForm')->withErrors(['The Staff ID you entered is too short! Re-enter.', 'The Message']);

        }
        if(strlen($name) > 50){

            return redirect('adminForm')->withErrors(['The name you entered is too long! Re-enter.', 'The Message']);

        }
        if(strlen($IC) > 15){

            return redirect('adminForm')->withErrors(['The IC number you entered is too long! Re-enter.', 'The Message']);

        }
        if(strlen($phoneNum) > 20){

            return redirect('adminForm')->withErrors(['The phone number you entered is too long! Re-enter.', 'The Message']);

        }
        if(strlen($race) > 10){

            return redirect('adminForm')->withErrors(['The race you entered is too long! Re-enter.', 'The Message']);

        }
        if(strlen($address) > 100){

            return redirect('adminForm')->withErrors(['The address you entered is too long! Re-enter.', 'The Message']);

        }
        if(strlen($password) > 20){

            return redirect('adminForm')->withErrors(['The password you entered is too long! Re-enter.', 'The Message']);

        }
        if(strlen($password) < 5){

            return redirect('adminForm')->withErrors(['The password you entered is too short! Re-enter.', 'The Message']);

        }

        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $staffID)){

            return redirect('queue')->withErrors(['The Staff ID you entered contains special characters. Re-enter.', 'The Message']);

        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)){

            return redirect('queue')->withErrors(['The name you entered contains special characters. Re-enter.', 'The Message']);

        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $IC)){

            return redirect('queue')->withErrors(['The IC. number you entered contains special characters. Re-enter.', 'The Message']);

        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $phoneNum)){

            return redirect('queue')->withErrors(['The phone number you entered contains special characters. Re-enter.', 'The Message']);

        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $race)){

            return redirect('queue')->withErrors(['The race you entered contains special characters. Re-enter.', 'The Message']);

        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)){

            return redirect('queue')->withErrors(['The password you entered contains special characters. Re-enter.', 'The Message']);

        }

        if(!is_numeric($staffID) || (substr($staffID ,0,1) == 0)){

            return redirect('adminForm')->withErrors(['The Staff ID you entered is invalid. Re-enter', 'The Message']);

        }
        if(!is_numeric($IC)){

            return redirect('adminForm')->withErrors(['The IC. number you entered is invalid. Re-enter', 'The Message']);

        }
        if(!is_numeric($phoneNum)){

            return redirect('adminForm')->withErrors(['The phone number you entered is invalid. Re-enter', 'The Message']);

        }
        if(!is_numeric($password)){

            return redirect('adminForm')->withErrors(['The password you entered is invalid. Re-enter', 'The Message']);

        }
        else{
            DB::insert('insert into admin (staffID, name, icNum, phoneNum, gender, race, maritalStatus, address, password) values (?,?,?,?,?,?,?,?,?)'
            , [$staffID, $name, $IC, $phoneNum, $gender, $race, $maritalStatus, $address, $password]);

            return redirect('admin')->with('success', 'Registered Succesfully');
        }
    }

    public function adminAuth(Request $request){

        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection, 'patientdb');

        if(isset($request['search'])){

            $staffID = $request->input('staffID');
            $password = $request->input('password');

            if(is_null($staffID) || is_null($password)){

                return redirect('admin')->withErrors(['Both of the fields are required!', 'The Message']);

            }
            if(strlen($staffID) > 5){

                return redirect('admin')->withErrors(['The Staff ID you entered is too long! Re-enter.', 'The Message']);

            }
            if(strlen($staffID) < 5){

                return redirect('admin')->withErrors(['The Staff ID you entered is too short! Re-enter.', 'The Message']);

            }
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $staffID)){

                return redirect('admin')->withErrors(['The Staff ID you entered contains special characters. Re-enter.', 'The Message']);

            }
            if(!is_numeric($staffID)){

                return redirect('admin')->withErrors(['The Staff ID field only accept numerical value. Re-enter', 'The Message']);

            }
            
            $query = "SELECT * FROM admin where staffID = '$staffID'";
            $query_run = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($query_run)){
                
                $adminFound = $row;                
                return redirect('selectPage')->with('success', 'You have signed-in!');

            }

            if(empty($row)){
                
                return redirect('admin')->withErrors(['The StaffID is invalid!', 'The Message']);

            }

            if(!empty($row)){

                $thisAdmin = DB::select("SELECT * FROM admin WHERE staffID=?", [$staffID]);

                foreach ($thisAdmin as $row) {
                    $thisName = $row->name;
                    $thisIcNum = $row->icNum;
                    $thisPhoneNum = $row->phoneNum;
                    $thisGender = $row->gender;
                    $thisRace = $row->race;
                    $thisMaritalStatus = $row->maritalStatus;
                    $thisAddress = $row->address;
                    $thisPassword = $row->password;
                }

                if($password != $thisPassword){
                    return redirect('admin')->withErrors(['The StaffID and Password you entered does not match!', 'The Message']);
                }
            }
        }
    }

    /*--------------------------- ADMIN INFORMATION ALTER -------------------------------*/

    public function viewForm(){

        return view('Admin/adminView');
    }

    public function edit($staffID){

        $admin = DB::select('select * from admin where staffID = ?', [$staffID]);
        return view('Admin/adminEdit',['admin'=>$admin]);
    }

    public function update(Request $request, $staffID){

        $name = $request->input('name');
        $icNum = $request->input('icNum');
        $phoneNum = $request->input('phoneNum');
        $gender = $request->input('gender');
        $race = $request->input('race');
        $maritalStatus = $request->input('maritalStatus');
        $address = $request->input('address');
        $password = $request->input('password');

        DB::update('update admin set name = ?, icNum = ?, phoneNum = ?, gender = ?, race = ?, maritalStatus = ?, address = ? where staffID = ?', 
        [$name, $icNum, $phoneNum, $gender, $race, $maritalStatus, $address,  $staffID]);

        return redirect('adminView')->with('success','Details successfully updated');
        
    }

    public function delete($staffID){

        DB::select('delete from admin where staffID = ?', [$staffID]);
        return redirect('adminView')->with('success','Details successfully deleted');
    }

    public function logout(){
        return redirect('admin')->with('success','You have successfully logged out');
    }
}
