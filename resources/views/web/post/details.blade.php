<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <section class="h-96 overflow-hidden">
        <img class="object-cover " src="{{ Storage::url('/templates/bg-blog.jpg') }}" alt="">
    </section>


    <div class="py-5 text-gray-900">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <section class="bg-white p-6 rounded-lg">

                <section class="flex flex-col gap-y-4">
                    <div class="flex justify-between items-center">
                        <section>
                            <h1 class="text-3xl">{{ $post->title }}</h1>
                            <span class="text-sm">Postado {{ $post->created_at->diffForHumans() }}</span>
                        </section>

                        <section class="flex flex-col justify-end">

                            <h1 class="text-lg text-end font-semibold mb-2">Colaboradores</h1>

                            <section class="flex flex-row gap-x-2 ">
                                <a class="hover:scale-[1.15] transition duration-300 ease-in-out" href="#"><img
                                        class="w-10 h-10 rounded-full"
                                        src="{{ Storage::url('/templates/bg-blog.jpg') }}" alt=""></a>
                                <a class="hover:scale-[1.15] transition duration-300 ease-in-out" href="#"><img
                                        class="w-10 h-10 rounded-full"
                                        src="{{ Storage::url('/templates/bg-blog.jpg') }}" alt=""></a>
                                <a class="hover:scale-[1.15] transition duration-300 ease-in-out" href="#"><img
                                        class="w-10 h-10 rounded-full"
                                        src="{{ Storage::url('/templates/bg-blog.jpg') }}" alt=""></a>
                            </section>
                        </section>
                    </div>

                    <div class="flex flex-col gap-y-4">
                        @foreach ($post->gpElement as $group)
                            <section class="space-y-4">
                                @foreach ($group->elements as $element)
                                    @include('web.post.templates.' . $group->template, ['element' => $element])
                                @endforeach

                            </section>
                        @endforeach


                        <section class="space-y-4">

                        </section>

                    </div>
                </section>

            </section>




            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
