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
    /** @var int */
    private $whoStarts;

    /**
     * Initialize Gameplay
     */
    public function initialize()
    {
        $this->createHero()
            ->createWildBeast()
            ->computeWhoStarts();

        echo 'HERO Stats:' . PHP_EOL;
        echo 'Health: ' . $this->hero->getHealth() . PHP_EOL;
    }

    /**
     * Compute who starts
     *
     * If no condition below applies, a random character will be chosen to start
     */
    private function computeWhoStarts()
    {
        $whoStarts = mt_rand(GameSettings::WHO_STARTS_HERO, GameSettings::WHO_STARTS_WILDBEAST);

        if ($this->hero->getSpeed() > $this->wildBeast->getSpeed()) {
            $whoStarts = GameSettings::WHO_STARTS_HERO;
        } elseif ($this->hero->getSpeed() < $this->wildBeast->getSpeed()) {
            $whoStarts = GameSettings::WHO_STARTS_WILDBEAST;
        } elseif ($this->hero->getLuck() > $this->wildBeast->getLuck()) {
            $whoStarts = GameSettings::WHO_STARTS_HERO;
        } elseif ($this->hero->getLuck() < $this->wildBeast->getLuck()) {
            $whoStarts = GameSettings::WHO_STARTS_HERO;
        }

        $this->whoStarts = $whoStarts;
    }

    /**
     *
     */
    public function startBattle()
    {

    }

    /**
     * @return Gameplay
     */
    private function createHero(): Gameplay
    {
        $health = mt_rand(GameSettings::HERO_HEALTH_RANGE[0], GameSettings::HERO_HEALTH_RANGE[1]);
        $strength = mt_rand(GameSettings::HERO_STRENGTH_RANGE[1], GameSettings::HERO_STRENGTH_RANGE[1]);
        $defense = mt_rand(GameSettings::HERO_DEFENSE_RANGE[0], GameSettings::HERO_DEFENSE_RANGE[1]);
        $speed = mt_rand(GameSettings::HERO_SPEED_RANGE[0], GameSettings::HERO_SPEED_RANGE[1]);
        $luck = mt_rand(GameSettings::HERO_LUCK_RANGE[0], GameSettings::HERO_LUCK_RANGE[1]);
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
        $health = mt_rand(GameSettings::WILDBEAST_HEALTH_RANGE[0], GameSettings::WILDBEAST_HEALTH_RANGE[1]);
        $strength = mt_rand(GameSettings::WILDBEAST_STRENGTH_RANGE[0], GameSettings::WILDBEAST_STRENGTH_RANGE[1]);
        $defense = mt_rand(GameSettings::WILDBEAST_DEFENSE_RANGE[0], GameSettings::WILDBEAST_DEFENSE_RANGE[1]);
        $speed = mt_rand(GameSettings::WILDBEAST_SPEED_RANGE[0], GameSettings::WILDBEAST_SPEED_RANGE[1]);
        $luck = mt_rand(GameSettings::WILDBEAST_LUCK_RANGE[0], GameSettings::WILDBEAST_LUCK_RANGE[1]);
        $this->wildBeast = new WildBeast($health, $strength, $defense, $speed, $luck);

        return $this;
    }
}