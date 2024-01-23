<!DOCTYPE html>
<html lang="en">
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

        <form class="form-horizontal" action="<?php echo e(route('upload_category',$category->id)); ?>" method="post" style="width:65%;margin:auto;margin-top:80px;">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><b>Name:</b><span style="color:red;">*</span></label>
                <div class="col-sm-10">
                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($category->name); ?>"  placeholder="Enter Name" name="name">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
 

            <div class="form-group">
                <label class="control-label col-sm-2" for="category"><b>Products:</b></label>
                <div class="col-sm-10">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                        <input type="checkbox"  name="product[]" value="<?php echo e($product->id); ?>" <?php if(in_array($product->id, $checked)): ?> checked <?php endif; ?>  >
                        <label><?php echo e($product->name); ?></label><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        
</body>
</html><?php /**PATH C:\rayaGateTask\resources\views/category/edit_category.blade.php ENDPATH**/ ?>