<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueueController extends Controller
{
    /* 
    - Insert queue to database
    - Retrieve queue from database
    - Sort queue
    - Display top first queue
    */

    /*---------------------------- PATIENT QUEUE FUNCTIONS --------------------------------*/

    public function queue(){

        return view('queue/registerQueue');

    }

    public function index(){

        $queue = DB::select('select * from queue');
        return view('Queue/queueView', ['queue'=>$queue]);

    }

    public function getQueue(Request $request){

        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection, 'patientdb');

        if(isset($request['search'])){

            $queueNum = $request->input('queueNum');

            if(is_null($queueNum)){
                return redirect('queue')->withErrors(['The queue field is empty! Re-enter.', 'The Message']);
            }

            if(strlen($queueNum) > 4){

                return redirect('queue')->withErrors(['The queue number you entered is too long! Re-enter.', 'The Message']);

            }
            if(strlen($queueNum) < 4){

                return redirect('queue')->withErrors(['The queue number you entered is too short! Re-enter.', 'The Message']);

            }
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $queueNum)){

                return redirect('queue')->withErrors(['The queue number you entered contains special characters. Re-enter.', 'The Message']);

            }
            if(!is_numeric($queueNum) || substr($queueNum ,0,1) > 3){

                return redirect('queue')->withErrors(['The queue number you entered is invalid. Re-enter', 'The Message']);

            }

            $currentNum = 0; 
            $currentId = 0;
            $current = DB::select("SELECT * FROM queue LIMIT 1");
            foreach ($current as $row) {
                $currentId = $row->id;
                $currentNum = $row->queueNum;
            }

            if(substr($queueNum ,1,3)< substr($currentNum ,1,3)){
                return redirect('queue')->withErrors(['The queue number you entered is lower than it supposed to be. Re-enter', 'The Message']);
            }

            $query = "SELECT queueNum FROM queue where queueNum = '$queueNum'";
            $query_run = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($query_run)){
                
                $queueFound = $row;
                return view('Queue/patientDisplay', ['queueNum'=>$queueNum]);

            }

            if(empty($row)){
                
                DB::insert('insert into queue (id,queueNum) values (DEFAULT,?)', [$queueNum]);
                return view('Queue/patientDisplay', ['queueNum'=>$queueNum]);

            }

            else{
                return view('Queue/patientDisplay', ['queueNum'=>$queueNum]);
            }

        }
    }

    public function displayQueue(){

        return view('Queue/patientDisplay');
    }

    public function delete($queueNum){

        if(substr($queueNum ,1,3))
        DB::select('delete from queue where queueNum = ?', [$queueNum]);
        return redirect('managaQueue')->with('success','Details successfully deleted');
    }

    public function deleteAll(){
        DB::select('delete from queue');
        return redirect('managaQueue')->with('success','The table has been succesfully deleted');
    }
}
