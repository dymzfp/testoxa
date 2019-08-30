<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\LevelModel;
use App\BadgeModel;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = new User();
        $this->level = new LevelModel();
        $this->badge = new BadgeModel();
    }

    public function index()
    {
        try {
            \DB::beginTransaction();

            $total_checkin = $this->request->auth->detail->total_checkin;
            $user_level = $this->request->auth->detail->level;
            $user_badge = $this->request->auth->detail->badge;

            $levels = $this->level->all();
            $badges = $this->badge->all();

            $total_checkin += 1;
            foreach ($levels as $level) {
                if ($total_checkin >= $level->min_checkin) {
                    $user_level = $level;
                }
            }

            foreach ($badges as $badge) {
                if ($user_level->level >= $badge->min_level) {
                    $user_badge = $badge;
                }
            }

            $user = $this->user->find($this->request->auth->id);
            $user->detail->total_checkin = $total_checkin;
            $user->detail->level_id = $user_level->id;
            $user->detail->badge_id = $user_badge->id;
            $user->detail->save();

            \DB::commit();

            $data = $user;
            $data->detail->level = $user->detail->level;
            $data->detail->badge = $user->detail->badge;

            return $this->toSuccessJSON('Checkin success', $data);
        } catch (\Exception $e) {
            \DB::rollback();
            return $this->toErrorsJSON($e);
        }
    }
}
