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

    protected $fillable = [
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

    public function getCreatedAtAttribute($created_at)

    {
        return Carbon::parse($created_at)
            // ->format('d-m-y')
            ->getPreciseTimestamp(3);

    
    }
    
    protected $casts = [
        'create_at' =>'datetime:Y-m-d',
    ];
         

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::parse($updated_at)
            ->getPreciseTimestamp(3);  // sama saja seperti code getCreatedAtAttribute
    }
    
}
