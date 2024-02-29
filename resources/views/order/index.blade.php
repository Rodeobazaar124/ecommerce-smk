<x-app-layout>
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white p-6 rounded-md shadow-md">
                    <div class="text-lg font-semibold">{{ __('Orders') }}</div>
                    <div class="mt-4">
                        @foreach ($orders as $order)
                            <div class="mb-2 w-96">
                                <div class="bg-white p-4 border border-gray-300">
                                    <a href="{{ route('show_order', $order) }}">
                                        <h5 class="text-xl font-semibold">Order ID {{ $order->id }}</h5>
                                    </a>
                                    <h6 class="text-gray-600">By {{ $order->user->name }}</h6>
                                    @if ($order->is_paid)
                                        <p class="text-green-500">Paid</p>
                                    @else
                                        <p class="text-red-500">Unpaid</p>
                                        @if ($order->payment_receipt)
                                            <div class="flex justify-between mt-2">
                                                <a href="{{ url('storage/' . $order->payment_receipt) }}"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded">Show Payment Receipt</a>
                                                @if (Auth::user()->is_admin)
                                                    <form action="{{ route('confirm_payment', $order) }}" method="post">
                                                        @csrf
                                                        <button class="bg-green-500 text-white px-4 py-2 rounded"
                                                            type="submit">Confirm</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
