<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;
    

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'role',
        'bio',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'email_verified_at' => 'timestamp',
        ];
    }
    // Wajib untuk Filament 5: Tentukan siapa yang boleh akses admin panel
    public function canAccessPanel(Panel $panel): bool
    {
        // Hanya role 'admin' dan 'editor' yang bisa masuk ke panel Filament
        return in_array($this->role, ['admin', 'editor']);
    }

}
