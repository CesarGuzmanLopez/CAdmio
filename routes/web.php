<?php
Route::get('/','SistemaPreguntas\CuestionariosController@ListaCustionarios');
Route::get('/Animacion','SistemaPreguntas\CuestionariosController@Animacion');
Route::get('jsmol/Animate','PrincipalController@Animate');

Route::get('/ani','PrincipalController@index');

Route::get('cerrarSesion','PrincipalController@cerrarSesion');

Auth::routes(['register' => false]);  

Route::post('/upload', 'SistemaPreguntas\CuestionariosController@upload')->name('ckeditor.upload');
Route::get('/token','SistemaPreguntas\CuestionariosController@token');


    
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});

Route::prefix('SisPreg')->group(function () {
    Route::get('CrearPregunta','SistemaPreguntas\CuestionariosController@CrearPreguntas'); 
    Route::get('/','SistemaPreguntas\CuestionariosController@index'); 
    
    Route::get('Add','SistemaPreguntas\CuestionariosController@Add'); 
    
    Route::get('ObtenerTemas','SistemaPreguntas\CuestionariosController@ObtenerTemas');
    Route::post('Add_Tema','SistemaPreguntas\CuestionariosController@Add_Tema'); 
    Route::post('Cambiar_Tema','SistemaPreguntas\CuestionariosController@Cambiar_Tema');
    Route::post('Eliminar_Tema','SistemaPreguntas\CuestionariosController@Eliminar_Tema'); 
   
    Route::get('ObtenerCuestionario','SistemaPreguntas\CuestionariosController@ObtenerCuestionario');
    Route::post('Add_Cuestionario','SistemaPreguntas\CuestionariosController@Add_Cuestionario'); 
    Route::post('Cambiar_Cuestionario','SistemaPreguntas\CuestionariosController@Cambiar_Cuestionario');
    Route::post('Eliminar_Cuestionario','SistemaPreguntas\CuestionariosController@Eliminar_Cuestionario');
    
    
    Route::get('ObtenerExamen','SistemaPreguntas\CuestionariosController@ObtenerExamen');
    Route::post('Add_Examen','SistemaPreguntas\CuestionariosController@Add_Examen');
    Route::post('Cambiar_Examen','SistemaPreguntas\CuestionariosController@Cambiar_Examen');
    Route::post('Eliminar_Examen','SistemaPreguntas\CuestionariosController@Eliminar_Examen');
    
    Route::get('Obtenertipo_resps','SistemaPreguntas\CuestionariosController@Obtenertipo_resps');
    Route::post('Add_tipo_resps','SistemaPreguntas\CuestionariosController@Add_tipo_resps');
    Route::post('Cambiar_tipo_resps','SistemaPreguntas\CuestionariosController@Cambiar_tipo_resps');
    Route::post('Eliminar_tipo_resps','SistemaPreguntas\CuestionariosController@Eliminar_tipo_resps');
   
    Route::get('ObtenerRespuesta','SistemaPreguntas\CuestionariosController@ObtenerRespuesta');
    Route::post('Cambiar_Respuesta','SistemaPreguntas\CuestionariosController@Cambiar_Respuesta');
    Route::post('Eliminar_Respuesta','SistemaPreguntas\CuestionariosController@Eliminar_Respuesta');
   
    Route::post('AddPreguntaTodo','SistemaPreguntas\CuestionariosController@AddPreguntaTodo');
    Route::post('ElimnarRelacionPregunta','SistemaPreguntas\CuestionariosController@ElimnarRelacionPregunta');
    Route::post('ElimnarRelacionRespuesta','SistemaPreguntas\CuestionariosController@ElimnarRelacionRespuesta');
    
    Route::post('AddRespuestaTodo','SistemaPreguntas\CuestionariosController@AddRespuestaTodo');
    
    
    Route::get('CrearPresentacion','SistemaPreguntas\CuestionariosController@Crear_Cuestionario');
    Route::get('GetPreguntas','SistemaPreguntas\CuestionariosController@GetPreguntas');
    Route::get('GetRespuestas','SistemaPreguntas\CuestionariosController@GetRespuestas');
    
    Route::get('Crear_Respuestas','SistemaPreguntas\CuestionariosController@Crear_Respuestas');
    
    //añadir recurso
    Route::post('SubirRecurso','SistemaPreguntas\CuestionariosController@SubirRecurso');
    



});