<?php

namespace LaravelLiberu\Core\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Rememberable\Traits\Rememberable;

class Preference extends Model
{
    use Rememberable;

    protected array $rememberableKeys = ['id', 'user_id'];

    protected $guarded = ['id'];

    protected $casts = ['value' => 'object'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
