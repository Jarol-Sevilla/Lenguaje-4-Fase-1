<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\contacto;

class ContactoSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        contacto::factory(400)->create();
    }
}
