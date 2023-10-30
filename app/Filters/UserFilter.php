<?php

namespace App\Filters;

class UserFilter extends ApiFilter
{

    protected $safeParms = [
        'user' => ['search'],
        'email' => ['search'],
        'created_at' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'updated_at' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    ];
    protected $columnMap = [];
}