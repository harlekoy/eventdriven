<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FilterResource
{
    /**
     * @var \App\Nova\Resource
     */
    protected $resource;

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @var string
     */
    protected $field;

    /**
     * @var string
     */
    protected $relatedField;

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $related;

    public function __construct($resource, $field = null)
    {
        $data = $this->init();

        $this->resource = $resource;
        $this->model = $resource->resource;
        $this->field = $data['model_field'];
        $this->relatedField = $data['related_field'];
        $this->related = $data['related_instance'];
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where($this->field, $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return $this->related
            ->query()
            ->whereIn($this->relatedField, $this->available())
            ->pluck($this->relatedField, 'name');
    }


    /**
     * Get available field data.
     *
     * @return array
     */
    public function available()
    {
        return $this->model
            ->query()
            ->distinct()
            ->pluck($this->field)
            ->all();
    }
}
