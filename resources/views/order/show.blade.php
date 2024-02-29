<x-app-layout>
    <section class="py-6">
        <x-card>
            <p>ID: {{ $order->id }}</p>
            <p>User: {{ $order->user->name }}</p>
            @foreach ($order->transactions as $transaction)
                <p>Product: {{ $transaction->product->name }}</p>
                <p>Amount: {{ $transaction->amount }}</p>
            @endforeach
        </x-card>
    </section>
    <x-primary-button class="m-2">
        <a class="p-2 rounded-md" href="{{ route('product.index') }}">
            Back to Index Product
        </a>
    </x-primary-button>
</x-app-layout>
