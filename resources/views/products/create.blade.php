<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Furni') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Agregar Producto</h1>
            </div>
            <div class="col-12">
                <form
                    action="{{ route('products.store') }}"
                    class="row"
                    enctype="multipart/form-data"
                    method="post"
                >
                    @csrf
                    <div class="col-6">
                        <label for="reference" class="form-label">Referencia</label>
                        <input
                            class="form-control muted"
                            data-bs-toggle="tooltip"
                            data-bs-title="Campo estático, no se modifica"
                            id="reference"
                            name="reference"
                            placeholder="Name"
                            type="text"
                            value="{{ $ref }}"
                            readonly
                        >
                    </div>
                    <div class="col-6">
                        <label for="name" class="form-label">Producto</label>
                        <input
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Descripción corta del producto"
                            type="text"
                            value="{{ old('name') }}"
                        >
                    </div>
                    <div class="col-6">
                        <label for="description" class="form-label">Descripción</label>
                        <input
                            type="text"
                            class="form-control"
                            id="description"
                            name="description"
                            placeholder="Descripción (corta)"
                            value="{{ old('description') }}"
                            maxlength="250"
                        >
                    </div>
                    <div class="col-6">
                        <label for="stock" class="form-label">Unidades disponibles</label>
                        <input
                            type="number"
                            class="form-control"
                            id="stock"
                            name="stock"
                            placeholder="Unidades disponibles"
                            value="{{ old('stock') }}">
                    </div>
                    <div class="col-6">
                        <label for="price" class="form-label">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text">COP $</span>
                            <input
                                class="form-control"
                                id="price"
                                name="price"
                                placeholder="precio del producto"
                                type="number"
                                value="{{ old('price') }}"
                            >
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="category">Categorías</label>
                        <select
                            class="form-select"
                            id="category"
                            name="category"
                        >
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="photo_name">Imagen</label>
                        <input
                            type="file"
                            class="form-control"
                            id="photo_name"
                            name="photo_name"
                            value="{{ old('photo_name') }}"
                        />
                    </div>
                    <div class="col-6">
                        <label for="status" class="form-label">Estado</label>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="status"
                                name="status"
                                {{ old('status') ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="status">
                                Activo
                            </label>
                        </div>
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
                    <a href="{{route('products.index')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
