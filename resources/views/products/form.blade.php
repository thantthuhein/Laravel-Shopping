@if (isset($product->imagePath))
    <div class="text-center">
        <img src="{{ $product->imagePath }}" class="h-100 w-100">    
    </div>    
@else
<hr>
@endif
<div class="form-group">
    <label>Type Image Link Here</label>
    {{ Form::text('imagePath', null, [
            'class' => ($errors->has('imagePath') ? 'form-control is-invalid' : 'form-control')
    ])}}
    @if($errors->has('imagePath'))
        <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('imagePath')}} </strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Product Name</label>
    {{ Form::text('name', null, [
            'class' => ($errors->has('name') ? 'form-control is-invalid' : 'form-control')
    ])}}
    @if($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('name')}} </strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Price</label>
    {{ Form::text('price', null, [
            'class' => ($errors->has('price') ? 'form-control is-invalid' : 'form-control')
    ])}}
    @if($errors->has('price'))
        <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('price')}} </strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Quantity</label>
    {{ Form::text('quantity', null, [
            'class' => ($errors->has('quantity') ? 'form-control is-invalid' : 'form-control')
    ])}}
    @if($errors->has('quantity'))
        <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('quantity')}} </strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Colors</label>
    {{ Form::text('colors', null, [
            'class' => ($errors->has('colors') ? 'form-control is-invalid' : 'form-control')
    ])}}
    @if($errors->has('colors'))
        <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('colors')}} </strong>
        </span>
    @endif
</div>
    
    

<div class="form-group">
    <label>Description</label>
    {{ Form::textarea('description', null, [
            'class' => ($errors->has('description') ? 'form-control is-invalid' : 'form-control')
    ])}}
    @if($errors->has('description'))
        <span class="invalid-feedback" role="alert">
            <strong> {{ $errors->first('description')}} </strong>
        </span>
    @endif
</div>

