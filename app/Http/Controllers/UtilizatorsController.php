<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utilizator;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use Illuminate\Support\Facades\Hash;

class UtilizatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validateInput($request);
        $password = Hash::make($request['password']);
         User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => $password,
            'date_of_birth'=> $request['date_of_birth'],
            'gender'=>$request['gender'],
            'type' =>$request['type']
        ]);
        return redirect()->intended('/utilizators');

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::find($id);
        return view('users/edit', ['user' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $users = User::findOrFail($id);
        $constraints = [
            'firstname'=> 'required|max:60',
            'lastname' => 'required|max:60',
            'email'=>'required|max:60'
            ];
        $input = [
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email'=>$request['email'],
        ];
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        User::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/utilizators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();
        return redirect()->intended('/utilizators');
    }
    private function validateInput($request) {
        $this->validate($request, [
        'firstname' => 'required|max:60',
        'lastname' => 'required|max:60',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'date_of_birth'=> 'required',
        'gender'=>'required',
        'type'=>'required'
    ]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin');
    }
    function index1()
    {
        $data = DB::table('users')
        ->select(DB::raw('gender as gender'),DB::raw('count(*) as number'))
        ->groupBy('gender')
        ->get();
        $array[] = ['Gender' , 'Number'];
        foreach($data as $key => $value)
        {
            $array[++$key]= [$value->gender, $value->number];
        }
        return view('pages.index')->with('gender', json_encode($array));        
    }

}
