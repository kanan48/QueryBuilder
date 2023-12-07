<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //For all data
    public function show()
    {
        $users=DB::table('users')
                    //->select('city')//To get selected data
                    //->distinct()//To remove duplicate data
                    ->get();
                    //->pluck('name','email');//To get specific data
        // $users=DB::table('users')->find(24);
        //return $users;
        return view ('allusers',['data'=>$users]);
    }

    //For particular column data
    public function show1()
    {
        $users1=DB::table('users')->select('name','city')->get();
        return $users1;
    }

    //for particular data
    public function show2()
    {
        $users2=DB::table('users')->where('name','=','John Doe')->get();
        //return $users2;
        //dd($users2);
        dump($users2);//using this bcz dd will stop next code 
    }

    //for user detail with id 
    public function singleUser(string $id)
    {
        $user = DB::table('users')->where('id',$id)->get();
        return view('user',['data'=> $user]);
    }

    //for inserting data
    public function insert()//Can add multiple data by multi-dimensional array
    {
        $data = DB::table('users')->insert([  //inserOrIgnore->to check unique value
            'name' => 'garry',
            'email' => 'garry@gmail.com',
            'age' => '20',
            'city' => 'agra',
        ]);
        //dd($data);
        if($data){
            echo "<h1>Data Successfully added.</h1>";
        }
        else{
            echo"<h1>Data not added</h1>";
        }
    }
}
