<div class="content">
    @foreach ($offers as $offer)
        @if($offer->deleted == 0)
            @foreach ($cicles as $cicle)
                @if($offer->cicle_id == $cicle->id) 
                    @if(str_contains($cicle->img, ".png"))
                    <img src="{{('images/'.$cicle->img) }}" style="width:40px;"/>
                    @else
                    <img src="{{ ('images/noimage.png') }}" style="width:40px;"/>
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
        <p>{{ $offer->title }}</p>
        <p> {{$offer->description }}</p>
        <br/>
        @empty
        <p>No hay ofertas aplicadas</p>
    @endempty
    
</div>
