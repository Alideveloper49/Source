<?php

namespace App\Http\Controllers;

use App\Models\Box;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $box = Box::paginate(10);
        return view('Admin.Box.index',compact('box'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Box.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'name' => ['required','unique:boxes,name'],
            'value' =>  ['required']
        ]);

        if($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }

        Box::create([
            'name' => $request->name,
            'value' => $request->value,
            'author' => auth()->user()->id
        ]);

        $notification=array(
            'message' => 'Enter Box Successfully',
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
        $Boxes = Box::findOrFail($id);
        return view('Admin.Box.edit',compact('Boxes'));
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
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'value' =>  ['required']
        ]);

        if($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }

        Box::where('id',$id)
        ->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);
        $notification=array(
            'message' => 'Update Box Successfully',
            'alert-type' => 'success'
        );
        return redirect('/Box-manage')
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
        $Boxes = Box::findOrFail($id);
        $Boxes->delete();
        $notification=array(
            'message' => 'Delete Box Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
    }
}
