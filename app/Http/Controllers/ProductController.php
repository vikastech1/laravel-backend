<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       
        if ($request->ajax()) {
            $data = Product::latest()->with('category')->get();
            return DataTables::of($data)
           
            ->addColumn('action', function ($data) {
                return '<a href="javascript:void(0)" class="btn btn-xs btn-primary" data-id="'.$data->id.'" ><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-id="'.$data->id.'" ><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['image', 'action'])->make(true);
        }       
        $data = array();
        $data['categories'] = Category::latest()->get();
        return view('dashboards.admins.products.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [            
            'title' => 'required|unique:products',
            'sku' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json( ['status' => 'Failed','message' => $validator->errors()], );
        }else{
            $title = $request->get('title');
            $sku = $request->get('sku');
            $price = $request->get('price');
            $quantity = $request->get('quantity');
            $description = $request->get('description');
            $category_id = $request->get('category_id');
            $product = new Product();
            $product->title = $title;
            $product->sku = $sku;
            $product->price = $price;
            $product->quantity = $quantity;
            $product->description = $description;
            $product->category_id = $category_id;
            $product->save();
            if(intval($product->id > 0 )){
                return response(['status'=>'success','message' => '<p class="alert alert-success">Category hint has been added successfully.</p>'],200);
            }else{
                return response(['status'=>'failed','message' => '<p class="alert alert-danger">Category hint has not been added.</p>'],204);
            }

        }
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
    }
}
