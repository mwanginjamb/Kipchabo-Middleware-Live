<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class ReceiptLine extends Model
{

    public $Key;
    public $Item_No;
    public $Description;
    public $Store_Code;
    public $Store_Name;
    public $Qty;
    public $Price;
    public $Total_Amount;
    public $Stock_Balance;
    public $POS_Receipt_No;

    public $VAT_Amount;
    public $Amount_Inc_VAT;
    public $U_O_M;
    


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