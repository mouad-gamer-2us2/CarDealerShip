<!-- Add Equipement Modal -->
<div class="modal fade" id="addEquipementModal" tabindex="-1" aria-labelledby="addEquipementModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('equipements.store', $car->car_id) }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addEquipementModalLabel">Add Equipment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div id="equipement-fields">
            <div class="input-group mb-2">
              <input type="text" name="equipements[]" class="form-control" placeholder="Equipment Name" required>
            </div>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addEquipementField()">+ Add Another</button>
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
  function addEquipementField() {
    const container = document.getElementById('equipement-fields');
    const div = document.createElement('div');
    div.classList.add('input-group', 'mb-2');

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'equipements[]';
    input.className = 'form-control';
    input.placeholder = 'Equipment Name';
    input.required = true;

    div.appendChild(input);
    container.appendChild(div);
  }
</script>
