# Flysystem Stream Wrapper

[![PHPCS + Unit Tests](https://github.com/moderntribe/flysystem-stream-wrapper/actions/workflows/pull-request.yml/badge.svg)](https://github.com/moderntribe/tribe-storage/actions/workflows/pull-request.yml)
![php 7.3+](https://img.shields.io/badge/php-min%207.3-red.svg)

A PHP Stream Wrapper for [Flysystem v1](https://flysystem.thephpleague.com/v1/docs/) for use primarily with
[Tribe Storage](https://github.com/moderntribe/tribe-storage) for WordPress. 

### Install with Composer v1

Add the following to the composer.json repositories object:

```json
  "repositories": [
      {
        "type": "vcs",
        "url": "git@github.com:moderntribe/flysystem-stream-wrapper.git"
      },
  ]

```
Then run:

```shell
composer require moderntribe/flysystem-stream-wrapper
```

### Automated Testing Requirements

- Docker
- Docker Compose

#### Run Tests

```bash
$ composer install
$ composer test
```

## More Resources:
- [Tribe Storage Statically.io CDN](https://github.com/moderntribe/tribe-storage-statically-cdn)
- [Modern Tribe](https://tri.be/)
- [Twistor Flysystem Stream Wrapper](https://github.com/twistor/flysystem-stream-wrapper)
