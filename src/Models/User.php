<?php

namespace Hito\Platform\Models;

use Hash;
use Hito\Admin\Enums\ContactType;
use Hito\Core\Database\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Hito\Platform\Traits\HasGroups;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use Uuid;
    use HasGroups;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'birthdate',
        'location_id',
        'timezone_id'
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
        'email_verified_at' => 'datetime',
        'is_super_admin' => 'boolean',
        'birthdate' => 'date'
    ];

    /**
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute(string $value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_members')->distinct();
    }

    /**
     * @return BelongsToMany
     */
    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function timezone(): BelongsTo
    {
        return $this->belongsTo(Timezone::class);
    }

    public function getFullNameAttribute(): string {
        return "{$this->name} {$this->surname}";
    }

    /**
     * @return string
     */
    public function getAvatarAttribute(): string
    {
        $hash = md5($this->email);
        return "https://picsum.photos/seed/{$hash}-avatar/100/100";

    }

    public function getBannerAttribute(): string
    {
        $hash = md5($this->email);
        return "https://picsum.photos/seed/{$hash}/400/200";
    }

    public function getHasBirthdayTodayAttribute(): bool
    {
        return $this->birthdate?->isToday() ?? false;
    }

    /**
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new CustomResetPassword($token));
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(UserContact::class);
    }

    public function getContact(string|ContactType $type): ?string
    {
        if (is_string($type)) {
            $type = ContactType::from($type);
        }

        $contact = $this->contacts()->where('type', $type)->first();

        $value = $contact?->value;

        if (empty($value)) {
            return null;
        }

        return $value;
    }
}
