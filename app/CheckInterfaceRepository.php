<?php

namespace App;

interface CheckInterfaceRepository
{
    public function getCheckPaidFromTable(int $table_id);
    public function findById(int $id);
    public function getChecksNoPaids(int $restaurant_id);
}
