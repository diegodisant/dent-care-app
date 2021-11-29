<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    private const MIDDLEWARE_AUTH_API = 'auth:api';
    private const RULE_EXCEPT = 'except';
    private const ROUTE_INDEX = 'index';
    private const ROUTE_SHOW = 'show';

    private const ROUTES_EXCLUDED = [
        self::ROUTE_INDEX,
        self::ROUTE_SHOW,
    ];

    public function __construct()
    {
        $this->middleware(
            self::MIDDLEWARE_AUTH_API,
            [
                self::RULE_EXCEPT => self::ROUTES_EXCLUDED,
            ]
        );
    }
}
