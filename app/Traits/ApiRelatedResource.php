<?php

namespace App\Traits;

use App\Traits\ApiResource;
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
    public function fetchModel($id)
    {
        $model = app(Model::class)->findOrFail($id);
        $related = $this->related;

        return $related->where([
            $model->getForeignKey() => $model->id,
            'id' => $id,
        ])->firstOrFail();
    }

    /**
     * Fill and save model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function fillAndSave(&$model)
    {
        $related = $this->related;

        $data = array_merge(request()->all(), [
            $model->getForeignKey() => $model->id,
        ]);

        return $related->fill($data)->save();
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
