<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;

class MySqlProviderController extends Controller
{
    public function indexAction()
    {
        $data = [];

        //Get all results of table with relations
        $companiesSecurities = CompanySecurity::find();

        //Loop and get associated data in other tables
        foreach ($companiesSecurities as $companySecurity) {
            $company = $companySecurity->Company;
            $security = $companySecurity->Security;
            $data[] = [
                'companySecurity' => $companySecurity,
                'company'         => $company,
                'security'        => $security,
            ];
        }

        return $this->response
            ->setJsonContent($data)
            ->setStatusCode(200)
            ->send()
            ;
    }
}
