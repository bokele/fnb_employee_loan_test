<?php

namespace App\Models;

use App\Traits\HashidTrait;
use App\Helpers\FormatedNumber;
use App\Traits\UserActionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;
    use HashidTrait;
    // use UserActionTrait;



    protected $fillable = [
        'created_by', 'loan_type_id', 'loan_reference_number', 'loan_status',
        'requested_date', 'next_date', 'principal', 'interest_rate',
        'loan_interest',  'loan_total_amount', 'loan_balance_amount',
        'loan_duration', 'loan_duration_type',
        'description', 'hashid',


    ];

    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function loanInterest(): Attribute
    {
        $format = new FormatedNumber();

        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }


    protected function principal(): Attribute
    {

        $format = new FormatedNumber();
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }
    protected function loanTotalAmount(): Attribute
    {

        $format = new FormatedNumber();
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }
    protected function loanBalanceAmount(): Attribute
    {


        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }
    public function disbursedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'disbursed_by', 'id');
    }
    public function verifiedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by', 'id');
    }
    public function loanType(): BelongsTo
    {
        return $this->belongsTo(LoanType::class, 'loan_type_id', 'id');
    }

    /**
     * Get all of the comments for the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanComments(): HasMany
    {
        return $this->hasMany(LoanComment::class);
    }
}
