<li>
    <h6>NOTIFICATIONS<span class="new badge notif_inside_badge">{{$unread->count()}}</span></h6>
</li>
<li class="divider"></li>
@isset($notifications)
    @foreach($notifications as $notification)
        <li class="notification_list unread_notif" data-read="{{$notification->read_at == null?0:1 }}" style="{{$notification->read_at == null?'background: #eee!important; color:#333!important;':''}}">
            <a class="grey-text text-darken-2" href="{!! $notification->data["actionUrl"]!!}">
                <span class="material-icons icon-bg-circle cyan small">perm_identity</span>

                  <p>{{$notification->data["subject"]}}</p>
                <small class="font-weight-300" style="margin-left:38px; font-weight: 600!important;">{!! $notification->data["introLines"][0]!!}</small>
            </a>
            <time class="media-meta" datetime="">at: {{$notification->created_at}}</time>
        </li>
    @endforeach
@endisset