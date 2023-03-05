<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataPengaduan;
use Illuminate\Http\Request;
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
                ->addColumn('status', function ($pengaduan) {
                    if ($pengaduan->status == 'aktif') {
                        return '<div class="btn btn-primary">' . ucfirst($pengaduan->status) . '</div>';
                    } else {
                        return '<div class="btn btn-danger">' . ucfirst($pengaduan->status) . '</div>';
                    }
                })
                ->addColumn('action', function ($pengaduan) {

                    if ($pengaduan->status == 'aktif') {
                        $button = '<i class="fa fa-times"></i>';
                        $class = 'danger';
                        $title = 'Arsip';
                    } else {
                        $title = 'Aktifkan';
                        $class = 'success';
                        $button = '<i class="fa fa-undo"></i>';
                    }

                    $btn = ' <button id="delete-pengaduan" data-id="' . $pengaduan->id . '" class="btn btn-' . $class . ' btn-md" title="' . $title . '">' . $button . '</button>';

                    return $btn;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengaduan = DataPengaduan::find($id);
        if ($pengaduan->status == 'belum-selesai') {
            $pengaduan->update([
                'status' => 'telah selesai'
            ]);
            return response()->json(['status' => 'Berhasil Menyelesaikan Aduan!']);
        } else {
            $pengaduan->update([
                'status' => 'belum-selesai'
            ]);
            return response()->json(['status' => 'Aduan di Batalkan Aduan!']);
        }
    }
}
