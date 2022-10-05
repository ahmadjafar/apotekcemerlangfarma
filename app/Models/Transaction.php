<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Drug;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable= [
        'drug_id', 'user_id', 'quantity', 'total', 'status', 'payment_url'
    ];

    public function drug()
    {
        return $this->hasOne(Drug::class, 'id', 'drug_id');  // mengambil foregain key dari sebuah class yang di tuju
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
        
    public function getCreatedAtAttribute($value)

    {
        return Carbon::parse($value)->timestamp;  // untuk format jam
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->getCreatedAtAttribute;  // sama saja seperti code getCreatedAtAttribute
    }
}
