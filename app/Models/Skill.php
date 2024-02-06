<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Skill extends Model
{   
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name' 
    ];
    public function annonces()
    {
        return $this->belongsTo(Annonce::class,'annonce_skill');
    }

        public function users()
    {
        return $this->belongsToMany(User::class,'user_skill');
    }
    


}
