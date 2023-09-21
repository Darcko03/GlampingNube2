@extends('adminlte::page')

@section('template_title')
    Role Permission
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Role Permission') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('role-permissions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id del Permiso</th>
										<th>Id del Rol</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rolePermissions as $rolePermission)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $rolePermission->permission_id }}</td>
											<td>{{ $rolePermission->role_id }}</td>
                                            

                                            <td>
                                                <form action="{{ route('role-permissions.destroy',$rolePermission->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('role-permissions.show',$rolePermission->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('role-permissions.edit',$rolePermission->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $rolePermissions->links() !!}
            </div>
        </div>
    </div>
@endsection
