@extends('template')
@section('content')
    <form action="/user-update" method="post" class="form-container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            <div class="alert-content">
                Errores Encontrados
                <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
                </ul>
            </div>
            <div class="alert-close">&#215;</div>
        </div>
        @endif
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
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="hidden" name="profile_id" value="{{ $user->profile_id }}">
        <div class="w-100 form-group">
            <label for="" class="form-label">Nombre</label>
            <input type="text" name="name" value="{{$user->name}}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Apellido</label>
            <input type="text" name="lastname" value="{{$user->lastname}}">
            @error('lastname')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Documento</label>
            <input type="text" name="document" value="{{ $user->document }}">
            @error('document')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Fecha Nacimiento</label>
            <input type="date" name="birth_date" value="{{$user->birth_date}}">
            @error('birth_date')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" value="{{ $user->email }}">
            {{-- esmith@mail.com --}}
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Rol</label>
            <select name="role" value="{{ old('role') }}">
            @foreach ($roles as $key => $rol)
                <option value="{{ $rol['id'] }}" {{($user->role === $rol['id']) ? 'selected' : ''}}  >{{ $rol['name'] }}</option>
            @endforeach
            </select>
            @error('role')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="px-1">
            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
        </div>
    </form>
@endsection