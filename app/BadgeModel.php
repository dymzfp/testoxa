<?php

namespace App;

use App\BadgeUser;
use Illuminate\Database\Eloquent\Model;

class BadgeModel extends Model
{

	protected $table = 'badges';

    protected $fillable = [
        'badge_name', 'min_level'
    ];

    public function users()
    {
        return $this->hasMany(BadgeUser::class);
    }
}
