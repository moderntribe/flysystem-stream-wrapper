<?php

namespace Tribe\Storage\Tests\s3;

class RenameTest extends StreamWrapperTestCase {

	private $file;
	private $renamed;

	protected function setUp(): void {
		parent::setUp();

		$this->file    = 'fly://original.txt';
		$this->renamed = 'fly://renamed.txt';

		file_put_contents( $this->file, 'filedata' );
	}

	protected function tearDown(): void {
		@unlink( $this->file );
		@unlink( $this->renamed );
		@unlink( 'fly://testrenamed/test.txt' );
		@rmdir( 'fly://testrenamed' );

		@unlink( 'fly://testwordpress/test.txt' );
		@unlink( 'fly://testrenamedwordpress/test.txt' );
		@rmdir( 'fly://testwordpress' );
		@rmdir( 'fly://testrenamedwordpress' );
		parent::tearDown();
	}

	public function test_it_renames_a_file() {
		$this->assertFileDoesNotExist( $this->renamed );
		$this->assertTrue( rename( $this->file, $this->renamed ) );
		$this->assertFileExists( $this->renamed );
		$this->assertFileDoesNotExist( $this->file );
		$content = file_get_contents( $this->renamed );

		$this->assertStringContainsString( 'filedata', $content );
	}

	public function test_it_renames_a_file_in_a_directory() {
		mkdir( 'fly://testdir' );
		file_put_contents( 'fly://testdir/test.txt', 'filedata' );
		$this->assertTrue( rename( 'fly://testdir/test.txt', 'fly://testrenamed/test.txt' ) );
		$this->assertFileExists( 'fly://testrenamed/test.txt' );
		$this->assertFileDoesNotExist( 'fly://testdir/test.txt' );
	}

}
