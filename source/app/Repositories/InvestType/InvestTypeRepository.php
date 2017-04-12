<?php

namespace Vanguard\Repositories\InvestType;
interface InvestTypeRepository
{
    /**
     * Create $key => $value array for all available countries.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function getAll($status = null);
}