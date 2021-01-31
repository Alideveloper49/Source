<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customer = Customer::paginate(10);
        return view('Admin.Customer.index',compact('Customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name' => ['required'],
            'company_name' => ['required'],
            'phone' => ['required' , 'min:11','max:11'],
            'address' => ['required']
        ]);

        if($validated->fails()) {
            $notification=array(
                'message' => $validated->errors(),
                'alert-type' => 'warning'
            );
            return redirect('Create-Customer')
                ->with($notification);
            //return redirect()->back()->withErrors($validated->errors());
        }

        Customer::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'author' => auth()->user()->id
        ]);
        $notification=array(
            'message' => 'Successfully Enter Customer',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
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
        $Customers = Customer::findOrFail($id);
        return view('Admin.Customer.edit',compact('Customers'));
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
        $validated = Validator::make($request->all(),[
            'name' => ['required'],
            'company_name' => ['required'],
            'phone' => ['required'],
            'address' => ['required']
        ]);
        if($validated->fails()) {
            $notification=array(
                'message' => $validated->errors(),
                'alert-type' => 'warning'
            );
            return redirect('Profile')
                ->with($notification);
            //return redirect()->back()->withErrors($validated->errors());
        }
        Customer::where('id',$id)->update([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        $notification=array(
            'message' => 'Update Customer Successfully',
            'alert-type' => 'success'
        );
        return redirect('/Customer-manage')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Customers = Customer::findOrFail($id);
        $Customers->delete();
        $notification=array(
            'message' => 'Delete Customer Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
    }
}
