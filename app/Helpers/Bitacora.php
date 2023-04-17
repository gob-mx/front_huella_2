<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Bitacoras\BitacoraAuditoria;
use App\Models\Bitacoras\BitacoraLog;

class Bitacora
{
    
    /**
     *  Registro de log de sistema en base de datos 
     * 
     *  @param string $classInfo     Cadena con información de clase y método | Sugerido el uso de __METHOD__
     *  @param object|string $error  Descripción del error || Puede recibir objeto Exception
     *  @param string $description   Descripción de la acción realizada que genera el log
     *  @param string $type          Optional [info|debug|warning|error]
     *  @return void
     */
    public static function log($classInfo, $error, $description = null, $type = 'info', $bitacora_auditoria_id = null, $canal = 'stack') : void
    {
        $classInfo = $classInfo;
        $msgError = null;
        $type = strtolower($type);
        $file = null;
        $line = null;
        $infoFile = '';
        
        if( is_object($error) ){
            $file = $error->getFile();
            $line = $error->getLine();
            $msgError = ($error->getMessage());
            $infoFile = "\r\n File: {$file} Line: {$line} Message: {$msgError}";
        } else {
            $msgError = $error;
        }

        // Registra en log de sistema si se encuentra activo APP_DEBUG o con tipos ERROR|WARNING
        if( env('APP_DEBUG') == true || in_array($type,['error','warning']) ) {
            // Generar Log
            //\Log::{$type}( "{$classInfo} | {$description} {$infoFile} {$msgError}");
            \Log::channel("{$canal}")->{$type}( "{$classInfo} | >>>>>>>>>>{$description}<<<<<<<<<< {$file} {$line} {$msgError} ");
        }

        // Guardar registro tabla bitacora
        $bitacoraLog = new BitacoraLog;
        $bitacoraLog->class_info  = $classInfo;
        $bitacoraLog->file        = $file;
        $bitacoraLog->line        = $line;
        $bitacoraLog->message     = substr( $msgError, 0, 1000 );
        $bitacoraLog->description = $description;
        $bitacoraLog->type_log    = $type;
        if( $bitacora_auditoria_id && is_int($bitacora_auditoria_id))
            $bitacoraLog->bitacora_auditoria_id = $bitacora_auditoria_id;

        $bitacoraLog->save();
    }

    /**
     *  Registro en bitacora 
     * 
     *  @param object $request  Objeto request de solicitud
     *  @param string $action   Descripción de acción realizada
     */
    public static function auditoria(Request $request, string $action) : int
    {
        $user = Auth::user();
        $user_id = $user->id?? null;
        $session = $request->getSession()? $request->getSession()->all() : null;
        $data = $request->all();
        
        $bitacora = new BitacoraAuditoria;
        $bitacora->session    = json_encode($session);
        $bitacora->client_ip  = $request->getClientIp();
        $bitacora->url        = $request->url();
        $bitacora->path       = $request->path();
        $bitacora->method     = $request->method();
        $bitacora->data       = json_encode($data);
        $bitacora->user_id    = $user->id??null;
        $bitacora->user       = $user->usuario??null;
        $bitacora->action     = $action; //La accion mandada en el controlador
        $bitacora->created_at = carbon::now();
        $bitacora->save();

        return $bitacora->id;
    }

    /**
     * Agrega mensaje de respuesta a un regiostro de auditoria
     * 
     */
    public static function setAuditoriaResponse($bitacora_auditoria_id, $response)
    {
        if( is_array($response) || is_object($response) )
            $response = json_encode($response); 

        BitacoraAuditoria::where('id', $bitacora_auditoria_id)->update(['response' => $response]);
    }

    public static function notifyToSlack($classInfo,$message){

        try{
            self::log($classInfo, "" , $message,'error','','slack');
        }catch(\Exception $e){
            dd("Error".$e);
        }
    }

}
