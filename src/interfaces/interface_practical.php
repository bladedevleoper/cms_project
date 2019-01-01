<?php

//methods do not have curley braces in interfaces
interface StandardPaymentInterface
{
    public function pay();
}

interface FraudCheckCheckInterface
{
    public function fraudCheck();
}

interface ThreeDSecureCheckInterface
{
    public function ThreeDCheck();
}

interface PaymentProcessInterface
{
    //this is a process check
    public function process();
}

//each class are a different payment gateway, similar to Google Pay and PayPal
class PayFee implements StandardPaymentInterface, PaymentProcessInterface, ThreeDSecureCheckInterface
{
    public function pay()
    {

    }
    public function ThreeDCheck()
    {
        
    }

    public function process()
    {
        $this->ThreeDCheck();
        $this->pay();
    }
}

class WorldFee implements StandardPaymentInterface, PaymentProcessInterface
{
    public function pay()
    {
        
    }

    public function process()
    {
        $this->pay();
    }
}

//We can define two interfaces to allow the class to use the declared methods in the defined interfaces
class MintFee implements StandardPaymentInterface, FraudCheckCheckInterface, PaymentProcessInterface
{
    //this is used in the standard payment interface
    public function pay()
    {
        
    }

    //this is decalred in the transaction check interface
    public function fraudCheck()
    {

    }

    public function process()
    {
        $this->fraudCheck();
        $this->pay();
    }

    
}

//this is the concreate class which will then perform everything.
//the interface being declared is there to say this is how the class should act
class PaymentGateway
{
    public function takePayment(PaymentProcessInterface $paymentType)
    {
        $paymentType->process();
    }
}

$paymentType = new PayFee();
$gateway = new PaymentGateway();
$gateway->takePayment($paymentType);