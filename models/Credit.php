<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Credit extends Model
{

public $Key;
public $No;
public $Sale_Date;
public $Customer_No;
public $Customer_Name;
public $Type_Of_Sale;
public $Global_Dimension_1_Code;
public $Store_Code;
public $Store_Name;
public $Total_Amount;



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