<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomingLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incoming_letters')->insert(
            [
                [
                
                'nomor_surat'=>'200',
                'tanggal'    =>'2006-10-10',
                'pengirim'   =>'pepew',
                'perihal'    =>'perang',
                'keterangan' =>'ajakan perang ke rusia',
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                
                'nomor_surat'=>'100',
                'tanggal'    =>'2006-11-10',
                'pengirim'   =>'pecu',
                'perihal'    =>'pembelian',
                'keterangan' =>'beli motor baru',
                'created_at' => now(),
                'updated_at'  => now()
                ],
                [
                
                'nomor_surat'=>'400',
                'tanggal'    =>'2006-1-10',
                'pengirim'   =>'peri',
                'perihal'    =>'upacara',
                'keterangan' =>'upacara bendera zimbabwe',
                'created_at' => now(),
                'updated_at'  => now()
                ]
            ]
        );
    }
}
