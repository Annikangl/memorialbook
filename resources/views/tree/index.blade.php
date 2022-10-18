@extends('layouts.app')

<script src="{{asset('js/familytree.js')}}"></script>
<div class="container">
    <div class="tree__inner" style="margin-top: 100px !important;">
        <div class="tree__nav">
            <div class="tree-nav__items">
                <div class="tree-nav__item">
                    <a class="tree-nav__link active" href="../tree">Семейное древо</a>
                </div>
                <div class="tree-nav__item">
                    <a class="tree-nav__link" href="{{route('tree.list')}}">Список профилей</a>
                </div>
            </div>
        </div>
        <div class="tree__controls">
            <a class="tree-controls__button -new btn btn-primary btn-sm" href="{{route('profile.create')}}">+ Добавить
                профиль</a>

        </div>
    </div>
    <div class="container-tree">
        <div id="tree"></div>
    </div>

</div>


<script>

    {{--let profiles = {!! json_encode($profiles->toArray())!!};--}}
    var family = new FamilyTree(document.getElementById("tree"), {
        template: 'john',
        nodeMouseClick: FamilyTree.action.edit,
        siblingSeparation: 150,
        enableSearch: false,
        nodeBinding: {
            field_0: 'name',
            field_1: "date",
            img_0: "img",
        },
        // editForm: {
        //     titleBinding: false,
        //     photoBinding: "img",
        //     generateElementsFromFields: false,
        //     addMore: false,
        //     cancelBtn: 'Закрыть',
        //     saveAndCloseBtn: 'Сохранить',
        //     elements: [
        //         {type: 'textbox', label: 'Полное имя', id: 'name', binding: 'fullname'},
        //         [
        //             // {type: 'date', label: 'Дата рождения', binding: 'birthDate'},
        //             // {type: 'date', label: 'Дата смерти', binding: 'deathDate'}
        //         ],
        //         [
        //             {type: 'textbox', label: 'Место рождения', binding: 'placebirth'},
        //             {type: 'textbox', label: 'Место смерти', binding: 'burialplace'},
        //         ],
        //         {type: 'textbox', label: 'Причина смерти', binding: 'reasondeath'},
        //         {type: 'btn', label: 'Причина смерти', binding: 'link'},
        //
        //     ],
        //     buttons: {
        //         edit: {
        //             icon: FamilyTree.icon.edit(24, 24, '#fff'),
        //             text: 'Edit',
        //             hideIfEditMode: true,
        //             hideIfDetailsMode: false
        //         },
        //         remove: null,
        //         share: null,
        //         pdf: null
        //     }
        // }
    });

    let profiles = @json($profiles);

    profiles.forEach(function (profile) {

        family.addNode({
            id: profile.id,
            pids: [profile.p_id],
            mid: profile.m_id,
            fid: profile.f_id,
            name: [profile.first_name + ' ' + profile.last_name],
            fullname: [profile.first_name + ' ' + profile.patronymic + ' ' + profile.last_name],
            img: 'storage/' + profile.avatar,
            gender: 'male',
            birthDate: profile.date_birth,
            deathDate: profile.date_death,
            placebirth: profile.birth_place,
            burialplace: profile.burial_place,
            reasondeath: profile.reason_death,
            date: profile.date_birth + ' - ' + profile.date_death + ' ' + 'г.',
        },)

    });
</script>
