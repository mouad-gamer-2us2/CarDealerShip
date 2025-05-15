<x-admin-layout title="Edit Profile">
    <div class="container mt-5">

        <!-- Update Profile (Blue) -->
        <div class="card border-primary shadow-sm mb-5">
            <div class="card-header bg-primary text-white fw-bold">
                Update Profile Information
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', auth()->user()->name) }}" required autofocus>
                        <x-errors field="name" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', auth()->user()->email) }}" required>
                        <x-errors field="email" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Update Password (Yellow) -->
        <div class="card border-warning shadow-sm mb-5">
            <div class="card-header bg-warning text-dark fw-bold">
                Change Password
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                        <x-errors field="current_password" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        <x-errors field="password" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-warning text-dark">Update Password</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Account (Red) -->
        <div class="card border-danger shadow-sm mb-5">
            <div class="card-header bg-danger text-white fw-bold">
                Delete Account
            </div>
            <div class="card-body">
                <p class="text-muted">Once your account is deleted, all its data will be permanently removed.</p>

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        <x-errors field="password" />
                    </div>

                    <button type="submit" class="btn btn-danger">Permanently Delete Account</button>
                </form>
            </div>
        </div>

    </div>
</x-admin-layout>