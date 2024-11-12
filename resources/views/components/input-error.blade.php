@props(['for' => null])

@if ($for)
    @error($for)
        <p {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400']) }}>{{ $message }}</p>
    @enderror
@endif
