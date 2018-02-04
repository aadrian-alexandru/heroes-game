<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31-Jan-18
 * Time: 19:36
 */

namespace Emagia;

/**
 * Class GameSettings
 *
 * This class is used exclusively as a set of default values
 * for Gameplay initialization step
 *
 * @package Emagia
 */
final class GameSettings
{
    const HERO_RAPID_STRIKE_SKILL_CHANCE = 10;
    const HERO_MAGIC_SHIELD_SKILL_CHANCE = 20;

    const HERO_NAME = 'Orderus';
    const HERO_HEALTH_RANGE = [70, 100];
    const HERO_STRENGTH_RANGE = [70, 80];
    const HERO_DEFENSE_RANGE = [45, 55];
    const HERO_SPEED_RANGE = [40, 50];
    const HERO_LUCK_RANGE = [10, 30];
    const HERO_SKILLS = [
        'RapidStrikeSkil1l' => 10,
        'MagicShieldSkill' => 20
    ];

    const WILDBEAST_NAME = 'Wild beast';
    const WILDBEAST_HEALTH_RANGE = [60, 90];
    const WILDBEAST_STRENGTH_RANGE = [60, 90];
    const WILDBEAST_DEFENSE_RANGE = [40, 60];
    const WILDBEAST_SPEED_RANGE = [40, 60];
    const WILDBEAST_LUCK_RANGE = [25, 40];
    const WILDBEAST_SKILLS = [];

    const WHO_STARTS_HERO = 0;
    const WHO_STARTS_WILDBEAST = 1;
}
