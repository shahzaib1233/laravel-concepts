<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //

    // public function getStudents()
    // {
    //         // $students = DB::table('student_model')
    //         //     ->join('education', 'education.student_id', '=', 'student_model.id')
    //         //     ->select(
    //         //         'student_model.*',
    //         //                 'education.degree_name'
    //         //     )
    //         //     ->where('student_model.name' , 'like' , 'a%')
    //         //     ->paginate(10);

    //         $students = DB::table('student_model')
    //         ->join('education', 'education.student_id', '=', 'student_model.id')
    //         ->select(

    //    DB::raw('COUNT(student_model.id) as total_students'),
    //             DB::raw('GROUP_CONCAT(education.degree_name) as degrees')
    //         )
    //         // ->where('student_model.name', 'like', 'a%')
    //         ->groupBy('student_model.age');
    //         // ->paginate(10);
    //             // dd($students);

    //     return view('students.student',compact('students'));
    // }

    public function getStudents()
    {
        $students = DB::table('student_model')
            ->join('education', 'education.student_id', '=', 'student_model.id')
            ->select(

                DB::raw('COUNT(student_model.id) as total_students'),
                DB::raw('education.degree_name as degrees')
            )
            ->groupBy('education.degree_name')
            ->orderBy('total_students', 'desc')
            ->get();

        return view('students.student', compact('students'));
    }

    public function UnionLearning()
    {
        $education = DB::table('education');
        $student = DB::table('student_model')
            ->union($education)
            ->get();

        return $student;
    }

    // public function chunks()
    // {
    //     $users = DB::table('users')->orderBy('id' , 'desc')
    //                ->chunk(100000, function($users){
    //                 // foreach($users as $user)
    //                 // {
    //                 //     echo $user->name . '<br>';
    //                 // }
    //                });
    //                return 'done';
    // }

    public function chunks()
    {
     

         $user = DB::select("select * from users where name like :name and age > :age" ,
                            ['name'=>'s%','age'=>19] );
        // $user = DB::table('users')
        //         ->selectRaw('count(*) as No_of_students, age')
        //         ->whereRaw('age > ? ' , [19])
        //         ->groupBy('age')
        //         ->get();
        // return $user;
        return view('users.users', compact('user'));

    }
}
