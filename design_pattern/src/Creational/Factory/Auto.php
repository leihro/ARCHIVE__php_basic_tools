<?php namespace DesignPatterns\Creational\Factory;

class Auto {
	private $automaker;
	private $automodel;

	public function __construct($maker, $model){
		$this->automodel = $model;
		$this->automaker = $maker;
	}

    /**
     * @return mixed
     */
    public function getAutomaker()
    {
        return $this->automaker;
    }

    /**
     * @param mixed $automaker
     */
    public function setAutomaker($automaker)
    {
        $this->automaker = $automaker;
    }

    /**
     * @return mixed
     */
    public function getAutomodel()
    {
        return $this->automodel;
    }

    /**
     * @param mixed $automodel
     */
    public function setAutomodel($automodel)
    {
        $this->automodel = $automodel;
    }





	
}