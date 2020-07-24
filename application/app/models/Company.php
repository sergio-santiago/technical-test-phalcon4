<?php

class Company extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    public $code_company;

    /**
     *
     * @var string
     */
    public $name_company;

    /**
     *
     * @var string
     */
    public $country;

    /**
     *
     * @var string
     */
    public $date_time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("technical_test_phalcon_app");
        $this->setSource("company");
        $this->hasMany('code_company', 'App\Models\CompanySecurity', 'code_company', ['alias' => 'CompanySecurity']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company[]|Company|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
