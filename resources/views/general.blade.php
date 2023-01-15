<div class="content">
    @foreach ($offers as $offer)
        @if($offer->deleted == 0)
            @foreach ($cicles as $cicle)
                @if($offer->cicle_id == $cicle->id) 
                    @if(str_contains($cicle->img, ".png"))
                        <p> {{ asset('images/'.$cicle->img) }} </p>
                        @else
                        <p>{{ asset('images/noimage.png') }}" </p>
                    @endif
                @endif
            @endforeach
        @endif
    @endforeach

    <br/>
    <div name="userInfo" style="margin-left:60%">
        <p> Nombre : {{$user->name}}</p>
        <p> Apellido : {{$user->surname}}</p>   
    </div>
    <br/>

    
    @forelse($offers as $offer)
        <p>{{ $offer->title }}: {{$offer->description }}</p>
        @empty
            <p>No hay ofertas aplicadas</p>
    @endempty
    
</div>
