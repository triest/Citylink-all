<?php include("Firma.php"); ?>
<?php

/**
 * Created by PhpStorm.
 * User: DNS
 * Date: 01/06/2018
 * Time: 11:37
 */
class Dostavka
{
    //стоимость килограмма
    private $cost_for_kg;

    /**
     * @return mixed
     */
    public function getCostForKg()
    {
        return $this->cost_for_kg;
    }

    /**
     * @param mixed $cost_for_kg
     */
    public function setCostForKg($cost_for_kg)
    {
        $this->cost_for_kg = $cost_for_kg;
    }

    //ассоциативный массив со скидками
    public $weigToDiscon=array();
    public $company;
    /**
     * @return mixed
     */
    public function getWeigToDiscont()
    {
        return $this->weigToDiscont;
    }

    /**
     * @param mixed $weigToDiscont
     */
    public function setWeigToDiscont($company,$low,$lowprice,$hightprice,$type)
    {
        //   $this->weigToDiscont[$company][$low][$lowprice][$hightprice]=$type ;
        $firma=new Firma($company,$low,$lowprice,$hightprice,$type);
        array_push($this->weigToDiscon,$firma);
    }


    public  function calculate($company, $weight)
    {

        //наййдем обьект с этой компанией
        $company_object=$this->search_object($company);
          //теперь выясняем, какой тип расчета стоимости она имеет
        $razchet=$company_object->getType();
      //  echo $razchet;

        //DHL
        if($razchet=="byWeight"){
           echo "byWeight";
           $cost_rez=$weight*$company_object->getLowprice();
            return $cost_rez;
        }
        //почта
        elseif($razchet=="byFull"){
            if($weight<10){
                return 100;
            }{
                return 1000;
            }

        }

    }


// поиск обьекта в массиве по имени
    public function search_object($name){
        foreach ($this->weigToDiscon as $item){
            if($name==$item->name){
                return $item;
            }
        }
        return null;
    }
}