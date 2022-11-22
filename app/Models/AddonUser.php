<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AddonUser extends Pivot
{
    protected $casts = [
        'expired_at' => 'datetime',
        'paid'       => 'boolean',
    ];

    public function isExpired()
    {
        if (is_null($this->paused_at)) {
            return false;
        }
        elseif($this->expired_at->isPast()) {
            return true;
        }

        return false;
    }

    public function timeLeft()
    {
        if (is_null($this->expired_at)) {
            return '-';
        }

        $date = $this->paused_at;

        if (is_null($this->paused_at)) {
            $date = Carbon::now();
        }

        return $this->isExpired() ? 0 : $this->expired_at->diffForHumans($date);
    }

    public function status()
    {
        if (!$this->paid) {
            return 'Pending';
        }
        elseif ($this->isExpired()) {
            return 'Expired';
        }
        elseif (!is_null($this->paused_at)) {
            return 'Paused';
        }
        else {
            return 'Active';
        }
    }

    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }
}
