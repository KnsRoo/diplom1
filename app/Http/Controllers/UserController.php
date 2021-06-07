<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Models\Mechanic;
use App\Models\Client;

class UserController extends Controller
{
    public function getClients(){
    	$users = Client::all();

    	return response()->json($users, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getMechanics(){
        $users = Mechanic::all();

        return response()->json($users, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getAdmins(){
        $users = User::where('type',2)->get();

        return response()->json($users, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function addClient(RegRequest $req){
        $user = new User;
        $user->fill($req->validated());
        $user->type = 0;
        if ($user->save()){
            return response()->json(['message' => 'saving error'], 422);
        } 

        $client = new Client;

        $client->address = $req->address;
        $client->name = $req->name;
        $client->license_num = $req->license_num;
        $client->tel_num = $req->tel_num;
        $client->user_login = $req->login;

        if (!$client->save()){
            return response()->json(['message' => 'saving error'], 422);
        }
    }

    public function addMechanic(MechanicRequest $req){
    	$user = new User;
    	$user->fill($req->validated());
        $user->type = 1;

        if ($user->save()){
            return response()->json(['message' => 'saving error'], 422);
        } 

        $mechanic->address = $req->address;
        $mechanic->name = $req->name;
        $mechanic->qualification = $req->qualification;
        $mechanic->tel_num = $req->tel_num;
        $mechanic->user_login = $req->login;

        if (!$mechanic->save()){
            return response()->json(['message' => 'saving error'], 422);
        }
    }

    public function removeUser($id){
    	$car = User::findOrFail($id);
    	if ($car->delete()){
    		return response()->json(['message' => 'deleting error'], 401);
    	} 
    	return response()->json(['success' => 'success'], 200);	
    }

    public function login(AuthRequest $req){

        $userData = (Object)$req->validated();

        $user = User::where('login', $userData->login)
                    ->first();

        if (!$user){
            response()->json(['message'=> 'not_found'], 404);
        }

        if ($user->password == $userData->password){
            session(['auth' => true, 'user_type' => $user->type, 'user_login' => $user->login]);

            $type = $user->type;

            if ($type == 0) {
                $user = Client::where('user_login', $user->login)->first();
                $user = ['name' => $user->name, 'type' => $type];
            }

            if ($type == 1) {
                $user = Mechanic::where('user_login', $user->login)->first();
                $user = ['name' => $user->name, 'type' => $type];
            }

            if ($type == 2) {
                $user = ['name' => $user->login, 'type' => $type];
            }

            return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);

        } else {
            return response()->json(['message'=> 'incorrect_pair'], 422);
        }


    }

    public function logout(){
        session(['auth' => NULL, 'user_type' => NULL, 'user_login' => $user-> NULL]);
    }

    public function getUser(){

        if (!session('auth')) {
            return response()->json(['message' => 'Non Authorized'], 401);
        }

        $login = session('user_login');

        $user = User::where('login', $login)->first();

        if ($user->type == 0){
            $user = Client::where('user_login',$login)->first();
        }

        if ($user->type == 1){
            $user = Mechanic::where('user_login',$login)->first();
        }

        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function register(UserRegRequest $req){

        $userData = $req->validated();

        $user = new User;

        $user->fill($req->validated());
        $user->type = 0;

        if (!$user->save()){
            return response()->json(['message' => 'saving error'], 422);
        }

        $client = new Client;

        $client->address = $req->address;
        $client->name = $req->name;
        $client->license_num = $req->license_num;
        $client->tel_num = $req->tel_num;
        $client->user_login = $req->login;

        if (!$client->save()){
            return response()->json(['message' => 'saving error'], 422);
        }
    }
}
