<?php


//uoload file 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

public function store(Request $request)
{
    $this->validate($request, [
        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
     }

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('images'), $fileName);

        // you can store fileName to database here
    }

    return back()->with('success', $fileName);
}







//delete file 
use Illuminate\Support\Facades\File;

$filePath = public_path('path/to/your/file.ext');

if (File::exists($filePath)) {
    File::delete($filePath);
}



?>