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
        $services = $this->getServicesData();

        // Delete old services and translations
        ServiceTranslation::query()->delete();
        Service::query()->delete();

        foreach ($services as $svcData) {
            $service = Service::create([
                'slug' => $svcData['slug'],
                'icon' => $svcData['icon'],
                'sort_order' => $svcData['sort_order'],
                'is_active' => true,
                'show_on_home' => $svcData['show_on_home'],
            ]);

            foreach ($svcData['translations'] as $locale => $trans) {
                ServiceTranslation::create(array_merge(
                    ['service_id' => $service->id, 'locale' => $locale],
                    $trans
                ));
            }
        }

        $this->command->info('  ✓ Services seeded: ' . count($services));
    }

    private function seedPackages(): void
    {
        $packages = $this->getPackagesData();

        // Delete old packages and translations
        PackageTranslation::query()->delete();
        Package::query()->delete();

        foreach ($packages as $pkgData) {
            $package = Package::create([
                'slug' => $pkgData['slug'],
                'icon' => $pkgData['icon'],
                'image' => $pkgData['image'],
                'sort_order' => $pkgData['sort_order'],
                'column_span' => $pkgData['column_span'],
                'is_active' => true,
            ]);

            foreach ($pkgData['translations'] as $locale => $trans) {
                PackageTranslation::create(array_merge(
                    ['package_id' => $package->id, 'locale' => $locale],
                    $trans
                ));
            }
        }

        $this->command->info('  ✓ Packages seeded: ' . count($packages));
    }

    private function seedSiteSettings(): void
    {
        $settings = [
            ['key' => 'phone', 'group' => 'contact', 'type' => 'tel', 'label' => 'Phone Number', 'value' => ['ru' => '+372 5830 1348', 'en' => '+372 5830 1348', 'et' => '+372 5830 1348']],
            ['key' => 'email', 'group' => 'contact', 'type' => 'email', 'label' => 'Email', 'value' => ['ru' => 'info@coralclean.ee', 'en' => 'info@coralclean.ee', 'et' => 'info@coralclean.ee']],
            ['key' => 'whatsapp', 'group' => 'contact', 'type' => 'tel', 'label' => 'WhatsApp Number', 'value' => ['ru' => '37258301348', 'en' => '37258301348', 'et' => '37258301348']],
            ['key' => 'address', 'group' => 'contact', 'type' => 'text', 'label' => 'Address', 'value' => ['ru' => 'Таллин, Эстония', 'en' => 'Tallinn, Estonia', 'et' => 'Tallinn, Eesti']],
            ['key' => 'working_hours', 'group' => 'contact', 'type' => 'text', 'label' => 'Working Hours', 'value' => ['ru' => '08:00–20:00, ежедневно', 'en' => '08:00–20:00, daily', 'et' => '08:00–20:00, iga päev']],
            ['key' => 'company_name', 'group' => 'company', 'type' => 'text', 'label' => 'Company Name', 'value' => ['ru' => 'CoralClean', 'en' => 'CoralClean', 'et' => 'CoralClean']],
            ['key' => 'legal_name', 'group' => 'company', 'type' => 'text', 'label' => 'Legal Name', 'value' => ['ru' => 'PUHASTUS KORAL OÜ', 'en' => 'PUHASTUS KORAL OÜ', 'et' => 'PUHASTUS KORAL OÜ']],
            ['key' => 'reg_number', 'group' => 'company', 'type' => 'text', 'label' => 'Registration Number', 'value' => ['ru' => '16989116', 'en' => '16989116', 'et' => '16989116']],
            ['key' => 'stat_cleanings', 'group' => 'general', 'type' => 'text', 'label' => 'Stat: Cleanings Count', 'value' => ['ru' => '2500', 'en' => '2500', 'et' => '2500']],
            ['key' => 'stat_clients', 'group' => 'general', 'type' => 'text', 'label' => 'Stat: Happy Clients', 'value' => ['ru' => '450', 'en' => '450', 'et' => '450']],
            ['key' => 'stat_projects', 'group' => 'general', 'type' => 'text', 'label' => 'Stat: Completed Projects', 'value' => ['ru' => '500', 'en' => '500', 'et' => '500']],
            ['key' => 'stat_years', 'group' => 'general', 'type' => 'text', 'label' => 'Stat: Years of Experience', 'value' => ['ru' => '15', 'en' => '15', 'et' => '15']],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        $this->command->info('  ✓ Site settings seeded: ' . count($settings));
    }

    private function seedTranslations(): void
    {
        $count = 0;

        foreach (['ru', 'en', 'et'] as $locale) {
            $langData = $this->getLangData($locale);
            if (empty($langData)) continue;

            // Skip old service/package keys that are now in DB
            $skipPrefixes = [
                'service_home_', 'service_glass_', 'service_garden_',
                'service_office_', 'service_carpet_', 'service_renovation_',
                'package_quick_', 'package_deep_', 'package_movein_',
                'package_office_', 'package_urgent_',
            ];

            foreach ($langData as $key => $value) {
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

    private function getLangData(string $locale): array
    {
        $path = lang_path("{$locale}/home.php");
        if (!file_exists($path)) return [];
        return require $path;
    }

    // =========================================================================
    // DATA: 8 Services (6 show_on_home + 2 services-only)
    // =========================================================================
    private function getServicesData(): array
    {
        return [
            // ── 1. MAINTENANCE CLEANING ──────────────────────────────────
            [
                'slug' => 'maintenance-cleaning',
                'icon' => 'flaticon-house',
                'sort_order' => 1,
                'show_on_home' => true,
                'translations' => [
                    'ru' => [
                        'title' => 'Поддерживающая уборка',
                        'subtitle' => 'Регулярный уход за квартирой или домом без лишних забот.',
                        'short_desc' => 'Регулярная и генеральная уборка жилых помещений с гарантией качества и по чек-листу.',
                        'bullets' => ['Чек-лист и контроль качества', 'Безопасно для детей и животных'],
                        'price_anchor' => 'От 45 €',
                        'cta_text' => 'Заказать уборку',
                        'description' => 'Поддерживающая, генеральная и разовая уборка. Чисто, аккуратно и в удобное для вас время.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Уборка дома — это задача, которая отнимает много времени и сил, особенно в современном ритме жизни. CoralClean предлагает услугу регулярной и генеральной уборки квартир и домов в Таллине и Харьюмаа. Мы работаем аккуратно, спокойно и по понятному чек-листу.',
                        'text2' => 'Наши клинеры приезжают со всем необходимым оборудованием и профессиональными средствами. Вы просто принимаете результат и наслаждаетесь чистотой.',
                        'included' => ['Полы (пылесос + мытьё)', 'Пыль с доступных поверхностей', 'Кухня: столешницы, плита, мойка', 'Санузел: унитаз, раковина, душ/ванна', 'Зеркала и стеклянные поверхности', 'Вынос мусора, проветривание'],
                        'not_included' => ['Мытьё окон', 'Техника внутри (духовка, холодильник)', 'Стены и потолки', 'Шкафы внутри', 'Химчистка мебели и ковров', 'Сильные загрязнения'],
                        'addons' => ['Окна (от 10 € / окно)', 'Духовка внутри (15 €)', 'Холодильник внутри (15 €)', 'Балкон / терраса (от 10 €)', 'Шкафы внутри (от 5 € / шкаф)'],
                        'process' => 'Вы оставляете заявку → мы уточняем объём и согласовываем время → клинеры приезжают с оборудованием → работа по чек-листу → вы принимаете результат.',
                        'guarantee' => 'Если есть замечания — исправим оперативно и бесплатно.',
                        'faq' => [
                            ['q' => 'Что входит в поддерживающую уборку?', 'a' => 'Уборка полов, пыль с доступных поверхностей, кухня и санузел по чек-листу, зеркала, вынос мусора.'],
                            ['q' => 'Сколько длится уборка?', 'a' => 'Обычно 1–3 часа, зависит от площади и состояния.'],
                            ['q' => 'Сколько клинеров приезжает?', 'a' => 'Обычно 1–2 клинера.'],
                            ['q' => 'Нужно ли предоставлять средства и инвентарь?', 'a' => 'Нет, мы привозим всё необходимое.'],
                            ['q' => 'Что не входит в поддерживающую уборку?', 'a' => 'Окна, техника внутри, сильные загрязнения, стены/потолки, шкафы внутри, химчистка — это доп. услуги.'],
                            ['q' => 'Можно ли добавить дополнительные услуги?', 'a' => 'Да: окна, духовка/холодильник внутри, балкон, шкафы внутри и др. — по прайсу.'],
                            ['q' => 'Есть ли доплата за первую уборку?', 'a' => 'Да, +20 € к первой уборке (возвращается при следующем заказе в течение 1 месяца).'],
                            ['q' => 'Вы даёте гарантию качества?', 'a' => 'Да. Если есть замечания — исправим оперативно.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Hoolduskoristus',
                        'subtitle' => 'Regulaarne koristus korterile või majale — ilma liigse vaevata.',
                        'short_desc' => 'Regulaarne ja põhjalik koristus korteritele ja majadele — kontrollnimekirja ja kvaliteedigarantii alusel.',
                        'bullets' => ['Kontrollnimekiri ja kvaliteedikontroll', 'Lastele ja lemmikloomadele ohutu'],
                        'price_anchor' => 'Alates 45 €',
                        'cta_text' => 'Telli koristus',
                        'description' => 'Hooldus-, suurpuhastus või ühekordne koristus — puhtalt, korrektselt ja teile sobival ajal.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Kodu koristamine on ülesanne, mis nõuab palju aega ja energiat. CoralClean pakub regulaarset ja põhjalikku koristusteenust korteritele ja majadele Tallinnas ja Harjumaal.',
                        'text2' => 'Meie koristajad tulevad kohale kogu vajaliku varustuse ja professionaalsete vahenditega. Teie lihtsalt naudite tulemust.',
                        'included' => ['Põrandad (tolmuimeja + pesu)', 'Tolm ligipääsetavatelt pindadelt', 'Köök: tööpinnad, pliit, valamu', 'Vannituba: WC, valamu, dušš/vann', 'Peeglid ja klaaspinnad', 'Prügi väljaviimine, tuulutamine'],
                        'not_included' => ['Aknad', 'Tehnika seest (ahi, külmik)', 'Seinad ja laed', 'Kapid seest', 'Pehme mööbli ja vaipade keemiline puhastus', 'Tugev mustus'],
                        'addons' => ['Aknad (al. 10 € / aken)', 'Ahi seest (15 €)', 'Külmik seest (15 €)', 'Rõdu / terrass (al. 10 €)', 'Kapid seest (al. 5 € / kapp)'],
                        'process' => 'Jätate taotluse → täpsustame mahu ja aja → koristajad tulevad varustusega → töö kontrollnimekirja alusel → teie võtate tulemuse vastu.',
                        'guarantee' => 'Kui on märkusi — parandame kiiresti ja tasuta.',
                        'faq' => [
                            ['q' => 'Mis kuulub hoolduskoristuse sisse?', 'a' => 'Põrandad, tolm ligipääsetavatelt pindadelt, köök ja vannituba kontrollnimekirja alusel, peeglid, prügi väljaviimine.'],
                            ['q' => 'Kui kaua koristus kestab?', 'a' => 'Tavaliselt 1–3 tundi, sõltuvalt pinnast ja seisukorrast.'],
                            ['q' => 'Mitu koristajat tuleb?', 'a' => 'Tavaliselt 1–2 koristajat.'],
                            ['q' => 'Kas pean ise vahendid andma?', 'a' => 'Ei, toome kõik vajaliku kaasa.'],
                            ['q' => 'Mis ei kuulu hoolduskoristuse sisse?', 'a' => 'Aknad, tehnika seest, tugev mustus, seinad/laed, kapid seest, keemiline puhastus — lisateenused.'],
                            ['q' => 'Kas saan lisateenuseid juurde võtta?', 'a' => 'Jah: aknad, ahju/külmiku pesu seest, rõdu, kapid seest jne.'],
                            ['q' => 'Kas esimesele koristusele lisandub tasu?', 'a' => 'Jah, +20 € esimesele koristusele (tagastub, kui tellite uuesti 1 kuu jooksul).'],
                            ['q' => 'Kas annate kvaliteedigarantii?', 'a' => 'Jah. Kui on märkusi — parandame kiiresti.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Maintenance Cleaning',
                        'subtitle' => 'Regular home cleaning that keeps your space neat and fresh.',
                        'short_desc' => 'Regular and deep cleaning for apartments and houses with a clear checklist and quality guarantee.',
                        'bullets' => ['Checklist & quality control', 'Safe for kids and pets'],
                        'price_anchor' => 'From €45',
                        'cta_text' => 'Book cleaning',
                        'description' => 'Routine, deep, or one-time cleaning — neat, reliable, and at a convenient time.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Home cleaning is a task that takes a lot of time and energy. CoralClean offers regular and deep cleaning services for apartments and houses in Tallinn and Harjumaa. We work carefully, calmly and with a clear checklist.',
                        'text2' => 'Our cleaners arrive with all necessary equipment and professional products. You simply enjoy the result.',
                        'included' => ['Floors (vacuum + mopping)', 'Dusting reachable surfaces', 'Kitchen: countertops, stove, sink', 'Bathroom: toilet, sink, shower/bath', 'Mirrors and glass surfaces', 'Trash removal, ventilation'],
                        'not_included' => ['Windows', 'Inside appliances (oven, fridge)', 'Walls and ceilings', 'Inside cabinets', 'Upholstery/carpet cleaning', 'Heavy stains'],
                        'addons' => ['Windows (from €10 / window)', 'Inside oven (€15)', 'Inside fridge (€15)', 'Balcony / terrace (from €10)', 'Inside cabinets (from €5 / cabinet)'],
                        'process' => 'Submit a request → we confirm scope and time → cleaners arrive with equipment → work by checklist → you accept the result.',
                        'guarantee' => 'If something isn\'t right — we fix it promptly and free of charge.',
                        'faq' => [
                            ['q' => 'What\'s included in maintenance cleaning?', 'a' => 'Floors, dusting reachable surfaces, kitchen and bathroom checklist, mirrors/glass, trash removal.'],
                            ['q' => 'How long does it take?', 'a' => 'Usually 1–3 hours depending on size and condition.'],
                            ['q' => 'How many cleaners come?', 'a' => 'Typically 1–2 cleaners.'],
                            ['q' => 'Do I need to provide supplies?', 'a' => 'No — we bring professional supplies and tools.'],
                            ['q' => 'What\'s NOT included?', 'a' => 'Windows, inside appliances, heavy stains, walls/ceilings, inside cabinets, upholstery cleaning — available as add-ons.'],
                            ['q' => 'Can I add extra services?', 'a' => 'Yes: windows, oven/fridge inside, balcony, inside cabinets, etc.'],
                            ['q' => 'Is there a first-visit fee?', 'a' => 'Yes, +€20 for the first visit (refunded if you book again within 1 month).'],
                            ['q' => 'Do you offer a quality guarantee?', 'a' => 'Yes — if something isn\'t right, we fix it promptly.'],
                        ],
                    ],
                ],
            ],

            // ── 2. DEEP CLEANING ─────────────────────────────────────────
            [
                'slug' => 'deep-cleaning',
                'icon' => 'flaticon-vacuum',
                'sort_order' => 2,
                'show_on_home' => true,
                'translations' => [
                    'ru' => [
                        'title' => 'Генеральная уборка',
                        'subtitle' => 'Глубокая чистка всех помещений и труднодоступных мест.',
                        'short_desc' => 'Глубокая комплексная уборка всех помещений для идеальной чистоты и свежести.',
                        'bullets' => ['Кухня и санузлы — максимум внимания', 'Дезинфекция контактных зон'],
                        'price_anchor' => 'От 2 € / м²',
                        'cta_text' => 'Рассчитать стоимость',
                        'description' => 'Тщательная очистка кухни, санузлов, полов и труднодоступных мест. Для квартир, домов и офисов.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Генеральная уборка — это не просто "помыть полы". Это комплексная глубокая очистка каждого помещения: кухня, санузлы, плинтусы, труднодоступные углы, техника. CoralClean выполняет генеральную уборку квартир, домов и офисов в Таллине.',
                        'text2' => 'Работаем по детальному чек-листу из 50+ пунктов. Используем профессиональное оборудование и безопасные средства. После генеральной уборки ваш дом выглядит и ощущается как новый.',
                        'included' => ['Все поверхности и полы', 'Кухня: плита, мойка, столешницы, фасады', 'Санузлы: плитка, швы, сантехника', 'Плинтусы и дверные рамы', 'Дезинфекция контактных поверхностей', 'Пыль со всех доступных поверхностей'],
                        'not_included' => ['Окна (отдельная услуга)', 'Техника внутри (духовка, холодильник — add-on)', 'Химчистка мебели и ковров', 'Потолки / стены (только пятна)'],
                        'addons' => ['Окна (от 10 € / окно)', 'Духовка внутри (15 €)', 'Холодильник внутри (15 €)', 'Шкафы внутри (от 5 € / шкаф)', 'Химчистка мебели (от 29 €)'],
                        'process' => 'Заявка → осмотр/согласование объёма → команда 2–5 клинеров → работа 5–8 часов → приёмка результата.',
                        'guarantee' => 'Гарантия качества. Замечания — исправляем оперативно.',
                        'faq' => [
                            ['q' => 'Чем генеральная уборка отличается от поддерживающей?', 'a' => 'Больше объём работ: труднодоступные зоны, плинтусы, больше деталей и глубины очистки.'],
                            ['q' => 'Сколько стоит генеральная уборка?', 'a' => 'От 2 € / м², итог зависит от объекта и загрязнений.'],
                            ['q' => 'Сколько длится?', 'a' => 'Обычно 5–8 часов.'],
                            ['q' => 'Сколько человек приезжает?', 'a' => 'Обычно 2–5 клинеров.'],
                            ['q' => 'Входит ли мытьё окон?', 'a' => 'Нет, окна — отдельная услуга.'],
                            ['q' => 'Входит ли техника внутри (духовка/холодильник)?', 'a' => 'Нет, можно добавить отдельно.'],
                            ['q' => 'Делаете ли дезинфекцию?', 'a' => 'Да, дезинфекция контактных поверхностей входит.'],
                            ['q' => 'Есть ли гарантия?', 'a' => 'Да, замечания исправляем.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Süvapuhastus',
                        'subtitle' => 'Põhjalik koristus kogu pinnal ja raskesti ligipääsetavates kohtades.',
                        'short_desc' => 'Põhjalik koristus kogu pinnal — et ruum oleks tõeliselt puhas ja värske.',
                        'bullets' => ['Köök ja vannitoad — eriline tähelepanu', 'Kontaktpindade desinfitseerimine'],
                        'price_anchor' => 'Alates 2 € / m²',
                        'cta_text' => 'Küsi hinnapakkumist',
                        'description' => 'Köök, vannitoad, põrandad ja raskesti ligipääsetavad kohad — kodudele ja kontoritele.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Süvapuhastus ei ole lihtsalt põrandate pesu. See on kompleksne süvapuhastus igas ruumis. CoralClean teostab süvapuhastust korteritele, majadele ja kontoritele Tallinnas.',
                        'text2' => 'Töötame üksikasjaliku kontrollnimekirja alusel 50+ punktiga. Kasutame professionaalset varustust ja ohutuid vahendeid.',
                        'included' => ['Kõik pinnad ja põrandad', 'Köök: pliit, valamu, tööpinnad, fassaadid', 'Vannituba: plaadid, vuugid, sanitaartehnika', 'Põrandaliistud ja uksepiirad', 'Kontaktpindade desinfitseerimine', 'Tolm kõigilt ligipääsetavatelt pindadelt'],
                        'not_included' => ['Aknad (eraldi teenus)', 'Tehnika seest (ahi, külmik — lisateenus)', 'Pehme mööbli ja vaipade puhastus', 'Laed / seinad (ainult plekid)'],
                        'addons' => ['Aknad (al. 10 € / aken)', 'Ahi seest (15 €)', 'Külmik seest (15 €)', 'Kapid seest (al. 5 € / kapp)', 'Pehme mööbli puhastus (al. 29 €)'],
                        'process' => 'Taotlus → ülevaatus/mahu kooskõlastamine → meeskond 2–5 koristajat → töö 5–8 tundi → tulemuse vastuvõtt.',
                        'guarantee' => 'Kvaliteedigarantii. Märkused — parandame kiiresti.',
                        'faq' => [
                            ['q' => 'Mille poolest erineb süvapuhastus hoolduskoristusest?', 'a' => 'Suurem töömaht: raskesti ligipääsetavad kohad, põrandaliistud, rohkem detaile.'],
                            ['q' => 'Kui palju süvapuhastus maksab?', 'a' => 'Alates 2 € / m², sõltub objektist ja mustuse tasemest.'],
                            ['q' => 'Kui kaua see aega võtab?', 'a' => 'Tavaliselt 5–8 tundi.'],
                            ['q' => 'Mitu inimest tuleb?', 'a' => 'Tavaliselt 2–5 koristajat.'],
                            ['q' => 'Kas akende pesu kuulub sisse?', 'a' => 'Ei, aknad on eraldi teenus.'],
                            ['q' => 'Kas tehnika seest (ahi/külmik) kuulub sisse?', 'a' => 'Ei, saab lisada eraldi.'],
                            ['q' => 'Kas teete desinfitseerimist?', 'a' => 'Jah, kontaktpindade desinfitseerimine kuulub sisse.'],
                            ['q' => 'Kas annate garantii?', 'a' => 'Jah, märkused parandame.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Deep Cleaning',
                        'subtitle' => 'A thorough top-to-bottom clean, including hard-to-reach areas.',
                        'short_desc' => 'A thorough, top-to-bottom clean for a truly fresh and spotless space.',
                        'bullets' => ['Extra focus on kitchen & bathrooms', 'Disinfection of high-touch surfaces'],
                        'price_anchor' => 'From €2 / m²',
                        'cta_text' => 'Get a quote',
                        'description' => 'Kitchens, bathrooms, floors, and hard-to-reach areas — for homes and offices.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Deep cleaning is not just mopping floors. It\'s a comprehensive deep clean of every room. CoralClean provides deep cleaning for apartments, houses and offices in Tallinn.',
                        'text2' => 'We follow a detailed 50+ point checklist. Professional equipment and safe products ensure your home looks and feels brand new.',
                        'included' => ['All surfaces and floors', 'Kitchen: stove, sink, countertops, fronts', 'Bathrooms: tiles, grout, fixtures', 'Baseboards and door frames', 'High-touch surface disinfection', 'Dusting all reachable surfaces'],
                        'not_included' => ['Windows (separate service)', 'Inside appliances (oven, fridge — add-on)', 'Upholstery/carpet cleaning', 'Ceilings / walls (spot cleaning only)'],
                        'addons' => ['Windows (from €10 / window)', 'Inside oven (€15)', 'Inside fridge (€15)', 'Inside cabinets (from €5 / cabinet)', 'Upholstery cleaning (from €29)'],
                        'process' => 'Request → inspection/scope agreement → team of 2–5 cleaners → 5–8 hours of work → result acceptance.',
                        'guarantee' => 'Quality guarantee. Concerns — we address promptly.',
                        'faq' => [
                            ['q' => 'How is deep cleaning different from maintenance?', 'a' => 'Larger scope: hard-to-reach areas, baseboards, more detail and depth.'],
                            ['q' => 'How much does deep cleaning cost?', 'a' => 'From €2/m², depending on property and condition.'],
                            ['q' => 'How long does it take?', 'a' => 'Usually 5–8 hours.'],
                            ['q' => 'How many people come?', 'a' => 'Usually 2–5 cleaners.'],
                            ['q' => 'Are windows included?', 'a' => 'No, windows are a separate service.'],
                            ['q' => 'Are inside appliances included?', 'a' => 'No, can be added separately.'],
                            ['q' => 'Do you do disinfection?', 'a' => 'Yes, high-touch surface disinfection is included.'],
                            ['q' => 'Is there a guarantee?', 'a' => 'Yes, we address any concerns promptly.'],
                        ],
                    ],
                ],
            ],

            // ── 3. POST-RENOVATION CLEANING ──────────────────────────────
            [
                'slug' => 'post-renovation-cleaning',
                'icon' => 'flaticon-brush',
                'sort_order' => 3,
                'show_on_home' => true,
                'translations' => [
                    'ru' => [
                        'title' => 'Уборка после ремонта',
                        'subtitle' => 'Удаление строительной пыли и следов работ, подготовка к заселению.',
                        'short_desc' => 'Полная уборка помещений после строительных и ремонтных работ.',
                        'bullets' => ['Проф. оборудование (в т.ч. Kärcher)', 'Бережно к поверхностям'],
                        'price_anchor' => 'От 3 € / м²',
                        'cta_text' => 'Рассчитать стоимость',
                        'description' => 'Удаляем строительную пыль, следы краски и материалов. Подготавливаем помещение к заселению.',
                        'image_path' => 'coralclean/services/POST-RENOVATION CLEANING.png',
                        'text1' => 'После ремонта помещение всегда нуждается в тщательной уборке. Строительная пыль оседает на всех поверхностях, а остатки материалов требуют профессионального удаления. CoralClean выполняет полный цикл уборки после ремонта.',
                        'text2' => 'Мы удаляем строительную пыль, очищаем окна и подоконники, моем полы и плитку, протираем все поверхности. Результат — помещение, полностью готовое к заселению.',
                        'included' => ['Удаление строительной пыли со всех поверхностей', 'Мытьё полов и плитки', 'Очистка подоконников и дверных рам', 'Протирка всех поверхностей', 'Удаление лёгких следов краски и клея', 'Уборка санузлов и кухни'],
                        'not_included' => ['Окна (отдельная услуга)', 'Удаление сложных следов (цемент, монтажная пена — по согласованию)', 'Вынос крупного мусора', 'Химчистка мебели'],
                        'addons' => ['Мойка окон (от 10 € / окно)', 'Вынос строительного мусора (по согласованию)', 'Химчистка мебели (от 29 €)'],
                        'process' => 'Заявка → осмотр объекта → согласование объёма и стоимости → команда клинеров → уборка → приёмка.',
                        'guarantee' => 'Гарантия качества. Замечания — исправляем оперативно.',
                        'faq' => [
                            ['q' => 'Чем уборка после ремонта отличается от обычной?', 'a' => 'Специализированная работа: удаление строительной пыли, следов материалов, более глубокая очистка.'],
                            ['q' => 'Сколько стоит?', 'a' => 'От 3 € / м², зависит от объёма и степени загрязнений.'],
                            ['q' => 'Сколько длится?', 'a' => 'Зависит от площади — обычно 4–10 часов.'],
                            ['q' => 'Что входит?', 'a' => 'Удаление пыли, мытьё полов, очистка всех поверхностей, подготовка к заселению.'],
                            ['q' => 'Удаляете ли краску/клей/цемент?', 'a' => 'Лёгкие следы — да. Сложные случаи — по согласованию.'],
                            ['q' => 'Окна входят?', 'a' => 'Нет, мойка окон — отдельная услуга.'],
                            ['q' => 'Вынос мусора входит?', 'a' => 'Мелкий мусор — да. Крупный строительный — отдельно.'],
                            ['q' => 'Гарантия?', 'a' => 'Да. Замечания исправляем оперативно.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Järelremondikoristus',
                        'subtitle' => 'Ehitustolmu ja tööjälgede eemaldus — ruum valmis kasutuseks.',
                        'short_desc' => 'Täielik koristus pärast remonti ja ehitustöid.',
                        'bullets' => ['Profi-seadmed (sh Kärcher)', 'Pindadele ohutu lähenemine'],
                        'price_anchor' => 'Alates 3 € / m²',
                        'cta_text' => 'Küsi hinnapakkumist',
                        'description' => 'Eemaldame ehitustolmu, värvi- ja materjalijäägid — ruum valmis kasutuseks.',
                        'image_path' => 'coralclean/services/POST-RENOVATION CLEANING.png',
                        'text1' => 'Pärast remonti vajab ruum alati põhjalikku koristust. CoralClean teostab täieliku järelremondikoristuse.',
                        'text2' => 'Eemaldame ehitustolmu, peseme põrandad ja plaadid, puhastame kõik pinnad. Tulemus — ruum on täielikult valmis kasutuseks.',
                        'included' => ['Ehitustolmu eemaldamine kõigilt pindadelt', 'Põrandate ja plaatide pesu', 'Aknalaudade ja uksepiirete puhastamine', 'Kõikide pindade pühkimine', 'Kergete värvi- ja liimijälgede eemaldamine', 'Vannitoa ja köögi koristus'],
                        'not_included' => ['Aknad (eraldi teenus)', 'Keerulised jäägid (tsement, montaaživaht — kokkuleppel)', 'Suure prügi väljaviimine', 'Pehme mööbli puhastus'],
                        'addons' => ['Aknad (al. 10 € / aken)', 'Ehitusprügi väljaviimine (kokkuleppel)', 'Pehme mööbli puhastus (al. 29 €)'],
                        'process' => 'Taotlus → objekti ülevaatus → mahu ja hinna kooskõlastamine → koristusmeeskond → koristus → vastuvõtt.',
                        'guarantee' => 'Kvaliteedigarantii. Märkused — parandame kiiresti.',
                        'faq' => [
                            ['q' => 'Mille poolest erineb järelremondikoristus tavalisest?', 'a' => 'Spetsialiseeritud töö: ehitustolmu, materjalijäägede eemaldamine, sügavam puhastus.'],
                            ['q' => 'Kui palju maksab?', 'a' => 'Alates 3 € / m², sõltub mahust ja mustuse tasemest.'],
                            ['q' => 'Kui kaua kestab?', 'a' => 'Sõltub pinnast — tavaliselt 4–10 tundi.'],
                            ['q' => 'Mis kuulub sisse?', 'a' => 'Tolmu eemaldamine, põrandate pesu, kõikide pindade puhastamine, ettevalmistus kasutuseks.'],
                            ['q' => 'Kas eemaldate värvi/liimi/tsementi?', 'a' => 'Kerged jäljed — jah. Keerulised juhtumid — kokkuleppel.'],
                            ['q' => 'Kas aknad kuuluvad sisse?', 'a' => 'Ei, aknad on eraldi teenus.'],
                            ['q' => 'Kas prügi väljaviimine kuulub sisse?', 'a' => 'Väike prügi — jah. Suur ehitusprügi — eraldi.'],
                            ['q' => 'Garantii?', 'a' => 'Jah. Märkused parandame kiiresti.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Post-Renovation Cleaning',
                        'subtitle' => 'Construction dust and residue removal — ready for move-in.',
                        'short_desc' => 'Full cleaning after construction and renovation works.',
                        'bullets' => ['Pro equipment (incl. Kärcher)', 'Surface-safe cleaning'],
                        'price_anchor' => 'From €3 / m²',
                        'cta_text' => 'Get a quote',
                        'description' => 'We remove construction dust, paint marks, and residues — ready for move-in.',
                        'image_path' => 'coralclean/services/POST-RENOVATION CLEANING.png',
                        'text1' => 'After renovation, a space always needs thorough cleaning. CoralClean performs a complete post-renovation cleaning cycle.',
                        'text2' => 'We remove construction dust, clean windows and sills, wash floors and tiles, wipe all surfaces. The result — a space fully ready for use.',
                        'included' => ['Construction dust removal from all surfaces', 'Floor and tile washing', 'Windowsill and door frame cleaning', 'Wiping all surfaces', 'Light paint and glue mark removal', 'Bathroom and kitchen cleaning'],
                        'not_included' => ['Windows (separate service)', 'Heavy residue (cement, foam — by agreement)', 'Large debris removal', 'Upholstery cleaning'],
                        'addons' => ['Window cleaning (from €10 / window)', 'Construction debris removal (by agreement)', 'Upholstery cleaning (from €29)'],
                        'process' => 'Request → site inspection → scope and cost agreement → cleaning team → cleaning → handover.',
                        'guarantee' => 'Quality guarantee. Concerns — addressed promptly.',
                        'faq' => [
                            ['q' => 'How is post-renovation cleaning different?', 'a' => 'Specialized work: construction dust, material residue removal, deeper cleaning.'],
                            ['q' => 'How much does it cost?', 'a' => 'From €3/m², depends on scope and contamination level.'],
                            ['q' => 'How long does it take?', 'a' => 'Depends on area — usually 4–10 hours.'],
                            ['q' => 'What\'s included?', 'a' => 'Dust removal, floor washing, all surface cleaning, preparation for use.'],
                            ['q' => 'Do you remove paint/glue/cement?', 'a' => 'Light marks — yes. Complex cases — by agreement.'],
                            ['q' => 'Are windows included?', 'a' => 'No, window cleaning is a separate service.'],
                            ['q' => 'Is debris removal included?', 'a' => 'Small debris — yes. Large construction waste — separately.'],
                            ['q' => 'Guarantee?', 'a' => 'Yes. We address concerns promptly.'],
                        ],
                    ],
                ],
            ],

            // ── 4. MOVE-OUT CLEANING ─────────────────────────────────────
            [
                'slug' => 'move-out-cleaning',
                'icon' => 'flaticon-mop',
                'sort_order' => 4,
                'show_on_home' => true,
                'translations' => [
                    'ru' => [
                        'title' => 'Уборка перед сдачей',
                        'subtitle' => 'Полная уборка для аренды, продажи или заселения новых жильцов.',
                        'short_desc' => 'Комплексная уборка квартиры или дома перед сдачей, продажей или заселением.',
                        'bullets' => ['Чёткий чек-лист по зонам', 'Можно добавить окна и технику внутри'],
                        'price_anchor' => 'От 2,5 € / м²',
                        'cta_text' => 'Рассчитать стоимость',
                        'description' => 'Наводим полный порядок для передачи жилья новым жильцам или владельцам.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Уборка перед сдачей квартиры — это ответственный этап: чистота влияет на впечатление новых жильцов и возврат депозита. CoralClean выполняет комплексную уборку квартир и домов перед сдачей в аренду, продажей или заселением.',
                        'text2' => 'Мы приводим помещение в полный порядок: чистые полы, кухня, санузлы, все поверхности. По желанию — окна и техника внутри.',
                        'included' => ['Полная уборка всех помещений', 'Кухня: поверхности, мойка, плита', 'Санузлы: плитка, сантехника', 'Полы и плинтусы', 'Двери и дверные рамы', 'Зеркала и стеклянные поверхности'],
                        'not_included' => ['Окна (add-on)', 'Техника внутри (add-on)', 'Химчистка мебели', 'Удаление сильных запахов (спецобработка)'],
                        'addons' => ['Окна (от 10 € / окно)', 'Духовка/холодильник внутри (по 15 €)', 'Химчистка мебели (от 29 €)'],
                        'process' => 'Заявка → уточнение объёма и сроков → согласование стоимости → уборка → приёмка.',
                        'guarantee' => 'Замечания исправляем оперативно.',
                        'faq' => [
                            ['q' => 'Для каких случаев подходит?', 'a' => 'Сдача в аренду, продажа, заселение новых жильцов, возврат депозита.'],
                            ['q' => 'Сколько стоит?', 'a' => 'От 2,5 € / м².'],
                            ['q' => 'Что входит?', 'a' => 'Полная уборка: полы, кухня, санузлы, все поверхности.'],
                            ['q' => 'Техника внутри входит?', 'a' => 'Нет, можно добавить отдельно.'],
                            ['q' => 'Удаляете запахи?', 'a' => 'Спецобработка — отдельная услуга.'],
                            ['q' => 'Сколько длится?', 'a' => 'Обычно 3–6 часов.'],
                            ['q' => 'Можно ли срочно?', 'a' => 'Да, при наличии слотов + доплата за срочность.'],
                            ['q' => 'Гарантия?', 'a' => 'Да. Замечания исправляем.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Koristus enne üürile andmist',
                        'subtitle' => 'Põhjalik koristus üüriks, müügiks või sissekolimiseks.',
                        'short_desc' => 'Põhjalik koristus enne üürile andmist, müüki või sissekolimist.',
                        'bullets' => ['Töö kontrollnimekirja alusel', 'Lisana aknad ja tehnika seest'],
                        'price_anchor' => 'Alates 2,5 € / m²',
                        'cta_text' => 'Küsi hinnapakkumist',
                        'description' => 'Taastame puhta ja korrektse ilme uutele elanikele või omanikele.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Koristus enne üürile andmist on vastutusrikas etapp. CoralClean teostab põhjalikku koristust korteritele ja majadele.',
                        'text2' => 'Viime ruumi täielikku korda: puhtad põrandad, köök, vannitoad, kõik pinnad.',
                        'included' => ['Täielik kõikide ruumide koristus', 'Köök: pinnad, valamu, pliit', 'Vannitoad: plaadid, sanitaartehnika', 'Põrandad ja põrandaliistud', 'Uksed ja uksepiirad', 'Peeglid ja klaaspinnad'],
                        'not_included' => ['Aknad (lisateenus)', 'Tehnika seest (lisateenus)', 'Pehme mööbli puhastus', 'Tugevate lõhnade eemaldamine (eritöötlus)'],
                        'addons' => ['Aknad (al. 10 € / aken)', 'Ahi/külmik seest (à 15 €)', 'Pehme mööbli puhastus (al. 29 €)'],
                        'process' => 'Taotlus → mahu ja tähtaegade täpsustamine → hinna kooskõlastamine → koristus → vastuvõtt.',
                        'guarantee' => 'Märkused parandame kiiresti.',
                        'faq' => [
                            ['q' => 'Milliste olukordade jaoks sobib?', 'a' => 'Üürile andmine, müük, uute elanike sissekolimine, deposiidi tagastamine.'],
                            ['q' => 'Kui palju maksab?', 'a' => 'Alates 2,5 € / m².'],
                            ['q' => 'Mis kuulub sisse?', 'a' => 'Täielik koristus: põrandad, köök, vannitoad, kõik pinnad.'],
                            ['q' => 'Kas tehnika seest kuulub sisse?', 'a' => 'Ei, saab lisada eraldi.'],
                            ['q' => 'Kas eemaldate lõhnad?', 'a' => 'Eritöötlus — eraldi teenus.'],
                            ['q' => 'Kui kaua kestab?', 'a' => 'Tavaliselt 3–6 tundi.'],
                            ['q' => 'Kas saab kiiresti?', 'a' => 'Jah, vabade aegade olemasolul + kiiruse lisatasu.'],
                            ['q' => 'Garantii?', 'a' => 'Jah. Märkused parandame.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Move-Out Cleaning',
                        'subtitle' => 'Full cleaning for renting out, selling, or welcoming new tenants.',
                        'short_desc' => 'Comprehensive cleaning before renting out, selling, or moving in.',
                        'bullets' => ['Clear checklist by zones', 'Add windows & inside appliances'],
                        'price_anchor' => 'From €2.5 / m²',
                        'cta_text' => 'Get a quote',
                        'description' => 'We restore order and a clean look for new tenants or owners.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Move-out cleaning is a responsible step. CoralClean performs comprehensive cleaning of apartments and houses before handover.',
                        'text2' => 'We bring the space to full order: clean floors, kitchen, bathrooms, all surfaces.',
                        'included' => ['Full cleaning of all rooms', 'Kitchen: surfaces, sink, stove', 'Bathrooms: tiles, fixtures', 'Floors and baseboards', 'Doors and door frames', 'Mirrors and glass surfaces'],
                        'not_included' => ['Windows (add-on)', 'Inside appliances (add-on)', 'Upholstery cleaning', 'Strong odor removal (special treatment)'],
                        'addons' => ['Windows (from €10 / window)', 'Oven/fridge inside (€15 each)', 'Upholstery cleaning (from €29)'],
                        'process' => 'Request → scope and timeline → cost agreement → cleaning → handover.',
                        'guarantee' => 'Concerns addressed promptly.',
                        'faq' => [
                            ['q' => 'What situations is this for?', 'a' => 'Renting out, selling, new tenant move-in, deposit return.'],
                            ['q' => 'How much does it cost?', 'a' => 'From €2.5/m².'],
                            ['q' => 'What\'s included?', 'a' => 'Full cleaning: floors, kitchen, bathrooms, all surfaces.'],
                            ['q' => 'Are inside appliances included?', 'a' => 'No, can be added separately.'],
                            ['q' => 'Do you remove odors?', 'a' => 'Special treatment — separate service.'],
                            ['q' => 'How long does it take?', 'a' => 'Usually 3–6 hours.'],
                            ['q' => 'Can it be done urgently?', 'a' => 'Yes, subject to availability + urgency surcharge.'],
                            ['q' => 'Guarantee?', 'a' => 'Yes. We address concerns.'],
                        ],
                    ],
                ],
            ],

            // ── 5. WINDOW CLEANING ───────────────────────────────────────
            [
                'slug' => 'window-cleaning',
                'icon' => 'flaticon-shower',
                'sort_order' => 5,
                'show_on_home' => true,
                'translations' => [
                    'ru' => [
                        'title' => 'Мойка окон и витрин',
                        'subtitle' => 'Чистые стекла без разводов для дома и бизнеса.',
                        'short_desc' => 'Профессиональная мойка окон, витрин и стеклянных поверхностей без разводов.',
                        'bullets' => ['Профессиональный инвентарь', 'Аккуратно и быстро'],
                        'price_anchor' => 'От 10 € / окно',
                        'cta_text' => 'Заказать мойку',
                        'description' => 'Используем профессиональное оборудование и безопасные средства для идеального результата.',
                        'image_path' => 'coralclean/services/window clean.png',
                        'text1' => 'Чистые окна создают ощущение свежести и света в любом помещении. Наши специалисты выполняют мойку окон, витрин и стеклянных поверхностей.',
                        'text2' => 'Мы гарантируем результат без разводов. Работаем как с жилыми, так и с коммерческими помещениями.',
                        'included' => ['Мойка стёкол с обеих сторон (при безопасном доступе)', 'Протирка рам и подоконников', 'Удаление пыли и загрязнений', 'Результат без разводов'],
                        'not_included' => ['Высотные работы', 'Удаление строительных загрязнений (по согласованию)', 'Мойка москитных сеток (add-on)'],
                        'addons' => ['Витрины / большие стекла (от 15 € / шт)', 'Москитные сетки (от 3 € / шт)'],
                        'process' => 'Заявка → уточнение количества и типа окон → согласование времени → мойка → приёмка.',
                        'guarantee' => 'Результат без разводов гарантирован.',
                        'faq' => [
                            ['q' => 'Сколько стоит мойка окон?', 'a' => 'Стандартное окно — от 10 €, большое/витрина — от 15 €.'],
                            ['q' => 'Мойка снаружи входит?', 'a' => 'Да, если есть безопасный доступ.'],
                            ['q' => 'Высотные работы делаете?', 'a' => 'Нет, только безопасный доступ с земли или изнутри.'],
                            ['q' => 'Удаляете строительные загрязнения?', 'a' => 'По согласованию.'],
                            ['q' => 'Сколько времени занимает?', 'a' => 'Зависит от количества окон. Обычно 1–3 часа.'],
                            ['q' => 'Мойка рам/подоконников входит?', 'a' => 'Да, протирка рам и подоконников входит.'],
                            ['q' => 'Работаете с витринами бизнеса?', 'a' => 'Да, моем витрины и стеклянные поверхности.'],
                            ['q' => 'Гарантия?', 'a' => 'Да. Результат без разводов гарантирован.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Akna- ja vitriinipesu',
                        'subtitle' => 'Triipudeta klaasid kodus ja äripindadel.',
                        'short_desc' => 'Triipudeta akende, vitriinide ja klaaspindade pesu.',
                        'bullets' => ['Professionaalsed töövahendid', 'Korralik ja kiire tulemus'],
                        'price_anchor' => 'Alates 10 € / aken',
                        'cta_text' => 'Telli pesu',
                        'description' => 'Professionaalsed töövahendid ja ohutud puhastusvahendid ideaalse tulemuse jaoks.',
                        'image_path' => 'coralclean/services/window clean.png',
                        'text1' => 'Puhtad aknad loovad värskuse ja valguse tunde igas ruumis.',
                        'text2' => 'Garanteerime triipudeta tulemuse. Töötame nii eluruumide kui ka äripindadega.',
                        'included' => ['Klaaside pesu mõlemalt poolt (ohutu ligipääsu korral)', 'Raamide ja aknalaudade pühkimine', 'Tolmu ja mustuse eemaldamine', 'Triipudeta tulemus'],
                        'not_included' => ['Kõrgustööd', 'Ehitusmustuse eemaldamine (kokkuleppel)', 'Putukavõrkude pesu (lisateenus)'],
                        'addons' => ['Vitriinid / suured klaasid (al. 15 € / tk)', 'Putukavõrgud (al. 3 € / tk)'],
                        'process' => 'Taotlus → akende arvu ja tüübi täpsustamine → aja kooskõlastamine → pesu → vastuvõtt.',
                        'guarantee' => 'Triipudeta tulemus garanteeritud.',
                        'faq' => [
                            ['q' => 'Kui palju aknade pesu maksab?', 'a' => 'Standardaken — al. 10 €, suur/vitriin — al. 15 €.'],
                            ['q' => 'Kas välispesu kuulub sisse?', 'a' => 'Jah, kui on ohutu ligipääs.'],
                            ['q' => 'Kas teete kõrgustöid?', 'a' => 'Ei, ainult ohutu ligipääs maapinnalt või seestpoolt.'],
                            ['q' => 'Kas eemaldate ehitusmustust?', 'a' => 'Kokkuleppel.'],
                            ['q' => 'Kui kaua aega võtab?', 'a' => 'Sõltub akende arvust. Tavaliselt 1–3 tundi.'],
                            ['q' => 'Kas raamide/aknalaudade pesu kuulub sisse?', 'a' => 'Jah.'],
                            ['q' => 'Kas töötate ärivitriinidega?', 'a' => 'Jah, peseme vitriine ja klaaspindu.'],
                            ['q' => 'Garantii?', 'a' => 'Jah. Triipudeta tulemus garanteeritud.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Window & Shopfront Cleaning',
                        'subtitle' => 'Streak-free glass for homes and businesses.',
                        'short_desc' => 'Streak-free cleaning for windows, shopfronts, and glass surfaces.',
                        'bullets' => ['Professional tools', 'Careful and fast'],
                        'price_anchor' => 'From €10 / window',
                        'cta_text' => 'Book window cleaning',
                        'description' => 'Professional tools and safe products for a perfect finish.',
                        'image_path' => 'coralclean/services/window clean.png',
                        'text1' => 'Clean windows create a sense of freshness and light in any space.',
                        'text2' => 'We guarantee streak-free results. We work with both residential and commercial spaces.',
                        'included' => ['Glass cleaning both sides (safe access)', 'Frame and sill wiping', 'Dust and dirt removal', 'Streak-free result'],
                        'not_included' => ['High-rise work', 'Construction residue removal (by agreement)', 'Mosquito screen cleaning (add-on)'],
                        'addons' => ['Shopfront / large glass (from €15 / piece)', 'Mosquito screens (from €3 / piece)'],
                        'process' => 'Request → window count and type → time agreement → cleaning → handover.',
                        'guarantee' => 'Streak-free result guaranteed.',
                        'faq' => [
                            ['q' => 'How much does window cleaning cost?', 'a' => 'Standard window — from €10, large/shopfront — from €15.'],
                            ['q' => 'Is outside cleaning included?', 'a' => 'Yes, if there is safe access.'],
                            ['q' => 'Do you do high-rise work?', 'a' => 'No, only safe ground-level or interior access.'],
                            ['q' => 'Do you remove construction residue?', 'a' => 'By agreement.'],
                            ['q' => 'How long does it take?', 'a' => 'Depends on number of windows. Usually 1–3 hours.'],
                            ['q' => 'Are frames/sills included?', 'a' => 'Yes, frame and sill wiping is included.'],
                            ['q' => 'Do you work with business shopfronts?', 'a' => 'Yes, we clean shopfronts and glass surfaces.'],
                            ['q' => 'Guarantee?', 'a' => 'Yes. Streak-free result guaranteed.'],
                        ],
                    ],
                ],
            ],

            // ── 6. UPHOLSTERY & CARPET CLEANING ─────────────────────────
            [
                'slug' => 'upholstery-cleaning',
                'icon' => 'flaticon-clean-2',
                'sort_order' => 6,
                'show_on_home' => true,
                'translations' => [
                    'ru' => [
                        'title' => 'Химчистка мебели и ковров',
                        'subtitle' => 'Глубокая чистка от пятен, запахов и аллергенов с дезинфекцией.',
                        'short_desc' => 'Глубокая чистка диванов, матрасов и ковров с удалением пятен и запахов.',
                        'bullets' => ['Экстракторная чистка', 'Безопасно для детей и животных'],
                        'price_anchor' => 'От 29 €',
                        'cta_text' => 'Заказать химчистку',
                        'description' => 'Профессиональное оборудование, дезинфекция и безопасные чистящие средства.',
                        'image_path' => 'coralclean/services/carpet clean.png',
                        'text1' => 'Ковры и мягкая мебель собирают огромное количество пыли, аллергенов и загрязнений. Регулярная глубокая чистка не только продлевает срок службы изделий, но и улучшает качество воздуха.',
                        'text2' => 'CoralClean использует профессиональное оборудование для глубокой чистки. Мы эффективно удаляем пятна, запахи и аллергены.',
                        'included' => ['Экстракторная чистка', 'Удаление пятен', 'Дезинфекция', 'Безопасные чистящие средства'],
                        'not_included' => ['Удаление всех видов пятен (честно предупреждаем)', 'Реставрация обивки'],
                        'addons' => ['Доп. предметы мебели (по прайсу)', 'Дополнительная обработка от запахов'],
                        'process' => 'Заявка → уточняем тип мебели и загрязнений → согласование стоимости → чистка → сушка 4–12 часов.',
                        'guarantee' => 'Честный подход: предупреждаем о результате до начала работы.',
                        'faq' => [
                            ['q' => 'Какой минимальный заказ?', 'a' => '49 €.'],
                            ['q' => 'Сколько сохнет?', 'a' => '4–12 часов.'],
                            ['q' => 'Удаляются ли все пятна?', 'a' => 'Не всегда — мы честно предупреждаем о результате до начала работы.'],
                            ['q' => 'Безопасно ли для детей и животных?', 'a' => 'Да, используем безопасные средства.'],
                            ['q' => 'Какие виды мебели чистите?', 'a' => 'Диваны, кресла, матрасы, стулья, ковры.'],
                            ['q' => 'От чего зависит цена?', 'a' => 'От размера предмета и степени загрязнений.'],
                            ['q' => 'Делаете ли дезинфекцию?', 'a' => 'Да.'],
                            ['q' => 'Можно ли совместить с уборкой?', 'a' => 'Да, комбинируем с другими услугами.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Pehme mööbli ja vaipade puhastus',
                        'subtitle' => 'Süvapuhastus plekkidest, lõhnadest ja allergeenidest + desinfitseerimine.',
                        'short_desc' => 'Diivanite, madratsite ja vaipade süvapuhastus — plekid ja lõhnad eemaldatakse.',
                        'bullets' => ['Ekstraktor-puhastus', 'Lastele ja lemmikloomadele ohutu'],
                        'price_anchor' => 'Alates 29 €',
                        'cta_text' => 'Telli keemiline puhastus',
                        'description' => 'Profi-seadmed, desinfitseerimine ja kangasõbralikud vahendid.',
                        'image_path' => 'coralclean/services/carpet clean.png',
                        'text1' => 'Vaibad ja pehme mööbel koguvad tohutul hulgal tolmu, allergeene ja mustust.',
                        'text2' => 'CoralClean kasutab professionaalset varustust süvapuhastuseks. Eemaldame plekid, lõhnad ja allergeenid.',
                        'included' => ['Ekstraktor-puhastus', 'Plekkide eemaldamine', 'Desinfitseerimine', 'Ohutud puhastusvahendid'],
                        'not_included' => ['Kõikide plekkide eemaldamine (teavitame ausalt)', 'Polstri restaureerimine'],
                        'addons' => ['Lisamööbel (hinnakirja alusel)', 'Lisatöötlus lõhnade vastu'],
                        'process' => 'Taotlus → mööbli tüübi ja mustuse täpsustamine → hinna kooskõlastamine → puhastus → kuivamine 4–12 tundi.',
                        'guarantee' => 'Aus lähenemine: teavitame tulemusest enne töö algust.',
                        'faq' => [
                            ['q' => 'Mis on minimaalne tellimus?', 'a' => '49 €.'],
                            ['q' => 'Kui kaua kuivab?', 'a' => '4–12 tundi.'],
                            ['q' => 'Kas kõik plekid eemaldatakse?', 'a' => 'Mitte alati — teavitame ausalt tulemusest enne töö algust.'],
                            ['q' => 'Kas on lastele ja lemmikloomadele ohutu?', 'a' => 'Jah, kasutame ohutuid vahendeid.'],
                            ['q' => 'Milliseid mööblitükke puhastate?', 'a' => 'Diivanid, tugitoolid, madratsid, toolid, vaibad.'],
                            ['q' => 'Millest sõltub hind?', 'a' => 'Eseme suurusest ja mustuse tasemest.'],
                            ['q' => 'Kas teete desinfitseerimist?', 'a' => 'Jah.'],
                            ['q' => 'Kas saab koristusega kombineerida?', 'a' => 'Jah, kombineerime teiste teenustega.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Upholstery & Carpet Cleaning',
                        'subtitle' => 'Deep extraction cleaning for stains, odors, and allergens + disinfection.',
                        'short_desc' => 'Deep cleaning of sofas, mattresses, and carpets — stains and odors removed.',
                        'bullets' => ['Extraction method', 'Safe for kids and pets'],
                        'price_anchor' => 'From €29',
                        'cta_text' => 'Book upholstery cleaning',
                        'description' => 'Pro equipment, disinfection, and fabric-safe solutions.',
                        'image_path' => 'coralclean/services/carpet clean.png',
                        'text1' => 'Carpets and upholstered furniture collect massive amounts of dust, allergens, and dirt.',
                        'text2' => 'CoralClean uses professional equipment for deep cleaning. We effectively remove stains, odors, and allergens.',
                        'included' => ['Extraction cleaning', 'Stain removal', 'Disinfection', 'Safe cleaning products'],
                        'not_included' => ['Removal of all stain types (we are honest about results)', 'Upholstery restoration'],
                        'addons' => ['Additional furniture items (per price list)', 'Extra odor treatment'],
                        'process' => 'Request → furniture type and condition → cost agreement → cleaning → drying 4–12 hours.',
                        'guarantee' => 'Honest approach: we inform you about expected results upfront.',
                        'faq' => [
                            ['q' => 'What\'s the minimum order?', 'a' => '€49.'],
                            ['q' => 'How long does it take to dry?', 'a' => '4–12 hours.'],
                            ['q' => 'Are all stains removed?', 'a' => 'Not always — we\'re honest about results before starting.'],
                            ['q' => 'Is it safe for kids and pets?', 'a' => 'Yes, we use safe products.'],
                            ['q' => 'What types of furniture do you clean?', 'a' => 'Sofas, armchairs, mattresses, chairs, carpets.'],
                            ['q' => 'What does the price depend on?', 'a' => 'Item size and contamination level.'],
                            ['q' => 'Do you do disinfection?', 'a' => 'Yes.'],
                            ['q' => 'Can it be combined with cleaning?', 'a' => 'Yes, we combine with other services.'],
                        ],
                    ],
                ],
            ],

            // ── 7. COMMERCIAL CLEANING (not on home) ─────────────────────
            [
                'slug' => 'commercial-cleaning',
                'icon' => 'flaticon-clean',
                'sort_order' => 7,
                'show_on_home' => false,
                'translations' => [
                    'ru' => [
                        'title' => 'Уборка коммерческих помещений',
                        'subtitle' => 'Офисы, магазины, склады — разово или по договору.',
                        'short_desc' => 'Регулярная и разовая уборка офисов, магазинов и складов по договору.',
                        'bullets' => ['Закреплённый персонал', 'Стабильный регламент уборки'],
                        'price_anchor' => 'От 0,07 € / м²',
                        'cta_text' => 'Запросить предложение',
                        'description' => 'Закреплённый персонал, стабильное качество и удобный график уборки для бизнеса.',
                        'image_path' => 'coralclean/services/office clean.png',
                        'text1' => 'Чистый офис — это не только комфорт, но и продуктивность сотрудников. CoralClean предлагает услугу регулярной уборки офисных и коммерческих помещений в Таллине.',
                        'text2' => 'Мы работаем по договору, с фиксированным графиком и прозрачными условиями. Наши специалисты выполняют уборку рабочих мест, общих зон, переговорных, санузлов и кухонь.',
                        'included' => ['Полы и поверхности', 'Санузлы и кухня', 'Рабочие места и переговорные', 'Общие зоны', 'Вынос мусора'],
                        'not_included' => ['Окна (отдельная услуга)', 'Генеральная уборка (отдельно)', 'Химчистка мебели'],
                        'addons' => ['Окна (от 10 € / окно)', 'Генеральная уборка (от 2 € / м²)', 'Химчистка мебели (от 29 €)'],
                        'process' => 'Заявка → осмотр → коммерческое предложение → согласование условий → начало работы.',
                        'guarantee' => 'Контроль качества после каждой уборки.',
                        'faq' => [
                            ['q' => 'Сколько стоит уборка офиса?', 'a' => 'От 0,07 € / м², зависит от площади и частоты.'],
                            ['q' => 'Есть ли договор?', 'a' => 'Да, работаем по договору.'],
                            ['q' => 'Можно ли закрепить персонал?', 'a' => 'Да, закрепляем клинера за объектом.'],
                            ['q' => 'Какая частота уборки?', 'a' => 'Любая: ежедневно, 2–3 раза в неделю, еженедельно.'],
                            ['q' => 'Что входит в базовый регламент?', 'a' => 'Полы, поверхности, санузлы, кухня, мусор.'],
                            ['q' => 'Окна/генеральная входят?', 'a' => 'Нет, оплачиваются отдельно.'],
                            ['q' => 'Вы работаете утром/вечером?', 'a' => 'Да, подстраиваемся под ваш график.'],
                            ['q' => 'Как быстро можно начать?', 'a' => 'Обычно в течение 1–3 дней.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Äripindade koristus',
                        'subtitle' => 'Kontorid, poed, laod — ühekordselt või lepinguga.',
                        'short_desc' => 'Lepingu- ja ühekordne koristus kontoritele, kauplustele ja ladudele.',
                        'bullets' => ['Püsipersonal', 'Selge koristusreglament'],
                        'price_anchor' => 'Alates 0,07 € / m²',
                        'cta_text' => 'Küsi pakkumist',
                        'description' => 'Püsipersonal, stabiilne kvaliteet ja graafik, mis sobib teie ettevõttele.',
                        'image_path' => 'coralclean/services/office clean.png',
                        'text1' => 'Puhas kontor on mugavus ja tootlikkus. CoralClean pakub regulaarset koristusteenust kontoritele ja äripindadele Tallinnas.',
                        'text2' => 'Töötame lepingu alusel, fikseeritud graafiku ja läbipaistvate tingimustega.',
                        'included' => ['Põrandad ja pinnad', 'Vannitoad ja köök', 'Tööruumid ja koosolekuruumid', 'Ühisalad', 'Prügi väljaviimine'],
                        'not_included' => ['Aknad (eraldi teenus)', 'Süvapuhastus (eraldi)', 'Pehme mööbli puhastus'],
                        'addons' => ['Aknad (al. 10 € / aken)', 'Süvapuhastus (al. 2 € / m²)', 'Pehme mööbli puhastus (al. 29 €)'],
                        'process' => 'Taotlus → ülevaatus → kommertspakkumine → tingimuste kooskõlastamine → töö algus.',
                        'guarantee' => 'Kvaliteedikontroll pärast iga koristust.',
                        'faq' => [
                            ['q' => 'Kui palju kontori koristus maksab?', 'a' => 'Alates 0,07 € / m², sõltub pinnast ja sagedusest.'],
                            ['q' => 'Kas on leping?', 'a' => 'Jah, töötame lepingu alusel.'],
                            ['q' => 'Kas saab personali kinnitada?', 'a' => 'Jah, kinnitame koristaja objekti juurde.'],
                            ['q' => 'Milline sagedus on võimalik?', 'a' => 'Iga päev, 2–3 korda nädalas, kord nädalas.'],
                            ['q' => 'Mis kuulub baasreglamenti?', 'a' => 'Põrandad, pinnad, vannitoad, köök, prügi.'],
                            ['q' => 'Kas aknad/süvapuhastus kuuluvad sisse?', 'a' => 'Ei, neid makstakse eraldi.'],
                            ['q' => 'Kas töötate hommikul/õhtul?', 'a' => 'Jah, kohandume teie graafikuga.'],
                            ['q' => 'Kui kiiresti saab alustada?', 'a' => 'Tavaliselt 1–3 päeva jooksul.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Commercial Cleaning',
                        'subtitle' => 'Offices, shops, warehouses — one-time or contract-based.',
                        'short_desc' => 'Contract and one-time cleaning for offices, shops, and warehouses.',
                        'bullets' => ['Dedicated staff', 'Clear cleaning standards'],
                        'price_anchor' => 'From €0.07 / m²',
                        'cta_text' => 'Request an offer',
                        'description' => 'Dedicated staff, stable quality, and a schedule tailored to your business.',
                        'image_path' => 'coralclean/services/office clean.png',
                        'text1' => 'A clean office is about comfort and productivity. CoralClean offers regular cleaning for offices and commercial spaces in Tallinn.',
                        'text2' => 'We work on contract with a fixed schedule and transparent terms.',
                        'included' => ['Floors and surfaces', 'Bathrooms and kitchen', 'Workstations and meeting rooms', 'Common areas', 'Trash removal'],
                        'not_included' => ['Windows (separate service)', 'Deep cleaning (separate)', 'Upholstery cleaning'],
                        'addons' => ['Windows (from €10 / window)', 'Deep cleaning (from €2/m²)', 'Upholstery cleaning (from €29)'],
                        'process' => 'Request → inspection → commercial offer → terms agreement → work begins.',
                        'guarantee' => 'Quality control after every cleaning.',
                        'faq' => [
                            ['q' => 'How much does office cleaning cost?', 'a' => 'From €0.07/m², depends on area and frequency.'],
                            ['q' => 'Is there a contract?', 'a' => 'Yes, we work on contract.'],
                            ['q' => 'Can staff be assigned?', 'a' => 'Yes, we assign a dedicated cleaner to your space.'],
                            ['q' => 'What frequency is available?', 'a' => 'Daily, 2–3 times a week, weekly.'],
                            ['q' => 'What\'s in the base scope?', 'a' => 'Floors, surfaces, bathrooms, kitchen, trash.'],
                            ['q' => 'Are windows/deep cleaning included?', 'a' => 'No, they are billed separately.'],
                            ['q' => 'Do you work mornings/evenings?', 'a' => 'Yes, we adapt to your schedule.'],
                            ['q' => 'How soon can you start?', 'a' => 'Usually within 1–3 days.'],
                        ],
                    ],
                ],
            ],

            // ── 8. REGULAR CONTRACT CLEANING (not on home) ───────────────
            [
                'slug' => 'regular-contract-cleaning',
                'icon' => 'flaticon-calendar',
                'sort_order' => 8,
                'show_on_home' => false,
                'translations' => [
                    'ru' => [
                        'title' => 'Регулярная уборка (по договору)',
                        'subtitle' => 'Постоянная уборка по графику с фиксированными стандартами.',
                        'short_desc' => 'Постоянная уборка по графику для домов, офисов и коммерческих помещений.',
                        'bullets' => ['Закреплённый персонал', 'Фиксированная цена и контроль'],
                        'price_anchor' => 'Цена по договору',
                        'cta_text' => 'Запросить предложение',
                        'description' => 'Фиксированная цена, закреплённый персонал и стабильное качество на постоянной основе.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Регулярная уборка по договору — это идеальный формат для тех, кто ценит стабильность, порядок и экономию времени. За вами закрепляется персонал, работающий по согласованному графику.',
                        'text2' => 'Фиксированная цена, чёткий регламент, контроль качества после каждой уборки.',
                        'included' => ['Уборка по согласованному чек-листу', 'Закреплённый персонал', 'Фиксированная цена', 'Контроль качества'],
                        'not_included' => ['Окна (отдельная услуга)', 'Генеральная уборка (отдельно)', 'Химчистка мебели (отдельно)'],
                        'addons' => ['Окна (от 10 € / окно)', 'Генеральная уборка (от 2 € / м²)', 'Химчистка мебели (от 29 €)'],
                        'process' => 'Заявка → осмотр → согласование условий → подписание договора → начало работы.',
                        'guarantee' => 'Контроль качества после каждой уборки. Обратная связь приветствуется.',
                        'faq' => [
                            ['q' => 'Чем отличается от разовой уборки?', 'a' => 'Закреплённый персонал, стабильный график, фиксированная цена, контроль качества.'],
                            ['q' => 'Как фиксируется цена?', 'a' => 'По результатам осмотра и согласования объёма работ.'],
                            ['q' => 'Какой график возможен?', 'a' => 'Любой: ежедневно, 2–3 раза в неделю, еженедельно, раз в 2 недели.'],
                            ['q' => 'Закрепляется ли персонал?', 'a' => 'Да, за вашим объектом закрепляется постоянный клинер.'],
                            ['q' => 'Что входит в чек-лист?', 'a' => 'Полы, поверхности, санузлы, кухня, мусор — по согласованию.'],
                            ['q' => 'Как контролируется качество?', 'a' => 'После каждой уборки — проверка по чек-листу и обратная связь.'],
                            ['q' => 'Как менять регламент?', 'a' => 'Просто сообщите — мы скорректируем.'],
                            ['q' => 'Как начать?', 'a' => 'Оставьте заявку → мы осмотрим объект → согласуем условия → начинаем.'],
                        ],
                    ],
                    'et' => [
                        'title' => 'Lepinguline regulaarne koristus',
                        'subtitle' => 'Koristus graafiku alusel — stabiilsed standardid ja kontroll.',
                        'short_desc' => 'Koristus graafiku alusel kodudele ja äripindadele.',
                        'bullets' => ['Püsipersonal', 'Fikseeritud tingimused ja kvaliteet'],
                        'price_anchor' => 'Hind kokkuleppel',
                        'cta_text' => 'Küsi pakkumist',
                        'description' => 'Fikseeritud hind, püsipersonal, ühtlane kvaliteet.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Lepinguline regulaarne koristus on ideaalne formaat neile, kes hindavad stabiilsust ja korda.',
                        'text2' => 'Fikseeritud hind, selge reglament, kvaliteedikontroll pärast iga koristust.',
                        'included' => ['Koristus kokkulepitud kontrollnimekirja alusel', 'Püsipersonal', 'Fikseeritud hind', 'Kvaliteedikontroll'],
                        'not_included' => ['Aknad (eraldi teenus)', 'Süvapuhastus (eraldi)', 'Pehme mööbli puhastus (eraldi)'],
                        'addons' => ['Aknad (al. 10 € / aken)', 'Süvapuhastus (al. 2 € / m²)', 'Pehme mööbli puhastus (al. 29 €)'],
                        'process' => 'Taotlus → ülevaatus → tingimuste kooskõlastamine → lepingu allkirjastamine → töö algus.',
                        'guarantee' => 'Kvaliteedikontroll pärast iga koristust. Tagasiside on teretulnud.',
                        'faq' => [
                            ['q' => 'Mille poolest erineb ühekordsest koristusest?', 'a' => 'Püsipersonal, stabiilne graafik, fikseeritud hind, kvaliteedikontroll.'],
                            ['q' => 'Kuidas hind fikseeritakse?', 'a' => 'Ülevaatuse ja tööde mahu kokkuleppe põhjal.'],
                            ['q' => 'Milline graafik on võimalik?', 'a' => 'Iga päev, 2–3 korda nädalas, kord nädalas, kord 2 nädala jooksul.'],
                            ['q' => 'Kas personal kinnitatakse?', 'a' => 'Jah, teie objekti juurde kinnitatakse püsiv koristaja.'],
                            ['q' => 'Mis kuulub kontrollnimekirja?', 'a' => 'Põrandad, pinnad, vannitoad, köök, prügi — kokkuleppel.'],
                            ['q' => 'Kuidas kvaliteeti kontrollitakse?', 'a' => 'Pärast iga koristust — kontroll ja tagasiside.'],
                            ['q' => 'Kuidas reglementi muuta?', 'a' => 'Lihtsalt andke teada — kohandame.'],
                            ['q' => 'Kuidas alustada?', 'a' => 'Jätke taotlus → vaatame objekti üle → lepime tingimused kokku → alustame.'],
                        ],
                    ],
                    'en' => [
                        'title' => 'Regular Contract Cleaning',
                        'subtitle' => 'Scheduled cleaning with consistent standards and control.',
                        'short_desc' => 'Scheduled cleaning for homes and businesses on an ongoing basis.',
                        'bullets' => ['Dedicated cleaners', 'Fixed terms & quality checks'],
                        'price_anchor' => 'Contract pricing',
                        'cta_text' => 'Request an offer',
                        'description' => 'Fixed pricing, dedicated cleaners, consistent standards.',
                        'image_path' => 'coralclean/services/home clean.png',
                        'text1' => 'Regular contract cleaning is the ideal format for those who value stability and order.',
                        'text2' => 'Fixed pricing, clear scope, quality control after every cleaning.',
                        'included' => ['Cleaning per agreed checklist', 'Dedicated staff', 'Fixed price', 'Quality control'],
                        'not_included' => ['Windows (separate service)', 'Deep cleaning (separate)', 'Upholstery cleaning (separate)'],
                        'addons' => ['Windows (from €10 / window)', 'Deep cleaning (from €2/m²)', 'Upholstery cleaning (from €29)'],
                        'process' => 'Request → inspection → terms agreement → contract signing → work begins.',
                        'guarantee' => 'Quality control after every cleaning. Feedback is welcome.',
                        'faq' => [
                            ['q' => 'How is it different from one-time cleaning?', 'a' => 'Dedicated staff, consistent schedule, fixed pricing, quality control.'],
                            ['q' => 'How is the price set?', 'a' => 'Based on site inspection and agreed scope.'],
                            ['q' => 'What schedule is available?', 'a' => 'Daily, 2–3 times a week, weekly, biweekly.'],
                            ['q' => 'Is staff assigned?', 'a' => 'Yes, a dedicated cleaner is assigned to your space.'],
                            ['q' => 'What\'s on the checklist?', 'a' => 'Floors, surfaces, bathrooms, kitchen, trash — by agreement.'],
                            ['q' => 'How is quality controlled?', 'a' => 'After every cleaning — checklist review and feedback.'],
                            ['q' => 'How to change the scope?', 'a' => 'Just let us know — we\'ll adjust.'],
                            ['q' => 'How to get started?', 'a' => 'Submit a request → we inspect → agree on terms → start.'],
                        ],
                    ],
                ],
            ],
        ];
    }

    // =========================================================================
    // DATA: 6 Packages (flip cards, NO separate pages)
    // =========================================================================
    private function getPackagesData(): array
    {
        return [
            [
                'slug' => 'clean-maintenance',
                'icon' => 'flaticon-clean-3',
                'image' => 'coralclean/packages/quick clean (1).png',
                'sort_order' => 1,
                'column_span' => 4,
                'translations' => [
                    'ru' => [
                        'title' => 'Поддержание чистоты',
                        'subtitle' => 'Регулярный уход за домом',
                        'front_body' => 'Идеальный выбор для регулярного ухода за квартирой или домом. Поддерживающая уборка помогает сохранять порядок, свежесть и чистоту без лишних затрат времени и сил.',
                        'back_body' => 'Регулярная поддерживающая уборка по чек-листу CoralClean. Можно добавить окна, технику, балкон и другие опции.',
                        'description' => 'Подходит для постоянного проживания, семей с детьми и домашних животных.',
                        'price' => 'от 45 €',
                        'btn_text' => 'Заказать уборку',
                        'features' => ['Чистые полы и поверхности', 'Убранную кухню и санузел', 'Аккуратный и ухоженный дом', 'Экономию времени и сил'],
                    ],
                    'et' => [
                        'title' => 'Puhtuse hoidmine',
                        'subtitle' => 'Regulaarne koduhooldus',
                        'front_body' => 'Ideaalne valik korteri või maja regulaarseks hoolduseks. Hoolduskoristus aitab säilitada korda, värskust ja puhtust.',
                        'back_body' => 'Regulaarne hoolduskoristus CoralClean kontrollnimekirja alusel. Lisaks saab tellida akna- ja tehnikapesu.',
                        'description' => 'Sobib püsielamiseks, lastega ja lemmikloomadega peredele.',
                        'price' => 'alates 45 €',
                        'btn_text' => 'Telli koristus',
                        'features' => ['Puhtad põrandad ja pinnad', 'Korrastatud köök ja vannituba', 'Hoolitsetud ja puhas kodu', 'Aja ja energia kokkuhoid'],
                    ],
                    'en' => [
                        'title' => 'Clean Maintenance',
                        'subtitle' => 'Regular home care',
                        'front_body' => 'The perfect choice for regular apartment or house care. Maintenance cleaning helps keep order, freshness, and cleanliness effortlessly.',
                        'back_body' => 'Regular maintenance cleaning by CoralClean checklist. You can add windows, appliances, balcony and more.',
                        'description' => 'Great for families, pet owners, and everyone who values a tidy home.',
                        'price' => 'from €45',
                        'btn_text' => 'Book cleaning',
                        'features' => ['Clean floors and surfaces', 'Tidy kitchen and bathroom', 'A well-kept home', 'Time and energy saved'],
                    ],
                ],
            ],
            [
                'slug' => 'deep-clean',
                'icon' => 'flaticon-dishwasher',
                'image' => 'coralclean/packages/DEEP CLEAN (1).png',
                'sort_order' => 2,
                'column_span' => 4,
                'translations' => [
                    'ru' => [
                        'title' => 'Глубокая чистота',
                        'subtitle' => 'Генеральная уборка',
                        'front_body' => 'Комплексная генеральная уборка для тех, кто хочет увидеть свой дом по-настоящему чистым. Мы убираем не только видимые поверхности, но и труднодоступные зоны.',
                        'back_body' => 'Полная генеральная уборка с возможностью добавить окна, технику внутри, шкафы и химчистку.',
                        'description' => 'Идеально подходит для сезонной уборки, перед важными событиями.',
                        'price' => 'от 2 € / м²',
                        'btn_text' => 'Получить расчёт',
                        'features' => ['Глубокую очистку всех помещений', 'Особое внимание кухне и санузлам', 'Уборку труднодоступных мест', 'Свежесть и ощущение "как после ремонта"'],
                    ],
                    'et' => [
                        'title' => 'Süvapuhastus',
                        'subtitle' => 'Üldkoristus',
                        'front_body' => 'Kompleksne üldkoristus neile, kes soovivad näha oma kodu tõeliselt puhtana. Puhastame ka raskesti ligipääsetavad kohad.',
                        'back_body' => 'Täielik süvapuhastus võimalusega lisada aknad, tehnika seest, kapid ja keemiline puhastus.',
                        'description' => 'Ideaalne hooajalise koristuse jaoks.',
                        'price' => 'alates 2 € / m²',
                        'btn_text' => 'Küsi hinnapakkumist',
                        'features' => ['Kõikide ruumide süvapuhastus', 'Eriline tähelepanu köögile ja vannitoale', 'Raskesti ligipääsetavate kohtade koristus', 'Värskus ja "nagu pärast remonti" tunne'],
                    ],
                    'en' => [
                        'title' => 'Deep Clean',
                        'subtitle' => 'Thorough cleaning',
                        'front_body' => 'Comprehensive deep cleaning for those who want a truly clean home. We clean not just visible surfaces, but hard-to-reach areas too.',
                        'back_body' => 'Full deep cleaning with options to add windows, inside appliances, cabinets, and upholstery.',
                        'description' => 'Perfect for seasonal cleaning or before important events.',
                        'price' => 'from €2 / m²',
                        'btn_text' => 'Get a quote',
                        'features' => ['Deep cleaning of all rooms', 'Extra focus on kitchen & bathrooms', 'Hard-to-reach areas cleaned', 'Fresh "just-renovated" feeling'],
                    ],
                ],
            ],
            [
                'slug' => 'post-renovation',
                'icon' => 'flaticon-tower',
                'image' => 'coralclean/packages/quick clean (1).png',
                'sort_order' => 3,
                'column_span' => 4,
                'translations' => [
                    'ru' => [
                        'title' => 'После ремонта',
                        'subtitle' => 'Уборка после строительства',
                        'front_body' => 'Профессиональная уборка после строительных и ремонтных работ. Мы удаляем строительную пыль, следы материалов и подготавливаем помещение к заселению.',
                        'back_body' => 'Специализированная уборка с профессиональным оборудованием. Можно добавить мойку окон, вынос мусора и химчистку.',
                        'description' => 'Подходит для квартир, домов, офисов после ремонта.',
                        'price' => 'от 3 € / м²',
                        'btn_text' => 'Заказать уборку',
                        'features' => ['Удаление строительной пыли', 'Очистку всех поверхностей', 'Подготовку помещения к использованию', 'Чистое и безопасное пространство'],
                    ],
                    'et' => [
                        'title' => 'Järelremondikoristus',
                        'subtitle' => 'Ehitusjärgne koristus',
                        'front_body' => 'Professionaalne koristus pärast ehitus- ja remonditöid. Eemaldame ehitustolmu ja materjalijäägid.',
                        'back_body' => 'Spetsialiseeritud koristus profi-seadmetega. Lisaks saab tellida akna- ja prügivedu.',
                        'description' => 'Sobib korteritele, majadele, kontoritele pärast remonti.',
                        'price' => 'alates 3 € / m²',
                        'btn_text' => 'Telli koristus',
                        'features' => ['Ehitustolmu eemaldamine', 'Kõikide pindade puhastamine', 'Ruumi ettevalmistamine kasutuseks', 'Puhas ja ohutu ruum'],
                    ],
                    'en' => [
                        'title' => 'After Renovation',
                        'subtitle' => 'Post-construction clean',
                        'front_body' => 'Professional cleaning after construction and renovation works. We remove construction dust and material residues.',
                        'back_body' => 'Specialized cleaning with professional equipment. Add window cleaning, debris removal, and upholstery.',
                        'description' => 'For apartments, houses, offices after renovation.',
                        'price' => 'from €3 / m²',
                        'btn_text' => 'Book cleaning',
                        'features' => ['Construction dust removal', 'All surfaces cleaned', 'Space prepared for use', 'Clean and safe environment'],
                    ],
                ],
            ],
            [
                'slug' => 'move-out-ready',
                'icon' => 'flaticon-suitcase',
                'image' => 'coralclean/packages/MOVE-IN  MOVE-OUT.png',
                'sort_order' => 4,
                'column_span' => 4,
                'translations' => [
                    'ru' => [
                        'title' => 'Перед сдачей / После жильцов',
                        'subtitle' => 'Уборка при переезде',
                        'front_body' => 'Идеальное решение для подготовки квартиры или дома к сдаче в аренду, продаже или заселению новых жильцов.',
                        'back_body' => 'Комплексная уборка с возможностью добавить окна, технику внутри и химчистку мебели.',
                        'description' => 'Подходит для арендодателей, агентств недвижимости и владельцев жилья.',
                        'price' => 'от 2,5 € / м²',
                        'btn_text' => 'Получить расчёт',
                        'features' => ['Полную уборку всех помещений', 'Чистую кухню и санузлы', 'Аккуратный внешний вид жилья', 'Готовность к сдаче или заселению'],
                    ],
                    'et' => [
                        'title' => 'Üüriks valmis / pärast üürnikke',
                        'subtitle' => 'Kolimisjärgne koristus',
                        'front_body' => 'Ideaalne lahendus korteri või maja ettevalmistamiseks üürile andmiseks, müügiks või uute elanike sissekolimiseks.',
                        'back_body' => 'Kompleksne koristus võimalusega lisada aknad, tehnika seest ja pehme mööbli puhastus.',
                        'description' => 'Sobib üürileandjatele, kinnisvarabüroodele ja koduomanikele.',
                        'price' => 'alates 2,5 € / m²',
                        'btn_text' => 'Küsi hinnapakkumist',
                        'features' => ['Kõikide ruumide täielik koristus', 'Puhas köök ja vannitoad', 'Korrektne ja hoolitsetud ilme', 'Valmidus üürile andmiseks'],
                    ],
                    'en' => [
                        'title' => 'Move-Out Ready',
                        'subtitle' => 'Moving cleaning',
                        'front_body' => 'The perfect solution for preparing an apartment or house for rental, sale, or new tenants.',
                        'back_body' => 'Comprehensive cleaning with options for windows, inside appliances, and upholstery.',
                        'description' => 'For landlords, real estate agencies, and homeowners.',
                        'price' => 'from €2.5 / m²',
                        'btn_text' => 'Get a quote',
                        'features' => ['Full cleaning of all rooms', 'Clean kitchen and bathrooms', 'Presentable living space', 'Ready for handover'],
                    ],
                ],
            ],
            [
                'slug' => 'business-care',
                'icon' => 'flaticon-enterprise',
                'image' => 'coralclean/packages/OFFICE CARE (1).png',
                'sort_order' => 5,
                'column_span' => 6,
                'translations' => [
                    'ru' => [
                        'title' => 'Бизнес-уход',
                        'subtitle' => 'Уборка офисов и коммерческих помещений',
                        'front_body' => 'Профессиональная уборка офисов, магазинов и коммерческих помещений на регулярной основе. Закреплённый персонал, работающий по согласованному графику.',
                        'back_body' => 'Индивидуальный расчёт под ваш объект и задачи. Возможность разовых и генеральных уборок, мойки окон и химчистки.',
                        'description' => 'Для компаний, которые ценят стабильность и порядок.',
                        'price' => 'от 0,07 € / м²',
                        'btn_text' => 'Запросить предложение',
                        'features' => ['Регулярную уборку по договору', 'Закреплённый персонал', 'Стабильное качество', 'Чистое рабочее пространство'],
                    ],
                    'et' => [
                        'title' => 'Äripindade hooldus',
                        'subtitle' => 'Kontorite ja äripindade koristus',
                        'front_body' => 'Professionaalne kontorite, kaupluste ja äripindade koristus regulaarsel alusel. Püsipersonal töötab kokkulepitud graafiku alusel.',
                        'back_body' => 'Individuaalne kalkulatsioon teie objekti ja ülesannete järgi.',
                        'description' => 'Ettevõtetele, kes hindavad stabiilsust ja korda.',
                        'price' => 'alates 0,07 € / m²',
                        'btn_text' => 'Küsi pakkumist',
                        'features' => ['Regulaarne lepinguline koristus', 'Püsipersonal', 'Stabiilne kvaliteet', 'Puhas tööruumi'],
                    ],
                    'en' => [
                        'title' => 'Business Care',
                        'subtitle' => 'Office & commercial cleaning',
                        'front_body' => 'Professional cleaning for offices, shops, and commercial spaces on a regular basis. Dedicated staff working on an agreed schedule.',
                        'back_body' => 'Custom quote for your space and needs. Options for one-time and deep cleaning, windows, and upholstery.',
                        'description' => 'For businesses that value consistency and order.',
                        'price' => 'from €0.07 / m²',
                        'btn_text' => 'Request an offer',
                        'features' => ['Regular contract cleaning', 'Dedicated staff', 'Consistent quality', 'Clean workspace'],
                    ],
                ],
            ],
            [
                'slug' => 'urgent',
                'icon' => 'flaticon-stopwatch',
                'image' => 'coralclean/packages/URGENT CLEAN (1).png',
                'sort_order' => 6,
                'column_span' => 6,
                'translations' => [
                    'ru' => [
                        'title' => 'Срочная уборка',
                        'subtitle' => 'Экспресс-уборка',
                        'front_body' => 'Когда нужно срочно навести порядок: перед приездом гостей, показом квартиры, важной встречей или неожиданной ситуацией. Мы выезжаем в приоритетном порядке.',
                        'back_body' => 'Экспресс-уборка в день обращения или в кратчайшие сроки.',
                        'description' => 'Подходит для квартир, домов и офисов.',
                        'price' => 'от 80–100 €',
                        'btn_text' => 'Вызвать клинеров срочно',
                        'features' => ['Приоритетный выезд', 'Быстрое выполнение работ', 'Гибкий формат уборки под задачу', 'Спасение в экстренных ситуациях'],
                    ],
                    'et' => [
                        'title' => 'Kiirkoristus',
                        'subtitle' => 'Ekspresskoristus',
                        'front_body' => 'Kui on kiiresti vaja korda teha: enne külaliste tulekut, korteri näitamist, olulist kohtumist. Väljasõit prioriteetses korras.',
                        'back_body' => 'Ekspresskoristus pöördumise päeval või lühimate tähtaegadega.',
                        'description' => 'Sobib korteritele, majadele ja kontoritele.',
                        'price' => 'alates 80–100 €',
                        'btn_text' => 'Telli kiiresti',
                        'features' => ['Prioriteetne väljasõit', 'Kiire teostus', 'Paindlik koristusformaat', 'Päästmine hädaolukorras'],
                    ],
                    'en' => [
                        'title' => 'Urgent Cleaning',
                        'subtitle' => 'Express cleaning',
                        'front_body' => 'When you urgently need to tidy up: before guests, a showing, an important meeting, or an unexpected situation. We dispatch as a priority.',
                        'back_body' => 'Express cleaning on the day of request or at the shortest notice.',
                        'description' => 'For apartments, houses, and offices.',
                        'price' => 'from €80–100',
                        'btn_text' => 'Book urgent cleaning',
                        'features' => ['Priority dispatch', 'Fast completion', 'Flexible format', 'Emergency relief'],
                    ],
                ],
            ],
        ];
    }
}
