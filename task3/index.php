<?php 
class BankAccount{
    private $accountHolderName,$balance;
    public function __construct($accountHolderName,$balance=0){
        $this->accountHolderName=$accountHolderName;
        $this->balance=$balance;
    }


    public function deposit($amount=0)
    {
        $this->balance+=$amount;
        return "After deposit ".$this->balance;
    }

    public function withdraw($amount=0)
    {
        if($amount<=$this->balance)
        {
            $this->balance-=$amount;

            return "Successfully withdraw from bank account " . $this->accountHolderName . " amount: " . $amount." current balance: " . $this->balance;

        }


        return "Insufficient balance";
    }


    public function currentBalance()
    {
        return  number_format($this->balance);
    }
}

?>