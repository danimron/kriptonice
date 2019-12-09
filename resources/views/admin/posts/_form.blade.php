<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::text('title', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('plaintext', 'Plain Text', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'p', 'required', 'name' => 'p']) !!}

        <span class="help-block">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('key', 'Keyword', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">        
        <input id="key" placeholder="Keyword" class="form-control" name="key" size="10" type="text"> 
        <span class="help-block">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-2">
        <input id="pc" name="pc"  size="1" value="x" type="hidden">
        <input name="btnEn"  class="btn btn-primary" value="Encrypt" onclick="Encrypt()" type="button"> 
    </div>
</div>

<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    {!! Form::label('body', 'Cipher Text', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'required', 'id' => 'body', 'name' => 'body']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
    </div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    {!! Form::label('category_id', 'Category', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    </div>
</div>

@php
    if(isset($post)) {
        $tag = $post->tags->pluck('name')->all();
    } else {
        $tag = null;
    }
@endphp

<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
    {!! Form::label('tags', 'Tag', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::select('tags[]', $tags, $tag, ['class' => 'form-control select2-tags', 'required', 'multiple']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('tags') }}</strong>
        </span>
    </div>
</div>
