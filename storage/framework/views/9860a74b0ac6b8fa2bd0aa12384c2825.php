<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['class' => '', 'innerClass' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['class' => '', 'innerClass' => '']); ?>
<?php foreach (array_filter((['class' => '', 'innerClass' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 <?php echo e($innerClass); ?>">
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg <?php echo e($class); ?>">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xamppbib\htdocs\latihan_ecommerce\resources\views/components/card.blade.php ENDPATH**/ ?>