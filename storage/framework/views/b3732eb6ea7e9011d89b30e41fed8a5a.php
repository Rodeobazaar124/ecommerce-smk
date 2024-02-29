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
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white p-6 rounded-md shadow-md">
                    <div class="text-lg font-semibold"><?php echo e(__('Orders')); ?></div>
                    <div class="mt-4">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-2 w-96">
                                <div class="bg-white p-4 border border-gray-300">
                                    <a href="<?php echo e(route('show_order', $order)); ?>">
                                        <h5 class="text-xl font-semibold">Order ID <?php echo e($order->id); ?></h5>
                                    </a>
                                    <h6 class="text-gray-600">By <?php echo e($order->user->name); ?></h6>
                                    <?php if($order->is_paid): ?>
                                        <p class="text-green-500">Paid</p>
                                    <?php else: ?>
                                        <p class="text-red-500">Unpaid</p>
                                        <?php if($order->payment_receipt): ?>
                                            <div class="flex justify-between mt-2">
                                                <a href="<?php echo e(url('storage/' . $order->payment_receipt)); ?>"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded">Show Payment Receipt</a>
                                                <?php if(Auth::user()->is_admin): ?>
                                                    <form action="<?php echo e(route('confirm_payment', $order)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <button class="bg-green-500 text-white px-4 py-2 rounded"
                                                            type="submit">Confirm</button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
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
<?php /**PATH D:\laragon\www\e-commerce-pwpb\resources\views/order/index.blade.php ENDPATH**/ ?>