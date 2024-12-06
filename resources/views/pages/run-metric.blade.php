@extends('layouts.app')

@section('title', 'Run Metric')

@section('content')
    <h1>Run Metric</h1>
    <form action="{{ route('run-metric.show') }}" method="post" id="run-metric-form">
        @csrf
        <input type="text" name="url" id="url" placeholder="ingrese una url válida">
        <select name="strategy" id="strategy">
            @foreach ($strategies as $strategy)
                <option value="{{ $strategy->name }}">{{ $strategy->name }}</option>
            @endforeach
        </select>
        @foreach ($categories as $category )
            <label class="form-check-label" for={{ $category->id }}>
                {{ $category->name }}
            </label>
            <input
                type="checkbox"
                name="categories[]"
                id={{ $category->id }}
                value={{ $category->name }}
                {{ $category->status === 1 ? 'checked = true' : '' }}
            >
        @endforeach
        <button type="submit">GET METRICS</button>
    </form>

    <form>
        <p id="metrics">acá van las métricas que llegan desde el back</p>
        <button type="submit">SAVE METRIC RUN</button>
    </form>
@endsection