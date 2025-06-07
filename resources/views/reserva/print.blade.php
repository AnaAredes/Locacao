<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Reserva</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            color: #333;
            margin: 40px;
            background-color: #fafafa;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header img {
            max-height: 60px;
        }

        .title {
            font-size: 24px;
            margin-top: 10px;
            color: #6a0dad;
            /* Roxo elegante */
            font-weight: bold;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 6px;
            overflow: hidden;
        }

        td {
            padding: 12px 16px;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #f0e6f6;
        }

        .label {
            font-weight: bold;
            width: 30%;
            color: #6a0dad;
        }

        .value {
            width: 70%;
        }

        .footer {
            margin-top: 60px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('imagem/logo_locacao.png') }}" alt="Logo">
        <div class="title">Dados da Reserva</div>
    </div>

    <table>
        <tr>
            <td class="label">Referência:</td>
            <td class="value">{{ $reserva->id }}</td>
        </tr>
        <tr>
            <td class="label">Nome do Hóspede:</td>
            <td class="value">{{ $reserva->user->name }}</td>
        </tr>
        <tr>
            <td class="label">Email de Contacto:</td>
            <td class="value">{{ $reserva->user->email }}</td>
        </tr>
        <tr>
            <td class="label">Acomodação:</td>
            <td class="value">{{ $reserva->bemLocavel->modelo }}</td>
        </tr>
        <tr>
            <td class="label">Data de Check-in:</td>
            <td class="value">{{ $reserva->data_inicio->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="label">Data de Check-out:</td>
            <td class="value">{{ \Carbon\Carbon::parse($reserva->data_fim)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="label">Pagamento:</td>
            <td class="value">{{ $reserva->preco_total }}</td>
        </tr>
        <tr class="info-row">
            <td colspan="2">
                Os horários de check-in e check-out são flexíveis conforme disponibilidade. <br>
                Caso precise de mais informações ou tenha dúvidas, entre em contacto pelo telefone <strong>222 333
                    444</strong>.
            </td>
        </tr>
    </table>

    <div class="footer">
        Documento gerado automaticamente por {{ config('app.name') }} em {{ now()->format('d/m/Y H:i') }}.<br>
        Agradecemos por escolher nossos serviços!<br>
        Para assistência, entre em contacto com a nossa equipa de suporte suporte@paraiso.com
    </div>
</body>
</html>