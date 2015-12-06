<div class="required field {{ $errors->has('title') ? 'error' : '' }}">
    <label>@lang('page::page.form.title')</label>
    <input type="text"
           id="title"
           name="title"
           value="{{ old('title', isset($page)?$page->title:null) }}">

    {!! $errors->first('title', '<div class="ui error message">:message</div>') !!}
</div>

<div class="required field {{ $errors->has('body') ? 'error' : '' }}">
    <label>@lang('page::page.form.content')</label>
    <textarea name="body" class="editable">{{ old('body', isset($page)?$page->body:null) }}</textarea>
    {!! $errors->first('body', '<div class="ui error message">:message</div>') !!}
</div>

<div class="field ">
    <div class="ui toggle checkbox">
        <input type="checkbox" name="published" value="1" @if(isset($page) && $page->published) checked @endif >
        <label>@lang('core::elements.change state.publish')</label>
    </div>
</div>

@section('javascript')
    <script>
        var editor = new MediumEditor('.editable', {
            placeholder: {
                text: ''
            }
        });
    </script>
@endsection
