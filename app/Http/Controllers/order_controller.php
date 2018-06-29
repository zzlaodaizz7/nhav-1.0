<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\order;
use App\product;
use App\agency;
use App\detailorder;
class order_controller extends Controller
{
    private $agency;
    private $agencyload;
    private $product;
    function __construct(){
        $this->agencyload[]="---Chọn đại lý---";
        $a = agency::all();
        foreach ($a as $row) {
            $this->agency[$row->id]=['nameagency'=>$row->nameagency,'address'=>$row->address];
            $this->agencyload[$row->id]=$row->nameagency;
        }
        $b = product::all();
        foreach ($b as $key) {
            $this->product[$key->id] = ['nameproduct'=>$key->nameproduct,'price'=>$key->price,'unit'=>$key->unit];
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=order::all();
        return view('pages/order.index',['data'=>$data,'agency'=>$this->agency]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = product::all();
        return view('pages/order.create',['data'=>$data,'agency'=>$this->agencyload]);
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
                'taxcode'=> 'required',
                'dateship' =>'required',
            ],
            [
                'taxcode.required' => 'Bạn chưa nhập mã số thuế',
                'dateship.required' => 'Bạn chưa nhập ngày xuất',
            ]
        );
        $order = new order();
        $order->agency_id = $request->agency_idhidden;
        $order->taxcode = $request->taxcode;
        $order->dateship = $request->dateship;
        $order->totalmoney = $request->totalall;
        $order->paied = $request->paied;
        $order->paied = str_replace([' đ',','], '', $order->paied);
        $order->debt = $request->total;
        $order->save();
        for ($i=0; $i < count($request->keyProduct) ; $i++) { 
            $detailorder = new detailorder();
            $detailorder->order_id = order::max('id');
            $detailorder->product_id = $request->keyProduct[$i];
            $detailorder->count = $request->count[$i];
            $detailorder->totalmoney = $request->thanhtien[$i];
            $detailorder->save();
        }
        return redirect()->route('order.index')->with('thongbao','Thêm hóa đơn thành công');
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
        $order = order::find($id);
        $detailorder = detailorder::where('order_id','=',$id)->get();
        return view('pages/order.show',['order'=>$order,'detailorder'=>$detailorder,'agency'=>$this->agency,'product'=>$this->product]);
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
