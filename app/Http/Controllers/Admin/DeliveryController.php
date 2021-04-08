<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryRequest;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function index()
    {
        return view('admin.delivery.index', ['deliveries' => Delivery::paginate(10)]);
    }


    public function create()
    {
        return view('admin.delivery.create');
    }


    public function store(DeliveryRequest $request)
    {
        Delivery::create($request->all());
        return redirect()->route('admin.delivery.index');
    }



    public function edit($id)
    {
        return view('admin.delivery.edit', ['delivery' => Delivery::find($id)]);
    }


    public function update(DeliveryRequest $request, $id)
    {
        Delivery::find($id)->update($request->all());
        return redirect()->route('admin.delivery.index');
    }


    public function destroy($id)
    {
        Delivery::destroy($id);
    }
}
