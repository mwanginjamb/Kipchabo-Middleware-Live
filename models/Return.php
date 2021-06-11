<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Return extends Model
{

public $Key;
public $No;
public $Return_Date;
public $Customer_No;
public $Customer_Name;
public $Applies_to_Invoice_No;
public $Created_By;
public $Created_On;

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