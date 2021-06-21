<?php
namespace app\controllers;

use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;

use app\models\Requisitionline;
use app\models\Requisition;
use app\models\Salesinvoiceline;
use app\models\Salesinvoice;
use app\models\Receipt;
use app\models\Cashreceiptline;
use app\models\Leafcollection;
use app\models\Leafcollectionline;
use app\models\Vendor; // Active Record Model
use app\models\Farmer; // Same as Vendor but lacks active record support, just a data model
use app\models\Stockissueline;
use app\models\ReceiptLine;
use app\models\Credit;
use app\models\Creditline;
use app\models\StockIssue;
use app\models\ReturnCard;
use app\models\Returnline;

class SiteController extends Controller
{

   public function beforeAction($action)
    {  

        $allowedActions = [
            'grenleafcollection',
            'updategreenleafcollection',
            'greenleafcollectionline',
            'updategreenleafcollectionline',
            'addline',
            'update-requisition',
            'updaterequisitionline',
            'update-invoice',
            'updatesalesinvoiceline',
            'addsalesinvoiceline',
            'create-invoice',
            'updatecashreceipt',
            'updatecashreceiptline',
            'updateamounttoreceipt',
            'leafcollectioncard',
            'collectionlinetoupdate',
            'leafcollectioncard',
            'farmer-card',
            'add-farmer',
            'add-media',
            'auth',
            'updateissueline',
            'requisition-lines',
            'cash-sale',
            'cash-sale-line',
            'credit',
            'credit-line',
            'stock-issue-line',
            'stock-issue-card',
            'acknowledge-stock-issue',
            'return',
            'view-return',
            'return-line',
            'fetch-return-line'
        ];

        if (in_array($action->id , $allowedActions) ) {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

        return [


            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','images'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [
                            'index',
                            'get-orders',
                            'getone',
                            'items',
                            'itemcard',
                            'requisitions',
                            'requisitioncard',
                            'locationlist',
                            'unitmeasure',
                            'addline',
                            'releasedrequisitions',
                            'create-requisition',
                            'get',
                            'update-requisition',
                            'departments',
                            'projects',
                            'getline',
                            'updaterequisitionline',
                            'saleorders',
                            'salesorder',
                            'saleinvoices',
                            'saleinvoice',
                            'getsalesinvoiceline',
                            'update-invoice',
                            'updatesalesinvoiceline',
                            'addsalesinvoiceline',
                            'create-invoice',
                            'receipt',
                            'receipting-customers',
                            'customerledgerentries',
                            'newpayment',
                            'updatecashreceipt',
                            'suggestlines',
                            'refreshreceipt',
                            'updatecashreceiptline',
                            'updateamounttoreceipt',
                            'sale',
                            'postreceipt',
                            'postsaleinvoice',
                            'filtersales',
                            'filterpayments',
                            'itemavailabilitybylocation',
                            'leafcollectioncard',
                            'farmer-card',
                            'add-farmer',
                            'shades',
                            'add-media',
                            'auth',
                            'employee',
                            'stockissue',
                            'getissueline',
                            'updateissueline',
                            'requisition-lines',
                            'cash-sale',
                            'cash-sale-line',
                            'credit',
                            'credit-line',
                            'stock-issue-line',
                            'stock-issue-card',
                            'acknowledge-stock-issue',
                            'return',
                            'view-return',
                            'return-line',
                            'fetch-return-line'
                        ],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'contentNegotiator' =>[
                'class' => ContentNegotiator::class,
                'only' => [
                    'getone',
                    'get-orders',
                    'items',
                    'itemcard', 
                    'requisitions',
                    'requisitioncard',
                    'locationlist',
                    'unitmeasure',
                    'addline',
                    'releasedrequisitions',
                    'create-requisition',
                    'get',
                    'update-requisition',
                    'departments',
                    'projects',
                    'getline',
                    'updaterequisitionline',
                    'saleorders',
                    'salesorder',
                    'saleinvoices',
                    'saleinvoice',
                    'getsalesinvoiceline',
                    'update-invoice',
                    'updatesalesinvoiceline',
                    'addsalesinvoiceline',
                    'create-invoice',
                    'receipt',
                    'receipting-customers',
                    'customerledgerentries',
                    'newpayment',
                    'updatecashreceipt',
                    'suggestlines',
                    'updatecashreceiptline',
                    'updateamounttoreceipt',
                    'sale',
                    'postreceipt',
                    'postsaleinvoice',
                    'filtersales',
                    'filterpayments',
                    'itemavailabilitybylocation',
                    'leafcollection',
                    'updateleafcollection',
                    'leafcollectionline',
                    'updateleafcollectionline',
                    'leafcollectioncard',
                    'collectionlinetoupdate',
                    'farmer-card',
                    'add-farmer',
                    'shades',
                    'add-media',
                    'auth',
                    'employee',
                    'stockissue',
                    'getissueline',
                    'updateissueline',
                    'requisition-lines',
                    'cash-sale',
                    'cash-sale-line',
                    'credit',
                    'credit-line',
                    'stock-issue-line',
                    'stock-issue-card',
                    'acknowledge-stock-issue',
                    'return',
                    'view-return',
                    'return-line',
                    'fetch-return-line'

                ],
                'formatParam' => '_format',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    //'application/xml' => Response::FORMAT_XML,
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to
                    //'Origin' => ['capacitor://localhost','http://localhost'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['*'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => false,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],

             ],
    
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }





    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    public function actionSaleorders() {
        $service = Yii::$app->params['ServiceName']['SalesOrdersList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    public function actionSalesorder($id )
    {

        $service = Yii::$app->params['ServiceName']['SalesOrder'];
        $filter = [
            'No' => $id ,
            ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    /* Get a list of all Sale Invoices */

    public function actionSaleinvoices() {
        $service = Yii::$app->params['ServiceName']['SalesInvoiceList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }


    /* Get a Sales Invoice Card */

    public function actionSaleinvoice($id )
    {

        $service = Yii::$app->params['ServiceName']['SalesInvoice'];
        $filter = [
            'No' => $id ,
            ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    // Returns a List of Items

    public function actionItems() {
        $service = Yii::$app->params['ServiceName']['ItemList'];
        $filter = [
            'Inventory_Posting_Group' => 'Blended'
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Returns Item card

    public function actionItemcard($id )
    {

        $service = Yii::$app->params['ServiceName']['ItemCard'];
        $filter = [
            'No' => $id ,
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Get Requisition List

    public function actionRequisitions($userid="") {
        $service = Yii::$app->params['ServiceName']['RequisitionList'];

        $filter = ['Requested_By' => $userid];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }elseif(is_object($results))
        {
            return [];
        }
        else
        {
            return $results;
        }

    }

    // Get Released Requsitions List

    public function actionReleasedrequisitions() {
        $service = Yii::$app->params['ServiceName']['StockIssueShippedList'];
        $filter = [
            
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Get Requisition Card


    public function actionRequisitioncard($id )
    {

        $service = Yii::$app->params['ServiceName']['RequisitionCard'];
        $filter = [
            'Req_No' => $id ,
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            //print '<pre>'; print_r($results);
             return $results;
        }else
        {
            return $results;
        }
    }


    // Get Location List

    public function actionLocationlist() {
        $service = Yii::$app->params['ServiceName']['LocationList'];
        $filter = [];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Get Units of Measure


    public function actionUnitmeasure() {
        $service = Yii::$app->params['ServiceName']['UnitMeasure'];
        $filter = [
            'Item_No' => Yii::$app->request->get('itemNo')
        ];

        $results = Yii::$app->Navhelper->getData($service, $filter );

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }

    }

    // Posting RFequisition Lines Data

    public function actionAddline() {

        $model = new Requisitionline();
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);


         // Call Mobile Code Unit

        $args = [
            'itemNo'=> $data->Item_No,
            'piecesVar' => $data->Pieces_To_Request,
            'unitOfMeasure' => $data->U_O_M,
            'docNo' => $data->Req_No,
        ];

        // return $args;

        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanCreateTransferOrderLines');
        return $res;

        // Update the model with data from POS

        $model->Document_No = $data->Document_No;
        
        $initial = Yii::$app->Navhelper->postData($service,$model);
       

        //Update Rest of the line info, if initial request to ERP is successfull
       
        if(!is_string($initial))
        {
            $model->Key = $initial->Key;            
            $model->Item_No = $data->Item_No;
            $model->Planning_Flexibility = $data->Planning_Flexibility;
            $model->Unit = $data->Unit;

            // $model->Pieces = $data->Pieces; Not Updating on Model
            $model = Yii::$app->Navhelper->loadmodel($initial,$model);
        }else{
            return ['error' => $initial];
        }
         
        $model->Pieces = $data->Pieces; // Updates Pieces Property Here

        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    /* Add Sales Invoice Line */

    public function actionAddsalesinvoiceline() {

        $model = new Salesinvoiceline();
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        // Call Mobile Code Unit

        $args = [
            'itemNo'=> $data->No,
            'location' => $data->Location_Code,
            'quantityVar' => $data->Quantity,
            'unitPrice' => $data->Unit_Price,
            // 'unitOfMeasure' => $data->Unit_of_Measure_Code,
            'docNo' => $data->Document_No
        ];

        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanCreateSalesInvoiceLines');
        return $res;

        // Update the model with data from POS

        $model->Document_No = $data->Document_No;
        $model->Type = 'Item';
        $initial = Yii::$app->Navhelper->postData($service,$model);
       
        //return $initial;
        //Update Rest of the line info, if initial request to ERP is successfull
       
        if(!is_string($initial))
        {
            $model->Key = $initial->Key;            
            $model->No = $data->No;
            $model->Unit_of_Measure_Code = $data->Unit_of_Measure_Code;
            $model->Quantity = $model->Quantity;
           

            // $model->Pieces = $data->Pieces; Not Updating on Model
            $model = Yii::$app->Navhelper->loadmodel($initial,$model);
        }else{
            return ['error' => $initial];
        }
         
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    public function actionUpdaterequisitionline()
    {
        $model = new Requisitionline();
        $service = Yii::$app->params['ServiceName']['RequisitionLines'];
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);


        $model = Yii::$app->Navhelper->loadmodel($data,$model,['Available_Stock_pieces','Available_Stock_Kgs','Line_No','Req_No']);


        //get New Key Before Updating        

        $results = Yii::$app->Navhelper->updateData($service, $model); // update  requisition line
        return $results;

    }

    /* Update Sales Invoice Line */

    public function actionUpdatesalesinvoiceline()
    {
        $model = new Salesinvoiceline();
        $service = Yii::$app->params['ServiceName']['SalesInvoiceLine'];
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        /* Read only fields that you wanna skip on model data bind */
        $skip = [
            'TotalSalesLine_Line_Amount',
            'Total_Amount_Excl_VAT',
            'Total_VAT_Amount',
            'Total_Amount_Incl_VAT'
        ] ;

        $model = Yii::$app->Navhelper->loadmodel($data,$model,$skip);

        //get New Key Before Updating        

        $results = Yii::$app->Navhelper->updateData($service, $model); // update  requisition line
        return $results;

    }

    /* Get Requisition Line */
    public function actionGetline($Req_No, $Line_No)
    {
         $service = Yii::$app->params['ServiceName']['RequisitionLines'];

         $filter = [
            'Req_No' => $Req_No,
            'Line_No' => $Line_No
         ];

         $result = Yii::$app->Navhelper->getData($service, $filter);
         return $result[0];
    }

     public function actionRequisitionLines($Key="")
    {
        $service = Yii::$app->params['ServiceName']['RequisitionLines'];
        $model = new Requisitionline();

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $model = Yii::$app->Navhelper->loadmodel($data,$model,['Available_Stock_pieces','Available_Stock_Kgs','Line_No']);
        //Initial request
        if(!isset($data->Key) && empty($Key) ) // Post Only
        {     
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }



        
        if(!empty($Key)) // For Get Reqs. only
        {
             $result = Yii::$app->Navhelper->readByKey($service, $Key);
            return $result;
        }

        // Get Record to Update
        $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);


        //Load model with Line Data
        if(is_object($refresh)){ // Array of Object Was Returned

          $ignore = ['Available_Stock_pieces','Available_Stock_Kgs','Line_No'];
          $model->Key = $refresh->Key;
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error

            $refresh;
        }

    }

    public function actionCashSale($Key="")
    {
        $model = new Receipt();
        $service = Yii::$app->params['ServiceName']['POSReceiptCard'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = ['Receipt_Date','Customer_Name','Bank_Account_Name'];

        
        //Initial request
        if(!isset($data->Key) && empty($Key) ) // Post Only
        {     
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(isset($data->Key))
        {
            $model = Yii::$app->Navhelper->loadmodel($data,$model);
        }

       
        // Get Record to Update
        $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);


        //Load model with Line Data
        if(is_object($refresh)){ // Array of Object Was Returned

          
          $model->Key = $refresh->Key;
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error

            $refresh;
        }

    }

    public function actionCashSaleLine($Key="")
    {
        $model = new ReceiptLine();
        $service = Yii::$app->params['ServiceName']['POSReceiptLines'];

       // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = [];
        $refresh = '';

        //Initial request
        if(!Yii::$app->request->get('Key') && !isset($data->Key)) // Post without payload Only
        {     
            Yii::$app->Navhelper->loadmodel($data,$model);
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(Yii::$app->request->get('Key')) // A get Request - Gets Record to update
        {
           
            $request = Yii::$app->Navhelper->readByKey($service, $Key);
            return $request;
        }
        
               
        // Refresh Nav key as you prepare to Update Record
        if(isset($data->Key)){
             $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);
        }
       

        //Load model with Line Data
        if(is_object($refresh)){ // Object Was Returned from above refresh

          $model->Key = $refresh->Key;
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error - should be a string

            $refresh;
        }

    }

    /*Credit Sale Card*/

    public function actionCredit($Key="")
    {
        $model = new Credit();
        $service = Yii::$app->params['ServiceName']['POSCreditCard'];

       // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = [];
        $refresh = '';

        //Initial request
        if(!Yii::$app->request->get('Key') && !isset($data->Key)) // Post without payload Only
        {     
            Yii::$app->Navhelper->loadmodel($data,$model);
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(Yii::$app->request->get('Key')) // A get Request - Gets Record to update
        {
           
            $request = Yii::$app->Navhelper->readByKey($service, $Key);
            return $request;
        }
        
               
        // Refresh Nav key as you prepare to Update Record
        if(isset($data->Key)){
             $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);
        }
       

        //Load model with Line Data
        if(is_object($refresh)){ // Object Was Returned from above refresh

          $model->Key = $refresh->Key;
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error - should be a string

            $refresh;
        }

    }

    public function actionCreditLine($Key="")
    {
        $model = new Creditline();
        $service = Yii::$app->params['ServiceName']['POSCreditLines'];

       // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = [];
        $refresh = '';

        //Initial request
        if(!Yii::$app->request->get('Key') && !isset($data->Key)) // Post without payload Only
        {     
            Yii::$app->Navhelper->loadmodel($data,$model);
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(Yii::$app->request->get('Key')) // A get Request - Gets Record to update
        {
           
            $request = Yii::$app->Navhelper->readByKey($service, $Key);
            return $request;
        }
        
               
        // Refresh Nav key as you prepare to Update Record
        if(isset($data->Key)){
             $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);
        }
       

        //Load model with Line Data
        if(is_object($refresh)){ // Object Was Returned from above refresh

          $model->Key = $refresh->Key;
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error - should be a string

            $refresh;
        }

    }

    public function actionStockIssueLine($Key="")
    {
        $model = new Stockissueline();
        $service = Yii::$app->params['ServiceName']['StockIssueLines'];

       // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = [];
        $refresh = '';

        //Initial request
        if(!Yii::$app->request->get('Key') && !isset($data->Key)) // Post without payload Only
        {     
            Yii::$app->Navhelper->loadmodel($data,$model);
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(Yii::$app->request->get('Key')) // A get Request - Gets Record to update
        {
           
            $request = Yii::$app->Navhelper->readByKey($service, $Key);
            return $request;
        }
        
               
        // Refresh Nav key as you prepare to Update Record
        if(isset($data->Key)){
             $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);
        }
       

        //Load model with Line Data
        if(is_object($refresh)){ // Object Was Returned from above refresh

          $model->Key = $refresh->Key;
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error - should be a string

            $refresh;
        }

    }

    public function actionStockIssueCard($Key="")
    {
        $model = new Stockissue();
        $service = Yii::$app->params['ServiceName']['StockIssueCard'];

       // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = [];
        $refresh = '';

        //Initial request
        if(!Yii::$app->request->get('Key') && !isset($data->Key)) // Post without payload Only
        {     
            Yii::$app->Navhelper->loadmodel($data,$model);
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(Yii::$app->request->get('Key')) // A get Request - Gets Record to update
        {
           
            $request = Yii::$app->Navhelper->readByKey($service, $Key);
            return $request;
        }
        
               
        // Refresh Nav key as you prepare to Update Record
        if(isset($data->Key)){
             $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);
        }
       

        //Load model with Line Data
        if(is_object($refresh)){ // Object Was Returned from above refresh

          
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);
          $model->Key = $refresh->Key;

         // print_r($model); exit;

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error - should be a string

            $refresh;
        }

    }

    public function actionGetissueline($Item_No, $Stock_Issue_No)
    {
         $service = Yii::$app->params['ServiceName']['StockIssueLines'];

         $filter = [
            'Item_No' => $Item_No,
            'Stock_Issue_No' => $Stock_Issue_No
         ];

         $result = Yii::$app->Navhelper->getData($service, $filter);
         return $result[0];
    }

    /* Get Salesinvoice line to update */

    public function actionGetsalesinvoiceline($Document_No, $Line_No)
    {
         $service = Yii::$app->params['ServiceName']['SalesInvoiceLine'];

         $filter = [
            'Document_No' => $Document_No,
            'Line_No' => $Line_No
         ];

         $result = Yii::$app->Navhelper->getData($service, $filter);
         return $result[0];
    }


    // Create Requisition

    public function actionCreateRequisition($userid)
    {
        $model = new Requisition();
        $model->Requested_By = $userid;
        $service = Yii::$app->params['ServiceName']['RequisitionCard'];      
            
        $results = Yii::$app->Navhelper->postData($service, $model);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Create a New Sales Invoice

    public function actionCreateInvoice()
    {
        $service = Yii::$app->params['ServiceName']['SalesInvoice'];
        $data = [];
            
        // Create a post request to the Nav Service with empty params -> for initial data initialization like no. series    
        $results = Yii::$app->Navhelper->postData($service, $data);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }


    /* Generic Getter Method just supply service name as a get param*/
     public function actionGet($service,$userid="")
    {
        $service = Yii::$app->params['ServiceName'][$service];

        if(empty($userid))
        {
            $data = [];
        } else{
            $data = ['Created_By' => $userid];
        }       
            
        $results = Yii::$app->Navhelper->getData($service, $data);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    public function actionDepartments()
    {
        $service = Yii::$app->params['ServiceName']['Dimensions'];
        $filter = [
            'Global_Dimension_No' => 1
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    public function actionEmployee($No)
    {
        $service = Yii::$app->params['ServiceName']['Employee'];
        $data = Yii::$app->Navhelper->findOne($service,[],'No',$No);

        return $data;
    }

    // Get projects

    public function actionProjects()
    {
        $service = Yii::$app->params['ServiceName']['Dimensions'];
        $filter = [
            'Global_Dimension_No' => 2
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }



    // Post a new requisition

     public function actionUpdateRequisition() {

        $model = new Requisition();
        $service = Yii::$app->params['ServiceName']['RequisitionCard'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        // Fetch the record to update
        $filter = [
            'Req_No' => $data->Req_No
        ];
        $record = Yii::$app->Navhelper->getData($service, $filter);

        //return $record[0];
       

        $model = Yii::$app->Navhelper->loadmodel($data,$model);
        $model->Key = $record[0]->Key; // Use regenerated Key Always
               
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    /*Update Stock Issue line*/

     public function actionUpdateissueline() {

        $model = new Stockissueline();
        $service = Yii::$app->params['ServiceName']['StockIssueLines'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        // Fetch the record to update
        $filter = [
            'Item_No' => $data->Item_No,
            'Stock_Issue_No' => $data->Stock_Issue_No
        ];
        $record = Yii::$app->Navhelper->getData($service, $filter);

        //return $record[0];
       

        $model = Yii::$app->Navhelper->loadmodel($data,$model);
        $model->Key = $record[0]->Key; // Use regenerated Key Always

               
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    // Post a new Invoice Header

     public function actionUpdateInvoice() {

        $model = new Salesinvoice();
        $service = Yii::$app->params['ServiceName']['SalesInvoice'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        
       

        $model = Yii::$app->Navhelper->loadmodel($data,$model);
               
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    // Get Customers for Receipting

     public function actionReceiptingCustomers($searchName='')
    {
        $service = Yii::$app->params['ServiceName']['CustomerList'];

        if(!empty($searchName)) {
            $filter = [
                'Search_Name'=> $searchName
            ];
        }else {
            $filter = [
                //'Has_Invoice' => true
            ];
        }
        
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Get The receipt card

    public function actionReceipt($id)
    {
        $service = Yii::$app->params['ServiceName']['POSReceiptCard'];
        $filter = [
            'POS_Receipt_No' => $id
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    // Customer Ledger Entries that are open


    public function actionCustomerledgerentries($Customer_No)
    {
        $service = Yii::$app->params['ServiceName']['CustomerLedgerEntries'];
        $filter = [
            'Customer_No' => $Customer_No,
            'Open' => true
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    public function actionNewpayment()
    {
        $service = Yii::$app->params['ServiceName']['ReceiptCard'];
        $filter = [];
            
        $results = Yii::$app->Navhelper->postData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    public function actionSuggestlines($receiptNo,$customerNo)
    {

        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];

         // Call Mobile Code Unit

        $args = [
            'receiptNo'=> $receiptNo,
            'customerNo' => $customerNo,
        ];

        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanSuggestCustLedLinesInReceiptLines');
        return $res;
    }

    // Update Cash Receipt Card

    public function actionUpdatecashreceipt() {

        $model = new Receipt();
        $service = Yii::$app->params['ServiceName']['POSReceiptCard'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);
        // return $data;

        $model = Yii::$app->Navhelper->loadmodel($data,$model);

        $key = $this->refreshreceipt($data->Receipt_No);
        
        $model->Key = $key;
               
        $results = Yii::$app->Navhelper->updateData($service, $model); // Complete line requisition 
        return $results;
        
    }

    public function refreshreceipt($receiptNo)
    {
         $service = Yii::$app->params['ServiceName']['Payments'];
         $filter = [
            'Receipt_No' => $receiptNo
         ];

         $result = Yii::$app->Navhelper->getData($service,$filter);
         return $result[0]->Key;

    }

    public function actionUpdatecashreceiptline()
    {
        $service = Yii::$app->params['ServiceName']['CashReceiptLines'];
        $model = new Cashreceiptline();
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

         $filter = [
            'Receipt_No' => $data->Receipt_No,
            'Customer_No' => $data->Customer_No,
            'Line_No' => $data->Line_No
         ];

         // Get Line to Update

         $Line = Yii::$app->Navhelper->getData($service, $filter);

         //Load model with Line Data
         if(!is_string($Line)){ // Array of Object Was Returned
            $model = Yii::$app->Navhelper->loadmodel($Line[0],$model);
            $model->Select = !$model->Select; //Toggle Select Status
            if(!empty($data->Amount_To_Receipt)){
                $model->Amount_To_Receipt = $data->Amount_To_Receipt;  
            }
            // Do actual update
            $update = Yii::$app->Navhelper->updateData($service, $model);
            return $update;
        }else{ // Return Navision Error
            return $Line;
        }
         
    }

    public function actionUpdateamounttoreceipt()
    {
        $service = Yii::$app->params['ServiceName']['CashReceiptLines'];
        $model = new Cashreceiptline();
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

         $filter = [
            'Receipt_No' => $data->Receipt_No,
            'Customer_No' => $data->Customer_No,
            'Line_No' => $data->Line_No
         ];

         // Get Line to Update

         $Line = Yii::$app->Navhelper->getData($service, $filter);

         //Load model with Line Data
         if(!is_string($Line)){ // Array of Object Was Returned
            $model = Yii::$app->Navhelper->loadmodel($Line[0],$model);
            
            
            $model->Amount_To_Receipt = $data->Amount_To_Receipt;  
            
            // Do actual update
            $update = Yii::$app->Navhelper->updateData($service, $model);
            return $update;
        }else{ // Return Navision Error
            return $Line;
        }
         
    }


/*Get Posted Sale Document*/
    public function actionSale($Key)
    {

         $service = Yii::$app->params['ServiceName']['PostedSalesInvoice'];
         

         $result = Yii::$app->Navhelper->readByKey($service,$Key);

         if(is_object($result)){
            return $result;
         }else{
            $result;
         }
         
    }

    public function actionPostreceipt($No){
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $args = [
            'docNo' => $No
        ];
        // $res = Yii::$app->Navhelper->Mobile($service,$args,'IanPostCustomerReceipt');
        $res = Yii::$app->Navhelper->Mobile($service,$args,'FnPostPOSCashReceipt');
        return $res;

    }

    /*Acknowledge Stock Issue*/

    public function actionAcknowledgeStockIssue($No){
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $args = [
            'docNo' => $No
        ];
        $res = Yii::$app->Navhelper->Mobile($service,$args,'FnPostPointOfSaleReceipt');
        return $res;

    }

    public function actionPostsaleinvoice($No){
        $service = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $args = [
            'invoiceNo' => $No
        ];
        $res = Yii::$app->Navhelper->Mobile($service,$args,'IanPostSalesInvoice');
        return $res;

    }

    // Get posted sales by date

    public function actionFiltersales($startdate, $enddate="", $userid="")
    {
        
        $service1 = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $service2 = Yii::$app->params['ServiceName']['PostedSalesInvoicesMobile'];

        $enddate = empty(trim($enddate))?$startdate:$enddate;

        // Generate Filtered Sales List

        $args = [
            'startDate' => $startdate,
            'endDate' => $enddate,
            'userIdToUse' => $userid
        ];

        $coderes = Yii::$app->Navhelper->Mobile($service1,$args,'IanGenerateFilteredSales');
         if(is_string($coderes)){
            return $coderes;
        }

        // Read Filtered List

         $results = $this->actionGet($service2);

         return $results;


    }

    // Get and Filter Posted Payments by date

     public function actionFilterpayments($startdate, $enddate="", $userid="")
    {
        
        $service1 = Yii::$app->params['ServiceName']['MobileCodeunit'];
        $service2 = Yii::$app->params['ServiceName']['PostedCashReceiptMobile'];

        $enddate = empty(trim($enddate))?$startdate:$enddate;

        // Generate Filtered Sales List

        $args = [
            'startDate' => $startdate,
            'endDate' => $enddate,
            'userIdToUse' => $userid
        ];



        $coderes = Yii::$app->Navhelper->Mobile($service1,$args,'IanGenerateFilteredCashReceipts');
        if(is_string($coderes)){
            return $coderes;
        }

        // Read Filtered List

         $results = $this->actionGet($service2);

         return $results;


    }

    public function actionItemavailabilitybylocation($No, $Location=""){
         $service = Yii::$app->params['ServiceName']['ItemLedgerEntries'];

         if(!empty($Location)) {
             $filter = [
                 'Item_No' => $No,
                 'Location_Code' => $Location
             ];
         }else{
             $filter = [
                 'Item_No' => $No
             ];
         }


        $results = Yii::$app->Navhelper->getData($service,$filter);

        return $results;

    }


    // New Leaf Collection Request

    public function actionLeafcollection()
    {
        $service = Yii::$app->params['ServiceName']['GreenLeafCollectionCard'];
        $filter = [];
            
        $results = Yii::$app->Navhelper->postData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Get Collection Card

     public function actionLeafcollectioncard($id)
    {
        $service = Yii::$app->params['ServiceName']['GreenLeafCollectionCard'];
        

        $filter = ['No' => $id ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    // Update Leaf Collection Header

    public function actionUpdateleafcollection()
    {
        $service = Yii::$app->params['ServiceName']['GreenLeafCollectionCard'];
        $model = new Leafcollection();
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        // Get Record to Update

         $refresh = Yii::$app->Navhelper->getData($service, ['No' => $data->No]);

         //Load model with Line Data
         if(!is_string($refresh)){ // Array of Object Was Returned
            

             $model = Yii::$app->Navhelper->loadmodel($data,$model);
             $model->Key = $refresh[0]->Key; 
            
            // Do actual update
            $update = Yii::$app->Navhelper->updateData($service, $model);
            return $update;
        }else{ // Return Navision Error
            return $refresh;
        }
         
    }

    //New Leaf Collection Line

    public function actionLeafcollectionline($DocNo)
    {
        $service = Yii::$app->params['ServiceName']['GreenLeafCollectionLines'];
        $data = ['No' => $DocNo];
            
        $results = Yii::$app->Navhelper->postData($service, $data);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // Fetch Gleaf Line to Update

     public function actionCollectionlinetoupdate($No,$Weighment_No)
    {
        $service = Yii::$app->params['ServiceName']['GreenLeafCollectionLines'];
        $data = [
            'No' => $DocNo,
            'Weighment_No' => $LineNo
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $data);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }


    // Update Leaf Collection Line

     public function actionUpdateleafcollectionline()
    {
        $service = Yii::$app->params['ServiceName']['GreenLeafCollectionLines'];
        $model = new Leafcollectionline();
        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        // Get Record to Update

         $refresh = Yii::$app->Navhelper->getData($service, ['Weighment_No' => $data->Weighment_No]);

         //Load model with Line Data
         if(!is_string($refresh)){ // Array of Object Was Returned
            

             $model = Yii::$app->Navhelper->loadmodel($data,$model);
             $model->Key = $refresh[0]->Key; 
            
            // Do actual update
            $update = Yii::$app->Navhelper->updateData($service, $model);
            return $update;
        }else{ // Return Navision Error
            return $refresh;
        }
         
    }

    // Authentication

    public function actionAuth()
    {
        $service = Yii::$app->params['ServiceName']['UserSetup'];
        $credentials = new \stdClass();
         $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);
        $NavisionUsername = $data->Username;
        $NavisionPassword = $data->Password;

        $credentials->UserName = $NavisionUsername;
        $credentials->PassWord = $NavisionPassword;

       // return $credentials;

        $result = Yii::$app->Navhelper->findOne($service,$credentials,'User_ID', $NavisionUsername);


        return $result;
    }

    public function actionStockissue($id)
    {
        $service = Yii::$app->params['ServiceName']['StockIssueCard'];

        $result = Yii::$app->Navhelper->findOne($service,'','Stock_Issue_No', $id);


        return $result;
    }

    //Get Farmer Card farmer-card

    public function actionFarmerCard($id)
    {
        $service = Yii::$app->params['ServiceName']['FarmerCard'];
        $data = ['No' => $id];
            
        $results = Yii::$app->Navhelper->getData($service, $data);

        if(is_array($results))
        {
            return $results[0];
        }else
        {
            return $results;
        }
    }

    public function actionAddFarmer()
    {
        $model = new Farmer();
        $service = Yii::$app->params['ServiceName']['FarmerCard'];
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $model = Yii::$app->Navhelper->loadmodel($data,$model);
       
               
        $results = Yii::$app->Navhelper->postData($service, $model); // Post Farmer data to ERP

        return $results;
        
        /*
        $model = Vendor::find()->where(['No_' => $data->farmerId])->one();

        $bin = base64_decode($data->ImageBinary);
        $size = getImageSizeFromString($bin);
        $ext = substr($size['mime'], 6);
        $img_file = "filename.{$ext}";
        file_put_contents($img_file, $bin);
        
        // Call code unit 

         $args = [
            'filePath' => "D:\www\api\backend\web\\".$img_file,
            'frontID' => true,
            'backID' => false,
            'signature' => false,
            'vendorNo' => $data->farmerId
         ];
         $service = Yii::$app->params['ServiceName']['MobileCodeunit'];
         $res = Yii::$app->Navhelper->Mobile($service,$args,'IanSaveImages');
         return $res;*/
            
        
    }

    // Get Shades

     public function actionShades($No)
    {
        $service = Yii::$app->params['ServiceName']['Shades'];
        $filter = [
            'Route_No' => $No
        ];
            
        $results = Yii::$app->Navhelper->getData($service, $filter);

        if(is_array($results))
        {
            return $results;
        }else
        {
            return $results;
        }
    }

    // 'add-media',

    public function actionAddMedia()
    {
        $model = new Farmer();
        $service = Yii::$app->params['ServiceName']['FarmerCard'];
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $mediaType = $data->MediaType; // IDBACK, IDFRONT, PHOTO
        $FarmerID = $data->farmerId;



        /*Process Media for Saving*/


        $bin = base64_decode($data->ImageBinary);
        $size = getImageSizeFromString($bin);
        $ext = substr($size['mime'], 6);
        $img_file = $mediaType.'_'.$FarmerID.'.'.$ext;
        file_put_contents($img_file, $bin);

        /*Prepare Service For Update*/

         // Get Record to Update

         $refresh = Yii::$app->Navhelper->getData($service, ['No' => $FarmerID]);

         //Load model with Line Data
         if(!is_string($refresh)){ // Array of Object Was Returned            

             $model = Yii::$app->Navhelper->loadmodel($refresh[0],$model);
             $model->$mediaType = $img_file;            
            // Do actual update
            $update = Yii::$app->Navhelper->updateData($service, $model);
            return $update;
        }else{ // Return Navision Error
            return $refresh;
        }
        
       

    }

    /*Returns*/


//Create or update a return record
    public function actionReturn($Key="")
    {

       
        $model = new ReturnCard();
        $service = Yii::$app->params['ServiceName']['POSReturnCard'];

        // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = [];

        
        //Initial request
        if(!isset($data->Key) && empty($Key) ) // Post Only
        {     
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(isset($data->Key))
        {
            $model = Yii::$app->Navhelper->loadmodel($data,$model);
        }

       
        // Get Record to Update
        $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);


        //Load model with Line Data
        if(is_object($refresh)){ // Array of Object Was Returned

          
         
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);
          $model->Key = $refresh->Key;

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error

            $refresh;
        }

    }


    // Read a Return Document

     public function actionViewReturn($Key)
    {


         $service = Yii::$app->params['ServiceName']['POSReturnCard'];
         

         $result = Yii::$app->Navhelper->readByKey($service,$Key);

         if(is_object($result)){
            return $result;
         }else{
            $result;
         }
         
    }

// Create / update a return Line
    public function actionReturnLine($Key="")
    {
        $model = new Returnline();
        $service = Yii::$app->params['ServiceName']['POSReturnLines'];

       // Takes raw data from the request
        $json = file_get_contents('php://input');
        // Convert it into a PHP object
        $data = json_decode($json);

        $ignore = [];
        $refresh = '';

        //Initial request
        if(!Yii::$app->request->get('Key') && !isset($data->Key)) // Post without payload Only
        {     
            Yii::$app->Navhelper->loadmodel($data,$model);
            $request = Yii::$app->Navhelper->postData($service,$model);
            return $request;
        }elseif(Yii::$app->request->get('Key')) // A get Request - Gets Record to update
        {
           
            $request = Yii::$app->Navhelper->readByKey($service, $Key);
            return $request;
        }
        
               
        // Refresh Nav key as you prepare to Update Record
        if(isset($data->Key)){
             $refresh = Yii::$app->Navhelper->readByKey($service, $data->Key);
        }
       

        //Load model with Line Data
        if(is_object($refresh)){ // Object Was Returned from above refresh

          $model->Key = $refresh->Key;
          $model = Yii::$app->Navhelper->loadmodel($data,$model,$ignore);

            // Do actual update
          $update = Yii::$app->Navhelper->updateData($service, $model);

          return $update;
        }else{ // Return Navision Error - should be a string

            $refresh;
        }

    }

    // Get Return Line By Key

    public function actionFetchReturnLine($Key)
    {
        $service = Yii::$app->params['ServiceName']['POSReturnLines'];
        $line = Yii::$app->Navhelper->readByKey($service, $Key);

        return $line;
    }

        



}
