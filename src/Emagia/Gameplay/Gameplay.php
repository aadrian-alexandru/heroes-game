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
use Emagia\GameSettings;

/**
 * Class Gameplay
 * @package Emagia\Gameplay
 */
class Gameplay
{
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
        $health = array_rand(GameSettings::HERO_HEALTH_RANGE);
        $strength = array_rand(GameSettings::HERO_STRENGTH_RANGE);
        $defense = array_rand(GameSettings::HERO_DEFENSE_RANGE);
        $speed = array_rand(GameSettings::HERO_SPEED_RANGE);
        $luck = array_rand(GameSettings::HERO_LUCK_RANGE);
        $this->hero = new Hero($health, $strength, $defense, $speed, $luck);
        $this->hero
            ->addSkill(new RapidStrikeSkill(GameSettings::HERO_RAPID_STRIKE_SKILL_CHANCE))
            ->addSkill(new MagicShieldSkill(GameSettings::HERO_MAGIC_SHIELD_SKILL_CHANCE));

        return $this;
    }

    /**
     * @return Gameplay
     */
    private function createWildBeast(): Gameplay
    {
        $health = array_rand(GameSettings::WILDBEAST_HEALTH_RANGE);
        $strength = array_rand(GameSettings::WILDBEAST_STRENGTH_RANGE);
        $defense = array_rand(GameSettings::WILDBEAST_DEFENSE_RANGE);
        $speed = array_rand(GameSettings::WILDBEAST_SPEED_RANGE);
        $luck = array_rand(GameSettings::WILDBEAST_LUCK_RANGE);
        $this->wildBeast = new WildBeast($health, $strength, $defense, $speed, $luck);

        return $this;
    }
}