<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 20:58
 */

namespace Emagia\Character;

/**
 * Class Character
 * @package Emagia\Character
 */
/**
 * Class Character
 * @package Emagia\Character
 */
class Character
{
    /** @var string */
    protected $name;
    /** @var int */
    protected $health;
    /** @var int */
    protected $strength;
    /** @var int */
    protected $defense;
    /** @var int */
    protected $speed;
    /** @var int */
    protected $luck;

    /**
     * Character constructor.
     * @param int $health
     * @param int $strength
     * @param int $defense
     * @param int $speed
     * @param int $luck
     */
    public function __construct(int $health, int $strength, int $defense, int $speed, int $luck)
    {
        $this->health = $health;
        $this->strength = $strength;
        $this->defense = $defense;
        $this->speed = $speed;
        $this->luck = $luck;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Character
     */
    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return Character
     */
    public function setHealth(int $health): Character
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     * @return Character
     */
    public function setStrength(int $strength): Character
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * @param int $defense
     * @return Character
     */
    public function setDefense(int $defense): Character
    {
        $this->defense = $defense;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     * @return Character
     */
    public function setSpeed(int $speed): Character
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     * @return Character
     */
    public function setLuck(int $luck): Character
    {
        $this->luck = $luck;
        return $this;
    }
}