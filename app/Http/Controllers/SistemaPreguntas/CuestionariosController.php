<?php 
namespace App\Http\Controllers\SistemaPreguntas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Gate;

use App\temas;
use App\Cuestionarios;
use App\cuestionario_preguntas;
use App\tipo_resps;
use App\preguntas;
use App\respuestas;
use App\preguntas_respuestas;
use App\retro_infos;
class CuestionariosController extends Controller{    
    public function __construct()
    {   
        $this->middleware('auth');
    }
    public function CrearPreguntas(){
        return view('Cuestionarios.Add_Pregunta');
    }
    public function index(){
        
        return view('Cuestionarios.Principal')->with("Cuestionarios",$this->ObtenerCuestionario());
    }
    Public function Add(){
        return  view('Cuestionarios.Add')->with("Cuestionarios",$this->ObtenerCuestionario());;
    }
    
    public function ListaCustionarios(){
        
        return view("ListaCuestionarios")->with("Cuestionarios",$this->ObtenerCuestionario());
    }
    public function Animacion(Request $request){
        return view("Animacion")
        ->with("Cuestionario", $this->obtenerCuestionarioID($request));
    }
    public function Crear_Respuestas(Request $request){
        
        if($this->authorize('Editar Cuestionarios') ){
            $variable = view('Cuestionarios.Crear_Respuestas')
            ->with('tipo_resps',$this->Obtenertipo_resps())
            ->with("Cuestionario", $this->obtenerCuestionarioID($request))
            ->with("Pregunta", $this->GetPregunta($request));
            
        return $variable;
        }
        return back();
    }
    public function Crear_Cuestionario(Request $request){
        if( $this->authorize('Editar Cuestionarios')){
            
            return view('Cuestionarios/CrearCuestionario')
            ->with("Cuestionario", $this->obtenerCuestionarioID($request))
            ->with('tipo_resps',$this->Obtenertipo_resps());
        }
        return back();
    }
    
    
    
