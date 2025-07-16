<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Agent;
use App\Enums\ServiceType;

class Service extends Model
{
    //Spécificités de l'UUID
    use HasUuids;
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';

    //Champs de la table à remplir
    protected $fillable = [
        'service_type',
        'service_name',
        'description',
        'duration',
        'agent_id',
    ];

    //Récupération de l'énum
    protected $casts = [
        'service_type'=> ServiceType::class,
    ];

    //Relation OneToMany (une prestation est effectué par un et un seul agent)
    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id','agent_id');
    }

    //Relation ManyToMany (une prestation s'applique à au minimum un bien et au maximum plusieurs biens)
    public function estates(){
        return $this->belongsToMany(Estate::class,'estate_service','service_id','estate_id');
    }
}
