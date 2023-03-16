<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataPelatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DataPelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $pelatihs = DataPelatih::latest()->get();
            return DataTables::of($pelatihs)
                ->addIndexColumn()
                ->addColumn('nama_pelatih', function ($pelatih) {
                    return strtoupper($pelatih->nama_pelatih);
                })
                ->addColumn('pengalaman', function ($pelatih) {
                    return ucfirst($pelatih->pengalaman);
                })
                ->addColumn('img_pelatih', function ($pelatih) {
                    $url = asset('storage/uploads/img/' . $pelatih->img_pelatih);
                    if ($pelatih->img_pelatih == null) {
                    } else {
                        return '<img src="' . $url . '" width="80px" class="img-rounded" align="center" />';
                    }
                })
                ->addColumn('status', function ($pelatih) {
                    if ($pelatih->status == 'aktif') {
                        return '<div class="btn btn-primary">' . ucfirst($pelatih->status) . '</div>';
                    } else {
                        return '<div class="btn btn-danger">' . ucfirst($pelatih->status) . '</div>';
                    }
                })
                ->addColumn('action', function ($pelatih) {

                    if ($pelatih->status == 'aktif') {
                        $button = '<i class="fa fa-times"></i>';
                        $class = 'danger';
                        $title = 'Arsip';
                    } else {
                        $title = 'Aktifkan';
                        $class = 'success';
                        $button = '<i class="fa fa-undo"></i>';
                    }

                    $btn = '<button id="edit-pelatih" data-id="' . $pelatih->id . '" title="Edit" class="btn btn-default edit-pelatih"><i class="fa fa-pencil"></i></button>';


                    $btn = $btn . ' <button id="delete-pelatih" data-id="' . $pelatih->id . '" class="btn btn-' . $class . ' btn-md" title="' . $title . '">' . $button . '</button>';

                    return $btn;
                })
                ->rawColumns(['img_pelatih', 'status', 'action'])
                ->make(true);
        }

        return view('backend.data-master.data-pelatih');
    }

    public function getDataPelatih()
    {
        $data = DataPelatih::all();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
            'nama_pelatih' => 'required',
            'pengalaman' => 'required',
            // 'img_pelatih' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // return response()->json($request->all());

        if ($image = $request->file('img_pelatih')) {

            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/img/', $fileName, 'public');
            $nama_pelatih = $request->input('nama_pelatih');
            $pengalaman = $request->input('pengalaman');

            // Store Data or Update Data
            $user = DataPelatih::updateOrCreate([
                'id' => $request->input('pelatih_id'),
            ], [
                'nama_pelatih' => $nama_pelatih,
                'pengalaman' => $pengalaman,
                'img_pelatih' => $fileName
            ]);
        } else {

            $nama_pelatih = $request->input('nama_pelatih');
            $pengalaman = $request->input('pengalaman');

            // Store Data or Update Data
            $user = DataPelatih::updateOrCreate([
                'id' => $request->input('pelatih_id'),
            ], [
                'nama_pelatih' => $nama_pelatih,
                'pengalaman' => $pengalaman,
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
        $dataPelatih = DataPelatih::find($id);
        return response()->json($dataPelatih);
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
        $user = DataPelatih::find($id);
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
