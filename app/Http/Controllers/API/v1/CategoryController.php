<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Category::class,
            'request'  => Request::class,
            'resource' => CategoryResource::class,
        ]);
    }
}
