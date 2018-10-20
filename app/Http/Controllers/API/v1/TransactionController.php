<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Traits\ApiResource;

class TransactionController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Transaction::class,
            'request'  => TransactionRequest::class,
            'resource' => TransactionResource::class,
        ]);
    }
}
