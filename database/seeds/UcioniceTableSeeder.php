<?php

use Illuminate\Database\Seeder;
use App\Ucionica;
use App\Zgrada;
class UcioniceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ucionica::create(['broj'=>'156','vrsta'=>'računalna učionica','zgrada_id'=>'1']);
        Ucionica::create(['broj'=>'154','vrsta'=>'računalna učionica','zgrada_id'=>'2']);
        Ucionica::create(['broj'=>'11','vrsta'=>'računalna učionica','zgrada_id'=>'3']);
        Ucionica::create(['broj'=>'123','vrsta'=>'računalna učionica','zgrada_id'=>'5']);
    }
}
