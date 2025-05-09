<!-- Edit Fields Modal -->
<div class="modal fade" id="editFieldsModal" tabindex="-1" aria-labelledby="editFieldsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-start">
            <form action="{{ route('cars.updateFields', $car->car_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editFieldsModalLabel">Edit Car Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="engine" class="form-label">Engine</label>
                        <input type="text" name="engine" class="form-control" value="{{ $car->engine }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="drivetrain" class="form-label">Drivetrain</label>
                        <input type="text" name="drivetrain" class="form-control" value="{{ $car->drivetrain }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="transmission" class="form-label">Transmission</label>
                        <input type="text" name="transmission" class="form-control" value="{{ $car->transmission }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="horsepower" class="form-label">Horsepower</label>
                        <input type="number" name="horsepower" class="form-control" value="{{ $car->horsepower }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="mileage" class="form-label">Mileage</label>
                        <input type="number" name="mileage" class="form-control" value="{{ $car->mileage }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="vin" class="form-label">VIN</label>
                        <input type="text" name="vin" class="form-control" value="{{ $car->vin }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exterior_color" class="form-label">Exterior Color</label>
                        <input type="text" name="exterior_color" class="form-control" value="{{ $car->exterior_color }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="interior_color" class="form-label">Interior Color</label>
                        <input type="text" name="interior_color" class="form-control" value="{{ $car->interior_color }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="condition" class="form-label">Condition</label>
                        <select name="condition" class="form-select" required>
                            <option value="new" {{ $car->condition === 'new' ? 'selected' : '' }}>New</option>
                            <option value="used" {{ $car->condition === 'used' ? 'selected' : '' }}>Used</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
