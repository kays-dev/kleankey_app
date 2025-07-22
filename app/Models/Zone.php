<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\City;

class Zone extends Model
{
    //Spécificités de l'UUID
    use HasUuids;
    protected $primaryKey = 'zone_id';
    public $incrementing = false;
    protected $keyType = 'string';

    //Champs de la table à remplir
    protected $fillable = [
        'zone_name',
    ];

    //Relation OneToMany (une zone contient au minimum une ville et au maximum plusieurs villes)
    public function cities(){
        return $this->hasMany(City::class,'zone_id','zone_id');
    }

    //Relation OneToMany (une zone contient au minimum un bien et au maximum plusieurs biens)
    public function estates(){
        return $this->hasMany(Estate::class,'zone_id','zone_id');
    }

    //Relation OneToMany (une zone est affecté à au minimum un agent et au maximum plusieurs agents)
    public function agents(){
        return $this->hasMany(Agent::class,'zone_id','zone_id');
    }
}
