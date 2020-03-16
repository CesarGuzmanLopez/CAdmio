<?php
namespace App\Http\Controllers\SistemaPreguntas;

use App\Cuestionarios;
use App\cuestionario_preguntas;
use App\temas;
use App\tipo_resps;
use App\Http\Controllers\Controller;
use function Redis\auth;
use Symfony\Component\HttpFoundation\Request;
use function Symfony\Component\Routing\Matcher\RedirectableUrlMatcherInterface\redirect;

class CuestionariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function CrearPreguntas()
    {
        return view('Cuestionarios.Add_Pregunta');
    }

    public function index()
    {
        return view('Cuestionarios.Principal')->with("Cuestionarios", $this->ObtenerCuestionario());
    }

    Public function Add()
    {
        return view('Cuestionarios.Add');
    }

    public function Crear_Cuestionario(Request $request)
    {
        if ($this->authorize('Editar Cuestionarios') && $request->has('ID_Cuestionario')) {
            return view('Cuestionarios/CrearCuestionario')->with("Cuestionario", $this->obtenerCuestionarioID($request));
        }
        return redirect('SisPreg');
    }

    public function ObtenerTemas()
    {
        if ($this->authorize('Ver Temas')) {
            return temas::get();
        }
    }

    public function Add_Tema(Request $request)
    {
        if ($this->authorize('Editar Temas') && $request->has("Nombre_Tema")) {
            $tema = new temas();
            $tema->ID_User = auth()->id();
            $tema->Nombre_Tema = $request->Nombre_Tema;
            $tema->Descripcion = $request->Descripcion;
            $tema->ID_Tema_Prin = $request->ID_Tema_Prin;
            $tema->save();
        }
        return redirect('SisPreg/Add');
    }

    public function Cambiar_Tema(Request $request)
    {
        if ($this->authorize('Editar Temas') && $request->has("Nombre_Tema")) {
            $tema = temas::where('ID_Tema', '=', $request->ID_tema)->first();
            $tema->ID_User = auth()->id();
            $tema->Nombre_Tema = $request->Nombre_Tema;
            $tema->Descripcion = $request->Descripcion;
            $tema->ID_Tema_Prin = $request->ID_Tema_Prin;
            $tema->save();
        }
        return redirect('SisPreg/Add');
    }

    public function Eliminar_Tema(Request $request)
    {
        if ($this->authorize('Editar Temas')) {
            $tema = temas::where('ID_Tema', '=', $request->ID_tema)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }

    public function ObtenerCuestionario()
    {
        if ($this->authorize('Ver Cuestionarios')) {
            return Cuestionarios::get();
        }
    }

    public function Add_Cuestionario(Request $request)
    {
        if ($this->authorize('Editar Cuestionarios') && $request->has("NombreCuestionario")) {
            $tema = new Cuestionarios();
            $tema->ID_User = auth()->id();
            $tema->NombreCuestionario = $request->NombreCuestionario;
            $tema->save();
        }
        return redirect('SisPreg/Add');
    }

    public function obtenerCuestionarioID(Request $request)
    {
        if ($this->authorize('Ver Cuestionarios')) {
            $algo = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
        }
        if ($algo)
            return $algo;
        else
            redirect('SisPreg');
    }

    public function Cambiar_Cuestionario(Request $request)
    {
        if ($this->authorize('Editar Cuestionarios') && $request->has("NombreCuestionario")) {
            $tema = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
            $tema->ID_User = auth()->id();
            $tema->NombreCuestionario = $request->NombreCuestionario;
            $tema->save();
        }
        return redirect('SisPreg/Add');
    }

    public function Eliminar_Cuestionario(Request $request)
    {
        if ($this->authorize('Editar Cuestionarios')) {
            $tema = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }

    // ///////////////////////
    public function ObtenerExamen(Request $request)
    {
        if ($this->authorize('Ver Preguntas')) {
            $tema = cuestionario_preguntas::where('$ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
        }
        return $tema;
    }

    public function Add_Examen(Request $request)
    {
        if ($this->authorize('Editar Preguntas')) {
            $tema = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }

    public function Cambiar_Examen(Request $request)
    {
        if ($this->authorize('Editar Preguntas')) {
            $tema = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }

    public function Eliminar_Examen(Request $request)
    {
        if ($this->authorize('Editar Preguntas')) {
            $tema = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }

    public function ObtenerRespuesta(Request $request)
    {
        if ($this->authorize('Editar Preguntas')) {
            $tema = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }

    public function Cambiar_Respuesta(Request $request)
    {
        return redirect('SisPreg/Add');
    }

    public function Cambiar_tipo_resps(Request $request)
    {
        if ($this->authorize('Editar Cuestionarios') && $request->has("ID_TipoRespuesta")) {
            $tema = tipo_resps::where('ID_TipoRespuesta', '=', $request->ID_TipoRespuesta)->first();
            $tema->ID_User = auth()->id();
            $tema->Tipo = $request->Tipo;
            $tema->save();
        }
        return redirect('SisPreg/Add');
    }

    public function Eliminar_tipo_resps(Request $request)
    {
        if ($this->authorize('Editar Cuestionarios') && $request->has("ID_TipoRespuesta")) {
            $tema = tipo_resps::where('ID_TipoRespuesta', '=', $request->ID_TipoRespuesta)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }

    public function GetPreguntas(Request $request)
    {
        if ($this->authorize('Usuario') && $request->has('ID_Cuestionario')) {
            return cuestionario_preguntas::join('preguntas', 'preguntas.ID_Pregunta', '=', 'cuestionario_preguntas.ID_Pregunta')->leftjoin('retro_infos', 'retro_infos.ID_Retro', '=', 'preguntas.ID_Retro_Alimentacion')
                ->leftjoin('tipo_resps', 'tipo_resps.ID_TipoRespuesta', '=', 'preguntas.ID_Tipo')
                ->where('cuestionario_preguntas.ID_Cuestionario', '=', $request->ID_Cuestionario)
                ->get();
        }
    }
}