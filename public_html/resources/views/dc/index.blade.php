<html class="fa-events-icons-ready" lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/favicon.ico')}}">
    <title>Цифровая кафедра</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/2ff1d2c7bf.css" media="all" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">

    <style type="text/css">

        span.im-caret {
            -webkit-animation: 1s blink step-end infinite;
            animation: 1s blink step-end infinite;
        }

        @keyframes blink {
            from, to {
                border-right-color: black;
            }
            50% {
                border-right-color: transparent;
            }
        }

        @-webkit-keyframes blink {
            from, to {
                border-right-color: black;
            }
            50% {
                border-right-color: transparent;
            }
        }

        span.im-static {
            color: grey;
        }

        div.im-colormask {
            display: inline-block;
            border-style: inset;
            border-width: 2px;
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        div.im-colormask > input {
            position: absolute;
            display: inline-block;
            background-color: transparent;
            color: transparent;
            -webkit-appearance: caret;
            -moz-appearance: caret;
            border-style: none;
            left: 0; /*calculated*/
        }

        div.im-colormask > input:focus {
            outline: none;
        }

        div.im-colormask > input::-moz-selection {
            background: none;
        }

        div.im-colormask > input::selection {
            background: none;
        }

        div.im-colormask > input::-moz-selection {
            background: none;
        }

        div.im-colormask > div {
            color: black;
            display: inline-block;
            width: 100px; /*calculated*/
        }
    </style>
</head>

<body>

<button class="scroll-top-btn" href="body" data-scroll="body">Вверх</button>

<header id="glavnaya_on_mobile">
    <div class="content">


        <div class="top_header">
            <div class="row1">
                <div class=" sidebar column1">
                    <a href="https://www.vstu.ru/" target="_blank" style="display: flex;"><img class="logo"
                                                                                               src="{{ asset('storage/img/Logo_vstu_rus.png') }}"
                                                                                               alt="Логотип"></a>

                    <nav class="menu column">
                        <a href="#glavnaya" data-scroll="#glavnaya" style="font-weight: bold">Главная</a>
                        <a href="#prichini" data-scroll="#prichini">Причины участия</a>
                        <a href="#naprav" data-scroll="#naprav">Направления</a>
                        <a href="#o_rokovoditele" data-scroll="#o_rokovoditele">О руководителе </a>
                        <a href="#partnyeri" data-scroll="#partnyeri"> Партнеры</a>
                        <a href="#novosti" data-scroll="#novosti"> Новости</a>
                        <a href="#kontacti" data-scroll="#kontacti">Подать заявку</a>
                        <a href="#raspisanie" data-scroll="#raspisanie"> Расписание</a>
                    </nav>
                </div>
                <div class="menu_button" style="text-align: center;">
                    <p class="menu_button_btn"></p>
                    <p class="menu_button_btn"></p>
                    <p class="menu_button_btn"></p>
                </div>
            </div>
        </div>

        <div style="text-indent:-99999px;"><a><img
                    src="{{ asset('storage/img/logo/ЛогоЦК2.png')}}"></a></div>
        <div class="bot_header">
            <div class="bk_block">
                <div class="info">
                    <h1 style="margin-bottom: 0px; text-transform: none;">Цифровая кафедра ВолгГТУ</h1>
                    <p class="subtitle">IT-программы ВолгГТУ для студентов любых специальностей.<br> Полное покрытие
                        стоимости обучения.<br>Количество мест ограничено.</p>
                    <p class="subtitle">Цифровые кафедры — это уникальная возможность получить дополнительную
                        специальность без отрыва от основной учёбы.<br>Выбери подходящую программу, подай заявку и стань
                        специалистом в области IT</p>
                    <div style="text-align: center; margin-top: 5%;">
                        <a class="svyaz" target="_blank" href="#kontacti" data-scroll="#kontacti">Подать заявку</a>
                    </div>
                </div>
            </div>

            <div class="rasporka"></div>
        </div>
    </div>
</header>


<header id="glavnaya_on_PC">
    <div class="content" id="contet">
        <nav class="nav_menu">
            <a href="#o_rokovoditele" data-scroll="#o_rokovoditele">О руководителе </a>
            <a href="#novosti" data-scroll="#novosti"> Новости</a>
            <a href="#raspisanie" data-scroll="#raspisanie"> Расписание</a>
            <a href="#partnyeri" data-scroll="#partnyeri"> Партнеры</a>
        </nav>
    </div>
    <div class="content">
        <div class="top_header">
            <a href="https://www.vstu.ru/" target="_blank"><img class="logo"
                                                                src="{{ asset('storage/img/Logo_vstu_rus.png')}}"
                                                                alt="Логотип"></a>
            <nav class="menu">
                <a style="font-weight: bold" href="#glavnaya" data-scroll="#glavnaya">Главная</a>
                <a href="#prichini" data-scroll="#prichini">Причины участия</a>
                <a href="#naprav" data-scroll="#naprav">Направления</a>
                <a href="#kontacti" data-scroll="#kontacti">Подать заявку</a>
            </nav>
        </div>


        <div class="bot_header">
            <div class="bk_block">
                <div class="info">
                    <h1 style="margin-bottom: 0px; text-transform: none;">Цифровая кафедра ВолгГТУ</h1>
                    <p class="subtitle">IT-программы ВолгГТУ для студентов любых специальностей.<br> Полное покрытие
                        стоимости обучения.<br>Количество мест ограничено.</p>
                    <p class="subtitle">Цифровые кафедры — это уникальная возможность получить дополнительную
                        специальность без отрыва от основной учёбы.<br>Выбери подходящую программу, подай заявку и стань
                        экспертом в области IT!</p>
                    <div style="text-align: center; margin-top: 5%;">
                        <a class="svyaz" target="_blank" href="#kontacti" data-scroll="#kontacti">Подать заявку</a>
                    </div>
                </div>
            </div>

            <div class="rasporka"></div>
        </div>
    </div>
</header>


<section class="o_rokovoditele" id="o_rokovoditele">
    <div class="card description">
        <img src="{{ asset('storage/img/kravec_alla_grigorevna_0.jpg')}}" alt="Фото" class="card-image">
        <div class="card-content">
            <h2 class="card-title">Кравец Алла Григорьевна</h2>
            <p class="background">Руководитель цифровой кафедры ВолгГТУ</p>
            <p><strong>Ученое звание:</strong> профессор</p>
            <p><strong>Ученая степень:</strong> доктор технических наук</p>
            <a class="button" href="https://www.vstu.ru/university/personalii/kravets_alla_grigorevna/" target="_blank">Подробнее</a>
        </div>
    </div>
</section>
<section class="novosti description" id="novosti">
    <h2 class="card-title">Новости</h2>

    <div class="cards">
        <div class="card-container">
            @foreach($news as $oneNews)
                <div class="card">
                    <a href="{{$oneNews->url}}" target="_blank">
                        <img src="{{$oneNews->getImage()}}" alt="{{$oneNews->title}}" class="card-image">
                        <div class="card-content">
                            <h3 class="card-title">{{$oneNews->title}}</h3>
                            <h3 style="margin-top: 10px; color: rgb(0 0 0 / 50%)"
                                class="card-title">{{$oneNews->publish_date}}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <h3 class="archive"><a target="_blank" class="archive_a"
                           href="https://www.vstu.ru/university/press-center/news/tsifrovaya_kafedra/">Все
            новости</a></h3>
</section>
<section class="prichini" id="prichini">
    <div class="content">
        <div class="description">
            <div class="des_h2">
                <h2>Причины принять участие</h2>
            </div>
            <h3>1. Получите новую профессию</h3>
            <p>Вы сможете освоить дополнительную профессию в области ИТ параллельно основной учёбе.</p>
            <h3>2. Доступность и практико-ориентированность</h3>
            <p>Обязательная практика в компаниях по ИТ-направлениям.</p>
            <h3>3. Востребованные специальности</h3>
            <p>Все программы реализованы по наиболее востребованным и перспективным на рынке труда
                ИТ-специальностям.</p>
            <h3>4. Смешанный формат обучения</h3>
            <p>Занятия будут проходить как в очном, так и в онлайн формате с записью прошедших занятий. График занятий
                устанавливается с возможностью совмещения с основной учёбой.</p>
            <h3>5. Качественное обучение</h3>
            <p>Занятия проводят опытные преподаватели-практики, преимущественно работающие в ИТ-компаниях.</p>
            <h3>6. Документ об образовании</h3>
            <p>После обучения выдается диплом с присвоением дополнительной квалификации.</p>
            <h3>7. Бесплатное обучение</h3>
            <p>Полное покрытие стоимости обучения из средств программы "Приоритет-2030".</p>
        </div>
    </div>
</section>
<section class="project" id="raboti">
    <div class="content">
        <div class="pictures column">
            <div class="row">
                <div class="inline_block column">
                    <img src="{{ asset('storage/img/bumaga.png')}}" alt="Эмблемка">
                    <div class="kolvo center">
                        <h3>8</h3>
                        <p>направлений</p>
                    </div>
                </div>
                <div class="inline_block column">
                    <img src="{{ asset('storage/img/bumaga.png')}}" alt="Эмблемка">
                    <div class="kolvo center">
                        <h3>252 часа</h3>
                        <p>длительность</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="inline_block column">
                    <img src="{{ asset('storage/img/bumaga.png')}}" alt="Эмблемка">
                    <div class="kolvo center">
                        <h3>сентябрь 2024 года</h3>
                        <p>старт обучения</p>
                    </div>
                </div>
                <div class="inline_block column">
                    <img src="{{ asset('storage/img/bumaga.png')}}" alt="Эмблемка">
                    <div class="kolvo center">
                        <h3>Онлайн и офлайн</h3>
                        <p>форматы</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="treb">
    <div class="content">
        <div class="treb_content">
            <div class="treb_text">
                <h2>Для кого</h2>
                <div class="seriy">
                    <div class="goluboy"></div>
                </div>
                <p>Бакалавры 2-го курса и выше</p>
                <div class="seriy">
                    <div class="goluboy"></div>
                </div>
                <p>Специалисты 2-го курса и выше</p>
                <div class="seriy">
                    <div class="goluboy"></div>
                </div>
                <p>Магистранты</p>
            </div>
            <div class="treb_text">
                <h2>Требования</h2>
                <div class="seriy">
                    <div class="goluboy"></div>
                </div>
                <p>Хорошая успеваемость по основной образовательной программе</p>
            </div>
        </div>
    </div>
</section>
<section class="naprav" id="naprav">
    <div class="content">
        <div class="naprav_title">
            <h2>Наши направления</h2>
        </div>
        <div class="galereya">
            @foreach($directions as $direction)
                <div class="box" onclick="example(this)">
                    <h3><strong>{{$direction->name}}</strong></h3>
                    <p style="color: rgb(0 0 0 / 50%);">Программа:</p>
                    <p>{!! nl2br($direction->program) !!}</p>
                    <p style="color: rgb(0 0 0 / 50%);">Квалификация:</p>
                    <p>{{$direction->qualification}}</p>
                    <p style="color: rgb(0 0 0 / 50%);">Для кого:</p>
                    <p>{{$direction->target_audience}}</p>
                </div>
            @endforeach

        </div>
    </div>
</section>

<section class="project raspisanie" id="raspisanie">
    <div class="content description">
        <h2 class="description white_on_blue">Расписание и коммуникации</h2>
        <br>
        <div id="emblem" class="pictures">
            <div class="raspisanie emblem">
                <img src="{{ asset('storage/img/list.jpg')}}" alt="Эмблемка">
                <div class="kolvo">
                    <p class="raspisanie_p"><a target="_blank" class="raspisanie_a white_on_blue"
                                               href="https://www.vstu.ru/student/raspisaniya/">Расписание</a></p>
                </div>
            </div>

            <div class="raspisanie emblem">
                <img src="{{ asset('storage/img/Qr.jpg')}}" alt="Эмблемка">
                <div class="kolvo">
                    <p class="raspisanie_p"><a target="_blank" class="raspisanie_a white_on_blue"
                                               href="https://vk.com/tsifra.vstu">Связь</a></p>
                </div>
            </div>

            {{--            <div class="raspisanie emblem">--}}
            {{--                <img src="{{ asset('storage/img/chat_bot.jpg')}}" alt="Эмблемка">--}}
            {{--                <div class="kolvo">--}}
            {{--                    <p class="raspisanie_p"><a target="_blank" class="raspisanie_a white_on_blue" href="">Чат бот</a>--}}
            {{--                    </p>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</section>


<section class="partnyeri" id="partnyeri">
    <div class="content description">
        <h2>Партнеры</h2>
        <div class="image-container">
            <a class="logo_lolo" target="_blank" href="https://vniktinho.ru/"><img class="lolo_part"
                                                                                   src="{{ asset('storage/img/logo/vnikti.jpg')}}"
                                                                                   alt="Изображение 1"></a>
            <a class="logo_lolo" target="_blank" href="http://www.shtil.org/"><img class="lolo_part"
                                                                                   src="{{ asset('storage/img/logo/shtill.jpg')}}"
                                                                                   alt="Изображение 2"></a>
            <a class="logo_lolo" target="_blank" href="http://www.akhtuba.ru/"><img class="lolo_part"
                                                                                    src="{{ asset('storage/img/logo/achtuba.jpg')}}"
                                                                                    alt="Изображение 3"></a>
            <a class="logo_lolo" target="_blank" href="https://volga-soft.ru"><img class="lolo_part"
                                                                                   src="{{ asset('storage/img/logo/volgasoft.png')}}"
                                                                                   alt="Изображение 4"></a>
            <a class="logo_lolo" target="_blank" href="https://bilab.ru/"><img class="lolo_part"
                                                                               src="{{ asset('storage/img/logo/logo-01.png')}}"
                                                                               alt="Изображение 5"></a>
            <a class="logo_lolo" target="_blank" href="https://navdesign.ru/"><img class="lolo_part"
                                                                                   src="{{ asset('storage/img/logo/nav_design.jpg')}}"
                                                                                   alt="Изображение 6"></a>
            <a class="logo_lolo" target="_blank" href="https://sibintek.ru/"><img class="lolo_part"
                                                                                  src="{{ asset('storage/img/logo/sibintek.png')}}"
                                                                                  alt="Изображение 7"></a>
            <a class="logo_lolo" target="_blank" href="https://www.singularis-lab.com"><img class="lolo_part"
                                                                                            src="{{ asset('storage/img/logo/singu.jpg')}}"
                                                                                            alt="Изображение 8"></a>
            <a class="logo_lolo" target="_blank" href="http://www.volgablob.ru/ru/"><img class="lolo_part"
                                                                                         src="{{ asset('storage/img/logo/volgablob.jpg')}}"
                                                                                         alt="Изображение 9"></a>
            <a class="logo_lolo" target="_blank" href="http://cmit.vstu.ru/"><img class="lolo_part"
                                                                                  src="{{ asset('storage/img/logo/cmit.jpg')}}"
                                                                                  alt="Изображение 10"></a>
            <a class="logo_lolo" target="_blank" href="https://www.cbgr.ru/"><img class="lolo_part"
                                                                                  src="{{ asset('storage/img/logo/Consyst_1.png')}}"
                                                                                  alt="Изображение 11"></a>
            <a class="logo_lolo" target="_blank" href="https://oceli.energy/"><img class="lolo_part"
                                                                                   src="{{ asset('storage/img/logo/oceli_energy.png')}}"
                                                                                   alt="Изображение 12"></a>
            <a class="logo_lolo" target="_blank" href="https://abak2000.ru/"><img class="lolo_part"
                                                                                  src="{{ asset('storage/img/logo/aback.jpg')}}"
                                                                                  alt="Изображение 13"></a>
            <a class="logo_lolo" target="_blank" href="https://sciener.ru/"><img class="lolo_part"
                                                                                 src="{{ asset('storage/img/logo/sciener.png')}}"
                                                                                 alt="Изображение 14"></a>
            <a class="logo_lolo" target="" href="https://topfactor.pro"><img class="lolo_part"
                                                                             src="{{ asset('storage/img/logo/Topfactor2.png')}}"
                                                                             alt="Изображение 15"></a>
            <a class="logo_lolo" target="_blank" href="https://sigma-it.ru/"><img class="lolo_part"
                                                                                  src="{{ asset('storage/img/logo/sigma.jpg')}}"
                                                                                  alt="Изображение 16"></a>
            <a class="logo_lolo" target="_blank" href="https://softline.ru/"><img class="lolo_part"
                                                                                  src="{{ asset('storage/img/logo/softline.jpg')}}"
                                                                                  alt="Изображение 17"></a>

            <a class="logo_lolo" target="_blank" href="https://volgograd.tele2.ru/"><img class="lolo_part"
                                                                                         src="{{ asset('storage/img/logo/tele2.png')}}"
                                                                                         alt="Изображение 18"></a>
            <a class="logo_lolo" target="_blank" href="https://vgtrk.com/"><img class="lolo_part"
                                                                                src="{{ asset('storage/img/logo/vgtrk.png')}}"
                                                                                alt="Изображение 19"></a>
            <a class="logo_lolo" target="_blank" href="https://5dtech.pro/"><img class="lolo_part"
                                                                                 src="{{ asset('storage/img/logo/stereotech.jpg')}}"
                                                                                 alt="Изображение 20"></a>
            <a class="logo_lolo" target="_blank" href="https://citvo.ru/"><img class="lolo_part"
                                                                               src="{{ asset('storage/img/logo/cit.png')}}"
                                                                               alt="Изображение 21"></a>
            <a class="logo_lolo" target="_blank" href="https://foodtech-lab.ru/"><img class="lolo_part"
                                                                                      src="{{ asset('storage/img/logo/foodtech.png')}}"
                                                                                      alt="Изображение 22"></a>
            <a class="logo_lolo" target="_blank" href="https://logema.org/"><img class="lolo_part"
                                                                                 src="{{ asset('storage/img/logo/logema.png')}}"
                                                                                 alt="Изображение 23"></a>

            <a class="logo_lolo" target="_blank" href="http://volgatek.com/"><img class="lolo_part"
                                                                                  src="{{ asset('storage/img/logo/volgatakingi.png')}}"
                                                                                  alt="Изображение 24"></a>
        </div>
    </div>
    </div>
</section>


<section class="forma" id="kontacti">
    <div class="content">
        <div class="text">
            <h2>ПОСТУПАЙ УЖЕ СЕЙЧАС</h2>
            <!-- <p>Дедлайн первой волны заявок:
                25 июня 2022г.</p> -->
        </div>
        <form class="vvod" id="vvod">
            <div class="container1">
                <input class="vvod1" type="text" name="fio" id="fio" placeholder="ФИО (полностью)*">
                <input class="vvod2" type="email" name="email" id="email" placeholder="E-mail*">
                <input class="vvod2" type="text" name="phone" id="phone" placeholder="Номер телефона*">

            </div>
            <div>
                <input class="vvod2" type="text" name="vk" id="vk" placeholder="Ссылка на личную страницу ВК">
                <label for="birthday">Дата рождения*</label><input class="vvod1" type="date" name="birthday"
                                                                   id="birthday">
            </div>
            <div class="container11">
                <input type="checkbox" name="foreign" id="foreign" hidden="hidden"> <label for="foreign">Иностранный
                    гражданин</label>
                <input class="vvod2" type="text" name="snils" id="snils" placeholder="СНИЛС*">
                <select class="spis1" name="country" id="country" hidden="hidden">
                    <option value="">Гражданство*</option>
                    @foreach($countries as $country)
                        <option value="{{$country}}">{{$country}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="education_level" id="lvl" class="spis1">
                    <option value="">Уровень образования*</option>
                    @foreach($educationLevels as $educationLevel)
                        <option value="{{$educationLevel}}">{{$educationLevel}}</option>
                    @endforeach
                </select>
                <select name="time_edu" id="time_edu" class="spis1">
                    <option value="">Форма обучения*</option>
                    @foreach($time_edus as $time_edu)
                        <option value="{{$time_edu}}">{{$time_edu}}</option>
                    @endforeach
                </select>
                <input name="start_year" id="start_year" type="number" class="vvod1" placeholder="Год поступления*"
                       maxlength="4" minlength="4" min="1900" max="2100">

            </div>
            <div class="container2">
                <input class="keepDatalist spis1" name="university" id="university" type="text" list="university_list"
                       placeholder="ВУЗ*"/>
                <datalist id="university_list">
                    @foreach($universities as $university)
                        <option value="{{$university}}">{{$university}}</option>
                    @endforeach
                </datalist>

                <input class="keepDatalist spis1" name="faculty" id="faculty" type="text" list="faculty_list"
                       placeholder="Факультет*"/>
                <datalist id="faculty_list">
                </datalist>
            </div>
            <div id="diplom_0" hidden="hidden" class="diplom">
                <div>
                    <label for="diplom_1">Информация о предыдущем образовании</label>

                </div>
                <div id="diplom_1" hidden="hidden">
                    <input type="text" id="diplom_num" class="vvod1" placeholder="Серия и номер диплома">
                    <input type="text" id="diplom_place" class="vvod1" placeholder="Место выдачи диплома">
                    <input type="text" id="diplom_napr" class="vvod1"
                           placeholder="Специальность/направление образования">
                </div>
                <div>
                    <label for="diplom_year"> Дата выдачи диплома</label><input type="date" id="diplom_year"
                                                                                class="vvod1"
                                                                                placeholder="Серия и номер диплома">

                </div>
            </div>
            <div id="diplom_2" hidden="hidden"><br></div>
            <div class="container2" class="diplom">
                <select name="napr_1" id="napr_1" class="vvod1">
                    <option value="">Выберите направление обучения*</option>
                </select>
                <select name="napr_2" id="napr_2" class="vvod1">
                    <option value="">Выберите специальность*</option>
                </select>
            </div>

            <div class="container2">

                <input class="spis2" type="text" name="group_name" id="group" placeholder="Укажите группу*">

                <select name="direction_hidden" id="direction_hidden" hidden="hidden">
                    @foreach($directions as $direction)
                        <option
                            value="{{$direction->name}}!{{$direction->for_it}}!{{$direction->short_name}}">{{$direction->name}}
                            !{{$direction->for_it}}!{{$direction->id}}</option>
                    @endforeach
                </select>
                <select name="direction" id="direction" class="vvod1">
                    <option value="">Выберите программу подготовки*</option>

                </select>
            </div>
            <div class="container2">
                <div class="file-input-container ">
                    <input type="file" id="myFile" name="image">
                    <label id="fileNameDisplay" class="custom-file-input" for="myFile">Ваше фото* <br>3x4
                    </label>
                </div>
            </div>
            <div class="check_box_text">
                <input type="checkbox" name="agree1" id="agree1" value="Согласен"> <label for="agree1"
                                                                                          style="width: 60%">Подтверждаю,
                    что ранее не проходил обучение на «Цифровой кафедре» университета-участника программы Приоритет 2030
                    или университета – кандидата программы Приоритет 2030*</label>
                <br>
                <br>
                <input type="checkbox" name="agree" id="agree" value="Согласен"> <label for="agree">Согласие на
                    обработку персональных данных*</label>
            </div>
            <div>
                <br>
                <label>Поля со * обязательны к заполнению</label>
            </div>

            <div class="container3">
                <h3>Файлы для скачивания:</h3>
                <h3>Их необходимо распечатать, заполнить и предоставить на «Цифровую кафедру»</h3>
                @foreach($underFormFiles as $file)
                    <div>
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <a href="{{$file->getFullPath()}}">{{$file->name}}</a>
                    </div>
                @endforeach
            </div>
            <div class="container4">
                <button type="submit" id="sendData" class="knopka">Подать заявку</button>
                <div id="errorMess" class="errorMess"></div>
            </div>
        </form>
    </div>
</section>


<footer class="footer">
    <div id="footer" class="content in_line">
        <div class="info_block">
            <h3>© Волгоградский государственный технический университет</h3>
            <a href="https://vk.com/volggtu"><i class="fa fa-vk" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/user/vstuTV/videos"><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>
        <div class="contacts">
            <div class="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <p class="footer-text-contact">Россия, 400005, Волгоград, пр. им. Ленина, 28</p>
            </div>
            <div>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p class="footer-text-contact">(8442) 23-00-76</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://use.fontawesome.com/2ff1d2c7bf.js"></script>
<script src="{{ asset('storage/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{ asset('storage/js/inputmask.js')}}"></script>
<script src="{{ asset('storage/js/app.js')}}"></script>

<script src="{{ asset('storage/js/interact.js')}}"></script>

</body>
</html>
