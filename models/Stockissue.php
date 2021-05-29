<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Stockissue extends Model
{

public $Key;
public $Stock_Issue_No;
public $Posting_Date;
public $Receipt_Date;
public $Order_No;
public $Issued_From_Store_Code;
public $Store_Name;
public $In_Transit_Store;
public $Receiving_Store_Code;
public $Receiving_Store_Name;
public $Global_Dimension_1_Code;
public $Issued_By;
public $Issued_Name;
public $Received_By;
public $Sales_Rep_Name;

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