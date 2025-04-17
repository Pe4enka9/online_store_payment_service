<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $payment_id
 */
class Payment extends Model
{
    protected $guarded = ['id'];
}
