<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'token',
        "avatar"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified' => "boolean",
    ];

    public function products() {
        return $this->hasMany(Product::class, "author_id", "id");
    }

    public function addresses() {
        return $this->hasMany(Address::class, "user_id", "id");
    }


    // Outro recurso “mágico” do laravel é o Mutator, que permite alterar o valor de alguma propriedade antes de entrar no banco de dados, quanto alterar no momento de retornar o valor.
    public function setPasswordAtribute($value) {
        $this->attributes["password"] = Hash::make($value);
    }


    public function verifyPassword($password): bool {
        // 'getAuthPassword' => Retorna a senha do usuario no Banco de Dados
        return Hash::check($password, $this->getAuthPassword());
    }

    
}
