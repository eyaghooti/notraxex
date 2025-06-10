<?php
switch ($uri) {
    case '/':
        (new HomeController)->index();
        break;

    case '/dashboard':
        (new DashboardController)->index();
        break;

    case '/wallet':
        (new WalletController)->index();
        break;

    case '/trade':
        (new TradeController)->index();
        break;

    case '/transactions':
        (new TransactionsController)->index();
        break;

    case '/account':
        (new AccountController)->index();
        break;

    case '/blog':
        (new BlogController)->index();
        break;

    case '/faq':
        (new FaqController)->index();
        break;

    case '/about':
        (new AboutController)->index();
        break;

    case '/support':
        (new SupportController)->index();
        break;

    case '/admin':
        (new AdminController)->index();
        break;

    case '/login':
        (new AuthController)->login();
        break;

    case '/register':
        (new AuthController)->register();
        break;

    case '/logout':
        (new AuthController)->logout();
        break;

    default:
        echo '<h2 style="color:red;text-align:center;margin-top:2rem">❌ صفحه مورد نظر یافت نشد.</h2>';
        break;
}
?>
