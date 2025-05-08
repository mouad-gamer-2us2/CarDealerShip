<x-admin-layout title="Body Styles">
    <div class="container mt-5">

        <h2 class="mb-4 fw-bold">Body Styles</h2>

        @if($bodies->count() > 0)
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Body Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bodies as $body)
                        <tr>
                            <td>{{ $body->body_id }}</td>
                            <td>{{ $body->body_type }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <!-- Show Modal Button -->
                                <button class="btn btn-outline-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#bodyModal{{ $body->body_id }}">
                                    Show
                                </button>

                                <!-- Update Button -->
                                <a href="{{route('bodies.edit',$body->body_id)}}"
                                   class="btn btn-outline-warning btn-sm">
                                    Update
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('bodies.destroy', $body->body_id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                                
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="bodyModal{{ $body->body_id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content text-start">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $body->body_type }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Description:</strong></p>
                                        <p>{{ $body->body_description }}</p>
                                        <p><strong>Created:</strong> {{ $body->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

            
            <div class="d-flex  justify-content-end mt-4">
                {{ $bodies->links() }}
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                No body styles found.
            </div>
        @endif
    </div>
</x-admin-layout>
