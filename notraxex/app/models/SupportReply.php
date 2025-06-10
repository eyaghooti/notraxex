<?php
class SupportReply {
    public $id;
    public $ticket_id;
    public $sender;
    public $message;
    public $created_at;

    public static function allByTicket($ticket_id) {
        // پاسخ‌های مربوط به یک تیکت خاص
    }

    public static function create($ticket_id, $sender, $message) {
        // ایجاد پاسخ جدید
    }
}
?>
