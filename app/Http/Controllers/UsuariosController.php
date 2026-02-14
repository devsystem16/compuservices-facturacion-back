<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use App\Models\Usuarios;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::select(
                'usuarios.id',
                'usuarios.nombres',
                'usuarios.usuario',
                'usuarios.tipo_usuarios_id',
                'tipo_usuarios.tipo',
                'tipo_usuarios.hora_inicio',
                'tipo_usuarios.hora_fin',
                'usuarios.created_at'
            )
            ->join('tipo_usuarios', 'usuarios.tipo_usuarios_id', '=', 'tipo_usuarios.id')
            ->whereNull('usuarios.deleted_at')
            ->orderBy('usuarios.nombres', 'asc')
            ->get();

        return response()->json(["codigo" => 200, "Message" => "", "data" => $usuarios], 200);
    }

    public function show($id)
    {
        $usuario = Usuarios::select(
                'usuarios.id',
                'usuarios.nombres',
                'usuarios.usuario',
                'usuarios.tipo_usuarios_id',
                'tipo_usuarios.tipo',
                'tipo_usuarios.hora_inicio',
                'tipo_usuarios.hora_fin',
                'usuarios.created_at'
            )
            ->join('tipo_usuarios', 'usuarios.tipo_usuarios_id', '=', 'tipo_usuarios.id')
            ->where('usuarios.id', $id)
            ->whereNull('usuarios.deleted_at')
            ->first();

        if (!$usuario) {
            return response()->json(["codigo" => 404, "Message" => "Usuario no encontrado.", "data" => []], 200);
        }

        return response()->json(["codigo" => 200, "Message" => "", "data" => $usuario], 200);
    }

    public function store(Request $request)
    {
        try {
            $existe = Usuarios::where('usuario', $request->usuario)->whereNull('deleted_at')->first();
            if ($existe) {
                return response()->json(["codigo" => 400, "Message" => "El nombre de usuario ya existe.", "data" => []], 200);
            }

            DB::beginTransaction();
            $usuario = Usuarios::create([
                'nombres' => $request->nombres,
                'usuario' => $request->usuario,
                'pass' => $request->pass,
                'tipo_usuarios_id' => $request->tipo_usuarios_id,
            ]);
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Usuario creado correctamente.", "data" => $usuario], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al crear el usuario.", "data" => []], 200);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $usuario = Usuarios::findOrFail($id);

            if ($request->has('usuario') && $request->usuario !== $usuario->usuario) {
                $existe = Usuarios::where('usuario', $request->usuario)
                    ->where('id', '!=', $id)
                    ->whereNull('deleted_at')
                    ->first();
                if ($existe) {
                    return response()->json(["codigo" => 400, "Message" => "El nombre de usuario ya existe.", "data" => []], 200);
                }
            }

            DB::beginTransaction();
            $datos = $request->only(['nombres', 'usuario', 'tipo_usuarios_id']);
            if ($request->has('pass') && $request->pass) {
                $datos['pass'] = $request->pass;
            }
            $usuario->update($datos);
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Usuario actualizado correctamente.", "data" => $usuario], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al actualizar el usuario.", "data" => []], 200);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Usuarios::findOrFail($id)->delete();
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Usuario eliminado correctamente.", "data" => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al eliminar el usuario.", "data" => []], 200);
        }
    }

    public function cambiarPassword(Request $request, $id)
    {
        try {
            $usuario = Usuarios::findOrFail($id);

            if ($request->has('pass_actual') && $usuario->pass !== $request->pass_actual) {
                return response()->json(["codigo" => 400, "Message" => "La contraseña actual es incorrecta.", "data" => []], 200);
            }

            DB::beginTransaction();
            $usuario->update(['pass' => $request->pass_nueva]);
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Contraseña actualizada correctamente.", "data" => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al cambiar la contraseña.", "data" => []], 200);
        }
    }

    public function tiposUsuario()
    {
        $tipos = TipoUsuario::select('id', 'tipo', 'hora_inicio', 'hora_fin')
            ->whereNull('deleted_at')
            ->orderBy('tipo', 'asc')
            ->get();

        return response()->json(["codigo" => 200, "Message" => "", "data" => $tipos], 200);
    }

    public function login(Request $request)
    {
        $acceso = [
            "login" => 0,
            "user_id" => 0,
            "usuario" =>   "no registrado",
            "tipousuario_id" => 0,
            "tipo" =>  "no registrado",
            "hora_inicio" =>  "00:00:00",
            "hora_fin" =>   "00:00:00",
            "mensaje" => "Usuario no encontrado."
        ];
        $usuario =   Usuarios::select(
            'usuarios.id as user_id',
            'usuarios.usuario',
            'usuarios.nombres',
            'tipo_usuarios.tipo',
            'tipo_usuarios.id as tipousuario_id',
            'tipo_usuarios.hora_inicio',
            'tipo_usuarios.hora_fin',

        )
            ->join('tipo_usuarios', 'usuarios.tipo_usuarios_id', 'tipo_usuarios.id')
            ->where('usuarios.usuario', '=', $request->user)
            ->where('usuarios.pass', '=', $request->pass)
            ->first();


        if (isset($usuario->usuario)) {
            $login = 1;
            $currentHour = date('H:i:s');

            if ($currentHour >= $usuario->hora_inicio &&  $currentHour <=  $usuario->hora_fin) {
                $estado = "PERMITIR";
                $mensaje = "Login Correcto";
            } else {
                $estado = "DENEGAR";
                $mensaje = "Usuario Fuera de Horario, Su horario de atención es desde [ " . $usuario->hora_inicio  . " a " . $usuario->hora_fin . " ]";
                $login = 0;
            }

            $acceso = [
                "login" => $login,
                "user_id" =>  $usuario->user_id,
                "usuario" =>   $usuario->usuario,
                "nombres" =>   $usuario->nombres,
                "tipousuario_id" => $usuario->tipousuario_id,
                "tipo" =>   $usuario->tipo,
                "hora_inicio" =>   $usuario->hora_inicio,
                "hora_fin" =>   $usuario->hora_fin,
                "mensaje" => $mensaje

            ];
        }
        return   $acceso;
    }
}
