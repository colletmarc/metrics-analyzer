<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class App extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'endpoint',
    ];

    public function metrics(): HasMany
    {
        return $this->hasMany(Metrics::class, 'application_id');
    }
}
