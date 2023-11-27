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
                <a href="{{ route('categories.create') }}" class="btn btn-success">
                    Agregar Categoría
                </a>
            </div>
            <div class="col-12 mt-1">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoría</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $categories as $category )
                            <tr>
                                <th scope="row">{{ $category->category_id }}</th>
                                <td>{{ $category->category_name  }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('categories.show', $category) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('categories.edit', $category) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form
                                        action="{{route('categories.destroy', $category)}}"
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
