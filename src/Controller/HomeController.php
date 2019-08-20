<?php

namespace App\Controller;

use App\Adapter\SourceOneAdapter;
use App\Adapter\SourceTwoAdapter;
use App\Entity\CurrentCurrency;
use App\Entity\ProviderList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    protected $dataResult, $allSourceResult = array();

    /**
     * @Route("/", name="home")
     * return Response()
     */
    public function index()
    {
        $providerList = $this->getDoctrine()->getRepository(ProviderList::class);
        $providerList = $providerList->findAll();


        foreach ($providerList as $source)
        {
            switch ($source->getProviderName())
            {
                case 'source1':
                    $sourceData = new SourceOneAdapter();
                    $this->dataResult = $this->getData($source->getProviderAddress());
                    $this->allSourceResult[$source->getProviderName()] = $sourceData->readData($this->dataResult);
                    break;
                case 'source2':
                    $sourceData = new SourceTwoAdapter();
                    $this->dataResult = $this->getData($source->getProviderAddress());
                    $this->allSourceResult[$source->getProviderName()] = $sourceData->readData($this->dataResult);
                    break;
                default:
                    break;
            }
        }
        $result = $this->comparisonPrice($this->allSourceResult);
        $this->insertData($result);

        $data = $this->showData();
        return $this->render('/home/index.html.twig', ['controller_name' => 'HomeController', 'data' => $data]);
    }

    public function getData($address)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $address);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    public function comparisonPrice($data)
    {
        $min_prices = array();

        foreach ($data as $provider_source)
        {
            foreach ($provider_source as $key => $value)
            {
                if (isset($min_prices[$key]))
                {
                    if ($min_prices[$key] > $value)
                    {
                        $min_prices[$key] = $value;
                    }
                }
                else
                {
                    $min_prices[$key] = $value;
                }
            }
        }
        return $min_prices;
    }

    public function insertData($result)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $money = $entityManager->getRepository(CurrentCurrency::class);

        foreach ($result as $key => $value)
        {
            $dataControl = $money->findOneBy(['currency_name' => $key]);
            if (!$dataControl)
            {
                $moneyInsert = new CurrentCurrency();
                $moneyInsert->setCurrencyName($key)->setMoney($value);
                $entityManager->persist($moneyInsert);
                $entityManager->flush();
            }
            else
            {
                $dataControl->setCurrencyName($key);
                $dataControl->setMoney($value);
                $entityManager->flush();
            }
        }
    }

    public function showData()
    {
        $moneyData = $this->getDoctrine()->getRepository(CurrentCurrency::class);
        $moneyData = $moneyData->findAll();
        $moneyList= array();
        foreach ($moneyData as $item)
        {
            $moneyList[$item->getCurrencyName()]=$item->getMoney();
        }

        return $moneyList;
    }

}
