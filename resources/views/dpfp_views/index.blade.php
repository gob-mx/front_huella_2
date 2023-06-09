{{-- @extends('layouts.dpfp_layout')

@section('title')
Crear Usuarios
@endsection

@section('page_title')
Crear Usuarios
@endsection

@section('content') --}}

<x-base-layout>

	<h3>Users List</h3>
	<table border="1">
		<tr>
			<th>IDENTIFICADOR</th>
			<th>NOMBRE</th>
			{{-- <th>email</th> --}}
			<th></th>
		</tr>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->nombre}} {{$user->apellido_paterno}} {{$user->apellido_materno}}</td>
				{{-- <td>{{$user->email}}</td> --}}
				<td>
			   <a href="users_list/{{$user->id}}/finger-list" style="font-size: 15px;margin-left: 7px;color:#03579f;" >Enrolar Dedos --></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}

</x-base-layout>
{{-- @endsection --}}