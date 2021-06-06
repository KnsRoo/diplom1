<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Requests\UserReqRequest;
use App\Models\Request as UserReq;

class RequestController extends Controller
{
    public function getRequests(){
    	$requests = UserReq::all();

    	return response()->json($requests, 200, [], JSON_UNESCAPED_UNICODE);

    }

    public function getMyRequests(){
        if (!session('auth')){
            return response()->json(['message' => 'Non Authorized'], 301);
        }

        $login = session('user_login');

        $requests = UserReq::where('user_login', $login)->get();

        return response()->json($requests);

    }

    public function addRequest(UserReqRequest $req){
    	$request = new UserReq;
    	$request->fill($req->validated());
    	if ($request->save()){
    		return response()->json(['message' => 'saving error'], 422);
    	} 

    	return response()->json(['success' => 'success'], 200);
    }

    public function removeRequest($id){
    	$car = UserReq::findOrFail($id);
    	if ($car->delete()){
    		return response()->json(['message' => 'deleting error'], 401);
    	} 
    	return response()->json(['success' => 'success'], 200);	
    }
}
