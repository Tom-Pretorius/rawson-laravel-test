@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Units</div>
                <div class="card-body">

                    <form method="GET" action="{{route('units')}}">
                        <div class="row form-filter-row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="sort">Sort by:</label>
                                    <select class="form-control" id="sort" name="sort">
                                        <option value="name">Name</option>
                                        <option {{( $params['sort'] == 'hit_points') ? 'selected="selected"' : ''}}
                                            value="hit_points">Hitpoints</option>
                                        <option {{( $params['sort'] == 'attack') ? 'selected="selected"' : ''}}
                                            value="attack">Attack</option>
                                        <option {{( $params['sort'] == 'build_time') ? 'selected="selected"' : ''}}
                                            value="build_time">Build time</option>
                                    </select>
                                    @if ($errors->has('sort'))
                                    <span class="text-danger">{{ $errors->first('sort') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="sort">Sort:</label>
                                    <select class="form-control" id="sortByAsc" name="sortByAsc">
                                        <option value="asc">
                                            Ascending</option>
                                        <option {{(!$params['sortByAsc']) ? 'selected="selected"' : ''}} value="desc">
                                            Descending</option>
                                        <option value="1x">
                                            Show validation</option>
                                    </select>
                                    @if ($errors->has('sortByAsc'))
                                    <span class="text-danger">{{ $errors->first('sortByAsc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="per_page">Per page:</label>
                                    <select class="form-control" id="perPage" name="perPage">
                                        <option value="10">10</option>
                                        <option {{($params['perPage'] == 20) ? 'selected="selected"' : ''}} value="20">
                                            20</option>
                                        <option {{($params['perPage'] == 50) ? 'selected="selected"' : ''}} value="50">
                                            50</option>
                                    </select>
                                    @if ($errors->has('perPage'))
                                    <span class="text-danger">{{ $errors->first('perPage') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary apply-btn"
                                    style="margin-top: 31px;">Apply</button>
                            </div>
                        </div>
                    </form>

                    <table class="table align-items-center justify-content-center">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Name</th>
                                <th class="text-uppercase text-center">Hitpoints</th>
                                <th class="text-uppercase text-center">Attack</th>
                                <th class="text-uppercase text-center ">Build time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                            <tr>
                                <td>
                                    <a href="{{ route('unit', ['id' => $unit->id]) }}">
                                        <h6 class="mb-0 text-sm">{{$unit->name ?? ""}}</h6>
                                    </a>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{$unit->hit_points ?? ""}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{$unit->attack ?? ""}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{$unit->build_time ?? ""}}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $units->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
