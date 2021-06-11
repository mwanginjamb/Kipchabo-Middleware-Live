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
    'CompanyName'=> 'POS',//'KIPCHABO-GO-LIVE',//Nav Web Service Company,
    'DBCompanyName' => 'POS$',
    'ldPrefix'=>'francis',//ACTIVE DIRECTORY prefix
    'adServer' => 'DC2SVR.AASCIENCES.AC.KE', //Active directory domain controller

    //sharepoint config
    'sharepointUrl' => 'https://aaofsciences.sharepoint.com',//'https://ackads.sharepoint.com',
    'sharepointUsername' => 'Navision@aasciences.africa',//'francis@ackads.onmicrosoft.com',
    'sharepointPassword' => 'Nav9orta7',//'@crm1220#*',
    'library' => 'Portal',//'Mydocs',
    'clientID' => '7e92ce54-e4bf-491a-bef6-eb94044ce297',
    'clientSecret' => 'Q6UJkB3bRlPkGBjWNgrQVCyyjL2vgi5rtP7THpLwJ+s=',

    'profileControllers' => [

    ],
    'codeUnits' => [
        'MobileCodeunit' , // 50014
    ],
    'ServiceName' =>[


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
        'ItemBalanceByLocation' => 'ItemBalanceByLocation', //492 (Page)
        'ItemLedgerEntries' => 'ItemLedgerEntries', // 38 (Page)

        'MobileCodeunit' => 'MobileCodeunit', // 50014 - Codeunit

        'UserSetup' => 'UserSetup', //119
        'Employee' => 'Employee', //5200

        /*****Returns*****/

        'POSReturnList' => 'POSReturnList', //90213
        'POSReturnCard' => 'POSReturnCard', //90214
        'POSReturnLines' => 'POSReturnLines', //90215


    ]

];
