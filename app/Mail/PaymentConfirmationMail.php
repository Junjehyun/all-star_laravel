<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    // 주문정보를 담을 변수 선언
    public $order;
    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @return void
     *
     * 주문 정보를 $order로 받아와서 메일에서 사용할 수 있도록 함
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     *
     * 이메일 제목을 '[xyz Mart]商品の決済が完了しました。'로 설정
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[xyz Mart]商品の決済が完了しました。',
        );
    }

    /**
     * Get the message content definition.
     *
     * emails.payment_confirmation 뷰를 메일의 내용으로 설정
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * 첨부 파일이 없으면 빈 배열을 반환
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
