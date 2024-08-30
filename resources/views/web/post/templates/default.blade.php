@switch($element->type)
    @case('paragraph')
        <p class="text-justify text-md">{{ $element->content }}</p>
    @break

    @case('image')
        <img class="scale-80 rounded-lg" src="{{ Storage::url($element->content) }}" alt="">
    @break

    @case('title')
        <h1 class="text-xl font-semibold">{{ $element->content }}</h1>
    @break

    @default
@endswitch
