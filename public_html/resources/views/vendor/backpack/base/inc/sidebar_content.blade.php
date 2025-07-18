{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('direction')}}">Направления</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('category')}}">Категории документов</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('document')}}">Документы</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('listener')}}">Слушатели</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('news')}}">Новости</a></li>
