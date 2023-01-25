<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class TeamsController extends Controller
{

    public function index()
    {
        return Teams::get();
    }

    public function getTeamsByName($name)
    {
        return Teams::where('team_name', 'like', "%{$name}%")
            ->get();
    }

    public function store(Request $request)
    {

        if (!$request->hasFile('team_image')) {
            return [
                "resp" => "error",
                "msj" => "No hay imagen!",
                "error" => "No hay imagen cargada..."
            ];
        }
        $file = $request->file('team_image');
        $archivoNombre = time() . '_' . $file->getClientOriginalName();
        $destino = 'images/teams/';

        $team = Teams::create([
            'team_name' => $request->team_name,
            'team_city' => $request->team_city,
            'team_stadium' => $request->team_stadium,
            'team_image' =>  $archivoNombre,
            'division_id' => $request->division_id
        ]);
        $upload = $file->move($destino, $archivoNombre);
        $img = Image::make($destino . $archivoNombre)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($destino . $archivoNombre);
        
        return response()->json([
            "resp" => "success",
            "msj" => "Equipo Creado correctamente!",
        ], 200);
    }
}
