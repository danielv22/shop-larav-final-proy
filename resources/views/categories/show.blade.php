<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Furni') }}
        </h2>
    </x-slot>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">{{ $category->category_name }}</h1>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6 offset-3">
                        <table class="table table-bordered">
                            <tr>
                                <th>Categria</th>
                                <td>{{ $category->category_name }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="row">
                        <div class="col-6" >
                            <a href="{{route('categories.index')}}" class="btn btn-danger" style="width: 100%">Regresar</a>
                        </div>
                        <div class="col-6" style="width: 50%">
                            <a href="{{route('categories.edit', $category)}}" class="btn btn-primary" style="width: 100%" >Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
