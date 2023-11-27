<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Furni') }}
        </h2>
    </x-slot>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">{{ $product->name }}</h1>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6 offset-3">
                        <table class="table table-bordered">
                            <tr>
                                <th>Referencia</th>
                                <td>{{ $product->reference }}</td>
                            </tr>
                            <tr>
                                <th>Descripción</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Nro. Unidades</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <th>Precio:</th>
                                <td>${{ number_format($product->price, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Imagen</th>
                                <td>
                                    <img src="{{ asset("images/products/$product->photo_name") }}"  height="120" width="120">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="row">
                        <div class="col-6" >
                            <a href="{{route('products.index')}}" class="btn btn-danger" style="width: 100%">Regresar</a>
                        </div>
                        <div class="col-6" style="width: 50%">
                            <a href="{{route('products.edit', $product)}}" class="btn btn-primary" style="width: 100%" >Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
