<?php

namespace App\DataTables;

use App\Models\Reservation;
use Form;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class ReservationDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'reservations.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $reservations = Reservation::query()
                ->join('parkings' , 'reservations.parkings_id' , '=' , 'parkings.id')
                ->join('vehicules' , 'reservations.vehicules_id' , '=' , 'vehicules.id')
                ->select('parkings.parking_code as parkings_code',
                         'parkings.date_init as date_init',
                         'parkings.hour_init as hour_init',
                         'parkings.date_end as date_end',
                         'parkings.hour_end as hour_end',
                         'vehicules.patent as vehicules_patent',
                         'reservations.id','reservations.reservation_code as reservation_code',
                         'reservations.state as state')
                ->where('reservations.users_id','=',Auth::user()->id);

        return $this->applyScopes($reservations);
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
            'reservation_code' => ['name' => 'reservation_code', 'data' => 'reservation_code'],
            'parking_code' => ['name' => 'parkings_id', 'data' => 'parkings_code'],
            'Date_init' => ['name' => 'date_init', 'data' => 'date_init'],
            'Hour_init' => ['name' => 'hour_init', 'data' => 'hour_init'],
            'Date end' => ['name' => 'date_end', 'data' => 'date_end'],
            'Hour_end' => ['name' => 'hour_end', 'data' => 'hour_end'],
            'vehicule' => ['name' => 'vehicules_id', 'data' => 'vehicules_patent'],
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
        return 'reservations';
    }
}
