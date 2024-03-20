<?php

namespace Vanier\Api\Models;

class ConsumptionModel extends BaseModel 
{
    public function getAllConsumptions(array
    $filters): array
    {
        $sql = "SELECT * FROM consumptions WHERE 1";

        $filters_values = []; 
        if (isset($filters['csc'])) {
            $filters_values['csc'] = $filters['csc'];
        }

        $sql .= " ORDER BY consumption_id " .
        $this->sortingOrder($filters);
        return ['consumptions' => $this->paginate($sql, $filters_values)];
    }
}