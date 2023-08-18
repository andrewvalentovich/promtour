<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class CompanyFilter extends AbstractFilter
{
    const CATEGORY = 'category';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category_by_id'],
        ];
    }

    protected function category_by_id(Builder $builder, $value)
    {
        if(isset($value)) {
            $builder->whereHas('category', function ($query) use ($value) {
                $query->where('categories.id', $value);
            });
        }
    }
}
