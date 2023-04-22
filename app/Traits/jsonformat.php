<?php
namespace App\Traits;
use App\Models\Cat;

trait jsonformat {
      public function failed_format($catgs){
          $failed_format = [
              'data' => $catgs,
              'msg' => "false",
              'status' => 404,
              'response details' => 'API data'
          ];
          return response($failed_format);


      }

    public function succes_format($catgs){
        $success_format = [
            'data' => $catgs,
            'msg' => "ok",
            'status' => 200,
            'response details' => 'API data'
        ];
        return response($success_format);


    }

    public function success_insert($catgs){
        $success_insert = [
            'data' => $catgs,
            'msg' => "ok",
            'status' => 201,
            'response details' => 'API data'
        ];
        return response($success_insert);


    }

    public function failed_insert($catgs){
        $failed_insert = [
            'data' => $catgs,
            'msg' => "ok",
            'status' => 201,
            'response details' => 'API data'
        ];
        return response($failed_insert);


    }

}
