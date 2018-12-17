<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\AccountSetupResource;
use App\Models\AccountSetup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $account = AccountSetup::whereUserId($user->id)->first();

        return new AccountSetupResource($account);
    }
}
