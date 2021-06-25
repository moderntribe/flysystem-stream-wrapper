<?php

namespace Tribe\Storage\Tests\s3;

use Tribe\Storage\StreamWrapper;

class WrapperTest extends StreamWrapperTestCase {

	public function test_it_finds_registered_adapter() {
		$wrappers = stream_get_wrappers();

		$this->assertContains( StreamWrapper::DEFAULT_PROTOCOL, $wrappers );
	}
}
