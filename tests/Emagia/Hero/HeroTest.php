<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:03
 */
namespace tests\Emagia\Hero;

use Emagia\Hero\Hero;
use PHPUnit\Framework\TestCase;

/**
 * Class HeroTest
 * @package tests\Emagia\Hero
 */
class HeroTest extends TestCase
{
    public function testSetHealth()
    {
        $hero = new Hero();
        $hero->setHealth(20);
        self::assertEquals(20, $hero->getHealth());
    }
}