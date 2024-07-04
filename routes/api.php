<?php

use Illuminate\Http\Request;
use App\Agent;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::POST('/agent/login', 'Api\AppController@login')->name('app.agent.login');
Route::get('/students/list/{id}', 'Api\AppController@index')->name('app.student.list');
Route::POST('/quickshortlist/store', 'Api\AppController@store')->name('app.quickshortlist.store');
// report 
Route::get('/report/a/list/{id}', 'Api\AppController@agentList')->name('app.report.agent.list');

Route::get('/checkUID/{id}', function($id){


$id = strtoupper($id);
$uid = explode("AO",$id);

$agent = Agent::where('id',(int)$uid['1'])->first();

if($agent) {
// Session::put('status', 'true');
	$status = 'true';
}else{
// Session::put('status', 'false');

	$status = 'false';
}
return $status;
})->name('checkUid');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
