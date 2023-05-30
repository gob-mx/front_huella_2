<?php

namespace App\Http\Controllers\Registro;

set_time_limit(0);
date_default_timezone_set("America/Mexico_City");

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\RegistroImplicados\Personas;

// use App\Models\DpfpModels\TempFingerprint;
// use App\Models\DpfpModels\FingerPrint;

class PersonaRestApiController extends Controller {

	// public function index(Request $request) {
	// 	$key = str_replace("Basic ", "", $request->header("Authorization"));
	// 	$api = config("services.mhdpfp.key");
	// 	if ($api == $key) {
	// 		$from = $request->from;
	// 		$query = "SELECT count(*) total FROM users u INNER JOIN fingerprints f on u.id = f.user_id";
	// 		$rs = DB::select($query);
	// 		$count = $rs[0]->total;
	// 		$query2 = "SELECT u.id, f.fingerprint, u.nombre as name "
	// 				. " FROM users u INNER JOIN fingerprints f on u.id = f.user_id "
	// 				. "limit " . $from . ", 10";
	// 		$usuarios = DB::select($query2);
	// 		$array = array("usuarios" => $usuarios, "total" => $count);
	// 		return $array;
	// 	} else {
	// 		return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
	// 						->header("HTTP/1.1 401", "Unauthorized");
	// 	}
	// }

	// public function store(Request $request) {

	// 	$key = str_replace("Basic ", "", $request->header("Authorization"));
	// 	$api = config("services.mhdpfp.key");
	// 	if ($api == $key) {
	// 		$temp = TempFingerprint::where("token_pc", $request->token_pc)->first();
	// 		$dedo = explode("_", $temp->finger_name);
	// 		$fingerprint = new FingerPrint();
	// 		$fingerprint->user_id = $temp->user_id;
	// 		$fingerprint->finger_name = $dedo[0] . " " . $dedo[1];
	// 		$fingerprint->image = $this->saveImage($request->image, $temp->finger_name.$temp->user_id);
	// 		$fingerprint->fingerprint = $request->fingerprint;
	// 		$fingerprint->notified = 0;
	// 		$response = $fingerprint->save();
	// 		TempFingerprint::destroy($temp->id);
	// 		$arrayResponse = array("response" => $response);
	// 		return $arrayResponse;
	// 		// return $temp;
	// 	} else {
	// 		return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
	// 						->header("HTTP/1.1 401", "Unauthorized");
	// 	}
	// }

	// function saveImage($image, $image_name) {
	// 	$rutaDirectorio = public_path('/storage/image_user');
	// 	if (!File::isDirectory($rutaDirectorio)) {
	// 		File::makeDirectory($rutaDirectorio, 0755, true);
	// 	}
	// 	$image = str_replace("data:image/png;base64,", "", $image);
	// 	$image = str_replace(" ", "+", $image);
	// 	$imageName = $image_name . ".png"; //
	// 	// $url = Storage::put('public/image_user', base64_decode($image));
	// 	\File::put(public_path('/storage/image_user/' . $imageName), base64_decode($image));
	// 	return "storage/image_user/" . $imageName;
	// }

	// public function update(Request $request) {
	// 	$response = 0;
	// 	$key = str_replace("Basic ", "", $request->header("Authorization"));
	// 	$api = config("services.mhdpfp.key");
	// 	if ($api == $key) {
	// 		$text = $request->text;
	// 		// Ver comentario de la linea 119
	// 		// if ($request->user_id > 0) {
	// 		// 	$text = self::saveRecord($request->user_id);
	// 		// }
	// 		$response = TempFingerprint::where("token_pc", $request->token_pc)
	// 				->update([
	// 			"fingerprint" => $request->fingerprint,
	// 			"image" => $request->image,
	// 			"user_id" => ($request->user_id > 0) ? $request->user_id : null,
	// 			// "user_id_number" => $request->user_id_number,
	// 			"name" => $request->name, "text" => $text
	// 		]);
	// 		return array("response" => $response);
	// 	} else {
	// 		return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
	// 						->header("HTTP/1.1 401", "Unauthorized");
	// 	}
	// }

	// public function sincronizar(Request $request) {
	// 	$key = str_replace("Basic ", "", $request->header("Authorization"));
	// 	$api = config("services.mhdpfp.key");
	// 	if ($api == $key) {
	// 		$query = "SELECT u.id user_id, f.fingerprint, f.id finger_id,"
	// 				. " u.nombre as name "
	// 				. "FROM users u INNER JOIN fingerprints f on u.id = f.user_id "
	// 				. "WHERE f.id > " . $request->finger_id;
	// 		$usuarios = DB::select($query);
	// 		return $usuarios;
	// 	} else {
	// 		return response(array("status" => "No tienes permisos para acceder a este recurso"), 401)
	// 						->header("HTTP/1.1 401", "Unauthorized");
	// 	}
	// }

	// public function verify_users() {
	// 	return view("dpfp_views.verify-users");
	// }

	// public function users_list() {
	// 	$users = User::paginate(10);
	// 	return view("dpfp_views.index", compact("users"));
	// }

	public function desdos_list(Personas $persona) {

		dd('$persona','desdos_list');
		// $finger_list = $user->fingerprints;
		// return view("dpfp_views.finger-list", compact("user", "finger_list"));
	}

	// public function get_finger(User $user) {
	// 	$response = FingerPrint::where("notified", 0)->where("user_id", $user->id)->get();
	// 	if (count($response) > 0) {
	// 		FingerPrint::where("id", $response[0]->id)->update(["notified" => 1]);
	// 	}
	// 	return $response;
	// }

}
