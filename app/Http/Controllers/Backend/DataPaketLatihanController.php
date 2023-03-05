<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaketLatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DataPaketLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $pakets = PaketLatihan::latest()->get();
            return DataTables::of($pakets)
                ->addIndexColumn()
                ->addColumn('nama_paket', function ($paket) {
                    return (ucfirst($paket->nama_paket));
                })
                ->addColumn('harga', function ($paket) {
                    return ('Rp. ' . number_format($paket->harga));
                })
                ->addColumn('durasi', function ($paket) {
                    return ($paket->durasi . ' Jam');
                })
                ->addColumn('status', function ($paket) {
                    if ($paket->status == 'aktif') {
                        return '<div class="btn btn-primary">' . ucfirst($paket->status) . '</div>';
                    } else {
                        return '<div class="btn btn-danger">' . ucfirst($paket->status) . '</div>';
                    }
                })
                ->addColumn('action', function ($paket) {

                    if ($paket->status == 'aktif') {
                        $button = '<i class="fa fa-times"></i>';
                        $class = 'danger';
                        $title = 'Arsip';
                    } else {
                        $title = 'Aktifkan';
                        $class = 'success';
                        $button = '<i class="fa fa-undo"></i>';
                    }

                    $btn = '<button id="edit-paket" data-id="' . $paket->id . '" title="Edit" class="btn btn-default edit-paket"><i class="fa fa-pencil"></i></button>';


                    $btn = $btn . ' <button id="delete-paket" data-id="' . $paket->id . '" class="btn btn-' . $class . ' btn-md" title="' . $title . '">' . $button . '</button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.data-master.data-paket');
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
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required',
            'jml_pelatih' => 'required',
            'jml_asisten' => 'required',
            'jml_ballboy' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $user = PaketLatihan::updateOrCreate([
            'id' => $request->id
        ], [
            'nama_paket' => $request->nama_paket,
            'jml_pelatih' => $request->jml_pelatih,
            'jml_asisten' => $request->jml_asisten,
            'jml_ballboy' => $request->jml_ballboy,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
        ]);
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
        $paketLatihan = PaketLatihan::find($id);
        return response()->json($paketLatihan);
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
        $paket = PaketLatihan::find($id);
        if ($paket->status == 'aktif') {
            $paket->update([
                'status' => 'non-aktif'
            ]);
            return response()->json(['status' => 'Berhasil Mengarsipkan Data!']);
        } else {
            $paket->update([
                'status' => 'aktif'
            ]);
            return response()->json(['status' => 'Berhasil Menampilkan Data!']);
        }
    }
}
