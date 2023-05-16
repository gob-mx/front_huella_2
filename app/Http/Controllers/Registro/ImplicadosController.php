<?php

namespace App\Http\Controllers\Registro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImplicadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registro.implicados.implicados_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'carpeta_investigacion' => 'required',
            // 'apellido_paterno' => 'required',
            // 'apellido_materno' => 'required',
        ];
        // $customMessages = [
        //     'name.required' => 'Campo <b>Nombre Rol</b> es requerido',
        //     'name.unique' => 'Campo <b>Nombre Rol</b> ya esxiste',
        //     'permisos.required' => 'Debes Elegir un <b>Rol</b> al menos',
        // ];

        $errors = validateErrors($request, $rules);

        if($errors){
            $response = [
                'st'    => true,
                'title' => "Campos Requeridos",
                'msg'   => $errors,
                'type'  => 'warning',
            ];
            // \Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> validateErrors \n".json_encode($response));
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }

        $input = $request->all();

        dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
