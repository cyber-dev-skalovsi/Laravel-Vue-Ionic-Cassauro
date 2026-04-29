<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'completed'];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function markAsComplete(): void
    {
        $this->completed = true;
    }

    public function isComplete(): bool
    {
        return $this->completed === true;
    }
}