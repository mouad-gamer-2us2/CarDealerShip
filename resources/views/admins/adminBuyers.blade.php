<x-admin-layout title="Buyer Users">
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold ">List of Buyers</h2>

        @if($buyers->count() > 0)
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buyers as $buyer)
                        <tr>
                            <td>{{ $buyer->id }}</td>
                            <td>{{ $buyer->name }}</td>
                            <td>{{ $buyer->email }}</td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#buyerModal{{ $buyer->id }}">
                                        <i class="bi bi-zoom-in m-3"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="buyerModal{{ $buyer->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content text-start">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $buyer->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Email:</strong> {{ $buyer->email }}</p>
                                        <p><strong>Registered:</strong> {{ $buyer->created_at->format('d M Y') }}</p>
                                        <p><strong>Role:</strong> {{ $buyer->role }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-4">
                {{ $buyers->links() }}
            </div>
        @else
            <div class="alert alert-info text-center">
                No buyers found.
            </div>
        @endif
    </div>
</x-admin-layout>
