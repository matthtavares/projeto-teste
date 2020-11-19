<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index() {
        return view('usuarios.listar');
    }

    public function cadastrar() {
        return view('usuarios.cadastrar');
    }

    public function editar( $id ) {
        return view('usuarios.editar', ['user' => Usuario::find($id)]);
    }

    /**
     * Retrieve a list of users to datatable.
     *
     * @return json
     */
    public function list() {
        return datatables()->eloquent(Usuario::query())
                ->only(['id','nome','nascimento','cpf','sexo','buttons'])
                ->editColumn('sexo', function($usuario) {
                    return ucfirst($usuario->sexo);
                })
                ->editColumn('nascimento', function($usuario) {
                    return \Carbon\Carbon::parse($usuario->nascimento)->format('d/m/Y');
                })
                ->addColumn('buttons', function($usuario) {
                    return '<button type="button" class="btn btn-danger btn-delete" data-id="'.$usuario->id.'">Excluir</button><a href="'.url('/usuarios/'.$usuario->id).'" class="btn btn-success">Editar</a>';
                })
                ->rawColumns(['buttons'])
                ->toJson();
    }

    /**
     * Create or update a user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save( Request $request, string $id = null ) {
        $user = Usuario::updateOrCreate(
            ['cpf' => $request->input('cpf')],
            $request->only(['cpf','nome','nascimento','sexo'])
        );
        return redirect(url('/usuarios/'.$user->id));
    }

    /**
     * Delete the specified user.
     *
     * @param  string  $id
     * @return json
     */
    public function delete( string $id ) {
        try {
            Usuario::destroy($id);
            $success = true;
        } catch( \Exception $e ){
            $success = false;
        }
        return response()->json(['success' => $success]);
    }
}