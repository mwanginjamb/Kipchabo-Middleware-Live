<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',



    'NavisionUsername'=> 'Integrations',//'HP ELITEBOOK 840 G5',
    'NavisionPassword'=> 'Password@2030', //@francis123#',


    'server'=>'95.111.249.102',//'app-svr-dev.rbss.com',//Navision Server
    'WebServicePort'=>'8047',//Nav server Port
    'ServerInstance'=>'Dev',//Nav Server Instance
    'CompanyName'=> 'kapecredit',//'KIPCHABO-GO-LIVE',//Nav Web Service Company,
    'DBCompanyName' => 'kapecredit$',
    'ldPrefix'=>'',//ACTIVE DIRECTORY prefix
    'adServer' => '', //Active directory domain controller

    //sharepoint config
    'sharepointUrl' => '',//'https://ackads.sharepoint.com',
    'sharepointUsername' => '',//'francis@ackads.onmicrosoft.com',
    'sharepointPassword' => '',//'@crm1220#*',
    'library' => '',//'Mydocs',
    'clientID' => '',
    'clientSecret' => '',

    'profileControllers' => [

    ],
    'codeUnits' => [
        'MpesaIntegration' , 
    ],
    'ServiceName' =>[


        'MpesaIntegration' => 'MpesaIntegration',


    ]

];
