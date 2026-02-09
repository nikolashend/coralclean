<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageTranslation;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\SiteSetting;
use App\Models\Translation;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedServices();
        $this->seedPackages();
        $this->seedSiteSettings();
        $this->seedTranslations();

        $this->command->info('Content seeded successfully!');
    }

    private function seedServices(): void
    {
        $services = [
            [
                'slug' => 'home-cleaning',
                'icon' => 'flaticon-house',
                'sort_order' => 1,
                'key' => 'home',
            ],
            [
                'slug' => 'glass-cleaning',
                'icon' => 'flaticon-clean-1',
                'sort_order' => 2,
                'key' => 'glass',
            ],
            [
                'slug' => 'garden-cleaning',
                'icon' => 'flaticon-agriculture',
                'sort_order' => 3,
                'key' => 'garden',
            ],
            [
                'slug' => 'office-cleaning',
                'icon' => 'flaticon-clean',
                'sort_order' => 4,
                'key' => 'office',
            ],
            [
                'slug' => 'carpet-cleaning',
                'icon' => 'flaticon-vacuum',
                'sort_order' => 5,
                'key' => 'carpet',
            ],
            [
                'slug' => 'renovation-cleaning',
                'icon' => 'flaticon-brush',
                'sort_order' => 6,
                'key' => 'renovation',
            ],
        ];

        foreach ($services as $svcData) {
            $service = Service::updateOrCreate(
                ['slug' => $svcData['slug']],
                [
                    'icon' => $svcData['icon'],
                    'sort_order' => $svcData['sort_order'],
                    'is_active' => true,
                ]
            );

            $key = $svcData['key'];

            foreach (['ru', 'en', 'et'] as $locale) {
                $langData = $this->getLangData($locale);

                ServiceTranslation::updateOrCreate(
                    ['service_id' => $service->id, 'locale' => $locale],
                    [
                        'title' => $langData["service_{$key}_title"] ?? '',
                        'short_desc' => $langData["service_{$key}_short"] ?? '',
                        'description' => $langData["service_{$key}_desc"] ?? '',
                        'image_path' => $langData["service_{$key}_image"] ?? '',
                        'text1' => $langData["service_{$key}_text1"] ?? '',
                        'text2' => $langData["service_{$key}_text2"] ?? '',
                    ]
                );
            }
        }

        $this->command->info('  ✓ Services seeded: ' . count($services));
    }

    private function seedPackages(): void
    {
        $packages = [
            [
                'slug' => 'quick',
                'icon' => 'flaticon-mop',
                'image' => 'coralclean/packages/quick clean (1).png',
                'sort_order' => 1,
                'column_span' => 4,
                'key' => 'quick',
                'btn_key' => 'btn_order_quick',
            ],
            [
                'slug' => 'deep',
                'icon' => 'flaticon-vacuum',
                'image' => 'coralclean/packages/DEEP CLEAN (1).png',
                'sort_order' => 2,
                'column_span' => 4,
                'key' => 'deep',
                'btn_key' => 'btn_order_deep',
            ],
            [
                'slug' => 'movein',
                'icon' => 'flaticon-clean-1',
                'image' => 'coralclean/packages/MOVE-IN  MOVE-OUT.png',
                'sort_order' => 3,
                'column_span' => 4,
                'key' => 'movein',
                'btn_key' => 'btn_order_movein',
            ],
            [
                'slug' => 'office',
                'icon' => 'flaticon-clean',
                'image' => 'coralclean/packages/OFFICE CARE (1).png',
                'sort_order' => 4,
                'column_span' => 6,
                'key' => 'office',
                'btn_key' => 'btn_order_office',
            ],
            [
                'slug' => 'urgent',
                'icon' => 'flaticon-stopwatch',
                'image' => 'coralclean/packages/URGENT CLEAN (1).png',
                'sort_order' => 5,
                'column_span' => 6,
                'key' => 'urgent',
                'btn_key' => 'btn_urgent_package',
            ],
        ];

        foreach ($packages as $pkgData) {
            $package = Package::updateOrCreate(
                ['slug' => $pkgData['slug']],
                [
                    'icon' => $pkgData['icon'],
                    'image' => $pkgData['image'],
                    'sort_order' => $pkgData['sort_order'],
                    'column_span' => $pkgData['column_span'],
                    'is_active' => true,
                ]
            );

            $key = $pkgData['key'];
            $btnKey = $pkgData['btn_key'];

            foreach (['ru', 'en', 'et'] as $locale) {
                $langData = $this->getLangData($locale);

                $features = $langData["package_{$key}_features"] ?? [];

                PackageTranslation::updateOrCreate(
                    ['package_id' => $package->id, 'locale' => $locale],
                    [
                        'title' => $langData["package_{$key}_title"] ?? '',
                        'subtitle' => $langData["package_{$key}_subtitle"] ?? '',
                        'description' => $langData["package_{$key}_desc"] ?? '',
                        'price' => $langData["package_{$key}_price"] ?? '',
                        'btn_text' => $langData[$btnKey] ?? '',
                        'features' => is_array($features) ? $features : [],
                    ]
                );
            }
        }

        $this->command->info('  ✓ Packages seeded: ' . count($packages));
    }

    private function seedSiteSettings(): void
    {
        $settings = [
            [
                'key' => 'phone',
                'group' => 'contact',
                'type' => 'tel',
                'label' => 'Phone Number',
                'value' => ['ru' => '+372 5830 1348', 'en' => '+372 5830 1348', 'et' => '+372 5830 1348'],
            ],
            [
                'key' => 'email',
                'group' => 'contact',
                'type' => 'email',
                'label' => 'Email',
                'value' => ['ru' => 'info@coralclean.ee', 'en' => 'info@coralclean.ee', 'et' => 'info@coralclean.ee'],
            ],
            [
                'key' => 'whatsapp',
                'group' => 'contact',
                'type' => 'tel',
                'label' => 'WhatsApp Number',
                'value' => ['ru' => '37258301348', 'en' => '37258301348', 'et' => '37258301348'],
            ],
            [
                'key' => 'address',
                'group' => 'contact',
                'type' => 'text',
                'label' => 'Address',
                'value' => ['ru' => 'Таллин, Эстония', 'en' => 'Tallinn, Estonia', 'et' => 'Tallinn, Eesti'],
            ],
            [
                'key' => 'working_hours',
                'group' => 'contact',
                'type' => 'text',
                'label' => 'Working Hours',
                'value' => ['ru' => '08:00–20:00, ежедневно', 'en' => '08:00–20:00, daily', 'et' => '08:00–20:00, iga päev'],
            ],
            [
                'key' => 'company_name',
                'group' => 'company',
                'type' => 'text',
                'label' => 'Company Name',
                'value' => ['ru' => 'CoralClean', 'en' => 'CoralClean', 'et' => 'CoralClean'],
            ],
            [
                'key' => 'legal_name',
                'group' => 'company',
                'type' => 'text',
                'label' => 'Legal Name',
                'value' => ['ru' => 'PUHASTUS KORAL OÜ', 'en' => 'PUHASTUS KORAL OÜ', 'et' => 'PUHASTUS KORAL OÜ'],
            ],
            [
                'key' => 'reg_number',
                'group' => 'company',
                'type' => 'text',
                'label' => 'Registration Number',
                'value' => ['ru' => '16989116', 'en' => '16989116', 'et' => '16989116'],
            ],
            [
                'key' => 'stat_cleanings',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Stat: Cleanings Count',
                'value' => ['ru' => '2500', 'en' => '2500', 'et' => '2500'],
            ],
            [
                'key' => 'stat_clients',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Stat: Happy Clients',
                'value' => ['ru' => '450', 'en' => '450', 'et' => '450'],
            ],
            [
                'key' => 'stat_projects',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Stat: Completed Projects',
                'value' => ['ru' => '500', 'en' => '500', 'et' => '500'],
            ],
            [
                'key' => 'stat_years',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Stat: Years of Experience',
                'value' => ['ru' => '15', 'en' => '15', 'et' => '15'],
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info('  ✓ Site settings seeded: ' . count($settings));
    }

    private function seedTranslations(): void
    {
        $count = 0;

        foreach (['ru', 'en', 'et'] as $locale) {
            $langData = $this->getLangData($locale);

            // Skip service_* and package_* keys — they go into their own tables
            $skipPrefixes = ['service_home_', 'service_glass_', 'service_garden_', 'service_office_', 'service_carpet_', 'service_renovation_',
                'package_quick_', 'package_deep_', 'package_movein_', 'package_office_', 'package_urgent_'];

            foreach ($langData as $key => $value) {
                // Skip arrays (features) and service/package specific keys
                if (is_array($value)) continue;

                $skip = false;
                foreach ($skipPrefixes as $prefix) {
                    if (str_starts_with($key, $prefix)) {
                        $skip = true;
                        break;
                    }
                }
                if ($skip) continue;

                Translation::updateOrCreate(
                    ['locale' => $locale, 'group' => 'home', 'key' => $key],
                    ['value' => $value]
                );
                $count++;
            }
        }

        $this->command->info("  ✓ Translations seeded: {$count}");
    }

    /**
     * Load lang data for a locale.
     */
    private function getLangData(string $locale): array
    {
        $path = lang_path("{$locale}/home.php");
        if (!file_exists($path)) return [];
        return require $path;
    }
}
