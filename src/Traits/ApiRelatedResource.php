<?php

namespace Harlekoy\EventDriven\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait ApiRelatedResource
{
    use ApiResource;

    /**
     * Model related.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $related;

    /**
     * Fetch model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchModel($relatedId)
    {
        $id = $this->modelId();

        $model = app(Model::class)->findOrFail($id);
        $related = new $this->related;

        return $related->where([
            $model->getForeignKey() => $model->id,
            'id' => $relatedId,
        ])->firstOrFail();
    }

    /**
     * Get model ID.
     *
     * @return int
     */
    protected function modelId()
    {
        $model = app(Model::class);

        return request()->route(
            str_singular($model->getTable())
        );
    }

    /**
     * Fetch records based on query params.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function fetchRecords()
    {
        $id = $this->modelId();

        $model = app(Model::class)->findOrFail($id);
        $related = (new $this->related)->where([
            $model->getForeignKey() => $model->id,
        ]);

        if ($page = request()->get('page')) {
            return $related->paginate($this->limit());
        }

        return $related->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $relatedId)
    {
        $model = $this->fetchModel($relatedId);

        return $this->apiResponse($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $model = app(Model::class);
        $related = new $this->related;
        $related->{$model->getForeignKey()} = $id;

        $this->fillAndSave($related);

        return $this->apiResponse($related);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $relatedId)
    {
        $model = $this->fetchModel($relatedId);

        $this->fillAndSave($model);

        return $this->apiResponse($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $relatedId)
    {
        $model = $this->fetchModel($relatedId);

        $model->delete();

        return $this->apiResponse($model);
    }

    /**
     * Boot controller app instances.
     *
     * @return void
     */
    public function apiInstances($instances)
    {
        $this->related = $instances['related'];
        $this->resource = $instances['resource'];

        app()->instance(Request::class, new $instances['request']);
        app()->instance(Model::class, new $instances['model']);
    }
}
