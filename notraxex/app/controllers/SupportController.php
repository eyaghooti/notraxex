<?php
class SupportController {
    public function index() {
        require_once __DIR__ . '/../views/support/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/support/create.php';
    }

    public function store() {
        // پردازش ارسال تیکت
    }

    public function view($id) {
        require_once __DIR__ . '/../views/support/view.php';
    }

    public function reply($id) {
        // پردازش پاسخ به تیکت
    }
}
?>
