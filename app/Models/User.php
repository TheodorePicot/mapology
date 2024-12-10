<?php

namespace App\Models;

use App\Traits\PictureSource;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, PictureSource;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
        'description',
        'google_oauth_id',
        'github_oauth_id'
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

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value) {
                    return Storage::disk('public')->exists('users/img/'.$value)
                        ? Storage::disk('public')->url('users/img/'.$value)
                        : asset('images/default-avatar.webp');
                }
                return asset('images/default-avatar.webp');
            },
        );
    }

    public function isNotBanned(): bool
    {
        return $this->banned_at === null;
    }

    public function uploadAvatar($avatarSource)
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
