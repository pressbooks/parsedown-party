# Integration Tests

This directory contains integration tests for the Parsedown Party plugin.

## Running Tests

### Prerequisites

1. Install test dependencies:
   ```bash
   composer install
   ```

2. Set up WordPress test environment:
   ```bash
   # Install WordPress test suite
   bash bin/install-wp-tests.sh wordpress_test root '' localhost latest
   ```

   The script accepts the following parameters:
   - Database name (e.g., `wordpress_test`)
   - Database user (e.g., `root`)
   - Database password (empty string `''` if no password)
   - Database host (optional, defaults to `localhost`)
   - WordPress version (optional, defaults to `latest`)
   - Skip database creation (optional, defaults to `false`)

   Or set the `WP_TESTS_DIR` environment variable to point to your WordPress test installation:
   ```bash
   export WP_TESTS_DIR=/path/to/wordpress-tests-lib
   ```

### Run All Tests

```bash
composer test
```

This will run both the unit tests and coding standards checks.

### Run Only Unit Tests

```bash
vendor/bin/phpunit
```

### Run Specific Test File

```bash
vendor/bin/phpunit tests/test-plugin.php
```

### Run Tests with Coverage

```bash
vendor/bin/phpunit --coverage-html coverage
```

This will generate an HTML coverage report in the `coverage/` directory.

### Grouping Tests

You can add `@group` annotations to organize tests:

```php
/**
 * @group parsedown-party
 * @group markdown
 */
public function test_something()
{
    // ...
}
```

Then run only tests in a specific group:

```bash
vendor/bin/phpunit --group markdown
```

## Writing Tests

All test files should:
- Be placed in the `tests/` directory
- Start with the prefix `test-`
- Extend `\WP_UnitTestCase`
- Use the `ParsedownParty\Tests` namespace

Example test file structure:

```php
<?php

namespace ParsedownParty\Tests;

/**
 * @group parsedown-party
 */
class MyFeatureTest extends \WP_UnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Set up test environment
    }

    public function test_something()
    {
        // Your test assertions
        $this->assertTrue(true);
    }

    protected function tearDown(): void
    {
        // Clean up after test
        parent::tearDown();
    }
}
```

## Continuous Integration

These tests are designed to run in CI environments. Make sure to set up the WordPress test environment before running the tests in your CI configuration.
