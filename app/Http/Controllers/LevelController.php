<?php

namespace App\Http\Controllers;

use Validator;
use App\LevelModel;
use Illuminate\Http\Request;

class LevelController extends Controller
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

    private function rules() 
    {
        return [
            'level' => 'required',
            'min_checkin' => 'required'
        ];
    }

    public function index()
    {
        try {
            $row = $this->level->all();

            if(is_null($row)) {
                $this->throwInvalidData();
            }

            return $this->toSuccessJSON('get all levels success', $row);
        } catch (\Exception $e) {
            return $this->toErrorsJSON($e);
        }
    }

    public function store()
    {
        try {
            \DB::beginTransaction();

            $this->withValidator($this->request->all(), $this->rules());

            $this->level->level = $this->request->input('level');
            $this->level->min_checkin = $this->request->input('min_checkin');
            $this->level->save();

            \DB::commit();

            return $this->toSuccessJSON('Data Berhasil Disimpan', $this->level);
        } catch (\Exception $e) {
            \DB::rollback();
            return $this->toErrorsJSON($e);
        }
    }

    public function getOne($id)
    {
        try {
            $row = $this->level->find($id);

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

            $row = $this->level->find($id);
            if(is_null($row)) {
                $this->throwInvalidData();
            }

            $row->update($this->request->input());
            
            \DB::commit();

            return $this->toSuccessJSON('Data Berhasil Diedit', $row);
        } catch (\Exception $e) {
            \DB::rollback();
            return $this->toErrorsJSON($e);
        }
    }

    public function delete($id)
    {
        try {
            $row = $this->level->find($id);
            if(is_null($row)) {
                $this->throwInvalidData();
            }

            $row->delete();
        
            $data['id'] = $id;

            return $this->toSuccessJSON('Data Berhasil Dihapus', $data);
        } catch (\Exception $e) {
            return $this->toErrorsJSON($e);
        }
    }
}
