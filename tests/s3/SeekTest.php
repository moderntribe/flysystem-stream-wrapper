<?php

namespace Tribe\Storage\Tests\s3;

class SeekTest extends StreamWrapperTestCase {

	private $file;

	protected function setUp(): void {
		parent::setUp();

		$this->file = 'fly://test.mp3';

		copy( tribe_wrapper_dir( 'test.mp3' ), $this->file );
	}

	/**
	 * This isn't the best test because the Local Adapter
	 * supports streaming out of the box.
	 */
	public function test_it_seeks_binary_files() {
		$resource = fopen( $this->file, 'rb' );
		$bytes    = fgets( $resource, 4096 );

		$this->assertNotFalse( $bytes );
		$this->assertSame( strlen( $bytes ), ftell( $resource ) );
		$this->assertSame( 0, fseek( $resource, 0, SEEK_SET ) );
		$this->assertSame( 0, ftell( $resource ) );
		$this->assertSame( 0, fseek( $resource, 0, SEEK_END ) );
		$this->assertGreaterThan( 0, ftell( $resource ) );
		$this->assertTrue( fclose( $resource ) );
	}

}
