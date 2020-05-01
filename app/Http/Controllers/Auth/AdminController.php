<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function adduser(Request $request)
    {
        $this->middleware('AuthTeacher');

        $status = 'error';
        $front = $request->front;
        $back = $request->back;
        $start = $request->start;
        $end = $request->end;
        $len = strlen($start);
        $loop  = intval($end) - intval($start);
        $text = '';
        if (strlen(intval($start)) != $len) {
            $index = $len - strlen(intval($start));
            for ($i = 0; $i < $index; $i++) {
                $text .= '0';
            }
        }
        for ($i = intval($start); $i <= intval($end); $i++) {


            $id = DB::table('users')->insertGetId([
                'name' => $text . $i,
                'email' => $front . $text . $i . '@' . $back,
                'password' => bcrypt($text . $i),
                'role' => 1,
            ]);
            if ($id) {
                $profile_id = DB::table('profiles')->insertGetId([
                    'user_id' => $id,
                    'profile_type' => 'S'
                ]);
                if ($profile_id) {
                    $stu_id = DB::table('student_infos')->insertGetId([
                        'profile_id' => $profile_id,
                        'faculty_id' => $request->faculty_id,
                        'major_id' => $request->major_id,
                        'intern_id' => 1,
                        'teacher_id' => $request->teacher_id,
                        'sendinvite' => 5,
                        'number' => $text . $i,
                        'grade'=> 2,
                        'name' => 'name',
                        'surname' => 'surname',
                        'phonenumber' => 'phonenumber',
                        'address' => 'none'

                    ]);
                    if ($stu_id) {
                        for($s = 1; $s <= 4 ; $s++){
                            $score_id = DB::table('scores')->insertGetId([
                                'stu_id' => $stu_id,
                                'user_id' => $id,
                                'score' => 0,
                                'type_id' => $request->jobtypes_id[$s],
                                 ]);
                        }
                      $status =  'success';      
                    } else{
                        DB::table('profiles')->where('id', $profile_id)->delete();
                        DB::table('user')->where('id', $id)->delete();
                    }
                } else {
                    DB::table('user')->where('id', $id)->delete();
                }
            }
        }

        return $status;
    }
    public function createuser(Request $request)
    {

            $status = 'error';
            if($request->role == 1) {
                $role = 2;
                $profile_type = 'T';
            }else if($request->role == 2){
                $role = 3;
                $profile_type = 'C';
            }
            $id = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $role,
            ]);
            if ($id) {
                $profile_id = DB::table('profiles')->insertGetId([
                    'user_id' => $id,
                    'profile_type' => $profile_type
                ]);
                if ($profile_id) {
                    if($request->role == 1){ 
                        $insert = DB::table('teacherinfos')->insertGetId([
                            'profile_id' => $profile_id,
                            'name' => $request->tname,
                            'surname' => $request->tsurname,
                            'phonenumber' => $request->tphonenumber,
                            'email' => $request->temail,
                            'uni_id' => $request->uni_id,
                            'faculty_id' => $request->faculty_id,
                            'major_id' => $request->major_id,
                        ]);
                    } else if($request->role == 2){
                        $insert = DB::table('companyinfos')->insertGetId([
                            'profile_id' => $profile_id,
                            'name' => $request->cname,
                            'phonenumber' => $request->cphonenumber,
                            'email' => $request->cemail,
                            'province_id' => $request->province_id,
                            'amphure_id' => $request->amphure_id,
                            'address' => $request->address,
                        ]);
                    }
                    if ($insert) {
                        $status =  'success';      
                    } else{
                        DB::table('profiles')->where('id', $profile_id)->delete();
                        DB::table('user')->where('id', $id)->delete();
                    }
                } else {
                    DB::table('user')->where('id', $id)->delete();
                }
            }


            $data['status'] = $status;
            $data['role'] = $request->role;
            return $data;

            /* -----------------------------------------------*/
            // if($request->role == 1) {
            //     $id = DB::table('users')->insertGetId([
            //         'name' => $request->name,
            //         'email' => $request->email,
            //         'password' => bcrypt($request->password),
            //         'role' => 2,
            //     ]);
            //     if ($id) {
            //         $profile_id = DB::table('profiles')->insertGetId([
            //             'user_id' => $id,
            //             'profile_type' => 'T'
            //         ]);
            //         if ($profile_id) {
            //             $teacher_id = DB::table('teacherinfos')->insertGetId([
 
            //                 'profile_id' => $profile_id,
            //                 'name' => $request->tname,
            //                 'surname' => $request->tsurname,
            //                 'phonenumber' => $request->tphonenumber,
            //                 'email' => $request->temail,
            //                 'uni_id' => $request->uni_id,
            //                 'faculty_id' => $request->faculty_id,
            //                 'major_id' => $request->major_id,
       
    
            //             ]);
            //             if ($teacher_id) {
            //                 $status =  'success';      
            //             } else{
            //                 DB::table('profiles')->where('id', $profile_id)->delete();
            //                 DB::table('user')->where('id', $id)->delete();
            //             }
            //         } else {
            //             DB::table('user')->where('id', $id)->delete();
            //         }
            //     }
            // }
            // else if($request->role == 2) {
            //     $id = DB::table('users')->insertGetId([
            //         'name' => $request->name,
            //         'email' => $request->email,
            //         'password' => bcrypt($request->password),
            //         'role' => 3,
            //     ]);
            //     if ($id) {
            //         $profile_id = DB::table('profiles')->insertGetId([
            //             'user_id' => $id,
            //             'profile_type' => 'C'
            //         ]);
            //         if ($profile_id) {
            //             $com_id = DB::table('companyinfos')->insertGetId([

            //                 'profile_id' => $profile_id,
            //                 'name' => $request->cname,
            //                 'phonenumber' => $request->cphonenumber,
            //                 'email' => $request->cemail,
            //                 'province_id' => $request->province_id,
            //                 'amphure_id' => $request->amphure_id,
            //                 'address' => $request->address,
    
            //             ]);
            //             if ($com_id) {
            //                 $status =  'success';      
            //             } else{
            //                 DB::table('profiles')->where('id', $profile_id)->delete();
            //                 DB::table('user')->where('id', $id)->delete();
            //             }
            //         } else {
            //             DB::table('user')->where('id', $id)->delete();
            //         }
            //     }
            // } 
        
    }
}
