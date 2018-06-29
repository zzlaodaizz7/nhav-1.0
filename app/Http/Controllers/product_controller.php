<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
class product_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=product::all();
        return view('pages/product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages/product.create');
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
        $this->validate($request,
            [
                'nameproduct'=> 'required',
                'price' =>'required',
            ],
            [
                'nameproduct.required' => 'Bạn chưa nhập tên sản phẩm',
                'price.required' => 'Bạn chưa nhập đơn giá',
            ]
        );
        product::create($request->all());
        return redirect()->route('product.index')->with('thongbao','Thêm thành công');
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
        $this->validate($request,
            [
                'nameproduct'=> 'required',
                'price' =>'required',
            ],
            [
                'nameproduct.required' => 'Bạn chưa nhập tên sản phẩm',
                'price.required' => 'Bạn chưa nhập đơn giá',
            ]
        );
        product::find($id)->update($request->all());
        return redirect()->route('product.index')->with('thongbao','Sửa thành công');

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
        product::find($id)->delete();
        return redirect()->route('product.index')->with('thongbao','Xóa thành công');
    }
}
