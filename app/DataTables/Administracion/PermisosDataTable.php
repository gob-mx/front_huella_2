<?php

namespace App\DataTables\Administracion;

use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\Administracion\Moduls;
use App\Models\User;

class PermisosDataTable extends DataTable
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
			->rawColumns(['acciones','name','permissions'])
			->addColumn('acciones', function (Collection $model) {

				$btn = '<td class="text-end">
							<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3 boton_add_permiso" data-index="'.$model['id'].'" data-modulo="'.$model['name'].'" data-acronimo="'.$model['acronym'].'" data-bs-toggle="modal" data-bs-target="#kt_modal_add_permission">
								<span class="svg-icon svg-icon-2x svg-icon-primary">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
										<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
									</svg>
								</span>
							</button>
						</td>';

                return $btn;
            })
            ->editColumn('name', function (Collection $model) {
				return '<span class="badge badge-light-warning fs-7 m-1 boton_edit_modul" data-index="'.$model['id'].'" data-modulo="'.$model['name'].'" data-acronimo="'.$model['acronym'].'" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_modul" style="cursor: pointer">'.$model['name'].'</span>';
            })
            ->editColumn('permissions', function (Collection $model) {
				$permisos = '';
				foreach ($model['permissions'] AS $permiso) { 
					$permisos .= '<span class="badge badge-light-primary fs-7 m-1 boton_edit_permiso" data-index="'.$permiso['id'].'" data-modulo="'.$model['name'].'" data-acronimo="'.$model['acronym'].'" data-permisoName="'.substr_replace($permiso['name'],'' ,-strlen('_'.$model['acronym'])).'" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_permission" style="cursor: pointer">'.$permiso['name'].'</span>'; 
				}
				return $permisos;
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
	public function query(Moduls $model)
	{
		/*============================================================================
		=            Valida que solo roles SADMIN puedan mismo rol SADMIN            =
		============================================================================*/
		$userRoles = auth()->user()->getRoleNames()->toArray();
		if ( !in_array('SADMIN', $userRoles) ) {
			$model = $model->whereNotIn('name',['LOGS']);
		}

		/************************************* O P C I O N   1 *********************************/
		$data = collect();
		$data = $model->with('Permissions')->get()->merge($data);

		// dd('$data',$data);


		$data = $data->map(function ($a) {
			return (collect($a))->only([
				'id',
				'name',
				'acronym',
				'active',
				'permissions',
			]);
		});

		// dd('$data',$data[0]['permissions']);
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
			->setTableId('permisos_table')
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
					// 'csv',
					// 'copy',
					// 'pdf',
					// 'print',
				],
			])
			// ->addTableClass('fw-semibold text-gray-600')
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
			Column::make('name')->title('MODULO'),
			Column::make('permissions')
				->title('PERMISOS')
                ->sortable(true),
			// Column::make('active')->title('ACTIVO'),
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
