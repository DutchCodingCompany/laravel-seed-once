<?php

namespace DutchCodingCompany\SeedOnce;

/**
 * @extends \Illuminate\Database\Seeder
 */
trait Once
{
    /**
     * Run the database seeds.
     *
     * @param array $parameters
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function __invoke(array $parameters = [])
    {
        // Check whether the seeder has already run.
        if ($this->seeded(static::class)) {
            $name = get_class($this);
            $this->command->getOutput()->writeln("Skipped: {$name}");
            return;
        }

        parent::__invoke($parameters);

        // Mark the seeder as run.
        // We use the container to register the seeder state so the
        // state will be reset between tests.
        $this->container->singleton('seeded:' . static::class);
    }

    /**
     * Check whether the given seeder has already run.
     *
     * @param string $seeder
     * @return bool
     */
    protected function seeded(string $seeder): bool
    {
        return $this->container->has('seeded:' . $seeder);
    }
}
