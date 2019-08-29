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
        $this->level = new LevelModel();
    }

    public function index()
    {
        return $this->request->auth->detail;
    }
}
