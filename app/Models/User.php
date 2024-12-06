<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'banned_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isNotBanned(): bool
    {
        return $this->banned_at === null;
    }

    protected function uploadAvatar($avatarSource)
    {
        if (!$avatarSource) {
            return null;
        }

        $extension = $this->getImageExtension($avatarSource);
        if (!$extension) {
            return null;
        }

        $profilePictureName = Str::random();
        $fullProfilePictureName = "{$profilePictureName}.{$extension}";

        if (is_string($avatarSource)) {
            $imageContents = file_get_contents($avatarSource);
            Storage::disk('public')->put("users/img/{$fullProfilePictureName}", $imageContents);
        } else {
            $avatarSource->storeAs('users/img/', $fullProfilePictureName, 'public');
        }

        $this->update(['avatar' => $fullProfilePictureName]);
    }
}
