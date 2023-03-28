<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaketLatihan;
use App\Models\Transaksi;
use App\Models\User;
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

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'metode_pemb' => 'required|in:bank_bca,bank_bri,bank_bni',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lap_lat' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $paket = PaketLatihan::where('id', $request->input('paket_id'))->first();
        $paket->update([
            'kuota' => $paket->kuota - 1,
        ]);

        if ($image = $request->file('bukti_bayar')) {

            $fileName = 'bukti-' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/img/', $fileName, 'public');

            // Store Data
            $transaksi = Transaksi::create([
                'metode_pemb' => $request->input('metode_pemb'),
                'user_id' => $request->input('user_id'),
                'paket_id' => $request->input('paket_id'),
                'bukti_bayar' => $fileName,
                'lap_lat' => $request->input('lap_lat'),
                'start' => $request->input('start'),
                'end' => $request->input('end'),
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
