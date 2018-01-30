<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:49
 */

namespace Emagia\Character\Skills;
use Emagia\Character\Character;

/**
 * Class RapidStrikeSkill
 *
 * Strike twice while it’s his turn to attack; there’s a 10% chance
 * he’ll use this skill every time he attacks
 *
 * @package Emagia\Character\Skills
 */
class RapidStrikeSkill extends AbstractSkill
{
    /** @var string */
    protected $type = self::TYPE_ATTACK;

    /**
     * @param Character $attacker
     * @param Character $defender
     */
    public function apply(Character &$attacker, Character &$defender)
    {
        for ($strike = 0; $strike < 2; $strike++) {
            $damage = $attacker->getStrength() - $defender->getDefense();
            $defenderHealth = $defender->getHealth() - $damage;
            $defender->setHealth($defenderHealth);
        }
    }
}