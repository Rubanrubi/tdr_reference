<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class DecedentRequestCreditorDraft extends Model
{
    protected $table = 'decedent_request_creditors_draft';

    protected $fillable = [
        'request_id',
        'creditor_id',
        'asset_type',
        'account_number'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Creditors()
    {
        return $this->belongsTo('App\Model\Creditor', 'creditor_id','id');
    }
}
