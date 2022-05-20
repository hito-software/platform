<?php

namespace Hito\Platform\Models;

use Hito\Core\Database\Traits\Uuid;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

/**
 * App\Models\Activity
 *
 * @property string $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property string|null $event
 * @property string|null $subject_id
 * @property string|null $causer_type
 * @property string|null $causer_id
 * @property \Illuminate\Support\Collection|null $properties
 * @property string|null $batch_uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $causer
 * @property-read \Illuminate\Support\Collection $changes
 * @property-read array $new_values
 * @property-read array $old_values
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $subject
 * @method static Builder|Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static Builder|Activity forBatch(string $batchUuid)
 * @method static Builder|Activity forEvent(string $event)
 * @method static Builder|Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static Builder|Activity hasBatch()
 * @method static Builder|Activity inLog(...$logNames)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereBatchUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCauserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCauserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereLogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Activity withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
class Activity extends \Spatie\Activitylog\Models\Activity
{
    use Uuid;
    use Cachable;

    public function getNewValuesAttribute(): array
    {
        $new = [];

        if (!empty($this->properties['attributes'])) {
            $new = $this->properties['attributes'];
        }

        return $new;
    }

    public function getOldValuesAttribute(): array
    {
        $old = [];

        if (!empty($this->properties['old'])) {
            $old = $this->properties['old'];
        }

        return $old;
    }
}
