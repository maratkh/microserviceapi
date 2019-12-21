<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Contract class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Contract extends MicroserviceAbstract
{
    protected $uris = [
        'createContract'          => '/contract/create',
        'setStatus'               => '/contract/setStatus',
        'income'                  => '/contract/income',
        'incomeSchedule'          => '/contract/incomeSchedule',
        'incomeFullRepayment'     => '/contract/incomeFullRepayment',
        'contract'                => '/contract/contract',
        'listContract'            => '/contract/list',
        'listSchedule'            => '/schedule/list',
        'createSchedule'          => '/schedule/create',
        'listCron'                => '/cron/list',
        'listCronError'           => '/cronError/list',
        'customerTotalDebt'       => '/info/customerTotalDebt',
        'customerOverduePayments' => '/info/customerOverduePayments',
        'customerNextPayment'     => '/info/customerNextPayment',
        'customerLoanAgreement'   => '/info/customerLoanAgreement',
        'customerLoanDebt'        => '/info/customerLoanDebt',
        'payFullRepayment'        => '/contract/payFullRepayment',
    ];

    protected $url = 'https://contract.mercurypos.online';
}
