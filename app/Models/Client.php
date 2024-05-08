<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
        // name_prefix	company_name	delegate_name	delegate_surname	delegate_th_name	delegate_post	phone	bik	inn	kpp	address	payment_account	correspondent_account	bank_id	created_at	updated_at	
    protected $guarded = [
        // "created_at", 
        "updated_at"
    ];   
}
