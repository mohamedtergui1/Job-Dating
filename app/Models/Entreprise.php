<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entreprise extends Model
{  
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name'
        ,
        'contact'
        ,
        'location'
    ];
   
   

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($entreprise) {
            $entreprise->annonces()->delete();
        });
    }
    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }
    
    
}
