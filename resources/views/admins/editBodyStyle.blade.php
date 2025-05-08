<x-admin-layout title="Edit Body Style">
    <div class="container mt-5">
        <div class="form-section">
            <h2>Edit Body Style</h2>

            <form action="{{ route('bodies.update', $body->body_id) }}" method="POST">
                @csrf
                @method('PUT')

               
                <div class="mb-3">
                    <label for="bodyType" class="form-label">Body Type</label>
                    <input type="text"
                           class="form-control @error('body_type') is-invalid @enderror"
                           id="bodyType"
                           name="body_type"
                           value="{{ old('body_type', $body->body_type) }}"
                           required>
                    <x-errors field="body_type"/>
                </div>

                
                <div class="mb-3">
                    <label for="bodyDescription" class="form-label">Body Description</label>
                    <textarea class="form-control @error('body_description') is-invalid @enderror"
                              id="bodyDescription"
                              name="body_description"
                              rows="3"
                              required>{{ old('body_description', $body->body_description) }}</textarea>
                    <x-errors field="body_description"/>
                </div>

                
                <button type="submit" class="btn btn-primary">Update</button>
                
            </form>
        </div>
    </div>
</x-admin-layout>
