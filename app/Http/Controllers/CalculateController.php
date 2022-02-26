<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    // This function Calculate multiples and print numbers between (1, 100)
    public function index(Request $request)
    {
        // Validate all users's inputs
        
        $validator = Validator::make($request->all(), [
            'first_number' => 'required|number|max:9|min:1',
            'second_number' => 'required|number|max:9|min:1',
        ]);
 
        if ($validator->fails()) {
            return redirect('welcome')
                        ->withErrors($validator)
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();
    }

}
