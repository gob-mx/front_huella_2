<?php

namespace App\Http\Controllers\DpfpApi;

set_time_limit(0);
date_default_timezone_set("America/Mexico_City");

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DpfpModels\TempFingerprint;
use App\Models\DpfpModels\FingerPrint;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Storage;
use App\Models\RegistroImplicados\Personas;
use App\Models\RegistroImplicados\Huellas;
use App\Models\RegistroImplicados\HuellasTemp;

class UserRestApiController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
    \Log::debug(__METHOD__);
        $key = str_replace("Basic ", "", $request->header("Authorization"));
        $api = config("services.mhdpfp.key");
        if ($api == $key) {
            $from = $request->from;
            $query = "SELECT count(*) total FROM users u INNER JOIN fingerprints f on u.id = f.user_id";
            $rs = DB::select($query);
            $count = $rs[0]->total;
            $query2 = "SELECT u.id, f.fingerprint, u.nombre as name "
                    . " FROM users u INNER JOIN fingerprints f on u.id = f.user_id "
                    . "limit " . $from . ", 10";
            $usuarios = DB::select($query2);
            $array = array("usuarios" => $usuarios, "total" => $count);
            return $array;
        } else {
            return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
                            ->header("HTTP/1.1 401", "Unauthorized");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    \Log::debug(__METHOD__.' ==> '.json_encode($request->all()));

        $key = str_replace("Basic ", "", $request->header("Authorization"));
        $api = config("services.mhdpfp.key");
        if ($api == $key) {
            $temp = HuellasTemp::where("token_pc", $request->token_pc)->first();
            $dedo = explode("_", $temp->nombre_dedo);
            $fingerprint = new Huellas();
            $fingerprint->persona_id = $temp->persona_id;
            $fingerprint->nombre_dedo = $dedo[0] . " " . $dedo[1];
            $fingerprint->ruta_imagen = $this->saveImage($request->image, $temp->nombre_dedo.$temp->persona_id);
            $fingerprint->huella_dactilar = $request->huella_dactilar;
            $fingerprint->notificada = 0;
            $response = $fingerprint->save();
            HuellasTemp::destroy($temp->id);
            $arrayResponse = array("response" => $response);
            return $arrayResponse;
//            return $temp;
        } else {
            return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
                            ->header("HTTP/1.1 401", "Unauthorized");
        }
    }

    function saveImage($image, $image_name) {
    \Log::debug(__METHOD__);
        $rutaDirectorio = public_path('/storage/image_user');
        if (!File::isDirectory($rutaDirectorio)) {
            File::makeDirectory($rutaDirectorio, 0755, true);
        }
        $image = str_replace("data:image/png;base64,", "", $image);
        $image = str_replace(" ", "+", $image);
        $imageName = $image_name . ".png"; //
//        $url = Storage::put('public/image_user', base64_decode($image));
        \File::put(public_path('/storage/image_user/' . $imageName), base64_decode($image));
        return "storage/image_user/" . $imageName;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
    \Log::debug(__METHOD__);
        $response = 0;
        $key = str_replace("Basic ", "", $request->header("Authorization"));
        $api = config("services.mhdpfp.key");
        if ($api == $key) {
            $text = $request->text;
            //Ver comentario de la linea 119
//            if ($request->user_id > 0) {
//                $text = self::saveRecord($request->user_id);
//            }
            $response = TempFingerprint::where("token_pc", $request->token_pc)
                    ->update([
                "fingerprint" => $request->fingerprint,
                "image" => $request->image,
                "user_id" => ($request->user_id > 0) ? $request->user_id : null,
//                "user_id_number" => $request->user_id_number,
                "name" => $request->name, "text" => $text
            ]);
            return array("response" => $response);
        } else {
            return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
                            ->header("HTTP/1.1 401", "Unauthorized");
        }
    }

    //Esta funcion se comenta debido a que no se implementa en este paquete 
    //el registro de entradas y salidas, pero puedes adaptarlo a tu gusto
//    public static function saveRecord($userId) {
//        $typeRecord = "";
//        $text = "";
//        $hoy = date("Y-m-d");
//        $query = "SELECT type_record FROM records_users WHERE user_id = " . $userId . " "
//                . "and date_record like '%" . $hoy . "%' order by date_record desc limit 1";
//        $rs = DB::select($query);
//        if (count($rs) > 0 && $rs[0]->type_record == "chek out") {
//            $text = "Ya registraste salida..!";
//        }
//        if (count($rs) == 0) {
//            $text = "Ingreso Regitrado..!";
//            $typeRecord = "chek in";
//        }
//        if (count($rs) == 1 && $text == "") {
//            $text = "Salida Registrada..!";
//            $typeRecord = "chek out";
//        }
//        if ($text != "Ya registraste salida..!") {
//            $record = new RecordUser();
//            $record->user_id = $userId;
//            $record->date_record = date("Y-m-d H:i:s");
//            $record->type_record = $typeRecord;
//            $record->save();
//        }
//        return $text;
//    }

    public function sincronizar(Request $request) {
    \Log::debug(__METHOD__);
        $key = str_replace("Basic ", "", $request->header("Authorization"));
        $api = config("services.mhdpfp.key");
        if ($api == $key) {
            $query = "SELECT u.id user_id, f.fingerprint, f.id finger_id,"
                    . " u.nombre as name "
                    . "FROM users u INNER JOIN fingerprints f on u.id = f.user_id "
                    . "WHERE f.id > " . $request->finger_id;
            $usuarios = DB::select($query);
            return $usuarios;
        } else {
            return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
                            ->header("HTTP/1.1 401", "Unauthorized");
        }
    }

    public function verify_users() {
    \Log::debug(__METHOD__);
        return view("dpfp_views.verify-users");
    }

    public function users_list() {
    \Log::debug(__METHOD__);
        $users = User::where('implicado',1)->paginate(10);
        return view("dpfp_views.index", compact("users"));
    }

    // public function fingerList(User $user) {
    //     $finger_list = $user->fingerprints;
    //     return view("dpfp_views.finger-list", compact("user", "finger_list"));
    // }

    public function fingerList(Personas $persona) {
    \Log::debug(__METHOD__);
        $finger_list = $persona->huellas;
        // dd($persona,$finger_list);
        return view("dpfp_views.finger-list", compact("persona", "finger_list"));
    }

    // public function get_finger(User $user) {
    //     $response = FingerPrint::where("notified", 0)->where("user_id", $user->id)->get();
    //     if (count($response) > 0) {
    //         FingerPrint::where("id", $response[0]->id)->update(["notified" => 1]);
    //     }
    //     return $response;
    // }

    public function get_finger(Personas $persona) {
    // \Log::debug(__METHOD__);
        $response = Huellas::where("notificada", 0)->where("persona_id", $persona->id)->get();
        if (count($response) > 0) {
            Huellas::where("id", $response[0]->id)->update(["notificada" => 1]);
        }
        return $response;
    }

}
