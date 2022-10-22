<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    use HashidTrait;

    protected $fillable = [
        'hashid',
        'created_by',
        'branch_name',
        'address',
        'phone_number',
    ];
}
