<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 06-Feb-18
 * Time: 00:08
 */

namespace Tests\Emagia\Character\Skills;

use Emagia\Character\Skills\AbstractSkill;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractSkillTest
 * @package Tests\Emagia\Character\Skills
 */
class AbstractSkillTest extends TestCase
{
    /**
     * Test for willApply method when skill's chance to use is 0%
     */
    public function testWillApplyTrue()
    {
        $skill = new AbstractSkill(100);
        self::assertTrue($skill->wiillApply(), 'Expected true as result.');
    }

    /**
     * Test for willApply method when skill's chance to use is 100%
     */
    public function testWillApplyFalse()
    {
        $skill = new AbstractSkill(0);
        self::assertFalse($skill->wiillApply(), 'Expected false as result.');
    }
}