<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Receipt extends Model
{

public $Key;
public $POS_Receipt_No;
public $Receipt_Date;
public $Type_Of_Sale;
public $Customer_No;
public $Customer_Name;
public $Bank_Account_No;
public $Bank_Account_Name;
public $Global_Dimension_1_Code;
public $Reference_No;
public $Price_Group;
public $Total_Amount;
public $Balance_Amount;
public $Created_By;

public $VAT_Amount;
public $Amount_Inc_VAT;
public $Cheque_No;


    public function rules()
    {
        return [
            [],
        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }
}