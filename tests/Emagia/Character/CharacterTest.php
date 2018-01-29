<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:03
 */
namespace tests\Emagia\Character;

use Emagia\Character\Character;
use PHPUnit\Framework\TestCase;

/**
 * Class CharacterTest
 * @package tests\Emagia\Character
 */
class CharacterTest extends TestCase
{
    public function testSetHealth()
    {
        $hero = new Character();
        $hero->setHealth(20);
        self::assertEquals(20, $hero->getHealth());
    }
}