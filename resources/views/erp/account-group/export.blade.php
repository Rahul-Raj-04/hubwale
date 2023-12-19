<table>
    <thead>
    <tr>
        <th colspan='3'>{{auth()->user()->company->company_name}}</th>
    </tr>
    <tr>
        <th>Group Name</th>
        <th>Super Group</th>
        <th>Sequence</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan='3'><h4><b>{{\App\Enum\Enum::TRADING}}</b></h4></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
        </tr>
        @foreach ($accountGroups as $key => $group)
            @if($group->category == \App\Enum\Enum::TRADING)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->parent_group ? $group->parent_group->name : '-' }}</td>
                    <td>{{ $group->sequence }}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <td colspan='3'><h4><b>{{\App\Enum\Enum::PROFITLOSS}}</b></h4></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
        </tr>
        @foreach ($accountGroups as $key => $group)
            @if($group->category == \App\Enum\Enum::PROFITLOSS)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->parent_group ? $group->parent_group->name : '-' }}</td>
                    <td>{{ $group->sequence }}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <td colspan='3'><h4><b>{{\App\Enum\Enum::BALANCESHEET}}</b></h4></td>
            <td style="display: none"></td>
            <td style="display: none"></td>
        </tr>
        @foreach ($accountGroups as $key => $group)
            @if($group->category == \App\Enum\Enum::BALANCESHEET)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->parent_group ? $group->parent_group->name : '-' }}</td>
                    <td>{{ $group->sequence }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
