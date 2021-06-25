<?php

namespace Tribe\Storage\Tests\s3;

use League\Flysystem\AwsS3v3\AwsS3Adapter;

class FlysystemTest extends StreamWrapperTestCase {

	public function test_adapter() {
		$this->assertInstanceOf( AwsS3Adapter::class, $this->filesystem->getAdapter() );
	}
}
