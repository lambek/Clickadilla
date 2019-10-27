<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Indicators;
use App\Indicators as IndicatorsDB;

class IndicatorsController extends Controller
{
    public function Create(Request $request)
    {
        $Indicators = new Indicators($request->input('type'), $request->input('length'));
        return response()->json($Indicators->getResponse(), 200);
    }

    public function Show($id)
    {
        $data = IndicatorsDB::find($id);
        if ($data) {
            $arr = [
                'id' => $data->id,
                $data->metod => $data->indicator
            ];
        } else {
            $arr = ["error" => "there is no information on this id"];
        }
        return response()->json($arr, 200);
    }
}
