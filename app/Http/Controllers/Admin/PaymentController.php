<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentRequest;

class PaymentController extends Controller
{

    public function index()
    {
        return view('admin.payment.index', ['payments' => Payment::paginate(10)]);
    }


    public function create()
    {
        return view('admin.payment.create');
    }


    public function store(PaymentRequest $request)
    {
        Payment::create($request->all());
        return redirect()->route('admin.payment.index');
    }


    public function edit($id)
    {
        return view('admin.payment.edit', ['payment' => Payment::find($id)]);
    }

    public function update(PaymentRequest $request, $id)
    {
        Payment::find($id)->update($request->all());
        return redirect()->route('admin.payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect()->back();
    }
}
