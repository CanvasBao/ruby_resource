@if ($errors->any())
<div class="mb-4">
    @foreach ($errors->all() as $error)
    <div class="mb-1 font-medium text-sm text-red-600">
        {{ $error }}
    </div>
    @endforeach
</div>
@endif