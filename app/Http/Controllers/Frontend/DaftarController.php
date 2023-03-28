<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaketLatihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = PaketLatihan::where('status', 'aktif')->get();
        $totalCoulumn = PaketLatihan::count();
        return view('frontend.pages.pendaftaran', compact('paket', 'totalCoulumn'));
    }

    public function homepage()
    {
        return view('frontend.dashboard');
    }

    public function getJadwal()
    {
        $event = array();
        $jadwal = Transaksi::with(['pelanggan', 'paket'])->where('status_pemb', 'pembayaran-valid')->get();
        foreach($jadwal as $item){
            $event[] = [
                'title' => $item->pelanggan->name,
                'start' => $item->start,
                'end' => $item->end
            ];
        }
        return view('frontend.pages.jadwal', compact('event'));
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
