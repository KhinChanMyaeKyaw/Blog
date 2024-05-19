<?php

use App\Http\Controllers\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/categories', function(){
//     return "Category API";
// });

// Route::get('/categories', [CategoryApiController::class, 'index']);
// Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
// Route::post('/categories', [CategoryApiController::class, 'store']);
// Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
// Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy']);

// You need to write 5 sentences but this one sentence will do for five works.
Route::apiResource('/categories', CategoryApiController::class);

Route::post('/login', function(){
    $email = request()->email;
    $password =request()->password;

    if(!$email or !$password){
        return response(["msg" => "email or password incorrect"], 401);
    }

    $user = \App\Models\User::where("email", $email)->first();
    if($user){
        if (password_verify($password, $user->password)) {
            return $user->createToken('api')->plainTextToken;
        }
    }
    return response(["msg" => "email or password incorrect"], 401);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
