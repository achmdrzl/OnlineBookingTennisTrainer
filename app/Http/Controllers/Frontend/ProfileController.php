<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with(['biodata'])->where('id', Auth::user()->id)->first();

        return view('frontend.pages.profile', compact('user'));
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
            'umur' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'pengalaman_tennis' => 'required',
        ]);

        $id = Auth::user()->id;

        $dataUser = Customer::where('user_id', $id)->first();
        $dataUser->update([
            'umur' => $request->input('umur'),
            'jenis_kelamin' => $request->input('jk'),
            'alamat' => $request->input('alamat'),
            'status' => $request->input('status'),
            'pengalaman_tennis' => $request->input('pengalaman_tennis'),
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $id = Auth::user()->id;
        $name = $request->input('name');
        $email = $request->input('email');

        $user = User::find($id);
        // Update Data Model User
        $user->update([
            'name' => $name,
            'email' => $email,
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
        //
    }
}
