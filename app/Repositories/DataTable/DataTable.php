<?php

namespace App\Repositories\DataTable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DataTable
{
    private $of;
    private $request;
    private $with = [];
    private $columns = '*';

    /**
     * @param $model
     * @return $this
     */
    public function of($model, Request $request)
    {
        $this->of = $model;
        $this->request = $request;
        return $this;
    }

    /**
     * @param array|string $with
     * @return DataTable
     */
    public function setWith(array|string $with): static
    {
        $this->with = $with;
        return $this;
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function setColumns(array $columns): static
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        $records = $this->of::with($this->with)->select($this->columns)
            /**
             * Global search value
             */
            ->when($this->isSearchValue(), function ($query) {
                return $query->where(function ($query) {
                    foreach($this->columns() as $column) {
                        if($this->isColumnSearchable($column)) {
                            $query->orWhere($this->columnName($column), 'like', '%' . trim($this->searchValue()) . '%');
                        }
                    }
                });
            })
            /**
             * Column search value
             */
            ->where(function ($query) {
                foreach($this->columns() as $column) {
                    if($this->isColumnSearchValue($column) and $this->isColumnSearchable($column)) {
                        if($this->isColumnSearchRegex($column))
                            $query->where($this->columnName($column), '=', trim($this->columnSearchValue($column)));
                        else
                            $query->where($this->columnName($column), 'like', '%' . trim($this->columnSearchValue($column)) . '%');
                    }
                }
            });

        $filtered = $records->count();

        $records = $records
            /**
             * Ordering
             */
            ->orderBy($this->orderColumnName(), $this->orderDirection())
            ->orderBy('id', 'desc')
            /**
             * Pagination
             */
            ->when(! $this->withoutLimit(), function ($query) {
                return $query->limit($this->limit())->offset($this->offset());
            })->get();

        $records_total = Cache::tags([$this->of::getModel()->getTable()])->rememberForever($this->of::getModel()->getTable() . '_count', function () {
            return $this->of::count();
        });

        return array(
            "draw"            => intval($this->draw()),
            "recordsTotal"    => $records_total,
            "recordsFiltered" => $filtered,
            "data"            => $records
        );
    }

    /**
     * @return array
     */
    private function columns(): array
    {
        return $this->request->input('columns');
    }

    /**
     * @return string|null
     */
    private function searchValue(): ?string
    {
        return $this->request->input('search.value');
    }

    /**
     * @return string
     */
    private function draw(): string
    {
        return $this->request->input('draw');
    }

    /**
     * @param $column
     * @return bool
     */
    private function isColumnSearchable($column): bool
    {
        return $column['searchable'] == 'true';
    }

    /**
     * @param $column
     * @return mixed
     */
    private function columnName($column): string
    {
        return $column['data'];
    }

    /**
     * @param $column
     * @return bool
     */
    private function isColumnSearchRegex($column): bool
    {
        return $column['search']['regex'] == 'false';
    }

    /**
     * @param $column
     * @return string|null
     */
    private function columnSearchValue($column): ?string
    {
        return $column['search']['value'];
    }

    /**
     * @return bool
     */
    private function isSearchValue(): bool
    {
        return !is_null($this->searchValue());
    }

    /**
     * @param mixed $column
     * @return bool
     */
    private function isColumnSearchValue(mixed $column): bool
    {
        return (!is_null($this->columnSearchValue($column)));
    }

    /**
     * @return mixed
     */
    private function orderColumnName(): string
    {
        return $this->columns()[$this->request->input('order.0.column')]['data'];
    }

    /**
     * @return mixed
     */
    private function orderDirection(): string
    {
        return $this->request->input('order.0.dir');
    }

    /**
     * @return bool
     */
    private function withoutLimit(): bool
    {
        return $this->limit() == '-1';
    }

    /**
     * @return mixed
     */
    private function limit()
    {
        return $this->request->input('length');
    }

    /**
     * @return mixed
     */
    private function offset()
    {
        return $this->request->input('start');
    }
}