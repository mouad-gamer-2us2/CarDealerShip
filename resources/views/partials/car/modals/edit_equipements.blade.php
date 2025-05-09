@foreach($car->equipements as $eq)
<!-- Edit Equipement Modal -->
<div class="modal fade" id="editEquipementModal{{ $eq->id_equipement }}" tabindex="-1" aria-labelledby="editEquipementModalLabel{{ $eq->id_equipement }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('equipements.update', $eq->id_equipement) }}" method="POST" class="modal-content">
      @csrf
      @method('PUT')

      <div class="modal-header">
        <h5 class="modal-title" id="editEquipementModalLabel{{ $eq->id_equipement }}">Edit Equipement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Equipement Name</label>
          <input type="text" name="equipement_name" class="form-control" value="{{ $eq->equipement_name }}" required>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>
@endforeach
