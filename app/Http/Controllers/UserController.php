<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function showlist()
    {    
        if(auth()->user()->is_admin == 1) {
                 $data = User::paginate(4);
                 return view('User.list',['record'=>$data]);
            }else{
                 return redirect()->route('home');
            }
       

    }
    function delete($id)
    {
       $data =User::find($id);
       $data->delete();
       return redirect('/admin/list');
    }
    function showdata($id)
    {
        $data = User::find($id);
        return view('User.edit',['result' => $data]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            
        ]);
        $customers = User::find($request->id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->save();
    
        return redirect('/admin/list')
            ->with('success', 'staff details updated successfully');
    }
    public function status_update($id){
        $aaam = DB::table('users')->select('status')->where('id','=',$id)->first();
        if ($aaam->status == true) {
            $status ='0';
        }else{
             $status ='1';
        }
        $values = array('status'=> $status);
        DB::table('users')->where('id',$id)->update($values);
       
        return redirect('/admin/list');
    }



//--------Register---------
    public function show_reg(Request $req)
    {
        return view('User.register');
    }
    public function register(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        return back()->with('success', 'Data Successfully Inserted.');
        
    }
}