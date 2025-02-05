@php
    $sortOptions = $sortOptions ?? ['newest' => 'Terbaru', 'oldest' => 'Terlama'];
@endphp

<div class="sorting-options">
    <form action="{{ url()->current() }}" method="GET">
        @foreach (request()->except('sort', 'page') as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <select name="sort" onchange="this.form.submit()">
            @foreach ($sortOptions as $value => $label)
                <option value="{{ $value }}" {{ request('sort') == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </select>
    </form>
</div>
