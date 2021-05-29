<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Requisition extends Model
{

public $Key;
public $Req_No;
public $Requisition_Date;
public $Requested_By;
public $Requested_On;
public $Store_Code;
public $Store_Name;
public $Approval_Status;

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