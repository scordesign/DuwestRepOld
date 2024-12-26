<?php

use Illuminate\Support\Facades\Route;
use App\Exports\UsersExport;
use App\Exports\TietoExport;
use App\Exports\VentaExport;
use App\Exports\IngredientesExport;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth');
Route::resource('reportes', App\Http\Controllers\reporte::class)->middleware('auth');
Route::resource('ventas', App\Http\Controllers\VentaController::class)->middleware('auth');
Route::resource('municipios', App\Http\Controllers\MunicipioController::class)->middleware('auth');
Route::resource('blancosbiologicos', App\Http\Controllers\BlancosbiologicoController::class)->middleware('auth');
Route::resource('productosuseds', App\Http\Controllers\ProductosusedController::class)->middleware('auth');
Route::resource('blancosbiologicosuseds', App\Http\Controllers\BlancosbiologicosusedController::class)->middleware('auth');
Route::resource('cultivosuseds', App\Http\Controllers\CultivosusedController::class)->middleware('auth');
Route::resource('cultivos', App\Http\Controllers\CultivoController::class)->middleware('auth');
Route::resource('ventaterminas', App\Http\Controllers\VentaterminaController::class)->middleware('auth');
Route::resource('tietos', App\Http\Controllers\TietoController::class)->middleware('auth');
Route::resource('ingredientesactivos', App\Http\Controllers\IngredientesactivoController::class)->middleware('auth');
Route::resource('Cultivostietos', App\Http\Controllers\CultivostietoController::class)->middleware('auth');
Route::resource('Blancosbiologicostietos', App\Http\Controllers\BlancosbiologicostietoController::class)->middleware('auth');
Route::resource('Ingredientesactivosuseds', App\Http\Controllers\IngredientesactivosusedController::class)->middleware('auth');
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('Municipiosusers', App\Http\Controllers\MunicipiosuserController::class)->middleware('auth');
Route::resource('Productosxusers', App\Http\Controllers\ProductosxuserController::class)->middleware('auth');
Route::resource('precios_ings', App\Http\Controllers\PreciosIngController::class)->middleware('auth');


Route::get('usersexport', function () {
    return(new UsersExport)->download('users.xlsx');
});
Route::get('ventasexport', function () {
    return(new VentaExport)->download('Venta.xlsx');
});
Route::get('tietoexport', function () {
    return(new TietoExport)->download('Tieto.xlsx');
});
Route::get('ingredientesexport', function () {
    return(new IngredientesExport)->download('Ingredientes.xlsx');
});
// Route::get('cero',App\Http\Controllers\CeroController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
