<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {
   
        $category= Category::latest()->get();
        
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="#"  data-id="'.$row->id.'" data-name="'.$row->tittle.'" data-original-title="Edit" class="btn btn-info btn-fill pull-right editCategory" data-toggle="modal" data-target="#editModal">Edit</a>&nbsp;'; 
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row->id.'" data-name="'.$row->tittle.'" data-original-title="Delete" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-fill pull-right deleteCategory">Delete</a>';
                    return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('dashboards.admins.categories.index');
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [            
            'tittle' => 'required|unique:categories'
        ]);

        if ($validator->fails()) {
            return response()->json( ['status' => 'Failed','message' => $validator->errors()], );
        } else {            
            $name = $request->get('tittle');
            $category = new Category();
            $category->tittle = $name;
            $category->save();
            if( intval($category->id) > 0 ){
                return response([ 'status' => 'Success','message' => '<p class="alert alert-success">Category has been added successfully.</p>'], 200); 
                die();
            }else{
                return response([ 'status' => 'Failed','message' => '<p class="alert alert-danger">Category has not been added.</p>'], 204); 
            }  
        }     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' =>  'required',
            'tittle' => 'required|unique:categories'
        ]);
        if ($validator->fails()) {
            return response()->json( ['status' => 'Failed','message' => $validator->errors()], );
        } else {  
            $id = $request->get('id');            
            $category = Category::find($id);
            if( $category ){
                $name = $request->get('tittle');
                $category->tittle = $name;
                $category->save();
                if( intval($category->id) > 0 ){
                    return response([ 'status' => 'Success','message' => '<p class="alert alert-success">Writing Category has been updated successfully.</p>'], 200); 
                }else{
                    return response([ 'status' => 'Failed','message' => '<p class="alert alert-danger">Writing Category has not been updated.</p>'], 204); 
                }               
            }
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        $id =isset($request->id) && !empty($request->id) ? $request->id :'';
        $category = Category::find($id);
        $response = array();
        if($category){
            $category->delete();
             return response([ 'status' => 'Success','message' => '<p class="alert alert-success">Writing Category has been deleted successfully.</p>'], 200); 
        }else{
            return response([ 'status' => 'Failed','message' => '<p class="alert alert-danger">This Writing Category not found.</p>'], 404); 
        }      
        
    }
}
