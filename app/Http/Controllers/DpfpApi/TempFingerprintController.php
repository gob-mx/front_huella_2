<?php

namespace App\Http\Controllers\DpfpApi;

date_default_timezone_set("America/Bogota");

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\DpfpModels\TempFingerprint;

use App\Models\RegistroImplicados\HuellasTemp;

class TempFingerprintController extends Controller {

    public function store_read(Request $request) {
        HuellasTemp::where("token_pc", $request->token_pc)->delete();
        $id = strtotime("now");
        $TempFingerprint = new HuellasTemp();
        $TempFingerprint->id = $id;
        $TempFingerprint->token_pc = $request->token_pc;
        $TempFingerprint->option = "read";
        $TempFingerprint->created_at = date("Y-m-d H:i:s");
        $result = $TempFingerprint->save();
        $arrayResponse = array("code" => $result, "message" => "Ok");
        return $arrayResponse;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_enroll(Request $request) {
    \Log::debug(__METHOD__);
        HuellasTemp::where("token_pc", $request->token_pc)->delete();
        $id = strtotime("now");
        $TempFingerprint = new HuellasTemp();
        $TempFingerprint->id = $id;
        $TempFingerprint->persona_id = $request->user_id;
        $TempFingerprint->nombre_dedo = $request->finger_name;
        $TempFingerprint->token_pc = $request->token_pc;
        $TempFingerprint->option = "enroll";
        $TempFingerprint->created_at = date("Y-m-d H:i:s");
        $result = $TempFingerprint->save();
        $arrayResponse = array("code" => $result, "message" => "Ok");
        return $arrayResponse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempFingerprint  $tempFingerprint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
    \Log::debug(__METHOD__);
        $result = HuellasTemp::where("token_pc", $request->token_pc)
                ->update(["option" => "close", "imagen" => null]);
        $arrayResponse = array("code" => $result, "message" => "Ok");
        return $arrayResponse;
    }

}
