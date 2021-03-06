<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:49
 */
namespace Emagia\Character\Skills;

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
     * RapidStrikeSkill constructor.
     * @param int $chanceToUse
     */
    public function __construct(int $chanceToUse)
    {
        parent::__construct($chanceToUse);
    }


    /**
     * @param float $damage
     * @return float
     */
    public function apply(float $damage): float
    {
        $damage = $damage * 2;
        return $damage;
    }
}