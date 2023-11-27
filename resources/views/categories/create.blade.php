<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Furni') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Agregar Categoría</h1>
            </div>
            <div class="col-12">
                <form
                    action="{{ route('categories.store') }}"
                    class="row"
                    method="post"
                >
                    @csrf
                    <div class="col-6">
                        <label for="category_name" class="form-label">Referencia</label>
                        <input
                            class="form-control"
                            id="category_name"
                            name="category_name"
                            placeholder="Nombre de la categoría"
                            type="text"
                        >
                    </div>


                    @if ($errors->any())
                        <div class="alert alert-danger col-12 mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-12 my-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" style="background-color: #0A53BE;">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 mb-4">
                <div class="d-grid gap-2">
                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
