<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    @php
        $total_price = 0;
    @endphp

    <div class="py-12 space-y-2">
        <x-card>
            <div class="flex gap-5">
                @foreach ($carts as $cart)
                    <div class="w-[14rem]" style="width: 14rem;">
                        <img src="{{ url('storage/' . $cart->product->image) }}">
                        <div>
                            <h5 class="dark:text-white text-2xl">{{ $cart->product->name }}</h5>
                            <form action="{{ route('update.cart', $cart) }}" method="post">
                                @method('patch')
                                @csrf
                                    <x-text-input type="number" name="amount" value="{{ $cart->amount }}" />
                                    <x-primary-button type="submit">Update amount</x-primary-button>
                            </form>
                            <form action="{{ route('destroy.cart', $cart) }}" method="post" class="mt-1">
                                @method('delete')
                                @csrf
                                <x-danger-button type="submit">Delete</x-danger-button>
                            </form>
                        </div>
                    </div>

                    @php
                        $total_price += $cart->product->price * $cart->amount;
                    @endphp
                @endforeach
            </div>
        </x-card>
        <x-card class="flex flex-col  bg-white w-1/4" innerClass="flex justify-content-end items-end">
            <p class="dark:text-white">Total: <x-idr :value="$total_price"/></p>
            <form action="{{ route('checkout') }}" method="post">
                @csrf
                <button
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    type="submit" {{ $carts->isEmpty() ? 'disabled' : '' }}>Checkout</button>
            </form>
        </x-card>

</x-app-layout>
