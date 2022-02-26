<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class CalculateController extends Controller
{
    // This function Calculate multiples and print numbers between (1, 100)
    public function index(Request $request)
    {
        // Validate all users's inputs
        $validator = Validator::make($request->all(), [
            'first_number' => 'required|integer|max:9|min:1',
            'second_number' => 'required|integer|max:9|min:1',
        ]);
 
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();
        $result = array();
        
        for ($i = 1; $i <= 100; $i++) {
            $a = [array($i, $validated['first_number']), array($i, $validated['second_number']), array($i, $validated['first_number']*$validated['second_number']) ];
        $b = array($this->mul($a[0]), $this->mul($a[1]), $this->mul($a[2]));
       
            if(! in_array(true, $b) )
            array_push($result, $i);
            else
            switch ($b) {
                case array(true, false, false):
                    array_push($result, 'Frizz');
                    break;
                case array(false, true, false):
                    array_push($result, 'Buzz');
                    break;
                case array(true, true, true):
                    array_push($result, 'FrizzBuzz');
                    break;
            }

        }
    
        return view('welcome', ['result' => $result]);
    }
    public function mul(array $number)
    {
        if( $number[0] % $number[1] == 0)
        return true;
        else
        return false;
    }   


}
