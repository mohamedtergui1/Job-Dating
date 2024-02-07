<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Annonce extends Model
{   
    use SoftDeletes;
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
    
    public function skills()
    {
        return $this->belongsToMany(Skill::class,"annonce_skill");
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
