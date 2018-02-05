<?php
declare(strict_types=1);
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
        $this->logStats();
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
     * Start battle
     */
    public function startBattle()
    {
        try {
            while ($this->areBothCharactersAlive()) {
                if ($this->isHerosTurn()) {
                    $this->runHeroAttacks();
                    $this->whoAttacks = GameSettings::WHO_STARTS_WILDBEAST;
                } else {
                    $this->runWildBeastAttacks();
                    $this->whoAttacks = GameSettings::WHO_STARTS_HERO;
                }
            }

            $this->endBattle();
        } catch (\Exception $e) {
            $this->log($e->getMessage());
        }
    }

    /**
     * End battle
     */
    private function endBattle()
    {
        $this->computeAndSetWinner();
        $this->log('-----------------------------' . PHP_EOL);
        $this->log( 'THE WINNER IS ' . $this->winner->getName() . '!' . PHP_EOL);
        $this->logStats();
    }

    /**
     * Compute and set winner
     *
     * @return Gameplay
     */
    private function computeAndSetWinner(): Gameplay
    {
        if ($this->hero->getHealth() > $this->wildBeast->getHealth()) {
            $this->winner = $this->hero;
        } else {
            $this->winner = $this->wildBeast;
        }

        return $this;
    }

    /**
     * Run Hero Attacks
     *
     * @throws \Exception
     */
    private function runHeroAttacks()
    {
        $damage = $this->calculateDamage($this->hero, $this->wildBeast);
        $attackSkills = $this->extractHeroSkillsByType(AbstractSkill::TYPE_ATTACK);

        foreach ($attackSkills as $skill) {
            if ($skill instanceof AbstractSkill && $skill->wiillApply()) {
                $skill->apply($damage);
            }
        }

        $newHealth = $this->wildBeast->getHealth() - $damage;
        $this->wildBeast->setHealth($newHealth);
        $this->logAttack($damage, $this->wildBeast->getName());
    }


    /**
     * Run Wild Beast Attacks
     *
     * @throws \Exception
     */
    private function runWildBeastAttacks()
    {
        $damage = $this->calculateDamage($this->wildBeast, $this->hero);
        $defenseSkills = $this->extractHeroSkillsByType(AbstractSkill::TYPE_DEFENSE);

        foreach ($defenseSkills as $skill) {
            if ($skill instanceof AbstractSkill && $skill->wiillApply()) {
                $skill->apply($damage);
            }
        }

        $newHealth = $this->hero->getHealth() - $damage;
        $this->hero->setHealth($newHealth);
        $this->logAttack($damage, $this->hero->getName());
    }

    /**
     * Calculate damage
     *
     * @param Character $attacker
     * @param Character $defender
     * @return int
     */
    private function calculateDamage(Character $attacker, Character $defender): int
    {
        return ($attacker->getStrength() - $defender->getDefense());
    }

    /**
     * Log attack
     *
     * @param int $damage
     * @param string $defenderName
     */
    private function logAttack(int $damage, $defenderName)
    {
        $this->log($defenderName . ' took ' . $damage . ' damage!' . PHP_EOL);
    }

    /**
     * Log
     *
     * @param string $message
     */
    private function log(string $message)
    {
        echo $message;
    }

    /**
     * Is Hero's turn
     *
     * @return bool
     */
    private function isHerosTurn(): bool
    {
        if ($this->whoAttacks == GameSettings::WHO_STARTS_HERO) {
            return true;
        }

        return false;
    }

    /**
     * Extract Hero skills by type
     *
     * @param string $type
     * @throws \Exception
     * @return array
     */
    private function extractHeroSkillsByType(string $type): array
    {
        if (empty($type)) {
            throw new \Exception('No skill type provided!');
        }

        if ($type !== AbstractSkill::TYPE_ATTACK && $type !== AbstractSkill::TYPE_DEFENSE) {
            throw new \Exception('Wrong type provided!');
        }

        $skills = [];

        /** @var AbstractSkill $skill */
        foreach ($this->hero->getSkills() as $skill) {
            if ($skill->getType() == $type) {
                $skills[] = $skill;
            }
        }

        return $skills;
    }

    /**
     * Are both characters alive
     *
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
     * Create Hero
     *
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
     * Create Wild Beast
     *
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

    /**
     * Log Stats
     */
    private function logStats()
    {
        $this->log('HERO Stats:' . PHP_EOL);
        $this->log('Health: ' . $this->hero->getHealth() . PHP_EOL);
        $this->log('Strength: ' . $this->hero->getStrength() . PHP_EOL);
        $this->log('Defense: ' . $this->hero->getDefense() . PHP_EOL);
        $this->log('Speed: ' . $this->hero->getSpeed() . PHP_EOL);
        $this->log('Luck: ' . $this->hero->getLuck() . PHP_EOL);
        $this->log('-----------------------------' . PHP_EOL);

        $this->log('Wild Beast Stats:' . PHP_EOL);
        $this->log('Health: ' . $this->wildBeast->getHealth() . PHP_EOL);
        $this->log('Strength: ' . $this->wildBeast->getStrength() . PHP_EOL);
        $this->log('Defense: ' . $this->wildBeast->getDefense() . PHP_EOL);
        $this->log('Speed: ' . $this->wildBeast->getSpeed() . PHP_EOL);
        $this->log('Luck: ' . $this->wildBeast->getLuck() . PHP_EOL);
        $this->log('-----------------------------' . PHP_EOL);
    }
}
