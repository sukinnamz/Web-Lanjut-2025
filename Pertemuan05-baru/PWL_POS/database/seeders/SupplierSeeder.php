<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'supplier_kode' => 'S101',
                'supplier_nama' => 'PT. Alam Segar Nusantara',
                'supplier_alamat' => 'Jl. Sudirman No. 12, Yogyakarta',
                'supplier_telepon' => '081245678901',
            ],
            [
                'supplier_kode' => 'S102',
                'supplier_nama' => 'CV. Maju Jaya Bersama',
                'supplier_alamat' => 'Jl. Melati Indah No. 33, Surabaya',
                'supplier_telepon' => '082134567892',
            ],
            [
                'supplier_kode' => 'S103',
                'supplier_nama' => 'UD. Sinar Harapan',
                'supplier_alamat' => 'Jl. Diponegoro No. 5, Semarang',
                'supplier_telepon' => '083145678903',
            ],
            [
                'supplier_kode' => 'S104',
                'supplier_nama' => 'PT. Sejahtera Mandiri',
                'supplier_alamat' => 'Jl. Kenanga No. 25, Medan',
                'supplier_telepon' => '084156789014',
            ],
            [
                'supplier_kode' => 'S105',
                'supplier_nama' => 'CV. Berkah Abadi',
                'supplier_alamat' => 'Jl. Mawar No. 78, Palembang',
                'supplier_telepon' => '085167890125',
            ],
        ];

        DB::table('m_supplier')->insert($suppliers);
    }
}
