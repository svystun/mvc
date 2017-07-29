<h1>Hello shop</h1>

<?php foreach ($products as $product): ?>
<div class="row">
    <div class="col-md-4">
        <h2><?=$product->prod_name?></h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
</div>
<?php endforeach; ?>
