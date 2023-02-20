@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row icon-box" data-aos="zoom-in">
            <div class="pb-4">
                <h1>@lang('home.bussiness')</h1>
                <a class="text-right" href="/crear-negocio">@lang('home.create_bussiness')</a>
                <a class="text-right" href="/negocios-pdf">@lang('home.download_pdf')</a>

            </div>
            <div class="col-lg-12 col-md-12 col-12 ">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">@lang('home.name')</th>
                            <th scope="col">@lang('home.edit')</th>
                            <th scope="col">@lang('home.delete')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($negocios as $negocio)
                            <tr>
                                <td scope="row">{{ $negocio->nombre }}</td>
                                <td><a href="/editar-negocio/{{ $negocio->id }}">@lang('home.edit')</a></td>

                                <td>
                                    <form action="/borrar-negocio/{{ $negocio->id }}" method="POST">
                                        @method('POST')
                                        @csrf
                                        <input type="submit" value="Eliminar" class="btn btn-danger btn-sm"
                                            onclick="return confirm('@lang('home.you_want_to_delete')')">
                                    </form>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
