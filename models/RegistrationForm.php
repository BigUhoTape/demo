<?php

namespace app\models;

use app\models\User;

class RegistrationForm extends User {

    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password','passwordConfirm', 'agree'], 'required'],
            [['fio'], 'match', 'pattern' => '/^[А-Яа-я\s\-]{3,}$/u', 'message' => 'Только кириллица, пробелы, дефисы'],
            [['admin'], 'integer'],
            [['login'], 'match', 'pattern' => '/^[A-Za-z\s\-]{1,}$/u', 'message' => 'Только латиница, пробелы, дефисы'],
            [['login'], 'unique', 'message' => 'Такой логин уже существует'],
            [['email'], 'email', 'message' => 'Некоррректный email адрес'],
            [['passwordConfirm'], 'compare', 'compareAttribute' => 'password', 'message' => 'Пароль не совпадают'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
            [['agree'], 'boolean'],
            [['agree'], 'compare', 'compareValue' => true, 'message' => 'Необходимо согласие']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Пароль',
            'admin' => 'Admin',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Даю согласие на обработку данных'
        ];
    }

}