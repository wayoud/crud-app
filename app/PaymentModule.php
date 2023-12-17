// app/PaymentModule.php
namespace App;

class PaymentModule {
    use StripeTrait, PaypalTrait;

    public function processPayment($provider, $amount, $currency, $cardNumber) {
        try {
            if (!in_array($provider, ['stripe', 'paypal'])) {
                throw new \InvalidArgumentException('Invalid payment provider');
            }

            if (!is_numeric($amount) || $amount <= 0) {
                throw new \InvalidArgumentException('Invalid amount');
            }

            // Other validation checks can be added

            // Process payment based on the provider
            if ($provider === 'stripe') {
                return $this->stripePaymentProcess($amount, $currency, $cardNumber);
            } elseif ($provider === 'paypal') {
                return $this->paypalPaymentProcess($amount, $currency, $cardNumber);
            }
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            return $e->getMessage();
        }
    }

    public function getPaymentDetails($provider, $paymentId) {
        try {
            if (!in_array($provider, ['stripe', 'paypal'])) {
                throw new \InvalidArgumentException('Invalid payment provider');
            }

            // Other validation checks can be added

            // Get payment details based on the provider
            if ($provider === 'stripe') {
                return $this->stripeGetPayment($paymentId);
            } elseif ($provider === 'paypal') {
                return $this->paypalGetPayment($paymentId);
            }
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            return $e->getMessage();
        }
    }
}


