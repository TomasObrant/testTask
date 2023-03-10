<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{

    public $table = 'users';

    public function validate($input, $post)
    {
        $rules = [
            'name' => [
                'pattern' => '#^[a-zA-Z]{3,15}|[а-яА-я]{3,15}$#',
                'message' => 'Имя указано неверно (разрешены только буквы и цифры от 3 до 15 символов',
            ],
            'surname' => [
                'pattern' => '#^[a-zA-Z]{3,15}|[а-яА-я]{3,15}$#',
                'message' => 'Фамилия указана неверно (разрешены только буквы и цифры от 3 до 15 символов',
            ],
            'age' => [
                'pattern' => '#^[0-9]{1,3}$#',
                'message' => 'Возраст указан неверно (разрешены цифры от 1 до 3 символов',
            ],
            'login' => [
                'pattern' => '#^[a-z0-9]{3,15}$#',
                'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 3 до 15 символов',
            ],
            'password' => [
                'pattern' => '#^[a-z0-9]{10,30}$#',
                'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 10 до 30 символов',

            ],
        ];
        foreach ($input as $val)
        {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
        }
        return true;
    }

    public function checkLoginExists($login)
    {
        $params = [
            'login' => $login,
        ];
        if ($this->db->column('SELECT id FROM users WHERE login = :login', $params)) {
            $this->error = 'Этот логин уже используется';
            return false;
        }
        return true;
    }

    public function register($post)
    {

        $params = [
            'id' => '',
            'name' => $post['name'],
            'surname' => $post['surname'],
            'age' => $post['age'],
            'login' => $post['login'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
        ];
        $this->db->query('INSERT INTO users VALUES (:id, :name, :surname, :age, :login, :password)', $params);
    }

    public function checkData($login, $password)
    {
        $params = [
            'login' => $login,
        ];
        $hash = $this->db->column('SELECT password FROM users WHERE login = :login', $params);
        if (!$hash or !password_verify($password, $hash)) {
            return false;
        }
        return true;
    }

    public function login($login) {
        $params = [
            'login' => $login,
        ];
        $data = $this->db->row('SELECT * FROM users WHERE login = :login', $params);
        $_SESSION['account'] = $data[0];
    }

    public function usersList($route) {
        return $this->db->row('SELECT * FROM users');
    }

}

