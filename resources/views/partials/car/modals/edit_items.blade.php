@foreach($car->items as $item)
<!-- Edit Item Modal -->
<div class="modal fade" id="editItemModal{{ $item->id_item }}" tabindex="-1" aria-labelledby="editItemModalLabel{{ $item->id_item }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('items.update', $item->id_item) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <h5 class="modal-title" id="editItemModalLabel{{ $item->id_item }}">Edit Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="itemName{{ $item->id_item }}" class="form-label">Item Name</label>
            <input type="text" name="item_name" id="itemName{{ $item->id_item }}"
                   class="form-control" value="{{ $item->item_name }}" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
