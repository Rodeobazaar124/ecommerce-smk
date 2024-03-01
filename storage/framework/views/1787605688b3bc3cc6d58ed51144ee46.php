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
    <section class="py-6">

        <div class="justify-center items-center w-full flex md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-2 w-full max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 dark:bg-gray-800 rounded-lg shadow sm:p-5">
                    <!-- Modal header -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:mb-4 md:w-[600px]">
                            <img src="<?php echo e(Storage::url($product->image)); ?>"
                                class="mb-4 w-full h-full rounded-lg object-cover" alt="<?php echo e($product->name); ?>"
                                loading="eager">
                        </div>
                        <div class="md:w-3/4">
                            <h3 id="name_modal" class="mb-6 text-2xl text-black dark:text-white font-semibold">
                                <?php echo e($product->name); ?></h3>
                            <dl>
                                <dt class="dark:text-gray-100 mt-2 font-semibold leading-none text-black">Price</dt>
                                <dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5 dark:text-gray-100"><span
                                        id="price_modal"><?php if (isset($component)) { $__componentOriginal8eb618690d560649124b2702e9f6c82e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8eb618690d560649124b2702e9f6c82e = $attributes; } ?>
<?php $component = App\View\Components\Idr::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('idr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Idr::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->price)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8eb618690d560649124b2702e9f6c82e)): ?>
<?php $attributes = $__attributesOriginal8eb618690d560649124b2702e9f6c82e; ?>
<?php unset($__attributesOriginal8eb618690d560649124b2702e9f6c82e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8eb618690d560649124b2702e9f6c82e)): ?>
<?php $component = $__componentOriginal8eb618690d560649124b2702e9f6c82e; ?>
<?php unset($__componentOriginal8eb618690d560649124b2702e9f6c82e); ?>
<?php endif; ?></span></dd>
                            </dl>
                            <dl>
                                <dt class="dark:text-gray-100 mt-2 font-semibold leading-none text-black">Description
                                </dt>
                                <dd id="desc_modal" class="mb-4 font-light text-neutral-60 sm:mb-5 dark:text-gray-100">
                                    <?php echo e($product->description); ?></dd>
                            </dl>
                            <dl>
                                <dt class="dark:text-gray-100 mt-2 font-semibold leading-none text-black">Stock</dt>
                                <p id="category_detail"
                                    class="mb-4 font-light text-base text-neutral-60 sm:mb-5 dark:text-gray-100">
                                    <?php echo e($product->stock); ?></p>
                            </dl>
                        </div>
                    </div>
                    <div class="flex justify-end items-center">
                        <form action="<?php echo e(route('add.to.cart', $product)); ?>" method="POST" class="flex items-center justify-center gap-2">
                            <?php echo csrf_field(); ?>
                            <?php if(auth()->guard()->check()): ?>
                                <input type="text" name="amount"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-100 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Amount" required min="1" value="1" max="<?php echo e($product->stock); ?>" />
                                <button
                                    class="text-white w-full border-2 inline-flex items-center bg-gray-800 hover:text-black hover:bg-gray-200 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-0 py-2.5 text-center justify-center">
                                    Add to cart
                                </button>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                                <a href="<?php echo e(route('login')); ?>"
                                    class="text-white inline-flex items-center bg-gray-800 hover:text-black hover:bg-gray-200 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    <i class="dark:text-gray-100"></i>
                                    Add to cart
                                </a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

    </section>
    <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'm-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'm-2']); ?>
        <a class="p-2 rounded-md" href="<?php echo e(route('product.index')); ?>">
            Back to Index Product
        </a>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
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
<?php /**PATH C:\xamppbib\htdocs\latihan_ecommerce\resources\views/product/show.blade.php ENDPATH**/ ?>