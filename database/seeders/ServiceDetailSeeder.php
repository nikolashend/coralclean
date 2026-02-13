<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Database\Seeder;

class ServiceDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = $this->getData();

        foreach ($data as $slug => $locales) {
            $service = Service::where('slug', $slug)->first();
            if (!$service) {
                $this->command->warn("Service '{$slug}' not found, skipping.");
                continue;
            }

            foreach ($locales as $locale => $fields) {
                ServiceTranslation::where('service_id', $service->id)
                    ->where('locale', $locale)
                    ->update($fields);
            }

            $this->command->info("✓ Updated: {$slug}");
        }

        $this->command->info('✓ All service details updated!');
    }

    private function getData(): array
    {
        return [
            // ─── 1. MAINTENANCE CLEANING ────────────────────────
            'maintenance-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 55 €',
                    'pricing_table' => [
                        ['group' => 'Уборка Квартиры', 'items' => [
                            ['name' => 'Студия + санузел', 'price' => '55 €'],
                            ['name' => '1-комнатная квартира', 'price' => '60 €'],
                            ['name' => '2-комнатная квартира', 'price' => '70 €'],
                            ['name' => '3-комнатная квартира', 'price' => '80 €'],
                            ['name' => '4-комнатная квартира', 'price' => '90 €'],
                            ['name' => '5-комнатная квартира', 'price' => '110 €'],
                        ]],
                        ['group' => 'Уборка Дома', 'items' => [
                            ['name' => 'Дом до 80 м²', 'price' => '95 €'],
                            ['name' => 'Дом до 140 м²', 'price' => '115 €'],
                            ['name' => 'Дом до 220 м²', 'price' => '160 €'],
                        ]],
                    ],
                    'addons' => [
                        'Окна (от 10 € / окно)',
                        'Очистка кухонных шкафов — 20 €',
                        'Духовка внутри — 15 €',
                        'Мойка микроволновки внутри — 10 €',
                        'Холодильник внутри — 15 €',
                        'Уборка балкона — 15 €',
                        'Шкафы внутри (от 5 € / шкаф)',
                        'Дополнительный санузел — +20 €',
                        'Мойка стен в одной комнате — 20 €',
                        'Мойка лотка для животных — 5 €',
                        'Вынос мусора в контейнер клиента — 10 €',
                    ],
                    'included' => [
                        'Сухая и влажная уборка пола (пылесос для всех покрытий)',
                        'Удаление пыли со всех поверхностей (до 180 см)',
                        'Стеклянные и зеркальные поверхности (не окна, до 180 см)',
                        'Чистка дверей',
                        'Радиаторы и трубы снаружи',
                        'Выключатели и розетки',
                        'Плинтусы',
                        'Светильники напольные и настенные (до 180 см)',
                        'Санузел (без удаления налёта и известкового камня)',
                        'Кухонная мебель снаружи',
                        'Крупная кухонная техника снаружи',
                        'Сухая чистка мягкой мебели пылесосом',
                    ],
                ],
                'et' => [
                    'price_anchor' => 'al. 55 €',
                    'pricing_table' => [
                        ['group' => 'Korteri koristus', 'items' => [
                            ['name' => 'Stuudio + vannituba', 'price' => '55 €'],
                            ['name' => '1-toaline korter', 'price' => '60 €'],
                            ['name' => '2-toaline korter', 'price' => '70 €'],
                            ['name' => '3-toaline korter', 'price' => '80 €'],
                            ['name' => '4-toaline korter', 'price' => '90 €'],
                            ['name' => '5-toaline korter', 'price' => '110 €'],
                        ]],
                        ['group' => 'Maja koristus', 'items' => [
                            ['name' => 'Maja kuni 80 m²', 'price' => '95 €'],
                            ['name' => 'Maja kuni 140 m²', 'price' => '115 €'],
                            ['name' => 'Maja kuni 220 m²', 'price' => '160 €'],
                        ]],
                    ],
                    'addons' => [
                        'Aknad (al. 10 € / aken)',
                        'Köögikappide puhastus — 20 €',
                        'Ahi seestpoolt — 15 €',
                        'Mikrolaineahi seestpoolt — 10 €',
                        'Külmik seestpoolt — 15 €',
                        'Rõdu koristus — 15 €',
                        'Kapid seestpoolt (al. 5 € / kapp)',
                        'Lisavannituba — +20 €',
                        'Seinte pesu ühes toas — 20 €',
                        'Lemmiklooma liivakasti pesu — 5 €',
                        'Prügi väljavedu kliendi konteinerisse — 10 €',
                    ],
                    'included' => [
                        'Kuiv- ja märgpuhastus põrandale (tolmuimeja kõikidele katetele)',
                        'Tolmu eemaldamine kõikidelt pindadelt (kuni 180 cm)',
                        'Klaas- ja peegelpinnad (mitte aknad, kuni 180 cm)',
                        'Uste puhastus',
                        'Radiaatorid ja torud väljastpoolt',
                        'Lülitid ja pistikupesad',
                        'Põrandaliistud',
                        'Põranda- ja seinaprasvalgustid (kuni 180 cm)',
                        'Vannituba (ilma katlakivi eemaldamiseta)',
                        'Köögimööbel väljastpoolt',
                        'Suur köögitehnika väljastpoolt',
                        'Pehme mööbli tolmuimejaga puhastus',
                    ],
                ],
                'en' => [
                    'price_anchor' => 'from 55 €',
                    'pricing_table' => [
                        ['group' => 'Apartment Cleaning', 'items' => [
                            ['name' => 'Studio + bathroom', 'price' => '55 €'],
                            ['name' => '1-bedroom apartment', 'price' => '60 €'],
                            ['name' => '2-bedroom apartment', 'price' => '70 €'],
                            ['name' => '3-bedroom apartment', 'price' => '80 €'],
                            ['name' => '4-bedroom apartment', 'price' => '90 €'],
                            ['name' => '5-bedroom apartment', 'price' => '110 €'],
                        ]],
                        ['group' => 'House Cleaning', 'items' => [
                            ['name' => 'House up to 80 m²', 'price' => '95 €'],
                            ['name' => 'House up to 140 m²', 'price' => '115 €'],
                            ['name' => 'House up to 220 m²', 'price' => '160 €'],
                        ]],
                    ],
                    'addons' => [
                        'Windows (from 10 € / window)',
                        'Kitchen cabinet cleaning — 20 €',
                        'Oven interior — 15 €',
                        'Microwave interior — 10 €',
                        'Fridge interior — 15 €',
                        'Balcony cleaning — 15 €',
                        'Cabinets interior (from 5 € / cabinet)',
                        'Additional bathroom — +20 €',
                        'Wall washing in one room — 20 €',
                        'Pet litter tray cleaning — 5 €',
                        'Waste disposal to client container — 10 €',
                    ],
                    'included' => [
                        'Dry and wet floor cleaning (vacuum for all surfaces)',
                        'Dust removal from all surfaces (up to 180 cm)',
                        'Glass and mirror surfaces (not windows, up to 180 cm)',
                        'Door cleaning',
                        'Radiators and pipes exterior',
                        'Switches and sockets',
                        'Baseboards',
                        'Floor and wall lamps (up to 180 cm)',
                        'Bathroom (without limescale removal)',
                        'Kitchen furniture exterior',
                        'Large kitchen appliances exterior',
                        'Dry vacuum cleaning of upholstered furniture',
                    ],
                ],
            ],

            // ─── 2. DEEP CLEANING ────────────────────────
            'deep-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 2.5 € / м²',
                    'pricing_table' => [
                        ['group' => 'Генеральная уборка', 'items' => [
                            ['name' => 'Стоимость за м²', 'price' => 'от 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Окна (от 10 € / окно)',
                        'Духовка внутри — 15 €',
                        'Холодильник внутри — 15 €',
                        'Шкафы внутри (от 5 € / шкаф)',
                        'Химчистка мебели (от 29 €)',
                    ],
                    'included' => [
                        'Сухая и влажная уборка пола (пылесос для всех покрытий)',
                        'Удаление пыли с горизонтальных поверхностей (высоту определяет клиент; при высоте более 3 м — стремянка клиента)',
                        'Очистка стеклянных и зеркальных поверхностей (не включая окна)',
                        'Чистка дверей',
                        'Чистка труб и радиаторов снаружи',
                        'Чистка выключателей и розеток',
                        'Чистка плинтусов',
                        'Чистка стен от лёгких загрязнений',
                        'Чистка напольных и настенных светильников (для потолочных — стремянка клиента)',
                        'Очистка санитарных помещений (включая удаление налёта и камня)',
                        'Чистка кухонной мебели снаружи',
                        'Чистка крупной кухонной техники снаружи',
                        'Уборка шкафов внутри и снаружи (раскладывание личных вещей — по договорённости)',
                        'Сухая чистка мягкой мебели пылесосом',
                    ],
                ],
                'et' => [
                    'price_anchor' => 'al. 2.5 € / m²',
                    'pricing_table' => [
                        ['group' => 'Suurpuhastus', 'items' => [
                            ['name' => 'Hind m² kohta', 'price' => 'al. 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Aknad (al. 10 € / aken)',
                        'Ahi seestpoolt — 15 €',
                        'Külmik seestpoolt — 15 €',
                        'Kapid seestpoolt (al. 5 € / kapp)',
                        'Mööbli keemiline puhastus (al. 29 €)',
                    ],
                    'included' => [
                        'Kuiv- ja märgpuhastus põrandale (tolmuimeja kõikidele katetele)',
                        'Tolmu eemaldamine horisontaalsetelt pindadelt (kõrguse määrab klient; üle 3 m — kliendi redel)',
                        'Klaas- ja peegelpindade puhastus (v.a aknad)',
                        'Uste puhastus',
                        'Torude ja radiaatorite puhastus väljastpoolt',
                        'Lülitite ja pistikupesade puhastus',
                        'Põrandaliistude puhastus',
                        'Seinte puhastus kergetest reostustest',
                        'Põranda- ja seinaprasvalgustite puhastus (laevalgustid — kliendi redel)',
                        'Sanitaarruumide puhastus (sh katlakivi eemaldamine)',
                        'Köögimööbli puhastus väljastpoolt',
                        'Suure köögitehnika puhastus väljastpoolt',
                        'Kappide puhastus seest ja väljast (isiklike asjade sorteerimine — kokkuleppel)',
                        'Pehme mööbli tolmuimejaga puhastus',
                    ],
                ],
                'en' => [
                    'price_anchor' => 'from 2.5 € / m²',
                    'pricing_table' => [
                        ['group' => 'Deep Cleaning', 'items' => [
                            ['name' => 'Price per m²', 'price' => 'from 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Windows (from 10 € / window)',
                        'Oven interior — 15 €',
                        'Fridge interior — 15 €',
                        'Cabinets interior (from 5 € / cabinet)',
                        'Furniture dry cleaning (from 29 €)',
                    ],
                    'included' => [
                        'Dry and wet floor cleaning (vacuum for all surfaces)',
                        'Dust removal from horizontal surfaces (height determined by client; above 3 m — client\'s ladder)',
                        'Glass and mirror surface cleaning (not including windows)',
                        'Door cleaning',
                        'Pipe and radiator exterior cleaning',
                        'Switch and socket cleaning',
                        'Baseboard cleaning',
                        'Wall cleaning from light dirt',
                        'Floor and wall lamp cleaning (ceiling lamps — client\'s ladder)',
                        'Bathroom cleaning (including limescale and mineral deposit removal)',
                        'Kitchen furniture exterior cleaning',
                        'Large kitchen appliance exterior cleaning',
                        'Cabinet cleaning inside and outside (arranging personal items — by agreement)',
                        'Dry vacuum cleaning of upholstered furniture',
                    ],
                ],
            ],

            // ─── 3. POST-RENOVATION CLEANING ────────────────────────
            'post-renovation-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 2.5 € / м²',
                    'pricing_table' => [
                        ['group' => 'Уборка после ремонта', 'items' => [
                            ['name' => 'Стоимость за м²', 'price' => 'от 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Мойка окон (от 10 € / окно)',
                        'Вынос строительного мусора (по согласованию)',
                        'Химчистка мебели (от 29 €)',
                    ],
                    'included' => [
                        'Сухая и влажная уборка пола (пылесос для всех покрытий)',
                        'Удаление пыли с горизонтальных поверхностей (высоту определяет клиент; при высоте более 3 м — стремянка клиента)',
                        'Очистка стеклянных и зеркальных поверхностей (не включая окна)',
                        'Чистка дверей',
                        'Чистка труб и радиаторов снаружи',
                        'Чистка выключателей и розеток',
                        'Чистка плинтусов',
                        'Чистка стен от лёгких загрязнений',
                        'Чистка напольных и настенных светильников (для потолочных — стремянка клиента)',
                        'Очистка санитарных помещений (включая удаление налёта и камня)',
                        'Чистка кухонной мебели снаружи',
                        'Чистка крупной кухонной техники снаружи',
                        'Уборка шкафов внутри и снаружи (раскладывание личных вещей — по договорённости)',
                        'Сухая чистка мягкой мебели пылесосом',
                    ],
                ],
                'et' => [
                    'price_anchor' => 'al. 2.5 € / m²',
                    'pricing_table' => [
                        ['group' => 'Remondikoristus', 'items' => [
                            ['name' => 'Hind m² kohta', 'price' => 'al. 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Akende pesu (al. 10 € / aken)',
                        'Ehitusprahi äravedu (kokkuleppel)',
                        'Mööbli keemiline puhastus (al. 29 €)',
                    ],
                    'included' => [
                        'Kuiv- ja märgpuhastus põrandale (tolmuimeja kõikidele katetele)',
                        'Tolmu eemaldamine horisontaalsetelt pindadelt (kõrguse määrab klient; üle 3 m — kliendi redel)',
                        'Klaas- ja peegelpindade puhastus (v.a aknad)',
                        'Uste puhastus',
                        'Torude ja radiaatorite puhastus väljastpoolt',
                        'Lülitite ja pistikupesade puhastus',
                        'Põrandaliistude puhastus',
                        'Seinte puhastus kergetest reostustest',
                        'Põranda- ja seinaprasvalgustite puhastus (laevalgustid — kliendi redel)',
                        'Sanitaarruumide puhastus (sh katlakivi eemaldamine)',
                        'Köögimööbli puhastus väljastpoolt',
                        'Suure köögitehnika puhastus väljastpoolt',
                        'Kappide puhastus seest ja väljast (isiklike asjade sorteerimine — kokkuleppel)',
                        'Pehme mööbli tolmuimejaga puhastus',
                    ],
                ],
                'en' => [
                    'price_anchor' => 'from 2.5 € / m²',
                    'pricing_table' => [
                        ['group' => 'Post-Renovation Cleaning', 'items' => [
                            ['name' => 'Price per m²', 'price' => 'from 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Window cleaning (from 10 € / window)',
                        'Construction waste removal (by agreement)',
                        'Furniture dry cleaning (from 29 €)',
                    ],
                    'included' => [
                        'Dry and wet floor cleaning (vacuum for all surfaces)',
                        'Dust removal from horizontal surfaces (height determined by client; above 3 m — client\'s ladder)',
                        'Glass and mirror surface cleaning (not including windows)',
                        'Door cleaning',
                        'Pipe and radiator exterior cleaning',
                        'Switch and socket cleaning',
                        'Baseboard cleaning',
                        'Wall cleaning from light dirt',
                        'Floor and wall lamp cleaning (ceiling lamps — client\'s ladder)',
                        'Bathroom cleaning (including limescale and mineral deposit removal)',
                        'Kitchen furniture exterior cleaning',
                        'Large kitchen appliance exterior cleaning',
                        'Cabinet cleaning inside and outside (arranging personal items — by agreement)',
                        'Dry vacuum cleaning of upholstered furniture',
                    ],
                ],
            ],

            // ─── 4. MOVE-OUT CLEANING ────────────────────────
            'move-out-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 2.5 € / м²',
                    'pricing_table' => [
                        ['group' => 'Уборка перед сдачей', 'items' => [
                            ['name' => 'Стоимость за м²', 'price' => 'от 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Окна (от 10 € / окно)',
                        'Духовка/холодильник внутри (по 15 €)',
                        'Химчистка мебели (от 29 €)',
                    ],
                    'included' => [
                        'Сухая и влажная уборка пола (пылесос для всех покрытий)',
                        'Удаление пыли с горизонтальных поверхностей',
                        'Очистка стеклянных и зеркальных поверхностей (не включая окна)',
                        'Чистка дверей',
                        'Чистка труб и радиаторов снаружи',
                        'Чистка выключателей и розеток',
                        'Чистка плинтусов',
                        'Чистка стен от лёгких загрязнений',
                        'Чистка светильников',
                        'Очистка санитарных помещений (включая удаление налёта и камня)',
                        'Чистка кухонной мебели снаружи',
                        'Чистка крупной кухонной техники снаружи',
                        'Уборка шкафов внутри и снаружи',
                        'Сухая чистка мягкой мебели пылесосом',
                    ],
                ],
                'et' => [
                    'price_anchor' => 'al. 2.5 € / m²',
                    'pricing_table' => [
                        ['group' => 'Üleandmise koristus', 'items' => [
                            ['name' => 'Hind m² kohta', 'price' => 'al. 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Aknad (al. 10 € / aken)',
                        'Ahi/külmik seestpoolt (à 15 €)',
                        'Mööbli keemiline puhastus (al. 29 €)',
                    ],
                    'included' => [
                        'Kuiv- ja märgpuhastus põrandale (tolmuimeja kõikidele katetele)',
                        'Tolmu eemaldamine horisontaalsetelt pindadelt',
                        'Klaas- ja peegelpindade puhastus (v.a aknad)',
                        'Uste puhastus',
                        'Torude ja radiaatorite puhastus väljastpoolt',
                        'Lülitite ja pistikupesade puhastus',
                        'Põrandaliistude puhastus',
                        'Seinte puhastus kergetest reostustest',
                        'Valgustite puhastus',
                        'Sanitaarruumide puhastus (sh katlakivi eemaldamine)',
                        'Köögimööbli puhastus väljastpoolt',
                        'Suure köögitehnika puhastus väljastpoolt',
                        'Kappide puhastus seest ja väljast',
                        'Pehme mööbli tolmuimejaga puhastus',
                    ],
                ],
                'en' => [
                    'price_anchor' => 'from 2.5 € / m²',
                    'pricing_table' => [
                        ['group' => 'Move-Out Cleaning', 'items' => [
                            ['name' => 'Price per m²', 'price' => 'from 2.5 €'],
                        ]],
                    ],
                    'addons' => [
                        'Windows (from 10 € / window)',
                        'Oven/fridge interior (15 € each)',
                        'Furniture dry cleaning (from 29 €)',
                    ],
                    'included' => [
                        'Dry and wet floor cleaning (vacuum for all surfaces)',
                        'Dust removal from horizontal surfaces',
                        'Glass and mirror surface cleaning (not including windows)',
                        'Door cleaning',
                        'Pipe and radiator exterior cleaning',
                        'Switch and socket cleaning',
                        'Baseboard cleaning',
                        'Wall cleaning from light dirt',
                        'Lamp cleaning',
                        'Bathroom cleaning (including limescale and mineral deposit removal)',
                        'Kitchen furniture exterior cleaning',
                        'Large kitchen appliance exterior cleaning',
                        'Cabinet cleaning inside and outside',
                        'Dry vacuum cleaning of upholstered furniture',
                    ],
                ],
            ],

            // ─── 5. WINDOW CLEANING ────────────────────────
            'window-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 10 € / шт.',
                    'pricing_table' => [
                        ['group' => 'Мойка окон и витрин', 'items' => [
                            ['name' => 'Стандартное окно', 'price' => '10 € / шт.'],
                            ['name' => 'Большое витринное окно', 'price' => '15 € / шт.'],
                        ]],
                    ],
                    'addons' => [
                        'Витрины / большие стёкла (от 15 € / шт.)',
                        'Москитные сетки (от 3 € / шт.)',
                    ],
                    'included' => [
                        'Мойка стёкол с обеих сторон',
                        'Очистка рам и подоконников',
                        'Удаление загрязнений и разводов',
                        'Использование профессиональных средств',
                    ],
                ],
                'et' => [
                    'price_anchor' => 'al. 10 € / tk',
                    'pricing_table' => [
                        ['group' => 'Akende ja vitriinide pesu', 'items' => [
                            ['name' => 'Standardne aken', 'price' => '10 € / tk'],
                            ['name' => 'Suur vitriiniaken', 'price' => '15 € / tk'],
                        ]],
                    ],
                    'addons' => [
                        'Vitriinid / suured klaasid (al. 15 € / tk)',
                        'Putukavõrgud (al. 3 € / tk)',
                    ],
                    'included' => [
                        'Klaaside pesu mõlemalt poolt',
                        'Raamide ja aknalaudade puhastus',
                        'Mustuse ja plekkide eemaldamine',
                        'Professionaalsete vahendite kasutamine',
                    ],
                ],
                'en' => [
                    'price_anchor' => 'from 10 € / pc.',
                    'pricing_table' => [
                        ['group' => 'Window & Showcase Cleaning', 'items' => [
                            ['name' => 'Standard window', 'price' => '10 € / pc.'],
                            ['name' => 'Large showcase window', 'price' => '15 € / pc.'],
                        ]],
                    ],
                    'addons' => [
                        'Showcases / large glass (from 15 € / pc.)',
                        'Mosquito screens (from 3 € / pc.)',
                    ],
                    'included' => [
                        'Window glass cleaning on both sides',
                        'Frame and windowsill cleaning',
                        'Dirt and streak removal',
                        'Professional cleaning products used',
                    ],
                ],
            ],

            // ─── 6. UPHOLSTERY CLEANING ────────────────────────
            'upholstery-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 29 €',
                    'pricing_table' => [
                        ['group' => 'Химчистка мебели и ковров', 'items' => [
                            ['name' => 'Химчистка дивана', 'price' => '60 €'],
                            ['name' => 'Другие предметы', 'price' => 'от 29 €'],
                        ]],
                    ],
                    'addons' => [
                        'Доп. предметы мебели (по прайсу)',
                        'Дополнительная обработка от запахов',
                    ],
                    'included' => [
                        'Глубокая чистка обивки профессиональным оборудованием',
                        'Удаление пятен и загрязнений',
                        'Обработка специальными средствами',
                        'Чистка ковров и ковровых покрытий',
                    ],
                ],
                'et' => [
                    'price_anchor' => 'al. 29 €',
                    'pricing_table' => [
                        ['group' => 'Mööbli ja vaipade keemiline puhastus', 'items' => [
                            ['name' => 'Diivani keemiline puhastus', 'price' => '60 €'],
                            ['name' => 'Muud esemed', 'price' => 'al. 29 €'],
                        ]],
                    ],
                    'addons' => [
                        'Lisa mööbliesemed (hinnakirja alusel)',
                        'Täiendav lõhnatöötlus',
                    ],
                    'included' => [
                        'Polstri süvapuhastus professionaalse seadmega',
                        'Plekkide ja mustuse eemaldamine',
                        'Eritöötlus spetsiaalsete vahenditega',
                        'Vaipade ja vaipkatete puhastus',
                    ],
                ],
                'en' => [
                    'price_anchor' => 'from 29 €',
                    'pricing_table' => [
                        ['group' => 'Furniture & Carpet Dry Cleaning', 'items' => [
                            ['name' => 'Sofa dry cleaning', 'price' => '60 €'],
                            ['name' => 'Other items', 'price' => 'from 29 €'],
                        ]],
                    ],
                    'addons' => [
                        'Additional furniture items (per price list)',
                        'Additional odor treatment',
                    ],
                    'included' => [
                        'Deep upholstery cleaning with professional equipment',
                        'Stain and dirt removal',
                        'Treatment with special products',
                        'Carpet and carpet cover cleaning',
                    ],
                ],
            ],

            // ─── 7. COMMERCIAL CLEANING ────────────────────────
            'commercial-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 0.07 € / м²',
                    'pricing_table' => [
                        ['group' => 'Уборка коммерческих помещений', 'items' => [
                            ['name' => 'Стоимость за м²', 'price' => 'от 0.07 €'],
                        ]],
                    ],
                    'addons' => [
                        'Окна (от 10 € / окно)',
                        'Генеральная уборка (от 2 € / м²)',
                        'Химчистка мебели (от 29 €)',
                    ],
                    'included' => [
                        'Удаление пыли с оргтехники',
                        'Удаление пыли с открытых поверхностей, столов, мебели и подоконников',
                        'Протирка стульев',
                        'Мытьё полов и плинтусов',
                        'Чистка дверей',
                        'Чистка радиаторов снаружи',
                        'Чистка настенных и напольных осветительных элементов',
                        'Уборка кухни: мытьё мебели снаружи, чистка раковины и смесителя, протирка столешниц, чистка техники снаружи',
                        'Дезинфекция санузла',
                        'Замена туалетной бумаги',
                        'Пополнение салфеток',
                        'Вынос мусора (в контейнер заказчика)',
                        'При необходимости: загрузка грязной посуды в посудомоечную машину, раскладка чистой посуды',
                    ],
                ],
                'et' => [
                    'price_anchor' => 'al. 0.07 € / m²',
                    'pricing_table' => [
                        ['group' => 'Äriruumide koristus', 'items' => [
                            ['name' => 'Hind m² kohta', 'price' => 'al. 0.07 €'],
                        ]],
                    ],
                    'addons' => [
                        'Aknad (al. 10 € / aken)',
                        'Suurpuhastus (al. 2 € / m²)',
                        'Mööbli keemiline puhastus (al. 29 €)',
                    ],
                    'included' => [
                        'Kontoritehnikalt tolmu eemaldamine',
                        'Tolmu eemaldamine avatud pindadelt, laudadelt, mööblilt ja aknalaudadelt',
                        'Toolide pühkimine',
                        'Põrandate ja põrandaliistude pesu',
                        'Uste puhastus',
                        'Radiaatorite puhastus väljastpoolt',
                        'Seina- ja põrandavalgustite puhastus',
                        'Köögi koristus: mööbli pesu väljastpoolt, valamu ja segisti puhastus, tööpindade pühkimine, tehnika puhastus väljastpoolt',
                        'Tualettruumi desinfitseerimine',
                        'Tualettpaberite vahetus',
                        'Salvrättide täiendamine',
                        'Prügi väljavedu (tellija konteinerisse)',
                        'Vajadusel: nõudepesumasina laadimine, puhta nõude laiali panemine',
                    ],
                ],
                'en' => [
                    'price_anchor' => 'from 0.07 € / m²',
                    'pricing_table' => [
                        ['group' => 'Commercial Cleaning', 'items' => [
                            ['name' => 'Price per m²', 'price' => 'from 0.07 €'],
                        ]],
                    ],
                    'addons' => [
                        'Windows (from 10 € / window)',
                        'Deep cleaning (from 2 € / m²)',
                        'Furniture dry cleaning (from 29 €)',
                    ],
                    'included' => [
                        'Dust removal from office equipment',
                        'Dust removal from open surfaces, desks, furniture and windowsills',
                        'Chair wiping',
                        'Floor and baseboard washing',
                        'Door cleaning',
                        'Radiator exterior cleaning',
                        'Wall and floor light fixture cleaning',
                        'Kitchen cleaning: furniture exterior, sink and faucet, countertops, appliance exterior',
                        'Bathroom disinfection',
                        'Toilet paper replacement',
                        'Napkin restocking',
                        'Waste disposal (to client\'s container)',
                        'If needed: loading dishwasher, arranging clean dishes',
                    ],
                ],
            ],

            // ─── 8. REGULAR CONTRACT CLEANING ────────────────────────
            'regular-contract-cleaning' => [
                'ru' => [
                    'price_anchor' => 'от 45 €',
                    'pricing_table' => [
                        ['group' => 'Квартиры', 'items' => [
                            ['name' => 'Студия + санузел', 'price' => '45 €'],
                            ['name' => '1-комнатная квартира', 'price' => '50 €'],
                            ['name' => '2-комнатная квартира', 'price' => '60 €'],
                            ['name' => '3-комнатная квартира', 'price' => '70 €'],
                            ['name' => '4-комнатная квартира', 'price' => '80 €'],
                            ['name' => '5-комнатная квартира', 'price' => '100 €'],
                        ]],
                        ['group' => 'Дома', 'items' => [
                            ['name' => 'До 80 м²', 'price' => '85 €'],
                            ['name' => 'До 140 м²', 'price' => '105 €'],
                            ['name' => 'До 220 м²', 'price' => '150 €'],
                        ]],
                    ],
                    'addons' => [
                        'Окна (от 10 € / окно)',
                        'Генеральная уборка (от 2 € / м²)',
                        'Химчистка мебели (от 29 €)',
                        'Дополнительный санузел — +20 €',
                        'Вынос мусора в контейнер клиента — 10 €',
                        'Лоток питомца — 10 €',
                    ],
                    'included' => [
                        'Сухая и влажная уборка пола (пылесос для всех покрытий)',
                        'Удаление пыли со всех поверхностей (до 180 см)',
                        'Стеклянные и зеркальные поверхности (не окна, до 180 см)',
                        'Чистка дверей',
                        'Радиаторы и трубы снаружи',
                        'Выключатели и розетки',
                        'Плинтусы',
                        'Светильники напольные и настенные (до 180 см)',
                        'Санузел (без удаления налёта и камня)',
                        'Кухонная мебель снаружи',
                        'Крупная кухонная техника снаружи',
                        'Сухая чистка мягкой мебели пылесосом',
                    ],
                    'description' => 'Регулярная уборка — минимум раз в 2 недели. При более редкой периодичности цены соответствуют поддерживающей уборке.',
                ],
                'et' => [
                    'price_anchor' => 'al. 45 €',
                    'pricing_table' => [
                        ['group' => 'Korterid', 'items' => [
                            ['name' => 'Stuudio + vannituba', 'price' => '45 €'],
                            ['name' => '1-toaline korter', 'price' => '50 €'],
                            ['name' => '2-toaline korter', 'price' => '60 €'],
                            ['name' => '3-toaline korter', 'price' => '70 €'],
                            ['name' => '4-toaline korter', 'price' => '80 €'],
                            ['name' => '5-toaline korter', 'price' => '100 €'],
                        ]],
                        ['group' => 'Majad', 'items' => [
                            ['name' => 'Kuni 80 m²', 'price' => '85 €'],
                            ['name' => 'Kuni 140 m²', 'price' => '105 €'],
                            ['name' => 'Kuni 220 m²', 'price' => '150 €'],
                        ]],
                    ],
                    'addons' => [
                        'Aknad (al. 10 € / aken)',
                        'Suurpuhastus (al. 2 € / m²)',
                        'Mööbli keemiline puhastus (al. 29 €)',
                        'Lisavannituba — +20 €',
                        'Prügi väljavedu kliendi konteinerisse — 10 €',
                        'Lemmiklooma liivakast — 10 €',
                    ],
                    'included' => [
                        'Kuiv- ja märgpuhastus põrandale (tolmuimeja kõikidele katetele)',
                        'Tolmu eemaldamine kõikidelt pindadelt (kuni 180 cm)',
                        'Klaas- ja peegelpinnad (mitte aknad, kuni 180 cm)',
                        'Uste puhastus',
                        'Radiaatorid ja torud väljastpoolt',
                        'Lülitid ja pistikupesad',
                        'Põrandaliistud',
                        'Põranda- ja seinaprasvalgustid (kuni 180 cm)',
                        'Vannituba (ilma katlakivi eemaldamiseta)',
                        'Köögimööbel väljastpoolt',
                        'Suur köögitehnika väljastpoolt',
                        'Pehme mööbli tolmuimejaga puhastus',
                    ],
                    'description' => 'Regulaarne koristus — minimaalselt kord 2 nädala jooksul. Harvema sageduse korral kehtivad hoolduskoristuse hinnad.',
                ],
                'en' => [
                    'price_anchor' => 'from 45 €',
                    'pricing_table' => [
                        ['group' => 'Apartments', 'items' => [
                            ['name' => 'Studio + bathroom', 'price' => '45 €'],
                            ['name' => '1-bedroom apartment', 'price' => '50 €'],
                            ['name' => '2-bedroom apartment', 'price' => '60 €'],
                            ['name' => '3-bedroom apartment', 'price' => '70 €'],
                            ['name' => '4-bedroom apartment', 'price' => '80 €'],
                            ['name' => '5-bedroom apartment', 'price' => '100 €'],
                        ]],
                        ['group' => 'Houses', 'items' => [
                            ['name' => 'Up to 80 m²', 'price' => '85 €'],
                            ['name' => 'Up to 140 m²', 'price' => '105 €'],
                            ['name' => 'Up to 220 m²', 'price' => '150 €'],
                        ]],
                    ],
                    'addons' => [
                        'Windows (from 10 € / window)',
                        'Deep cleaning (from 2 € / m²)',
                        'Furniture dry cleaning (from 29 €)',
                        'Additional bathroom — +20 €',
                        'Waste disposal to client container — 10 €',
                        'Pet litter tray — 10 €',
                    ],
                    'included' => [
                        'Dry and wet floor cleaning (vacuum for all surfaces)',
                        'Dust removal from all surfaces (up to 180 cm)',
                        'Glass and mirror surfaces (not windows, up to 180 cm)',
                        'Door cleaning',
                        'Radiators and pipes exterior',
                        'Switches and sockets',
                        'Baseboards',
                        'Floor and wall lamps (up to 180 cm)',
                        'Bathroom (without limescale removal)',
                        'Kitchen furniture exterior',
                        'Large kitchen appliances exterior',
                        'Dry vacuum cleaning of upholstered furniture',
                    ],
                    'description' => 'Regular cleaning — at least once every 2 weeks. For less frequent cleaning, maintenance cleaning prices apply.',
                ],
            ],
        ];
    }
}
