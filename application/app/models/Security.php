<?php

class Security extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    public $code_security;

    /**
     *
     * @var string
     */
    public $instrument;

    /**
     *
     * @var integer
     */
    public $bid;

    /**
     *
     * @var integer
     */
    public $ask;

    /**
     *
     * @var integer
     */
    public $yield;

    /**
     *
     * @var integer
     */
    public $high;

    /**
     *
     * @var integer
     */
    public $low;

    /**
     *
     * @var string
     */
    public $currency;

    /**
     *
     * @var string
     */
    public $date_price;

    /**
     *
     * @var string
     */
    public $time_price;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("technical_test_phalcon_app");
        $this->setSource("security");
        $this->hasMany('code_security', 'App\Models\CompanySecurity', 'code_security', ['alias' => 'CompanySecurity']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Security[]|Security|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Security|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
