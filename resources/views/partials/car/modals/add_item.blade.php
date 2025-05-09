<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('items.store', $car->car_id) }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addItemModalLabel">Add Included Items</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div id="item-fields">
            <div class="input-group mb-2">
              <input type="text" name="items[]" class="form-control" placeholder="Item Name" required>
            </div>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addItemField()">+ Add Another</button>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function addItemField() {
    const container = document.getElementById('item-fields');
    const div = document.createElement('div');
    div.classList.add('input-group', 'mb-2');

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'items[]';
    input.className = 'form-control';
    input.placeholder = 'Item Name';
    input.required = true;

    div.appendChild(input);
    container.appendChild(div);
  }
</script>
