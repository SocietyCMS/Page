@extends('layouts.master')

@section('title')
    {{ trans('page::page.title.pages') }}
@endsection
@section('subTitle')
    {{trans('core::elements.action.create resource', ['name'=>trans('page::page.title.page')])}}
@endsection

@section('content')
    <form class="ui form" role="form" method="POST" action="{{route('backend::page.pages.store')}}" >
        {!! csrf_field() !!}

        @include('page::backend.forms.page')

        <div class="ui basic clearing segment">
            <a href="{{route('backend::page.pages.index')}}" class="ui right floated button">
                {{ trans('core::elements.button.cancel') }}
            </a>
            <button class="ui primary right floated button" type="submit">
                {{ trans('core::elements.button.create') }}
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
