<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenjualanModel;
use App\Models\PenjualanDetailModel;
use App\Models\BarangModel;
use App\Models\StokModel;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Breadcrumb dan menu aktif
        $breadcrumb = (object) [
            'title' => 'Welcome',
            'list' => ['Home', 'Welcome']
        ];
        $activeMenu = 'dashboard';

        // Grafik Penjualan per Tanggal (7 hari terakhir)
        $penjualanPerTanggal = PenjualanModel::selectRaw('DATE(penjualan_tanggal) as tanggal, COUNT(*) as total')
            ->groupBy('tanggal')
            ->orderByDesc('tanggal')
            ->limit(7)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'tanggal' => (string) $item->tanggal, // pastikan string
                    'total' => $item->total,
                ];
            });

        // Grafik Sisa Stok Barang
        $stokBarang = StokModel::with('barang')->get()->map(function ($item) {
            return (object) [
                'barang_nama' => $item->barang->barang_nama,
                'barang_stok' => $item->stok_jumlah,
            ];
        });
        // Grafik Top 5 Barang Terjual
        $topBarang = PenjualanDetailModel::select('barang_id', DB::raw('SUM(jumlah) as total'))
            ->groupBy('barang_id')
            ->with('barang')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'user' => $user,
            'penjualanPerTanggal' => $penjualanPerTanggal,
            'stokBarang' => $stokBarang,
            'topBarang' => $topBarang
        ]);
    }
}