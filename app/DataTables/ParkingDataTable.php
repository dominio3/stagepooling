<?php

namespace App\DataTables;

use App\Models\Parking;
use Form;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class ParkingDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'parkings.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $parkings = Parking::query()
        ->join('stages' , 'parkings.stages_id' , '=' , 'stages.id')
        ->select('stages.name  as stage_name' ,
                 'parkings.id','parkings.parking_code as parking_code',
                 'parkings.id','parkings.date_init as date_init',
                 'parkings.id','parkings.hour_init as hour_init',
                 'parkings.id','parkings.date_end as date_end',
                 'parkings.id','parkings.hour_end as hour_end',
                 'parkings.id','parkings.state as parking_state'
                 )->where('users_id','=',Auth::user()->id);

        return $this->applyScopes($parkings);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '120px'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => true,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'parking_code' => ['name' => 'parking_code', 'data' => 'parking_code'],
            'date_init' => ['name' => 'date_init', 'data' => 'date_init'],
            'hour_init' => ['name' => 'hour_init', 'data' => 'hour_init'],
            'date_end' => ['name' => 'date_end', 'data' => 'date_end'],
            'hour_end' => ['name' => 'hour_end', 'data' => 'hour_end'],
            'stages' => ['name' => 'stages_id', 'data' => 'stage_name'],
            'state' => ['name' => 'state', 'data' => 'parking_state'] //, 'render' => '"<button src=\""+data+"\" value ="+data+"\ height=\"50\">test</button>"']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'parkings';
    }
}
