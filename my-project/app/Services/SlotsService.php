<?php

namespace App\Services;

use App\Models\Slots;
use Illuminate\Http\Request;

class SlotsService
{
    /**
     * load list data
     * 
     * 
     */
    public function load()
    {
        return Slots::all();
    }

    /**
     * add a new element
     * 
     * 
     */
    public function create(Request $request)
    {
        $save = new Slots();
        $save->element = $request->input('element');
        $save->status = $request->input('status');
        $save->save();

        return $save->id;
    }

    /**
     * edit a selected element
     * 
     * 
     */
    public function edit(Request $request)
    {
        $update = Slots::find($request->input('id'));
        if(is_null($update)) {
            return false;
        }

        $update->exists = true;
        $update->element = $request->input('element');
        $update->status = $request->input('status');
        $update->save();
    }

    /**
     * delete a selected element
     * 
     * 
     */
    public function delete(int $id)
    {
        $delete = Slots::find($id);

        if(is_null($delete)) {
            return false;
        }

        $deleted = $delete->delete();
        if(!$deleted) {
            return false;
        }
        return true;
    }

    public function runRoulette()
    {
        return Slots::where('status', 'enable')
                    ->inRandomOrder()
                    ->first();
    }
}