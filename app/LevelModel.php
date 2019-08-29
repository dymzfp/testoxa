<?php

namespace App;

use App\BadgeUser;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
	protected $table = 'levels';

    protected $fillable = [
        'level', 'min_checkin'
    ];

    public function users()
    {
        return $this->hasMany(BadgeUser::class);
    }
}
