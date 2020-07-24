<?php

class CompanySecurity extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    public $code_company_security;

    /**
     *
     * @var integer
     */
    public $code_company;

    /**
     *
     * @var integer
     */
    public $code_security;

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
        $this->setSource("company_security");
        $this->belongsTo('code_company', 'Company', 'code_company', ['alias' => 'Company']);
        $this->belongsTo('code_security', 'Security', 'code_security', ['alias' => 'Security']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanySecurity[]|CompanySecurity|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanySecurity|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
