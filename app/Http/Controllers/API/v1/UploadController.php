<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Http\Resources\UploadResource;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        list($width, $height) = getimagesize($pathname);

        $url = Cloudder::show(
            Cloudder::getPublicId(), compact('width', 'height')
        );

        $upload = Upload::create([
            'image_name' => $file->getClientOriginalName(),
            'image_url'  => $url,
        ]);

        return new UploadResource($upload);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadRequest $request, Upload $upload)
    {
        $types =  $request->uploadables();

        $upload->fill([
            'model_type' => $types[$request->type_name],
            'model_id'   => $request->type_id
        ])->save();

        return new UploadResource($upload);
    }
}
