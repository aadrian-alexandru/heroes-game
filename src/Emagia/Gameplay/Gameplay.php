<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 22:30
 */

namespace Emagia\Gameplay;
use Emagia\Character\Hero;
use Emagia\Character\Skills\MagicShieldSkill;
use Emagia\Character\Skills\RapidStrikeSkill;
use Emagia\Character\WildBeast;

/**
 * Class Gameplay
 * @package Emagia\Gameplay
 */
class Gameplay
{
    const HERO_HEALTH_RANGE = array(70, 100);
    const HERO_STRENGTH_RANGE = array(70, 80);
    const HERO_DEFENSE_RANGE = array(45, 55);
    const HERO_SPEED_RANGE = array(40, 50);
    const HERO_LUCK_RANGE = array(10, 30);

    const WILDBEAST_HEALTH_RANGE = array(60, 90);
    const WILDBEAST_STRENGTH_RANGE = array(60, 90);
    const WILDBEAST_DEFENSE_RANGE = array(40, 60);
    const WILDBEAST_SPEED_RANGE = array(40, 60);
    const WILDBEAST_LUCK_RANGE = array(25, 40);

    /** @var Hero */
    protected $hero;
    /** @var WildBeast */
    protected $wildBeast;

    /**
     *
     */
    public function initialize()
    {
        $this->createHero()->createWildBeast();
    }

    /**
     * @return Gameplay
     */
    private function createHero(): Gameplay
    {
        $health = array_rand(self::HERO_HEALTH_RANGE);
        $strength = array_rand(self::HERO_STRENGTH_RANGE);
        $defense = array_rand(self::HERO_DEFENSE_RANGE);
        $speed = array_rand(self::HERO_SPEED_RANGE);
        $luck = array_rand(self::HERO_LUCK_RANGE);
        $this->hero = new Hero($health, $strength, $defense, $speed, $luck);
        $this->hero
            ->addSkill(new RapidStrikeSkill())
            ->addSkill(new MagicShieldSkill());

        return $this;
    }

    /**
     * @return Gameplay
     */
    private function createWildBeast(): Gameplay
    {
        $health = array_rand(self::WILDBEAST_HEALTH_RANGE);
        $strength = array_rand(self::WILDBEAST_STRENGTH_RANGE);
        $defense = array_rand(self::WILDBEAST_DEFENSE_RANGE);
        $speed = array_rand(self::WILDBEAST_SPEED_RANGE);
        $luck = array_rand(self::WILDBEAST_LUCK_RANGE);
        $this->wildBeast = new WildBeast($health, $strength, $defense, $speed, $luck);

        return $this;
    }
}