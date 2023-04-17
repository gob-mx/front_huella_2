<?php

namespace App\DataTables\Administracion;

use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\User;

class UsuariosDataTable extends DataTable
{
	/**
	 * Build DataTable class.
	 *
	 * @param  mixed  $query  Results from query() method.
	 *
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query)
	{
		// dd($query);
		return datatables()
			->collection($query)
			->rawColumns(['acciones'])
			->addColumn('acciones', function (Collection $model) {

				// return view('administracion.usuarios.partial.botones_dt_usuarios', compact('model'));

				$btn = '<td class="text-end">
							<a href="'. route('administracion.usuarios.edit', $model['id']) .'" class="btn btn-sm btn-danger fw-bold">
								VER
							</a>
						</td>';

                return $btn;
            })
            ->editColumn('nombre', function (Collection $model) {
                return $model['nombre'].' '.$model['apellido_paterno'].' '.$model['apellido_materno'];
            })
            ;
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param  LogReader  $model
	 *
	 * @return Collection
	 */
	public function query(User $model)
	{
		// $model->setLogPath(storage_path('logs'));

		/************************************* O P C I O N   1 *********************************/
		$data = collect();
		$data = $model->get()->merge($data);

		$data = $data->map(function ($a) {
			return (collect($a))->only([
				'id',
				'usuario',
				'nombre',
				'apellido_paterno',
				'apellido_materno',
				'email',
				'rfc',
				'curp',
				'activo'
			]);
		});

		return $data;

		/************************************* O P C I O N   2 *********************************/
		// $data = User::with('info')->get();
		// return $data;

		/************************************* O P C I O N   3 *********************************/
		// return $model->with(['info'])->get();
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html()
	{
		return $this->builder()
			->setTableId('usuarios_table')
			->columns($this->getColumns())
			->minifiedAjax()
			->stateSave(true)
			->orderBy(0,'ASC')
			->responsive()
			->autoWidth(false)
			->parameters(['scrollX' => true])
			->addTableClass('align-middle table-row-dashed fs-6 gy-5')
			->dom(domDT())
			->language(spanishDT())
			->parameters([
				'buttons' => [
					// 'excel',
					// 'pdf',
					// 'print',
					// [
					// 	'text' => 'Crear Modulo',
					// 	'className' => 'text-danger',
					// ]
				],
			])
			;
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns()
	{
		return [
			Column::make('id')->title('ID')->addClass('ps-0'),
			Column::make('usuario'),
			Column::make('nombre')->title('NOMBRE'),
			// Column::make('apellido_paterno')->title('APELLIDO 1'),
			// Column::make('apellido_materno')->title('APELLIDO 2'),
			Column::make('rfc')->title('RFC'),
			Column::make('curp')->title('CURP'),
			Column::make('activo')->title('ACTIVO'),
			Column::make('email')->width(200),
			Column::computed('acciones')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->responsivePriority(-1),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	/*protected function filename()
	{
		return 'SystemLogs_'.date('YmdHis');
	}*/
}
