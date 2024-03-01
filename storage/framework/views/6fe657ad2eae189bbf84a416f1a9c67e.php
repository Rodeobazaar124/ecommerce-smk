<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                        <p class="text-lg font-semibold"><?php echo e($order->id); ?></p>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">By</label>
                        <p class="text-lg font-semibold"><?php echo e($order->user->name); ?></p>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Status</label>
                        <?php if($order->is_paid == true): ?>
                            <p class="text-lg font-semibold text-green-500">Paid</p>
                        <?php else: ?>
                            <p class="text-lg font-semibold text-red-500">Unpaid</p>
                        <?php endif; ?>
                    </div>
                    <hr class="mb-6 border-t">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Order Details</label>
                        <?php
                            $total_price = 0;
                        ?>
                        <?php $__currentLoopData = $order->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="text-gray-700"><?php echo e($transaction->product->name); ?> : <?php echo e($transaction->amount); ?> pcs
                            </p>
                            <?php
                                $total_price += $transaction->product->price * $transaction->amount;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Total</label>
                        <p class="text-lg font-semibold"><?php echo e($total_price); ?></p>
                    </div>
                    <?php if($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin): ?>
                        <form action="<?php echo e(route('store_receipt', $order)); ?>" method="post"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700">Upload your payment
                                    receipt</label>
                                <input type="file" name="payment_receipt"
                                    class="w-full p-2 border border-gray-300 rounded">
                            </div>
                            <button type="submit" class="w-full px-3 py-2 text-white bg-blue-500 rounded">Submit
                                payment</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xamppbib\htdocs\latihan_ecommerce\resources\views/order/show.blade.php ENDPATH**/ ?>