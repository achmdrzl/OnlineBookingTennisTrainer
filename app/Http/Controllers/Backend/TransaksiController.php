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

            $transaksis = Transaksi::with(['pelanggan', 'paket'])->where('status_pemb', 'belum-bayar')->get();

            return DataTables::of($transaksis)
                ->addIndexColumn()
                ->addColumn('name', function ($transaksi) {
                    return strtoupper($transaksi->pelanggan->name);
                })
                ->addColumn('email', function ($transaksi) {
                    return $transaksi->pelanggan->email;
                })
                ->addColumn('nohp', function ($transaksi) {
                    return $transaksi->pelanggan->nohp;
                })
                ->addColumn('metode_pemb', function ($transaksi) {
                    if ($transaksi->metode_pemb == 'bank_bca') {
                        $metode = 'bank bca';
                    } elseif ($transaksi->metode_pemb == 'bank_bri') {
                        $metode = 'bank bri';
                    } elseif ($transaksi->metode_pemb == 'bank_bni') {
                        $metode = 'bank bni';
                    }
                    return strtoupper($metode);
                })
                ->addColumn('bukti_bayar', function ($transaksi) {
                    $url = asset('storage/uploads/img/' . $transaksi->bukti_bayar);
                    if ($transaksi->bukti_bayar == null) {
                    } else {
                        return '<a download="logo.png" href="' . $url . '" title="Logo title" download>
                                <img src="' . $url . '" width="80px" class="img-rounded" align="center" download />
                                </a>';
                    }
                })
                ->addColumn('total', function ($transaksi) {
                    return 'Rp.'. number_format(($transaksi->lapangan->harga*$transaksi->durasiLat)+($transaksi->jml_ballboy*50000)+($transaksi->jml_asisten*100000)+($transaksi->jml_pelatih*250000));
                })
                ->addColumn('tgl_transaksi', function ($transaksi) {
                    return date('d F Y', strtotime($transaksi->tgl_transaksi));
                })
                ->addColumn('status_pemb', function ($transaksi) {
                    if ($transaksi->status_pemb == 'belum-bayar') {
                        return '<div class="btn btn-danger">' . ucfirst('belum bayar') . '</div>';
                    } else {
                        return '<div class="btn btn-success">' . ucfirst('sudah bayar') . '</div>';
                    }
                })
                ->addColumn('action', function ($transaksi) {
                    $btn = '<button id="confirm-transaksi" data-id="' . $transaksi->id . '" class="btn btn-primary btn-md" title="Confirm"><i class="fa fa-check-circle"></i></button>';

                    $btn = $btn . '<button id="decline-transaksi" data-id="' . $transaksi->id . '" class="btn btn-danger btn-md" title="Decline"><i class="fa fa-times"></i></button>';
                    return $btn;
                })
                ->rawColumns(['bukti_bayar', 'status_pemb', 'action'])
                ->make(true);
        }

        return view('backend.data-master.data-transaksi');
    }

    public function history(Request $request)
    {
        if ($request->ajax()) {

            $transaksis = Transaksi::with(['pelanggan', 'paket'])->where('status_pemb', 'pembayaran-valid')->orWhere('status_pemb', 'tidak-valid')->get();

            return DataTables::of($transaksis)
                ->addIndexColumn()
                ->addColumn('name', function ($transaksi) {
                    return strtoupper($transaksi->pelanggan->name);
                })
                ->addColumn('email', function ($transaksi) {
                    return $transaksi->pelanggan->email;
                })
                ->addColumn('nohp', function ($transaksi) {
                    return $transaksi->pelanggan->nohp;
                })
                ->addColumn('metode_pemb', function ($transaksi) {
                    if ($transaksi->metode_pemb == 'bank_bca') {
                        $metode = 'bank bca';
                    } elseif ($transaksi->metode_pemb == 'bank_bri') {
                        $metode = 'bank bri';
                    } elseif ($transaksi->metode_pemb == 'bank_bni') {
                        $metode = 'bank bni';
                    }
                    return strtoupper($metode);
                })
                ->addColumn('bukti_bayar', function ($transaksi) {
                    $url = asset('storage/uploads/img/' . $transaksi->bukti_bayar);
                    if ($transaksi->bukti_bayar == null) {
                    } else {
                        return '<a download="logo.png" href="' . $url . '" title="Logo title" download>
                                <img src="' . $url . '" width="80px" class="img-rounded" align="center" download />
                                </a>';
                    }
                })
                ->addColumn('total', function ($transaksi) {
                    return 'Rp.' . number_format(($transaksi->lapangan->harga * $transaksi->durasiLat) + ($transaksi->jml_ballboy * 50000) + ($transaksi->jml_asisten * 100000) + ($transaksi->jml_pelatih * 250000));
                })
                ->addColumn('tgl_transaksi', function ($transaksi) {
                    return date('d F Y', strtotime($transaksi->tgl_transaksi));
                })
                ->addColumn('status_pemb', function ($transaksi) {
                    if ($transaksi->status_pemb == 'belum-bayar') {
                        return '<div class="btn btn-danger">' . ucfirst('belum bayar') . '</div>';
                    } elseif($transaksi->status_pemb =='pembayaran-valid') {
                        return '<div class="btn btn-success">' . ucfirst('sudah bayar') . '</div>';
                    }else{
                        return '<div class="btn btn-danger">' . ucfirst('tidak valid') . '</div>';
                    }
                })
                ->rawColumns(['bukti_bayar', 'status_pemb'])
                ->make(true);
        }

        return view('backend.data-master.history-transaksi');
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
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status_pemb' => 'pembayaran-valid'
        ]);
        return response()->json(['status' => 'Berhasil Melakukan Validasi Pembayaran!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status_pemb' => 'tidak-valid'
        ]);
        return response()->json(['status' => 'Berhasil Menolak Pembayaran!']);
    }
}
