<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{

    public function pascalTriangle(Request $request){
        $request->validate([
            'number' => 'required|integer|min:1'
        ]);

        $number = $request->get('number');

        $pascalTriangle = [];

        for ($i = 0; $i < $number; $i++) {

            $pascalTriangle[$i] = [];

            $pascalTriangle[$i][0] = 1;
            $pascalTriangle[$i][$i] = 1;

            for ($j = 1; $j < $i; $j++) {
                // Value is the sum of the two numbers directly above it
                $pascalTriangle[$i][$j] = $pascalTriangle[$i - 1][$j - 1] + $pascalTriangle[$i - 1][$j];
            }
        }

        return response()->json([
            'pascalTriangle' => $pascalTriangle
        ]);

    }

    public function isPalindrome(Request $request){
        $request->validate([
            "string" => 'required|string'
        ]);

        $string = $request->get("string");
        $stringLength = strlen($string);
        for ($i = 0; $i <= $stringLength/2; $i++){
            if($string[$i] != $string[$stringLength - 1 - $i]){
                return response()->json([
                    'response' => false,
                    'message' => 'String ' . $string . ' is not a palindrome',
                ]);
            }
        }

        return response()->json([
            'response' => false,
            'message' => 'String ' . $string . ' is a palindrome',
        ]);

    }


    public function isPrime(Request $request){
        $request->validate([
            'number' => 'required|integer'
        ]);

        $number = $request->get('number');

        if($this->checkIfPrime($number)){
            return response()->json(
                ['response' => true,
                'message' => "$number is a prime number."]
            );
        }else{
            return  response()->json(
                ["response" => false,
                    "message" => "$number is a not prime number."
                ]
            );
        }
    }

    private function checkIfPrime($number)
    {
        if ($number <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
