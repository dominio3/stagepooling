<?php

namespace App\DataTables;

use App\Models\Parking;
use Form;
use Yajra\Datatables\Services\DataTable;

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
        $parkings = Parking::query();

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
                'scrollX' => false,
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
            'paking_code' => ['name' => 'paking_code', 'data' => 'paking_code'],
            'date_init' => ['name' => 'date_init', 'data' => 'date_init'],
            'hour_init' => ['name' => 'hour_init', 'data' => 'hour_init'],
            'date_end' => ['name' => 'date_end', 'data' => 'date_end'],
            'hour_end' => ['name' => 'hour_end', 'data' => 'hour_end'],
            'stages_id' => ['name' => 'stages_id', 'data' => 'stages_id'],
            'state' => ['name' => 'state', 'data' => 'state']
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
