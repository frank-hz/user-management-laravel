@extends('template')
@section('content')
    <form action="/user-create" method="post" class="form-container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            <div class="alert-content">Errores Encontrados</div>
            <div class="alert-close">&#215;</div>
        </div>

        {{-- <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
        @endif
        @csrf
        <div class="w-100 form-group">
            <label for="" class="form-label">Nombre</label>
            <input type="text" name="name" value="{{old('name')}}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Apellido</label>
            <input type="text" name="lastname" value="{{old('lastname')}}">
            @error('lastname')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Documento</label>
            <input type="text" name="document" value="{{old('document')}}">
            @error('document')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Fecha Nacimiento</label>
            <input type="date" name="birth_date" value="{{old('birth_date')}}">
            @error('birth_date')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" value="{{old('email')}}">
            {{-- esmith@mail.com --}}
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-100 form-group">
            <label for="" class="form-label">Rol</label>
            <select name="role" value="{{ old('role') }}">
                @foreach ($roles as $key => $rol)
                    <option value="{{ $rol['id'] }}">{{ $rol['name'] }}</option>
                @endforeach
                </select>
            @error('role')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="px-1">
            <button class="btn btn-primary" type="submit">Guardar Datos</button>
        </div>
    </form>
@endsection