<?php

// bunny.net WordPress Plugin
// Copyright (C) 2024-2025 BunnyWay d.o.o.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
declare(strict_types=1);

namespace Bunny\Wordpress\Service;

class MigrateExcludedExtensions
{
    public function perform(): void
    {
        if (get_option('_bunnycdn_migrated_excluded_extensions')) {
            return;
        }
        if (!get_option('bunnycdn_wizard_finished')) {
            return;
        }
        $extensions = get_option('bunnycdn_cdn_excluded', false);
        if (false === $extensions || !is_array($extensions)) {
            return;
        }
        $extensions = array_map(fn ($ext) => '*'.$ext, $extensions);
        update_option('bunnycdn_cdn_excluded', $extensions);
        update_option('_bunnycdn_migrated_excluded_extensions', true);
    }
}
