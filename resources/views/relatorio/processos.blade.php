<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relatório</title>
</head>
<body>
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Número do processo</th>
                    <th scope="col">Vara</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($processos as $processo)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>
                            {{$processo->autor}}
                        </td>
                        <td>
                            {{$processo->numeroProcesso}}
                        </td>
                        <td>
                            {{$processo->vara}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
