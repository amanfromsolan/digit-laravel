<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialLogin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "provider",
        "provider_id",
        "provider_token",
        "provider_data",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "provider_data" => "array",
    ];

    /**
     * Get the user that owns this social login.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
