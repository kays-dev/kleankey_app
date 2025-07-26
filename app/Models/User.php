<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // Précision du nom de l'id pour éviter tout bug ou incompréhension de Eloquent
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_name',
        'user_surname',
        'user_mail',
        'user_pwd',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'user_pwd',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts =  [
        //Récupération de l'énum
        'role' => Role::class,
        'email_verified_at' => 'datetime',
    ];

    // Indique à Laravel d'utiliser user_mail pour le login
    public function username(): string
    {
        return 'user_mail';
    }
    // Indique à Laravel d'utiliser user_mail pour le login
    public function getAuthIdentifierName()
    {
                return 'user_mail';
    }

    // Indique à Laravel d'utiliser user_pwd pour le champ password du modèle Auth
    public function getAuthPassword()
    {
        return $this->user_pwd;
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->user_mail;
    }

    //Relation OneToOne (un utilisateur est lié à un et un seul propriétaire)
    public function owner()
    {
        return $this->hasOne(Owner::class, 'user_id', 'user_id');
    }

    //Relation OneToOne (un utilisateur est associé à un et un seul agent d'entretien)
    public function agent()
    {
        return $this->hasOne(Agent::class, 'user_id', 'user_id');
    }
}
