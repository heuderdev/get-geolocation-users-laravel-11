@extends('layouts.default')

@section('content')
    <div class="container">
        @foreach($shorts as $short)
            <div class="card p-2 mt-5 bg-secondary bg-gradient">
                <div class="card-body">
                    Title: {{ $short["content"] }} <br/>
                    Url Original: {{ $short["original_url"] }}<br/>
                    {{ $short["short_url"] }} | <a target="_blank"
                                                   href="{{ route('short.id', ['short_id' =>$short["short_url"]]) }}">acesar</a>
                    <br/>
                    Quantidade de visitas: {{ $short["number_visits"] }}<br/>
                    Usuário: {{$short["user"]["email"]}}<br/> <br/>
                </div>
            </div>
            @foreach($short["ips"] as $index => $ip)
                #{{$index+1}} O ip: {{$ip['address_ip']}} acessou<br/>
                @if($ip["geo_location"] !=null)
                    <br/>
                    <br/>
                    CIDADE: {{$ip["geo_location"]['city']}} <br/>
                    REGIÃO:{{$ip["geo_location"]['region']}} <br/>
                    UF: {{$ip["geo_location"]['country']}} <br/>
                    LOCALIZAÇÃO: {{$ip["geo_location"]['loc']}} <br/>
                    CEP: {{$ip["geo_location"]['postal']}} <br/>
                    FUSO HORRÁRIO: {{$ip["geo_location"]['timezone']}} <br/>
                @endif

            @endforeach
            <HR/>
        @endforeach

    </div>
@endsection
