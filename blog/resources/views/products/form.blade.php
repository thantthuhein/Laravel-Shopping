<div class="form-group">
    <label>Product Name</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label>Description</label>
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label>Product Price</label>
    {{ Form::number('price', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label>Product Quantity</label>
    {{ Form::number('quantity', null, ['class' => 'form-control']) }}
</div>