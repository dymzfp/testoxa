<?php

namespace App\Http\Controllers;

use Validator;
use App\BadgeModel;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->badge = new BadgeModel();
    }

    private function rules() 
    {
        return [
            'badge_name' => 'required',
            'min_level' => 'required'
        ];
    }

    public function index()
    {
        try {
            $row = $this->badge->all();

            if(is_null($row)) {
                $this->throwInvalidData();
            }

            return $this->toSuccessJSON('get all badges success', $row);
        } catch (\Exception $e) {
            return $this->toErrorsJSON($e);
        }
    }

    public function store()
    {
        try {
            \DB::beginTransaction();

            $this->withValidator($this->request->all(), $this->rules());

            $this->badge->badge_name = $this->request->input('badge_name');
            $this->badge->min_level = $this->request->input('min_level');
            $this->badge->save();

            \DB::commit();

            return $this->toSuccessJSON('Data Saved Successfully', $this->badge);
        } catch (\Exception $e) {
            \DB::rollback();
            return $this->toErrorsJSON($e);
        }
    }

    public function getOne($id)
    {
        try {
            $row = $this->badge->find($id);

            if(is_null($row)) {
                $this->throwInvalidData();
            }

            return $this->toSuccessJSON(null, $row);
        } catch (\Exception $e) {
            return $this->toErrorsJSON($e);
        }
    }

    public function update($id)
    {
        try {
            \DB::beginTransaction();

            $row = $this->badge->find($id);
            if(is_null($row)) {
                $this->throwInvalidData();
            }

            $row->update($this->request->input());
            
            \DB::commit();

            return $this->toSuccessJSON('Data Successfully Edited', $row);
        } catch (\Exception $e) {
            \DB::rollback();
            return $this->toErrorsJSON($e);
        }
    }

    public function delete($id)
    {
        try {
            $row = $this->badge->find($id);
            if(is_null($row)) {
                $this->throwInvalidData();
            }

            $row->delete();
        
            $data['id'] = $id;

            return $this->toSuccessJSON('Data Successfully Removed', $data);
        } catch (\Exception $e) {
            return $this->toErrorsJSON($e);
        }
    }
}
