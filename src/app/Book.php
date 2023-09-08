<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author'
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    public $sortable = [
        'title', 'author'
    ];

    // Filtering the data
    public function scopeFilter($query, array $filters) {
        $isAuthorFilter = $filters['author'] ?? false;
        $isSearch = $filters['search'] ?? false;

        if ($isAuthorFilter) {
            $query->where('author', '=', request('author'));
        }

        if ($isSearch) {
            $query->where('author', 'like', '%' . request('search') . '%')
            ->orWhere('title', 'like', '%' . request('search') . '%');
        }
    }
}
