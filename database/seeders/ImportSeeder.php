<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\Bank;
use App\Models\Template;
use App\Models\Level;
use App\Models\Ground;

// use Ramsey\Uuid\Type\Integer;

class ImportSeeder extends Seeder
{
    /**
     * Import the clients from /database/csv/n/clients.csv
     */
    private function importClients($id){
        Client::truncate();// delete all models 
        $csvData = fopen(base_path("database/csv/{$id}/clients.csv"), 'r');
        $data = fgetcsv($csvData,  null, ',');
        while ($data !== false) {
            // print_r($data);
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

    private function importBanks($id){
        Bank::truncate();// delete all models 
        $csvData = fopen(base_path("database/csv/{$id}/banks.csv"), 'r');
        $data = fgetcsv($csvData,  null, ',');
        while ($data !== false) {
            print_r($data);
            Bank::create([
                'name' => $data[0],
            ]);
            $data = fgetcsv($csvData,  null, ',');
        }
        fclose($csvData);
    }

    private function importTemplates($id){
        Template::truncate();// delete all models
        $csvData = fopen(base_path("database/csv/{$id}/templates.csv"), 'r');
        $data = fgetcsv($csvData,  null, ',');
        while ($data !== false) {
            print_r($data);
            Bank::create([
                'name' => $data[0],
            ]);
            $data = fgetcsv($csvData,  null, ',');
        }
        fclose($csvData);
    }


    // REFACTOR ME: make one universal function 
    public function run(): void
    {
        $datasetVerion = '1';
        $this->importBanks($datasetVerion);
        $this->importClients($datasetVerion);
        printf('Данные успешно импортированы');
    }
}
