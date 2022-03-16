<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'applications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'one_signal_account_id',
        'onesignal_app',
        'rest_api_key',
        'name',
        'active_user',
        'enabled',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function one_signal_account()
    {
        return $this->belongsTo(OneSignalAccount::class, 'one_signal_account_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
