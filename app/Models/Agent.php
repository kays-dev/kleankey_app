<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Zone;
use App\Models\Service;

class Agent extends Model
{

    //Spécificités de l'UUID
    use HasUuids;
    protected $primaryKey = 'agent_id';
    public $incrementing = false;
    protected $keyType = 'string';

    //Champs de la table à remplir
    protected $fillable = [
        'agent_name',
        'agent_surname',
        'agent_mail',
        'agent_tel',
        'agent_address',
        'zone_id'
    ];

    //Relation OneToMany (un agent est affecté à un et un seul secteur)
    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','zone_id');
    }

    //Relation OneToMany (un agent effectue au minimum une prestation et au maximum plusieurs prestations)
    public function services(){
        return $this->hasMany(Service::class,'agent_id','agent_id');
    }

    //Relation ManyToMany (un agent entretient au minimum un bien et au maximum plusieurs biens)
    public function estates(){
        return $this->belongsToMany(Estate::class,'agent_estate','estate_id','agent_id');
    }

}
