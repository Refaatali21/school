<?php

namespace Database\Seeders;

use App\Models\bloodtype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bloodseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloodtypes')->delete();
        $bloods = ['O-' , 'O+' , 'A-' , 'A+' , 'B-' , 'B+' , 'AB-' , 'AB+'];

        foreach ($bloods as $blood) {
            bloodtype::create(['name' => $blood]);
        }
    }
}
