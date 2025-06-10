<?php
class SupportTicket {
    public $id;
    public $user_id;
    public $subject;
    public $message;
    public $status;
    public $created_at;

    public static function allByUser($user_id) {
        // بازگرداندن لیست تیکت‌های کاربر
    }

    public static function find($id) {
        // یافتن تیکت بر اساس ID
    }

    public static function create($user_id, $subject, $message) {
        // ایجاد تیکت جدید
    }
}
?>
