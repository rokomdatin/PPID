<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Informasi Baru</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f4f6; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.07);">
                    {{-- Header --}}
                    <tr>
                        <td style="background: linear-gradient(135deg, #1e40af, #3b82f6); padding: 32px 40px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 700;">
                                Permohonan Informasi Baru
                            </h1>
                            <p style="margin: 8px 0 0; color: #dbeafe; font-size: 14px;">
                                PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat
                            </p>
                        </td>
                    </tr>
                    {{-- Registration Number Badge --}}
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background-color: #eff6ff; border: 1px solid #bfdbfe; border-radius: 10px; padding: 16px 20px;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <p style="margin: 0; font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Nomor Registrasi</p>
                                                    <p style="margin: 4px 0 0; font-size: 20px; font-weight: 700; color: #1e40af;">{{ $permohonan['nomor_registrasi'] }}</p>
                                                </td>
                                                <td align="right" style="vertical-align: top;">
                                                    <p style="margin: 0; font-size: 12px; color: #6b7280;">Tanggal</p>
                                                    <p style="margin: 4px 0 0; font-size: 14px; font-weight: 600; color: #374151;">{{ $permohonan['tanggal_permohonan'] }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- Data Pemohon --}}
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <h2 style="margin: 0 0 16px; font-size: 16px; font-weight: 700; color: #1f2937; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                                👤 Data Pemohon
                            </h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size: 14px;">
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; width: 140px; vertical-align: top;">Nama</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $permohonan['nama'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; vertical-align: top;">Alamat</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $permohonan['alamat'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280;">No. Telepon</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">{{ $permohonan['telepon'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280;">Email</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: 500;">
                                        <a href="mailto:{{ $permohonan['email'] }}" style="color: #2563eb; text-decoration: none;">{{ $permohonan['email'] }}</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- Detail Permohonan --}}
                    <tr>
                        <td style="padding: 24px 40px 0;">
                            <h2 style="margin: 0 0 16px; font-size: 16px; font-weight: 700; color: #1f2937; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                                📄 Detail Permohonan
                            </h2>
                            {{-- Rincian Informasi --}}
                            <div style="margin-bottom: 16px;">
                                <p style="margin: 0 0 4px; font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Rincian Informasi yang Dibutuhkan</p>
                                <div style="background-color: #f9fafb; border-left: 3px solid #3b82f6; padding: 12px 16px; border-radius: 0 8px 8px 0;">
                                    <p style="margin: 0; font-size: 14px; color: #1f2937; line-height: 1.6;">{{ $permohonan['rincian_informasi'] }}</p>
                                </div>
                            </div>
                            {{-- Tujuan --}}
                            <div style="margin-bottom: 16px;">
                                <p style="margin: 0 0 4px; font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Tujuan Penggunaan Informasi</p>
                                <div style="background-color: #f9fafb; border-left: 3px solid #3b82f6; padding: 12px 16px; border-radius: 0 8px 8px 0;">
                                    <p style="margin: 0; font-size: 14px; color: #1f2937; line-height: 1.6;">{{ $permohonan['tujuan'] }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {{-- Cara Memperoleh --}}
                    <tr>
                        <td style="padding: 16px 40px 0;">
                            <h2 style="margin: 0 0 16px; font-size: 16px; font-weight: 700; color: #1f2937; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;">
                                📦 Cara Perolehan
                            </h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="50%" style="padding: 8px; vertical-align: top;">
                                        <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 14px;">
                                            <p style="margin: 0 0 4px; font-size: 11px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Cara Memperoleh</p>
                                            <p style="margin: 0; font-size: 14px; font-weight: 600; color: #166534;">{{ $permohonan['cara_memperoleh_label'] }}</p>
                                        </div>
                                    </td>
                                    <td width="50%" style="padding: 8px; vertical-align: top;">
                                        <div style="background-color: #fefce8; border: 1px solid #fde68a; border-radius: 8px; padding: 14px;">
                                            <p style="margin: 0 0 4px; font-size: 11px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Cara Salinan</p>
                                            <p style="margin: 0; font-size: 14px; font-weight: 600; color: #854d0e;">{{ $permohonan['cara_salinan_label'] }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- Footer --}}
                    <tr>
                        <td style="padding: 32px 40px;">
                            <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 0 0 16px;">
                            <p style="margin: 0; font-size: 12px; color: #9ca3af; text-align: center; line-height: 1.6;">
                                Email ini dikirim otomatis oleh sistem PPID Kemenko PM.<br>
                                Harap segera proses permohonan ini dalam waktu <strong style="color: #6b7280;">10 hari kerja</strong>.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>