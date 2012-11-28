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

use phpDocumentor\Fileset\Collection\IgnorePatterns;

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

    /**
     * Get the pathed name of the test suite's "data" directory.
     *
     * The path includes a trailing directory separator.
     * @return string
     */
    protected function getNameOfDataDir()
    {
        return
            __DIR__
            . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . 'data'
            . DIRECTORY_SEPARATOR
        ;
    }

    /* __construct() ***************************************************/

    /** @covers \phpDocumentor\Fileset\Collection::__construct() */
    public function testConstructorSucceeds()
    {
        $this->assertInstanceOf('\phpDocumentor\Fileset\Collection', $this->fixture);
    }

    /* setIgnorePatterns() ***************************************************/

    /** @covers \phpDocumentor\Fileset\Collection::setIgnorePatterns() */
    public function testSetIgnorePatternsAcceptsValidIgnorePattern()
    {
        $pattern = array('./foo/*');
        $this->fixture->setIgnorePatterns($pattern);
        $this->assertInstanceOf(
            '\phpDocumentor\Fileset\Collection\IgnorePatterns',
            $this->fixture->getIgnorePatterns()
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::setIgnorePatterns() */
    public function testSetIgnorePatternsAcceptsMultipleValidIgnorePatternsGivenAtOnce()
    {
        $pattern = array('./foo/*', '*/bar/*.txt');
        $this->fixture->setIgnorePatterns($pattern);
        $this->assertInstanceOf(
            '\phpDocumentor\Fileset\Collection\IgnorePatterns',
            $this->fixture->getIgnorePatterns()
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::setIgnorePatterns() */
    public function testSetIgnorePatternsAcceptsMultipleValidIgnorePatternsGivenSeparately()
    {
        $pattern1 = array('./foo/*');
        $pattern2 = array('*/bar/*.txt');
        $this->fixture->setIgnorePatterns($pattern1);
        $this->fixture->setIgnorePatterns($pattern2);
        $this->assertInstanceOf(
            '\phpDocumentor\Fileset\Collection\IgnorePatterns',
            $this->fixture->getIgnorePatterns()
        );
    }

    /* getIgnorePatterns() ***************************************************/

    /** @covers \phpDocumentor\Fileset\Collection::getIgnorePatterns() */
    public function testGetIgnorePatternsAcceptsValidIgnorePattern()
    {
        $pattern = array('./foo/*');
        $this->fixture->setIgnorePatterns($pattern);
        $this->assertInstanceOf(
            '\phpDocumentor\Fileset\Collection\IgnorePatterns',
            $this->fixture->getIgnorePatterns()
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::getIgnorePatterns() */
    public function testGetIgnorePatternsAcceptsMultipleValidIgnorePatternsGivenAtOnce()
    {
        $pattern = array('./foo/*', '*/bar/*.txt');
        $this->fixture->setIgnorePatterns($pattern);
        $this->assertInstanceOf(
            '\phpDocumentor\Fileset\Collection\IgnorePatterns',
            $this->fixture->getIgnorePatterns()
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::getIgnorePatterns() */
    public function testGetIgnorePatternsAcceptsMultipleValidIgnorePatternsGivenSeparately()
    {
        $pattern1 = array('./foo/*');
        $pattern2 = array('*/bar/*.txt');
        $this->fixture->setIgnorePatterns($pattern1);
        $this->fixture->setIgnorePatterns($pattern2);
        $this->assertInstanceOf(
            '\phpDocumentor\Fileset\Collection\IgnorePatterns',
            $this->fixture->getIgnorePatterns()
        );
    }

    /* setAllowedExtensions() ***************************************************/

    /** @covers \phpDocumentor\Fileset\Collection::setAllowedExtensions() */
    public function testSetAllowedExtensionsAcceptsEmptyArray()
    {
        $this->fixture->setAllowedExtensions(array());
        $this->assertTrue(true, 'Test passed');
    }

    /** @covers \phpDocumentor\Fileset\Collection::setAllowedExtensions() */
    public function testSetAllowedExtensionsAcceptsSimpleArray()
    {
        $this->fixture->setAllowedExtensions(array('php'));
        $this->assertTrue(true, 'Test passed');
    }

    /** @covers \phpDocumentor\Fileset\Collection::setAllowedExtensions() */
    public function testSetAllowedExtensionsAcceptsAssociativeArray()
    {
        $this->fixture->setAllowedExtensions(array('PHP executable file' => 'php'));
        $this->assertTrue(true, 'Test passed');
    }

    /** @covers \phpDocumentor\Fileset\Collection::setAllowedExtensions() */
    public function testSetAllowedExtensionsAllowsMultipleCalls()
    {
        $this->fixture->setAllowedExtensions(array('PHP executable file' => 'php'));
        $this->fixture->setAllowedExtensions(array('PHP3 old file' => 'php3'));
        $this->assertTrue(true, 'Test passed');
    }

    /* addAllowedExtension() ***************************************************/

    /** @covers \phpDocumentor\Fileset\Collection::addAllowedExtension() */
    public function testAddAllowedExtensionAcceptsEmptyString()
    {
        $extension = '';
        $this->fixture->addAllowedExtension($extension);
        $this->assertTrue(true, 'Test passed');
    }

    /** @covers \phpDocumentor\Fileset\Collection::addAllowedExtension() */
    public function testAddAllowedExtensionAcceptsSingleString()
    {
        $extension = 'php';
        $this->fixture->addAllowedExtension($extension);
        $this->assertTrue(true, 'Test passed');
    }

    /** @covers \phpDocumentor\Fileset\Collection::addAllowedExtension() */
    public function testAddAllowedExtensionAllowsMultipleCalls()
    {
        $this->fixture->addAllowedExtension('php');
        $this->fixture->addAllowedExtension('php3');
        $this->assertTrue(true, 'Test passed');
    }
    /* addDirectories() ***************************************************/

    /* addDirectory() ***************************************************/

    /** @covers \phpDocumentor\Fileset\Collection::addDirectory() */
    public function testAddDirectoryCanSeePharContents()
    {
        // read the phar test fixture
        $this->fixture->addDirectory(
            'phar://'. $this->getNameOfDataDir() . 'test.phar'
        );

        // we know which files are in there; test against it
        $this->assertEquals(
            array(
                'phar://' . $this->getNameOfDataDir() . 'test.phar' . DIRECTORY_SEPARATOR . 'folder' . DIRECTORY_SEPARATOR . 'test.php',
                'phar://' . $this->getNameOfDataDir() . 'test.phar' . DIRECTORY_SEPARATOR . 'test.php',
            ),
            $this->fixture->getFilenames()
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::addDirectory() */
    public function testAddDirectoryCanSeeDirectoryContents()
    {
        // load the data test folder... must add non-default extensions first
        $this->fixture->setAllowedExtensions(array('phar', 'txt'));
        $this->fixture->addDirectory($this->getNameOfDataDir());
        $files = $this->fixture->getFilenames();
        $count = count($files);

        // do a few checks to see if it has caught some cases
        $this->assertGreaterThan(0, $count);
        $this->assertContains(
                realpath($this->getNameOfDataDir() . 'test.phar'),
            $files
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::addDirectory() */
    public function testAddDirectoryWhenAllowedExtensionsHidesEverything()
    {
        // there are no files that match the *default* extensions
        $this->fixture->addDirectory($this->getNameOfDataDir());
        $files = $this->fixture->getFilenames();

        // this file should have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'fileWithText.txt'),
            $files
        );

        // this file should also have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'test.phar'),
            $files
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::addDirectory() */
    public function testAddDirectoryWhenIgnorePatternHidesEverything()
    {
        // load the data test folder... must add non-default extensions first
        $this->fixture->setAllowedExtensions(array('phar', 'txt'));

        $this->fixture->getIgnorePatterns()->append('(phar|txt)');

        $this->fixture->addDirectory($this->getNameOfDataDir());
        $files = $this->fixture->getFilenames();

        // this file should have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'fileWithText.txt'),
            $files
        );

        // this file should also have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'test.phar'),
            $files
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::addDirectory() */
    public function testAddDirectoryWhenIgnorePatternHidesSomething()
    {
        // load the data test folder... must add non-default extensions first
        $this->fixture->setAllowedExtensions(array('phar', 'txt'));

        $this->fixture->getIgnorePatterns()->append('(phar)');

        $this->fixture->addDirectory($this->getNameOfDataDir());
        $files = $this->fixture->getFilenames();

        // this file should have been seen
        $this->assertContains(
            realpath($this->getNameOfDataDir() . 'fileWithText.txt'),
            $files
        );

        // this file should have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'test.phar'),
            $files
        );
    }

    /* addFiles() ***************************************************/

    /* addFile() ***************************************************/

    /* getFilenames() ***************************************************/

    /** @covers \phpDocumentor\Fileset\Collection::getFilenames() */
    public function testGetFilenamesCanSeePharContents()
    {
        // read the phar test fixture
        $this->fixture->addDirectory(
            'phar://'. $this->getNameOfDataDir() . 'test.phar'
        );

        // we know which files are in there; test against it
        $this->assertEquals(
            array(
                'phar://' . $this->getNameOfDataDir() . 'test.phar' . DIRECTORY_SEPARATOR . 'folder' . DIRECTORY_SEPARATOR . 'test.php',
                'phar://' . $this->getNameOfDataDir() . 'test.phar' . DIRECTORY_SEPARATOR . 'test.php',
            ),
            $this->fixture->getFilenames()
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::getFilenames() */
    public function testGetFilenamesCanSeeDirectoryContents()
    {
        // load the data test folder... must add non-default extensions first
        $this->fixture->setAllowedExtensions(array('phar', 'txt'));
        $this->fixture->addDirectory($this->getNameOfDataDir());
        $files = $this->fixture->getFilenames();
        $count = count($files);

        // do a few checks to see if it has caught some cases
        $this->assertGreaterThan(0, $count);
        $this->assertContains(
            realpath($this->getNameOfDataDir() . 'test.phar'),
            $files
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::getFilenames() */
    public function testGetFilenamesWhenIgnorePatternHidesEverything()
    {
        // load the data test folder... must add non-default extensions first
        $this->fixture->setAllowedExtensions(array('phar', 'txt'));

        $this->fixture->getIgnorePatterns()->append('(phar|txt)');

        $this->fixture->addDirectory($this->getNameOfDataDir());
        $files = $this->fixture->getFilenames();

        // this file should have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'fileWithText.txt'),
            $files
        );

        // this file should also have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'test.phar'),
            $files
        );
    }

    /** @covers \phpDocumentor\Fileset\Collection::getFilenames() */
    public function testGetFilenamesWhenIgnorePatternHidesSomething()
    {
        // load the data test folder... must add non-default extensions first
        $this->fixture->setAllowedExtensions(array('phar', 'txt'));

        $this->fixture->getIgnorePatterns()->append('(phar)');

        $this->fixture->addDirectory($this->getNameOfDataDir());
        $files = $this->fixture->getFilenames();

        // this file should have been seen
        $this->assertContains(
            realpath($this->getNameOfDataDir() . 'fileWithText.txt'),
            $files
        );

        // this file should have been ignored
        $this->assertNotContains(
            realpath($this->getNameOfDataDir() . 'test.phar'),
            $files
        );
    }


    /* getProjectRoot() ***************************************************/

    /* setIgnoreHidden() ***************************************************/

    /* getIgnoreHidden() ***************************************************/

    /* setFollowSymlinks() ***************************************************/

    /* getFollowSymlinks() ***************************************************/

}
