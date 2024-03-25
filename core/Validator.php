<?php

namespace Core;

use Core\Exceptions\RuleNotFoundException;

class Validator
{
    public static function check(array $constraints): array
    {
        $_SESSION['errors'] = [];
        $_SESSION['old'] = [];

        $request_data = array_filter(
            $_POST,
            fn(string $k) => $k !== '_method' && $k !== '_csrf',
            ARRAY_FILTER_USE_KEY
        );

        try {
            self::parse_constraints($constraints);
        } catch (RuleNotFoundException $e) {
            //die($e->getMessage());
            Response::abort(Response::SERVER_ERROR);
        }

        if (count($_SESSION['errors']) > 0) {
            $_SESSION['old'] = $request_data;
            Response::redirect($_SERVER['HTTP_REFERER']);
        }

        return $request_data;
    }

    private static function parse_constraints(array $constraints): void
    {
        $value = null;
        $method = $rule = '';

        foreach ($constraints as $key => $rules) {
            $rules = explode('|', $rules);
            foreach ($rules as $rule) {
                if (str_contains($rule, ':')) {
                    $rule_arr = explode(':', $rule);
                    [$method, $value] = $rule_arr;
                } else {
                    $method = $rule;
                }
                if (!method_exists(self::class, $method)) {
                    throw new RuleNotFoundException($rule);
                }
                self::$method($key, $value);
            }
        }
    }

    private static function datetime(string $key): bool
    {
        if (!date_create_from_format('Y-m-d H:i', $_POST[$key])) {
            $_SESSION['errors'][$key] = 'La date doit est une date au format AAAA-MM-JJ HH:MM';
            return false;
        }
        return true;
    }

    private static function max(string $key, int $value): bool
    {
        if (mb_strlen($_POST[$key]) > $value) {
            $_SESSION['errors'][$key] = "{$key} doit avoir une taille maximum de {$value} caractères";
            return false;
        }
        return true;
    }

    private static function min(string $key, int $value): bool
    {
        if (mb_strlen($_POST[$key]) < $value) {
            $_SESSION['errors'][$key] = "{$key} doit avoir une taille minimum de {$value} caractères";
            return false;
        }
        return true;
    }

    private static function required(string $key): bool
    {
        if (empty($_POST[$key])) {
            $_SESSION['errors'][$key] = "{$key} doit obligatoirement être fourni";
            return false;
        }
        return true;
    }
}