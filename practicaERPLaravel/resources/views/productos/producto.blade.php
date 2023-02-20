@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row icon-box" data-aos="zoom-in">
            <div class="pb-4">
                <h1>@lang('home.products')</h1>
                <a class="text-right" href="/crear-producto">@lang('home.create_product')</a>
                <a class="text-right" href="/productos-pdf">@lang('home.download_pdf')</a>
            </div>
            <div class="col-lg-12 col-md-12 col-12 ">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">@lang('home.name')</th>
                            <th scope="col">@lang('home.price')</th>
                            <th scope="col">@lang('home.bussiness_name')</th>
                            <th scope="col">@lang('home.category')</th>
                            <th scope="col">@lang('home.edit')</th>
                            <th scope="col">@lang('home.delete')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td scope="row">{{ $producto->nombre }}</td>

                                <td>{{ $producto->precio }} €</td>
                                <td>{{ DB::table('negocios')->find($producto->id_negocio)->nombre }}</td>
                                <td>{{ DB::table('categorias')->find($producto->id_categoria)->nombre }}</td>
                                <td><a href="/editar-producto/{{ $producto->id }}">@lang('home.edit')</a></td>

                                <td>
                                    <form action="/borrar-producto/{{ $producto->id }}" method="POST">
                                        @method('POST')
                                        @csrf                                        

                                        <input type="submit" value="@lang('home.delete')" class="btn btn-danger btn-sm"
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
