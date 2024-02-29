<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jelajahi produk') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-2">
        <x-card>
            <form class="flex gap-2">
                <x-text-input type="text" name="query" id="search" placeholder="Cari produk" class="w-full"
                    :value="request('query')" />
                <x-primary-button>Cari</x-primary-button>
            </form>
        </x-card>
        <x-card>
            <div class="grid grid-cols-4 gap-4">
                @forelse ($products as $product)
                    {{-- <a href="{{route('product.show', $product->id)}}">
                        <section class="flex flex-col bg-yellow-100 dark:bg-gray-700 p-2 w-full rounded h-full">
                            <img src="{{ Storage::url($product->image) }}" class="rounded h-full">
                            <p class="dark:text-white">{{ $product->name }}</p>
                            <p class="dark:text-white">
                                <x-idr :value="$product->price" />
                        </section>
                    </a> --}}


                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('product.show', $product) }}">
                            <img class="rounded-t-lg" src="{{ Storage::url($product->image) }}"
                                alt="{{ $product->name }}" />
                        </a>
                        <div class="p-5">
                            <a href="{{ route('product.show', $product) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->name }}</h5>
                                    <span class="text-gray-700 dark:text-gray-400"><x-idr :value="$product->price"/></span>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                            <a href="{{ route('product.show', $product) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Detail
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>

                @empty
                @endforelse
            </div>
            <div class="mt-2">
                {{ $products->links() }}
            </div>
        </x-card>

    </div>

</x-app-layout>
