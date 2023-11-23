<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;
    public function plan()
    {
        return $this->belongsTo(PlansAndPrice::class, 'plan_id', 'id');
    }

}
