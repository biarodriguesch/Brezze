<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @include('vendas.modal.modalShow')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a type="button" href={{ route('vendas.create') }}
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4
                        focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600
                         dark:hover:bg-green-700 dark:focus:ring-green-800">Criar</a>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Produto
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendas as $venda)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $venda['produto'] }}
                                        </th>
                                        <th scope="row">
                                            <div class="flex">
                                                <a href={{ route('vendas.edit', $venda->id) }} type="button"
                                                    class=" text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                                        class="fa-solid fa-pen"></i></a>
                                                <button onclick="preencherModal({{ $venda }})"
                                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                    type="button" data-modal-toggle="defaultModal">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>

                                                <button type="button" onclick="deleteTabela({{$venda->id}})"
                                                    class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <i class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        {!! $vendas->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/vendas.js') }}"></script>

</x-app-layout>
