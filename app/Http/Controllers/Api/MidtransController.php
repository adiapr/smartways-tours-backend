<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function createOrder(Request $request)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'kode' => 'required',
            'metode' => 'required',
            'total' => 'required|numeric',
            'product_type' => 'required',
            'product_id' => 'required|integer'
        ]);

        // Buat order baru di database
        $order = Order::create($validatedData);

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat parameter transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total,
            ],
            'customer_details' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '081234567890',
            ],
        ];

        // Dapatkan Snap token
        $snapToken = Snap::getSnapToken($params);

        // Kembalikan response dengan Snap token
        return response()->json(['token' => $snapToken]);
    }
}
