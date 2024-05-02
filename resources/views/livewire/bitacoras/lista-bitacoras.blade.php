<div class="container text-center" >
    <div class="container" >
        <div class="mb-3 row">
            <div class="col-sm-7"></div>
        </div>
    </div>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">U_Id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Cliente IP</th>
                    <th scope="col">Accion</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($userLogs as $fila => $userLog)
                    <tr>
                        <td>{{ $userLog->user_id }}</td>
                        <td>{{ $userLog->user->name }}</td>
                        <td>{{ $userLog->client_ip }} </td>
                        <td>{{ $userLog->action }} </td>
                        <td>{{ $userLog->created_at }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $userLogs->links() }}
</div>
