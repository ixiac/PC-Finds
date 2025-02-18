@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Account Logs</h3>

            <table id="logsTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Username</th>
                        <th>Activity</th>
                        <th>Date and Time</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>Admin-Alvin</td>
                        <td>
                            <span class="badge rounded-pill"
                                style="background-color:rgba(22, 142, 58, 0.65); border: solid 1px green;">
                                Logged In
                            </span>
                        </td>
                        <td>2025-3-15 10:00:00</td>
                    </tr>

                    <tr>
                        <td>Admin-Alvin</td>
                        <td>
                            <span class="badge rounded-pill"
                                style="background-color:rgba(142, 98, 22, 0.65); border: solid 1px orange;">
                                Signed Out
                            </span>
                        </td>
                        <td>2025-3-15 10:00:00</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#logsTable').DataTable();
        });

    </script>

@endsection