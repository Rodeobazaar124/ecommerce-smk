<x-app-layout>
    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div class="mb-5">
                        <h1 class="text-3xl font-bold text-gray-900">Order Detail</h1>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Order ID</label>
                        <p class="text-lg font-semibold">{{ $order->id }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">By</label>
                        <p class="text-lg font-semibold">{{ $order->user->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Status</label>
                        @if ($order->is_paid == true)
                            <p class="text-lg font-semibold text-green-500">Paid</p>
                        @else
                            <p class="text-lg font-semibold text-red-500">Unpaid</p>
                        @endif
                    </div>
                    <hr class="mb-6 border-t">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Order Details</label>
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach ($order->transactions as $transaction)
                            <p class="text-gray-700">{{ $transaction->product->name }} : {{ $transaction->amount }} pcs
                            </p>
                            @php
                                $total_price += $transaction->product->price * $transaction->amount;
                            @endphp
                        @endforeach
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Total</label>
                        <p class="text-lg font-semibold">{{ $total_price }}</p>
                    </div>
                    @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                        <form action="{{ route('store_receipt', $order) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700">Upload your payment
                                    receipt</label>
                                <input type="file" name="payment_receipt"
                                    class="w-full p-2 border border-gray-300 rounded">
                            </div>
                            <button type="submit" class="w-full px-3 py-2 text-white bg-blue-500 rounded">Submit
                                payment</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
