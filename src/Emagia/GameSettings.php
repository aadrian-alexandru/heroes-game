<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31-Jan-18
 * Time: 19:36
 */

namespace Emagia;
use Emagia\Character\Skills\RapidStrikeSkill;


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

    const HERO_NAME = 'Oderus';
    const HERO_HEALTH_RANGE = array(70, 100);
    const HERO_STRENGTH_RANGE = array(70, 80);
    const HERO_DEFENSE_RANGE = array(45, 55);
    const HERO_SPEED_RANGE = array(40, 50);
    const HERO_LUCK_RANGE = array(10, 30);
    const HERO_SKILLS = array(
        'RapidStrikeSkil1l' => 10,
        'MagicShieldSkill' => 20
    );

    const WILDBEAST_NAME = 'Wild beast';
    const WILDBEAST_HEALTH_RANGE = array(60, 90);
    const WILDBEAST_STRENGTH_RANGE = array(60, 90);
    const WILDBEAST_DEFENSE_RANGE = array(40, 60);
    const WILDBEAST_SPEED_RANGE = array(40, 60);
    const WILDBEAST_LUCK_RANGE = array(25, 40);
    const WILDBEAST_SKILLS = array();

    const WHO_STARTS_HERO = 0;
    const WHO_STARTS_WILDBEAST = 1;
}