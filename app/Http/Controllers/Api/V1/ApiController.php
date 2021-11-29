<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class ApiController extends Controller
{
    public const PAGINATION_PAGE_SIZE = 10;

    public const PAGINATION_FIELD_TOTAL = 'total';
    public const PAGINATION_FIELD_PER_PAGE = 'per_page';
    public const PAGINATION_FIELD_CURRENT_PAGE = 'current_page';
    public const PAGINATION_FIELD_LAST_PAGE = 'last_page';
    public const PAGINATION_FIELD_FIRST_PAGE_URL = 'first_page_url';
    public const PAGINATION_FIELD_LAST_PAGE_URL = 'last_page_url';
    public const PAGINATION_FIELD_NEXT_PAGE_URL = 'next_page_url';
    public const PAGINATION_FIELD_PREV_PAGE_URL = 'prev_page_url';
    public const PAGINATION_FIELD_PATH = 'path';
    public const PAGINATION_FIELD_FROM = 'from';
    public const PAGINATION_FIELD_TO = 'to';

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

    protected function buildPaginationData(LengthAwarePaginator $paginator): array
    {
        return [
            self::PAGINATION_FIELD_TOTAL => $paginator->total(),
            self::PAGINATION_FIELD_PER_PAGE => $paginator->perPage(),
            self::PAGINATION_FIELD_CURRENT_PAGE => $paginator->currentPage(),
            self::PAGINATION_FIELD_LAST_PAGE => $paginator->lastPage(),
            self::PAGINATION_FIELD_FIRST_PAGE_URL => $paginator->url(1),
            self::PAGINATION_FIELD_LAST_PAGE_URL => $paginator->url($paginator->lastPage()),
            self::PAGINATION_FIELD_NEXT_PAGE_URL => $paginator->nextPageUrl(),
            self::PAGINATION_FIELD_PREV_PAGE_URL => $paginator->previousPageUrl(),
            self::PAGINATION_FIELD_PATH => $paginator->path(),
            self::PAGINATION_FIELD_FROM => $paginator->firstItem(),
            self::PAGINATION_FIELD_TO => $paginator->lastItem(),
        ];
    }
}
