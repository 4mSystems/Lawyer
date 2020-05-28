<tr>
    @if ($result->notes ==null)
        <td class="hidden-xs center">----</td>
    @else
        <td class="hidden-xs center">{{$result->printnotes->note}}</td>
    @endif
    <td class="hidden-xs center">{{$result->session_date}}</td>
    <td class="hidden-xs center">{{$result->cases->inventation_type}}</td>
    <td class="hidden-xs center">{{$result->cases->circle_num}}</td>
    <td class="hidden-xs center">{{$result->cases->invetation_num}}</td>
    <td class="hidden-xs center">{{$khesm->client_Name}}</td>
    <td class="hidden-xs center">{{$clients->client_Name}}</td>
</tr>