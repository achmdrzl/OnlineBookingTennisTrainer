<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DataPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $pengaduans = DataPengaduan::all();
            return DataTables::of($pengaduans)
                ->addIndexColumn()
                ->addColumn('name', function ($pengaduan) {
                    return strtoupper($pengaduan->pengaduan->name);
                })
                ->addColumn('email', function ($pengaduan) {
                    return strtoupper($pengaduan->pengaduan->email);
                })
                ->addColumn('subjek', function ($pengaduan) {
                    return strtoupper($pengaduan->subjek);
                })
                ->addColumn('deskripsi', function ($pengaduan) {
                    return strtoupper($pengaduan->deskripsi);
                })
                ->addColumn('status', function ($pengaduan) {
                    if ($pengaduan->status == 'belum-selesai') {

                        return '<div class="btn btn-warning">' . ucfirst($pengaduan->status) . '</div>';
                    } elseif ($pengaduan->status == 'selesai') {

                        return '<div class="btn btn-success">' . ucfirst($pengaduan->status) . '</div>';
                    } elseif ($pengaduan->status == 'abaikan') {

                        return '<div class="btn btn-danger">' . ucfirst($pengaduan->status) . '</div>';
                    }
                })
                ->addColumn('action', function ($pengaduan) {

                    $btn = ' <button id="done-pengaduan" data-id="' . $pengaduan->id . '" class="btn btn-success btn-md" title="confirm"><i class="fa fa-check"></i></button>';

                    $btn =  $btn . ' <button id="delete-pengaduan" data-id="' . $pengaduan->id . '" class="btn btn-danger btn-md" title="delete"><i class="fa fa-times"></i></button>';

                    if ($pengaduan->status == 'selesai' || $pengaduan->status == 'abaikan') {
                    } else {
                        return $btn;
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.data-master.data-pengaduan');
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
        // 
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
        $pengaduan = DataPengaduan::find($id);
        $pengaduan->update([
            'status' => 'selesai'
        ]);
        return response()->json(['status' => 'Berhasil Mengkonfirmasi Pengaduan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengaduan = DataPengaduan::find($id);
        $pengaduan->update([
            'status' => 'abaikan'
        ]);
        return response()->json(['status' => 'Berhasil Mengabaikan Pengaduan!']);
    }
}
