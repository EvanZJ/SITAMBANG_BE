<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AlatTambak;
use App\Models\berisi;
use App\Models\bertanggungjawab;
use App\Models\Karyawan;
use App\Models\Pemesanan;
use App\Models\Riwayat;
use App\Models\Stock;
use App\Models\User;
use Carbon\Factory;
use Database\Factories\BerisiFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        User::factory(0)->unverified()->create();
        Karyawan::factory(10)->create();
        Karyawan::factory(3)->admin()->create();
        AlatTambak::factory(5)->create();
        Stock::factory(3)->create();
        // Pemesanan::factory(1000)->create();
        // while(berisi::count() < 500){
        //     try{
        //         berisi::factory(1)->create();
        //     }catch (\Illuminate\Database\QueryException $e){
        //         continue;
        //     }
        // }
        bertanggungjawab::factory(5)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
