<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){
        return view('Application.User_app');
    }


     public function store(Request $request)

    {

       $this->validate($request,[

            'name' => 'required',

            'email' => 'required|unique:informations|email',
            'phone' => 'required|unique:informations',
            'company' => 'required',
            'web' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'category' => 'required',
            'tag' => 'required',
            



        ]);

    

        $employee = new information();
        $employee->name  = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone  = $request->input('phone');
        $employee->company  = $request->input('company');
        $employee->web = $request->input('web');
        $employee->address  = $request->input('address');
        $employee->city  = $request->input('city');
        $employee->country = $request->input('country');
        $employee->category  = $request->input('category');
        $employee->tag  = $request->input('tag');
        $employee->save();
        return back()->with('success', 'Your Application Submitted Successfully.');


    }  

     function UserTable()
    {    
                $data = information::paginate(6);
                 return view('Application.list',compact('data'));
     
    }
    function UserDelete($id)
    {
       $data =information::find($id);
       $data->delete();
       return redirect('/admin/UserTable');
    }
    function UserShowdata($id)
    {
        $data = information::find($id);
        return view('Application.edit',['result' => $data]);
    }
    public function update(Request $request)
    {
        $request->validate([
             'name' => 'required',

            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'web' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'category' => 'required',
            'tag' => 'required',
            
        ]);
        $customers = information::find($request->id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone  = $request->input('phone');
        $customers->company  = $request->input('company');
        $customers->web = $request->input('web');
        $customers->address  = $request->input('address');
        $customers->city  = $request->input('city');
        $customers->country = $request->input('country');
        $customers->category  = $request->input('category');
        $customers->tag  = $request->input('tag');
        $customers->save();
       
    
        return redirect('/admin/UserTable')
            ->with('success', 'staff details updated successfully');
    }
    public function search(Request $request){

       if ($request->isMethod('post')) {
         $name = $request->get('name');
         $data = information::where('name','LIKE','%'.'$name'.'%')->paginate(6);
        }
        return view('Application.list',['data' => $data]);
    }
   
}
