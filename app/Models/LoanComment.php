<?php

namespace App\Models;

use App\Traits\HashidTrait;
use App\Traits\UserActionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanComment extends Model
{
    use HasFactory;

    use HashidTrait;
    use UserActionTrait;


    protected $fillable = [
        'hashid',
        'created_by',
        'loan_id',
        'comment',
    ];

    /**
     * Get the loan that owns the LoanComment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

    /**
     * Get the user that owns the LoanComment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commentedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
