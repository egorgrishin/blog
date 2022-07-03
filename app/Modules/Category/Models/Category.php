<?php

namespace App\Modules\Category\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Category model
 *
 * @mixin Builder
 * @package App\Modules\Category\Models
 */
class Category extends Model
{
    protected $fillable = [
        'title',
    ];
}
