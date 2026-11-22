<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Mengambil semua riwayat pembayaran beserta data order-nya
    public function index()
    {
        $payments = Payment::with('order')->latest()->get();
        return response()->json($payments);
    }

    // Menyimpan data pembayaran baru (DP / Full / Pelunasan)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_type' => 'required|in:full,dp,settlement',
            'payment_method' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'payment_proof' => 'nullable|string',
        ]);

        $payment = Payment::create($validated);

        return redirect()->back()->with('success', 'Data pembayaran berhasil dikirim dan menunggu verifikasi.');
    }

    // Menampilkan detail 1 pembayaran
    public function show($id)
    {
        $payment = Payment::with('order')->findOrFail($id);
        return response()->json($payment);
    }

    // Verifikasi atau update status pembayaran oleh admin
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,verified,rejected',
        ]);

        if ($validated['status'] === 'verified') {
            $validated['verified_at'] = now();

            // Otomatis update payment_status pada tabel orders via relasi Eloquent
            $order = $payment->order;
            if ($payment->payment_type === 'dp') {
                $order->update(['payment_status' => 'partial_dp']);
            } else {
                $order->update(['payment_status' => 'paid']);
            }
        }

        $payment->update($validated);
        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    // Soft Delete: Menghapus riwayat pembayaran secara lunak
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->back()->with('success', 'Data pembayaran berhasil dihapus (Soft Delete).');
    }

    // Mengembalikan data pembayaran yang sudah di-Soft Delete
    public function restore($id)
    {
        $payment = Payment::withTrashed()->findOrFail($id);
        $payment->restore();

        return redirect()->back()->with('success', 'Data pembayaran berhasil dipulihkan.');
    }
}