    public function ObtenerTemas(){
        if( $this->authorize('Ver Temas')){
            return temas::get();
        }
    }
    public function Add_Tema(Request $request){
  
        if( $this->authorize('Editar Temas') && $request->has("Nombre_Tema") ){
            $tema = new temas(); 
            $tema->ID_User = auth()->id();
            $tema->Nombre_Tema = $request->Nombre_Tema;
            $tema->Descripcion = $request->Descripcion;
            $tema->ID_Tema_Prin = $request->ID_Tema_Prin;
            $tema->save();
        }
        return back();
    }
    public function Cambiar_Tema(Request $request){
        
        if( $this->authorize('Editar Temas') && $request->has("Nombre_Tema") ){
            $tema=temas::where('ID_Tema', '=',$request->ID_tema)->first();  
            $tema->ID_User = auth()->id();
            $tema->Nombre_Tema = $request->Nombre_Tema;
            $tema->Descripcion = $request->Descripcion;
            $tema->ID_Tema_Prin = $request->ID_Tema_Prin;
            $tema->save();
            
        }
        return back();
    }
    public function Eliminar_Tema(Request $request){
        
        if( $this->authorize('Editar Temas')   ){
            $tema=temas::where('ID_Tema', '=',$request->ID_tema)->first();
            $tema->delete();
        }
        return redirect('SisPreg/Add');
    }
    public function ObtenerCuestionario(){
        if( $this->authorize('Ver Cuestionarios')){
            return Cuestionarios::get();
        }
    }
    public function obtenerCuestionarioID(Request $request)
    {
        if ($this->authorize('Ver Cuestionarios')) {
            $algo = Cuestionarios::where('ID_Cuestionario', '=', $request->ID_Cuestionario)->first();
        }
        if ($algo)
            return $algo;
            else
                return back();
    }
    public function Add_Cuestionario(Request $request){
        
        if( $this->authorize('Editar Cuestionarios') && $request->has("NombreCuestionario") ){
            $tema = new Cuestionarios();
            $tema->ID_User = auth()->id();
            $tema->NombreCuestionario= $request->NombreCuestionario;
            $tema->save();
        }
        return back();
     }
    
    
    public function Cambiar_Cuestionario(Request $request){
        if( $this->authorize('Editar Cuestionarios') && $request->has("NombreCuestionario") ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario	)->first();
            $tema->ID_User = auth()->id();
            $tema->NombreCuestionario = $request->NombreCuestionario;
            $tema->save();
        }
        return back();
    }
    public function Eliminar_Cuestionario(Request $request){
        
        if( $this->authorize('Editar Cuestionarios')   ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return back();
    }  
   /////////////////////////
   
    public function ObtenerExamen(Request $request){     
        if( $this->authorize('Ver Preguntas')){
            $tema=cuestionario_preguntas::where('$ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
        }
        return $tema;
    }
    public function Add_Examen(Request $request){
        
        if( $this->authorize('Editar Preguntas')   ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return back();
    }
    public function Cambiar_Examen(Request $request){
        
        if( $this->authorize('Editar Preguntas')   ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return back();
    }
    public function Eliminar_Examen(Request $request){
        
        if( $this->authorize('EEditar Preguntas')   ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return back();
    }
    public function ObtenerRespuesta(Request $request){
        
        if( $this->authorize('Editar Preguntas')   ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
        
        }
        return back();
    }
    public function Cambiar_Respuesta(Request $request){
        
        if( $this->authorize('Editar Preguntas')   ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return back();
    }
    public function Eliminar_Respuesta(Request $request){
        
        if( $this->authorize('Editar Preguntas')   ){
            $tema=Cuestionarios::where('ID_Cuestionario', '=',$request->ID_Cuestionario)->first();
            $tema->delete();
        }
        return back();
    }
    
    
    public function Obtenertipo_resps(){
        if( $this->authorize('Ver Cuestionarios')){
            return tipo_resps::get();
        }
    }   
    public function Add_tipo_resps(Request $request){
        if( $this->authorize('Editar Cuestionarios') && $request->has("Tipo") ){
            $tema = new tipo_resps();
            $tema->ID_User = auth()->id();
            $tema->Tipo= $request->Tipo;
            $tema->save();
        }
     
        return back();
    }
    public function Cambiar_tipo_resps(Request $request){
        if( $this->authorize('Editar Cuestionarios') && $request->has("ID_TipoRespuesta") ){
            $tema=tipo_resps::where('ID_TipoRespuesta', '=',$request->ID_TipoRespuesta	)->first();
            $tema->ID_User = auth()->id();
            $tema->Tipo = $request->Tipo;
            $tema->save();
        }
        return back();
    }
    public function Eliminar_tipo_resps(Request $request ){
        if( $this->authorize('Editar Cuestionarios')  && $request->has("ID_TipoRespuesta")  ){
                           
            $tema=tipo_resps::where('ID_TipoRespuesta', '=',$request->ID_TipoRespuesta)->first();
            $tema->delete();
        }
        return back();
    }  
    public function GetPreguntas(Request $request){
        if($this->authorize('Usuario') && $request->has('ID_Cuestionario')){
            return
            cuestionario_preguntas::
            join('preguntas','preguntas.ID_Pregunta','=', 'cuestionario_preguntas.ID_Pregunta')
            ->leftjoin('retro_infos','retro_infos.ID_Retro','=', 'preguntas.ID_Retro_Alimentacion')
            ->leftjoin('tipo_resps','tipo_resps.ID_TipoRespuesta','=', 'preguntas.ID_Tipo')
            ->where('cuestionario_preguntas.ID_Cuestionario','=',$request->ID_Cuestionario)
            ->get();
        }
    }
    public function GetPregunta(Request $request){
        if($this->authorize('Usuario') && $request->has('ID_Cuestionario') && $request->has('ID_Pregunta')){
            return
            cuestionario_preguntas::
            join('preguntas','preguntas.ID_Pregunta','=', 'cuestionario_preguntas.ID_Pregunta')
            ->leftjoin('retro_infos','retro_infos.ID_Retro','=', 'preguntas.ID_Retro_Alimentacion')
            ->leftjoin('tipo_resps','tipo_resps.ID_TipoRespuesta','=', 'preguntas.ID_Tipo')
            ->where('cuestionario_preguntas.ID_Cuestionario','=',$request->ID_Cuestionario)
            ->where('preguntas.ID_Pregunta','=',$request->ID_Pregunta )
            ->first();
        }
    }
    
    public function GetRespuestas(Request $request){
        if($this->authorize('Usuario') && $request->has('ID_Pregunta')){
            return preguntas_respuestas::join('respuestas','respuestas.ID_Respuesta','=','preguntas_respuestas.ID_Respuesta')
            ->where("ID_Pregunta","=",$request->ID_Pregunta)
            ->get();
        }
    }
    public function AddRespuestaTodo(Request $request){
        if($this->authorize('Editar Cuestionarios')  ){
            $ID_Resp=-1;
   
            if($request->has('Respuesta') && $request->Respuesta!=""){
          
                $retro =new Respuestas();
                $retro->Respuesta = $request->Respuesta;
                $retro->ID_User = auth()->id();
                $retro->save();
                $ID_Resp = $retro->ID_Respuesta;
            }
            if($ID_Resp!=-1){
                $vinculo = new preguntas_respuestas();
                $vinculo->ID_Pregunta= $request->ID_Pregunta;
                $vinculo->ID_Respuesta= $ID_Resp;
                $vinculo->Numero= $request->Numero;
                
                $vinculo->ES_Correcta =$request->Correcta;
                $vinculo->save();
            }
        }
        
        return back();
    }
    
    public function ElimnarRelacionRespuesta(Request $request){
        if($this->authorize('Editar Cuestionarios') ){
            $tema=preguntas_respuestas::where('ID_Pregunta', '=',$request->ID_Pregunta)
            ->where('ID_Respuesta','=', $request->ID_Respuesta)->first();
            $tema->delete();
        }
        return back();
        
     }
    
    
    public function AddPreguntaTodo(Request $request){
        if($this->authorize('Editar Cuestionarios') && $request->has('ID_Tipo_Respuesta') ){
            $ID_Retro=-1;
            if($request->has('Retro_Alimentacion') && $request->Retro_Alimentacion!=""){
                $retro =new retro_infos();
                $retro->RetroAlimentacion = $request->Retro_Alimentacion;
                $retro->save();
                $ID_Retro = $retro->ID_Retro;
            }
            $pregunta =  new preguntas();
            $pregunta->Enunciado = $request->Enunciado;
            if($ID_Retro !=-1)
                $pregunta->ID_Retro_Alimentacion =$ID_Retro;
            $pregunta->ID_Tipo= $request->ID_Tipo_Respuesta;
            $pregunta->save(); 
            $vinculo = new cuestionario_preguntas();
            $vinculo->ID_Cuestionario = $request->ID_Cuestionario;
            $vinculo->ID_Pregunta = $pregunta->ID_Pregunta;
            $vinculo->ID_NumPegunta=$request->ID_NumPegunta ;
            $vinculo->save();
       }
       return back();
    }
    
    public function ElimnarRelacionPregunta(Request $request){
        if($this->authorize('Editar Cuestionarios') ){
            $tema=cuestionario_preguntas::where('ID_Cuestionario', '=',$request->ID_Cuestionario)
            ->where('ID_Pregunta','=', $request->ID_Pregunta)->first();
            $tema->delete();
        }
        return back();
    }
    public function SubirRecurso(Request $request){
        if($this->authorize('Editar Cuestionarios') ){
            $preg=preguntas:: 
            where('ID_Pregunta','=',$request->ID_Pregunta)->first();
            $preg->Recurso =  $request->file('Recurso')->store('public/recursos/'.$request->ID_Pregunta);
            $preg->save();
            return asset($preg->Recurso);
        }       
        return back();        
    }
    
    
}
