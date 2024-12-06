@extends('layouts.app')

@section('title', 'Run Metric')

@section('content')
    <form action="{{ route('run-metric.show') }}" method="post" id="run-metric-form">
        @csrf
        <input class="form-control my-2" type="text" name="url" id="url" placeholder="ingrese una url válida">
        <select class="form-select my-2"  name="strategy" id="strategy">
            @foreach ($strategies as $strategy)
                <option value="{{ $strategy->name }}">{{ $strategy->name }}</option>
            @endforeach
        </select>
        <div>
            @foreach ($categories as $category )
                <div>
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="categories[]"
                        id={{ $category->id }}
                        value={{ $category->name }}
                        {{ $category->status === 1 ? 'checked = true' : '' }}
                    >
                    <label class="form-check-label" for={{ $category->id }}>
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button class="btn btn-success my-2" type="submit" id="submit-metrics">GET METRICS</button>
    </form>

    <form id="save-metric-form">
        <div class="py-4" id="metrics">No metrics to show</div>
        <button class="btn btn-success" type="submit">SAVE METRIC RUN</button>
    </form>
@endsection