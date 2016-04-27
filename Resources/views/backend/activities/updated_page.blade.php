@if($activity->subject->published)
    <div class="event">
        <div class="label">
            <i class="file outline icon"></i>
        </div>
        <div class="content">
            <div class="summary">
                {!!  trans(
                    'page::activities.updated_object.summary',
                    [
                        'user' => $activity->user->present()->fullname,
                        'title' => $activity->subject->title,
                        'url' => route('page', $activity->subject->slug),
                    ]
                    ) !!}
                <div class="date">
                    {{$activity->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="extra text">
                {!! $activity->subject->present()->summary !!}
            </div>
            <div class="meta">
                <a class="info" target="_blank" href="{{route('page', $activity->subject->slug)}}">
                    <i class="info icon"></i> {{trans('core::elements.action.read more')}}
                </a>
            </div>
        </div>
    </div>
@endif
