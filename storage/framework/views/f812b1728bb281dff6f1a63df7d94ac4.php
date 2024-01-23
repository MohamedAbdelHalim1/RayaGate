<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raya-Gate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        #nav{
            display: flex;
            justify-content: center;
            
        }
        #nav > a:hover{
            color:grey;
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid" id="nav">
                <a class="navbar-brand" href="<?php echo e(route('view_all_products')); ?>">Products</a>
                <a class="navbar-brand" href="<?php echo e(route('view_all_categories')); ?>">Categories</a> 
            </div>               
        </nav> <!--end of nav -->

        <div style="width:65%;margin:auto;margin-top:80px;">
            <h1><?php echo e($category->name); ?></h1><br>
            <hr>
            <h3><b>Products:</b></h3><ul>
                 <?php if(count($category->products) == 0): ?>
                 <i>"This Category Without Products"</i>
                 <?php else: ?>
                <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($product->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html><?php /**PATH C:\rayaGateTask\resources\views/category/more_details.blade.php ENDPATH**/ ?>