<?php

/** @author: Alex van Steenhoven <alex.steenhoven@gmail.com> */

namespace app\models;

use app\core\Application;
use app\core\Model;

use app\models\UserModel;

class LoginForm extends Model
{

    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function attributes(): array
    {
        return ['email', 'password'];
    }

    public function labels(): array
    {
        return [
            'email' => 'E-mail:',
            'password' => 'Password:'
        ];
    }

    public function login()
    {
        $user = UserModel::findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', 'Email not found');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Incorrect password');
            return false;
        }

        return Application::$app->login($user);
    }
}
