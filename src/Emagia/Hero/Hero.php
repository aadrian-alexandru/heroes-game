<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 20:58
 */

namespace Emagia\Hero;

class Hero
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
     * @return Hero
     */
    public function setHealth(int $health): Hero
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
     * @return Hero
     */
    public function setStrength(int $strength): Hero
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
     * @return Hero
     */
    public function setDefense(int $defense): Hero
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
     * @return Hero
     */
    public function setSpeed(int $speed): Hero
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
     * @return Hero
     */
    public function setLuck(int $luck): Hero
    {
        $this->luck = $luck;
        return $this;
    }
}