@switch($element->type)
    @case('title')
        <h1 class="text-xl font-semibold">{{ $element->content }}</h1>
    @break

    @case('image')
        <section class="float-left p-8 m-0">
            <img src="{{ Storage::url($element->content) }}" class="w-48 h-48" alt="">
        </section>
    @break

    @case('paragraph')
        <section class="text-justify">{{ $element->content }}</section>
    @break
@endswitch
