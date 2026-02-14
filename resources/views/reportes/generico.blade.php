<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo ?? 'Reporte' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 5px;
        }
        .fecha {
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #333;
            color: #fff;
            padding: 8px 5px;
            text-align: left;
            font-size: 11px;
        }
        td {
            padding: 6px 5px;
            border-bottom: 1px solid #ddd;
            font-size: 11px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .totales {
            margin-top: 15px;
            text-align: right;
            font-weight: bold;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <h1>{{ $titulo ?? 'Reporte' }}</h1>
    <div class="fecha">Generado: {{ now()->format('d/m/Y H:i') }}</div>

    @if(!empty($filtros))
    <div style="font-size: 11px; margin-bottom: 10px;">
        @foreach($filtros as $key => $valor)
            <strong>{{ $key }}:</strong> {{ $valor }} &nbsp;
        @endforeach
    </div>
    @endif

    <table>
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(isset($total))
    <div class="totales">
        Total: ${{ number_format($total, 2) }}
    </div>
    @endif
</body>
</html>
