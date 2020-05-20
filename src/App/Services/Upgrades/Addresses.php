<?php

namespace LaravelEnso\Core\App\Services\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Addresses\App\Models\Address;
use LaravelEnso\Permissions\App\Models\Permission;
use LaravelEnso\Upgrade\App\Contracts\MigratesData;
use LaravelEnso\Upgrade\App\Contracts\MigratesPostDataMigration;
use LaravelEnso\Upgrade\App\Contracts\MigratesTable;

// RUN UPGRADE AFTER MIGRATIONS
class Addresses implements MigratesTable, MigratesData, MigratesPostDataMigration
{
    public function isMigrated(): bool
    {
        return Schema::hasColumn('addresses', 'region_id');
    }

    public function migrateTable(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->integer('region_id')->unsigned()->index()->nullable()->after('country_id');
            $table->foreign('region_id')->references('id')->on('regions');

            $table->integer('locality_id')->unsigned()->index()->nullable()->after('region_id');
            $table->foreign('locality_id')->references('id')->on('localities');

            $table->string('additional')->nullable()->after('street');
        });
    }

    public function migrateData(): void
    {
        Address::each(function (Address $address) {
            $address->update([
                'street' => $this->street($address),
                'additional' => $this->additional($address),
            ]);
        });

        Permission::whereName('core.addresses.countiesOptions')
            ->update(['name' => 'core.addresses.regionsOptions']);
    }

    public function migratePostDataMigration(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn([
                'apartment', 'floor', 'entry',
                'building', 'building_type', 'number', 'street_type',
                'sub_administrative_area', 'administrative_area',
            ]);
        });
    }

    private function street(Address $address)
    {
        return $this->implode(
            [
                __($address->street_type), $address->street, $address->number,
            ],
            ' ');
    }

    private function additional(Address $address)
    {
        $buildingType = $address->building
            ? __($address->building_type ?? 'Building')
            : null;

        $entryPrefix = $address->entry
            ? __('Entry')
            : null;

        $floorPrefix = $address->floor
            ? __('Floor')
            : null;

        $apartamentPrefix = $address->apartament
            ? __('Apartment')
            : null;

        return $this->implode(
            [
                $this->implode([$buildingType, $address->building], ' '),
                $this->implode([$entryPrefix, $address->entry], ' '),
                $this->implode([$floorPrefix, $address->floor], ' '),
                $this->implode([$apartamentPrefix, $address->apartament], ' '),
                $address->administrative_area,
                $address->sub_administrative_area,
            ],
            ', '
        );
    }

    private function implode(array $elements, string $glue)
    {
        return (new Collection($elements))
            ->filter()
            ->implode($glue);
    }
}
