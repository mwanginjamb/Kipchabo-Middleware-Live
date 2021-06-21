<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Returnline extends Model
{

public $Key;
public $No;
public $Item_No;
public $Description;
public $Store_Code;
public $Store_Name;
public $Quantity;
public $Price;
public $Amount;

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