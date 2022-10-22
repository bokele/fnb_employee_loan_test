<?php

namespace App\Models;

use App\Traits\HashidTrait;
use App\Traits\UserActionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanType extends Model
{
    use HasFactory;
    use HashidTrait;
    use UserActionTrait;

    protected $fillable = [
        'hashid',
        'created_by',
        'type',
        'rate',
    ];

    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function rate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }
}
