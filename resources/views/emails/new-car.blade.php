@component('mail::message')
# New Car Just Listed 🚗

A new {{ $car->brand->brand_name }} {{ $car->model }} has just been listed!

**Engine:** {{ $car->engine }}  
**Horsepower:** {{ $car->horsepower }} HP  
**Price:** ${{ number_format($car->price, 2) }}

@component('mail::button', ['url' => route('general.page')])
View Our Website
@endcomponent

Thanks,  
**M's Car GO**
@endcomponent

