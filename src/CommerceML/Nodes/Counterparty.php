<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 3:02 PM
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Composite;
use CommerceML\Node\Node;

abstract class Counterparty extends Node implements Composite
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'id' => 'Ид',
            'name' => 'Наименование',
            'rel' => 'Отношение',
            'role' => 'Роль',
            'fullName' => 'ПолноеНаименование',
            'lastName' => 'Фамилия',
            'firstName' => 'Имя',
            'address' => NULL,
            'contacts' => NULL,
            'representatives' => NULL,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Контрагент';
    }

    abstract public function id(): string;

    abstract public function name(): string;

    abstract public function rel(): ?string;

    abstract public function role(): ?string;

    abstract public function fullName(): ?string;

    abstract public function lastName(): ?string;

    abstract public function firstName(): ?string;

    abstract public function address(): ?Address;

    abstract public function contacts(): ?Contacts;

    abstract public function representatives(): ?Representatives;

}