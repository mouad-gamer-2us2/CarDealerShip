<div class="row g-4">
    @foreach($cars as $car)
        <div class="col-md-4">
            <x-car-card-user :car="$car" />
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-end mt-4">
    {{ $cars->links() }}
</div>
