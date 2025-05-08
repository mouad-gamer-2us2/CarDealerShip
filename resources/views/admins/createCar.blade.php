<x-admin-layout title="List a New Car">
    <div class="container mt-5">
        <div class="form-section">
            <h2>List a New Car</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Make -->
                <div class="mb-3">
                    <label class="form-label">Make (Brand)</label>
                    <select name="make" class="form-select @error('make') is-invalid @enderror" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                    <x-errors field="make" />
                </div>

                <!-- Model -->
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" required>
                    <x-errors field="model" />
                </div>

                <!-- Engine -->
                <div class="mb-3">
                    <label class="form-label">Engine</label>
                    <input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" required>
                    <x-errors field="engine" />
                </div>

                <!-- Body Style -->
                <div class="mb-3">
                    <label class="form-label">Body Style</label>
                    <select name="body_style" class="form-select @error('body_style') is-invalid @enderror" required>
                        @foreach($bodies as $body)
                            <option value="{{ $body->body_id }}">{{ $body->body_type }}</option>
                        @endforeach
                    </select>
                    <x-errors field="body_style" />
                </div>

                <!-- Basic Specs -->
                <div class="row">
                    <div class="col-md-6 mb-3"><label class="form-label">Drivetrain</label><input type="text" name="drivetrain" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label class="form-label">Transmission</label><input type="text" name="transmission" class="form-control" required></div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3"><label class="form-label">Horsepower</label><input type="number" name="horsepower" class="form-control" required></div>
                    <div class="col-md-4 mb-3"><label class="form-label">Mileage</label><input type="number" name="mileage" class="form-control" required></div>
                    <div class="col-md-4 mb-3"><label class="form-label">VIN</label><input type="text" name="vin" class="form-control" required></div>
                </div>

                <!-- Colors & Condition -->
                <div class="row">
                    <div class="col-md-4 mb-3"><label class="form-label">Exterior Color</label><input type="text" name="exterior_color" class="form-control" required></div>
                    <div class="col-md-4 mb-3"><label class="form-label">Interior Color</label><input type="text" name="interior_color" class="form-control" required></div>
                    <div class="col-md-4 mb-3"><label class="form-label">Condition</label><input type="text" name="condition" class="form-control" required></div>
                </div>

                <!-- Price & Description -->
                <div class="mb-3"><label class="form-label">Price</label><input type="number" step="0.01" name="price" class="form-control" required></div>
                <div class="mb-3"><label class="form-label">Description</label><textarea name="car_description" class="form-control" rows="4" required></textarea></div>

                <!-- Modified -->
                <div class="mb-3">
                    <label class="form-label">Modification</label>
                    <select name="modified" class="form-select">
                        <option value="0">Original Equipment Manufacturer (OAM)</option>
                        <option value="1">Modified</option>
                    </select>
                </div>

                <!-- Equipements -->
                <div class="mb-3">
                    <label class="form-label">Equipements</label>
                    <div id="equipement-fields">
                        <div class="input-group mb-2">
                            <input type="text" name="equipements[]" class="form-control" placeholder="Equipement Name">
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addField('equipement-fields', 'equipements[]')">+ Add Equipement</button>
                </div>

                <!-- Items -->
                <div class="mb-3">
                    <label class="form-label">Items</label>
                    <div id="item-fields">
                        <div class="input-group mb-2">
                            <input type="text" name="items[]" class="form-control" placeholder="Item Name">
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addField('item-fields', 'items[]')">+ Add Item</button>
                </div>

                <!-- Images -->
                <div class="mb-3">
                    <label class="form-label">Car Images</label>
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
