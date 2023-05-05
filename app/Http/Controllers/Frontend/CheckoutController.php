<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DataLapangan;
use App\Models\PaketLatihan;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout(string $id)
    {
        $paket = PaketLatihan::with(['detail'])->where('id', $id)->where('status', 'aktif')->first();

        $user = User::with(['biodata'])->where('id', auth()->user()->id)->first();

        return view('frontend.pages.checkout', compact('paket', 'user'));
    }

    public function order($id, Request $request)
    {
        $lap = DataLapangan::find($id);
        $lapangan = $request->session()->put('lapangan', $lap);
        return view('frontend.pages.order');
    }

    public function continueOrder(Request $request)
    {
        $todayDate = date('m/d/Y');

        //define validation rules
        $validator = Validator::make($request->all(), [
            'jml_ballboy' => 'required|in:1,2',
            // 'jml_asisten' => 'required|in:1',
            'jml_pelatih' => 'required|in:1,2',
            'start_date' => 'required|after_or_equal:' . $todayDate,
            // 'end_date' => 'required|after:start_date',
            'durasiLat' => 'required|in:1,2,3',
        ]);

        $end_date = new Carbon($request->input('start_date'));
        $end_date->addHours($request->input('durasiLat'));

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'jml_ballboy' => $request->input('jml_ballboy'),
            'jml_asisten' => $request->input('jml_asisten'),
            'jml_pelatih' => $request->input('jml_pelatih'),
            'start_date' => $request->input('start_date'),
            'durasiLat' => $request->input('durasiLat'),
            'end_date' => $end_date,
        ];

        $request->session()->put('data', $data);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Anda Berhasil di Simpan!',
        ]);
    }

    public function summary(Request $request)
    {
        $user = User::with(['biodata'])->where('id', auth()->user()->id)->first();

        return view('frontend.pages.summary', compact('user'));
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'metode_pemb' => 'required|in:bank_bca,bank_bri,bank_bni',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($image = $request->file('bukti_bayar')) {

            $fileName = 'bukti-' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/img/', $fileName, 'public');

            $data = $request->session()->get('data');
            $lapangan = $request->session()->get('lapangan');

            // Store Data
            $transaksi = Transaksi::create([
                'metode_pemb' => $request->input('metode_pemb'),
                'user_id' => $request->input('user_id'),
                'lap_id' => $lapangan['id'],
                'bukti_bayar' => $fileName,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'jml_ballboy' => $data['jml_ballboy'],
                'jml_asisten' => $data['jml_asisten'],
                'jml_pelatih' => $data['jml_pelatih'],
                'durasiLat' => $data['durasiLat'],
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Pesanan Anda Berhasil!',
        ]);
    }

    public function orderSuccess()
    {
        return view('frontend.pages.orderSukses');
    }
}
