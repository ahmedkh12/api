<?php

namespace App\Http\Controllers;

use App\Traits\jsonformat;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Http\Resources\catResource;
use Illuminate\Support\Facades\Validator;
use App\Traits;


class catcontroller extends Controller
{
    use jsonformat;
   public function index(){
    $catgs = Cat::get();


    if($catgs){
//        return response($success_format);
        return $this->succes_format($catgs);
    }
    else{
        return $this->failed_format($catgs);
    }


  //---------------------------------- function index will return all api data -------------------//



   }

   public function show_cat($cat_id){
    $catgs =  Cat::find($cat_id);  //api resource make us to modify column names to users
       if($catgs){
           return $this->succes_format($catgs);
       }
       else{
           return $this->failed_format($catgs);
       }




    //---------------function show_cat will show one cat by its id ----//
}



public function store(Request $req){
    $validator = Validator::make($req->all(), [
        'name' => 'required',
        'price' => 'required',
    ]); // validate the input

    if ($validator->fails()) {
        return response($validator->errors());
    } // return the response with the value of the required
   $cat =  Cat::create($req->all());
    if($cat){
       return $this->success_insert($cat);
    }
    else
    return $this->failed_insert($cat);



}

// function store will get the data from the postman and save it to database



public function update(Request $req , $id){

       $cat = Cat::find($id);
       //$cat->update($req->all());
    if($cat){
        $cat->name = $req->name;
        $cat->price = $req->price;
        $cat->save();
        return response($cat );
    }
    else{
        return response('cat not found');
    }





}


    public function destroy ($id){

        $cat = Cat::find($id);
        if($cat){
            $cat->delete();
            return response($cat);
        }
        else{
            return response('cat not found');
        }



    }





}
