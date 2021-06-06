<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Requests\WorkRequest;
use App\Models\Work;

class WorkController extends Controller
{
    public function getWorks(){
    	$works = Work::all();

    	return response()->json($works, 200, [], JSON_UNESCAPED_UNICODE);

    }

    public function addWork(WorkRequest $req){
    	$work = new Work;
    	
        $work->fill($req->validated());

    	if ($work->save()){
    		return response()->json(['message' => 'saving error'], 422);
    	} 

    	return response()->json(['success' => 'success'], 200);
    }

    public function removeWork($id){
    	$work = Work::findOrFail($id);
    	if ($work->delete()){
    		return response()->json(['message' => 'deleting error'], 401);
    	} 
    	return response()->json(['success' => 'success'], 200);	
    }
}
