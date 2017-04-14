<?php
namespace Vanguard\Repositories\Invest;

interface InvestRepository
{
    /**
     * Create $key => $value array for all available countries.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function create(array $data);
}