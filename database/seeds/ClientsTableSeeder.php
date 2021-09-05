<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = ['Mohamed', 'Hamdy'];

        foreach ($clients as $client) {

            \App\Client::create([
               'name' => $client,
               'phone' => '01226497712',
               'address' => 'Cairo',
            ]);

        }//end of foreach
    }// end of run
}
