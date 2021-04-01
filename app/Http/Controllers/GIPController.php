<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Customer;
use App\Models\Gate_pass;
use App\Models\invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GIPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = invoice::orderBy('id','desc')->paginate(2);
        return view('Admin.GIP.index',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Customer = Customer::orderBy('id','desc')->get();
        $box = Box::orderBy('id','desc')->get();
        $gate_pass = Gate_pass::orderBy('id','desc')->where('node','0')->get();
        $amount = Gate_pass::orderBy('id','desc')->where('node','0')->sum("amount");
        $qty = Gate_pass::orderBy('id','desc')->where('node','0')->sum("qty");

        return view('Admin.GIP.create',compact('Customer','gate_pass','amount','qty','box'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        switch ($request->input('action')) {
            case 'invoice':
                $validated =  Validator::make($request->all(), [
                    'customer' => ['required']
                ]);

                if($validated->fails()) {
                    $notification=array(
                        'message' => 'All fields is required',
                        'alert-type' => 'warning'
                    );
                    return redirect('Create-GIP')
                        ->with($notification);
                    //return redirect()->back()->withErrors($validated->errors());
                }
                $invoice = invoice::latest()->first();
                if($invoice == ""){
                    $code = "GIOP-00";
                }else{
                    $code = $invoice->invoices;
                }
                $formerReference = $code;
                $parts = explode("-", $formerReference);
                $numbers = $parts[1];
                $letters = $parts[0];

                if($numbers == "999"){
                   $nextLetters = ++$letters;
                   $nextNumbers = 1;
                } else {
                    $nextLetters = $letters;
                    $nextNumbers = ++$numbers;
                }

                $nextReference = $nextLetters."-".sprintf('%03d', $nextNumbers);
                $amount_order = Gate_pass::where('type','in')
                ->where('node','0')
                ->sum('amount');
                if($amount_order == "0"){
                    $notification=array(
                        'message' => 'Amount is empty',
                        'alert-type' => 'warning'
                    );
                    return redirect('Create-GIP')
                        ->with($notification);
                }
                $order_place = invoice::create([
                    'invoices' => $nextReference,
                    'author' => auth()->user()->id,
                    'party_id' => $request->customer,
                    'amount' => $amount_order,
                    'type' => 'in',
                ]);
                 Gate_pass::where('type','in')
                ->where('node','0')
                ->update([
                    'party_id' => $order_place->party_id,
                    'invoice_id' => $order_place->invoices,
                    'node' => '1'
                ]);
                $notification=array(
                    'message' => 'Successfully invoice Generated',
                    'alert-type' => 'success'
                );
                return redirect()->back()
                    ->with($notification);
                break;

            case 'add':
            $validated =  Validator::make($request->all(), [
                'product' => ['required'],
                'qty' =>  ['required'],
                'rate' =>  ['required'],
                'desc' =>  ['required'],
                'unit' =>  ['required']
            ]);

            if($validated->fails()) {
                $notification=array(
                    'message' => 'All fields is required',
                    'alert-type' => 'warning'
                );
                return redirect('Create-GIP')
                    ->with($notification);
                //return redirect()->back()->withErrors($validated->errors());
            }

            $qty = $request->qty;
            $rate = $request->rate;
            $amount = $qty * $rate;
            Gate_pass::create([
                'product' => $request->product,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'desc' => $request->desc,
                'amount' => $amount,
                'unit' => $request->unit,
                'type' => 'in',
                'author' => auth()->user()->id
            ]);

            $notification=array(
                'message' => 'Successfully Add Product',
                'alert-type' => 'success'
            );
            return redirect()->back()
                ->with($notification);
                break;


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
    public function destroy($type,$node)
    {
        Gate_pass::where('type' ,$type)
        ->where('node',$node)->delete();
        $notification=array(
            'message' => 'Successfully Delete Product',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
    }


}
