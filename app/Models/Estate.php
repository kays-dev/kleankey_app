<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Owner;
use App\Enums\EstateType;

class Estate extends Model
{

    //Spécificités de l'UUID
    use HasUuids;
    protected $primaryKey = 'estate_id';
    public $incrementing = false;
    protected $keyType = 'string';

    //Champs de la table à remplir
    protected $fillable = [
        'estate_code',
        'estate_address',
        'estate_type',
        'rooms_number',
        'surface_m2'
    ];

    //Récupération de l'énum
    protected $casts = [
        'estate_type'=> EstateType::class,
    ];

    //Comptage des villes qui ont la même région
    public static function getNextNumberInOwner(string $owner): string{

        if(!$owner){
            return "001";
        }

        $count = self::where('owner_id', $owner)->lockForUpdate()->count();

        $nextNumber=$count + 1;

        return str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    }

    //Personalisation du code
    protected static function boot(){
        parent::boot();

        static::creating(function($estate_model){
            //Trouver UUID correspondant dans la table owner par la relation
            $owner = $estate_model->owner;
            $zone = $estate_model->zone;

            //Extraction des 3 premier caractères
            if($owner){

                $name_in_zone= strtoupper(substr($zone->zone_name, 0, 3));
                $name= strtoupper(substr($owner->owner_name, 0, 3));
                $surname= strtoupper(substr($owner->owner_surname, 0, 3));
                $number_in_owner= $estate_model->getNextNumberInOwner($owner);

                //Code finalisé
                $estate_model->estate_code="{$name_in_zone}_{$name}_{$surname}_{$number_in_owner}";

            }
        });

    }

    //Relation OneToMany (une bien appartient à un et un seul propriétaire)
    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id','owner_id');
    }

    //Relation OneToMany (une bien est situé dans un et un seul secteur)
    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','zone_id');
    }
}
