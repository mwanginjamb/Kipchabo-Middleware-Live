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
    public $Description;
    public $Store_Code;
    public $Store_Name;
    public $Qty;
    public $Price;
    public $Total_Amount;
    public $POS_Receipt_No;


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