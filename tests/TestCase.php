<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    /**
     * These tests run against a real Magento database (there is no
     * disposable schema Laravel owns to migrate/seed -- see the README's
     * Configuration section), so every test that touches it skips
     * gracefully rather than failing when that database isn't reachable --
     * the same convention this project's Go and Rust reimplementations
     * both use for their own DB-touching tests.
     */
    protected function skipUnlessDatabaseReachable(): void
    {
        try {
            DB::connection()->getPdo();
        } catch (\Throwable $e) {
            $this->markTestSkipped('Magento database not reachable: '.$e->getMessage());
        }
    }
}
