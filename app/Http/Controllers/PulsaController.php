<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class PulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.admin.pulsa.manage-product');
    }

    public function datatable(Request $request){
        $data = Product::where('type', 'pulsa');

        return DataTables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.admin.pulsa.manage-pulsa-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'provider_id' => $request->provider_id,
            'type' => 'pulsa',
            'image' => null
        ]);

        return redirect()->back()->with('success', "Berhasil menambah data!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = Product::findOrFail($id);

        return view('content.admin.pulsa.manage-pulsa-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'provider_id' => $request->provider_id,
            'type' => 'pulsa',
            'image' => null
        ]);

        return redirect()->back()->with('success', "Berhasil mengedit data!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
