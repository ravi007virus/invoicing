<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'biller_id',
        'customer_id',
        'invoice_type',
        'invoice_number',
        'invoice_date',
        'due_date',
        'total_amount',
        'amount_paid',
        'amount_due',
        'status',
        'payment_details',
        'terms',
        'ledger_id',
    ];

    public function biller()
    {
        return $this->belongsTo(Biller::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function extraCharges()
    {
        return $this->hasMany(InvoiceExtraCharge::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
