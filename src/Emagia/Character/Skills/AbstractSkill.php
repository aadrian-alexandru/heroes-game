<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:53
 */

namespace Emagia\Character\Skills;

/**
 * Class AbstractSkill
 * @package Emagia\Character\Skills
 */
class AbstractSkill
{
    const TYPE_ATTACK = 'attack';
    const TYPE_DEFENSE = 'defense';

    /** @var string */
    protected $type;

    /** @var int */
    protected $chanceToUse;

    /**
     * AbstractSkill constructor.
     * @param int $chanceToUse
     */
    public function __construct(int $chanceToUse)
    {
        $this->chanceToUse = $chanceToUse;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getChanceToUse(): int
    {
        return $this->chanceToUse;
    }

    /**
     * Will apply
     *
     * This function returns a boolean value depending on
     * chance/probability (percentage) set for the current skill
     *
     * @return bool
     */
    public function wiillApply(): bool
    {
        return mt_rand(0, 99) < $this->getChanceToUse();
    }
}