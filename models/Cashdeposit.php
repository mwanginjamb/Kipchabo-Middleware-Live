<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Cashdeposit extends Model
{

public $Key;
public $No;
public $Posting_Date;
public $Reference;
public $Created_By;
public $Amount;
public $Cash_Deposit_Lines;

public $Customer_Name;
public $Select;




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