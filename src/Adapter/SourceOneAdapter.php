<?php


namespace App\Adapter;


class SourceOneAdapter implements CurrencyInterface
{
    protected $address, $data;

    public function readData($data)
    {
        // TODO: Implement readData() method.


        $this->data=json_decode($data);

        $currencyArray=array();
        foreach ($this->data->result as $dataItem)
        {
            if ($dataItem->symbol == 'USDTRY')
            {
                $currencyArray['dolar']=$dataItem->amount;
            }
            else if ($dataItem->symbol == 'EURTRY')
            {
                $currencyArray['euro']=$dataItem->amount;
            }
            else if ($dataItem->symbol == 'GBPTRY')
            {
                $currencyArray['sterlin']=$dataItem->amount;
            }
        }
        return $currencyArray;
    }
}
