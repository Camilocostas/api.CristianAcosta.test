<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;


trait MiTrait
{

    public function scopeIncluded(Builder $query)
    {
        $included = request('included');

        if (empty($this->allowIncluded) || empty($included)) {
            return $query;
        }

        $relations = array_filter(array_map('trim', explode(',', $included)));
        $allowIncluded = collect($this->allowIncluded);

        $relations = array_values(array_filter($relations, function ($relationship) use ($allowIncluded) {
            return $allowIncluded->contains($relationship);
        }));

        return $query->with($relations);
    }


    public function scopeFilter(Builder $query)
    {
        $filters = request('filter');

        // Si la lista blanca o el parametro filter estan vacios, no hace nada
        if (empty($this->allowFilter) || empty($filters) || !is_array($filters)) {
            return $query;
        }

        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter) && $value !== null && $value !== '') {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    

        return $query;
    }

    // scopeSort: permite ordenar resultados desde la URL
    // Ejemplo: /v1/courses?sort=name (asc) o ?sort=-name (desc)
    public function scopeSort(Builder $query)
    {
        $sort = request('sort');

        // Si la lista blanca o el parametro sort estan vacios, no hace nada
        if (empty($this->allowSort) || empty($sort)) {
            return $query;
        }

        $sortFields = array_filter(array_map('trim', explode(',', $sort)));
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {
            $direction = 'asc';

            if (substr($sortField, 0, 1) === '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }

        return $query;
    }

    // scopeGetOrPaginate: retorna todos los registros o paginados desde la URL
    // Ejemplo: /v1/courses?perPage=10
    public function scopeGetOrPaginate(Builder $query)
    {
        $perPageRaw = request('perPage');

        if ($perPageRaw !== null && $perPageRaw !== '') {
            $perPage = (int) $perPageRaw;

            if ($perPage > 0) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}