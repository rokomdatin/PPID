<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Keberatan Baru</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f4f6; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.07);">
                    <tr>
                        <td style="background: linear-gradient(135deg, #9a3412, #ea580c); padding: 32px 40px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 700;">
                                Pengajuan Keberatan Informasi Baru
                            </h1>
                            <p style="margin: 8px 0 0; color: #ffedd5; font-size: 14px;">
                                PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background-color: #fff7ed; border: 1px solid #fed7aa; border-radius: 10px; padding: 16px 20px;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <p style="margin: 0; font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Nomor Registrasi</p>
                                                    <p style="margin: 4px 0 0; font-size: 20px; font-weight: 700; color: #9a3412;">{{ $keberatan['nomor_registrasi'] }}</p>
                                                </td>
                                                <td align="right" style="vertical-align: top;">
                                                    <p style="margin: 0; font-size: 12px; color: #6b7280;">Tanggal</p>
                                                    <p style="margin: 4px 0 0; font-size: 14px; font-weight: 600; color: #374151;">{{ $keberatan['tanggal_pengajuan'] }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <h2 style="margin: 0 0 16px; font-size: 16px; font-weight: 700; color: #1f2937; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                                Data Permohonan
                            </h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size: 14px;">
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; width: 200px; vertical-align: top;">Nomor Permohonan Awal</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['nomor_permohonan'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; vertical-align: top;">Tujuan Penggunaan</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['tujuan_penggunaan'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280;">Status Awal</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['status'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <h2 style="margin: 0 0 16px; font-size: 16px; font-weight: 700; color: #1f2937; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                                Data Pemohon
                            </h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size: 14px;">
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; width: 200px; vertical-align: top;">Nama Pemohon</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['nama_pemohon'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; vertical-align: top;">Alamat Pemohon</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['alamat_pemohon'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280;">Telepon Pemohon</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['telepon_pemohon'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280;">Pekerjaan Pemohon</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['pekerjaan_pemohon'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <h2 style="margin: 0 0 16px; font-size: 16px; font-weight: 700; color: #1f2937; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                                Detail Keberatan
                            </h2>
                            <div style="margin-bottom: 16px;">
                                <p style="margin: 0 0 4px; font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Alasan Keberatan</p>
                                <div style="background-color: #fff7ed; border-left: 3px solid #ea580c; padding: 12px 16px; border-radius: 0 8px 8px 0;">
                                    <p style="margin: 0; font-size: 14px; color: #1f2937; line-height: 1.6;">{{ $keberatan['alasan_keberatan'] }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <h2 style="margin: 0 0 16px; font-size: 16px; font-weight: 700; color: #1f2937; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                                Data Kuasa (Jika Ada)
                            </h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size: 14px;">
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; width: 200px; vertical-align: top;">Nama Kuasa</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['nama_kuasa'] ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; vertical-align: top;">Alamat Kuasa</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['alamat_kuasa'] ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280;">Telepon Kuasa</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $keberatan['telepon_kuasa'] ?: '-' }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 32px 40px;">
                            <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 0 0 16px;">
                            <p style="margin: 0; font-size: 12px; color: #9ca3af; text-align: center; line-height: 1.6;">
                                Email ini dikirim otomatis oleh sistem PPID Kemenko PM.<br>
                                Harap tindak lanjut pengajuan keberatan ini sesuai SLA layanan informasi publik.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
