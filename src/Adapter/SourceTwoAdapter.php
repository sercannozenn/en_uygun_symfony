<?php


namespace App\Adapter;


class SourceTwoAdapter implements CurrencyInterface
{

    protected $address, $data;

    public function readData($data)
    {
        // TODO: Implement readData() method.
        $this->data=json_decode($data);

        $currencyArray=array();
        foreach ($this->data as $dataItem)
        {
            if ($dataItem->kod == 'DOLAR')
            {
                $currencyArray['dolar']=(float)$dataItem->oran;
            }
            else if ($dataItem->kod == 'AVRO')
            {
                $currencyArray['euro']=(float)$dataItem->oran;
            }
            else if ($dataItem->kod == 'İNGİLİZ STERLİNİ')
            {
                $currencyArray['sterlin']=(float)$dataItem->oran;
            }
        }
        return $currencyArray;
    }
}
