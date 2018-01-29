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
    /** @var Character */
    private $character;

    public function setUp()
    {
        $this->character = new Character(10, 20, 30, 40, 50);
    }

    public function testGetHealth()
    {
        $character = $this->character;
        self::assertEquals(10, $character->getHealth());
    }

    public function testSetHealth()
    {
        $character = $this->character;
        self::assertEquals(10, $character->getHealth());
        $character->setHealth(40);
        self::assertEquals(40, $character->getHealth());
    }
}