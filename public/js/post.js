var ELEMENT_COUNT = 0;

function addElement()
{

    ELEMENT_COUNT += 1;

    let ElementBack = document.getElementById('elements');
    ElementBack.insertAdjacentHTML('beforeend',
        ` <section class="flex flex-col gap-y-4 mt-4 border rounded-lg p-6">

                                <section class="flex gap-x-4">
                                    <div class="w-full">
                                        <label class="text-sm">Titulo</label>
                                        <input type="text" name="element[${ELEMENT_COUNT}][title]"
                                            class="border-0 border-gray-500 border-b p-0 py-2 w-full"
                                            placeholder="Insira um titulo">
                                    </div>

                                    <div class="w-full">
                                        <label class="text-sm">Design do elemento</label>
                                        <select name="element[${ELEMENT_COUNT}][template]"
                                            class="border-0 border-b border-gray-500 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-0 py-2.5">
                                            <option value="default" selected>Padrão</option>
                                            <option value="min-image">Mini Imagem</option>
                                        </select>
                                    </div>
                                </section>

                                <section class="flex flex-col gap-y-2">
                                    <div class="w-full">
                                        <label class="text-sm">Paragrafo</label>
                                        <textarea name="element[${ELEMENT_COUNT}][paragraph]" placeholder="Insira um paragrafo" class="w-full border-0 border-b" rows="10"></textarea>
                                    </div>

                                    <div class="w-full">
                                        <label class="text-sm">Imagem</label>
                                        <input type="file" class="w-full " name="element[${ELEMENT_COUNT}][image]">
                                    </div>
                                </section>
                            </section>`
    );

}
