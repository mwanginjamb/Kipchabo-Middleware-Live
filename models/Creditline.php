<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Creditline extends Model
{

public $Key;
public $Item_No;
public $Description;
public $Qty;
public $Unit_Price;
public $Amount;
public $No;



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