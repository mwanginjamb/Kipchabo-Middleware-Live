<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Stockissueline extends Model
{

public $Key;
public $Item_No;
public $Description;
public $Requested_Pieces;
public $Issued_Pieces;
public $Pieces_Received;
public $Stock_Issue_No;

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