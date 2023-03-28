<?php

namespace App\Http\Traits;

trait TestTrait
{
    public function apiResponse($data = null, $message = null, $statues = null)
    {
$array=[
  'data'=>$data,
    'message'=>$message,
    'statues'=>$statues,
];
return response($array);
    }
}