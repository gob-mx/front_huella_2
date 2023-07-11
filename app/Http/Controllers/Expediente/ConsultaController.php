<?php

namespace App\Http\Controllers\Expediente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \Exception;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class ConsultaController extends Controller
{
    public function webcam(){
        
        return view('expediente.consulta');
    }

    public function guardaFoto(Request $request){


        $imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
        
        if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");


        $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));
        $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

        //dd($imagenCodificadaLimpia);

        echo "data:image/png;base64,$imagenCodificadaLimpia";

        //return $imagenCodificadaLimpia;



        /*$variables = $request->all();       

        print_r($variables);
        dd($variables);


        $img = $variables[1];
        dd($img);

       
        $folderPath = "uploads/";

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
        dd('Image uploaded successfully: '.$fileName);*/
    }

    public function ver_foto($id){

        dd($id);

    }
    

    
}