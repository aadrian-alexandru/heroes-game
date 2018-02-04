<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 22:30
 */

namespace Emagia\Gameplay;

use Emagia\Character\Character;
use Emagia\Character\Hero;
use Emagia\Character\Skills\AbstractSkill;
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
    private $whoAttacks;
    /** @var Character */
    private $winner;

    /**
     * @return Character
     */
    public function getWinner(): Character
    {
        return $this->winner;
    }

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

        $this->whoAttacks = $whoStarts;
    }

    /**
     *
     */
    public function startBattle()
    {
        while ($this->areBothCharactersAlive()) {
            if ($this->isHeroAttacks()) {
                $this->runHeroAttacks();
                $this->whoAttacks = GameSettings::WHO_STARTS_WILDBEAST;
            } else {
                $this->runWildBeastAttacks();
                $this->whoAttacks = GameSettings::WHO_STARTS_HERO;
            }
        }

        $this->endBattle();
    }

    /**
     *
     */
    private function endBattle()
    {
        $this->computeWinner();
    }

    /**
     * @return Gameplay
     */
    private function computeWinner(): Gameplay
    {
        if ($this->hero->getHealth() > $this->wildBeast->getHealth()) {
            $this->winner = $this->hero;
        } else {
            $this->winner = $this->wildBeast;
        }

        return $this;
    }

    /**
     * @return bool
     */
    private function runHeroAttacks()
    {
        $damage = $this->wildBeast->getHealth() - 10;
        $this->wildBeast->setHealth($damage);

        $this->logAttack($damage, 'Wild beast');
        return true;
    }

    /**
     * @return bool
     */
    private function runWildBeastAttacks()
    {
        $damage = $this->hero->getHealth() - 5;
        $this->hero->setHealth($damage);

        $this->logAttack($damage, 'Oderus');
        return true;
    }

    /**
     * @param $damage
     * @param $defender
     */
    private function logAttack($damage, $defender)
    {
        echo $defender . ' took ' . $damage . ' damage!' . PHP_EOL;
    }

    /**
     * @return bool
     */
    private function isHeroAttacks(): bool
    {
        if ($this->whoAttacks == GameSettings::WHO_STARTS_HERO) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    private function extractHeroAttackSkills(): array
    {
        $skills = array();

        /** @var AbstractSkill $skill */
        foreach ($this->hero->getSkills() as $skill) {
            if ($skill->getType() == AbstractSkill::TYPE_ATTACK) {
                $skills[] = $skill;
            }
        }

        return $skills;
    }

    /**
     * @return bool
     */
    private function areBothCharactersAlive(): bool
    {
        if ($this->hero->getHealth() > 0 && $this->wildBeast->getHealth() > 0) {
            return true;
        }

        return false;
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
        $this->hero = new Hero(GameSettings::HERO_NAME);
        $this->hero
            ->setHealth($health)
            ->setStrength($strength)
            ->setDefense($defense)
            ->setSpeed($speed)
            ->setLuck($luck);

        foreach (GameSettings::HERO_SKILLS as $skillName => $chance) {
            $className = "Emagia\\Character\\Skills\\" . $skillName;
            $this->hero
                ->addSkill(new $className($chance));
        }

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
        $this->wildBeast = new WildBeast(GameSettings::WILDBEAST_NAME);
        $this->wildBeast
            ->setHealth($health)
            ->setStrength($strength)
            ->setDefense($defense)
            ->setSpeed($speed)
            ->setLuck($luck);

        return $this;
    }
}