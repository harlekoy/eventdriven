<?php

namespace Harlekoy\EventDriven\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResource
{
    /**
     * API resource.
     *
     * @var string
     */
    public $resource;

    /**
     * @var integer
     */
    public $limit = 15;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances($this->init());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Model $model)
    {
        $records = $this->fetchRecords();

        return $this->apiResponse($records);
    }

    /**
     * Fire the given event for the controller.
     *
     * @param  string  $event
     * @param  bool  $halt
     * @return mixed
     */
    protected function fireControllerEvent($event, $request, &$model)
    {
        if (method_exists($this, $event)) {
            $this->$event($request, $model);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Model $model)
    {
        app(get_class($request));

        $this->fireControllerEvent('creating', $request, $model);
        $this->fireControllerEvent('saving', $request, $model);

        $this->fillAndSave($model);

        $this->fireControllerEvent('created', $request, $model);
        $this->fireControllerEvent('saved', $request, $model);

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
        app(get_class($request));

        $model = $this->fetchModel($id);

        $this->fireControllerEvent('creating', $request, $model);
        $this->fireControllerEvent('saving', $request, $model);

        $this->fillAndSave($model);

        $this->fireControllerEvent('updated', $request, $model);
        $this->fireControllerEvent('saved', $request, $model);

        return $this->apiResponse($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = $this->fetchModel($id);

        $this->fireControllerEvent('deleting', $request, $model);

        $model->delete();

        $this->fireControllerEvent('deleted', $request, $model);

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

        if ($model instanceOf Collection ||
            $model instanceOf LengthAwarePaginator) {
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
        $model = app(Model::class)->with($this->with());

        return $model->findOrFail($id);
    }

    /**
     * Return collection with additional relationship data.
     *
     * @return array
     */
    protected function with()
    {
        if ($with = request()->get('with')) {
            return array_map('trim', explode(',', $with));
        }

        return [];
    }

    /**
     * Fetch records based on query params.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function fetchRecords()
    {
        $model = app(Model::class)->with($this->with());

        $this->fireControllerEvent('fetching', $request = request(), $model);

        if ($page = $request->get('page')) {
            return $model->paginate($this->limit());
        }

        return $model->get();
    }

    /**
     * Get request limit or return the default if not exist.
     *
     * @return int
     */
    public function limit()
    {
        return request()->get('limit', $this->limit);
    }

    /**
     * Fill and save model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function fillAndSave(&$model)
    {
        $model->fill(request()->all());

        if (method_exists($this, 'creating')) {
            $this->creating(request(), $model);
        }

        return $model->save();
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
