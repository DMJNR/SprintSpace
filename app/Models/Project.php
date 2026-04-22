<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
class Project extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'start_date',
        'end_date',
        'short_description',
        'phase',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the user that owns the project.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
