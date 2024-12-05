@extends('layouts.app')

@section('title', 'Run Metric')

@section('content')
    <h1>Run Metric</h1>
    <form>
        <input type="text">
        <select name="metric" id="">
            @foreach ($strategies as $strategy)
                <option value="{{ $strategy->id }}">{{ $strategy->name }}</option>
            @endforeach
        </select>
        @foreach ($categories as $category )
            <label class="form-check-label" for={{ $category->name }}>
                {{ $category->name }}
            </label>
            <input
                type="checkbox"
                name={{ $category->name }}
                id={{ $category->name }}
                value="1"
                {{ $category->status === 1 ? 'checked = true' : '' }}
            >
        @endforeach
        <button type="submit">GET METRICS</button>
    </form>

    <form>
        <p>acá van las métricas que llegan desde el back</p>
        <button type="submit">SAVE METRIC RUN</button>
    </form>
@endsection