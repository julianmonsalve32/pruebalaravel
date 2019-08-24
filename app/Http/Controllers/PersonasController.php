<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Form;
use View;
use Validator;
use Input;
use Redirect;
use DB;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function get_index(){
        $usuarios = Persona::all();
        return View::make("home")->with('usuarios',$usuarios);
    }
    
    public function post_crear(Request $request){                
        /* $array  = ["hola" => $request->cedula];
        return response()->json($request); */
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $email = $request->email;
        $cedula = $request->cedula;
        $telefono = $request->telefono;      
        $personaEmail = Persona::where("email", $email)->get();
        $personaCedula = Persona::where("cedula", $cedula)->get();         
        $array = array();
        if (count($personaEmail) > 0) {
            $array  = ["email" => "1"];            
        }else if (count($personaCedula) > 0) {
            $array  = ["cedula" => "2"];            
        }else{
            $persona = new Persona;
            $persona->cedula = $cedula;
            $persona->nombres = $nombres;
            $persona->apellidos = $apellidos;
            $persona->email = $email;
            $persona->telefono = $telefono;
            $persona->save();
            $array = [$request];
        }
        return response()->json($array);
    }
    
    public function editar($id){
        $persona = Persona::find($id);
        return response()->json($persona);
    }
    
    public function actualizar(Request $request, $id){        
        $cedula = $request->cedula;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $email = $request->email;
        $telefono = $request->telefono;        
        $personaEmail = Persona::where('id','!=',$id)->where("email", $email)->get();
        $personaCedula = Persona::where('id','!=',$id)->where("cedula", $cedula)->get();         
        $array = array();
        if (count($personaEmail) > 0) {
            $array  = ["email" => "1"];                        
        }else if (count($personaCedula) > 0) {
            $array  = ["cedula" => "2"];            
        }else{
            $persona = Persona::find($id);
            $persona->cedula = $cedula;
            $persona->nombres = $nombres;
            $persona->apellidos = $apellidos;
            $persona->email = $email;
            $persona->telefono = $telefono;
            $persona->save();
            $array = ["success"=>"ok"];            
        }
        return response()->json($array);
    }        
}
