<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ExcursionFilter extends AbstractFilter
{
    const CATEGORY = 'category';
    const AGE_LIMIT = 'age_limit';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category_by_id'],
            self::AGE_LIMIT => [$this, 'age_limit_by_id'],
        ];
    }

    protected function category_by_id(Builder $builder, $value)
    {
        if(isset($value) && $value != "false") {
            $builder->whereHas('category', function ($query) use ($value) {
                $query->where('categories.id', $value);
            });
        }
    }

    protected function age_limit_by_id(Builder $builder, $value)
    {
        if(isset($value) && $value != "false") {
            $builder->where('age_limit', "<=", $value);
        }
    }
}
