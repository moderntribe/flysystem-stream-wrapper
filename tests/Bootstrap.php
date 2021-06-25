<?php

function tribe_data_dir( string $append_path = '' ): string {
	return __DIR__ . '/data/' . $append_path;
}

function tribe_wrapper_dir( string $append_path = '' ): string {
	return tribe_data_dir() . 'stream_wrapper/' . $append_path;
}
