<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{   
    
    public function adduser(Request $request){
        $this->middleware('AuthTeacher');

                /*
        010001 -> 10001
        010002 -> 10002
                */
        $start = $request->start;
        $end = $request->end;
        $len = strlen($start); //6
        $loop  = intval($end) - intval($start);
        $text = '';
        if(strlen(intval($start))!=$len){
            $index = $len - strlen(intval($start));
            for($i = 0;$i<$index;$i++){
                $text .='0';
            }
        }
        for($i = intval($start); $i <= intval($end) ; $i++){

            
                    $id = DB::table('users')->insertGetId([
                        'name' => $text.$i,
                        'email' =>'su'.$text.$i.'@inlearnshio.com',
                        'password' => bcrypt($text.$i),
                        'role' => 1,
                    ]);
                    if($id){
                        $profile_id = DB::table('profiles')->insertGetId([
                            'user_id' => $id,
                            'profile_type' => 'S'
                        ]);
                        if($profile_id){
                            $stu_id = DB::table('student_infos')->insertGetId([
                                'profile_id' => $profile_id,
                                'faculty_id' => $request->faculty_id,
                                 'major_id' => $request->major_id,
                                'intern_id' => 1,
                                'teacher_id' => 1,
                                'sendinvite' => 5,
                                'number'=> $text.$i,
                                
                                
                            ]);
                            if($stu_id){

                            } else  {
                                DB::table('profiles')->where('id',$profile_id)->delete();
                                DB::table('user')->where('id',$id)->delete();
                            }
                        } else {
                            DB::table('user')->where('id',$id)->delete();
                        }
                        
                    }
        }
        
        

        echo $id ;
        // if($id){
        //     return 'true';
        // }
        // return 'false';
    }
}
