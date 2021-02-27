<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinsis')->insert([
            ['id' => 1,'kode_provinsi' => 101,'nama_provinsi' => 'ACEH'],
            ['id' => 2,'kode_provinsi' => 102,'nama_provinsi' => 'SUMATRA UTARA'],
            ['id' => 3,'kode_provinsi' => 103,'nama_provinsi' => 'SUMATRA BARAT'],
            ['id' => 4,'kode_provinsi' => 104,'nama_provinsi' => 'RIAU'],
            ['id' => 5,'kode_provinsi' => 105,'nama_provinsi' => 'KEPULAUAN RIAU'],
            ['id' => 6,'kode_provinsi' => 106,'nama_provinsi' => 'JAMBI'],
            ['id' => 7,'kode_provinsi' => 107,'nama_provinsi' => 'BENGKULU'],
            ['id' => 8,'kode_provinsi' => 108,'nama_provinsi' => 'SUMATRA SELATAN'],
            ['id' => 9,'kode_provinsi' => 109,'nama_provinsi' => 'KEPULAUAN BANGKA BELITUNG'],
            ['id' => 10,'kode_provinsi' => 110,'nama_provinsi' => 'LAMPUNG'],
            ['id' => 11,'kode_provinsi' => 111,'nama_provinsi' => 'BANTEN'],
            ['id' => 12,'kode_provinsi' => 112,'nama_provinsi' => 'JAWA BARAT'],
            ['id' => 13,'kode_provinsi' => 113,'nama_provinsi' => 'JAKARTA'],
            ['id' => 14,'kode_provinsi' => 114,'nama_provinsi' => 'JAWA TENGAH'],
            ['id' => 15,'kode_provinsi' => 115,'nama_provinsi' => 'YOGYAKARTA'],
            ['id' => 16,'kode_provinsi' => 116,'nama_provinsi' => 'JAWA TIMUR'],
            ['id' => 17,'kode_provinsi' => 117,'nama_provinsi' => 'BALI'],
            ['id' => 18,'kode_provinsi' => 118,'nama_provinsi' => 'NTB'],
            ['id' => 19,'kode_provinsi' => 119,'nama_provinsi' => 'NTT'],
            ['id' => 20,'kode_provinsi' => 120,'nama_provinsi' => 'KALIMANTAN BARAT'],
            ['id' => 21,'kode_provinsi' => 121,'nama_provinsi' => 'KALIMANTAN SELATAN'],
            ['id' => 22,'kode_provinsi' => 122,'nama_provinsi' => 'KALIMANTAN TENGAH'],
            ['id' => 23,'kode_provinsi' => 123,'nama_provinsi' => 'KALIMANTAN TIMUR'],
            ['id' => 24,'kode_provinsi' => 124,'nama_provinsi' => 'KALIMANTAN UTARA'],
            ['id' => 25,'kode_provinsi' => 125,'nama_provinsi' => 'GORONTALO'],
            ['id' => 26,'kode_provinsi' => 126,'nama_provinsi' => 'SULAWESI BARAT'],
            ['id' => 27,'kode_provinsi' => 127,'nama_provinsi' => 'SULAWESI SELATAN'],
            ['id' => 28,'kode_provinsi' => 128,'nama_provinsi' => 'SULAWESI TENGAH'],
            ['id' => 29,'kode_provinsi' => 129,'nama_provinsi' => 'SULAWESI TENGGARA'],
            ['id' => 30,'kode_provinsi' => 1230,'nama_provinsi' => 'SULAWESI UTARA'],
            ['id' => 31,'kode_provinsi' => 131,'nama_provinsi' => 'MALUKU'],
            ['id' => 32,'kode_provinsi' => 132,'nama_provinsi' => 'MALUKU UTARA'],
            ['id' => 33,'kode_provinsi' => 133,'nama_provinsi' => 'PAPUA BARAT'],
            ['id' => 34,'kode_provinsi' => 134,'nama_provinsi' => 'PAPUA'],
        ]);
        // \App\Models\User::factory(10)->create();
    }
}

    
