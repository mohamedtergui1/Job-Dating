<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'entreprise_id',
        'image'
    ];
    
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    

}
