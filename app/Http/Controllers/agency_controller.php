<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agency;
class agency_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = agency::all();
        return view('pages/agency.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'nameagency'=> 'required',
                'address' =>'required',
                'phone' => 'required',
            ],
            [
                'nameproduct.required' => 'Bạn chưa nhập tên sản phẩm',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'address.required' => 'Bạn chưa nhập địa chỉ',
            ]
        );
        agency::create($request->all());
        return redirect()->route('agency.index')->with('thongbao','Thêm thành công');
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
                'nameagency'=> 'required',
                'address' =>'required',
                'phone' => 'required',
            ],
            [
                'nameproduct.required' => 'Bạn chưa nhập tên sản phẩm',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'address.required' => 'Bạn chưa nhập địa chỉ',
            ]
        );
        agency::find($id)->update($request->all());
        return redirect()->route('agency.index')->with('thongbao','Sửa thành công');

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
        agency::find($id)->delete();
        return redirect()->route('agency.index')->with('thongbao','Xóa thành công');
    }
}
