
<tbody style="">
@if(isset($members) &&  count($members) > 1)

<!--    --><?php //$n=1; ?>
    @foreach($members as $member)
        <tr role="row" class="even">
            {{--<th tabindex="0">--}}
            {{--<label>--}}
            {{--<input class="selectpin" data-id="{{$member->username}}" type="checkbox">--}}
            {{--<span></span>--}}
            {{--</label>--}}
            {{--</th>--}}
            <td>{{$member->id}}</td>
            <td>{{$member->firstname. ' '. $member->lastname}}</td>

            <td>{{$member->username}}</td>
{{--            <td>{{$member->sponsor}}</td>--}}
            <td>{{$member->package->name}} &nbsp; <a href="{{route('change_package', $member->id)}}">Upgrade</a></td>
            {{--                                                                <td>{{$member->rewards[0]->left_pvs + $member->rewards[0]->right_pvs + $member->rewards[0]->points}}</td>--}}

        </tr>
    @endforeach
@endif
