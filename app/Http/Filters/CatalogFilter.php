<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CatalogFilter extends AbstractFilter
{
    public const CARNAME = 'carName';
    public const CARMODEL = 'carModel';
    public const CARCOLOR = 'carColor';
    public const CARYEAR = 'carYear';
    public const ISNEW ='is_new';
    public const MIN_PRICE = 'min_price';
    public const MAX_PRICE = 'max_price';

    protected function getCallbacks(): array
    {
        return [
            self::CARNAME => [$this, 'carName'],
            self::CARMODEL => [$this, 'carModel'],
            self::CARCOLOR => [$this, 'carColor'],
            self::CARYEAR => [$this, 'carYear'],
            self::MIN_PRICE => [$this, 'minPrice'],
            self::MAX_PRICE => [$this, 'maxPrice'],
            self::ISNEW => [$this, 'is_new'],
        ];
    }

    public function carName(Builder $builder, $value)
    {
        $builder->where('carName', 'like', "%{$value}%");
    }

    public function carModel(Builder $builder, $value)
    {
        $builder->where('carModel', 'like', "%{$value}%");
    }

    public function carColor(Builder $builder, $value)
    {
        $builder->where('carColor', 'like', "%{$value}%");
    }

    public function carYear(Builder $builder, $value)
    {
        $builder->where('carYear', $value);
    }

    public function minPrice(Builder $builder, $value)
    {
        $builder->where('carPrice', '>=', $value);
    }

    public function maxPrice(Builder $builder, $value)
    {
        $builder->where('carPrice', '<=', $value);
    }

    public function is_new(Builder $builder, $value)
    {
        $builder->where('is_new', $value);
    }
}
