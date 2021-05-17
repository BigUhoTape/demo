<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $timestamp
 * @property int $idUser
 * @property int $idCategory
 * @property string $status
 * @property string|null $photoBefore
 * @property string|null $photoAfter
 *
 * @property Category $сategory
 * @property User $idUser0
 */
class ProblemSolveForm extends Problem
{

    public $photoAfterForm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photoAfterForm'], 'required'],
            [['photoAfter'], 'string'],
            ['photoAfterForm', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 10*1024*1024],
        ];
    }

}
