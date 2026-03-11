<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class PermohonanInformasiMail extends Mailable
{
    use Queueable, SerializesModels;
    public array $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[PPID] Permohonan Informasi Baru - ' . $this->data['nomor_registrasi'],
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'emails.permohonan-informasi',
            with: ['permohonan' => $this->data],
        );
    }
}