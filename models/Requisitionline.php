<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace app\models;
use yii\base\Model;


class Requisitionline extends Model
{

public $Key;
public $Item_No;
public $Description;
public $U_O_M;
public $Available_Stock_Kgs;
public $Available_Stock_pieces;
public $Pieces_To_Request;
public $Line_No;
public $Req_No;

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