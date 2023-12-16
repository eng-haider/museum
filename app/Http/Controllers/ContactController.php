<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\contact;
use App\Models\About;
use App\Models\InputsSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use finfo;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about=About::get()->first();
        return view('pages.contact ')->with(['about'=>$about ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = '';
        $filepath = '/home/alkafeel/public_html/museum_test/back/upload/contact/';
        $finfo = new finfo(FILEINFO_MIME);
        if($_FILES["file"]['name'] != '') {
            if (in_array($finfo->file($_FILES["file"]['tmp_name']) , array('image/jpeg; charset=binary' , 'image/png; charset=binary' , 'image/gif; charset=binary', 'application/pdf; charset=binary')) && $_FILES['file']['size'] < 5120000) {
                $ext = pathinfo($_FILES["file"]['name'])['extension'];
                $img = bin2hex(random_bytes(8)).'.'.$ext;
                // move_uploaded_file($_FILES['file']['tmp_name'], $filepath.$img);
                // Image::make($request->file('file'))->save($filepath.$img);
 
                // $path = Storage::disk('public')->put($filepath.$img, file_get_contents($request->file));
                // $path = Storage::disk('public')->url($path);
                
                $request->file->move($filepath, $img);
            } else {
                return back()->withErrors([' تحقق من الملف ']);
            }
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'file'=>$img
        ];
        $contact=contact::create($details);

        //Mail::to('museum@alkafeel.net')->send(new ContactMail($details));
        return back()->with(['success'=>'تم الارسال بنجاح']);
    }


}
