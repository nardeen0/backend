<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Document;
use App\Models\Listener;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DigitalChairController extends Controller
{
    protected const EDUCATION_LEVELS = [
        'Бакалавриат',
        'Специалитет',
        'Магистратура',
        'Ординатура'
    ];

    protected const COUNTRIES = [
        "Австралия",
        "Австрия",
        "Азербайджан",
        "Албания",
        "Алжир",
        "Ангола",
        "Андорра",
        "Антигуа и Барбуда",
        "Аргентина",
        "Армения",
        "Афганистан",
        "Багамские Острова",
        "Бангладеш",
        "Барбадос",
        "Бахрейн",
        "Беларусь",
        "Белиз",
        "Бельгия",
        "Бенин",
        "Болгария",
        "Боливия",
        "Босния и Герцеговина",
        "Ботсвана",
        "Бразилия",
        "Бруней",
        "Буркина-Фасо",
        "Бурунди",
        "Бутан",
        "Вануату",
        "Ватикан",
        "Великобритания",
        "Венгрия",
        "Венесуэла",
        "Восточный Тимор",
        "Вьетнам",
        "Габон",
        "Гаити",
        "Гайана",
        "Гамбия",
        "Гана",
        "Гватемала",
        "Гвинея",
        "Гвинея-Бисау",
        "Германия",
        "Гондурас",
        "Гренада",
        "Греция",
        "Грузия",
        "Дания",
        "Джибути",
        "Доминика",
        "Доминиканская Республика",
        "Египет",
        "Замбия",
        "Зимбабве",
        "Израиль",
        "Индия",
        "Индонезия",
        "Иордания",
        "Ирак",
        "Иран",
        "Ирландия",
        "Исландия",
        "Испания",
        "Италия",
        "Йемен",
        "Кабо-Верде",
        "Казахстан",
        "Камбоджа",
        "Камерун",
        "Канада",
        "Катар",
        "Кения",
        "Кипр",
        "Киргизия",
        "Кирибати",
        "Китай",
        "Колумбия",
        "Коморы",
        "Конго",
        "Конго, Демократическая Республика",
        "Коста-Рика",
        "Кот-д’Ивуар",
        "Куба",
        "Кувейт",
        "Лаос",
        "Латвия",
        "Лесото",
        "Либерия",
        "Ливан",
        "Ливия",
        "Литва",
        "Лихтенштейн",
        "Люксембург",
        "Маврикий",
        "Мавритания",
        "Мадагаскар",
        "Македония",
        "Малави",
        "Малайзия",
        "Мали",
        "Мальдивы",
        "Мальта",
        "Марокко",
        "Маршалловы Острова",
        "Мексика",
        "Микронезия",
        "Мозамбик",
        "Молдавия",
        "Монако",
        "Монголия",
        "Мьянма",
        "Намибия",
        "Науру",
        "Непал",
        "Нигер",
        "Нигерия",
        "Нидерланды",
        "Никарагуа",
        "Новая Зеландия",
        "Норвегия",
        "Объединенные Арабские Эмираты",
        "Оман",
        "Пакистан",
        "Палау",
        "Палестина",
        "Панама",
        "Папуа-Новая Гвинея",
        "Парагвай",
        "Перу",
        "Польша",
        "Португалия",
        "Россия",
        "Руанда",
        "Румыния",
        "Сальвадор",
        "Самоа",
        "Сан-Марино",
        "Сан-Томе и Принсипи",
        "Саудовская Аравия",
        "Северная Корея",
        "Сейшелы",
        "Сенегал",
        "Сент-Винсент и Гренадины",
        "Сент-Китс и Невис",
        "Сент-Люсия",
        "Сербия",
        "Сингапур",
        "Сирия",
        "Словакия",
        "Словения",
        "Соломоновы Острова",
        "Сомали",
        "Судан",
        "Суринам",
        "США",
        "Сьерра-Леоне",
        "Таджикистан",
        "Таиланд",
        "Танзания",
        "Того",
        "Тонга",
        "Тринидад и Тобаго",
        "Тувалу",
        "Тунис",
        "Туркмения",
        "Турция",
        "Уганда",
        "Узбекистан",
        "Украина",
        "Уругвай",
        "Фиджи",
        "Филиппины",
        "Финляндия",
        "Франция",
        "Хорватия",
        "Центральноафриканская Республика",
        "Чад",
        "Черногория",
        "Чехия",
        "Чили",
        "Швейцария",
        "Швеция",
        "Шри-Ланка",
        "Эквадор",
        "Экваториальная Гвинея",
        "Эритрея",
        "Эсватини",
        "Эстония",
        "Эфиопия",
        "Южная Корея",
        "Южно-Африканская Республика",
        "Южный Судан",
        "Ямайка",
        "Япония"
    ];

    protected const UNIVERSITIES = [
        'ВолгГТУ',
        'ВПИ',
        'КТИ',
        'СФ',
        'ВА МВД',
        'ВГАФК',
        'ВолгГМУ',
        'ВГСПУ',
        'ВолГАУ',
        'ВГТУ',
    ];

    protected const TIME_EDU = [
        'Очная',
        "Очно-заочная"
    ];

    public function index(): View
    {
        return view('dc.index', [
            'directions' => Direction::where('is_published', true)->orderBy('order', 'asc')->get(),
            'educationLevels' => self::EDUCATION_LEVELS,
            'universities' => self::UNIVERSITIES,
            'time_edus' => self::TIME_EDU,
            'countries' => self::COUNTRIES,
            'underFormFiles' => Document::whereHas('category', function (Builder $query) {
                return $query->where('slug', 'forms-doc');
            })->get(),
            'news' => News::whereNotNull('publish_date')->orderBy('publish_date', 'desc')->limit(3)->get()
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'fio' => 'required|string',
            'email' => 'required|email',
            'education_level' => [Rule::in(self::EDUCATION_LEVELS)],
            'university' => [Rule::in(self::UNIVERSITIES)],
            'documents_number' => 'required|string',
            'is_foreign' => 'required|integer',
            'specialization' => 'required|string',
            'faculty' => 'required|string',
            'group_name' => 'required|string',
            'direction' => 'exists:App\Models\Direction,id',
            'phone' => 'required|string',
            'birthday' => 'required|date',
            'country' => 'required|string',
            'time_edu' => 'required|string',
            'start_year' => 'required|integer',
            'diplom_num' => 'nullable|string',
            'diplom_place' => 'nullable|string',
            'diplom_napr' => 'nullable|string',
            'diplom_year' => 'nullable|date',
            'vk' => 'nullable|string',
            'image' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);


        if (isset($request->image)) {
            $imageName = Str::of($request->fio)->beforeLast('.')->slug()->value() . '.' . $request->image->extension();
            $request->image->storeAs('images', $imageName);
            $validatedData['image'] = $imageName;
        }
        $validatedData['direction_id'] = Direction::where('id', $validatedData['direction'])->first()['id'];
        $listener = new Listener($validatedData);


        return (int)$listener->save();
    }
}
