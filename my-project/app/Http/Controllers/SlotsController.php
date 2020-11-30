<?php

namespace App\Http\Controllers;

use App\Services\SlotsService;
use Illuminate\Http\Request;

class SlotsController extends Controller
{
    private SlotsService $service;

    public function __construct(SlotsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->load();
    }

    public function create(Request $request)
    {
        return $this->service->create($request);
    }

    public function edit(Request $request)
    {
        return $this->service->edit($request);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $deleted = $this->service->delete($id);
        
        if(!$deleted) {
            return 0;
        }

        return 1;
    }
}