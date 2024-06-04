<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documentation;
use App\Models\Tour;
use Illuminate\Http\Request;

class WisataDocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($uuid)
    {
        $tour = Tour::whereUuid($uuid)->firstOrFail();
        $data = [
            'tour' => $tour,
            'documentations' => Documentation::whereDocumentationsType(Tour::class)->whereDocumentationsId($tour->id)->latest()->paginate(15),
        ];

        return view('admin.tours.documentation', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $documentation = Documentation::create([
            'documentations_type' => Tour::class,
            'documentations_id' => $id,
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $documentation->clearMediaCollection('file');
            $documentation->addMediaFromRequest('file')->toMediaCollection('file');
        }

        toastr()->success('Data berhasil ditambahkan');
        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Documentation::findOrFail($id);
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
