<?php

public function store(Request $request)
{
    $rules = [        
        'name' => 'required|min:3',        
        'email' => 'required|email',        
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Store the data in the database
    //...
    
    return redirect()->back()->with('success', 'Data has been added successfully.');
}

?>