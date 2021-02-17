<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Classification;

class MasterService
{
    public function getList()
    {
        return Classification::from('classifications')
                    ->get();
    }
}