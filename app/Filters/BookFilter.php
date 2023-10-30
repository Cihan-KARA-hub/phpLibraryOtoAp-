<?php

namespace App\Filters;

class BookFilter extends ApiFilter
{

    protected $safeParms = [
        'user_id' => ['eq'],
        'header' => ['search'],
        'author' => ['search'],
        
        'created_at' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'updated_at' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    ];
    protected $columnMap = [];
}