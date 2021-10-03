@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Unit: <b>{{$unit->name ?? ""}}</b> </div>
                <div class="card-body">

                    <div>
                        <b>ID:</b> {{$unit->id ?? ""}}
                    </div>
                    <div>
                        <b>Name:</b> {{$unit->name ?? ""}}
                    </div>
                    <div>
                        <b>Description:</b> {{$unit->description ?? ""}}
                    </div>
                    <div>
                        <b>Expansion:</b> {{$unit->Expansion ?? ""}}
                    </div>
                    <div>
                        <b>Age:</b> {{$unit->age ?? ""}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
