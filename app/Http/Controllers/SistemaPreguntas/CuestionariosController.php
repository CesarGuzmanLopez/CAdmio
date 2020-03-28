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
use App\presentaciones;
use App\diapositivas; 
use test\Mockery\Stubs\Animal;
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
        
        return view("ListaCuestionarios")->with("Cuestionarios",$this->ObtenerCuestionario())
        ->with("Presentaciones",$this->GetAni());
    
    }
    public function GetAni(){
        return presentaciones::get();
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
    public function upload(Request $request)
    { 
        if($request->hasFile('file') && $this->authorize('Editar Cuestionarios')) { 
            $originName = $request->file('file')->getClientOriginalName(); 
            $fileName = pathinfo($originName, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension(); 
            $fileName = $fileName.'_'.time().'.'.$extension;    
            $request->file('file')->move(public_path('images/Animacion/'), $fileName);
            $url = '/images/Animacion/'.$fileName;            
             $una ='{"default":"'.$url.'"}';
            @header('Content-type: text/html; charset=utf-8');
            return  $una;
        } 
     }
    public function token(){
        return  csrf_token();
        
    } 
    
    
    //Aqui empiezan lAs animaciones
    public function Manage_Crud(Request $request){
        if( $this->authorize('Editar Cuestionarios') ){
            $Presen = presentaciones::get();
            return view("Animaciones.Crud_Ani")->with('presentaciones',$Presen);
        }
        return false;
    }
    
    public function addPresen(Request $request){
        if( $this->authorize('Editar Cuestionarios') && $request->has("Nombre")){
            $nuevoPren= new   presentaciones();
            $nuevoPren->Nombre = $request->Nombre;
            $nuevoPren->Descripcion =$request->Descripcion;
        
            $nuevoPren->save();
             
        }
        return back(); 
    }
    public function delPren(Request $request){ 
        if( $this->authorize('Editar Cuestionarios')&& $request->has("ID_Presentacion") && $request->ID_Presentacion!="null"){
            $unaDi  = presentaciones::where("ID_Presentacion","=",$request->ID_Presentacion)->first();
            $unaDi->delete();
        }
        return back(); 
    }
    public function cambiarAni(Request $request){
        if( $this->authorize('Editar Cuestionarios') && !$request->has("Nombre") ){
            $unaDi  = presentaciones::where("ID_Presentacion","=",$request->ID_Presentacion)->first();
            return view("Animaciones.cambiarAni")->with('presentacion',$unaDi);
        }else if($this->authorize('Editar Cuestionarios') && $request->has("Nombre")){
            $unaDi  = presentaciones::where("ID_Presentacion","=",$request->ID_Presentacion)->first();
            $unaDi->Nombre = $request->Nombre;
            $unaDi->Descripcion =$request->Descripcion;
            $unaDi->save();
            return redirect('/Animaciones/Manage_Crud');
        }
        return back();
    }
    
    public function Diapositivas(Request $request){
        if( $this->authorize('Ver Cuestionarios') && $request->has("ID_Presentacion")){
            $unaDi  = presentaciones::where("ID_Presentacion","=",$request->ID_Presentacion)->first();
            $diapositivas=diapositivas::where("ID_Presentacion","=",$request->ID_Presentacion)->orderBy('Numero_De_diapositiva', 'ASC')->get();
            return view("Animaciones.Diapositivas")
            ->with("ID_Presentacion",$request->ID_Presentacion)->with('presentacion',$unaDi)->with('diapositivas',$diapositivas);
        }
        return back();
    }
    public function addDiapositiva(Request $request){//get
        if( $this->authorize('Editar Cuestionarios') && 
            $request->has("ID_Presentacion") &&
            $request->has("TipoDiapo")
            ){
                return view("Animaciones.AddDiapositiva")
                ->with('ID_Presentacion',$request->ID_Presentacion)
                ->with('TipoDiapo',$request->TipoDiapo)
                ->with('Numero_De_diapositiva',$request->Numero_De_diapositiva);
            
        }
            return back();
    }
    public  function addDiapoPost(Request $request){//post
        if( $this->authorize('Editar Cuestionarios') && $request->has("ID_Presentacion")){
            $Diapo = new diapositivas();
            $Diapo->ID_Presentacion= $request->ID_Presentacion;
            $Diapo->Numero_De_diapositiva=$request->Numero_De_diapositiva;
            $Diapo->Nombre=$request->Nombre;
            
            switch($request->TipoDiapo){
            case(1):{
               
                switch($request->tipoLocacion){
                case("urlImage"):   
                    if(!$request->has("urlRecurso"))return back();
                     $Diapo->Texto ="<b-carousel-slide  img-blank   style=\"background-image:url('". $request->urlRecurso."') !important;background-size: cover;  background-blend-mode: color;background: round;\" ></b-carousel-slide>\n"; 
                     
                     break;
                case("urlVideo"):{
                    if(!$request->has("urlRecurso"))return back();
                    $Diapo->Texto =" 
            	  	<b-carousel-slide  img-blank img-alt=\"Blank image\">
                    	<div class=\"container-fluid text-dark\"> 
                        	<video width=\"1000\"    loop controls>
                          		<source src=\"". $request->urlRecurso."\" type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"' >
                        	</video> 
             	      	</div>\n
             	   </b-carousel-slide>\n
                    ";
                     break;
                
                }
                case ("subirImagen"):{
                    if(!$request->hasFile("Recurso"))return back();
                    $originName = $request->file('Recurso')->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $request->file('Recurso')->getClientOriginalExtension();
                    $fileName = $fileName.'_'.time().'.'.$extension;
                    $request->file('Recurso')->move(public_path('images/Animacion/'), $fileName);
                    $url = '/images/Animacion/'.$fileName;                            
                    $Diapo->Texto ="<b-carousel-slide  img-blank   style=\" background-image:url('". $url."') !important; background-blend-mode: color;background-size: cover;  background: round;\" ></b-carousel-slide>\n";     
                    break;
                }
                case ("SubirVideo"):{
                    if(!$request->hasFile("Recurso"))return back();
                    $originName = $request->file('Recurso')->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $request->file('Recurso')->getClientOriginalExtension();
                    $fileName = $fileName.'_'.time().'.'.$extension;
                    $request->file('Recurso')->move(public_path('images/Animacion/'), $fileName);
                    $url = '/images/Animacion/'.$fileName;
                    $Diapo->Texto ="
            	  	<b-carousel-slide  img-blank img-alt=\"Blank image\">
                    	<div class=\"container-fluid text-dark\">
                        	<video width=\"1000\"    loop controls>
                          		<source src=\"". $url."\" type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"' >
                        	</video>
             	      	</div>\n
             	   </b-carousel-slide>\n
                    "; 
                    break;
                }
                case("SubirMolecula"):{
                    if(!$request->hasFile("Recurso"))return back();
                    $originName = $request->file('Recurso')->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $request->file('Recurso')->getClientOriginalExtension();
                    $fileName = $fileName.'_'.time().'.'.$extension;
                    $request->file('Recurso')->move(public_path('images/Animacion/'), $fileName);
                    $url = '/images/Animacion/'.$fileName;
                    $Diapo->Texto ="
            	      <b-carousel-slide      img-blank  >
            			<div class=\"container-fluid text-dark m-0 p-0\">
            				<iframe style=\"border: 0px;\" src=\"/jsmol/Animate?width=1300&height=500&smile=$url&isfile=true\" class=\"container-fluid m-0 p-0\" scrolling=\"no\"  height=\"480px\"></iframe>
            	      	</div>\n 
            	      </b-carousel-slide>\n
                    ";
                    break;
                }
                Case("Smile"):{
                    if(!$request->has("Smile"))return back();
                    $Diapo->Texto ="
            	      <b-carousel-slide      img-blank  >
            			<div class=\"container-fluid text-dark m-0 p-0\">
             				<iframe style=\"border: 0px;\" src=\"/jsmol/Animate?width=1300&height=500&smile=".$request->Smile."\" class=\"container-fluid m-0 p-0\" scrolling=\"no\"  height=\"480px\"></iframe>
            	      	</div>\n
            	      </b-carousel-slide>\n
                    ";
                    break;
                }
                default: return back();
                }
                break; 
            }
            case(2):{//solo texto
                if(!$request->has("Texto"))return back();
                $Diapo->Texto="
                <b-carousel-slide  img-blank img-alt=\"Blank image\" >
                <div class=\"continer-fluid p-0 m-0 w-100 text-dark h-100 pt-3\" style=\"height:500px !important; background-color:".$request->bgColor."!important; \" >
                    ".$request->Texto."
                </div>\n
                </b-carousel-slide>\n
                ";
                break;
                }
            case(3):{
                if(!$request->has("Texto"))return back();
                
                $textorecurso="";
                switch($request->tipoLocacion){
                    case("urlImage"):
                        if(!$request->has("urlRecurso") || $request->urlRecurso =="" )return back();
                        $textorecurso="<b-img src=\"".$request->urlRecurso."\" fluid></b-img>";
                        
                        break;
                    case("urlVideo"):{
                        if(!$request->has("urlRecurso") || $request->urlRecurso =="")return back();
                        $textorecurso =" 
                        	<video width=\"500\"     autoplay loop>
                          		<source src=\"". $request->urlRecurso."\" type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"' >
                        	</video> 
                        ";
                        break;
                        
                    }
                    case ("subirImagen"):{
                        if(!$request->hasFile("Recurso"))return back();
                        $originName = $request->file('Recurso')->getClientOriginalName();
                        $fileName = pathinfo($originName, PATHINFO_FILENAME);
                        $extension = $request->file('Recurso')->getClientOriginalExtension();
                        $fileName = $fileName.'_'.time().'.'.$extension;
                        $request->file('Recurso')->move(public_path('images/Animacion/'), $fileName);
                        $url = '/images/Animacion/'.$fileName;
                        $textorecurso="<b-img src=\"".$url."\" fluid></b-img>";
                        break;
                    }
                    case ("SubirVideo"):{
                        if(!$request->hasFile("Recurso"))return back();
                        $originName = $request->file('Recurso')->getClientOriginalName();
                        $fileName = pathinfo($originName, PATHINFO_FILENAME);
                        $extension = $request->file('Recurso')->getClientOriginalExtension();
                        $fileName = $fileName.'_'.time().'.'.$extension;
                        $request->file('Recurso')->move(public_path('images/Animacion/'), $fileName);
                        $url = '/images/Animacion/'.$fileName;
                       
                        $textorecurso ="
                        	<video width=\"500\"     autoplay loop>
                          		<source src=\"". $url."\" type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"' >
                        	</video>
                        ";
                        break;
                    }
                    case("SubirMolecula"):{
                        if(!$request->hasFile("Recurso"))return back();
                        $originName = $request->file('Recurso')->getClientOriginalName();
                        $fileName = pathinfo($originName, PATHINFO_FILENAME);
                        $extension = $request->file('Recurso')->getClientOriginalExtension();
                        $fileName = $fileName.'_'.time().'.'.$extension;
                        $request->file('Recurso')->move(public_path('images/Animacion/'), $fileName);
                        $url = '/images/Animacion/'.$fileName;
                       
                        $textorecurso ="
            				<iframe style=\"border: 0px;\" src=\"/jsmol/Animate?width=500&height=480&color=".str_replace("#", "",$request->bgColor)."&smile=$url&isfile=true\" class=\"container-fluid m-0 p-0\" scrolling=\"no\"  height=\"480px\"></iframe>
            	        ";
                        break;
                    }
                    Case("Smile"):{
                        if(!$request->has("Smile"))return back();
                        $textorecurso ="
             				<iframe style=\"border: 0px;\" src=\"/jsmol/Animate?width=500&color=".str_replace("#", "",$request->bgColor)."&height=500&smile=".$request->Smile."\" class=\"container-fluid m-0 p-0\" scrolling=\"no\"  height=\"450px\"></iframe>";       
                        break;
                    }
                    default: return back();
                }
                $textoFinal = "
                           <b-carousel-slide  img-blank img-alt=\"Blank image\" >
                           <div class=\"continer-fluid p-0 m-0 w-100 text-dark text-left h-100 pt-3\" style=\"height:500px !important; background-color:".$request->bgColor."!important; \" >
                ";
                Switch($request->posicion){
                    case("Arriba"):
                        if($request->has("texto2") && $request->texto2 !="")
                            $textoFinal.="<h3 class=\"text-center\">".$request->texto2."</h3>";
                        $textoFinal.="<div>".$textorecurso."</div>\n";
                        $textoFinal.="<div>".$request->Texto."</div>\n";
                        break;
                    case("Izquierda"):
                        $textoFinal.="<div class=\"row\">";
                        $textoFinal.="<div class=\"col-6 p-0 m-0 \">";
                        $textoFinal.="<div class=\"continer-fluid\">".$textorecurso."</div>\n";
                        $textoFinal.="</div>\n"; 
                        $textoFinal.="<div class=\"col-6 p-0 m-0 \">";
                        $textoFinal.="<div class=\"continer-fluid\">".$request->Texto."</div>\n";
                        $textoFinal.="</div>\n";
                        $textoFinal.="</div>\n";
                        break;
                    case("Derecha"):
                        $textoFinal.="<div class=\"row\">";
                        $textoFinal.="<div class=\"col-6 p-0 m-0 \">";
                        $textoFinal.="<div class=\"continer-fluid\">".$request->Texto."</div>\n";
                        $textoFinal.="</div>\n"; 
                        $textoFinal.="<div class=\"col-6 p-0 m-0 \">";
                        $textoFinal.="<div class=\"continer-fluid\">".$textorecurso."</div>\n";
                        $textoFinal.="</div>\n";
                        $textoFinal.="</div>\n";
                        break;
                    case("Abajo"):
                        $textoFinal.="<div>".$request->Texto."</div>\n";  
                        $textoFinal.="<div class=\"center-block text-center justify-content-center \" >".$textorecurso."</div>\n";
                        if($request->has("texto2") && $request->texto2 !="")
                            $textoFinal.="<h3 class=\"text-center\">".$request->texto2."</h3>";
                        break;
                    default: return back();
                }
                $textoFinal .= "</div>\n</b-carousel-slide>\n"; 
                
                $Diapo->Texto =$textoFinal; 
                break;
                }
            case(7):{
                $Diapo->ID_Pregunta = $request->ID_Pregunta;
                
                if($Diapo->ID_Pregunta == 1)
                    $Diapo->Texto ="" ;
            }
            default:
                return back();
            }
            $Diapo->Texto = $Diapo->Texto; 
            $Diapo->save();
          
            
            return redirect('/Animaciones/Manage_Crud/Diapositivas?ID_Presentacion='. $request->ID_Presentacion);
                
        }
        return back();
        
    }
    public function cahngeDiapo(Request $request) {
        if( $this->authorize('Editar Cuestionarios') && $request->has("ID_Dispositiva")){
            $unaDia=diapositivas::where("ID_Dispositiva","=",$request->ID_Dispositiva)->first();
            return view("Animaciones.CambiarDiapositiva")->with("diapositiiva",$unaDia);
        }
    }
    public function cahngeDiapoPost(Request $request) {
        if( $this->authorize('Editar Cuestionarios') && $request->has("ID_Dispositiva")){
            $unaDia=diapositivas::where("ID_Dispositiva","=",$request->ID_Dispositiva)->first();
            $unaDia->Nombre=$request->Nombre;
            $unaDia->Texto=$request->Texto;
            $unaDia->ID_Pregunta=$request->ID_Pregunta;
            $unaDia->Numero_De_diapositiva=$request->Numero_De_diapositiva;
            $unaDia->save();
        }
        return back();
    }
    public function eliminarDiapo(Request $request)//post
    {
        if( $this->authorize('Editar Cuestionarios') && $request->has("ID_Dispositiva")  &&$request->ID_Dispositiva!="null" ){
            $unaDia=diapositivas::where("ID_Dispositiva","=",$request->ID_Dispositiva)->first();
            $unaDia->delete();
        }
        return back();
    }
    public function VerPresentacion(Request $request){
        if( $this->authorize('Ver Cuestionarios') && $request->has("ID_Presentacion") ){
            $unaDi  = presentaciones::where("ID_Presentacion","=",$request->ID_Presentacion)->first();
            $diapositivas=diapositivas::where("ID_Presentacion","=",$request->ID_Presentacion)->orderBy('Numero_De_diapositiva', 'ASC')->get();
            return view("VerPresentacion")
            ->with("Presentacion",$unaDi)->with('presentacion',$unaDi)->with('diapositivas',$diapositivas); 
        }
        return back();
    }
}

