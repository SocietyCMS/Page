@extends('layouts.master')

@section('title')
    {{ trans('page::page.title.pages') }}
@endsection
@section('subTitle')
    {{trans('core::elements.action.edit resource', ['name'=>trans('page::page.title.page')])}}
@endsection

@section('content')
    <form class="ui form" role="form" method="POST" action="{{route('backend::page.pages.update', $page->slug)}}" >
        <input type="hidden" name="_method" value="PUT">
        {!! csrf_field() !!}

        @include('page::backend.forms.page')

        <div class="ui detail accordion field">
            <div class="title">
                <i class="icon dropdown"></i>
                @lang('core::elements.button.optional details')
            </div>
            <div class="content field">
                <div class="ui segment field">
                    <div class="ui toggle checkbox">
                        <input type='hidden' value='0' name='create_menu_entry'>
                        <input type="checkbox" name="create_menu_entry" value="1" @if(isset($page) && $page->create_menu_entry) checked @endif >
                        <label>@lang('page::page.state.create_menu_entry')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui basic clearing segment">
            <a href="{{route('backend::page.pages.index')}}" class="ui right floated button">
                {{ trans('core::elements.button.cancel') }}
            </a>
            <button class="ui primary right floated button" type="submit">
                {{ trans('core::elements.button.update') }}
            </button>
        </div>

    </form>
@endsection

@section('javascript')
    <script>
        $('.ui.detail.accordion')
                .accordion();
    </script>
@endsection
