<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $transaksis = Transaksi::with(['pelanggan', 'paket'])->where('status_bo', 'waiting')->get();

            return DataTables::of($transaksis)
                ->addIndexColumn()
                ->addColumn('name', function ($transaksi) {
                    return strtoupper($transaksi->pelanggan->name);
                })
                ->addColumn('email', function ($transaksi) {
                    return $transaksi->pelanggan->email;
                })
                ->addColumn('metode_pemb', function ($transaksi) {
                    return strtoupper($transaksi->metode_pemb);
                })
                ->addColumn('tgl_transaksi', function ($transaksi) {
                    return date('d F Y', strtotime($transaksi->tgl_transaksi));
                })
                ->addColumn('status_pemb', function ($transaksi) {
                    if ($transaksi->status_pemb == 'belum-bayar') {
                        return '<div class="btn btn-warning">' . ucfirst($transaksi->status_pemb) . '</div>';
                    } else {
                        return '<div class="btn btn-danger">' . ucfirst($transaksi->status_pemb) . '</div>';
                    }
                })
                ->addColumn('action', function ($transaksi) {

                    $btn = '<button id="confirm-transaksi" data-id="' . $transaksi->id . '" class="btn btn-warning btn-md" title="Confirm"><i class="fa fa-times"></i></button>';

                    return $btn;
                })
                ->rawColumns(['status_pemb', 'action'])
                ->make(true);
        }

        return view('backend.data-master.data-transaksi');
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
        //
    }
}
