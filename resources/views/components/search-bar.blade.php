<form method="GET" action="{{ url()->current() }}" class="mb-4">
    <div class="input-group shadow-sm">
        <input 
            type="search" 
            name="search" 
            class="form-control" 
            placeholder="Rechercher une voiture, une marque, un modèle..." 
            value="{{ request('search') }}"
        >
        <button class="btn btn-dark" type="submit">
            Rechercher
        </button>
    </div>
</form>
