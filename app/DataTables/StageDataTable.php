<?php

namespace App\DataTables;

use App\Models\Stage;
use Form;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class StageDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'stages.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $stages = Stage::query()->where('users_id','=',Auth::user()->id);

        return $this->applyScopes($stages);
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
            'name' => ['name' => 'name', 'data' => 'name'],
            'address' => ['name' => 'address', 'data' => 'address'],
            'locality' => ['name' => 'locality', 'data' => 'locality'],
            'province' => ['name' => 'province', 'data' => 'province'],
            'zipcode' => ['name' => 'zipcode', 'data' => 'zipcode'],
            'latitude' => ['name' => 'latitude', 'data' => 'latitude'],
            'longitude' => ['name' => 'longitude', 'data' => 'longitude'],
            'observation' => ['name' => 'observation', 'data' => 'observation'],
            'photo' => ['name' => 'photo', 'data' => 'photo'],
            'state' => ['name' => 'state', 'data' => 'state'],
            'users_id' => ['name' => 'users_id', 'data' => 'users_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stages';
    }
}
