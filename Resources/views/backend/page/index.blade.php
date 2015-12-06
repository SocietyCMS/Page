@extends('layouts.master')

@section('title')
	{{ trans('page::page.title.pages') }}
@endsection
@section('subTitle')
	{{ trans('page::page.title.all pages') }}
@endsection

@section('content')

	<div class="ui blue segment">
		<a href="{{route('backend::page.pages.create')}}" class="fluid ui blue button">{{trans('core::elements.action.create resource', ['name'=>trans('page::page.title.page')])}}</a>
	</div>

	<table class="ui selectable very compact celled table">
		<thead>
			<tr>
				<th>{{ trans('page::page.table.title') }}</th>
				<th>{{ trans('page::page.table.author') }}</th>
				<th>{{ trans('page::page.table.modified') }}</th>
				<th>{{ trans('page::page.table.status') }}</th>
				<th class="collapsing"></th>
			</tr>
		</thead>
		<tbody>
		@foreach ($pages as $page)
			<tr>
				<td><b><a href="{{route('backend::page.pages.edit',$page->slug)}}">{{$page->title}}</a></b></td>
				<td>{{ $page->user->present()->fullname }}</td>
				<td>{{$page->present()->updatedAt}}</td>
				<td>
					@if($page->published)
						<span class="ui green label">@lang('core::elements.state.published')</span>
					@else
						<span class="ui yellow label">@lang('core::elements.state.draft')</span>
					@endif
				</td>
				<td>
					<div class="ui icon top right pointing dropdown button">
						<i class="wrench icon"></i>
						<div class="menu">
							<a class="item" href="{{route('backend::page.pages.edit', $page->slug)}}">@lang('core::elements.button.edit')</a>
							<a class="disabled item">@lang('core::elements.button.delete')</a>
						</div>
					</div>
				</td>
			</tr>
		@endforeach
		@if($pages->count() == 0)
			<tr class="center aligned">
				<td colspan = "5">@lang('page::page.messages.no articles')</td>
			</tr>
		@endif
		</tbody>
	</table>

@stop

@section('javascript')
	<script>

		$('.dropdown')
				.dropdown({
					// you can use any ui transition
					transition: 'drop'
				});
	</script>
@endsection
