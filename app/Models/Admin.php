<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
/** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory, Notifiable;

    // Précision du nom de l'id pour éviter tout bug ou incompréhension de Eloquent
    protected $primaryKey = 'admin_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'admin_name',
        'admin_surname',
        'admin_mail',
        'admin_pwd',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'admin_pwd',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts =  [
        'admin_pwd' => 'hashed',
    ];

    // Indique à Laravel d'utiliser admin_mail pour le login
    public function username(): string
    {
        return 'admin_mail';
    }

    // Indique à Laravel d'utiliser admin_pwd pour le champ password du modèle Auth
    public function getAuthPassword()
    {
        return $this->admin_pwd;
    }
}
