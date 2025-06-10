<?php include(__DIR__ . '/../partials/header.php'); ?>

<div class="container text-center text-light mt-5">
    <h2>ورود به نوتراکس</h2>
    <form action="/notraxex/login" method="post" class="mt-4">
        <div class="mb-3">
            <input type="text" name="username" class="form-control text-end" placeholder="نام کاربری یا ایمیل" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control text-end" placeholder="رمز عبور" required>
        </div>
        <button type="submit" class="btn btn-success w-100">ورود</button>
        <p class="mt-3"><a href="/notraxex/register" class="link-light">ثبت‌نام نکرده‌اید؟ کلیک کنید</a></p>
    </form>
</div>

<?php include(__DIR__ . '/../partials/footer.php'); ?>
