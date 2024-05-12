<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php echo $__env->make('_posts-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <?php if($posts->count()): ?>
                <?php if (isset($component)) { $__componentOriginal18ef7d12c41988c56e34232061a1b93c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ef7d12c41988c56e34232061a1b93c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.posts-grid','data' => ['posts' => $posts]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('posts-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['posts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($posts)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ef7d12c41988c56e34232061a1b93c)): ?>
<?php $attributes = $__attributesOriginal18ef7d12c41988c56e34232061a1b93c; ?>
<?php unset($__attributesOriginal18ef7d12c41988c56e34232061a1b93c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ef7d12c41988c56e34232061a1b93c)): ?>
<?php $component = $__componentOriginal18ef7d12c41988c56e34232061a1b93c; ?>
<?php unset($__componentOriginal18ef7d12c41988c56e34232061a1b93c); ?>
<?php endif; ?>
            <?php else: ?>
                <p class="text-center"> No posts yet. Please check back later </p>
            <?php endif; ?>
        </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\blog\resources\views/posts.blade.php ENDPATH**/ ?>