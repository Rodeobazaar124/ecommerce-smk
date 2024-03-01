<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jelajahi produk') }}
        </h2>
    </x-slot> --}}
    <header class="h-screen bg-gradient-to-br from-blue-300 to-sky-300">
        <div class="container mx-auto sm:px-4 py-16 text-center">
            <h1 class="text-gray-900 dark:text-white  font-bold text-2xl sm:text-5xl mb-4">Welcome to our Computer Parts
                Store!</h1>
            <p class="text-gray-900 dark:text-white font-medium text-xl mb-8">Find the best selection of computer parts
                at unbeatable prices.</p>
            <form>
                <x-text-input type="text" name="query" id="search" placeholder="Search for computer parts"
                    class="w-[24rem] sm:w-full max-w-md mx-auto" :value="request('query')" />
            </form>
        </div>
    </header>

    <div class="py-12 space-y-2 -my-96">
        <x-card>
            @if ($products->total() > 0)
                <div class="grid gap-2 grid-cols-2 content-center sm:gap-4 md:grid-cols-4">
                    @foreach ($products as $product)
                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('product.show', $product) }}">
                                <img class="rounded-t-lg" src="{{ Storage::url($product->image) }}"
                                    alt="{{ $product->name }}" />
                            </a>
                            <div class="p-5">
                                <a href="{{ route('product.show', $product) }}">
                                    <h5
                                        class="mb-2 text-sm sm:text-base tracking-tight text-gray-900 dark:text-white">
                                        {{ $product->name }}</h5>
                                    <span class="text-lg text-black dark:text-gray-400 font-extrabold"><x-idr :value="$product->price" /></span>
                                </a>
                                {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p> --}}
                             <p></p>
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
                    @endforeach
                @else
                    <div class="text-center text-gray-600 my-10">
                        <span class="text-2xl">😞</span>
                        <h1 class="text-2xl">Product Not Found</h1>
                    </div>

            @endif
    </div>
    <div class="mt-2">
        {{ $products->links() }}
    </div>
    </x-card>

    </div>

</x-app-layout>
