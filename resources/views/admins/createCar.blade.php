<x-admin-layout title="List a New Car">
    <div class="container mt-5">
        <div class="form-section">
            <h2 class="mb-4 fw-bold">List a New Car</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Make -->
                <div class="mb-3">
                    <label class="form-label">Make (Brand)</label>
                    <select name="make" class="form-select @error('make') is-invalid @enderror" required>
                        <option disabled selected>Select a brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->brand_id }}" {{ old('make') == $brand->brand_id ? 'selected' : '' }}>
                                {{ $brand->brand_name }}
                            </option>
                        @endforeach
                    </select>
                    <x-errors field="make" />
                </div>

                <!-- Model -->
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model') }}" required>
                    <x-errors field="model" />
                </div>

                <!-- Engine -->
                <div class="mb-3">
                    <label class="form-label">Engine</label>
                    <input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" value="{{ old('engine') }}" required>
                    <x-errors field="engine" />
                </div>

                <!-- Body Style -->
                <div class="mb-3">
                    <label class="form-label">Body Style</label>
                    <select name="body_style" class="form-select @error('body_style') is-invalid @enderror" required>
                        <option disabled selected>Select a body style</option>
                        @foreach($bodies as $body)
                            <option value="{{ $body->body_id }}" {{ old('body_style') == $body->body_id ? 'selected' : '' }}>
                                {{ $body->body_type }}
                            </option>
                        @endforeach
                    </select>
                    <x-errors field="body_style" />
                </div>

                <!-- Specs -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Drivetrain</label>
                        <input type="text" name="drivetrain" class="form-control @error('drivetrain') is-invalid @enderror" value="{{ old('drivetrain') }}" required>
                        <x-errors field="drivetrain" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Transmission</label>
                        <input type="text" name="transmission" class="form-control @error('transmission') is-invalid @enderror" value="{{ old('transmission') }}" required>
                        <x-errors field="transmission" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Horsepower</label>
                        <input type="number" name="horsepower" class="form-control @error('horsepower') is-invalid @enderror" value="{{ old('horsepower') }}" required>
                        <x-errors field="horsepower" />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Mileage</label>
                        <input type="number" name="mileage" class="form-control @error('mileage') is-invalid @enderror" value="{{ old('mileage') }}" required>
                        <x-errors field="mileage" />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">VIN</label>
                        <input type="text" name="vin" class="form-control @error('vin') is-invalid @enderror" value="{{ old('vin') }}" required>
                        <x-errors field="vin" />
                    </div>
                </div>

                <!-- Colors & Condition -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Exterior Color</label>
                        <input type="text" name="exterior_color" class="form-control @error('exterior_color') is-invalid @enderror" value="{{ old('exterior_color') }}" required>
                        <x-errors field="exterior_color" />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Interior Color</label>
                        <input type="text" name="interior_color" class="form-control @error('interior_color') is-invalid @enderror" value="{{ old('interior_color') }}" required>
                        <x-errors field="interior_color" />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Condition</label>
                        <select name="condition" class="form-select @error('condition') is-invalid @enderror" required>
                            <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                            <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
                        </select>
                        <x-errors field="condition" />
                    </div>
                </div>

                <!-- Price & Description -->
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                    <x-errors field="price" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="car_description" class="form-control @error('car_description') is-invalid @enderror" rows="4" required>{{ old('car_description') }}</textarea>
                    <x-errors field="car_description" />
                </div>

                <!-- Modification -->
                <div class="mb-3">
                    <label class="form-label">Modification</label>
                    <select name="modified" class="form-select @error('modified') is-invalid @enderror">
                        <option value="0" {{ old('modified') == '0' ? 'selected' : '' }}>Original</option>
                        <option value="1" {{ old('modified') == '1' ? 'selected' : '' }}>Modified</option>
                    </select>
                    <x-errors field="modified" />
                </div>

                <!-- Equipments -->
                <div class="mb-3">
                    <label class="form-label">Equipments</label>
                    <div id="equipement-fields">
                        @if(old('equipements'))
                            @foreach(old('equipements') as $eq)
                                <div class="input-group mb-2">
                                    <input type="text" name="equipements[]" class="form-control" value="{{ $eq }}">
                                    <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()"><i class="bi bi-trash3-fill"></i></button>
                                </div>
                            @endforeach
                        @else
                            <div class="input-group mb-2">
                                <input type="text" name="equipements[]" class="form-control" placeholder="Equipement Name">
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addField('equipement-fields', 'equipements[]')">+ Add Equipement</button>
                </div>

                <!-- Items -->
                <div class="mb-3">
                    <label class="form-label">Items</label>
                    <div id="item-fields">
                        @if(old('items'))
                            @foreach(old('items') as $item)
                                <div class="input-group mb-2">
                                    <input type="text" name="items[]" class="form-control" value="{{ $item }}">
                                    <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()"><i class="bi bi-trash3-fill"></i></button>
                                </div>
                            @endforeach
                        @else
                            <div class="input-group mb-2">
                                <input type="text" name="items[]" class="form-control" placeholder="Item Name">
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addField('item-fields', 'items[]')">+ Add Item</button>
                </div>

                <!-- Images -->
                <div class="mb-3">
                    <label class="form-label">Car Images (first image is highlighted)</label>
                    <div id="image-fields">
                        <div class="input-group mb-2">
                            <input type="file" name="images[]" class="form-control">
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addField('image-fields', 'images[]', true)">+ Add Image</button>
                </div>

                <button type="submit" class="btn btn-primary">List Car</button>
            </form>
        </div>
    </div>

    <script>
        function addField(containerId, fieldName, isFile = false) {
            const container = document.getElementById(containerId);
            const wrapper = document.createElement('div');
            wrapper.classList.add('input-group', 'mb-2');

            const input = document.createElement('input');
            input.type = isFile ? 'file' : 'text';
            input.name = fieldName;
            input.className = 'form-control';
            input.placeholder = isFile ? '' : 'Enter value';

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-danger';
            button.innerHTML = '<i class="bi bi-trash3-fill"></i>';
            button.onclick = () => wrapper.remove();

            wrapper.appendChild(input);
            wrapper.appendChild(button);
            container.appendChild(wrapper);
        }
    </script>
</x-admin-layout>