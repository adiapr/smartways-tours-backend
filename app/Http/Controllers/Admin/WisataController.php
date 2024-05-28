<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tours' => Tour::with('location')->latest()->paginate(20),
        ];
        // return $data['tours'];
        return view('admin.tours.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'method' => 'POST',
            'url' => route('paket-wisata.store'),
            'location' => Location::all(),
        ];
        return view('admin.tours._form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['publishment'] = 'draft';
        // return $data;

        $tour = Tour::create($data);
        if($request->hasFile('cover') && $request->file('cover')->isValid()){
            $tour->addMediaFromRequest('cover')->toMediaCollection('cover');
        }
        // notify()->success('Operation successful', 'Success');
        toastr()->success('Data berhasil ditambahkan');
        return redirect()->route('paket-wisata.index');
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
        $data = [
            'method' => 'put',
            'url' => route('paket-wisata.update', $id),
            'location' => Location::all(),
            'item' => Tour::findOrFail($id),
        ];
        return view('admin.tours._form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tour = Tour::findOrFail($id);
        $data = $request->except('_token');

        $tour->update($data);
        
        toastr()->success('Data berhasil diperbarui');
        return redirect()->route('paket-wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tour::findOrFail($id);
        $data->delete();
        $data->media()->delete();

        if ($data) {
            return response()->json([
                "status" => "success",
                "message" => "Data Berhasil Dihapus !"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Data Gagal Dihapus !"
            ]);
        }
    }
}
