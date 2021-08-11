<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SomeController extends Controller
{
    public function foo(Request $request, $id)
    {
      $payload = json_decode($request->getContent(), true);
      try {
        // Get data here, eg. make an external API request or DB query
        $response = [
          'id' => $id,
          'name' => $payload['name']
        ];
      } catch (\GuzzleHttp\Exception\BadResponseException $e) {
        $errorResJson = $e
          ->getResponse()
          ->getBody()
          ->getContents();
        $errorRes = json_decode(stripslashes($errorResJson), true);
        // Return error
        return response()->json(
          [
            'message' => 'error',
            'data' => $errorRes
          ],
          $errorRes['response']['code']
        );
      }
      // Return success
      return response()->json(
        [
          'status' => '200',
          'data' => $response,
          'message' => 'success'
        ],
        200
      );
    }
}
