<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Drug extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'ingredients', 'dose', 'how_to_use', 'price','types','picturePath', 'manufacture'
    ];

    public function getCreatedAtAttribute($value)

    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->getCreatedAtAttribute;  // sama saja seperti code getCreatedAtAttribute
    }

    public function toArray()    // untuk penamaan tidak menggunakan _ 
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }
    
    public function getPicturePathAttribute(){

        return url('') . Storage::url($this->attributes['picturePath']);
    }
}
