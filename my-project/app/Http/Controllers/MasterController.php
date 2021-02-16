<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MasterService;

class MasterController extends Controller
{
    private MasterService $service;

    public function __construct(MasterService $service)
    {
        $this->service = $service;
    }

    public function getList()
    {
        $this->service->getList();
    }
}
