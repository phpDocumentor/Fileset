<?php
/**
 * phpDocumentor
 *
 * PHP Version 5
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2011 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Fileset;

/**
 * Test case for Collection class.
 *
 * @author  Mike van Riel <mike.vanriel@naenius.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    http://phpdoc.org
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @var Collection */
    protected $fixture = null;

    protected function setUp()
    {
        $this->fixture = new Collection();
    }

    /* addDirectory() ***************************************************/

    /**
     * @covers \phpDocumentor\Fileset\Collection::addDirectory()
     */
    public function testAddDirectoryCanSeePharContents()
    {
        // read the phar test fixture
        $this->fixture->addDirectory(
            'phar://'.dirname(__FILE__).'/../../../data/test.phar'
        );

        // we know which files are in there; test against it
        $this->assertEquals(
            array(
                'phar://' . dirname(__FILE__)
                    . '/../../../data/test.phar' . DIRECTORY_SEPARATOR . 'folder' . DIRECTORY_SEPARATOR . 'test.php',
                'phar://' . dirname(__FILE__)
                    . '/../../../data/test.phar' . DIRECTORY_SEPARATOR . 'test.php',
            ),
            $this->fixture->getFilenames()
        );
    }

    /**
     * @covers \phpDocumentor\Fileset\Collection::addDirectory()
     */
    public function testAddDirectoryCanSeeDirectoryContents()
    {
        // load the unit test folder
        $this->fixture->addDirectory(dirname(__FILE__) . '/../../');
        $files = $this->fixture->getFilenames();
        $count = count($files);

        // do a few checks to see if it has caught some cases
        $this->assertGreaterThan(0, $count);
        $this->assertContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/CollectionTest.php'),
            $files
        );
    }

    /**
     * @covers \phpDocumentor\Fileset\Collection::addDirectory()
     */
    public function testAddDirectoryWhenIgnorePatternHidesEverything()
    {
        $this->fixture->getIgnorePatterns()->append('*r/Fileset*.php');
        $this->fixture->addDirectory(dirname(__FILE__) . '/../../');
        $files = $this->fixture->getFilenames();

        // this file should have been ignored
        $this->assertNotContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/CollectionTest.php'),
            $files
        );

        // this file should also have been ignored
        $this->assertNotContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/Collection/IgnorePatternsTest.php'),
            $files
        );
    }

    /**
     * @covers \phpDocumentor\Fileset\Collection::addDirectory()
     */
    public function testAddDirectoryWhenIgnorePatternHidesSomething()
    {
        $this->fixture->getIgnorePatterns()->append('*r/Fileset/*Ig*.php');
        $this->fixture->addDirectory(dirname(__FILE__) . '/../../');
        $files = $this->fixture->getFilenames();

        // this file should have been seen
        $this->assertContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/CollectionTest.php'),
            $files
        );

        // this file should have been ignored
        $this->assertNotContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/Collection/IgnorePatternsTest.php'),
            $files
        );
    }

    /* getFilenames() ***************************************************/

    /**
     * @covers \phpDocumentor\Fileset\Collection::getFilenames()
     */
    public function testGetFilenamesCanSeePharContents()
    {
        // read the phar test fixture
        $this->fixture->addDirectory(
            'phar://'.dirname(__FILE__).'/../../../data/test.phar'
        );

        // we know which files are in there; test against it
        $this->assertEquals(
            array(
                'phar://' . dirname(__FILE__)
                    . '/../../../data/test.phar' . DIRECTORY_SEPARATOR . 'folder' . DIRECTORY_SEPARATOR . 'test.php',
                'phar://' . dirname(__FILE__)
                    . '/../../../data/test.phar' . DIRECTORY_SEPARATOR . 'test.php',
            ),
            $this->fixture->getFilenames()
        );
    }

    /**
     * @covers \phpDocumentor\Fileset\Collection::getFilenames()
     */
    public function testGetFilenamesCanSeeDirectoryContents()
    {
        // load the unit test folder
        $this->fixture->addDirectory(dirname(__FILE__) . '/../../');
        $files = $this->fixture->getFilenames();
        $count = count($files);

        // do a few checks to see if it has caught some cases
        $this->assertGreaterThan(0, $count);
        $this->assertContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/CollectionTest.php'),
            $files
        );
    }

    /**
     * @covers \phpDocumentor\Fileset\Collection::getFilenames()
     */
    public function testGetFilenamesWhenIgnorePatternHidesEverything()
    {
        $this->fixture->getIgnorePatterns()->append('*r/Fileset*.php');
        $this->fixture->addDirectory(dirname(__FILE__) . '/../../');
        $files = $this->fixture->getFilenames();

        // this file should have been ignored
        $this->assertNotContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/CollectionTest.php'),
            $files
        );

        // this file should also have been ignored
        $this->assertNotContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/Collection/IgnorePatternsTest.php'),
            $files
        );
    }

    /**
     * @covers \phpDocumentor\Fileset\Collection::getFilenames()
     */
    public function testGetFilenamesWhenIgnorePatternHidesSomething()
    {
        $this->fixture->getIgnorePatterns()->append('*r/Fileset/*Ig*.php');
        $this->fixture->addDirectory(dirname(__FILE__) . '/../../');
        $files = $this->fixture->getFilenames();

        // this file should have been seen
        $this->assertContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/CollectionTest.php'),
            $files
        );

        // this file should have been ignored
        $this->assertNotContains(
            realpath(dirname(__FILE__) . '/../../phpDocumentor/Fileset/Collection/IgnorePatternsTest.php'),
            $files
        );
    }
}
