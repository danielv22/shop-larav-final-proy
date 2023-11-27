<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Furni') }}
        </h2>
    </x-slot>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Products</h1>
            </div>
            <div class="col-12">
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    Agregar producto
                </a>
            </div>
            <div class="col-12 mt-1">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $products as $product )
                            <tr>
                                <th scope="row">{{ $product->product_id }}</th>
                                <td>{{ $product->reference  }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>${{ number_format($product->price, 2, ',', '.') }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    @foreach($product->categories as $category)
                                        <span class="badge text-bg-info"> {{ $category->category_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('products.show', $product) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('products.edit', $product) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form
                                        action="{{route('products.destroy', $product)}}"
                                        method="post"
                                        onsubmit="return confirm('Are you sure?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-red-700 btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
