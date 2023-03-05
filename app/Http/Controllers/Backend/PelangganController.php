<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $users = User::where('level', 'pelanggan')->latest()->get();
            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($user) {
                    return strtoupper($user->name);
                })
                ->addColumn('email', function ($user) {
                    return ucfirst($user->email);
                })
                ->addColumn('status', function ($user) {
                    if ($user->status == 'aktif') {
                        return '<div class="btn btn-primary">' . ucfirst($user->status) . '</div>';
                    } else {
                        return '<div class="btn btn-danger">' . ucfirst($user->status) . '</div>';
                    }
                })
                ->addColumn('action', function ($user) {

                    if ($user->status == 'aktif') {
                        $button = '<i class="fa fa-times"></i>';
                        $class = 'danger';
                        $title = 'Arsip';
                    } else {
                        $title = 'Aktifkan';
                        $class = 'success';
                        $button = '<i class="fa fa-undo"></i>';
                    }

                    $btn = '<button id="edit-user" data-id="' . $user->id . '" title="Edit" class="btn btn-default edit-user"><i class="fa fa-pencil"></i></button>';


                    $btn = $btn . ' <button id="delete-user" data-id="' . $user->id . '" class="btn btn-' . $class . ' btn-md" title="' . $title . '">' . $button . '</button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.data-master.data-pelanggan');
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
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $user = User::updateOrCreate([
            'id' => $request->id
        ],[
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'pelanggan'
        ]);

        $user->assignRole('user');

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
        $dataPelanggan = User::find($id);
        return response()->json($dataPelanggan);
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
    public function destroy($id)
    {
        $user = User::find($id);
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
