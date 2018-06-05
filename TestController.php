<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
	public function index(){
		$data = DB::table('test')->orderBy('id', 'DESC')->first();

		return view('test-pp', compact('data'));
	}

	public function save_data(Request $request){
		$name 		= $request['name'];
		$phone 		= $request['phone'];
		$email 		= $request['email'];
		$company 	= $request['company'];

		$filenameWithExt = $request->file('image')->getClientOriginalName();
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
		$extension = $request->file('image')->getClientOriginalExtension();
		$filnameToStore = $filename.'_'.time().'.'.$extension;

		Storage::disk('custom')->put('storage', $request->file('image'));
		// $request->file('image')->move('storage', $filnameToStore);
		
		DB::table('test')->insert(
		    [
		    	'name'    => $name, 
		    	'phone'   => $phone,
		    	'email'   => $email,
		    	'company' => $company,
		    	'image'   => "storage/".$request->file('image')->hashName()
		    	// $filnameToStore
		    	
		    ]
		);

		return redirect()->route('index');
	}
}