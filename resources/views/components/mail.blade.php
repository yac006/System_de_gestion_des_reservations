
@if ($details['title'] == "Validation de demande")
    <h3 style="color: rgb(4, 177, 4)">{{ $details['title'] }}</h3>
    <h5>{{ $details['body'] }}</h5>
@else
    <h3 style="color: rgb(197, 4, 4)">{{ $details['title'] }}</h3>
    <h5>{{ $details['body'] }}</h5>
@endif
