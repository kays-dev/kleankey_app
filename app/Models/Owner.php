<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Str;
use App\Models\Estate;

class Owner extends Model
{

    //Spécificités de l'UUID
    use HasUuids;
    protected $primaryKey = 'owner_id';
    public $incrementing = false;
    protected $keyType = 'string';

    //Champs de la table à remplir
    protected $fillable = [
        'owner_name',
        'owner_surname',
        'owner_mail',
        'owner_tel',
        'owner_address',
    ];

    //Relation OneToMany (un propriétaire détient au minimum un bien et au maximum plusieurs biens)
    public function estates(){
        return $this->hasMany(Estate::class,'owner_id','owner_id');
    }
}
