<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\UploadRequest;
use App\Http\Resources\UploadResource;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use JD\Cloudder\Facades\Cloudder;

class UploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        $file = $request->file('file');
        $pathname = $file->getRealPath();

        Cloudder::upload($pathname, null);

        $upload = Upload::create([
            'uploadable_id'   => Auth::user()->id,
            'uploadable_type' => User::class,
            'image_name'      => $file->getClientOriginalName(),
            'image_url'       => Cloudder::getPublicId().'.jpeg',
        ]);

        return new UploadResource($upload);
    }
}
