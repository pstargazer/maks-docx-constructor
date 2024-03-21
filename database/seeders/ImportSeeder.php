<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use Ramsey\Uuid\Type\Integer;

class ImportSeeder extends Seeder
{
    /**
     * Import the clients from /database/csv/n/clients.csv
     */
    public function importUsers(){
        Client::truncate();// delete all models 
        $csvData = fopen(base_path('database/csv/1/clients.csv'), 'r');
        $data = fgetcsv($csvData,  null, ',');
        while ($data !== false) {
            print_r($data);
            Client::create([
                'name_prefix' => $data[0],
                'company_name' => $data[1],
                'delegate_name' => $data[2],
                'delegate_surname' => $data[3],
                'delegate_th_name' => $data[4],
                'delegate_post' => $data[5],
                'phone' => $data[6],
                'bik' => $data[7],
                'inn' => $data[8],
                'kpp' => $data[9],
                'address' => $data[0],
                'payment_account' => $data[11],
                'correspondent_account' => $data[12],
                'bank_id' => (int)($data[13])
                // 'created_at' => $data['14']
            ]);
            $data = fgetcsv($csvData,  null, ',');
        }
        fclose($csvData);
    }

    public function import(){

    }

    public function run(): void
    {
        $this->importUsers();
        printf('Данные успешно импортированы');
    }
}
