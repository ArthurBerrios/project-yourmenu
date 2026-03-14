<?php
namespace   App\Http\Repositories;

use App\Models\Table;
use App\TableInterfaceRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TableRepository implements TableInterfaceRepository{

    public function create(int $restaurant_id, int $number, bool $active)
    {
        Table::create(
            [
                'restaurant_id' => $restaurant_id,
                'number' => $number,
                'active' => $active
            ]
        );
    }
    public function list(int $restaurant_id)
    {
        return Table::where('restaurant_id', '=', $restaurant_id)->get();
    }
    public function getTablesActives(int $restaurant_id)
    {
        return Table::where('restaurant_id', '=', $restaurant_id)->where('active', '=', true)->get();
    }
    public function find(int $tableId)
    {
        return Table::where('id','=',$tableId)->first();
    }
    public function verifyDate(string $date)
    {
        $addDate = Carbon::parse($date)->addHours(2)->toDateTimeString();
        $lessDate = Carbon::parse($date)->addHours(-2)->toDateTimeString();

        return [
            $lessDate,
            $addDate
        ];
    }
    public function capacitedTables(int $restaurant_id, string $capacity, string $date)
    {
        $date = $this->verifyDate($date);

        return Table::where('restaurant_id', '=', $restaurant_id)
            ->where('capacity', '>=',$capacity)
            ->whereDoesntHave('reserve',function(Builder $query) use ($date){
                $query->whereBetween('date',$date);
            })
            ->get();
    }
}