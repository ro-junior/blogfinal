<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova postagem') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script src="{{ asset('js/post.js') }}"></script>
    </x-slot>

    <div class="py-12 text-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 gap-y-5 flex flex-col">

            <div class="border bg-white rounded-lg p-6">
                <h1 class="font-semibold text-lg leading-tight">Colaboradores</h1>
                <section>

                </section>
            </div>

            <div class="border bg-white rounded-lg p-6">

                <section class="">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <section class="mb-5">
                            <section class="text-sm">
                                <h1 class="font-semibold text-lg leading-tight">Postagem</h1>
                                <input type="text" name="title"
                                    class="border-0 border-gray-500 border-b p-0 py-2 w-full"
                                    placeholder="Insira o nome da postagem">
                            </section>

                            <section class="mt-10">
                                <h1 class="font-semibold text-lg leading-tight">Elementos da postagem</h1>

                                <section id="elements">

                                    {{--
                                    <section class="flex flex-col gap-y-4 mt-4 border rounded-lg p-6">
                                    <section class="flex gap-x-4">
                                        <div class="w-full">
                                            <label class="text-sm">Titulo</label>
                                            <input type="text" name="element[${ELEMENT_COUNT}][title]"
                                                class="border-0 border-gray-500 border-b p-0 py-2 w-full"
                                                placeholder="Insira um titulo">
                                        </div>

                                        <div class="w-full">
                                            <label class="text-sm">Design do elemento</label>
                                            <select name="element[${ELEMENT_COUNT}][group_type]"
                                                class="border-0 border-b border-gray-500 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-0 py-2.5">
                                                <option value="default" selected>Padrão</option>
                                            </select>
                                        </div>
                                    </section>

                                    <section class="flex flex-col gap-y-2">
                                        <div class="w-full">
                                            <label class="text-sm">Escreva um texto</label>
                                            <textarea name="element[${ELEMENT_COUNT}][content]" class="w-full border-0 border-b" rows="10"></textarea>
                                        </div>

                                        <div class="w-full">
                                            <label class="text-sm">Imagem</label>
                                            <input type="file" class="w-full"
                                                name="element[${ELEMENT_COUNT}][image]">
                                        </div>
                                    </section>
                                </section>
                                --}}

                                </section>

                            </section>
                        </section>

                        <section class="flex justify-end">
                            <button class="material-symbols-outlined text-3xl p-2 hover:scale-[1.25] hover:rotate-[-10deg] transition duration-300 ease-in-out">send</button>
                        </section>
                    </form>

                    <section class="flex justify-center mt-4">
                        <button onclick="addElement()"
                            class="material-symbols-outlined border p-2 rounded-lg">add</button>
                    </section>
                </section>
            </div>

        </div>
    </div>
</x-app-layout>
