<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Http\Resources\catResource;
use Illuminate\Support\Facades\Validator;


class catcontroller extends Controller
{
   public function index(){
    $catgs = Cat::get();
    $success_format = [
        'data' => $catgs,
        'msg' => "ok",
        'status' => 200,
        'response details' => 'API data'
    ];
    // we can format the response as we can

    $failed_format = [
        'data' => $catgs,
        'msg' => "fail",
        'status' => 404,
        'response details' => 'API data'
    ];

    if($catgs){
//        return response($success_format);
        return response()->json($success_format);
    }
    else{
        return response($failed_format);
    }




  // we can return data from the model as we can

    // foreach (Cat::all() as $flight) {
    //     echo $flight;
    // }

    // $flights = Cat::where('price', 20)
    //            ->get();

    // $flight = Cat::findOr(1, function () {
    //     return 'no result found ';
    // });
    // $flight = Cat::findOrFail(1);
    // echo $flight;

    // $flight = Cat::Create([
    //     'name' => 'London to Paris',
    //     'price' => 20
    // ]);  // will insert record in the database
    // $count = Cat::all()->count(); //will count the recordes
    // echo $count;

  //---------------------------------- function index will return all api data -------------------//



   }

   public function show_cat($cat_id){
    $catgs =  Cat::find($cat_id);  //api resource make us to modify column names to users
    $success_format = [
        'data' => $catgs,
        'msg' => "ok",
        'status' => 200,
        'response details' => 'API data'
    ];
    // we can format the response as we can

    $failed_format = [
        'data' => $catgs,
        'msg' => "fail",
        'status' => 404,
        'response details' => 'API data'
    ];

    if($catgs){
        return response($success_format);
    }
    else{
        return response($failed_format);
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
   $success_insert = [
    'data' => $cat,
    'msg' => "ok",
    'status' => 201,
    'response details' => 'API data'
];
$failed_insert = [
    'data' => $cat,
    'msg' => "failed",
    'status' => 400,
    'response details' => 'API data'
];
    if($cat){
        return response($success_insert);
    }

    else
    return response($failed_insert);



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
