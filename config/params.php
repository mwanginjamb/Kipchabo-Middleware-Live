<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',



    'NavisionUsername'=> 'Admin',//'HP ELITEBOOK 840 G5',
    'NavisionPassword'=> 'Admin123', //@francis123#',


    'server'=>'win-seconftr3d7.kipchabotea.co.ke',//'app-svr-dev.rbss.com',//Navision Server
    'WebServicePort'=>'6047',//Nav server Port
    'ServerInstance'=>'DynamicsNAV100',//Nav Server Instance
    'CompanyName'=> 'KIPCHABO TEA LTD',//'KIPCHABO TEA LTD',//Nav Web Service Company,
    'DBCompanyName' => 'KIPCHABO TEA LTD$',
    'ldPrefix'=>'',//ACTIVE DIRECTORY prefix
    'adServer' => '', //Active directory domain controller

    //sharepoint config
    'sharepointUrl' => '',//'https://ackads.sharepoint.com',
    'sharepointUsername' => '',//'francis@ackads.onmicrosoft.com',
    'sharepointPassword' => '',//'@crm1220#*',
    'library' => 'Portal',//'Mydocs',
    'clientID' => '',
    'clientSecret' => '',

    'profileControllers' => [

    ],
    'codeUnits' => [
        'MobileCodeunit' , // 50014
    ],
    'ServiceName' =>[

        'MPESATransactions' => 'MPESATransactions', //80149
        'MPESATRANSACTIONSLIVE' => 'MPESATRANSACTIONSLIVE', 

        'ItemList' => 'ItemList', // Page 31 (Page)
        'ItemCard' => 'ItemCard', // Page 30 (Page)

        'SalesOrdersList' => 'SalesOrdersList', //9305 (Page)
        'SalesOrder' => 'SalesOrder', // 42 (Page)
        'SalesOrderLine' => 'SalesOrderLine', // 46(Page)

        'SalesInvoiceList' => 'SalesInvoiceList', //9301
        'SalesInvoice' => 'SalesInvoice', // 43
        'SalesInvoiceLine' =>  'SalesInvoiceLine', // 47
        'PostedSalesInvoices' => 'PostedSalesInvoices', // 143 --> List
        'PostedSalesInvoice' => 'PostedSalesInvoice', //132 --> Card
        'PostedSalesInvoicesMobile' => 'PostedSalesInvoicesMobile', //50177 List Page
        'PostedCashReceiptMobile' => 'PostedCashReceiptMobile', //50045 List Page

        'RequisitionList' => 'RequisitionList', // 50120 (Page)--
        'RequisitionCard' => 'RequisitionCard', // 50121 (Page)--
        'RequisitionLines' => 'RequisitionLines', // 50122 (Page)--
        'StockIssueShippedList' => 'StockIssueShippedList', // 50126
        'StockIssueLines' => 'StockIssueLines', //50128
        'StockIssueCard' => 'StockIssueCard', //50127


        /*Cash Sales */
        'POSReceiptList' => 'POSReceiptList', //50174
        'POSReceiptCard' => 'POSReceiptCard', //50175
        'POSReceiptLines' => 'POSReceiptLines', // 50176
        'CustomerPriceGroups' => 'CustomerPriceGroups', // 7

        /*Credit Sales */

        'POSCreditList' => 'POSCreditList', //50129
        'POSCreditCard' => 'POSCreditCard', //50130
        'POSCreditLines' => 'POSCreditLines', //50131

        

        'LocationList' => 'LocationList', // 15 (Page)
        'UnitMeasure' => 'UnitMeasure', //5404 (Page)

        'Payments' => 'Payments', //70309 (Page)
        'ReceiptCard' => 'ReceiptCard', // 70310 (Page)
        'CashReceiptLines' => 'CashReceiptLines', // (Page) 70311
        'CustomerLedgerEntries' => 'CustomerLedgerEntries', // Page 25
        'BankAccounts' => 'BankAccounts', // 371 (Page)

        'Dimensions' => 'Dimensions', // 560 (Page)
        'CustomerList' => 'CustomerList', //22 (Page)
        'PortalCustomerList' => 'PortalCustomerList', //50180 (Page)
        'ItemBalanceByLocation' => 'ItemBalanceByLocation', //492 (Page)
        'ItemLedgerEntries' => 'ItemLedgerEntries', // 38 (Page)
        'POSStockBalance' => 'POSStockBalance', //50179 (Page)

        'MobileCodeunit' => 'MobileCodeunit', // 50014 - Codeunit

        'UserSetup' => 'UserSetup', //119
        'Employee' => 'Employee', //5200

        /*****Returns*****/

        'POSReturnList' => 'POSReturnList', //90213
        'POSReturnCard' => 'POSReturnCard', //90214
        'POSReturnLines' => 'POSReturnLines', //90215

        /***********Cash Deposit *****/

        'CashDepositList' => 'CashDepositList', //90216
        'CashDepositCard' => 'CashDepositCard', //90218
        'CashDepositLines' => 'CashDepositLines', //90219


    ]

];
