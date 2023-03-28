<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BiodataPelatih;
use App\Models\PaketLatihan;
use App\Models\Transaksi;
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

                    $btn = '<button href="booking/' . $paket->id . '" id="edit-paket" data-id="' . $paket->id . '" title="Edit" class="btn btn-default edit-paket"><i class="fa fa-pencil"></i></button>';


                    $btn = $btn . ' <button id="delete-paket" data-id="' . $paket->id . '" class="btn btn-' . $class . ' btn-md" title="' . $title . '">' . $button . '</button>';

                    $btn = $btn . ' <button id="show-paket" data-id="' . $paket->id . '" class="btn btn-primary btn-md" title="Show"><i class="fa fa-eye"></i></button>';

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
            'tgl_start' => 'required',
            'tgl_end' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'kuota' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
            'nama_pelatih1' => 'required',
            'nama_asisten1' => 'required',
            'nama_ballboy1' => 'required',
            'materi' => 'required',
            'peralatan' => 'required',
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
            'tgl_start' => $request->tgl_start,
            'tgl_end' => $request->tgl_end,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
            'kuota' => $request->kuota,
        ]);

        $detail = BiodataPelatih::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nama_pelatih1' => $request->nama_pelatih1,
                'nama_pelatih2' => $request->nama_pelatih2,
                'nama_pelatih3' => $request->nama_pelatih3,
                'nama_asisten1' => $request->nama_asisten1,
                'nama_asisten2' => $request->nama_asisten2,
                'nama_asisten3' => $request->nama_asisten3,
                'nama_ballboy1' => $request->nama_ballboy1,
                'nama_ballboy2' => $request->nama_ballboy2,
                'nama_ballboy3' => $request->nama_ballboy3,
                'materi' => $request->materi,
                'peralatan' => $request->peralatan,
                'paket_id' => $user->id
            ]
        );

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
        $paketLatihan = PaketLatihan::with(['detail'])->where('id', $id)->first();
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
