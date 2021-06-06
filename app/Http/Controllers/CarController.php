<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Client;

class CarController extends Controller
{
    public function getCars(){
    	$cars = Car::all();

    	return response()->json($cars);

    }

    public function getMyCars(){
        if (!session('auth')){
            return response()->json(['message' => 'Non Authorized'], 301);
        }

        $login = session('user_login');
        $client = Client::where('user_login',$login)->first();

        $cars = $client->cars()->get();

        return response()->json($cars);
    }

    public function addCar(CarRequest $req){
    	$car = new Car;
    	$car->fill($req->validated());
    	if ($car->save()){
    		return response()->json(['message' => 'saving error'], 422);
    	} 

    	return response()->json(['success' => 'success'], 200);
    }

    public function removeCar($id){
    	$car = Car::findOrFail($id);
    	if ($car->delete()){
    		return response()->json(['message' => 'deleting error'], 401);
    	} 
    	return response()->json(['success' => 'success'], 200);	
    }
}
