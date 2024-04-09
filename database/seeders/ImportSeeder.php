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
        print_r($data);
        while ($data !== false) {
            // print_r($$);
            Client::create([
                'id' => (int)($data[0]),
                'name_prefix' => $data[1],
                // 'name_prefix_unabridged' => $data[2],
                'company_name' => $data[2],
                'delegate_name' => $data[3],
                'delegate_surname' => $data[4],
                'delegate_th_name' => $data[5],
                'delegate_post' => $data[6],
                'phone' => $data[7],
                'bik' => $data[8],
                'inn' => $data[9],
                'kpp' => $data[10],
                'address' => $data[11],
                'payment_account' => $data[12],
                'correspondent_account' => $data[13],
                'bank_id' => (int)($data[14])
            ]);
            // if ($data[0] = 'id') {
                $data = fgetcsv($csvData,  null, ',');
                // continue;
            // }
            Client::save();
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
