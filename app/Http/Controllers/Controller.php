<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseException($resp)
    {
      return response()->json(['message' => $resp->getMessage(), 'trace' => $resp->getTraceAsString()], 500);
    }

    public function responseOk($resp)
    {
      return response()->json($resp, 200);
    }

    public function responseCreated($resp)
    {
      return response()->json($resp, 201);
    }

    public function responseInvalidPayload($resp)
    {
      return response()->json($resp, 422);
    }
}
