<script type="text/javascript" src="{!! asset('js/app.min.js') !!}"></script>
<div>
    @foreach($directions as $direction)
        <div>
            <h3>{{$direction->name}}</h3>
            <p>Программа: {{$direction->program}}
            </p>
        </div>
    @endforeach
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="vvod" id="vvod" method="POST" enctype="multipart/form-data" action="{{ route('digital-chair.register') }}">
    @csrf
    <div class="container1">
        <input class="vvod1" type="text" name="fio" id="fio" placeholder="Ваше ФИО">
        <input class="vvod2" type="email" name="email" id="email" placeholder="Ваш e-mail">
    </div>
    <div class="container2">
        <select name="education_level" id="lvl" class="spis1">
            <option value="">Уровень образования</option>
            @foreach($educationLevels as $educationLevel)
                <option value="{{$educationLevel}}">{{$educationLevel}}</option>
            @endforeach
        </select>
        <select name="faculty" id="faculty" class="spis1">
            <option value="">Факультет</option>
            @foreach($faculties as $faculty)
                <option value="{{$faculty}}">{{$faculty}}</option>
            @endforeach
        </select>
        <input class="spis2" type="text" name="group_name" id="group" placeholder="Укажите группу">
    </div>
    <div class="container2">
        <select name="direction" id="direction" class="vvod1">
            <option value="">Выберите направление</option>
            @foreach($directions as $direction)
                <option value="{{$direction->name}}">{{$direction->name}}</option>
            @endforeach
        </select>
        <input class="vvod2" type="text" name="phone" id="phone" placeholder="Ваш номер телефона">
        <input type="file" class="form-control" name="image" />
    </div>
    <div class="check_box_text">
        <input type="checkbox" name="agree" id="agree" value="Согласен"> <label for="agree">Согласие на обработку персональных данных</label>
    </div>
    <div class="container3">
        <h3>Файлы для скачивания:</h3>
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
