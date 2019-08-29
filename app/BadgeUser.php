<?php

namespace App;

use App\User;
use App\LevelModel;
use App\BadgeModel;
use Illuminate\Database\Eloquent\Model;

class BadgeUser extends Model
{
    protected $table = 'badge_users';
    protected $fillable = [
        'user_id', 'level_id', 'badge_id', 'total_checkin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(LevelModel::class);
    }

    public function badge()
    {
        return $this->belongsTo(BadgeModel::class);
    }

}