@extends('paging.admin')

@section('content')

    <div class="container">
        <h3 class="mb-4" style="color: #2fa572;">Account Logs</h3>

        <table id="logsTable" class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Activity</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->account ? $log->account->username : 'Unknown' }}</td>

                        <td>{{ $log->account ? ($log->account->role == 1 ? 'Customer' : ($log->account->role == 2 ? 'Admin' : ($log->account->role == 3 ? 'Super Admin' : 'Unknown'))) : 'Unknown' }}
                        </td>
                        <td>
                            <span class="badge rounded-pill" style="background-color: {{ $log->activity == 'Logged In' ? 'rgba(22, 142, 58, 0.65)' : 'rgba(142, 98, 22, 0.65)' }}; 
                                                                             border: solid 1px {{ $log->activity == 'Logged In' ? 'green' : 'orange' }}; 
                                                                             width: 90px;">
                                {{ $log->activity }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($log->updated_at)->format('F d, Y H:i') }}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#logsTable').DataTable({
                "order": [[3, "desc"]], // Sort by the 4th column (Updated At)
                "columnDefs": [
                    { "type": "date", "targets": 3 } // Make sure it recognizes dates properly
                ],
                "responsive": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>



@endsection