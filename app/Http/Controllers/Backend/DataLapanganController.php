<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DataLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $laps = DataLapangan::latest()->get();
            return DataTables::of($laps)
                ->addIndexColumn()
                ->addColumn('nama_lapangan', function ($lap) {
                    return (ucfirst($lap->nama_lapangan));
                })
                ->addColumn('alamat_lap', function ($lap) {
                    return ($lap->alamat_lap);
                })
                ->addColumn('jenis_lap', function ($lap) {
                    return (ucfirst($lap->jenis_lap));
                })
                ->addColumn('gambar_lap', function ($lap) {
                    $url = asset('storage/uploads/img/' . $lap->gambar_lap);
                    if ($lap->gambar_lap == null) {
                    } else {
                        return '<img src="' . $url . '" width="80px" class="img-rounded" align="center" />';
                    }
                })
                ->addColumn('harga', function ($lap) {
                    return ('Rp. ' . number_format($lap->harga));
                })
                ->addColumn('status', function ($lap) {
                    if ($lap->status == 'aktif') {
                        return '<div class="btn btn-primary">' . ucfirst($lap->status) . '</div>';
                    } else {
                        return '<div class="btn btn-danger">' . ucfirst($lap->status) . '</div>';
                    }
                })
                ->addColumn('action', function ($lap) {

                    if ($lap->status == 'aktif') {
                        $button = '<i class="fa fa-times"></i>';
                        $class = 'danger';
                        $title = 'Arsip';
                    } else {
                        $title = 'Aktifkan';
                        $class = 'success';
                        $button = '<i class="fa fa-undo"></i>';
                    }

                    $btn = '<button href="booking/' . $lap->id . '" id="edit-lap" data-id="' . $lap->id . '" title="Edit" class="btn btn-default edit-lap"><i class="fa fa-pencil"></i></button>';

                    $btn = $btn . ' <button id="delete-lap" data-id="' . $lap->id . '" class="btn btn-' . $class . ' btn-md" title="' . $title . '">' . $button . '</button>';

                    $btn = $btn . ' <button id="show-lap" data-id="' . $lap->id . '" class="btn btn-primary btn-md" title="Show"><i class="fa fa-eye"></i></button>';

                    return $btn;
                })
                ->rawColumns(['gambar_lap', 'status', 'action'])
                ->make(true);
        }

        return view('backend.data-master.data-lapangan');
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
            'nama_lapangan' => 'required',
            'jenis_lap' => 'required',
            'harga' => 'required',
            'alamat_lap' => 'required',
            // 'gambar_lap' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // return response()->json($request->all());

        if ($image = $request->file('gambar_lap')) {

            $fileName = 'lap-'.time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/img/', $fileName, 'public');
            $nama_lapangan = $request->input('nama_lapangan');
            $jenis_lap = $request->input('jenis_lap');
            $harga = $request->input('harga');
            $alamat_lap = $request->input('alamat_lap');

            // Store Data or Update Data
            $user = DataLapangan::updateOrCreate([
                'id' => $request->input('lap_id'),
            ], [
                'nama_lapangan' => $nama_lapangan,
                'jenis_lap' => $jenis_lap,
                'harga' => $harga,
                'alamat_lap' => $alamat_lap,
                'gambar_lap' => $fileName,
            ]);
        } else {
            $nama_lapangan = $request->input('nama_lapangan');
            $jenis_lap = $request->input('jenis_lap');
            $harga = $request->input('harga');
            $alamat_lap = $request->input('alamat_lap');

            // Store Data or Update Data
            $user = DataLapangan::updateOrCreate([
                'id' => $request->input('lap_id'),
            ], [
                'nama_lapangan' => $nama_lapangan,
                'jenis_lap' => $jenis_lap,
                'harga' => $harga,
                'alamat_lap' => $alamat_lap,
            ]);
        }

        // if ($request->hasFile('img_pelatih')) {

        //     $file = $request->file('img_pelatih');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '-' . $extension;
        //     $file->move('uploads/img/', $filename);
        // }

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
        $dataLap = DataLapangan::find($id);
        return response()->json($dataLap);
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
        $user = DataLapangan::find($id);
        if ($user->status == 'aktif') {
            $user->update([
                'status' => 'non-aktif'
            ]);
            return response()->json(['status' => 'Berhasil Mengarsipkan Data!']);
        } else {
            $user->update([
                'status' => 'aktif'
            ]);
            return response()->json(['status' => 'Berhasil Menampilkan Data!']);
        }
    }
}
