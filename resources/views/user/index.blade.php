@extends('template')
@section('content')    
    <div class="table-row">
        <a href="/user-new" class="btn btn-primary">Nueva Cuenta de Usuario</a>
    </div>
    @if (session('success'))
        <div id="succ_kjs34Erwr" class="alert alert-success mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
            <div class="alert-content">{{ session('success') }}</div>
            <div class="alert-close" data-alert="succ_kjs34Erwr">&#215;</div>
        </div>
        <script>
            setInterval(() => {
                document.getElementById('succ_kjs34Erwr').remove()
            }, 2500);
        </script>
    @endif
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>                    
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            @if (!empty($users)) 
                @foreach ($users as $ind => $user)
                    <tr>
                        <td>{{ ($ind + 1) < 10 ? '0'.($ind+1) : $ind }}</td>
                        <td><img src="" alt=""></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->document }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <span 
                                @class([
                                    'tstatus',
                                    'tstatus-active' => ($user->status == 'A'),
                                    'tstatus-inactive' => ($user->status == 'I'),
                                ])
                            >
                            @switch($user->status)
                                @case('I')
                                    Inactive
                                    @break
                                @case('A')
                                    Active
                                    @break
                            @endswitch
                            </span>
                        </td>
                        <td>
                            <div class="table-btn-group">
                                {{-- <a href="/user-edit/{{ $user->id }}" class="table-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    Editar
                                </a> --}}
                                <form action="/user-edit/{{ $user->id }}" method="GET">
                                    @csrf
                                    <button type="submit" class="table-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        Editar
                                    </button>
                                </form> 
                                <form action="/user-delete/{{ $user->id }}" method="POST" name="form_delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="table-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        Eliminar
                                    </button>
                                </form>    
                                {{-- <button name="test">Test</button>                             --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">No hay datos</td>
                </tr>
            @endif 
            </tbody>
        </table>
    </div>
@endsection
<script>
    document.addEventListener('submit', evt => {        
        if (evt.target.matches('[name=form_delete]')){
            if (!confirm('¿Eliminar usuario?')){
                evt.preventDefault()
            }
        }
    })
</script>