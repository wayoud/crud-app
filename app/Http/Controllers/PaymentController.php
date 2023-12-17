// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use App\PaymentModule;

class PaymentController extends Controller {
    public function processPayment() {
        // Usage in a controller
        $paymentModule = new PaymentModule();

        // Example Stripe transaction
        $stripeResult = $paymentModule->processPayment('stripe', 150.00, 'USD', '4242424242424242');
        $stripePaymentId = $stripeResult['paymentId'];

        // Example retrieval of Stripe payment details
        $stripeDetails = $paymentModule->getPaymentDetails('stripe', $stripePaymentId);

        // Example PayPal transaction
        $paypalResult = $paymentModule->processPayment('paypal', 200.00, 'EUR', '4000056655665556');
        $paypalPaymentId = $paypalResult['paymentId'];

        // Example retrieval of PayPal payment details
        $paypalDetails = $paymentModule->getPaymentDetails('paypal', $paypalPaymentId);

        // Your further logic or response handling here
        return view('payment.success', compact('stripeDetails', 'paypalDetails'));
    }
}
