<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactusResource;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts= contact::orderBy('id', 'desc')->get();
        return  $this->sendResponse( ContactusResource::collection($contacts),201);

    }

    public function show(Request $request,$id)
    {
        App::setLocale($request->header('Accept-Language'));
        $contacts= Contact::find($id);
        return  $this->sendResponse( new ContactusResource($contacts),201);

    }
}
