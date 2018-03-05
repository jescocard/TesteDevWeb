<?php

use Illuminate\Database\Seeder;

class TarefasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas')->insert([
            'nome' => 'Fatto',
            'custo' => 100,
            'datalimite' => '2018-03-06',
            'ordem' => '1'
        ]);
    }
}
