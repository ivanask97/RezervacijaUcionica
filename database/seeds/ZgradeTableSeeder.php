<?php

use Illuminate\Database\Seeder;
use App\Zgrada;
class ZgradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zgrada::create(['mjesto'=>'APTF','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Akademija likovnih umjetnosti','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Ekonomski fakultet','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'FPMOZ','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'FSR','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Fakultet zdravstvenih studija','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Farmaceutski fakultet','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Filozofski fakultet','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Građevinski fakultet','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Medicinski fakultet','adresa'=>'Mostar']);
        Zgrada::create(['mjesto'=>'Pravni fakultet','adresa'=>'Mostar']);
    }
}
