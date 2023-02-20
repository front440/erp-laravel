@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row icon-box" data-aos="zoom-in">
            <div class="pb-4">
                <h1>@lang('home.categories')</h1>
                <a class="text-right" href="/crear-categoria">@lang('home.create_category')</a>
            </div>
            <div class="col-lg-12 col-md-12 col-12 ">


                <div class="row mt-4">

                    <form method="POST" action="agregar-categoria">
                        @csrf
                        <h2 class="text-center pb-4">@lang('home.create_category')</h2>  
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">@lang('home.name')</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text"
                                    class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('home.add_product')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
