<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class MainController extends Controller
{
    public function login(){
    	return view("login");
    }	

	public function signin(){
		if(auth()->attempt(request()->only("email","password"))){
			return redirect("/test");
		}

		return back();
	}

	public function logout(){
		auth()->logout();
		return redirect("/login");
	}

	public function testIndex(){
		if(!auth()->check()){
			return back();
		}
		
		return view("test",[
			"test" => Test::all()
		]);
	}

	public function testCreate(){		
		Test::create([
			"name" => request()->name,
			"photo" => $this->uploadImage(request()->file('photo'))
		]);

		return back();
	}

	public function uploadImage($image){
        $fileName = rand(0,10000000000000).'.'.$image->getClientOriginalExtension();
        $theImage = new \Intervention\Image\ImageManager();
        $imageChange = $theImage->make($image)
        ->resize(null, 650, function($constraint){
            $constraint->aspectRatio();
        })->save(public_path() . "/images/"."".$fileName);        
        return $fileName;
	}

	public function testDelete(Test $test){
		if(file_exists(public_path()."/images/".$test->photo)){
            unlink(public_path()."/images/".$test->photo);
        }
        $test->delete();      
        return back();
	}
}
