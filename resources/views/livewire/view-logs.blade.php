<div>
    <div class="col-md-12 p-3 d-flex justify-content-center align-items-center">
        <div class="container p-3 rounded shadow-sm w-100">
            <div class="fw-bold h3 mb-2">Logs</div>

            <table class="w-100 text-center" cellspacing="10" cellpadding="10">
                <thead>
                    <tr class="border-bottom">
                        <th>#</th>
                        <th>Name</th>
                        <th>Purpose</th>
                        <th>Log Time</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($logs) > 0)
                        @foreach ($logs as $log)
                            <tr class="border-bottom">
                                <td>{{$log->id}}</td>
                                <td>{{$log->first_name.' '.$log->last_name}}</td>
                                <td>{{$log->transaction}}</td>
                                <td>{{Carbon\Carbon::parse($log->created_at)->format('F d, Y g:i a')}}</td> 
                            </tr>
                        @endforeach
                    @else
                            <tr class="border-bottom">
                                <td colspan="4" class="text-centr">No Logs Yet.</td>
                            </tr>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3 mx-1">
                {{$logs->links() }}
            </div>
        </div>
        
    </div>

</div>
