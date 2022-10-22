<?php

namespace App\Models;

use App\Traits\HashidTrait;
use App\Traits\UserActionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanCollateralType extends Model
{
    use HasFactory;
    use HashidTrait;
    use UserActionTrait;

    protected $fillable = [
        'hashid',
        'created_by',
        'type',
    ];
}
