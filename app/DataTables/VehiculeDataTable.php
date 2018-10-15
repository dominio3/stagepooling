<?php

namespace App\DataTables;

use App\Models\Vehicule;
use Form;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class VehiculeDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'vehicules.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $vehicules = Vehicule::query()->where('users_id','=',Auth::user()->id);

        return $this->applyScopes($vehicules);
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
            'patent' => ['name' => 'patent', 'data' => 'patent'],
            'trademark' => ['name' => 'trademark', 'data' => 'trademark'],
            'type' => ['name' => 'type', 'data' => 'type'],
            'model' => ['name' => 'model', 'data' => 'model'],
            'color' => ['name' => 'color', 'data' => 'color'],
            'state' => ['name' => 'state', 'data' => 'state'],
            'observation' => ['name' => 'observation', 'data' => 'observation'],
            //'users_id' => ['name' => 'users_id', 'data' => 'users_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vehicules';
    }
}
