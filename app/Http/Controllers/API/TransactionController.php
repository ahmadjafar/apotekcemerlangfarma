<?php

namespace App\Http\Controllers\API;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $drug_id = $request->input('drug_id');
        $status = $request->input('status');


        if ($id) {
            $transaction = Transaction::with(['drug', 'user'])->find($id);

            if ($transaction) {
                return ResponseFormatter::success($transaction, 'Data Berhasil Diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Produk Tidak Ada', 404);
            }
        }

        $transaction = Transaction::with(['drug', 'user'])->where('user_id', Auth::user()->id);

        if ($drug_id) {
            $transaction->where('drug_id',  $drug_id);
        }

        if ($status) {
            $transaction->where('status', $status);
        }

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data list transaction berhasil diambil'

        );
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return ResponseFormatter::success($transaction, 'Transaksi Berhasil Diperbarui');
    }

    public function checkout(Request $request)
    {
        $request->validate([

            'drug_id' => 'required|exists:drugs,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required',
            'total' => 'required',
            'status' => 'required',

        ]);

        $transaction = Transaction::create([
            'drug_id' => $request->drug_id,
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'status' => $request->status,
            'payment_url' => ''

        ]);

        //  Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $transaction = Transaction::with(['drug', 'user'])->find($transaction->id);
        // dd($transaction);

        // membuat Transaksi Midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->total,
            ],

            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],

            'enable_payments' => ['gopay', 'bank_transfer'],
            'vtweb' => []
        ];


        try {

            // mengambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            // mengambil data ke API 
            return ResponseFormatter::success($transaction, 'Transaksi Berhasil');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), ' Transaksi Gagal');
        }
    }
}
