<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait ApiResource
{
    /**
     * API resource.
     *
     * @var string
     */
    public $resource;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Model $model)
    {
        return $this->apiResponse($model->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Model $model)
    {
        $this->fillAndSave($model);

        return $this->apiResponse($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->fetchModel($id);

        return $this->apiResponse($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = $this->fetchModel($id);

        $this->fillAndSave($model);

        return $this->apiResponse($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->fetchModel($id);

        $model->delete();

        return $this->apiResponse($model);
    }

    /**
     * API resource response.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     *
     * @return array
     */
    public function apiResponse($model)
    {
        $apiResource = $this->resource;

        if ($model instanceOf Collection) {
            return $apiResource::collection($model);
        }

        return new $apiResource($model);
    }

    /**
     * Fetch model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchModel($id)
    {
        $model = app(Model::class);

        return $model->findOrFail($id);
    }

    /**
     * Fill and save model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function fillAndSave(&$model)
    {
        return $model->fill(request()->all())->save();
    }

    /**
     * Boot controller app instances.
     *
     * @return void
     */
    public function apiInstances($instances)
    {
        app()->instance(Request::class, new $instances['request']);
        app()->instance(Model::class, new $instances['model']);

        $this->resource = $instances['resource'];
    }
}
