@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row icon-box" data-aos="zoom-in">
            <div class="pb-4">
                <h1>@lang('home.products')</h1>
                <a class="text-right" href="/crear-producto">@lang('home.create_product')</a>
            </div>
            <div class="col-lg-12 col-md-12 col-12 ">


                <div class="row mt-4">

                    <form method="POST" action="/update-producto/{{$producto->id}}">
                        @csrf
                        <h2 class="text-center pb-4">@lang('home.edit_product')</h2>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">@lang('home.name')</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text"
                                    class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ $producto->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">@lang('home.price')</label>

                            <div class="col-md-6">
                                <input id="precio" type="text"
                                    class="form-control @error('precio') is-invalid @enderror" name="precio"
                                    value="{{ $producto->precio }}" required autocomplete="precio" autofocus>

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="negocio" class="col-md-4 col-form-label text-md-right">@lang('home.bussiness')</label>

                            <div class="col-md-6">
                                <!-- <input id="negocio" type="text" class="form-control @error('negocio') is-invalid @enderror" name="negocio" value="{{ old('negocio') }}" required autocomplete="negocio" autofocus> -->

                                <select name="negocio" id="status" class="form-select">
                                    @foreach ($negocios as $negocio)
                                        @if($negocio->id == $producto->id)
                                            <option value="{{ $negocio->id }}" selected>{{ $negocio->nombre }}</option>
                                        @else                                            
                                            <option value="{{ $negocio->id }}">{{ $negocio->nombre }}</option>   
                                        @endif
                                    @endforeach
                                </select>


                                @error('negocio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria"
                                class="col-md-4 col-form-label text-md-right">@lang('home.category')</label>

                            <div class="col-md-6">

                                <select name="categoria" id="status" class="form-select">
                                    @foreach ($categorias as $categoria)
                                        @if($categoria->id == $producto->id)
                                            <option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}</option>                                                                                    
                                        @else                                            
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>   
                                        @endif
                                    @endforeach
                                </select>


                                @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>







                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('home.edit_product')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
