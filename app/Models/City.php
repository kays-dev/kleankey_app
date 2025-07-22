<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;
use App\Models\Zone;

class City extends Model
{

    //Spécificités de l'UUID
    use HasUuids;
    protected $primaryKey = 'city_id';
    public $incrementing = false;
    protected $keyType = 'string';

    //Champs de la table à remplir
    protected $fillable = [
        'city_code',
        'city_name',
        'postcode',
        'region',
        'zone_id'
    ];


    //Comptage des villes qui ont la même région
    public static function getNextNumberInRegion(string $region): string{

        $count = self::where('region',$region)->lockForUpdate()->count();

        $nextNumber=$count + 1;

        return str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    }

    //Personalisation du code
    protected static function boot(){
        parent::boot();

        static::creating(function($city_model){
            //Génération de l'UUID
            $city_model->city_id = (string) Str::uuid();

            //Extraction des 3 premier caractères
            $city= mb_strtoupper(mb_substr($city_model->city_name, 0, 3), 'UTF-8');
            $region= mb_strtoupper(mb_substr($city_model->region, 0, 3), 'UTF-8');
            $number_in_region= $city_model->getNextNumberInRegion($city_model->region);

            //Code finalisé
            $city_model->city_code="{$city}_{$region}_{$number_in_region}";
        });

    }

    //Relation OneToMany (une ville est contenue dans un et un seul secteur)
    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','zone_id');
    }

}
