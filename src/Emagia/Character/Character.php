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
class Character
{
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